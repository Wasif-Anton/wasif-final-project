<?php
// This is password_forgot.php

$title = "Forgot Password";
require_once './includes/header.php';
require './vendor/autoload.php';
?>

<!-- Nav Bar -->
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Alcohol</span><span class="fs-4">Archive</span>
            </a>
        </div>
    </header>
</div>

<!-- Password Reset Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Password Reset
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="./includes/password_forgot.inc.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email</strong></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once './includes/footer.php'
    ?>