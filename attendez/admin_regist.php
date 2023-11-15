<!--新規会員登録の選択画面-->
<div class="form">
    <h1 class="form-title">出欠管理システム新規登録</h1>
<?php
$school_id=$name=$class=$mailadress=$phone_number=$password=$password2=$secret_question1=$secret_question2=$secret_question3='';
if(isset($_SESSION['name'])){
    $school_id=$_SESSION['school_id'];
    $name=$_SESSION['name'];
    $class=$_SESSION['class'];
    $mailadress=$_SESSION['mailadress'];
    $phone_number=$_SESSION['phone_number'];
    // $password=$_SESSION['myapp_admin_info']['password'];
    // $secret_question1=$_SESSION['myapp_admin_info']['secret_question1'];
    // $secret_question2=$_SESSION['myapp_admin_info']['secret_question2'];
    // $secret_question3=$_SESSION['myapp_admin_info']['secret_question3'];
}
?>

<form action="admin_regist_output.php" method="post">
    <table class="form-table">
    <tr>
            <th class="form-item">学校ID</th>
            <td class="form-body">
                <input type="text" id="school_id" name="school_id" class="form-text" autocomplete="school_id" value="<?php echo $school_id; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">氏名</th>
            <td class="form-body">
                <input type="text" id="name" name="name" class="form-text" autocomplete="name" value="<?php echo $name; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">担当クラス</th>
            <td class="form-body">
                <input type="text" id="class" name="class" class="form-text" autocomplete="class" value="<?php echo $class; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">メールアドレス</th>
            <td class="form-body">
                <input type="text" id="mailadress" name="mailadress" class="form-text" autocomplete="mailadress" value="<?php echo $mailadress; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">電話番号</th>
            <td class="form-body">
                <input type="text" id="phone_number" name="phone_number" class="form-text" autocomplete="mailadress" value="<?php echo $phone_number; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">パスワード</th>
            <td class="form-body">
                <input type="password" id="password" autocomplete="password" name="password" class="form-text" value="<?php echo $password; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">パスワード再入力</th>
            <td class="form-body">
                <input type="password" id="password2" autocomplete="password2" name="password2" class="form-text" value="<?php echo $password2; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問1.母親の旧姓は？</th>
            <td class="form-body">
                <input type="text" id="secret_question1" autocomplete="secret_question1" name="secret_question1" class="form-text" value="<?php echo $secret_question1; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問2.初めて飼ったペットの名前は？</th>
            <td class="form-body">
                <input type="text" id="secret_question2" autocomplete="secret_question2" name="secret_question2" class="form-text" value="<?php echo $secret_question2; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問3.好きな映画は？</th>
            <td class="form-body">
                <input type="text" id="secret_question3" autocomplete="secret_question3" name="secret_question3" class="form-text" value="<?php echo $secret_question3; ?>">
            </td>
        </tr>
    </table>
    <input class="form-submit" type="submit" value="確認画面へ">
</form>
</div>

<!-- jQueryライブラリの読み込み-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
$('form').submit(function() {
  const name = $("#name").val();    //値を読み取っている
  const className = $("#class").val();
  const mailadress = $("#mailadress").val();
  const password = $("#password").val();
  const password2 = $("#password2").val();
  if (password != password2) {
    alert("パスワードが一致していません");
  }

  if (!name || !className || !mailadress ) {
    alert("すべての項目を入力してください。");
    return false; // フォームの送信を停止
  }
});
</script>