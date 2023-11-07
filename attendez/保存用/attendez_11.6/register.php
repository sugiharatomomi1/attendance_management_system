<!--新規会員登録の選択画面-->
<?php require 'header.php'; ?>

<div class="register">
    出欠管理システム新規登録
<form action="register-check.php" methood="post">
学校ID:<input type="text" name="id"><br>
担当クラス:<input type="text" name="class"><br>
氏名:<input type="text" name="name"><br>
メールアドレス:<input type="text" name="mail"><br>
パスワード:<input type="password" name="password"><br>
    <input type="submit" value="確認"/>
   <a href="login.php">ログイン</a>
</div>
</form>
<?php require 'footer.php';?>