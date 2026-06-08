-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriconnect_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test log system', '2026-06-06 06:37:20', '2026-06-06 06:37:20'),
(2, 1, 'Export data users', '2026-06-06 08:55:34', '2026-06-06 08:55:34'),
(3, 1, 'Mengakses dashboard admin', '2026-06-06 09:22:17', '2026-06-06 09:22:17'),
(4, 1, 'Melihat daftar verifikasi petani', '2026-06-06 09:22:23', '2026-06-06 09:22:23'),
(5, 1, 'Mengakses dashboard admin', '2026-06-06 09:23:23', '2026-06-06 09:23:23'),
(6, 1, 'Melihat daftar verifikasi lahan', '2026-06-06 09:23:25', '2026-06-06 09:23:25'),
(7, 1, 'Melihat daftar verifikasi petani', '2026-06-06 09:23:27', '2026-06-06 09:23:27'),
(8, 1, 'Melihat daftar verifikasi lahan', '2026-06-06 09:36:07', '2026-06-06 09:36:07'),
(9, 1, 'Mengakses dashboard admin', '2026-06-06 09:36:10', '2026-06-06 09:36:10'),
(10, 3, 'Mengakses dashboard petani', '2026-06-06 09:36:40', '2026-06-06 09:36:40'),
(11, 2, 'Login berhasil sebagai pembeli', '2026-06-06 12:00:52', '2026-06-06 12:00:52'),
(12, 2, 'Mengakses dashboard pembeli', '2026-06-06 12:00:52', '2026-06-06 12:00:52'),
(13, 2, 'Melihat daftar produk marketplace', '2026-06-06 12:00:57', '2026-06-06 12:00:57'),
(14, 2, 'Melihat daftar produk marketplace', '2026-06-06 12:01:02', '2026-06-06 12:01:02'),
(15, 2, 'Mencari produk: apel', '2026-06-06 12:01:02', '2026-06-06 12:01:02'),
(16, 2, 'Melihat daftar produk marketplace', '2026-06-06 12:01:08', '2026-06-06 12:01:08'),
(17, 2, 'Mencari produk: jambu', '2026-06-06 12:01:08', '2026-06-06 12:01:08'),
(18, 2, 'Melihat daftar produk marketplace', '2026-06-06 12:01:13', '2026-06-06 12:01:13'),
(19, 2, 'Mencari produk: buah', '2026-06-06 12:01:13', '2026-06-06 12:01:13'),
(20, 2, 'Melihat daftar lahan marketplace', '2026-06-06 12:03:30', '2026-06-06 12:03:30'),
(21, 2, 'Melihat daftar lahan marketplace', '2026-06-06 12:03:38', '2026-06-06 12:03:38'),
(22, 2, 'Mencari lahan: Padi', '2026-06-06 12:03:38', '2026-06-06 12:03:38'),
(23, 4, 'Registrasi petani baru (menunggu verifikasi)', '2026-06-06 12:24:55', '2026-06-06 12:24:55'),
(24, 1, 'Login berhasil sebagai admin', '2026-06-06 18:37:55', '2026-06-06 18:37:55'),
(25, 1, 'Mengakses dashboard admin', '2026-06-06 18:37:56', '2026-06-06 18:37:56'),
(26, 1, 'Mengakses dashboard admin', '2026-06-06 18:38:38', '2026-06-06 18:38:38'),
(27, 1, 'Mengakses dashboard admin', '2026-06-06 18:39:04', '2026-06-06 18:39:04'),
(28, 1, 'Melihat daftar verifikasi lahan', '2026-06-06 18:40:03', '2026-06-06 18:40:03'),
(29, 1, 'Melihat daftar verifikasi petani', '2026-06-06 18:40:12', '2026-06-06 18:40:12'),
(30, 1, 'Melihat daftar verifikasi petani', '2026-06-06 18:40:40', '2026-06-06 18:40:40'),
(31, 2, 'Login berhasil sebagai pembeli', '2026-06-06 18:41:53', '2026-06-06 18:41:53'),
(32, 2, 'Login berhasil sebagai pembeli', '2026-06-06 18:41:54', '2026-06-06 18:41:54'),
(33, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:41:54', '2026-06-06 18:41:54'),
(34, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:42:21', '2026-06-06 18:42:21'),
(35, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:42:43', '2026-06-06 18:42:43'),
(36, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:42:47', '2026-06-06 18:42:47'),
(37, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:43:37', '2026-06-06 18:43:37'),
(38, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:44:17', '2026-06-06 18:44:17'),
(39, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:44:26', '2026-06-06 18:44:26'),
(40, 2, 'Melihat daftar produk marketplace', '2026-06-06 18:44:28', '2026-06-06 18:44:28'),
(41, 2, 'Melihat daftar produk marketplace', '2026-06-06 18:45:11', '2026-06-06 18:45:11'),
(42, 2, 'Menambahkan produk ke keranjang (ID: 3)', '2026-06-06 18:45:26', '2026-06-06 18:45:26'),
(43, 2, 'Melihat daftar produk marketplace', '2026-06-06 18:45:27', '2026-06-06 18:45:27'),
(44, 2, 'Menghapus item keranjang (ID: 2)', '2026-06-06 18:45:40', '2026-06-06 18:45:40'),
(45, 2, 'Melihat daftar lahan marketplace', '2026-06-06 18:46:21', '2026-06-06 18:46:21'),
(46, 2, 'Melihat daftar lahan marketplace', '2026-06-06 18:46:39', '2026-06-06 18:46:39'),
(47, 2, 'Melihat daftar lahan marketplace', '2026-06-06 18:47:21', '2026-06-06 18:47:21'),
(48, 2, 'Melihat daftar lahan marketplace', '2026-06-06 18:47:41', '2026-06-06 18:47:41'),
(49, 2, 'Mencari lahan: padi', '2026-06-06 18:47:41', '2026-06-06 18:47:41'),
(50, 2, 'Melihat daftar pengajuan minat', '2026-06-06 18:48:30', '2026-06-06 18:48:30'),
(51, 2, 'Melihat daftar pesanan', '2026-06-06 18:49:48', '2026-06-06 18:49:48'),
(52, 2, 'Melihat detail pesanan ID 2', '2026-06-06 18:49:52', '2026-06-06 18:49:52'),
(53, 2, 'Melihat detail pesanan ID 2', '2026-06-06 18:50:50', '2026-06-06 18:50:50'),
(54, 2, 'Melihat daftar pengajuan minat', '2026-06-06 18:51:13', '2026-06-06 18:51:13'),
(55, 2, 'Melihat daftar pesanan', '2026-06-06 18:51:16', '2026-06-06 18:51:16'),
(56, 2, 'Melihat daftar pengajuan minat', '2026-06-06 18:52:02', '2026-06-06 18:52:02'),
(57, 2, 'Mengakses dashboard pembeli', '2026-06-06 18:52:54', '2026-06-06 18:52:54'),
(58, 2, 'Melihat daftar produk marketplace', '2026-06-06 18:52:56', '2026-06-06 18:52:56'),
(59, 2, 'Melihat daftar lahan marketplace', '2026-06-06 18:52:58', '2026-06-06 18:52:58'),
(60, 2, 'Melihat daftar pesanan', '2026-06-06 18:53:03', '2026-06-06 18:53:03'),
(61, 2, 'Melihat daftar pengajuan minat', '2026-06-06 18:53:05', '2026-06-06 18:53:05'),
(62, 1, 'Login berhasil sebagai admin', '2026-06-06 19:08:31', '2026-06-06 19:08:31'),
(63, 1, 'Mengakses dashboard admin', '2026-06-06 19:08:31', '2026-06-06 19:08:31'),
(64, 1, 'Melihat daftar verifikasi lahan', '2026-06-06 19:08:35', '2026-06-06 19:08:35'),
(65, 1, 'Melihat daftar verifikasi petani', '2026-06-06 19:08:37', '2026-06-06 19:08:37'),
(66, 3, 'Login berhasil sebagai petani', '2026-06-06 19:10:03', '2026-06-06 19:10:03'),
(67, 3, 'Mengakses dashboard petani', '2026-06-06 19:10:03', '2026-06-06 19:10:03'),
(68, 3, 'Mengakses dashboard petani', '2026-06-06 19:10:13', '2026-06-06 19:10:13'),
(69, 3, 'Mengakses dashboard petani', '2026-06-06 19:10:40', '2026-06-06 19:10:40'),
(70, 3, 'Melihat daftar produk', '2026-06-06 19:10:49', '2026-06-06 19:10:49'),
(71, 3, 'Melihat daftar produk', '2026-06-06 19:11:36', '2026-06-06 19:11:36'),
(72, 3, 'Melihat daftar produk', '2026-06-06 19:12:53', '2026-06-06 19:12:53'),
(73, 3, 'Melihat daftar produk', '2026-06-06 19:17:38', '2026-06-06 19:17:38'),
(74, 3, 'Melihat daftar lahan', '2026-06-06 19:18:47', '2026-06-06 19:18:47'),
(75, 3, 'Melihat daftar lahan', '2026-06-06 19:18:51', '2026-06-06 19:18:51'),
(76, 3, 'Melihat daftar lahan', '2026-06-06 19:20:03', '2026-06-06 19:20:03'),
(77, 3, 'Membuka form tambah lahan', '2026-06-06 19:22:54', '2026-06-06 19:22:54'),
(78, 3, 'Melihat daftar lahan', '2026-06-06 19:26:54', '2026-06-06 19:26:54'),
(79, 3, 'Membuka form tambah lahan', '2026-06-06 19:26:57', '2026-06-06 19:26:57'),
(80, 3, 'Menambahkan lahan: cabai', '2026-06-06 19:27:59', '2026-06-06 19:27:59'),
(81, 3, 'Melihat daftar lahan', '2026-06-06 19:28:00', '2026-06-06 19:28:00'),
(82, 3, 'Melihat daftar lahan', '2026-06-06 19:28:14', '2026-06-06 19:28:14'),
(83, 3, 'Membuka form edit lahan: Padi', '2026-06-06 19:28:18', '2026-06-06 19:28:18'),
(84, 3, 'Melihat daftar lahan', '2026-06-06 19:30:30', '2026-06-06 19:30:30'),
(85, 3, 'Membuka form tambah lahan', '2026-06-06 19:30:33', '2026-06-06 19:30:33'),
(86, 3, 'Melihat daftar lahan', '2026-06-06 19:31:19', '2026-06-06 19:31:19'),
(87, 3, 'Membuka form tambah lahan', '2026-06-06 19:31:23', '2026-06-06 19:31:23'),
(88, 3, 'Menambahkan lahan: Bawang Merah Super', '2026-06-06 19:32:47', '2026-06-06 19:32:47'),
(89, 3, 'Melihat daftar lahan', '2026-06-06 19:32:47', '2026-06-06 19:32:47'),
(90, 3, 'Membuka form edit lahan: Bawang Merah Super', '2026-06-06 19:32:52', '2026-06-06 19:32:52'),
(91, 3, 'Mengupdate lahan: Bawang Merah Super Jayaa', '2026-06-06 19:32:58', '2026-06-06 19:32:58'),
(92, 3, 'Melihat daftar lahan', '2026-06-06 19:32:58', '2026-06-06 19:32:58'),
(93, 3, 'Membuka form edit lahan: Bawang Merah Super Jayaa', '2026-06-06 19:33:03', '2026-06-06 19:33:03'),
(94, 3, 'Membuka form edit lahan: Bawang Merah Super Jayaa', '2026-06-06 19:35:44', '2026-06-06 19:35:44'),
(95, 3, 'Melihat daftar lahan', '2026-06-06 19:35:49', '2026-06-06 19:35:49'),
(96, 3, 'Membuka form edit lahan: Singkok', '2026-06-06 19:35:54', '2026-06-06 19:35:54'),
(97, 3, 'Membuka form edit lahan: Bawang Merah Super Jayaa', '2026-06-06 19:36:01', '2026-06-06 19:36:01'),
(98, 3, 'Mengupdate lahan: Bawang Merah Super Jayaa', '2026-06-06 19:36:19', '2026-06-06 19:36:19'),
(99, 3, 'Melihat daftar lahan', '2026-06-06 19:36:19', '2026-06-06 19:36:19'),
(100, 3, 'Membuka form edit lahan: Bawang Merah Super Jayaa', '2026-06-06 19:36:22', '2026-06-06 19:36:22'),
(101, 3, 'Melihat daftar lahan', '2026-06-06 19:36:56', '2026-06-06 19:36:56'),
(102, 3, 'Membuka form edit lahan: Singkok', '2026-06-06 19:36:59', '2026-06-06 19:36:59'),
(103, 3, 'Melihat daftar pesanan', '2026-06-06 19:40:11', '2026-06-06 19:40:11'),
(104, 3, 'Update status pesanan ID 2 menjadi dikirim', '2026-06-06 19:40:17', '2026-06-06 19:40:17'),
(105, 3, 'Update status pesanan ID 2 menjadi dikirim', '2026-06-06 19:40:18', '2026-06-06 19:40:18'),
(106, 3, 'Melihat daftar pesanan', '2026-06-06 19:40:18', '2026-06-06 19:40:18'),
(107, 3, 'Melihat daftar pesanan', '2026-06-06 19:40:43', '2026-06-06 19:40:43'),
(108, 3, 'Melihat daftar pesanan', '2026-06-06 19:41:31', '2026-06-06 19:41:31'),
(109, 3, 'Melihat daftar pesanan', '2026-06-06 19:43:26', '2026-06-06 19:43:26'),
(110, 3, 'Melihat daftar pesanan', '2026-06-06 19:44:23', '2026-06-06 19:44:23'),
(111, 3, 'Melihat daftar pesanan', '2026-06-06 19:45:26', '2026-06-06 19:45:26'),
(112, 3, 'Mengakses dashboard petani', '2026-06-06 19:45:37', '2026-06-06 19:45:37'),
(113, 3, 'Melihat daftar pesanan', '2026-06-06 19:45:43', '2026-06-06 19:45:43'),
(114, 3, 'Melihat daftar pesanan', '2026-06-06 19:46:48', '2026-06-06 19:46:48'),
(115, 3, 'Melihat daftar pesanan', '2026-06-06 19:46:58', '2026-06-06 19:46:58'),
(116, 3, 'Melihat daftar pesanan', '2026-06-06 19:47:06', '2026-06-06 19:47:06'),
(117, 3, 'Melihat daftar pesanan', '2026-06-06 19:47:16', '2026-06-06 19:47:16'),
(118, 3, 'Melihat daftar pesanan', '2026-06-06 19:47:22', '2026-06-06 19:47:22'),
(119, 3, 'Melihat daftar pesanan', '2026-06-06 19:47:33', '2026-06-06 19:47:33'),
(120, 3, 'Melihat daftar pesanan', '2026-06-06 19:48:47', '2026-06-06 19:48:47'),
(121, 3, 'Melihat daftar pesanan', '2026-06-06 19:49:02', '2026-06-06 19:49:02'),
(122, 3, 'Melihat daftar pesanan', '2026-06-06 19:49:12', '2026-06-06 19:49:12'),
(123, 3, 'Melihat daftar pesanan', '2026-06-06 19:49:31', '2026-06-06 19:49:31'),
(124, 3, 'Melihat daftar pesanan', '2026-06-06 19:49:47', '2026-06-06 19:49:47'),
(125, 3, 'Melihat daftar pesanan', '2026-06-06 19:49:58', '2026-06-06 19:49:58'),
(126, 3, 'Melihat daftar produk', '2026-06-06 19:50:18', '2026-06-06 19:50:18'),
(127, 3, 'Mengakses dashboard petani', '2026-06-06 19:50:24', '2026-06-06 19:50:24'),
(128, 3, 'Melihat daftar produk', '2026-06-06 19:50:28', '2026-06-06 19:50:28'),
(129, 3, 'Melihat daftar lahan', '2026-06-06 19:50:31', '2026-06-06 19:50:31'),
(130, 3, 'Melihat daftar produk', '2026-06-06 19:50:33', '2026-06-06 19:50:33'),
(131, 3, 'Menerima minat lahan ID: 4', '2026-06-06 19:50:43', '2026-06-06 19:50:43'),
(132, 2, 'Login berhasil sebagai pembeli', '2026-06-06 19:51:20', '2026-06-06 19:51:20'),
(133, 2, 'Mengakses dashboard pembeli', '2026-06-06 19:51:20', '2026-06-06 19:51:20'),
(134, 2, 'Melihat daftar pengajuan minat', '2026-06-06 19:51:26', '2026-06-06 19:51:26'),
(135, 2, 'Melihat daftar produk marketplace', '2026-06-06 19:51:45', '2026-06-06 19:51:45'),
(136, 2, 'Menambahkan produk ke keranjang (ID: 2)', '2026-06-06 19:51:52', '2026-06-06 19:51:52'),
(137, 2, 'Melihat daftar produk marketplace', '2026-06-06 19:51:52', '2026-06-06 19:51:52'),
(138, 2, 'Menambah jumlah keranjang (ID keranjang: 3)', '2026-06-06 19:52:00', '2026-06-06 19:52:00'),
(139, 2, 'Checkout berhasil (Total: Rp 24000)', '2026-06-06 19:52:04', '2026-06-06 19:52:04'),
(140, 2, 'Melihat daftar pesanan', '2026-06-06 19:52:04', '2026-06-06 19:52:04'),
(141, 2, 'Melihat daftar produk marketplace', '2026-06-06 19:52:10', '2026-06-06 19:52:10'),
(142, 2, 'Melihat daftar pengajuan minat', '2026-06-06 19:52:14', '2026-06-06 19:52:14'),
(143, 2, 'Melihat daftar pesanan', '2026-06-06 19:52:16', '2026-06-06 19:52:16'),
(144, 2, 'Mengakses dashboard pembeli', '2026-06-06 19:52:20', '2026-06-06 19:52:20'),
(145, 2, 'Melihat daftar produk marketplace', '2026-06-06 19:52:22', '2026-06-06 19:52:22'),
(146, 2, 'Melihat daftar lahan marketplace', '2026-06-06 19:52:24', '2026-06-06 19:52:24'),
(147, 3, 'Login berhasil sebagai petani', '2026-06-06 23:04:01', '2026-06-06 23:04:01'),
(148, 3, 'Mengakses dashboard petani', '2026-06-06 23:04:03', '2026-06-06 23:04:03'),
(149, 3, 'Melihat daftar produk', '2026-06-06 23:04:07', '2026-06-06 23:04:07'),
(150, 3, 'Melihat daftar produk', '2026-06-06 23:04:24', '2026-06-06 23:04:24'),
(151, 3, 'Melihat daftar produk', '2026-06-06 23:04:35', '2026-06-06 23:04:35'),
(152, 3, 'Melihat daftar produk', '2026-06-06 23:06:56', '2026-06-06 23:06:56'),
(153, 3, 'Melihat daftar produk', '2026-06-06 23:07:02', '2026-06-06 23:07:02'),
(154, 3, 'Melihat daftar produk', '2026-06-06 23:10:31', '2026-06-06 23:10:31'),
(155, 3, 'Melihat daftar lahan', '2026-06-06 23:10:33', '2026-06-06 23:10:33'),
(156, 3, 'Melihat daftar lahan', '2026-06-06 23:10:38', '2026-06-06 23:10:38'),
(157, 3, 'Melihat daftar lahan', '2026-06-06 23:14:59', '2026-06-06 23:14:59'),
(158, 3, 'Melihat daftar lahan', '2026-06-06 23:15:17', '2026-06-06 23:15:17'),
(159, 3, 'Melihat daftar produk', '2026-06-06 23:15:34', '2026-06-06 23:15:34'),
(160, 3, 'Melihat daftar produk', '2026-06-06 23:15:42', '2026-06-06 23:15:42'),
(161, 3, 'Mengakses dashboard petani', '2026-06-06 23:15:49', '2026-06-06 23:15:49'),
(162, 3, 'Melihat daftar lahan', '2026-06-06 23:15:51', '2026-06-06 23:15:51'),
(163, 3, 'Melihat daftar lahan', '2026-06-06 23:16:01', '2026-06-06 23:16:01'),
(164, 3, 'Melihat daftar lahan', '2026-06-06 23:16:22', '2026-06-06 23:16:22'),
(165, 3, 'Melihat daftar lahan', '2026-06-06 23:16:37', '2026-06-06 23:16:37'),
(166, 3, 'Melihat daftar lahan', '2026-06-06 23:22:17', '2026-06-06 23:22:17'),
(167, 3, 'Melihat daftar lahan', '2026-06-06 23:22:20', '2026-06-06 23:22:20'),
(168, 3, 'Melihat daftar lahan', '2026-06-06 23:22:33', '2026-06-06 23:22:33'),
(169, 3, 'Melihat daftar lahan', '2026-06-06 23:24:38', '2026-06-06 23:24:38'),
(170, 3, 'Melihat daftar pesanan', '2026-06-06 23:24:54', '2026-06-06 23:24:54'),
(171, 3, 'Melihat daftar lahan', '2026-06-06 23:25:05', '2026-06-06 23:25:05'),
(172, 3, 'Gagal menghapus lahan: Bayam (sudah memiliki pengajuan minat)', '2026-06-06 23:25:11', '2026-06-06 23:25:11'),
(173, 3, 'Melihat daftar lahan', '2026-06-06 23:25:12', '2026-06-06 23:25:12'),
(174, 3, 'Melihat daftar produk', '2026-06-06 23:25:28', '2026-06-06 23:25:28'),
(175, 3, 'Melihat daftar produk', '2026-06-06 23:25:32', '2026-06-06 23:25:32'),
(176, 3, 'Melihat daftar produk', '2026-06-06 23:26:07', '2026-06-06 23:26:07'),
(177, 3, 'Melihat daftar produk', '2026-06-06 23:26:33', '2026-06-06 23:26:33'),
(178, 3, 'Melihat daftar produk', '2026-06-06 23:30:04', '2026-06-06 23:30:04'),
(179, 3, 'Melihat daftar pesanan', '2026-06-06 23:30:07', '2026-06-06 23:30:07'),
(180, 3, 'Melihat daftar pesanan', '2026-06-06 23:32:20', '2026-06-06 23:32:20'),
(181, 3, 'Melihat daftar pesanan', '2026-06-06 23:33:36', '2026-06-06 23:33:36'),
(182, 3, 'Melihat daftar produk', '2026-06-06 23:34:14', '2026-06-06 23:34:14'),
(183, 3, 'Melihat daftar produk', '2026-06-06 23:37:19', '2026-06-06 23:37:19'),
(184, 3, 'Melihat daftar pesanan', '2026-06-06 23:37:28', '2026-06-06 23:37:28'),
(185, 3, 'Melihat daftar pesanan', '2026-06-06 23:37:46', '2026-06-06 23:37:46'),
(186, 3, 'Melihat daftar pesanan', '2026-06-06 23:38:09', '2026-06-06 23:38:09'),
(187, 3, 'Melihat daftar pesanan', '2026-06-06 23:38:18', '2026-06-06 23:38:18'),
(188, 3, 'Melihat daftar pesanan', '2026-06-06 23:38:38', '2026-06-06 23:38:38'),
(189, 3, 'Melihat daftar produk', '2026-06-06 23:38:40', '2026-06-06 23:38:40'),
(190, 3, 'Melihat daftar pesanan', '2026-06-06 23:38:42', '2026-06-06 23:38:42'),
(191, 3, 'Melihat daftar pesanan', '2026-06-06 23:41:02', '2026-06-06 23:41:02'),
(192, 3, 'Melihat daftar pesanan', '2026-06-06 23:42:39', '2026-06-06 23:42:39'),
(193, 3, 'Melihat daftar lahan', '2026-06-06 23:42:46', '2026-06-06 23:42:46'),
(194, 3, 'Mengakses dashboard petani', '2026-06-06 23:42:51', '2026-06-06 23:42:51'),
(195, 3, 'Melihat daftar produk', '2026-06-06 23:42:54', '2026-06-06 23:42:54'),
(196, 3, 'Melihat daftar lahan', '2026-06-06 23:42:57', '2026-06-06 23:42:57'),
(197, 3, 'Melihat daftar pesanan', '2026-06-06 23:43:04', '2026-06-06 23:43:04'),
(198, 3, 'Melihat daftar pesanan', '2026-06-06 23:43:30', '2026-06-06 23:43:30'),
(199, 2, 'Login berhasil sebagai pembeli', '2026-06-06 23:45:36', '2026-06-06 23:45:36'),
(200, 2, 'Mengakses dashboard pembeli', '2026-06-06 23:45:37', '2026-06-06 23:45:37'),
(201, 2, 'Melihat daftar produk marketplace', '2026-06-06 23:45:40', '2026-06-06 23:45:40'),
(202, 2, 'Melihat daftar lahan marketplace', '2026-06-06 23:45:43', '2026-06-06 23:45:43'),
(203, 2, 'Melihat daftar produk marketplace', '2026-06-06 23:45:45', '2026-06-06 23:45:45'),
(204, 2, 'Melihat daftar pesanan', '2026-06-06 23:45:48', '2026-06-06 23:45:48'),
(205, 2, 'Melihat daftar pesanan', '2026-06-06 23:46:29', '2026-06-06 23:46:29'),
(206, 2, 'Melihat daftar pesanan', '2026-06-06 23:48:25', '2026-06-06 23:48:25'),
(207, 2, 'Melihat daftar lahan marketplace', '2026-06-06 23:48:32', '2026-06-06 23:48:32'),
(208, 2, 'Melihat daftar pesanan', '2026-06-06 23:48:34', '2026-06-06 23:48:34'),
(209, 1, 'Login berhasil sebagai admin', '2026-06-06 23:49:55', '2026-06-06 23:49:55'),
(210, 1, 'Mengakses dashboard admin', '2026-06-06 23:49:55', '2026-06-06 23:49:55'),
(211, 1, 'Mengakses dashboard admin', '2026-06-06 23:50:26', '2026-06-06 23:50:26'),
(212, 1, 'Export data users', '2026-06-06 23:50:32', '2026-06-06 23:50:32'),
(213, 5, 'Registrasi pembeli berhasil', '2026-06-07 00:55:09', '2026-06-07 00:55:09'),
(214, 1, 'Login admin gagal: password salah', '2026-06-07 00:57:54', '2026-06-07 00:57:54'),
(215, 1, 'Login berhasil sebagai admin', '2026-06-07 00:58:12', '2026-06-07 00:58:12'),
(216, 1, 'Mengakses dashboard admin', '2026-06-07 00:58:12', '2026-06-07 00:58:12'),
(217, 1, 'Melihat daftar verifikasi petani', '2026-06-07 00:58:15', '2026-06-07 00:58:15'),
(218, 1, 'Melihat daftar verifikasi petani', '2026-06-07 01:00:20', '2026-06-07 01:00:20'),
(219, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:00:22', '2026-06-07 01:00:22'),
(220, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:02:35', '2026-06-07 01:02:35'),
(221, 3, 'Login berhasil sebagai petani', '2026-06-07 01:05:03', '2026-06-07 01:05:03'),
(222, 3, 'Mengakses dashboard petani', '2026-06-07 01:05:04', '2026-06-07 01:05:04'),
(223, 3, 'Melihat daftar lahan', '2026-06-07 01:05:14', '2026-06-07 01:05:14'),
(224, 3, 'Membuka form tambah lahan', '2026-06-07 01:05:18', '2026-06-07 01:05:18'),
(225, 3, 'Menambahkan lahan: Timun', '2026-06-07 01:06:24', '2026-06-07 01:06:24'),
(226, 3, 'Melihat daftar lahan', '2026-06-07 01:06:25', '2026-06-07 01:06:25'),
(227, 1, 'Login berhasil sebagai admin', '2026-06-07 01:07:03', '2026-06-07 01:07:03'),
(228, 1, 'Mengakses dashboard admin', '2026-06-07 01:07:04', '2026-06-07 01:07:04'),
(229, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:07:13', '2026-06-07 01:07:13'),
(230, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:10:35', '2026-06-07 01:10:35'),
(231, 1, 'Login berhasil sebagai admin', '2026-06-07 01:31:24', '2026-06-07 01:31:24'),
(232, 1, 'Mengakses dashboard admin', '2026-06-07 01:31:25', '2026-06-07 01:31:25'),
(233, 1, 'Melihat daftar verifikasi petani', '2026-06-07 01:31:35', '2026-06-07 01:31:35'),
(234, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:31:38', '2026-06-07 01:31:38'),
(235, 1, 'Melihat daftar verifikasi petani', '2026-06-07 01:31:40', '2026-06-07 01:31:40'),
(236, 1, 'Menyetujui petani ID 4', '2026-06-07 01:31:42', '2026-06-07 01:31:42'),
(237, 1, 'Mengakses dashboard admin', '2026-06-07 01:31:43', '2026-06-07 01:31:43'),
(238, 1, 'Melihat daftar verifikasi petani', '2026-06-07 01:31:46', '2026-06-07 01:31:46'),
(239, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:31:48', '2026-06-07 01:31:48'),
(240, 1, 'Menyetujui lahan ID 6', '2026-06-07 01:31:54', '2026-06-07 01:31:54'),
(241, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:31:54', '2026-06-07 01:31:54'),
(242, 3, 'Login berhasil sebagai petani', '2026-06-07 01:32:13', '2026-06-07 01:32:13'),
(243, 3, 'Mengakses dashboard petani', '2026-06-07 01:32:14', '2026-06-07 01:32:14'),
(244, 3, 'Melihat daftar produk', '2026-06-07 01:32:18', '2026-06-07 01:32:18'),
(245, 3, 'Melihat daftar lahan', '2026-06-07 01:32:21', '2026-06-07 01:32:21'),
(246, 3, 'Melihat daftar pesanan', '2026-06-07 01:32:29', '2026-06-07 01:32:29'),
(247, 3, 'Melihat daftar lahan', '2026-06-07 01:32:32', '2026-06-07 01:32:32'),
(248, 3, 'Gagal menghapus lahan: Singkok (sudah memiliki pengajuan minat)', '2026-06-07 01:32:40', '2026-06-07 01:32:40'),
(249, 3, 'Melihat daftar lahan', '2026-06-07 01:32:41', '2026-06-07 01:32:41'),
(250, 3, 'Melihat daftar pesanan', '2026-06-07 01:32:45', '2026-06-07 01:32:45'),
(251, 2, 'Login berhasil sebagai pembeli', '2026-06-07 01:33:10', '2026-06-07 01:33:10'),
(252, 2, 'Mengakses dashboard pembeli', '2026-06-07 01:33:10', '2026-06-07 01:33:10'),
(253, 2, 'Melihat daftar produk marketplace', '2026-06-07 01:33:15', '2026-06-07 01:33:15'),
(254, 2, 'Melihat daftar lahan marketplace', '2026-06-07 01:33:19', '2026-06-07 01:33:19'),
(255, 2, 'Mengirim minat ke lahan ID 6', '2026-06-07 01:33:32', '2026-06-07 01:33:32'),
(256, 2, 'Melihat daftar lahan marketplace', '2026-06-07 01:33:32', '2026-06-07 01:33:32'),
(257, 2, 'Melihat daftar produk marketplace', '2026-06-07 01:33:39', '2026-06-07 01:33:39'),
(258, 2, 'Menambahkan produk ke keranjang (ID: 3)', '2026-06-07 01:33:42', '2026-06-07 01:33:42'),
(259, 2, 'Melihat daftar produk marketplace', '2026-06-07 01:33:43', '2026-06-07 01:33:43'),
(260, 2, 'Checkout berhasil (Total: Rp 12000)', '2026-06-07 01:33:53', '2026-06-07 01:33:53'),
(261, 2, 'Melihat daftar pesanan', '2026-06-07 01:33:53', '2026-06-07 01:33:53'),
(262, 2, 'Melihat daftar pengajuan minat', '2026-06-07 01:33:57', '2026-06-07 01:33:57'),
(263, 1, 'Login admin gagal: password salah', '2026-06-07 01:58:53', '2026-06-07 01:58:53'),
(264, 1, 'Login berhasil sebagai admin', '2026-06-07 01:59:00', '2026-06-07 01:59:00'),
(265, 1, 'Mengakses dashboard admin', '2026-06-07 01:59:01', '2026-06-07 01:59:01'),
(266, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 01:59:06', '2026-06-07 01:59:06'),
(267, 1, 'Mengakses dashboard admin', '2026-06-07 01:59:08', '2026-06-07 01:59:08'),
(268, 1, 'Mengakses dashboard admin', '2026-06-07 02:43:50', '2026-06-07 02:43:50'),
(269, 1, 'Mengakses dashboard admin', '2026-06-07 02:43:58', '2026-06-07 02:43:58'),
(270, 1, 'Login berhasil sebagai admin', '2026-06-07 02:44:55', '2026-06-07 02:44:55'),
(271, 1, 'Mengakses dashboard admin', '2026-06-07 02:44:55', '2026-06-07 02:44:55'),
(272, 1, 'Mengakses dashboard admin', '2026-06-07 02:47:24', '2026-06-07 02:47:24'),
(273, 1, 'Login berhasil sebagai admin', '2026-06-07 02:56:46', '2026-06-07 02:56:46'),
(274, 1, 'Mengakses dashboard admin', '2026-06-07 02:56:46', '2026-06-07 02:56:46'),
(275, 1, 'Mengakses dashboard admin', '2026-06-07 02:58:56', '2026-06-07 02:58:56'),
(276, 3, 'Login berhasil sebagai petani', '2026-06-07 02:59:26', '2026-06-07 02:59:26'),
(277, 3, 'Mengakses dashboard petani', '2026-06-07 02:59:27', '2026-06-07 02:59:27'),
(278, 3, 'Melihat daftar produk', '2026-06-07 02:59:31', '2026-06-07 02:59:31'),
(279, 3, 'Melihat daftar lahan', '2026-06-07 02:59:35', '2026-06-07 02:59:35'),
(280, 3, 'Melihat daftar pesanan', '2026-06-07 02:59:39', '2026-06-07 02:59:39'),
(281, 3, 'Melihat daftar pesanan', '2026-06-07 03:05:05', '2026-06-07 03:05:05'),
(282, 1, 'Login berhasil sebagai admin', '2026-06-07 03:05:28', '2026-06-07 03:05:28'),
(283, 1, 'Mengakses dashboard admin', '2026-06-07 03:05:28', '2026-06-07 03:05:28'),
(284, 2, 'Login berhasil sebagai pembeli', '2026-06-07 03:06:01', '2026-06-07 03:06:01'),
(285, 2, 'Mengakses dashboard pembeli', '2026-06-07 03:06:02', '2026-06-07 03:06:02'),
(286, 3, 'Login berhasil sebagai petani', '2026-06-07 03:06:59', '2026-06-07 03:06:59'),
(287, 3, 'Mengakses dashboard petani', '2026-06-07 03:06:59', '2026-06-07 03:06:59'),
(288, 3, 'Mengakses dashboard petani', '2026-06-07 03:07:41', '2026-06-07 03:07:41'),
(289, 3, 'Melihat daftar produk', '2026-06-07 03:07:52', '2026-06-07 03:07:52'),
(290, 3, 'Melihat daftar lahan', '2026-06-07 03:07:54', '2026-06-07 03:07:54'),
(291, 3, 'Melihat daftar pesanan', '2026-06-07 03:07:59', '2026-06-07 03:07:59'),
(292, 3, 'Melihat daftar lahan', '2026-06-07 03:08:18', '2026-06-07 03:08:18'),
(293, 3, 'Mengakses dashboard petani', '2026-06-07 03:08:24', '2026-06-07 03:08:24'),
(294, 3, 'Mengakses dashboard petani', '2026-06-07 03:10:16', '2026-06-07 03:10:16'),
(295, 3, 'Mengakses dashboard petani', '2026-06-07 03:13:34', '2026-06-07 03:13:34'),
(296, 3, 'Mengakses dashboard petani', '2026-06-07 03:15:19', '2026-06-07 03:15:19'),
(297, 2, 'Login berhasil sebagai pembeli', '2026-06-07 03:17:41', '2026-06-07 03:17:41'),
(298, 2, 'Mengakses dashboard pembeli', '2026-06-07 03:17:42', '2026-06-07 03:17:42'),
(299, 2, 'Melihat daftar pesanan', '2026-06-07 03:17:51', '2026-06-07 03:17:51'),
(300, 2, 'Melihat daftar pesanan', '2026-06-07 03:18:12', '2026-06-07 03:18:12'),
(301, 2, 'Melihat daftar pesanan', '2026-06-07 03:18:15', '2026-06-07 03:18:15'),
(302, 2, 'Melihat daftar pesanan', '2026-06-07 03:21:31', '2026-06-07 03:21:31'),
(303, 1, 'Login berhasil sebagai admin', '2026-06-07 03:23:07', '2026-06-07 03:23:07'),
(304, 1, 'Mengakses dashboard admin', '2026-06-07 03:23:07', '2026-06-07 03:23:07'),
(305, 1, 'Mengakses dashboard admin', '2026-06-07 03:24:45', '2026-06-07 03:24:45'),
(306, 2, 'Login berhasil sebagai pembeli', '2026-06-07 10:48:42', '2026-06-07 10:48:42'),
(307, 2, 'Mengakses dashboard pembeli', '2026-06-07 10:48:43', '2026-06-07 10:48:43'),
(308, 2, 'Melihat daftar produk marketplace', '2026-06-07 10:48:47', '2026-06-07 10:48:47'),
(309, 2, 'Melihat daftar lahan marketplace', '2026-06-07 10:48:52', '2026-06-07 10:48:52'),
(310, 2, 'Melihat daftar pesanan', '2026-06-07 10:49:01', '2026-06-07 10:49:01'),
(311, 2, 'Melihat daftar pengajuan minat', '2026-06-07 10:49:05', '2026-06-07 10:49:05'),
(312, 3, 'Login berhasil sebagai petani', '2026-06-07 10:49:27', '2026-06-07 10:49:27'),
(313, 3, 'Mengakses dashboard petani', '2026-06-07 10:49:28', '2026-06-07 10:49:28'),
(314, 3, 'Melihat daftar produk', '2026-06-07 10:49:33', '2026-06-07 10:49:33'),
(315, 3, 'Melihat daftar lahan', '2026-06-07 10:49:38', '2026-06-07 10:49:38'),
(316, 3, 'Melihat daftar pesanan', '2026-06-07 10:49:52', '2026-06-07 10:49:52'),
(317, 1, 'Login berhasil sebagai admin', '2026-06-07 10:50:21', '2026-06-07 10:50:21'),
(318, 1, 'Mengakses dashboard admin', '2026-06-07 10:50:22', '2026-06-07 10:50:22'),
(319, 1, 'Melihat daftar verifikasi petani', '2026-06-07 10:50:34', '2026-06-07 10:50:34'),
(320, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 10:50:38', '2026-06-07 10:50:38'),
(321, 1, 'Login berhasil sebagai admin', '2026-06-07 20:41:11', '2026-06-07 20:41:11'),
(322, 1, 'Mengakses dashboard admin', '2026-06-07 20:41:12', '2026-06-07 20:41:12'),
(323, 1, 'Melihat daftar verifikasi petani', '2026-06-07 20:41:17', '2026-06-07 20:41:17'),
(324, 1, 'Mengakses dashboard admin', '2026-06-07 20:41:21', '2026-06-07 20:41:21'),
(325, 1, 'Export data users', '2026-06-07 20:41:23', '2026-06-07 20:41:23'),
(326, 1, 'Export data lahan', '2026-06-07 20:41:42', '2026-06-07 20:41:42'),
(327, 1, 'Export data lahan', '2026-06-07 20:43:12', '2026-06-07 20:43:12'),
(328, 1, 'Export data lahan', '2026-06-07 20:45:42', '2026-06-07 20:45:42'),
(329, 1, 'Export data lahan', '2026-06-07 20:46:19', '2026-06-07 20:46:19'),
(330, 1, 'Export data produk', '2026-06-07 20:46:21', '2026-06-07 20:46:21'),
(331, 1, 'Melihat daftar verifikasi petani', '2026-06-07 20:46:37', '2026-06-07 20:46:37'),
(332, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 20:46:40', '2026-06-07 20:46:40'),
(333, 1, 'Melihat daftar verifikasi petani', '2026-06-07 20:46:42', '2026-06-07 20:46:42'),
(334, 1, 'Mengakses dashboard admin', '2026-06-07 20:46:46', '2026-06-07 20:46:46'),
(335, 1, 'Export data users', '2026-06-07 20:49:30', '2026-06-07 20:49:30'),
(336, 1, 'Export data produk', '2026-06-07 20:50:58', '2026-06-07 20:50:58'),
(337, 1, 'Export data lahan', '2026-06-07 20:51:40', '2026-06-07 20:51:40'),
(338, 2, 'Login berhasil sebagai pembeli', '2026-06-07 20:52:06', '2026-06-07 20:52:06'),
(339, 2, 'Mengakses dashboard pembeli', '2026-06-07 20:52:07', '2026-06-07 20:52:07'),
(340, 2, 'Melihat daftar produk marketplace', '2026-06-07 20:52:09', '2026-06-07 20:52:09'),
(341, 2, 'Melihat daftar pesanan', '2026-06-07 20:52:11', '2026-06-07 20:52:11'),
(342, 2, 'Melihat detail pesanan ID 4', '2026-06-07 20:52:13', '2026-06-07 20:52:13'),
(343, 2, 'Melihat detail pesanan ID 4', '2026-06-07 21:20:46', '2026-06-07 21:20:46'),
(344, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:20:54', '2026-06-07 21:20:54'),
(345, 2, 'Melihat detail pesanan ID 4', '2026-06-07 21:23:40', '2026-06-07 21:23:40'),
(346, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:25:43', '2026-06-07 21:25:43'),
(347, 2, 'Melihat detail pesanan ID 4', '2026-06-07 21:26:18', '2026-06-07 21:26:18'),
(348, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:26:20', '2026-06-07 21:26:20'),
(349, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:29:20', '2026-06-07 21:29:20'),
(350, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:32:01', '2026-06-07 21:32:01'),
(351, 2, 'Melihat detail pesanan ID 4', '2026-06-07 21:43:57', '2026-06-07 21:43:57'),
(352, 2, 'Melihat daftar pesanan', '2026-06-07 21:44:00', '2026-06-07 21:44:00'),
(353, 2, 'Melihat daftar pesanan', '2026-06-07 21:44:01', '2026-06-07 21:44:01'),
(354, 2, 'Melihat detail pesanan ID 4', '2026-06-07 21:44:05', '2026-06-07 21:44:05'),
(355, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:44:09', '2026-06-07 21:44:09'),
(356, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:55:23', '2026-06-07 21:55:23'),
(357, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 21:56:23', '2026-06-07 21:56:23'),
(358, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:00:38', '2026-06-07 22:00:38'),
(359, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:05:00', '2026-06-07 22:05:00'),
(360, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:05:11', '2026-06-07 22:05:11'),
(361, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:05:33', '2026-06-07 22:05:33'),
(362, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:05:59', '2026-06-07 22:05:59'),
(363, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:07:26', '2026-06-07 22:07:26'),
(364, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:09:51', '2026-06-07 22:09:51'),
(365, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:11:50', '2026-06-07 22:11:50'),
(366, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:12:47', '2026-06-07 22:12:47'),
(367, 2, 'Mengunduh nota pesanan ID 4', '2026-06-07 22:16:01', '2026-06-07 22:16:01'),
(368, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:16:52', '2026-06-07 22:16:52'),
(369, 2, 'Melihat daftar pesanan', '2026-06-07 22:16:55', '2026-06-07 22:16:55'),
(370, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:16:58', '2026-06-07 22:16:58'),
(371, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:20:50', '2026-06-07 22:20:50'),
(372, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:20:56', '2026-06-07 22:20:56'),
(373, 3, 'Login berhasil sebagai petani', '2026-06-07 22:21:35', '2026-06-07 22:21:35'),
(374, 3, 'Mengakses dashboard petani', '2026-06-07 22:21:36', '2026-06-07 22:21:36'),
(375, 3, 'Mengakses dashboard petani', '2026-06-07 22:23:25', '2026-06-07 22:23:25'),
(376, 2, 'Login berhasil sebagai pembeli', '2026-06-07 22:23:46', '2026-06-07 22:23:46'),
(377, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:23:47', '2026-06-07 22:23:47'),
(378, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:26:45', '2026-06-07 22:26:45'),
(379, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:27:06', '2026-06-07 22:27:06'),
(380, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:27:09', '2026-06-07 22:27:09'),
(381, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:27:11', '2026-06-07 22:27:11'),
(382, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:27:15', '2026-06-07 22:27:15'),
(383, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:27:34', '2026-06-07 22:27:34'),
(384, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:27:38', '2026-06-07 22:27:38'),
(385, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:30:06', '2026-06-07 22:30:06'),
(386, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:31:34', '2026-06-07 22:31:34'),
(387, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:32:52', '2026-06-07 22:32:52'),
(388, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:32:57', '2026-06-07 22:32:57'),
(389, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:33:01', '2026-06-07 22:33:01'),
(390, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:33:04', '2026-06-07 22:33:04'),
(391, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:33:06', '2026-06-07 22:33:06'),
(392, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:33:12', '2026-06-07 22:33:12'),
(393, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:33:15', '2026-06-07 22:33:15'),
(394, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:33:27', '2026-06-07 22:33:27'),
(395, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:34:34', '2026-06-07 22:34:34'),
(396, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:34:40', '2026-06-07 22:34:40'),
(397, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:36:07', '2026-06-07 22:36:07'),
(398, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:37:23', '2026-06-07 22:37:23'),
(399, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:38:47', '2026-06-07 22:38:47'),
(400, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:39:44', '2026-06-07 22:39:44'),
(401, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:39:49', '2026-06-07 22:39:49'),
(402, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:39:52', '2026-06-07 22:39:52'),
(403, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:39:56', '2026-06-07 22:39:56'),
(404, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:40:00', '2026-06-07 22:40:00'),
(405, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:40:03', '2026-06-07 22:40:03'),
(406, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:40:05', '2026-06-07 22:40:05'),
(407, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:40:06', '2026-06-07 22:40:06'),
(408, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:40:18', '2026-06-07 22:40:18'),
(409, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:40:26', '2026-06-07 22:40:26'),
(410, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:41:37', '2026-06-07 22:41:37'),
(411, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:42:30', '2026-06-07 22:42:30'),
(412, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:42:45', '2026-06-07 22:42:45'),
(413, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:43:15', '2026-06-07 22:43:15'),
(414, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:43:30', '2026-06-07 22:43:30'),
(415, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:43:40', '2026-06-07 22:43:40'),
(416, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:43:43', '2026-06-07 22:43:43'),
(417, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:43:47', '2026-06-07 22:43:47'),
(418, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:43:49', '2026-06-07 22:43:49'),
(419, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:43:51', '2026-06-07 22:43:51'),
(420, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:46:17', '2026-06-07 22:46:17'),
(421, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:46:20', '2026-06-07 22:46:20'),
(422, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:46:23', '2026-06-07 22:46:23'),
(423, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:46:27', '2026-06-07 22:46:27'),
(424, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:47:29', '2026-06-07 22:47:29'),
(425, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:47:33', '2026-06-07 22:47:33'),
(426, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:47:35', '2026-06-07 22:47:35'),
(427, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:47:42', '2026-06-07 22:47:42'),
(428, 2, 'Mencari produk: apel', '2026-06-07 22:47:42', '2026-06-07 22:47:42'),
(429, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:47:46', '2026-06-07 22:47:46'),
(430, 2, 'Mencari produk: nanas', '2026-06-07 22:47:46', '2026-06-07 22:47:46'),
(431, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:47:50', '2026-06-07 22:47:50'),
(432, 2, 'Mencari produk: apel', '2026-06-07 22:47:50', '2026-06-07 22:47:50'),
(433, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:47:52', '2026-06-07 22:47:52'),
(434, 2, 'Melihat daftar pesanan', '2026-06-07 22:47:59', '2026-06-07 22:47:59'),
(435, 2, 'Melihat detail pesanan ID 2', '2026-06-07 22:48:03', '2026-06-07 22:48:03'),
(436, 2, 'Mengunduh nota pesanan ID 2', '2026-06-07 22:48:09', '2026-06-07 22:48:09'),
(437, 3, 'Login berhasil sebagai petani', '2026-06-07 22:48:46', '2026-06-07 22:48:46'),
(438, 3, 'Mengakses dashboard petani', '2026-06-07 22:48:46', '2026-06-07 22:48:46'),
(439, 3, 'Melihat daftar produk', '2026-06-07 22:48:49', '2026-06-07 22:48:49'),
(440, 3, 'Melihat daftar produk', '2026-06-07 22:48:58', '2026-06-07 22:48:58'),
(441, 3, 'Melihat daftar lahan', '2026-06-07 22:49:02', '2026-06-07 22:49:02'),
(442, 3, 'Menghapus lahan: cabai', '2026-06-07 22:49:24', '2026-06-07 22:49:24'),
(443, 3, 'Melihat daftar lahan', '2026-06-07 22:49:24', '2026-06-07 22:49:24'),
(444, 3, 'Melihat daftar pesanan', '2026-06-07 22:49:34', '2026-06-07 22:49:34'),
(445, 3, 'Menerima minat lahan ID: 6', '2026-06-07 22:49:38', '2026-06-07 22:49:38'),
(446, 3, 'Melihat daftar pesanan', '2026-06-07 22:49:40', '2026-06-07 22:49:40'),
(447, 3, 'Update status pesanan ID 4 menjadi selesai', '2026-06-07 22:49:47', '2026-06-07 22:49:47'),
(448, 3, 'Melihat daftar pesanan', '2026-06-07 22:49:48', '2026-06-07 22:49:48'),
(449, 1, 'Login berhasil sebagai admin', '2026-06-07 22:50:09', '2026-06-07 22:50:09'),
(450, 1, 'Mengakses dashboard admin', '2026-06-07 22:50:09', '2026-06-07 22:50:09'),
(451, 1, 'Melihat daftar verifikasi petani', '2026-06-07 22:50:14', '2026-06-07 22:50:14'),
(452, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 22:50:15', '2026-06-07 22:50:15'),
(453, 1, 'Melihat daftar verifikasi petani', '2026-06-07 22:50:20', '2026-06-07 22:50:20'),
(454, 1, 'Mengakses dashboard admin', '2026-06-07 22:50:22', '2026-06-07 22:50:22'),
(455, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 22:50:26', '2026-06-07 22:50:26'),
(456, 1, 'Menyetujui lahan ID 7', '2026-06-07 22:50:29', '2026-06-07 22:50:29'),
(457, 1, 'Melihat daftar verifikasi lahan', '2026-06-07 22:50:29', '2026-06-07 22:50:29'),
(458, 2, 'Login berhasil sebagai pembeli', '2026-06-07 22:50:51', '2026-06-07 22:50:51'),
(459, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:50:51', '2026-06-07 22:50:51'),
(460, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:51:03', '2026-06-07 22:51:03'),
(461, 2, 'Mencari lahan: Timun', '2026-06-07 22:51:03', '2026-06-07 22:51:03'),
(462, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:51:13', '2026-06-07 22:51:13'),
(463, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:51:18', '2026-06-07 22:51:18'),
(464, 2, 'Melihat daftar produk marketplace', '2026-06-07 22:51:25', '2026-06-07 22:51:25'),
(465, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:51:30', '2026-06-07 22:51:30'),
(466, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:51:36', '2026-06-07 22:51:36'),
(467, 2, 'Mencari lahan: Timun', '2026-06-07 22:51:36', '2026-06-07 22:51:36'),
(468, 2, 'Mengirim minat ke lahan ID 7', '2026-06-07 22:51:49', '2026-06-07 22:51:49'),
(469, 2, 'Melihat daftar lahan marketplace', '2026-06-07 22:51:50', '2026-06-07 22:51:50'),
(470, 2, 'Mencari lahan: Timun', '2026-06-07 22:51:50', '2026-06-07 22:51:50'),
(471, 2, 'Melihat daftar pesanan', '2026-06-07 22:51:56', '2026-06-07 22:51:56'),
(472, 2, 'Melihat detail pesanan ID 4', '2026-06-07 22:52:02', '2026-06-07 22:52:02'),
(473, 2, 'Melihat daftar pesanan', '2026-06-07 22:52:05', '2026-06-07 22:52:05'),
(474, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:52:08', '2026-06-07 22:52:08'),
(475, 2, 'Melihat daftar pengajuan minat', '2026-06-07 22:52:26', '2026-06-07 22:52:26'),
(476, 2, 'Mengakses dashboard pembeli', '2026-06-07 22:52:32', '2026-06-07 22:52:32'),
(477, 2, 'Melihat daftar pesanan', '2026-06-07 22:52:35', '2026-06-07 22:52:35'),
(478, 3, 'Login berhasil sebagai petani', '2026-06-07 22:53:02', '2026-06-07 22:53:02'),
(479, 3, 'Mengakses dashboard petani', '2026-06-07 22:53:02', '2026-06-07 22:53:02'),
(480, 3, 'Melihat daftar produk', '2026-06-07 22:53:05', '2026-06-07 22:53:05'),
(481, 3, 'Melihat daftar lahan', '2026-06-07 22:53:09', '2026-06-07 22:53:09'),
(482, 3, 'Menolak minat ID: 6', '2026-06-07 22:53:19', '2026-06-07 22:53:19'),
(483, 6, 'Registrasi petani baru (menunggu verifikasi)', '2026-06-08 02:43:04', '2026-06-08 02:43:04'),
(484, 1, 'Login berhasil sebagai admin', '2026-06-08 02:43:39', '2026-06-08 02:43:39'),
(485, 1, 'Mengakses dashboard admin', '2026-06-08 02:43:40', '2026-06-08 02:43:40'),
(486, 1, 'Melihat daftar verifikasi petani', '2026-06-08 02:43:45', '2026-06-08 02:43:45'),
(487, 1, 'Menyetujui petani ID 6', '2026-06-08 02:43:48', '2026-06-08 02:43:48'),
(488, 1, 'Mengakses dashboard admin', '2026-06-08 02:43:49', '2026-06-08 02:43:49'),
(489, 6, 'Login berhasil sebagai petani', '2026-06-08 02:44:10', '2026-06-08 02:44:10'),
(490, 6, 'Mengakses dashboard petani', '2026-06-08 02:44:10', '2026-06-08 02:44:10'),
(491, 6, 'Melihat daftar produk', '2026-06-08 02:44:13', '2026-06-08 02:44:13'),
(492, 6, 'Melihat daftar lahan', '2026-06-08 02:44:15', '2026-06-08 02:44:15'),
(493, 3, 'Login berhasil sebagai petani', '2026-06-08 02:44:35', '2026-06-08 02:44:35'),
(494, 3, 'Mengakses dashboard petani', '2026-06-08 02:44:36', '2026-06-08 02:44:36'),
(495, 3, 'Mengakses dashboard petani', '2026-06-08 02:44:56', '2026-06-08 02:44:56'),
(496, 3, 'Melihat daftar produk', '2026-06-08 02:44:59', '2026-06-08 02:44:59'),
(497, 3, 'Melihat daftar lahan', '2026-06-08 02:45:02', '2026-06-08 02:45:02'),
(498, 3, 'Melihat daftar pesanan', '2026-06-08 02:45:11', '2026-06-08 02:45:11'),
(499, 2, 'Login berhasil sebagai pembeli', '2026-06-08 02:45:33', '2026-06-08 02:45:33'),
(500, 2, 'Mengakses dashboard pembeli', '2026-06-08 02:45:34', '2026-06-08 02:45:34'),
(501, 2, 'Melihat daftar produk marketplace', '2026-06-08 02:45:40', '2026-06-08 02:45:40'),
(502, 2, 'Melihat daftar lahan marketplace', '2026-06-08 02:45:43', '2026-06-08 02:45:43'),
(503, 2, 'Melihat daftar pesanan', '2026-06-08 02:45:48', '2026-06-08 02:45:48'),
(504, 2, 'Melihat daftar pengajuan minat', '2026-06-08 02:45:52', '2026-06-08 02:45:52'),
(505, 2, 'Melihat daftar pesanan', '2026-06-08 02:45:54', '2026-06-08 02:45:54'),
(506, 2, 'Melihat detail pesanan ID 4', '2026-06-08 02:45:57', '2026-06-08 02:45:57'),
(507, 2, 'Mengunduh nota pesanan ID 4', '2026-06-08 02:46:00', '2026-06-08 02:46:00'),
(508, 7, 'Registrasi petani baru (menunggu verifikasi)', '2026-06-08 05:10:58', '2026-06-08 05:10:58'),
(509, 7, 'Login petani ditolak: belum diverifikasi admin', '2026-06-08 05:11:11', '2026-06-08 05:11:11'),
(510, 3, 'Login berhasil sebagai petani', '2026-06-08 05:11:29', '2026-06-08 05:11:29'),
(511, 3, 'Mengakses dashboard petani', '2026-06-08 05:11:30', '2026-06-08 05:11:30'),
(512, 3, 'Melihat daftar produk', '2026-06-08 05:11:39', '2026-06-08 05:11:39'),
(513, 3, 'Menambahkan produk: Bawang Putih', '2026-06-08 05:12:38', '2026-06-08 05:12:38'),
(514, 3, 'Melihat daftar produk', '2026-06-08 05:12:38', '2026-06-08 05:12:38'),
(515, 3, 'Menghapus produk: Bawang Putih', '2026-06-08 05:12:44', '2026-06-08 05:12:44'),
(516, 3, 'Melihat daftar produk', '2026-06-08 05:12:45', '2026-06-08 05:12:45'),
(517, 3, 'Melihat daftar produk', '2026-06-08 05:12:57', '2026-06-08 05:12:57'),
(518, 3, 'Melihat daftar lahan', '2026-06-08 05:13:03', '2026-06-08 05:13:03'),
(519, 3, 'Membuka form tambah lahan', '2026-06-08 05:13:13', '2026-06-08 05:13:13'),
(520, 3, 'Melihat daftar lahan', '2026-06-08 05:17:49', '2026-06-08 05:17:49'),
(521, 3, 'Membuka form tambah lahan', '2026-06-08 05:18:03', '2026-06-08 05:18:03'),
(522, 3, 'Menambahkan lahan: Anggur', '2026-06-08 05:18:39', '2026-06-08 05:18:39'),
(523, 3, 'Melihat daftar lahan', '2026-06-08 05:18:39', '2026-06-08 05:18:39'),
(524, 3, 'Melihat daftar pesanan', '2026-06-08 05:19:02', '2026-06-08 05:19:02'),
(525, 2, 'Login berhasil sebagai pembeli', '2026-06-08 05:20:03', '2026-06-08 05:20:03'),
(526, 2, 'Mengakses dashboard pembeli', '2026-06-08 05:20:04', '2026-06-08 05:20:04'),
(527, 2, 'Menambahkan produk ke keranjang (ID: 4)', '2026-06-08 05:20:11', '2026-06-08 05:20:11'),
(528, 2, 'Mengakses dashboard pembeli', '2026-06-08 05:20:11', '2026-06-08 05:20:11'),
(529, 2, 'Menambahkan produk ke keranjang (ID: 3)', '2026-06-08 05:20:15', '2026-06-08 05:20:15'),
(530, 2, 'Mengakses dashboard pembeli', '2026-06-08 05:20:16', '2026-06-08 05:20:16'),
(531, 2, 'Menambah jumlah keranjang (ID keranjang: 5)', '2026-06-08 05:20:23', '2026-06-08 05:20:23'),
(532, 2, 'Menambah jumlah keranjang (ID keranjang: 5)', '2026-06-08 05:20:26', '2026-06-08 05:20:26'),
(533, 2, 'Menambah jumlah keranjang (ID keranjang: 6)', '2026-06-08 05:20:29', '2026-06-08 05:20:29'),
(534, 2, 'Melihat daftar pesanan', '2026-06-08 05:20:34', '2026-06-08 05:20:34'),
(535, 8, 'Registrasi petani baru (menunggu verifikasi)', '2026-06-08 05:22:31', '2026-06-08 05:22:31'),
(536, 8, 'Login petani ditolak: belum diverifikasi admin', '2026-06-08 05:22:47', '2026-06-08 05:22:47'),
(537, 3, 'Login berhasil sebagai petani', '2026-06-08 05:23:11', '2026-06-08 05:23:11'),
(538, 3, 'Mengakses dashboard petani', '2026-06-08 05:23:12', '2026-06-08 05:23:12'),
(539, 3, 'Melihat daftar produk', '2026-06-08 05:23:20', '2026-06-08 05:23:20'),
(540, 3, 'Menambahkan produk: Bawang Putih Segar', '2026-06-08 05:24:02', '2026-06-08 05:24:02'),
(541, 3, 'Melihat daftar produk', '2026-06-08 05:24:02', '2026-06-08 05:24:02'),
(542, 3, 'Melihat daftar produk', '2026-06-08 05:24:10', '2026-06-08 05:24:10'),
(543, 3, 'Menghapus produk: Bawang Putih Segar', '2026-06-08 05:24:20', '2026-06-08 05:24:20'),
(544, 3, 'Melihat daftar produk', '2026-06-08 05:24:20', '2026-06-08 05:24:20'),
(545, 3, 'Melihat daftar lahan', '2026-06-08 05:24:22', '2026-06-08 05:24:22'),
(546, 3, 'Membuka form tambah lahan', '2026-06-08 05:24:25', '2026-06-08 05:24:25'),
(547, 3, 'Menambahkan lahan: Pir', '2026-06-08 05:25:15', '2026-06-08 05:25:15'),
(548, 3, 'Melihat daftar lahan', '2026-06-08 05:25:16', '2026-06-08 05:25:16'),
(549, 3, 'Melihat daftar pesanan', '2026-06-08 05:25:54', '2026-06-08 05:25:54'),
(550, 3, 'Update status pesanan ID 4 menjadi dikemas', '2026-06-08 05:26:06', '2026-06-08 05:26:06'),
(551, 3, 'Melihat daftar pesanan', '2026-06-08 05:26:06', '2026-06-08 05:26:06'),
(552, 9, 'Registrasi pembeli berhasil', '2026-06-08 05:26:56', '2026-06-08 05:26:56'),
(553, 2, 'Login berhasil sebagai pembeli', '2026-06-08 05:27:12', '2026-06-08 05:27:12'),
(554, 2, 'Mengakses dashboard pembeli', '2026-06-08 05:27:13', '2026-06-08 05:27:13'),
(555, 2, 'Melihat daftar produk marketplace', '2026-06-08 05:27:27', '2026-06-08 05:27:27'),
(556, 2, 'Melihat daftar produk marketplace', '2026-06-08 05:27:32', '2026-06-08 05:27:32'),
(557, 2, 'Menambah jumlah keranjang (ID keranjang: 5)', '2026-06-08 05:27:45', '2026-06-08 05:27:45'),
(558, 2, 'Melihat daftar lahan marketplace', '2026-06-08 05:27:51', '2026-06-08 05:27:51'),
(559, 2, 'Checkout berhasil (Total: Rp 12000)', '2026-06-08 05:28:14', '2026-06-08 05:28:14'),
(560, 2, 'Melihat daftar pesanan', '2026-06-08 05:28:15', '2026-06-08 05:28:15'),
(561, 2, 'Melihat detail pesanan ID 5', '2026-06-08 05:28:20', '2026-06-08 05:28:20'),
(562, 2, 'Mengunduh nota pesanan ID 5', '2026-06-08 05:28:27', '2026-06-08 05:28:27'),
(563, 2, 'Melihat daftar pengajuan minat', '2026-06-08 05:28:42', '2026-06-08 05:28:42'),
(564, 2, 'Melihat daftar produk marketplace', '2026-06-08 05:28:57', '2026-06-08 05:28:57'),
(565, 1, 'Login berhasil sebagai admin', '2026-06-08 05:29:32', '2026-06-08 05:29:32'),
(566, 1, 'Mengakses dashboard admin', '2026-06-08 05:29:33', '2026-06-08 05:29:33'),
(567, 1, 'Export data users', '2026-06-08 05:30:08', '2026-06-08 05:30:08'),
(568, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:30:29', '2026-06-08 05:30:29'),
(569, 1, 'Menyetujui petani ID 8', '2026-06-08 05:30:36', '2026-06-08 05:30:36'),
(570, 1, 'Mengakses dashboard admin', '2026-06-08 05:30:37', '2026-06-08 05:30:37'),
(571, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:30:39', '2026-06-08 05:30:39'),
(572, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 05:30:43', '2026-06-08 05:30:43'),
(573, 1, 'Menyetujui lahan ID 8', '2026-06-08 05:30:52', '2026-06-08 05:30:52'),
(574, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 05:30:52', '2026-06-08 05:30:52'),
(575, 1, 'Menyetujui lahan ID 9', '2026-06-08 05:30:56', '2026-06-08 05:30:56'),
(576, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 05:30:56', '2026-06-08 05:30:56'),
(577, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:31:44', '2026-06-08 05:31:44'),
(578, 3, 'Login berhasil sebagai petani', '2026-06-08 05:41:46', '2026-06-08 05:41:46'),
(579, 3, 'Mengakses dashboard petani', '2026-06-08 05:41:46', '2026-06-08 05:41:46'),
(580, 3, 'Melihat daftar produk', '2026-06-08 05:41:50', '2026-06-08 05:41:50'),
(581, 3, 'Melihat daftar lahan', '2026-06-08 05:41:53', '2026-06-08 05:41:53'),
(582, 3, 'Melihat daftar pesanan', '2026-06-08 05:41:57', '2026-06-08 05:41:57'),
(583, 3, 'Melihat daftar produk', '2026-06-08 05:42:00', '2026-06-08 05:42:00'),
(584, 3, 'Menambahkan produk: Bawang Merah', '2026-06-08 05:42:33', '2026-06-08 05:42:33'),
(585, 3, 'Melihat daftar produk', '2026-06-08 05:42:33', '2026-06-08 05:42:33'),
(586, 3, 'Mengupdate produk: Nanas', '2026-06-08 05:42:48', '2026-06-08 05:42:48'),
(587, 3, 'Melihat daftar produk', '2026-06-08 05:42:49', '2026-06-08 05:42:49'),
(588, 3, 'Melihat daftar produk', '2026-06-08 05:42:56', '2026-06-08 05:42:56');
INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(589, 3, 'Menghapus produk: Bawang Merah', '2026-06-08 05:43:06', '2026-06-08 05:43:06'),
(590, 3, 'Melihat daftar produk', '2026-06-08 05:43:06', '2026-06-08 05:43:06'),
(591, 3, 'Melihat daftar lahan', '2026-06-08 05:43:09', '2026-06-08 05:43:09'),
(592, 3, 'Membuka form tambah lahan', '2026-06-08 05:43:15', '2026-06-08 05:43:15'),
(593, 3, 'Melihat daftar lahan', '2026-06-08 05:43:20', '2026-06-08 05:43:20'),
(594, 3, 'Melihat daftar pesanan', '2026-06-08 05:43:36', '2026-06-08 05:43:36'),
(595, 3, 'Update status pesanan ID 5 menjadi dikirim', '2026-06-08 05:43:45', '2026-06-08 05:43:45'),
(596, 3, 'Melihat daftar pesanan', '2026-06-08 05:43:46', '2026-06-08 05:43:46'),
(597, 2, 'Login berhasil sebagai pembeli', '2026-06-08 05:44:11', '2026-06-08 05:44:11'),
(598, 2, 'Mengakses dashboard pembeli', '2026-06-08 05:44:11', '2026-06-08 05:44:11'),
(599, 2, 'Melihat daftar produk marketplace', '2026-06-08 05:44:15', '2026-06-08 05:44:15'),
(600, 2, 'Melihat daftar lahan marketplace', '2026-06-08 05:44:22', '2026-06-08 05:44:22'),
(601, 2, 'Mengirim minat ke lahan ID 9', '2026-06-08 05:44:35', '2026-06-08 05:44:35'),
(602, 2, 'Melihat daftar lahan marketplace', '2026-06-08 05:44:35', '2026-06-08 05:44:35'),
(603, 2, 'Checkout berhasil (Total: Rp 24000)', '2026-06-08 05:44:51', '2026-06-08 05:44:51'),
(604, 2, 'Melihat daftar pesanan', '2026-06-08 05:44:51', '2026-06-08 05:44:51'),
(605, 2, 'Melihat detail pesanan ID 6', '2026-06-08 05:44:57', '2026-06-08 05:44:57'),
(606, 2, 'Mengunduh nota pesanan ID 6', '2026-06-08 05:45:00', '2026-06-08 05:45:00'),
(607, 2, 'Melihat daftar pengajuan minat', '2026-06-08 05:45:08', '2026-06-08 05:45:08'),
(608, 1, 'Login berhasil sebagai admin', '2026-06-08 05:45:38', '2026-06-08 05:45:38'),
(609, 1, 'Mengakses dashboard admin', '2026-06-08 05:45:38', '2026-06-08 05:45:38'),
(610, 1, 'Export data users', '2026-06-08 05:45:50', '2026-06-08 05:45:50'),
(611, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:45:55', '2026-06-08 05:45:55'),
(612, 1, 'Menyetujui petani ID 7', '2026-06-08 05:46:02', '2026-06-08 05:46:02'),
(613, 1, 'Mengakses dashboard admin', '2026-06-08 05:46:02', '2026-06-08 05:46:02'),
(614, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:46:05', '2026-06-08 05:46:05'),
(615, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 05:46:07', '2026-06-08 05:46:07'),
(616, 1, 'Melihat daftar verifikasi petani', '2026-06-08 05:46:11', '2026-06-08 05:46:11'),
(617, 1, 'Login admin gagal: password salah', '2026-06-08 06:30:05', '2026-06-08 06:30:05'),
(618, 1, 'Login berhasil sebagai admin', '2026-06-08 06:30:13', '2026-06-08 06:30:13'),
(619, 1, 'Mengakses dashboard admin', '2026-06-08 06:30:14', '2026-06-08 06:30:14'),
(620, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 06:31:01', '2026-06-08 06:31:01'),
(621, 1, 'Melihat daftar verifikasi petani', '2026-06-08 06:31:20', '2026-06-08 06:31:20'),
(622, 3, 'Login berhasil sebagai petani', '2026-06-08 06:35:37', '2026-06-08 06:35:37'),
(623, 3, 'Mengakses dashboard petani', '2026-06-08 06:35:38', '2026-06-08 06:35:38'),
(624, 3, 'Melihat daftar lahan', '2026-06-08 06:36:01', '2026-06-08 06:36:01'),
(625, 3, 'Melihat daftar produk', '2026-06-08 06:36:23', '2026-06-08 06:36:23'),
(626, 3, 'Melihat daftar pesanan', '2026-06-08 06:39:07', '2026-06-08 06:39:07'),
(627, NULL, 'Login pembeli gagal: akun tidak ditemukan (ainur@gmail.com)', '2026-06-08 06:40:00', '2026-06-08 06:40:00'),
(628, 2, 'Login berhasil sebagai pembeli', '2026-06-08 06:40:13', '2026-06-08 06:40:13'),
(629, 2, 'Mengakses dashboard pembeli', '2026-06-08 06:40:14', '2026-06-08 06:40:14'),
(630, 2, 'Melihat daftar produk marketplace', '2026-06-08 06:40:42', '2026-06-08 06:40:42'),
(631, 2, 'Melihat daftar lahan marketplace', '2026-06-08 06:41:04', '2026-06-08 06:41:04'),
(632, 2, 'Melihat daftar lahan marketplace', '2026-06-08 06:41:06', '2026-06-08 06:41:06'),
(633, 2, 'Melihat daftar pengajuan minat', '2026-06-08 06:42:48', '2026-06-08 06:42:48'),
(634, 2, 'Melihat daftar pesanan', '2026-06-08 06:43:09', '2026-06-08 06:43:09'),
(635, 2, 'Melihat detail pesanan ID 6', '2026-06-08 06:46:48', '2026-06-08 06:46:48'),
(636, 2, 'Mengunduh nota pesanan ID 6', '2026-06-08 06:47:15', '2026-06-08 06:47:15'),
(637, 2, 'Melihat daftar pengajuan minat', '2026-06-08 06:49:34', '2026-06-08 06:49:34'),
(638, 3, 'Login berhasil sebagai petani', '2026-06-08 06:50:49', '2026-06-08 06:50:49'),
(639, 3, 'Mengakses dashboard petani', '2026-06-08 06:50:49', '2026-06-08 06:50:49'),
(640, 2, 'Login berhasil sebagai pembeli', '2026-06-08 07:13:53', '2026-06-08 07:13:53'),
(641, 2, 'Mengakses dashboard pembeli', '2026-06-08 07:13:54', '2026-06-08 07:13:54'),
(642, 2, 'Mengakses dashboard pembeli', '2026-06-08 07:16:03', '2026-06-08 07:16:03'),
(643, 2, 'Melihat daftar produk marketplace', '2026-06-08 07:16:07', '2026-06-08 07:16:07'),
(644, 2, 'Mengakses dashboard pembeli', '2026-06-08 07:16:12', '2026-06-08 07:16:12'),
(645, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:16:17', '2026-06-08 07:16:17'),
(646, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:22:22', '2026-06-08 07:22:22'),
(647, 3, 'Login berhasil sebagai petani', '2026-06-08 07:22:48', '2026-06-08 07:22:48'),
(648, 3, 'Mengakses dashboard petani', '2026-06-08 07:22:49', '2026-06-08 07:22:49'),
(649, 3, 'Melihat daftar lahan', '2026-06-08 07:23:08', '2026-06-08 07:23:08'),
(650, 3, 'Melihat daftar lahan', '2026-06-08 07:23:09', '2026-06-08 07:23:09'),
(651, 3, 'Membuka form tambah lahan', '2026-06-08 07:23:11', '2026-06-08 07:23:11'),
(652, 3, 'Menambahkan lahan: Kacang Hijau', '2026-06-08 07:24:00', '2026-06-08 07:24:00'),
(653, 3, 'Melihat daftar lahan', '2026-06-08 07:24:01', '2026-06-08 07:24:01'),
(654, 3, 'Melihat daftar lahan', '2026-06-08 07:24:48', '2026-06-08 07:24:48'),
(655, 3, 'Login berhasil sebagai petani', '2026-06-08 07:26:58', '2026-06-08 07:26:58'),
(656, 3, 'Mengakses dashboard petani', '2026-06-08 07:26:58', '2026-06-08 07:26:58'),
(657, 3, 'Melihat daftar produk', '2026-06-08 07:27:02', '2026-06-08 07:27:02'),
(658, 3, 'Melihat daftar lahan', '2026-06-08 07:27:03', '2026-06-08 07:27:03'),
(659, 2, 'Login berhasil sebagai pembeli', '2026-06-08 07:30:38', '2026-06-08 07:30:38'),
(660, 2, 'Mengakses dashboard pembeli', '2026-06-08 07:30:38', '2026-06-08 07:30:38'),
(661, 2, 'Melihat daftar produk marketplace', '2026-06-08 07:30:41', '2026-06-08 07:30:41'),
(662, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:31:16', '2026-06-08 07:31:16'),
(663, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:36:23', '2026-06-08 07:36:23'),
(664, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:37:10', '2026-06-08 07:37:10'),
(665, 2, 'Melihat daftar produk marketplace', '2026-06-08 07:37:17', '2026-06-08 07:37:17'),
(666, 2, 'Melihat daftar produk marketplace', '2026-06-08 07:39:13', '2026-06-08 07:39:13'),
(667, 2, 'Melihat daftar produk marketplace', '2026-06-08 07:57:07', '2026-06-08 07:57:07'),
(668, 2, 'Melihat daftar lahan marketplace', '2026-06-08 07:57:11', '2026-06-08 07:57:11'),
(669, 3, 'Login berhasil sebagai petani', '2026-06-08 08:11:51', '2026-06-08 08:11:51'),
(670, 3, 'Mengakses dashboard petani', '2026-06-08 08:11:51', '2026-06-08 08:11:51'),
(671, 3, 'Melihat daftar produk', '2026-06-08 08:11:55', '2026-06-08 08:11:55'),
(672, 3, 'Mengupdate produk: Jagung', '2026-06-08 08:12:09', '2026-06-08 08:12:09'),
(673, 3, 'Melihat daftar produk', '2026-06-08 08:12:09', '2026-06-08 08:12:09'),
(674, 3, 'Mengupdate produk: Apel', '2026-06-08 08:13:31', '2026-06-08 08:13:31'),
(675, 3, 'Melihat daftar produk', '2026-06-08 08:13:31', '2026-06-08 08:13:31'),
(676, 3, 'Melihat daftar produk', '2026-06-08 08:13:41', '2026-06-08 08:13:41'),
(677, 3, 'Melihat daftar produk', '2026-06-08 08:13:49', '2026-06-08 08:13:49'),
(678, 3, 'Mengupdate produk: Nanas', '2026-06-08 08:14:22', '2026-06-08 08:14:22'),
(679, 3, 'Melihat daftar produk', '2026-06-08 08:14:22', '2026-06-08 08:14:22'),
(680, 3, 'Melihat daftar lahan', '2026-06-08 08:14:31', '2026-06-08 08:14:31'),
(681, 3, 'Membuka form edit lahan: Padi', '2026-06-08 08:14:36', '2026-06-08 08:14:36'),
(682, 3, 'Mengupdate lahan: Padi', '2026-06-08 08:15:44', '2026-06-08 08:15:44'),
(683, 3, 'Melihat daftar lahan', '2026-06-08 08:15:45', '2026-06-08 08:15:45'),
(684, 3, 'Membuka form edit lahan: Singkok', '2026-06-08 08:15:49', '2026-06-08 08:15:49'),
(685, 3, 'Mengupdate lahan: Singkong', '2026-06-08 08:16:42', '2026-06-08 08:16:42'),
(686, 3, 'Melihat daftar lahan', '2026-06-08 08:16:42', '2026-06-08 08:16:42'),
(687, 3, 'Membuka form edit lahan: Singkong', '2026-06-08 08:16:45', '2026-06-08 08:16:45'),
(688, 3, 'Melihat daftar lahan', '2026-06-08 08:16:50', '2026-06-08 08:16:50'),
(689, 3, 'Membuka form edit lahan: Bayam', '2026-06-08 08:16:53', '2026-06-08 08:16:53'),
(690, 3, 'Mengupdate lahan: Bayam', '2026-06-08 08:17:27', '2026-06-08 08:17:27'),
(691, 3, 'Melihat daftar lahan', '2026-06-08 08:17:28', '2026-06-08 08:17:28'),
(692, 3, 'Membuka form edit lahan: Bawang Merah Super Jayaa', '2026-06-08 08:17:32', '2026-06-08 08:17:32'),
(693, 3, 'Mengupdate lahan: Bawang Merah Super Jayaa', '2026-06-08 08:18:09', '2026-06-08 08:18:09'),
(694, 3, 'Melihat daftar lahan', '2026-06-08 08:18:09', '2026-06-08 08:18:09'),
(695, 3, 'Membuka form edit lahan: Timun', '2026-06-08 08:18:13', '2026-06-08 08:18:13'),
(696, 3, 'Mengupdate lahan: Timun', '2026-06-08 08:18:44', '2026-06-08 08:18:44'),
(697, 3, 'Melihat daftar lahan', '2026-06-08 08:18:44', '2026-06-08 08:18:44'),
(698, 3, 'Membuka form edit lahan: Anggur', '2026-06-08 08:18:48', '2026-06-08 08:18:48'),
(699, 3, 'Mengupdate lahan: Anggur', '2026-06-08 08:19:24', '2026-06-08 08:19:24'),
(700, 3, 'Melihat daftar lahan', '2026-06-08 08:19:25', '2026-06-08 08:19:25'),
(701, 3, 'Membuka form edit lahan: Pir', '2026-06-08 08:19:28', '2026-06-08 08:19:28'),
(702, 3, 'Mengupdate lahan: Pir', '2026-06-08 08:20:18', '2026-06-08 08:20:18'),
(703, 3, 'Melihat daftar lahan', '2026-06-08 08:20:19', '2026-06-08 08:20:19'),
(704, 3, 'Membuka form edit lahan: Kacang Hijau', '2026-06-08 08:20:22', '2026-06-08 08:20:22'),
(705, 3, 'Mengupdate lahan: Kacang Hijau', '2026-06-08 08:21:11', '2026-06-08 08:21:11'),
(706, 3, 'Melihat daftar lahan', '2026-06-08 08:21:12', '2026-06-08 08:21:12'),
(707, 3, 'Melihat daftar lahan', '2026-06-08 08:23:03', '2026-06-08 08:23:03'),
(708, 3, 'Melihat daftar produk', '2026-06-08 08:23:05', '2026-06-08 08:23:05'),
(709, 3, 'Melihat daftar lahan', '2026-06-08 08:23:08', '2026-06-08 08:23:08'),
(710, 3, 'Melihat daftar pesanan', '2026-06-08 08:23:11', '2026-06-08 08:23:11'),
(711, NULL, 'Login pembeli gagal: akun tidak ditemukan (ainur@gmail.com)', '2026-06-08 08:23:39', '2026-06-08 08:23:39'),
(712, 2, 'Login berhasil sebagai pembeli', '2026-06-08 08:23:52', '2026-06-08 08:23:52'),
(713, 2, 'Mengakses dashboard pembeli', '2026-06-08 08:23:52', '2026-06-08 08:23:52'),
(714, 2, 'Mengakses dashboard pembeli', '2026-06-08 08:23:59', '2026-06-08 08:23:59'),
(715, 2, 'Melihat daftar produk marketplace', '2026-06-08 08:24:03', '2026-06-08 08:24:03'),
(716, 2, 'Melihat daftar lahan marketplace', '2026-06-08 08:24:07', '2026-06-08 08:24:07'),
(717, 2, 'Melihat daftar lahan marketplace', '2026-06-08 08:26:20', '2026-06-08 08:26:20'),
(718, 2, 'Mengakses dashboard pembeli', '2026-06-08 08:26:21', '2026-06-08 08:26:21'),
(719, 2, 'Mengakses dashboard pembeli', '2026-06-08 08:26:51', '2026-06-08 08:26:51'),
(720, 2, 'Melihat daftar produk marketplace', '2026-06-08 08:26:59', '2026-06-08 08:26:59'),
(721, 2, 'Melihat daftar produk marketplace', '2026-06-08 08:27:04', '2026-06-08 08:27:04'),
(722, 2, 'Mencari produk: apel', '2026-06-08 08:27:04', '2026-06-08 08:27:04'),
(723, 2, 'Mengakses dashboard pembeli', '2026-06-08 08:27:10', '2026-06-08 08:27:10'),
(724, 1, 'Login admin gagal: password salah', '2026-06-08 08:27:30', '2026-06-08 08:27:30'),
(725, 1, 'Login berhasil sebagai admin', '2026-06-08 08:27:39', '2026-06-08 08:27:39'),
(726, 1, 'Mengakses dashboard admin', '2026-06-08 08:27:40', '2026-06-08 08:27:40'),
(727, 1, 'Melihat daftar verifikasi petani', '2026-06-08 08:27:44', '2026-06-08 08:27:44'),
(728, 1, 'Melihat daftar verifikasi lahan', '2026-06-08 08:27:47', '2026-06-08 08:27:47'),
(729, 1, 'Melihat daftar verifikasi petani', '2026-06-08 08:27:51', '2026-06-08 08:27:51');

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
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED NOT NULL,
  `pesan` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `room_id`, `pengirim_id`, `pesan`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'kak', 0, '2026-06-06 00:39:47', '2026-06-06 00:39:47'),
(2, 1, 2, '500 mau ga kak, tapi boong papaleee papapale paleee', 0, '2026-06-06 00:53:09', '2026-06-06 00:53:09'),
(3, 1, 2, 'apaa', 0, '2026-06-06 08:16:58', '2026-06-06 08:16:58'),
(4, 1, 3, 'gaje kak', 0, '2026-06-06 19:39:43', '2026-06-06 19:39:43'),
(5, 2, 3, 'hi kak', 0, '2026-06-06 19:50:52', '2026-06-06 19:50:52'),
(6, 2, 2, 'jadi, berapa kak?', 0, '2026-06-06 19:51:41', '2026-06-06 19:51:41'),
(7, 2, 2, 'ulala', 0, '2026-06-07 01:34:07', '2026-06-07 01:34:07'),
(8, 3, 2, 'hi kak', 0, '2026-06-07 22:52:19', '2026-06-07 22:52:19'),
(9, 3, 3, 'p balap', 0, '2026-06-08 02:44:48', '2026-06-08 02:44:48'),
(10, 3, 3, 'mau kak', 0, '2026-06-08 05:25:48', '2026-06-08 05:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `lahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `petani_id`, `pembeli_id`, `lahan_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 3, '2026-06-06 00:37:10', '2026-06-06 00:37:10'),
(2, 3, 2, 4, '2026-06-06 19:50:43', '2026-06-06 19:50:43'),
(3, 3, 2, 6, '2026-06-07 01:33:32', '2026-06-07 01:33:32'),
(4, 3, 2, 7, '2026-06-07 22:51:49', '2026-06-07 22:51:49'),
(5, 3, 2, 9, '2026-06-08 05:44:35', '2026-06-08 05:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk_saat_beli` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_saat_beli` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `pesanan_id`, `produk_id`, `nama_produk_saat_beli`, `jumlah`, `harga_saat_beli`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Apel', 2, 12000.00, '2026-06-06 02:22:33', '2026-06-06 02:22:33'),
(2, 3, 2, 'Nanas', 2, 12000.00, '2026-06-06 19:52:04', '2026-06-06 19:52:04'),
(3, 4, 3, 'Jagung', 1, 12000.00, '2026-06-07 01:33:53', '2026-06-07 01:33:53'),
(4, 5, 4, 'Apel', 1, 12000.00, '2026-06-08 05:28:14', '2026-06-08 05:28:14'),
(5, 6, 3, 'Jagung', 2, 12000.00, '2026-06-08 05:44:51', '2026-06-08 05:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `komoditas` varchar(255) NOT NULL,
  `luas_lahan` decimal(10,2) NOT NULL,
  `estimasi_panen` date NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat_lahan` text NOT NULL,
  `harga_min` decimal(12,2) NOT NULL,
  `harga_max` decimal(12,2) NOT NULL,
  `bisa_nego` tinyint(1) NOT NULL DEFAULT 1,
  `foto_lahan` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','diterima','ditolak') DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id`, `petani_id`, `komoditas`, `luas_lahan`, `estimasi_panen`, `deskripsi`, `alamat_lahan`, `harga_min`, `harga_max`, `bisa_nego`, `foto_lahan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Padi', 4.30, '2006-10-23', 'luas, bagus', 'Surabaya', 1200000.00, 1400000.00, 1, '1780931744_lahanpadi.jfif', 'diterima', '2026-06-05 19:30:09', '2026-06-08 08:15:44'),
(3, 3, 'Singkong', 5.60, '2007-11-07', 'bagus sih', 'Bali', 16000000.00, 16000000.00, 1, '1780931802_lahansingkong.jpeg', 'diterima', '2026-06-06 00:35:30', '2026-06-08 08:16:42'),
(4, 3, 'Bayam', 2.30, '2006-12-10', 'bayam segar', 'Surabaya', 1200000.00, 1500000.00, 1, '1780931847_lahanbayam.jfif', 'diterima', '2026-06-06 07:24:40', '2026-06-08 08:17:27'),
(6, 3, 'Bawang Merah Super Jayaa', 4.30, '2026-02-11', 'Tanah subur', 'Semarang, Jawa tengah', 13000000.00, 14000000.00, 0, '1780931889_lahanbawangmerah.jpg', 'diterima', '2026-06-06 19:32:47', '2026-06-08 08:18:09'),
(7, 3, 'Timun', 3.20, '2028-12-13', 'baguss', 'Malang', 1200000.00, 1240000.00, 1, '1780931924_lahantimun.jpeg', 'diterima', '2026-06-07 01:06:24', '2026-06-08 08:18:44'),
(8, 3, 'Anggur', 1.20, '2028-12-30', 'Subur', 'Kenjeran', 1200000.00, 1250000.00, 1, '1780931964_lahananggur.jfif', 'diterima', '2026-06-08 05:18:39', '2026-06-08 08:19:24'),
(9, 3, 'Pir', 2.40, '2024-12-31', 'Tanah subur dekat irigasi', 'Jepara', 1200000.00, 1400000.00, 1, '1780932018_lahanpir.jfif', 'diterima', '2026-06-08 05:25:15', '2026-06-08 08:20:18'),
(10, 3, 'Kacang Hijau', 0.50, '2027-12-09', 'Cocokk', 'Juwana', 800000.00, 900000.00, 1, '1780932071_lahankacanghijau.jfif', 'menunggu', '2026-06-08 07:24:00', '2026-06-08 08:21:11');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_05_154717_create_produk_table', 1),
(5, '2026_06_05_154728_create_lahan_table', 1),
(6, '2026_06_05_154736_create_keranjang_table', 1),
(7, '2026_06_05_154746_create_pesanan_table', 1),
(8, '2026_06_05_154754_create_detail_pesanan_table', 1),
(9, '2026_06_05_154801_create_pengajuan_minat_table', 1),
(10, '2026_06_05_154806_create_chat_rooms_table', 1),
(11, '2026_06_05_154814_create_chat_messages_table', 1),
(12, '2026_06_06_021642_update_lahan_add_status_columns', 2),
(13, '2026_06_06_023311_drop_status_listing_from_lahan_table', 3),
(14, '2026_06_06_025720_update_status_pengajuan_minat_enum', 4),
(15, '2026_06_06_081538_add_nama_produk_saat_beli_to_detail_pesanan_table', 5),
(16, '2026_06_06_132754_create_activity_logs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_minat`
--

CREATE TABLE `pengajuan_minat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lahan_id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('menunggu','diterima','ditolak') DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_minat`
--

INSERT INTO `pengajuan_minat` (`id`, `lahan_id`, `pembeli_id`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'mau dong', 'diterima', '2026-06-05 22:35:30', '2026-06-05 23:41:57'),
(2, 3, 2, 'mau dong kak', 'diterima', '2026-06-06 00:37:10', '2026-06-06 00:37:51'),
(3, 3, 2, 'mau dong kak', 'ditolak', '2026-06-06 00:37:10', '2026-06-06 00:37:51'),
(4, 4, 2, 'saya mau', 'diterima', '2026-06-06 07:26:34', '2026-06-06 19:50:43'),
(5, 6, 2, 'kak mau', 'diterima', '2026-06-07 01:33:32', '2026-06-07 22:49:38'),
(6, 7, 2, 'mau', 'ditolak', '2026-06-07 22:51:49', '2026-06-07 22:53:19'),
(7, 9, 2, 'mau', 'menunggu', '2026-06-08 05:44:35', '2026-06-08 05:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `status_pesanan` enum('menunggu_diproses','dikemas','dikirim','selesai') NOT NULL DEFAULT 'menunggu_diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `pembeli_id`, `total_harga`, `alamat_tujuan`, `status_pesanan`, `created_at`, `updated_at`) VALUES
(2, 2, 24000.00, 'Alamat belum diisi', 'dikirim', '2026-06-06 02:22:33', '2026-06-06 19:40:17'),
(3, 2, 24000.00, 'Alamat belum diisi', 'menunggu_diproses', '2026-06-06 19:52:04', '2026-06-06 19:52:04'),
(4, 2, 12000.00, 'Alamat belum diisi', 'dikemas', '2026-06-07 01:33:53', '2026-06-08 05:26:06'),
(5, 2, 12000.00, 'Alamat belum diisi', 'dikirim', '2026-06-08 05:28:14', '2026-06-08 05:43:45'),
(6, 2, 24000.00, 'Alamat belum diisi', 'menunggu_diproses', '2026-06-08 05:44:51', '2026-06-08 05:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `petani_id`, `nama_produk`, `kategori`, `harga`, `stok`, `satuan`, `foto_produk`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 3, 'Nanas', 'Buah', 12000.00, 3, 'Kg', '1780931662_nanas.jpg', 'nanas asam', '2026-06-05 11:26:20', '2026-06-08 08:14:22'),
(3, 3, 'Jagung', 'Palawija', 12000.00, 1, 'Kg', '1780931529_jagungg.png', 'bagus', '2026-06-05 19:27:56', '2026-06-08 08:12:09'),
(4, 3, 'Apel', 'Buah', 12000.00, 2, 'Kg', '1780931611_apel.jfif', 'enak', '2026-06-06 01:38:55', '2026-06-08 08:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petani','pembeli') NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `alamat_pengiriman` text DEFAULT NULL,
  `status_verifikasi` enum('Menunggu','Disetujui','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `role`, `foto_profil`, `alamat_pengiriman`, `status_verifikasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin AgriConnect', 'admin@agri.test', '$2y$12$mYD1GgfNnVTEpyldXO2MPepz469mCDQw.MNqKUFrhWHufP568gJkq', 'admin', NULL, NULL, 'Disetujui', NULL, '2026-06-05 10:35:38', '2026-06-05 10:35:38'),
(2, 'Vera cb', 'vera@gmail.com', '$2y$12$XZilR.9K2nMm8oIa9U3/V.brisrFT0Hy2sC5Pev97Ia.wypW05ZrW', 'pembeli', NULL, NULL, 'Disetujui', NULL, '2026-06-05 10:37:50', '2026-06-05 10:37:50'),
(3, 'ainur comell', 'ainur@gmail.com', '$2y$12$AdGRzmz0w7FhWVgWmyv0Nu7MKfqYW7xwqhrVDk8CBfwQHO6PjF84.', 'petani', NULL, NULL, 'Disetujui', NULL, '2026-06-05 10:38:33', '2026-06-05 10:39:20'),
(4, 'Gilang Firdaus', 'gilang@gmail.com', '$2y$12$jpjYFxYhndkBFjevw4MLRO4MXFmq93ChT/PycxL6F4YwWqfb2ygPG', 'petani', NULL, NULL, 'Disetujui', NULL, '2026-06-06 12:24:55', '2026-06-07 01:31:42'),
(5, 'Hafiz Arga', 'hafiz@gmail.com', '$2y$12$dniWht1s2n0cItZmtLc2AeyjVNHqVw8YWw0wX5U9neHfTx3HA3l.K', 'pembeli', '1780818908_ai-generated-9019518_1280.png', 'Surabaya', 'Disetujui', NULL, '2026-06-07 00:55:09', '2026-06-07 00:55:09'),
(6, 'Andra Andi', 'jul@gmail.com', '$2y$12$GB2uzPXyui88yCBMZdtR5uVJKvaO9Yi/9jpZuG2MLald7bBkgL7oG', 'petani', '1780911784_dosen.png', 'Madura', 'Disetujui', NULL, '2026-06-08 02:43:04', '2026-06-08 02:43:48'),
(7, 'Arga Dwi', 'arga@gmail.com', '$2y$12$jv9/guUMvaJxX3PrWycsFO69BE9FCRxwsXbP.rEmZ7XzviaxNYZ7W', 'petani', '1780920656_images (8).png', 'Surabaya Utara, Kenjeran', 'Disetujui', NULL, '2026-06-08 05:10:58', '2026-06-08 05:46:02'),
(8, 'Sisilia Nabila', 'sisil@gmail.com', '$2y$12$bNLiGHFnQxKjfs.zqO4bwONhjN62klezpNCRJ9cI78nd5KZG04OMy', 'petani', '1780921351_images (8).png', 'Bengkulu', 'Disetujui', NULL, '2026-06-08 05:22:31', '2026-06-08 05:30:36'),
(9, 'Balqis Safira', 'balqis@gmail.com', '$2y$12$Jq1jVORAg6Th3wf6kzLygOj6AwvgPABxBgbbhBPnLrQwpKt9KiHsS', 'pembeli', '1780921616_images (9).png', 'Kenjeran', 'Disetujui', NULL, '2026-06-08 05:26:56', '2026-06-08 05:26:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_room_id_foreign` (`room_id`),
  ADD KEY `chat_messages_pengirim_id_foreign` (`pengirim_id`);

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_rooms_petani_id_foreign` (`petani_id`),
  ADD KEY `chat_rooms_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `chat_rooms_lahan_id_foreign` (`lahan_id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanan_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lahan_petani_id_foreign` (`petani_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_minat`
--
ALTER TABLE `pengajuan_minat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_minat_lahan_id_foreign` (`lahan_id`),
  ADD KEY `pengajuan_minat_pembeli_id_foreign` (`pembeli_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_pembeli_id_foreign` (`pembeli_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_petani_id_foreign` (`petani_id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=730;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengajuan_minat`
--
ALTER TABLE `pengajuan_minat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `chat_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD CONSTRAINT `chat_rooms_lahan_id_foreign` FOREIGN KEY (`lahan_id`) REFERENCES `lahan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `chat_rooms_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_rooms_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lahan`
--
ALTER TABLE `lahan`
  ADD CONSTRAINT `lahan_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_minat`
--
ALTER TABLE `pengajuan_minat`
  ADD CONSTRAINT `pengajuan_minat_lahan_id_foreign` FOREIGN KEY (`lahan_id`) REFERENCES `lahan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_minat_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
