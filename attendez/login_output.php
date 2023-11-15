<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');

if (isset($_POST['mailadress']) && isset($_POST['password'])) {
    $sql = $pdo->prepare('SELECT * FROM myapp_admin_info WHERE mailadress = ? AND password = ?');
    $sql->execute([$_POST['mailadress'], $_POST['password']]);

    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // ログインが成功した場合
        $_SESSION['myapp_admin_info'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'class' => $row['class'],
            'mailadress' => $row['mailadress'],
            'phone_number' => $row['phone_number']
        ];

        header('Location: http://192.168.104.88/2023/attendez/menu.php');
        exit();
    } else {
        // ログイン情報が一致しない場合
        $_SESSION['errmsg'] = 'メールアドレスまたはパスワードが違います。';
        header('Location: index.php');
        exit();
    }
}


?>
