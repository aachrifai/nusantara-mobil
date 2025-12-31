-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2025 pada 05.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toyota_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `car_specs`
--

CREATE TABLE `car_specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `transmisi_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`transmisi_options`)),
  `fuel_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`fuel_options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `car_specs`
--

INSERT INTO `car_specs` (`id`, `model_name`, `image`, `transmisi_options`, `fuel_options`, `created_at`, `updated_at`) VALUES
(1, 'GT86', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(2, 'Corolla', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(3, 'Yaris', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(4, 'Aygo', NULL, '[\"Manual\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(5, 'Innova', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(6, 'Auris', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(7, 'Avensis', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(8, 'Camry', NULL, '[\"Automatic\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(9, 'C-HR', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(10, 'Hilux', NULL, '[\"Manual\",\"Automatic\"]', '[\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(11, 'IQ', NULL, '[\"Manual\",\"CVT\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(12, 'LandCruiser', NULL, '[\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(13, 'Prius', NULL, '[\"CVT\"]', '[\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(14, 'ProaceVerso', NULL, '[\"Manual\",\"Automatic\"]', '[\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(15, 'Alphard', 'cars/3KqKgqY6TZ04CZs8DOC4wF5DO9H3Qrc4NIkoRnuh.jpg', '[\"Automatic\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:29:07'),
(16, 'Calya', NULL, '[\"Manual\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(17, 'Avanza', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(18, 'Fortuner', NULL, '[\"Manual\",\"Automatic\"]', '[\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(19, 'Kijang', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(20, 'LGX', NULL, '[\"Automatic\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(21, 'Raize', NULL, '[\"Manual\",\"CVT\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(22, 'RAV4', NULL, '[\"Manual\",\"CVT\",\"Automatic\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(23, 'Rush', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(24, 'Supra', NULL, '[\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(25, 'UrbanCruiser', NULL, '[\"Manual\",\"CVT\"]', '[\"Petrol\",\"Hybrid\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(26, 'Veloz', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(27, 'Verso', NULL, '[\"Manual\",\"Automatic\"]', '[\"Petrol\",\"Diesel\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35'),
(28, 'Verso-S', NULL, '[\"Manual\",\"CVT\"]', '[\"Petrol\"]', '2025-12-29 19:02:35', '2025-12-29 19:02:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Tersedia','Terjual') NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `listings`
--

INSERT INTO `listings` (`id`, `title`, `brand`, `price`, `year`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Avanza Veloz 1.5', 'Toyota', 215000000.00, 2020, 'listings/0pqb6Ui0VKwet5Z7kzPAJlO084swmz1oFmulucfl.jpg', 'Kondisi mulus, pajak hidup, siap pakai luar kota.', 'Terjual', '2025-12-29 23:18:47', '2025-12-30 00:45:53'),
(2, 'Toyota Fortuner VRZ TRD', 'Toyota', 485000000.00, 2019, 'listings/WJa6SKhl6TJWwDwFQrKTi2ErL0UiEui4mY51EIaq.jpg', 'Diesel, Tangan pertama, service record Auto2000.', 'Tersedia', '2025-12-29 23:18:47', '2025-12-30 00:11:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_29_073709_create_car_specs_table', 1),
(5, '2025_12_29_082306_add_image_to_car_specs_table', 1),
(6, '2025_12_30_061718_create_listings_table', 2),
(7, '2025_12_30_062355_create_settings_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aYO0HDxiN4FYgndN4EruNaI3gOFx9hFHtfCfgOkg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjBMUFlrMUxTZXVJTlJGdHhTaDNCYURnSWQxMkc1ZWNhYmdQakdyOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767152244);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'hero_title', 'Temukan Mobil Impianmu', '2025-12-29 23:25:56', '2025-12-29 23:58:59'),
(2, 'hero_subtitle', 'Nusantara Mobil menyediakan unit terbaik dan gahar', '2025-12-29 23:25:56', '2025-12-29 23:58:59'),
(3, 'hero_image', 'hero/giXvMff593DXkxRzsYO3T3vuGXkaqNn2Ec7Yfrso.jpg', '2025-12-29 23:25:56', '2025-12-29 23:58:59'),
(4, 'company_map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14388.213741889935!2d109.89971300112332!3d-7.382028883909595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa1983503112b%3A0xa54826044677a186!2sGOR%20Indoor%20Wonosobo!5e0!3m2!1sid!2sid!4v1767146872057!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-12-30 19:12:37', '2025-12-30 19:12:37'),
(5, 'company_address', 'Wonolelo, Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56313', '2025-12-30 19:18:40', '2025-12-30 19:18:40'),
(6, 'company_hours', 'Senin-Kamis: 08.00-09.00', '2025-12-30 19:18:40', '2025-12-30 19:18:40'),
(7, 'company_phone', '085712225069', '2025-12-30 19:18:40', '2025-12-30 19:18:40'),
(8, 'units_sold', '100+', '2025-12-30 20:26:30', '2025-12-30 20:26:30'),
(9, 'customer_satisfaction', '99%', '2025-12-30 20:26:30', '2025-12-30 20:31:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@toyota.com', NULL, '$2y$12$1p02cfQfw3PlpYB7eFsWNe7Mf.rc0W.kp0jf9gqH.uYmLQT02TlrO', NULL, '2025-12-29 19:02:43', '2025-12-29 19:02:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `car_specs`
--
ALTER TABLE `car_specs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_specs_model_name_unique` (`model_name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

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
-- AUTO_INCREMENT untuk tabel `car_specs`
--
ALTER TABLE `car_specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
