<?php require 'header.php'; ?>
<p>本当にこの問題を削除してもよろしいですか</p
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('select * from question where question_id=?');
$sql->execute([$_REQUEST['id']]);
echo '<p>問題文</p>';
foreach ($sql as $row) {
    $id=$row['question_id'];
    echo '<p>', $row['question'], '</p>';
    echo '<tr>';
    echo '<td>ア：', $row['answer_1'], ' </td>';
    echo '<td>イ：', $row['answer_2'], ' </td>';
    echo '<td>ウ：', $row['answer_3'], ' </td>';
    echo '<td>エ：', $row['answer_4'], ' </td>';
    echo '</tr>';
    echo '<p>正答：', $row['question_answer'], '</p>';
    echo '<a href="question_delete_output.php?id=', $id, '">はい</a>';
    echo '<a href="question_modify_select.php?id=', $id, '">いいえ</a>';
}
?>

<?php require 'footer.php'; ?>