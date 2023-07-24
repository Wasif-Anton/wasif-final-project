<!-- This is signup.php -->
<!-- Header -->
<?php
$title = 'Signup';
require_once 'includes/header.php';
require_once './includes/config_session.inc.php';
require_once './includes/signup_view.inc.php';
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
                <span class="fs-4">Alcohol</span><span class="fs-4">Archive</span>
            </a>
        </div>
        <!-- Middle -->
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <!-- Welcome -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"></a>
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

                        <!-- From signup_view.inc.php -->
                        <?php
                        // function that generates and outputs the HTML code for the signup form.
                        renderSignupForm()
                        ?>

                        <button type="submit" class="btn btn-primary">Create your account</button>
                        <p class="text-gray-soft small mb-2">Already have an account? <a href="./login.php">Login</a></p>
                    </form>

                    <!-- From signup_view.inc.php -->
                    <?php
                    // Error messages
                    checkSignupErrors();
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
require_once './includes/footer.php'
?>