<!--ログイン確認画面-->
<?php session_start();
$pdo =new PDO('mysql:host=localhost;dbname=test;charset=utf8',
                'root','');
$sql=$pdo->prepare('select * from students_info 
                    where student_number=? and password=?');//ログインとパスワードが完全一致か？
$sql->execute([$_REQUEST['student_number'],$_REQUEST['password']]);
if(isset($_REQUEST['student_number']) && isset($_REQUEST['password'])){
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
        header('Location: today_question.php');
        //メニュー画面へ
        exit();
    } else {
        // ログイン情報が一致しない場合
        $_SESSION['errmsg'] = 'IDまたはパスワードが違います。';
        header('Location: index.php');
    }
}
?>
<?php require 'footer.php';?>