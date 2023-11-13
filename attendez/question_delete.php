<?php require 'header.php'; ?>
<?php
echo '<h3>この問題を削除してもよろしいですか</h3>';
echo '<form action="question_delete_output.php" method="post">';
echo '<input type="hidden" name="id" value="', $_REQUEST['id'], '">';
echo '<input type="submit" value="はい">';
echo '</form>';
echo '';
?>
<?php require 'footer.php'; ?>