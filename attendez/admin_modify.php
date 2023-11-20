
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_modify">
<?php
$name=$class=$mailadress=$password=$newpassword=$newpassword2=$phone_number='';
if(isset($_SESSION['myapp_admin_info'])){
    $name=$_SESSION['myapp_admin_info']['name'];
    $class=$_SESSION['myapp_admin_info']['class'];
    $mailadress=$_SESSION['myapp_admin_info']['mailadress'];
    $phone_number=$_SESSION['myapp_admin_info']['phone_number'];
}
?>

<div class="form">
<h1 class="form-title">管理者情報変更</h1><br>

<?php
if(isset($_SESSION['error'])){
  echo '<h3 id="error_message">', $_SESSION['error'], '</h3>';
};
?>

<form action="admin_modify_output.php" method="post">
  <table class="form-table">
    <tr>
    <th class="form-item">担当クラス</th>
      <td class="form-body">
        <input type="text" class="form-text" id="class" name="class" autocomplete="class" value="<?= $class ?>">
      </td>
    </tr>
    <tr>
    <th class="form-item">氏名</th>
      <td class="form-body">
        <input type="text" class="form-text" id="name" name="name" autocomplete="name" value="<?= $name ?>">
      </td>
    </tr>
    <tr>
    <th class="form-item">メールアドレス</th>
      <td class="form-body">
        <input type="email" class="form-text" id="mailadress" name="mailadress" autocomplete="mailadress" value="<?= $mailadress ?>">
      </td>
    </tr>
    <tr>
    <th class="form-item">現在のパスワード</th>
      <td class="form-body">
        <div class="password-container">
        <input type="password" class="form-text" id="passwordInput1" autocomplete="password" name="password" value=""><button type="button" id="showPasswordButton1">表示</button>
        </div>
      </td>
    </tr>
    <tr>
    <th class="form-item">新しいパスワード</th>
      <td class="form-body">
        <div class="password-container">
        <input type="password" class="form-text" id="passwordInput2" autocomplete="newpassword" name="newpassword" value="<?= $newpassword ?>"><button type="button" id="showPasswordButton2">表示</button>
        </div>
      </td>
    </tr>
    <tr>
    <th class="form-item">新しいパスワード再入力</th>
      <td class="form-body">
        <div class="password-container">
        <input type="password" class="form-text" id="passwordInput3" autocomplete="newpassword2" name="newpassword2" value="<?= $newpassword2 ?>"><button type="button" id="showPasswordButton3">表示</button>
        </div>
      </td>
    </tr>
    <tr>
    <th class="form-item">電話番号</th>
      <td class="form-body">
        <input type="text" class="form-text" id="phone_number" autocomplete="phone_number" name="phone_number" value="<?= $phone_number ?>">
      </td>
    </tr>
  </table>
  <input class="form-submit" type="submit" value="確認画面へ">
</form>
</div>
<p><a href="admin_delete.php" class="form-submit" style="color:red">アカウント削除</a></p>

<!-- jQueryライブラリの読み込み-->
<script>

    var showPasswordButton = document.getElementById("showPasswordButton1");
    showPasswordButton.addEventListener("click", togglePasswordVisibility1);

    function togglePasswordVisibility1() {
        var passwordInput = document.getElementById("passwordInput1");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.textContent = "非表示";
        } else {
            passwordInput.type = "password";
            showPasswordButton.textContent = "表示";
        }
    }

    var showPasswordButton = document.getElementById("showPasswordButton2");
    showPasswordButton.addEventListener("click", togglePasswordVisibility2);

    function togglePasswordVisibility2() {
        var passwordInput = document.getElementById("passwordInput2");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.textContent = "非表示";
        } else {
            passwordInput.type = "password";
            showPasswordButton.textContent = "表示";
        }
    }
    var showPasswordButton = document.getElementById("showPasswordButton3");
    showPasswordButton.addEventListener("click", togglePasswordVisibility3);

    function togglePasswordVisibility3() {
        var passwordInput = document.getElementById("passwordInput3");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.textContent = "非表示";
        } else {
            passwordInput.type = "password";
            showPasswordButton.textContent = "表示";
        }
    }

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