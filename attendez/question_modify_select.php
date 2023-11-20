<?php require 'header.php'; ?>
<table>
<tr><th>問題番号</th><th>問題</th><th>解答</th><th></th><th></th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->query('select * from question');
foreach ($sql as $row) {
    $id=$row['question_id'];
    echo '<tr>';
    echo '<td>';
    if ($id < 10) {
        echo '000', $id;
    } elseif ($id < 100) {
        echo '00', $id;
    } elseif ($id < 1000) {
        echo '0', $id;
    } else {
        echo $id;
    }
    echo '</td>';
    echo '<td>', $row['question'], '</td>';
    echo '<td>', $row['question_answer'], '</td>';
    echo '<td>';
    echo '<a href="question_modify.php?id=', $row['question_id'], '">', '編集',  '</a>';
    echo '</td>';
    echo '<td>';
    echo '<a href="question_delete.php?id=', $row['question_id'], '">', '削除',  '</a>';
    echo '</td>';
    echo '</tr>';
}
?>
</table>
<?php require 'footer.php'; ?>