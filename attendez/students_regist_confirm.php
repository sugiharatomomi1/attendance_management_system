<head>
        <link rel="stylesheet" href="style.css">
</head>
<?php require 'header.php'; ?>
<!--新規会員登録の最終確認画面-->
<div class="form">
    <h1 class="form-title">登録内容に誤りがないかご確認ください</h1>
    <?php
    $IDM = $_SESSION['IDM'];
    $name = $_SESSION['name'];
    $class = $_SESSION['class'];
    $student_number = $_SESSION['student_number'];
    $attendance_number = $_SESSION['attendance_number'];
    $password = $_SESSION['password'];
    
echo '<form action="students_regist_output_submit.php" method="post">';
echo '<table class="form-table">';
echo '<tr><th class="form-item">登録カードIDM:</th><td class="form-body">';
echo '<input type="text" id="IDM" name="IDM" class="form-text" autocomplete="IDM" disabled value="', $IDM, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">学籍番号:</th><td class="form-body">';
echo '<input type="text" id="student_number" name="student_number" class="form-text" autocomplete="student_number" required disabled value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">クラス:</th><td class="form-body">';
echo '<input type="text" id="class" name="class" class="form-text" autocomplete="class" required disabled value="', $class, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">出席番号:</th><td class="form-body">';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" class="form-text" required disabled value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">氏名:</th><td class="form-body">';
echo '<input type="text" id="name" autocomplete="name" name="name" class="form-text" required disabled value="', $name, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">パスワード:</th><td class="form-body">';
echo '<input type="password" id="name" autocomplete="password" name="password" class="form-text" required disabled value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" name="registform" class="form-submit" value="登録">';
echo '</form>';
echo '</div>';
?>
    <a href="students_regist.php">戻る</a>
<?php require 'footer.php';?>