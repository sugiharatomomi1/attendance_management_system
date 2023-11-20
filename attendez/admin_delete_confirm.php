<?php require 'header.php'; 

// パスワードが一致しているか確認
if ($inputPassword_delete != $storedPassword) {
    $_SESSION['error'] = '現在のパスワードが違っています';
    echo 'Entered Password: ' . $inputPassword_delete . '<br>';
    echo 'Stored Password: ' . $storedPassword . '<br>';
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
// admin_delete_output.php

// データベースから現在のパスワードを取得
$stmt = $pdo->prepare('SELECT password FROM myapp_admin_info WHERE id = ?');
$stmt->execute([$adminId]);
$storedPassword = $stmt->fetchColumn();
echo 'Stored Password from Database: ' . $storedPassword . '<br>';

require 'footer.php';
?>