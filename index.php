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
                    <li><a class="dropdown-item" href="drink_category/alcohol/gin.php">Gin</a></li>
                    <li><a class="dropdown-item" href="drink_category/alcohol/vodka.php">Vodka</a></li>
                    <li><a class="dropdown-item" href="drink_category/alcohol/whiskey.php">Whiskey</a></li>
                    <li><a class="dropdown-item" href="drink_category/alcohol/tequila.php">Tequila</a></li>
                </ul>
            </li>
            <!-- Wine -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Wine
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="drink_category/wine/red_wine.php">Red Wine</a></li>
                    <li><a class="dropdown-item" href="drink_category/wine/white_wine.php">White Wine</a></li>
                    <li><a class="dropdown-item" href="drink_category/wine/sparkling_wine.php">Sparkling Wine (Champagne)</a></li>
                </ul>
            </li>
            <!-- Beer -->
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="drink_category/beer.php">Beer</a>
            </li>
            <!-- Accessories -->
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="drink_category/accessories.php">Accessories</a>
            </li>
        </ul>
        <!-- Login button -->
        <div class="col-md-3 text-end">
            <a type="button" href="./login.php" class="btn btn-primary">Login</a>
        </div>
    </header>
</div>
<!-- Welcome -->
<section class="pt-4 pt-md-11">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 order-md-2">
                <!-- Right Image -->
                <img src="img/index/0.jpg" class="rounded img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            </div>
            <div class="col-12 col-md-7 col-lg-6 order-md-1 aos-init aos-animate" data-aos="fade-up">
                <!-- Heading -->
                <h1 class="display-3 text-center text-md-start">
                    Welcome to AlcoholArchive<br>
                    Buy any drink
                </h1>
                <!-- Text -->
                <p class="lead text-center text-md-start text-muted mb-6 mb-lg-8">
                    Buy it with love
                </p>
            </div>
        </div>
    </div>
</section>
<br>
<!-- Images -->
<section class="container-fluid pb-5 px-0">
    <div class="row p-0">
        <!-- First Row - -->
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/1.jpg" class="img-thumbnail">
        </div>
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/2.jpg" class="img-thumbnail">
        </div>
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/3.jpg" class="img-thumbnail">
        </div>
        <!-- Second Row - -->
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/4.jpg" class="img-thumbnail">
        </div>
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/5.jpg" class="img-thumbnail">
        </div>
        <div class="col-lg-4 col-sm-6 p-0">
            <img class="rounded img-fluid" src="img/index/6.jpg" class="img-thumbnail">
        </div>
    </div>
</section>

<!-- Logout Form -->
<form action="./includes/logout.inc.php" method="POST">
    <button class="btn btn-danger">Logout</button>
</form>

<!-- Footer -->
<?php
require_once './includes/footer.php';
?>