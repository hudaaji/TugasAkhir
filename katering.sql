-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 03.27
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_paket`
--

INSERT INTO `detail_paket` (`id`, `id_menu`, `id_paket`, `created_at`, `updated_at`) VALUES
(43, 1, 13, '2021-05-21 02:43:20', '2021-05-21 02:43:20'),
(44, 2, 13, '2021-05-21 02:43:20', '2021-05-21 02:43:20'),
(45, 1, 14, '2021-05-21 02:43:38', '2021-05-21 02:43:38'),
(46, 2, 14, '2021-05-21 02:43:38', '2021-05-21 02:43:38'),
(47, 3, 14, '2021-05-21 02:43:38', '2021-05-21 02:43:38'),
(48, 1, 15, '2021-05-21 02:44:01', '2021-05-21 02:44:01'),
(49, 2, 15, '2021-05-21 02:44:01', '2021-05-21 02:44:01'),
(50, 3, 15, '2021-05-21 02:44:01', '2021-05-21 02:44:01'),
(51, 4, 15, '2021-05-21 02:44:01', '2021-05-21 02:44:01'),
(52, 5, 15, '2021-05-21 02:44:01', '2021-05-21 02:44:01'),
(53, 3, 16, '2021-05-21 04:54:35', '2021-05-21 04:54:35'),
(54, 3, 17, '2021-05-22 19:03:11', '2021-05-22 19:03:11'),
(55, 5, 17, '2021-05-22 19:03:11', '2021-05-22 19:03:11'),
(56, 2, 18, '2021-05-22 19:03:59', '2021-05-22 19:03:59'),
(57, 5, 18, '2021-05-22 19:03:59', '2021-05-22 19:03:59'),
(71, 1, 22, '2021-06-05 02:23:11', '2021-06-05 02:23:11'),
(72, 2, 22, '2021-06-05 02:23:12', '2021-06-05 02:23:12'),
(73, 6, 22, '2021-06-05 02:23:12', '2021-06-05 02:23:12'),
(74, 8, 22, '2021-06-05 02:23:12', '2021-06-05 02:23:12'),
(75, 9, 22, '2021-06-05 02:23:12', '2021-06-05 02:23:12'),
(76, 1, 27, '2021-06-06 17:14:01', '2021-06-06 17:14:01'),
(91, 1, 30, '2021-06-06 17:28:12', '2021-06-06 17:28:12'),
(92, 6, 30, '2021-06-06 17:28:13', '2021-06-06 17:28:13'),
(93, 8, 30, '2021-06-06 17:28:13', '2021-06-06 17:28:13'),
(94, 9, 30, '2021-06-06 17:28:13', '2021-06-06 17:28:13'),
(99, 3, 20, '2021-07-06 20:18:44', '2021-07-06 20:18:44'),
(100, 6, 20, '2021-07-06 20:18:44', '2021-07-06 20:18:44'),
(101, 7, 20, '2021-07-06 20:18:44', '2021-07-06 20:18:44'),
(102, 10, 20, '2021-07-06 20:18:44', '2021-07-06 20:18:44'),
(103, 3, 21, '2021-07-06 20:19:15', '2021-07-06 20:19:15'),
(104, 7, 21, '2021-07-06 20:19:15', '2021-07-06 20:19:15'),
(105, 10, 21, '2021-07-06 20:19:15', '2021-07-06 20:19:15'),
(106, 1, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(107, 2, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(108, 3, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(109, 6, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(110, 7, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(111, 8, 19, '2021-07-06 20:19:36', '2021-07-06 20:19:36'),
(112, 9, 19, '2021-07-06 20:19:37', '2021-07-06 20:19:37'),
(113, 10, 19, '2021-07-06 20:19:37', '2021-07-06 20:19:37'),
(114, 11, 19, '2021-07-06 20:19:37', '2021-07-06 20:19:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga_menu`, `gambar_menu`, `created_at`, `updated_at`) VALUES
(1, 'Bakso Ayam', '5000', 'bakso.jpg', '2021-05-08 05:20:27', '2021-06-05 01:54:28'),
(2, 'Sate Padang', '2000', 'sate-padang.jpeg', '2021-05-08 05:24:12', '2021-06-05 01:53:55'),
(3, 'Tempe Goreng', '2000', 'tempe-mendoan.jpg', '2021-05-11 22:45:56', '2021-06-06 18:09:05'),
(6, 'Ayam Goreng', '6000', 'ayam.jpg', '2021-06-05 01:53:36', '2021-06-05 01:53:36'),
(7, 'Tahu Goreng', '2000', 'tahu.jpg', '2021-06-05 01:55:03', '2021-06-05 01:55:03'),
(8, 'Siomay', '3500', 'somay.jpg', '2021-06-05 01:55:39', '2021-06-05 01:55:39'),
(9, 'Sate Lilit', '3000', 'lilit.jpg', '2021-06-05 01:56:06', '2021-06-05 01:56:06'),
(10, 'Bakwan Jagung', '2000', 'jagung.jpeg', '2021-06-05 01:59:01', '2021-06-05 01:59:01'),
(11, 'Soup', '3000', 'sayur-sop.jpg', '2021-06-06 18:08:07', '2021-06-06 18:08:07'),
(12, 'Kerupuk', '500', 'kerupuk.jpg', '2021-07-13 06:46:09', '2021-07-13 06:46:09'),
(13, 'Nasi Putih', '3000', 'nasi-putih.jpg', '2021-07-13 07:09:12', '2021-07-13 07:09:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_tambahan`
--

CREATE TABLE `menu_tambahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_tambahan`
--

INSERT INTO `menu_tambahan` (`id`, `pemesanan_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, '57', '1', '2021-07-13 07:40:48', '2021-07-13 07:40:48'),
(2, '58', '2', '2021-07-13 07:42:14', '2021-07-13 07:42:14'),
(3, '58', '3', '2021-07-13 07:42:14', '2021-07-13 07:42:14'),
(4, '58', '8', '2021-07-13 07:42:14', '2021-07-13 07:42:14'),
(5, '64', '1', '2021-07-13 08:04:46', '2021-07-13 08:04:46'),
(6, '64', '2', '2021-07-13 08:04:46', '2021-07-13 08:04:46'),
(7, '64', '8', '2021-07-13 08:04:46', '2021-07-13 08:04:46'),
(8, '64', '9', '2021-07-13 08:04:46', '2021-07-13 08:04:46'),
(9, '64', '10', '2021-07-13 08:04:46', '2021-07-13 08:04:46'),
(10, '65', '1', '2021-07-13 08:14:07', '2021-07-13 08:14:07'),
(11, '65', '2', '2021-07-13 08:14:07', '2021-07-13 08:14:07'),
(12, '65', '3', '2021-07-13 08:14:07', '2021-07-13 08:14:07'),
(13, '65', '6', '2021-07-13 08:14:07', '2021-07-13 08:14:07'),
(14, '66', '1', '2021-07-13 08:33:07', '2021-07-13 08:33:07'),
(15, '66', '3', '2021-07-13 08:33:07', '2021-07-13 08:33:07'),
(16, '67', '2', '2021-07-13 08:33:41', '2021-07-13 08:33:41'),
(17, '67', '9', '2021-07-13 08:33:41', '2021-07-13 08:33:41'),
(18, '68', '3', '2021-07-13 09:52:58', '2021-07-13 09:52:58'),
(19, '69', '2', '2021-07-13 09:57:15', '2021-07-13 09:57:15'),
(20, '69', '3', '2021-07-13 09:57:15', '2021-07-13 09:57:15'),
(21, '70', '8', '2021-07-13 10:05:43', '2021-07-13 10:05:43'),
(22, '70', '9', '2021-07-13 10:05:43', '2021-07-13 10:05:43'),
(23, '72', '8', '2021-07-13 14:43:59', '2021-07-13 14:43:59'),
(24, '72', '9', '2021-07-13 14:43:59', '2021-07-13 14:43:59'),
(25, '72', '11', '2021-07-13 14:44:00', '2021-07-13 14:44:00'),
(26, '73', '3', '2021-07-13 15:11:01', '2021-07-13 15:11:01'),
(27, '73', '7', '2021-07-13 15:11:02', '2021-07-13 15:11:02'),
(28, '73', '10', '2021-07-13 15:11:03', '2021-07-13 15:11:03'),
(29, '73', '11', '2021-07-13 15:11:03', '2021-07-13 15:11:03'),
(30, '73', '12', '2021-07-13 15:11:03', '2021-07-13 15:11:03'),
(31, '73', '13', '2021-07-13 15:11:03', '2021-07-13 15:11:03'),
(32, '76', '2', '2021-07-13 15:43:45', '2021-07-13 15:43:45'),
(33, '76', '9', '2021-07-13 15:43:45', '2021-07-13 15:43:45'),
(34, '76', '12', '2021-07-13 15:43:45', '2021-07-13 15:43:45'),
(35, '76', '13', '2021-07-13 15:43:45', '2021-07-13 15:43:45'),
(36, '77', '2', '2021-07-13 15:48:01', '2021-07-13 15:48:01'),
(37, '77', '7', '2021-07-13 15:48:02', '2021-07-13 15:48:02'),
(38, '77', '8', '2021-07-13 15:48:02', '2021-07-13 15:48:02'),
(39, '77', '11', '2021-07-13 15:48:02', '2021-07-13 15:48:02'),
(40, '77', '12', '2021-07-13 15:48:02', '2021-07-13 15:48:02'),
(41, '77', '13', '2021-07-13 15:48:02', '2021-07-13 15:48:02'),
(42, '78', '1', '2021-07-23 07:23:52', '2021-07-23 07:23:52'),
(43, '78', '2', '2021-07-23 07:23:52', '2021-07-23 07:23:52'),
(44, '78', '3', '2021-07-23 07:23:52', '2021-07-23 07:23:52'),
(45, '79', '12', '2021-07-23 09:20:34', '2021-07-23 09:20:34'),
(46, '79', '13', '2021-07-23 09:20:35', '2021-07-23 09:20:35'),
(47, '80', '9', '2021-07-23 09:24:05', '2021-07-23 09:24:05'),
(48, '80', '10', '2021-07-23 09:24:05', '2021-07-23 09:24:05'),
(49, '80', '11', '2021-07-23 09:24:05', '2021-07-23 09:24:05'),
(50, '80', '12', '2021-07-23 09:24:05', '2021-07-23 09:24:05'),
(51, '80', '13', '2021-07-23 09:24:05', '2021-07-23 09:24:05'),
(52, '81', '1', '2021-07-23 09:31:15', '2021-07-23 09:31:15'),
(53, '81', '2', '2021-07-23 09:31:15', '2021-07-23 09:31:15'),
(54, '81', '3', '2021-07-23 09:31:15', '2021-07-23 09:31:15'),
(55, '82', '1', '2021-07-24 00:42:53', '2021-07-24 00:42:53'),
(56, '82', '2', '2021-07-24 00:42:53', '2021-07-24 00:42:53'),
(57, '82', '3', '2021-07-24 00:42:53', '2021-07-24 00:42:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_09_125456_create_admins_table', 1),
(5, '2021_05_05_133711_create_menu_table', 2),
(8, '2021_05_12_070130_create_paket_table', 3),
(9, '2021_05_12_075806_create_detail_paket_table', 3),
(10, '2021_05_15_131121_create_menu_paket_table', 4),
(13, '2021_05_19_085619_create_pemesanan_table', 5),
(14, '2021_05_30_060049_create_transaksi_table', 6),
(15, '2021_07_13_072128_creta_menu_tambahan_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `harga_paket`, `id_user`, `created_at`, `updated_at`) VALUES
(19, 'Makan Besar', '25650', 1, '2021-06-05 02:20:42', '2021-07-06 20:19:37'),
(20, 'Silver', '10800', 1, '2021-06-05 02:21:19', '2021-07-06 20:18:44'),
(21, 'Bronze', '5400', 1, '2021-06-05 02:22:07', '2021-07-06 20:19:15'),
(22, 'Mantap', '17550', 1, '2021-06-05 02:23:11', '2021-06-05 02:23:12'),
(30, 'Josss', '15750', 2, '2021-06-06 17:24:05', '2021-06-06 17:26:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat_acara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `paket` int(11) DEFAULT NULL,
  `menu_tambahan` int(11) DEFAULT NULL,
  `jenis_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_undangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(191) NOT NULL,
  `keterangan` int(255) NOT NULL DEFAULT '0',
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_user`, `alamat_acara`, `tgl_pemesanan`, `paket`, `menu_tambahan`, `jenis_pemesanan`, `jumlah_undangan`, `harga`, `keterangan`, `waktu`, `created_at`, `updated_at`) VALUES
(57, 2, 'Jl. Batanghari, No. 99', '2021-07-14', 21, NULL, 'box', '120', 1248000, 4, NULL, '2021-07-13 07:40:48', '2021-07-13 00:35:44'),
(58, 2, 'Jl. Trenggana, No.23', '2021-07-14', 20, NULL, 'box', '200', 3660000, 4, NULL, '2021-07-13 07:42:14', '2021-07-13 00:35:47'),
(63, 2, 'Jl. Kedonganan, No. 12', '2021-07-14', 21, NULL, 'box', '90', 486000, 4, NULL, '2021-07-13 08:04:08', '2021-07-13 00:35:49'),
(65, 2, 'Jl. Uluwatu II, No. 19', '2021-07-16', NULL, NULL, 'box', '250', 3750000, 4, NULL, '2021-07-13 08:14:07', '2021-07-13 00:35:51'),
(66, 2, 'Panjer', '2021-07-16', 19, NULL, 'box', '50', 1632500, 4, NULL, '2021-07-13 08:33:07', '2021-07-13 00:35:53'),
(67, 2, 'Jl. Raya Kampus Unud, No. 27', '2021-07-15', 20, NULL, 'box', '70', 1106000, 5, NULL, '2021-07-13 08:33:41', '2021-07-13 00:36:23'),
(68, 2, 'tester', '2021-07-14', 21, NULL, 'box', '90', 666000, 2, '2021-07-14 17:57:38', '2021-07-13 09:52:57', '2021-07-13 07:55:03'),
(69, 2, 'Kedonganan', '2021-07-14', 19, NULL, 'box', '120', 3558000, 5, '2021-07-12 17:57:32', '2021-07-13 09:57:15', '2021-07-13 02:51:28'),
(70, 2, 'Jl. Tukad Badung, No. 70', '2021-07-14', 19, NULL, 'box', '100', 3215000, 3, '2021-07-14 18:06:02', '2021-07-13 10:05:43', '2021-07-13 07:56:46'),
(71, 34, 'gatsu barat', '2021-07-24', 19, 0, 'box', '75', 1923750, 2, '2021-07-24 17:24:35', '2021-07-13 14:43:19', '2021-07-23 01:25:15'),
(72, 34, 'Jl. Nakagawa', '2021-07-13', 20, NULL, 'box', '95', 1928500, 1, '2021-07-14 23:33:51', '2021-07-13 14:43:59', '2021-07-13 15:33:51'),
(73, 34, 'Jl. Noja', '2021-07-14', NULL, NULL, 'prasmanan', '250', 3125000, 4, '2021-07-14 23:33:48', '2021-07-13 15:11:01', '2021-07-23 01:24:48'),
(75, 35, 'Jl. Tukad Barito, No. 55', '2021-07-15', 19, NULL, 'box', '95', 2436750, 3, '2021-07-14 23:50:19', '2021-07-13 15:43:00', '2021-07-13 07:56:44'),
(76, 35, 'Jl. Nuansa Utama', '2021-07-15', NULL, NULL, 'box', '70', 595000, 2, '2021-07-14 23:50:17', '2021-07-13 15:43:45', '2021-07-13 07:53:57'),
(77, 35, 'Jl. Taman Giri, No.38', '2021-07-13', NULL, NULL, 'box', '400', 5600000, 2, '2021-07-14 23:49:57', '2021-07-13 15:48:01', '2021-07-13 07:53:49'),
(78, 2, 'Jl. Kedonganan, No. 12', '2021-07-23', 22, NULL, 'box', '90', 2389500, 5, '2021-07-23 15:24:23', '2021-07-23 07:23:52', '2021-07-23 01:34:02'),
(79, 2, 'Jl. Tukad Badung, No. 70', '2021-07-24', 19, NULL, 'prasmanan', '120', 3498000, 2, '2021-07-24 17:20:52', '2021-07-23 09:20:34', '2021-07-23 01:26:16'),
(80, 34, 'Jl. Tukad Badung, No. 70', '2021-07-25', NULL, NULL, 'prasmanan', '500', 5750000, 2, '2021-07-24 17:24:37', '2021-07-23 09:24:05', '2021-07-23 01:24:58'),
(81, 2, 'Jl. Batanghari, No. 99', '2021-07-23', 19, NULL, 'box', '90', 3118500, 4, '2021-07-24 17:32:08', '2021-07-23 09:31:15', '2021-07-23 01:33:15'),
(82, 2, 'Jl. Uluwatu II, No. 19', '2021-07-25', 22, NULL, 'prasmanan', '190', 5044500, 4, '2021-07-25 08:44:12', '2021-07-24 00:42:53', '2021-07-23 16:47:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bayar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pemesanan_id`, `metode_pembayaran`, `bayar`, `sisa`, `pembayaran`, `tgl_pembayaran`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(41, 58, 'Lunas', '3660000', NULL, 'M-Banking', '2021-07-13', 'buktitf2.jpg', '2021-07-13 00:27:33', '2021-07-13 00:27:33'),
(42, 63, 'Lunas', '486000', NULL, 'M-Banking', '2021-07-13', 'bukti.jpg', '2021-07-13 00:27:49', '2021-07-13 00:27:49'),
(43, 65, 'Lunas', '3750000', NULL, 'M-Banking', '2021-07-13', 'buktitf2.jpg', '2021-07-13 00:28:14', '2021-07-13 00:28:14'),
(44, 57, 'Lunas', '1248000', NULL, 'M-Banking', '2021-07-13', 'bukti.jpg', '2021-07-13 00:28:25', '2021-07-13 00:28:25'),
(45, 66, 'Lunas', '1632500', NULL, 'M-Banking', '2021-07-13', 'buktitf.jpg', '2021-07-13 00:34:23', '2021-07-13 00:34:23'),
(46, 73, 'Lunas', '3125000', NULL, 'M-Banking', '2021-07-13', 'bukti2.jpg', '2021-07-13 07:34:18', '2021-07-13 07:34:18'),
(47, 77, 'Lunas', '5600000', NULL, 'M-Banking', '2021-07-13', 'buktitf2.jpg', '2021-07-13 07:53:49', '2021-07-13 07:53:49'),
(48, 76, 'Lunas', '595000', NULL, 'M-Banking', '2021-07-13', 'buktitf2.jpg', '2021-07-13 07:53:57', '2021-07-13 07:53:57'),
(49, 75, 'Lunas', '2436750', NULL, 'M-Banking', '2021-07-13', 'bukti2.jpg', '2021-07-13 07:54:03', '2021-07-13 07:54:03'),
(50, 70, 'Lunas', '3215000', NULL, 'M-Banking', '2021-07-13', 'bukti.jpg', '2021-07-13 07:54:55', '2021-07-13 07:54:55'),
(51, 68, 'Lunas', '666000', NULL, 'M-Banking', '2021-07-13', 'buktitf.jpg', '2021-07-13 07:55:03', '2021-07-13 07:55:03'),
(52, 80, 'Lunas', '5750000', NULL, 'M-Banking', '2021-07-23', 'buktitf.jpg', '2021-07-23 01:24:58', '2021-07-23 01:24:58'),
(53, 71, 'Lunas', '1923750', NULL, 'M-Banking', '2021-07-23', 'buktitf2.jpg', '2021-07-23 01:25:15', '2021-07-23 01:25:15'),
(54, 79, 'Lunas', '3498000', NULL, 'M-Banking', '2021-07-23', 'buktitf2.jpg', '2021-07-23 01:26:16', '2021-07-23 01:26:16'),
(55, 81, 'Lunas', '3118500', NULL, 'M-Banking', '2021-07-23', 'buktitf.jpg', '2021-07-23 01:32:35', '2021-07-23 01:32:35'),
(56, 82, 'Lunas', '5044500', NULL, 'M-Banking', '2021-07-24', 'buktitf2.jpg', '2021-07-23 16:45:09', '2021-07-23 16:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `alamat`, `telepon`, `kota`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `code`) VALUES
(1, 'hudaajie@gmail.com', 'Huda Aji', 'Gatsu Timur', '082314257', 'Denpasar', NULL, '$2y$10$GwBRJcW5YSSv1nzg9jKEqeKnkwtuk5ALHkNkeuqKZpe28moMfEB6a', 'Ewt1OPKdvTOp8fsa5aV9Dz6SQdBBtUaRdwPXi84gusRxXpKxSKnnLzSGQrh6', '2021-03-10 07:52:40', '2021-06-14 01:03:53', 'admin', 3770),
(2, 'aristha130399@gmail.com', 'Aristha Widya Purwaningtyas', 'Tukad Petanu', 'Tukad Petanu', 'Denpasar', NULL, '$2y$10$6QrYkOYv8TcDefCGOplZBeQdca3PLznQQyd0GykRUenUWR7YqunrG', 'd7oGvxuEnzRRj6gKwhXwcglisqqdi1tzOMe53sVzQOO41vlUpZE34AFVfY4m', '2021-03-13 06:33:05', '2021-06-13 00:31:55', 'user', 5138),
(33, 'ogatatsumii88@gmail.com', 'Oga Tatsumi', 'Jl. Nakagawa', '091283824', 'Hokaido', NULL, '$2y$10$fsLHW9JIxZrU1mnOrnKySuqNIU0UlWUblLIxT..BrRXgzIOcpu9hy', NULL, '2021-06-13 01:01:05', '2021-06-13 01:01:05', 'user', 0),
(34, 'vicky@contoh.com', 'Raditya Vicky', 'Jl. Nuansa Utama, No. 1, Jimbaran', '0892387285', 'Badung', NULL, '$2y$10$aH83Vm0XqPtPd6YQOv1F6eZdspfBTqciipCuLxWlbOWfB3mole1yu', NULL, '2021-07-06 20:17:06', '2021-07-06 20:17:06', 'user', 0),
(35, 'kadek@contoh.com', 'Kadek Putra', 'Jl. Kedonganan', '08124728592', 'Badung', NULL, '$2y$10$NIhLds2OfYTfqsr4hLpJUOK..s5YlAGs1MHbhfbYMr/DYCuvQCLZO', NULL, '2021-07-06 21:45:24', '2021-07-06 21:45:24', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_tambahan`
--
ALTER TABLE `menu_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `menu_tambahan`
--
ALTER TABLE `menu_tambahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
