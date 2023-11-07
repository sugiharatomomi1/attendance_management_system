<?php require 'header.php'; ?>
<!--ログイン画面-->
<?php
if isset($_SESSION['id']['mail']){//データベースからの名前チェック？
    header('Location: http://192.168.104.88/2023/attendez/index.php');
            //ログインされていなかったら、新規会員登録画面へ
    exit();
}
?>
<div class="login">
    出欠管理システム新規登録
<form action="login-output.php" methood="post">
学校ID:<input type="text" name="id"><br>
メールアドレス:<input type="text" name="mail"><br>
パスワード:<input type="password" name="password"><br>
    <input type="submit" value="ログイン"/><br>
    </div>
</form>
    <a href="login.php">パスワード・メールアドレスを忘れた場合</a><br>
    <a href="login.php">新規登録</a>

<?php require 'footer.php';?>