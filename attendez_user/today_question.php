<?php require 'header.php'; ?>
<?php
                 if(isset($_SESSION['students_info'])){
                    echo $_SESSION['students_info']['name'],'さん';
                    }else {
                    echo '〇〇';
                    };
?>
<?php require 'footer.php';?>