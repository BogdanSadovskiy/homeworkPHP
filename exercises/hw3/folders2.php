<?php
session_start();


$folders = glob('uploads/*', GLOB_ONLYDIR); ?>
<div class="container">
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['create_folder'])) {
            createFolder();
        } elseif (isset($_POST['delete_folder'])) {
            deleteFolder();
        }

        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }


    function createFolder()
    {
        $folderName = trim($_POST['folder_name_create']);
        $directory = 'uploads/' . $folderName;

        if (!empty($folderName)) {
            if (!file_exists($directory)) {
                if (mkdir($directory, 0777, true)) {
                    $_SESSION['message'] = [
                        'text' => "Folder '$folderName' created successfully!",
                        'type' => 'success'
                    ];
                } else {
                    $_SESSION['message'] = [
                        'text' => "Cannot create folder '$folderName'.",
                        'type' => 'error'
                    ];
                }
            } else {
                $_SESSION['message'] = [
                    'text' => "Folder '$folderName' already exists.",
                    'type' => 'warning'
                ];
            }
        } else {
            $_SESSION['message'] = [
                'text' => "Please input a folder name.",
                'type' => 'error'
            ];
        }
    }


    function deleteFolder()
    {
        $folderName = trim($_POST['folder_name_delete']);
        $directory = 'uploads/' . $folderName;

        if (!empty($folderName)) {
            if (file_exists($directory)) {

                if (rmdir($directory)) {
                    $_SESSION['message'] = [
                        'text' => "Folder '$folderName' deleted successfully!",
                        'type' => 'success'
                    ];
                } else {
                    $_SESSION['message'] = [
                        'text' => "Cannot delete folder '$folderName'.",
                        'type' => 'error'
                    ];
                }
            } else {
                $_SESSION['message'] = [
                    'text' => "Folder '$folderName' does not exist.",
                    'type' => 'warning'
                ];
            }
        } else {
            $_SESSION['message'] = [
                'text' => "Please select a folder to delete.",
                'type' => 'error'
            ];
        }
    }


    if (isset($_SESSION['message']) && is_array($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $messageType = $message['type'];
        $messageText = $message['text'];


        echo "<p class='message $messageType'>$messageText</p>";


        unset($_SESSION['message']);
    }
    ?>



    <div>
        <form method="POST" action="">
            <label for="folder_name_create">Folder Name:</label>
            <input type="text" id="folder_name_create" name="folder_name_create" required>
            <button type="submit" name="create_folder">Create Folder</button>
        </form>
    </div>





    <div>
        <form method="POST" action="">
            <label for="folder_name_delete">Select Folder to Delete:</label>
            <select id="folder_name_delete" name="folder_name_delete" required>
                <option value="">-- Choose a folder --</option>
                <?php foreach ($folders as $folder): ?>
                    <option value="<?php echo basename($folder); ?>"><?php echo basename($folder); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="delete_folder">Delete Folder</button>
        </form>
    </div>
    <?php
    include "../../navigation.php"
    ?>
</div>

<link rel="stylesheet" href="../../common.css">
<link rel="stylesheet" href="hw3.css">