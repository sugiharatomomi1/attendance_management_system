<?php require 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログ</title>
        <style>
            /* スタイルをここに追加 */
        </style>
    </head>
    <body>
    <form action="" method="post">
        <label for="start_date">開始日:</label>
        <input type="date" name="start_date" required>

        <label for="end_date">終了日:</label>
        <input type="date" name="end_date" required>

        <label for="status">ステータス:</label>
        <select name="status">
            <option value="">すべて</option>
            <option value="IN">IN</option>
            <option value="OUT">OUT</option>
        </select>

        <input type="submit" value="検索">
    </form>
        <div class="log-header">
            <h1>ログ確認</h1>
            <p>打刻ログを確認できます</p>
        </div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力データの取得
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $status = $_POST["status"];

    // SQLクエリの構築
    $sql = "SELECT * FROM log WHERE date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";

    if ($status != "") {
        $sql .= " AND status = '$status'";
    } else {
        // フォームが送信されていない場合は一昨日までのログを表示
        $two_days_ago = date('Y-m-d', strtotime('-2 days'));
        $sql = "SELECT * FROM log WHERE date <= '$two_days_ago 23:59:59'";
    }

    // クエリの実行
    $result = $mysqli->query($sql);

    // 結果の表示
    echo "<h2>検索結果</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Attendance Number</th><th>Name</th><th>Date</th><th>Status</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['attendance_number']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "</tr>";
    }

    echo "</table>";

    // データベース接続のクローズ
    $mysqli->close();
?>
    </body>
</html>

<?php require 'footer.php'; ?>