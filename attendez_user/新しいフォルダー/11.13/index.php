<?php
if(isset($_SESSION['id']['mailadress'])){//データベースからの名前チェック？
    header('Location: http://192.168.104.88/2023/attendez/admin_regist.php');
           //ログインされていなかったら、新規会員登録画面へ
     exit();
 }
?>
<?php require 'header.php'; ?>
<!--ログイン画面-->

<div class="login">
    出欠管理システム(学生用)
<form action="login_output.php" methood="post">
ログインID:<input type="text" name="student_number"><br>
パスワード:<input type="password" name="password"><br>
    <input type="submit" value="ログイン"/><br>
    </div>
</form>

<?php require 'footer.php';?>
