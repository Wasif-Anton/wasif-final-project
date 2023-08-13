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

        if (isInputEmpty($email, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = getUserEmail($pdo, $email);

        if (isEmailWrong($result)) {
            $errors["login_incorrect"] = "Incorrect Email!";
        }

        if (!isEmailWrong($result) && isPasswordWrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect Password!";
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
