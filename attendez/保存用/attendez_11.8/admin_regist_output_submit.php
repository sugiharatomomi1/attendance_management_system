
<?php require 'header.php'; ?>
<!--新規会員登録の保存画面-->
<div class="admin_regist_output_submit">
<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from admin 
                    where mailadresss=? and password=?');//ログインとパスワードが完全一致か？
 if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin']['id'];
    $sql=$pdo->prepare('select * from admin where id!=? and mailadress=?');
    $sql->execute([$id, htmlspecialchars($_SESSION['mailadress'])]);
}else{
    $sql=$pdo->prepare('select * from admin where mailadress=?');
    $sql->execute([htmlspecialchars($_SESSION['mailadress'])]);
}
if(empty($sql->fetchAll())){
    $sql=$pdo->prepare('insert into admin values(null,?,?,?,?)');
    $sql->execute([htmlspecialchars($_SESSION['name']), htmlspecialchars($_SESSION['class']),
    htmlspecialchars($_SESSION['mailadress']), htmlspecialchars($_SESSION['password'])]);
    echo '登録が完了しました';
    echo '<li><a href="index.php">ホーム画面へ</a></li>';
}else{
    echo 'ログイン名が既に使用されていますので、変更してください。';
    echo '<ul class="menu">';
    echo '<li><a href="index.php">ホーム画面へ</a></li>';
    
echo '</ul>';
echo '<li><button type="button" onclick=history.back()>＜前のページへ</button></li>';
}
?>
<?php require 'footer.php';?>