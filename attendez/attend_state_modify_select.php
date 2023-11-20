<?php require 'header.php'; ?>
<!--出席状況変更画面-->
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
if(isset($_POST['situation_all'])){
  $situation_all = isset($_POST['situation_all']) ? $_POST['situation_all'] : '';
}else{
  $situation_all = '出席';
}


?>

<div class="attend_state_modify">
    出欠状況変更
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

<?php
  echo '<input type="submit" value="検索">';
  echo '</form>'; 
  echo '</div>';
?>

<?php
// ユーザー入力を保持する変数を定義します（ユーザー入力のサニタイズと検証を行ってください）
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
// フォームが送信された場合の処理
//日付などで並び替え
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';

  $selectedDate = isset($_SESSION['selected_date']) ? $_SESSION['selected_date'] : date('Y-m-d');

 // SQLクエリの組み立て
 $sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, students_info.name, 
 myapp_attendstatus.status, myapp_attendstatus.date 
 FROM myapp_attendstatus
 LEFT JOIN  students_info ON  myapp_attendstatus.student_number = students_info.student_number
 ORDER BY ' . ($display === '学籍番号順' ? 'students_info.student_number' : 'students_info.attendance_number'));

// 以下の部分は日付や状態による絞り込みの条件に合わせて変更が必要
// 今回は条件が選択されていない場合はすべて表示すると仮定します。
$sql->execute();

// 結果をテーブルとして出力

echo "<table border='1'>";
echo "<tr>
<th>日付</th>
<th>学籍番号</th>
<th>出席番号</th>
<th>名前</th>
<th>出席状況</th>

<th>一括選択</th>
</tr>";

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
  // ここで条件に合わせてデータを絞り込む
  if (($date_option === 'today' && $row['date'] === date('Y-m-d')) ||
      ($date_option === 'yesterday' && $row['date'] === date('Y-m-d', strtotime('-1 day'))) ||
      ($date_option === 'day_before_yesterday' && $row['date'] === date('Y-m-d', strtotime('-2 days'))) ||
      ($date_option === 'all')) { // 日付の条件がない場合はすべて表示
      // 状態による絞り込み
      if ($situation === 'すべて' || $row['status'] === $situation) {
          echo "<tr>";
          echo "<td>" . $row['date'] . "</td>";
          echo "<td>" . $row['student_number'] . "</td>";
          echo "<td>" . $row['attendance_number'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";

          echo "<form action='attend_state_modify_all.php' method='post'>";

          echo "<input type='hidden' name='student_number' value='" . $row['student_number'] . "'>";
          echo "<input type='hidden' name='date' value='" . $row['date'] . "'>";
          echo "<td><input type='checkbox' name='selected_rows[]' value='" . $row['student_number'] . "'></td>";

          echo "</td>";
          echo "</tr>";
          $KEY = true;
        }
    }
} 

echo "</table>";

if($KEY){
echo '<input type="checkbox" id="select-all"> 一括選択<br>'; // 一括選択用のチェックボックスを追加
    echo '<input type="submit" value="修正する">';
}
echo "</form>";
}

else { // 一番最初の表示
 
$display = '学籍番号順';  // 初期表示順
$date_option = 'today';   // 初期日付オプション

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
<th>日付</th>
<th>学籍番号</th>
<th>出席番号</th>
<th>名前</th>
<th>出席状況</th>

<th>一括選択</th>
</tr>";

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    // 初期状態で表示するための条件
    if ($row['date'] === $today){ // 今日の日付の場合
      echo "<tr>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['student_number'] . "</td>";
      echo "<td>" . $row['attendance_number'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";      
      echo "<form action='attend_state_modify_all.php' method='post'>";

      echo "<input type='hidden' name='student_number' value='" . $row['student_number'] . "'>";
      echo "<input type='hidden' name='date' value='" . $row['date'] . "'>";
      echo "<td><input type='checkbox' name='selected_rows[]' value='" . $row['student_number'] . "'></td>";
      echo "</tr>";
      $KEY = true;
    }
}
echo "</table>";

if($KEY){
echo '<input type="checkbox" id="select-all"> 一括選択<br>'; // 一括選択用のチェックボックスを追加
    echo '<input type="submit" value="修正する">';
}
echo "</form>";
}
?>
<script>
        document.getElementById("select-all").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("selected_rows[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>


<?php require 'footer.php';?>