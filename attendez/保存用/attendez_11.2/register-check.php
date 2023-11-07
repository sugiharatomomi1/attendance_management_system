<?php 
header("Cache-Control: private");
session_cache_limiter('none');
session_start();?>

<!--新規会員登録の選択画面-->
<?php require 'header.php'; ?>
<?php
$_SESSION['id']=$_REQUEST['id'];
$_SESSION['class']=$_REQUEST['class'];
$_SESSION['name']=$_REQUEST['name'];
$_SESSION['mail']=$_REQUEST['mail'];
$_SESSION['password']=$_REQUEST['password'];
?>
<div class="register-check">
    出欠管理システム新規登録
<form action="register-.php" methood="post">
学校ID:<?php $_SESSION['id']?><br>
担当クラス:<?php $_SESSION['class']?><br>
氏名:<?php $_SESSION['name']?><br>
メールアドレス:<?php $_SESSION['mail']?><br>
パスワード:<?php $_SESSION['password']?><br>
    <input type="submit" value="登録する"/>
   <a href="login.php">ログイン</a>
</div>
</form>
<?php require 'footer.php';?>