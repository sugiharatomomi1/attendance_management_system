
<?php require 'header.php'; ?>
<!--新規会員登録の保存画面-->
<div class="attend_history.php">
月ごとの出席状況

<?php
//何順？
if(isset($_POST['display'])){
    $student_number=$_POST['display'];
}
//日付
if(isset($_POST['year'])){
    $year=$_POST['year'];
}
if(isset($_POST['month'])){
    $month=$_POST['month'];
}
if(isset($_POST['date'])){
    $date=$_POST['date'];
}
//出席状況確認
if(isset($_POST['situation'])){
    $situation=$_POST['situation'];
}
/*確認
echo $student_number,'<br>';
echo $year,'<br>';
echo $month,'<br>';
echo $date,'<br>';
echo $situation,'<br>';
*/
?>
<?php
/*
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from admin 
                    where mailadresss=? and password=?');//
*/
?>
<?php require 'footer.php';?>