<?php
// This is index.php

$title = 'Home Page';
require_once './includes/header.php';
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
                <span class="fs-4">AlcoholArchive</span>
            </a>
        </div>

        <!-- Middle -->
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <!-- Alcohol -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Alcohol
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Gin</a></li>
                    <li><a class="dropdown-item" href="#">Vodka</a></li>
                    <li><a class="dropdown-item" href="#">Whiskey</a></li>
                    <li><a class="dropdown-item" href="#">Tequila</a></li>
                    <li><a class="dropdown-item" href="#">Rum</a></li>
                    <li><a class="dropdown-item" href="#">Brandy</a></li>
                </ul>
            </li>
            <!-- Wine -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Wine
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Red Wine</a></li>
                    <li><a class="dropdown-item" href="#">White Wine</a></li>
                    <li><a class="dropdown-item" href="#">Rosé Wine</a></li>
                    <li><a class="dropdown-item" href="#">Sparkling Wine (Champagne)</a></li>
                </ul>
            </li>
            <!-- Beer -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beer</a>
            </li>
            <!-- Accessories -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Accessories</a>
            </li>
        </ul>

        <!-- Login button -->
        <div class="col-md-3 text-end">
            <a type="button" href="./login.php" class="btn btn-primary">Login</a>
        </div>
    </header>

</div>
<!-- Welcome -->

<!-- Logout Form -->
<form action="./includes/logout.inc.php" method="POST">
    <button class="btn btn-danger">Logout</button>
</form>

<!-- Footer -->
<?php
require_once './includes/footer.php';
?>