<?php require 'header.php'; ?>

<?php
        if(isset($_SESSION['students_info'])){
            unset ($_SESSION['students_info']);
            header('Location: http://192.168.104.88/2023/attendez_user/index.php');
            exit();
        } else{
            echo 'すでにログアウトしています。';
            echo '<li><a href="index.php">ホーム画面へ</a></li>';
        }
        ?>
<?php require 'footer.php';?>