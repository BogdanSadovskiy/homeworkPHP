<?php
$shapes = [
    ["name" => "Circle", "x" => 100, "y" => 100, "color" => "red"],
    ["name" => "Square", "x" => 200, "y" => 150, "color" => "blue"],
    ["name" => "RoundedSquare", "x" => 300, "y" => 100, "color" => "green"],
];
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shapes</title>
    <link rel="stylesheet" href="../../../common.css">
    <link rel="stylesheet" href="ex4.css">

</head>

<body>
    <div class="container">
        <h1>Shapes Drawing</h1>
        <div id="shapesContainer">
            <?php foreach ($shapes as $shape): ?>
                <div class="shape <?php echo strtolower($shape['name']); ?>" style="background-color: <?php echo $shape['color']; ?>; left: <?php echo $shape['x']; ?>px; top: <?php echo $shape['y']; ?>px;"></div>
            <?php endforeach; ?>
        </div>
        <a href="../../homework.php" class="back-link">Back</a>

    </div>

</body>

</html>