-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2025 at 11:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_kafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detil_nota`
--

CREATE TABLE `detil_nota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nota` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detil_nota`
--

INSERT INTO `detil_nota` (`id`, `id_nota`, `id_produk`, `jumlah`, `harga`, `subtotal`, `diskon`) VALUES
(6, 12, 68, 1, 10000, 10000, 0),
(7, 12, 66, 1, 15000, 15000, 0),
(8, 12, 1, 1, 10000, 10000, 0),
(9, 13, 8, 1, 10000, 10000, 0),
(10, 14, 60, 1, 15000, 15000, 0),
(11, 15, 8, 1, 10000, 10000, 10000),
(12, 15, 64, 1, 15000, 15000, 15000),
(13, 15, 74, 1, 10000, 10000, 10000),
(14, 16, 46, 1, 10000, 10000, 0),
(15, 16, 68, 3, 10000, 30000, 0),
(16, 16, 54, 1, 16000, 16000, 0),
(17, 16, 8, 1, 10000, 10000, 0),
(18, 17, 74, 1, 10000, 10000, 0),
(19, 17, 67, 1, 15000, 15000, 0),
(20, 17, 50, 1, 10000, 10000, 10000),
(21, 18, 64, 1, 15000, 15000, 0),
(22, 18, 66, 1, 15000, 15000, 0),
(23, 18, 46, 1, 10000, 10000, 10000),
(24, 19, 8, 1, 10000, 10000, 0),
(25, 20, 66, 1, 15000, 15000, 0),
(26, 21, 46, 1, 10000, 10000, 10000),
(27, 21, 8, 3, 10000, 30000, 0),
(28, 21, 64, 1, 15000, 15000, 0),
(29, 21, 45, 1, 12000, 12000, 0),
(30, 22, 70, 2, 5000, 10000, 0),
(31, 23, 64, 1, 15000, 15000, 0),
(32, 23, 75, 1, 15000, 15000, 0),
(33, 23, 21, 1, 18000, 18000, 0),
(34, 23, 32, 1, 17000, 17000, 0),
(35, 23, 68, 1, 10000, 10000, 0),
(36, 23, 60, 3, 15000, 45000, 0),
(37, 23, 8, 1, 10000, 10000, 0),
(38, 23, 66, 2, 15000, 30000, 0),
(39, 23, 25, 3, 15000, 45000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detil_produk`
--

CREATE TABLE `detil_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL,
  `hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `status`) VALUES
(1, 'Roti Pisang', 1),
(2, 'Pisang', 1),
(3, 'Snack', 1),
(4, 'Coffee', 1),
(5, 'Non Coffee', 1),
(6, 'Roti Manis', 1),
(7, 'Roti Asin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_11_06_130222_kategori', 1),
(2, '2025_11_06_130426_produk', 2),
(3, '2025_11_06_130629_supplier', 3),
(4, '2025_11_06_130810_user', 4),
(5, '2025_11_06_132150_produkk', 5),
(6, '2025_11_06_132245_produkkk', 6),
(7, '2025_11_06_132307_detilprodukkk', 7),
(8, '2025_11_06_132454_nota', 8),
(9, '2025_11_06_134122_detailprodukkkk', 9),
(10, '2025_11_06_134150_detailnotaaa', 9),
(11, '2025_11_06_134240_restock', 10),
(12, '2025_11_06_134555_detailbeli', 11),
(13, '2025_11_06_141015_addstatus', 12),
(14, '2025_11_15_084731_adnip', 13),
(15, '2025_11_15_131708_adstok', 14),
(16, '2025_11_17_121646_adnama', 15),
(17, '2025_11_18_151610_hpshpp', 16),
(18, '2025_11_19_154607_stat', 17),
(19, '2025_11_22_212443_create_cache_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kasir` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT '2025-11-06 13:29:10',
  `inv_num` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `metode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `id_kasir`, `tanggal`, `inv_num`, `total`, `bayar`, `kembali`, `status`, `metode`) VALUES
(12, 1, '2025-11-20 19:02:24', 'INV-20251120-001', 35000, 50000, 15000, 'lunas', 'cash'),
(13, 1, '2025-11-22 04:00:04', 'INV-20251122-002', 10000, 10000, 0, 'lunas', 'cash'),
(14, 1, '2025-11-22 04:00:32', 'INV-20251122-003', 15000, 15000, 0, 'lunas', 'cash'),
(15, 1, '2025-11-22 04:02:16', 'INV-20251122-004', 0, 0, 0, 'lunas', 'cash'),
(16, 1, '2025-11-22 04:03:35', 'INV-20251122-005', 66000, 70000, 4000, 'lunas', 'cash'),
(17, 1, '2025-11-22 04:04:29', 'INV-20251122-006', 25000, 50000, 25000, 'lunas', 'cash'),
(18, 1, '2025-11-22 04:05:27', 'INV-20251122-007', 30000, 30000, 0, 'lunas', 'cash'),
(19, 1, '2025-11-22 04:05:57', 'INV-20251122-008', 10000, 10000, 0, 'lunas', 'cash'),
(20, 1, '2025-11-22 04:06:28', 'INV-20251122-009', 15000, 15000, 0, 'lunas', 'cash'),
(21, 1, '2025-11-22 04:07:57', 'INV-20251122-010', 57000, 70000, 7000, 'lunas', 'cash'),
(22, 1, '2025-11-22 04:08:25', 'INV-20251122-011', 10000, 10000, 0, 'lunas', 'cash'),
(23, 1, '2025-11-05 00:00:00', 'INV-20251122-012', 205000, 205000, 0, 'lunas', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Kode` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `gambar` varchar(255) DEFAULT NULL,
  `id_kategori` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `Kode`, `harga`, `status`, `gambar`, `id_kategori`, `deskripsi`, `stok`) VALUES
(1, 'Robusta', NULL, 10000, 1, NULL, 4, NULL, 0),
(8, 'Arabica', NULL, 10000, 1, NULL, 4, NULL, 0),
(9, 'Roti Pisang Keju Kacang Coklat', NULL, 19000, 1, NULL, 1, NULL, 0),
(10, 'Roti Keju Blueberry Coklat', NULL, 18000, 1, NULL, 1, NULL, 0),
(11, 'Roti Pisang Keju Strawberry Coklat', NULL, 19000, 1, NULL, 1, NULL, 0),
(12, 'Roti Pisang Keju Coklat', NULL, 17000, 1, NULL, 1, NULL, 0),
(13, 'Roti Pisang Kacang Coklat', NULL, 17000, 1, NULL, 1, NULL, 0),
(14, 'Roti Pisang Blueberry Coklat', NULL, 17000, 1, NULL, 1, NULL, 0),
(15, 'Roti Pisang Strawberry Coklat', NULL, 17000, 1, NULL, 1, NULL, 0),
(16, 'Roti Pisang Coklat', NULL, 13000, 1, NULL, 1, NULL, 0),
(17, 'Roti Pisang Kacang', NULL, 13000, 1, NULL, 1, NULL, 0),
(18, 'Roti Pisang Blueberry', NULL, 13000, 1, NULL, 1, NULL, 0),
(19, 'Roti Pisang Strawberry', NULL, 13000, 1, NULL, 1, NULL, 0),
(20, 'Roti Keju Kacang Coklat', NULL, 18000, 1, NULL, 6, NULL, 0),
(21, 'Roti Keju Strawberry Coklat', NULL, 18000, 1, NULL, 6, NULL, 0),
(22, 'Roti Keju Coklat', NULL, 16000, 1, NULL, 6, NULL, 0),
(23, 'Roti Keju Kacang', NULL, 16000, 1, NULL, 6, NULL, 0),
(24, 'Roti Keju Blueberry', NULL, 16000, 1, NULL, 6, NULL, 0),
(25, 'Roti Keju Strawberry', NULL, 15000, 1, NULL, 6, NULL, 0),
(26, 'Roti Keju', NULL, 15000, 1, NULL, 6, NULL, 0),
(27, 'Roti Kacang Coklat', NULL, 12000, 1, NULL, 6, NULL, 0),
(28, 'Roti Blueberry Coklat', NULL, 12000, 1, NULL, 6, NULL, 0),
(29, 'Roti Strawberry Coklat', NULL, 12000, 1, NULL, 6, NULL, 0),
(30, 'Roti Keju Telor Kornet', NULL, 20000, 1, NULL, 7, NULL, 0),
(31, 'Roti Keju Kornet', NULL, 18000, 1, NULL, 7, NULL, 0),
(32, 'Roti Telor Keju', NULL, 17000, 1, NULL, 7, NULL, 0),
(33, 'Roti Telor Kornet', NULL, 16000, 1, NULL, 7, NULL, 0),
(34, 'Roti Kornet', NULL, 13000, 1, NULL, 7, NULL, 0),
(35, 'Roti Telor', NULL, 10000, 1, NULL, 7, NULL, 0),
(36, 'Pisang Keju Kacang Coklat', NULL, 18000, 1, NULL, 2, NULL, 0),
(37, 'Pisang Keju Blueberry Coklat', NULL, 18000, 1, NULL, 2, NULL, 0),
(39, 'Pisang Keju Strawberry', NULL, 16000, 1, NULL, 2, NULL, 0),
(40, 'Pisang Keju Kacang', NULL, 16000, 1, NULL, 2, NULL, 0),
(41, 'Pisang Keju Blueberry', NULL, 16000, 1, NULL, 2, NULL, 0),
(42, 'Pisang Keju', NULL, 15000, 1, NULL, 2, NULL, 0),
(43, 'Pisang Kacang Coklat', NULL, 12000, 1, NULL, 2, NULL, 0),
(44, 'Pisang Blueberry Coklat', NULL, 12000, 1, NULL, 2, NULL, 0),
(45, 'Pisang Strawberry Coklat', NULL, 12000, 1, NULL, 2, NULL, 0),
(46, 'Pisang Coklat', NULL, 10000, 1, NULL, 2, NULL, 0),
(47, 'Pisang Kacang', NULL, 10000, 1, NULL, 2, NULL, 0),
(48, 'Pisang Blueberry', NULL, 10000, 1, NULL, 2, NULL, 0),
(49, 'Pisang Strawberry', NULL, 10000, 1, NULL, 2, NULL, 0),
(50, 'Pisang Susu', NULL, 10000, 1, NULL, 2, NULL, 0),
(51, 'Jagung Goreng', NULL, 10000, 1, NULL, 3, NULL, 0),
(52, 'Jagung Rebus', NULL, 10000, 1, NULL, 3, NULL, 0),
(53, 'Jagung Keju Manis Pedas', NULL, 17000, 1, NULL, 3, NULL, 0),
(54, 'Jagung Keju Manis', NULL, 16000, 1, NULL, 3, NULL, 0),
(55, 'Jagung Keju Pedas', NULL, 16000, 1, NULL, 3, NULL, 0),
(56, 'Jagung Manis Pedas', NULL, 12000, 1, NULL, 3, NULL, 0),
(57, 'Jagung Manis', NULL, 11000, 1, NULL, 3, NULL, 0),
(58, 'Jagung Pedas', NULL, 11000, 1, NULL, 3, NULL, 0),
(59, 'Kentang Goreng', NULL, 15000, 1, NULL, 3, NULL, 0),
(60, 'Soda Gembira', NULL, 15000, 1, NULL, 5, NULL, 0),
(61, 'Susu Soda', NULL, 15000, 1, NULL, 5, NULL, 0),
(62, 'Susu Soda Jeruk', NULL, 15000, 1, NULL, 5, NULL, 0),
(63, 'Susu Soda Lemon', NULL, 15000, 1, NULL, 5, NULL, 0),
(64, 'Milo', NULL, 15000, 1, NULL, 5, NULL, 0),
(65, 'Ovaltine', NULL, 15000, 1, NULL, 5, NULL, 0),
(66, 'Cappucino Susu', NULL, 15000, 1, NULL, 4, NULL, 0),
(67, 'Teh Tarik', NULL, 15000, 1, NULL, 5, NULL, 0),
(68, 'Extrajoss Susu', NULL, 10000, 1, NULL, 5, NULL, 0),
(69, 'Kukubima Susu', NULL, 10000, 1, NULL, 5, NULL, 0),
(70, 'Es Teh Manis', NULL, 5000, 1, NULL, 5, NULL, 0),
(71, 'Teh Manis Hangat', NULL, 5000, 1, NULL, 5, NULL, 0),
(72, 'Es Teh Tawar', NULL, 4000, 1, NULL, 5, NULL, 0),
(73, 'Teh Tawar', NULL, 4000, 1, NULL, 5, NULL, 0),
(74, 'Roti Coklat', NULL, 10000, 1, NULL, 6, NULL, 0),
(75, 'Pisang Keju Coklat', NULL, 15000, 1, NULL, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `restock`
--

CREATE TABLE `restock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `tanggal` datetime NOT NULL DEFAULT '2025-11-06 13:45:43',
  `no_trans` varchar(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `tbayar` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CcWN9SCI4OZ7Fcky0nyjenOE1rDWGovyavrz4prb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTnlodW9RdUgzdDlNb2JJVGlHWmhGQlRHRm56R0hyUEpwVDAxU2pMRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1763849007);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `nip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `foto`, `email`, `password`, `jabatan`, `status`, `nip`) VALUES
(1, 'Erick', 'user/Qph8BSl48Xhi8EWDAQ3a2DQXcjHXfWUMGh2oM7nq.jpg', 'resibebekeke5@gmail.com', '$2y$12$SgDW/uQHlqOrkLm2xLB8AOxe2grdLvZvSAsHG43ZD9UO2oD8MdciW', 2, 1, '210711155\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pembelian_id_pembelian_foreign` (`id_pembelian`),
  ADD KEY `detail_pembelian_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `detil_nota`
--
ALTER TABLE `detil_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detil_nota_id_nota_foreign` (`id_nota`);

--
-- Indexes for table `detil_produk`
--
ALTER TABLE `detil_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detil_produk_id_produk_foreign` (`id_produk`),
  ADD KEY `detil_produk_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nota_inv_num_unique` (`inv_num`),
  ADD KEY `nota_id_kasir_foreign` (`id_kasir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restock_no_trans_unique` (`no_trans`),
  ADD KEY `restock_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_nota`
--
ALTER TABLE `detil_nota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `detil_produk`
--
ALTER TABLE `detil_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `restock`
--
ALTER TABLE `restock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_id_pembelian_foreign` FOREIGN KEY (`id_pembelian`) REFERENCES `restock` (`id`),
  ADD CONSTRAINT `detail_pembelian_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `detil_nota`
--
ALTER TABLE `detil_nota`
  ADD CONSTRAINT `detil_nota_id_nota_foreign` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id`);

--
-- Constraints for table `detil_produk`
--
ALTER TABLE `detil_produk`
  ADD CONSTRAINT `detil_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detil_produk_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_id_kasir_foreign` FOREIGN KEY (`id_kasir`) REFERENCES `users` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restock`
--
ALTER TABLE `restock`
  ADD CONSTRAINT `restock_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
