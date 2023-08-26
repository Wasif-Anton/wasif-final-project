<?php
// This is password_reset.inc.php

$title = "Reset Password";
require_once "./includes/header.php";
require_once "./includes/dbh.inc.php";

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$query = "SELECT * 
          FROM users
          WHERE reset_token_hash = :reset_token_hash";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":reset_token_hash", $token_hash, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    echo '<p class="alert alert-danger" role="alert">Token not found</p>';
    die();
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    echo '<p class="alert alert-danger" role="alert">Token has expired</p>';
    die();
}
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
                    Reset Password
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="./includes/password_reset.inc.php" method="POST">
                        <!-- Token -->
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                        <!-- New password -->
                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>New password</strong></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="New password">
                        </div>
                        <!-- Repeat password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><strong>Repeat password</strong></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repeat password">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once './includes/footer.php'
    ?>