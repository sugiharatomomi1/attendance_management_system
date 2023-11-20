<head>
        <link rel="stylesheet" href="style.css">
</head>
<!--セッションの開始-->
<?php session_start(); ?>

<!--パスワードを新しくする画面-->
<div class="form">
<h1 class="form-title">新しいパスワードを入力して下さい</h1>
    <form action="password_forget_regist_output.php" method="post">
    <table class="form-table">
        <tr>
            <th class="form-item">登録しているメールアドレス</th>
            <td class="form-body">
            <?php
                if (isset($_SESSION['mailadress'])) {
                    echo $_SESSION['mailadress'];
                }
            ?></td>
        </tr>
        <tr>
            <th class="form-item">新しく登録するパスワード</th>
            <td class="form-body">
                <input type="password" name="new_password" class="form-text">
            </td>
        </tr>
        <tr>
            <th class="form-item">新しく登録するパスワード再入力</th>
            <td class="form-body">
                <input type="password" name="password2" class="form-text">
            </td>
        </tr>
    </table>
        <input type="submit" class="form-submit" value="送信"><br>
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

