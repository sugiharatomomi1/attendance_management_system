<?php require 'header.php'; ?>

<?php
        if(isset($_SESSION['myapp_admin_info'])){
            unset ($_SESSION['myapp_admin_info']);
            echo 'ログアウトしました。';
           // echo '<ul class="menu">';
    echo '<li><a href="index.php">ホーム画面へ</a></li>';
  //  echo '</ul>';
        } else{
            echo 'すでにログアウトしています。';
           // echo '<ul class="menu">';
            echo '<li><a href="index.php">ホーム画面へ</a></li>';
           // echo '</ul>';
        }
        ?>
<?php require 'footer.php';?>