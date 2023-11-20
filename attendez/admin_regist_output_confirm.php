<head>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<?php session_start(); ?>
<!--新規会員登録の最終確認画面-->
<div class="form">
    <h1 class="form-title">登録内容に誤りがないかご確認ください</h1>

<form action="admin_regist_submit_output.php" method="post">
    <table class="form-table">
    <tr>
            <th class="form-item">学校ID:</th>
            <td class="form-body">
                <input type="text" id="school_id" name="school_id" class="form-text" autocomplete="school_id" disabled value="<?php echo $_SESSION['school_id']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">氏名:</th>
            <td class="form-body">
                <input type="text" id="name" name="name" class="form-text" autocomplete="name" disabled value="<?php echo $_SESSION['name']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">担当クラス:</th>
            <td class="form-body">
                <input type="text" id="class" name="class" class="form-text" autocomplete="class" disabled value="<?php echo $_SESSION['class']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">メールアドレス:</th>
            <td class="form-body">
                <input type="email" id="mailadress" name="mailadress" class="form-text" autocomplete="mailadress" disabled value="<?php echo $_SESSION['mailadress']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">電話番号:</th>
            <td class="form-body">
                <input type="text" id="phone_number" autocomplete="phone_number" name="phone_number" class="form-text" disabled value="<?php echo $_SESSION['phone_number']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">パスワード:</th>
            <td class="form-body">
                <input type="password" id="password" autocomplete="password" name="password" class="form-text"  disabled value="<?php echo $_SESSION['password']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問1.母親の旧姓は？:</th>
            <td class="form-body">
                <input type="text" id="secret_question1" autocomplete="secret_question1" name="secret_question1" class="form-text" disabled value="<?php echo $_SESSION['secret_question1']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問2.初めて飼ったペットの名前は？</th>
            <td class="form-body">
                <input type="text" id="secret_question2" autocomplete="secret_question2" name="secret_question2" class="form-text" disabled value="<?php echo $_SESSION['secret_question2']; ?>">
            </td>
        </tr>
        <tr>
            <th class="form-item">秘密の質問3.好きな映画は？:</th>
            <td class="form-body">
                <input type="text" id="secret_question3" autocomplete="secret_question3" name="secret_question3" class="form-text" disabled value="<?php echo $_SESSION['secret_question3']; ?>">
            </td>
        </tr>
        
    </table>
    <input class="form-submit" type="submit" value="登録する">
</form>


  <!-- セッションを保持して戻る -->
  <button type="button" onclick=history.back()>＜前のページへ</button>
</body>