<?php
// process_add_book.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];

    $query = "INSERT INTO books (title, author) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $book_title, $author);
    if ($stmt->execute()) {
        echo "Book added successfully.";
    } else {
        echo "Error adding book: " . $conn->error;
    }
}
?>
