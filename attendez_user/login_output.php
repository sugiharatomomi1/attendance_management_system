<?php require 'header.php'; ?>
<!--ログイン確認画面-->
<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from students_info 
                    where id=? and password=?');//ログインとパスワードが完全一致か？
$sql->execute([$_REQUEST['id'],$_REQUEST['password']]);
if(isset($_REQUEST['id']) && isset($_REQUEST['password'])){
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        // ログイン成功時の処理
        $_SESSION['students_info'] = [
            'id' => $row['id'],
            'IDM' => $row['IDM'],
            'attendance_number' => $row['attendance_number'],
            'student_number' => $row['student_number'],
            'name' => $row['name'],
            'class' => $row['class'],
            'password' => $row['password']
        ];
        header('Location: http://192.168.104.88/2023/attendez_user/today_question.php');
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