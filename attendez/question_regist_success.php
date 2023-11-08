<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('insert into question values(null, ?, ?, ?, ?, ?, ?)');
if (empty($_REQUEST['question'])) {
    echo '問題を入力してください';
} else
if (empty($_REQUEST['answer'])) {
    echo '正答を入力してください';
} else
if (empty($_REQUEST['ans1']) && empty($_REQUEST['ans2']) && empty($_REQUEST['ans3']) && empty($_REQUEST['ans4'])) {
    echo '解答群を入力してください';
} else
if ($sql->execute([htmlspecialchars($_REQUEST['question']), htmlspecialchars($_REQUEST['answer']), htmlspecialchars($_REQUEST['ans1']),
    htmlspecialchars($_REQUEST['ans2']), htmlspecialchars($_REQUEST['ans3']), htmlspecialchars($_REQUEST['ans4'])]
)) {
    echo '問題を追加しました';
} else {
    echo '追加に失敗しました';
}
?>
<?php require 'footer.php'; ?>