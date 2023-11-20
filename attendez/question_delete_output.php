<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('delete from question where question_id=?');
if ($sql->execute([$_REQUEST['id']])) {
    echo '<p>問題を削除しました</p>';
} else {
    echo '<p>削除に失敗しました</p>';
}
?>
<?php require 'footer.php'; ?>