<?php require 'header.php'; ?>
<?php
echo '<table>';
echo '<tr>';
echo '<th>学籍番号</th><th>出席番号</th><th>氏名</th><th>';
echo date('m/d'); //今日
echo '</th><th>';
echo date('m/d', strtotime('-1 day')); //昨日
echo '</th><th>';
echo date('m/d', strtotime('-2 day')); //一昨日
echo '</th><th>回答数</th><th>正解数</th><th>不正解数</th><th>無回答数</th><th>正答率</th>';
echo '</tr>';
$pdo=new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root','');
$sql=$pdo->query('select * from students_info');
foreach ($sql as $row) {
    $id=$row['student_number'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>', $row['attendance_number'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', '一昨日', '</td>';
    echo '<td>', '昨日', '</td>';
    echo '<td>', '今日', '</td>';
    echo '<td>', '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>