<?php require 'header.php'; ?>
<h1>登録内容に誤りがないかご確認ください</h1>
<?php
echo '<form action="question_modify_output.php" medhod="post">';
//入力情報の表示
echo '<p>問題番号：', $_REQUEST['id'], '</p>';
echo '<p>', htmlspecialchars($_REQUEST['question']), '</p>';
echo '<tr>';
echo '<td>ア：', htmlspecialchars($_REQUEST['ans1']), ' </td>';
echo '<td>イ：', htmlspecialchars($_REQUEST['ans2']), ' </td>';
echo '<td>ウ：', htmlspecialchars($_REQUEST['ans3']), ' </td>';
echo '<td>エ：', htmlspecialchars($_REQUEST['ans4']), ' </td>';
echo '</tr>';
echo '<p>正答：',htmlspecialchars($_REQUEST['answer']), '</p>';
//入力情報の受け渡しデータ格納場所
echo '<input type="hidden" name="id" value="', $_REQUEST['id'], '">';
echo '<input type="hidden" name="question" value="',  $_REQUEST['question'], '">';
echo '<input type="hidden" name="ans1" value="', $_REQUEST['ans1'], '">';
echo '<input type="hidden" name="ans2" value="', $_REQUEST['ans2'], '">';
echo '<input type="hidden" name="ans3" value="', $_REQUEST['ans3'], '">';
echo '<input type="hidden" name="ans4" value="', $_REQUEST['ans4'], '">';
echo '<input type="hidden" name="answer" value="', $_REQUEST['answer'], '">';
echo '<input type="submit" value="この問題を更新する">';
echo '</form>';
?>
<?php require 'footer.php'; ?>