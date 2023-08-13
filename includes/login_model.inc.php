<?php
// This is login_model.inc.php

declare(strict_types=1);

// Check if the user exists in the databsse
function getUserEmail(object $pdo, string $email)
{
    $query = "SELECT * 
              FROM users 
              WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    // Grab all the results from the databse
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
