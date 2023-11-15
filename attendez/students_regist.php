<script>
    // WebSocketの設定
    const socket = new WebSocket('ws://192.168.104.88:8765');

    // NFC読み取りボタンがクリックされた時の処理
    document.getElementById('nfcForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // サーバーにコマンドを送信
        socket.send(command);

        // サーバーからの応答を待ち、結果を表示
        socket.addEventListener('message', function (event) {
            const result = event.data;
            document.getElementById('result').innerHTML = 'Result: ' + result;
        });
    });
</script>

<?php
require 'header.php';

// 初期化
$name = $class = $IDM = $student_number = $attendance_number = $password = '';

echo '<div class="form">';
echo '<h1 class="form-title">学生新規登録</h1><br>';

if (isset($_SESSION['err_msg'])) {
    echo '<h3>', $_SESSION['err_msg'], '</h3>';
    $IDM = $_SESSION['IDM'];
    $name = $_SESSION['name'];
    $class = $_SESSION['class'];
    $student_number = $_SESSION['student_number'];
    $attendance_number = $_SESSION['attendance_number'];
    $password = $_SESSION['password'];
}

?>

<form id="nfcForm" action="students_regist.php" method="POST">
    <input type="submit" name="nfcForm" value="IDM読み取り">
</form>

<div id="result"></div>

<?php

if (isset($_POST['nfcForm'])) {
    // JavaScriptから呼び出すために変数を用意
    echo '<script>';
    echo 'var command = "C:\\xampp\\htdocs\\AttendEZtest\\NFC_CARD_READING.py";'; // Pythonのパスとスクリプトの絶対パスを指定
    echo '</script>';
}

echo '<form action="students_regist_output.php" method="post">';
echo '<table class="form-table">';
echo '<tr><th class="form-item">登録カードIDM:</th><td class="form-body">';
echo '<input type="text" id="IDM" name="IDM" class="form-text" autocomplete="IDM" value="', $IDM, '">';
echo '</td>';
echo '<tr><th class="form-item">学籍番号:</th><td class="form-body">';
echo '<input type="text" id="student_number" name="student_number" class="form-text" autocomplete="student_number" required value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">クラス:</th><td class="form-body">';
echo '<input type="text" id="class" name="class" class="form-text" autocomplete="class" required value="', $class, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">出席番号:</th><td class="form-body">';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" class="form-text" required value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">氏名:</th><td class="form-body">';
echo '<input type="text" id="name" autocomplete="name" name="name" class="form-text" required value="', $name, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">パスワード:</th><td class="form-body">';
echo '<input type="password" id="password" autocomplete="password" name="password" class="form-text" required value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" name="registform" class="form-submit" value="確認へ">';
echo '</form>';
echo '</div>';
?>

<?php require 'footer.php';?>
