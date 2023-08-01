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

// Creates a query to insert the user's data into the users table in the database
function setUser(object $pdo, $name, $email, $phone, $date, $pwd)
{
    $query = "INSERT INTO users (name, email, phone, date, pwd) VALUES (:name, :email, :phone, :date, :pwd);";
    $stmt = $pdo->prepare($query);

    // Hashing Passowrd
    $option = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $option);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();
}
