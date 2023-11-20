<?php session_start(); ?>
<?php
$_SESSION['err_msg'] = '';
$_SESSION['IDM'] = $_REQUEST['IDM'];
$_SESSION['student_number'] = $_REQUEST['student_number'];
$_SESSION['class'] = $_REQUEST['class'];
$_SESSION['attendance_number'] = $_REQUEST['attendance_number'];
$_SESSION['name'] = $_REQUEST['name'];
$_SESSION['password'] = $_REQUEST['password'];

$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$sql = $pdo->prepare('select * from students_info where IDM = ? or student_number = ?');
$sql->execute([$_SESSION['IDM'], $_SESSION['student_number']]);

$result = $sql->fetch();

// IDMまたはstudent_numberがデータベース内で既に存在するかどうかを確認
if ($sql->rowCount() > 0) {
    $_SESSION['err_msg'] = 'IDMもしくは学籍番号が重複しています。確認してください。';
    header('Location: students_regist.php');
    exit(); // ここでスクリプトを終了
} else {
    // 確認画面へ移動
    header('Location: students_regist_confirm.php');
    exit(); // ここでスクリプトを終了
}
?>
</div>
