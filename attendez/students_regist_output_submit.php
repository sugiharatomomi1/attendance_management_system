<?php require 'header.php'; ?>
<!--新規会員登録の保存画面-->
<div class="student_regist_output_submit">
<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from students_info
                    where IDM=? and name=?');//ログインとパスワードが完全一致か？
 if(isset($_SESSION['student'])){
    $id=$_SESSION['student']['id'];
    $sql=$pdo->prepare('select * from students_info where id!=? and name=?');
    $sql->execute([$id, htmlspecialchars($_SESSION['name'])]);
}else{
    $sql=$pdo->prepare('select * from students_info where name=?');
    $sql->execute([htmlspecialchars($_SESSION['name'])]);
}//重複確認？

if(empty($sql->fetchAll())){
    $sql=$pdo->prepare('insert into students_info values(null,?,?,?,?,?,?)');
    $sql->execute([htmlspecialchars($_SESSION['IDM']),  htmlspecialchars($_SESSION['student_number']),
     htmlspecialchars($_SESSION['class']),
    htmlspecialchars($_SESSION['attendance_number']),htmlspecialchars($_SESSION['name']),htmlspecialchars($_SESSION['password'])]);
    echo '<p>登録が完了しました</p>';
    echo '<p><a href="students_regist.php">他の生徒を登録する</a></p>';
}else{
    $_SESSION['err_msg'] = '何らかの問題で登録に失敗しました。';
    echo '<p><a href="students_regist.php">学生新規登録画面へ</a></p>';
}
?>
<?php require 'footer.php';?>