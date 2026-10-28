<?php
session_start();
require_once "includes/bahasa.php";
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
$error = $_SESSION["login_error"] ?? "";
unset($_SESSION["login_error"]);
?>
<!DOCTYPE html>
<html lang="<?= ($_SESSION["lang"] ?? "id") === "en" ? "en" : "id" ?>">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e(t("login")) ?> | <?= e(t("app_name")) ?></title><link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">
<div class="login-language"><span><?= e(t("language")) ?></span><a href="ganti_bahasa.php?lang=id">ID</a><span>/</span><a href="ganti_bahasa.php?lang=en">EN</a></div>
<div class="login-layout">
    <section class="login-art">
        <div class="art-orb orb-one"></div><div class="art-orb orb-two"></div>
        <div class="art-content"><span class="brand-mark large">B</span>
        <h1><?= e(t("login_slogan")) ?></h1>
        <div class="art-lines"><span></span><span></span><span></span></div></div>
    </section>
    <section class="login-panel">
        <div class="login-card">
            <div class="login-logo"><span class="brand-mark">B</span><span><strong>Blush Wardrobe</strong><small><?= e(t("tagline")) ?></small></span></div>
            <h2><?= e(t("login_title")) ?></h2><p class="muted"><?= e(t("login_desc")) ?></p>
            <?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?>
            <form method="POST" action="proses_login.php" class="form-stack">
                <label><?= e(t("username")) ?><input type="text" name="username" required autocomplete="username" placeholder="<?= e(t("login_username_placeholder")) ?>"></label>
                <label><?= e(t("password")) ?><input type="password" name="password" required autocomplete="current-password" placeholder="<?= e(t("login_password_placeholder")) ?>"></label>
                <button class="btn btn-primary btn-full" type="submit"><?= e(t("login")) ?> <span>→</span></button>
            </form>
            <div class="login-note"><span>✦</span> <?= e(t("secure_access")) ?></div>
        </div>
    </section>
</div>
</body></html>
