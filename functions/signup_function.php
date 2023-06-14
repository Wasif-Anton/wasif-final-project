<?php
function isSignupDataValid($name, $email, $phone, $password, $confirm_password)
{
    $errors = [];

    // Check if any field is empty

    // -- Name --
    // Check if name is empty
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Check if the name is valid (no numbers or special characters)
    $namePattern = '/[\d\x{1F300}-\x{1F6FF}\'"@#~!$%\^&\*\(\)-\+=\{\}\[\]\|;:<>,\?\/\\`]/u';
    if (preg_match($namePattern, $name)) {
        $errors[] = "Invalid name. Name should not contain numbers, emojis, or special characters.";
        // \d Any digit
        // \x{1F300}-\x{1F6FF} Unicode character(emojis)
        // `'"@#~!$%^&*-+={}|;:<>,?/\`` Special character
    }

    // -- Email --
    // Check if email is epmty
    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // -- Phone --
    // Check if phone is empty
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }

    // Check if the phone number is valid (only numbers, 10 digits)
    $phonePattern = '/^\d{10}$/';
    if (!preg_match($phonePattern, $phone)) {
        $errors[] = "Invalid phone number.";
    }

    // -- Password --
    // Check if password is empty
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check if confirm_password is empty
    if (empty($confirm_password)) {
        $errors[] = "Confirm password is required.";
    }

    // Check if the password contains spaces or emojis
    $passwordPattern = '/[\s\x{1F300}-\x{1F6FF}]/u';
    if (preg_match($passwordPattern, $password)) {
        $errors[] = "Invalid password.";
    }

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Return the array of error messages
    return $errors;
}
