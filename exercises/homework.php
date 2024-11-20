<?php

$homeworkExercises = include '../data.php';
$homeworkId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$homeworkId || !isset($homeworkExercises[$homeworkId])) {
    echo "<h2>Invalid Homework ID</h2>";
    exit;
}

$exercises = $homeworkExercises[$homeworkId];
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW-<?php echo $homeworkId; ?></title>
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="homework.css">
    <meta name="description" content="Homework <?php echo $homeworkId; ?> - Exercises">
</head>

<body>
    <div class="container">
        <h1>HW-<?php echo $homeworkId; ?></h1>
        <ul class="exercise-list">
            <?php foreach ($exercises as $exercise): ?>
                <li class="exercise-item" onclick="location.href='<?php echo $exercise['path']; ?>'">
                    <?php echo $exercise['title']; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php include "../navigation.php"; ?>
    </div>
</body>

</html>
