<?php
require 'header.php'; ?>

<!-- ここに検索フォームを追加 -->
登録情報を変更する学生を選択してください
<form action="students_modify_select.php" method="post">
    <label for="searchName">学生名で検索:</label>
    <input type="text" id="searchName" name="searchName" autocomplete="off">
    <input type="submit" value="検索">
</form>

<?php
// データベース接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "接続に失敗しました：" . $e->getMessage();
    exit();
}

// サニタイズされた検索文字列
$searchName = isset($_POST['searchName']) ? htmlspecialchars($_POST['searchName']) : '';

// 検索クエリの作成
$query = $pdo->prepare("SELECT * FROM students_info WHERE name LIKE :searchName OR student_number LIKE :searchName");
$query->bindValue(':searchName', '%' . $searchName . '%', PDO::PARAM_STR);
$query->execute();

// 検索結果の取得
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// テーブルの表示
echo '<table>';
echo '<tr><th>番号</th><th>学籍番号</th><th>氏名</th></tr>';

foreach ($result as $row) {
    echo '<tr>';
    echo '<td>';
    echo '<a href="students_modify.php?id=', $row['id'], '">', $row['id'], '</a>';
    echo '</td>';
    echo '<td>', $row['student_number'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '</tr>';
}
echo '</table>';

require 'footer.php';
?>

