<?php




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $folderName = trim($_POST['folder_name']);
    $directory = 'uploads/' . $folderName;
    if (isset($_POST['create_folder'])) {
        if (!empty($folderName)) {

            if (!file_exists($directory)) {

                if (mkdir($directory, 0777, true)) {

                    $_SESSION['message'] = [
                        'text' => "Folder '$folderName' created successfully!",
                        'type' => 'success'
                    ];

                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit();
                } else {

                    $_SESSION['message'] = [
                        'text' => "Cannot create folder '$folderName'.",
                        'type' => 'error'
                    ];

                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit();
                }
            } else {

                $_SESSION['message'] = [
                    'text' => "Folder '$folderName' already exists.",
                    'type' => 'warning'
                ];

                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit();
            }
        } else {

            $_SESSION['message'] = [
                'text' => "Please input a folder name.",
                'type' => 'error'
            ];

            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}
?>


<?php

if (isset($_SESSION['message'])) {

    $message = $_SESSION['message'];
    $messageType = $message['type'];
    $messageText = $message['text'];


    echo "<p class='message $messageType'>$messageText</p>";
    unset($_SESSION['message']);
}
?>

<form method="POST" action="">
    <label for="folder_name">Folder Name:</label>
    <input type="text" id="folder_name" name="folder_name" required>
    <button type="submit" name="create_folder">Create Folder</button>
</form>

<link rel="stylesheet" href="hw3.css">