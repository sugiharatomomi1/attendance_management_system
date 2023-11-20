<?php require 'header.php'; ?>
<!--出席状況確認画面-->
<?php
if(isset($_POST['display'])){
  $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';
}else{
  $display = '学籍番号順';
}

if(isset($_POST['date_option'])){
    $date_option = isset($_POST['date_option']) ? $_POST['date_option'] : '';
  }else{
    $date_option = 'this_month';
  }

if(isset($_POST['situation'])){
  $situation = isset($_POST['situation']) ? $_POST['situation'] : '';
}else{
  $situation = 'すべて';
}
?>

<div class="attend_state">
    現在の出席状況確認
    <form action="" method="post" name="attendanceFilterForm">

    表示順:
        <select name="display">
            <option value="学籍番号順" <?php if ($display === '学籍番号順') echo 'selected'; ?>>学籍番号順</option>
            <option value="出席番号順" <?php if ($display === '出席番号順') echo 'selected'; ?>>出席番号順</option>
        </select>
日付:
<input type="radio" name="date_option" value="this_month" <?php if ($date_option === 'this_month') echo 'checked'; ?>> 今月
<input type="radio" name="date_option" value="one_month" <?php if ($date_option === 'one_month') echo 'checked'; ?>> 1カ月前
<input type="radio" name="date_option" value="two_month" <?php if ($date_option === 'two_month') echo 'checked'; ?>> 2カ月前

状態:
<select name= "situation">

<option value = "すべて" <?php if ($situation === 'すべて') echo 'selected'; ?>>すべて</option>
<option value = "出席" <?php if ($situation === '出席') echo 'selected'; ?>>出席</option>
<option value = "遅刻" <?php if ($situation === '遅刻') echo 'selected'; ?>>遅刻</option>
<option value = "遅刻（遅延）" <?php if ($situation === '遅刻（遅延）') echo 'selected'; ?>>遅刻（遅延）</option>
<option value = "早退" <?php if ($situation === '早退') echo 'selected'; ?>>早退</option>
<option value = "欠席" <?php if ($situation === '欠席') echo 'selected'; ?>>欠席</option>
<option value = "公欠" <?php if ($situation === '公欠') echo 'selected'; ?>>公欠</option>
</select>

<?php
  echo '<input type="submit" value="検索">';
  echo '</form>'; 
  echo '</div>';
?>

<?php
// ユーザー入力を保持する変数を定義します（ユーザー入力のサニタイズと検証を行ってください）
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';
  $situation = isset($_POST['situation']) ? $_POST['situation'] : '';

  // ラジオボタンで選択された日付オプションを設定
if (isset($_POST['date_option'])) {
    $date_option = $_POST['date_option'];

    // ラジオボタンで選択されたオプションに基づいて $date_option を設定
    switch ($date_option) {
        case 'this_month':
            $date_option_value = date('Y-m');
            break;
        case 'one_month':
            $date_option_value = date('Y-m', strtotime('-1 month'));
            break;
        case 'two_month':
            $date_option_value = date('Y-m', strtotime('-2 months'));
            break;
        default:
            $date_option_value = 'all';
    }
} else {
    // ラジオボタンが選択されていない場合のデフォルト値
    $date_option = 'this_month';
    $date_option_value = date('Y-m');
}
// 日付のフォーマットを変換して月の部分を抽出
$formatted_month = date('n', strtotime($date_option_value));

// 月の部分を '10月' の形式に変換
$display_month = $formatted_month . '月';

// この $display_month を表示に使用する
echo '<h3>',$display_month,'</h3>';
// SQLクエリの組み立て
$sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, 
                      students_info.name, myapp_attendstatus.status, myapp_attendstatus.date 
FROM myapp_attendstatus
LEFT JOIN students_info ON myapp_attendstatus.student_number = students_info.student_number
WHERE (:date_option = "all" OR 
       (:date_option = "this_month" AND DATE_FORMAT(myapp_attendstatus.date, "%Y-%m") = :date_option_value) OR
       (:date_option = "one_month" AND DATE_FORMAT(myapp_attendstatus.date, "%Y-%m") = :date_option_value) OR
       (:date_option = "two_month" AND DATE_FORMAT(myapp_attendstatus.date, "%Y-%m") = :date_option_value))
ORDER BY myapp_attendstatus.date DESC, ' . ($display === '学籍番号順' ? 'students_info.student_number' : 'students_info.attendance_number'));

$sql->bindParam(':date_option', $date_option, PDO::PARAM_STR);
$sql->bindParam(':date_option_value', $date_option_value, PDO::PARAM_STR);
$sql->execute();

    // 結果をテーブルのヘッダーとして出力
    echo "<table border='1'>";
    echo "<tr>
            <th>学籍番号</th>
            <th>出席番号</th>
            <th>名前</th>
            <th>出席状況</th>
            <th>日付</th>
          </tr>";

    $hasResults = false; // フラグ: 結果が見つかったかどうか

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        // ここで条件に合わせてデータを絞り込む
        if (($date_option === 'this_month' && date('Y-m', strtotime($row['date'])) === date('Y-m')) ||
            ($date_option === 'one_month' && date('Y-m', strtotime($row['date']))=== date('Y-m', strtotime('-1 month'))) ||
            ($date_option === 'two_month' && date('Y-m', strtotime($row['date'])) === date('Y-m', strtotime('-2 month'))) ||
            ($date_option === 'all')) { // 日付の条件がない場合はすべて表示

            // 状態による絞り込み
            if ($situation === 'すべて' || $row['status'] === $situation) {
                $hasResults = true; // 結果が見つかった場合はフラグをtrueに設定

                echo "<tr>";
                echo "<td>" . $row['student_number'] . "</td>";
                echo "<td>" . $row['attendance_number'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
        }
    }

    echo "</table>";
      // 結果が見つからなかった場合のメッセージを表示
      if (!$hasResults) {
        echo "データが見つかりませんでした。";
    }
}

else { // 一番最初の表示
 
$display = '学籍番号順';  // 初期表示順
$date_option = 'this_month';   // 初期日付オプション
$situation = 'すべて';    // 初期状態

// SQLクエリの組み立て
$sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, 
                      students_info.name, myapp_attendstatus.status, myapp_attendstatus.date 
FROM myapp_attendstatus
LEFT JOIN students_info ON myapp_attendstatus.student_number = students_info.student_number
WHERE (:date_option = "all" OR 
       (:date_option = "this_month" AND MONTH(myapp_attendstatus.date) = MONTH(CURDATE()) AND YEAR(myapp_attendstatus.date) = YEAR(CURDATE())) OR
       (:date_option = "one_month" AND myapp_attendstatus.date >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)) OR
       (:date_option = "two_month" AND myapp_attendstatus.date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)))
       ORDER BY myapp_attendstatus.date DESC, ' . ($display === '学籍番号順' ? 'students_info.student_number' 
       : 'students_info.attendance_number'));



// 今日の日付
$today = date('Y-m-d');
$sql->bindParam(':date_option', $date_option, PDO::PARAM_STR);

$sql->execute();

// 結果をテーブルとして出力
echo "<table border='1'>";
echo "<tr>
        <th>学籍番号</th>
        <th>出席番号</th>
        <th>名前</th>
        <th>出席状況</th>
        <th>日付</th>
      </tr>";

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    // 初期状態で表示するための条件
    if (date('Y-m', strtotime($row['date'])) === date('Y-m') && // 今日の年と月の場合
    ($situation === 'すべて' || $row['status'] === $situation)) {

        echo "<tr>";
        echo "<td>" . $row['student_number'] . "</td>";
        echo "<td>" . $row['attendance_number'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
}

echo "</table>";
}

?>
<?php require 'footer.php';?>