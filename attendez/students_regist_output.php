<?php session_start(); ?>
<?php
$_SESSION['err_msg'] = '';
$_SESSION['IDM']=$_REQUEST['IDM'];
$_SESSION['student_number']=$_REQUEST['student_number'];
$_SESSION['class']=$_REQUEST['class'];
$_SESSION['attendance_number']=$_REQUEST['attendance_number'];
$_SESSION['name']=$_REQUEST['name'];
$_SESSION['password'] = $_REQUEST['password'];

$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql = $pdo->prepare('select * from students_info where IDM = ? or student_number = ?');
$sql->execute([$_SESSION['IDM'], $_SESSION['student_mumber']]);

$result = $sql->fetch();

// Check if IDM or student_number already exist in the database
if ($sql->rowCount() > 0) {
    $_SESSION['err_msg'] = 'IDMもしくは学籍番号が重複しています。確認してください。';
    header('Location: students_regist.php');
    exit(); // ここでスクリプトを終了
} else {
    // 確認へ
    header('Location: students_regist_confirm.php');
    exit(); // ここでスクリプトを終了
}
?>
</div>