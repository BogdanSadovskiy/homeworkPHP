
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']); 
    $subjects = $_POST['subjects'] ?? [];
    $city = htmlspecialchars($_POST['city']);
    $languages = $_POST['languages'] ?? [];

    $to = "bohdansadovskiy@gmail.com";
    $subject = "Student Registration Form Submission";

    $message = "
    <html>
    <head>
        <title>Student Registration Form Submission</title>
    </head>
    <body>
        <h2>Student Registration Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Subjects:</strong> " . implode(", ", array_map('htmlspecialchars', $subjects)) . "</p>
        <p><strong>City:</strong> $city</p>
        <p><strong>Favorite Languages:</strong> " . implode(", ", array_map('htmlspecialchars', $languages)) . "</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: floydingym@gmail.com" . "\r\n"; 
    $headers .= "Reply-To: bohdansadovskiy@gmail.com" . "\r\n";

    
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Email sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send email.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="/exercises/hw2/student_registration_form.css">
    <title>Student Registration Form</title>
</head>

<body>
<div class="container">
        <h2>Student Registration Form</h2>
        <form action="" method="POST">
            <div class="section">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="section">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="section">
                <label>Subjects:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="subjects[]" value="Algorithms"> Algorithms</label>
                    <label><input type="checkbox" name="subjects[]" value="OOP"> OOP</label>
                    <label><input type="checkbox" name="subjects[]" value="Data Structures"> Data Structures</label>
                </div>
            </div>

            <div class="section">
                <label>Credit Card:</label>
                <div class="radio-group">
                    <label><input type="radio" name="credit_card" value="Visa" required> Visa</label>
                    <label><input type="radio" name="credit_card" value="Master Card"> Master Card</label>
                    <label><input type="radio" name="credit_card" value="American Express"> American Express</label>
                </div>
            </div>

            <div class="section">
                <label for="city">City:</label>
                <select id="city" name="city" required>
                    <option value="Lahore">Lahore</option>
                    <option value="Karachi">Karachi</option>
                    <option value="Islamabad">Islamabad</option>
                </select>
            </div>

            <div class="section">
                <label for="languages">Favorite Languages:</label>
                <select id="languages" name="languages[]" multiple size="4" class="multiple-select">
                    <option value="Java">Java</option>
                    <option value="PHP">PHP</option>
                    <option value="Ruby">Ruby</option>
                    <option value="C">C</option>
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>
        <a href="../homework.php?id=2" class="back-link">Back</a>
    </div>
</body>

</html>