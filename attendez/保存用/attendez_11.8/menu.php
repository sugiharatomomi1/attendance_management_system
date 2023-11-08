<?php require 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>メニュー</title>
</head>
<body>
<h1>メニュー</h1>
<ul>
<?php
    $menuItems = array(
        "ログ" => "log.php",
        "学生新規登録" => "students_regist.php",
        "問題登録" => "question_regist.php",
        "CSV形式DL" => "csv_dl.php",
        "出席状況" => "attend_state.php",
        "休日設定" => "holiday_set.php",
        "学生登録情報変更" => "students_modify_select.php",
        "問題の変更・修正" => "question_modify_select.php",
        "出欠情報修正" => "attend_state_modlfy_confirm.php",
        "回答状況" => "response_state.php",
        "ランキング" => "rank.php"
    );
 
    foreach ($menuItems as $label => $url) {
        echo '<li><a href="' . $url . '">' . $label . '</a></li>';
    }
    ?>
</ul>
</body>
</html>
<?php require 'footer.php';?>