<?php require 'header.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $studentNumber = $_GET['id'];

    // データベースを更新
    $sql = "DELETE FROM students_info WHERE attendance_number = :attendance_number";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':attendance_number', $studentNumber);

    // 更新を実行
    if ($stmt->execute()) {
        echo "削除が成功しました！";
    } else {
        echo "削除に失敗しました: " . $stmt->errorInfo()[2];
    }
} else {
    echo "無効なリクエストです。";
}

?>

<a href="students_modify_select.php">学生登録情報修正画面へ</a>
<?php require 'footer.php'; ?>