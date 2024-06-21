<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to the Student Dashboard</h1>
    <div>
        <h2>Search Book</h2>
        <!-- Add search book functionality here -->
    </div>
    <div>
        <h2>Borrow Book</h2>
        <!-- Add borrow book functionality here -->
    </div>
</body>
</html>
