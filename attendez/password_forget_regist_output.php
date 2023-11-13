<?php require 'header.php'; ?>
<!--パスワードを新しくする画面-->

<?php
if(isset($_SESSION['mailadress_forget'])&& isset($_REQUEST['password'])){

$pdo =new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8',
'root',''); //データベースに接続
$sql = $pdo->prepare('UPDATE admin SET mailadress = ? WHERE password = ?');
}
if($sql->execute([$_SESSION['mailadress_forget'],$_REQUEST['password']])){
    echo "更新しました"; // 成功時のメッセージ
    echo '<a href="index.php">ログイン</a>';
} else {
    echo "できませんでした"; // 失敗時のメッセージ
    echo ' <button type="button" onclick=history.back()>戻る</button>'
    echo '<a href="admin_regist.php">新規登録</a>';
};
?>
<?php require 'footer.php';?>