
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_regist_output">

<?php

if(isset($_REQUEST['name'])){
    $_SESSION['name']=$_REQUEST['name'];
}
if(isset($_REQUEST['class'])){
    $_SESSION['class']=$_REQUEST['class'];
}
if(isset($_REQUEST['mailadress'])){
    $_SESSION['mailadress']=$_REQUEST['mailadress'];
}
if(isset($_REQUEST['password'])){
    $_SESSION['password']=$_REQUEST['password'];
}
if(isset($_REQUEST['password2'])){
    $_SESSION['password2']=$_REQUEST['password2'];
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
<?php require 'footer.php';?>