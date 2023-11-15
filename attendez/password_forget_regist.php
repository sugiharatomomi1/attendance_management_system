<!--セッションの開始-->
<?php session_start(); ?>

<!--パスワードを新しくする画面-->
<div class="password_forget_regist">
    新しいパスワードを入力してください
    <form action="password_forget_regist_output.php" method="post">
        登録しているメールアドレス:
        <?php
            if (isset($_SESSION['mailadress'])) {
                echo $_SESSION['mailadress'];
            }
        ?>
        <br>
        新しく登録するパスワード:<input type="password" name="new_password"><br>
        新しく登録するパスワード再入力:<input type="password" name="password2"><br>
        <input type="submit" value="送信"><br>
    </form>
</div>

<!-- jQueryライブラリの読み込み-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('form').submit(function () {
        //値を読み取っている
        const new_password = $("input[name='new_password']").val();
        const password2 = $("input[name='password2']").val();
        if (new_password === ''|| password2 === ''){
            alert("すべての項目を入力してください");
            return false; // フォームの送信を停止
        }
        if (new_password !== password2) {
            alert("パスワードが一致していません");
            return false; // フォームの送信を停止
        }
    });
</script>
<?php require 'footer.php'; ?>
