
<?php require 'header.php'; ?>
<!--セッションに格納-->
<div class="studennts_regist_output">

<?php

if(isset($_REQUEST['IDM'])){
    $_SESSION['IDM']=$_REQUEST['IDM'];
}
if(isset($_REQUEST['student_number'])){
    $_SESSION['student_number']=$_REQUEST['student_number'];
}
if(isset($_REQUEST['class'])){
    $_SESSION['class']=$_REQUEST['class'];
}
if(isset($_REQUEST['attendance_number'])){
    $_SESSION['attendance_number']=$_REQUEST['attendance_number'];
}
if(isset($_REQUEST['name'])){
    $_SESSION['name']=$_REQUEST['name'];
}
header('Location: http://192.168.104.88/2023/attendez/students_regist_output_confirm.php');
//戻す
exit();
?>
<?php require 'footer.php';?>