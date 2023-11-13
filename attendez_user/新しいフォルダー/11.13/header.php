<?php 
session_start();
session_regenerate_id();
?>

<?php 
ini_set('display_errors',"On");
ini_set('error_reporting',E_ALL);

//h関数が未定義の場合に定義するための設定　h関数p215に掲載
if(! function_exists('h')){
    function h($s){
        echo htmlspecialchars($s,ENT_QUOTES,"UTF-8");
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="UTF=8">
        <title>Attend EZ (学生用)</title>
        <meta name="description" content="AttendEZ.co.jp"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
<!--CSS--> 
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <link rel="icon" type="" href=""> 

        <!--以下script内 JS function--> 
        <script><!----> 
            function set2fig(num) {
             // 桁数が1桁だったら先頭に0を加えて2桁に調整する
                var ret;
             if (num < 10) {
                ret = "0" + num;
             } else {
                ret = num;
             }
            return ret;
            }
 
            function showClock2() {
                var nowTime = new Date();
                var nowHour = set2fig(nowTime.getHours());
                var nowMin = set2fig(nowTime.getMinutes());
                var nowSec = set2fig(nowTime.getSeconds());
                var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
                document.getElementById("RealtimeClockArea").innerHTML = msg;
            }
 
            // showClock2 関数を1秒ごとに呼び出す
            setInterval(showClock2, 1000);
        </script>

    </head> 

<body> 
    <div id="index" class="big-bg"> 

        <header>
         <ul class="nav-line1"> 

            <li><a>こんにちは,</a>
                <a id="greet" href="index.php">
             <?php
                 if(isset($_SESSION['admin'])){
                 echo $_SESSION['admin']['name'],'さん';
                 }else {
                 echo 'ログイン';
                 };
             ?>
            </a></li>

            <li>
                <a id="RealtimeClockArea">※ここに時計が表示されます。</a>
            </li>
            <li><a id="logout" href="logout.php">ログアウト</a></li>

<nav> 
   <ul class="main-nav">   

 <!--   <li><a href="menu.php">メニュー</a></li> -->
    <li><a href="attend_report.php">出欠報告</a></li>

    <li><a href="today_question.php">今日の問題</a></li>

    <li><a href="result.php">成績</a></li> 

    <li><a href="rank.php">ランキング</a></li>
    </ul>

    <!--ここはいったん無視してください
    <li><a href="login-input.php"> 
      <?php
         if(isset($_SESSION['customer'])){
         echo $_SESSION['customer']['name'],'さん';
         }else {
         echo 'ゲスト';
         };
      ?>
    </a></li>
        -->


   </ul> 
</nav> 

<div id="index" class="main_contents"> <!--本文-->

         </ul>
        </header>
