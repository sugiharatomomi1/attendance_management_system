
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_regist">
    出欠管理システム新規登録
<form action="admin_regist_output.php" methood="post">
<?php
$name=$class=$mailadress=$password='';
if(isset($_SESSION['admin'])){
    $name=$_SESSION['admin']['name'];
    $class=$_SESSION['admin']['class'];
    $mailadress=$_SESSION['admin']['mailadress'];
    $password=$_SESSION['admin']['password'];
}
    echo '<form action="admin_regist_output.php" method="post">';
    echo '<table>';
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
    echo '<input type="submit" value="確定">';
    echo '</form>'; 
echo '</div>';
        ?>
<?php require 'footer.php';?>