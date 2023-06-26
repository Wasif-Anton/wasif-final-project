<!-- This is signup.inc.php -->
<?php
require_once '../functions/signup_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $date = htmlspecialchars($_POST["date"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);

    // Validate the signup data (signup_function.php)
    $errors = isSignupDataValid($name, $email, $phone, $date, $pwd, $confirm_password);

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
        try {
            require_once "../includes/db.php";

            $query = "INSERT INTO users (name, email, phone, date, pwd) VALUES (?, ?, ?, ?, ?);";

            $stmt = $pdo->prepare($query);
            $stmt->execute([$name, $email, $phone, $date, $pwd]);

            $pdo = null;
            $stmt = null;

            // Redirect to the login page
            header("Location: ../login.php");
            exit();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        // Display error messages to the user
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }

        // Delay redirect to index page for 3 seconds
        echo '<script>
            setTimeout(function() {
                window.location.href = "../signup.php";
            }, 4000);
        </script>';
    }
} else {
    // Redirect to the signup page
    header("Location: ../signup.php");
    exit();
}
