<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));
    $rate = intval($_POST['rate']);

  
    if (empty($name) || empty($message) || $rate < 1 || $rate > 5) {
        die("Invalid input data!");
    }


    $to = "bohdansadovskiy@gmail.com";
    $subject = "New Feedback from $name";
    $body = "
        A new feedback has been received:\n\n
        Name: $name\n
        Feedback: $message\n
        Rating: $rate\n
    ";
    $headers = "From: no-reply@books.com";


    if (mail($to, $subject, $body, $headers)) {
  
        header("Location: /exercises/hw4/Forms/feedback.php?status=success");
        exit();
    } else {
 
        header("Location: /exercises/hw4/Forms/feedback.php?status=error");
        exit();
    }
} else {
 
    header("Location: /exercises/hw4/Forms/feedback.php");
    exit();
}
?>
