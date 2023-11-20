<?php require 'header.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');

// 学生の情報をデータベースから取得
$sql = $pdo->prepare('SELECT * FROM students_info WHERE attendance_number = ?');

try {
    $sql->execute([$_REQUEST['id']]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('エラー: ' . $e->getMessage());
}

// セッションに保存されたデータを取得
if (isset($_SESSION['students_info']['name'])) {
    $IDM = $_SESSION['students_info']['IDM'];
    $studentNumber = $_SESSION['students_info']['student_number'];
    $class = $_SESSION['students_info']['class'];
    $attendanceNumber = $_SESSION['students_info']['attendance_number'];
    $name = $_SESSION['students_info']['name'];
    $password = $_SESSION['students_info']['password'];
} else {
    $IDM = $row['IDM'];
    $studentNumber = $row['student_number'];
    $class = $row['class'];
    $attendanceNumber = $row['attendance_number'];
    $name = $row['name'];
    $password = $row['password'];
}

echo '<p>', '学生登録情報', '</p>';
echo '<table>';
echo '<tr>';
echo '<td>登録カードIDM:', $IDM, ' </td>';
echo '</tr>';
echo '<tr>';
echo '<td>学籍番号:', $studentNumber, ' </td>';
echo '</tr>';
echo '<tr>';
echo '<td>クラス:', $class, ' </td>';
echo '</tr>';
echo '<tr>';
echo '<td>出席番号:', $attendanceNumber, ' </td>';
echo '</tr>';
echo '<tr>';
echo '<td>氏名:', $name, ' </td>';
echo '</tr>';
echo '<tr>';
echo '<td>パスワード:', $password, ' </td>';
echo '</tr>';
echo '</table>';
echo '<p>本当にこの登録情報を削除してもよろしいですか？</p>';
echo '<a href="students_delete_output.php?id=', $attendanceNumber, '">はい</a>';
echo '<a href="students_modify_select.php?id=', $attendanceNumber, '">いいえ</a>';

require 'footer.php';
?>
