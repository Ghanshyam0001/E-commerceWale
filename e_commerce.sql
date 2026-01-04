-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 04:56 PM
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
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 7, 4, 1, '2026-01-04 05:11:02', '2026-01-04 05:11:02'),
(8, 7, 5, 1, '2026-01-04 08:36:13', '2026-01-04 08:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(2, 'Clothing', '2026-01-02 06:42:36', '2026-01-02 06:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `contects`
--

CREATE TABLE `contects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contects`
--

INSERT INTO `contects` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'gkpatel', 'gk@gmail.com', 'hii', '2026-01-04 05:24:06', '2026-01-04 05:24:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_02_043138_add_role_column_in_users_table', 2),
(6, '2026_01_02_071451_create_categories_table', 3),
(7, '2026_01_02_071501_create_products_table', 3),
(8, '2026_01_02_071624_create_sub_categories_table', 3),
(9, '2026_01_04_002244_create_carts_table', 4),
(10, '2026_01_04_065401_create_orders_table', 5),
(11, '2026_01_04_065436_create_order_items_table', 5),
(12, '2026_01_04_083112_add_status_to_orders_table', 6),
(13, '2026_01_04_104837_create_contects_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `company`, `address`, `city`, `country`, `postcode`, `mobile`, `email`, `total_amount`, `created_at`, `updated_at`, `status`) VALUES
(1, 7, 'ghanshyam', 'patel', NULL, 'Panavada,Mangalpur,malpur,Arvalli', 'ARAVALLI', 'India', '383345', '9081324595', 'admin@admin.com', 102493.00, '2026-01-04 01:40:42', '2026-01-04 01:40:42', 'pending'),
(2, 7, 'ghanshyam', 'patel', NULL, 'Panavada,Mangalpur,malpur,Arvalli', 'ARAVALLI', 'India', '383345', '9081324595', 'admin@admin.com', 6299.00, '2026-01-04 01:44:31', '2026-01-04 03:30:44', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 6, 15999.00, '2026-01-04 01:40:42', '2026-01-04 01:40:42'),
(2, 1, 5, 1, 2500.00, '2026-01-04 01:40:42', '2026-01-04 01:40:42'),
(3, 1, 6, 1, 3999.00, '2026-01-04 01:40:42', '2026-01-04 01:40:42'),
(4, 2, 4, 1, 1299.00, '2026-01-04 01:44:31', '2026-01-04 01:44:31'),
(5, 2, 5, 2, 2500.00, '2026-01-04 01:44:31', '2026-01-04 01:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `price`, `discount_price`, `sub_category_id`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'New Launched Samsung', 1, 42000.00, 15999.00, 1, 's24', '6957c76d54f9b.webp', '2026-01-02 07:56:05', '2026-01-02 07:56:05'),
(4, 'New Vivo y200', 1, 22000.00, 1299.00, 1, 'Y200', '6957ffba5cba1.jpeg', '2026-01-02 11:56:18', '2026-01-02 11:56:18'),
(5, 'Realme', 1, 30000.00, 2500.00, 1, 'C71', '6957ffe28c8e7.jpg', '2026-01-02 11:56:58', '2026-01-02 11:56:58'),
(6, 'Lg washing Machine', 1, 25000.00, 3999.00, 3, 'Lg Front Load Washing Machine', '6958001c0e831.webp', '2026-01-02 11:57:56', '2026-01-02 11:57:56'),
(7, 'Hcl Washing machine', 1, 12000.00, 2300.00, 3, 'Hcl Top Load Washing Machine', '695800643b319.webp', '2026-01-02 11:59:08', '2026-01-02 11:59:08'),
(8, 'Jio Book 11', 1, 25000.00, 1400.00, 2, 'Jio Book 2025  launched', '69580097d2bf4.jpg', '2026-01-02 11:59:59', '2026-01-02 11:59:59'),
(9, 'Lenovo Slim pad', 1, 40000.00, 2000.00, 2, 'Lenove i5 8GB Ram', '695800c6cb58f.webp', '2026-01-02 12:00:46', '2026-01-02 12:00:46'),
(10, 'Hp Computer', 1, 450000.00, 2300.00, 4, 'Hp Computer i5 16Gb Ram', '695800fba9b42.webp', '2026-01-02 12:01:39', '2026-01-02 12:01:39'),
(11, 'Lenovo', 1, 55000.00, 2400.00, 4, 'Lenovo i7 32gb Ram', '6958012a86a54.webp', '2026-01-02 12:02:26', '2026-01-02 12:02:26'),
(12, 'Jacket', 2, 4000.00, 299.00, 5, 'Mens Tranding  Jacket', '69580174a6798.webp', '2026-01-02 12:03:40', '2026-01-02 12:03:40'),
(13, 'T-shirt with Pent', 2, 5400.00, 1200.00, 5, 'T-shirt with pant', '695801b0d8acf.webp', '2026-01-02 12:04:40', '2026-01-02 12:04:40'),
(14, 'Tranding cloth', 2, 2899.00, 0.00, 6, 'women cloaths', '6958020253470.webp', '2026-01-02 12:06:02', '2026-01-02 12:06:02'),
(15, 'Ladies Shoot', 2, 5000.00, 1200.00, 6, 'Ladies Shoot', '695802361c583.webp', '2026-01-02 12:06:54', '2026-01-02 12:06:54'),
(16, 'Child Cloaths', 2, 2300.00, 200.00, 7, 'Child Cloaths T-shirt with Lower', '69580281e65a6.webp', '2026-01-02 12:08:09', '2026-01-02 12:08:09'),
(17, 'Child Cloaths', 2, 5099.00, 1200.00, 7, 'Stylish Child Cloaths', '695802cd2e682.webp', '2026-01-02 12:09:25', '2026-01-02 12:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 1, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(2, 'Laptop', 1, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(3, 'Washing Machine', 1, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(4, 'Computer', 1, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(5, 'Mens', 2, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(6, 'Women', 2, '2026-01-02 06:42:36', '2026-01-02 06:42:36'),
(7, 'Children', 2, '2026-01-02 06:42:36', '2026-01-02 06:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=> super Admin, 2=> Admin,3=>User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@gk.com', NULL, '$2y$12$d.IgVJVBXaTTijmXBgoZRO5Juhc732nMDPIygftvgjX5lY.fs5ao2', NULL, '2026-01-01 23:14:06', '2026-01-02 06:42:36', 1),
(2, 'sss', 'imadmin@example.com', NULL, '$2y$12$oBWtMwq6GZ7kKbBNLFHxtuOTCnBlU/F7n5xaX1ZrdPPxyFiKBjBWS', NULL, '2026-01-01 23:31:36', '2026-01-01 23:31:36', 2),
(3, 'Ghanshyam', 'gh@gmail.com', NULL, '$2y$12$wZ6jTgl4ctIrrPAMDI867e2G8aX9ZJ6geg9DWJZE2t2WeSKFes8P.', NULL, '2026-01-01 23:33:41', '2026-01-01 23:33:41', 2),
(5, 'keyur', 'keyur@example.com', NULL, '$2y$12$4/7LfaN2yeuSekdsrKf0iOSZvKzQzeWby8XvbfPx67kQ8WGAzseXG', NULL, '2026-01-02 00:29:48', '2026-01-02 00:29:48', 2),
(7, 'ghanshyam patel', 'g@gmail.com', NULL, '$2y$12$pRwIkjxhbdB7EolkwCp6DOL3U2OZRpB5/k1CXfA8Jsr4Ljn0MMCBm', NULL, '2026-01-03 19:28:27', '2026-01-03 19:28:27', 3),
(8, 'Ghanshyam', 'gk@gmail.com', NULL, '$2y$12$NHkjcShzSL2zOC2Mxq7MH.OvwPws2DEfZU3YYU7d5O1FxTzz65t0O', NULL, '2026-01-04 08:03:18', '2026-01-04 08:03:18', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contects`
--
ALTER TABLE `contects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contects_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contects`
--
ALTER TABLE `contects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
