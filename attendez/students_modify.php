<?php
require 'header.php';

$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');

// 学生の情報をデータベースから取得
$sql = $pdo->prepare('SELECT * FROM students_info WHERE student_number = ?');

try {
    $sql->execute([$_REQUEST['id']]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('エラー: ' . $e->getMessage());
}

// セッションに保存されたデータを取得
if (isset($_SESSION['students_info']['name'])) {
    $IDM = $_SESSION['students_info']['IDM'];
    $studentNumber = $_SESSION['students_info']['student_number'];
    $class = $_SESSION['students_info']['class'];
    $attendanceNumber = $_SESSION['students_info']['attendance_number'];
    $name = $_SESSION['students_info']['name'];
    $password = $_SESSION['students_info']['password'];
}else{
    $IDM = $row['IDM'];
    $studentNumber = $row['student_number'];
    $class = $row['class'];
    $attendanceNumber = $row['attendance_number'];
    $name = $row['name'];
    $password = $row['password'];
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
// フォームを表示
?>
<div class="form">
<h1 class="form-title">学生情報変更</h1><br>

<form action="students_regist.php" method="POST">
    <input type="submit" name="idm_reading" class="form-submit" value="IDM読み取り">
</form>

<form action="students_modify_confirm.php" method="post">
    <table class="form-table">
        <tr>
            <th class="form-item">登録カードIDM</th>
            <td class="form-body"><input type="text" class="form-text" name="IDM" value="<?= htmlspecialchars($IDM) ?>"></td>
        </tr>
        <tr>
            <th class="form-item">学籍番号</th>
            <td class="form-body"><input type="text" class="form-text" name="student_number" value="<?= htmlspecialchars($studentNumber) ?>"></td>
        </tr>
        <tr>
            <th class="form-item">クラス</th>
            <td class="form-body"><input type="text" class="form-text" name="class" value="<?= htmlspecialchars($class) ?>"></td>
        </tr>
        <tr>
            <th class="form-item">出席番号</th>
            <td class="form-body"><input type="text" class="form-text" name="attendance_number" value="<?= htmlspecialchars($attendanceNumber) ?>"></td>
        </tr>
        <tr>
            <th class="form-item">氏名</th>
            <td class="form-body"><input type="text" class="form-text" name="name" value="<?= htmlspecialchars($name) ?>"></td>
        </tr>
        <tr>
            <div class="password-container">
                <th class="form-item">パスワード</th>
                <td class="form-body"><input type="password" class="form-text" id="passwordInput" name="password" value="<?= htmlspecialchars($password) ?>"><button type="button" id="showPasswordButton">表示</button></td>
            </div>
        </tr>
    </table>
    <input type="submit" class="form-submit" value="確認画面へ">
</form>
</div>

<a href="students_modify_select.php">戻る</a>

<?php require 'footer.php'; ?>