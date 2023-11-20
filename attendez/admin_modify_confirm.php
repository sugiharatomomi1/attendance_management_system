
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_modify">
  管理者登録情報変更確認画面
<?php
$name=$class=$mailadress=$password=$newpassword=$newpassword2=$phone_number='';

if(isset($_SESSION['myapp_admin_info'])){
    $name=$_SESSION['myapp_admin_info']['name'];
    $class=$_SESSION['myapp_admin_info']['class'];
    $mailadress=$_SESSION['myapp_admin_info']['mailadress'];
    $phone_number=$_SESSION['myapp_admin_info']['phone_number'];
}
?>
<form action="admin_modify_submit.php" method="post">
  <table>
    <tr>
      <td>担当クラス:</td>
      <td>
        <input type="text" id="class" name="class" autocomplete="class" value="<?= $_SESSION['class'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>氏名:</td>
      <td>
        <input type="text" id="name" name="name" autocomplete="name" value="<?= $_SESSION['name'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>メールアドレス:</td>
      <td>
        <input type="text" id="mailadress" name="mailadress" autocomplete="mailadress" value="<?= $_SESSION['mailadress'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>電話番号:</td>
      <td>
        <input type="text" id="phone_number" name="phone_number" autocomplete="phone_number" value="<?= $_SESSION['phone_number'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>現在のパスワード:</td>
      <td>
        <input type="password" id="password" autocomplete="password" name="password" value="<?= $_SESSION['password'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>新しいパスワード:</td>
      <td>
        <input type="password" id="newpassword" autocomplete="newpassword" name="newpassword" value="<?= $_SESSION['newpassword'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>新しいパスワード再入力:</td>
      <td>
        <input type="password" id="newpassword2" autocomplete="newpassword2" name="newpassword2" value="<?= $_SESSION['newpassword2'] ?>" readonly>
      </td>
    </tr>
  </table>
  <input type="submit" value="更新">
</form>
</div>

  <!-- セッションを保持して戻る -->
  <button type="button" onclick=history.back()>＜前のページへ</button>

<!-- jQueryライブラリの読み込み-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
    $('form').submit(function () {
      const name = $("#name").val();
      const className = $("#class").val();
      const mailadress = $("#mailadress").val();
      const password = $("#password").val();
      const newpassword = $("#newpassword").val();
      const newpassword2 = $("#newpassword2").val();
      const phone_number = $("#phone_number").val();

      if (newpassword !== newpassword2) {
        alert("新しいパスワードが一致していません");
        return false;
      }
      if (!name || !className || !mailadress || !password || 
           !newpassword || !newpassword2 || !phone_number) {
        alert("すべての項目を入力してください。");
        return false;
      }
    });
</script>

<?php require 'footer.php';?>