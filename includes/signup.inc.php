<?php
require_once '../functions/signup_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);




    // Validate the signup data
    $errors = isSignupDataValid($name, $email, $phone, $password, $confirm_password);

    if (empty($errors)) {
        // Data is valid, proceed with signup
        header("Location: ../login.php");
        exit();
    }
    //
    else {
        // Display error messages to the user
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
//
else {
    header("Location: ../signup.php");
    exit();
}
