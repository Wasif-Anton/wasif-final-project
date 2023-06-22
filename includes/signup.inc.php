<!-- This is signup.unc.php -->
<?php
require_once '../functions/signup_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $date = htmlspecialchars($_POST["date"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);

    // Validate the signup data (signup_function.php)
    $errors = isSignupDataValid($name, $email, $phone, $date, $password, $confirm_password);

    if (empty($errors)) {
        // Check if the user is 18 years old or older
        $dob = new DateTime($date);
        $today = new DateTime();
        $age = $today->diff($dob)->y;

        if ($age < 18) {
            // User is underage, redirect to index page
            header("Location: ../index.php");
            exit();
        }
        // Data is valid, proceed with signup
        header("Location: ../login.php");
        exit();
    } else {
        // Display error messages to the user
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }

        // Delay redirect to index page for 3 seconds
        echo '<script>
            setTimeout(function() {
                window.location.href = "../index.php";
            }, 4000);
        </script>';
    }
} else {
    header("Location: ../signup.php");
    exit();
}
