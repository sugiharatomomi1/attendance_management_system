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
    <li><a href="product.php">商品</a></li> 
    <li><a href="favorite-show.php">★お気に入り</a></li> 
    <li><a href="history.php">購入履歴</a></li> 
    <li><a href="cart-show.php">カート</a></li> 
    <li><a href="purchase-input.php">購入</a></li> 
    <li><a href="login-input.php">ログイン</a></li> 
    <li><a href="logout-input.php">ログアウト</a></li> 
    <li><a href="customer-input.php">会員登録</a></li> 
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
