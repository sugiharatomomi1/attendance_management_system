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
// 名前、日付、学籍番号のデータを取得
$name = isset($_POST['name']) ? $_POST['name'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
// フォームが送信された場合の処理
if (isset($_POST['attendance_status'])) {
    $attendance_status = $_POST['attendance_status'];
    $student_numbers = isset($_POST['student_numbers']) ? $_POST['student_numbers'] : [];
    $dates = isset($_POST['dates']) ? $_POST['dates'] : [];

    // データベースの更新処理を行う
    $update = $pdo->prepare("UPDATE myapp_attendstatus SET status = :status
                            WHERE student_number = :student_number AND date = :date");

    foreach ($student_numbers as $key => $student_number) {
        // チェックされている場合のみ更新
        if (isset($attendance_status[$student_number])) {
            $update->bindParam(':status', $attendance_status[$student_number]);
        } else {
            // チェックされていない場合は現状を維持
            // 既存のstatusをそのまま使う場合、下記のように変更
             $update->bindParam(':status', $existing_status); // $existing_statusを適切に設定
            continue; // チェックされていない場合は次のループへ進む
        }

        $update->bindParam(':student_number', $student_number);
        $update->bindParam(':date', $dates[$key]);
        $update->execute();
    }
}
  //前のページで選択された情報だけ表示

  if (isset($_POST['selected_rows'],$_SESSION['myapp_admin_info'])) {
      $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';
      $selectedDate = isset($_SESSION['selected_date']) ? $_SESSION['selected_date'] : date('Y-m-d');
      $selectedRows = isset($_POST['selected_rows']) ? $_POST['selected_rows'] : [];
      
      // SQLクエリの組み立て
      $sql = $pdo->prepare('SELECT students_info.student_number, students_info.attendance_number, students_info.name, myapp_attendstatus.status, myapp_attendstatus.date 
                  FROM myapp_attendstatus
                  LEFT JOIN  students_info ON  myapp_attendstatus.student_number = students_info.student_number
                  WHERE students_info.student_number IN (' . implode(',', array_map(function($num) { return "'$num'"; }, $selectedRows)) . ')
                  ORDER BY ' . ($display === '学籍番号順' ? 'students_info.student_number' : 'students_info.attendance_number'));
  
      // 以下の部分は日付や状態による絞り込みの条件に合わせて変更が必要
      // 今回は条件が選択されていない場合はすべて表示すると仮定します。
      $sql->execute();
  
      // 結果をテーブルとして出力
      echo "<form action='' method='post'>"; // 一括更新のためのフォーム
  
      echo "<table border='1'>";
      echo "<tr>
      <th>日付</th>
      <th>学籍番号</th>
      <th>出席番号</th>
      <th>名前</th>
      <th>出席状況</th>
      <th>出席</th>
      <th>欠席</th>
      <th>遅刻</th>
      <th>遅刻（遅延）</th>
      <th>早退</th>
      <th>公欠</th>
      </tr>";
      echo '<tr>
<th></th><th></th><th></th><th></th><th></th>';
echo '<th><input type="checkbox" id="select_all_attend"> 一括選択</th>';
echo '<th><input type="checkbox" id="select_all_break"> 一括選択</th>';
echo '<th><input type="checkbox" id="select-all"> 一括選択</th>';
echo '<th><input type="checkbox" id="select-all"> 一括選択</th>';
echo '<th><input type="checkbox" id="select-all"> 一括選択</th>';
echo '<th><input type="checkbox" id="select-all"> 一括選択</th>';

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
                  $checked_attendance = ($row['status'] === '出席') ? 'checked' : '';
                  $checked_absence = ($row['status'] === '欠席') ? 'checked' : '';
                  $checked_late = ($row['status'] === '遅刻') ? 'checked' : '';
                  $checked_late_delay = ($row['status'] === '遅刻（遅延）') ? 'checked' : '';
                  $checked_early_leave = ($row['status'] === '早退') ? 'checked' : '';
                  $checked_public_leave = ($row['status'] === '公欠') ? 'checked' : '';

                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='出席' $checked_attendance>  </td>";
                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='欠席' $checked_absence>  </td>";
                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='遅刻' $checked_late>  </td>";
                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='遅刻（遅延）' $checked_late_delay> </td> ";
                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='早退' $checked_early_leave>  </td>";
                  echo "<td><input type='radio' name='attendance_status[" . $row['student_number'] . "]' value='公欠' $checked_public_leave>  </td>";
                  echo "<input type='hidden' name='student_numbers[]' value='" . $row['student_number'] . "'>";
                  echo "<input type='hidden' name='dates[]' value='" . $row['date'] . "'>";
                  echo "</tr>";
              }
          }
      } 
      echo "</table>";
      echo "<input type='submit' value='一括更新'></form>"; // 一括更新のためのボタン
  }

  
?>
<a href="attend_state_modify.php">戻る</a>
<script>

document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("select_all_attend").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("attendance_status[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    });

        document.getElementById("select_all_break").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("student_numbers[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        document.getElementById("select-all").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("student_numbers[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        document.getElementById("select-all").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("selected_rows[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        document.getElementById("select-all").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("selected_rows[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        document.getElementById("select-all").addEventListener("change", function () {
            var checkboxes = document.getElementsByName("selected_rows[]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>
<?php require 'footer.php';?>