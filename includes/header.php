<?php
$page_title = $page_title ?? t("dashboard");
$current_page = basename($_SERVER["PHP_SELF"]);
$nama_tampilan = (string)($_SESSION["user"]["nama"] ?? "Admin");
if (strtolower(trim($nama_tampilan)) === "administrator") { $nama_tampilan = "Admin"; }
?>
<!DOCTYPE html>
<html lang="<?= ($_SESSION["lang"] ?? "id") === "en" ? "en" : "id" ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title) ?> | <?= e(t("app_name")) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="app-shell">
    <main class="main-area">
        <header class="topbar">
            <div><h1><?= e($page_title) ?></h1></div>
            <div class="topbar-actions">
                <span class="language-label"><?= e(t("language")) ?></span>
                <a class="lang-pill <?= ($_SESSION["lang"] ?? "id")==="id" ? "selected" : "" ?>" href="ganti_bahasa.php?lang=id">ID</a>
                <a class="lang-pill <?= ($_SESSION["lang"] ?? "id")==="en" ? "selected" : "" ?>" href="ganti_bahasa.php?lang=en">EN</a>
                <a class="top-logout" href="logout.php"><?= e(t("logout")) ?></a>
                <span class="top-avatar"><?= e(strtoupper(substr($_SESSION["user"]["nama"] ?? "A", 0, 1))) ?></span>
            </div>
        </header>
        <section class="content">
