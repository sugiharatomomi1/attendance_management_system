<?php require 'header.php'; ?>
<?php
$today='day' . date('d');
$yesterday='day' . date('d',strtotime('-1 day'));
$before='day' . date('d', strtotime('-2 day'));
$todayanswer=0; //今日の回答人数
$yesterdayanswer=0; //昨日の回答人数
$beforeanswer=0; //一昨日の回答人数
$todaycorrect=0; //今日の正解人数
$yesterdaycorrect=0; //昨日の正解人数
$beforecorrect=0; //一昨日の正解人数
$students=0; //生徒数
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
$sql=$pdo->query('select * from students_info inner join response
                on students_info.student_number = response.student_number');
foreach ($sql as $row) {
    $answer=0; //回答数
    $noanswer=0; //無回答数
    $correct=0; //正解数
    $incorrect=0; //不正解数
    $rate=0; //正答率
    $id=$row['student_number'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>', $row['attendance_number'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row[$today], '</td>'; //今日
    if ($row[$today] != "無回答") {
        if ($row[$today] == "正解") {
            $correct+=1;
            $todaycorrect+=1;
        }
        $answer+=1;
        $todayanswer+=1;
    }
    echo '<td>', $row[$yesterday], '</td>'; //昨日
    if ($row[$yesterday] != "無回答") {
        if ($row[$yesterday] == "正解") {
            $correct+=1;
            $yesterdaycorrect+=1;
        }
        $answer+=1;
        $yesterdayanswer+=1;
    }
    echo '<td>', $row[$before], '</td>'; //一昨日
    if ($row[$before] != "無回答") {
        if ($row[$before] == "正解") {
            $correct+=1;
            $beforecorrect+=1;
        }
        $answer+=1;
        $beforeanswer+=1;
    }
    $noanswer=3-$answer;
    $incorrect=$answer-$correct;
    $rate=$correct/$answer*100;
    echo '<td>', $answer, '</td>';
    echo '<td>', $correct, '</td>';
    echo '<td>', $incorrect, '</td>';
    echo '<td>', $noanswer, '</td>';
    echo '<td>', floor($rate), '%</td>';
    echo '</tr>';
    $students+=1;
}
echo '<tr>';
echo '<td></td><td></td>';
echo '<td>正解率：</td>';
if ($todayanswer != 0) {
    echo '<td>', floor($todaycorrect/$todayanswer*100), '%</td>';
} else {
    echo '<td>0%</td>';
}
if ($yesterdayanswer != 0) {
    echo '<td>', floor($yesterdaycorrect/$yesterdayanswer*100), '%</td>';
} else {
    echo '<td>0%</td>';
}
if ($beforeanswer != 0) {
    echo '<td>', floor($beforecorrect/$beforeanswer*100), '%</td>';
} else {
    echo '<td>0%</td>';
}
echo '</th>';
echo '<tr>';
echo '<td></td><td></td>';
echo '<td>回答率：</td>';
echo '<td>', floor($todayanswer/$students*100), '%</td>';
echo '<td>', floor($yesterdayanswer/$students*100), '%</td>';
echo '<td>', floor($beforeanswer/$students*100), '%</td>';
echo '</th>';
echo '</table>';
?>
<?php require 'footer.php'; ?>