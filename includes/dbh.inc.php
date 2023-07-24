<?php
// This is dbh.inc.php

// Database configuration
$dsn = "mysql:host=localhost;dbname=alcohol_archive_db";
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
