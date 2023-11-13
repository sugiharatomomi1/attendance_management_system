<?php require 'header.php'; ?>
<!--出席状況確認画面-->
<?php
if(isset($_POST['display'])){
  $display = isset($_POST['display']) ? $_POST['display'] : '学籍番号順';
}else{
  $display = '学籍番号順';
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
        <select id="year" name="year"></select>
        <select id="month" name="month"></select>
        <select id="date" name="date"></select>

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

// ユーザー入力を保持する変数を定義します（ユーザー入力のサニタイズと検証を行ってください）
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$students = $pdo->prepare('SELECT student_number, attendance_number, name FROM students_info');
$attendstatus = $pdo->prepare('SELECT student_number, date, status FROM myapp_attendstatus');
$students->execute();
$attendstatus->execute();

// ユーザー入力に基づいてSQLクエリを構築します
// フォームが送信された後
//日付情報
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $year = $_POST['year'];
  $month = $_POST['month'];
  $date = $_POST['date'];
}

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
<script>

// 現在の日付をセレクトボックスに入れている
(function() {
  var today = new Date();
  var date = today.getDate();

  // 固定したい月と年を設定
  var fixedYear = '<?php echo isset($year) ? $year : ''; ?>';
  var fixedMonth = '<?php echo isset($month) ? $month : ''; ?>';
  var startDate = '<?php echo isset($date) ? $date : ''; ?>';
  console.log("startDate =" + startDate);
  if (fixedYear === '') {
    fixedYear = today.getFullYear();
  }

  if (fixedMonth === '') {
    fixedMonth = today.getMonth() + 1;
  }
  var up = date-3;
  var down = date;

  if (startDate === '') {
    var tempStartDate = new Date(fixedYear, fixedMonth - 1, date - 3);
    startDate = tempStartDate.getDate();
    var up = date-3;
  var down = date;
      // 日付の選択ボックスを制限された範囲で設定
  createOption('date', up, date, down);
    console.log("startDate =ある" + startDate);
  }else{
    var tempStartDate = new Date(fixedYear, fixedMonth - 1, startDate);
    date2 = tempStartDate.getDate();
      // 日付の選択ボックスを制限された範囲で設定
  createOption('date', up, date2, down);
    console.log("startDate =なし" + startDate);
  }
  // 日付の選択ボックスを設定する関数
  function createOption(id, startNum, endNum, current) {
    var selectDom = document.getElementById(id);
    selectDom.innerHTML = ''; // 選択ボックスの中身をクリア

    for (var i = startNum; i <= endNum; i++) {
      var option = document.createElement('option');
      option.value = i < 10 ? "0" + i : i.toString(); // 日付が1桁の場合は0を追加
      option.text = i < 10 ? "0" + i : i.toString(); // 日付が1桁の場合は0を追加

      if (i === current) {
        option.selected = true;
      }

      selectDom.appendChild(option);
    }
  }

  // 年と月の選択ボックスを固定の値に設定
  createOption('year', fixedYear, fixedYear, fixedYear);
  createOption('month', fixedMonth, fixedMonth, fixedMonth);
  
  // 日付の選択ボックスを制限された範囲で設定
  // createOption('date', up, date, date);
  
  // 選択可能な最小の日付を8に設定
  //  if (date < 8) {
  //    document.getElementById('date').value = '08';
  //  }
  //   console.log("startDate =" + startDate);
})();


// この場合、ele = null　と表示されるので、変数eleはnull

/*
document.addEventListener("DOMContentLoaded", function() {
    // ページ読み込み時に保存された日付情報を取得
    const yearSelect = document.querySelector("select[name=year]");
    const monthSelect = document.querySelector("select[name=month]");
    const dateSelect = document.querySelector("select[name=date]");

    const savedDateSelection = JSON.parse(localStorage.getItem("dateSelection")) || {};
    
    if (savedDateSelection.year) {
        yearSelect.value = savedDateSelection.year;
    }
    
    if (savedDateSelection.month) {
        monthSelect.value = savedDateSelection.month;
    }

    if (savedDateSelection.date) {
        dateSelect.value = savedDateSelection.date;
    }
    
    // 日付情報が変更された場合、ローカルストレージに保存
    yearSelect.addEventListener("change", saveDateSelection);
    monthSelect.addEventListener("change", saveDateSelection);
    dateSelect.addEventListener("change", saveDateSelection);
    
    function saveDateSelection() {
        const selectedDate = {
            year: yearSelect.value,
            month: monthSelect.value,
            date: dateSelect.value
        };
        localStorage.setItem("dateSelection", JSON.stringify(selectedDate));
    }
});*/
</script>
<?php require 'footer.php';?>
