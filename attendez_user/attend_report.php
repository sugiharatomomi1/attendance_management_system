
<?php require 'header.php'; ?>
<!--新規会員登録の選択画面-->
<div class="attend_report">
  管理者登録情報変更確認画面
 <!-- 出席状況フォーム -->
 <form action="admin_modify_submit.php" method="post" onsubmit="return validateForm()">
    <label>出席状況</label>
    <br>
    <label><input type="radio" name="attendance" value="欠席"> 欠席</label>
    <label><input type="radio" name="attendance" value="公欠"> 公欠</label>
    <label><input type="radio" name="attendance" value="遅刻"> 遅刻</label>
    <label><input type="radio" name="attendance" value="遅刻（遅延）"> 遅刻（遅延）</label>
    <label><input type="radio" name="attendance" value="早退"> 早退</label>

    <!-- 伝えておきたいことフォーム -->
    <br>
    <label for="text">伝えておきたいこと:</label>
    <br>
    <textarea id="text" name="text" autocomplete="text" rows="4" cols="50"></textarea>
    <br>

    <!-- 送信ボタン -->
    <input type="submit" value="送信">
  </form>
<script>
        function validateForm() {
            // ラジオボタンの選択状態を確認
            var radioButtons = document.getElementsByName("attendance");
            var isChecked = false;

            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            // ラジオボタンが選択されているかどうかを判定
            if (!isChecked) {
                alert("出席状況を選択してください。");
                return false; // フォームをサブミットしない
            }

            // フォームが正しく入力されている場合は true を返す
            return true;
        }
    </script>
<?php require 'footer.php';?>