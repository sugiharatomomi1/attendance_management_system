<?php session_start(); ?>
<?php
$_SESSION['err_msg'] = '';
$_SESSION['IDM']=htmlspecialchars($_REQUEST['IDM']);
$_SESSION['student_number']=htmlspecialchars($_REQUEST['student_number']);
$_SESSION['class']=htmlspecialchars($_REQUEST['class']);
$_SESSION['attendance_number']=htmlspecialchars($_REQUEST['attendance_number']);
$_SESSION['name']=htmlspecialchars($_REQUEST['name']);

$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8','root','');
$sql = $pdo->prepare('select * from students_info where IDM = ? and name = ?');
$sql->execute([$_SESSION['IDM'], $_SESSION['name']]);

$result = $sql->fetch();

if ($result === false) {
    header('Location: http://192.168.104.88/2023/attendez/students_regist_confirm.php');
} else {
    $_SESSION['err_msg'] = "IDMもしくは氏名が重複しています。確認してください。";
    header('Location: http://192.168.104.88/2023/attendez/students_regist.php');
}
?>
</div>