<?php
// This is login.inc.php

// Checks if the current request method is "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";

        // -- ERROR HANDLER --
        $errors = [];

        // If both fields empty
        if (isEmailInputEmpty($email) && isPasswordInputEmpty($pwd)) {
            $errors["all_empty_input"] = "Fill in all fields!";
        }
        // If email field empty
        else if (isEmailInputEmpty($email)) {
            $errors["email_empty_input"] = "Fill in Email field!";
        }
        // If password field empty
        else if (isPasswordInputEmpty($pwd)) {
            $errors["password_empty_input"] = "Fill in Password field!";
        } 
        //If all the fileds are full
        else {

            $result = getUserEmail($pdo, $email);

            if (isEmailWrong($result)) {
                $errors["login_incorrect"] = "Incorrect Email or Password!";
            }

            if (!isEmailWrong($result) && isPasswordWrong($pwd, $result["pwd"])) {
                $errors["login_incorrect"] = "Incorrect Email or Password!";
            }
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["error_login"] = $errors;

            header("Location: ../login.php");
            die();
        }
        ///



        ///

        header("Location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect to the login page
    header("Location: ../login.php");
    die();
}
