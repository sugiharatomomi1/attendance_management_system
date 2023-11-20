<?php
require 'header.php';

// 初期化
$name = $class = $IDM = $student_number = $attendance_number = $password = '';

echo '<div class="form">';
echo '<h1 class="form-title">学生新規登録</h1><br>';

if (isset($_SESSION['err_msg'])) {
    echo '<h3 id="error_message">', $_SESSION['err_msg'], '</h3>';
    $IDM = $_SESSION['IDM'];
    $name = $_SESSION['name'];
    $class = $_SESSION['class'];
    $student_number = $_SESSION['student_number'];
    $attendance_number = $_SESSION['attendance_number'];
    $password = $_SESSION['password'];
}

if (isset($_POST['idm_reading'])) {
    $command = "python C:\\xampp\\htdocs\\AttendEZtest\\NFC_CARD_READING.py";
    
    // 外部コマンドを実行し、標準出力を取得
    exec($command, $output, $return_var);
    
    // エラーがないか確認
    if ($return_var === 0) {
        // 正常終了
        $IDM = implode("\n", $output);
    } else {
        // エラーが発生した場合
        echo "外部コマンドの実行中にエラーが発生しました。エラーコード: " . $return_var;
    }
}
?>

<form action="students_regist.php" method="POST">
    <input type="submit" name="idm_reading" class="form-submit" value="IDM読み取り">
</form>


<?php

echo '<form action="students_regist_output.php" method="post">';
echo '<table class="form-table">';
echo '<tr><th class="form-item">登録カードIDM</th><td class="form-body">';
echo '<input type="text" id="IDM" name="IDM" class="form-text" autocomplete="IDM" required readonly value="', $IDM, '">'; //ユーザに手入力させないようにreadonly付き。
echo '</td>';
echo '<tr><th class="form-item">学籍番号</th><td class="form-body">';
echo '<input type="text" id="student_number" name="student_number" class="form-text" autocomplete="student_number" required value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">クラス</th><td class="form-body">';
echo '<input type="text" id="class" name="class" class="form-text" autocomplete="class" required value="', $class, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">出席番号</th><td class="form-body">';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" class="form-text" required value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">氏名</th><td class="form-body">';
echo '<input type="text" id="name" autocomplete="name" name="name" class="form-text" required value="', $name, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">パスワード</th><td class="form-body">';
echo '<input type="text" id="password" autocomplete="password" name="password" class="form-text" readonly required value="', $password, '">'; //ユーザに手入力させないようにreadonly付き。
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" name="registform" class="form-submit" value="確認へ">';
echo '</form>';
echo '</div>';
?>

<?php require 'footer.php';?>
