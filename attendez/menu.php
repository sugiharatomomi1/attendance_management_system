<?php require 'header.php'; ?>
<h1>メニューを選択してください</h1>
<ul>
<?php
    $menuItems = array(
        "出欠登録画面" => "",
        "出欠状況" => "attend_state.php",
        "出欠情報修正" => "attend_state_modify.php",
        "ログ" => "log.php",
        "休日登録" => "holiday_set.php",
        "学生新規登録" => "students_regist.php",
        "学生登録情報変更" => "students_modify_select.php",
        "問題登録" => "question_regist.php",
        "問題登録情報変更" => "question_modify_select.php",
        "回答状況" => "response_state.php",
        "ランキング" => "rank.php",
        "管理者登録情報変更" => "admin_modify.php"
    );
 
    foreach ($menuItems as $label => $url) {
        echo '<li><a href="' . $url . '">' . $label . '</a></li>';
    }
    ?>
</ul>
<?php
//トライの部分はデータベースから連絡事項などを表示させている。
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // student_message テーブルから学籍番号とメッセージを取得
    $query = 'SELECT sm.student_number, si.name, sm.text, sm.datetime
              FROM student_message sm
              JOIN students_info si ON sm.student_number = si.student_number
              ORDER BY sm.datetime DESC';  // 日付が今日に近い順に並び替え

    $result = $pdo->query($query);

    // 結果セットをループして出力
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $studentNumber = $row['student_number'];
        $name = $row['name'];
        $messageText = $row['text'];
        $datetime = $row['datetime'];

        // myapp_attendstatus テーブルから status を取得
        $queryStatus = 'SELECT status FROM myapp_attendstatus 
                        WHERE student_number = :student_number';

        $stmtStatus = $pdo->prepare($queryStatus);
        $stmtStatus->bindParam(':student_number', $studentNumber, PDO::PARAM_STR);
        $stmtStatus->execute();

        $rowStatus = $stmtStatus->fetch(PDO::FETCH_ASSOC);
        $status = $rowStatus ? $rowStatus['status'] : '情報なし';

        // 学籍番号を名前の状態に変更して出力
        echo $datetime, '<br>', $name, ':', $status, '<br>', $messageText, '<br><br>';
    }
} catch (PDOException $e) {
    echo 'エラー: ' . $e->getMessage();
}

$pdo = null; // 接続を閉じる
?>
<?php require 'footer.php';?>