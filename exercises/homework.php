<?php
// Get the homework ID from the URL parameter
$homeworkId = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Define exercises for each homework
$homeworkExercises = [
    1 => [
        "EX4",
        "EX5",
        "EX6."
    ],
    2 => [
        ".",
        ".",
        "."
    ]
];

// Get the exercises for the selected homework
$exercises = isset($homeworkExercises[$homeworkId]) ? $homeworkExercises[$homeworkId] : [];
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW-<?php echo $homeworkId; ?></title>
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="homework.css">
</head>

<body>
    <div class="container">
        <h1>HW-<?php echo $homeworkId; ?></h1>
        <ul class="exercise-list">
            <?php if ($homeworkId == 1): ?>
                <li class="exercise-item" onclick="location.href='/exercises/hw1/ex4/ex4.php'">
                    Create an array of shapes (name, coordinates, color).
                </li>
                <li class="exercise-item" onclick="location.href='/exercises/hw1/ex5/ex5.php'">
                    Possible PC Combinations.
                </li>
                <li class="exercise-item" onclick="location.href='/exercises/hw1/ex6/ex6.php'">
                    Array of header, content, footer.
                </li>
            <?php elseif ($homeworkId == 2): ?>
                <li class="exercise-item" onclick="location.href='/exercises/hw2/student_registartion_form.php'">
                    Student registartion form.
                </li>
              
            <?php endif; ?>
        </ul>
        <a href="../index.php" class="back-link">Back</a>
    </div>
</body>

</html>