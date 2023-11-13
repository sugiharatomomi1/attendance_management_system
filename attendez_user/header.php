<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="UTF=8">
        <title>Attend EZ(学生用)</title>
        <meta name="description" content="AttendEZ.co.jp"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
<!--CSS--> 
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"> 
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
                var msg = nowHour + ":" + nowMin + ":" + nowSec ;
                document.getElementById("RealtimeClockArea").innerHTML = msg;
            }
 
            // showClock2 関数を1秒ごとに呼び出す
            setInterval(showClock2, 1000);

            window.onload = function() {
            showClock2();
            };


            
        </script>

    </head> 

<body> 
    <div id="index" class="big-bg"> 

        <header>
         <ul class="nav-line1">     
    <div class="link-container">

            <a>こんにちは,
             <?php
                 if(isset($_SESSION['students_info'])){
                 echo $_SESSION['students_info']['name'],'さん';
                 }else {
                 echo '〇〇';
                 };
             ?>
            </a>


                <div class="center-container">
                    <div class="center-content">
                        <!--この要素は水平方向に左右中央に配置されます。-->
                        <a id="RealtimeClockArea">※ここに時計が表示されます。</a>
                    </div>
                </div>




                <div class="right-align">
                    <!--このテキストは右に配置されます。-->
                    <a href="logout.php">ログアウト</a>
                </div>

    </div>           

<div id="index" class="main_contents"> <!--本文-->

         </ul>
        </header>

        <?php require 'nav.php'; ?>
