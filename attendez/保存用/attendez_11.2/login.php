<?php
session_start();
?>
<!--ログイン画面-->
<?php require 'header.php'; ?>

<div class="login">
    出欠管理システム新規登録
<form action="login-output.php" methood="post">
学校ID:<input type="text" name="id"><br>
メールアドレス:<input type="text" name="mail"><br>
パスワード:<input type="password" name="password"><br>
    <input type="submit" value="確認"/>
   <a href="login.php">ログイン</a>
</div>
</form>
<?php require 'footer.php';?>