-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 06:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_baju`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `kategori`, `ukuran`, `warna`, `harga`, `stok`, `foto`, `created_at`) VALUES
(1, 'KJ-003-M', 'Blouse Floral', 'Kemeja', 'M', 'Dusty Pink', 150000, 12, NULL, '2026-10-24 03:27:31'),
(2, 'KJ-002-L', 'Classic White Shirt', 'Kemeja', 'L', 'Putih', 175000, 8, NULL, '2026-10-24 03:27:31'),
(3, 'KS-003-M', 'Everyday Basic Tee', 'Kaos', 'M', 'Cream', 85000, 25, NULL, '2026-10-24 03:27:31'),
(4, 'DS-002-S', 'Satin Midi Dress', 'Dress', 'S', 'Mauve', 285000, 4, NULL, '2026-10-24 03:27:31'),
(5, 'RK-005-L', 'Pleated Long Skirt', 'Rok', 'L', 'Hitam', 165000, 0, NULL, '2026-10-24 03:27:31'),
(6, 'CL-001-XL', 'Wide Leg Trousers', 'Celana', 'XL', 'Beige', 220000, 7, NULL, '2026-10-24 03:27:31'),
(7, 'HB-001-AS', 'Soft Pashmina', 'Hijab', 'All Size', 'Rose', 65000, 18, NULL, '2026-10-24 03:27:31'),
(8, 'KJ-001-M', 'Linen Summer Shirt', 'Kemeja', 'M', 'Sage Green', 190000, 3, NULL, '2026-10-24 03:27:31'),
(9, 'KS-001-S', 'Ribbed Knit Top', 'Kaos', 'S', 'Lilac', 125000, 10, NULL, '2026-10-24 03:27:31'),
(10, 'DS-001-L', 'Flowy Floral Dress', 'Dress', 'L', 'Pink', 310000, 2, NULL, '2026-10-24 03:27:31'),
(11, 'KS-002-M', 'Striped', 'Kaos', 'M', 'brown', 250000, 7, NULL, '2026-10-24 06:22:28'),
(12, 'BJU-001', 'Blouse Floral', 'Kemeja', 'M', 'Dusty Pink', 150000, 12, NULL, '2026-10-28 17:06:47'),
(13, 'BJU-002', 'Classic White Shirt', 'Kemeja', 'L', 'Putih', 175000, 8, NULL, '2026-10-28 17:06:47'),
(14, 'BJU-003', 'Everyday Basic Tee', 'Kaos', 'M', 'Cream', 85000, 25, NULL, '2026-10-28 17:06:47'),
(15, 'BJU-004', 'Satin Midi Dress', 'Dress', 'S', 'Mauve', 285000, 4, NULL, '2026-10-28 17:06:47'),
(16, 'BJU-005', 'Pleated Long Skirt', 'Rok', 'L', 'Hitam', 165000, 0, NULL, '2026-10-28 17:06:47'),
(17, 'BJU-006', 'Wide Leg Trousers', 'Celana', 'XL', 'Beige', 220000, 7, NULL, '2026-10-28 17:06:47'),
(18, 'BJU-007', 'Soft Pashmina', 'Hijab', 'All Size', 'Rose', 65000, 18, NULL, '2026-10-28 17:06:47'),
(19, 'BJU-008', 'Linen Summer Shirt', 'Kemeja', 'M', 'Sage Green', 190000, 3, NULL, '2026-10-28 17:06:47'),
(20, 'BJU-009', 'Ribbed Knit Top', 'Kaos', 'S', 'Lilac', 125000, 10, NULL, '2026-10-28 17:06:47'),
(21, 'BJU-010', 'Flowy Floral Dress', 'Dress', 'L', 'Pink', 310000, 2, NULL, '2026-10-28 17:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`) VALUES
(1, 'aulia_admin', '$2y$10$MURuP6Ih4DBiCIPpf2FZY..RagoAhsMYFoAWVhCqhAKFfswM6/P36', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
