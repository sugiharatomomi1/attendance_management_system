<link rel="stylesheet" href="style.css">
<?php session_start();

if(isset($_SESSION['errmsg'])) {
    $msg = $_SESSION['errmsg'];
    $_SESSION['errmsg'] = "";
}

?>

<!--ログイン画面-->
    <div class="form-wrapper">
  <h1>Attend EZ(生徒ログイン)</h1>
  <form action="login_output.php" method="POST">

    <div class="form-item" id="error_message">
        <?php if(isset($msg)) { 
            echo "$msg";
         } ?>
    </div>

    <div class="form-item">
      <label for="student_number"></label>
      <input type="text" name="student_number" required="required" placeholder="学籍番号"></input>
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
        <p>パスワードを忘れた場合は担任の先生にお問い合わせください。</p>
    </div>
</div>