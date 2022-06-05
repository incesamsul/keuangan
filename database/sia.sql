-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 04:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) UNSIGNED NOT NULL,
  `no_akun` int(11) NOT NULL,
  `nama_akun` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `no_akun`, `nama_akun`, `created_at`, `updated_at`) VALUES
(3, 11010, 'Kas', '2022-05-17 17:38:33', '2022-05-17 17:38:33'),
(4, 11011, 'Bank Y', '2022-05-17 17:39:18', '2022-05-17 17:39:18'),
(5, 11012, 'Kas Kecil', '2022-05-17 17:44:35', '2022-05-17 17:44:35'),
(6, 11013, 'Piutang Usaha', '2022-05-17 17:45:14', '2022-05-17 17:45:14'),
(7, 11020, 'Asuransi Dibayar Dimuka', '2022-05-17 17:45:42', '2022-05-17 17:45:42'),
(8, 11030, 'Perlengkapan Kantor', '2022-05-17 17:46:15', '2022-05-17 17:46:15'),
(9, 11031, 'Perlengkapan Mobil', '2022-05-17 17:46:40', '2022-05-17 17:46:40'),
(10, 12010, 'Komputer', '2022-05-17 17:47:22', '2022-05-17 17:47:22'),
(12, 12011, 'Akumulasi Penyusutan Komputer', '2022-05-17 21:27:59', '2022-05-17 21:27:59'),
(13, 12020, 'Mobil', '2022-05-17 21:28:24', '2022-05-17 21:28:24'),
(14, 12021, 'Akumulasi Penyusutan Mobil', '2022-05-17 21:28:59', '2022-05-17 21:28:59'),
(15, 21010, 'Hutang', '2022-05-17 21:29:49', '2022-05-17 21:29:49'),
(16, 31010, 'Modal Tn. A', '2022-05-17 21:35:22', '2022-05-17 21:35:22'),
(17, 32010, 'Laba Ditahan', '2022-05-17 21:35:44', '2022-05-17 21:35:44'),
(18, 32020, 'Laba Tahun Berjalan', '2022-05-17 21:37:58', '2022-05-17 21:37:58'),
(19, 39999, 'Historical Balancing Account', '2022-05-17 21:38:20', '2022-05-17 21:38:20'),
(20, 41000, 'Pendapatan', '2022-05-17 21:38:49', '2022-05-17 21:38:49'),
(21, 61010, 'Biaya Gaji Driver', '2022-05-17 21:39:36', '2022-05-17 21:39:36'),
(22, 61020, 'Biaya Gaji Administrasi', '2022-05-17 21:40:08', '2022-05-17 21:40:08'),
(23, 61030, 'Biaya Perlengkapan Kantor', '2022-05-17 21:40:37', '2022-05-17 21:40:37'),
(24, 61040, 'Biaya Perlengkapan Mobil', '2022-05-17 21:41:13', '2022-05-17 21:41:13'),
(25, 61050, 'Biaya Asuransi', '2022-05-17 21:41:40', '2022-05-17 21:41:40'),
(26, 61070, 'Biaya Listrik', '2022-05-17 21:42:10', '2022-05-17 21:42:10'),
(27, 69000, 'Biaya Lain-lain', '2022-05-17 21:42:45', '2022-05-17 21:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `bukubesar`
--

CREATE TABLE `bukubesar` (
  `id_bukubesar` int(10) UNSIGNED NOT NULL,
  `id_akun` int(10) UNSIGNED NOT NULL,
  `id_jurnal` int(10) UNSIGNED NOT NULL,
  `saldo` int(11) NOT NULL,
  `total_debit` int(11) NOT NULL,
  `total_kredit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(10) UNSIGNED NOT NULL,
  `id_akun` int(10) UNSIGNED NOT NULL,
  `id_pemasok` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `total_debit` int(11) NOT NULL,
  `total_kredit` int(11) NOT NULL,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_akun`, `id_pemasok`, `id_pelanggan`, `tgl_transaksi`, `debit`, `kredit`, `total_debit`, `total_kredit`, `file`, `created_at`, `updated_at`) VALUES
(3, 3, NULL, NULL, '2019-12-31', 5700000, 0, 0, 0, '62848ece9dad7.jpg', '2022-05-17 21:47:19', '2022-05-18 13:14:38'),
(4, 4, NULL, NULL, '2019-12-31', 17000000, 0, 0, 0, '62849d92856b6.jpg', '2022-05-17 21:48:08', '2022-05-18 14:17:38'),
(5, 6, NULL, NULL, '2019-12-31', 1300000, 0, 0, 0, '', '2022-05-17 21:48:48', '2022-05-17 21:48:48'),
(6, 13, NULL, NULL, '2019-12-31', 55500000, 0, 0, 0, '', '2022-05-17 21:49:25', '2022-05-17 21:49:25'),
(7, 15, NULL, NULL, '2019-12-31', 0, 30500000, 0, 0, '62849e871af4a.jpg', '2022-05-17 21:50:05', '2022-05-18 14:21:43'),
(8, 16, NULL, NULL, '2019-12-31', 0, 49000000, 0, 0, '', '2022-05-17 21:51:07', '2022-05-17 21:51:07'),
(9, 4, NULL, NULL, '2020-12-01', 150000000, 0, 0, 0, '6289dea47ec20.jpg', '2022-05-17 22:10:04', '2022-05-22 13:56:36'),
(10, 16, NULL, NULL, '2020-12-01', 0, 150000000, 0, 0, '6289dee265f93.jpg', '2022-05-17 22:10:54', '2022-05-22 13:57:38'),
(11, 3, NULL, NULL, '2020-12-02', 50000000, 0, 0, 0, '6289df1518ddd.jpg', '2022-05-18 14:22:52', '2022-05-22 13:58:29'),
(13, 4, NULL, NULL, '2020-12-02', 0, 50000000, 0, 0, '6289df2e6ecdd.jpg', '2022-05-19 10:15:08', '2022-05-22 13:58:54'),
(14, 5, NULL, NULL, '2020-12-02', 1000000, 0, 0, 0, '6289df6349f65.jpg', '2022-05-22 13:59:49', '2022-05-22 13:59:49'),
(15, 3, NULL, NULL, '2020-12-02', 0, 1000000, 0, 0, '6289df90f35be.jpg', '2022-05-22 14:00:33', '2022-05-22 14:00:33'),
(16, 7, NULL, NULL, '2020-12-02', 2400000, 0, 0, 0, '6289dfd340857.jpg', '2022-05-22 14:01:39', '2022-05-22 14:01:39'),
(17, 4, NULL, NULL, '2020-12-02', 0, 2400000, 0, 0, '6289e033a04aa.jpg', '2022-05-22 14:03:16', '2022-05-22 14:03:16'),
(18, 21, NULL, NULL, '2020-12-30', 3000000, 0, 0, 0, '6289e07626e26.jpg', '2022-05-22 14:04:22', '2022-05-22 14:04:22'),
(19, 22, NULL, NULL, '2020-12-30', 1500000, 0, 0, 0, '6289e0a9964f8.jpg', '2022-05-22 14:05:14', '2022-05-22 14:05:14'),
(20, 3, NULL, NULL, '2020-12-30', 0, 4500000, 0, 0, '6289e0de4df79.jpg', '2022-05-22 14:06:06', '2022-05-22 14:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2021_11_22_160615_create_users_table', 1),
(18, '2021_11_25_072832_create_profile_table', 1),
(19, '2022_02_09_060832_create_akun_table', 1),
(20, '2022_02_09_064410_create_pemasok_table', 1),
(21, '2022_02_09_074623_create_pelanggan_table', 1),
(22, '2022_02_13_060839_create_jurnal_table', 1),
(23, '2022_02_13_081010_create_bukubesar_table', 1),
(24, '2022_02_13_082325_create_neracasaldo_table', 1),
(74, '2022_05_09_043728_create_uploads_table', 1),
(99, '2022_05_09_054530_create_upload_table', 2),
(108, '2021_11_22_160615_create_users_table', 3),
(109, '2021_11_25_072832_create_profile_table', 3),
(110, '2022_02_09_060832_create_akun_table', 3),
(111, '2022_02_09_064410_create_pemasok_table', 3),
(112, '2022_02_09_074623_create_pelanggan_table', 3),
(113, '2022_02_13_060839_create_jurnal_table', 3),
(114, '2022_02_13_081010_create_bukubesar_table', 3),
(115, '2022_02_13_082325_create_neracasaldo_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `neracasaldo`
--

CREATE TABLE `neracasaldo` (
  `id_neracasaldo` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `id_bukubesar` int(11) UNSIGNED NOT NULL,
  `debit` int(11) DEFAULT NULL,
  `kredit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pelanggan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_pelanggan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(10) UNSIGNED NOT NULL,
  `nama_pemasok` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pemasok` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_pemasok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `telp_pemasok`, `created_at`, `updated_at`) VALUES
(1, 'jorek', 'pepaya 5', 7, '2022-05-10 12:50:06', '2022-05-10 12:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nisn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `no_ijazah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_skhun` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 11:34:44', '2021-11-25 11:56:23'),
(2, 3, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 11:34:44', '2021-11-25 11:56:23'),
(3, 2, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-25 11:34:44', '2021-11-25 11:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Administrator','staff','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-25 09:06:43', '2021-12-12 18:29:52'),
(2, 'amalia', 'amalia@mail.com', NULL, '$2y$10$Pt/9r/VO830MdtDKcoN9CO7qDJDL1QrcpiJYU0Yww/X9wJLmaSUDm', 'staff', '', NULL, '2022-02-13 23:49:09', '2022-02-13 23:49:09'),
(3, 'muhammad', 'muhammad@mail.com', NULL, '$2y$10$mHsUl/K3.0bfT9zLpsP7HO5uuxXyGeZEEkOBfYrgbXkq.rz0fczbu', 'pimpinan', '', NULL, '2022-02-13 23:53:29', '2022-02-13 23:53:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bukubesar`
--
ALTER TABLE `bukubesar`
  ADD PRIMARY KEY (`id_bukubesar`),
  ADD KEY `bukubesar_id_akun_foreign` (`id_akun`),
  ADD KEY `bukubesar_id_jurnal_foreign` (`id_jurnal`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `jurnal_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neracasaldo`
--
ALTER TABLE `neracasaldo`
  ADD PRIMARY KEY (`id_neracasaldo`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `profile_id_user_foreign` (`id_user`);

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
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bukubesar`
--
ALTER TABLE `bukubesar`
  MODIFY `id_bukubesar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `neracasaldo`
--
ALTER TABLE `neracasaldo`
  MODIFY `id_neracasaldo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukubesar`
--
ALTER TABLE `bukubesar`
  ADD CONSTRAINT `bukubesar_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bukubesar_id_jurnal_foreign` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
