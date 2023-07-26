<?php
// This is signup.inc.php

// Checks if the current request method is "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = ($_POST["name"]);
    $email = ($_POST["email"]);
    $phone = ($_POST["phone"]);
    $date = ($_POST["date"]);
    $pwd = ($_POST["pwd"]);
    $confirm_password = ($_POST["confirm_password"]);

    try {
        require_once "dbh.inc.php"; // Include the database connection file
        require_once "signup_model.inc.php"; // Store data + retriveing
        require_once "signup_controller.inc.php"; // Take inputs from user

        // -- ERROR HANDLER --
        $errors = [];

        if (isInputEmpty($name, $email, $phone, $date, $pwd, $confirm_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (isNameInvalid($name)) {
            $errors["invalid_name"] = "Invalid name!";
        }
        if (isEmailInvalid($email)) {
            $errors["invalid_email"] = "Invalid email!";
        }
        if (isEmailRegistered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }
        if (isPhoneInvalid($phone)) {
            $errors["invalid_phone"] = "Invalid phone!";
        }
        if (isPhoneRegistered($pdo, $phone)) {
            $errors["phone_used"] = "Phone already registered!";
        }
        if (isUnderage($date)) {
            $errors["user_underage"] = "You must be at least 18 years old to sign up!";
        }
        if (isPasswordValid($pwd)) {
            $errors["invalid_password"] = "Password must not contain spaces or emojis!";
        }
        if (doPasswordsMatch($pwd, $confirm_password)) {
            $errors["password_mismatch"] = "Passwords do not match!";
        }

        require_once "config_session.inc.php";

        // If it return any of the error it will return the user to the signup page with the error message
        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            header("Location: ../signup.php");
            die();
        }

        // Call the createUser function from signup_controller.inc.php to process the signup
        createUser($pdo, $name, $email, $phone, $date, $pwd);
        header("Location: ../login.php?signup=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect to the signup page
    header("Location: ../signup.php");
    die();
}
