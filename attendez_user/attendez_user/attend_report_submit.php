<?php require 'header.php'; ?>
<!--遅刻情報などをデータベースに保存する-->
<div class="admin_modify_submit">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$student_number = $_SESSION['students_info']['student_number'];

// 学籍番号が存在するか確認
$sql_check_student = $pdo->prepare('SELECT * FROM students_info WHERE student_number = ?');
$sql_check_student->execute([$student_number]);

if ($sql_check_student->fetch()) { // 学籍番号がある場合
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $attendanceStatus = isset($_POST["attendance"]) ? $_POST["attendance"] : "";
        $message = isset($_POST["text"]) ? htmlspecialchars($_POST["text"]) : "";
        $currentDate = date("Y-m-d");
        $textDate = date("Y-m-d H:i:s");
        // 出席状況に応じて分岐
        switch ($attendanceStatus) {
            case "欠席":
            case "公欠":
            case "遅刻":
            case "遅刻（遅延）":
            case "早退":
                // 学籍番号と日付で既存データがあるか確認
                $sql_check_existing = $pdo->prepare('SELECT * FROM myapp_attendstatus 
                                                    WHERE student_number = ? AND date = ?');
                $sql_check_existing->execute([$student_number, $currentDate]);

                if ($sql_check_existing->fetch()) {
                    // 既存データがある場合は更新
                    $sql_update = $pdo->prepare('UPDATE myapp_attendstatus SET status = ? 
                                                WHERE student_number = ? AND date = ?');
                    $sql_update->execute([$attendanceStatus, $student_number, $currentDate]);
                } else {
                    // 既存データがない場合は新規追加
                    $sql_insert = $pdo->prepare('INSERT INTO myapp_attendstatus (id, student_number,
                                                date, status, arrive_time, leave_time) 
                                                VALUES (null, ?, ?, ?, null, null)');
                    $sql_insert->execute([$student_number, $currentDate, $attendanceStatus]);
                }

                echo '送信が完了しました';
                break;
            default:
                echo '不明な出席状況です';
                break;
        }
// 学籍番号と日付の日付部分が同じか確認
$sql_check_existing_message = $pdo->prepare('SELECT * FROM student_message 
                                            WHERE student_number = ? 
                                            AND DATE(datetime) = DATE(?)');
$sql_check_existing_message->execute([$student_number, $textDate]);

if ($existingMessage = $sql_check_existing_message->fetch()) {
    // 既存データがある場合は更新
    $existingDatetime = $existingMessage['datetime'];
    $sql_update_message = $pdo->prepare('UPDATE student_message SET text = ?, datetime = ?
                                        WHERE student_number = ? AND DATE(datetime) = DATE(?)');
    $sql_update_message->execute([$message, $textDate, $student_number, $existingDatetime]);
} else {
    // 既存データがない場合は新規追加
    $sql_insert_message = $pdo->prepare('INSERT INTO student_message (id, student_number, datetime, text) 
                                        VALUES (null, ?, ?, ?)');
    $sql_insert_message->execute([$student_number, $textDate, $message]);
}


    }      
} else {
    echo '学籍番号が違います';
}
?>


<?php require 'footer.php';?>