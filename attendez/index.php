<link rel="stylesheet" href="login.css">
<?php session_start();

if(isset($_SESSION['errmsg'])) {
    $msg = $_SESSION['errmsg'];
    $_SESSION['errmsg'] = "";
}

?>

<!--ログイン画面-->
<div class="form-wrapper">
  <h1>Attend EZ(管理者ログイン)</h1>
  <form action="login_output.php" method="POST">

    <div class="form-item" id="error_message">
        <?php if(isset($msg)) { 
            echo "$msg";
         } ?>
    </div>

    <div class="form-item">
      <label for="mailadress"></label>
      <input type="email" name="mailadress" required="required" placeholder="メールアドレス"></input>
    </div>
    
    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="パスワード"></input>
    </div>
    
    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="ログイン"></input>
    </div>
  
    </form>
  
    <div class="form-footer">
        <p><a href="admin_regist.php">新規登録</a></p>
        <p><a href="password_forget.php">パスワードをお忘れですか？</a></p>
    </div>
</div>