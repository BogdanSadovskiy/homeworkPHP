<?php
require '../../connectionStrings/mySQLConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author_id = $_POST['author_id'];
    $genre_id = $_POST['genre_id'];

    $sql = "INSERT INTO Books (name, price, author_id, genre_id) VALUES (:name, :price, :author_id, :genre_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'price' => $price,
        'author_id' => $author_id,
        'genre_id' => $genre_id
    ]);

    echo "Book added successfully!";
}
?>
