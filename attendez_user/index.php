<link rel="stylesheet" href="style.css">
<?php
// if(isset($_SESSION['students_info']['id'])){//データベースからの名前チェック？
//     header('Location: http://192.168.104.88/2023/attendez_user/today_question.php');
//            //ログインされていなかったら、新規会員登録画面へ
//      exit();
//  }
?>

<!--ログイン画面-->

<div class="login">
    <h1 id="login-title">出欠管理システム(学生用)</h1>
<form action="login_output.php" methood="post">
<p class="id">ログインID : </p>
<input type="text" id="id" name="id"><br>
<p class="password">パスワード：</p>
<input type="password" id="password" name="password"><br>
    <input type="submit" id="login" value="ログイン"/><br>
    </div>
</form>