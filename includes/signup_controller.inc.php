<?php
// This is signup_controller.inc.php

declare(strict_types=1);

// Will check if any of the input fields are empty
// If any of the fields are empty, the function will return true. Otherwise, the function will return false
function isInputEmpty($name, $email, $phone, $date, $pwd, $confirm_password)
{
    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($pwd) || empty($confirm_password)) {
        return true; // There is an empty filed
    } else {
        return false; // All fileds are full
    }
}

// -- Name --
// Will return true if the name is not valid
function isNameInvalid($name)
{
    $namePattern = '/[\d\x{1F300}-\x{1F6FF}\'"@#~!$%\^&\*\(\)-\+=\{\}\[\]\|;:<>,\?\/\\`]/u';
    // (no numbers or special characters)
    // \d -- Any digit
    // \x{1F300}-\x{1F6FF} -- Unicode character(emojis)
    // `'"@#~!$%^&*-+={}|;:<>,?/\`` -- Special character

    if (preg_match($namePattern, $name)) {
        return true; // Name is not right
    } else {
        return false; // Name is right
    }
}

// -- Email --
// Will return true if the email address is not valid
function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Will check if the email address is already registered in the database
// If the email address is already registered, the function will return true. Otherwise, the function will return false
function isEmailRegistered(object $pdo, $email)
{
    // getEmail is a from signup_model.inc.php
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

// -- Phone --
// Will check if the phone number matches the regular expression /^[0-9]{10}$/
// If the phone number does not match the regular expression, the function will return true. Otherwise, the function will return false
function isPhoneInvalid($phone)
{
    $phonePattern = '/^[0-9]{10}$/';

    if (!preg_match($phonePattern, $phone)) {
        return true;
    } else {
        return false;
    }
}

// Will check if the phone number is already registered in the database
// If the phone number is already registered, the function will return true. Otherwise, the function will return false
function isPhoneRegistered(object $pdo, $phone)
{
    // getPhone is a from signup_model.inc.php
    if (getPhone($pdo, $phone)) {
        return true;
    } else {
        return false;
    }
}

// -- Date --
// If the user's age is less than the underage age limit, the function returns true. Otherwise, the function returns false
function isUnderage($date)
{
    $birthdate = strtotime($date);
    $today = time();
    $ageInSeconds = $today - $birthdate;
    $ageInYears = floor($ageInSeconds / (365 * 24 * 60 * 60)); // Approximate age in years

    $underageAgeLimit = 18;

    if ($ageInYears < $underageAgeLimit) {
        return true; // User is underage
    } else {
        return false; // User is not underage
    }
}

// -- Password --
function isPasswordValid($password)
{
    // Check for spaces
    if (strpos($password, ' ') !== false) {
        return true; // Password contains spaces
    }

    // Check for emojis (Unicode characters in the range of emojis)
    $emojiPattern = '/[\x{1F300}-\x{1F6FF}]/u';
    if (preg_match($emojiPattern, $password)) {
        return true; // Password contains emojis
    }

    return false; // Password is valid (no spaces or emojis)
}

// Will check if the password and confirm password fields match
// If the passwords match, the function will return false. Otherwise, the function will return true
function doPasswordsMatch($password, $confirm_password)
{
    return $password !== $confirm_password;
}
