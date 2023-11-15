<?php
session_start();

// パスワードを更新する画面

if (isset($_SESSION['mailadress']) && isset($_POST['new_password'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', ''); // データベースに接続
    $sql = $pdo->prepare('UPDATE myapp_admin_info SET password = ? WHERE mailadress = ?');
    
    if ($sql->execute([$_POST['new_password'], $_SESSION['mailadress']])) {
        echo "更新しました"; // 成功時のメッセージ
        echo '<a href="index.php">ログイン</a>';
    } else {
        echo "更新に失敗しました"; // 失敗時のメッセージ
        echo ' <button type="button" onclick=history.back()>戻る</button>';
        echo '<a href="admin_regist.php">新規登録はこちら</a>';
    }
}
?>
<?php require 'footer.php'; ?>