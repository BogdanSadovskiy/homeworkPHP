<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="index.css?v=1.0">
</head>

<?php
$HW = 4; 
?>

<body>
    <div class="container">
        <h1>Homework List:</h1>
        <ul class="homework-list">
            <?php
            $temp = $HW;
            while ($temp > 0) {
                $activeClass = $temp == $HW ? "active" : "";
                echo "<li class='homework-item $activeClass' onclick=\"location.href='/exercises/homework.php?id=$temp'\">HW-$temp</li>";
                $temp--;
            }
            ?>
        </ul>
    </div>
</body>

</html>
