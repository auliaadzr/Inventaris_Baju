<?php
session_start();
require_once "includes/bahasa.php";
require_once "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}
$username = trim((string)($_POST["username"] ?? ""));
$password = (string)($_POST["password"] ?? "");

if ($username === "" || $password === "") {
    $_SESSION["login_error"] = t("login_required_fields");
    header("Location: login.php");
    exit;
}
$username = trim((string)($_POST["username"] ?? ""));
$stmt = $pdo->prepare("SELECT id, username, password, nama FROM users WHERE username = :username LIMIT 1");
$stmt->execute([":username" => $username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user["password"])) {
    session_regenerate_id(true);
    $_SESSION["user"] = ["id" => $user["id"], "username" => $user["username"], "nama" => $user["nama"]];
    header("Location: index.php");
    exit;
}
$_SESSION["login_error"] = t("login_failed");
header("Location: login.php");
exit;
