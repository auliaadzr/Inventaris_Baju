<?php
// File ini dipanggil setelah session_start().
$kamus = [
    "id" => [
        "app_name"=>"Blush Wardrobe", "tagline"=>"Sistem Inventaris Toko Baju",
        "login"=>"Masuk", "logout"=>"Keluar", "username"=>"Username", "password"=>"Password",
        "login_title"=>"Selamat Datang", "login_desc"=>"Masuk untuk mengelola inventaris toko.",
        "dashboard"=>"Dashboard", "products"=>"Data Produk", "add_product"=>"Tambah Produk",
        "search"=>"Cari", "search_placeholder"=>"Cari nama, kode, kategori, ukuran, warna...",
        "category"=>"Kategori", "all_categories"=>"Semua kategori", "code"=>"Kode Produk",
        "name"=>"Nama Produk", "size"=>"Ukuran", "color"=>"Warna", "price"=>"Harga",
        "stock"=>"Stok", "photo"=>"Foto Produk", "action"=>"Aksi", "manage"=>"Kelola", "edit"=>"Edit",
        "delete"=>"Hapus", "save"=>"Simpan", "cancel"=>"Batal", "back"=>"Kembali",
        "add_title"=>"Tambah Produk", "edit_title"=>"Edit Produk", "welcome"=>"Halo",
        "total_products"=>"Total Produk", "total_stock"=>"Total Stok", "out_stock"=>"Produk Habis",
        "available"=>"Tersedia", "empty"=>"Belum ada data produk.", "confirm_delete"=>"Yakin ingin menghapus produk ini?",
        "required"=>"Semua kolom wajib diisi kecuali foto.", "invalid_number"=>"Harga dan stok harus berupa bilangan bulat minimal 0.",
        "duplicate_code"=>"Kode produk sudah digunakan.", "saved"=>"Produk berhasil ditambahkan.",
        "updated"=>"Produk berhasil diperbarui.", "deleted"=>"Produk berhasil dihapus.",
        "not_found"=>"Produk tidak ditemukan.", "login_failed"=>"Username atau password salah.",
        "login_required"=>"Silakan masuk terlebih dahulu.", "invalid_file"=>"Foto harus JPG, PNG, atau GIF dengan ukuran maksimal 2 MB.",
        "upload_failed"=>"Foto gagal diunggah.", "language"=>"Bahasa", "no_results"=>"Tidak ada produk yang cocok.",
        "currency"=>"Rp", "stock_warning"=>"Stok menipis", "footer"=>"Inventaris sederhana, rapi, dan terkelola.",
        "manage_products_desc"=>"Kelola daftar pakaian dan stok saat ini.", "product_count"=>"produk",
        "empty_hint"=>"Coba ubah kata kunci atau tambahkan produk baru.", "back_to_products"=>"Kembali ke Data Produk",
        "form_intro"=>"Lengkapi detail pakaian yang akan dimasukkan ke inventaris.",
        "update_intro"=>"Perbarui informasi produk yang dipilih.", "form_section"=>"Informasi Produk",
        "form_section_desc"=>"Identitas utama produk pakaian.", "check_data"=>"Periksa kembali data Anda:",
        "choose_category"=>"Pilih kategori", "choose_size"=>"Pilih ukuran", "example_code"=>"Contoh: BJU-001",
        "example_name"=>"Contoh: Blouse Floral", "example_color"=>"Contoh: Dusty Pink",
        "login_username_placeholder"=>"Masukkan username", "login_password_placeholder"=>"Masukkan password",
        "login_required_fields"=>"Username dan password wajib diisi.", "secure_access"=>"Akses aman untuk administrator toko",
        "invalid_code"=>"Kode hanya boleh berisi huruf, angka, tanda - atau _ (2–20 karakter).",
        "name_too_long"=>"Nama produk maksimal 100 karakter.", "color_too_long"=>"Warna maksimal 30 karakter.",
        "invalid_category_size"=>"Pilihan kategori atau ukuran tidak valid.", "product"=>"Produk",
        "cat_shirt"=>"Kemeja", "cat_dress"=>"Dress", "cat_tshirt"=>"Kaos", "cat_skirt"=>"Rok",
        "cat_pants"=>"Celana", "cat_hijab"=>"Hijab", "size_all"=>"All Size", "login_slogan"=>"Gaya yang sederhana."
    ],
    "en" => [
        "app_name"=>"Blush Wardrobe", "tagline"=>"Clothing Store Inventory System",
        "login"=>"Sign in", "logout"=>"Log out", "username"=>"Username", "password"=>"Password",
        "login_title"=>"Welcome Back", "login_desc"=>"Sign in to manage store inventory.",
        "dashboard"=>"Dashboard", "products"=>"Product Data", "add_product"=>"Add Product",
        "search"=>"Search", "search_placeholder"=>"Search name, code, category, size, color...",
        "category"=>"Category", "all_categories"=>"All categories", "code"=>"Product Code",
        "name"=>"Product Name", "size"=>"Size", "color"=>"Color", "price"=>"Price",
        "stock"=>"Stock", "photo"=>"Product Photo", "action"=>"Action", "manage"=>"Manage", "edit"=>"Edit",
        "delete"=>"Delete", "save"=>"Save", "cancel"=>"Cancel", "back"=>"Back",
        "add_title"=>"Add Product", "edit_title"=>"Edit Product", "welcome"=>"Hello",
        "total_products"=>"Total Products", "total_stock"=>"Total Stock", "out_stock"=>"Out of Stock",
        "available"=>"Available", "empty"=>"No product data yet.", "confirm_delete"=>"Are you sure you want to delete this product?",
        "required"=>"All fields are required except photo.", "invalid_number"=>"Price and stock must be whole numbers of at least 0.",
        "duplicate_code"=>"Product code is already in use.", "saved"=>"Product added successfully.",
        "updated"=>"Product updated successfully.", "deleted"=>"Product deleted successfully.",
        "not_found"=>"Product not found.", "login_failed"=>"Incorrect username or password.",
        "login_required"=>"Please sign in first.", "invalid_file"=>"Photo must be JPG, PNG, or GIF and no larger than 2 MB.",
        "upload_failed"=>"Photo upload failed.", "language"=>"Language", "no_results"=>"No matching products found.",
        "currency"=>"IDR", "stock_warning"=>"Low stock", "footer"=>"Simple, neat, and organized inventory.",
        "manage_products_desc"=>"Manage your clothing list and current stock.", "product_count"=>"products",
        "empty_hint"=>"Try changing your search term or add a new product.", "back_to_products"=>"Back to Product Data",
        "form_intro"=>"Complete the clothing details to add them to inventory.",
        "update_intro"=>"Update the information for the selected product.", "form_section"=>"Product Information",
        "form_section_desc"=>"Main identity details of the clothing product.", "check_data"=>"Please check your information:",
        "choose_category"=>"Choose a category", "choose_size"=>"Choose a size", "example_code"=>"Example: BJU-001",
        "example_name"=>"Example: Floral Blouse", "example_color"=>"Example: Dusty Pink",
        "login_username_placeholder"=>"Enter username", "login_password_placeholder"=>"Enter password",
        "login_required_fields"=>"Username and password are required.", "secure_access"=>"Secure access for store administrators",
        "invalid_code"=>"Code may contain only letters, numbers, hyphens, or underscores (2–20 characters).",
        "name_too_long"=>"Product name must not exceed 100 characters.", "color_too_long"=>"Color must not exceed 30 characters.",
        "invalid_category_size"=>"The selected category or size is invalid.", "product"=>"Product",
        "cat_shirt"=>"Shirt", "cat_dress"=>"Dress", "cat_tshirt"=>"T-shirt", "cat_skirt"=>"Skirt",
        "cat_pants"=>"Trousers", "cat_hijab"=>"Hijab", "size_all"=>"One Size", "login_slogan"=>"Style made simple."
    ]
];
function t($key) {
    global $kamus;
    $lang = $_SESSION["lang"] ?? "id";
    return $kamus[$lang][$key] ?? $key;
}
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}

function category_label($category) {
    $keys = ["Kemeja"=>"cat_shirt", "Dress"=>"cat_dress", "Kaos"=>"cat_tshirt", "Rok"=>"cat_skirt", "Celana"=>"cat_pants", "Hijab"=>"cat_hijab"];
    return isset($keys[$category]) ? t($keys[$category]) : $category;
}
function size_label($size) {
    return $size === "All Size" ? t("size_all") : $size;
}
