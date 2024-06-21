<?php
// register.php


session_start();
// Adjust the path if necessary
include('db.php'); // This file should contain your database connection logic

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $verification_code = bin2hex(random_bytes(16));
    // $verified = 0;

    $check_sql = "SELECT id FROM users WHERE username = ? OR email = ? OR password = ?";


    // Insert user into database
    $query = "INSERT INTO users (username, password, email, verification_code, verified) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi', $username, $password, $email, $verification_code, $verified);

    
  
            if($stmt->execute()){
                echo "user is created successfully";
            }else{
                echo "something went wrong try again";
            }

    // if ($stmt->execute()) {
    //     // Send verification email
    //     $verification_link = "http://yourdomain.com/verify.php?code=$verification_code";
          
        
    //     $mail = new PHPMailer(true);
    //     try {
    //         //Server settings
    //         $mail->isSMTP();
    //         $mail->Host = 'mail.pearlbuddy.com'; // Specify main and backup SMTP servers
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'info@pearlbuddy.com'; // SMTP username
    //         $mail->Password = 'Mammyggg1.'; // SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
    //         $mail->Port = 465; // TCP port to connect to

    //         //Recipients
    //         $mail->setFrom('no-reply@yourdomain.com', 'Library');
    //         $mail->addAddress($email, $username);

    //         // Content
    //         $mail->isHTML(true);
    //         $mail->Subject = 'Email Verification';
    //         $mail->Body    = "Please click the following link to verify your email address: <a href='$verification_link'>$verification_link</a>";

    //         $mail->send();
    //         echo 'A verification email has been sent to your email address.';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // } else {
    //     echo "Failed to register user.";
    // }
}
?>


<!-- register.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <button type="submit">Register</button>
        </form>
        <a href="login.php">Now Login here</a>

    </div>

</body>

</html>