-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 07:46 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(9) NOT NULL,
  `downline_id` int(9) NOT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `downline_id`, `amount`) VALUES
(2, 2, '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(9) NOT NULL,
  `user_ic` bigint(13) NOT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cycles`
--

CREATE TABLE `cycles` (
  `id` int(2) NOT NULL,
  `number_of_cycle` int(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycles`
--

INSERT INTO `cycles` (`id`, `number_of_cycle`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `downlines`
--

CREATE TABLE `downlines` (
  `id` int(9) NOT NULL,
  `parent_user_ic` bigint(13) NOT NULL,
  `referred_user_ic` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downlines`
--

INSERT INTO `downlines` (`id`, `parent_user_ic`, `referred_user_ic`) VALUES
(2, 1000, 901010145667);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(9, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(10, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(11, '2016_06_01_000004_create_oauth_clients_table', 1),
(12, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(17, '2017_07_20_155052_create_payout_requests_table', 2),
(18, '2017_07_20_160410_alter_user_id_to_user_ic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '4p4HCr0Ipur9utabzuMnUlkgkaEV9ukqVXnV3YBk', 'http://localhost', 1, 0, 0, '2017-07-20 08:43:04', '2017-07-20 08:43:04'),
(2, NULL, 'Laravel Password Grant Client', 'CMNdFrKhKTl8DNJM997TuoqdI3Xfv8oSDPM1rzZq', 'http://localhost', 0, 1, 0, '2017-07-20 08:43:04', '2017-07-20 08:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-07-20 08:43:04', '2017-07-20 08:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_requests`
--

CREATE TABLE `payout_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_ic` bigint(13) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `payout_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_placements`
--

CREATE TABLE `pending_placements` (
  `id` int(9) NOT NULL,
  `user_ic` bigint(13) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(9) NOT NULL,
  `user_ic` bigint(13) NOT NULL,
  `status` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_refresh`
--

CREATE TABLE `update_refresh` (
  `update_name` varchar(25) NOT NULL,
  `refreshed_at` datetime NOT NULL COMMENT 'time at refreshed points'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_refresh`
--

INSERT INTO `update_refresh` (`update_name`, `refreshed_at`) VALUES
('pending_placements', '2017-07-15 06:34:48'),
('pending_commissions', '2017-07-15 14:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `ic` bigint(13) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `upline_user` bigint(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ic`, `user_type`, `status`, `username`, `password`, `email`, `created_at`, `updated_at`, `upline_user`) VALUES
(4, 1000, 'user', 'passive', NULL, '$2y$10$S6u97.uIxnoRPECTpvKLgefkEz6SDCfFKxxNWx0XfpQ7Z46vDlk6y', 'sparta@rome.com', '2017-08-10 08:32:44', '2017-08-10 16:32:44', NULL),
(2, 901010145667, 'user', 'passive', NULL, '$2y$10$IHmspfoWNQbBakjdjV0FOOKs3zPA/VWUIGh.QqRezihVY.BcabEIS', 'test@test.com', '2017-08-09 07:50:17', '2017-08-09 15:50:17', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(9) NOT NULL,
  `user_ic` bigint(13) NOT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_ic`, `amount`) VALUES
(2, 1000, '75.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downline_id` (`downline_id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_ic`);

--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downlines`
--
ALTER TABLE `downlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_user_ic`),
  ADD KEY `referred_id` (`referred_user_ic`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `payout_requests`
--
ALTER TABLE `payout_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payout_requests_ibfk_1` (`user_ic`);

--
-- Indexes for table `pending_placements`
--
ALTER TABLE `pending_placements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_ic`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_ic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ic`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `users_ibfk_1` (`upline_user`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `downlines`
--
ALTER TABLE `downlines`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payout_requests`
--
ALTER TABLE `payout_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pending_placements`
--
ALTER TABLE `pending_placements`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commissions`
--
ALTER TABLE `commissions`
  ADD CONSTRAINT `commissions_ibfk_1` FOREIGN KEY (`downline_id`) REFERENCES `downlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `downlines`
--
ALTER TABLE `downlines`
  ADD CONSTRAINT `downlines_ibfk_1` FOREIGN KEY (`parent_user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `downlines_ibfk_2` FOREIGN KEY (`referred_user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payout_requests`
--
ALTER TABLE `payout_requests`
  ADD CONSTRAINT `payout_requests_ibfk_1` FOREIGN KEY (`user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending_placements`
--
ALTER TABLE `pending_placements`
  ADD CONSTRAINT `pending_placements_ibfk_1` FOREIGN KEY (`user_ic`) REFERENCES `users` (`ic`);

--
-- Constraints for table `placements`
--
ALTER TABLE `placements`
  ADD CONSTRAINT `placements_ibfk_1` FOREIGN KEY (`user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`upline_user`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_ic`) REFERENCES `users` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
