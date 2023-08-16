<?php
// This is login_controller.inc.php

declare(strict_types=1);

function isEmailInputEmpty($email)
{
    if (empty($email)) {
        return true;
    } else {
        return false;
    }
}

function isPasswordInputEmpty($pwd)
{
    if (empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

/*
function isInputEmpty($email, $pwd)
{
    // Check if the email and password are empty
    if (empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function isAllInputEmpty($email, $pwd)
{
    if (empty($email) && empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

*/

function isEmailWrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

// If password wrong it will return true
function isPasswordWrong(string $pwd, string $hashPwd)
{
    if (!password_verify($pwd, $hashPwd)) {
        return true;
    } else {
        return false;
    }
}
