<?php require 'header.php'; ?>

<?php
if ($_SERVER["POST_METHOD"] == "POST") {
    // フォームから送信された削除対象の予定IDを取得
    $Id = $_POST["Id"];
 
    // データベースに接続
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');

    // 予定を削除するSQLクエリ
    $sql = "DELETE FROM calendar table WHERE id = :Id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Id', $Id, PDO::PARAM_INT);

    // SQLクエリの実行
    if ($stmt->execute()) {
        echo "予定が削除されました。";
    } else {
        echo "予定の削除に失敗しました。";
    }
}
?>

<?php require 'footer.php'; ?>
