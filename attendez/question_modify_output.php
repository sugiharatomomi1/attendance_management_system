<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('update question set question=?, question_answer=?, answer_1=?, answer_2=?, answer_3=?, answer_4=? where question_id=?');
if (empty($_REQUEST['question'])) {
    echo '問題を入力してください';
} else
if (empty($_REQUEST['answer'])) {
    echo '正答を入力してください';
} else
if ($_REQUEST['answer'] != "ア" && $_REQUEST['answer'] != "イ" && $_REQUEST['answer'] != "ウ" && $_REQUEST['answer'] != "エ") {
    echo '正答はア～エで入力してください';
} else
if (empty($_REQUEST['ans1']) && empty($_REQUEST['ans2']) && empty($_REQUEST['ans3']) && empty($_REQUEST['ans4'])) {
    echo '解答群を入力してください';
} else

if ($sql->execute([htmlspecialchars($_REQUEST['question']), htmlspecialchars($_REQUEST['answer']), htmlspecialchars($_REQUEST['ans1']),
    htmlspecialchars($_REQUEST['ans2']), htmlspecialchars($_REQUEST['ans3']), htmlspecialchars($_REQUEST['ans4']), $_REQUEST['id']]
)) {
    echo '問題を更新しました';
} else {
    echo '更新に失敗しました';
}
?>
<?php require 'footer.php'; ?>