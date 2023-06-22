<!-- This is login.php -->
<!-- Header -->
<?php
$title = 'Login';
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
                <a class="wweet nav-link active" aria-current="page" href="#">Welcome</a>
            </li>
        </ul>
        <!-- Login button -->
        <div class="col-md-3 text-end">
            <a type="button" href="./login.php" class=" btn btn-outline-light me-2">Login</a>
        </div>
    </header>
</div>

<!-- Login Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a type="button" href="./signup.php" class="btn ">Signup</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once './includes/footer.php'
    ?>