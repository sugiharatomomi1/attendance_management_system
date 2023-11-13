<?php require 'header.php'; ?>
<!--パスワードを新しくする画面-->

<?php
$mailadress='';
if(isset($_SESSION['mailadress_forget'])){
    $mailadress=$_SESSION['mailadress_forget'];
}
?>
<div class="password_forget_regist">
   新しいパスワードを入力してください
<form action="password_forget_regist_output.php" method="post">
登録しているメールアドレス:<input type="text" name="mailadress" value="', $mailadress, '"><br>
パスワード:<input type="password" name="password"><br>
パスワード再入力:<input type="password2" name="password2"><br>
    <input type="submit" value="送信"/><br>
    </div>
</form>
<!-- jQueryライブラリの読み込み-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
$('form').submit(function() {
 //値を読み取っている
  const mailadress = $("#mailadress").val();
  const password = $("#password").val();
  const password2 = $("#password2").val();
  if (mailadress === '') {
    alert("メールアドレスを入力してください。");
    return false; // フォームの送信を停止
  }
  if (password != password2) {
    alert("パスワードが一致していません");
  }
});
</script>
<?php require 'footer.php';?>