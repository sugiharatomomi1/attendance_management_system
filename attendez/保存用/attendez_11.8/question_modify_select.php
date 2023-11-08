<?php require 'header.php'; ?>
<?php
echo'<table>';
echo'<tr><th>問題番号</th><th>問題</th><th>解答</th></tr>';
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->query('select * from question');
foreach ($sql as $row) {
    $id=$row['question_id'];
    echo '<tr>';
    echo '<td>';
    echo '<a href="question_modify.php?id=',$id,'">', $id, '</a>';
    echo '</td>';
    echo '<td>', $row['question'], '</td>';
    echo '<td>', $row['question_answer'], '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>