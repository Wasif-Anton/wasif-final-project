<?php
function isSignupDataValid($name, $email, $phone, $date, $password, $confirm_password)
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
    // Check if email is empty
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    // Check if the email is valid
    else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }


    // -- Phone --
    // Check if phone is empty
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }
    // Check if the phone number is valid (only numbers, 10 digits)
    else if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Invalid phone number.";
    }


    // -- Date --
    // Check if date is empty
    if (empty($date)) {
        $errors[] = "Date of birth is required.";
    }
    //
    else {
        // Check if the date is within the valid range
        $minDate = '1950-01-01';
        $maxDate = date('Y-m-d'); // Set the maximum date to today
        if ($date < $minDate || $date > $maxDate) {
            $errors[] = "Invalid date of birth. Please select a date between $minDate and $maxDate.";
        }
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
