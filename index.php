<?php
require_once "includes/cek_login.php";
require_once "includes/bahasa.php";
require_once "config/koneksi.php";

$q = trim((string)($_GET["q"] ?? ""));
$kategori = trim((string)($_GET["kategori"] ?? ""));
$kategori_list = ["Kemeja", "Dress", "Kaos", "Rok", "Celana", "Hijab"];
$sql = "SELECT * FROM produk WHERE 1=1";
$params = [];
if ($q !== "") {
    $sql .= " AND (nama LIKE :q OR kode LIKE :q OR kategori LIKE :q OR ukuran LIKE :q OR warna LIKE :q)";
    $params[":q"] = "%" . $q . "%";
}
if ($kategori !== "" && in_array($kategori, $kategori_list, true)) {
    $sql .= " AND kategori = :kategori";
    $params[":kategori"] = $kategori;
}
$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$produk = $stmt->fetchAll();
$total_produk = (int)$pdo->query("SELECT COUNT(*) FROM produk")->fetchColumn();
$total_stok = (int)$pdo->query("SELECT COALESCE(SUM(stok),0) FROM produk")->fetchColumn();
$stok_habis = (int)$pdo->query("SELECT COUNT(*) FROM produk WHERE stok = 0")->fetchColumn();
$flash = $_SESSION["flash"] ?? "";
unset($_SESSION["flash"]);
$page_title = t("products");
$nama_tampilan = (string)($_SESSION["user"]["nama"] ?? "Admin");
if (strtolower(trim($nama_tampilan)) === "administrator") { $nama_tampilan = "Admin"; }
require "includes/header.php";
?>
<?php if ($flash): ?><div class="alert success"><?= e($flash) ?></div><?php endif; ?>
<div class="panel">
    <div class="panel-heading"><div><p class="muted"><?= e(t("manage_products_desc")) ?></p></div><div class="panel-heading-actions"><span class="count-pill"><?= count($produk) ?> <?= e(t("product_count")) ?></span><a class="btn btn-primary" href="tambah.php"><span>＋</span> <?= e(t("add_product")) ?></a></div></div>
    <form method="GET" action="index.php" class="search-form">
        <div class="search-input"><span>⌕</span><input type="search" name="q" value="<?= e($q) ?>" placeholder="<?= e(t("search_placeholder")) ?>"></div>
        <select name="kategori"><option value=""><?= e(t("all_categories")) ?></option><?php foreach ($kategori_list as $kat): ?><option value="<?= e($kat) ?>" <?= $kategori === $kat ? "selected" : "" ?>><?= e(category_label($kat)) ?></option><?php endforeach; ?></select>
        <button class="btn btn-soft" type="submit"><?= e(t("search")) ?></button>
        <?php if ($q !== "" || $kategori !== ""): ?><a class="btn btn-ghost" href="index.php"><?= e(t("cancel")) ?></a><?php endif; ?>
    </form>
    <div class="table-wrap"><table><thead><tr><th><?= e(t("code")) ?></th><th><?= e(t("name")) ?></th><th><?= e(t("category")) ?></th><th><?= e(t("size")) ?></th><th><?= e(t("color")) ?></th><th><?= e(t("price")) ?></th><th><?= e(t("stock")) ?></th><th><?= e(t("manage")) ?></th></tr></thead><tbody>
    <?php if (!$produk): ?><tr><td colspan="8" class="empty-state"><strong><?= e(($q !== "" || $kategori !== "") ? t("no_results") : t("empty")) ?></strong><small><?= e(t("empty_hint")) ?></small></td></tr>
    <?php else: foreach ($produk as $p): ?><tr>
        <td><span class="code-badge"><?= e($p["kode"]) ?></span></td>
        <td><div class="product-name"><strong><?= e($p["nama"]) ?></strong></div></td>
        <td><?= e(category_label($p["kategori"])) ?></td><td><span class="size-pill"><?= e(size_label($p["ukuran"])) ?></span></td><td><?= e($p["warna"]) ?></td>
        <td class="price"><?= e(t("currency")) ?> <?= number_format((int)$p["harga"], 0, ",", ".") ?></td>
        <td><?php if ((int)$p["stok"] === 0): ?><span class="stock-badge empty"><?= e(t("out_stock")) ?></span><?php elseif ((int)$p["stok"] <= 5): ?><span class="stock-badge low"><?= (int)$p["stok"] ?> · <?= e(t("stock_warning")) ?></span><?php else: ?><span class="stock-badge good"><?= (int)$p["stok"] ?> <?= e(t("available")) ?></span><?php endif; ?></td>
        <td><div class="action-group"><a class="action-btn edit" href="edit.php?id=<?= (int)$p["id"] ?>"><?= e(t("edit")) ?></a><form method="POST" action="hapus.php" onsubmit="return confirm('<?= e(t("confirm_delete")) ?>')"><input type="hidden" name="id" value="<?= (int)$p["id"] ?>"><button class="action-btn delete" type="submit"><?= e(t("delete")) ?></button></form></div></td>
    </tr><?php endforeach; endif; ?>
    </tbody></table></div>
</div>
<?php require "includes/footer.php"; ?>
