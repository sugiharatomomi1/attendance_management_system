<?php session_start(); ?>

<!-- パスワードを忘れた場合にメールを送る -->
<div class="password_forget">
    <form action='' method="post">
        メールアドレス:<input type="text" name="mailadress"><br>
        電話番号:<input type="text" name="phone_number"><br>
        秘密の質問1:<input type="text" name="secret_question1"><br>
        秘密の質問2:<input type="text" name="secret_question2"><br>
        秘密の質問3:<input type="text" name="secret_question3"><br>
        <input type="submit" value="送信"/><br>
    </form>
</div>
<a href="index.php">ログインへ</a>
<a href="admin_regist.php">新規登録はこちら</a>

<?php
// メールアドレスを入力して送信した処理
if(isset($_POST['mailadress']) && isset($_POST['phone_number'])
    && isset($_POST['secret_question1']) && isset($_POST['secret_question2'])
    && isset($_POST['secret_question3'])) {

    $mailadress = $_POST['mailadress'];
    $phone_number = $_POST['phone_number'];
    $secret_question1 = $_POST['secret_question1'];
    $secret_question2 = $_POST['secret_question2'];
    $secret_question3 = $_POST['secret_question3'];

    $_SESSION['mailadress']=$_POST['mailadress'];
    $_SESSION['phone_number']=$_POST['phone_number'];
    $_SESSION['secret_question1']=$_POST['secret_question1'];
    $_SESSION['secret_question2']=$_POST['secret_question2'];
    $_SESSION['secret_question3']=$_POST['secret_question3'];

    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', ''); // データベースに接続

    // データベースから対応するユーザー情報を取得
    $query = $pdo->prepare("SELECT * FROM myapp_admin_info WHERE mailadress = :mailadress 
        AND phone_number = :phone_number AND secret_question1 = :secret_question1 
        AND secret_question2 = :secret_question2 AND secret_question3 = :secret_question3 ");
    $query->bindParam(':mailadress', $mailadress);
    $query->bindParam(':phone_number', $phone_number);
    $query->bindParam(':secret_question1', $secret_question1);
    $query->bindParam(':secret_question2', $secret_question2);
    $query->bindParam(':secret_question3', $secret_question3);

    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // パスワードの比較
    if ($user) {
        // 一致した場合、リダイレクト
        header("Location: password_forget_regist.php");
        exit();
    } else {
        // パスワードが一致しない場合の処理
        echo "いずれかの項目が誤っています";
    }
}
?>

<!-- jQueryライブラリの読み込み-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('form').submit(function () {
        // 値を読み取っている
        const mailadress = $("input[name='mailadress']").val();
        const phone_number = $("input[name='phone_number']").val();
        const secret_question1 = $("input[name='secret_question1']").val();
        const secret_question2 = $("input[name='secret_question2']").val();
        const secret_question3 = $("input[name='secret_question3']").val();

        // すべての項目が空でないかを確認
        if (mailadress === '' || phone_number === '' || secret_question1 === '' || secret_question2 === '' || secret_question3 === '') {
            alert("すべての項目を入力してください");
            return false; // フォームの送信を停止
        }
    });
</script>


<?php require 'footer.php';?>
