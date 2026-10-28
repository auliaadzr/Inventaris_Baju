<?php
session_start();
$lang = $_GET["lang"] ?? "id";
switch ($lang) {
    case "id":
        $_SESSION["lang"] = "id";
        break;
    case "en":
        $_SESSION["lang"] = "en";
        break;
    default:
        $_SESSION["lang"] = "id";
}
$tujuan = $_SERVER["HTTP_REFERER"] ?? "login.php";
$path = parse_url($tujuan, PHP_URL_PATH);
if (!$path || !str_starts_with($path, "/")) {
    $tujuan = "login.php";
}
header("Location: " . $tujuan);
exit;
