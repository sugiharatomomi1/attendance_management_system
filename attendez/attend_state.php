
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="attend_state">
    現在の出席状況確認
<form action="attend_history.php" methood="post">
表示順:
<select name= "display">

<option value = "学籍番号順">学籍番号順</option>
<option value = "出席番号順">出席番号順</option>
</select>
日付:
<select id="year" name="year"></select>
<select id="month" name="month"></select>
<select id="date" name="date"></select>
状態:
<select name= "situation">

<option value = "出席">出席</option>
<option value = "遅刻">遅刻</option>
<option value = "早退">早退</option>
<option value = "欠席">欠席</option>
<option value = "公欠">公欠</option>
</select>

<?php
  echo '<input type="submit" value="検索">';
  echo '</form>'; 
  echo '</div>';
?>

<script>
//現在の日付をセレクトボックスに入れている
(function() {
  var today = new Date();
  var year = today.getFullYear();
  var month = today.getMonth() + 1;
  var date = today.getDate();
  function createOption(id, startNum, endNum, current) {
    var selectDom = document.getElementById(id);
    var optionDom = '';
    for (var i = startNum; i <= endNum; i++) {
      var option = i === current ? '<option value="' + i + '" selected>' + i + '</option>' : '<option value="' + i + '">' + i + '</option>';
      optionDom += option;
    }
    selectDom.insertAdjacentHTML('beforeend', optionDom);
  }
  createOption('year', 2020, year, year);
  createOption('month', 1, 12, month);
  createOption('date', 1, 31, date);
})()
</script>

<?php require 'footer.php';?>