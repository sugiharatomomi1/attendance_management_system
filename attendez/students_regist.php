
<?php require 'header.php'; ?>
<!--生徒の新規会員登録の画面-->
<div class="student_regist">
生徒の新規会員登録<br>
端末にカードをタッチしてください
<form action="student_regist.php" methood="post">
<?php
$name=$class=$mailadress=$password='';
if(isset($_SESSION['student'])){
    $IDM=$_SESSION['student']['IDM'];
    $student_number=$_SESSION['student']['student_number'];
    $class=$_SESSION['student']['class'];
    $attendance_number=$_SESSION['student']['attendance_number'];
    $name=$_SESSION['student']['name'];
}
    echo '<form action="student_regist_output.php" method="post">';
    echo '<table>';
    echo '<tr><td>登録カードIDM:</td><td>';
    echo '<input type="text" id="IDM" name="IDM" autocomplete="IDM" value="', $IDM, '">';
    echo '</td></tr>';
    echo '<tr><td>学籍番号:</td><td>';
    echo '<input type="text" id="student_number" name="student_number" autocomplete="student_number" value="', $student_number, '">';
    echo '</td></tr>';
    echo '<tr><td>クラス:</td><td>';
    echo '<input type="text" id="class" name="class" autocomplete="class" value="', $class, '">';
    echo '</td></tr>';
    echo '<tr><td>出席番号:</td><td>';
    echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" value="', $attendance_number, '">';
    echo '</td></tr>';
    echo '<tr><td>氏名:</td><td>';
    echo '<input type="text" id="name" autocomplete="name" name="name" value="', $name, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="確認へ">';
    echo '</form>'; 
echo '</div>';
        ?>
<?php require 'footer.php';?>