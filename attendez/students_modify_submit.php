<?php require 'header.php';?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力データを取得（セキュリティのために適切な検証が必要です）
    $IDM = $_SESSION['students_info']['IDM'];
    $studentNumber = $_SESSION['students_info']['student_number'];
    $class = $_SESSION['students_info']['class'];
    $attendanceNumber =  $_SESSION['students_info']['attendance_number'];
    $name =  $_SESSION['students_info']['name'];
    $password = $_SESSION['students_info']['password'];

    // データベースを更新
    $sql = "UPDATE students_info SET 
    IDM = :IDM, 
    student_number = :student_number, 
    class = :class, 
    attendance_number = :attendance_number, 
    name = :name,
    password = :password
    WHERE student_number = :student_number";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':IDM', $IDM);
    $stmt->bindParam(':student_number', $studentNumber);
    $stmt->bindParam(':class', $class);
    $stmt->bindParam(':attendance_number', $attendanceNumber);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    
    unset($_SESSION['error']);
    // 更新を実行
    if ($stmt->execute()) {
        echo "更新が成功しました！";
        unset($_SESSION['students_info']);
    } else {
        echo "更新に失敗しました: " . $stmt->errorInfo()[2];
    }
}
?>

<a href=students_modify_select.php>学生情報修正画面へ</a>
<?php require 'footer.php';?>
