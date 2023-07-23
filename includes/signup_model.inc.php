<?php
// This is signup_model.inc.php

declare(strict_types=1);

// Will check if the email address is already registered in the database.
// If the email address is already registered, the function will return the email address. Otherwise, the function will return null.
function getEmail(object $pdo, $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


// Will check if the phone number is already registered in the database.
// If the phone number is already registered, the function will return the phone number. Otherwise, the function will return null.
function getPhone($pdo, $phone)
{
    $query = "SELECT phone FROM users WHERE phone = :phone;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
