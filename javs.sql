-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 01:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chanaka Dushmantha', 'chanaka@gmail.com', NULL, '$2y$10$34FqBvcD0qmD3H3GaflqtebkfGH7dyoyIABKewvSdUQi9vtQhGjvi', NULL, '2019-09-30 23:59:39', '2019-09-30 23:59:39'),
(2, 'Dilshan', 'dilshan@gmail.com', NULL, '$2y$10$cA0RN8uOyobjmMqoQYKzhucwGRoAOpykBJJJoVhInJnRxW8wOHiJ2', NULL, '2019-12-24 00:43:24', '2019-12-24 00:43:24');

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
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(31, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(32, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(33, '2016_06_01_000004_create_oauth_clients_table', 1),
(34, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(35, '2019_08_10_181355_create_students_table', 1),
(36, '2019_09_21_134524_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3f5c15ad6e1eaf5f92bf071200d084f06c66cf33d43b9df11c0e09c336b31d2039ee83376301f83d', 1, 1, 'chanaka@gmail.com-2019-12-20 17:22:22', '[]', 0, '2019-12-20 11:52:22', '2019-12-20 11:52:22', '2020-12-20 17:22:22'),
('b8ef983eff09654f93ddd2bff2d4e5f4edae72ddbc062c1ecf0f1a376c0d0a2191884364f5024263', 1, 1, 'chanaka@gmail.com-2019-12-20 17:19:13', '[]', 0, '2019-12-20 11:49:16', '2019-12-20 11:49:16', '2020-12-20 17:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, NULL, 'Laravel Personal Access Client', 'JkCwa3ZT3XBlHZe2xngdzBMnIiz7onnAFhMNX8Pz', 'http://localhost', 1, 0, 0, '2019-09-30 23:58:47', '2019-09-30 23:58:47'),
(2, NULL, 'Laravel Password Grant Client', 'o0t7gXSRRAACEZyE0CjxAsXL5YyjGwht2D7MoKCz', 'http://localhost', 0, 1, 0, '2019-09-30 23:58:48', '2019-09-30 23:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-09-30 23:58:47', '2019-09-30 23:58:47');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `reg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regb` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameb` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailb` tinyint(1) NOT NULL DEFAULT 0,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telb` tinyint(1) NOT NULL DEFAULT 0,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicb` tinyint(1) NOT NULL DEFAULT 0,
  `loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locb` tinyint(1) NOT NULL DEFAULT 0,
  `dob` date DEFAULT NULL,
  `dobb` tinyint(1) NOT NULL DEFAULT 0,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courseb` tinyint(1) NOT NULL DEFAULT 0,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levelb` tinyint(1) NOT NULL DEFAULT 0,
  `gpa` decimal(8,2) DEFAULT NULL,
  `gpab` tinyint(1) NOT NULL DEFAULT 0,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degreeb` tinyint(1) NOT NULL DEFAULT 0,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durationb` tinyint(1) NOT NULL DEFAULT 0,
  `achiev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievb` tinyint(1) NOT NULL DEFAULT 0,
  `p1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p1b` tinyint(1) NOT NULL DEFAULT 0,
  `p2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p2b` tinyint(1) NOT NULL DEFAULT 0,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedinb` tinyint(1) NOT NULL DEFAULT 0,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `githubb` tinyint(1) NOT NULL DEFAULT 0,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebookb` tinyint(1) NOT NULL DEFAULT 0,
  `AccessLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index`, `status`, `reg`, `regb`, `name`, `nameb`, `email`, `emailb`, `pass`, `tel`, `telb`, `nic`, `nicb`, `loc`, `locb`, `dob`, `dobb`, `course`, `courseb`, `level`, `levelb`, `gpa`, `gpab`, `degree`, `degreeb`, `duration`, `durationb`, `achiev`, `achievb`, `p1`, `p1b`, `p2`, `p2b`, `linkedin`, `linkedinb`, `github`, `githubb`, `facebook`, `facebookb`, `AccessLink`, `image`, `created_at`, `updated_at`) VALUES
('S-1111', 0, '2016/SP/444', 1, 'dfbddf fbf sfgtwyjmhmujmrds', 1, 'ds@fb.com', 0, '11', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1569907817-13WzAhXhsp', '1569952169.png', '2019-10-01 00:00:17', '2019-10-01 00:00:17'),
('S-9415', 1, '2016/SP/193', 0, 'Kaveesha Senanayake', 0, 'kavee@gmail.com', 0, '111111', '071-8696457', 0, '946889391v', 0, 'kurunegala', 0, '1994-09-15', 0, 'Physical Science', 0, '3M', 0, '3.06', 0, 'Bachelor of Science Honours in Computer Science', 0, '4 years', 0, NULL, 0, NULL, 0, NULL, 0, 'https://www.linkedin.com/in/KaveeshaSenanayake', 0, 'https://www.github.com/kaveesha', 0, NULL, 0, '1577358692-nXTVOEw5tZ', NULL, '2019-12-26 05:41:32', '2019-12-26 05:41:32'),
('S-9454', 1, '2016/SP/314', 1, 'Chanaka Dushmantha Adikari', 0, 'chanaka@gmail.com', 0, '111111', '078-2425431', 0, '960120884v', 1, 'Badulla', 0, '1996-01-12', 0, 'Physical Science', 1, '3M', 1, '3.11', 0, 'Bachelor of Science Honours in Computer Science', 0, '4 years', 0, 'participate UOJ coders 1.0', 0, 'Result management system\nA result management system is a web application that helps Science Faculty to calculate and issuing student results.\nTechnologies - laravel PHP with MySQL and html, css, javascript.', 0, 'Job application verification system     \nThe job application verification system is a web application that helps companies to verify the correctness of application details.\nTechnologies - Vue js framework (html,css,javascript) and laravel PHP framework.', 0, 'https://www.linkedin.com/in/chanaka-dushmantha-36776218b/', 0, 'https://www.github.com/ChanakaDushmantha', 0, NULL, 0, '1576916065-KRup50YL2M', '1576922316.png', '2019-12-20 11:50:28', '2019-12-20 11:50:28'),
('S-9457', 1, '2016/SP/029', 0, 'Shyamali Hasanthika Ekanayaka', 0, 'shyamali@gmail.com', 0, '111111', '071-5757584', 0, '956523114v', 1, 'Kandy', 0, '1995-04-05', 1, 'Physical Science', 1, '3M', 0, '3.22', 1, 'Bachelor of Science Honours in Computer Science', 0, '4 years', 0, NULL, 0, 'Mobile Shop Management System', 0, 'Job Application Verification System', 0, 'https://www.linkedin.com/in/ShammiEkanayaka', 0, NULL, 0, NULL, 0, '1576914142-Xc4T5QXAko', '1576914997.png', '2019-12-21 02:12:22', '2019-12-21 02:12:22'),
('S-9991', 0, '2016/SP/991', 0, 'Hasith Vidranga', 0, 'hasitha@gmail.com', 0, '111111', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '3M', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1577266745-XPQGOp3aHs', NULL, '2019-12-25 04:09:05', '2019-12-25 04:09:05'),
('S-9992', 0, '2016/SP/992', 0, 'Gayan Madusanka', 0, 'gayan@gmail.com', 0, '111111', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '3G', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1577266806-naEIaXArkW', NULL, '2019-12-25 04:10:06', '2019-12-25 04:10:06'),
('S-9993', 0, '2016/SP/993', 0, 'Denuwan Kanishka', 0, 'denuwan@gmail.com', 0, '111111', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '3G', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1577266904-7Ubd545NFA', NULL, '2019-12-25 04:11:44', '2019-12-25 04:11:44'),
('S-9994', 0, '2016/SP/994', 0, 'Saman Wijesinghe', 0, 'saman@gmail.com', 0, '111111', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '3G', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1577267165-COe28wIuch', NULL, '2019-12-25 04:16:05', '2019-12-25 04:16:05'),
('S-9995', 0, '2016/SP/995', 0, 'Nisal Madhuranga', 0, 'nisal@gmail.com', 0, '111111', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '3G', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '1577267838-ON9mzGMMRu', NULL, '2019-12-25 04:27:18', '2019-12-25 04:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `index`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'S-1111', 0, '$2y$10$ADcdTZpPTw7SVa68M1F5re51SuzYsfteECyLfT70/BQuQyT7zQZL6', NULL, '2019-10-01 00:00:17', '2019-10-01 00:00:17'),
(2, 'S-9454', 1, '$2y$10$X.ug1psCYygt45Jq059e0.2QOKHi4dwPPI7G7651zlCyjfF3RYNQa', NULL, '2019-12-20 11:50:28', '2019-12-20 11:50:28'),
(3, 'S-9457', 1, '$2y$10$hZ3RDRHbVHx0.MnbIrX7ve3pllD2o8DLavt3plkflNOg9TZ7uiRpq', NULL, '2019-12-21 02:12:22', '2019-12-21 02:12:22'),
(4, 'S-9991', 0, '$2y$10$sBU5Z7cAwNO2xs61axozjeCGWnvka.fwrzTUTIVQCAaZYAjlpv4uq', NULL, '2019-12-25 04:09:06', '2019-12-25 04:09:06'),
(5, 'S-9992', 0, '$2y$10$Ap3JYNXz7RFjx8YYdW.zN.wJQ9HCJSXPKj68ZkUfqRe1bv1EbQ6XW', NULL, '2019-12-25 04:10:06', '2019-12-25 04:10:06'),
(6, 'S-9993', 0, '$2y$10$OuLcUqwBFk27lbX8kxJ9LubpnM6gomtbHnf94.4WebJ3.xnZyGvg6', NULL, '2019-12-25 04:11:44', '2019-12-25 04:11:44'),
(7, 'S-9994', 0, '$2y$10$zl9Y1vYf7OkkeFqGTHpFW.GBtAG0FoE6p3TNFpmqXb/pcqRqnAwki', NULL, '2019-12-25 04:16:05', '2019-12-25 04:16:05'),
(8, 'S-9995', 0, '$2y$10$MT4sFUY10HVk4fMbF3XECuj7UCSEU1IrovWrZjHbQ1GM.1MZVF6fG', NULL, '2019-12-25 04:27:18', '2019-12-25 04:27:18'),
(9, 'S-9415', 1, '$2y$10$HbE45Anti5SDXRTVW2OsKufS3/t06xNW0ni41RWIL1sWI6zNUtOkG', NULL, '2019-12-26 05:41:33', '2019-12-26 05:41:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
