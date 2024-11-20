<?php
require '../../connectionStrings/mySQLConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author_id = $_POST['author_id'];
    $genre_id = $_POST['genre_id'];

    $sql = "UPDATE Books SET name = :name, price = :price, author_id = :author_id, genre_id = :genre_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'author_id' => $author_id,
        'genre_id' => $genre_id
    ]);

    echo "Book updated successfully!";
}
?>
