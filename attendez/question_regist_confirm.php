<?php require 'header.php'; ?>
<h1>登録内容に誤りがないかご確認ください</h1>
<?php
echo '<form action="question_regist_success.php" medhod="post">';
echo '<table>';
echo '<input type="text" name="question" value="', $_REQUEST['question'], '">';
echo '<br>';
echo 'ア：<input type="text" name="ans1" value="', $_REQUEST['ans1'], '">';
echo 'イ：<input type="text" name="ans2" value="', $_REQUEST['ans2'], '">';
echo 'ウ：<input type="text" name="ans3" value="', $_REQUEST['ans3'], '">';
echo 'エ：<input type="text" name="ans4" value="', $_REQUEST['ans4'], '">';
echo '<br>';
echo '正答：<input type="text" name="answer" value="', $_REQUEST['answer'], '">';
echo '<input type="submit" value="この問題を追加する">';
echo '</table>';
echo '</form>';
?>
<?php require 'footer.php'; ?>