<?php
// This is password_forgot.inc.php

require '../vendor/autoload.php';

// Ensure that the email is properly validated and sanitized before using it
$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

require_once "dbh.inc.php";

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

    $mail = require_once "../mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/wasif-final-project/includes/password_reset.inc.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
}

echo "Message sent, please check your inbox.";
