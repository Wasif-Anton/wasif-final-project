<?php
// This is password_reset.inc.php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

require_once "dbh.inc.php";

$query = "SELECT * FROM users
        WHERE reset_token_hash = :reset_token_hash";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":reset_token_hash", $token_hash, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <h1>Reset Password</h1>

    <form action="../includes/password_process_reset.inc.php" method="POST">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button>Send</button>
    </form>

</body>

</html>