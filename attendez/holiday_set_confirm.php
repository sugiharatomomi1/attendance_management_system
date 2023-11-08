<?php
// 確認画面でクエリパラメータを取得
if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    $selectedDate2 = str_replace('-', '', $selectedDate); // ハイフン削除

    echo $selectedDate;
    $pdo = new PDO('mysql:host=localhost;dbname=2023_attendez;charset=utf8', 'root', '');
    $sql = $pdo->prepare('insert into calendar (`id`, `holiday`) values (null,?)');
    $sql->execute([$selectedDate2]); // パラメータを配列で渡す
    echo '休日設定が完了しました<br>';
    echo '<a href="holiday_set.php">休日選択へ</a>';
} else {
    echo '休日設定が完了できませんでした。';
    echo '<a href="holiday_set.php">休日選択へ</a>';
}
?>