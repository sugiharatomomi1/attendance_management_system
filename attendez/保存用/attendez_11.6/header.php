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
        <title>Attend EZ</title>
        <meta name="description" content="AttendEZ.co.jp"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
<!--CSS--> 
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"> 
        <link rel="icon" type="" href=""> 
    </head> 

<body> 
    <div id="index" class="big-bg"> 

        <header>
         <ul class="nav-line1"> 

            <li><a href="login-input.php">こんにちは,
             <?php
                 if(isset($_SESSION['customer'])){
                 echo $_SESSION['customer']['name'],'さん';
                 }else {
                 echo 'ログイン';
                 };
             ?>
             
<nav> 
   <ul class="main-nav"> 
    <li><a href="admin_regist.php">管理者新規登録</a></li> 
    <li><a href="admin_modify.php">管理者登録情報変更</a></li> 
    <li><a href="index.php">管理者ログイン</a></li> 
    <li><a href="menu.php">メニュー（機能）一覧</a></li>
    <li><a href=".php">出欠登録</a></li> 
    <li><a href="attend_state.php">出欠状況確認</a></li>
        <li><a href="attend_history.php">月ごとの出欠状況</a></li> 
    <li><a href="attend_state_modify.php">出欠情報修正</a></li> 
    <li><a href="log.php">ログ確認</a></li> 
    <li><a href="holiday_set.php">休日登録</a></li> 
    <li><a href=".php">ログアウト</a></li> 
    <li><a href=".php">学生新規登録</a></li> 
    <li><a href="students_modify_select.php">学生登録情報修正</a></li> 
    <li><a href="question_regist.php">問題登録</a></li> 
    <li><a href="question_modify_select.php">問題修正</a></li> 
    <li><a href="response_state.php">問題回答状況</a></li> 
        <li><a href="response_history.php">月ごとの回答状況</a></li> 
    <li><a href="csv_dl.php">CSV形式DL</a></li> 
    <li><a href="rank.php">得点ランキング</a></li> 
    <!--
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
