<link rel="stylesheet" href="style.css">
<?php
if(isset($_SESSION['myapp_admin_info']['mailadress'])){//データベースからの名前チェック？
    header('Location: http://192.168.104.88/2023/attendez/admin_regist.php');
           //ログインされていなかったら、新規会員登録画面へ
     exit();
 }
?>

<!--ログイン画面-->

<div class="login">
    <h1 id="login-title">出欠管理システム(管理者用)</h1>
<form action="login_output.php" methood="post">
<p class="mailaddress">メールアドレス：</p>
<input type="text" id="mailaddress" name="mailadress"><br>
<p class="password">パスワード：</p>
<input type="password" id="password" name="password"><br>
    <input type="submit" id="login" value="ログイン"/><br>
    </div>
</form>
    <a id="password-forget" href="password_forget.php">パスワードを忘れた場合</a><br>
    <a id="admin-regist" href="admin_regist.php">新規登録</a>
