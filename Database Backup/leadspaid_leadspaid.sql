-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2023 at 08:49 AM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadspaid_leadspaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(200) DEFAULT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `country` text COLLATE utf8mb4_unicode_ci,
  `country_code` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `status` int(200) NOT NULL DEFAULT '1' COMMENT '1 = active, 2 = banned, 0 = deactive,',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `role`, `company_name`, `country`, `country_code`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Leads Paid', 'admin@leadspaid.com', 'leadspaid', NULL, '63c02eda2bd381673539290.png', '$2y$10$4XUwq4hjsYz1I7HQPBizkOT1uBQ41gsDEVWwQ.RzVLe9IH.NHl3cC', NULL, 'Leads Paid Inc.', NULL, NULL, NULL, 1, NULL, '2023-01-14 06:01:41'),
(3, 'Adminuser', 'demoadmin@gmail.com', 'demoadmin@gmail.com', NULL, NULL, '$2y$10$zS3QXZLnbKXETio1wcjFLOogeCbR2L1t4.goQPLyl6Bb6HEnXCcqO', 1, 'Leads Paid Inc.', 'Sao Tome and Principe', '+65', '123131654632151321', 0, '2023-01-18 12:23:42', '2023-01-22 04:53:33'),
(4, 'topstar199026', 'topstar199026@gmail.com', 'topstar199026@gmail.com', NULL, NULL, '$2y$10$dTwM160/UJZcfR/XE0eoNesw3ZQp7pPRQprb/wFqr15de8uuhTW6W', 1, 'Leads Paid Inc.', NULL, NULL, NULL, 1, '2023-01-18 12:23:42', '2023-01-18 12:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billed_to` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(18,8) DEFAULT '0.00000000',
  `status` int(11) NOT NULL COMMENT '0 = Pending Approval, 1 = Active, 2 = Rejected, 3=Banned',
  `rejection_remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev` int(11) DEFAULT NULL,
  `sv` int(11) DEFAULT NULL,
  `ts` int(11) DEFAULT NULL,
  `tv` int(11) DEFAULT NULL,
  `tsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver_code_send_at` datetime DEFAULT NULL,
  `click_credit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `impression_credit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_budget` float NOT NULL DEFAULT '0',
  `amount_used` float NOT NULL DEFAULT '0',
  `wallet_deposit` float NOT NULL DEFAULT '0',
  `product_services` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Website` text COLLATE utf8mb4_unicode_ci,
  `Social` text COLLATE utf8mb4_unicode_ci,
  `ad_budget` decimal(11,2) DEFAULT NULL,
  `card_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `assign_publisher` text COLLATE utf8mb4_unicode_ci,
  `assign_publisher_by_pub` text COLLATE utf8mb4_unicode_ci,
  `assign_cm` text COLLATE utf8mb4_unicode_ci,
  `assign_cm_by_pub` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_activated` int(100) NOT NULL,
  `nextbill` date DEFAULT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `name`, `email`, `username`, `image`, `country`, `city`, `company_name`, `billed_to`, `postal_code`, `mobile`, `country_code`, `password`, `balance`, `status`, `rejection_remarks`, `ev`, `sv`, `ts`, `tv`, `tsc`, `ver_code`, `ver_code_send_at`, `click_credit`, `impression_credit`, `total_budget`, `amount_used`, `wallet_deposit`, `product_services`, `Website`, `Social`, `ad_budget`, `card_session`, `assign_publisher`, `assign_publisher_by_pub`, `assign_cm`, `assign_cm_by_pub`, `created_at`, `updated_at`, `email_activated`, `nextbill`, `address`) VALUES
(1, 'Name', 'topstar199026@gmail.com', 'topstar199026@gmail.com', 'logo-1675587671650.jpg', 'Singapore', 'city', 'Company', '372 HOUGANG STREET 31', '12365468', '123654654', '', '$2y$10$lH7iNJNVm.d0reTral7r3OAr5FdT5imQHc7FDFdtKOlZQ4fn5Zzpy', '0.00000000', 1, 'test', 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 100, 1000, 290, '', '', '', NULL, 'seti_1Lzsx7Lvd118Nt671KT8oUuE', '[\"3\",\"5\",\"9\",\"19\"]', NULL, NULL, NULL, '2022-10-29 15:56:14', '2023-02-05 09:01:14', 0, '2023-02-04', 'Address'),
(73, 'Tejinder Singh', 'tejinder.email@gmail.com', 'tejinder.email', NULL, 'United States', NULL, 'Hero', '', '', '919023412334', '+91', '$2y$10$mK7PvJ/P63E1vQZ5xaK77OS68zCPc/8aLK32flWRa.hsuMNInTrGe', '0.00000000', 3, 't2', 1, 1, 0, 1, NULL, '277330', '2023-01-05 15:26:09', NULL, NULL, 0, 0, 0, 'Lead Generation InformationLead Generation InformationLead Generation InformationLead Generation Information', 'web.com', 'social', '1000.00', '', '[\"3\",\"5\",\"9\",\"19\",\"3\"]', '[\"5\"]', NULL, '[\"6\",\"7\"]', '2023-01-05 15:25:09', '2023-02-05 08:07:38', 0, NULL, NULL),
(76, 'Komal Deval', 'komal2@premiumleads.co', 'komal2', NULL, 'Singapore', NULL, 'DEVAL 2`', '', '', '6597796472', '+65', '$2y$10$dTwM160/UJZcfR/XE0eoNesw3ZQp7pPRQprb/wFqr15de8uuhTW6W', '0.00000000', 1, 'test', 1, 1, 0, 1, NULL, '526444', '2023-01-06 08:45:19', NULL, NULL, 0, 0, 0, 'BLAH BAH', NULL, NULL, '1000.00', '', '[\"3\",\"5\",\"9\",\"3\",\"5\"]', NULL, NULL, NULL, '2023-01-06 08:41:31', '2023-02-04 07:01:44', 0, NULL, NULL),
(79, 'Komal Deval', 'komaldeval85@gmail.com', 'komaldeval85', NULL, 'Canada', NULL, 'DEVAL2', '', '', '6597796472', '+65', '$2y$10$X0jJjkKLLm3xL.n5vKA2j.oNR3cKUFjr5PHKYuNL/aTXJ18lvVbs2', '0.00000000', 1, NULL, 1, 1, 0, 1, NULL, '832149', '2023-02-03 04:03:02', NULL, NULL, 0, 0, 0, 'CARS', NULL, NULL, '1500.00', '', '[\"3\",\"5\",\"5\"]', NULL, NULL, NULL, '2023-02-03 04:02:46', '2023-02-03 10:23:03', 0, NULL, NULL),
(80, 'Zakir Hossen', 'zakirhoss12345@gmail.com', 'zakirhoss12345', NULL, 'Bangladesh', NULL, 'Zakir', '', '', '8801754544861', '+880', '$2y$10$xN04EToazdvzYH.dDHHJm.ItByOyGoiKPvsgp7446nMzyzN8j1ZTW', '0.00000000', 1, NULL, 1, 1, 0, 1, NULL, '647736', '2023-02-03 08:25:36', NULL, NULL, 0, 0, 0, 'test', NULL, NULL, '1000.00', '', '[\"3\",\"5\",\"5\"]', NULL, NULL, NULL, '2023-02-03 08:25:11', '2023-02-03 10:23:05', 0, NULL, NULL),
(81, 'Test', 'testfdgdfg@arunsaba.com', 'testfdgdfg', NULL, 'Australia', NULL, 'Test', '', '', '30868568568', '+30', '$2y$10$qTuJ8Mj6Vy5L.ILRIKxK3.nCQOmB6uzJFcTudic2Q3qH5pUroqbxq', '0.00000000', 0, NULL, 1, 1, 0, 0, NULL, '809433', '2023-02-04 07:50:11', NULL, NULL, 0, 0, 0, 'test', 'dgdfg.com', 'dfgdfg.com', '1000.00', '', NULL, NULL, NULL, NULL, '2023-02-04 07:49:41', '2023-02-04 07:50:11', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_password_resets`
--

CREATE TABLE `advertiser_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertiser_password_resets`
--

INSERT INTO `advertiser_password_resets` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'arun.saba@premiumleads.co', '966190', 1, '2022-12-23 03:38:36', '2022-12-28 15:56:47'),
(2, 'arun.saba@premiumleads.co', '323474', 1, '2022-12-23 03:39:41', '2022-12-28 15:56:47'),
(3, 'arun.saba@premiumleads.co', '722360', 1, '2022-12-23 03:44:43', '2022-12-28 15:56:47'),
(4, 'arun.saba@premiumleads.co', '976998', 1, '2022-12-23 11:06:49', '2022-12-28 15:56:47'),
(5, 'arun.saba@premiumleads.co', '659849', 1, '2022-12-23 11:08:01', '2022-12-28 15:56:47'),
(6, 'arun.saba@premiumleads.co', '404437', 1, '2022-12-23 11:10:40', '2022-12-28 15:56:47'),
(7, 'tejinder.email@gmail.com', '743744', 1, '2023-02-05 08:04:26', '2023-02-05 08:05:33'),
(8, 'tejinder.email@gmail.com', '184522', 1, '2022-12-23 03:33:03', '2023-02-05 08:05:33'),
(9, 'arun.saba@premiumleads.co', '763825', 1, '2022-12-24 05:05:31', '2022-12-28 15:56:47'),
(10, 'arun.saba@premiumleads.co', '914293', 1, '2022-12-24 05:07:57', '2022-12-28 15:56:47'),
(11, 'arun.saba@premiumleads.co', '250615', 1, '2022-12-25 08:58:58', '2022-12-28 15:56:47'),
(12, 'tejinder.email@gmail.com', '955068', 1, '2022-12-25 11:07:23', '2023-02-05 08:05:33'),
(13, 'arun.saba@premiumleads.co', '949478', 1, '2022-12-25 11:52:46', '2022-12-28 15:56:47'),
(14, 'arun.saba@premiumleads.co', '995444', 1, '2022-12-25 11:56:26', '2022-12-28 15:56:47'),
(15, 'tejinder.email@gmail.com', '833108', 1, '2022-12-26 02:00:21', '2023-02-05 08:05:33'),
(16, 'tejinder.email@gmail.com', '181002', 1, '2022-12-27 10:31:31', '2023-02-05 08:05:33'),
(17, 'tejinder.email@gmail.com', '210714', 1, '2022-12-27 10:34:59', '2023-02-05 08:05:33'),
(18, 'tejinder.email@gmail.com', '412973', 1, '2022-12-27 10:35:05', '2023-02-05 08:05:33'),
(19, 'tejinder.email@gmail.com', '968341', 1, '2022-12-27 10:35:19', '2023-02-05 08:05:33'),
(20, 'tejinder.email@gmail.com', '308469', 1, '2022-12-27 02:24:21', '2023-02-05 08:05:33'),
(21, 'arun.saba@premiumleads.co', '749484', 1, '2022-12-27 04:07:59', '2022-12-28 15:56:47'),
(22, 'arun.saba@premiumleads.co', '278367', 1, '2022-12-27 04:10:38', '2022-12-28 15:56:47'),
(23, 'arun.saba@premiumleads.co', '890918', 1, '2022-12-27 04:16:06', '2022-12-28 15:56:47'),
(24, 'tejinder.email@gmail.com', '478729', 1, '2022-12-28 07:21:57', '2023-02-05 08:05:33'),
(25, 'advertiser2@gmail.com', '387718', 0, '2022-12-28 09:30:07', '2022-12-28 09:30:07'),
(26, 'arun.saba@premiumleads.co', '341598', 1, '2022-12-28 11:20:17', '2022-12-28 15:56:47'),
(27, 'arun.saba@premiumleads.co', '875575', 1, '2022-12-28 11:28:23', '2022-12-28 15:56:47'),
(28, 'tejinder.email@gmail.com', '695331', 1, '2022-12-28 02:44:36', '2023-02-05 08:05:33'),
(29, 'arun.saba@premiumleads.co', '611566', 1, '2022-12-28 03:56:11', '2022-12-28 15:56:47'),
(30, 'tejinder.email@gmail.com', '832240', 1, '2022-12-29 07:29:31', '2023-02-05 08:05:33'),
(31, 'komaldeval85@gmail.com', '277895', 1, '2023-02-03 03:22:36', '2023-02-03 04:12:52'),
(32, 'komaldeval85@gmail.com', '561450', 1, '2023-02-03 03:27:07', '2023-02-03 04:12:52'),
(33, 'komaldeval85@gmail.com', '134090', 1, '2023-02-03 03:28:44', '2023-02-03 04:12:52'),
(34, 'komaldeval85@gmail.com', '680708', 1, '2023-02-03 03:30:39', '2023-02-03 04:12:52'),
(35, 'komaldeval85@gmail.com', '872969', 1, '2023-02-03 03:31:55', '2023-02-03 04:12:52'),
(36, 'komaldeval85@gmail.com', '363914', 1, '2023-02-03 04:12:12', '2023-02-03 04:12:52'),
(37, 'tejinder.email@gmail.com', '895009', 1, '2023-02-05 06:48:52', '2023-02-05 08:05:33'),
(38, 'tejinder.email@gmail.com', '425012', 1, '2023-02-05 06:50:10', '2023-02-05 08:05:33'),
(39, 'tejinder.email@gmail.com', '710324', 1, '2023-02-05 06:50:32', '2023-02-05 08:05:33'),
(40, 'tejinder.email@gmail.com', '396363', 1, '2023-02-05 06:50:44', '2023-02-05 08:05:33'),
(41, 'tejinder.email@gmail.com', '617067', 1, '2023-02-05 06:53:22', '2023-02-05 08:05:33'),
(42, 'tejinder.email@gmail.com', '136853', 1, '2023-02-05 06:54:17', '2023-02-05 08:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_plans`
--

CREATE TABLE `advertiser_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `price_plan_id` int(11) NOT NULL,
  `plan_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE `ad_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `adName`, `type`, `width`, `height`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'test', 'image', '300', '600', '1', '300x600', '2022-11-01 12:59:49', '2022-11-01 12:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `imp_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leads_criteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `daily_budget` decimal(11,2) NOT NULL,
  `target_cost` decimal(11,2) DEFAULT NULL,
  `target_country` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_city` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_type` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_placements` text COLLATE utf8mb4_unicode_ci,
  `target_categories` text COLLATE utf8mb4_unicode_ci,
  `service_sell_buy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) NOT NULL DEFAULT '-1',
  `form_id_existing` int(11) DEFAULT NULL,
  `website_url` text COLLATE utf8mb4_unicode_ci,
  `social_media_page` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '0' COMMENT '0: off, 1: active',
  `delivery` tinyint(1) DEFAULT '0' COMMENT '0: Off, 1: Active, 2: Draft',
  `approve` tinyint(1) DEFAULT '0' COMMENT 'admin approval default 0 { 0: No, 1: Yes }',
  `rejection_remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `advertiser_id`, `name`, `leads_criteria`, `start_date`, `end_date`, `daily_budget`, `target_cost`, `target_country`, `target_city`, `target_type`, `target_placements`, `target_categories`, `service_sell_buy`, `keywords`, `form_id`, `form_id_existing`, `website_url`, `social_media_page`, `status`, `delivery`, `approve`, `rejection_remarks`, `created_at`, `updated_at`) VALUES
(17, 1, 'LGen_Campaign_17 Teji', NULL, '0000-00-00', NULL, '200.10', '12.50', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, 1, 0, 0, NULL, '2022-12-10 09:58:23', '2022-12-30 09:43:58'),
(18, 1, 'SPR Application 2022', NULL, '0000-00-00', NULL, '250.00', '50.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, 1, 0, 0, NULL, '2022-12-11 03:48:43', '2022-12-11 03:49:03'),
(19, 1, 'LGen_Campaign_19', NULL, '0000-00-00', NULL, '100.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, 0, 0, 0, NULL, '2022-12-11 17:06:11', '2023-01-10 15:42:33'),
(21, 1, 'SPR Application 2022-1', NULL, '0000-00-00', NULL, '500.00', '11.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, 0, 0, 0, NULL, '2022-12-16 09:57:48', '2023-01-10 15:44:36'),
(22, 1, 'zoho-one', NULL, '0000-00-00', NULL, '100.00', '20.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, 1, 0, 0, NULL, '2022-12-19 09:03:38', '2023-02-02 08:56:53'),
(23, 1, 'SPR Application 2022-7', NULL, '2023-02-02', NULL, '500.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, 0, 1, 1, NULL, '2022-12-21 13:48:25', '2023-02-02 08:58:29'),
(25, 1, 'Campaign1-0', NULL, '0000-00-00', NULL, '50.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, 0, 0, 0, NULL, '2022-12-30 06:42:17', '2023-01-11 09:39:59'),
(26, 1, 'campaign85', NULL, '0000-00-00', NULL, '80.00', '20.00', 'Russian Federation', NULL, NULL, NULL, NULL, NULL, NULL, 26, NULL, NULL, NULL, 0, 0, 0, NULL, '2022-12-30 09:55:13', '2023-01-10 15:33:23'),
(27, 1, 'world tour', NULL, '0000-00-00', NULL, '500.00', '200.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-03 05:05:39', '2023-01-03 05:05:39'),
(28, 1, 'campaign 29', NULL, '0000-00-00', NULL, '500.00', '200.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-04 04:43:54', '2023-01-11 09:38:11'),
(30, 73, 'New Campaign v1', NULL, '2023-01-27', NULL, '100.00', '11.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 29, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-05 15:39:55', '2023-01-27 12:01:51'),
(31, 76, 'WORLD TOUR', NULL, '2023-01-27', NULL, '500.00', '1000.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-06 09:17:25', '2023-01-27 12:02:30'),
(32, 1, 'duplicatetest1', NULL, '2023-01-27', NULL, '500.00', '200.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-06 14:24:35', '2023-01-27 12:01:40'),
(33, 1, 'Campaign Name1', NULL, '0000-00-00', NULL, '100.00', '11.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-09 09:17:23', '2023-01-09 09:17:23'),
(34, 1, 'test567', NULL, '2023-01-27', NULL, '100.00', '20.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-09 12:15:02', '2023-01-27 12:01:20'),
(35, 1, 'test777788-1', NULL, '2023-01-27', NULL, '150.00', '20.00', 'Greece', NULL, NULL, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-09 12:20:19', '2023-01-27 12:01:14'),
(36, 1, 'Campaign2-3', NULL, '0000-00-00', NULL, '100.00', '10.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 68, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-10 11:00:02', '2023-01-23 10:15:45'),
(37, 1, 'Campaign2-duplicate', NULL, '0000-00-00', NULL, '100.00', '10.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-10 11:01:06', '2023-01-10 11:01:06'),
(38, 1, 'Campaign2-copy', NULL, '0000-00-00', NULL, '1000.00', '1000.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-10 11:06:54', '2023-01-10 11:06:54'),
(39, 1, 'test777788-1 (Copy)', NULL, '0000-00-00', NULL, '150.00', '20.00', 'Greece', NULL, NULL, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-10 13:05:29', '2023-01-11 09:30:08'),
(40, 1, 'campaign85 (Copy)', NULL, '0000-00-00', NULL, '60.00', '20.00', 'Russian Federation', NULL, NULL, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-10 14:13:00', '2023-01-10 14:17:11'),
(41, 1, 'SPR Application 2022-1', NULL, '0000-00-00', NULL, '500.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-11 05:16:43', '2023-01-11 05:16:43'),
(42, 1, 'zoho-two', NULL, '2023-01-25', NULL, '95.00', '85.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-11 09:02:21', '2023-01-25 13:14:40'),
(43, 1, 'CA1', NULL, '2023-02-02', NULL, '300.00', '10.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-11 10:09:46', '2023-02-02 08:58:24'),
(44, 1, 'CA113', NULL, '0000-00-00', NULL, '333.00', '13.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-11 11:20:16', '2023-02-03 08:06:22'),
(45, 1, 'LGen_Campaign_19 (Copy)-2', NULL, '2023-01-27', NULL, '100.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 51, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-11 11:24:19', '2023-01-27 12:01:04'),
(47, 1, 'test7825', NULL, '2023-01-28', NULL, '200.00', '120.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-12 09:34:31', '2023-01-28 06:27:00'),
(48, 1, 'A1_LeadGen1', NULL, '0000-00-00', NULL, '300.00', '30.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 54, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-16 09:00:09', '2023-01-16 09:00:09'),
(49, 1, 'dfgdfg', NULL, '2023-01-27', NULL, '4564645.00', '999999999.99', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 55, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-16 10:09:10', '2023-01-27 12:02:46'),
(50, 1, 'tst78', NULL, '0000-00-00', NULL, '200.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 56, NULL, NULL, NULL, 0, 2, 0, NULL, '2023-01-16 10:09:32', '2023-01-27 04:38:53'),
(51, 1, 'Leads20 (Copy)', NULL, '0000-00-00', NULL, '50.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 59, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-16 14:12:41', '2023-01-16 14:20:02'),
(53, 1, 'test85655', NULL, '2023-02-02', NULL, '200.00', '100.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 61, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-17 05:03:47', '2023-02-03 14:48:59'),
(54, 1, 'Lg11', NULL, '2023-02-02', NULL, '500.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 63, NULL, NULL, NULL, 1, 1, 1, NULL, '2023-01-22 14:52:21', '2023-02-03 14:48:55'),
(55, 1, 'kjhjkhkjhkjhkjk', NULL, '2023-01-30', NULL, '500.00', '1000.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 66, NULL, NULL, NULL, 1, 1, 1, 'Rejecting', '2023-01-22 14:54:37', '2023-02-03 14:48:53'),
(56, 1, 'jghhh', NULL, '2023-01-25', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 75, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-24 06:03:52', '2023-01-25 04:30:04'),
(58, 1, 'fsdfsdf', NULL, '2023-02-02', NULL, '500.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 78, NULL, NULL, NULL, 1, 1, 1, NULL, '2023-01-25 04:53:37', '2023-02-02 10:16:39'),
(59, 1, 'c501', NULL, '2023-01-27', NULL, '500.00', '50.00', 'Puerto Rico', NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, 1, 1, 1, NULL, '2023-01-25 18:07:48', '2023-02-02 05:18:08'),
(60, 1, 'c500', NULL, '2023-02-02', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 80, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-25 18:16:54', '2023-02-03 14:50:45'),
(61, 1, 'draft', NULL, '2023-01-27', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 82, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-25 18:27:39', '2023-02-03 14:50:44'),
(62, 1, 'draft 2', NULL, '2023-02-02', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 83, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-25 18:33:09', '2023-02-02 06:12:21'),
(63, 1, 'New form draft', NULL, '2023-02-02', NULL, '100.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 84, NULL, NULL, NULL, 0, 0, 0, NULL, '2023-01-25 19:03:46', '2023-02-02 06:12:14'),
(65, 1, 'Campaign2', NULL, '2023-01-27', NULL, '500.00', '1000.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 89, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-01-27 04:16:19', '2023-01-31 03:45:19'),
(66, 1, 'Campaign5', NULL, '0000-00-00', NULL, '500.00', '56.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 90, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-01-27 23:59:10', '2023-01-31 03:45:21'),
(67, 1, 'New Camp 31 Jan', NULL, '0000-00-00', NULL, '100.00', '11.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, -1, 20, NULL, NULL, 1, 0, 0, NULL, '2023-01-31 15:16:56', '2023-01-31 15:22:23'),
(68, 1, 'test', NULL, '0000-00-00', NULL, '100.00', '100.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 92, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-01 11:22:48', '2023-02-01 11:23:28'),
(69, 1, 'ap1', NULL, '0000-00-00', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 93, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-01 11:46:02', '2023-02-01 11:56:29'),
(70, 1, 'New Camp 01 fab v3', NULL, '0000-00-00', NULL, '100.00', '11.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 96, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-01 11:56:50', '2023-02-01 18:15:20'),
(71, 1, 'New Camp 01 fab v2', NULL, '0000-00-00', NULL, '100.00', '12.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 95, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-01 18:04:18', '2023-02-01 18:06:17'),
(72, 1, 'C55', NULL, '0000-00-00', NULL, '555.00', '55.00', 'New Zealand', NULL, NULL, NULL, NULL, NULL, NULL, 98, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-02-02 06:48:09', '2023-02-02 06:59:07'),
(73, 1, 'c56', NULL, '0000-00-00', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 99, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-02 07:01:08', '2023-02-02 07:01:08'),
(74, 1, 'c5001', NULL, '0000-00-00', NULL, '0.00', '100000.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-03 05:40:58', '2023-02-03 05:43:54'),
(75, 1, 'cmpaign 5', NULL, '0000-00-00', NULL, '0.00', NULL, 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 102, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-03 05:47:49', '2023-02-03 05:53:06'),
(76, 1, 'c666', NULL, '0000-00-00', NULL, '500.00', '90.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 103, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-03 06:44:13', '2023-02-03 06:44:30'),
(77, 1, 'EVENTS', NULL, '0000-00-00', NULL, '500.00', '500.00', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, 105, NULL, NULL, NULL, 1, 0, 0, NULL, '2023-02-03 07:40:51', '2023-02-03 07:46:24'),
(78, 1, '123', NULL, '0000-00-00', NULL, '0.00', NULL, 'American Samoa', NULL, NULL, NULL, NULL, NULL, NULL, 106, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-05 01:19:48', '2023-02-05 01:20:37'),
(79, 1, 'New 05 02 2023', NULL, '0000-00-00', NULL, '100.00', '11.00', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, 107, NULL, NULL, NULL, 1, 2, 0, NULL, '2023-02-05 06:34:38', '2023-02-05 06:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_forms`
--

CREATE TABLE `campaign_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `form_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_title` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_desc` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `form_desc` text COLLATE utf8mb4_unicode_ci,
  `punchline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_1` text COLLATE utf8mb4_unicode_ci,
  `youtube_2` text COLLATE utf8mb4_unicode_ci,
  `youtube_3` text COLLATE utf8mb4_unicode_ci,
  `video_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` text COLLATE utf8mb4_unicode_ci,
  `image_2` text COLLATE utf8mb4_unicode_ci,
  `image_3` text COLLATE utf8mb4_unicode_ci,
  `field_1` text COLLATE utf8mb4_unicode_ci,
  `field_2` text COLLATE utf8mb4_unicode_ci,
  `field_3` text COLLATE utf8mb4_unicode_ci,
  `field_4` text COLLATE utf8mb4_unicode_ci,
  `field_5` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1' COMMENT '0: off, 1: active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_forms`
--

INSERT INTO `campaign_forms` (`id`, `advertiser_id`, `form_name`, `company_name`, `company_logo`, `form_title`, `offer_desc`, `title`, `form_desc`, `punchline`, `youtube_1`, `youtube_2`, `youtube_3`, `video_1`, `video_2`, `video_3`, `image_1`, `image_2`, `image_3`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `status`, `created_at`, `updated_at`) VALUES
(21, 1, 'form 5', 'Australian Immigration Company', '639c411c0ad041671184668.png', 'Apply for Home Servicessd', 'Unlimited warranty Till Approsdfsdf dsfsd fdsfdsfsdfsdfsdfsdfsdfdsdfsdfsdfsdfsdfsdfsd', '{\"1\":\"Apply for Home Servicessd\",\"2\":\"Home Services Application\",\"3\":null}', '{\"1\":\"Unlimited warranty Till Approsdfsdf dsfsd fdsfdsfsdfsdfsdfsdfsdfdsdfsdfsdfsdfsdfsdfsd\",\"2\":null,\"3\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Age\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2022-12-16 09:57:48', '2022-12-16 09:57:48'),
(17, 1, 'tej 17 - form cc3', 'Teji - NG Glow', '6394583f11b6c1670666303.jpg', 'Get offer Here', '1. Autem adipisci ipsum Autem adipisci ipsum', '{\"1\":\"Get offer Here\",\"2\":\"Get offer Here 2\",\"3\":\"Get offer Here 3\"}', '{\"1\":\"1. Autem adipisci ipsum Autem adipisci ipsum\",\"2\":\"2. Autem adipisci ipsum Autem adipisci ipsum\",\"3\":\"3. Autem adipisci ipsum Autem adipisci ipsum\"}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Services\",\"option_1\":\"Face\",\"option_2\":\"Hair\",\"option_3\":\"Nail\"}', NULL, 1, '2022-12-10 09:58:23', '2022-12-10 09:58:23'),
(18, 1, 'Form A', 'A1 Immigrations.sg', '6395531b1e2091670730523.png', 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":\"SPR Application 2022\",\"3\":\"SPR Application 2022\"}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":\"Unlimited warranty Till Approval\",\"3\":\"Unlimited warranty Till Approval\"}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP \\/ LTVP \\/ LTVP+ (Spouse)\",\"option_4\":\"Student Pass\",\"option_5\":\"PEP \\/ Entre Pass\",\"option_6\":\"Work Pass \\/ Work Permit\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Optional)\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Singapore Mobile Number\"}', 1, '2022-12-11 03:48:43', '2022-12-11 03:48:43'),
(19, 1, 'Form 1', 'default on test', '63960e034b6761670778371.jpg', 'Testing', 'Form Description some text can be added here', '{\"1\":\"Testing\",\"2\":null,\"3\":null}', '{\"1\":\"Form Description some text can be added here\",\"2\":null,\"3\":null}', NULL, 'https://www.youtube.com/watch?v=_kUWuN-gWrE&feature=emb_title', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2022-12-11 17:06:11', '2022-12-11 17:06:11'),
(20, 1, 'Form B', 'SGPR', '6399a653828c31671013971.jpg', 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null,\"3\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"5\",\"option_5\":\"6+\"}', NULL, 1, '2022-12-14 10:32:51', '2022-12-14 10:32:51'),
(22, 1, 'zono-one form', 'zoho.com', '63a028ea37e191671440618.jpg', 'Start a Free 30-day Trial', 'Over 40k companies run their business with Zoho.', '{\"1\":\"Start a Free 30-day Trial\",\"2\":null,\"3\":null}', '{\"1\":\"Over 40k companies run their business with Zoho.\",\"2\":null,\"3\":null}', 'No Credit Card Required.', 'https://www.youtube.com/watch?v=hE-xzRtmfYU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Company Name\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"No of employees\",\"option_1\":\"1-10\",\"option_2\":\"11-20\",\"option_3\":\"21-50\",\"option_4\":\"50+\"}', 1, '2022-12-19 09:03:38', '2022-12-19 09:03:38'),
(23, 1, 'Apply Singapore PR-7', 'Premium Leads Pte. Ltd.', '63a30ea9d9d961671630505.png', 'SPR Application 2022', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\",\"2\":null,\"3\":null}', 'CalculateYourChancesNOW', 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2022-12-21 13:48:25', '2022-12-21 13:48:25'),
(24, 1, 'Apply Singapore PR', 'Premium Leads Pte. Ltd.', '63a9a685423231672062597.png', 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null,\"3\":null}', 'Calculate your chances now', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Relationship to Singaporean\\/PR (Optional)\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2022-12-26 13:49:57', '2022-12-26 13:49:57'),
(25, 1, 'Form1(campaign1)', 'Premium Leads Pte. Ltd.', '63ae88499feed1672382537.png', 'SPR Application 2022', 'Apply for Singapore PR fast', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"Apply for Singapore PR fast\",\"2\":null,\"3\":null}', 'Calculate your chances now', NULL, NULL, NULL, NULL, NULL, NULL, '63ae8849ac27d1672382537.png', '63ae8849ac65c1672382537.png', '63ae8849b50291672382537.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"0\",\"option_2\":\"1\",\"option_3\":\"2\",\"option_4\":\"3\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2022-12-30 06:42:17', '2022-12-30 06:42:17'),
(26, 1, 'campaign85', 'sdfsdfsd', '63aeb58108d371672394113.png', 'tesstt', 'sdfsdf', '{\"1\":\"tesstt\",\"2\":null,\"3\":null}', '{\"1\":\"sdfsdf\",\"2\":null,\"3\":null}', 'sdfsdf', NULL, 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, NULL, '63aeb5814a2b81672394113.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2022-12-30 09:55:13', '2022-12-30 09:55:13'),
(27, 1, 'Tour_form', 'DEVAL', '63b3b7a3bba611672722339.jpg', 'World Tour', 'World Tour with your family or friends with discounted rate', '{\"1\":\"World Tour\",\"2\":null,\"3\":null}', '{\"1\":\"World Tour with your family or friends with discounted rate\",\"2\":null,\"3\":null}', 'Offer Validity Till 31 Jan', 'https://www.youtube.com/embed/5MxspoxpC3w', 'https://www.youtube.com/embed/IQzfprW0Yl0', NULL, NULL, NULL, NULL, '63b3b7a3c2dd01672722339.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-03 05:05:39', '2023-01-03 05:05:39'),
(28, 1, 'Star Wars', 'My campaign', '63b5040adcc231672807434.jpg', 'STAR WARS', '3 NIGHTS 4 DAYS AT DISNEY LAND', '{\"1\":\"STAR WARS\",\"2\":null,\"3\":null}', '{\"1\":\"3 NIGHTS 4 DAYS AT DISNEY LAND\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!', 'https://www.youtube.com/embed/xobDp-0mPRs', NULL, NULL, NULL, NULL, NULL, '63b5040ae3c921672807434.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-04 04:43:54', '2023-01-04 04:43:54'),
(29, 73, 'zoho-one Form', 'hero testing', '63b6dad2264871672927954.jpg', 'Ng Glow Offer', 'Over 40k companies run their business with Zoho.', '{\"1\":\"Ng Glow Offer 1\",\"2\":\"Ng Glow Offer 2\",\"3\":\"Ng Glow Offer 3\"}', '{\"1\":\"1 Over 40k companies run their business with Zoho.\",\"2\":\"2 Over 40k companies run their business with Zoho.\",\"3\":\"3 Over 40k companies run their business with Zoho.\"}', 'No Credit Card Required.', 'https://www.youtube.com/embed/X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-05 14:12:34', '2023-01-05 14:12:34'),
(30, 76, 'STAR WARS', 'deval enterprise', '63b7e724f04b71672996644.jpg', 'WORLD TOUR', 'World Tour with your family or friends with discounted rate.', '{\"1\":\"WORLD TOUR\",\"2\":null,\"3\":null}', '{\"1\":\"World Tour with your family or friends with discounted rate.\",\"2\":null,\"3\":null}', 'Offer Validity Till 31 Jan', 'https://www.youtube.com/embed/_Rks2oCRS88', 'https://www.youtube.com/embed/f_jUU3Fd3HI', NULL, NULL, NULL, NULL, '63b7e72509d3e1672996645.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"How many person to travel?\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Required Budget?\"}', 1, '2023-01-06 09:17:25', '2023-01-06 09:17:25'),
(31, 1, 'Form Name1', NULL, '63bbdba2d20a61673255842.jpg', 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer2\",\"3\":\"Product\\/Service\\/Offer3\"}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":\"Product\\/Service\\/Offer Description2\",\"3\":\"Product\\/Service\\/Offer Description3\"}', 'Unique Selling Proposit', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', 'https://www.youtube.com/embed/2mi11Go8PHo', NULL, NULL, NULL, '63bbdba2d5f5a1673255842.JPG', '63bbdba2d8ed91673255842.jpg', '63bbdba2d95331673255842.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Optional)\",\"option_1\":\"Spouse\",\"option_2\":\"No relationship\",\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2023-01-09 09:17:23', '2023-01-09 09:17:23'),
(32, 1, 'Test7777', 'xyz123', '63bc0682673ec1673266818.png', 'Demo testing', 'Demo Testing', '{\"1\":\"Demo testing\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, '63bc0682ca5351673266818.png', '63bc0682d7e3d1673266818.jpg', '63bc0682db29b1673266818.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing\",\"option_1\":\"2\",\"option_2\":\"4\",\"option_3\":\"6\",\"option_4\":\"8\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing\"}', 1, '2023-01-09 12:20:19', '2023-01-09 12:20:19'),
(33, 1, 'Test7777', 'xyz123', NULL, 'Demo testing', 'Demo Testing', '{\"1\":\"Demo testing\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing\",\"option_1\":\"2\",\"option_2\":\"4\",\"option_3\":\"6\",\"option_4\":\"8\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing\"}', 1, '2023-01-10 07:50:55', '2023-01-10 07:50:55'),
(34, 1, 'Campaign2', NULL, '63bd4532b14a21673348402.png', 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer2\",\"3\":\"Product\\/Service\\/Offer3\"}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":\"Product\\/Service\\/Offer Description2\",\"3\":\"Product\\/Service\\/Offer Description3\"}', 'Unique Selling Proposit', NULL, NULL, NULL, NULL, NULL, NULL, '63bd4532b97b21673348402.png', '63bd4532beaa21673348402.jpg', '63bd4532bff9a1673348402.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test1\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Multiple1\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":null,\"option_4\":null}', 1, '2023-01-10 11:00:02', '2023-01-10 11:00:02'),
(35, 1, 'Test7777-1', 'xyz123-1', NULL, 'Demo testing-1', 'Demo Testing-1', '{\"1\":\"Demo testing-1\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing-1\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45-1', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, NULL, NULL, NULL, '63bd622f5c1c41673355823.png', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-1\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-1\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-1\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing-1\",\"option_1\":\"2-1\",\"option_2\":\"4-1\",\"option_3\":\"6-1\",\"option_4\":\"8-1\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing-1\"}', 1, '2023-01-10 13:03:43', '2023-01-10 13:03:43'),
(36, 1, 'Test7777-1 (Copy)', 'xyz123-1-2', NULL, 'Demo testing-1-2', 'Demo Testing-1-2', '{\"1\":\"Demo testing-1-2\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing-1-2\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45-1-', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, '63bd629979f0b1673355929.png', NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-1-2\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-1-2\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-1-2\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing-1-2\",\"option_1\":\"2-1-2\",\"option_2\":\"4-1-2\",\"option_3\":\"6-1-2\",\"option_4\":\"8-1-2\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing-1-2\"}', 1, '2023-01-10 13:05:29', '2023-01-10 13:05:29'),
(37, 1, 'Test7777-1', 'xyz123-1', NULL, 'Demo testing-1', 'Demo Testing-1', '{\"1\":\"Demo testing-1\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing-1\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45-1', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-1\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-1\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-1\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing-1\",\"option_1\":\"2-1\",\"option_2\":\"4-1\",\"option_3\":\"6-1\",\"option_4\":\"8-1\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing-1\"}', 1, '2023-01-10 14:09:53', '2023-01-10 14:09:53'),
(38, 1, 'campaign85 (Copy)', 'sdfsdfsd', NULL, 'tesstt', 'sdfsdf', '{\"1\":\"tesstt\",\"2\":null,\"3\":null}', '{\"1\":\"sdfsdf\",\"2\":null,\"3\":null}', 'sdfsdf', NULL, 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-10 14:13:00', '2023-01-10 14:13:00'),
(39, 1, 'campaign85 (Copy)', 'sdfsdfsd', NULL, 'tesstt', 'sdfsdf', '{\"1\":\"tesstt\",\"2\":null,\"3\":null}', '{\"1\":\"sdfsdf\",\"2\":null,\"3\":null}', 'sdfsdf', NULL, 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-10 14:17:11', '2023-01-10 14:17:11'),
(40, 1, 'Form1(campaign1)-5', 'Premium Leads Pte. Ltd.-5', NULL, 'SPR Application 2022-5', 'Apply for Singapore PR fast-5', '{\"1\":\"SPR Application 2022-5\",\"2\":\"-555\",\"3\":\"-555\"}', '{\"1\":\"Apply for Singapore PR fast-5\",\"2\":\"-555\",\"3\":\"-555\"}', 'Calculate your chanc-5', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-5\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-5\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-5\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore-5\",\"option_1\":\"0-5\",\"option_2\":\"1-5\",\"option_3\":\"2-5\",\"option_4\":\"3-5\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number-5\"}', 1, '2023-01-10 18:00:25', '2023-01-10 18:00:25'),
(41, 1, 'Form1(campaign1)-0', 'Premium Leads Pte. Ltd.-5', NULL, 'SPR Application 2022-0', 'Apply for Singapore PR fast-5', '{\"1\":\"SPR Application 2022-0\",\"2\":\"-555\",\"3\":\"-555\"}', '{\"1\":\"Apply for Singapore PR fast-5\",\"2\":\"-555\",\"3\":\"-555\"}', 'Calculate your chanc-5', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, '63bda86c6c8541673373804.png', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-5\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-5\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-5\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore-5\",\"option_1\":\"0-5\",\"option_2\":\"1-5\",\"option_3\":\"2-5\",\"option_4\":\"3-5\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number-5\"}', 1, '2023-01-10 18:03:24', '2023-01-10 18:03:24'),
(42, 1, 'Test7777-1 (Copy)', 'xyz123-1-2', NULL, 'Demo testing-1-2', 'Demo Testing-1-2', '{\"1\":\"Demo testing-1-2\",\"2\":null,\"3\":null}', '{\"1\":\"Demo Testing-1-2\",\"2\":null,\"3\":null}', 'OFFER TILL 31 JAN!45-1-', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name-1-2\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id-1-2\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number-1-2\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Testing-1-2\",\"option_1\":\"2-1-2\",\"option_2\":\"4-1-2\",\"option_3\":\"6-1-2\",\"option_4\":\"8-1-2\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Testing-1-2\"}', 1, '2023-01-11 05:04:27', '2023-01-11 05:04:27'),
(43, 1, 'Apply Singapore PR', 'sdf sdf sdf', NULL, 'Singpaore pr 2022', '32343 234234', '{\"1\":\"Singpaore pr 2022\",\"2\":null,\"3\":null}', '{\"1\":\"32343 234234\",\"2\":null,\"3\":null}', '23423423 fdsdfs dfsdf', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name2\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name3\"}', NULL, NULL, 1, '2023-01-11 05:16:43', '2023-01-11 05:16:43'),
(44, 1, 'zoho name', 'Zoho brand', '63be7b1d339c91673427741.png', 'Zoho 30 day', 'Zoho product', '{\"1\":\"Zoho 30 day\",\"2\":null,\"3\":null}', '{\"1\":\"Zoho product\",\"2\":null,\"3\":null}', 'Zoho unique', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/16shZ0no1WE', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, NULL, NULL, '63be7b1d661e81673427741.png', '63be7b1d81aca1673427741.jpg', '63be7b1d838171673427741.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Zoho fileds name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Zoho@gmail.com\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"9876543210\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Zoho option\",\"option_1\":\"Zoho option-1\",\"option_2\":\"Zoho option-2\",\"option_3\":\"Zoho option-3\",\"option_4\":\"Zoho option-4\"}', NULL, 1, '2023-01-11 09:02:21', '2023-01-11 09:02:21'),
(45, 1, 'Apply Singapore PR-7', 'Premium Leads Pte. Ltd.', NULL, 'SPR Application 2022', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\",\"2\":null,\"3\":null}', 'CalculateYourChancesNOW', 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2023-01-11 09:15:57', '2023-01-11 09:15:57'),
(46, 1, 'Apply Singapore PR-7', 'Premium Leads Pte. Ltd.', NULL, 'SPR Application 2022', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '{\"1\":\"SPR Application 2022\",\"2\":null,\"3\":null}', '{\"1\":\"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\",\"2\":null,\"3\":null}', 'CalculateYourChancesNOW', 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Mobile Number\"}', 1, '2023-01-11 09:16:09', '2023-01-11 09:16:09'),
(47, 1, 'CA1', NULL, '63be8ae9c72ed1673431785.png', 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer1\",\"3\":\"Product\\/Service\\/Offer1\"}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":\"Product\\/Service\\/Offer Description1\",\"3\":\"Product\\/Service\\/Offer Description1\"}', 'Unique Selling Propos1', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, '63be8ae9ceac71673431785.png', '63be8aea0bb691673431786.png', '63be8aea0f31c1673431786.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name1\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id1\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number1\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore1\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Singapore Mobile Number1\"}', 1, '2023-01-11 10:09:46', '2023-01-11 10:09:46'),
(48, 1, 'ca11', 'Ca11', NULL, 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer1\",\"3\":null}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":null,\"3\":\"Product\\/Service\\/Offer Description1\"}', 'Unique Selling Proposit', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, '63be9b70c0b171673436016.png', NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Inform my results to - Singapore Mobile Number\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\",\"option_5\":\"5\",\"option_6\":\"6\"}', 1, '2023-01-11 11:20:16', '2023-01-11 11:20:16'),
(49, 1, 'ca11 (Copy)', 'Ca112', NULL, 'Product/Service/Offer12', 'Product/Service/Offer Description12', '{\"1\":\"Product\\/Service\\/Offer12\",\"2\":\"Product\\/Service\\/Offer12\",\"3\":\"2222\"}', '{\"1\":\"Product\\/Service\\/Offer Description12\",\"2\":\"2222\",\"3\":\"Product\\/Service\\/Offer Description12\"}', 'Unique Selling Propos2', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', NULL, NULL, NULL, '63be9c63a53821673436259.png', NULL, '63be9c63ab0a51673436259.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name2\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id2\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number2\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore2\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Inform my results to - Singapore Mobile Number2\",\"option_1\":\"12\",\"option_2\":\"22\",\"option_3\":\"32\",\"option_4\":\"42\"}', 1, '2023-01-11 11:24:19', '2023-01-11 11:24:19'),
(50, 1, 'ca113', 'Ca113', NULL, 'Product/Service/Offer13', 'Product/Service/Offer Description3', '{\"1\":\"Product\\/Service\\/Offer13\",\"2\":\"Product\\/Service\\/Offer13\",\"3\":null}', '{\"1\":\"Product\\/Service\\/Offer Description3\",\"2\":null,\"3\":\"Product\\/Service\\/Offer Description3\"}', 'Unique Selling Proposi3', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, '63be9d389eb6d1673436472.png', NULL, '63be9d38d10201673436472.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name3\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id3\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test2\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Inform my results to - Mobile Number\",\"option_1\":\"15\",\"option_2\":\"25\",\"option_3\":\"35\",\"option_4\":\"45\"}', 1, '2023-01-11 11:27:52', '2023-01-11 11:27:52'),
(51, 1, 'Form 1 (Copy)', 'default on test', NULL, 'Testing', 'Form Description some text can be added here', '{\"1\":\"Testing\",\"2\":null,\"3\":null}', '{\"1\":\"Form Description some text can be added here\",\"2\":null,\"3\":null}', NULL, 'https://www.youtube.com/watch?v=_kUWuN-gWrE&feature=emb_title', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-11 11:35:09', '2023-01-11 11:35:09'),
(52, 3, 'Facebook Form', 'Nice', '63bf8dd1a0f891673498065.png', 'Start a Free 30-day Trial', '50k+ companies run on Facebook', '{\"1\":\"Start a Free 30-day Trial\",\"2\":null,\"3\":null}', '{\"1\":\"50k+ companies run on Facebook\",\"2\":null,\"3\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '63bf8dd1a58041673498065.png', '63bf8dd1a72871673498065.jpg', NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-12 04:34:25', '2023-01-12 04:34:25'),
(53, 1, 'test7825', 'Test', NULL, 'Test4', 'Test4', '{\"1\":\"Test4\",\"2\":\"Test45\"}', '{\"1\":\"Test4\",\"3\":\"Test47\"}', 'Sdfsfdsdfdf', 'https://www.youtube.com/embed/WHuDhrPEGR0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '63bfd426de5421673516070.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-12 09:34:31', '2023-01-12 09:34:31'),
(54, 1, 'A1_LeadGen1', 'A1 Immigration', NULL, 'Singapore PR Application', '#Unlimited Warranty Till Approval #Unlmited tries till you get PR', '{\"1\":\"Singapore PR Application\",\"2\":null}', '{\"1\":\"#Unlimited Warranty Till Approval #Unlmited tries till you get PR\",\"2\":null}', 'CALCULATE YOUR CHANCES', 'https://www.youtube.com/embed/207uzv_PlF4', 'https://www.youtube.com/embed/bDvppzo_4QA', 'https://www.youtube.com/embed/SAtvvXc-6-Y', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP\\/ LTVP\\/ LTVP+ (Spouse)\",\"option_4\":\"Student Pass\",\"option_5\":\"PEP\\/Entre Pass\",\"option_6\":\"Work Pass\\/ Work Permit\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singapore PR (Optional)\",\"option_1\":\"No relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform results to Singapore Mobile Number\"}', 1, '2023-01-16 09:00:09', '2023-01-16 09:00:09'),
(55, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-16 10:09:10', '2023-01-16 10:09:10'),
(56, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-16 10:09:32', '2023-01-16 10:09:32'),
(57, 1, 'Form B (Copy)', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"5\"}', NULL, 1, '2023-01-16 14:12:41', '2023-01-16 14:12:41'),
(58, 1, 'Form B (Copy)', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"5\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Test78\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\"}', 1, '2023-01-16 14:13:17', '2023-01-16 14:13:17'),
(59, 1, 'Form B (Copy)', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"5\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Test78\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\"}', NULL, 1, '2023-01-16 14:20:02', '2023-01-16 14:20:02'),
(60, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-16 14:42:41', '2023-01-16 14:42:41'),
(61, 1, NULL, 'Testing', NULL, 'Testing', 'Noiw', '{\"1\":\"Testing\",\"2\":null}', '{\"1\":\"Noiw\",\"2\":null}', 'Testing', 'https://www.youtube.com/embed/WHuDhrPEGR0', 'https://www.youtube.com/embed/x4Qa4JcM0Bw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-17 05:03:47', '2023-01-17 05:03:47'),
(62, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-22 14:51:59', '2023-01-22 14:51:59'),
(63, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-22 14:52:21', '2023-01-22 14:52:21'),
(64, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-22 14:53:59', '2023-01-22 14:53:59'),
(65, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-22 14:54:09', '2023-01-22 14:54:09'),
(66, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-22 14:54:37', '2023-01-22 14:54:37'),
(67, 1, 'Campaign2', NULL, NULL, 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer2\",\"3\":\"Product\\/Service\\/Offer3\"}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":\"Product\\/Service\\/Offer Description2\",\"3\":\"Product\\/Service\\/Offer Description3\"}', 'Unique Selling Proposit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Test1\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Multiple1\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":\"C\",\"option_4\":\"D\"}', 1, '2023-01-23 10:14:43', '2023-01-23 10:14:43'),
(68, 1, 'Campaign2', NULL, NULL, 'Product/Service/Offer1', 'Product/Service/Offer Description1', '{\"1\":\"Product\\/Service\\/Offer1\",\"2\":\"Product\\/Service\\/Offer2\",\"3\":\"Product\\/Service\\/Offer3\"}', '{\"1\":\"Product\\/Service\\/Offer Description1\",\"2\":\"Product\\/Service\\/Offer Description2\",\"3\":\"Product\\/Service\\/Offer Description3\"}', 'Unique Selling Proposit', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"TestD\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Multiple1\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":\"C\",\"option_4\":\"D\"}', 1, '2023-01-23 10:15:45', '2023-01-23 10:15:45');
INSERT INTO `campaign_forms` (`id`, `advertiser_id`, `form_name`, `company_name`, `company_logo`, `form_title`, `offer_desc`, `title`, `form_desc`, `punchline`, `youtube_1`, `youtube_2`, `youtube_3`, `video_1`, `video_2`, `video_3`, `image_1`, `image_2`, `image_3`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `status`, `created_at`, `updated_at`) VALUES
(69, 1, 'Form B', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":\"C\",\"option_4\":\"D\"}', NULL, 1, '2023-01-23 10:16:03', '2023-01-23 10:16:03'),
(70, 1, 'Form B', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id1\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":\"C\",\"option_4\":\"D\"}', NULL, 1, '2023-01-23 10:16:13', '2023-01-23 10:16:13'),
(71, 1, 'Form B', 'SGPR', NULL, 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', NULL, 'https://www.youtube.com/watch?v=X1QJGzvyoZI', 'https://www.youtube.com/embed/eIho2S0ZahI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id1\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"A\",\"option_2\":\"B\",\"option_3\":\"C\",\"option_4\":\"D\"}', NULL, 1, '2023-01-23 10:16:23', '2023-01-23 10:16:23'),
(72, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-23 14:13:12', '2023-01-23 14:13:12'),
(73, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-23 14:14:34', '2023-01-23 14:14:34'),
(74, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-24 06:03:52', '2023-01-24 06:03:52'),
(75, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', NULL, NULL, 2, '2023-01-24 06:05:39', '2023-01-24 06:05:39'),
(76, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-24 06:45:48', '2023-01-24 06:45:48'),
(77, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-24 06:49:35', '2023-01-24 06:49:35'),
(78, 1, NULL, NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 2, '2023-01-25 04:53:37', '2023-01-25 04:53:37'),
(80, 1, 'c500', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-25 18:16:54', '2023-01-25 18:16:54'),
(82, 1, 'draft', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-25 18:27:39', '2023-01-25 18:27:39'),
(83, 1, 'draft 2', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-25 18:33:09', '2023-01-25 18:33:09'),
(84, 1, 'New form draft', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-25 19:03:46', '2023-01-25 19:03:46'),
(85, 1, 'saving', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-27 02:08:32', '2023-01-27 02:08:32'),
(86, 1, 'Form1', 'A1 Immigration Consultancy', NULL, 'Singapore PR Application', 'Unlimited Warranty Till Approval', '{\"1\":\"Singapore PR Application\",\"2\":\"Singapore PR 2023\",\"3\":\"Sing PR Application 2023\"}', '{\"1\":\"Unlimited Warranty Till Approval\",\"2\":\"We Offer Unlimited Warranty Till Approval\",\"3\":\"Unlimited Warranty Till Approval | Over 1,289 Approved PR\"}', 'Get your PR Now»', 'https://www.youtube.com/embed/X1QJGzvyoZI', 'https://www.youtube.com/embed/207uzv_PlF4', 'https://www.youtube.com/embed/9b-QZdnmYas', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP\\/ LTVP\\/LTVP+ (Spouse)\",\"option_4\":\"Student Pass\",\"option_5\":\"PEP\\/Entre Pass\",\"option_6\":\"Work Pass\\/Work Permit\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Option)\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Mobile Number\"}', 1, '2023-01-27 04:16:19', '2023-01-27 04:30:41'),
(87, 1, 'Form1', 'A1 Immigration Consultancy', '63d353868219e1674793862.png', 'Singapore PR Application', 'Unlimited Warranty Till Approval', '{\"1\":\"Singapore PR Application\",\"2\":\"Singapore PR 2023\",\"3\":\"Sing PR Application 2023\"}', '{\"1\":\"Unlimited Warranty Till Approval\",\"2\":\"We Offer Unlimited Warranty Till Approval\",\"3\":\"Unlimited Warranty Till Approval | Over 1,289 Approved PR\"}', 'Get your PR Now»', 'https://www.youtube.com/embed/X1QJGzvyoZI', 'https://www.youtube.com/embed/207uzv_PlF4', 'https://www.youtube.com/embed/9b-QZdnmYas', NULL, NULL, NULL, '63d35386873701674793862.png', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP\\/ LTVP\\/LTVP+ (Spouse)\",\"option_4\":\"Student Pass\",\"option_5\":\"PEP\\/Entre Pass\",\"option_6\":\"Work Pass\\/Work Permit\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Option)\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Mobile Number\"}', 1, '2023-01-27 04:31:03', '2023-01-27 04:31:03'),
(88, 1, 'Form1', 'A1 Immigration Consultancy', NULL, 'Singapore PR Application', 'Unlimited Warranty Till Approval', '{\"1\":\"Singapore PR Application\",\"2\":\"Singapore PR 2023\",\"3\":\"Sing PR Application 2023\"}', '{\"1\":\"Unlimited Warranty Till Approval\",\"2\":\"We Offer Unlimited Warranty Till Approval\",\"3\":\"Unlimited Warranty Till Approval | Over 1,289 Approved PR\"}', 'Get your PR Now»', 'https://www.youtube.com/embed/X1QJGzvyoZI', 'https://www.youtube.com/embed/207uzv_PlF4', 'https://www.youtube.com/embed/9b-QZdnmYas', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP\\/ LTVP\\/LTVP+ (Spouse)\",\"option_4\":\"Student Pass\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Option)\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Mobile Number\"}', 1, '2023-01-27 04:31:53', '2023-01-27 04:31:53'),
(89, 1, 'Form2', 'A1 Immigration Consultancy', NULL, 'Singapore PR Application', 'Unlimited Warranty Till Approval', '{\"1\":\"Singapore PR Application\",\"2\":\"Singapore PR 2023\",\"3\":\"Sing PR Application 2023\"}', '{\"1\":\"Unlimited Warranty Till Approval\",\"2\":\"We Offer Unlimited Warranty Till Approval\",\"3\":\"Unlimited Warranty Till Approval | Over 1,289 Approved PR\"}', 'Get your PR Now»', 'https://www.youtube.com/embed/X1QJGzvyoZI', 'https://www.youtube.com/embed/207uzv_PlF4', 'https://www.youtube.com/embed/9b-QZdnmYas', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Current Pass \\/ Residential Status\",\"option_1\":\"Employment Pass\",\"option_2\":\"S Pass\",\"option_3\":\"DP\\/ LTVP\\/LTVP+ (Spouse)\",\"option_4\":\"Student Pass\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"Over 2 years\",\"option_2\":\"2 years\",\"option_3\":\"1 year\",\"option_4\":\"Less than 6 months\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR (Option)\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Mobile Number\"}', 1, '2023-01-27 05:50:02', '2023-01-27 05:50:02'),
(90, 1, 'Form', 'Premium Leads Pte. Ltd.', NULL, 'AAA', 'BBB', '{\"1\":\"AAA\",\"2\":\"Aaa2\",\"3\":\"Aaa3\"}', '{\"1\":\"BBB\",\"2\":\"Bbb2\",\"3\":\"Bbb3\"}', 'Punch', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name2\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', NULL, NULL, NULL, 1, '2023-01-27 23:59:10', '2023-01-28 00:14:50'),
(91, 1, 'New Camp 31 Jan', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-01-31 15:16:56', '2023-01-31 15:16:56'),
(92, 1, 'test 1 fab v1', 'hero', '63da4bb0736f41675250608.jpg', NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-02-01 11:22:48', '2023-02-01 11:23:28'),
(93, 1, 'Apply Singapore PR2', 'Premium Leads Pte. Ltd.', '63da536db9fbe1675252589.png', 'SPR Application 2022', 'Unlimited warranty Till Approval', '{\"1\":\"SPR Application 2022\",\"2\":null}', '{\"1\":\"Unlimited warranty Till Approval\",\"2\":null}', 'Calculate your chanc', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, NULL, NULL, NULL, '63da536dd6d631675252589.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-02-01 11:46:02', '2023-02-01 11:56:29'),
(94, 1, 'Apply Singapore PR5', 'Premium Leads Pte. Ltd.', '63da54deeb31b1675252958.png', 'Title1', 'D11', '{\"1\":\"Title1\",\"2\":\"Title2\",\"3\":\"Title3\"}', '{\"1\":\"D11\",\"2\":\"D12\",\"3\":\"D13\"}', 'Usp13', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eIho2S0ZahI', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, '63da54deec1801675252958.png', '63da54df248ef1675252959.png', '63da54df252bf1675252959.png', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 1, '2023-02-01 11:56:50', '2023-02-01 12:02:39'),
(95, 1, '01 Fab V2 form', NULL, '63daaa1818e1a1675274776.jpg', NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, 'https://www.youtube.com/embed/VPRTIMer5xM', 'https://www.youtube.com/embed/VPRTIMer5xM', NULL, NULL, NULL, NULL, '63daaa185e4cc1675274776.jpg', '63daaa189f2ef1675274776.jpg', '63daaa18e0ae91675274776.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', NULL, NULL, NULL, NULL, 0, '2023-02-01 18:04:18', '2023-02-01 18:06:17'),
(96, 1, 'Form 1 v3', 'hero', '63daac3727b691675275319.jpg', 'f1 title', 'f1 desc', '{\"1\":\"f1 title\",\"2\":\"f2 title\",\"3\":\"f3 title\"}', '{\"1\":\"f1 desc\",\"2\":\"F2 desc\",\"3\":\"As as as as\"}', 'No Credit Card Required', 'https://www.youtube.com/embed/VPRTIMer5xM', NULL, NULL, NULL, NULL, NULL, '63daac376d0ec1675275319.jpg', '63daac37b09691675275319.jpg', '63daac37f382f1675275319.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Email\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Your Phone\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"34\",\"option_4\":\"4\"}', NULL, NULL, 0, '2023-02-01 18:10:13', '2023-02-01 18:15:20'),
(97, 1, 'Apply Singapore PR5', 'Premium Leads Pte. Ltd.', '63db5ee613e651675321062.jpg', 'SPR Application 202255', '2-1', '{\"1\":\"SPR Application 202255\",\"2\":\"22222\",\"3\":\"3333\"}', '{\"1\":\"2-1\",\"2\":\"2-2\",\"3\":\"2-3\"}', '3333', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, '63db5ee6685c41675321062.png', '63db5ee6946351675321062.JPG', '63db5ee6966be1675321062.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Current Pass \\/ Residential Status\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\",\"option_5\":\"5\",\"option_6\":\"6\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Singapore Mobile\"}', 0, '2023-02-02 06:48:09', '2023-02-02 06:57:42'),
(98, 1, 'Apply Singapore PR5', 'Premium Leads Pte. Ltd.', '63db5f3a925bd1675321146.jpg', 'SPR Application 202255', '2-1', '{\"1\":\"SPR Application 202255\",\"2\":\"22222\",\"3\":\"3333\"}', '{\"1\":\"2-1\",\"2\":\"2-2\",\"3\":\"2-3\"}', '3333', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', 'https://www.youtube.com/embed/eyGPIpZ7208', NULL, NULL, NULL, '63db5f3ae944e1675321146.png', '63db5f3b22a7b1675321147.JPG', '63db5f3b24b181675321147.jpg', '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Current Pass \\/ Residential Status\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of Stay in Singapore\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\",\"option_5\":\"5\",\"option_6\":\"6\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Length of stay in Singapore\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Singapore Mobile\"}', 1, '2023-02-02 06:59:07', '2023-02-02 06:59:07'),
(99, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-02 07:01:08', '2023-02-02 07:01:08'),
(100, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-03 05:40:58', '2023-02-03 05:40:58'),
(101, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-03 05:47:49', '2023-02-03 05:47:49'),
(102, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":null}', NULL, NULL, 0, '2023-02-03 05:53:06', '2023-02-03 05:53:06'),
(103, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-03 06:44:13', '2023-02-03 06:44:13'),
(104, 1, 'EVENTS', 'MYBUSINESS', '63dcbbd078c331675410384.jpg', 'Events Management', 'Manage Events', '{\"1\":\"Events Management\",\"2\":null}', '{\"1\":\"Manage Events\",\"2\":null}', 'UNIQUE', 'https://www.youtube.com/embed/pjxa_BEZOHU', NULL, NULL, NULL, NULL, NULL, '63dcbbd086fe51675410384.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Past Experience\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Joining Date\"}', 0, '2023-02-03 07:40:51', '2023-02-03 07:46:24'),
(105, 1, 'EVENTS', 'MYBUSINESS', '63dcbbd0caa6d1675410384.jpg', 'Events Management', 'Manage Events', '{\"1\":\"Events Management\",\"2\":null}', '{\"1\":\"Manage Events\",\"2\":null}', 'UNIQUE', 'https://www.youtube.com/embed/pjxa_BEZOHU', NULL, NULL, NULL, NULL, NULL, '63dcbbd0d777a1675410384.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', '{\"sort\":\"4\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Past Experience\"}', '{\"sort\":\"5\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Joining Date\"}', 1, '2023-02-03 07:46:24', '2023-02-03 07:46:24'),
(106, 1, '', NULL, NULL, NULL, NULL, '{\"1\":null}', '{\"1\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-05 01:19:48', '2023-02-05 01:19:48'),
(107, 1, 'New 05 02 2023', 'Hero', '63df5110130851675579664.jpg', 'Start a Free 30-day Trial', 'Form Description some text can be added here', '{\"1\":\"Start a Free 30-day Trial\",\"2\":null}', '{\"1\":\"Form Description some text can be added here\",\"2\":null}', 'No Credit Card Required', 'https://www.youtube.com/embed/VPRTIMer5xM', 'https://www.youtube.com/embed/VPRTIMer5xM', NULL, NULL, NULL, NULL, '63df51101427d1675579664.jpg', NULL, NULL, '{\"sort\":\"1\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Full Name\"}', '{\"sort\":\"2\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Email id\"}', '{\"sort\":\"3\",\"required\":\"on\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Phone Number\"}', NULL, NULL, 0, '2023-02-05 06:34:38', '2023-02-05 06:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_forms_leads`
--

CREATE TABLE `campaign_forms_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `lgen_date` date DEFAULT NULL,
  `lgen_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lgen_medium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lgen_campaign` text COLLATE utf8mb4_unicode_ci,
  `field_1` text COLLATE utf8mb4_unicode_ci,
  `field_2` text COLLATE utf8mb4_unicode_ci,
  `field_3` text COLLATE utf8mb4_unicode_ci,
  `field_4` text COLLATE utf8mb4_unicode_ci,
  `field_5` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(11,2) DEFAULT NULL,
  `expiry` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_forms_leads`
--

INSERT INTO `campaign_forms_leads` (`id`, `advertiser_id`, `campaign_id`, `publisher_id`, `form_id`, `lgen_date`, `lgen_source`, `lgen_medium`, `lgen_campaign`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `price`, `expiry`, `created_at`, `updated_at`) VALUES
(49, 1, 22, 3, 22, '2023-01-20', NULL, NULL, NULL, 'Test 1', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:15:53', '2023-01-20 18:15:53'),
(50, 1, 22, 3, 22, '2023-01-20', NULL, NULL, NULL, 'Test 2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07'),
(51, 1, 22, 3, 22, '2023-01-20', NULL, NULL, NULL, 'Test 3', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07'),
(52, 1, 22, 3, 22, '2023-01-20', NULL, NULL, NULL, 'Test 4', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07'),
(53, 1, 22, 3, 22, '2023-01-20', NULL, NULL, NULL, 'Test 5', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07'),
(54, 1, 22, 3, 22, '2023-01-01', NULL, NULL, NULL, 'Test 6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07'),
(55, 1, 24, 3, 22, '2023-01-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:16:07', '2023-01-20 18:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_publisher`
--

CREATE TABLE `campaign_publisher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `planned` text COLLATE utf8mb4_unicode_ci,
  `l_gen` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_publisher`
--

INSERT INTO `campaign_publisher` (`id`, `campaign_id`, `publisher_id`, `url`, `planned`, `l_gen`, `created_at`, `updated_at`) VALUES
(37, 30, 3, NULL, '{\"url_1\":\"A1\",\"remarks_1\":\"A2\",\"url_2\":\"B1\",\"remarks_2\":\"B2\",\"url_3\":\"C1\",\"remarks_3\":\"C2\",\"url_4\":\"D1\",\"remarks_4\":\"D2\",\"url_5\":\"E1\",\"remarks_5\":\"E2\",\"url_6\":\"F1\",\"remarks_6\":\"F2\"}', NULL, '2023-01-17 20:08:08', '2023-02-03 09:58:43'),
(38, 30, 6, NULL, NULL, '{\"campaign_name_1\":null,\"campaign_id_1\":null,\"ad_network_1\":\"AdNetwork 1\",\"url_1\":\"url 1\",\"campaign_name_2\":null,\"campaign_id_2\":null,\"ad_network_2\":null,\"url_2\":null,\"campaign_name_3\":null,\"campaign_id_3\":null,\"ad_network_3\":null,\"url_3\":null,\"campaign_name_4\":null,\"campaign_id_4\":null,\"ad_network_4\":null,\"url_4\":null,\"campaign_name_5\":null,\"campaign_id_5\":null,\"ad_network_5\":null,\"url_5\":null,\"campaign_name_6\":null,\"campaign_id_6\":null,\"ad_network_6\":null,\"url_6\":null}', '2023-02-02 17:26:21', '2023-02-04 03:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_publisher_common`
--

CREATE TABLE `campaign_publisher_common` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `planned` text NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_publisher_common`
--

INSERT INTO `campaign_publisher_common` (`id`, `campaign_id`, `planned`, `url`, `created_at`, `updated_at`) VALUES
(1, 30, '', '{\"url_1\":\"A3\",\"created_by_1\":\"A4\",\"remarks_1\":\"A5\",\"url_2\":\"B3\",\"created_by_2\":\"B4\",\"remarks_2\":\"B5\",\"url_3\":\"C3\",\"created_by_3\":\"C4\",\"remarks_3\":\"C5\",\"url_4\":\"D3\",\"created_by_4\":\"D4\",\"remarks_4\":\"D5\",\"url_5\":\"E3\",\"created_by_5\":\"E4\",\"remarks_5\":\"E5\",\"url_6\":\"F3\",\"created_by_6\":\"F4\",\"remarks_6\":\"F5\"}', '2023-01-17 20:08:08', '2023-02-03 09:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', NULL, NULL),
(2, 'CA', 'Canada', NULL, NULL),
(3, 'AF', 'Afghanistan', NULL, NULL),
(4, 'AL', 'Albania', NULL, NULL),
(5, 'DZ', 'Algeria', NULL, NULL),
(6, 'DS', 'American Samoa', NULL, NULL),
(7, 'AD', 'Andorra', NULL, NULL),
(8, 'AO', 'Angola', NULL, NULL),
(9, 'AI', 'Anguilla', NULL, NULL),
(10, 'AQ', 'Antarctica', NULL, NULL),
(11, 'AG', 'Antigua and Barbuda', NULL, NULL),
(12, 'AR', 'Argentina', NULL, NULL),
(13, 'AM', 'Armenia', NULL, NULL),
(14, 'AW', 'Aruba', NULL, NULL),
(15, 'AU', 'Australia', NULL, NULL),
(16, 'AT', 'Austria', NULL, NULL),
(17, 'AZ', 'Azerbaijan', NULL, NULL),
(18, 'BS', 'Bahamas', NULL, NULL),
(19, 'BH', 'Bahrain', NULL, NULL),
(20, 'BD', 'Bangladesh', NULL, NULL),
(21, 'BB', 'Barbados', NULL, NULL),
(22, 'BY', 'Belarus', NULL, NULL),
(23, 'BE', 'Belgium', NULL, NULL),
(24, 'BZ', 'Belize', NULL, NULL),
(25, 'BJ', 'Benin', NULL, NULL),
(26, 'BM', 'Bermuda', NULL, NULL),
(27, 'BT', 'Bhutan', NULL, NULL),
(28, 'BO', 'Bolivia', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(30, 'BW', 'Botswana', NULL, NULL),
(31, 'BV', 'Bouvet Island', NULL, NULL),
(32, 'BR', 'Brazil', NULL, NULL),
(33, 'IO', 'British lndian Ocean Territory', NULL, NULL),
(34, 'BN', 'Brunei Darussalam', NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL),
(38, 'KH', 'Cambodia', NULL, NULL),
(39, 'CM', 'Cameroon', NULL, NULL),
(40, 'CV', 'Cape Verde', NULL, NULL),
(41, 'KY', 'Cayman Islands', NULL, NULL),
(42, 'CF', 'Central African Republic', NULL, NULL),
(43, 'TD', 'Chad', NULL, NULL),
(44, 'CL', 'Chile', NULL, NULL),
(45, 'CN', 'China', NULL, NULL),
(46, 'CX', 'Christmas Island', NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(48, 'CO', 'Colombia', NULL, NULL),
(49, 'KM', 'Comoros', NULL, NULL),
(50, 'CG', 'Congo', NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL),
(57, 'DK', 'Denmark', NULL, NULL),
(58, 'DJ', 'Djibouti', NULL, NULL),
(59, 'DM', 'Dominica', NULL, NULL),
(60, 'DO', 'Dominican Republic', NULL, NULL),
(61, 'TP', 'East Timor', NULL, NULL),
(62, 'EC', 'Ecuador', NULL, NULL),
(63, 'EG', 'Egypt', NULL, NULL),
(64, 'SV', 'El Salvador', NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', NULL, NULL),
(66, 'ER', 'Eritrea', NULL, NULL),
(67, 'EE', 'Estonia', NULL, NULL),
(68, 'ET', 'Ethiopia', NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'FO', 'Faroe Islands', NULL, NULL),
(71, 'FJ', 'Fiji', NULL, NULL),
(72, 'FI', 'Finland', NULL, NULL),
(73, 'FR', 'France', NULL, NULL),
(74, 'FX', 'France, Metropolitan', NULL, NULL),
(75, 'GF', 'French Guiana', NULL, NULL),
(76, 'PF', 'French Polynesia', NULL, NULL),
(77, 'TF', 'French Southern Territories', NULL, NULL),
(78, 'GA', 'Gabon', NULL, NULL),
(79, 'GM', 'Gambia', NULL, NULL),
(80, 'GE', 'Georgia', NULL, NULL),
(81, 'DE', 'Germany', NULL, NULL),
(82, 'GH', 'Ghana', NULL, NULL),
(83, 'GI', 'Gibraltar', NULL, NULL),
(84, 'GR', 'Greece', NULL, NULL),
(85, 'GL', 'Greenland', NULL, NULL),
(86, 'GD', 'Grenada', NULL, NULL),
(87, 'GP', 'Guadeloupe', NULL, NULL),
(88, 'GU', 'Guam', NULL, NULL),
(89, 'GT', 'Guatemala', NULL, NULL),
(90, 'GN', 'Guinea', NULL, NULL),
(91, 'GW', 'Guinea-Bissau', NULL, NULL),
(92, 'GY', 'Guyana', NULL, NULL),
(93, 'HT', 'Haiti', NULL, NULL),
(94, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(95, 'HN', 'Honduras', NULL, NULL),
(96, 'HK', 'Hong Kong', NULL, NULL),
(97, 'HU', 'Hungary', NULL, NULL),
(98, 'IS', 'Iceland', NULL, NULL),
(99, 'IN', 'India', NULL, NULL),
(100, 'ID', 'Indonesia', NULL, NULL),
(101, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(102, 'IQ', 'Iraq', NULL, NULL),
(103, 'IE', 'Ireland', NULL, NULL),
(104, 'IL', 'Israel', NULL, NULL),
(105, 'IT', 'Italy', NULL, NULL),
(106, 'CI', 'Ivory Coast', NULL, NULL),
(107, 'JM', 'Jamaica', NULL, NULL),
(108, 'JP', 'Japan', NULL, NULL),
(109, 'JO', 'Jordan', NULL, NULL),
(110, 'KZ', 'Kazakhstan', NULL, NULL),
(111, 'KE', 'Kenya', NULL, NULL),
(112, 'KI', 'Kiribati', NULL, NULL),
(113, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(114, 'KR', 'Korea, Republic of', NULL, NULL),
(115, 'XK', 'Kosovo', NULL, NULL),
(116, 'KW', 'Kuwait', NULL, NULL),
(117, 'KG', 'Kyrgyzstan', NULL, NULL),
(118, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(119, 'LV', 'Latvia', NULL, NULL),
(120, 'LB', 'Lebanon', NULL, NULL),
(121, 'LS', 'Lesotho', NULL, NULL),
(122, 'LR', 'Liberia', NULL, NULL),
(123, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(124, 'LI', 'Liechtenstein', NULL, NULL),
(125, 'LT', 'Lithuania', NULL, NULL),
(126, 'LU', 'Luxembourg', NULL, NULL),
(127, 'MO', 'Macau', NULL, NULL),
(128, 'MK', 'Macedonia', NULL, NULL),
(129, 'MG', 'Madagascar', NULL, NULL),
(130, 'MW', 'Malawi', NULL, NULL),
(131, 'MY', 'Malaysia', NULL, NULL),
(132, 'MV', 'Maldives', NULL, NULL),
(133, 'ML', 'Mali', NULL, NULL),
(134, 'MT', 'Malta', NULL, NULL),
(135, 'MH', 'Marshall Islands', NULL, NULL),
(136, 'MQ', 'Martinique', NULL, NULL),
(137, 'MR', 'Mauritania', NULL, NULL),
(138, 'MU', 'Mauritius', NULL, NULL),
(139, 'TY', 'Mayotte', NULL, NULL),
(140, 'MX', 'Mexico', NULL, NULL),
(141, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(142, 'MD', 'Moldova, Republic of', NULL, NULL),
(143, 'MC', 'Monaco', NULL, NULL),
(144, 'MN', 'Mongolia', NULL, NULL),
(145, 'ME', 'Montenegro', NULL, NULL),
(146, 'MS', 'Montserrat', NULL, NULL),
(147, 'MA', 'Morocco', NULL, NULL),
(148, 'MZ', 'Mozambique', NULL, NULL),
(149, 'MM', 'Myanmar', NULL, NULL),
(150, 'NA', 'Namibia', NULL, NULL),
(151, 'NR', 'Nauru', NULL, NULL),
(152, 'NP', 'Nepal', NULL, NULL),
(153, 'NL', 'Netherlands', NULL, NULL),
(154, 'AN', 'Netherlands Antilles', NULL, NULL),
(155, 'NC', 'New Caledonia', NULL, NULL),
(156, 'NZ', 'New Zealand', NULL, NULL),
(157, 'NI', 'Nicaragua', NULL, NULL),
(158, 'NE', 'Niger', NULL, NULL),
(159, 'NG', 'Nigeria', NULL, NULL),
(160, 'NU', 'Niue', NULL, NULL),
(161, 'NF', 'Norfork Island', NULL, NULL),
(162, 'MP', 'Northern Mariana Islands', NULL, NULL),
(163, 'NO', 'Norway', NULL, NULL),
(164, 'OM', 'Oman', NULL, NULL),
(165, 'PK', 'Pakistan', NULL, NULL),
(166, 'PW', 'Palau', NULL, NULL),
(167, 'PA', 'Panama', NULL, NULL),
(168, 'PG', 'Papua New Guinea', NULL, NULL),
(169, 'PY', 'Paraguay', NULL, NULL),
(170, 'PE', 'Peru', NULL, NULL),
(171, 'PH', 'Philippines', NULL, NULL),
(172, 'PN', 'Pitcairn', NULL, NULL),
(173, 'PL', 'Poland', NULL, NULL),
(174, 'PT', 'Portugal', NULL, NULL),
(175, 'PR', 'Puerto Rico', NULL, NULL),
(176, 'QA', 'Qatar', NULL, NULL),
(177, 'RE', 'Reunion', NULL, NULL),
(178, 'RO', 'Romania', NULL, NULL),
(179, 'RU', 'Russian Federation', NULL, NULL),
(180, 'RW', 'Rwanda', NULL, NULL),
(181, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(182, 'LC', 'Saint Lucia', NULL, NULL),
(183, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(184, 'WS', 'Samoa', NULL, NULL),
(185, 'SM', 'San Marino', NULL, NULL),
(186, 'ST', 'Sao Tome and Principe', NULL, NULL),
(187, 'SA', 'Saudi Arabia', NULL, NULL),
(188, 'SN', 'Senegal', NULL, NULL),
(189, 'RS', 'Serbia', NULL, NULL),
(190, 'SC', 'Seychelles', NULL, NULL),
(191, 'SL', 'Sierra Leone', NULL, NULL),
(192, 'SG', 'Singapore', NULL, NULL),
(193, 'SK', 'Slovakia', NULL, NULL),
(194, 'SI', 'Slovenia', NULL, NULL),
(195, 'SB', 'Solomon Islands', NULL, NULL),
(196, 'SO', 'Somalia', NULL, NULL),
(197, 'ZA', 'South Africa', NULL, NULL),
(198, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(199, 'ES', 'Spain', NULL, NULL),
(200, 'LK', 'Sri Lanka', NULL, NULL),
(201, 'SH', 'St. Helena', NULL, NULL),
(202, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(203, 'SD', 'Sudan', NULL, NULL),
(204, 'SR', 'Suriname', NULL, NULL),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands', NULL, NULL),
(206, 'SZ', 'Swaziland', NULL, NULL),
(207, 'SE', 'Sweden', NULL, NULL),
(208, 'CH', 'Switzerland', NULL, NULL),
(209, 'SY', 'Syrian Arab Republic', NULL, NULL),
(210, 'TW', 'Taiwan', NULL, NULL),
(211, 'TJ', 'Tajikistan', NULL, NULL),
(212, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(213, 'TH', 'Thailand', NULL, NULL),
(214, 'TG', 'Togo', NULL, NULL),
(215, 'TK', 'Tokelau', NULL, NULL),
(216, 'TO', 'Tonga', NULL, NULL),
(217, 'TT', 'Trinidad and Tobago', NULL, NULL),
(218, 'TN', 'Tunisia', NULL, NULL),
(219, 'TR', 'Turkey', NULL, NULL),
(220, 'TM', 'Turkmenistan', NULL, NULL),
(221, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(222, 'TV', 'Tuvalu', NULL, NULL),
(223, 'UG', 'Uganda', NULL, NULL),
(224, 'UA', 'Ukraine', NULL, NULL),
(225, 'AE', 'United Arab Emirates', NULL, NULL),
(226, 'GB', 'United Kingdom', NULL, NULL),
(227, 'UM', 'United States minor outlying islands', NULL, NULL),
(228, 'UY', 'Uruguay', NULL, NULL),
(229, 'UZ', 'Uzbekistan', NULL, NULL),
(230, 'VU', 'Vanuatu', NULL, NULL),
(231, 'VA', 'Vatican City State', NULL, NULL),
(232, 'VE', 'Venezuela', NULL, NULL),
(233, 'VN', 'Vietnam', NULL, NULL),
(234, 'VG', 'Virgin Islands (British)', NULL, NULL),
(235, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(236, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(237, 'EH', 'Western Sahara', NULL, NULL),
(238, 'YE', 'Yemen', NULL, NULL),
(239, 'YU', 'Yugoslavia', NULL, NULL),
(240, 'ZR', 'Zaire', NULL, NULL),
(241, 'ZM', 'Zambia', NULL, NULL),
(242, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `create_ads`
--

CREATE TABLE `create_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `ad_type_id` int(11) DEFAULT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clicked` int(11) DEFAULT NULL,
  `impression` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=>active , 2=>pending, 0=>deactive',
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_country` text COLLATE utf8mb4_unicode_ci,
  `global` int(1) NOT NULL DEFAULT '0',
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `method_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `final_amo` decimal(18,8) DEFAULT '0.00000000',
  `detail` text COLLATE utf8mb4_unicode_ci,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel',
  `payment_stat` int(11) DEFAULT '0',
  `admin_feedback` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_code`, `amount`, `method_currency`, `charge`, `rate`, `final_amo`, `detail`, `btc_amo`, `btc_wallet`, `trx`, `try`, `status`, `payment_stat`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, '1000.00000000', 'SGD', '0.00000000', '1.00000000', '1000.00000000', '{\"paynow_amount\":{\"field_name\":\"100\",\"type\":\"text\"}}', '0', '', 'FUTVZ83XDMFQ', 0, 3, 0, 'reject', '2022-11-01 12:33:51', '2022-12-01 08:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `domain_verifcations`
--

CREATE TABLE `domain_verifcations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracker` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `domain_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL COMMENT '0=>non verified, 1=> verified, 2=>pending',
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domain_verifcations`
--

INSERT INTO `domain_verifcations` (`id`, `tracker`, `publisher_id`, `domain_name`, `verify_code`, `keywords`, `status`, `category`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MCB9UYY935', 1, 'digital.com', '8TYQU71TBOWNCJEMCRM4GRRJV9OA5F9D', '[\"passport\",\"visa\"]', 0, NULL, '2022-11-18 09:53:31', '2022-11-16 05:19:20', '2022-11-18 09:53:31'),
(2, 'GX7UXHEG10', 1, 'test.com', 'CEUEOE2TADAF85YNC2SGQE36QUCM2UOK', '[\"passport\",\"visa\"]', 0, NULL, '2022-11-18 09:53:33', '2022-11-16 05:20:34', '2022-11-18 09:53:33'),
(3, 'BKA2J43349', 1, 'aa', 'PMM4WE4OVNM3W77TQVBAXSOYDNJJ3G81', '[\"passport\"]', 0, NULL, '2022-11-18 09:53:36', '2022-11-16 05:48:11', '2022-11-18 09:53:36'),
(4, 'CQMDX24M100', 1, 'test1.com', 'OGGNRFTTN4PAOYCEU9UH7E4A91MPE6Q6', '[\"passport\"]', 0, 'test 1,test 2,test 3,test 4', NULL, '2022-11-16 11:58:55', '2022-11-16 11:58:55'),
(5, 'BNWY78NV71', 1, 'test3.com', 'T9MVQY67HTGEHD3AVXC1HSKTED2EKODK', '[\"visa\"]', 0, 'test 1,test 2,test 3,test 4', NULL, '2022-11-16 12:01:02', '2022-11-16 12:01:02'),
(6, '8E4QKHA923', 1, 'test4.com', 'MP3RV31XJQWYETMA5ZH97BHNRWDU9EN3', '\"test1 , test2 , test3 , test4\"', 0, 'test 1 , test 2 , test 3', NULL, '2022-11-16 12:01:17', '2022-11-17 12:28:03'),
(7, 'V3QKWAU111', 1, 'test5.com', '768P8SU7CG9HX56W4DGX3T21U3SV5HH1', '[\"passport\",\"visa\"]', 0, 'test 1,test 2', NULL, '2022-11-16 12:01:37', '2022-11-16 12:01:37'),
(8, 'XD7F8B7N6', 1, 'domain.com', 'M1X1MK1HUP94EU35JCRAZAE6P2DUFOXU', '[\"visa\"]', 0, 'test 2,test 3,test 4', NULL, '2022-11-16 12:02:10', '2022-11-16 12:02:10'),
(9, 'FNQ65XAR85', 1, 'sgpr.com', '9HMQO6VCA2VG5A4ACM9W44PC7413QOOY', '[\"passport\",\"visa\"]', 0, 'test 1', NULL, '2022-11-16 13:48:31', '2022-11-16 13:48:31'),
(10, 'Q4M2DMUF61', 1, 'sgpr.com', 'ZOCU7VM65SQHEMMQZE2FJY93K3ZMX23D', '[\"passport\",\"visa\"]', 0, 'test 2', NULL, '2022-11-16 13:52:06', '2022-11-16 13:52:06'),
(11, 'HBAOUDRA22', 1, 'sgpr.sg', 'N6M8HVFAMNZEBRDDDGE8GJTGAFFNTTPU', '[\"passport\"]', 0, 'test 5', NULL, '2022-11-16 13:59:49', '2022-11-16 13:59:49'),
(12, 'AQKD64QX7', 1, 'publisher.com', 'JMFP4YTG2VNPK7C4Z7FRS7JPP1AKS615', '\"test, publisher\"', 0, 'test 1', NULL, '2022-11-17 12:29:24', '2022-11-18 09:53:31'),
(13, 'RBPTA3Z888', 1, 'keywords.com', '19RQWRQJZC9H392WJ3CVJAE321461Z5S', '\"test1\"', 0, 'test 1, test 2, test 4', '2022-11-18 09:00:12', '2022-11-18 07:58:20', '2022-11-18 09:00:12'),
(14, '2WFXBUHO20', 1, 'hello.com', 'BSHD7K3Y9VRGA28PB1BA9RY9XHH8ZA7T', '\"hello, TEST-1\"', 0, 'test 1, test 2', '2022-11-18 07:59:59', '2022-11-18 07:59:47', '2022-11-18 07:59:59'),
(15, 'O7Y8QDPG35', 1, 'google.com', 'ZMO1J69AXXEASAJA9SNZGX249JVQE9P7', '\"test1, test2\"', 0, 'test 1, test 2', NULL, '2022-11-18 08:57:09', '2022-11-18 09:50:36'),
(16, 'DEFOUK4694', 1, 'google.com', 'VSN8XSHV6U89J3DWQ16TGU29KUGBPNS7', '\"test1\"', 0, 'test 1', '2022-11-18 09:50:43', '2022-11-18 09:50:11', '2022-11-18 09:50:43'),
(17, '7TMAFSHQ41', 1, 'leadspaid.com', '2MT1O6DYJ7YYFA1EO5X4EPXWUU16JZJB', '\"test, test1\"', 0, 'test 1', NULL, '2022-11-18 09:51:48', '2022-11-18 11:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `earning_logs`
--

CREATE TABLE `earning_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `ad_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci,
  `sms_body` text COLLATE utf8mb4_unicode_ci,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT '1',
  `sms_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}}.<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}</b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2022-12-28 15:45:40'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have reset your password', '<div><p style=\"color:#00cc00\">\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not change that, please </b><a href=\"https://www.leadspaid.com/contact-us/\" title=\"\" target=\"_blank\" style=\"font-weight: bold;\">contact us</a><b>&nbsp;</b><font color=\"#ff0000\"><b>immediately</b></font><b>.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2022-12-28 15:57:59'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address. <br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:26:22'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 23:04:05', '2020-03-08 01:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 18:00:00', '2020-05-04 02:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Payment Completed Successfully', '<div>Your Payment of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Payment:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 18:00:00', '2020-10-12 04:42:55'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 18:00:00', '2020-06-01 18:00:00'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Payment is Approved', '<div>Your Payment request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 18:00:00', '2021-03-07 23:25:57'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(210, 'WITHDRAW_REQUEST', 'Withdraw  - User Requested', 'Withdraw Request Submitted Successfully', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been submitted Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"4\" color=\"#FF0000\"><b><br></b></font></div><div><font size=\"4\" color=\"#FF0000\"><b>This may take {{delay}} to process the payment.</b></font><br></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br><br></div>', '{{amount}} {{currency}} withdraw requested by {{withdraw_method}}. You will get {{method_amount}} {{method_currency}} in {{duration}}. Trx: {{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"delay\":\"Delay time for processing\"}', 1, 1, '2020-06-07 18:00:00', '2020-06-14 18:00:00'),
(211, 'WITHDRAW_REJECT', 'Withdraw - Admin Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Rejected.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You should get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div><div>----</div><div><font size=\"3\"><br></font></div><div><font size=\"3\"> {{amount}} {{currency}} has been <b>refunded </b>to your account and your current Balance is <b>{{post_balance}}</b><b> {{currency}}</b></font></div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Rejection :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br><br></div>', 'Admin Rejected Your {{amount}} {{currency}} withdraw request. Your Main Balance {{main_balance}}  {{method}} , Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(212, 'WITHDRAW_APPROVE', 'Withdraw - Admin  Approved', 'Withdraw Request has been Processed and your money is sent', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Processed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Processed Payment :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br></div>', 'Admin Approve Your {{amount}} {{currency}} withdraw request by {{method}}. Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-10 18:00:00', '2020-06-06 18:00:00'),
(215, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(216, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(217, 'PLAN_PURCHASED', 'Plan Purchased - Successfully', 'Plan Purchased - Successfully', '<div><b>{{plan}}</b> Plan has been purchased successfully by paying of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b><b><br></b></div><div><b><br></b></div><div><b>Details of your Payment:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Plan Name : {{plan}}</div><div>Plan Credit : {{credit}}</div><div>Plan Type : {{type}}<br></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', ' Plan purchased successfully by paying {{amount}} {{currrency}} by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\",\"plan\":\"plan name\",\"credit\":\"plan credit\",\"type\":\"plan type\"}', 1, 1, '2020-06-24 18:00:00', '2021-03-06 04:19:01'),
(218, 'PURCHASE_REQUEST', 'Price Plan Purchase via mannual gateway', 'Price Plan purchase request Submitted Successfully', '<div>Your Price Plan purchase request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Price plan:<br></b></div><div><b><br></b></div><div>Plan Name : {{name}}</div><div>Plan Type : {{type}}</div><div>Plan Credit : {{credit}}</div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"name\":\"price plan name\",\"type\":\"plan type\",\"credit\":\"plan credit\"}', 1, 1, '2020-05-31 18:00:00', '2021-03-24 05:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci,
  `shortcode` text COLLATE utf8mb4_unicode_ci COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"58dd135ef7bbaa72\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2021-05-24 05:54:43'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"6Lfpm3cUAAAAAGIjbEJKhJNKS4X1Gns9ANjh8MfH\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2021-03-08 23:45:27'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, NULL, '2019-10-18 23:16:05', '2022-11-09 02:05:23'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"Demo\"}}', 'ganalytics.png', 0, NULL, NULL, '2021-04-05 01:26:00'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"713047905830100\"}}', 'fb_com.PNG', 1, NULL, NULL, '2021-03-08 00:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"lead generation platform\",\"lead generation tool\",\"lead gen software\",\"lead ad network\",\"Google Ads alternative\",\"Facebook alternative\",\"LinkedIn alternative\"],\"description\":\"#1 Artificial intelligence based lead generation platform to get leads from high ranking, authority sites. Over 200k+ leads generated for Fortune 500 companies.\",\"social_title\":\"World\'s First AI-powered Leads Ad Network | LeadsPaid.com\",\"social_description\":\"#1 Artificial intelligence based lead generation platform to get leads from high ranking, authority sites. Over 200k+ leads generated for Fortune 500 companies.\",\"image\":\"63b6b411207b21672918033.jpg\"}', '2020-07-04 23:42:52', '2023-01-20 09:30:40'),
(2, 'feature.content', '{\"heading\":\"Why do we use it?\",\"sub_heading\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.\"}', '2020-07-05 01:15:40', '2020-07-24 23:31:34'),
(4, 'social_icon.element', '{\"title\":\"Facebook\",\"icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', '2020-07-06 03:09:33', '2020-07-06 03:09:33'),
(5, 'social_icon.element', '{\"id\":\"5\",\"title\":\"Instagram\",\"icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instagram.com\\/\"}', '2020-07-06 03:10:24', '2020-07-06 03:10:50'),
(9, 'about.content', '{\"has_image\":\"1\",\"heading\":\"About Us\",\"image\":\"604470e25a9d61615098082.jpg\"}', '2020-07-07 07:42:33', '2021-03-07 12:21:22'),
(10, 'contact_us.content', '{\"title\":\"a\",\"short_details\":\"as\",\"email_address\":\"as\",\"contact_details\":\"as\",\"contact_number\":\"as\",\"latitude\":\"as\",\"longitude\":\"as\",\"website_footer\":\"qas\"}', '2020-07-12 01:33:45', '2020-07-12 01:34:11'),
(11, 'testimonial.content', '{\"has_image\":\"1\",\"heading\":\"What our client\'s say?\",\"video_title\":\"Watch our promo video\",\"video_link\":\"https:\\/\\/www.youtube.com\\/embed\\/kGbbIMYxsa8\",\"background_image\":\"604c41740a9e51615610228.jpg\"}', '2020-07-24 23:31:56', '2021-03-12 22:37:08'),
(69, 'client.element', '{\"id\":\"69\",\"has_image\":\"1\",\"name\":\"Darrel Ferrell\",\"designation\":\"Architecto\",\"comment\":\"Provident repellendus voluptatum sapiente.Modi soluta ut temporibus minima officia distinctio, dolorem, quia eveniet iste cupiditate nobis? Enim, pariatur ipsa! Blanditiis\",\"image\":\"5f84d8e3ec5981602541795.jpg\"}', '2020-10-12 23:23:43', '2020-10-13 04:29:56'),
(73, 'banner.element', '{\"id\":\"73\",\"has_image\":\"1\",\"title\":\"Low cost\",\"heading\":\"Advertising With Low cost\",\"little_description\":\"Pariatur repudiandae dicta cumque, perferendis minima neque a nostrum totam fugiat at blanditiis est minus ea corporis\",\"button_text\":\"service\",\"url\":\"\\/advertiser\",\"image\":\"5f85f71ea82c81602615070.png\"}', '2020-10-14 00:37:07', '2020-10-16 03:03:41'),
(74, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"Welcome to The Leads Paid\",\"short_details\":\"High Quality Lead Gen Platform To generate leads without a website or social media. Generate leads through popular high traffic\\nand targeted websites\\/Apps.\",\"background_image\":\"63b6b42c55ad11672918060.jpg\"}', '2020-10-08 18:39:19', '2023-01-05 11:27:40'),
(75, 'banner.element', '{\"has_image\":\"1\",\"title\":\"Multiple\",\"heading\":\"Multiple Ad Facility\",\"little_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque velit consectetur vel? Harum aspernatur cupiditate, odio quam culpa aliquid atque, eum nihil,\",\"button_text\":\"Get Now\",\"url\":\"\\/advertiser\",\"image\":\"5f85f7bb98b5f1602615227.png\"}', '2020-10-14 00:53:47', '2020-10-14 00:53:47'),
(76, 'banner.element', '{\"id\":\"76\",\"has_image\":\"1\",\"title\":\"Earnings\",\"heading\":\"Publisher Efficient Earnings\",\"little_description\":\"Pariatur repudiandae dicta cumque, perferendis minima neque a nostrum totam fugiat at blanditiis est minus ea corporis\",\"button_text\":\"Let\'s Go\",\"url\":\"\\/publisher\",\"image\":\"5f85f95fdd4c11602615647.png\"}', '2020-10-14 00:57:50', '2020-10-14 01:00:48'),
(77, 'footer.content', '{\"heading\":\"Ready to go start? It\'s too easy to get start.\",\"copyright\":\"Copyright \\u00a9 2021\",\"button_text\":\"Sign Up\",\"button_link\":\"\\/register\"}', '2021-01-10 04:48:19', '2021-04-06 07:20:55'),
(78, 'breadcrumb.content', '{\"has_image\":\"1\",\"background_image\":\"63b6aa21a66741672915489.jpg\"}', '2021-01-15 22:39:18', '2023-01-05 10:44:49'),
(79, 'features.content', '{\"heading\":\"Ad Network Features\",\"short_details\":\"We are an international company working globally having clients from different parts of the world.\"}', '2021-01-27 22:35:58', '2021-03-07 13:15:55'),
(81, 'features.element', '{\"id\":\"81\",\"has_image\":\"1\",\"feature_name\":\"Global\",\"image\":\"60123fbd461491611808701.png\"}', '2021-01-27 22:38:21', '2021-03-07 13:15:24'),
(82, 'features.element', '{\"id\":\"82\",\"has_image\":\"1\",\"feature_name\":\"Certified\",\"image\":\"60123fd5391361611808725.png\"}', '2021-01-27 22:38:45', '2021-03-07 13:18:54'),
(83, 'features.element', '{\"id\":\"83\",\"has_image\":\"1\",\"feature_name\":\"Profitable\",\"image\":\"60123fe6e2edd1611808742.png\"}', '2021-01-27 22:39:02', '2021-03-07 13:24:01'),
(84, 'features.element', '{\"id\":\"84\",\"has_image\":\"1\",\"feature_name\":\"Recent Add\",\"image\":\"60123ffcbef481611808764.png\"}', '2021-01-27 22:39:24', '2021-03-07 13:24:33'),
(85, 'features.element', '{\"id\":\"85\",\"has_image\":\"1\",\"feature_name\":\"Secure\",\"image\":\"601240387e7f31611808824.png\"}', '2021-01-27 22:40:24', '2021-03-07 13:19:16'),
(86, 'features.element', '{\"id\":\"86\",\"has_image\":\"1\",\"feature_name\":\"24\\/hr Support\",\"image\":\"60124082e75b61611808898.png\"}', '2021-01-27 22:41:38', '2021-03-07 13:20:54'),
(87, 'format.content', '{\"has_image\":\"1\",\"heading\":\"Most Popular Advertising formats\",\"background_image\":\"604c3c68d52741615608936.jpg\"}', '2021-01-27 23:24:29', '2021-03-12 22:15:37'),
(88, 'format.element', '{\"id\":\"88\",\"has_image\":\"1\",\"heading\":\"Banner Ad format\",\"short_details\":\"Banner advertising is an impressive customizable option for online advertising with this site. With interstitial, mobile, video, and rich media banners advertising can be added here.\\r\\nServing different banner advertising formats and sizes through Addwebby, you reach the precise audience and suit the advertising banner according to your marketing campaign stage.\",\"image\":\"60124abf220e41611811519.png\"}', '2021-01-27 23:25:19', '2021-03-07 12:37:02'),
(89, 'format.element', '{\"id\":\"89\",\"has_image\":\"1\",\"heading\":\"Section Ad format\",\"short_details\":\"Section advertising is an impressive customizable option for online advertising with this site. With interstitial, mobile, video, and rich media Section s advertising can be added here.\\r\\nServing different Section advertising formats and sizes through Addwebby, you reach the precise audience and suit the advertising Section according to your marketing campaign stage.\",\"image\":\"60124aed45e441611811565.png\"}', '2021-01-27 23:26:05', '2021-03-07 12:40:29'),
(90, 'format.element', '{\"id\":\"90\",\"has_image\":\"1\",\"heading\":\"Inner Ad format\",\"short_details\":\"Inner advertising is an impressive customizable option for online advertising with this site. With interstitial, mobile, video, and rich media Inner advertising can be added here.\\r\\nServing different Inner advertising formats and sizes through Addwebby, you reach the precise audience and suit the advertising Inner according to your marketing campaign stage.\",\"image\":\"60124b09b09111611811593.png\"}', '2021-01-27 23:26:33', '2021-03-07 12:41:13'),
(91, 'format.element', '{\"id\":\"91\",\"has_image\":\"1\",\"heading\":\"Footer Ad format\",\"short_details\":\"Footer advertising is an impressive customizable option for online advertising with this site. With interstitial, mobile, video, and rich media Footer advertising can be added here.\\r\\nServing different Footer advertising formats and sizes through Addwebby, you reach the precise audience and suit the advertising Footer according to your marketing campaign stage.\",\"image\":\"60124b23aee141611811619.png\"}', '2021-01-27 23:26:59', '2021-03-07 12:42:08'),
(92, 'benefits.content', '{\"has_image\":\"1\",\"heading\":\"User Benefit\",\"short_details\":\"AdWebby is a complete tool where you can create short links, which apart from being free, you get paid! So, now you can make money from home when managing and protecting your links.\",\"advertiser_benefits\":\"<h2 class=\\\"mb-3\\\" style=\\\"line-height:1.3;font-size:32px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\">Advertisers<\\/h2><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-family:Roboto, sans-serif;font-size:16px;\\\">No matter if you are a newbie or pro, you get full access to high-quality traffic from 18K+ direct publishers and our innovative platform features. We deliver an A-class service for brands, agencies, affiliate marketers, media buyers.<\\/p><ul class=\\\"cmn-list mt-4\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">High-quality unique traffic covering ALL GEO\'s!<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Deeper targeting than in other networks\\u00a0<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Own Adserver\\u00a0<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\"><span style=\\\"color:rgb(111,111,111);font-size:16px;\\\">Service for brands<\\/span><br \\/><\\/li><\\/ul>\",\"publisher_benefits\":\"<h2 class=\\\"mb-3\\\" style=\\\"line-height:1.3;font-size:32px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><span style=\\\"color:rgb(4,34,60);\\\">Publishers<\\/span><br \\/><\\/h2><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-family:Roboto, sans-serif;font-size:16px;\\\">No matter if you are a newbie or pro, you get full access to high-quality traffic from 18K+ direct publishers and our innovative platform features. We deliver an A-class service for brands, agencies, affiliate marketers, media buyers.<\\/p><ul class=\\\"cmn-list mt-4\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Monetize up to 30% more effectively than before<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Get paid via different withdrawal methods<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Monetize web and mobile traffic.<\\/li><li style=\\\"margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\\\">Clean ads only<\\/li><\\/ul><h2 class=\\\"mb-3\\\" style=\\\"line-height:1.3;font-size:32px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h2>\",\"button_text_1\":\"Publish\",\"button_text_1_link\":\"\\/login\",\"button_text_2\":\"Advertisers\",\"button_text_2_link\":\"\\/login\",\"image\":\"60125b53033ec1611815763.png\"}', '2021-01-28 00:27:15', '2021-03-16 14:09:02'),
(93, 'overview.content', '{\"has_image\":\"1\",\"heading\":\"We\'re connected with more than 80,000,000+ peoples all over the world.\",\"button_text\":\"Get Started With Us\",\"button_link\":\"\\/register\",\"total_advertiser\":\"6200\",\"total_publisher\":\"9600\",\"total_advertise\":\"12000\",\"total_click\":\"56000\",\"total_impression\":\"963000\",\"background_image\":\"604c413662ddf1615610166.jpg\"}', '2021-01-28 00:42:16', '2021-03-12 22:36:06'),
(99, 'whychooseUs.content', '{\"heading\":\"Why Choose Us\",\"short_details\":\"Addwebby the best place to post your advertisement and publisher, whether you are an individual, group, or organization. Addwebby builds into a global movement and international activists all over the world.\"}', '2021-01-28 01:07:18', '2021-03-07 13:46:45'),
(103, 'whychooseUs.element', '{\"id\":\"103\",\"has_image\":\"1\",\"title\":\"Secure\",\"short_details\":\"We constantly work on improving our system and level of our security to minimize any potential risks.\",\"image\":\"6012636849df11611817832.png\"}', '2021-01-28 01:10:32', '2021-03-07 13:55:52'),
(104, 'whychooseUs.element', '{\"id\":\"104\",\"has_image\":\"1\",\"title\":\"Profitable\",\"short_details\":\"Easily get profit for adding members. Easy to make money and withdraw within minutes.\",\"image\":\"6012637c1975d1611817852.png\"}', '2021-01-28 01:10:52', '2021-03-07 13:53:54'),
(105, 'whychooseUs.element', '{\"id\":\"105\",\"has_image\":\"1\",\"title\":\"24\\/7 Support\",\"short_details\":\"We are here for you. We provide 24\\/7 customer support through e-mail.\",\"image\":\"60126396e5f421611817878.png\"}', '2021-01-28 01:11:18', '2021-03-07 13:50:36'),
(106, 'whychooseUs.element', '{\"id\":\"106\",\"has_image\":\"1\",\"title\":\"Reliable\",\"short_details\":\"We are highly reliable and trusted by thousands of people. Your security is our top priority.\",\"image\":\"601263b2093051611817906.png\"}', '2021-01-28 01:11:46', '2021-03-07 13:52:31'),
(107, 'whychooseUs.element', '{\"id\":\"107\",\"has_image\":\"1\",\"title\":\"Quick Withdrawal\",\"short_details\":\"Our site has a high maximum limit of withdrawal which is performed in seconds.\",\"image\":\"601263c8dc20d1611817928.png\"}', '2021-01-28 01:12:08', '2021-03-07 13:51:40'),
(108, 'whychooseUs.element', '{\"id\":\"108\",\"has_image\":\"1\",\"title\":\"Certified\",\"short_details\":\"We are a certified company operating fully legal business in the legal field.\",\"image\":\"60126400941831611817984.png\"}', '2021-01-28 01:13:04', '2021-03-07 13:53:31'),
(109, 'testimonial.element', '{\"id\":\"109\",\"has_image\":\"1\",\"client_name\":\"John Doe\",\"designation\":\"CEO, The Rock\",\"quote\":\"Today, I will be talking about one of the important blogging questions from a business perspective.\\r\\nIf you have a Website and you have not integrated a Blog yet, you are missing out on taking advantage of content marketing.\",\"image\":\"6012675462d701611818836.jpg\"}', '2021-01-28 01:27:16', '2021-03-07 13:44:08'),
(110, 'testimonial.element', '{\"id\":\"110\",\"has_image\":\"1\",\"client_name\":\"Larry Page\",\"designation\":\"CEO, Google\",\"quote\":\"Professional Website for posting add. We can go all the way back to this and find advertisements like this one, which includes endorsements. In one case, the testimonial included the full address of the author, increasing the authenticity.\",\"image\":\"60126774d109e1611818868.jpg\"}', '2021-01-28 01:27:48', '2021-03-07 13:44:36'),
(111, 'brands.element', '{\"id\":\"111\",\"has_image\":\"1\",\"image\":\"601826ad45ac01612195501.png\"}', '2021-01-28 02:44:17', '2021-02-01 10:05:01'),
(112, 'brands.element', '{\"id\":\"112\",\"has_image\":\"1\",\"image\":\"601826a7476c31612195495.png\"}', '2021-01-28 02:44:25', '2021-02-01 10:04:55'),
(113, 'brands.element', '{\"id\":\"113\",\"has_image\":\"1\",\"image\":\"601826a0e08011612195488.png\"}', '2021-01-28 02:44:33', '2021-02-01 10:04:49'),
(114, 'brands.content', '{\"heading\":\"Our brand partner\"}', '2021-01-28 02:46:23', '2021-01-28 02:46:23'),
(115, 'contact.content', '{\"address\":\"84 South Second Parkway\",\"phone_number\":\"+655465465465\",\"email\":\"arun.saba@premiumleads.co\"}', '2021-01-28 05:39:41', '2022-10-28 07:06:02'),
(116, 'blog.content', '{\"has_image\":\"1\",\"content\":\"sdkajdhsahdfksjafhkjsadfhsdfasfsadfsad\",\"image\":\"60165506152931612076294.jpg\"}', '2021-01-31 00:58:14', '2021-01-31 01:02:29'),
(122, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"link\":\"facebook.com\"}', '2021-02-01 02:58:18', '2021-02-01 02:58:18'),
(123, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"link\":\"twitter.com\"}', '2021-02-01 02:58:33', '2021-02-01 02:58:33'),
(124, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"link\":\"linkedin.com\"}', '2021-02-01 02:58:48', '2021-02-01 02:58:48');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(128, 'policy.element', '{\"heading\":\"Terms of Use\",\"content\":\"<div class=\\\"content-block\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Terms of Use<\\/h1><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><\\/h1><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin-top:15px;margin-bottom:16px;color:rgb(0,0,0);font-size:40px;line-height:60px;font-weight:700;text-align:left;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"color:rgb(0,0,0);font-size:16px;font-weight:400;\\\">Last updated: January 20, 2022<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.\\u00a0<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Interpretation and Definitions<\\/h1><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Interpretation<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Definitions<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">For the purposes of this Privacy Policy:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(33,37,41);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Account<\\/span>\\u00a0means a unique account created for You to access our Service or parts of our Service.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Company\\u00a0<\\/span>(referred to as either \\\"the Company\\\", \\\"We\\\", \\\"Us\\\" or \\\"Our\\\" in this Agreement) refers to Leads Paid Inc., its\' employees, subsidaries, business partners, allies, etc. associated with Leads Paid inc., 1401 21st Street STE R Sacramento, California 95811 United States.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies<\\/span>\\u00a0are small files that are placed on Your computer, mobile device or any other device by a website, containing the details of Your browsing history on that website among its many uses.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Country<\\/span>\\u00a0refers to: California, United States<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Device<\\/span>\\u00a0means any device that can access the Service such as a computer, a cellphone or a digital tablet.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Personal Data<\\/span>\\u00a0is any information that relates to an identified or identifiable individual.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Service<\\/span>\\u00a0refers to the Website.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Service Provider<\\/span>\\u00a0means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Third-party Social Media Service<\\/span>\\u00a0refers to any website or any social network website through which a User can log in or create an account to use the Service.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Usage Data<\\/span>\\u00a0refers to data collected automatically, either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"color:rgb(0,0,0);font-weight:bolder;\\\">Website<\\/span><font color=\\\"#000000\\\">\\u00a0refers to Leads Paid, accessible from\\u00a0<\\/font><a href=\\\"https:\\/\\/www.leadspaid.com\\/\\\" title=\\\"Leadspaid\\\"><font color=\\\"#0066ff\\\">www.leadspaid.com<\\/font><\\/a><\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">You<\\/span>\\u00a0means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.<\\/p><\\/li><\\/ul><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Collecting and Using Your Personal Data<\\/h1><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Types of Data Collected<\\/h2><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Personal Data<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">While using Our Service, or while you fill out the registration forms of our Advertisers, You are asked to provide certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Email address<\\/li><li style=\\\"margin:0px 0px 16px;\\\">First name and last name \\/ Full Name<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Identity Card Number \\/ SSN \\/ EIN \\/ IC number<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Phone number \\/ Mobile Number<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Address, State, Province, ZIP\\/Postal code, City<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Income\\/ Spend\\/ Budget<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Usage Data<\\/li><\\/ul><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;text-align:left;\\\"><span style=\\\"color:rgb(0,0,0);font-size:24px;font-weight:700;font-family:Poppins, Arial, sans-serif;\\\">Usage Data<\\/span><br \\/><\\/div><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Usage Data is collected automatically when using the Service.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Usage Data may include information such as Your Device\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">When You access the Service by or through a mobile device, We may collect certain information automatically, including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique device identifiers and other diagnostic data.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We may also collect information that Your browser sends whenever You visit our Service or when You access the Service by or through a mobile device.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Information from Third-Party Social Media Services<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company allows You to create an account and log in to use the Service through the following Third-party Social Media Services:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Google<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Facebook<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Twitter<\\/li><li style=\\\"margin:0px 0px 16px;\\\">LinkedIn<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Others<\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">If You decide to register through or otherwise grant us access to a Third-Party Social Media Service, We may collect Personal data that is already associated with Your Third-Party Social Media Service\'s account, such as Your name, Your email address, Your activities or Your contact list associated with that account.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">You may also have the option of sharing additional information with the Company through Your Third-Party Social Media Service\'s account. If You choose to provide such information and Personal Data, during registration or otherwise, You are giving the Company permission to use, share, and store it in a manner consistent with this Privacy Policy.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Tracking Technologies and Cookies<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service. The technologies We use may include:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies or Browser Cookies.<\\/span>\\u00a0A cookie is a small file placed on Your Device. You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent. However, if You do not accept Cookies, You may not be able to use some parts of our Service. Unless you have adjusted Your browser setting so that it will refuse Cookies, our Service may use Cookies.<\\/li><li style=\\\"margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">Web Beacons.<\\/span>\\u00a0Certain sections of our Service and our emails may contain small electronic files known as web beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the Company, for example, to count users who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity).<\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Cookies can be \\\"Persistent\\\" or \\\"Session\\\" Cookies. Persistent Cookies remain on Your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close Your web browser.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We use both Session and Persistent Cookies for the purposes set out below:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Necessary \\/ Essential Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Session Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies Policy \\/ Notice Acceptance Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Persistent Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies identify if users have accepted the use of cookies on the Website.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Functionality Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Persistent Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.<\\/p><\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">For more information about the cookies we use and your choices regarding cookies, please visit our Cookies Policy or the Cookies section of our Privacy Policy.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Use of Your Personal Data<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company may use Personal Data for the following purposes:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To provide and maintain our Service<\\/span>, including to monitor the usage of our Service.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To manage Your Account:<\\/span>\\u00a0to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For the performance of a contract:<\\/span>\\u00a0the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To contact You:<\\/span>\\u00a0To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application\'s push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To provide You<\\/span>\\u00a0with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To manage Your requests:<\\/span>\\u00a0To attend and manage Your requests to Us.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For business transfers:<\\/span>\\u00a0We may use Your information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of Our assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by Us about our Service users is among the assets transferred.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For other purposes<\\/span>: We may use Your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Service, products, services, marketing and your experience.<\\/p><\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">We may share Your personal information in the following situations:<\\/span><\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;text-align:left;\\\"><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">With Service Providers:<\\/span>\\u00a0We may share Your personal information with Service Providers to monitor and analyze the use of our Service, to contact You.<\\/li><li style=\\\"margin:0px 0px 16px;\\\"><font face=\\\"Poppins, Arial, sans-serif\\\"><span style=\\\"font-weight:bolder;\\\">With Our Advertisers\\/ Publishers \\/ Clients and their associates:<\\/span>\\u00a0<\\/font><font color=\\\"#000000\\\" face=\\\"Poppins, Arial, sans-serif\\\">We may share Your information with our Advertisers\\/ Publishers \\/ Clients and their associates to offer You their products, services or promotions which you have registered for as well as Their other Offered products, services or promotions.<\\/font><br \\/><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">For business transfers:<\\/span>\\u00a0We may share or transfer Your personal information in connection with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a portion of Our business to another company.<\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">With Affiliates:<\\/span>\\u00a0We may share Your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other subsidiaries, joint venture partners or other companies that We control or that are under common control with Us.<\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">With business partners\\/ Allies:\\u00a0<\\/span>We may share Your information with Our business partners or Allies to offer You their products, services or promotions.<\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">With other users:<\\/span>\\u00a0when You share personal information or otherwise interact in the public areas with other users, such information may be viewed by all users and may be publicly distributed outside. If You interact with other users or register through a Third-Party Social Media Service, Your contacts on the Third-Party Social Media Service may see Your name, profile, pictures and description of Your activity. Similarly, other users will be able to view descriptions of Your activity, communicate with You and view Your profile.<\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"font-weight:bolder;\\\">With Your consent<\\/span>: We may disclose Your personal information for any other purpose with Your consent.<\\/li><\\/ul><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Retention of Your Personal Data<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of Our Service, or We are legally obligated to retain this data for longer time periods.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Helvetica, Arial, sans-serif;\\\">Transfer of Your Personal Data<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Your information, including Personal Data, is processed at the Company\'s operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to \\u2014 and maintained on \\u2014 computers located outside of Your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to that transfer.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company will take all steps reasonably necessary to ensure that Your data is treated securely and in accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of Your data and other personal information.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Delete Your Personal Data<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">You have the right to delete or request that We assist in deleting the Personal Data that We have collected about You.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Our Service may give You the ability to delete certain information about You from within the Service.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">You may update, amend, or delete Your information at any time by signing in to Your Account, if you have one, and visiting the account settings section that allows you to manage Your personal information. You may also contact Us to request access to, correct, or delete any personal information that You have provided to Us. However, the data we shared with Our Advertiers\\/ Clients\\/ Business Partners \\/ Allies \\/ Subsidaries and their associates are not deletable from our end. In order to have them deleted, or to stop them from contacting you, you may need to contact them directly.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Please note, however, that We may need to retain certain information when we have a legal obligation or lawful basis to do so.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Disclosure of Your Personal Data<\\/h2><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Business Transactions<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be transferred. We will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy Policy.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Law enforcement<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Under certain circumstances, the Company may be required to disclose Your Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Other legal requirements<\\/h3><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The Company may disclose Your Personal Data in the good faith belief that such action is necessary to:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-size:16px;text-align:left;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Comply with a legal obligation<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect and defend the rights or property of the Company<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Prevent or investigate possible wrongdoing in connection with the Service<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect the personal safety of Users of the Service or the public<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect against legal liability<\\/li><\\/ul><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Security of Your Personal Data<\\/h2><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Children\'s Privacy<\\/h1><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us. If We become aware that We have collected Personal Data from anyone under the age of 13 without verification of parental consent, We take steps to remove that information from Our servers.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">If We need to rely on consent as a legal basis for processing Your information and Your country requires consent from a parent, We may require Your parent\'s consent before We collect and use that information.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Links to Other Websites<\\/h1><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">Our Service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party\'s site. We strongly advise You to review the Privacy Policy of every site You visit.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Changes to this Terms of Use<\\/h1><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">We may update Our Terms of Use from time to time. We will notify You of any changes by posting the new Terms of Use on this page.\\u00a0<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">You are advised to review this Terms of Use periodically for any changes. Changes to this Terms of Use are effective when they are posted on this page.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Contact Us<\\/h1><h3 class=\\\"title\\\" style=\\\"text-align:justify;line-height:1.3;font-size:24px;font-family:Heebo, sans-serif;color:rgb(4,34,60);\\\"><\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;text-align:left;font-family:Poppins, Arial, sans-serif;\\\">If you have any questions about this Terms of Use, You can contact us:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;text-align:left;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><font color=\\\"#000000\\\" face=\\\"Poppins, Arial, sans-serif\\\">By visiting this page on our website:\\u00a0<\\/font><font face=\\\"Poppins, Arial, sans-serif\\\" color=\\\"#0066ff\\\"><a href=\\\"https:\\/\\/leadspaid.com\\/contact-us\\\" title=\\\"Contact Us\\\" style=\\\"color:rgb(0,102,255);\\\">www.leadspaid.com\\/contact-us<\\/a><\\/font><\\/li><\\/ul><\\/div>\"}', '2021-02-02 04:51:58', '2023-01-17 19:14:15'),
(135, 'login.content', '{\"has_image\":\"1\",\"background_image\":\"604c4097b3e5d1615610007.jpg\"}', '2021-03-09 02:26:25', '2021-03-12 22:33:28');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(137, 'policy.element', '{\"heading\":\"Privacy Policy\",\"content\":\"<h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Privacy Policy<\\/h1><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><\\/h1><p style=\\\"margin-top:15px;margin-bottom:16px;color:rgb(0,0,0);font-size:40px;line-height:60px;font-weight:700;font-family:Poppins, Arial, sans-serif;\\\"><span style=\\\"color:rgb(0,0,0);font-size:16px;font-weight:400;\\\">Last updated: November 28, 2022<\\/span><br \\/><\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.\\u00a0<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Interpretation and Definitions<\\/h1><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Interpretation<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Definitions<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">For the purposes of this Privacy Policy:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Account<\\/span>\\u00a0means a unique account created for You to access our Service or parts of our Service.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><b>Company <\\/b>(referred to as either \\\"the Company\\\", \\\"We\\\", \\\"Us\\\" or \\\"Our\\\" in this Agreement) refers to Leads Paid Inc., its\' employees, subsidiaries, business partners, allies, etc. associated with Leads Paid Inc., 5214F Diamond Heights Blvd, San Francisco, California 94131, United States.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies<\\/span>\\u00a0are small files that are placed on Your computer, mobile device or any other device by a website, containing the details of Your browsing history on that website among its many uses.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Country<\\/span>\\u00a0refers to: California, United States<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Device<\\/span>\\u00a0means any device that can access the Service such as a computer, a cellphone or a digital tablet.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Personal Data<\\/span>\\u00a0is any information that relates to an identified or identifiable individual.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Service<\\/span>\\u00a0refers to the Website.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Service Provider<\\/span>\\u00a0means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Third-party Social Media Service<\\/span>\\u00a0refers to any website or any social network website through which a User can log in or create an account to use the Service.<\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Usage Data<\\/span>\\u00a0refers to data collected automatically, either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"color:rgb(0,0,0);font-weight:bolder;\\\">Website<\\/span><font color=\\\"#000000\\\">\\u00a0refers to Leads Paid, accessible from\\u00a0<\\/font><a href=\\\"https:\\/\\/www.leadspaid.com\\/\\\" title=\\\"Leadspaid\\\"><font color=\\\"#0066ff\\\">www.leadspaid.com<\\/font><\\/a><\\/p><\\/li><li style=\\\"color:rgb(0,0,0);margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">You<\\/span>\\u00a0means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.<\\/p><\\/li><\\/ul><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Collecting and Using Your Personal Data<\\/h1><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Types of Data Collected<\\/h2><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Personal Data<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">While using Our Service, or while you fill out the registration forms of our Advertisers, You are asked to provide certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:<\\/p><ul style=\\\"padding-left:2rem;margin-bottom:1rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Email address<\\/li><li style=\\\"margin:0px 0px 16px;\\\">First name and last name \\/ Full Name<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Identity Card Number \\/ SSN \\/ EIN \\/ IC number<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Phone number \\/ Mobile Number<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Address, State, Province, ZIP\\/Postal code, City<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Income\\/ Spend\\/ Budget<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Usage Data<\\/li><\\/ul><div><span style=\\\"color:rgb(0,0,0);font-size:24px;font-weight:700;font-family:Poppins, Arial, sans-serif;\\\">Usage Data<\\/span><br \\/><\\/div><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Usage Data is collected automatically when using the Service.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Usage Data may include information such as Your Device\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">When You access the Service by or through a mobile device, We may collect certain information automatically, including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique device identifiers and other diagnostic data.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We may also collect information that Your browser sends whenever You visit our Service or when You access the Service by or through a mobile device.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Information from Third-Party Social Media Services<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company allows You to create an account and log in to use the Service through the following Third-party Social Media Services:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Google<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Facebook<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Twitter<\\/li><li style=\\\"margin:0px 0px 16px;\\\">LinkedIn<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Others<\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">If You decide to register through or otherwise grant us access to a Third-Party Social Media Service, We may collect Personal data that is already associated with Your Third-Party Social Media Service\'s account, such as Your name, Your email address, Your activities or Your contact list associated with that account.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">You may also have the option of sharing additional information with the Company through Your Third-Party Social Media Service\'s account. If You choose to provide such information and Personal Data, during registration or otherwise, You are giving the Company permission to use, share, and store it in a manner consistent with this Privacy Policy.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Tracking Technologies and Cookies<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service. The technologies We use may include:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies or Browser Cookies.<\\/span>\\u00a0A cookie is a small file placed on Your Device. You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent. However, if You do not accept Cookies, You may not be able to use some parts of our Service. Unless you have adjusted Your browser setting so that it will refuse Cookies, our Service may use Cookies.<\\/li><li style=\\\"margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">Web Beacons.<\\/span>\\u00a0Certain sections of our Service and our emails may contain small electronic files known as web beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the Company, for example, to count users who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity).<\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Cookies can be \\\"Persistent\\\" or \\\"Session\\\" Cookies. Persistent Cookies remain on Your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close Your web browser.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We use both Session and Persistent Cookies for the purposes set out below:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Necessary \\/ Essential Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Session Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Cookies Policy \\/ Notice Acceptance Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Persistent Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies identify if users have accepted the use of cookies on the Website.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">Functionality Cookies<\\/span><\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Type: Persistent Cookies<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Administered by: Us<\\/p><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\">Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.<\\/p><\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">For more information about the cookies we use and your choices regarding cookies, please visit our Cookies Policy or the Cookies section of our Privacy Policy.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Use of Your Personal Data<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company may use Personal Data for the following purposes:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To provide and maintain our Service<\\/span>, including to monitor the usage of our Service.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To manage Your Account:<\\/span>\\u00a0to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For the performance of a contract:<\\/span>\\u00a0the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To contact You:<\\/span>\\u00a0To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application\'s push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To provide You<\\/span>\\u00a0with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">To manage Your requests:<\\/span>\\u00a0To attend and manage Your requests to Us.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For business transfers:<\\/span>\\u00a0We may use Your information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of Our assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by Us about our Service users is among the assets transferred.<\\/p><\\/li><li style=\\\"margin:0px 0px 16px;\\\"><p style=\\\"margin:15px 0px 16px;font-family:Poppins;\\\"><span style=\\\"font-weight:bolder;\\\">For other purposes<\\/span>: We may use Your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Service, products, services, marketing and your experience.<\\/p><\\/li><\\/ul><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\"><b>We may share Your personal information in the following situations:<\\/b><\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;\\\"><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">With Service Providers:<\\/span>\\u00a0We may share Your personal information with Service Providers to monitor and analyze the use of our Service, to contact You.<\\/li><li style=\\\"margin:0px 0px 16px;\\\"><font face=\\\"Poppins, Arial, sans-serif\\\"><b>With Our Advertisers\\/ Publishers \\/ Clients and their associates:<\\/b>\\u00a0<\\/font><font color=\\\"#000000\\\" face=\\\"Poppins, Arial, sans-serif\\\">We may share Your information with our Advertisers\\/ Publishers \\/ Clients and their associates to offer You their products, services or promotions which you have registered for as well as Their other Offered products, services or promotions.<\\/font><br \\/><\\/li><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">For business transfers:<\\/span>\\u00a0We may share or transfer Your personal information in connection with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a portion of Our business to another company.<\\/li><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">With Affiliates:<\\/span>\\u00a0We may share Your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other subsidiaries, joint venture partners or other companies that We control or that are under common control with Us.<\\/li><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><b>With business partners\\/ Allies: <\\/b>We may share Your information with Our business partners or Allies to offer You their products, services or promotions.<\\/li><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">With other users:<\\/span>\\u00a0when You share personal information or otherwise interact in the public areas with other users, such information may be viewed by all users and may be publicly distributed outside. If You interact with other users or register through a Third-Party Social Media Service, Your contacts on the Third-Party Social Media Service may see Your name, profile, pictures and description of Your activity. Similarly, other users will be able to view descriptions of Your activity, communicate with You and view Your profile.<\\/li><li style=\\\"color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;margin:0px 0px 16px;\\\"><span style=\\\"font-weight:bolder;\\\">With Your consent<\\/span>: We may disclose Your personal information for any other purpose with Your consent.<\\/li><\\/ul><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Retention of Your Personal Data<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of Our Service, or We are legally obligated to retain this data for longer time periods.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Helvetica, Arial, sans-serif;\\\">Transfer of Your Personal Data<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Your information, including Personal Data, is processed at the Company\'s operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to \\u2014 and maintained on \\u2014 computers located outside of Your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to that transfer.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company will take all steps reasonably necessary to ensure that Your data is treated securely and in accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of Your data and other personal information.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Delete Your Personal Data<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">You have the right to delete or request that We assist in deleting the Personal Data that We have collected about You.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Our Service may give You the ability to delete certain information about You from within the Service.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">You may update, amend, or delete Your information at any time by signing in to Your Account, if you have one, and visiting the account settings section that allows you to manage Your personal information. You may also contact Us to request access to, correct, or delete any personal information that You have provided to Us. However, the data we shared already with our Advertisers\\/ Clients\\/ Business Partners \\/ Allies \\/ Subsidiaries and their associates are not removable from our end. In order to have them deleted, or to stop them from contacting you, you may need to contact them directly.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Please note, however, that We may need to retain certain information when we have a legal obligation or lawful basis to do so.<\\/p><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Disclosure of Your Personal Data<\\/h2><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Business Transactions<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be transferred. We will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy Policy.<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Law enforcement<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Under certain circumstances, the Company may be required to disclose Your Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).<\\/p><h3 style=\\\"margin-bottom:16px;font-weight:700;line-height:36px;font-size:24px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Other legal requirements<\\/h3><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The Company may disclose Your Personal Data in the good faith belief that such action is necessary to:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\"><li style=\\\"margin:0px 0px 16px;\\\">Comply with a legal obligation<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect and defend the rights or property of the Company<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Prevent or investigate possible wrongdoing in connection with the Service<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect the personal safety of Users of the Service or the public<\\/li><li style=\\\"margin:0px 0px 16px;\\\">Protect against legal liability<\\/li><\\/ul><h2 style=\\\"margin-bottom:16px;font-weight:700;line-height:48px;font-size:32px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Security of Your Personal Data<\\/h2><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Children\'s Privacy<\\/h1><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us. If We become aware that We have collected Personal Data from anyone under the age of 13 without verification of parental consent, We take steps to remove that information from Our servers.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">If We need to rely on consent as a legal basis for processing Your information and Your country requires consent from a parent, We may require Your parent\'s consent before We collect and use that information.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Links to Other Websites<\\/h1><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">Our Service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party\'s site. We strongly advise You to review the Privacy Policy of every site You visit.<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Changes to this Privacy Policy<\\/h1><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">We may update Our Privacy Policy from time to time. We will notify You of any changes by posting the new Privacy Policy on this page.\\u00a0<\\/p><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.<\\/p><h1 style=\\\"margin-bottom:16px;font-weight:700;line-height:60px;font-size:40px;color:rgb(0,0,0);font-family:Poppins, Arial, sans-serif;\\\">Contact Us<\\/h1><p style=\\\"margin:15px 0px 16px;color:rgb(0,0,0);font-size:16px;font-family:Poppins, Arial, sans-serif;\\\">If you have any questions about this Privacy Policy, You can contact us:<\\/p><ul style=\\\"margin-bottom:1rem;padding-left:2rem;\\\"><li style=\\\"margin:0px 0px 16px;\\\"><font color=\\\"#000000\\\" face=\\\"Poppins, Arial, sans-serif\\\">By visiting this page on our website:\\u00a0<\\/font><font face=\\\"Poppins, Arial, sans-serif\\\" color=\\\"#0066ff\\\"><a href=\\\"https:\\/\\/leadspaid.com\\/contact-us\\\" title=\\\"Contact Us\\\" style=\\\"color:rgb(0,102,255);\\\">www.leadspaid.com\\/contact-us<\\/a><\\/font><br \\/><\\/li><\\/ul>\"}', '2022-12-27 09:23:13', '2023-01-20 06:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci,
  `crypto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `input_form` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `alias`, `image`, `name`, `status`, `parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'paypal', '5f6f1bd8678601601117144.jpg', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"paypal@user.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-03-07 23:14:17'),
(2, 102, 'perfect_money', '5f6f1d2a742211601117482.jpg', 'Perfect Money', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:46'),
(3, 103, 'stripe', '635fe15d8d62b1667227997.jpg', 'Stripe Hosted', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51LxkDULvd118Nt67IsHnXUynnSstWBVbhSm67wEe41MsB8o9YFh1wufFd1mIdIlUXE0yYRSMtpQEaLr7kbET6DTh00s5HUkD2o\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51LxkDULvd118Nt675hqLxDaSGCqf9Q2SZ8PjxCItua0oKNEqe9LUNRsc1dLLRN67ZjkCZpB89009HurpY8kyiVBq00vkeV3jNn\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2022-10-31 14:53:17'),
(4, 104, 'skrill', '5f6f1d41257181601117505.jpg', 'Skrill', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:52'),
(5, 105, 'paytm', '5f6f1d1d3ec731601117469.jpg', 'PayTM', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:54'),
(6, 106, 'payeer', '5f6f1bc61518b1601117126.jpg', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:58'),
(7, 107, 'paystack', '5f7096563dfb71601214038.jpg', 'PayStack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:25:38'),
(8, 108, 'voguepay', '5f6f1d5951a111601117529.jpg', 'VoguePay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:52:09'),
(9, 109, 'flutterwave', '5f6f1b9e4bb961601117086.jpg', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"FLWPUBK_TEST-5d9bb05\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"FLWSECK_TEST-2ac7b05b6b9fa\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"FLWSECK_T\"}}', '{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-24 05:55:42'),
(10, 110, 'razorpay', '5f6f1d3672dd61601117494.jpg', 'RazorPay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:34'),
(11, 111, 'stripe_js', '5f7096a31ed9a1601214115.jpg', 'Stripe Storefront', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:20'),
(12, 112, 'instamojo', '5f6f1babbdbb31601117099.jpg', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:59'),
(13, 501, 'blockchain', '5f6f1b2b20c6f1601116971.jpg', 'Blockchain', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:42:51'),
(14, 502, 'blockio', '606af39e08e691617621918.jpg', 'Block.io', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"covidvai2020\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-04-05 05:25:18'),
(15, 503, 'coinpayments', '5f6f1b6c02ecd1601117036.jpg', 'CoinPayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-04-06 06:44:49'),
(16, 504, 'coinpayments_fiat', '5f6f1b94e9b2b1601117076.jpg', 'CoinPayments Fiat', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:17:29'),
(17, 505, 'coingate', '5f6f1b5fe18ee1601117023.jpg', 'Coingate', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:44'),
(18, 506, 'coinbase_commerce', '5f6f1b4c774af1601117004.jpg', 'Coinbase Commerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.coinbase_commerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:24'),
(24, 113, 'paypal_sdk', '5f6f1bec255c61601117164.jpg', 'Paypal Express', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-31 23:50:27'),
(25, 114, 'stripe_v3', '5f709684736321601214084.jpg', 'Stripe Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"w5555\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.stripe_v3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:14'),
(27, 115, 'mollie', '5f6f1bb765ab11601117111.jpg', 'Mollie', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"admin@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-24 05:55:11'),
(30, 116, 'cashmaal', '5f9a8b62bb4dd1603963746.png', 'Cashmaal', 1, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.cashmaal\"}}', NULL, NULL, NULL, '2020-10-29 03:29:06'),
(31, 1000, 'na', '', 'NA', 0, '[]', '[]', 0, NULL, '<br>', '[]', '2022-11-01 12:29:08', '2022-11-01 12:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT '0.00',
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(1, 'NA', 'SGD', '', 1000, 'na', '0.01000000', '10000000.00000000', '0.00', '0.00000000', '1.00000000', '', '[]', '2022-11-01 12:29:08', '2022-11-01 12:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci COMMENT 'email configuration',
  `ev` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'sms notification, 0 - dont send, 1 - send',
  `registration` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Off	, 1: On',
  `social_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'social login',
  `social_credential` text COLLATE utf8mb4_unicode_ci,
  `active_template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cpc` decimal(18,8) DEFAULT NULL,
  `cpm` decimal(18,8) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_approval` int(1) DEFAULT NULL,
  `intervals` int(11) NOT NULL DEFAULT '0',
  `location_api` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_api`, `base_color`, `secondary_color`, `mail_config`, `ev`, `en`, `sv`, `sn`, `registration`, `social_login`, `social_credential`, `active_template`, `sys_version`, `created_at`, `updated_at`, `cpc`, `cpm`, `address`, `email`, `phone`, `domain_approval`, `intervals`, `location_api`) VALUES
(1, 'LeadsPaid', 'USD', '$', 'support@leadspaid.com', '<table style=\"color: rgb(0, 0, 0); font-family: Roboto,Helvetica,Arial,sans-serif,&quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #fff; text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#fff\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img style=\"font-size: 0pt; text-align: left;\"><img src=\"https://leadspaid.com/assets/templates/leadpaid/images/logo-18-b-rectangle-60-2-wide-1.png\" style=\"height: 240 !important;width: 338px;margin-bottom: 20px;\"><img style=\"font-size: 0pt; text-align: left;\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 1px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 10px 10px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: \'Roboto\', Helvetica, sans-serif, \'Open Sans\', Arial; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: \'Roboto\', Helvetica, sans-serif, \'Open Sans\', Arial; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 20px 30px; border-radius: 0px 0px 10px 10px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: #fff; font-family: \'Roboto\', Helvetica, sans-serif, \'Open Sans\', Arial; font-size: 16px; line-height: 30px; text-align: center; padding-bottom: 10px;\">\r\n\r\n\r\n<p style=\"font-size:12px;color:#5b6e88\">If you believe you have received this email in error, please <a href=\"https://www.leadspaid.com/contact-us\" style=\"font-size:12px;color:#5b6e88;text-decoration:underline\">contact us</a>.</p>\r\nCopyright © 2023 Leads Paid Inc. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'https://api.infobip.com/api/v3/sendsms/plain?user=demo&password=demo&sender=SiteName&SMSText={{message}}&GSM={{number}}&type=longSMS', '1361b2', '062c4e', '{\"name\":\"sendgrid\",\"appkey\":\"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\"}', 0, 1, 0, 1, 1, 0, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'basic', NULL, NULL, '2023-01-18 07:15:19', '0.04000000', '0.02000000', 'demo address', 'arun.saba@leadspaid.com', '+00 6589182179', 0, 30, '8f0bb301ef5613');

-- --------------------------------------------------------

--
-- Table structure for table `ip_charts`
--

CREATE TABLE `ip_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked` int(1) NOT NULL DEFAULT '0' COMMENT '0 => not blocked, 1 => blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_logs`
--

CREATE TABLE `ip_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'passport', '2022-11-16 10:33:33', '2022-11-16 10:33:33'),
(2, 'visa', '2022-11-16 10:33:33', '2022-11-16 10:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2020-07-21 04:05:19'),
(5, 'Spanish', 'spanish', NULL, 0, 0, '2021-04-06 07:01:40', '2021-04-06 07:01:40'),
(6, 'Hindi', 'hindi', NULL, 0, 0, '2021-04-06 07:21:08', '2021-04-06 07:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `lgen_spend`
--

CREATE TABLE `lgen_spend` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `lgen_date` date NOT NULL,
  `lgen_source` varchar(255) DEFAULT NULL,
  `lgen_medium` varchar(25) DEFAULT NULL,
  `lgen_campaign` text,
  `cost` decimal(11,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lgen_spend`
--

INSERT INTO `lgen_spend` (`id`, `campaign_id`, `lgen_date`, `lgen_source`, `lgen_medium`, `lgen_campaign`, `cost`, `created_at`, `updated_at`) VALUES
(1, 46, '2023-01-19', NULL, NULL, NULL, '27.00', NULL, NULL),
(2, 24, '2022-12-26', NULL, NULL, NULL, '26.00', NULL, NULL),
(3, 47, '2023-01-10', NULL, NULL, NULL, '0.50', NULL, NULL),
(4, 24, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(5, 24, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(6, 22, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(7, 22, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(8, 24, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(9, 22, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL),
(10, 24, '2022-12-26', NULL, NULL, NULL, '26.50', NULL, NULL);

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
(1, '2022_11_06_063131_create_campaigns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci,
  `is_default` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"features\",\"format\",\"benefits\",\"overview\",\"whychooseUs\",\"testimonial\",\"brands\"]', 1, '2020-07-11 06:23:58', '2021-01-28 02:49:11');

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
-- Table structure for table `price_plans`
--

CREATE TABLE `price_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_plans`
--

INSERT INTO `price_plans` (`id`, `name`, `price`, `type`, `credit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'plan1', '100.00000000', 'click', 100, 1, '2022-11-01 13:00:15', '2022-11-01 13:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0:normal, 1: publisher_admin, 2:campaign_manager, 3:campaign_executive',
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `earnings` decimal(18,8) DEFAULT '0.00000000',
  `status` int(11) DEFAULT NULL COMMENT '1 = active, 2 = banned, 0 = deactive,',
  `total_imp` int(11) DEFAULT NULL,
  `total_click` int(11) DEFAULT NULL,
  `ev` int(11) DEFAULT NULL,
  `sv` int(11) DEFAULT NULL,
  `ts` int(11) DEFAULT NULL,
  `tv` int(11) DEFAULT NULL,
  `tsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver_code_send_at` datetime DEFAULT NULL,
  `app_methods` text COLLATE utf8mb4_unicode_ci,
  `website` text COLLATE utf8mb4_unicode_ci,
  `apps` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`role`, `id`, `name`, `email`, `username`, `image`, `country`, `city`, `company_name`, `postal_code`, `phone`, `country_code`, `password`, `earnings`, `status`, `total_imp`, `total_click`, `ev`, `sv`, `ts`, `tv`, `tsc`, `ver_code`, `ver_code_send_at`, `app_methods`, `website`, `apps`, `created_at`, `updated_at`) VALUES
(0, 1, 'Publisher K', 'publisher1@gmail.com', 'publisher', NULL, 'Bangladesh', 'Acca', NULL, '', '8805464564564564', '', '$2y$10$CBEKYbbiooWrFrJuU3kIn.sGnBb3PqR5kfYztG36OUWT.I.VrRZpC', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 14:12:32', '2022-11-27 10:22:26'),
(0, 2, 'MD BAHA UDDIN', 'nicesoftwarebd@gmail.com', 'publisher21', NULL, 'Bangladesh', 'Moulvibazar', 'ytwedsf', '788719', '88001300676724', '880', '$2y$10$XpVrEndENSVql9o/WBqCau0xWcIJy0zzBjTpbekLbtVEakK4H5q.G', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 17:13:51', '2023-01-14 16:18:30'),
(1, 3, 'Publisher Admin One', 'publisheradmin1@leadspaid.com', 'publisheradmin1@leadspaid.com', '63c96e9f3602f1674145439.png', 'Singapore', 'Singapore', 'Premium Leads Pte. Ltd.', '332038', '6584578616', '65', '$2y$10$DiXlvY.5KIKO8mDdSZAxJOlydbsJ1Lc3Nw5Mvj5PKoFLast.EEYVW', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 08:01:42', '2023-02-03 09:40:53'),
(1, 5, 'Tejinder Singh', 'tejinder.email@leadspaid.com', 'tejinder.email@leadspaid.com', NULL, 'India', 'Patiala', 'Tejinder Singh', '147001', '919023412334', '91', '$2y$10$DiXlvY.5KIKO8mDdSZAxJOlydbsJ1Lc3Nw5Mvj5PKoFLast.EEYVW', '0.00000000', 0, NULL, NULL, 1, 1, 0, 1, NULL, '173157', '2022-12-07 14:22:32', NULL, NULL, NULL, '2022-11-27 07:00:20', '2023-01-30 04:09:16'),
(2, 6, 'Campaign Manager1', 'campaignmanager1@leadspaid.com', 'campaignmanager1@leadspaid.com', NULL, 'Singapore', 'Singapore', 'Premium Leads Pte. Ltd.', '332038', '6584578616', '65', '$2y$10$DiXlvY.5KIKO8mDdSZAxJOlydbsJ1Lc3Nw5Mvj5PKoFLast.EEYVW', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 08:01:42', '2022-12-01 08:53:23'),
(2, 7, 'Saurav', 'tester@gmail.com', '', NULL, 'Armenia', '', 'Web', '', '5646546464556', '+1', '$2y$10$wlnFZJ9BEjI6PgzAJnhOAedKvbQPW4UOtTUSiat0bwpTL7u4xZ6x.', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-17 14:03:42', '2023-01-17 14:03:42'),
(1, 9, 'SauravKumar', 'saurav2@leadspaid.com', 'saurav2@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '89182179', '+65', '$2y$10$5bilXiQSWVgUjYUrqcU80eHw9nzcjNLRkcUsdfWPx4s0WVg5BtF1C', '0.00000000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 07:23:13', '2023-01-27 06:15:28'),
(2, 10, 'Kumar', 'tester123@gmail.com', 'tester123@gmail.com', NULL, 'India', '', 'Leads Paid Inc.', '', '454566', '+65', '$2y$10$oTgHwWH1C2cSeNbkxl4iUuHaDv7fLd7NnbON8jg8hIzE0RaA7Xf4W', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 07:25:27', '2023-01-18 07:25:27'),
(2, 12, 'Demo Test', 'demotest12@gmail.com', 'demotest12@gmail.com', NULL, 'India', '', 'Leads Paid Inc.', '', '212121212121212121212121', '+65', '$2y$10$5YJ3HS/XWsWKYuHpjvYFS.cW23t1JmGTQoekFuUNVpPVDC0./VofO', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 12:20:58', '2023-01-18 12:20:58'),
(3, 13, 'Demo User', 'userdemo@gmail.com', 'userdemo@gmail.com', NULL, 'Serbia', '', 'Leads Paid Inc.', '', '9875848855458645646', '+65', '$2y$10$l9kfl8AUU671sDpD0tHmTOckvod/Hi2aAv1s1528GzjxyQBEaU4Nu', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 12:21:58', '2023-01-18 12:21:58'),
(0, 14, 'Normal User', 'demonoramal@gmail.com', 'demonoramal@gmail.com', NULL, 'Samoa', '', 'Leads Paid Inc.', '', '5646548215864', '+65', '$2y$10$E8supZdlTGE49r6kRTZaKe3i1JkG602rZFpgL0sos/hQ1fRk/xzTu', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 12:22:48', '2023-01-18 12:22:48'),
(0, 15, 'Adr', 'ads1@leadspaid.com', 'ads1@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '123456', '+65', '$2y$10$7lJaoiGDfnGddHgHnNW9SeB9sNgqLDg9OenWMqq7JF5tHnW4OFhdK', '0.00000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 06:47:57', '2023-01-19 06:47:57'),
(2, 17, 'Custom User', 'codercustom@gmail.com', 'codercustom@gmail.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '2131321321', '+65', '$2y$10$QkxLkr1ZB8Jt7S3js/PF6uU9XuvVXDPvjw0MbSaq6sidnXiuwwWOO', '0.00000000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 12:55:49', '2023-01-19 13:22:49'),
(1, 19, 'Google Adsa', 'googleads1@leadspaid.com', 'googleads1@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '891821795', '+65', '$2y$10$tj00ZdNwGVYU.R8pLg6uveByJG8tNsf0RQ43.1QwcVnJ0Z7Jp0GLq', '0.00000000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 04:08:17', '2023-01-22 04:53:53'),
(1, 20, 'Google Ads', 'test1@arunsaba.com', 'test1@arunsaba.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '89182179', '+65', '$2y$10$qCyx1Y45FNK6n2/GI4xzBOS1eJcFExoV72wozYLLm1Xg45mh2nYQe', '0.00000000', 0, NULL, NULL, 1, NULL, NULL, 1, NULL, '901379', '2023-01-20 04:14:02', NULL, NULL, NULL, '2023-01-20 04:11:31', '2023-01-27 06:15:35'),
(3, 21, 'Testeerr', 'customcoder345@gmail.com', 'customcoder345@gmail.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '123456', '+65', '$2y$10$yMFWY5Hx5tMYT1f/DKmEh.P9UFAgjO4aH6O5Q/9N4lZeOQAhWozPW', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 04:48:44', '2023-01-22 04:53:51'),
(1, 22, 'Testdsfd', 'testerr@leadspaid.com', 'testerr@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '123456', '+65', '$2y$10$zSY3jx2nWBEm6cQQkX6Xhe9SNWOID4zYPS1x24KoXcFEiPv6jHvye', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 05:18:16', '2023-01-22 04:53:56'),
(1, 23, 'Test', 'test11@leadspaid.com', 'test11@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$lq.qTXHZbGkrCJlIW3TNSufRQ6646D8I5/0bn/B.p5wkEfFPlPoZi', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 06:06:00', '2023-01-26 08:12:48'),
(1, 24, 'Test', 'test11@arunsaba.com', 'test11@arunsaba.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$LnNX2ajXR1h2FwxQQtOxzeMmaXFeo7DVTVw/2FbihvfzeSJLGSBnG', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 06:11:45', '2023-01-26 08:12:46'),
(1, 25, 'Google Ads', 'test56@leadspaid.com', 'test56@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$hyk7iMUVrjT.zMmTuAnR6O9YK0HL7cOQpuj5hcwpktnzA3YhHq01G', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 08:15:53', '2023-01-22 04:53:58'),
(1, 26, 'Test', 'test67@arunsaba.com', 'test67@arunsaba.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$RMYW5HUs2sPmxSmTeWGCwOui6aVa.h06nVxpsMRZAK5kf6D9vqeom', '0.00000000', 0, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 10:35:15', '2023-01-22 04:54:00'),
(2, 27, 'Custom Coder', 'customcoder245@gmail.com', 'customcoder245@gmail.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '98575555', '+65', '$2y$10$SQEpDjJW5kSpO0A3WzQVhuKNqMMGRdYGLlIoEIaJl/nGVXkgQmdmO', '0.00000000', 1, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 11:15:36', '2023-01-20 11:29:16'),
(0, 28, 'Tejinder Singh', 'tejinder.email@gmail.com', 'tejinder.email', NULL, 'United States', '', 'Hero', '', '91123345', '+91', '$2y$10$JNUj/XDWK4JGEkfI2FyFbucqSMdxkt0QdAP6/rc2iCCUe5PC3TjKy', '0.00000000', 0, NULL, NULL, 1, 1, 0, 0, NULL, '497755', '2023-01-21 17:43:39', 'Lead Generation InformationLead Generation InformationLead Generation Information', 'web', 'app app app', '2023-01-21 17:40:32', '2023-01-21 17:43:39'),
(0, 29, 'Test', 'publisher1@arunsaba.com', 'publisher1', NULL, 'Argentina', '', 'Test', '', '13534543534', '+1', '$2y$10$x1ogSKktS7v02ZtRPg1xZeXsu1NQ.zFgqtkH/YXI7Sa/9f0Mo6jvu', '0.00000000', 0, NULL, NULL, 1, 1, 0, 0, NULL, '636839', '2023-01-23 05:34:03', NULL, NULL, NULL, '2023-01-23 05:33:24', '2023-01-23 05:34:03'),
(1, 30, 'Google Ads', 'arun3@leadspaid.com', 'arun3@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$yfJFJ26LgKHaW.mmhS6uTOJ3dpzixgmV6/nT0uHItWxdnaQ1B1.ce', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-23 10:36:42', '2023-01-23 10:36:42'),
(1, 31, 'Dgs G Ggg', 'specific5@leadspaid.com', 'specific5@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909011', '+65', '$2y$10$SG546xSYTSq4.FehuiGh7uX/OcUEtHiuJVYIyMo7g8HiIsm6KOke6', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-23 11:13:06', '2023-01-23 11:13:06'),
(1, 32, 'Google Ads', 'babyson@leadspaid.com', 'babyson@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90i09090', '+65', '$2y$10$gfzD0O/fjGlavyFuiUfIduFB3CUXl5NX3JFM0a6VR0aP1caJopfLW', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-23 11:16:54', '2023-01-23 11:16:54'),
(1, 33, 'Test', 'test66@leadspaid.com', 'test66@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909000', '+65', '$2y$10$74ETaKtbNfD1TonxMnLy0.JbVWdi9LDtEAbyapS9aJaleqzTD./.y', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-25 03:50:58', '2023-01-25 03:50:58'),
(1, 34, 'Google Ads', 'arrrr@arunsaba.com', 'arrrr@arunsaba.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$ZTANp1lKhppBGIXdASTAVuUYnzRRfyVrPf5Aa4Z23MrE.WqrLD7IO', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-25 03:52:24', '2023-01-25 03:52:24'),
(1, 35, 'Google Ads', 'info@leadspaid.com', 'info@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$Dl1o3tX9YMF1vYUyWomyp.hkoG5f6IaOXGPY4IPAFErrLb7.ElWRi', '0.00000000', 3, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-25 03:55:32', '2023-01-25 03:55:32'),
(3, 36, 'Cea', 'ce@leadspaid.com', 'ce@leadspaid.com', NULL, 'Singapore', '', 'Leads Paid Inc.', '', '90909090', '+65', '$2y$10$hEMkki3Fw/u1ErxAJyrTvup0EkmYKlhtr2Vtnz1tBoXonphob5y5a', '0.00000000', 1, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 10:29:21', '2023-02-03 10:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_ads`
--

CREATE TABLE `publisher_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `advertiser_id` int(11) DEFAULT NULL,
  `create_ad_id` int(11) NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `imp_count` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publisher_advertiser`
--

CREATE TABLE `publisher_advertiser` (
  `id` int(11) NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `ad_network` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publisher_advertiser`
--

INSERT INTO `publisher_advertiser` (`id`, `advertiser_id`, `publisher_id`, `ad_network`, `created_at`, `updated_at`) VALUES
(13, 69, 3, '{\"ad_1\":{\"network\":\"ad net 1\",\"url\":\"adurl 1\",\"id\":\"ad 1\",\"password\":\"pass 1\",\"remarks\":\"this re 1\"},\"ad_2\":{\"network\":\"ghgfh\",\"url\":\"ghfghfgh\",\"id\":\"21\",\"password\":null,\"remarks\":null},\"ad_3\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_4\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_5\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_6\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null}}', '2023-01-14 18:43:28', '2023-01-18 15:04:59'),
(14, 73, 6, '{\"ad_1\":{\"network\":\"Google\",\"url\":\"https:\\/\\/ads.google.com\\/\",\"id\":\"marketing@a1-immigration.net\",\"password\":\"A34567\",\"remarks\":null},\"ad_2\":{\"network\":\"B1\",\"url\":\"B2\",\"id\":\"B3\",\"password\":\"B4\",\"remarks\":\"B5\"},\"ad_3\":{\"network\":\"C\",\"url\":\"D\",\"id\":null,\"password\":null,\"remarks\":null},\"ad_4\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_5\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_6\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null}}', '2023-01-16 17:02:55', '2023-02-04 03:50:42'),
(15, 78, 3, '{\"ad_1\":{\"network\":\"AA\",\"url\":\"AA1\",\"id\":\"aa2\",\"password\":\"aa3\",\"remarks\":\"aa4\"},\"ad_2\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_3\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_4\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_5\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null},\"ad_6\":{\"network\":null,\"url\":null,\"id\":null,\"password\":null,\"remarks\":null}}', '2023-01-18 15:06:17', '2023-01-18 15:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_password_resets`
--

CREATE TABLE `publisher_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(11) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_attachments`
--

INSERT INTO `support_attachments` (`id`, `support_message_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 6, '63c245247daac1673676068.png', '2023-01-14 06:01:08', '2023-01-14 06:01:08'),
(2, 8, '63dcc628b687e1675413032.jpg', '2023-02-03 08:30:32', '2023-02-03 08:30:32'),
(3, 9, '63dcc76dc0beb1675413357.png', '2023-02-03 08:35:57', '2023-02-03 08:35:57'),
(4, 10, '63dcc7dd787211675413469.png', '2023-02-03 08:37:49', '2023-02-03 08:37:49'),
(5, 11, '63dcc840bf7da1675413568.png', '2023-02-03 08:39:28', '2023-02-03 08:39:28'),
(6, 12, '63dcd128c8fec1675415848.png', '2023-02-03 09:17:28', '2023-02-03 09:17:28'),
(7, 13, '63dcd1401a5e61675415872.jpg', '2023-02-03 09:17:52', '2023-02-03 09:17:52'),
(8, 14, '63dcd1614aab31675415905.png', '2023-02-03 09:18:25', '2023-02-03 09:18:25'),
(9, 15, '63dcd175536c71675415925.jpg', '2023-02-03 09:18:45', '2023-02-03 09:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supportticket_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `supportticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Неllo аll, guуѕ! Ι knоw, mу mеѕsаge mау bе tоo speсific,\r\nВut my sister fоund niсе man herе and they marriеd, sо hоw аbоut me?ǃ :)\r\nI am 23 yearѕ old, Νаtаliа, frоm Rоmаnіа, I knоw Еnglіsh and German languagеѕ аlsо\r\nΑnd... Ι havе sрecifіс diseaѕe, nаmеd nуmрhomanіa. Ԝhо know whаt is thіѕ, саn understand me (bеttеr tо ѕaу it immеdiatelу)\r\nΑh уеѕ, I сook verу tаstу! and Ι love nоt onlу cооk ;))\r\nIm reаl gіrl, not prоstіtutе, and lookіng for serіouѕ аnd hot relаtіоnѕhіp...\r\nАnywаy, you саn fіnd my рrоfіlе hеrе: http://inpirep.tk/page/77285/', '2022-11-18 06:11:22', '2022-11-18 06:11:22'),
(2, 2, 0, 'Hеllо!  leadspaid.com \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd prоpоsаl pеrfесtly lеgаl? \r\nWе submit а nеw mеthоd оf sеnding businеss prоpоsаl thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh аppеаl аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соntасt Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis lеttеr is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat. \r\nno.reply.chava@gmail.com', '2022-11-18 14:55:50', '2022-11-18 14:55:50'),
(3, 3, 0, 'Hi there \r\n \r\nJust checked your leadspaid.com in ahrefs and saw that you could use an authority boost. \r\n \r\nWith our service you will get a guaranteed ahrefs score within just 3 months time. This will increase the organic visibility and strengthen your website authority, thus getting it stronger against G updates as well. \r\n \r\nFor more information, please check our offers \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nThanks and regards \r\nMike Baker\r\n \r\n \r\n \r\nPS: For a limited time, we`ll add ahrefs UR50+ for free.', '2022-11-21 21:59:34', '2022-11-21 21:59:34'),
(5, 5, 0, 'test', '2023-01-14 05:58:13', '2023-01-14 05:58:13'),
(6, 5, 1, 'pls login and click on payments, the add card', '2023-01-14 06:01:08', '2023-01-14 06:01:08'),
(7, 6, 0, 'testb', '2023-01-20 08:57:24', '2023-01-20 08:57:24'),
(8, 1, 0, 'CREATING CAMPAIGN', '2023-02-03 08:30:32', '2023-02-03 08:30:32'),
(9, 2, 0, 'MY Campaigns', '2023-02-03 08:35:57', '2023-02-03 08:35:57'),
(10, 3, 0, 'GG', '2023-02-03 08:37:49', '2023-02-03 08:37:49'),
(11, 4, 0, 'HELOOO', '2023-02-03 08:39:28', '2023-02-03 08:39:28'),
(12, 5, 0, 'my campaigns', '2023-02-03 09:17:28', '2023-02-03 09:17:28'),
(13, 6, 0, 'businessss', '2023-02-03 09:17:52', '2023-02-03 09:17:52'),
(14, 7, 0, 'EVENTS', '2023-02-03 09:18:25', '2023-02-03 09:18:25'),
(15, 8, 0, 'Ticketsss', '2023-02-03 09:18:45', '2023-02-03 09:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `publisher_id`, `name`, `email`, `ticket`, `subject`, `status`, `last_reply`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, 'Komal', 'topstar199026@gmail.com', '717697', 'United States', 0, '2023-02-03 09:17:28', '2023-02-03 09:17:28', '2023-02-03 09:17:28'),
(6, 1, NULL, 'Komal', 'topstar199026@gmail.com', '709921', 'United States', 0, '2023-02-03 09:17:52', '2023-02-03 09:17:52', '2023-02-03 09:17:52'),
(7, 1, NULL, 'Komal', 'topstar199026@gmail.com', '521708', 'United States', 3, '2023-02-03 09:19:40', '2023-02-03 09:18:25', '2023-02-03 09:19:40'),
(8, 1, NULL, 'Komal', 'topstar199026@gmail.com', '298389', 'United States', 3, '2023-02-03 09:19:02', '2023-02-03 09:18:45', '2023-02-03 09:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `charge` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `post_balance` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_advertiser`
--

CREATE TABLE `transactions_advertiser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trx_date` timestamp NULL DEFAULT NULL,
  `init_blance` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `total_budget` text,
  `spent_previous_day` text,
  `deduct` varchar(255) DEFAULT NULL,
  `deducted_amount` decimal(18,2) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `final_wallet` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_advertiser`
--

INSERT INTO `transactions_advertiser` (`id`, `user_id`, `trx_date`, `init_blance`, `total_budget`, `spent_previous_day`, `deduct`, `deducted_amount`, `amount`, `final_wallet`, `created_at`, `updated_at`) VALUES
(388, 3, '2023-01-14 14:45:51', '1217.00000000', '0', '1300', '85.49 (83.00+3% service charge)', '85.49', '83.00', '0.00000000', '2023-01-14 08:45:53', '2023-01-14 08:45:53'),
(389, 3, '2023-01-14 14:46:42', '0.00000000', 'NA', 'NA', '103.00 (100.00+3% service charge)', '103.00', '100.00', '100.00000000', '2023-01-14 08:46:44', '2023-01-14 08:46:44'),
(390, 1, '2023-01-14 16:47:08', '100.00000000', 'NA', 'NA', '103.00 (100.00+3% service charge)', '103.00', '100.00', '200.00000000', '2023-01-14 08:47:10', '2023-01-14 08:47:10'),
(391, 1, '2023-01-14 16:48:11', '200.00000000', 'NA', 'NA', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '1200.00000000', '2023-01-14 08:48:13', '2023-01-14 08:48:13'),
(392, 7, '2023-01-14 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-14 14:00:04', '2023-01-14 14:00:04'),
(393, 1, '2023-01-15 10:00:00', '1200.00000000', '100', '1000', '0', '0.00', '-100.00', '200.00000000', '2023-01-15 02:00:03', '2023-01-15 02:00:03'),
(394, 2, '2023-01-15 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-15 04:00:03', '2023-01-15 04:00:03'),
(395, 3, '2023-01-15 10:00:00', '100.00000000', '0', '1300', '1236.00 (1200.00+3% service charge)', '1236.00', '1200.00', '0.00000000', '2023-01-15 04:00:05', '2023-01-15 04:00:05'),
(396, 78, '2023-01-15 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-15 08:00:03', '2023-01-15 08:00:03'),
(397, 7, '2023-01-15 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-15 14:00:05', '2023-01-15 14:00:05'),
(398, 1, '2023-01-16 10:00:00', '200.00000000', '100', '1000', '927.00 (900.00+3% service charge)', '927.00', '900.00', '100.00000000', '2023-01-16 02:00:10', '2023-01-16 02:00:10'),
(399, 2, '2023-01-16 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-16 04:00:02', '2023-01-16 04:00:02'),
(400, 3, '2023-01-16 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-16 04:00:05', '2023-01-16 04:00:05'),
(401, 78, '2023-01-16 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-16 08:00:03', '2023-01-16 08:00:03'),
(402, 7, '2023-01-16 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-16 14:00:04', '2023-01-16 14:00:04'),
(403, 1, '2023-01-17 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-17 02:00:05', '2023-01-17 02:00:05'),
(404, 2, '2023-01-17 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-17 04:00:02', '2023-01-17 04:00:02'),
(405, 3, '2023-01-17 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-17 04:00:04', '2023-01-17 04:00:04'),
(406, 78, '2023-01-17 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-17 08:00:03', '2023-01-17 08:00:03'),
(407, 7, '2023-01-17 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-17 14:00:04', '2023-01-17 14:00:04'),
(408, 1, '2023-01-18 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-18 02:00:06', '2023-01-18 02:00:06'),
(409, 2, '2023-01-18 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-18 04:00:03', '2023-01-18 04:00:03'),
(410, 3, '2023-01-18 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-18 04:00:05', '2023-01-18 04:00:05'),
(411, 78, '2023-01-18 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-18 08:00:03', '2023-01-18 08:00:03'),
(412, 7, '2023-01-18 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-18 14:00:04', '2023-01-18 14:00:04'),
(413, 1, '2023-01-19 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-19 02:00:13', '2023-01-19 02:00:13'),
(414, 2, '2023-01-19 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-19 04:00:03', '2023-01-19 04:00:03'),
(415, 3, '2023-01-19 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-19 04:00:05', '2023-01-19 04:00:05'),
(416, 1, '2023-01-19 15:15:37', '100.00000000', 'NA', 'NA', '103.00 (100.00+3% service charge)', '103.00', '100.00', '200.00000000', '2023-01-19 07:15:40', '2023-01-19 07:15:40'),
(417, 78, '2023-01-19 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-19 08:00:02', '2023-01-19 08:00:02'),
(418, 7, '2023-01-19 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-19 14:00:03', '2023-01-19 14:00:03'),
(419, 1, '2023-01-20 10:00:00', '200.00000000', '100', '1000', '927.00 (900.00+3% service charge)', '927.00', '900.00', '100.00000000', '2023-01-20 02:00:04', '2023-01-20 02:00:04'),
(420, 1, '2023-01-20 11:45:13', '100.00000000', 'NA', 'NA', '51.50 (50.00+3% service charge)', '51.50', '50.00', '150.00000000', '2023-01-20 03:45:15', '2023-01-20 03:45:15'),
(421, 2, '2023-01-20 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-20 04:00:02', '2023-01-20 04:00:02'),
(422, 3, '2023-01-20 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-20 04:00:04', '2023-01-20 04:00:04'),
(423, 3, '2023-01-20 10:17:39', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-20 04:17:42', '2023-01-20 04:17:42'),
(424, 3, '2023-01-20 10:19:02', '0.00000000', 'NA', 'NA', '10.30 (10.00+3% service charge)', '10.30', '10.00', '10.00000000', '2023-01-20 04:19:04', '2023-01-20 04:19:04'),
(425, 1, '2023-01-20 12:19:26', '150.00000000', 'NA', 'NA', '103.00 (100.00+3% service charge)', '103.00', '100.00', '250.00000000', '2023-01-20 04:19:28', '2023-01-20 04:19:28'),
(426, 1, '2023-01-20 13:04:01', '250.00000000', 'NA', 'NA', '51.50 (50.00+3% service charge)', '51.50', '50.00', '300.00000000', '2023-01-20 05:04:04', '2023-01-20 05:04:04'),
(427, 1, '2023-01-20 13:06:44', '300.00000000', 'NA', 'NA', '61.80 (60.00+3% service charge)', '61.80', '60.00', '360.00000000', '2023-01-20 05:06:46', '2023-01-20 05:06:46'),
(428, 78, '2023-01-20 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-20 08:00:02', '2023-01-20 08:00:02'),
(429, 1, '2023-01-20 16:37:24', '360.00000000', 'NA', 'NA', '515.00 (500.00+3% service charge)', '515.00', '500.00', '860.00000000', '2023-01-20 08:37:26', '2023-01-20 08:37:26'),
(430, 1, '2023-01-20 16:37:42', '860.00000000', '100', '1000', '247.20 (240.00+3% service charge)', '247.20', '240.00', '100.00000000', '2023-01-20 08:37:44', '2023-01-20 08:37:44'),
(431, 1, '2023-01-20 16:37:53', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-20 08:37:56', '2023-01-20 08:37:56'),
(432, 7, '2023-01-20 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-20 14:00:04', '2023-01-20 14:00:04'),
(433, 1, '2023-01-21 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-21 02:00:05', '2023-01-21 02:00:05'),
(434, 2, '2023-01-21 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-21 04:00:03', '2023-01-21 04:00:03'),
(435, 3, '2023-01-21 10:00:00', '10.00000000', '0', '1300', '1328.70 (1290.00+3% service charge)', '1328.70', '1290.00', '0.00000000', '2023-01-21 04:00:05', '2023-01-21 04:00:05'),
(436, 78, '2023-01-21 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-21 08:00:03', '2023-01-21 08:00:03'),
(437, 7, '2023-01-21 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-21 14:00:04', '2023-01-21 14:00:04'),
(438, 1, '2023-01-22 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-22 02:00:05', '2023-01-22 02:00:05'),
(439, 2, '2023-01-22 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-22 04:00:03', '2023-01-22 04:00:03'),
(440, 3, '2023-01-22 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-22 04:00:05', '2023-01-22 04:00:05'),
(441, 78, '2023-01-22 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-22 08:00:03', '2023-01-22 08:00:03'),
(442, 7, '2023-01-22 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-22 14:00:04', '2023-01-22 14:00:04'),
(443, 1, '2023-01-23 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-23 02:00:04', '2023-01-23 02:00:04'),
(444, 2, '2023-01-23 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-23 04:00:03', '2023-01-23 04:00:03'),
(445, 3, '2023-01-23 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-23 04:00:05', '2023-01-23 04:00:05'),
(446, 78, '2023-01-23 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-23 08:00:03', '2023-01-23 08:00:03'),
(447, 7, '2023-01-23 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-23 14:00:04', '2023-01-23 14:00:04'),
(448, 1, '2023-01-24 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-24 02:00:05', '2023-01-24 02:00:05'),
(449, 2, '2023-01-24 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-24 04:00:03', '2023-01-24 04:00:03'),
(450, 3, '2023-01-24 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-24 04:00:05', '2023-01-24 04:00:05'),
(451, 78, '2023-01-24 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-24 08:00:03', '2023-01-24 08:00:03'),
(452, 7, '2023-01-24 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-24 14:00:04', '2023-01-24 14:00:04'),
(453, 1, '2023-01-25 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-25 02:00:04', '2023-01-25 02:00:04'),
(454, 2, '2023-01-25 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-25 04:00:03', '2023-01-25 04:00:03'),
(455, 3, '2023-01-25 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-25 04:00:05', '2023-01-25 04:00:05'),
(456, 78, '2023-01-25 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-25 08:00:03', '2023-01-25 08:00:03'),
(457, 7, '2023-01-25 10:00:00', '100.00000000', '100', '50', '51.50 (50.00+3% service charge)', '51.50', '50.00', '100.00000000', '2023-01-25 14:00:04', '2023-01-25 14:00:04'),
(458, 1, '2023-01-26 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-26 02:00:04', '2023-01-26 02:00:04'),
(459, 2, '2023-01-26 10:00:00', '300.00000000', '300', '0', '0', '0.00', '0.00', '300.00000000', '2023-01-26 04:00:02', '2023-01-26 04:00:02'),
(460, 3, '2023-01-26 10:00:00', '0.00000000', '0', '1300', '1339.00 (1300.00+3% service charge)', '1339.00', '1300.00', '0.00000000', '2023-01-26 04:00:05', '2023-01-26 04:00:05'),
(461, 78, '2023-01-26 10:00:00', '0.00000000', '0', '0', '0', '0.00', '0.00', '0.00000000', '2023-01-26 08:00:03', '2023-01-26 08:00:03'),
(462, 1, '2023-01-27 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-27 02:00:09', '2023-01-27 02:00:09'),
(463, 1, '2023-01-28 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-28 02:00:04', '2023-01-28 02:00:04'),
(464, 1, '2023-01-29 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-29 02:00:04', '2023-01-29 02:00:04'),
(465, 1, '2023-01-29 11:05:33', '100.00000000', 'NA', 'NA', '10.30 (10.00+3% service charge)', '10.30', '10.00', '110.00000000', '2023-01-29 03:05:36', '2023-01-29 03:05:36'),
(466, 1, '2023-01-29 11:07:37', '110.00000000', '100', '1000', '1019.70 (990.00+3% service charge)', '1019.70', '990.00', '100.00000000', '2023-01-29 03:07:40', '2023-01-29 03:07:40'),
(467, 1, '2023-01-29 11:16:49', '100.00000000', 'NA', 'NA', '23.69 (23.00+3% service charge)', '23.69', '23.00', '123.00000000', '2023-01-29 03:16:51', '2023-01-29 03:16:51'),
(468, 1, '2023-01-30 10:00:00', '123.00000000', '100', '1000', '1006.31 (977.00+3% service charge)', '1006.31', '977.00', '100.00000000', '2023-01-30 02:00:04', '2023-01-30 02:00:04'),
(469, 1, '2023-01-31 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-01-31 02:00:09', '2023-01-31 02:00:09'),
(470, 1, '2023-02-01 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-02-01 02:00:04', '2023-02-01 02:00:04'),
(471, 1, '2023-02-02 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-02-02 02:00:05', '2023-02-02 02:00:05'),
(472, 1, '2023-02-03 10:00:00', '100.00000000', '100', '1000', '1030.00 (1000.00+3% service charge)', '1030.00', '1000.00', '100.00000000', '2023-02-03 02:00:09', '2023-02-03 02:00:09'),
(473, 1, '2023-02-03 16:08:40', '100.00000000', 'NA', 'NA', '92.70 (90.00+3% service charge)', '92.70', '90.00', '190.00000000', '2023-02-03 08:08:43', '2023-02-03 08:08:43'),
(474, 1, '2023-02-05 04:32:49', '190.00000000', 'NA', 'NA', '103.00 (100.00+3% service charge)', '103.00', '100.00', '290.00000000', '2023-02-05 03:32:51', '2023-02-05 03:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `advertiser_id` int(11) DEFAULT NULL,
  `user_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `publisher_id`, `advertiser_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '198.41.242.110', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-10-29 15:56:14', '2022-10-29 15:56:14'),
(2, NULL, 1, '172.71.198.92', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-10-29 16:06:16', '2022-10-29 16:06:16'),
(3, NULL, 1, '172.70.218.250', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-10-30 08:19:32', '2022-10-30 08:19:32'),
(4, NULL, 1, '162.158.90.124', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-10-31 14:56:57', '2022-10-31 14:56:57'),
(5, NULL, 1, '172.70.246.34', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-01 01:27:15', '2022-11-01 01:27:15'),
(6, NULL, 1, '172.71.202.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-01 03:32:12', '2022-11-01 03:32:12'),
(7, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-01 03:32:36', '2022-11-01 03:32:36'),
(8, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-01 07:42:22', '2022-11-01 07:42:22'),
(9, NULL, 1, '172.70.218.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-01 10:59:09', '2022-11-01 10:59:09'),
(10, NULL, 1, '172.70.242.30', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-01 12:14:17', '2022-11-01 12:14:17'),
(11, NULL, 1, '172.70.147.130', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-01 12:15:37', '2022-11-01 12:15:37'),
(12, NULL, 1, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-01 12:30:04', '2022-11-01 12:30:04'),
(13, NULL, 1, '162.158.235.35', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-01 12:38:51', '2022-11-01 12:38:51'),
(14, NULL, 1, '172.71.202.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-02 01:31:42', '2022-11-02 01:31:42'),
(15, NULL, 1, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-02 02:10:50', '2022-11-02 02:10:50'),
(16, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-02 05:46:09', '2022-11-02 05:46:09'),
(17, NULL, 1, '172.70.188.198', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-02 09:43:46', '2022-11-02 09:43:46'),
(18, NULL, 1, '172.70.250.164', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-03 01:36:12', '2022-11-03 01:36:12'),
(19, NULL, 1, '172.70.189.179', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-03 03:47:13', '2022-11-03 03:47:13'),
(20, NULL, 1, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-03 10:02:10', '2022-11-03 10:02:10'),
(21, NULL, 1, '162.158.91.48', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-04 05:05:42', '2022-11-04 05:05:42'),
(22, NULL, 1, '172.71.202.150', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-04 05:37:34', '2022-11-04 05:37:34'),
(23, NULL, 1, '172.71.202.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-04 05:47:57', '2022-11-04 05:47:57'),
(24, NULL, 1, '162.158.235.11', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-04 05:48:58', '2022-11-04 05:48:58'),
(25, NULL, 2, '172.71.202.79', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-04 05:49:23', '2022-11-04 05:49:23'),
(26, NULL, 1, '162.158.162.145', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-04 06:35:04', '2022-11-04 06:35:04'),
(27, NULL, 2, '162.158.48.123', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-04 09:13:48', '2022-11-04 09:13:48'),
(28, NULL, 2, '172.70.246.246', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-04 11:42:08', '2022-11-04 11:42:08'),
(29, NULL, 1, '172.70.147.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-05 04:00:07', '2022-11-05 04:00:07'),
(30, NULL, 1, '172.70.142.160', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-06 01:33:39', '2022-11-06 01:33:39'),
(31, NULL, 2, '162.158.227.164', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-06 02:32:36', '2022-11-06 02:32:36'),
(32, NULL, 2, '172.71.202.101', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-06 03:11:30', '2022-11-06 03:11:30'),
(33, NULL, 1, '172.70.219.24', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-06 05:35:32', '2022-11-06 05:35:32'),
(34, NULL, 1, '172.70.188.86', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-06 08:59:25', '2022-11-06 08:59:25'),
(35, NULL, 2, '172.70.246.176', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-07 02:46:37', '2022-11-07 02:46:37'),
(36, NULL, 1, '172.70.218.233', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-07 04:36:02', '2022-11-07 04:36:02'),
(37, NULL, 1, '172.70.189.179', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-07 06:47:29', '2022-11-07 06:47:29'),
(38, NULL, 1, '172.70.219.24', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-07 08:40:37', '2022-11-07 08:40:37'),
(39, NULL, 2, '172.70.219.54', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-07 09:50:27', '2022-11-07 09:50:27'),
(40, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-07 10:35:49', '2022-11-07 10:35:49'),
(41, NULL, 1, '162.158.162.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-08 10:05:49', '2022-11-08 10:05:49'),
(42, NULL, 2, '172.70.218.153', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-08 11:40:12', '2022-11-08 11:40:12'),
(43, NULL, 2, '172.70.218.79', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-08 20:44:49', '2022-11-08 20:44:49'),
(44, NULL, 2, '172.71.202.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-08 23:13:43', '2022-11-08 23:13:43'),
(45, NULL, 2, '172.70.242.172', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-09 00:54:50', '2022-11-09 00:54:50'),
(46, NULL, 1, '172.70.142.161', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-09 02:16:15', '2022-11-09 02:16:15'),
(47, NULL, 1, '172.70.142.159', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-09 03:49:16', '2022-11-09 03:49:16'),
(48, NULL, 1, '172.70.219.47', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-09 04:35:45', '2022-11-09 04:35:45'),
(49, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-09 09:52:47', '2022-11-09 09:52:47'),
(50, NULL, 2, '172.70.219.54', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-09 20:44:20', '2022-11-09 20:44:20'),
(51, NULL, 1, '162.158.170.223', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-10 03:57:12', '2022-11-10 03:57:12'),
(52, NULL, 1, '172.71.198.147', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-10 05:15:04', '2022-11-10 05:15:04'),
(53, NULL, 2, '172.70.218.251', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-10 05:44:39', '2022-11-10 05:44:39'),
(54, NULL, 1, '172.71.218.137', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-10 09:47:45', '2022-11-10 09:47:45'),
(55, NULL, 1, '172.70.219.23', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-10 15:21:29', '2022-11-10 15:21:29'),
(56, NULL, 1, '172.70.219.23', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-11 04:50:53', '2022-11-11 04:50:53'),
(57, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-11 05:19:23', '2022-11-11 05:19:23'),
(58, NULL, 1, '162.158.227.125', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-11 08:45:06', '2022-11-11 08:45:06'),
(59, NULL, 1, '162.158.162.9', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-11 10:28:33', '2022-11-11 10:28:33'),
(60, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-11 10:36:00', '2022-11-11 10:36:00'),
(61, NULL, 1, '172.71.186.203', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-12 12:39:00', '2022-11-12 12:39:00'),
(62, NULL, 1, '172.70.219.23', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-12 12:44:36', '2022-11-12 12:44:36'),
(63, NULL, 1, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-12 12:58:10', '2022-11-12 12:58:10'),
(64, NULL, 2, '172.70.218.233', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-12 14:33:15', '2022-11-12 14:33:15'),
(65, NULL, 3, '172.70.219.48', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-12 15:30:31', '2022-11-12 15:30:31'),
(66, NULL, 4, '172.70.246.165', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-12 16:30:53', '2022-11-12 16:30:53'),
(67, NULL, 5, '172.71.198.164', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-12 17:39:01', '2022-11-12 17:39:01'),
(68, NULL, 6, '172.70.219.24', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-12 17:43:50', '2022-11-12 17:43:50'),
(69, NULL, 7, '172.70.218.153', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-12 17:48:04', '2022-11-12 17:48:04'),
(70, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.8657', '1.3616', 'Singapore', 'SG', '2022-11-13 05:21:03', '2022-11-13 05:21:03'),
(71, NULL, 2, '172.70.250.165', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-13 05:28:25', '2022-11-13 05:28:25'),
(72, NULL, 1, '172.70.250.165', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-13 05:30:33', '2022-11-13 05:30:33'),
(73, NULL, 1, '172.71.198.63', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-13 14:07:01', '2022-11-13 14:07:01'),
(74, NULL, 5, '172.70.250.80', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-13 14:25:13', '2022-11-13 14:25:13'),
(75, NULL, 2, '172.70.250.106', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-13 21:20:50', '2022-11-13 21:20:50'),
(76, NULL, 5, '162.158.90.124', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-13 21:23:50', '2022-11-13 21:23:50'),
(77, NULL, 1, '172.70.188.198', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-14 03:11:51', '2022-11-14 03:11:51'),
(78, NULL, 1, '172.70.143.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-14 04:17:10', '2022-11-14 04:17:10'),
(79, NULL, 1, '172.70.188.105', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-14 06:41:47', '2022-11-14 06:41:47'),
(80, NULL, 1, '162.158.22.179', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-14 10:04:56', '2022-11-14 10:04:56'),
(81, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-15 07:48:01', '2022-11-15 07:48:01'),
(82, 1, NULL, '162.158.91.191', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-15 14:12:33', '2022-11-15 14:12:33'),
(83, NULL, 1, '162.158.170.232', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-15 14:18:49', '2022-11-15 14:18:49'),
(84, 1, NULL, '172.70.142.159', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-15 14:24:00', '2022-11-15 14:24:00'),
(85, NULL, 8, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 03:12:01', '2022-11-16 03:12:01'),
(86, 1, NULL, '172.71.198.164', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-16 03:39:58', '2022-11-16 03:39:58'),
(87, 1, NULL, '172.70.142.159', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 03:42:52', '2022-11-16 03:42:52'),
(88, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 03:50:19', '2022-11-16 03:50:19'),
(89, 1, NULL, '162.158.163.190', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 03:52:47', '2022-11-16 03:52:47'),
(90, 1, NULL, '172.70.188.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 03:55:18', '2022-11-16 03:55:18'),
(91, 1, NULL, '162.158.227.197', 'Vadodara - - India - IN ', 'Chrome', 'Windows 10', '73.2028', '22.3007', 'India', 'IN', '2022-11-16 03:59:54', '2022-11-16 03:59:54'),
(92, 1, NULL, '172.71.202.48', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-16 04:05:04', '2022-11-16 04:05:04'),
(93, 1, NULL, '162.158.235.76', 'Vadodara - - India - IN ', 'Chrome', 'Windows 10', '73.2028', '22.3007', 'India', 'IN', '2022-11-16 04:30:19', '2022-11-16 04:30:19'),
(94, 1, NULL, '172.70.188.199', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 04:59:05', '2022-11-16 04:59:05'),
(95, NULL, 1, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 06:07:32', '2022-11-16 06:07:32'),
(96, 1, NULL, '162.158.163.190', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 06:13:59', '2022-11-16 06:13:59'),
(97, 1, NULL, '162.158.170.251', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 06:26:38', '2022-11-16 06:26:38'),
(98, 1, NULL, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 08:27:24', '2022-11-16 08:27:24'),
(99, 1, NULL, '172.71.202.115', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-16 09:30:54', '2022-11-16 09:30:54'),
(100, 1, NULL, '172.70.189.179', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-16 13:47:43', '2022-11-16 13:47:43'),
(101, NULL, 1, '162.158.235.182', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-16 15:00:45', '2022-11-16 15:00:45'),
(102, NULL, 1, '172.71.202.115', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-17 04:14:11', '2022-11-17 04:14:11'),
(103, 1, NULL, '162.158.170.251', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-17 04:17:27', '2022-11-17 04:17:27'),
(104, 1, NULL, '172.71.202.115', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-17 04:27:08', '2022-11-17 04:27:08'),
(105, 1, NULL, '172.70.218.153', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-17 06:05:29', '2022-11-17 06:05:29'),
(106, NULL, 1, '162.158.235.181', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-17 06:26:52', '2022-11-17 06:26:52'),
(107, NULL, 8, '172.70.147.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-17 06:37:57', '2022-11-17 06:37:57'),
(108, 1, NULL, '172.70.142.160', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-17 10:12:55', '2022-11-17 10:12:55'),
(109, NULL, 1, '172.71.198.106', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-17 11:09:35', '2022-11-17 11:09:35'),
(110, NULL, 1, '172.70.218.251', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-17 12:25:36', '2022-11-17 12:25:36'),
(111, 1, NULL, '172.70.218.250', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-17 12:26:06', '2022-11-17 12:26:06'),
(112, 1, NULL, '172.71.218.71', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-17 16:05:31', '2022-11-17 16:05:31'),
(113, 1, NULL, '172.71.198.4', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-18 07:57:16', '2022-11-18 07:57:16'),
(114, NULL, 8, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-18 08:55:44', '2022-11-18 08:55:44'),
(115, 1, NULL, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-18 08:56:11', '2022-11-18 08:56:11'),
(116, NULL, 9, '172.70.147.130', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-18 09:51:44', '2022-11-18 09:51:44'),
(117, 1, NULL, '172.70.147.131', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-18 09:52:07', '2022-11-18 09:52:07'),
(118, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-18 11:23:42', '2022-11-18 11:23:42'),
(119, NULL, 1, '172.70.219.48', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-18 11:47:21', '2022-11-18 11:47:21'),
(120, NULL, 1, '172.70.218.250', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-18 11:50:32', '2022-11-18 11:50:32'),
(121, NULL, 1, '172.70.92.193', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-18 14:24:09', '2022-11-18 14:24:09'),
(122, 2, NULL, '172.70.218.250', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-18 17:13:51', '2022-11-18 17:13:51'),
(123, NULL, 1, '172.71.202.115', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-11-19 06:19:21', '2022-11-19 06:19:21'),
(124, 1, NULL, '172.70.218.153', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-19 11:27:08', '2022-11-19 11:27:08'),
(125, 1, NULL, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-19 15:53:31', '2022-11-19 15:53:31'),
(126, NULL, 1, '162.158.170.123', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-19 21:32:45', '2022-11-19 21:32:45'),
(127, 3, NULL, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-20 08:01:43', '2022-11-20 08:01:43'),
(128, NULL, 1, '172.70.143.114', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-21 07:17:41', '2022-11-21 07:17:41'),
(129, NULL, 10, '172.70.142.161', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.839', '1.297', 'Singapore', 'SG', '2022-11-21 09:51:42', '2022-11-21 09:51:42'),
(130, NULL, 1, '172.70.189.180', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-21 09:59:53', '2022-11-21 09:59:53'),
(131, NULL, 1, '162.158.227.153', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-21 15:38:08', '2022-11-21 15:38:08'),
(132, 1, NULL, '172.71.198.165', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-21 15:50:16', '2022-11-21 15:50:16'),
(133, NULL, 1, '172.70.189.180', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-22 05:28:49', '2022-11-22 05:28:49'),
(134, NULL, 1, '162.158.170.250', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-22 06:03:21', '2022-11-22 06:03:21'),
(135, NULL, 5, '162.158.90.57', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 09:23:57', '2022-11-22 09:23:57'),
(136, NULL, 5, '172.70.242.168', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 12:32:21', '2022-11-22 12:32:21'),
(137, 2, NULL, '172.70.242.47', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 12:40:45', '2022-11-22 12:40:45'),
(138, 2, NULL, '172.70.246.173', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 12:43:25', '2022-11-22 12:43:25'),
(139, 2, NULL, '162.158.92.214', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 12:49:01', '2022-11-22 12:49:01'),
(140, NULL, 5, '162.158.92.215', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-11-22 12:49:12', '2022-11-22 12:49:12'),
(141, NULL, 1, '172.70.188.198', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 03:12:52', '2022-11-23 03:12:52'),
(142, NULL, 11, '172.70.142.161', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 03:16:37', '2022-11-23 03:16:37'),
(143, NULL, 1, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 05:26:30', '2022-11-23 05:26:30'),
(144, NULL, 1, '172.70.189.180', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 05:49:34', '2022-11-23 05:49:34'),
(145, NULL, 1, '162.158.90.163', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-23 06:44:56', '2022-11-23 06:44:56'),
(146, NULL, 1, '172.70.92.192', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 09:15:13', '2022-11-23 09:15:13'),
(147, NULL, 1, '162.158.90.108', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-24 05:21:35', '2022-11-24 05:21:35'),
(148, NULL, 1, '172.70.246.164', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-24 08:08:01', '2022-11-24 08:08:01'),
(149, NULL, 1, '172.70.147.130', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-11-24 08:38:09', '2022-11-24 08:38:09'),
(150, NULL, 1, '162.158.162.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-24 09:44:16', '2022-11-24 09:44:16'),
(151, NULL, 1, '172.70.246.160', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-25 05:26:39', '2022-11-25 05:26:39'),
(152, NULL, 1, '162.158.89.247', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-25 05:45:34', '2022-11-25 05:45:34'),
(153, NULL, 1, '162.158.92.136', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-25 08:34:32', '2022-11-25 08:34:32'),
(154, NULL, 1, '162.158.162.215', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-25 10:15:12', '2022-11-25 10:15:12'),
(155, NULL, 1, '172.70.188.198', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-25 10:42:02', '2022-11-25 10:42:02'),
(156, NULL, 1, '172.70.147.131', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-26 01:50:51', '2022-11-26 01:50:51'),
(157, NULL, 1, '172.70.251.5', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-26 05:28:23', '2022-11-26 05:28:23'),
(158, NULL, 1, '162.158.92.3', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-26 10:28:34', '2022-11-26 10:28:34'),
(159, NULL, 1, '162.158.90.162', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-26 11:55:24', '2022-11-26 11:55:24'),
(160, 4, NULL, '172.71.198.107', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-27 06:50:24', '2022-11-27 06:50:24'),
(161, 5, NULL, '162.158.227.194', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-27 07:00:20', '2022-11-27 07:00:20'),
(162, NULL, 1, '172.70.250.51', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-28 04:26:20', '2022-11-28 04:26:20'),
(163, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-28 04:38:01', '2022-11-28 04:38:01'),
(164, NULL, 1, '172.70.218.152', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-28 05:31:58', '2022-11-28 05:31:58'),
(165, 1, NULL, '172.70.219.23', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-28 07:44:15', '2022-11-28 07:44:15'),
(166, NULL, 1, '172.70.251.3', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-28 12:12:54', '2022-11-28 12:12:54'),
(167, NULL, 1, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-11-29 03:50:31', '2022-11-29 03:50:31'),
(168, NULL, 1, '172.70.91.86', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-11-29 05:29:54', '2022-11-29 05:29:54'),
(169, NULL, 1, '172.70.188.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-29 09:10:51', '2022-11-29 09:10:51'),
(170, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-29 09:59:09', '2022-11-29 09:59:09'),
(171, NULL, 1, '172.70.218.233', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-11-29 12:41:40', '2022-11-29 12:41:40'),
(172, NULL, 1, '172.70.188.199', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 04:25:32', '2022-12-01 04:25:32'),
(173, NULL, 1, '162.158.86.207', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-01 04:59:10', '2022-12-01 04:59:10'),
(174, NULL, 1, '162.158.170.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 05:28:41', '2022-12-01 05:28:41'),
(175, NULL, 1, '172.70.142.159', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 06:31:23', '2022-12-01 06:31:23'),
(176, NULL, 1, '172.70.188.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 07:37:39', '2022-12-01 07:37:39'),
(177, NULL, 1, '162.158.163.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 08:09:37', '2022-12-01 08:09:37'),
(178, NULL, 1, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 08:34:52', '2022-12-01 08:34:52'),
(179, 3, NULL, '172.70.92.192', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 08:46:20', '2022-12-01 08:46:20'),
(180, 3, NULL, '162.158.163.207', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 08:52:05', '2022-12-01 08:52:05'),
(181, 3, NULL, '172.71.198.164', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-12-01 08:52:13', '2022-12-01 08:52:13'),
(182, NULL, 1, '162.158.227.112', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-01 09:10:03', '2022-12-01 09:10:03'),
(183, NULL, 1, '162.158.227.66', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-01 09:11:34', '2022-12-01 09:11:34'),
(184, NULL, 1, '172.70.143.108', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-01 09:18:36', '2022-12-01 09:18:36'),
(185, NULL, 1, '172.71.202.115', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-12-01 12:15:12', '2022-12-01 12:15:12'),
(186, NULL, 1, '172.70.142.128', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-01 12:18:17', '2022-12-01 12:18:17'),
(187, NULL, 1, '172.70.147.120', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-01 13:10:49', '2022-12-01 13:10:49'),
(188, NULL, 12, '172.70.147.130', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-12-02 09:35:22', '2022-12-02 09:35:22'),
(189, NULL, 1, '172.70.142.159', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-02 10:02:04', '2022-12-02 10:02:04'),
(190, NULL, 13, '172.70.92.192', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-02 10:15:30', '2022-12-02 10:15:30'),
(191, 1, NULL, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-02 13:06:25', '2022-12-02 13:06:25'),
(192, 1, NULL, '162.158.235.77', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-02 14:27:09', '2022-12-02 14:27:09'),
(193, NULL, 1, '162.158.235.146', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-02 15:28:09', '2022-12-02 15:28:09'),
(194, NULL, 1, '172.70.219.23', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-03 10:55:46', '2022-12-03 10:55:46'),
(195, NULL, 1, '172.70.142.161', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-03 11:58:26', '2022-12-03 11:58:26'),
(196, NULL, 1, '172.70.147.181', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-04 01:57:07', '2022-12-04 01:57:07'),
(197, NULL, 1, '172.70.147.181', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-04 07:36:07', '2022-12-04 07:36:07'),
(198, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-04 08:33:06', '2022-12-04 08:33:06'),
(199, NULL, 1, '172.71.198.106', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-04 08:36:57', '2022-12-04 08:36:57'),
(200, NULL, 1, '172.70.218.152', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-04 14:14:43', '2022-12-04 14:14:43'),
(201, NULL, 1, '172.70.147.114', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-05 02:18:13', '2022-12-05 02:18:13'),
(202, NULL, 1, '162.158.170.108', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-05 04:52:27', '2022-12-05 04:52:27'),
(203, NULL, 1, '162.158.227.195', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-05 05:46:35', '2022-12-05 05:46:35'),
(204, NULL, 1, '172.70.143.113', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-05 09:52:11', '2022-12-05 09:52:11'),
(205, NULL, 1, '172.70.218.152', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-05 14:48:21', '2022-12-05 14:48:21'),
(206, NULL, 1, '172.71.142.92', 'Seattle - - United States - US ', 'Chrome', 'Windows 10', '-122.3447', '47.6144', 'United States', 'US', '2022-12-06 09:26:25', '2022-12-06 09:26:25'),
(207, 3, NULL, '172.71.142.93', 'Seattle - - United States - US ', 'Chrome', 'Windows 10', '-122.3447', '47.6144', 'United States', 'US', '2022-12-06 09:26:45', '2022-12-06 09:26:45'),
(208, NULL, 1, '172.71.151.28', 'Seattle - - United States - US ', 'Chrome', 'Windows 10', '-122.3447', '47.6144', 'United States', 'US', '2022-12-06 09:40:54', '2022-12-06 09:40:54'),
(209, NULL, 1, '172.70.218.251', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2022-12-06 12:21:43', '2022-12-06 12:21:43'),
(210, 1, NULL, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-06 13:07:55', '2022-12-06 13:07:55'),
(211, NULL, 1, '172.71.202.114', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-06 14:06:16', '2022-12-06 14:06:16'),
(212, NULL, 1, '172.70.188.42', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-06 14:21:31', '2022-12-06 14:21:31'),
(213, NULL, 1, '162.158.162.116', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-07 04:19:23', '2022-12-07 04:19:23'),
(214, NULL, 1, '162.158.227.195', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-07 06:14:58', '2022-12-07 06:14:58'),
(215, NULL, 8, '172.71.202.48', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-12-07 14:21:12', '2022-12-07 14:21:12'),
(216, 5, NULL, '172.71.202.48', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-12-07 14:22:31', '2022-12-07 14:22:31'),
(217, NULL, 1, '172.70.143.42', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-08 12:37:53', '2022-12-08 12:37:53'),
(218, NULL, 1, '162.158.162.80', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-09 09:13:42', '2022-12-09 09:13:42'),
(219, NULL, 1, '172.71.202.48', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-12-09 15:45:39', '2022-12-09 15:45:39'),
(220, NULL, 1, '172.71.202.49', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-09 19:09:02', '2022-12-09 19:09:02'),
(221, NULL, 1, '162.158.227.196', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-09 19:24:15', '2022-12-09 19:24:15'),
(222, NULL, 1, '162.158.235.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-09 19:56:49', '2022-12-09 19:56:49'),
(223, NULL, 1, '162.158.235.12', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-09 19:58:51', '2022-12-09 19:58:51'),
(224, NULL, 1, '172.71.202.48', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2022-12-10 05:47:33', '2022-12-10 05:47:33'),
(225, 3, NULL, '172.71.198.103', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-10 09:16:00', '2022-12-10 09:16:00'),
(226, NULL, 1, '162.158.235.146', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-10 09:30:35', '2022-12-10 09:30:35'),
(227, 3, NULL, '162.158.235.182', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-10 13:46:08', '2022-12-10 13:46:08'),
(228, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-11 02:48:08', '2022-12-11 02:48:08'),
(229, 3, NULL, '172.70.218.233', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-11 07:25:16', '2022-12-11 07:25:16'),
(230, NULL, 1, '162.158.235.45', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-11 15:03:03', '2022-12-11 15:03:03'),
(231, NULL, 1, '172.70.142.161', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-12 09:51:13', '2022-12-12 09:51:13'),
(232, NULL, 1, '162.158.235.145', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-12 14:07:47', '2022-12-12 14:07:47'),
(233, NULL, 1, '172.71.198.102', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-12 14:12:46', '2022-12-12 14:12:46'),
(234, NULL, 33, '162.158.87.7', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-13 07:07:19', '2022-12-13 07:07:19'),
(235, NULL, 33, '162.158.86.6', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-13 07:56:47', '2022-12-13 07:56:47'),
(236, NULL, 33, '162.158.86.159', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-13 07:57:27', '2022-12-13 07:57:27'),
(237, NULL, 33, '198.41.242.18', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-13 10:15:22', '2022-12-13 10:15:22'),
(238, NULL, 1, '172.70.189.47', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-13 11:00:51', '2022-12-13 11:00:51'),
(239, NULL, 1, '162.158.235.72', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-13 14:33:39', '2022-12-13 14:33:39'),
(240, NULL, 1, '172.70.188.34', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-14 10:21:52', '2022-12-14 10:21:52'),
(241, NULL, 1, '162.158.235.215', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-14 15:24:03', '2022-12-14 15:24:03'),
(242, NULL, 1, '172.71.198.32', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-14 17:48:44', '2022-12-14 17:48:44'),
(243, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-15 06:37:53', '2022-12-15 06:37:53'),
(244, NULL, 1, '162.158.227.237', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-15 12:25:03', '2022-12-15 12:25:03'),
(245, NULL, 1, '172.70.189.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-15 12:30:36', '2022-12-15 12:30:36'),
(246, NULL, 1, '172.71.198.183', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-15 15:31:15', '2022-12-15 15:31:15'),
(247, NULL, 1, '172.70.218.232', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-16 05:26:46', '2022-12-16 05:26:46'),
(248, NULL, 1, '172.70.142.160', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-16 05:31:38', '2022-12-16 05:31:38'),
(249, NULL, 1, '162.158.227.113', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-16 08:44:39', '2022-12-16 08:44:39'),
(250, NULL, 1, '172.70.142.160', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-16 09:10:46', '2022-12-16 09:10:46'),
(251, NULL, 1, '172.70.251.3', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-16 12:18:56', '2022-12-16 12:18:56'),
(252, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-16 14:13:21', '2022-12-16 14:13:21'),
(253, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-17 00:42:10', '2022-12-17 00:42:10'),
(254, NULL, 1, '172.70.92.193', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-17 05:01:00', '2022-12-17 05:01:00'),
(255, NULL, 1, '172.70.143.108', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-17 07:39:06', '2022-12-17 07:39:06'),
(256, NULL, 1, '172.70.189.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-17 07:53:31', '2022-12-17 07:53:31'),
(257, NULL, 1, '162.158.87.123', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-17 16:01:25', '2022-12-17 16:01:25'),
(258, NULL, 1, '162.158.86.45', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-18 07:18:04', '2022-12-18 07:18:04'),
(259, NULL, 1, '172.70.251.5', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-18 13:37:50', '2022-12-18 13:37:50'),
(260, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2022-12-19 08:24:15', '2022-12-19 08:24:15'),
(261, NULL, 1, '162.158.87.108', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-19 08:55:36', '2022-12-19 08:55:36'),
(262, NULL, 1, '172.70.188.25', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.839', '1.297', 'Singapore', 'SG', '2022-12-20 09:07:11', '2022-12-20 09:07:11'),
(263, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-20 09:10:49', '2022-12-20 09:10:49'),
(264, NULL, 1, '172.70.142.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-20 16:25:47', '2022-12-20 16:25:47'),
(265, NULL, 1, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 05:05:10', '2022-12-21 05:05:10'),
(266, NULL, 1, '172.70.188.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 05:19:20', '2022-12-21 05:19:20'),
(267, NULL, 1, '162.158.170.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 05:59:42', '2022-12-21 05:59:42'),
(268, NULL, 1, '162.158.163.224', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 06:25:05', '2022-12-21 06:25:05'),
(269, NULL, 1, '172.70.147.115', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 10:01:25', '2022-12-21 10:01:25'),
(270, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 10:34:15', '2022-12-21 10:34:15'),
(271, NULL, 1, '162.158.86.70', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-21 10:37:14', '2022-12-21 10:37:14'),
(272, NULL, 1, '162.158.87.22', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-21 10:54:37', '2022-12-21 10:54:37'),
(273, NULL, 1, '162.158.87.67', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-21 10:58:32', '2022-12-21 10:58:32'),
(274, NULL, 1, '172.70.92.193', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-21 11:01:47', '2022-12-21 11:01:47'),
(275, NULL, 1, '162.158.87.201', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-21 13:30:38', '2022-12-21 13:30:38'),
(276, NULL, 1, '172.70.189.47', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-21 13:31:05', '2022-12-21 13:31:05'),
(277, NULL, 1, '172.70.142.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-22 04:23:23', '2022-12-22 04:23:23'),
(278, NULL, 1, '162.158.87.123', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-22 05:33:24', '2022-12-22 05:33:24'),
(279, NULL, 1, '172.70.143.41', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-22 05:49:47', '2022-12-22 05:49:47'),
(280, NULL, 1, '162.158.87.88', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-22 06:24:58', '2022-12-22 06:24:58'),
(281, NULL, 1, '172.70.143.42', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-22 06:53:10', '2022-12-22 06:53:10'),
(282, NULL, 1, '172.70.242.215', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-22 09:24:58', '2022-12-22 09:24:58'),
(283, NULL, 1, '172.70.147.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-22 10:06:24', '2022-12-22 10:06:24'),
(284, NULL, 1, '172.70.246.62', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-22 13:54:57', '2022-12-22 13:54:57'),
(285, NULL, 31, '172.70.242.215', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-22 14:15:12', '2022-12-22 14:15:12'),
(286, NULL, 1, '172.70.247.65', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-23 03:51:12', '2022-12-23 03:51:12'),
(287, NULL, 1, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2022-12-23 05:27:11', '2022-12-23 05:27:11'),
(288, NULL, 49, '162.158.170.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-23 05:40:37', '2022-12-23 05:40:37'),
(289, NULL, 1, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-23 05:57:38', '2022-12-23 05:57:38'),
(290, NULL, 1, '172.70.142.160', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-23 05:58:53', '2022-12-23 05:58:53'),
(291, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-23 06:07:43', '2022-12-23 06:07:43'),
(292, NULL, 1, '172.70.188.65', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-23 06:30:40', '2022-12-23 06:30:40'),
(293, NULL, 1, '172.70.242.11', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-23 09:36:53', '2022-12-23 09:36:53'),
(294, NULL, 1, '172.70.242.10', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-23 09:38:02', '2022-12-23 09:38:02');
INSERT INTO `user_logins` (`id`, `publisher_id`, `advertiser_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(295, NULL, 1, '172.70.142.128', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-23 11:12:43', '2022-12-23 11:12:43'),
(296, NULL, 1, '172.70.142.128', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-23 12:25:35', '2022-12-23 12:25:35'),
(297, NULL, 1, '162.158.162.214', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-23 12:29:14', '2022-12-23 12:29:14'),
(298, NULL, 1, '172.70.142.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-23 13:05:31', '2022-12-23 13:05:31'),
(299, NULL, 1, '162.158.87.124', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-24 05:01:25', '2022-12-24 05:01:25'),
(300, NULL, 1, '162.158.86.117', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-24 07:37:58', '2022-12-24 07:37:58'),
(301, NULL, 1, '162.158.87.123', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-24 07:38:52', '2022-12-24 07:38:52'),
(302, NULL, 1, '172.70.143.41', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-24 08:29:41', '2022-12-24 08:29:41'),
(303, NULL, 1, '172.70.247.65', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-24 10:25:08', '2022-12-24 10:25:08'),
(304, NULL, 8, '162.158.163.199', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-24 17:06:24', '2022-12-24 17:06:24'),
(305, NULL, 8, '162.158.163.199', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-24 17:06:50', '2022-12-24 17:06:50'),
(306, NULL, 1, '162.158.87.39', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-24 17:30:03', '2022-12-24 17:30:03'),
(307, NULL, 1, '172.70.189.63', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-24 18:23:03', '2022-12-24 18:23:03'),
(308, NULL, 1, '172.70.142.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-25 06:33:14', '2022-12-25 06:33:14'),
(309, NULL, 31, '162.158.86.28', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-25 11:08:16', '2022-12-25 11:08:16'),
(310, NULL, 1, '172.70.142.128', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-25 11:42:04', '2022-12-25 11:42:04'),
(311, NULL, 1, '162.158.86.160', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-25 13:43:11', '2022-12-25 13:43:11'),
(312, NULL, 1, '172.70.246.245', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-26 04:09:57', '2022-12-26 04:09:57'),
(313, NULL, 1, '172.70.242.11', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-26 09:01:24', '2022-12-26 09:01:24'),
(314, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-26 09:06:29', '2022-12-26 09:06:29'),
(315, NULL, 1, '172.70.142.128', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 13:24:49', '2022-12-26 13:24:49'),
(316, NULL, 1, '162.158.170.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 13:29:54', '2022-12-26 13:29:54'),
(317, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-26 13:37:08', '2022-12-26 13:37:08'),
(318, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-26 13:37:44', '2022-12-26 13:37:44'),
(319, NULL, 1, '172.70.189.74', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 13:38:54', '2022-12-26 13:38:54'),
(320, 3, NULL, '172.70.147.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 13:54:34', '2022-12-26 13:54:34'),
(321, NULL, 1, '172.70.147.27', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 14:10:29', '2022-12-26 14:10:29'),
(322, NULL, 1, '162.158.170.138', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-26 14:14:34', '2022-12-26 14:14:34'),
(323, NULL, 1, '172.70.242.181', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-26 14:16:56', '2022-12-26 14:16:56'),
(324, NULL, 1, '162.158.86.28', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-27 08:32:58', '2022-12-27 08:32:58'),
(325, NULL, 1, '162.158.86.109', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-27 09:45:59', '2022-12-27 09:45:59'),
(326, NULL, 1, '172.70.142.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-27 11:40:38', '2022-12-27 11:40:38'),
(327, NULL, 1, '162.158.170.119', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-27 11:44:08', '2022-12-27 11:44:08'),
(328, NULL, 8, '172.70.143.113', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-27 16:14:19', '2022-12-27 16:14:19'),
(329, NULL, 1, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-28 03:27:24', '2022-12-28 03:27:24'),
(330, NULL, 1, '172.70.250.51', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-28 04:38:06', '2022-12-28 04:38:06'),
(331, NULL, 1, '162.158.86.117', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-28 06:29:45', '2022-12-28 06:29:45'),
(332, NULL, 1, '162.158.87.67', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2022-12-28 06:41:47', '2022-12-28 06:41:47'),
(333, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2022-12-28 08:07:52', '2022-12-28 08:07:52'),
(334, NULL, 1, '172.70.142.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-28 08:54:21', '2022-12-28 08:54:21'),
(335, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2022-12-28 08:55:15', '2022-12-28 08:55:15'),
(336, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2022-12-28 08:56:28', '2022-12-28 08:56:28'),
(337, NULL, 1, '162.158.170.138', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-28 09:52:58', '2022-12-28 09:52:58'),
(338, NULL, 1, '172.70.188.65', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-28 11:04:14', '2022-12-28 11:04:14'),
(339, NULL, 1, '172.70.250.50', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-28 11:56:47', '2022-12-28 11:56:47'),
(340, NULL, 1, '172.70.147.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-28 14:42:35', '2022-12-28 14:42:35'),
(341, NULL, 8, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2022-12-28 15:58:08', '2022-12-28 15:58:08'),
(342, NULL, 1, '162.158.163.223', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-29 04:04:46', '2022-12-29 04:04:46'),
(343, NULL, 1, '172.70.242.181', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-29 06:14:22', '2022-12-29 06:14:22'),
(344, NULL, 1, '162.158.163.217', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-29 06:34:35', '2022-12-29 06:34:35'),
(345, NULL, 1, '162.158.87.21', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-29 11:33:35', '2022-12-29 11:33:35'),
(346, NULL, 1, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-29 12:09:27', '2022-12-29 12:09:27'),
(347, NULL, 1, '162.158.170.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-29 13:58:39', '2022-12-29 13:58:39'),
(348, NULL, 1, '172.70.250.51', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-30 04:35:14', '2022-12-30 04:35:14'),
(349, NULL, 1, '172.70.242.24', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-30 05:59:05', '2022-12-30 05:59:05'),
(350, NULL, 1, '172.70.189.47', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-30 06:07:33', '2022-12-30 06:07:33'),
(351, NULL, 1, '162.158.162.111', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.7863', '1.3012', 'Singapore', 'SG', '2022-12-30 09:43:51', '2022-12-30 09:43:51'),
(352, NULL, 1, '162.158.162.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-30 09:50:11', '2022-12-30 09:50:11'),
(353, NULL, 1, '162.158.86.129', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-30 10:24:18', '2022-12-30 10:24:18'),
(354, NULL, 1, '172.70.147.13', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-30 10:26:09', '2022-12-30 10:26:09'),
(355, NULL, 1, '172.70.143.113', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-30 10:43:03', '2022-12-30 10:43:03'),
(356, NULL, 1, '162.158.162.214', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-12-30 12:57:27', '2022-12-30 12:57:27'),
(357, NULL, 1, '162.158.87.21', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-12-30 13:02:07', '2022-12-30 13:02:07'),
(358, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.839', '1.297', 'Singapore', 'SG', '2023-01-01 16:36:56', '2023-01-01 16:36:56'),
(359, NULL, 1, '172.70.250.254', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-02 04:15:07', '2023-01-02 04:15:07'),
(360, NULL, 1, '162.158.86.29', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-02 09:38:45', '2023-01-02 09:38:45'),
(361, NULL, 1, '172.70.242.11', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-03 03:29:21', '2023-01-03 03:29:21'),
(362, NULL, 1, '172.70.147.115', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-03 03:32:56', '2023-01-03 03:32:56'),
(363, NULL, 1, '162.158.162.214', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-03 04:39:47', '2023-01-03 04:39:47'),
(364, NULL, 1, '172.70.142.129', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-03 08:03:34', '2023-01-03 08:03:34'),
(365, NULL, 1, '172.70.250.254', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-03 08:10:25', '2023-01-03 08:10:25'),
(366, NULL, 1, '172.70.143.108', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-03 08:40:31', '2023-01-03 08:40:31'),
(367, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-03 15:49:46', '2023-01-03 15:49:46'),
(368, NULL, 31, '162.158.227.113', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-03 15:54:18', '2023-01-03 15:54:18'),
(369, NULL, 1, '162.158.87.123', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-04 04:07:29', '2023-01-04 04:07:29'),
(370, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2023-01-04 04:36:22', '2023-01-04 04:36:22'),
(371, NULL, 1, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 07:31:33', '2023-01-04 07:31:33'),
(372, NULL, 1, '162.158.162.9', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 08:08:50', '2023-01-04 08:08:50'),
(373, NULL, 1, '162.158.163.32', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 08:16:47', '2023-01-04 08:16:47'),
(374, NULL, 1, '172.70.147.115', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'iPhone', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 08:19:08', '2023-01-04 08:19:08'),
(375, NULL, 1, '172.70.242.168', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-04 09:47:05', '2023-01-04 09:47:05'),
(376, NULL, 1, '172.70.147.121', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 10:11:16', '2023-01-04 10:11:16'),
(377, NULL, 1, '172.70.251.3', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-04 11:08:37', '2023-01-04 11:08:37'),
(378, NULL, 1, '172.70.251.4', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-04 11:13:25', '2023-01-04 11:13:25'),
(379, NULL, 1, '162.158.163.164', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-04 11:45:04', '2023-01-04 11:45:04'),
(380, NULL, 1, '172.70.251.72', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-04 12:13:07', '2023-01-04 12:13:07'),
(381, NULL, 1, '172.70.251.4', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-04 13:16:53', '2023-01-04 13:16:53'),
(382, NULL, 1, '172.70.188.25', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-05 04:17:23', '2023-01-05 04:17:23'),
(383, NULL, 9, '172.70.143.42', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-05 04:56:29', '2023-01-05 04:56:29'),
(384, NULL, 1, '172.70.147.115', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-05 05:00:53', '2023-01-05 05:00:53'),
(385, NULL, 1, '172.70.251.6', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-05 06:54:00', '2023-01-05 06:54:00'),
(386, NULL, 1, '162.158.87.33', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-05 11:39:03', '2023-01-05 11:39:03'),
(387, NULL, 9, '172.70.189.63', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-05 11:56:47', '2023-01-05 11:56:47'),
(388, NULL, 1, '172.70.188.35', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-05 11:57:39', '2023-01-05 11:57:39'),
(389, NULL, 69, '172.70.188.77', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-05 11:59:19', '2023-01-05 11:59:19'),
(390, NULL, 1, '162.158.170.119', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-05 12:00:57', '2023-01-05 12:00:57'),
(391, NULL, 72, '162.158.227.148', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-05 14:07:42', '2023-01-05 14:07:42'),
(392, NULL, 1, '172.70.92.193', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-05 15:19:09', '2023-01-05 15:19:09'),
(393, NULL, 73, '172.71.198.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-05 15:38:41', '2023-01-05 15:38:41'),
(394, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2023-01-06 03:50:32', '2023-01-06 03:50:32'),
(395, NULL, 1, '162.158.86.233', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-06 04:17:30', '2023-01-06 04:17:30'),
(396, NULL, 1, '172.70.142.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8657', '1.3616', 'Singapore', 'SG', '2023-01-06 05:25:25', '2023-01-06 05:25:25'),
(397, NULL, 1, '162.158.170.119', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-06 06:10:12', '2023-01-06 06:10:12'),
(398, NULL, 1, '172.70.189.74', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-06 07:57:39', '2023-01-06 07:57:39'),
(399, NULL, 1, '162.158.162.214', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-06 08:21:54', '2023-01-06 08:21:54'),
(400, NULL, 76, '172.70.188.25', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-06 08:48:10', '2023-01-06 08:48:10'),
(401, NULL, 1, '162.158.162.41', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-06 09:29:49', '2023-01-06 09:29:49'),
(402, 3, NULL, '172.70.143.42', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-06 09:40:14', '2023-01-06 09:40:14'),
(403, NULL, 1, '172.71.246.17', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-06 14:06:37', '2023-01-06 14:06:37'),
(404, NULL, 1, '172.70.189.63', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-07 03:38:42', '2023-01-07 03:38:42'),
(405, NULL, 1, '172.70.142.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-07 08:04:17', '2023-01-07 08:04:17'),
(406, NULL, 1, '172.70.218.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-08 09:55:12', '2023-01-08 09:55:12'),
(407, NULL, 1, '172.70.147.121', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-08 10:19:00', '2023-01-08 10:19:00'),
(408, 3, NULL, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-08 10:46:34', '2023-01-08 10:46:34'),
(409, NULL, 1, '172.70.218.83', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-08 18:46:44', '2023-01-08 18:46:44'),
(410, NULL, 1, '162.158.87.98', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-09 04:11:50', '2023-01-09 04:11:50'),
(411, NULL, 1, '162.158.86.232', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-09 08:45:28', '2023-01-09 08:45:28'),
(412, NULL, 1, '172.70.142.158', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-09 08:58:49', '2023-01-09 08:58:49'),
(413, NULL, 1, '162.158.86.116', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-09 12:14:09', '2023-01-09 12:14:09'),
(414, NULL, 1, '172.70.147.130', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2023-01-09 12:35:16', '2023-01-09 12:35:16'),
(415, NULL, 1, '172.70.189.63', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-09 15:22:36', '2023-01-09 15:22:36'),
(416, 3, NULL, '172.70.147.115', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-09 15:49:08', '2023-01-09 15:49:08'),
(417, NULL, 1, '162.158.86.215', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-10 04:27:18', '2023-01-10 04:27:18'),
(418, NULL, 1, '172.70.251.2', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-10 07:50:12', '2023-01-10 07:50:12'),
(419, NULL, 1, '162.158.170.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-10 07:57:19', '2023-01-10 07:57:19'),
(420, NULL, 1, '162.158.170.138', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-10 10:55:37', '2023-01-10 10:55:37'),
(421, 3, NULL, '162.158.48.2', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-10 15:15:25', '2023-01-10 15:15:25'),
(422, NULL, 1, '172.70.143.59', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-10 15:32:34', '2023-01-10 15:32:34'),
(423, NULL, 1, '172.70.143.60', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-10 15:32:45', '2023-01-10 15:32:45'),
(424, NULL, 1, '162.158.235.66', 'Ahmedabad - - India - IN ', 'Chrome', 'Windows 10', '72.5871', '23.0276', 'India', 'IN', '2023-01-11 02:53:46', '2023-01-11 02:53:46'),
(425, NULL, 1, '172.70.251.6', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-11 04:05:25', '2023-01-11 04:05:25'),
(426, NULL, 1, '172.70.143.60', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 05:00:29', '2023-01-11 05:00:29'),
(427, NULL, 1, '172.70.188.65', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 06:23:09', '2023-01-11 06:23:09'),
(428, NULL, 1, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 06:35:16', '2023-01-11 06:35:16'),
(429, NULL, 1, '172.70.147.180', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 06:50:14', '2023-01-11 06:50:14'),
(430, NULL, 1, '162.158.162.155', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-11 06:54:20', '2023-01-11 06:54:20'),
(431, 3, NULL, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 06:55:24', '2023-01-11 06:55:24'),
(432, NULL, 1, '162.158.163.168', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 07:09:39', '2023-01-11 07:09:39'),
(433, 3, NULL, '172.70.143.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 07:15:35', '2023-01-11 07:15:35'),
(434, 3, NULL, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 07:43:22', '2023-01-11 07:43:22'),
(435, 3, NULL, '172.70.188.77', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 07:45:01', '2023-01-11 07:45:01'),
(436, NULL, 1, '172.70.92.192', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 07:46:12', '2023-01-11 07:46:12'),
(437, NULL, 1, '162.158.86.94', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-11 08:52:49', '2023-01-11 08:52:49'),
(438, NULL, 1, '172.70.143.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 08:59:35', '2023-01-11 08:59:35'),
(439, NULL, 1, '172.70.143.117', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 09:48:06', '2023-01-11 09:48:06'),
(440, NULL, 11, '162.158.170.232', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 11:12:21', '2023-01-11 11:12:21'),
(441, NULL, 11, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 11:13:09', '2023-01-11 11:13:09'),
(442, NULL, 1, '162.158.170.223', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 11:14:02', '2023-01-11 11:14:02'),
(443, NULL, 1, '172.70.147.27', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-11 11:18:03', '2023-01-11 11:18:03'),
(444, 3, NULL, '172.70.218.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-11 11:43:06', '2023-01-11 11:43:06'),
(445, 3, NULL, '162.158.163.224', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 11:47:14', '2023-01-11 11:47:14'),
(446, NULL, 1, '162.158.86.232', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-11 13:46:30', '2023-01-11 13:46:30'),
(447, NULL, 1, '162.158.86.232', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-11 14:01:53', '2023-01-11 14:01:53'),
(448, NULL, 1, '172.70.189.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-11 17:16:33', '2023-01-11 17:16:33'),
(449, NULL, 1, '162.158.86.166', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-12 04:06:43', '2023-01-12 04:06:43'),
(450, NULL, 3, '162.158.48.12', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-12 04:24:01', '2023-01-12 04:24:01'),
(451, NULL, 1, '172.70.242.181', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-12 05:59:47', '2023-01-12 05:59:47'),
(452, NULL, 1, '172.70.189.73', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 06:09:57', '2023-01-12 06:09:57'),
(453, NULL, 1, '162.158.86.223', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-12 08:45:29', '2023-01-12 08:45:29'),
(454, NULL, 78, '172.70.219.40', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-12 09:07:06', '2023-01-12 09:07:06'),
(455, NULL, 1, '172.70.188.34', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-12 09:33:43', '2023-01-12 09:33:43'),
(456, NULL, 1, '172.70.143.59', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 09:37:05', '2023-01-12 09:37:05'),
(457, NULL, 11, '172.70.147.12', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-12 10:02:49', '2023-01-12 10:02:49'),
(458, NULL, 1, '172.70.188.25', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-12 10:04:42', '2023-01-12 10:04:42'),
(459, NULL, 11, '172.70.143.59', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 10:11:48', '2023-01-12 10:11:48'),
(460, NULL, 1, '162.158.162.217', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 10:15:01', '2023-01-12 10:15:01'),
(461, NULL, 1, '162.158.86.116', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-12 10:38:02', '2023-01-12 10:38:02'),
(462, NULL, 11, '162.158.87.109', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-12 14:01:35', '2023-01-12 14:01:35'),
(463, 3, NULL, '172.71.198.172', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-12 14:38:14', '2023-01-12 14:38:14'),
(464, NULL, 1, '162.158.163.16', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 16:04:00', '2023-01-12 16:04:00'),
(465, NULL, 9, '172.70.188.76', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 16:05:07', '2023-01-12 16:05:07'),
(466, 3, NULL, '172.70.218.78', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-12 17:45:44', '2023-01-12 17:45:44'),
(467, 3, NULL, '172.70.92.190', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 17:47:11', '2023-01-12 17:47:11'),
(468, NULL, 1, '162.158.162.21', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-12 17:52:06', '2023-01-12 17:52:06'),
(469, 3, NULL, '172.70.188.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-12 17:59:20', '2023-01-12 17:59:20'),
(470, NULL, 1, '162.158.86.197', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-13 03:32:52', '2023-01-13 03:32:52'),
(471, NULL, 11, '162.158.86.111', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-13 03:36:25', '2023-01-13 03:36:25'),
(472, NULL, 1, '172.70.143.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 05:49:58', '2023-01-13 05:49:58'),
(473, 3, NULL, '172.70.147.18', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 06:09:31', '2023-01-13 06:09:31'),
(474, NULL, 1, '162.158.170.232', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 06:47:21', '2023-01-13 06:47:21'),
(475, NULL, 78, '172.70.143.60', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 07:30:19', '2023-01-13 07:30:19'),
(476, NULL, 9, '172.70.188.35', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-13 07:41:46', '2023-01-13 07:41:46'),
(477, NULL, 11, '162.158.162.30', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 07:49:50', '2023-01-13 07:49:50'),
(478, 3, NULL, '172.70.143.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 07:52:04', '2023-01-13 07:52:04'),
(479, NULL, 1, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2023-01-13 08:33:16', '2023-01-13 08:33:16'),
(480, 3, NULL, '162.158.170.108', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-13 09:13:39', '2023-01-13 09:13:39'),
(481, NULL, 1, '162.158.87.199', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-13 09:28:21', '2023-01-13 09:28:21'),
(482, 3, NULL, '162.158.227.133', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-13 10:48:29', '2023-01-13 10:48:29'),
(483, NULL, 1, '172.70.218.89', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-13 10:50:29', '2023-01-13 10:50:29'),
(484, NULL, 3, '162.158.162.18', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-13 11:46:04', '2023-01-13 11:46:04'),
(485, NULL, 1, '162.158.87.89', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-13 13:03:04', '2023-01-13 13:03:04'),
(486, NULL, 1, '172.70.246.62', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-13 13:17:19', '2023-01-13 13:17:19'),
(487, 3, NULL, '172.70.218.27', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-13 13:26:45', '2023-01-13 13:26:45'),
(488, 3, NULL, '162.158.170.139', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 16:38:55', '2023-01-13 16:38:55'),
(489, 3, NULL, '172.70.218.178', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-13 16:46:07', '2023-01-13 16:46:07'),
(490, NULL, 1, '172.70.189.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-13 17:00:00', '2023-01-13 17:00:00'),
(491, 3, NULL, '162.158.170.250', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-13 17:24:25', '2023-01-13 17:24:25'),
(492, NULL, 1, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-13 19:28:29', '2023-01-13 19:28:29'),
(493, NULL, 3, '172.71.202.155', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-13 19:31:00', '2023-01-13 19:31:00'),
(494, 3, NULL, '162.158.170.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-13 20:15:29', '2023-01-13 20:15:29'),
(495, NULL, 1, '172.70.188.35', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-14 05:56:21', '2023-01-14 05:56:21'),
(496, NULL, 3, '162.158.235.16', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-14 07:48:10', '2023-01-14 07:48:10'),
(497, NULL, 1, '162.158.170.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 07:59:48', '2023-01-14 07:59:48'),
(498, NULL, 9, '172.70.142.245', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 08:13:55', '2023-01-14 08:13:55'),
(499, NULL, 1, '162.158.170.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 08:22:03', '2023-01-14 08:22:03'),
(500, NULL, 1, '162.158.87.97', 'Ludhiana - - India - IN ', 'Chrome', 'Windows 10', '75.9463', '31.0048', 'India', 'IN', '2023-01-14 08:41:53', '2023-01-14 08:41:53'),
(501, NULL, 1, '172.70.143.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 08:46:42', '2023-01-14 08:46:42'),
(502, NULL, 9, '162.158.170.139', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 08:59:58', '2023-01-14 08:59:58'),
(503, NULL, 9, '172.70.250.254', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-14 09:02:31', '2023-01-14 09:02:31'),
(504, NULL, 1, '172.70.188.24', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 09:05:14', '2023-01-14 09:05:14'),
(505, NULL, 1, '162.158.87.155', 'Ludhiana - - India - IN ', 'Chrome', 'Windows 10', '75.9463', '31.0048', 'India', 'IN', '2023-01-14 09:09:44', '2023-01-14 09:09:44'),
(506, 3, NULL, '172.70.147.14', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 13:40:05', '2023-01-14 13:40:05'),
(507, 3, NULL, '172.71.202.170', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-14 18:43:18', '2023-01-14 18:43:18'),
(508, 3, NULL, '172.70.143.60', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 19:17:59', '2023-01-14 19:17:59'),
(509, 3, NULL, '162.158.162.241', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 19:29:37', '2023-01-14 19:29:37'),
(510, 3, NULL, '172.70.147.4', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-14 19:34:46', '2023-01-14 19:34:46'),
(511, NULL, 9, '172.70.92.190', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-15 08:57:54', '2023-01-15 08:57:54'),
(512, NULL, 1, '172.70.188.34', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-15 09:12:51', '2023-01-15 09:12:51'),
(513, NULL, 9, '172.70.188.34', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-15 09:13:17', '2023-01-15 09:13:17'),
(514, NULL, 9, '172.71.210.200', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-01-15 12:59:28', '2023-01-15 12:59:28'),
(515, NULL, 9, '172.71.210.200', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-01-15 13:03:05', '2023-01-15 13:03:05'),
(516, NULL, 9, '172.71.210.201', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-01-15 13:10:49', '2023-01-15 13:10:49'),
(517, NULL, 9, '172.71.210.200', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-01-15 13:11:14', '2023-01-15 13:11:14'),
(518, NULL, 9, '172.71.210.163', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-01-15 13:13:30', '2023-01-15 13:13:30'),
(519, NULL, 9, '172.70.147.19', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-15 15:37:58', '2023-01-15 15:37:58'),
(520, 3, NULL, '162.158.163.7', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-15 15:40:28', '2023-01-15 15:40:28'),
(521, 3, NULL, '172.70.218.83', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-15 15:51:13', '2023-01-15 15:51:13'),
(522, 5, NULL, '172.71.198.173', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-15 15:57:05', '2023-01-15 15:57:05'),
(523, 3, NULL, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-15 16:12:46', '2023-01-15 16:12:46'),
(524, 5, NULL, '172.70.143.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-15 16:26:08', '2023-01-15 16:26:08'),
(525, 3, NULL, '172.70.110.231', 'London - - United Kingdom - GB ', 'Chrome', 'Windows 10', '-0.093', '51.5164', 'United Kingdom', 'GB', '2023-01-15 19:16:26', '2023-01-15 19:16:26'),
(526, NULL, 1, '162.158.170.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 05:41:36', '2023-01-16 05:41:36'),
(527, NULL, 1, '162.158.86.94', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-16 06:53:38', '2023-01-16 06:53:38'),
(528, NULL, 1, '172.70.92.216', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 08:00:51', '2023-01-16 08:00:51'),
(529, NULL, 1, '172.70.143.59', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 08:31:02', '2023-01-16 08:31:02'),
(530, NULL, 1, '172.71.246.108', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-16 10:08:15', '2023-01-16 10:08:15'),
(531, NULL, 1, '172.70.247.53', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-16 14:12:12', '2023-01-16 14:12:12'),
(532, NULL, 1, '172.70.143.60', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 14:41:34', '2023-01-16 14:41:34'),
(533, 3, NULL, '162.158.86.233', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-16 15:20:54', '2023-01-16 15:20:54'),
(534, 6, NULL, '162.158.87.199', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-16 15:32:57', '2023-01-16 15:32:57'),
(535, 3, NULL, '172.70.147.171', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 15:38:55', '2023-01-16 15:38:55'),
(536, 6, NULL, '172.70.142.162', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 15:40:55', '2023-01-16 15:40:55'),
(537, NULL, 1, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-16 16:43:44', '2023-01-16 16:43:44'),
(538, 3, NULL, '172.70.142.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-16 18:39:04', '2023-01-16 18:39:04'),
(539, NULL, 5, '172.70.143.25', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-17 04:20:52', '2023-01-17 04:20:52'),
(540, NULL, 1, '162.158.86.196', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-17 04:39:54', '2023-01-17 04:39:54'),
(541, NULL, 1, '162.158.86.105', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-17 06:03:01', '2023-01-17 06:03:01'),
(542, NULL, 1, '162.158.86.110', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-17 09:57:40', '2023-01-17 09:57:40'),
(543, 3, NULL, '172.70.147.19', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-17 10:35:34', '2023-01-17 10:35:34'),
(544, 3, NULL, '172.70.147.171', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-17 20:07:31', '2023-01-17 20:07:31'),
(545, 6, NULL, '172.70.147.170', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-17 20:10:36', '2023-01-17 20:10:36'),
(546, 3, NULL, '172.70.189.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-17 20:12:37', '2023-01-17 20:12:37'),
(547, NULL, 1, '172.71.246.14', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-18 11:49:31', '2023-01-18 11:49:31'),
(548, 3, NULL, '172.71.202.164', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2023-01-18 13:34:12', '2023-01-18 13:34:12'),
(549, 3, NULL, '172.70.142.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-18 15:04:37', '2023-01-18 15:04:37'),
(550, 6, NULL, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-18 15:07:36', '2023-01-18 15:07:36'),
(551, 3, NULL, '162.158.162.31', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-18 15:10:50', '2023-01-18 15:10:50'),
(552, NULL, 1, '172.70.218.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-18 18:52:40', '2023-01-18 18:52:40'),
(553, NULL, 1, '162.158.170.223', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-19 06:41:00', '2023-01-19 06:41:00'),
(554, NULL, 9, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2023-01-19 07:20:11', '2023-01-19 07:20:11'),
(555, 3, NULL, '172.70.188.34', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-19 07:29:58', '2023-01-19 07:29:58'),
(556, 3, NULL, '172.70.188.76', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-19 08:01:56', '2023-01-19 08:01:56'),
(557, NULL, 1, '172.70.142.245', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-19 08:05:13', '2023-01-19 08:05:13'),
(558, 3, NULL, '162.158.162.155', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-19 08:06:11', '2023-01-19 08:06:11'),
(559, 18, NULL, '162.158.86.117', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-19 13:13:01', '2023-01-19 13:13:01'),
(560, NULL, 85, '172.70.242.41', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-19 13:29:22', '2023-01-19 13:29:22'),
(561, NULL, 1, '162.158.86.110', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-19 13:29:43', '2023-01-19 13:29:43'),
(562, 3, NULL, '172.70.142.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-19 16:15:37', '2023-01-19 16:15:37'),
(563, NULL, 3, '172.70.188.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-19 21:02:24', '2023-01-19 21:02:24'),
(564, NULL, 1, '172.70.147.137', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-20 03:42:09', '2023-01-20 03:42:09'),
(565, NULL, 3, '172.70.219.39', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-20 03:53:58', '2023-01-20 03:53:58'),
(566, 20, NULL, '172.70.142.245', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-20 04:12:36', '2023-01-20 04:12:36'),
(567, NULL, 1, '162.158.170.232', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-20 04:17:27', '2023-01-20 04:17:27'),
(568, NULL, 1, '172.71.202.61', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-20 04:22:01', '2023-01-20 04:22:01'),
(569, NULL, 1, '162.158.86.196', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-20 05:35:07', '2023-01-20 05:35:07'),
(570, NULL, 1, '162.158.86.232', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-20 05:43:11', '2023-01-20 05:43:11'),
(571, NULL, 1, '172.70.142.245', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-20 05:53:36', '2023-01-20 05:53:36'),
(572, NULL, 1, '172.70.147.18', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-20 06:00:55', '2023-01-20 06:00:55'),
(573, 24, NULL, '162.158.163.167', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-20 06:13:46', '2023-01-20 06:13:46'),
(574, NULL, 1, '172.70.251.3', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-20 06:21:14', '2023-01-20 06:21:14'),
(575, NULL, 1, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-20 08:09:21', '2023-01-20 08:09:21'),
(576, NULL, 1, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-20 08:34:54', '2023-01-20 08:34:54'),
(577, NULL, 3, '162.158.48.87', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-20 08:35:18', '2023-01-20 08:35:18'),
(578, NULL, 1, '162.158.162.153', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-20 08:40:32', '2023-01-20 08:40:32'),
(579, NULL, 2, '162.158.170.251', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-20 10:14:09', '2023-01-20 10:14:09'),
(580, NULL, 1, '172.70.189.47', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-20 10:23:18', '2023-01-20 10:23:18'),
(581, 27, NULL, '172.70.250.254', ' - - India - IN ', 'Firefox', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-20 11:30:28', '2023-01-20 11:30:28'),
(582, NULL, 1, '172.70.92.191', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-22 11:37:12', '2023-01-22 11:37:12'),
(583, NULL, 1, '172.70.143.26', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-22 14:51:07', '2023-01-22 14:51:07'),
(584, NULL, 1, '172.70.147.137', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-23 09:46:28', '2023-01-23 09:46:28'),
(585, NULL, 1, '172.70.188.64', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-23 11:24:45', '2023-01-23 11:24:45'),
(586, NULL, 1, '172.70.142.122', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-23 14:06:30', '2023-01-23 14:06:30');
INSERT INTO `user_logins` (`id`, `publisher_id`, `advertiser_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(587, NULL, 1, '172.70.250.50', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-23 16:39:09', '2023-01-23 16:39:09'),
(588, NULL, 1, '172.70.147.14', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-24 05:33:40', '2023-01-24 05:33:40'),
(589, 3, NULL, '172.70.147.15', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-24 06:08:28', '2023-01-24 06:08:28'),
(590, NULL, 1, '172.70.147.15', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-24 06:09:36', '2023-01-24 06:09:36'),
(591, NULL, 1, '172.68.119.129', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.7514', '35.685', 'Japan', 'JP', '2023-01-24 06:55:45', '2023-01-24 06:55:45'),
(592, NULL, 1, '172.71.198.112', 'Panchkula - - India - IN ', 'Chrome', 'Windows 10', '76.8504', '30.6946', 'India', 'IN', '2023-01-24 07:55:05', '2023-01-24 07:55:05'),
(593, NULL, 1, '172.70.246.158', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-24 09:12:27', '2023-01-24 09:12:27'),
(594, NULL, 1, '172.70.222.172', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.7514', '35.685', 'Japan', 'JP', '2023-01-24 09:30:57', '2023-01-24 09:30:57'),
(595, NULL, 1, '162.158.227.100', ' - - India - IN ', 'Chrome', 'Windows 10', '77', '20', 'India', 'IN', '2023-01-24 12:11:06', '2023-01-24 12:11:06'),
(596, NULL, 1, '162.158.87.125', 'Mohali - - India - IN ', 'Chrome', 'Windows 10', '76.7221', '30.68', 'India', 'IN', '2023-01-24 14:11:02', '2023-01-24 14:11:02'),
(597, NULL, 1, '172.70.242.102', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-24 16:44:14', '2023-01-24 16:44:14'),
(598, 36, NULL, '172.70.189.107', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8884', '1.3479', 'Singapore', 'SG', '2023-01-25 03:58:35', '2023-01-25 03:58:35'),
(599, NULL, 1, '172.70.143.110', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-25 04:23:25', '2023-01-25 04:23:25'),
(600, NULL, 1, '172.71.202.14', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7105', '26.9525', 'India', 'IN', '2023-01-25 15:19:30', '2023-01-25 15:19:30'),
(601, NULL, 1, '162.158.86.166', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-25 17:27:25', '2023-01-25 17:27:25'),
(602, NULL, 1, '172.70.189.47', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-25 18:16:36', '2023-01-25 18:16:36'),
(603, NULL, 1, '162.158.87.109', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-01-26 09:49:19', '2023-01-26 09:49:19'),
(604, NULL, 1, '172.70.143.59', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-26 09:52:36', '2023-01-26 09:52:36'),
(605, NULL, 1, '172.71.202.15', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7105', '26.9525', 'India', 'IN', '2023-01-26 10:31:02', '2023-01-26 10:31:02'),
(606, NULL, 1, '172.70.143.117', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-27 02:03:40', '2023-01-27 02:03:40'),
(607, NULL, 1, '172.70.218.46', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-01-27 02:53:25', '2023-01-27 02:53:25'),
(608, 3, NULL, '172.70.143.118', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-27 04:44:13', '2023-01-27 04:44:13'),
(609, 6, NULL, '172.70.188.93', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.839', '1.297', 'Singapore', 'SG', '2023-01-27 05:04:04', '2023-01-27 05:04:04'),
(610, NULL, 1, '172.70.147.170', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-27 05:49:07', '2023-01-27 05:49:07'),
(611, NULL, 1, '172.70.147.15', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-27 07:46:22', '2023-01-27 07:46:22'),
(612, NULL, 1, '172.70.188.93', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-27 10:20:39', '2023-01-27 10:20:39'),
(613, NULL, 1, '162.158.170.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-27 23:56:24', '2023-01-27 23:56:24'),
(614, NULL, 1, '172.70.123.70', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-28 08:02:19', '2023-01-28 08:02:19'),
(615, NULL, 1, '172.68.118.40', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-28 09:42:37', '2023-01-28 09:42:37'),
(616, NULL, 1, '172.68.118.24', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-28 09:54:29', '2023-01-28 09:54:29'),
(617, NULL, 1, '172.68.118.24', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-28 09:55:57', '2023-01-28 09:55:57'),
(618, NULL, 1, '172.68.118.159', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 01:35:21', '2023-01-29 01:35:21'),
(619, NULL, 1, '172.70.122.221', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 02:06:29', '2023-01-29 02:06:29'),
(620, NULL, 1, '172.70.223.63', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 02:15:29', '2023-01-29 02:15:29'),
(621, NULL, 1, '172.70.222.184', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 02:53:54', '2023-01-29 02:53:54'),
(622, NULL, 1, '172.70.222.184', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 06:32:59', '2023-01-29 06:32:59'),
(623, NULL, 1, '172.68.119.43', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 08:26:46', '2023-01-29 08:26:46'),
(624, NULL, 1, '162.158.119.92', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 09:03:23', '2023-01-29 09:03:23'),
(625, NULL, 1, '162.158.119.92', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-29 11:21:16', '2023-01-29 11:21:16'),
(626, NULL, 1, '162.158.118.119', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-30 06:10:15', '2023-01-30 06:10:15'),
(627, NULL, 1, '162.158.170.233', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-30 07:19:45', '2023-01-30 07:19:45'),
(628, NULL, 1, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-30 07:21:06', '2023-01-30 07:21:06'),
(629, NULL, 1, '172.70.147.4', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'iPhone', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-30 07:52:03', '2023-01-30 07:52:03'),
(630, NULL, 1, '172.70.188.57', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-01-30 07:53:10', '2023-01-30 07:53:10'),
(631, NULL, 1, '172.70.122.193', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-30 09:05:08', '2023-01-30 09:05:08'),
(632, NULL, 1, '172.68.119.43', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-30 13:20:21', '2023-01-30 13:20:21'),
(633, NULL, 1, '172.68.118.25', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-31 00:23:20', '2023-01-31 00:23:20'),
(634, NULL, 1, '172.70.143.25', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-01-31 01:43:22', '2023-01-31 01:43:22'),
(635, NULL, 1, '162.158.118.187', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-01-31 03:15:16', '2023-01-31 03:15:16'),
(636, NULL, 1, '162.158.170.251', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-01-31 12:59:58', '2023-01-31 12:59:58'),
(637, NULL, 1, '172.71.250.151', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-01-31 15:16:07', '2023-01-31 15:16:07'),
(638, NULL, 1, '172.70.222.11', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-01 01:21:57', '2023-02-01 01:21:57'),
(639, NULL, 1, '172.70.188.92', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-02-01 03:11:11', '2023-02-01 03:11:11'),
(640, NULL, 1, '172.70.222.184', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-01 04:27:42', '2023-02-01 04:27:42'),
(641, NULL, 1, '162.158.94.234', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-02-01 11:22:00', '2023-02-01 11:22:00'),
(642, NULL, 1, '172.70.188.56', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-01 11:37:05', '2023-02-01 11:37:05'),
(643, NULL, 1, '172.68.118.24', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-01 11:43:53', '2023-02-01 11:43:53'),
(644, NULL, 1, '162.158.86.110', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-02-01 18:03:44', '2023-02-01 18:03:44'),
(645, NULL, 1, '172.70.122.107', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-02 01:26:49', '2023-02-02 01:26:49'),
(646, NULL, 1, '172.70.142.244', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-02 03:17:38', '2023-02-02 03:17:38'),
(647, NULL, 1, '172.68.118.25', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-02 04:11:56', '2023-02-02 04:11:56'),
(648, NULL, 1, '172.70.251.72', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-02-02 05:51:34', '2023-02-02 05:51:34'),
(649, NULL, 1, '172.71.210.200', 'Bacoor - - Philippines - PH ', 'Chrome', 'Windows 10', '120.9425', '14.4578', 'Philippines', 'PH', '2023-02-02 06:26:21', '2023-02-02 06:26:21'),
(650, 3, NULL, '172.70.188.56', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-02 07:04:16', '2023-02-02 07:04:16'),
(651, 6, NULL, '162.158.163.169', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-02 07:19:08', '2023-02-02 07:19:08'),
(652, NULL, 1, '162.158.87.124', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-02-02 09:18:15', '2023-02-02 09:18:15'),
(653, NULL, 1, '172.70.122.220', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-02 14:27:37', '2023-02-02 14:27:37'),
(654, 6, NULL, '162.158.86.233', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2023-02-02 17:25:53', '2023-02-02 17:25:53'),
(655, NULL, 1, '162.158.87.169', ' - - Russia - RU ', 'Chrome', 'Windows 10', '37.6068', '55.7386', 'Russia', 'RU', '2023-02-03 00:28:08', '2023-02-03 00:28:08'),
(656, NULL, 1, '162.158.111.108', ' - - Russia - RU ', 'Chrome', 'Windows 10', '37.6068', '55.7386', 'Russia', 'RU', '2023-02-03 01:02:40', '2023-02-03 01:02:40'),
(657, NULL, 1, '172.70.222.192', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-03 02:28:40', '2023-02-03 02:28:40'),
(658, NULL, 1, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 02:59:59', '2023-02-03 02:59:59'),
(659, NULL, 77, '162.158.170.222', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 03:21:47', '2023-02-03 03:21:47'),
(660, NULL, 77, '172.70.147.136', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 03:34:38', '2023-02-03 03:34:38'),
(661, NULL, 77, '162.158.162.31', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 03:45:28', '2023-02-03 03:45:28'),
(662, NULL, 77, '172.70.147.137', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-02-03 03:49:48', '2023-02-03 03:49:48'),
(663, NULL, 77, '172.70.147.19', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 03:51:13', '2023-02-03 03:51:13'),
(664, NULL, 77, '162.158.170.236', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-02-03 03:52:39', '2023-02-03 03:52:39'),
(665, NULL, 79, '172.70.189.58', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 04:12:01', '2023-02-03 04:12:01'),
(666, NULL, 79, '172.70.189.58', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 04:12:58', '2023-02-03 04:12:58'),
(667, NULL, 1, '162.158.94.210', 'Helsinki - - Finland - FI ', 'Chrome', 'Windows 10', '24.9347', '60.1719', 'Finland', 'FI', '2023-02-03 05:23:05', '2023-02-03 05:23:05'),
(668, NULL, 1, '172.70.147.4', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 05:40:04', '2023-02-03 05:40:04'),
(669, NULL, 1, '172.71.210.133', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-03 06:46:35', '2023-02-03 06:46:35'),
(670, NULL, 1, '162.158.87.123', 'Bathinda - - India - IN ', 'Chrome', 'Windows 10', '74.9389', '30.2075', 'India', 'IN', '2023-02-03 07:01:20', '2023-02-03 07:01:20'),
(671, NULL, 79, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:13:36', '2023-02-03 07:13:36'),
(672, NULL, 79, '172.70.143.110', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:14:28', '2023-02-03 07:14:28'),
(673, NULL, 79, '172.70.142.123', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:19:18', '2023-02-03 07:19:18'),
(674, NULL, 79, '172.70.147.14', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:25:37', '2023-02-03 07:25:37'),
(675, NULL, 79, '162.158.162.220', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:33:36', '2023-02-03 07:33:36'),
(676, NULL, 1, '172.70.147.14', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 07:34:51', '2023-02-03 07:34:51'),
(677, NULL, 1, '172.70.143.25', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-02-03 08:16:37', '2023-02-03 08:16:37'),
(678, NULL, 1, '172.70.143.110', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 08:17:26', '2023-02-03 08:17:26'),
(679, NULL, 1, '162.158.162.211', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 08:19:47', '2023-02-03 08:19:47'),
(680, NULL, 1, '162.158.162.210', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 08:19:57', '2023-02-03 08:19:57'),
(681, NULL, 80, '162.158.227.126', ' - - Bangladesh - BD ', 'Chrome', 'Windows 10', '90.3742', '23.7018', 'Bangladesh', 'BD', '2023-02-03 08:26:37', '2023-02-03 08:26:37'),
(682, 3, NULL, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 09:27:29', '2023-02-03 09:27:29'),
(683, 6, NULL, '172.70.189.158', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 10:14:55', '2023-02-03 10:14:55'),
(684, 36, NULL, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 10:30:34', '2023-02-03 10:30:34'),
(685, 3, NULL, '172.70.142.245', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 10:32:47', '2023-02-03 10:32:47'),
(686, NULL, 1, '172.70.222.113', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-03 11:33:01', '2023-02-03 11:33:01'),
(687, 6, NULL, '162.158.170.251', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-02-03 12:33:32', '2023-02-03 12:33:32'),
(688, 6, NULL, '162.158.170.250', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2023-02-03 12:33:49', '2023-02-03 12:33:49'),
(689, 6, NULL, '162.158.170.109', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 12:36:41', '2023-02-03 12:36:41'),
(690, NULL, 1, '162.158.163.18', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 12:59:48', '2023-02-03 12:59:48'),
(691, NULL, 1, '162.158.94.31', 'Helsinki - - Finland - FI ', 'Chrome', 'Windows 10', '24.9347', '60.1719', 'Finland', 'FI', '2023-02-03 14:26:32', '2023-02-03 14:26:32'),
(692, 6, NULL, '172.70.189.58', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-03 14:37:26', '2023-02-03 14:37:26'),
(693, NULL, 1, '172.68.118.119', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-04 01:16:30', '2023-02-04 01:16:30'),
(694, 6, NULL, '162.158.170.237', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-04 03:50:08', '2023-02-04 03:50:08'),
(695, NULL, 1, '172.68.119.162', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-04 07:22:30', '2023-02-04 07:22:30'),
(696, NULL, 1, '172.70.92.217', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-04 07:34:34', '2023-02-04 07:34:34'),
(697, NULL, 1, '162.158.111.91', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-02-04 08:05:47', '2023-02-04 08:05:47'),
(698, NULL, 1, '172.70.189.158', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-04 14:38:44', '2023-02-04 14:38:44'),
(699, NULL, 1, '172.70.122.106', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-05 00:25:04', '2023-02-05 00:25:04'),
(700, NULL, 1, '162.158.170.122', 'Singapore - - Singapore - SG ', 'Handheld Browser', 'Android', '103.839', '1.297', 'Singapore', 'SG', '2023-02-05 02:52:47', '2023-02-05 02:52:47'),
(701, NULL, 1, '172.71.214.149', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 02:53:32', '2023-02-05 02:53:32'),
(702, NULL, 1, '172.71.214.149', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 02:54:29', '2023-02-05 02:54:29'),
(703, NULL, 1, '162.158.90.250', 'Los Angeles - - United States - US ', 'Chrome', 'Windows 10', '-118.2441', '34.0544', 'United States', 'US', '2023-02-05 03:10:49', '2023-02-05 03:10:49'),
(704, NULL, 1, '172.71.215.99', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 03:15:45', '2023-02-05 03:15:45'),
(705, NULL, 1, '172.71.215.99', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 03:16:34', '2023-02-05 03:16:34'),
(706, NULL, 1, '172.71.218.208', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 03:21:43', '2023-02-05 03:21:43'),
(707, NULL, 1, '172.70.189.61', ' - - Singapore - SG ', 'Handheld Browser', 'Android', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-05 03:22:16', '2023-02-05 03:22:16'),
(708, NULL, 1, '172.70.147.5', ' - - Singapore - SG ', 'Chrome', 'Windows 10', '103.8547', '1.2929', 'Singapore', 'SG', '2023-02-05 03:31:36', '2023-02-05 03:31:36'),
(709, NULL, 1, '172.71.210.93', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 03:36:31', '2023-02-05 03:36:31'),
(710, NULL, 1, '172.70.222.239', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-05 06:29:02', '2023-02-05 06:29:02'),
(711, NULL, 1, '172.70.222.238', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-05 06:29:02', '2023-02-05 06:29:02'),
(712, NULL, 1, '162.158.178.133', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 06:32:43', '2023-02-05 06:32:43'),
(713, NULL, 1, '172.70.247.30', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-02-05 06:33:48', '2023-02-05 06:33:48'),
(714, NULL, 1, '172.70.247.59', 'Helsinki - - Finland - FI ', 'Chrome', 'Windows 10', '24.9347', '60.1719', 'Finland', 'FI', '2023-02-05 07:03:00', '2023-02-05 07:03:00'),
(715, NULL, 1, '172.71.218.113', ' - - Hong Kong - HK ', 'Chrome', 'Windows 10', '114.1657', '22.2578', 'Hong Kong', 'HK', '2023-02-05 07:24:54', '2023-02-05 07:24:54'),
(716, NULL, 73, '172.71.250.100', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-02-05 08:05:44', '2023-02-05 08:05:44'),
(717, NULL, 73, '162.158.87.200', 'Patiala - - India - IN ', 'Chrome', 'Windows 10', '76.3906', '30.3388', 'India', 'IN', '2023-02-05 08:08:07', '2023-02-05 08:08:07'),
(718, NULL, 1, '172.68.118.246', 'Tokyo - - Japan - JP ', 'Chrome', 'Windows 10', '139.6899', '35.6893', 'Japan', 'JP', '2023-02-05 08:41:37', '2023-02-05 08:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `after_charge` decimal(18,8) NOT NULL,
  `withdraw_information` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_limit` decimal(18,8) DEFAULT NULL,
  `max_limit` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `delay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` decimal(18,8) DEFAULT NULL,
  `rate` decimal(18,8) DEFAULT NULL,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_data` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertiser_password_resets`
--
ALTER TABLE `advertiser_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertiser_plans`
--
ALTER TABLE `advertiser_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_types`
--
ALTER TABLE `ad_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_forms`
--
ALTER TABLE `campaign_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_forms_leads`
--
ALTER TABLE `campaign_forms_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_publisher`
--
ALTER TABLE `campaign_publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_publisher_common`
--
ALTER TABLE `campaign_publisher_common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_ads`
--
ALTER TABLE `create_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_verifcations`
--
ALTER TABLE `domain_verifcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earning_logs`
--
ALTER TABLE `earning_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_sms_templates_act_unique` (`act`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontends_key_index` (`data_keys`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_charts`
--
ALTER TABLE `ip_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_logs`
--
ALTER TABLE `ip_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lgen_spend`
--
ALTER TABLE `lgen_spend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `price_plans`
--
ALTER TABLE `price_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher_ads`
--
ALTER TABLE `publisher_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher_advertiser`
--
ALTER TABLE `publisher_advertiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher_password_resets`
--
ALTER TABLE `publisher_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions_advertiser`
--
ALTER TABLE `transactions_advertiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdrawals_trx_unique` (`trx`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `advertiser_password_resets`
--
ALTER TABLE `advertiser_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `advertiser_plans`
--
ALTER TABLE `advertiser_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_types`
--
ALTER TABLE `ad_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `campaign_forms`
--
ALTER TABLE `campaign_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `campaign_forms_leads`
--
ALTER TABLE `campaign_forms_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `campaign_publisher`
--
ALTER TABLE `campaign_publisher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `campaign_publisher_common`
--
ALTER TABLE `campaign_publisher_common`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `create_ads`
--
ALTER TABLE `create_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domain_verifcations`
--
ALTER TABLE `domain_verifcations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `earning_logs`
--
ALTER TABLE `earning_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ip_charts`
--
ALTER TABLE `ip_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_logs`
--
ALTER TABLE `ip_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lgen_spend`
--
ALTER TABLE `lgen_spend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price_plans`
--
ALTER TABLE `price_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `publisher_ads`
--
ALTER TABLE `publisher_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher_advertiser`
--
ALTER TABLE `publisher_advertiser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `publisher_password_resets`
--
ALTER TABLE `publisher_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions_advertiser`
--
ALTER TABLE `transactions_advertiser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
