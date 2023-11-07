<?php require 'header.php'; ?>
<h3>今日の一問</h3>
<form action="question_modify_confirm.php" method="post">

<input type="text" name="question">
<div>ア：<input type="text" name="ans1"></div>
<div>イ：<input type="text" name="ans2"></div>
<div>ウ：<input type="text" name="ans3"></div>
<div>エ：<input type="text" name="ans4"></div>
答えは、<input type="text" name="answer"><br>
<input type="submit" value="確認へ">
</form>
<?php require 'footer.php'; ?>