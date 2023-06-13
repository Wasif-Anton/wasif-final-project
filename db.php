<?php

// Creating a connection to our database
$server_name  = 'localhost';
$db_username = "root";
$db_password = '';
$db_name = 'alcohol_archive_db';

// Create connection
$conn = new mysqli($server_name, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    print "could not connect to database ";
    die("Connection failed: " . mysqli_connect_error());
}
print "Connection Success!";
