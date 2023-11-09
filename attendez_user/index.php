<?php require 'header.php'; ?>

<!--ログイン画面-->

<div class="login">
    出欠管理システム（学生用）
<form action="login-output.php" methood="post">
ログインID:<input type="text" name="id"><br>
パスワード:<input type="password" name="password"><br>
    <input type="submit" value="ログイン"/><br>
    </div>
</form>
<?php require 'footer.php';?>
