<!--ログイン確認画面-->
<?php session_start();
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from myapp_admin_info 
                    where mailadress=? and password=?');//ログインとパスワードが完全一致か？
$sql->execute([$_REQUEST['mailadress'],$_REQUEST['password']]);
if(isset($_REQUEST['mailadress']) && isset($_REQUEST['password'])){
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        // ログイン成功時の処理
        $_SESSION['myapp_admin_info'] = [
            'id' => $row['id'],
            'school_id' => $row['school_id'],
            'mailadress' => $row['mailadress'],
            'name' => $row['name'],
            'class' => $row['class'],
            'password' => $row['password']
        ];
        header('Location: http://192.168.104.88/2023/attendez/menu.php');
        //メニュー画面へ
        exit();
    } else {
        // ログイン情報が一致しない場合
        echo 'ログイン名またはパスワードが違います。';
        echo '<br><a href="index.php">戻る</a>';
    }
}
?>
<?php require 'footer.php';?>