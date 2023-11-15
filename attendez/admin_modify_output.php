<?php
session_start();
 if(isset($_SESSION['myapp_admin_info'])){

// ログインユーザーのIDを取得（適切な方法でセッションから取得するか、他の手段で取得してください）
$adminId = $_SESSION['myapp_admin_info']['id'];

// 入力された現在のパスワード
$inputPassword = $_POST['password'];

// データベースから現在のパスワードを取得
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$stmt = $pdo->prepare('SELECT password FROM myapp_admin_info WHERE id = ?');
$stmt->execute([$adminId]);
$storedPassword = $stmt->fetchColumn();

// 現在のパスワードが正しいかどうかを確認
/*
if (!password_verify($inputPassword, $storedPassword)) {    //ハッシュ化した場合パスワードが違う処理
    $_SESSION['error'] = '現在のパスワードが違っています';
       header('Location: http://192.168.104.88/2023/attendez/admin_modify.php');
exit();
*/
if ($inputPassword != $storedPassword) {    //パスワードが違う処理
    $_SESSION['error'] = '現在のパスワードが違っています';
       header('Location: http://192.168.104.88/2023/attendez/admin_modify.php');
exit();
 }else{     //パスワードが正しかって、確認ページに
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
    }
    if(isset($_POST['class'])){
        $_SESSION['class']=$_POST['class'];
    }
    if(isset($_POST['mailadress'])){
        $_SESSION['mailadress']=$_POST['mailadress'];
    }
    if(isset($_POST['password'])){
        $_SESSION['password']=$_POST['password'];
    }
    if(isset($_POST['newpassword'])){
        $_SESSION['newpassword']=$_POST['newpassword'];
    }
    if(isset($_POST['newpassword2'])){
        $_SESSION['newpassword2']=$_POST['newpassword2'];
    }
    if(isset($_POST['phone_number'])){
        $_SESSION['phone_number']=$_POST['phone_number'];
    }
    header('Location: http://192.168.104.88/2023/attendez/admin_modify_confirm.php');
    exit();
    
 }
}
?>