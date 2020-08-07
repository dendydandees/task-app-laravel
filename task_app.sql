-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 11:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_19_042143_create_tasks_table', 1),
(5, '2020_06_30_053556_create_subtasks_table', 1),
(6, '2020_07_04_031857_add_avatar_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE `subtasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`id`, `task_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Consequuntur sint nulla est alias.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(2, 1, 'Ullam perferendis aliquid voluptas libero aperiam.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(3, 1, 'Et dolorem doloremque culpa cumque dolores non.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(4, 2, 'Beatae et distinctio et qui.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(5, 3, 'Qui et omnis officia ut.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(6, 3, 'Deleniti eos sed et.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(7, 3, 'Voluptatem voluptas et architecto voluptate beatae velit.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(8, 4, 'Nihil sed vitae ducimus voluptatum libero expedita.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(9, 5, 'Veritatis itaque molestiae hic asperiores animi fugit.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(10, 5, 'Qui dolor explicabo eaque eligendi nam et provident.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(11, 6, 'Laborum mollitia officia pariatur non quis ut.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(12, 7, 'Maiores qui quod aut iusto.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(13, 8, 'Vitae et possimus iure assumenda illum aliquid ut.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(14, 9, 'Amet numquam tenetur quaerat est.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(15, 9, 'Ea voluptas praesentium minus recusandae.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(16, 9, 'Velit ea aut sed sunt eum molestiae sunt molestiae.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(17, 10, 'Illum et rerum cupiditate sed.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(18, 10, 'Voluptatem vitae architecto nostrum laboriosam.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(19, 10, 'Consequatur illum veritatis hic nihil porro.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(20, 11, 'Nam saepe sit est animi culpa totam eligendi.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(21, 11, 'Nobis tempore quaerat aperiam non praesentium maxime.', '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(22, 11, 'Perferendis praesentium et sequi sequi assumenda ullam.', '2020-08-07 02:24:05', '2020-08-07 02:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_complete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `detail`, `is_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fuga reiciendis in commodi.', 'Quam repudiandae repudiandae mollitia et.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(2, 1, 'Quidem expedita id delectus laborum.', 'Est ea vel est omnis.', 0, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(3, 1, 'Optio a omnis nihil architecto recusandae quisquam.', 'Qui fuga et quia et aut.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(4, 1, 'Et aut et voluptatibus quod.', 'Dignissimos qui quidem quia omnis.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(5, 1, 'Consequuntur eos ut ipsam beatae dignissimos vero non.', 'Assumenda est aut at sint.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(6, 1, 'Sequi vel nam architecto quis voluptas amet.', 'Nulla enim eum perferendis ut cupiditate corporis.', 0, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(7, 1, 'Autem aspernatur illo sequi vitae sequi.', 'Et asperiores magnam nostrum.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(8, 1, 'Veritatis aut praesentium vel quia.', 'Quia iusto cum fuga assumenda et.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(9, 1, 'Voluptatum maxime suscipit vero voluptas.', 'Molestias nisi reiciendis et dolorum incidunt eveniet ut aut.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(10, 1, 'Praesentium alias odit ea nisi qui accusamus.', 'Qui quibusdam natus omnis quisquam a rem autem sunt.', 1, '2020-08-07 02:24:05', '2020-08-07 02:24:05'),
(11, 1, 'Dicta minima aliquid voluptatem blanditiis fugiat.', 'Laboriosam aspernatur nostrum eaque qui aut iusto ut.', 0, '2020-08-07 02:24:05', '2020-08-07 02:24:05');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Dendy Dharmawan', 'dendydharmawanq@gmail.com', NULL, '$2y$10$MEnCqw2AZz2zRljxqzQgFuDy39wy1tkkhJ9jONV4REg7VMuj12MNa', NULL, NULL, '2020-08-07 02:23:22', '2020-08-07 02:23:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subtasks_task_id_foreign` (`task_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subtasks`
--
ALTER TABLE `subtasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD CONSTRAINT `subtasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
