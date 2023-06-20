<?php

// Database configuration
$server_name = 'localhost';
$db_name = 'alcohol_archive_db';
$db_username = 'root';
$db_password = '';

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection success!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
