<?php require 'header.php'; ?>
<!--パスワードを忘れた場合にメールを送る-->

<div class="password_forget">
メールアドレスを入力したらメールにURLが届くので、
そこにアクセスしてパスワードを入力してください。
<form action='' method="post">
メールアドレス:<input type="text" name="mailadress"><br>
    <input type="submit" value="送信"/><br>
    </div>
</form>
<a href="index.php">ログイン</a>
<a href="admin_regist.php">新規登録</a>
<?php
//メールアドレスを入力して送信した処理

 if(isset($_REQUEST['mailadress'])){
    $mailadress=$_REQUEST['mailadress'];
    $_SESSION['mailadress_forget']=$_REQUEST['mailadress'];

$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
'root',''); //データベースに接続
$sql=$pdo->prepare('select * from myapp_admin_info 
    where mailadress=?');//メールアドレスが完全一致か？
    $sql->execute([$mailadress]);
    if ($row = $sql->fetch()) {
      ini_set('SMTP', '192.168.104.88');
      ini_set('smtp_port', 587);
        // パスワードリセット用のセキュアトークンを生成し、このメールアドレスと関連付けたデータベースに保存します。

        // トークンを使用してメールを送信
//         phpinfo();
//         $randomBytes = openssl_random_pseudo_bytes($length);
// // ここで $length は必要なランダムバイト数です。
//         if (function_exists('random_bytes')) {
//           echo 'random_bytes() 関数は使用可能です。';
//       } else {
//           echo 'random_bytes() 関数は使用できません。';
//       }
      
//       if (extension_loaded('libsodium')) {
//           echo 'libsodium 拡張モジュールがロードされています。';
//       } else {
//           echo 'libsodium 拡張モジュールがロードされていません。';
//       }
//         $token = bin2hex(random_bytes(32));
mb_language("Japanese");
mb_internal_encoding("UTF-8");
        $resetLink = 'http://192.168.104.88/2023/attendez/password_forget_regist.php?';
        $message = '新しいパスワードを入力するURLを送ります: ' . $resetLink;
        $headers = "From: mino3698567h@gmail.com";
        mb_send_mail($mailadress, '新しいパスワードを入力するURLを送ります', $message, $headers);

        echo 'パスワードリセットのリンクを送信しました。';
    } else {
        echo 'メールアドレスが見つかりません。';
    }
 }
?>
<!-- jQueryライブラリの読み込み-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
$('form').submit(function() {
//値を読み取っている
  const mailadress = $("#mailadress").val();
  if (mailadress ==='' ) {
    alert("メールアドレス入力してください。");
    return false; // フォームの送信を停止
  }
});
</script>
<?php require 'footer.php';?>