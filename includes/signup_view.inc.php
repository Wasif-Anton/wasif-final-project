<?php
// This is signup_view.inc.php

declare(strict_types=1);

function renderSignupForm()
{
    echo '    
    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label"><strong>Name</strong></label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
        <div id="name-error" class="error-message"></div>
    </div>
    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label"><strong>Email</strong></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
        <small id="idHelp" class="form-text text-muted">This will be your login.</small>
    </div>
    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label"><strong>Phone Number</strong></label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
        <div id="phone-error" class="error-message"></div>
    </div>
    <!-- Date -->
    <div class="md-3 datepicker">
        <label for="date" class="form-label"><strong>Date of Birth</strong></label>
        <input type="date" id="date" name="date" class="form-control" min="1950-01-01" max="' . date('Y-m-d') . '" placeholder="Select date">
        </div>
    <br>
    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label"><strong>Password</strong></label>
        <input type="password" id="password" name="pwd" autocomplete="new-password" class="form-control" placeholder="Enter your password">
        <span id="passwordHelpInline" class="form-text">Must not contain spaces or emojis.</span>
    </div>
    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="confirm_password" class="form-label"><strong>Confirm Password</strong></label>
        <input type="password" id="confirm_password" name="confirm_password" autocomplete="new-password" class="form-control" placeholder="Confirm your password">
        <div id="confirm-password-error" class="error-message"></div>
    </div>
    ';
}

function checkSignupErrors()
{
    if (isset($_SESSION['error_signup'])) {
        $errors = $_SESSION['error_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION['error_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p Signup success! </p>';
    }
}
