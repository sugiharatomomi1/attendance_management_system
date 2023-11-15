
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="admin_modify_submit">

<?php
$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
'root','');
if ($_SESSION['name']) {
    // 入力データを取得（セキュリティのために適切な検証が必要です）
    $class = $_SESSION['class'];
    $name = $_SESSION['name'];
    $mailadress =  $_SESSION['mailadress'];
    $newpassword =  $_SESSION['newpassword'];
    $phone_number = $_SESSION['phone_number'];
    // データベースを更新
    $sql = "UPDATE myapp_admin_info SET 
            class = '$class', 
            name = '$name', 
            mailadress = '$mailadress', 
            password = '$newpassword', 
            phone_number = '$phone_number'
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['myapp_admin_info']['id']);
    unset($_SESSION['error']);
    // 更新を実行
    if ($stmt->execute()) {
        echo "更新が成功しました！";
    } else {
        echo "更新に失敗しました: " . $stmt->errorInfo()[2];
    }
}
?>
<?php require 'footer.php';?>