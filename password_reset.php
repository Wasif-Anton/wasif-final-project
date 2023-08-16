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

<h1>Reset Password</h1>

<form action="./includes/password_reset.inc.php" method="POST">

    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <label for="password">New password</label>
    <input type="password" id="password" name="password">

    <label for="password_confirmation">Repeat password</label>
    <input type="password" id="password_confirmation" name="password_confirmation">

    <button>Send</button>
</form>



<!-- Footer -->
<?php
require_once './includes/footer.php'
?>