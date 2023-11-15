<script>
    // WebSocketの設定
    const socket = new WebSocket('ws://192.168.104.88:8765');

    // NFC読み取りボタンがクリックされた時の処理
    document.getElementById('nfcForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // サーバーにコマンドを送信
        socket.send(command);

        // サーバーからの応答を待ち、結果を表示
        socket.addEventListener('message', function (event) {
            const result = event.data;
            document.getElementById('result').innerHTML = 'Result: ' + result;
        });
    });
</script>

<?php
require 'header.php';

// 初期化
$name = $class = $IDM = $student_number = $attendance_number = $password = '';

echo '<div class="form">';
echo '<h1 class="form-title">学生新規登録</h1><br>';

if (isset($_SESSION['err_msg'])) {
    echo '<h3>', $_SESSION['err_msg'], '</h3>';
    $IDM = $_SESSION['IDM'];
    $name = $_SESSION['name'];
    $class = $_SESSION['class'];
    $student_number = $_SESSION['student_number'];
    $attendance_number = $_SESSION['attendance_number'];
    $password = $_SESSION['password'];
}

?>

<form id="nfcForm" action="students_regist.php" method="POST">
    <input type="submit" name="nfcForm" value="IDM読み取り">
</form>

<div id="result"></div>

<?php

if (isset($_POST['nfcForm'])) {
    // JavaScriptから呼び出すために変数を用意
    echo '<script>';
    echo 'var command = "C:\\xampp\\htdocs\\AttendEZtest\\NFC_CARD_READING.py";'; // Pythonのパスとスクリプトの絶対パスを指定
    echo '</script>';
}

echo '<form action="students_regist_output.php" method="post">';
echo '<table class="form-table">';
echo '<tr><th class="form-item">登録カードIDM:</th><td class="form-body">';
echo '<input type="text" id="IDM" name="IDM" class="form-text" autocomplete="IDM" value="', $IDM, '">';
echo '</td>';
echo '<tr><th class="form-item">学籍番号:</th><td class="form-body">';
echo '<input type="text" id="student_number" name="student_number" class="form-text" autocomplete="student_number" required value="', $student_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">クラス:</th><td class="form-body">';
echo '<input type="text" id="class" name="class" class="form-text" autocomplete="class" required value="', $class, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">出席番号:</th><td class="form-body">';
echo '<input type="text" id="attendance_number" autocomplete="attendance_number" name="attendance_number" class="form-text" required value="', $attendance_number, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">氏名:</th><td class="form-body">';
echo '<input type="text" id="name" autocomplete="name" name="name" class="form-text" required value="', $name, '">';
echo '</td></tr>';
echo '<tr><th class="form-item">パスワード:</th><td class="form-body">';
echo '<input type="password" id="password" autocomplete="password" name="password" class="form-text" required value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" name="registform" class="form-submit" value="確認へ">';
echo '</form>';
echo '</div>';
?>

<?php
// サニタイズされた検索文字列
$searchName = isset($_POST['searchName']) ? htmlspecialchars($_POST['searchName']) : '';

// 検索クエリの作成
$query = $pdo->prepare("SELECT * FROM students_info WHERE name LIKE :searchName");
$query->bindValue(':searchName', '%' . $searchName . '%', PDO::PARAM_STR);
$query->execute();

// 検索結果の取得
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// 結果の表示
if ($result) {
    foreach ($result as $row) {
        echo '学生名: ' . $row['name'] . '<br>';
        // 他の学生情報も表示することができます
    }
} else {
    echo '該当する学生が見つかりませんでした。';
}
?>




学生登録情報変更
<?php
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
      <td>担当クラス:</td>
      <td>
        <input type="text" id="class" name="class" autocomplete="class" value="<?= $class ?>">
      </td>
    </tr>
    <tr>
      <td>氏名:</td>
      <td>
        <input type="text" id="name" name="name" autocomplete="name" value="<?= $name ?>">
      </td>
    </tr>
    <tr>
      <td>メールアドレス:</td>
      <td>
        <input type="text" id="mailadress" name="mailadress" autocomplete="mailadress" value="<?= $mailadress ?>">
      </td>
    </tr>
    <tr>
      <td>現在のパスワード:</td>
      <td>
        <input type="password" id="password" autocomplete="password" name="password" value="">
      </td>
    </tr>
    <tr>
      <td>新しいパスワード:</td>
      <td>
        <input type="password" id="newpassword" autocomplete="newpassword" name="newpassword" value="<?= $newpassword ?>">
      </td>
    </tr>
    <tr>
      <td>新しいパスワード再入力:</td>
      <td>
        <input type="password" id="newpassword2" autocomplete="newpassword2" name="newpassword2" value="<?= $newpassword2 ?>">
      </td>
    </tr>
    <tr>
      <td>電話番号:</td>
      <td>
        <input type="text" id="phone_number" autocomplete="phone_number" name="phone_number" value="<?= $phone_number ?>">
      </td>
    </tr>
  </table>
  <span class="toggle-password" onclick="togglePasswordVisibility()">&#x1f441;</span>
  <input type="submit" value="確認画面へ">
</form>

 <script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var newpasswordInput = document.getElementById("newpassword");
    var newpassword2Input = document.getElementById("newpassword2");
    var toggleIcon = document.querySelector(".toggle-password");

    toggleInputType(passwordInput);
    toggleInputType(newpasswordInput);
    toggleInputType(newpassword2Input);

    // アイコンを切り替える
    toggleIcon.textContent = (passwordInput.type === "password") ? "👁️" : "🙈";
  }

  function toggleInputType(inputElement) {
    inputElement.type = (inputElement.type === "password") ? "text" : "password";
  }
  </script>


<!-- jQueryライブラリの読み込み-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
    $('form').submit(function () {
      const name = $("#name").val();
      const className = $("#class").val();
      const mailadress = $("#mailadress").val();
      const password = $("#password").val();
      const newpassword = $("#newpassword").val();
      const newpassword2 = $("#newpassword2").val();
      const phone_number = $("#phone_number").val();

      if (newpassword !== newpassword2) {
        alert("新しいパスワードが一致していません");
        return false;
      }
      if (!name || !className || !mailadress || !password || 
           !newpassword || !newpassword2 || !phone_number) {
        alert("すべての項目を入力してください。");
        return false;
      }
    });
</script>
<?php require 'footer.php';?>