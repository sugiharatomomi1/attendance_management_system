
<?php require 'header.php'; ?>
<!--新規会員登録の保存画面-->
<div class="attend_history.php">
月ごとの出席状況

<?php
//何順？
if(isset($_REQUEST['display'])){
    $student_number=$_REQUEST['display'];
}
//日付
if(isset($_REQUEST['year'])){
    $year=$_REQUEST['year'];
}
if(isset($_REQUEST['month'])){
    $month=$_REQUEST['month'];
}
if(isset($_REQUEST['date'])){
    $date=$_REQUEST['date'];
}
//出席状況確認
if(isset($_REQUEST['situation'])){
    $situation=$_REQUEST['situation'];
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