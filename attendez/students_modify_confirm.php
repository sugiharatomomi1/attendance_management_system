<?php require 'header.php';

$IDM = $class = $studentNumber = $password = $attendanceNumber = $name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST データが送信された場合の処理
    $IDM = isset($_POST['IDM']) ? htmlspecialchars($_POST['IDM']) : '';
    $studentNumber = isset($_POST['student_number']) ? htmlspecialchars($_POST['student_number']) : '';
    $class = isset($_POST['class']) ? htmlspecialchars($_POST['class']) : '';
    $attendanceNumber = isset($_POST['attendance_number']) ? htmlspecialchars($_POST['attendance_number']) : '';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';


    $_SESSION['students_info']['IDM'] = $IDM;
    $_SESSION['students_info']['student_number'] = $studentNumber;
    $_SESSION['students_info']['class'] = $class;
    $_SESSION['students_info']['attendance_number'] = $attendanceNumber;
    $_SESSION['students_info']['name'] = $name;
    $_SESSION['students_info']['password'] = $password;

    // データの表示などを行う
    echo '<h2>確認画面</h2>';
    echo '<form action="students_modify_submit.php" method="post">';
    echo '  <table>';
    echo '    <tr>';
    echo '<td>登録カードIDM: ', $IDM, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '<td>学籍番号: ', $studentNumber, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '<td>クラス: ', $class, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '<td>出席番号: ', $attendanceNumber, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '<td>氏名: ', $name, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '<td>パスワード: ', $password, '</td>';
    echo '      <td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '  </table>';
    echo '  <input type="submit" value="更新">';
    echo '</form>';
} else {
    echo '<p>,エラー,</p>';
}
?>

<a href="students_modify.php?id=<?= $studentNumber ?>">戻る</a>

<?php
require 'footer.php';
?>
