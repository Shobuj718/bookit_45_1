-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 06:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miyn`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_infos`
--

CREATE TABLE `billing_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `service_name` text COLLATE utf8mb4_unicode_ci,
  `staff_name` text COLLATE utf8mb4_unicode_ci,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `requested_date` text COLLATE utf8mb4_unicode_ci,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'upcoming',
  `slug` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `category_id`, `service_id`, `staff_id`, `service_name`, `staff_name`, `first_name`, `last_name`, `email`, `subject`, `message`, `requested_date`, `confirmed`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(41, 3, 7, 6, 'Database design edited again', 'Zim', 'Mark', 'Kevin', 'abc@abc.com', 'Need Database design', 'Hi,\nI need a database design for a system\nMark', 'a:2:{s:10:\"01/22/2019\";a:1:{i:0;s:8:\"09:10 AM\";}s:10:\"01/30/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c4042bfa57705c4042bfa57a85c4042bfa57df5c4042bfa58155c4042bfa584b', '2019-01-16 21:54:23', '2019-01-16 21:54:23'),
(42, 3, 7, 6, 'Database design edited again', 'Zim', 'Mark', 'Kevin', 'abc@abc.com', 'Need Database design', 'Hi,\nI need a database design for a system\nMark', 'a:2:{s:10:\"01/22/2019\";a:1:{i:0;s:8:\"09:10 AM\";}s:10:\"01/30/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c40431e4d6435c40431e4d67a5c40431e4d6b05c40431e4d6e75c40431e4d71d', '2019-01-16 21:55:58', '2019-01-16 21:55:58'),
(43, 3, 9, 6, 'Web design', 'Zim', 'Dev', 'Test', 'tst1@netmow.com', 'test', 'This is test msg', 'a:1:{s:10:\"01/19/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c42f496589f05c42f49658a285c42f49658a5e5c42f49658a945c42f49658acb', '2019-01-18 22:57:42', '2019-01-18 22:57:42'),
(44, 3, 9, 6, 'Web design', 'Zim', 'Dev', 'Test', 'tst1@netmow.com', 'test', 'This is test msg', 'a:1:{s:10:\"01/19/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c42f49c04be55c42f49c04c1c5c42f49c04c535c42f49c04c895c42f49c04cbf', '2019-01-18 22:57:48', '2019-01-18 22:57:48'),
(45, 3, 7, 6, 'Database design edited again', 'Zim', 'werwe', 'rwerw', 'erwer', 'rer', 'wrwerw', 'a:0:{}', 0, 'upcoming', '5c46a50deb1a85c46a50deb1df5c46a50deb2165c46a50deb24c5c46a50deb282', '2019-01-21 18:07:25', '2019-01-21 18:07:25'),
(46, 3, 7, 6, 'Database design edited again', 'Zim', 'werwe', 'rwerw', 'erwer', 'rer', 'wrwerw', 'a:0:{}', 0, 'upcoming', '5c46a50fe45045c46a50fe453b5c46a50fe455a5c46a50fe45915c46a50fe45c8', '2019-01-21 18:07:27', '2019-01-21 18:07:27'),
(47, 3, 7, 6, 'Database design edited again', 'Zim', 'gdfg', 'gdfg', 'fdgfg', 'drgrg', 'ergg', 'a:1:{s:10:\"01/22/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c46a59019eb25c46a59019eea5c46a59019f0f5c46a59019f465c46a59019f7f', '2019-01-21 18:09:36', '2019-01-21 18:09:36'),
(48, 3, 7, 6, 'Database design edited again', 'Zim', 'gdfg', 'gdfg', 'fdgfg', 'drgrg', 'ergg', 'a:1:{s:10:\"01/22/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c46a5d4254c35c46a5d4254fc5c46a5d4255325c46a5d4255685c46a5d42559f', '2019-01-21 18:10:44', '2019-01-21 18:10:44'),
(49, 3, 7, 6, 'Database design edited again', 'Zim', 'gdfg', 'gdfg', 'fdgfg', 'drgrg', 'ergg', 'a:1:{s:10:\"01/22/2019\";a:2:{i:0;s:8:\"10:20 AM\";i:1;s:8:\"11:30 AM\";}}', 0, 'upcoming', '5c46a5d4ddfd95c46a5d4de0185c46a5d4de0535c46a5d4de08d5c46a5d4de0c6', '2019-01-21 18:10:44', '2019-01-21 18:10:44'),
(50, 3, 7, 6, 'Database design edited again', 'Zim', 'ABC', 'EF', 'tst1@netmow.com', 'Test', 'hey this is a test', 'a:3:{s:10:\"02/26/2019\";a:1:{i:0;s:8:\"10:20 AM\";}s:10:\"02/28/2019\";a:1:{i:0;s:8:\"10:20 AM\";}s:10:\"02/27/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5c73603bcdcde5c73603bcdd1a5c73603bcdd545c73603bcdd8c5c73603bcddc2', '2019-02-24 16:25:47', '2019-02-24 16:25:47'),
(51, 3, 7, 7, 'Database design edited again', 'Gilfoyle', 'Jakarea', 'Parvez', 'sendinfo98@gmail.com', 'Hello bd', 'No message from here', 'a:1:{s:10:\"04/25/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5cb735e75de4e5cb735e75de8b5cb735e75dec75cb735e75df035cb735e75df3f', '2019-04-17 04:19:19', '2019-04-17 04:19:19'),
(52, 3, 7, 7, 'Database design edited again', 'Gilfoyle', 'Jakarea', 'Parvez', 'sendinfo98@gmail.com', 'Hello bd', 'No message from here', 'a:1:{s:10:\"04/25/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5cb735ea7238a5cb735ea723c55cb735ea723fc5cb735ea7243a5cb735ea72476', '2019-04-17 04:19:22', '2019-04-17 04:19:22'),
(53, 3, 7, 7, 'Database design edited again', 'Gilfoyle', 'Jakarea', 'Parvez', 'sendinfo98@gmail.com', 'Hello bd', 'No message from here', 'a:1:{s:10:\"04/25/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5cb735f01b5775cb735f01b5af5cb735f01b5e65cb735f01b61c5cb735f01b652', '2019-04-17 04:19:28', '2019-04-17 04:19:28'),
(54, 3, 7, 7, 'Database design edited again', 'Gilfoyle', 'Jakarea', 'Parvez', 'sendinfo98@gmail.com', 'Hello bd', 'No message from here', 'a:1:{s:10:\"04/25/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5cb735f3498c45cb735f3498fc5cb735f3499335cb735f34996a5cb735f3499a0', '2019-04-17 04:19:31', '2019-04-17 04:19:31'),
(55, 3, 7, 7, 'Database design edited again', 'Gilfoyle', 'Jakarea', 'Parvez', 'sendinfo98@gmail.com', 'Hello bd', 'No message from here', 'a:1:{s:10:\"04/25/2019\";a:1:{i:0;s:8:\"10:20 AM\";}}', 0, 'upcoming', '5cb7360606b4d5cb7360606b885cb7360606bc25cb7360606bfb5cb7360606c34', '2019-04-17 04:19:50', '2019-04-17 04:19:50'),
(56, 3, 7, 6, 'Database design edited again', 'Zim', NULL, NULL, NULL, NULL, NULL, 'a:0:{}', 0, 'upcoming', '5cbd857eded325cbd857eded6a5cbd857ededa15cbd857ededd75cbd857edee0e', '2019-04-21 23:12:30', '2019-04-21 23:12:30'),
(57, 3, 7, 6, 'Database design edited again', 'Zim', NULL, NULL, NULL, NULL, NULL, 'a:0:{}', 0, 'upcoming', '5cbd85816c1fd5cbd85816c23a5cbd85816c2765cbd85816c2b15cbd85816c2ec', '2019-04-21 23:12:33', '2019-04-21 23:12:33'),
(58, 3, 7, 6, 'Database design edited again', 'Zim', NULL, NULL, NULL, NULL, NULL, 'a:0:{}', 0, 'upcoming', '5cbd8582f24b15cbd8582f24ea5cbd8582f25205cbd8582f255e5cbd8582f2594', '2019-04-21 23:12:35', '2019-04-21 23:12:35'),
(59, 3, 13, 7, 'Test', 'Gilfoyle', 'asdf', 'asdf', 'shobujislam1989@gmail.com', 'asdf', 'asdf', 'a:0:{}', 0, 'upcoming', '5cc082a1595115cc082a1595155cc082a1595175cc082a1595185cc082a159519', '2019-04-24 09:37:05', '2019-04-24 09:37:05'),
(60, 3, 13, 7, 'Test', 'Gilfoyle', 'rana', 'mia', 'shobujislam1989@gmail.com', 'test message', 'this message come from rana', 'a:0:{}', 0, 'upcoming', '5cc08980aa1fc5cc08980aa2015cc08980aa2035cc08980aa2055cc08980aa207', '2019-04-24 10:06:26', '2019-04-24 10:06:26'),
(61, 3, 13, 7, 'Test', 'Gilfoyle', 'rana1', 'mia1', 'shobujislam1989@gmail.com', 'test message1', 'this message come from rana1', 'a:0:{}', 0, 'upcoming', '5cc08e55b4ca35cc08e55b4cab5cc08e55b4cae5cc08e55b4cb15cc08e55b4cb3', '2019-04-24 10:27:03', '2019-04-24 10:27:03'),
(62, 3, 13, 7, 'Test', 'Gilfoyle', 'rana12', 'mia12', 'shobujislam1989@gmail.com', 'test message12', 'this message come from rana12', 'a:0:{}', 0, 'upcoming', '5cc08f22a8d735cc08f22a8d765cc08f22a8d785cc08f22a8d795cc08f22a8d7b', '2019-04-24 10:30:26', '2019-04-24 10:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `booking_options`
--

CREATE TABLE `booking_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_policies`
--

CREATE TABLE `booking_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL,
  `profession_id` int(10) UNSIGNED NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `industry_id`, `profession_id`, `secret_key`, `name`, `logo`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '123456', 'Booking App', 'https://app.miyn.net/images/logos/5bc5694a1f2a95bc5acb2071791539681458.png', 'manage your bookings', '2018-10-15 22:33:05', '2018-10-16 03:17:38'),
(2, 6, 1, 1, '1234567', 'AVRGeek', 'https://app.miyn.net/images/logos/5c04a3a1cfcc35c04a6362ad581543808566.jpeg', 'We build home automation product with IOT support, nice and clean web and Android application', '2018-12-02 21:42:03', '2019-01-10 19:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_settings`
--

CREATE TABLE `calendar_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `week_start` int(10) UNSIGNED DEFAULT NULL,
  `increment_hour` int(10) UNSIGNED DEFAULT NULL,
  `increment_minute` int(10) UNSIGNED DEFAULT NULL,
  `weekly_off` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_hour_start` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_hour_end` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_time` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar_settings`
--

INSERT INTO `calendar_settings` (`id`, `business_id`, `created_at`, `updated_at`, `week_start`, `increment_hour`, `increment_minute`, `weekly_off`, `timezone`, `business_hour_start`, `business_hour_end`, `local_time`) VALUES
(1, 2, '2018-12-03 04:29:38', '2019-01-11 19:40:37', 6, 1, 10, 'a:1:{i:0;i:5;}', 'Asia/Dhaka', '08:00 AM', '1:30 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `business_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 1, 'Premium Services', '5bdaab6e548aa', '2018-11-01 01:29:50', '2018-12-02 21:28:33'),
(3, 2, 'Web application', '5c04a8fb02634', '2018-12-02 21:54:35', '2018-12-02 21:54:35'),
(4, 2, 'Android application', '5c04a90bbe45b', '2018-12-02 21:54:51', '2018-12-02 21:54:51'),
(5, 2, 'IOT', '5c04a9128c52e', '2018-12-02 21:54:58', '2018-12-02 21:54:58'),
(6, 1, 'Super Services', '5c42fd4e7923d', '2019-01-18 23:34:54', '2019-01-18 23:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_phone` tinyint(1) DEFAULT '0',
  `display_address` tinyint(1) DEFAULT '0',
  `display_website_url` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `country_id`, `user_id`, `phone`, `address`, `website_url`, `display_phone`, `display_address`, `display_website_url`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1736486064', 'Bokshibazar, Bogra', 'https://faysal-ishtiaq.tk', NULL, 1, NULL, '2018-10-16 04:04:31', '2018-10-16 04:10:04'),
(2, 1, 6, '1617308431', 'Bogura, Bangladesh', 'https://github.com/zim0101', 1, 1, 1, '2018-12-02 21:40:21', '2018-12-02 21:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dialing_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `dialing_code`, `created_at`, `updated_at`) VALUES
(1, 'BD', '+880', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(2, 'BE', '+32', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(3, 'BF', '+226', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(4, 'BG', '+359', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(5, 'BA', '+387', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(6, 'BB', '+1-246', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(7, 'WF', '+681', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(8, 'BL', '+590', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(9, 'BM', '+1-441', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(10, 'BN', '+673', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(11, 'BO', '+591', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(12, 'BH', '+973', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(13, 'BI', '+257', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(14, 'BJ', '+229', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(15, 'BT', '+975', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(16, 'JM', '+1-876', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(17, 'BW', '+267', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(18, 'WS', '+685', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(19, 'BQ', '+599', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(20, 'BR', '+55', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(21, 'BS', '+1-242', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(22, 'JE', '+44-1534', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(23, 'BY', '+375', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(24, 'BZ', '+501', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(25, 'RU', '+7', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(26, 'RW', '+250', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(27, 'RS', '+381', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(28, 'TL', '+670', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(29, 'RE', '+262', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(30, 'TM', '+993', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(31, 'TJ', '+992', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(32, 'RO', '+40', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(33, 'TK', '+690', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(34, 'GW', '+245', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(35, 'GU', '+1-671', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(36, 'GT', '+502', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(37, 'GR', '+30', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(38, 'GQ', '+240', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(39, 'GP', '+590', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(40, 'JP', '+81', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(41, 'GY', '+592', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(42, 'GG', '+44-1481', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(43, 'GF', '+594', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(44, 'GE', '+995', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(45, 'GD', '+1-473', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(46, 'GB', '+44', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(47, 'GA', '+241', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(48, 'SV', '+503', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(49, 'GN', '+224', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(50, 'GM', '+220', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(51, 'GL', '+299', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(52, 'GI', '+350', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(53, 'GH', '+233', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(54, 'OM', '+968', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(55, 'TN', '+216', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(56, 'JO', '+962', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(57, 'HR', '+385', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(58, 'HT', '+509', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(59, 'HU', '+36', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(60, 'HK', '+852', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(61, 'HN', '+504', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(62, 'HM', '+', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(63, 'VE', '+58', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(64, 'PR', '+1-787', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(65, 'PS', '+970', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(66, 'PW', '+680', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(67, 'PT', '+351', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(68, 'SJ', '+47', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(69, 'PY', '+595', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(70, 'IQ', '+964', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(71, 'PA', '+507', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(72, 'PF', '+689', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(73, 'PG', '+675', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(74, 'PE', '+51', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(75, 'PK', '+92', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(76, 'PH', '+63', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(77, 'PN', '+870', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(78, 'PL', '+48', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(79, 'PM', '+508', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(80, 'ZM', '+260', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(81, 'EH', '+212', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(82, 'EE', '+372', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(83, 'EG', '+20', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(84, 'ZA', '+27', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(85, 'EC', '+593', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(86, 'IT', '+39', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(87, 'VN', '+84', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(88, 'SB', '+677', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(89, 'ET', '+251', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(90, 'SO', '+252', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(91, 'ZW', '+263', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(92, 'SA', '+966', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(93, 'ES', '+34', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(94, 'ER', '+291', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(95, 'ME', '+382', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(96, 'MD', '+373', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(97, 'MG', '+261', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(98, 'MF', '+590', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(99, 'MA', '+212', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(100, 'MC', '+377', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(101, 'UZ', '+998', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(102, 'MM', '+95', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(103, 'ML', '+223', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(104, 'MO', '+853', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(105, 'MN', '+976', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(106, 'MH', '+692', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(107, 'MK', '+389', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(108, 'MU', '+230', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(109, 'MT', '+356', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(110, 'MW', '+265', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(111, 'MV', '+960', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(112, 'MQ', '+596', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(113, 'MP', '+1-670', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(114, 'MS', '+1-664', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(115, 'MR', '+222', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(116, 'IM', '+44-1624', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(117, 'UG', '+256', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(118, 'TZ', '+255', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(119, 'MY', '+60', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(120, 'MX', '+52', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(121, 'IL', '+972', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(122, 'FR', '+33', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(123, 'IO', '+246', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(124, 'SH', '+290', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(125, 'FI', '+358', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(126, 'FJ', '+679', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(127, 'FK', '+500', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(128, 'FM', '+691', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(129, 'FO', '+298', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(130, 'NI', '+505', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(131, 'NL', '+31', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(132, 'NO', '+47', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(133, 'NA', '+264', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(134, 'VU', '+678', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(135, 'NC', '+687', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(136, 'NE', '+227', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(137, 'NF', '+672', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(138, 'NG', '+234', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(139, 'NZ', '+64', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(140, 'NP', '+977', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(141, 'NR', '+674', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(142, 'NU', '+683', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(143, 'CK', '+682', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(144, 'CI', '+225', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(145, 'CH', '+41', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(146, 'CO', '+57', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(147, 'CN', '+86', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(148, 'CM', '+237', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(149, 'CL', '+56', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(150, 'CC', '+61', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(151, 'CA', '+1', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(152, 'CG', '+242', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(153, 'CF', '+236', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(154, 'CD', '+243', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(155, 'CZ', '+420', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(156, 'CY', '+357', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(157, 'CX', '+61', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(158, 'CR', '+506', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(159, 'CW', '+599', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(160, 'CV', '+238', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(161, 'CU', '+53', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(162, 'SZ', '+268', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(163, 'SY', '+963', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(164, 'SX', '+599', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(165, 'KG', '+996', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(166, 'KE', '+254', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(167, 'SS', '+211', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(168, 'SR', '+597', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(169, 'KI', '+686', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(170, 'KH', '+855', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(171, 'KN', '+1-869', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(172, 'KM', '+269', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(173, 'ST', '+239', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(174, 'SK', '+421', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(175, 'KR', '+82', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(176, 'SI', '+386', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(177, 'KP', '+850', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(178, 'KW', '+965', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(179, 'SN', '+221', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(180, 'SM', '+378', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(181, 'SL', '+232', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(182, 'SC', '+248', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(183, 'KZ', '+7', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(184, 'KY', '+1-345', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(185, 'SG', '+65', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(186, 'SE', '+46', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(187, 'SD', '+249', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(188, 'DO', '+1-809', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(189, 'DM', '+1-767', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(190, 'DJ', '+253', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(191, 'DK', '+45', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(192, 'VG', '+1-284', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(193, 'DE', '+49', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(194, 'YE', '+967', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(195, 'DZ', '+213', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(196, 'US', '+1', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(197, 'UY', '+598', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(198, 'YT', '+262', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(199, 'UM', '+1', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(200, 'LB', '+961', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(201, 'LC', '+1-758', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(202, 'LA', '+856', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(203, 'TV', '+688', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(204, 'TW', '+886', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(205, 'TT', '+1-868', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(206, 'TR', '+90', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(207, 'LK', '+94', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(208, 'LI', '+423', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(209, 'LV', '+371', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(210, 'TO', '+676', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(211, 'LT', '+370', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(212, 'LU', '+352', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(213, 'LR', '+231', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(214, 'LS', '+266', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(215, 'TH', '+66', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(216, 'TG', '+228', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(217, 'TD', '+235', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(218, 'TC', '+1-649', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(219, 'LY', '+218', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(220, 'VA', '+379', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(221, 'VC', '+1-784', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(222, 'AE', '+971', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(223, 'AD', '+376', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(224, 'AG', '+1-268', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(225, 'AF', '+93', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(226, 'AI', '+1-264', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(227, 'VI', '+1-340', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(228, 'IS', '+354', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(229, 'IR', '+98', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(230, 'AM', '+374', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(231, 'AL', '+355', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(232, 'AO', '+244', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(233, 'AS', '+1-684', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(234, 'AR', '+54', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(235, 'AU', '+61', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(236, 'AT', '+43', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(237, 'AW', '+297', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(238, 'IN', '+91', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(239, 'AX', '+358-18', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(240, 'AZ', '+994', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(241, 'IE', '+353', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(242, 'ID', '+62', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(243, 'UA', '+380', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(244, 'QA', '+974', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(245, 'MZ', '+258', '2018-10-15 22:30:03', '2018-10-15 22:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Web & Marketing', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(2, 'Financial & Legal', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(3, 'Healthcare', '2018-10-15 22:30:03', '2018-10-15 22:30:03');

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
(3, '2017_10_09_085318_create_industries_table', 1),
(4, '2017_10_10_073752_create_professions_table', 1),
(5, '2017_10_11_110157_create_countries_table', 1),
(6, '2018_10_04_053727_create_categories_table', 1),
(7, '2018_10_04_053739_create_services_table', 1),
(8, '2018_10_04_053807_create_service_locations_table', 1),
(9, '2018_10_04_063656_create_businesses_table', 1),
(10, '2018_10_04_063706_create_contact_infos_table', 1),
(11, '2018_10_04_063740_create_staff_assignments_table', 1),
(12, '2018_10_04_063806_create_billing_infos_table', 1),
(13, '2018_10_04_063844_create_email_settings_table', 1),
(14, '2018_10_04_063855_create_sms_settings_table', 1),
(15, '2018_10_04_063912_create_booking_options_table', 1),
(16, '2018_10_04_063919_create_booking_policies_table', 1),
(17, '2018_10_04_070844_create_service_availabilities_table', 1),
(18, '2018_10_04_070853_create_staff_availabilities_table', 1),
(19, '2018_10_04_071248_create_appointments_table', 1),
(20, '2018_10_04_071321_create_calendar_settings_table', 1),
(21, '2018_10_04_071330_create_payment_settings_table', 1),
(22, '2018_10_06_040326_create_permission_tables', 1),
(23, '2018_12_01_065920_create_appointments_table', 0),
(24, '2018_12_01_065920_create_billing_infos_table', 0),
(25, '2018_12_01_065920_create_booking_options_table', 0),
(26, '2018_12_01_065920_create_booking_policies_table', 0),
(27, '2018_12_01_065920_create_businesses_table', 0),
(28, '2018_12_01_065920_create_calendar_settings_table', 0),
(29, '2018_12_01_065920_create_categories_table', 0),
(30, '2018_12_01_065920_create_contact_infos_table', 0),
(31, '2018_12_01_065920_create_countries_table', 0),
(32, '2018_12_01_065920_create_email_settings_table', 0),
(33, '2018_12_01_065920_create_industries_table', 0),
(34, '2018_12_01_065920_create_model_has_permissions_table', 0),
(35, '2018_12_01_065920_create_model_has_roles_table', 0),
(36, '2018_12_01_065920_create_password_resets_table', 0),
(37, '2018_12_01_065920_create_payment_settings_table', 0),
(38, '2018_12_01_065920_create_permissions_table', 0),
(39, '2018_12_01_065920_create_professions_table', 0),
(40, '2018_12_01_065920_create_role_has_permissions_table', 0),
(41, '2018_12_01_065920_create_roles_table', 0),
(42, '2018_12_01_065920_create_service_availabilities_table', 0),
(43, '2018_12_01_065920_create_service_locations_table', 0),
(44, '2018_12_01_065920_create_services_table', 0),
(45, '2018_12_01_065920_create_sms_settings_table', 0),
(46, '2018_12_01_065920_create_staff_assignments_table', 0),
(47, '2018_12_01_065920_create_staff_availabilities_table', 0),
(48, '2018_12_01_065920_create_users_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15);

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
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_subscriptions`
--

CREATE TABLE `paypal_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `transaction_subject` text COLLATE utf8mb4_unicode_ci,
  `txn_type` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  `subscr_id` text COLLATE utf8mb4_unicode_ci,
  `item_name` text COLLATE utf8mb4_unicode_ci,
  `txn_id` text COLLATE utf8mb4_unicode_ci,
  `item_number` text COLLATE utf8mb4_unicode_ci,
  `payment_status` text COLLATE utf8mb4_unicode_ci,
  `payment_fee` text COLLATE utf8mb4_unicode_ci,
  `mc_fee` double(8,2) DEFAULT NULL,
  `mc_gross` double(8,2) DEFAULT NULL,
  `btn_id` int(11) DEFAULT NULL,
  `payment_date` text COLLATE utf8mb4_unicode_ci,
  `mc_currency` text COLLATE utf8mb4_unicode_ci,
  `payer_id` text COLLATE utf8mb4_unicode_ci,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `payer_email` text COLLATE utf8mb4_unicode_ci,
  `receiver_id` text COLLATE utf8mb4_unicode_ci,
  `receiver_email` text COLLATE utf8mb4_unicode_ci,
  `business` text COLLATE utf8mb4_unicode_ci,
  `contact_phone` text COLLATE utf8mb4_unicode_ci,
  `residence_country` text COLLATE utf8mb4_unicode_ci,
  `payment_gross` text COLLATE utf8mb4_unicode_ci,
  `payment_type` text COLLATE utf8mb4_unicode_ci,
  `protection_eligibility` text COLLATE utf8mb4_unicode_ci,
  `verify_sign` text COLLATE utf8mb4_unicode_ci,
  `payer_status` text COLLATE utf8mb4_unicode_ci,
  `test_ipn` text COLLATE utf8mb4_unicode_ci,
  `charset` text COLLATE utf8mb4_unicode_ci,
  `notify_version` text COLLATE utf8mb4_unicode_ci,
  `ipn_track_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_subscriptions`
--

INSERT INTO `paypal_subscriptions` (`id`, `user_id`, `package_id`, `transaction_subject`, `txn_type`, `type`, `subscr_id`, `item_name`, `txn_id`, `item_number`, `payment_status`, `payment_fee`, `mc_fee`, `mc_gross`, `btn_id`, `payment_date`, `mc_currency`, `payer_id`, `first_name`, `last_name`, `payer_email`, `receiver_id`, `receiver_email`, `business`, `contact_phone`, `residence_country`, `payment_gross`, `payment_type`, `protection_eligibility`, `verify_sign`, `payer_status`, `test_ipn`, `charset`, `notify_version`, `ipn_track_id`, `created_at`, `updated_at`) VALUES
(15, 12, NULL, 'Basic Package', 'subscr_payment', 'subscription', 'I-XNHG6YY70NFX', 'Basic Package', '6NP9751063548041M', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '19:33:11 Dec 11, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', '036-523-8296', 'AU', NULL, 'instant', 'Eligible', 'A1Nay5pOodHNgZuhY.y4v.Fi6z0BAGPSd7bp0a0kCfw8IpElc6yVqja7', 'verified', '1', 'windows-1252', '3.9', '92040363500ef', '2018-12-11 16:37:05', '2018-12-11 16:37:05'),
(16, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2P0597238S4097036', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '01:08:16 Dec 12, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', '036-523-8296', 'AU', NULL, 'instant', 'Eligible', 'A9q33sUt.ixnFNZ.aBeeN0xayU2hA78uxhpE5BJO58dGa109dtzCgPi4', 'verified', '1', 'windows-1252', '3.9', '58346ad9c1f33', '2018-12-11 22:11:06', '2018-12-11 22:11:06'),
(17, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8U002635E7700373R', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:30:42 Dec 13, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Af0wPJcHCLssKahnZoL3MMWXdhaEAkyjkcoi2biBT5x3L8fy2N79jZjj', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-13 05:31:10', '2018-12-13 05:31:10'),
(18, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4JL605370X894323D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:36:11 Dec 14, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A2IIkvl7SnmpoaFJ-CPJ2hYqF27CAEDt95WjpdKqWbTqL0uNUdiwfrrs', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-14 01:37:10', '2018-12-14 01:37:10'),
(19, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '72W54901F83061915', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:33:47 Dec 15, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A-z4EexJzYebDzdfXmanRJLeFcNDAu44dAGHmdoy28SguPqpls4Cc5Rr', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-15 01:34:08', '2018-12-15 01:34:08'),
(20, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '90M98711651204150', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:23:20 Dec 16, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A.pHE6kQt3KL-ifbh197SAudny1AAW5g8FqOvkiB7coiUYi.a9z7link', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-16 05:24:11', '2018-12-16 05:24:11'),
(21, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2JR62422X8692481P', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:41:47 Dec 18, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Agex0DUfI-XGWoaqh.2UMTJKeVZHAIkssYR50wMMujTc1I4iFwb7y4pN', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-18 05:42:08', '2018-12-18 05:42:08'),
(22, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '02K98927DF816344D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:00:32 Dec 19, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ABNyKfSQPCVGhyivickm67aa2RqxAWoM5JN.T-ZBFc-EvC-a8FmVmXCO', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-19 05:00:56', '2018-12-19 05:00:56'),
(23, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '05E522954F8418817', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:58:10 Dec 20, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AwxPW2ytsIcGqA2BCFyBuPeBrrfwABekE2utY29Afy8wRXvMLoA65FMv', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-20 00:58:30', '2018-12-20 00:58:30'),
(24, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '39B91686F8812113C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:03:00 Dec 21, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AynlJ2zsmflH.74VEfIBZZJsEArxAGtGgmF3VsIRBF43lIeMKr.uwp0Y', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-21 05:04:05', '2018-12-21 05:04:05'),
(25, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '26W11642L5300574G', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '10:47:16 Dec 22, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AnlkDhBYwCRZ4fplPqXSdkLuOQdmApw61Ym5e4jGQO8K7UIzzN1SCH70', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-22 07:48:06', '2018-12-22 07:48:06'),
(26, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '40117741G7926174V', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:58:50 Dec 23, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AKwVSAdKHfS2rPeRpMTEQpMZppwVAK0KX4748Gu0Ef67G2MMehsp24tN', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-23 00:00:07', '2018-12-23 00:00:07'),
(27, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7TG31152TT858641E', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '10:02:16 Dec 24, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AZuRXZRkuk7frhfirfxxTkj0BDJGAllVnQZbH0HVUYgXUc0bBVmrJNYN', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-24 07:02:40', '2018-12-24 07:02:40'),
(28, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7MF66738JX0444148', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:09:52 Dec 25, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AMXv0WG6E0oyHPtur6YqWGuOvwuMA.HVsDqe7JcwK9FwegIeRvyvt7hC', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-25 03:11:06', '2018-12-25 03:11:06'),
(29, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '99M714947A440581C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:34:37 Dec 26, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AVTK0ZqBmBe4Ul3G.WJX.5KX5LeSAagLN657Rzj8vH50XzdYRVA3IE3Z', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-26 04:35:09', '2018-12-26 04:35:09'),
(30, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1ND88069GU308673R', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:25:54 Dec 27, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AJRV2DMR7mylHw1B8vR.TIGd8pbuAuKtYCMJA6TS5cA30zRftBXSrWAG', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-27 03:26:16', '2018-12-27 03:26:16'),
(31, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '9NB010185E3730156', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:48:21 Dec 28, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AjyhtKnl4WR9WjPMOHEiYVWCFxyzAiR6PshMAs-TNOjbZfFqUxFE-5fs', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-28 05:49:06', '2018-12-28 05:49:06'),
(32, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '98703633VK8171122', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:45:23 Dec 29, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A5FdWnj8RRqeGvuq3QjAa1GsBXEkA8X2OyyZDlki50R1ogV7ylvC5gUI', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-29 03:45:45', '2018-12-29 03:45:45'),
(33, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1BL58576SM882650Y', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:56:39 Dec 30, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AHVhnjrkRMXqHIKgvriean2lVvV3Ak4exoxvIxd1oDh.C4nZVM5BL4sV', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-29 23:57:02', '2018-12-29 23:57:02'),
(34, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1XC2515304025205N', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '09:06:55 Dec 31, 2018 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A.goQSt0j5GwaeC9B2UVbOPS0qcmA-cPKoXJJjcTfeDUrKhV2v9luNPu', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2018-12-31 06:08:05', '2018-12-31 06:08:05'),
(35, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7WV51679CA1656209', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:00:28 Jan 01, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AMxgdctOZK4r5RTtT5S6ip5K8tUvAE3xGwaYOYB-sW1vF7wLMAKuCZ-o', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-01 00:01:05', '2019-01-01 00:01:05'),
(36, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '14X86417NM383262K', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:32:10 Jan 02, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AEUblVGApeDlc5MS9x80Bi2Wu510AqwdeqdF8jkpXlxR2TIoG-.HSrSB', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-02 00:33:05', '2019-01-02 00:33:05'),
(37, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '97G10714P6210094D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:49:10 Jan 03, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AQq9S7Ok-pw8oyfqd1s.l.8B2TrvAbuzVh-qtPtx7nT3oic64kiF.GcF', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-03 04:49:31', '2019-01-03 04:49:31'),
(38, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '32841500P94757916', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:10:54 Jan 04, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AH5KWvT4dFohK1fAIzgYkdnvlFH2AKkgaKohFd.Rgd8xmvtMSMYxLp44', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-04 04:12:06', '2019-01-04 04:12:06'),
(39, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '44014012U42645131', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:40:17 Jan 05, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Af1bo7kjUY-BUO3wz9VJnokdnPNYAdIIzXGO0evLd0U4MKHazAiOPLw2', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-05 04:41:08', '2019-01-05 04:41:08'),
(40, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '60P138562S841841V', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '11:06:13 Jan 06, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Auf.1K9ZUqgYUBGYRQ6OAIhONBIAAnzCmjluzZyzW7yeYiUEeWs9Ulj0', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-06 08:07:05', '2019-01-06 08:07:05'),
(41, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '0TJ093860U846105X', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:17:17 Jan 07, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AK3xJLZtUN1pP1CmulMf1V0ugf9HAbvphVEkGYKpz0ktAP2UNDim8vzn', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-07 04:18:08', '2019-01-07 04:18:08'),
(42, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '93M67155EH537253S', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:12:46 Jan 08, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ADeWYfUAnar02.lyDQ-2iQlOtBHDAuTLvBFJa0ucK89JlV5j.Pj0g97t', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-08 03:13:08', '2019-01-08 03:13:08'),
(43, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8SJ59890AV517362T', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:43:59 Jan 09, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AtmqXvwwAHUoyjC3BckwsSWU31W0AgYQtMHGdexR5sCJiygZW7v8fX6E', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-09 03:45:05', '2019-01-09 03:45:05'),
(44, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1AX60096M0007310G', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '11:51:58 Jan 10, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AZxbwZ9bPVPFFf7hCCNemacLJwlCA6t6IIBY5NDGxiFaRmwV5WqaqTgo', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-10 08:52:19', '2019-01-10 08:52:19'),
(45, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3PL516086R256763C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '11:38:10 Jan 11, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A9wqb1wB2yeCO.jbe9.C9sMuvcu4AIze8WUZ2yS.Y827smh4eoNvqsPT', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-11 08:39:05', '2019-01-11 08:39:05'),
(46, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4T151887E8995470L', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:51:32 Jan 12, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AVlpOpz96ozHZl00S2JWFGNmmuSmAQhVUV.9-qgDdQOlSxe49wKdbTC4', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-12 05:51:53', '2019-01-12 05:51:53'),
(47, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '9GV9928506244530G', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:02:09 Jan 13, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Ak94TBBVVaEGZP89tcv-BEF1UbMXAf43cYBUFy2CntV3ER9y18ZngkoB', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-13 00:03:08', '2019-01-13 00:03:08'),
(48, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '0R319686UH8979638', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '05:32:08 Jan 14, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A3jIMaG6G8pvXNOpDRbAwZKewTlZAZij3nLBycHFdP2ZqhSSkYTUMaAY', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-14 02:33:07', '2019-01-14 02:33:07'),
(49, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '30F33868X5218602D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:45:05 Jan 15, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A4Mqf5cf8P7QgU4SRBC5RIAEbsuXAHt8ifQ6dNUgUhHemEtJRaFJhXGF', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-15 01:46:08', '2019-01-15 01:46:08'),
(50, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7G572087YN005715U', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:10:16 Jan 16, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AfDdcDwGFNNl9YX8sk3Oq5l8Xr6pAwm.udOkt36o8kwraZMlSe.QrXPb', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-16 05:11:08', '2019-01-16 05:11:08'),
(51, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '94253346BT633014W', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:05:15 Jan 17, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Aueowvee7t6wjo8K4T-GGs3wJvPQA6SGls2rXvJbBtgfI0Mjt-yzPUIZ', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-17 09:06:07', '2019-01-17 09:06:07'),
(52, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7FG92188F7504992A', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:22:51 Jan 18, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AGXT66oAmwth6Mv574mMl8vl9PeuA4TokRo5JkM5wjdV6yMZgbN.fZIQ', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-18 04:24:08', '2019-01-18 04:24:08'),
(53, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '307817368N076742Y', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '11:54:45 Jan 19, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AL82qxR3z7mhtwJZBjtNJQ1iFKKYAMPHSJ.kxvQgTzgT9Csvgof0OyCt', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-19 08:56:10', '2019-01-19 08:56:10'),
(54, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '40835692PR992900E', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:17:30 Jan 20, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AZyJIVtrKZJIFn35ToMVOPQoZ8ZAAypOmzLHaPsxf4fdXSIzIkHxuGpl', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-20 05:18:09', '2019-01-20 05:18:09'),
(55, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1GJ20129M0946662B', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:16:41 Jan 21, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AsM0z10xXFuZuI3iMp22lu4JOzbEAqY5I6f0waNHl6RwjBDkZxzWeEEj', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-21 09:17:05', '2019-01-21 09:17:05'),
(56, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '523382356D327140L', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:58:07 Jan 22, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AJ5elIYM5D9HHOkI9idy6dxdP9I3ARrT1FiCz-g.KhjJO98e5ljxpVhS', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-21 23:58:27', '2019-01-21 23:58:27'),
(57, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '5A995602VM006671F', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:21:30 Jan 23, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AFbtoae17G1snrl8ZQGTOr-6vaYpAisJt7ZRZ8F.Shu-fqPtRmfl-e9Y', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-23 04:22:07', '2019-01-23 04:22:07'),
(58, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6S410758F7262580W', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:18:25 Jan 24, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A1y.b0gVWGfYS85ushon7njAx4FVAoHkqdD3kMLRL4k0B.ugD9C-iiEU', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-24 04:19:07', '2019-01-24 04:19:07'),
(59, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2G582687CF234091V', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:43:37 Jan 25, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AGfSKS1zcdhJM-C6l0DknJMIv8LLArOzQkD0VbYCeYuovPLtUNMIDypD', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-24 23:44:00', '2019-01-24 23:44:00'),
(60, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '5TX49440WP801712S', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:41:48 Jan 26, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AGfCgHuaezzsna7ic4RxRXfRLW-fAXJiULfXCk7Nk8U6Gee1P2ZdXb6C', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-25 23:43:05', '2019-01-25 23:43:05'),
(61, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '0NS45561972502207', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:33:32 Jan 27, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AUH6QQQ4Cq8gTpJ0PPLJ0MmEKKkfASPVP.O97Pt9S7Q9hET09YJJDAkY', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-27 04:34:08', '2019-01-27 04:34:08'),
(62, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3RE7480310586515X', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:35:12 Jan 28, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AoTD.uallg-3k4aPdurPRuA08yNGARcJazeH3nN5mqsg1xRIpF9DSCdq', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-28 01:35:36', '2019-01-28 01:35:36'),
(63, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2M360316N1823190D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:12:12 Jan 29, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AA1mu66Ytd3MFlfm-yObJ2fZhFinAL7yUchBqpDywQLyr9KMFOfZZ3cu', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-29 01:13:07', '2019-01-29 01:13:07'),
(64, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '5WV60115AJ8761447', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '09:22:36 Jan 30, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AEWexEu2HAXvtIxtV.FjJ4XDJIdfAktioghvP7QIbCP6KRGYlVM15.eL', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-30 06:22:57', '2019-01-30 06:22:57'),
(65, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '78C70693C2528525K', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '10:04:20 Jan 31, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Al3UTKLI1i68WmIDgQz7KCVQD1kLAvIoGBVDSk-1dSdgSLRHyzWJr7GJ', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-01-31 07:04:42', '2019-01-31 07:04:42'),
(66, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6LU55842W3705345F', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '05:14:40 Feb 01, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AOcXUd3yW2gKCaOVH4o8CJ16NzJsAY3v2MVwNdjMjFpbV8NsJrSH-k-m', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-01 02:15:06', '2019-02-01 02:15:06'),
(67, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2YL05737J36083313', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '05:33:59 Feb 02, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AmExk4TF6ENwB5D1WRb3llSDGIIZAhLiOcu9fMLszfKhoA2tGWGpuP0T', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-02 02:35:05', '2019-02-02 02:35:05'),
(68, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '5XY39076VA318622F', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:18:44 Feb 03, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Ax3dV49r-Xv3p.xaEC4co6wHaFCZA6w15Yjz5cwCtqMw6cTZg0D8jxeK', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-03 00:19:09', '2019-02-03 00:19:09'),
(69, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8U536971WN525050Y', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:21:42 Feb 04, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AGrQ4O-ktk7juq90QNZTDZ0rFCx2AQfQNXYwlH7oTBwWkte6Gi9ZAbuZ', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-04 03:22:05', '2019-02-04 03:22:05'),
(70, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '9L268966EU266804F', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '05:23:26 Feb 05, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AF1l47hXqbrLK1bZT.L1VpyhbO.XARsEXffXLc1zatUkIQ2XDRgbLqAr', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-05 02:23:48', '2019-02-05 02:23:48'),
(71, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6GS395981L902612L', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:08:26 Feb 06, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AJk8QuV-taWzxKJWz2C0EDiEnfsEAEJ.uRnm0Gj4Gm8BHuVbD4kPbyXS', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-06 01:08:48', '2019-02-06 01:08:48'),
(72, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1UH953187D068754X', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '11:20:32 Feb 07, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AGdDhbqLhOGuxL72HCkHfEcIDjyXAWCW76NOGbwJVgu5jQRftNZWUtHP', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-07 08:21:06', '2019-02-07 08:21:06'),
(73, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '653632562M5269706', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:41:43 Feb 08, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A8-NxT4I1FSeVU-8p-dtqmcDYd81AShkmNgoTwm9ZYTJvu971B-SCV.U', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-08 00:42:09', '2019-02-08 00:42:09'),
(74, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6JC902744L784401N', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:05:50 Feb 09, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AXWBkrlz2i-r4wVI-be0v2gEzKuUA1jEhME0HvFnPmTMf433rGr-Rxhr', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-09 05:06:12', '2019-02-09 05:06:12'),
(75, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '81W87200683023107', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:07:22 Feb 10, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A5uQFvjc.UJtfUjlRK-VIf9WWQ8HA3ZY1UlZqaiH-SiPitiuFhvsVw-w', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-10 09:08:08', '2019-02-10 09:08:08'),
(76, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6WW22428PP396623Y', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:08:44 Feb 11, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AYYDYnDWyyxjrN63eaQ0pZU92uuJAdQwXc.O-bU8GStV43L9LBgNJfCI', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-11 00:10:06', '2019-02-11 00:10:06'),
(77, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7G46209557343273D', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:49:24 Feb 12, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A739FTSMk8kYJ.miuYv3SfmM-AuZAS17vsKAEnyHA1MeVOICqnMRvK-d', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-12 09:49:50', '2019-02-12 09:49:50'),
(78, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4A272986X0397404U', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:29:24 Feb 13, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A8VZ08eNIUoTSTGnp-2oXhn5KPzHADkE4jzn-sVfAQAgWw-lbtFvRXds', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-12 23:30:05', '2019-02-12 23:30:05'),
(79, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '445868805X8758618', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '10:53:49 Feb 14, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AXBLrVJmA-PFtzNaYXEgSK0UIgknAqLnBAsKqLX4rS6XJInfcZbRf4p3', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-14 07:55:05', '2019-02-14 07:55:05'),
(80, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3DN22608VU780321M', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '02:15:02 Feb 15, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AKKSHXpxD5JvZ2cl.XOgo1OD9YDZA..is2Ys-0GxNbFkdBukobSoKlzq', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-14 23:16:08', '2019-02-14 23:16:08'),
(81, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8JC68670YJ694532N', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:19:48 Feb 16, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A.dJfNAHZaLFV9kyG4GBumBO4rM2Av5FiyKh9pUgdFenxAC8BiGEGr1x', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-16 03:21:05', '2019-02-16 03:21:05'),
(82, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7SD00368YF565574X', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:13:50 Feb 17, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AgsWp3re1wWkzZxrCraHGkQC6yZgAcUj8U21wrIH6Tg-s4X4CsnNKTqE', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-17 09:15:09', '2019-02-17 09:15:09'),
(83, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3MV51638BF863804C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:41:33 Feb 18, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Aq5laNfMA1jn2LiWpkqhx4ti3QXnA6wSwsP7znUIySVoCDZ8T1eSTsN1', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-18 09:42:09', '2019-02-18 09:42:09'),
(84, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1XB8568417764745F', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:31:06 Feb 19, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A-wfb8Q6pSREY6XrRXDk-aXSaf1SAuhMj-r2D1YcBPnJTKkK-Yql-qM3', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-19 04:31:29', '2019-02-19 04:31:29'),
(85, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '46657836JF813510C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '17:17:14 Feb 20, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ABRY04NDJ5IIVhYiRS6ypLMkwmitA5N5Pdq7-PqiTDbg68-QpZ29bBv8', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-20 14:17:38', '2019-02-20 14:17:38'),
(86, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '14L7736593818982E', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '15:48:26 Feb 21, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AyX7eypgPsj4B5I1LHXmibJHF3sJAlmH0hXzpE10NjMBzhCpXlGRp2G9', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-21 12:49:06', '2019-02-21 12:49:06'),
(87, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3LY574145G366551A', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:24:04 Feb 22, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AYfKdcGtVJXXDZMU-tUWWnIlU25cAtCbe7rzRhIVP13qINozqbq83jRa', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-22 01:24:26', '2019-02-22 01:24:26'),
(88, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2YV15839KM0572211', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:37:13 Feb 23, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AKGqiD9OpjlxVIn6rhtztPr0e1ZBAVQi3cu15Qmxjgezx4GlrmXo2.qA', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-23 09:38:08', '2019-02-23 09:38:08'),
(89, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8KC41658VC558331S', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '05:45:02 Feb 24, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AmFFr0bosz5Hs4rdf8ZNRZol3G6SATL1I-I89aSk1yDr44UiXm.IzKgm', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-24 02:45:23', '2019-02-24 02:45:23'),
(90, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7K424714C3740602U', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '03:04:34 Feb 25, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A.CSYz4u5IILQm5wM0J0JbJiIcEuACDex4mdRddsgb7wSXwaZBwgnTp4', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-25 00:05:11', '2019-02-25 00:05:11'),
(91, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '2WG86778C82120617', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '04:38:46 Feb 26, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ArjI6wMRsBNWop-3NCMh8trd93GoAnNE2ln8sQ7viL902RowtX06q0Qy', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-26 01:40:09', '2019-02-26 01:40:09'),
(92, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '64275807XF162980N', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '12:58:36 Feb 27, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ABr7TF1VNJRHrFfJkVMfCcSa87ETAPYn3mFTlZvD1HyZ8jM9sGp4rsyP', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-27 09:59:06', '2019-02-27 09:59:06'),
(93, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '86807127UT8234402', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '07:08:39 Feb 28, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AxQXFQ8.eeoM6OdaDW-P2TjpuSG-AAgA4B6FJwDkUPDJXTCVSe9a.Lqf', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-02-28 04:09:05', '2019-02-28 04:09:05'),
(94, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '94X13703XR706892B', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '10:37:17 Mar 01, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Aa9sF8zb3bPu8tiasGbOEDXZz37SABFJLhm38YaxRelfZX38BJsMO6s8', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-01 07:38:05', '2019-03-01 07:38:05'),
(95, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4EG76388R77306414', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '21:58:08 Mar 02, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AW2oZDucGH-5Ym-BKQKUagWqb7TKApc2-ULvSjxzwzYAF0bwiai7tQg.', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-02 18:59:06', '2019-03-02 18:59:06'),
(96, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1UD40883AL1603020', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '14:22:24 Mar 03, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AbiSe9l5i0GmURCvCGXabt063GVUA3XgmRQ2yUFH1bOUqpVJBpKAYfDR', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-03 11:23:09', '2019-03-03 11:23:09'),
(97, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '5V21538903271122N', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '19:23:20 Mar 04, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AZXrAH4PoVZ7ogQR8pJqtffjgabRATw-Ix3B2LRxt7ulhqd3HxYnJZPV', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-04 16:24:08', '2019-03-04 16:24:08'),
(98, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '3VP38639D0769235W', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '15:20:33 Mar 05, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AQtDkM8Dt3LMcxRgDM-bAWvelzMmAP3iejAKT9DJL7Zbn88xaEND0kNJ', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-05 12:21:01', '2019-03-05 12:21:01'),
(99, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '47L78270YN032583W', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '23:08:11 Mar 06, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Aa-ci.C6FQtla.XA6hWmpT38bErXAXnHAa2yD49MJEIxwabP0iIZ.vvX', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-06 20:08:37', '2019-03-06 20:08:37'),
(100, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '1YJ766837A8303009', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:30:30 Mar 07, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'A228FPMMYIKuyrZ277Y8QdISBSSnAHZ0XzA1SsfeJKeZ16bc-3Hs1564', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-07 05:30:53', '2019-03-07 05:30:53'),
(101, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4BD400690W960314C', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '19:31:08 Mar 08, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ApnoOYwqA.72T-K.xuOpVNcY3l7FAmoPBp7CwyGNvGLxuBL9iqXaYdAL', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-08 16:31:32', '2019-03-08 16:31:32'),
(102, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '6W208799HC937871V', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '06:47:57 Mar 09, 2019 PST', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AxYKJeO2Da2B9Xf8TX6wOQE3eHq-AcpOH4mEAaRTypyfnVpiaWnmX67w', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-09 03:49:06', '2019-03-09 03:49:06');
INSERT INTO `paypal_subscriptions` (`id`, `user_id`, `package_id`, `transaction_subject`, `txn_type`, `type`, `subscr_id`, `item_name`, `txn_id`, `item_number`, `payment_status`, `payment_fee`, `mc_fee`, `mc_gross`, `btn_id`, `payment_date`, `mc_currency`, `payer_id`, `first_name`, `last_name`, `payer_email`, `receiver_id`, `receiver_email`, `business`, `contact_phone`, `residence_country`, `payment_gross`, `payment_type`, `protection_eligibility`, `verify_sign`, `payer_status`, `test_ipn`, `charset`, `notify_version`, `ipn_track_id`, `created_at`, `updated_at`) VALUES
(103, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '4W387708YR9082724', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '08:29:03 Mar 10, 2019 PDT', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AH.LfTX3NAFqdnkf40MAgGD0sk1zAl5uoUfAJqq4NHPB3qr.CDXuJqxc', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-10 04:30:06', '2019-03-10 04:30:06'),
(104, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '7A776451FG6735604', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '16:03:55 Mar 11, 2019 PDT', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'ADqCh3sdzD9y7mCEJnmwGAeOPUv6AqNozYD-YwMKEtiX3gjhPEjRvRGu', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-11 12:04:18', '2019-03-11 12:04:18'),
(105, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '79C02145PB461693H', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '19:17:48 Mar 12, 2019 PDT', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'AESwYdwIUh1Nyt6KaZSvO4H9FtUcAEBGe0riex0ry4BGXICYIeyk7GEq', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-12 15:19:07', '2019-03-12 15:19:07'),
(106, 12, NULL, 'Basic Package', 'subscr_payment', 'recurring_payment', 'I-523XXNVHNE7E', 'Basic Package', '8ET55651YK2727258', 'miynBasicPackage', 'Completed', NULL, 0.35, 2.00, 3929970, '14:23:25 Mar 13, 2019 PDT', 'AUD', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', '4TZA4Q5Y44SE2', 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, 'instant', 'Eligible', 'Ae5eSJQKcmMlRPleNRcieWxhxTQbAZNYVU506DH1oSZ3UHJnwm.rZZzw', 'verified', '1', 'windows-1252', '3.9', 'cfccad07f576c', '2019-03-13 10:24:05', '2019-03-13 10:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_unsubscriptions`
--

CREATE TABLE `paypal_unsubscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `transaction_subject` text COLLATE utf8mb4_unicode_ci,
  `txn_type` text COLLATE utf8mb4_unicode_ci,
  `subscr_id` text COLLATE utf8mb4_unicode_ci,
  `item_name` text COLLATE utf8mb4_unicode_ci,
  `txn_id` text COLLATE utf8mb4_unicode_ci,
  `item_number` text COLLATE utf8mb4_unicode_ci,
  `payment_status` text COLLATE utf8mb4_unicode_ci,
  `payment_fee` text COLLATE utf8mb4_unicode_ci,
  `mc_fee` double(8,2) DEFAULT NULL,
  `mc_gross` double(8,2) DEFAULT NULL,
  `btn_id` int(11) DEFAULT NULL,
  `payment_date` text COLLATE utf8mb4_unicode_ci,
  `mc_currency` text COLLATE utf8mb4_unicode_ci,
  `recurring` int(11) DEFAULT NULL,
  `reattempt` int(11) DEFAULT NULL,
  `mc_amount3` double(8,2) DEFAULT NULL,
  `period3` text COLLATE utf8mb4_unicode_ci,
  `payer_id` text COLLATE utf8mb4_unicode_ci,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `payer_email` text COLLATE utf8mb4_unicode_ci,
  `receiver_id` text COLLATE utf8mb4_unicode_ci,
  `receiver_email` text COLLATE utf8mb4_unicode_ci,
  `business` text COLLATE utf8mb4_unicode_ci,
  `contact_phone` text COLLATE utf8mb4_unicode_ci,
  `residence_country` text COLLATE utf8mb4_unicode_ci,
  `payment_gross` text COLLATE utf8mb4_unicode_ci,
  `payment_type` text COLLATE utf8mb4_unicode_ci,
  `protection_eligibility` text COLLATE utf8mb4_unicode_ci,
  `verify_sign` text COLLATE utf8mb4_unicode_ci,
  `payer_status` text COLLATE utf8mb4_unicode_ci,
  `test_ipn` text COLLATE utf8mb4_unicode_ci,
  `charset` text COLLATE utf8mb4_unicode_ci,
  `notify_version` text COLLATE utf8mb4_unicode_ci,
  `ipn_track_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_unsubscriptions`
--

INSERT INTO `paypal_unsubscriptions` (`id`, `user_id`, `package_id`, `transaction_subject`, `txn_type`, `subscr_id`, `item_name`, `txn_id`, `item_number`, `payment_status`, `payment_fee`, `mc_fee`, `mc_gross`, `btn_id`, `payment_date`, `mc_currency`, `recurring`, `reattempt`, `mc_amount3`, `period3`, `payer_id`, `first_name`, `last_name`, `payer_email`, `receiver_id`, `receiver_email`, `business`, `contact_phone`, `residence_country`, `payment_gross`, `payment_type`, `protection_eligibility`, `verify_sign`, `payer_status`, `test_ipn`, `charset`, `notify_version`, `ipn_track_id`, `created_at`, `updated_at`) VALUES
(1, 12, NULL, NULL, 'subscr_cancel', 'I-XNHG6YY70NFX', 'Basic Package', NULL, 'miynBasicPackage', NULL, NULL, NULL, NULL, NULL, NULL, 'AUD', 1, 1, 2.00, '1 D', 'EZNNPHFGBD894', 'test', 'buyer', 'biz-buyer@netmow.com', NULL, 'biz-facilitator@netmow.com', 'biz-facilitator@netmow.com', NULL, 'AU', NULL, NULL, NULL, 'Abb-F1pDodxd694ER0mz3-tE1yi7AGUbxs-7oFKVvZaDDmHDM.IJ9QKO', 'verified', '1', 'windows-1252', '3.8', 'f731a071bd9ec', '2018-12-11 21:59:22', '2018-12-11 21:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(10) UNSIGNED NOT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `industry_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(2, 1, 'Web Design', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(3, 1, 'Marketing & Social Media', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(4, 1, 'Advertising', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(5, 1, 'Consulting', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(6, 1, 'Web Hosting', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(7, 1, 'Consumer Servie / Support', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(8, 1, 'IT Services', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(9, 1, 'Other', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(10, 2, 'Accounting', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(11, 2, 'Tax Services', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(12, 2, 'Law Firm', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(13, 2, 'Legal Services', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(14, 2, 'Financial Advisor', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(15, 2, 'Investment Manager', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(16, 2, 'Mortgage Broker', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(17, 2, 'Insurance', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(18, 2, 'Other', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(19, 3, 'Doctor', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(20, 3, 'Medical Center', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(21, 3, 'Dentist', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(22, 3, 'Veterinarian', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(23, 3, 'Optometrist', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(24, 3, 'Nutritionist', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(25, 3, 'Chiropractor', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(26, 3, 'Therapist', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(27, 3, 'Surgeon', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(28, 3, 'Naturopathic', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(29, 3, 'Reflexology', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(30, 3, 'Counseling & Mental Health', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(31, 3, 'Alternative Medicine', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(32, 3, 'Other', '2018-10-15 22:30:03', '2018-10-15 22:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(2, 'business-admin', 'web', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(3, 'staff', 'web', '2018-10-15 22:30:03', '2018-10-15 22:30:03'),
(4, 'client', 'web', '2018-10-15 22:30:03', '2018-10-15 22:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_booking_form` tinyint(1) NOT NULL DEFAULT '0',
  `duration_hours` int(10) UNSIGNED DEFAULT NULL,
  `duration_minutes` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `method` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact_number` text COLLATE utf8mb4_unicode_ci,
  `online_method` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `business_id`, `name`, `fee`, `description`, `show_on_booking_form`, `duration_hours`, `duration_minutes`, `category_id`, `image`, `location`, `method`, `address`, `contact_number`, `online_method`, `created_at`, `updated_at`) VALUES
(1, '5bdc1a70881c7', 1, 'Free Intro Meeting', 0, 'Lorem ipsum dolor sit amet', 1, 0, 20, 1, '/images/services/5bdc1a70881c75bdc1a70890701541151344.png', NULL, NULL, NULL, NULL, NULL, '2018-11-02 03:35:44', '2018-11-02 03:35:44'),
(3, '5bdc1e6c0a31c', 1, 'Paid Intro Meeting', 1000, 'Lorem ipsum dolor sit amet', 1, 0, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-02 03:52:44', '2018-11-02 03:52:44'),
(4, '5c04a8d59e3dc', 2, 'Web application', 100000, 'Scalable web application', 1, 0, 20, 0, '/images/services/5c04a8d59e3dc5c04a8d59f6cc1543809237.png', NULL, NULL, NULL, NULL, NULL, '2018-12-02 21:53:57', '2018-12-02 21:53:57'),
(5, '5c04a8e0e55dc', 2, 'Web application', 100000, 'Scalable web application', 1, 0, 20, 0, '/images/services/5c04a8e0e55dc5c04a8e0e7afc1543809248.png', NULL, NULL, NULL, NULL, NULL, '2018-12-02 21:54:08', '2018-12-02 21:54:08'),
(7, '5c04bb3786cd9', 2, 'Database design edited again', 10000000, 'Database designing for web application', 0, 40, 30, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-02 23:12:23', '2018-12-03 02:28:29'),
(8, '5c04e97b71da7', 2, 'Home monitoring system edited', 1000000000, 'Home monitoring system', 0, 30, 20, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 02:29:47', '2018-12-03 02:30:04'),
(9, '5c061318dde06', 2, 'Web design', 10000, 'Web design', 1, 1, 20, 3, NULL, 1, 'client', NULL, NULL, NULL, '2018-12-03 23:39:36', '2018-12-03 23:39:36'),
(12, '5c07421e68e99', 2, 'Web design basic edited', 20000000, 'Web design basic edited', 1, 12, 20, 3, NULL, 1, 'business', NULL, '+8801617308431', NULL, '2018-12-04 21:12:30', '2018-12-04 22:01:28'),
(13, '5c075dd0c57ad', 2, 'Test', 10000000, 'test', 0, 12, 20, 3, NULL, 2, 'client', NULL, NULL, 'Facebook', '2018-12-04 23:10:41', '2018-12-04 23:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `service_availabilities`
--

CREATE TABLE `service_availabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_locations`
--

CREATE TABLE `service_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_assignments`
--

CREATE TABLE `staff_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_availabilities`
--

CREATE TABLE `staff_availabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_email` tinyint(1) NOT NULL DEFAULT '0',
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `slug`, `firstname`, `lastname`, `display_name`, `display_email`, `country_id`, `phone`, `professional_title`, `language`, `color`, `business_id`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '5bc5694a0b890', 'Website', 'Admin', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'faysal@netmow.com', '2018-10-15 22:30:02', '$2y$10$2RYyDKO0zEO8799mo9Pc8OWi1kCLpOk2mdnSBhAR5BBvyDyGJliDO', 'LCYOo9Jmr1cfNJudegWTmvbECZGhIeyvXissiM9FXfki6nZ0jlgiESomPSc9', '2018-10-15 22:30:02', '2018-10-15 22:30:02'),
(2, '5bc5694a1f2a9', 'Faysal', 'Rabby', 'Faysal Ishtiaq Rabby', 0, 1, '01736486064', 'Web Developer', NULL, '#07EAD4', 1, 'https://app.miyn.net/images/avatars/5bc5694a1f2a95bc5acb1f0c8f1539681457.png', 'f.i.rabby@gmail.com', '2018-10-15 22:30:02', '$2y$10$26QQMwg7ywUVk6ijEqZpYOJHQJFTyetCOULtKa3EYMHyXNY39h9/u', 'mDMw0kZ1KXo5wsf6YwVqBKI03nenUXCw08lTzKBqv3kBz4VSfJ9VhyWxNwJl', '2018-10-15 22:30:02', '2018-10-16 03:54:30'),
(4, '5bdc254463f33', 'Faysal', 'Rabby', 'Faysal Ishtiaq Rabby', 0, NULL, NULL, 'Web Developer', NULL, '#07EAD4', 1, 'https://app.miyn.net/images/avatars/5bdc254463f335bdc25446496b1541154116.png', 'fi.rabby@gmail.com', NULL, '$2y$10$sgFbRoufhibMniq7Z9FEneK.THJspMXzxd.ejyZmPWgzaGlsf5cF2', NULL, '2018-11-02 04:21:56', '2018-11-02 04:21:56'),
(5, '5bdc25dac43bb', 'Faysal', 'Rabby', 'Faysal I Rabby', 0, NULL, NULL, 'Web Developer', NULL, '#07EAD4', 1, 'https://app.miyn.net/images/avatars/5bdc25dac43bb5bdc25dac4dcb1541154266.png', 'frabby@gmail.com', NULL, '$2y$10$cRNHYVAzT3FGhhBAAOrdmOb4ArlK1rCql1VeA3xt2enlQmCEQ05Hm', NULL, '2018-11-02 04:24:26', '2018-11-02 04:24:26'),
(6, '5c04a3a1cfcc3', 'farhat', 'shahir', 'Zim', 0, 1, '1617308431', 'Web developer', NULL, '#07EAD4', 2, 'https://app.miyn.net/images/avatars/5c04a3a1cfcc35c04a60bdb3501543808523.jpg', 'cybertronix.4406@gmail.com', '2018-12-02 22:12:08', '$2y$10$Cz4eMZXE/S6bbF/XnMZTBebob8SWg.RnbmylaRljgN.I2R/wWqF6K', 'dMPohoUNNI4UavdRpvLL6MbQJw4GVLFLSxx9fWLcPgr87TFDf4uT2swIO7e7', '2018-12-02 21:31:45', '2018-12-02 21:42:04'),
(7, '5c04a7336a4b3', 'Mac', 'Gilfoyle', 'Gilfoyle', 0, NULL, NULL, 'Devops', NULL, '#048074', 2, 'https://app.miyn.net/images/avatars/5c04a7336a4b35c04a7336af061543808819.jpeg', 'xyz@xyz.com', '2018-12-03 22:08:00', '$2y$10$DPHCCIJWUAp07U0q9VO3quiSB/JW0oeynlpPh8vHclQmbBPDcfQmi', 'm4rvgT0ilOdPfQQx4KVkUOIfjOonztuzVhYZUo06F5HgAEQlEdGyMmPgUX11', '2018-12-02 21:46:59', '2018-12-02 21:46:59'),
(9, '5c0ddced946b0', 'Test', 'User1', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test1@test.com', '2018-12-09 19:18:27', '$2y$10$8XyQO2g.Z3Bax2L5lD3.L.WwcJjTQB/yssCUZmADFZK3rtsgPhQQm', 'zEJuY7GE4tj7bfauQK6SBXdcpgZe2nYzSHj3gJ6QCekvew6jgZpDAA87rbjV', '2018-12-09 16:26:37', '2018-12-09 16:26:37'),
(10, '5c0dddf1eb9a4', 'Test', 'User2', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test2@test.com', '2018-12-10 01:20:25', '$2y$10$nBf.Qyu95EVtkjmPmMQ49u5ECgKnLJQaTelklzD8TNj2QRDTOPmqa', 'CfJbu9fOFMHSEkc5yhGIxedCU3Vwx8FMm8C38aobVkZl7lsL9SbN3vBFISde', '2018-12-09 16:30:58', '2018-12-09 16:30:58'),
(11, '5c0ddf6e1d96e', 'Test', 'User3', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test3@test.com', '2018-12-10 03:11:32', '$2y$10$Tn/uSPaUOv0ArdmWZKsSruIkz7uCuvcz6yZ9V7YUE7CfKhtgokzai', 'qz7je9v5t59G9lHkpn6z8vowBohQVqBKMFnmZSKwYJpjRNqpBuanVRLK657U', '2018-12-09 16:37:18', '2018-12-09 16:37:18'),
(12, '5c0f6972472c1', 'Test', 'User4', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test4@test.com', '2018-12-10 22:20:15', '$2y$10$Muw3WvvLGXTNCpA2lsXoNuHNfpYbdaw3lWc5oEebGnX5PH/mPYVDS', 'UMBDjJ5r7sakTgcoW4awHx0whXK8I8QOlziqWrX0A8lij1mgdWsbFTbQyRCw', '2018-12-10 20:38:26', '2018-12-10 20:38:26'),
(13, '5c29b00c1b083', 'Nannas', 'Planner', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tst2@netmow.com', '2018-12-30 19:04:03', '$2y$10$VUMNWsUEOUxRGbfhqB1W8.5pXngEZ4bQ6kgbynhO.bAZTgy.E391m', NULL, '2018-12-30 18:58:36', '2018-12-30 19:04:03'),
(14, '5c398568978cd', 'Dev', 'User', 'Dev', 0, 1, '1617308431', 'Bac-end developer', NULL, NULL, NULL, '/images/avatars/5c398568978cd5c39869b428a61547273883.png', 'dev@dev.com', '2019-01-11 20:17:18', '$2y$10$9QxYuqxzXz7O/tDtDpHIDOuCii4SyWnIcrJZc8dEMuyh4J3gNbPKG', '2shO4uIrrT5uaTEmxOeYF2q5CuMVTJ5EGwHfbCk9vuWoYKt3nYwMpscwbiGZ', '2019-01-11 19:12:56', '2019-01-11 19:18:03'),
(15, '5cb734c034690', 'Jakarea', 'Parvez', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sendinfo98@gmail.com', '2019-04-17 04:15:35', '$2y$10$47aGk4QZkv/UDl97ee0z6Obg/TNrVTUEE9Ba/z778O6MhQM6ayQAe', 'ZozzDnWKNwIPYpQsV4VQcZg11oNSjL4dFsSctRrDmAGmS0Otk1TjDVdg4P8p', '2019-04-17 04:14:24', '2019-04-17 04:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `website_widgets`
--

CREATE TABLE `website_widgets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_type` text COLLATE utf8mb4_unicode_ci,
  `schedule` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `youtube` text COLLATE utf8mb4_unicode_ci,
  `call_us` text COLLATE utf8mb4_unicode_ci,
  `make_payment` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `invitation_label` text COLLATE utf8mb4_unicode_ci,
  `invitation_title` text COLLATE utf8mb4_unicode_ci,
  `invitation_text` text COLLATE utf8mb4_unicode_ci,
  `desktop_view` tinyint(1) DEFAULT NULL,
  `auto_desktop_view` tinyint(1) DEFAULT NULL,
  `auto_desktop_view_after` int(11) DEFAULT NULL,
  `mobile_view` tinyint(1) DEFAULT NULL,
  `auto_mobile_view` tinyint(1) DEFAULT NULL,
  `auto_mobile_view_after` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_widgets`
--

INSERT INTO `website_widgets` (`id`, `user_id`, `action_type`, `schedule`, `details`, `content`, `youtube`, `call_us`, `make_payment`, `map`, `invitation_label`, `invitation_title`, `invitation_text`, `desktop_view`, `auto_desktop_view`, `auto_desktop_view_after`, `mobile_view`, `auto_mobile_view`, `auto_mobile_view_after`, `created_at`, `updated_at`) VALUES
(4, 2, 'floating', 'Schedule a Free Intro Meeting', 'Drop us a line', 'Customer Testimonials', 'How to build a successful brand', 'Call us', 'Make a payment', 'Get direction', 'Contact Us', 'Schedule a Free Intro Meeting', '<p>Thank You For Visiting James Noble Law. We\'re here to help, please don\'t hesitate to reach out and book a free 20-Minute <strong>Family Law Appointment</strong> or Seek a set-rate, low-fee initial advice today.</p>', 0, 0, 10, 0, 0, 10, '2018-12-05 19:49:31', '2018-12-05 20:28:31'),
(5, 6, 'floating', 'Schedule a Free Intro Meeting', 'Drop us a line', 'Customer Testimonials', 'How to build a successful brand', 'Call us', 'Make a payment', 'Get direction', 'Contact Us', 'Lets go and make some robots or app', '<p>Lets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or appLets go and make some robots or app</p>', 0, 0, 10, 0, 0, 10, '2018-12-27 18:24:18', '2018-12-27 18:24:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_infos`
--
ALTER TABLE `billing_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_options`
--
ALTER TABLE `booking_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_policies`
--
ALTER TABLE `booking_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_user_id_foreign` (`user_id`),
  ADD KEY `businesses_industry_id_foreign` (`industry_id`),
  ADD KEY `businesses_profession_id_foreign` (`profession_id`);

--
-- Indexes for table `calendar_settings`
--
ALTER TABLE `calendar_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_infos_country_id_foreign` (`country_id`),
  ADD KEY `contact_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_subscriptions`
--
ALTER TABLE `paypal_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_unsubscriptions`
--
ALTER TABLE `paypal_unsubscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_widgets`
--
ALTER TABLE `website_widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_infos`
--
ALTER TABLE `billing_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `booking_options`
--
ALTER TABLE `booking_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_policies`
--
ALTER TABLE `booking_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calendar_settings`
--
ALTER TABLE `calendar_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_subscriptions`
--
ALTER TABLE `paypal_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `paypal_unsubscriptions`
--
ALTER TABLE `paypal_unsubscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `website_widgets`
--
ALTER TABLE `website_widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
