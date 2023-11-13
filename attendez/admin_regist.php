<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_regist">
    出欠管理システム新規登録
<?php
 $school_id=$name=$class=$mailadress=$password='';
if(isset($_SESSION['admin'])){
    $school_id=$_SESSION['admin']['school_id'];
    $name=$_SESSION['admin']['name'];
    $class=$_SESSION['admin']['class'];
    $mailadress=$_SESSION['admin']['mailadress'];
    $password=$_SESSION['admin']['password'];
}
    echo '<form action="admin_regist_output.php" method="post">';
    echo '<table>';
    echo '<tr><td>学校ID:</td><td>';
    echo '<input type="text" id="school_id" name="school_id" autocomplete="school_id" value="', $school_id, '">';
    echo '</td></tr>';
    echo '<tr><td>氏名:</td><td>';
    echo '<input type="text" id="name" name="name" autocomplete="name" value="', $name, '">';
    echo '</td></tr>';
    echo '<tr><td>担当クラス:</td><td>';
    echo '<input type="text" id="class" name="class" autocomplete="class" value="', $class, '">';
    echo '</td></tr>';
    echo '<tr><td>メールアドレス:</td><td>';
    echo '<input type="text" id="mailadress" name="mailadress" autocomplete="mailadress" value="', $mailadress, '">';
    echo '</td></tr>';
    echo '<tr><td>パスワード:</td><td>';
    echo '<input type="password" id="password" autocomplete="password" name="password" value="', $password, '">';
    echo '</td></tr>';
    echo '<tr><td>パスワード再入力:</td><td>';
    echo '<input type="password" id="password2" autocomplete="password2" name="password2" value="', $password, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="確認画面へ">';
    echo '</form>'; 
    echo '</div>';
?>
<!-- jQueryライブラリの読み込み-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
$('form').submit(function() {
  const school_id = $("#school_id").val();
  const name = $("#name").val();    //値を読み取っている
  const className = $("#class").val();
  const mailadress = $("#mailadress").val();
  const password = $("#password").val();
  const password2 = $("#password2").val();
  if (password != password2) {
    alert("パスワードが一致していません");
  }

  if (!school_id || !name || !className || !mailadress ) {
    alert("すべての項目を入力してください。");
    return false; // フォームの送信を停止
  }
});
</script>

