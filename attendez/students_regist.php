<?php
require 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 初期化
$name = $class = $IDM = $student_number = $attendance_number = '';

echo '<div class="student_regist">';
echo '生徒の新規会員登録<br>';

if (isset($_SESSION['err_msg'])) {
    echo '<h3>', $_SESSION['err_msg'], '</h3>';
}
?>

<?php
if (isset($_POST['idm_reading'])) {
    $command="python NFC_CARD_READING.py ";
    exec($command,$output);
    print implode('', $output);
}
?>

<form action="students_regist.php" method="POST">
    <input type="submit" name="idm_reading" value="IDM読み取り">
</form>

<?php
echo '<form id="cardForm" action="students_regist_output.php" method="post">';
echo '<table>';
echo '<tr><td>登録カードIDM:</td><td>';
echo '<input type="text" id="IDM" name="IDM" autocomplete="IDM" value="', isset($_SESSION['IDM']) ? $_SESSION['IDM'] : '', '">';
echo '</td>';
echo '<tr><td>学籍番号:</td><td>';
echo '<input type="text" id="student_number" name="student_number" autocomplete="student_number" required value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><td>クラス:</td><td>';
echo '<input type="text" id="class" name="class" autocomplete="class"  value="', $class, '">';
echo '</td></tr>';
echo '<tr><td>出席番号:</td><td>';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number"  value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><td>氏名:</td><td>';
echo '<input type="text" id="name" autocomplete="name" name="name"  value="', $name, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確認へ">';
echo '</form>';
echo '</div>';
require 'footer.php';
?>