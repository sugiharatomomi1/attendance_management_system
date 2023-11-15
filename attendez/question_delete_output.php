<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('delete from question where question_id=?');
if ($sql->execute([$_REQUEST['id']])) {
    echo '問題を削除しました';
} else {
    echo '削除に失敗しました';
}
?>
<?php require 'footer.php'; ?>