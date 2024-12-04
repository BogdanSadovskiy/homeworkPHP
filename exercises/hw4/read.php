<?php
require '../../connectionStrings/mySQLConnection.php';

$sql = "SELECT Books.id, Books.name, Books.price, Authors.name AS author_name, Genres.name AS genre_name
        FROM Books
        LEFT JOIN Authors ON Books.author_id = Authors.id
        LEFT JOIN Genres ON Books.genre_id = Genres.id";
$stmt = $conn->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) {
    echo "ID: {$book['id']} | Name: {$book['name']} | Price: {$book['price']} | Author: {$book['author_name']} | Genre: {$book['genre_name']}<br>";
    include "Forms/feedback.php";
}
