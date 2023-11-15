
<?php session_start(); ?>
<!--新規会員登録の選択画面-->
<div class="admin_regist_output">

<?php
if(isset($_POST['school_id'])){
  $_SESSION['school_id'] =$_POST['school_id'];
}
if(isset($_POST['name'])){
    $_SESSION['name']=$_POST['name'];
}
if(isset($_POST['class'])){
    $_SESSION['class']=$_POST['class'];
}
if(isset($_POST['mailadress'])){
    $_SESSION['mailadress']=$_POST['mailadress'];
}
if(isset($_POST['phone_number'])){
    $_SESSION['phone_number']=$_POST['phone_number'];
}
if(isset($_POST['password'])){
    $_SESSION['password']=$_POST['password'];
}
if(isset($_POST['password2'])){
    $_SESSION['password2']=$_POST['password2'];
}
if(isset($_POST['secret_question1'])){
    $_SESSION['secret_question1']=$_POST['secret_question1'];
}
if(isset($_POST['secret_question2'])){
    $_SESSION['secret_question2']=$_POST['secret_question2'];
}
if(isset($_POST['secret_question3'])){
    $_SESSION['secret_question3']=$_POST['secret_question3'];
}

if($_SESSION['password'] === $_SESSION['password2']){
    header('Location: http://192.168.104.88/2023/attendez/admin_regist_output_confirm.php');
           //パスワードが合っていたら、確認ページへ
    exit();
}else{
    header('Location: http://192.168.104.88/2023/attendez/admin_regist.php');
    //パスワードが違っていたら、登録ページへ
exit();
}

?>