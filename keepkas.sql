-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2019 pada 08.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `level`, `kelas`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', 'Admin', '', '$2y$10$GNmyODUi1p9lImGAB4ANP.g4xNUjOKI7a24tuc7xcqSPRkY3ZqfQC', '8b3l5DUiLt9QHR0renZGZuqA2HeXwPw7zMbkbyVCFUfuFAYc3clVPiPPhlLj', '2019-06-03 23:56:06', '2019-06-12 00:55:20'),
(2, 'Bendahara', 'benda@mail.com', 'Bendahara', '11-A', '$2y$10$ETIJCdUTGK.CYFEOXIiRSeyPJ4UaYNSvZwQ6gGyOHElYbl7ZTTUIC', 'LGHDQJpQUkFSH9XIjjUomlIiStwjqZV2O8H9FqosFCEG21iMy04sbdyyXYWd', '2019-06-08 02:10:19', '2019-06-08 02:10:19'),
(5, 'Wali Kelas', 'wali@mail.com', 'Wali Kelas', '11-A', '$2y$10$QyLKX1rsn9kcgqnM4ZpIce.Sp1GIL3vEUfI9BASlmR6vaoO9.30Uy', 'Ffd8kr9TxHYIjgtU13Pj3U8d69p315bEebWbypFtA9eHtyH6ZHQJFDQk1jA8', '2019-06-13 10:11:14', '2019-06-13 10:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bendaharas`
--

CREATE TABLE `bendaharas` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bendaharas`
--

INSERT INTO `bendaharas` (`id`, `admin_id`, `nama`, `email`, `nis`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 2, 'Bendahara', 'benda@mail.com', '123456789', '11-A', '2019-06-08 02:10:19', '2019-06-08 02:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_keluars`
--

CREATE TABLE `kas_keluars` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kas_keluars`
--

INSERT INTO `kas_keluars` (`id`, `keterangan`, `kelas`, `tanggal`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 'Baju Sekolah', '11-A', '2019-06-25', '20000', '2019-06-25 09:26:22', '2019-06-25 09:26:22'),
(3, 'Sepatu', '11-A', '2019-06-25', '5000', '2019-06-25 16:28:28', '2019-06-25 16:28:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masuks`
--

CREATE TABLE `kas_masuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kas_masuks`
--

INSERT INTO `kas_masuks` (`id`, `nis`, `nama`, `kelas`, `waktu`, `status`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Ahmad Syarif', '10-A', '2019-06-04 14:05:00', 'Terkonfirmasi', '5000', NULL, NULL),
(2, '123456', 'Ahmad Syarif', '11-A', '2019-06-04 14:05:00', 'Terkonfirmasi', '5000', NULL, NULL),
(3, '070216307', 'Ahmad Syarif', '11-A', '2019-06-04 14:05:00', 'Terkonfirmasi', '5000', NULL, NULL),
(4, '070216307', 'Ahmad Syarif', '11-A', '2019-06-04 14:05:00', 'Terkonfirmasi', '5000', NULL, '2019-06-08 09:55:07'),
(5, '070216307', 'Ahmad Syarif', '10-A', '2019-06-08 14:16:57', 'Terkonfirmasi', '1500', '2019-06-08 07:16:57', '2019-06-08 10:09:11'),
(6, '070216307', 'Ahmad Syarif', '11-A', '2019-06-08 14:42:06', 'Terkonfirmasi', '1500', '2019-06-08 07:42:06', '2019-06-08 10:09:17'),
(11, '070216307', 'Ahmad Syarif', '11-A', '2019-06-08 15:12:06', 'Terkonfirmasi', '2500', '2019-06-08 08:12:06', '2019-06-08 10:09:14'),
(12, '070216307', 'Ahmad Syarif', '11-A', '2019-06-08 15:27:19', 'Terkonfirmasi', '3000', '2019-06-08 08:27:19', '2019-06-08 10:09:20'),
(16, '070216307', 'Ahmad Syarif', '11-A', '2019-06-08 15:43:52', 'Terkonfirmasi', '1500', '2019-06-08 08:43:52', '2019-06-08 10:09:24'),
(18, '0702163010', 'Ahmad Syarif', '11-A', '2019-06-08 17:06:48', 'Terkonfirmasi', '5000', '2019-06-08 10:06:48', '2019-06-08 10:07:56'),
(19, '0702163010', 'Ahmad Syarif', '11-A', '2019-06-08 17:07:31', 'Terkonfirmasi', '10000', '2019-06-08 10:07:31', '2019-06-08 10:08:18'),
(20, '070216307', 'Ahmad Syarif', '11-A', '2019-06-23 20:18:35', 'Terkonfirmasi', '5000', '2019-06-23 13:18:35', '2019-06-23 13:20:57'),
(21, '070216307', 'Ahmad Syarif', '11-A', '2019-06-23 22:02:20', 'Terkonfirmasi', '4000', '2019-06-23 15:02:20', '2019-06-23 15:17:40'),
(22, '070216307', 'Ahmad Syarif', '11-A', '2019-06-25 23:09:02', 'Terkonfirmasi', '2000', '2019-06-25 16:09:02', '2019-06-25 16:40:12'),
(23, '070216307', 'Ahmad Syarif', '11-A', '2019-06-25 23:41:13', 'Terkonfirmasi', '2000', '2019-06-25 16:41:13', '2019-06-25 16:43:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, '10-A', '2019-06-04 00:00:50', '2019-06-04 00:00:50'),
(2, '11-A', '2019-06-04 00:00:55', '2019-06-04 00:00:55'),
(4, '12-A', '2019-06-06 04:01:10', '2019-06-06 08:41:05');

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
(3, '2019_06_01_032740_create_admins_table', 1),
(4, '2019_06_03_023002_create_bendaharas_table', 1),
(5, '2019_06_03_023102_create_kas_keluars_table', 1),
(6, '2019_06_03_023121_create_kas_masuks_table', 1),
(7, '2019_06_03_023159_create_kelas_table', 1),
(8, '2019_06_03_023230_create_wali_kelas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@mail.com', '$2y$10$eTjlL0bbmg7DTm5yfPaVGum254ruQf2Gld0yWt5yBrEUrE0RyAW06', '2019-06-29 16:26:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `kelas`, `jumlah`, `tanggal`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 'Ahmad Syarif', '070216307', 'ahmad.syarif@gmail.com', '$2y$10$bE8jEqbt2jv.5E/jx5kdnOL.DVqp11KGnsxhcVLctmiVFCnw0/9Gi', '11-A', '31500', '2019-06-25', '070216307.jpg', 'jsB0V7OUDUp2xPh12kJY3h1dyJjiTp9CMtOS5y3cVNY0EleIDMAtefKQmrag', '2019-06-07 02:12:22', '2019-06-25 16:43:27'),
(27, 'Ahmad Syarif', '0702163010', 'ahmad.syarif@mail.com', '$2y$10$buDYcmdDJwT.ba6CU968d.7Sp4e65Wo6YpizLAG1.fHsvGGFMojq2', '11-A', '15000', '2019-06-08', NULL, 'jn57MJgC6cpKTmFkHElcludAf82DGdCsRZbFDOl65Ne9EOfXGE7i1EQ21a08', '2019-06-08 03:06:16', '2019-06-08 10:08:18'),
(28, 'Teguh Kurniawan', '0702163011', 'teguh@mail.com', '$2y$10$v78aQontnTq31iAfcboJ1uHqwhHyhxZdsLgN1/oFS7SQoJ2KD9GEK', '10-A', NULL, NULL, NULL, 'TjVuEqzyUa3ZUaP8hdZxNjTKXjsKMzFfnCNnf21xu7FItZKuYUmUx6HarJjI', '2019-06-09 05:08:32', '2019-06-09 05:09:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `admin_id`, `nama`, `email`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 5, 'Wali Kelas', 'wali@mail.com', '11-A', '2019-06-13 10:11:14', '2019-06-13 10:11:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `bendaharas`
--
ALTER TABLE `bendaharas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_keluars`
--
ALTER TABLE `kas_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_masuks`
--
ALTER TABLE `kas_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bendaharas`
--
ALTER TABLE `bendaharas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kas_keluars`
--
ALTER TABLE `kas_keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kas_masuks`
--
ALTER TABLE `kas_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
