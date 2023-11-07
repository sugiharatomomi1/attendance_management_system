
<?php require 'header.php'; ?>
<!--新規会員登録の最終確認画面-->
<div class="student_regist_output_check">
    <?php
echo '<form action="student_regist_output_submit.php" method="post">';
echo '<table>';
echo '<tr><td>登録カードIDM:</td><td>';
echo '<input type="text" id="IDM" name="IDM" autocomplete="IDM" value="', $_SESSION['IDM'], '">';
echo '</td></tr>';
echo '<tr><td>学籍番号:</td><td>';
echo '<input type="text" id="student_number" name="student_number" autocomplete="student_number" value="',$_SESSION['student_number'], '">';
echo '</td></tr>';
echo '<tr><td>クラス:</td><td>';
echo '<input type="text" id="class" name="class" autocomplete="class" value="',$_SESSION['class'], '">';
echo '</td></tr>';
echo '<tr><td>出席番号:</td><td>';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" value="',  $_SESSION['attendance_number'], '">';
echo '</td></tr>';
echo '<tr><td>氏名:</td><td>';
echo '<input type="text" id="name" autocomplete="name" name="name" value="',  $_SESSION['name'], '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="登録">';
echo '</form>'; 
echo '</div>';
?>
    <a href="student_regist.php">戻る</a>
<?php require 'footer.php';?>