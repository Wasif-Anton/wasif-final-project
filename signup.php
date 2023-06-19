<!-- Header -->
<?php
$title = 'Signup';
require_once './includes/header.php'
?>

<!-- Nav Bar -->
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <!-- Left side logo -->
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="wwhite fs-4">Alcohol</span><span class="wweet fs-4">Archive</span>
            </a>
        </div>
        <!-- Middle -->
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <!-- Welcome -->
            <li class="nav-item">
                <a class="wweet nav-link active" aria-current="page" href="#"></a>
            </li>
        </ul>
        <!-- Login button -->
        <div class="col-md-3 text-end">
            <a type="button" href="./login.php" class=" btn btn-outline-light me-2">Login</a>
        </div>
    </header>
</div>

<!-- Signup Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Signup
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form id="signup-form" action="./includes/signup.inc.php" method="POST">
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
                            <input type="date" id="date" name="date" class="form-control" min="1950-01-01" max="<?= date('Y-m-d') ?>" placeholder="Select date">
                        </div>
                        <br>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Password</strong></label>
                            <input type="password" id="password" name="password" autocomplete="new-password" class="form-control" placeholder="Enter your password">
                            <span id="passwordHelpInline" class="form-text">Must not contain spaces or emojis.</span>
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label"><strong>Confirm Password</strong></label>
                            <input type="password" id="confirm_password" name="confirm_password" autocomplete="new-password" class="form-control" placeholder="Confirm your password">
                            <div id="confirm-password-error" class="error-message"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create your account</button>
                        <p class="text-gray-soft small mb-2">Already have an account? <a href="./login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
require_once './includes/footer.php'
?>