<?php require 'header.php'; ?>
<?php
// セッションに保存されたデータを取得
$name=$class=$mailadress=$password=$newpassword=$newpassword2=$phone_number='';
if(isset($_SESSION['myapp_admin_info'])){
    $name=$_SESSION['myapp_admin_info']['name'];
    $class=$_SESSION['myapp_admin_info']['class'];
    $mailadress=$_SESSION['myapp_admin_info']['mailadress'];
    $phone_number=$_SESSION['myapp_admin_info']['phone_number'];
}
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
  };
?>
<form action="admin_modify_output.php" method="post">
  <table>
    <tr>
     <th class="form-item">パスワード</th>
      <td class="form-body">
        <div class="password-container">
        <input type="password" class="form-text" id="passwordInput1" autocomplete="password" name="password" value=""><button type="button" id="showPasswordButton1">表示</button>
        </div>
      </td>
    </tr>
  </table>
</form>
<p><a href="admin_delete_confirm.php">管理者情報を削除する</a></p>


<?php
require 'footer.php';
?>