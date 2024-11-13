<?php




$directory = 'uploads/';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $folderName = trim($_POST['folder_name_delete']);
    $folderPath = $directory . $folderName;

    if (!empty($folderName) && file_exists($folderPath)) {
        
        if (rmdir($folderPath)) {
            $_SESSION['message'] = "Folder '$folderName' deleted successfully!";
        } else {
            $_SESSION['message'] = "Unable to delete folder '$folderName'. Please ensure it's empty.";
        }
    } else {
        $_SESSION['message'] = "Invalid folder selected.";
    }

    
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}


$folders = array_filter(glob($directory . '*'), 'is_dir');
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Folder</title>
    <link rel="stylesheet" href="../../common.css">
</head>
<body>

    <div class="container">
        <h1>Select a Folder to Delete</h1>

      
        <form method="POST">
            <label for="folder_name_delete">Select Folder:</label>
            <select id="folder_name_delete" name="folder_name_delete" required>
                <option value="">-- Choose a folder --</option>
                <?php foreach ($folders as $folder): ?>
                    <option value="<?php echo basename($folder); ?>"><?php echo basename($folder); ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Delete Folder</button>
        </form>

      
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>{$_SESSION['message']}</p>";
            
            unset($_SESSION['message']);
        }
        ?>
    </div>

</body>
</html>
