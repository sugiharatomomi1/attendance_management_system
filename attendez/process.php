<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 送信された休日の取得
    $holidays = isset($_POST["holidays"]) ? $_POST["holidays"] : [];

    // 休日の処理（保存など）
    foreach ($holidays as $holiday) {
        echo "選択された休日: $holiday<br>";
        // ここで休日の保存などの処理を行う
    }
}
?>