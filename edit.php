<?php
require_once "includes/cek_login.php";
require_once "includes/bahasa.php";
require_once "config/koneksi.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    $_SESSION["flash"] = t("not_found");
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM produk WHERE id = :id");
$stmt->execute([":id" => $id]);
$produk_lama = $stmt->fetch();

if (!$produk_lama) {
    $_SESSION["flash"] = t("not_found");
    header("Location: index.php");
    exit;
}

$kategori_list = ["Kemeja", "Dress", "Kaos", "Rok", "Celana", "Hijab"];
$ukuran_list = ["S", "M", "L", "XL", "XXL", "All Size"];

$data = [
    "kode" => $produk_lama["kode"],
    "nama" => $produk_lama["nama"],
    "kategori" => $produk_lama["kategori"],
    "ukuran" => $produk_lama["ukuran"],
    "warna" => $produk_lama["warna"],
    "harga" => $produk_lama["harga"],
    "stok" => $produk_lama["stok"]
];

$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($data as $key => $value) {
        $data[$key] = trim((string)($_POST[$key] ?? ""));
    }

    if (in_array("", $data, true)) {
        $error[] = t("required");
    }

    if ($data["kode"] !== "" &&
        !preg_match('/^[A-Za-z0-9_-]{2,20}$/', $data["kode"])) {
        $error[] = t("invalid_code");
    }

    if ($data["nama"] !== "" && mb_strlen($data["nama"]) > 100) {
        $error[] = t("name_too_long");
    }

    if ($data["warna"] !== "" && mb_strlen($data["warna"]) > 30) {
        $error[] = t("color_too_long");
    }

    if ($data["harga"] !== "" &&
        (filter_var($data["harga"], FILTER_VALIDATE_INT) === false ||
        (int)$data["harga"] < 0)) {
        $error[] = t("invalid_number");
    }

    if ($data["stok"] !== "" &&
        (filter_var($data["stok"], FILTER_VALIDATE_INT) === false ||
        (int)$data["stok"] < 0)) {
        $error[] = t("invalid_number");
    }

    if (!in_array($data["kategori"], $kategori_list, true) ||
        !in_array($data["ukuran"], $ukuran_list, true)) {
        $error[] = t("invalid_category_size");
    }

    $cek = $pdo->prepare(
        "SELECT id FROM produk WHERE kode = :kode AND id <> :id"
    );
    $cek->execute([
        ":kode" => $data["kode"],
        ":id" => $id
    ]);

    if ($cek->fetch()) {
        $error[] = t("duplicate_code");
    }

    if (!$error) {
        $update = $pdo->prepare(
            "UPDATE produk
             SET kode = :kode,
                 nama = :nama,
                 kategori = :kategori,
                 ukuran = :ukuran,
                 warna = :warna,
                 harga = :harga,
                 stok = :stok
             WHERE id = :id"
        );

        $update->execute([
            ":kode" => $data["kode"],
            ":nama" => $data["nama"],
            ":kategori" => $data["kategori"],
            ":ukuran" => $data["ukuran"],
            ":warna" => $data["warna"],
            ":harga" => (int)$data["harga"],
            ":stok" => (int)$data["stok"],
            ":id" => $id
        ]);

        $_SESSION["flash"] = t("updated");
        header("Location: index.php");
        exit;
    }
}

$page_title = t("edit_title");
require "includes/header.php";
?>

<div class="form-page-head">
    <a class="back-link" href="index.php">← <?= e(t("back_to_products")) ?></a>
    <p class="muted"><?= e(t("update_intro")) ?></p>
</div>

<div class="panel form-panel">
    <?php if ($error): ?>
        <div class="alert error">
            <strong><?= e(t("check_data")) ?></strong>
            <ul>
                <?php foreach ($error as $err): ?>
                    <li><?= e($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" class="product-form">
        <div class="form-section-title">
            <span>01</span>
            <div>
                <strong><?= e(t("form_section")) ?></strong>
                <small><?= e(t("form_section_desc")) ?></small>
            </div>
        </div>

        <div class="form-grid">
            <label>
                <?= e(t("code")) ?>
                <input name="kode" required maxlength="20"
                       value="<?= e($data["kode"]) ?>">
            </label>

            <label>
                <?= e(t("name")) ?>
                <input name="nama" required maxlength="100"
                       value="<?= e($data["nama"]) ?>">
            </label>

            <label>
                <?= e(t("category")) ?>
                <select name="kategori" required>
                    <?php foreach ($kategori_list as $x): ?>
                        <option <?= $data["kategori"] === $x ? "selected" : "" ?>
                                value="<?= e($x) ?>">
                            <?= e(category_label($x)) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>
                <?= e(t("size")) ?>
                <select name="ukuran" required>
                    <?php foreach ($ukuran_list as $x): ?>
                        <option <?= $data["ukuran"] === $x ? "selected" : "" ?>
                                value="<?= e($x) ?>">
                            <?= e(size_label($x)) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>
                <?= e(t("color")) ?>
                <input name="warna" required maxlength="30"
                       value="<?= e($data["warna"]) ?>">
            </label>

            <label>
                <?= e(t("price")) ?>
                <div class="input-prefix">
                    <span><?= e(t("currency")) ?></span>
                    <input type="number" name="harga" min="0" step="1"
                           required value="<?= e($data["harga"]) ?>">
                </div>
            </label>

            <label>
                <?= e(t("stock")) ?>
                <input type="number" name="stok" min="0" step="1"
                       required value="<?= e($data["stok"]) ?>">
            </label>
        </div>

        <div class="form-actions">
            <a class="btn btn-ghost" href="index.php">
                <?= e(t("cancel")) ?>
            </a>

            <button class="btn btn-primary" type="submit">
                <?= e(t("save")) ?> <span>→</span>
            </button>
        </div>
    </form>
</div>

<?php require "includes/footer.php"; ?>
