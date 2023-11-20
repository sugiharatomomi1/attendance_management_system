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
//あとは日付を足すだけ

// ユーザー入力を保持する変数を定義します（ユーザー入力のサニタイズと検証を行ってください）
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$students = $pdo->prepare('SELECT student_number, attendance_number, name FROM students_info');
$attendstatus = $pdo->prepare('SELECT student_number, date, status FROM myapp_attendstatus');
$students->execute();
$attendstatus->execute();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';
    $situation = isset($_POST['situation']) ? $_POST['situation'] : '';
  
    $sql = 'SELECT students_info.student_number, students_info.attendance_number, students_info.name, myapp_attendstatus.status 
            FROM students_info
            LEFT JOIN myapp_attendstatus ON students_info.student_number = myapp_attendstatus.student_number';
  
    if (!empty($situation) && $situation !== 'すべて') {
        $sql .= ' WHERE myapp_attendstatus.status = :situation';
    }
  
    if ($display === '学籍番号順') {
        $sql .= ' ORDER BY students_info.student_number';
    } elseif ($display === '出席番号順') {
        $sql .= ' ORDER BY students_info.attendance_number';
    }
  
    $students = $pdo->prepare($sql);
  
    if (!empty($situation) && $situation !== 'すべて') {
        $students->bindParam(':situation', $situation);
    }
  
    $students->execute();
  }else { // 一番最初の表示
    echo '<table>';
    echo '<tr><td>学籍番号</td><td>出席番号</td><td>名前</td><td>出席状況</td></tr>';
  
    // 学生の学籍番号と出席状況を関連付ける連想配列
    $studentStatusMap = array();
  
    foreach ($attendstatus as $attendstatu) {
        $studentNumber = $attendstatu['student_number'];
        $status = $attendstatu['status'];
  
        // 学生の学籍番号をキーとして出席状況をマップに追加
        $studentStatusMap[$studentNumber] = $status;
    }
  
    foreach ($students as $student) {
        $student_number = $student['student_number'];
        $attendance_number = $student['attendance_number'];
        $name = $student['name'];
  
        // 学生の学籍番号に対応する出席状況を取得
        $studentStatus = isset($studentStatusMap[$student_number]) ? $studentStatusMap[$student_number] : 'デフォルトの状態';
  
        echo '<tr><td>', $student_number, '</td><td>', $attendance_number, '</td><td>', $name, '</td><td>', $studentStatus, '</td></tr>';
    }
  
    echo '</table>';
  }
  // SQLクエリを準備して実行します
  if(isset($sql)){
  $students = $pdo->prepare($sql);
  if (!empty($situation)) {
      $students->bindParam(':situation', $situation);
  }
  $students->execute();
  echo '<table>';
  echo '<tr><td>学籍番号</td><td>出席番号</td><td>名前</td><td>出席状況</td></tr>';
  
  foreach ($students as $student) {
      $student_number = $student['student_number'];
      $attendance_number = $student['attendance_number'];
      $name = $student['name'];
      $status = $student['status'];
  
      echo '<tr><td>', $student_number, '</td><td>', $attendance_number, '</td><td>', $name, '</td><td>', $status, '</td></tr>';
  }
  
  echo '</table>';
  }

?>
<?php require 'footer.php';?>
