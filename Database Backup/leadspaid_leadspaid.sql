-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2022 at 12:10 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.30

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'arun.saba@premiumleads.co', 'leadspaid', NULL, '606ad07acb9031617612922.png', '$2y$10$4XUwq4hjsYz1I7HQPBizkOT1uBQ41gsDEVWwQ.RzVLe9IH.NHl3cC', NULL, '2021-04-05 02:55:22');

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
  `status` int(11) NOT NULL COMMENT '1 = active, 2 = banned, 0 = deactive, ',
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
  `card_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `name`, `email`, `username`, `image`, `country`, `city`, `company_name`, `billed_to`, `postal_code`, `mobile`, `country_code`, `password`, `balance`, `status`, `ev`, `sv`, `ts`, `tv`, `tsc`, `ver_code`, `ver_code_send_at`, `click_credit`, `impression_credit`, `total_budget`, `amount_used`, `wallet_deposit`, `card_session`, `created_at`, `updated_at`) VALUES
(1, 'advertiser sdfsdf', 'advertiser1@gmail.com', 'advertiser1', NULL, 'Singapore', 'brunasarea', 'dsf dsf', 'sdfsdf sdf sf', '232A', '88023434534543', '', '$2y$10$MrXAnXG8cWH0BnQcwYOIxOx3sC6oMg8H.Mk8dRQzCqDWcp8lUPlvC', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 200, 300, 200, 'seti_1Lzsx7Lvd118Nt671KT8oUuE', '2022-10-29 15:56:14', '2022-11-22 06:05:45'),
(2, 'advertiser2', 'advertiser2@gmail.com', 'advertiser2', NULL, 'Bangladesh', 'Acrra', '', '', '', '88023434534543', '', '$2y$10$jl7nwa/vRdxsGMceMyFAl.Arc86fx7FSJT97l6as06Oah88m3pi.u', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 300, 0, 300, 'seti_1M0ImVLvd118Nt67PsvSwWcI', '2022-11-04 05:49:23', '2022-11-09 00:25:44'),
(3, 'Zakir Hossen', 'zakirhoss12345@gmail.com', 'zakirhossen', NULL, 'Bangladesh', 'Kushtia', 'Company Name', 'Company name full', '7000', '880234234234234', '880', '$2y$10$KhJgEHrLU6RI6MuHMsvEBO2OAS8J1HubKyIa/kP39OsWhY7WM4nT.', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 400, 0, 400, 'seti_1M3LrwLvd118Nt67wE1sAAJN', '2022-11-12 15:30:31', '2022-11-12 15:44:21'),
(4, 'Advertiser Tester 1', 'advertisertest1@gmail.com', 'Advertiser2advtester1', NULL, 'Bangladesh', 'Kushtia', 'Company Name1', 'Leadspaid', '7001', '880234234234234', '880', '$2y$10$hDk9.2dZnd7nQbRCxo.CrOxQDtaIVsNWbafDsWNkTfNywROwXXdmG', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-11-12 16:30:52', '2022-11-12 16:30:52'),
(5, 'Zakir Hossen', 'advertisertest12@gmail.com', 'advertisertest1', NULL, 'Bangladesh', 'Accra', 'Zakirhossen', 'Advertiser Tester', '7000', '880435345345345', '880', '$2y$10$L6LK1G8ESeiqv1/e.W6SoOApdoWd4voK8Has/ZzK7q9Y90vkH5y9u', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 300, 0, 300, 'seti_1M3Ng1Lvd118Nt67jPJiGGN0', '2022-11-12 17:39:00', '2022-11-13 21:24:52'),
(6, 'Advertiser Tester K', 'advertisertest13@gmail.com', 'advertisertest3', NULL, 'Bangladesh', 'Accra', 'Zakir Hossen 2', 'Advertiser Tester', '33243', '880435345345345', '880', '$2y$10$JokgwlCMZpM9Ge4vbEaenOAjk5fSlS4Qs9.1QVxrpuvGSp7oDMM7a', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 500, 0, 500, 'seti_1M3NkFLvd118Nt67NrHRd5zQ', '2022-11-12 17:43:50', '2022-11-12 17:44:22'),
(7, 'Advertiser Tester L', 'advertisertest14@gmail.com', 'advertisertest4', NULL, 'Anguilla', 'Accra', 'Zakir Hossen 3', 'Advertiser Tester L', '4343', '8804353453465345', '880', '$2y$10$e92BMfX06273T8Q1iYoHv.WrjvcUefb/nKTrd4Rkg./5CdHnFVOAW', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 100, 50, 100, 'seti_1M3NufLvd118Nt67QhnkdlUK', '2022-11-12 17:48:04', '2022-11-15 10:49:50'),
(8, 'tyt', 'arun.saba@premiumleads.co', 'publisher', NULL, 'Singapore', 'sd', NULL, '456456', '456fgdf', '654565544', '65', '$2y$10$R6vGHCaPKnZzW98tK1w5eesY5Bn4U5KKDxqWgu55ZWjxJhIpDEI4i', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-11-16 03:12:00', '2022-11-16 03:12:00'),
(9, 'asd', 'nandhini@premiumleads.co', 'advertiser6', NULL, 'Singapore', 'Singapore', 'sdf', 'sdfdsf dgdfgfdg', '332038', '6590909090', '65', '$2y$10$2IBPmTY6AgtS1sRnb4ia6.mWoS6SDtZClE9yg4mCPttH2GgjdNlZG', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-11-18 09:51:44', '2022-11-18 09:51:44'),
(10, 'Addfg', 'marketing@nxgloimmigration.com.sg', 'advertiser_1', NULL, 'Singapore', 'Singapore', 'dfgdfg', 'sdfdsf dfsdf', '332038', '658978978978', '65', '$2y$10$WRaOYIwbD54mzSFu./EyUuCZt6ztI9vvQ2zOx2MWWVcrF4adPyiPi', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-11-21 09:51:42', '2022-11-21 09:51:42'),
(11, 'Advertiser Test', 'arunsaba1@premiumleads.co', 'advertiser_test', NULL, 'Singapore', 'Singapore', 'Advertiser Test', 'sdfdsf dgdfgfdg', '330000', '6590909090', '65', '$2y$10$aY3Jx89gQkWn2lnQzTPokeyGrdvUn4fCqDUpyDYbggsPwwDCUVhpm', '0.00000000', 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-11-23 03:16:37', '2022-11-23 03:16:37');

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
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `daily_budget` decimal(11,2) NOT NULL,
  `target_country` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_city` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_type` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_placements` text COLLATE utf8mb4_unicode_ci,
  `target_categories` text COLLATE utf8mb4_unicode_ci,
  `service_sell_buy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) NOT NULL,
  `website_url` text COLLATE utf8mb4_unicode_ci,
  `social_media_page` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '0' COMMENT '0: off, 1: active',
  `delivery` tinyint(1) DEFAULT '0' COMMENT '0: off, 1: active',
  `approve` tinyint(1) DEFAULT '0' COMMENT 'admin approval default 0 { 0: No, 1: Yes }',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `advertiser_id`, `name`, `start_date`, `end_date`, `daily_budget`, `target_country`, `target_city`, `target_type`, `target_placements`, `target_categories`, `service_sell_buy`, `keywords`, `form_id`, `website_url`, `social_media_page`, `status`, `delivery`, `approve`, `created_at`, `updated_at`) VALUES
(1, 1, 'Campaign Testing', '2022-11-01', '2022-11-30', '21.00', 'India', 'Patiala', 'narrow', '[\"facebook.com\"]', NULL, 'Sell or Buy in', 'passport1', 1, 'Website URLWebsite URLWebsite URLWebsite URL', '0', 0, NULL, 1, '2022-11-07 04:40:38', '2022-11-21 15:39:03'),
(2, 1, 'Sgpr test', '2022-11-01', '2022-11-07', '21.00', 'India', 'Patiala', 'narrow', '[\"google.com\",\"facebook.com\"]', NULL, 'test 5', NULL, 1, 'aa', NULL, 1, 1, 1, '2022-11-07 05:25:01', '2022-11-21 05:30:50'),
(3, 1, 'Tejinder Singh', '2022-11-01', '2022-11-07', '21.00', 'India', 'Patiala', 'broad', '[\"google.com\",\"facebook.com\"]', NULL, NULL, 'passport1', 1, NULL, NULL, 0, 1, 1, '2022-11-07 05:25:33', '2022-11-22 05:31:28'),
(5, 1, 'Online Test', '2022-11-01', NULL, '100.00', 'Burundi', 'Patiala', 'narrow', '[\"google.com\",\"facebook.com\"]', NULL, 'Sell or Buy in', 'tag 1,tag 2', 1, 'www.lead.com', 'Social Media Page', 0, 1, 1, '2022-11-11 10:01:12', '2022-11-21 05:30:54'),
(6, 1, 'SGPR_Apply_SG_Broad', '2022-11-21', NULL, '1000.00', 'Singapore', 'Singapore', 'broad', NULL, NULL, 'singapore Pr application services', NULL, 7, 'www.a1-immigration.sg', 'https://facebook.com/aA1-Immigration-Consultancy-105470548656107', 1, 1, 1, '2022-11-21 10:12:34', '2022-11-22 05:31:26');

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

INSERT INTO `campaign_forms` (`id`, `advertiser_id`, `form_name`, `company_name`, `company_logo`, `form_title`, `offer_desc`, `youtube_1`, `youtube_2`, `youtube_3`, `video_1`, `video_2`, `video_3`, `image_1`, `image_2`, `image_3`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Form 1', 'Ng Glow', NULL, 'APPLY SINGAPORE PR', 'Singapore’s Leading PR & Immigrations Specialist | Your Residency, Our Responsibility.', 'https://www.youtube.com/embed/X1QJGzvyoZI', 'https://www.youtube.com/watch?v=dceVOSrnuoM', NULL, NULL, NULL, NULL, '63764b46b62b31668696902.jpg', NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Company\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Email\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Your Phone\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Message\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Services\",\"option_1\":\"1\",\"option_2\":\"2\",\"option_3\":\"3\",\"option_4\":\"4\"}', 1, '2022-11-11 10:00:58', '2022-11-11 10:00:58'),
(2, 1, 'Judah Calhoun', 'Doyle Swanson Associates', NULL, 'Sapiente quam volupt', 'Debitis ut anim magn', '637789af09c2a1668778415.mp4', '637789af0a5801668778415.mp4', '637789af0af4c1668778415.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Aperiam amet ut ut\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Aspernatur id dolore\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Ullam qui eos quide\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Reprehenderit rem e\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Et voluptas consecte\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-18 13:33:35', '2022-11-18 13:33:35'),
(3, 1, 'Jared Bartlett', 'Hood Stark Associates', NULL, 'Mollit et sunt minim', 'Qui veritatis velit', '63778a088073a1668778504.mp4', '63778a0885bd81668778504.mp4', '63778a08863551668778504.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Id enim quis cillum\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Dolores nulla praese\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Velit reprehenderit\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Dolorem aliquip iust\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Voluptas magni iste\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-18 13:35:04', '2022-11-18 13:35:04'),
(4, 1, 'Brenna Garcia', 'Hobbs Cochran Associates', NULL, 'Aliquam blanditiis e', 'Autem adipisci ipsum', '63778a49ccdab1668778569.mp4', '63778a49cdfee1668778569.mp4', '63778a49ce5731668778569.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Ut provident sed te\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Est rerum eos est c\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Excepturi aut exerci\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Similique harum face\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Delectus debitis ha\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-18 13:36:09', '2022-11-18 13:36:09'),
(5, 1, 'Brenna Garcia', 'Hobbs Cochran Associates', NULL, 'Aliquam blanditiis e', 'Autem adipisci ipsum', '63778c8a2908d1668779146.mp4', '63778c8a29a791668779146.mp4', '63778c8a29f861668779146.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Ut provident sed te\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Est rerum eos est c\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Excepturi aut exerci\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Similique harum face\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Delectus debitis ha\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-18 13:45:46', '2022-11-18 13:45:46'),
(6, 1, 'Brenna Garcia', 'Hobbs Cochran Associates', NULL, 'Aliquam blanditiis e', 'Autem adipisci ipsum', '63778ced2b0ac1668779245.mp4', '63778ced2b5d81668779245.mp4', '63778ced2ba541668779245.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Ut provident sed te\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Est rerum eos est c\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Excepturi aut exerci\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"4\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Similique harum face\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"5\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Delectus debitis ha\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-18 13:47:25', '2022-11-18 13:47:25'),
(7, 1, 'Apply Singapore PR', 'a1-immigration.sg', '637b4ec7a3bb81669025479.jpg', 'Apply Singapore PR', 'Unlimited Warranty Till Approval', NULL, NULL, NULL, NULL, NULL, NULL, '637b4ec7a6bbd1669025479.png', '637b4ec7d42e51669025479.png', '637b4ec80fad61669025480.png', '{\"sort\":\"1\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Applicant\'s Full Name\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', '{\"sort\":\"2\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Residential Status\\/ Work Pass in Singapore\",\"option_1\":\"employment Pass \\/ PEP\",\"option_2\":\"SPass\",\"option_3\":\"LTVP \\/ LTVP+ \\/ DP (Spouse)\",\"option_4\":\"Student\"}', '{\"sort\":\"3\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Relationship to Singaporean\\/PR\",\"option_1\":\"No Relationship\",\"option_2\":\"Spouse\",\"option_3\":\"Child\",\"option_4\":\"Aged Parent\"}', '{\"sort\":\"4\",\"question_type\":\"MultipleChoice\",\"question_text\":\"Length of stay in Singapore\",\"option_1\":\"Over 2 Years\",\"option_2\":\"2 Years\",\"option_3\":\"1 Year\",\"option_4\":\"Less than 1 Year\"}', '{\"sort\":\"5\",\"question_type\":\"ShortAnswer\",\"question_text\":\"Inform my results to - Singapore Mobile Number\",\"option_1\":null,\"option_2\":null,\"option_3\":null,\"option_4\":null}', 1, '2022-11-21 10:11:20', '2022-11-21 10:11:20');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_forms_leads`
--

INSERT INTO `campaign_forms_leads` (`id`, `advertiser_id`, `campaign_id`, `publisher_id`, `form_id`, `lgen_date`, `lgen_source`, `lgen_medium`, `lgen_campaign`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'Tejinder', 'Singh', '9023412334', 'email@gmail.com', 'message me ', NULL, '2022-11-09 04:34:21', '2022-11-09 04:34:21'),
(2, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'Arun', 'a@a.com', '123456', 'test@test.com', 'service1', NULL, '2022-11-09 04:34:21', '2022-11-09 04:34:21'),
(3, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji', 'Test', 'cam 5', 'pr ', '2 row 500', '250.00', '2022-11-13 14:25:37', '2022-11-13 14:25:37'),
(4, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji 2', 'Test', 'cam 6', 'pr ', '2 row 500', '250.00', '2022-11-13 14:25:37', '2022-11-13 14:25:37'),
(5, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji', 'Test', 'cam 5', 'pr ', '2 row 500', '250.00', '2022-11-13 14:25:45', '2022-11-13 14:25:45'),
(6, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji 2', 'Test', 'cam 6', 'pr ', '2 row 500', '250.00', '2022-11-13 14:25:45', '2022-11-13 14:25:45'),
(7, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji 3', 'Test', 'cam 5', 'pr ', '3 row 250', '83.33', '2022-11-13 14:35:10', '2022-11-13 14:35:10'),
(8, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji 3', 'Test', 'cam 6', 'pr ', '3 row 250', '83.33', '2022-11-13 14:35:10', '2022-11-13 14:35:10'),
(9, 1, 5, 0, 1, NULL, NULL, NULL, NULL, 'Teji 3', 'Test', 'cam 6', 'pr ', '3 row 250', '83.33', '2022-11-13 14:35:10', '2022-11-13 14:35:10'),
(10, 1, 1, 0, 1, NULL, NULL, NULL, NULL, 'a1', 'b1', 'c1', 'd1', 'e1', '75.00', '2022-11-14 04:57:57', '2022-11-14 04:57:57'),
(37, 1, 2, 1, 1, NULL, NULL, NULL, NULL, 's', 's', 's', 's', '1', NULL, '2022-11-16 13:37:50', '2022-11-16 13:37:50'),
(36, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 13:35:00', '2022-11-16 13:35:00'),
(35, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 13:34:45', '2022-11-16 13:34:45'),
(34, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 13:34:14', '2022-11-16 13:34:14'),
(33, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '1', NULL, '2022-11-16 13:06:55', '2022-11-16 13:06:55'),
(30, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 12:57:52', '2022-11-16 12:57:52'),
(31, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 13:00:40', '2022-11-16 13:00:40'),
(32, 1, 2, 1, 1, NULL, NULL, NULL, NULL, '1', '2', '3', '4', '2', NULL, '2022-11-16 13:01:03', '2022-11-16 13:01:03'),
(38, 1, 1, 0, 1, NULL, NULL, NULL, NULL, 'Teji', 'email_teji', '123456789', 'wwww', 'clear', '0.00', '2022-11-19 06:25:55', '2022-11-19 06:25:55'),
(39, 1, 2, 1, 1, '2022-11-19', 'google', 'cpc', 'abc', 'hero', 'tejinder.email@gmail.com', '+919023412334', 'tesing', '2', NULL, '2022-11-19 10:50:28', '2022-11-19 10:50:28'),
(40, 1, 2, 0, 1, '0000-00-00', 'google', 'check', 'texst', 'teji 1', 'test 2', '123456789', 'this l gen import', 'done', '0.00', '2022-11-19 12:20:15', '2022-11-19 12:20:15'),
(41, 1, 2, 0, 1, '2022-11-19', 'google', 'check', 'texst', 'teji 1', 'test 2', '123456789', 'this l gen import', 'done', '0.00', '2022-11-19 12:20:15', '2022-11-19 12:20:15'),
(42, 1, 2, 0, 1, '0000-00-00', 'google', 'check', 'texst', 'teji 1', 'test 2', '123456789', 'this l gen import', 'done', '0.00', '2022-11-19 12:29:50', '2022-11-19 12:29:50'),
(43, 1, 2, 0, 1, '2022-11-19', 'google', 'check', 'texst', 'teji 1', 'test 2', '123456789', 'this l gen import', 'done', '0.00', '2022-11-19 12:29:50', '2022-11-19 12:29:50'),
(44, 1, 6, 0, 7, '2022-11-20', 'a', 'a', 'a', 'Jayaraman karuppaiah', 'S Pass', 'No Relationship', 'Over 2 years', '86725700', '0.00', '2022-11-21 10:39:46', '2022-11-21 10:39:46'),
(45, 1, 6, 0, 7, '2022-11-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '2022-11-21 10:39:46', '2022-11-21 10:39:46');

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
(1, 1, 1000, '1000.00000000', 'SGD', '0.00000000', '1.00000000', '1000.00000000', '{\"paynow_amount\":{\"field_name\":\"100\",\"type\":\"text\"}}', '0', '', 'FUTVZ83XDMFQ', 0, 2, 0, NULL, '2022-11-01 12:33:51', '2022-11-01 12:34:10');

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
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-07-07 05:44:08'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:23:47'),
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
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"advertises\",\"add\",\"Advertising\",\"ad\",\"ad marketplace\",\"ad network\",\"ad network script\",\"ads\",\"ads network\",\"ads script\",\"advertisement\",\"advertiser\",\"digital ads\",\"online ads\",\"php ad network\",\"publisher\",\"targeted ads\",\"traffic\"],\"description\":\"adsRook has perfectly suited your Business or service provider company. This is a marketplace where advertisers and publishers (webmasters) come together to sell and purchase ad space. Its created to help you launch a professional website with the latest technologies. adsRook allows you to create multiple forms with custom permissions for every single part of your website and control them in an easy manner. Adweeby supports unlimited advertisers, publishers, and advertisements.\",\"social_title\":\"AdsRook\",\"social_description\":\"adsRook has perfectly suited your Business or service provider company. This is a marketplace where advertisers and publishers (webmasters) come together to sell and purchase ad space. Its created to help you launch a professional website with the latest technologies. adsRook allows you to create multiple forms with custom permissions for every single part of your website and control them in an easy manner. Adweeby supports unlimited advertisers, publishers, and advertisements.\",\"image\":\"606aa8c22a4221617602754.png\"}', '2020-07-04 23:42:52', '2021-04-05 03:00:37'),
(2, 'feature.content', '{\"heading\":\"Why do we use it?\",\"sub_heading\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.\"}', '2020-07-05 01:15:40', '2020-07-24 23:31:34'),
(4, 'social_icon.element', '{\"title\":\"Facebook\",\"icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', '2020-07-06 03:09:33', '2020-07-06 03:09:33'),
(5, 'social_icon.element', '{\"id\":\"5\",\"title\":\"Instagram\",\"icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instagram.com\\/\"}', '2020-07-06 03:10:24', '2020-07-06 03:10:50'),
(9, 'about.content', '{\"has_image\":\"1\",\"heading\":\"About Us\",\"image\":\"604470e25a9d61615098082.jpg\"}', '2020-07-07 07:42:33', '2021-03-07 12:21:22'),
(10, 'contact_us.content', '{\"title\":\"a\",\"short_details\":\"as\",\"email_address\":\"as\",\"contact_details\":\"as\",\"contact_number\":\"as\",\"latitude\":\"as\",\"longitude\":\"as\",\"website_footer\":\"qas\"}', '2020-07-12 01:33:45', '2020-07-12 01:34:11'),
(11, 'testimonial.content', '{\"has_image\":\"1\",\"heading\":\"What our client\'s say?\",\"video_title\":\"Watch our promo video\",\"video_link\":\"https:\\/\\/www.youtube.com\\/embed\\/kGbbIMYxsa8\",\"background_image\":\"604c41740a9e51615610228.jpg\"}', '2020-07-24 23:31:56', '2021-03-12 22:37:08'),
(69, 'client.element', '{\"id\":\"69\",\"has_image\":\"1\",\"name\":\"Darrel Ferrell\",\"designation\":\"Architecto\",\"comment\":\"Provident repellendus voluptatum sapiente.Modi soluta ut temporibus minima officia distinctio, dolorem, quia eveniet iste cupiditate nobis? Enim, pariatur ipsa! Blanditiis\",\"image\":\"5f84d8e3ec5981602541795.jpg\"}', '2020-10-12 23:23:43', '2020-10-13 04:29:56'),
(73, 'banner.element', '{\"id\":\"73\",\"has_image\":\"1\",\"title\":\"Low cost\",\"heading\":\"Advertising With Low cost\",\"little_description\":\"Pariatur repudiandae dicta cumque, perferendis minima neque a nostrum totam fugiat at blanditiis est minus ea corporis\",\"button_text\":\"service\",\"url\":\"\\/advertiser\",\"image\":\"5f85f71ea82c81602615070.png\"}', '2020-10-14 00:37:07', '2020-10-16 03:03:41'),
(74, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"Welcome to The Largest Ad Network\",\"short_details\":\"A stage to develop advertisement and income. With this site you can promote your brand wherever people are watching, playing, or engaging.\",\"background_image\":\"604c3ce7f12b71615609063.jpg\"}', '2020-10-08 18:39:19', '2021-03-15 05:42:49'),
(75, 'banner.element', '{\"has_image\":\"1\",\"title\":\"Multiple\",\"heading\":\"Multiple Ad Facility\",\"little_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque velit consectetur vel? Harum aspernatur cupiditate, odio quam culpa aliquid atque, eum nihil,\",\"button_text\":\"Get Now\",\"url\":\"\\/advertiser\",\"image\":\"5f85f7bb98b5f1602615227.png\"}', '2020-10-14 00:53:47', '2020-10-14 00:53:47'),
(76, 'banner.element', '{\"id\":\"76\",\"has_image\":\"1\",\"title\":\"Earnings\",\"heading\":\"Publisher Efficient Earnings\",\"little_description\":\"Pariatur repudiandae dicta cumque, perferendis minima neque a nostrum totam fugiat at blanditiis est minus ea corporis\",\"button_text\":\"Let\'s Go\",\"url\":\"\\/publisher\",\"image\":\"5f85f95fdd4c11602615647.png\"}', '2020-10-14 00:57:50', '2020-10-14 01:00:48'),
(77, 'footer.content', '{\"heading\":\"Ready to go start? It\'s too easy to get start.\",\"copyright\":\"Copyright \\u00a9 2021\",\"button_text\":\"Sign Up\",\"button_link\":\"\\/register\"}', '2021-01-10 04:48:19', '2021-04-06 07:20:55'),
(78, 'breadcrumb.content', '{\"has_image\":\"1\",\"background_image\":\"604c3d596c8f01615609177.jpg\"}', '2021-01-15 22:39:18', '2021-03-12 22:19:37'),
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
(119, 'blog.element', '{\"id\":\"119\",\"has_image\":\"1\",\"title\":\"5 Ways Amazon Pay Reduces Costs and Increases Sales\",\"content\":\"<p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Wouldn\\u2019t it be nice to tap into Amazon\\u2019s customer base, whether you sell on Amazon or not? Amazon is the undisputed juggernaut of online retailers, with over 78% of global customers buying from them in the last six months.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Can other eCommerce retailers benefit from Amazon? Yes, by&nbsp;<a href=\\\"https:\\/\\/www.eventige.com\\/amazon-pay-experts\\\" rel=\\\" noopener\\\" style=\\\"padding: 0px; margin: 0px; outline: 0px; text-decoration-line: underline; color: rgb(142, 91, 199); font-weight: 700; transition: all 0.24s ease-in-out 0s;\\\">adding Amazon Pay<\\/a>&nbsp;to their payment methods. Amazon recently teamed up with Worldpay, a company that processes over 40 billion transactions, worth $1.7 trillion per year. Not only does it increase Amazon\\u2019s reach considerably, but it gives our international merchants the same advantage.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Websites that offer this digital wallet to their international clientele will find it easier to close the purchase. It allows shoppers to pay using their Amazon account without having to re-enter all their contact and shipping info. It\\u2019s already integrated with their Amazon account.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Here are five more reasons why we recommend Amazon Pay to our clients.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">1.&nbsp; Minimize Costs<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><img src=\\\"https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=780&amp;name=Amazon-Pay-Firm.jpg\\\" alt=\\\"Man Using A Mobile Device While Sitting\\\" width=\\\"780\\\" srcset=\\\"https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=390&amp;name=Amazon-Pay-Firm.jpg 390w, https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=780&amp;name=Amazon-Pay-Firm.jpg 780w, https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=1170&amp;name=Amazon-Pay-Firm.jpg 1170w, https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=1560&amp;name=Amazon-Pay-Firm.jpg 1560w, https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=1950&amp;name=Amazon-Pay-Firm.jpg 1950w, https:\\/\\/www.eventige.com\\/hs-fs\\/hubfs\\/Amazon-Pay-Firm.jpg?width=2340&amp;name=Amazon-Pay-Firm.jpg 2340w\\\" sizes=\\\"(max-width: 780px) 100vw, 780px\\\" style=\\\"padding: 0px; margin: 0px; outline: 0px; width: 780px;\\\"><\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Amazon Pay reduces costs in two ways. First, they don\\u2019t charge set up fees or monthly management fees like other payment gateways. That\\u2019s an immediate upfront saving over other payment options.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Secondly, substantial savings come from their fraud detection and prevention technology. By avoiding fraud and the ensuing bad debt, merchants can prevent significant losses.<\\/p><blockquote style=\\\"padding: 1em 0px; margin-top: 36px; margin-bottom: 0px; font-family: Avenir, serif; outline: 0px; position: relative; font-style: italic; font-size: 20px; color: rgb(0, 0, 0);\\\"><p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Since implementing Amazon Pay, we have experienced a 90% decline in fraudulent payment transactions versus some of our other payment methods.<\\/p><span style=\\\"padding: 0px; margin-top: 25px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative; display: block; font-size: 0.75em; line-height: 1.8;\\\">Berj Kacherian, President, AuthenticWatches.com<\\/span><\\/blockquote><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Amazon Pay uses the same fraud protection tech as Amazon.com. For merchants, that means they don\\u2019t get charged for fraud-related charge-backs.<\\/p>\",\"image\":\"601657635b1fe1612076899.jpg\"}', '2021-01-31 01:08:19', '2021-03-07 13:00:41'),
(120, 'blog.element', '{\"id\":\"120\",\"has_image\":\"1\",\"title\":\"What Shopify Features Can Boost Your Sales?\",\"content\":\"<p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">When it comes to improving Shopify sales, all available strategies and Shopify features must be exploited fully. Even though Shopify has provided several highly effective features, a majority of stores fail to take advantage of these functionalities. From abandoned carts to Facebook-Shopify integration, to Shopify experts, to POS, to discount codes, all these aspects can be addressed using Shopify features to boost sales.<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0); font-size: 24px;\\\">&nbsp;<\\/h2><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0); font-size: 24px;\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">How to boost sales using Shopify features<\\/strong><\\/h2><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0); font-size: 24px;\\\">&nbsp;<\\/h2><h3 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0); font-size: 24px;\\\"><span style=\\\"padding: 0px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; color: rgb(0, 0, 0);\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px; font-size: 20px;\\\">Abandoned Cart Recovery<\\/strong><\\/span><\\/h3><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Abandoned cart refers to the unfavorable situation where a customer selects and adds an item to their carts but abandons the process without a purchase. According to the research study by Baymard, average online stores have a cart abandonment rate of 69.23%. Even though this percentage is very high, adopting effective strategies to reduce the rate of abandonment provides you with an invaluable opportunity to increase your Shopify sales. The most effective cart abandonment recovery tactic is to exploit in-built Shopify features.&nbsp;<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">To reduce the high number of abandoned check-outs, you\\u2019ll need to investigate the reasons behind the abandonments. Firstly, some customers can be distracted and forget to complete their purchase. Secondly, a customer can add an item to their cart to check the total price with shipping and taxes. Thirdly, some will intentionally abandon their cart, hoping to capitalize on a discount that may be offered via an abandoned cart email. Regardless of the reason behind the abandonment, customers only add the items they love and want to their carts. This provides you with a window to exploit available strategies to convince or remind the customer to complete the purchase;<\\/p><ul style=\\\"margin-top: 20px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><i style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">Retargeting Ads:<\\/i><\\/strong>&nbsp;The fact that customers liked the product enough to add it to their cart implies that the items in abandoned carts provide you a peek into their wants, needs, likes, and desires. You can employ retargeting ads to recover abandoned carts and boost sales by presenting each customer with the exact products that they\\u2019ve abandoned in their cart and convince them to go back and complete the purchase.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><i style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">Push notifications:<\\/i><\\/strong>&nbsp;Pop-ups are effective for remarketing to specific customers. Using a push notification app in the Shopify App Store, you can send personalized push notifications with special discounts to customers who have abandoned cart enticing to complete the purchase. Ideally, you should send notification within 24 hours before their needs or desires are either satisfied by another store or diminished with time.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><i style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">Email:&nbsp;<\\/i><\\/strong>You have to use a captivating subject to entice your customer to open the email and allow your charming words and discount to work its magic. For the standard Shopify plan, you\\u2019ll have to email each customer manually, which is tedious. You can upgrade to an \\u2018advanced\\u2019 plan or download an abandoned-cart recovery app that emails customers automatically whenever they abandon their cart.<\\/li><\\/ul>\",\"image\":\"601944acb5c671612268716.jpg\"}', '2021-01-31 01:17:06', '2021-03-07 13:00:02'),
(122, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"link\":\"facebook.com\"}', '2021-02-01 02:58:18', '2021-02-01 02:58:18'),
(123, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"link\":\"twitter.com\"}', '2021-02-01 02:58:33', '2021-02-01 02:58:33'),
(124, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"link\":\"linkedin.com\"}', '2021-02-01 02:58:48', '2021-02-01 02:58:48'),
(127, 'policy.element', '{\"heading\":\"Privacy\",\"content\":\"<div class=\\\"content-block\\\" style=\\\"color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div>\"}', '2021-02-02 04:51:09', '2021-02-02 04:51:09');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(128, 'policy.element', '{\"heading\":\"Terms & Condition\",\"content\":\"<div class=\\\"content-block\\\" style=\\\"color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top: 40px; color: rgb(111, 111, 111); font-family: Roboto, sans-serif;\\\"><h3 class=\\\"title\\\" style=\\\"text-align: justify; line-height: 1.3; font-size: 24px; font-family: Heebo, sans-serif; color: rgb(4, 34, 60); word-break: break-word;\\\">Accusantium voluptate quae eveniet sapiente.<\\/h3><p style=\\\"text-align: justify; margin-top: 15px; margin-right: 0px; margin-left: 0px;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptate quae eveniet sapiente. Et eum non officiis dolores sapiente doloribus asperiores necessitatibus? Optio inventore itaque quia asperiores, distinctio praesentium veritatis incidunt quasi. Repudiandae voluptatibus qui corporis voluptatem quam natus, earum, laudantium architecto, reprehenderit corrupti aspernatur nobis. Magni, ipsum hic, nisi totam officiis qui illum accusantium quasi nemo error eum delectus at ab ea voluptatum sit rerum debitis aperiam enim. Temporibus, ullam tempora. Molestiae reiciendis aspernatur voluptate optio? Laborum laudantium assumenda, ex dolorum cumque ullam voluptas commodi mollitia culpa consequuntur placeat a aliquid fugiat quibusdam.<\\/p><\\/div>\"}', '2021-02-02 04:51:58', '2021-02-02 04:51:58'),
(130, 'blog.element', '{\"id\":\"130\",\"has_image\":\"1\",\"title\":\"Top 5 Ways to Grow Your Email List\",\"content\":\"<p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Growing an email list has become a top priority for an organization that knows its relevance. However, it is not so easy to build an email list in a particular niche or to maintain an email list. The email database degrades about 22.5% yearly. This is because your contact email addresses move from one organization to another, people take up new careers, and some would opt-out of your email communication over time.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Therefore, finding creative ways of adding fresh and relevant email contact should be of utmost priority if you want to grow your business. This is why we have come up with the top 5 ways to grow your email list.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">What is Email Marketing?<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><a href=\\\"https:\\/\\/www.eventige.com\\/email-marketing\\\" rel=\\\" noopener\\\" style=\\\"padding: 0px; margin: 0px; outline: 0px; text-decoration-line: underline; color: rgb(142, 91, 199); font-weight: 700; transition: all 0.24s ease-in-out 0s;\\\">Email marketing<\\/a>&nbsp;offers businesses the opportunity to drive sales through online channels and mediums. In email marketing, people use email to promote the services and products of an organization or company. Email marketing is also used in building a relationship between customers, clients, and businesses. And in other forms, email marketing can be used to keep clients and customers informed\\/updated. In Email marketing, customized emails are sent electronically to potential customers.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">Personalized Email Marketing<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Particular groups of customers or a niche can be targeted, and sometimes individuals can also be targeted through email marketing. For instance, some organizations use email marketing to send birthday wishes while at other times, email campaigns are used to send seasonal messages to a particular group of people. Even when sending campaigns, it is important to personalize emails for a better experience.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Personalized email marketing helps a business maintain or develop a relationship with their customers over time. This can result in increased sales, ensures customer loyalty, and increase profitability.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">Best Practices<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Developing your email list is one of the best practices in email marketing. It is important not to buy an email list for the following reason.<\\/p><ul style=\\\"margin-top: 20px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">When you buy an email list, the contact would not know who you are and would most likely classify your campaign as spam. It is important for contact to permit you to send email campaigns to them.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">When you buy an email list, most of the contact would not be in your business niche, so your campaign effort and money may be wasted.<\\/li><\\/ul><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">Other Best Practices Include:<\\/strong><\\/p><ul style=\\\"margin-top: 20px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Strictly adhere to the rules of the CAN-SPAM act. These rules state that you should not use deceptive subjects in your emails. You should also make provisions for un-subscription at the bottom of your email.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">For those doing newsletters you should endeavor to stick to schedules<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">It is vital to optimizing your email to be mobile-friendly. This is because over 70% of emails are accessed through mobile devices.<\\/li><\\/ul><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p>\",\"image\":\"60194468f03301612268648.jpg\"}', '2021-02-02 06:23:56', '2021-03-07 12:57:49'),
(131, 'blog.element', '{\"has_image\":\"1\",\"title\":\"BigCommerce SEO Experts Boost Ranking and Eliminate Errors\",\"content\":\"<p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">If you are launching a new brand, how can you beat a powerhouse brand for Google\'s first page rankings? BigCommerce SEO experts will tell you that it takes time, but it can be done. SEO is a game of tactics and patience. As a leading SEO company, we\\u2019ll divulge some of the secrets to beating big competitors at the online game we call search engine marketing.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">We\\u2019ll use \\u201crunning shoes\\u201d as our product, but the information and tactics will apply to any product or service.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">What is a BigCommerce SEO Expert?<\\/strong><\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Every platform has unique characteristics, and BigCommerce is no exception. The complexities require experience to work through and troubleshoot. You want a company that knows the system.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">However, getting your store running is only part of the solution. Running analytics and providing SEO is just as critical to your brand\\u2019s success. When it comes to SEO, everyone starts at the bottom, whether your company is a startup or an established eCommerce giant launching a new brand.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">SEO agencies are digital marketing companies with experience building and migrating eCommerce sites to BigCommerce. They also provide the necessary SEO services to drive relevant traffic.<br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><br style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\"><\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">What They Do for Your eCommerce Store<\\/strong><\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">If you think of every page of your website as a separate business, then each page must carry its weight and have a perfect score when it comes to SEO.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">The first thing that a BigCommerce SEO company will do is to perform a site crawl or site audit to provide a snapshot of your SEO rankings, keywords, and any errors.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h3 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\"><strong style=\\\"padding: 0px; margin: 0px; outline: 0px;\\\">Technical SEO &amp; SEO Error Management<\\/strong><\\/h3><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">One of the principal functions of a site crawl is uncovering errors on individual pages. These errors can be part of the site code and structure. Sometimes there are hundreds of them throughout the site, and each one must be fixed.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Here is a list of the most common SEO errors.<\\/p><ul style=\\\"margin-top: 20px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\"><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">URL Too Long<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Description Too Long<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Duplicate Content<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Title Too Long<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Description Too Short<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Missing or Invalid H1<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Duplicate Titles<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">4xx Error<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Redirect Chain<\\/li><li style=\\\"padding: 0px 0px 0px 23px; margin-top: 0px; margin-right: 0px; margin-left: 0px; outline: 0px; position: relative;\\\">Missing Canonical Tag<\\/li><\\/ul><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">There are an additional 15 errors that a site crawl can uncover.<\\/p>\",\"image\":\"60447a7c68b6c1615100540.jpg\"}', '2021-03-07 13:02:20', '2021-03-07 13:02:20'),
(132, 'blog.element', '{\"has_image\":\"1\",\"title\":\"3 Reasons to Use BigCommerce Stencil\",\"content\":\"<p style=\\\"padding: 0px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">The road to eCommerce success is paved with defunct legacy themes and platforms. The Magento 1 platform and Blueprint theme are two of the latest examples of legacy technology that outlived their usefulness and will no longer receive technical support. &nbsp;<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Merchants looking for a long-term solution for their stores should consider upgrading to the BigCommerce Stencil theme. We\\u2019ll give you three good reasons why.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">1. Minimal Coding and Faster Changes<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">BigCommerce Stencil framework lets designers and developers redesign the store with minimal coding. Part of the reason is the Browser Sync app BigCommerce includes with the theme. The unique feature of this app is that it enables changes and reviews in real-time, across various devices. That means a developer can line up a tablet and cellphone and see his or her changes instantly on all devices. It\\u2019s a considerable time saver.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Content is simple to edit because there is no coding required. Change headers, links, or any sitewide messages directly in the theme editor.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">2. Build Locally to Save Time<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Developers can build an entire website offline on their local computers. Building locally saves a tremendous amount of time and frustration. Stencil has built-in flexibility where multiple developers can work on the same project simultaneously.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Another advantage of Stencil is that it eliminates the need for a \\u201cGlobal Variable.\\u201d It\\u2019s a programming function common in older themes like Blueprint and responsible for many bugs.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Developers now have the freedom to make changes wherever necessary, using the Handlebars.js language, an extension to the Mustache templating language. They can write less code and reuse variables, significantly reducing the chance for bugs.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">3. Better Efficiency and Faster Speeds<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">The Stencil theme comes equipped with YAML. YAML is an abbreviation of \\u201cYAML Ain\\u2019t Markup Language.\\u201d It\\u2019s a programming language which is human-friendly and plays well with other languages, reducing programming time.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">It also helps page speed. Here\\u2019s why. If you want to load only part of a catalog, say 15 items from a list of 1,000. With the old Blueprint theme, it required loading the entire catalog and then hiding what you didn\\u2019t want the user to see. Loading everything slows down page speed significantly.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">The new theme loads only the portion of the catalog necessary for display. It works with the data in an easy to use, more efficient format.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Stencil also features AMP (Accelerated Mobile Pages) for the best mobile browsing experience. Google up-ranks sites that are AMP enabled, so the site loads faster and ranking higher than non-AMP sites.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">&nbsp;<\\/p><h2 style=\\\"padding: 0px; font-family: Avenir, serif; outline: 0px; color: rgb(0, 0, 0);\\\">Stencil Makes Modern Stores Scalable<\\/h2><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">Changing to the Stencil theme means your store has the most advanced, up-to-date features. Your development team can respond faster to customer demands and technological changes in eCommerce.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">The store-frontend framework provides many options. Wholesalers and retailers can customize their storefront aesthetic and functionality with minimal coding.<\\/p><p style=\\\"padding: 0px; margin-top: 30px; margin-right: 0px; margin-left: 0px; font-family: Avenir, serif; outline: 0px; font-size: 20px; line-height: 36px; color: rgb(54, 54, 54);\\\">There are not that many developers who have Stencil experience. However, our team is certified with BigCommerce. Drop us a line if you have questions or are considering upgrading your store.<\\/p>\",\"image\":\"60447ace14f6f1615100622.jpg\"}', '2021-03-07 13:03:42', '2021-03-07 13:03:43'),
(135, 'login.content', '{\"has_image\":\"1\",\"background_image\":\"604c4097b3e5d1615610007.jpg\"}', '2021-03-09 02:26:25', '2021-03-12 22:33:28'),
(136, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Our medical marketing team has the success\",\"content\":\"<h2 style=\\\"margin-bottom:15px;line-height:1.35;font-size:28px;color:rgb(0,0,0);padding:0px;font-family:\'din2014-regular\', Arial, Helvetica, sans-serif;\\\"><\\/h2><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\"><span style=\\\"color:rgb(54,54,54);\\\">This means that the company you use to market your medical products and pharma goods needs to understand how to navigate successfully through this restricted, congested space. That is exactly what Eventige Media Group has a ton of experience in (and for some of the biggest brands). In this blog, we take an in-depth look into how our medical marketing agency teams grow brands.\\u00a0<\\/span><span style=\\\"color:rgb(54,54,54);\\\">Our medical marketing team has the success it does because of the fact that we start by creating a solid marketing strategy as the foundation of all the formulation, packaging, testing, and implementation into the market. There are many different types of medical and functional CPG products that span the aesthetics, therapy, beauty and prescription sectors; and they all call for a different approach.<\\/span><\\/p><h2 style=\\\"color:rgb(0,0,0);padding:0px;font-family:Avenir, serif;\\\">Medical Marketing Strategy - Starting Out<\\/h2><h2 style=\\\"margin-bottom:15px;line-height:1.35;font-size:28px;color:rgb(0,0,0);padding:0px;font-family:\'din2014-regular\', Arial, Helvetica, sans-serif;\\\"><\\/h2><p style=\\\"margin-top:30px;margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\"><span style=\\\"color:rgb(54,54,54);\\\">Whether talking about buying billboard space or spending some of your marketing budget on digital or social media ads, your products all require a specific approach that is pillared on the strong suits of the company, market perception and understanding of the product(s), and also the the in-market positioning chosen.<\\/span><br \\/><\\/p><p style=\\\"margin-top:30px;margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\">\\u00a0<\\/p><h2 style=\\\"color:rgb(0,0,0);padding:0px;font-family:Avenir, serif;\\\">Using Digital Platforms<\\/h2><h2 style=\\\"margin-bottom:15px;line-height:1.35;font-size:28px;color:rgb(0,0,0);padding:0px;font-family:\'din2014-regular\', Arial, Helvetica, sans-serif;\\\"><\\/h2><p style=\\\"margin-top:30px;margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\">As a major digital marketing company, we have access to a variety of digital tools to really accelerate the growth of your brand. Not only that, but we\\u2019re experts in getting the very most out of each one of them. Let\\u2019s take a look at a few of them now.<\\/p><ul style=\\\"margin-top:20px;font-family:Avenir, serif;font-size:20px;line-height:36px;color:rgb(54,54,54);\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding:0px 0px 0px 23px;\\\"><a href=\\\"https:\\/\\/www.eventige.com\\/hubspot-experts\\\" style=\\\"color:rgb(142,91,199);padding:0px;margin:0px;font-weight:700;\\\"><span style=\\\"font-weight:bolder;padding:0px;margin-top:0px;margin-right:0px;margin-left:0px;\\\">HubSpot<\\/span><\\/a>\\u00a0to help build out the CRM system management<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding:0px 0px 0px 23px;\\\"><a href=\\\"https:\\/\\/www.eventige.com\\/shopify-design-development\\\" style=\\\"color:rgb(142,91,199);padding:0px;margin:0px;font-weight:700;\\\"><span style=\\\"font-weight:bolder;padding:0px;margin-top:0px;margin-right:0px;margin-left:0px;\\\">Shopify<\\/span><\\/a>\\u00a0to get your ecommerce website really firing<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding:0px 0px 0px 23px;\\\"><a href=\\\"https:\\/\\/www.eventige.com\\/klaviyo-expert\\\" style=\\\"color:rgb(142,91,199);padding:0px;margin:0px;font-weight:700;\\\"><span style=\\\"font-weight:bolder;padding:0px;margin-top:0px;margin-right:0px;margin-left:0px;\\\">Klaviyo<\\/span><\\/a>\\u00a0to ensure you get the most out of your email marketing<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;padding:0px 0px 0px 23px;\\\"><a href=\\\"https:\\/\\/www.eventige.com\\/360brandfuel\\\" style=\\\"color:rgb(142,91,199);padding:0px;margin:0px;font-weight:700;\\\"><span style=\\\"font-weight:bolder;padding:0px;margin-top:0px;margin-right:0px;margin-left:0px;\\\">360BrandFuel<\\/span><\\/a>\\u00a0to get the most out of your brand marketing<\\/li><\\/ul><p style=\\\"margin-top:30px;margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\">We leverage the power of these platforms and processes to help drive support for growth, nurturing our customers and developing new areas of market penetration. We have the expertise and experience to show you precisely what works for the full spectrum of medical marketing customers, regardless of the product that is being sold.<\\/p><p style=\\\"margin-top:30px;margin-right:0px;margin-left:0px;color:rgb(54,54,54);font-size:20px;line-height:36px;padding:0px;font-family:Avenir, serif;\\\">\\u00a0<\\/p>\",\"image\":\"60473342bf8fd1615278914.jpg\"}', '2021-03-09 02:35:14', '2021-03-09 02:36:38');

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
(1, 'LeadsPaid', 'USD', '$', 'do-not-reply@viserlab.com', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img src=\"https://i.imgur.com/07O5ySa.png\" style=\"height: 240 !important;width: 338px;margin-bottom: 20px;\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2022 LeadsPaid. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'https://api.infobip.com/api/v3/sendsms/plain?user=demo&password=demo&sender=SiteName&SMSText={{message}}&GSM={{number}}&type=longSMS', '16C79A', '062c4e', '{\"name\":\"php\"}', 0, 1, 0, 1, 1, 0, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'basic', NULL, NULL, '2022-10-28 07:04:03', '0.04000000', '0.02000000', 'demo address', 'arun.saba@premiumleads.co', '+00 123456789', 0, 30, '8f0bb301ef5613');

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
(1, 'HOME', 'home', 'templates.basic.', '[\"features\",\"format\",\"benefits\",\"overview\",\"whychooseUs\",\"testimonial\",\"brands\"]', 1, '2020-07-11 06:23:58', '2021-01-28 02:49:11'),
(2, 'About', 'about-us', 'templates.basic.', '[\"benefits\",\"overview\",\"features\"]', 0, '2020-07-11 06:35:35', '2021-02-02 19:18:17');

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
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0:normal, 1: admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `username`, `image`, `country`, `city`, `company_name`, `postal_code`, `phone`, `country_code`, `password`, `earnings`, `status`, `total_imp`, `total_click`, `ev`, `sv`, `ts`, `tv`, `tsc`, `ver_code`, `ver_code_send_at`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Publisher K', 'publisher1@gmail.com', 'publisher', NULL, 'Bangladesh', 'Acca', NULL, '', '8805464564564564', '', '$2y$10$CBEKYbbiooWrFrJuU3kIn.sGnBb3PqR5kfYztG36OUWT.I.VrRZpC', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, 0, '2022-11-15 14:12:32', '2022-11-15 14:12:32'),
(2, 'MD BAHA UDDIN', 'nicesoftwarebd@gmail.com', 'publisher21', NULL, 'Bangladesh', 'Moulvibazar', 'ytwedsf', '788719', '88001300676724', '880', '$2y$10$XpVrEndENSVql9o/WBqCau0xWcIJy0zzBjTpbekLbtVEakK4H5q.G', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, 0, '2022-11-18 17:13:51', '2022-11-18 17:13:51'),
(3, 'Publisher Admin One', 'publisher.admin@premiumleads.co', 'publisheradmin1', NULL, 'Singapore', 'Singapore', 'Premium Leads Pte. Ltd.', '332038', '6584578616', '65', '$2y$10$DiXlvY.5KIKO8mDdSZAxJOlydbsJ1Lc3Nw5Mvj5PKoFLast.EEYVW', '0.00000000', 1, NULL, NULL, 1, 1, 0, 1, NULL, NULL, NULL, 1, '2022-11-20 08:01:42', '2022-11-20 08:01:42');

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
(3, 3, 0, 'Hi there \r\n \r\nJust checked your leadspaid.com in ahrefs and saw that you could use an authority boost. \r\n \r\nWith our service you will get a guaranteed ahrefs score within just 3 months time. This will increase the organic visibility and strengthen your website authority, thus getting it stronger against G updates as well. \r\n \r\nFor more information, please check our offers \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nThanks and regards \r\nMike Baker\r\n \r\n \r\n \r\nPS: For a limited time, we`ll add ahrefs UR50+ for free.', '2022-11-21 21:59:34', '2022-11-21 21:59:34');

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
(1, NULL, NULL, 'NataliaNivy', 'nataliaNivy@hotmail.com', '77899255', 'Ι want to meеt sеrious mаn... (:', 0, '2022-11-18 06:11:22', '2022-11-18 06:11:22', '2022-11-18 06:11:22'),
(2, NULL, NULL, 'Williamchava', 'no.reply.amart@gmail.com', '56078349', 'Do you want cheap and innovative advertising for little money?', 0, '2022-11-18 14:55:50', '2022-11-18 14:55:50', '2022-11-18 14:55:50'),
(3, NULL, NULL, 'Mike Baker', 'no-replynagplele@gmail.com', '01438020', 'Increase the DR of your leadspaid.com in ahrefs', 0, '2022-11-21 21:59:34', '2022-11-21 21:59:34', '2022-11-21 21:59:34');

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
  `total_budget` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `spent_previous_day` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `deduct` varchar(255) DEFAULT NULL,
  `final_wallet` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_advertiser`
--

INSERT INTO `transactions_advertiser` (`id`, `user_id`, `trx_date`, `init_blance`, `total_budget`, `spent_previous_day`, `deduct`, `final_wallet`, `created_at`, `updated_at`) VALUES
(28, 1, '2022-11-06 09:38:33', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-06 03:38:35', '2022-11-06 03:38:35'),
(29, 2, '2022-11-06 09:38:35', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-06 03:38:35', '2022-11-06 03:38:35'),
(52, 1, '2022-11-07 06:01:01', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-07 14:01:04', '2022-11-07 14:01:04'),
(53, 2, '2022-11-07 06:01:04', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-07 14:01:04', '2022-11-07 14:01:04'),
(54, 1, '2022-11-08 06:01:01', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-08 00:01:04', '2022-11-08 00:01:04'),
(55, 2, '2022-11-08 06:01:04', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-08 00:01:04', '2022-11-08 00:01:04'),
(56, 1, '2022-11-08 06:01:02', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-08 12:01:04', '2022-11-08 12:01:04'),
(57, 2, '2022-11-08 06:01:04', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-08 12:01:04', '2022-11-08 12:01:04'),
(58, 1, '2022-11-09 06:01:02', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-09 00:01:04', '2022-11-09 00:01:04'),
(59, 2, '2022-11-09 06:01:04', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-09 00:01:05', '2022-11-09 00:01:05'),
(60, 1, '2022-11-09 06:24:23', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-09 00:24:25', '2022-11-09 00:24:25'),
(61, 1, '2022-11-09 06:25:04', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-09 00:25:07', '2022-11-09 00:25:07'),
(62, 1, '2022-11-09 06:25:25', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-09 00:25:28', '2022-11-09 00:25:28'),
(63, 1, '2022-11-09 06:25:53', '200.00000000', '200.00000000', '350.00000000', '360.5(350+GST)', '200.00000000', '2022-11-09 00:25:55', '2022-11-09 00:25:55'),
(64, 2, '2022-11-09 06:25:55', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-09 00:25:56', '2022-11-09 00:25:56'),
(65, 1, '2022-11-09 06:01:02', '200.00000000', '500.00000000', '300.00000000', '618(600+GST)', '500.00000000', '2022-11-09 04:01:04', '2022-11-09 04:01:04'),
(66, 2, '2022-11-09 06:01:01', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-09 12:01:02', '2022-11-09 12:01:02'),
(67, 1, '2022-11-09 06:01:01', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-09 16:01:04', '2022-11-09 16:01:04'),
(68, 2, '2022-11-10 06:01:02', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-10 00:01:03', '2022-11-10 00:01:03'),
(69, 1, '2022-11-10 06:01:02', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-10 04:01:04', '2022-11-10 04:01:04'),
(70, 2, '2022-11-10 06:01:02', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-10 12:01:02', '2022-11-10 12:01:02'),
(71, 1, '2022-11-10 06:01:01', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-10 16:01:04', '2022-11-10 16:01:04'),
(72, 2, '2022-11-11 06:01:01', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-11 00:01:02', '2022-11-11 00:01:02'),
(73, 1, '2022-11-11 06:01:02', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-11 04:01:05', '2022-11-11 04:01:05'),
(74, 2, '2022-11-11 06:01:02', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-11 12:01:03', '2022-11-11 12:01:03'),
(75, 1, '2022-11-11 06:01:01', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-11 16:01:04', '2022-11-11 16:01:04'),
(76, 2, '2022-11-12 06:01:02', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-12 00:01:03', '2022-11-12 00:01:03'),
(77, 1, '2022-11-12 06:01:01', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-12 04:01:04', '2022-11-12 04:01:04'),
(78, 2, '2022-11-12 06:01:01', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-12 12:01:02', '2022-11-12 12:01:02'),
(79, 3, '2022-11-12 09:44:21', '0.00000000', '400.00000000', '0.00000000', '412(400+GST)', '400.00000000', '2022-11-12 15:44:23', '2022-11-12 15:44:23'),
(80, 1, '2022-11-12 06:01:02', '500.00000000', '500.00000000', '300.00000000', '309(300+GST)', '500.00000000', '2022-11-12 16:01:04', '2022-11-12 16:01:04'),
(81, 1, '2022-11-12 06:59:02', '500.00000000', '500.00000000', '300.00000000', '309(300+3% service charge)', '500.00000000', '2022-11-12 16:59:04', '2022-11-12 16:59:04'),
(82, 5, '2022-11-12 11:40:16', '0.00000000', '300.00000000', '0.00000000', '309(300+3% service charge)', '300.00000000', '2022-11-12 17:40:18', '2022-11-12 17:40:18'),
(83, 6, '2022-11-12 11:44:22', '0.00000000', '500.00000000', '0.00000000', '515(500+3% service charge)', '500.00000000', '2022-11-12 17:44:24', '2022-11-12 17:44:24'),
(84, 7, '2022-11-12 01:54:58', '100.00000000', '100.00000000', '0.00000000', '0', '100.00000000', '2022-11-12 17:54:58', '2022-11-12 17:54:58'),
(85, 7, '2022-11-12 01:55:13', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-12 17:55:16', '2022-11-12 17:55:16'),
(86, 7, '2022-11-12 06:59:01', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-12 22:59:03', '2022-11-12 22:59:03'),
(87, 2, '2022-11-13 06:59:01', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-13 00:59:02', '2022-11-13 00:59:02'),
(88, 3, '2022-11-13 06:59:02', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-13 00:59:03', '2022-11-13 00:59:03'),
(89, 1, '2022-11-13 06:59:01', '500.00000000', '500.00000000', '300.00000000', '309(300+3% service charge)', '500.00000000', '2022-11-13 04:59:04', '2022-11-13 04:59:04'),
(90, 7, '2022-11-13 06:59:02', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-13 10:59:04', '2022-11-13 10:59:04'),
(91, 2, '2022-11-13 06:59:02', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-13 12:59:02', '2022-11-13 12:59:02'),
(92, 3, '2022-11-13 06:59:02', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-13 12:59:03', '2022-11-13 12:59:03'),
(93, 5, '2022-11-13 08:28:11', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-13 14:28:12', '2022-11-13 14:28:12'),
(94, 1, '2022-11-13 06:00:00', '500.00000000', '500.00000000', '300.00000000', '309(300+3% service charge)', '500.00000000', '2022-11-13 16:00:04', '2022-11-13 16:00:04'),
(95, 5, '2022-11-14 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-13 17:00:03', '2022-11-13 17:00:03'),
(96, 2, '2022-11-14 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-14 00:00:03', '2022-11-14 00:00:03'),
(97, 3, '2022-11-14 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-14 00:00:04', '2022-11-14 00:00:04'),
(98, 1, '2022-11-14 05:51:29', '500.00000000', '500.00000000', '300.00000000', '309(300+3% service charge)', '500.00000000', '2022-11-14 03:51:32', '2022-11-14 03:51:32'),
(99, 1, '2022-11-14 06:00:00', '500.00000000', '200.00000000', '300.00000000', '0', '200.00000000', '2022-11-14 04:00:03', '2022-11-14 04:00:03'),
(100, 1, '2022-11-14 06:18:26', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-14 04:18:29', '2022-11-14 04:18:29'),
(101, 7, '2022-11-14 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-14 10:00:04', '2022-11-14 10:00:04'),
(102, 2, '2022-11-15 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-15 00:00:03', '2022-11-15 00:00:03'),
(103, 3, '2022-11-15 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-15 00:00:03', '2022-11-15 00:00:03'),
(104, 1, '2022-11-15 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-15 04:00:05', '2022-11-15 04:00:05'),
(105, 7, '2022-11-15 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-15 10:00:05', '2022-11-15 10:00:05'),
(106, 2, '2022-11-16 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-16 00:00:03', '2022-11-16 00:00:03'),
(107, 3, '2022-11-16 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-16 00:00:04', '2022-11-16 00:00:04'),
(108, 1, '2022-11-16 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-16 04:00:04', '2022-11-16 04:00:04'),
(109, 7, '2022-11-16 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-16 10:00:04', '2022-11-16 10:00:04'),
(110, 2, '2022-11-17 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-17 00:00:03', '2022-11-17 00:00:03'),
(111, 3, '2022-11-17 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-17 00:00:04', '2022-11-17 00:00:04'),
(112, 1, '2022-11-17 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-17 04:00:05', '2022-11-17 04:00:05'),
(113, 7, '2022-11-17 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-17 10:00:04', '2022-11-17 10:00:04'),
(114, 2, '2022-11-18 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-18 00:00:02', '2022-11-18 00:00:02'),
(115, 3, '2022-11-18 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-18 00:00:03', '2022-11-18 00:00:03'),
(116, 1, '2022-11-18 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-18 04:00:05', '2022-11-18 04:00:05'),
(117, 7, '2022-11-18 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-18 10:00:04', '2022-11-18 10:00:04'),
(118, 2, '2022-11-19 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-19 00:00:03', '2022-11-19 00:00:03'),
(119, 3, '2022-11-19 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-19 00:00:03', '2022-11-19 00:00:03'),
(120, 1, '2022-11-19 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-19 04:00:05', '2022-11-19 04:00:05'),
(121, 7, '2022-11-19 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-19 10:00:05', '2022-11-19 10:00:05'),
(122, 2, '2022-11-20 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-20 00:00:03', '2022-11-20 00:00:03'),
(123, 3, '2022-11-20 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-20 00:00:03', '2022-11-20 00:00:03'),
(124, 1, '2022-11-20 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-20 04:00:06', '2022-11-20 04:00:06'),
(125, 7, '2022-11-20 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-20 10:00:04', '2022-11-20 10:00:04'),
(126, 2, '2022-11-21 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-21 00:00:03', '2022-11-21 00:00:03'),
(127, 3, '2022-11-21 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-21 00:00:03', '2022-11-21 00:00:03'),
(128, 1, '2022-11-21 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-21 04:00:05', '2022-11-21 04:00:05'),
(129, 7, '2022-11-21 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-21 10:00:04', '2022-11-21 10:00:04'),
(130, 2, '2022-11-22 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-22 00:00:03', '2022-11-22 00:00:03'),
(131, 3, '2022-11-22 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-22 00:00:04', '2022-11-22 00:00:04'),
(132, 1, '2022-11-22 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-22 04:00:05', '2022-11-22 04:00:05'),
(133, 7, '2022-11-22 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-22 10:00:05', '2022-11-22 10:00:05'),
(134, 5, '2022-11-22 18:49:26', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-22 12:49:27', '2022-11-22 12:49:27'),
(135, 1, '2022-11-23 06:00:00', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-22 22:00:04', '2022-11-22 22:00:04'),
(136, 2, '2022-11-23 06:00:00', '300.00000000', '300.00000000', '0.00000000', '0', '300.00000000', '2022-11-23 00:00:02', '2022-11-23 00:00:02'),
(137, 3, '2022-11-23 06:00:00', '400.00000000', '400.00000000', '0.00000000', '0', '400.00000000', '2022-11-23 00:00:03', '2022-11-23 00:00:03'),
(138, 1, '2022-11-23 13:53:12', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-23 05:53:14', '2022-11-23 05:53:14'),
(139, 1, '2022-11-23 13:53:19', '200.00000000', '200.00000000', '300.00000000', '309(300+3% service charge)', '200.00000000', '2022-11-23 05:53:21', '2022-11-23 05:53:21'),
(140, 7, '2022-11-23 06:00:00', '100.00000000', '100.00000000', '50.00000000', '51.5(50+3% service charge)', '100.00000000', '2022-11-23 10:00:04', '2022-11-23 10:00:04');

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
(146, NULL, 1, '172.70.92.192', 'Singapore - - Singapore - SG ', 'Chrome', 'Windows 10', '103.839', '1.297', 'Singapore', 'SG', '2022-11-23 09:15:13', '2022-11-23 09:15:13');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `advertiser_password_resets`
--
ALTER TABLE `advertiser_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `campaign_forms`
--
ALTER TABLE `campaign_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `campaign_forms_leads`
--
ALTER TABLE `campaign_forms_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price_plans`
--
ALTER TABLE `price_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publisher_ads`
--
ALTER TABLE `publisher_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher_password_resets`
--
ALTER TABLE `publisher_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions_advertiser`
--
ALTER TABLE `transactions_advertiser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

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
