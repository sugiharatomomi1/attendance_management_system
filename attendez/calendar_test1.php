<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>休日設定</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>休日設定</h1>
    
    <form action="process.php" method="post">
        <?php
        $start_date = new DateTime('first day of this month');
        $end_date = new DateTime('last day of this month');
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($start_date, $interval, $end_date);

        foreach ($period as $date) {
            $formatted_date = $date->format('Y-m-d');
            echo "<label>";
            echo "<input type='checkbox' name='holidays[]' value='$formatted_date'>";
            echo "$formatted_date";
            echo "</label>";
        }
        ?>

        <input type="submit" value="休日を保存">
    </form>
</body>
</html>
