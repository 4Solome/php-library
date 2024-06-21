<?php
// verify.php
session_start();
include('db.php'); // This file should contain your database connection logic

if (isset($_GET['code'])) {
    $verification_code = $_GET['code'];

    // Verify the user
    $query = "UPDATE users SET verified = 1 WHERE verification_code = ? AND verified = 0";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $verification_code);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Your email has been verified successfully.";
    } else {
        echo "Invalid verification link or your email is already verified.";
    }
} else {
    echo "No verification code provided.";
}
?>
