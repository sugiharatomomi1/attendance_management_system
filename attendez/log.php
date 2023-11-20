<?php
require 'header.php';
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
    <?php
    // エラーメッセージの初期化
    $error_message = '';
    $status = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 入力データの取得
        $start_days_ago = isset($_POST["start_days_ago"]) ? $_POST["start_days_ago"] : 0;
        $end_days_ago = isset($_POST["end_days_ago"]) ? $_POST["end_days_ago"] : 0;

        // Convert days ago to actual dates
        $start_date = date('Y-m-d', strtotime("-$start_days_ago days"));
        $end_date = date('Y-m-d', strtotime("-$end_days_ago days"));

        // ステータスの取得
        $status = isset($_POST["status"]) ? $_POST["status"] : "";

        // 開始日が終了日より後の場合、エラーメッセージを設定
        if ($start_date > $end_date) {
            $error_message = '終了日は開始日より後の日付を選択してください。';
        }
    } else {
        // フォームが送信されていない場合はすべてのログを表示
        $three_days_ago = date('Y-m-d', strtotime('-7 days')); //フォームのログ表示日付指定
        $start_date = $three_days_ago;
        $end_date = date('Y-m-d');
    }

    // エラーメッセージがある場合は表示
    if (!empty($error_message)) {
        echo "<p style='color: red;'>{$error_message}</p>";
    }
    ?>

    <form action="" method="post"> <!-- 絞り込みのフォーム -->
    <label for="start_date">【開始】</label> <!-- 開始日の指定 -->
    <select name="start_days_ago" required>
    <?php
    for ($i = 0; $i <= 6; $i++) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $selected = ($i == $start_days_ago) ? "selected" : "";
        echo "<option value=\"$i\" $selected>$date</option>";
    }
    ?>
    </select>

    <label for="end_date">【終了】</label> <!-- 終了日の指定 -->
    <select name="end_days_ago" required>
    <?php
    for ($i = 0; $i <= 6; $i++) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $selected = ($i == $end_days_ago) ? "selected" : "";
        echo "<option value=\"$i\" $selected>$date</option>";
    }
    ?>
    </select>

    <label for="status">ステータス:</label> <!-- ステータスの取得 -->
    <select name="status">
    <option value="" <?php echo ($status === "") ? "selected" : ""; ?>>すべて</option>
    <option value="IN" <?php echo ($status === "IN") ? "selected" : ""; ?>>IN</option>
    <option value="OUT" <?php echo ($status === "OUT") ? "selected" : ""; ?>>OUT</option>
    </select>

        <input type="submit" value="検索">
    </form>

    <div class="log-header">
        <h1>ログ確認</h1>
        <p>打刻ログを確認できます</p>
    </div>

    <?php
    if (empty($error_message)) {
        // エラーメッセージがない場合のみデータベースからの取得と表示を行う

        // PDO接続
        $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8mb4', 'root', '');

        // SQLクエリの構築
        $sql = "SELECT * FROM log WHERE touch_date BETWEEN '$start_date' AND '$end_date'";

        if ($status != "") {
            $sql .= " AND touch_status = '$status'";
        }

        // クエリの実行
        $result = $pdo->query($sql);

        // 結果の表示
        echo "<h2>検索結果</h2>";
        echo "<table border='1'>";
        echo "<tr><th>氏名</th><th>学籍番号</th><th>日付</th><th>時間</th><th>状態</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['student_number']}</td>";
            echo "<td>{$row['touch_date']}</td>";
            echo "<td>{$row['touch_time']}</td>";
            echo "<td>{$row['touch_status']}</td>";
            echo "</tr>";
        }

        echo "</table>";

        // データベース接続のクローズ
        $pdo = null;
    }

    // フッターの読み込み
    require 'footer.php';
    ?>
</body>
</html>
