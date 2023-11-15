<?php require 'header.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>メニュー</title>
</head>
<body>
<h1>メニューを選択してください</h1>
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
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // student_message テーブルから学籍番号とメッセージを取得
    $query = 'SELECT sm.student_number, si.name, sm.text 
              FROM student_message sm
              JOIN students_info si ON sm.student_number = si.student_number';

    $result = $pdo->query($query);

    // 結果セットをループして出力
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $studentNumber = $row['student_number'];
        $name = $row['name'];
        $messageText = $row['text'];

        // 学籍番号を名前の状態に変更して出力
        echo "名前: $name, メッセージ: $messageText<br>";
    }
} catch (PDOException $e) {
    echo 'エラー: ' . $e->getMessage();
}

$pdo = null; // 接続を閉じる
?>
</body>
</html>
<?php require 'footer.php';?>