<?php
session_start();
 if(isset($_SESSION['students_info'])){

// ログインユーザーのIDを取得（適切な方法でセッションから取得するか、他の手段で取得してください）
$adminId = $_SESSION['students_info']['id'];

// 入力された現在のパスワード
$inputPassword = $_POST['password'];

// データベースから現在のパスワードを取得
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
$stmt = $pdo->prepare('SELECT password FROM students_info WHERE id = ?');
$stmt->execute([$id]);
$storedPassword = $stmt->fetchColumn();

// 現在のパスワードが正しいかどうかを確認
/*
if (!password_verify($inputPassword, $storedPassword)) {    //ハッシュ化した場合パスワードが違う処理
    $_SESSION['error'] = '現在のパスワードが違っています';
       header('Location: http://192.168.104.88/2023/attendez/admin_modify.php');
exit();
*/
if ($inputPassword != $storedPassword) {    //パスワードが違った場合の処理
    $_SESSION['error'] = '現在のパスワードが違っています';
       header('Location: http://192.168.104.88/2023/attendez/admin_modify.php');
exit();
 }else{     //パスワードが正しい場合、確認ページに
    if(isset($_POST['IDM'])){
        $_SESSION['IDM']=$_POST['IDM'];
    }
    if(isset($_POST['student_number'])){
        $_SESSION['student_number']=$_POST['student_number'];
    }
    if(isset($_POST['class'])){
        $_SESSION['class']=$_POST['class'];
    }
    if(isset($_POST['attendance_number'])){
        $_SESSION['attendance_number']=$_POST['attendance_number'];
    }
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
    }
    if(isset($_POST['password'])){
        $_SESSION['password']=$_POST['password'];
    }
    header('Location: http://192.168.104.88/2023/attendez/students_modify_confirm.php');
    exit();   
 }
}
?>