<?php require 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>メニュー</title>
</head>
<body>
<h2>メニューを選択してください。</h2>
<ul>
<?php
    $menuItems = array(
        "出欠登録画面" => ".py",
        "現在の出欠状況" => "attend_state.php",
        "出欠情報変更" => "attend_state_modify.php",
        "ログ" => "log.php",
        "休日登録" => "holiday_set.php",
        "学生新規登録" => "students_regist.php",
        "学生登録情報変更" => "students_modify_select.php",
        "問題登録" => "question_regist.php",
        "問題登録情報変更" => "question_modify_select.php",
        "現在の回答状況" => "response_state.php",
        "ランキング" => "rank.php",
        "CSV形式DL" => "csv_dl.php"
    );
 
    foreach ($menuItems as $label => $url) {
        echo '<li><a href="' . $url . '">' . $label . '</a></li>';
    }
    ?>
</ul>
</body>
</html>
<?php require 'footer.php';?>