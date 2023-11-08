<?php require 'header.php'; ?>
<form action="question_regist_confirm.php" method="post">
<table>
問題文
<input type="text" name="question">
<br>
解答群
<div>ア：<input type="text" name="ans1"></div>
<div>イ：<input type="text" name="ans2"></div>
<div>ウ：<input type="text" name="ans3"></div>
<div>エ：<input type="text" name="ans4"></div>
正答：<input type="text" name="answer"><br>
<input type="submit" value="確認へ">
</table>
</form>
<?php require 'footer.php'; ?>