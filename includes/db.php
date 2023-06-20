<?php

// Database configuration
$dsn = "mysql:host=$server_name;dbname=$db_name";
$db_username = 'root';
$db_password = '';

// Create a new PDO instance
try {
    $pdo = new PDO($dsn, $db_username, $db_password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection success!";
}
//
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
