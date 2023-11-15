<?php require 'header.php'; ?>
<!--新規会員登録の最終確認画面-->
<div class="student_regist_output_check">
    <?php
    $IDM = $_SESSION['IDM'];
    $name = $_SESSION['name'];
    $class = $_SESSION['class'];
    $student_number = $_SESSION['student_number'];
    $attendance_number = $_SESSION['attendance_number'];
    $password = $_SESSION['password'];
    
echo '<form action="students_regist_output_submit.php" method="post">';
echo '<table>';
echo '<tr><td>登録カードIDM:</td><td>';
echo '<input type="text" id="IDM" name="IDM" autocomplete="IDM" disabled value="', $IDM, '">';
echo '</td>';
echo '<tr><td>学籍番号:</td><td>';
echo '<input type="text" id="student_number" name="student_number" autocomplete="student_number" required disabled value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><td>クラス:</td><td>';
echo '<input type="text" id="class" name="class" autocomplete="class" required disabled value="', $class, '">';
echo '</td></tr>';
echo '<tr><td>出席番号:</td><td>';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" required disabled value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><td>氏名:</td><td>';
echo '<input type="text" id="name" autocomplete="name" name="name" required disabled value="', $name, '">';
echo '</td></tr>';
echo '<tr><td>パスワード:</td><td>';
echo '<input type="password" id="name" autocomplete="password" name="password" required disabled value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" name="registform" value="登録">';
echo '</form>';
echo '</div>';
?>
    <a href="students_regist.php">戻る</a>
<?php require 'footer.php';?>