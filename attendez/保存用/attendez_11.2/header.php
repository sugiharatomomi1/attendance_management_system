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
    <li><a href=".php">admin新規登録</a></li> 
    <li><a href=".php">adminログイン</a></li> 
    <li><a href=".php">出欠登録</a></li> 
    <li><a href=".php">出欠状況確認</a></li> 
    <li><a href=".php">ログ確認</a></li> 
    <li><a href=".php">休日登録</a></li> 
    <li><a href=".php">ログアウト</a></li> 
    <li><a href=".php">ユーザー登録</a></li> 
    <li><a href=".php">ユーザー登録情報変更</a></li> 
    <li><a href=".php">問題登録</a></li> 
    <li><a href=".php">問題回答状況</a></li> 
    <li><a href=".php">月ごとの回答状況</a></li> 
    <li><a href=".php">月ごとの出欠状況</a></li> 
    <li><a href=".php">CSV形式DL</a></li> 
    <li><a href=".php">得点ランキング</a></li> 
    <li><a href="login-input.php"> 
      <?php
         if(isset($_SESSION['customer'])){
         echo $_SESSION['customer']['name'],'さん';
         }else {
         echo 'ゲスト';
         };
      ?>
    </a></li>
   </ul> 
</nav> 

<div id="index" class="main_contents"> <!--本文-->

         </ul>
        </header>
