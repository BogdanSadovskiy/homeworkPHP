<?php
// Array with settings for each part of the page
$sections = [
    "Header" => [
        "height" => "100px",
        "backgroundColor" => "#4CAF50",
        "textColor" => "#FFFFFF",
        "content" => "This is the Header"
    ],
    "Content" => [
        "height" => "300px",
        "backgroundColor" => "bisque",
        "textColor" => "#333333",
        "content" => "This is the main content area"
    ],
    "Footer" => [
        "height" => "80px",
        "backgroundColor" => "#333333",
        "textColor" => "#FFFFFF",
        "content" => "This is the Footer"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Page with Container</title>
    <link rel="stylesheet" href="../../../common.css">
    <link rel="stylesheet" href="ex6.css">
</head>
<body>
    <div class="container">
        <?php foreach ($sections as $section => $settings): ?>
            <div class="section" style="
                height: <?php echo $settings['height']; ?>;
                background-color: <?php echo $settings['backgroundColor']; ?>;
                color: <?php echo $settings['textColor']; ?>;
            ">
                <h2><?php echo $settings['content']; ?></h2>
            </div>
        <?php endforeach; ?>

        
        <a href="../../homework.php" class="back-link">Back</a>
    </div>
</body>
</html>
