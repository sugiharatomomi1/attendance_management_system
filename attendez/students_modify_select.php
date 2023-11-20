<?php require 'header.php'; ?>

<!-- 学生名またはクラスで検索するフォーム -->
<form action="students_modify_select.php" method="post">
    <label for="searchName">学生名またはクラスで検索:</label>
    <input type="text" id="searchName" name="searchName" autocomplete="off">
    <input type="submit" value="検索">
</form>

<?php
unset($_SESSION['students_info']);
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
try {
    // 学生名またはクラスでの検索
    $query = $pdo->prepare("SELECT * FROM students_info WHERE name LIKE :searchName OR class LIKE :searchName");
    $query->bindValue(':searchName', '%' . $searchName . '%', PDO::PARAM_STR);
    $query->execute();

    // 検索結果の取得
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // テーブルの表示
    echo '<h3>検索結果</h3>';
    displayTable($result);

} catch (PDOException $e) {
    die('エラー: ' . $e->getMessage());
}

// テーブル表示用の関数
function displayTable($result)
{
    echo '<table>';
    echo '<tr><th>出席番号</th><th>学籍番号</th><th>氏名</th><th>クラス</th><th>編集</th><th>削除</th></tr>';

    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="students_modify.php?id=', $row['student_number'], '">', $row['attendance_number'], '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="students_modify.php?id=', $row['student_number'], '">', $row['student_number'], '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="students_modify.php?id=', $row['student_number'], '">', $row['name'],  '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="students_modify.php?id=', $row['student_number'], '">', $row['class'],  '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="students_modify.php?id=', $row['student_number'], '">', '編集',  '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="students_delete.php?id=', $row['student_number'], '">', '削除',  '</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

require 'footer.php';
?>
