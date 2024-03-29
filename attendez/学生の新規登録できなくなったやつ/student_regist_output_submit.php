<?php require 'header.php'; ?>
<!--新規会員登録の保存画面-->
<div class="student_regist_output_submit">
<form action="student_regist_output.php" methood="post">
<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from students_info
                    where IDM=? and name=?');//ログインとパスワードが完全一致か？
 if(isset($_SESSION['student'])){
    $id=$_SESSION['student']['id'];
    $sql=$pdo->prepare('select * from student where id!=? and name=?');
    $sql->execute([$id, htmlspecialchars($_SESSION['name'])]);
}else{
    $sql=$pdo->prepare('select * from student where name=?');
    $sql->execute([htmlspecialchars($_SESSION['name'])]);
}
if(empty($sql->fetchAll())){
    $sql=$pdo->prepare('insert into student values(null,?,?,?,?,?)');
    $sql->execute([htmlspecialchars($_SESSION['IDM']),  htmlspecialchars($_SESSION['student_number']),
     htmlspecialchars($_SESSION['class']),
    htmlspecialchars($_SESSION['attendance_number']),htmlspecialchars($_SESSION['name'])]);
    echo '登録が完了しました';
    echo '<li><a href="students_regist.php">ホーム画面へ</a></li>';
}else{
    echo 'ログイン名が既に使用されていますので、変更してください。';
    echo '<ul class="menu">';
    echo '<li><a href="students_regist.php">ホーム画面へ</a></li>';
    
echo '</ul>';

}
?>
<?php require 'footer.php';?>