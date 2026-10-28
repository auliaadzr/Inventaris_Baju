<?php
require_once "includes/cek_login.php";
require_once "includes/bahasa.php";
require_once "config/koneksi.php";

$kategori_list = ["Kemeja", "Dress", "Kaos", "Rok", "Celana", "Hijab"];
$ukuran_list = ["S", "M", "L", "XL", "XXL", "All Size"];
$data = ["kode"=>"", "nama"=>"", "kategori"=>"", "ukuran"=>"", "warna"=>"", "harga"=>"", "stok"=>""];
$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($data as $key => $value) {
        $data[$key] = trim((string)($_POST[$key] ?? ""));
    }
    if (in_array("", $data, true)) $error[] = t("required");
    if ($data["kode"] !== "" && !preg_match('/^[A-Za-z0-9_-]{2,20}$/', $data["kode"])) $error[] = t("invalid_code");
    if ($data["nama"] !== "" && mb_strlen($data["nama"]) > 100) $error[] = t("name_too_long");
    if ($data["warna"] !== "" && mb_strlen($data["warna"]) > 30) $error[] = t("color_too_long");
    if ($data["harga"] !== "" && filter_var($data["harga"], FILTER_VALIDATE_INT) === false) $error[] = t("invalid_number");
    if ($data["stok"] !== "" && filter_var($data["stok"], FILTER_VALIDATE_INT) === false) $error[] = t("invalid_number");
    if (filter_var($data["harga"], FILTER_VALIDATE_INT) !== false && (int)$data["harga"] < 0) $error[] = t("invalid_number");
    if (filter_var($data["stok"], FILTER_VALIDATE_INT) !== false && (int)$data["stok"] < 0) $error[] = t("invalid_number");
    if (!in_array($data["kategori"], $kategori_list, true) || !in_array($data["ukuran"], $ukuran_list, true)) $error[] = t("invalid_category_size");
    if ($data["kode"] !== "") {
        $cek = $pdo->prepare("SELECT id FROM produk WHERE kode = :kode");
        $cek->execute([":kode"=>$data["kode"]]);
        if ($cek->fetch()) $error[] = t("duplicate_code");
    }
    if (!$error) {
            $stmt = $pdo->prepare("INSERT INTO produk (kode,nama,kategori,ukuran,warna,harga,stok) VALUES (:kode,:nama,:kategori,:ukuran,:warna,:harga,:stok)");
            $stmt->execute([":kode"=>$data["kode"], ":nama"=>$data["nama"], ":kategori"=>$data["kategori"], ":ukuran"=>$data["ukuran"], ":warna"=>$data["warna"], ":harga"=>(int)$data["harga"], ":stok"=>(int)$data["stok"]]);
            $_SESSION["flash"] = t("saved");
            header("Location: index.php"); exit;
    }
}
$page_title = t("add_title");
require "includes/header.php";
?>
<div class="form-page-head"><a class="back-link" href="index.php">← <?= e(t("back")) ?></a><p class="muted"><?= e(t("form_intro")) ?></p></div>
<div class="panel form-panel">
    <?php if ($error): ?><div class="alert error"><strong><?= e(t("check_data")) ?></strong><ul><?php foreach ($error as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
    <form method="POST" class="product-form">
        <div class="form-section-title"><span>01</span><div><strong><?= e(t("form_section")) ?></strong><small><?= e(t("form_section_desc")) ?></small></div></div>
        <div class="form-grid">
            <label><?= e(t("code")) ?><input name="kode" required maxlength="20" value="<?= e($data["kode"]) ?>" placeholder="<?= e(t("example_code")) ?>"></label>
            <label><?= e(t("name")) ?><input name="nama" required maxlength="100" value="<?= e($data["nama"]) ?>" placeholder="<?= e(t("example_name")) ?>"></label>
            <label><?= e(t("category")) ?><select name="kategori" required><option value=""><?= e(t("choose_category")) ?></option><?php foreach ($kategori_list as $x): ?><option <?= $data["kategori"]===$x?"selected":"" ?> value="<?= e($x) ?>"><?= e(category_label($x)) ?></option><?php endforeach; ?></select></label>
            <label><?= e(t("size")) ?><select name="ukuran" required><option value=""><?= e(t("choose_size")) ?></option><?php foreach ($ukuran_list as $x): ?><option <?= $data["ukuran"]===$x?"selected":"" ?> value="<?= e($x) ?>"><?= e(size_label($x)) ?></option><?php endforeach; ?></select></label>
            <label><?= e(t("color")) ?><input name="warna" required maxlength="30" value="<?= e($data["warna"]) ?>" placeholder="<?= e(t("example_color")) ?>"></label>
            <label><?= e(t("price")) ?><div class="input-prefix"><span><?= e(t("currency")) ?></span><input type="number" name="harga" min="0" step="1" required value="<?= e($data["harga"]) ?>" placeholder="150000"></div></label>
            <label><?= e(t("stock")) ?><input type="number" name="stok" min="0" step="1" required value="<?= e($data["stok"]) ?>" placeholder="20"></label>
        </div>
        <div class="form-actions"><a class="btn btn-ghost" href="index.php"><?= e(t("cancel")) ?></a><button class="btn btn-primary" type="submit"><?= e(t("save")) ?> <span>→</span></button></div>
    </form>
</div>
<?php require "includes/footer.php"; ?>
