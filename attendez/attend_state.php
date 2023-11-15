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
    $date_option = 'today';
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
<input type="radio" name="date_option" value="today" <?php if ($date_option === 'today') echo 'checked'; ?>> 今日
<input type="radio" name="date_option" value="yesterday" <?php if ($date_option === 'yesterday') echo 'checked'; ?>> 昨日
<input type="radio" name="date_option" value="day_before_yesterday" <?php if ($date_option === 'day_before_yesterday') echo 'checked'; ?>> 一昨日

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

 // SQLクエリの組み立て
$sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, students_info.name, myapp_attendstatus.status, myapp_attendstatus.date 
FROM myapp_attendstatus
LEFT JOIN  students_info ON  myapp_attendstatus.student_number = students_info.student_number
ORDER BY ' . ($display === '学籍番号順' ? 'students_info.student_number' : 'students_info.attendance_number'));

// 以下の部分は日付や状態による絞り込みの条件に合わせて変更が必要
// 今回は条件が選択されていない場合はすべて表示すると仮定します。

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
// ここで条件に合わせてデータを絞り込む
if (($date_option === 'today' && $row['date'] === date('Y-m-d')) || // 今日の場合
($date_option === 'yesterday' && $row['date'] === date('Y-m-d', strtotime('-1 day'))) || // 昨日の場合
($date_option === 'day_before_yesterday' && $row['date'] === date('Y-m-d', strtotime('-2 days'))) || // 一昨日の場合
($date_option === 'all')) { // 日付の条件がない場合はすべて表示

// 状態による絞り込み
if ($situation === 'すべて' || $row['status'] === $situation) {
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
}

else { // 一番最初の表示
 
$display = '学籍番号順';  // 初期表示順
$date_option = 'today';   // 初期日付オプション
$situation = 'すべて';    // 初期状態

// SQLクエリの組み立て
$sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, students_info.name, myapp_attendstatus.status, myapp_attendstatus.date 
          FROM myapp_attendstatus
          LEFT JOIN  students_info ON  myapp_attendstatus.student_number = students_info.student_number
          ORDER BY ' . ($display === '学籍番号順' ? 'students_info.student_number' : 'students_info.attendance_number'));

// 今日の日付
$today = date('Y-m-d');

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
    if ($row['date'] === $today && // 今日の日付の場合
        ($situation === 'すべて' || $row['status'] === $situation)) { // すべての状態または指定の状態の場合

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