<?php
// This is login_view.inc.php

declare(strict_types=1);

// Function to render the login form
function renderLoginForm()
{
    echo '
    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label"><strong>Email</strong></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
    </div>
    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label"><strong>Password</strong></label>
        <input type="password" id="password" name="pwd" class="form-control" placeholder="Enter your password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a type="button" href="./signup.php" class="btn btn-primary">Signup</a>
    ';
}

// Function to display login errors
function checkLoginErrors()
{
}
