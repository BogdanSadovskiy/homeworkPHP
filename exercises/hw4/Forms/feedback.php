<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="../Styles/feedback.css">
</head>

<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === 'success') {
        echo "<p style='color: green; text-align: center;'>Feedback submitted successfully!</p>";
    } elseif ($status === 'error') {
        echo "<p style='color: red; text-align: center;'>Failed to send feedback. Please try again later.</p>";
    }
}
?>

<body>
    <h1>Feedback Form</h1>
    <form action="../feedback_handler.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <label for="rate">Rate:</label>
        <select id="rate" name="rate" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <button type="submit">Submit Feedback</button>
    </form>

  

</body>

</html>