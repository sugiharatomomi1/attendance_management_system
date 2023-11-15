<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->prepare('select * from question where question_id=?');
$sql->execute([$_REQUEST['id']]);
echo '<h3>この問題を削除してもよろしいですか</h3>';
//問題を表示
foreach ($sql as $row) {
    echo '<p>問題番号：', $row['question_id'], '</p>';
    echo '<input type="hidden" name="id" value="', $row['question_id'], '">';
    echo '<input type="text" name="question" value="', $row['question'], '">';
    echo '<br>';
    echo 'ア：<input type="text" name="ans1" value="', $row['answer_1'], '">';
    echo 'イ：<input type="text" name="ans2" value="', $row['answer_2'], '">';
    echo 'ウ：<input type="text" name="ans3" value="', $row['answer_3'], '">';
    echo 'エ：<input type="text" name="ans4" value="', $row['answer_4'], '">';
    echo '<br>';
    echo '正答：<input type="text" name="answer" value="', $row['question_answer'], '">';
}
echo '<br>';
//はいで削除、いいえで問題修正画面に戻る
echo '<a href=question_delete_output.php?id=', $_REQUEST['id'], '>はい</a>';
echo '<a href=question_modify.php?id=', $_REQUEST['id'], '>いいえ</a>';
?>
<?php require 'footer.php'; ?>