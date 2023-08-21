<?php
// This is password_forgot.inc.php

$title = "Sending Email - Loading";
require_once '../includes/header.php';
require_once "../includes/dbh.inc.php";
require '../vendor/autoload.php';

// Ensure that the email is properly validated and sanitized before using it
$email = $_POST["email"];
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$query = "UPDATE users
          SET reset_token_hash = :token_hash,
              reset_token_expires_at = :expiry
          WHERE email = :email";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":token_hash", $token_hash);
$stmt->bindParam(":expiry", $expiry);
$stmt->bindParam(":email", $email);
$stmt->execute();

if ($stmt->rowCount()) {

    $mail = require_once "../includes/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/wasif-final-project/password_reset.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo '<p class="alert alert-warning" role="alert"> Message could not be sent. Mailer error: {$mail->ErrorInfo} </p>';
        echo '<script>
                    setTimeout(function() 
                    {
                        window.location.href = "../index.php";
                    }, 5000);
              </script>';
    }
}

echo '<p class="alert alert-success" role="alert"> Message sent, please check your inbox.</p>';
echo '<script>
            setTimeout(function() 
            {
                window.location.href = "../index.php";
            }, 5000);
     </script>';
