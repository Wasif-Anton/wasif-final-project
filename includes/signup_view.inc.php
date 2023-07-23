<?php
// This is signup_view.inc.php

declare(strict_types=1);

function checkSignupErrors()
{
    if (isset($_SESSION['error_signup'])) {
        $errors = $_SESSION['error_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION['error_signup']);
    }
}
