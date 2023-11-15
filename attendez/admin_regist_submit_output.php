<?php session_start(); ?>
<!--新規会員登録の保存画面-->
<div class="admin_regist_submit_output">
<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from myapp_admin_info 
                    where mailadresss=? and password=?');//ログインとパスワードが完全一致か？
 if(isset($_SESSION['myapp_admin_info'])){
    $id=$_SESSION['myapp_admin_info']['id'];
    $sql=$pdo->prepare('select * from myapp_admin_info where id!=? and mailadress=?');
    $sql->execute([$id, htmlspecialchars($_SESSION['mailadress'])]);
}else{
    $sql=$pdo->prepare('select * from myapp_admin_info where mailadress=?');
    $sql->execute([htmlspecialchars($_SESSION['mailadress'])]);
}
if(empty($sql->fetchAll())){
    $sql=$pdo->prepare('insert into myapp_admin_info (`id`, `school_id`, `name`, `class`, 
    `mailadress`, `password`, `phone_number`, `secret_question1`, `secret_question2`, `secret_question3`) 
    values(null,?,?,?,?,?,?,?,?,?)');
    $sql->execute([htmlspecialchars($_SESSION['school_id']),htmlspecialchars($_SESSION['name']), 
    htmlspecialchars($_SESSION['class']),
    htmlspecialchars($_SESSION['mailadress']), htmlspecialchars($_SESSION['phone_number']),
    htmlspecialchars($_SESSION['password']),htmlspecialchars($_SESSION['secret_question1']),
    htmlspecialchars($_SESSION['secret_question2']), htmlspecialchars($_SESSION['secret_question3'])]);
    echo '登録が完了しました';
    unset($_SESSION['school_id'],$_SESSION['phone_number'],$_SESSION['mailadress'],
    $_SESSION['secret_question1'],$_SESSION['password'],$_SESSION['secret_question1'],
    $_SESSION['secret_question2'],$_SESSION['secret_question3']);
    echo '<li><a href="index.php">ログイン画面へ</a></li>';
}else{
    echo 'ログイン名が既に使用されていますので、変更してください。';
    echo '<ul class="menu">';
    echo '<li><a href="index.php">ログイン画面へ</a></li>';
    
echo '</ul>';
echo '<li><button type="button" onclick=history.back()>＜前のページへ</button></li>';
}
?>