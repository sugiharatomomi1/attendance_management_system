<?php
session_start();



// admin_delete_output.php
 if(isset($_SESSION['myapp_admin_info'])){

    // ログインユーザーのIDを取得（適切な方法でセッションから取得するか、他の手段で取得してください）
    $adminId = $_SESSION['myapp_admin_info']['id'];

    // 入力された現在のパスワード
    $inputPassword_delete = $_POST['password'];

    // データベースから現在のパスワードを取得
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
    $stmt = $pdo->prepare('SELECT password FROM myapp_admin_info WHERE id = ?');
    $stmt->execute([$adminId]);
    $storedPassword = $stmt->fetchColumn();

    // 現在のパスワードが正しいかどうかを確認
    if ($inputPassword_delete != $storedPassword) {
        $_SESSION['error'] = '現在のパスワードが違っています';
        header('Location: admin_delete.php');
        exit();
    } else {
        // パスワードが正しい場合、確認ページにリダイレクト
        if(isset($_POST['password'])){
            $_SESSION['password']=$_POST['password'];
        }
        header('Location: admin_delete_confirm.php');
        exit();
    }
}
?>
