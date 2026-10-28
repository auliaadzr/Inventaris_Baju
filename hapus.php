<?php
require_once "includes/cek_login.php";
require_once "includes/bahasa.php";
require_once "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    $_SESSION["flash"] = t("not_found");
    header("Location: index.php");
    exit;
}
$stmt = $pdo->prepare("SELECT foto FROM produk WHERE id = :id");
$stmt->execute([":id"=>$id]);
$produk = $stmt->fetch();
if (!$produk) {
    $_SESSION["flash"] = t("not_found");
} else {
    $del = $pdo->prepare("DELETE FROM produk WHERE id = :id");
    $del->execute([":id"=>$id]);
    if (!empty($produk["foto"])) {
        $foto = __DIR__ . "/uploads/" . basename($produk["foto"]);
        if (is_file($foto)) unlink($foto);
    }
    $_SESSION["flash"] = t("deleted");
}
header("Location: index.php");
exit;
