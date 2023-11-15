
<?php session_start(); ?>
<!--新規会員登録の最終確認画面-->
<div class="admin_regist">


<form action="admin_regist_submit_output.php" method="post">
    <table>
    <tr>
            <td>学校ID:</td>
            <td>
                <input type="text" id="school_id" name="school_id" autocomplete="school_id" value="<?php echo $_SESSION['school_id']; ?>">
            </td>
        </tr>
        <tr>
            <td>氏名:</td>
            <td>
                <input type="text" id="name" name="name" autocomplete="name" value="<?php echo $_SESSION['name']; ?>">
            </td>
        </tr>
        <tr>
            <td>担当クラス:</td>
            <td>
                <input type="text" id="class" name="class" autocomplete="class" value="<?php echo $_SESSION['class']; ?>">
            </td>
        </tr>
        <tr>
            <td>メールアドレス:</td>
            <td>
                <input type="text" id="mailadress" name="mailadress" autocomplete="mailadress" value="<?php echo $_SESSION['mailadress']; ?>">
            </td>
        </tr>
        <tr>
            <td>電話番号:</td>
            <td>
                <input type="text" id="phone_number" autocomplete="phone_number" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>">
            </td>
        </tr>
        <tr>
            <td>パスワード:</td>
            <td>
                <input type="password" id="password" autocomplete="password" name="password" value="<?php echo $_SESSION['password']; ?>">
            </td>
        </tr>
        <tr>
            <td>秘密の質問1.母親の旧姓は？:</td>
            <td>
                <input type="text" id="secret_question1" autocomplete="secret_question1" name="secret_question1" value="<?php echo $_SESSION['secret_question1']; ?>">
            </td>
        </tr>
        <tr>
            <td>秘密の質問2.初めて飼ったペットの名前は？</td>
            <td>
                <input type="text" id="secret_question2" autocomplete="secret_question2" name="secret_question2" value="<?php echo $_SESSION['secret_question2']; ?>">
            </td>
        </tr>
        <tr>
            <td>秘密の質問3.好きな映画は？:</td>
            <td>
                <input type="text" id="secret_question3" autocomplete="secret_question3" name="secret_question3" value="<?php echo $_SESSION['secret_question3']; ?>">
            </td>
        </tr>
        
    </table>
    <input type="submit" value="登録する">
</form>


  <!-- セッションを保持して戻る -->
  <button type="button" onclick=history.back()>＜前のページへ</button>
<?php require 'footer.php';?>