-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 07:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@ninzas.com', '$2y$10$fcqHOcqxZZjLQ4KmysZxXuBbMKOIdA00l960rp3a3DbYFpzgfYYHC', 'QBEfbWrWg4xSGuG3H8GatEbj1Rcr4RBMYfe4I3Qjj0j4jtAwG5eQCtQUNPhG', '2022-09-10 02:15:53', '2022-09-23 07:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `creator` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `status`, `creator`, `created_at`, `updated_at`) VALUES
(1, 'Honey', 0, 1, 1, '2022-08-22 19:54:09', '2022-08-23 01:54:09'),
(4, 'Rice', 0, 1, 1, '2022-08-22 20:08:38', '2022-08-27 07:26:39'),
(5, 'Mustered Honey', 1, 1, 1, '2022-08-26 19:28:01', '2022-08-27 01:54:34'),
(6, 'Rangpur Rice', 4, 1, 1, '2022-08-26 19:28:33', '2022-08-27 01:28:33'),
(7, 'Dal', 0, 1, 1, '2022-08-26 19:34:32', '2022-08-27 01:34:32'),
(8, 'Premium Honey', 1, 1, 1, '2022-08-26 19:53:35', '2022-08-27 01:53:35'),
(9, 'Premium Dal', 7, 1, 1, '2022-08-26 19:53:57', '2022-08-27 01:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_04_160908_create_sessions_table', 1),
(13, '2022_06_11_152821_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL DEFAULT 0,
  `pid` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `oid`, `pid`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2022-09-24 20:17:52', '2022-09-25 02:17:52'),
(2, 1, 4, 1, '2022-09-24 20:17:52', '2022-09-25 02:17:52'),
(3, 2, 4, 1, '2022-09-24 20:20:05', '2022-09-25 02:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(50) DEFAULT NULL,
  `uid` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `disocunt` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `uid`, `total`, `disocunt`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 2, 0, 0, 0, '2022-09-24 20:17:52', '2022-09-25 02:17:52'),
(2, '', 2, 0, 0, 0, '2022-09-24 20:20:05', '2022-09-25 02:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('evan@hostrare.com', '$2y$10$8M2McJf3QM.IjnucehIsuOCGiSEj6Gs4P4LE/goJ.6ex9KGZfgXpq', '2022-07-05 10:24:13'),
('evanpab@gmail.com', '$2y$10$SgWnO5iA.9fOrV5UBj9npu3pp.8PNuRASS19XcWhVZCpbMZrPODji', '2022-08-15 20:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 0,
  `paymethod` int(11) NOT NULL DEFAULT 0,
  `transactionid` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `oid`, `uid`, `paymethod`, `transactionid`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'adsasdfa', '2022-09-24 20:17:52', '2022-09-25 02:17:52'),
(2, 2, 2, 3, 'adsasdfa', '2022-09-24 20:20:05', '2022-09-25 02:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faicon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `section`, `picture`, `faicon`, `title`, `content`, `creator`, `created_at`, `updated_at`) VALUES
(11, 'services', '1660613316.png', 'fa-shopping-cart', 'E-Commerce', '<b>Lorem ipsum</b> dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 1, '2022-08-04 19:57:37', '2022-08-19 19:43:02'),
(12, 'services', '1660613330.png', 'fa-laptop', 'Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 1, '2022-08-04 19:57:53', '2022-08-19 19:44:14'),
(13, 'services', '1660613340.png', 'fa-lock', 'Web Security', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 1, '2022-08-04 19:58:06', '2022-08-19 19:44:31'),
(14, 'portfolio', '1659751913.jpg', NULL, 'Threads', 'Illustration', 1, '2022-08-05 19:37:24', '2022-08-05 20:11:53'),
(15, 'portfolio', '1659751609.jpg', NULL, 'Explore', 'Graphic Design', 1, '2022-08-05 19:37:39', '2022-08-05 20:06:49'),
(16, 'portfolio', '1659751618.jpg', NULL, 'Finish', 'Identity', 1, '2022-08-05 19:37:54', '2022-08-05 20:06:58'),
(17, 'about', '1659752062.jpg', NULL, '2009-2011 <br>Our Humble Beginnings', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 1, '2022-08-05 19:43:34', '2022-08-05 20:14:22'),
(18, 'about', '1659752070.jpg', NULL, 'March 2011 <br> An Agency is Born', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 1, '2022-08-05 19:43:53', '2022-08-05 20:14:30'),
(19, 'team', '1659752119.jpg', NULL, 'Md Omar Faruck', 'Developer', 1, '2022-08-05 19:50:11', '2022-08-05 20:15:19'),
(22, 'about', '1660614059.jpg', NULL, 'December 2015 Transition to Full Service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 1, '2022-08-15 19:40:59', '2022-08-15 19:40:59'),
(23, 'about', '1660614114.jpg', NULL, 'July 2020 Phase Two Expansion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 1, '2022-08-15 19:41:54', '2022-08-15 19:41:54'),
(24, 'brand', '1660617359.svg', NULL, 'Microsoft', 'Microsoft', 1, '2022-08-15 20:35:59', '2022-08-15 20:35:59'),
(25, 'team', NULL, NULL, 'Test post', 'test', 3, '2022-08-16 19:27:02', '2022-08-16 19:27:02'),
(26, 'team', NULL, NULL, 'Test post 2', 'test', 3, '2022-08-16 19:29:08', '2022-08-16 19:29:08'),
(27, 'team', NULL, NULL, 'Test 3', 'Test post 3', 1, '2022-08-16 19:34:10', '2022-08-16 19:34:10'),
(28, 'team', '1661479927.png', NULL, 'Test Post', '<p><span style=\"font-size: 24pt;\"><img style=\"font-size: 14px;\" src=\"https://ninzas.com/img/favicon.png\" alt=\"\" width=\"118\" height=\"111\" /><img src=\"http://localhost/laravelwebsite/application/storage/app/posts/1661479927.png\" alt=\"\" width=\"79\" height=\"79\" /></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>H</strong></span><strong style=\"font-size: 24pt;\">ello</strong></p>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li><span style=\"font-size: 12pt;\">Fr<span style=\"background-color: #ff6600;\">u</span>it</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: impact, sans-serif;\"><span style=\"color: #ff9900;\">Flow</span>er</span></li>\r\n</ol>', 1, '2022-08-25 20:12:07', '2022-08-25 20:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `summary` text NOT NULL,
  `details` longtext DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `picture`, `summary`, `details`, `price`, `status`, `creator`, `created_at`, `updated_at`) VALUES
(1, 'Test    Item', 1, '1662168658.png', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-09 02:02:21'),
(2, 'Test Item', 4, '1662168658.png', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 08:01:13'),
(3, 'Test Item', 6, '1662168658.png', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 02:06:43'),
(4, 'Test Item', 1, '1662168658.png', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 01:30:58'),
(5, 'Test Item', 1, '1662168658.png', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 01:30:58'),
(6, 'Test Item', 1, '1662168658.png', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 01:30:58'),
(7, 'Test Item', 7, '1662168658.png', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', 'Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 08:04:55'),
(8, 'Test Item', 7, '1662168658.png', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '<p>Test Item Test ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest ItemTest Item</p>', '200', 1, 1, '2022-09-02 19:30:58', '2022-09-03 02:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('I1yBQpHqBNmrgwd2nk2FXku8Kneqz8j6DCNkdM5g', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWndsN0xWNkxwOHFrR0NKbUJqdVpnYVk1emZsejJXRW82Qk5aTHZObiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbHdlYnNpdGUvY2F0ZWdvcnkvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1664082455),
('QM22TKJXyPO3FxyWtl6mQ7wORO2sicUobNknRCbZ', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQWJKNnp3T0hvbURwYk80a1ZKTnd4eGFxbm1yRkw3Y2haM0xoNHRTRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbHdlYnNpdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NTE6IlFNMjJUS0pYeVBPM0Z4eVd0bDZtUTd3T1JPMnNpY1VvYk5rblJDYlpfY2FydF9pdGVtcyI7YTowOnt9fQ==', 1664072406),
('YLqlolWPjLhJ4E38VJFLG7AD2B3rVScyjoNKxc3x', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoick1IbnZhb3lHUnRLclFWOVRoSEtXZFdoM0ViNVAxVXpYSEc3NkVldCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbHdlYnNpdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUxOiJPUnJtdWxUNU05UmFpaU5OZXlDRnZRTVRkRVppdElCUHZhSzNGSjYzX2NhcnRfaXRlbXMiO086MzI6IkRhcnJ5bGRlY29kZVxDYXJ0XENhcnRDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e2k6MTtPOjMyOiJEYXJyeWxkZWNvZGVcQ2FydFxJdGVtQ29sbGVjdGlvbiI6Mzp7czo5OiIAKgBjb25maWciO2E6Njp7czoxNDoiZm9ybWF0X251bWJlcnMiO2I6MDtzOjg6ImRlY2ltYWxzIjtpOjA7czo5OiJkZWNfcG9pbnQiO3M6MToiLiI7czoxMzoidGhvdXNhbmRzX3NlcCI7czoxOiIsIjtzOjc6InN0b3JhZ2UiO047czo2OiJldmVudHMiO047fXM6ODoiACoAaXRlbXMiO2E6Njp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czoxMjoiVGVzdCAgICBJdGVtIjtzOjU6InByaWNlIjtkOjIwMDtzOjg6InF1YW50aXR5IjtzOjE6IjEiO3M6MTA6ImF0dHJpYnV0ZXMiO086NDE6IkRhcnJ5bGRlY29kZVxDYXJ0XEl0ZW1BdHRyaWJ1dGVDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e2k6MDthOjE6e3M6NzoicGljdHVyZSI7czoxNDoiMTY2MjE2ODY1OC5wbmciO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjEwOiJjb25kaXRpb25zIjthOjA6e319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQxOiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWx3ZWJzaXRlL2NhcnRpdGVtcyI7fXM6NTE6ImZMOXkzTmxiMnNiMnRISk9CUzdBVXpoMlhtOGh0QmJoZXZlNUcxbnlfY2FydF9pdGVtcyI7TzozMjoiRGFycnlsZGVjb2RlXENhcnRcQ2FydENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7aToxO086MzI6IkRhcnJ5bGRlY29kZVxDYXJ0XEl0ZW1Db2xsZWN0aW9uIjozOntzOjk6IgAqAGNvbmZpZyI7YTo2OntzOjE0OiJmb3JtYXRfbnVtYmVycyI7YjowO3M6ODoiZGVjaW1hbHMiO2k6MDtzOjk6ImRlY19wb2ludCI7czoxOiIuIjtzOjEzOiJ0aG91c2FuZHNfc2VwIjtzOjE6IiwiO3M6Nzoic3RvcmFnZSI7TjtzOjY6ImV2ZW50cyI7Tjt9czo4OiIAKgBpdGVtcyI7YTo2OntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjEyOiJUZXN0ICAgIEl0ZW0iO3M6NToicHJpY2UiO2Q6MjAwO3M6ODoicXVhbnRpdHkiO3M6MToiMSI7czoxMDoiYXR0cmlidXRlcyI7Tzo0MToiRGFycnlsZGVjb2RlXENhcnRcSXRlbUF0dHJpYnV0ZUNvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7aTowO2E6MTp7czo3OiJwaWN0dXJlIjtzOjE0OiIxNjYyMTY4NjU4LnBuZyI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6MTA6ImNvbmRpdGlvbnMiO2E6MDp7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NTE6IllMcWxvbFdQakxoSjRFMzhWSkZMRzdBRDJCM3JWU2N5am9OS3hjM3hfY2FydF9pdGVtcyI7TzozMjoiRGFycnlsZGVjb2RlXENhcnRcQ2FydENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7aToxO086MzI6IkRhcnJ5bGRlY29kZVxDYXJ0XEl0ZW1Db2xsZWN0aW9uIjozOntzOjk6IgAqAGNvbmZpZyI7YTo2OntzOjE0OiJmb3JtYXRfbnVtYmVycyI7YjowO3M6ODoiZGVjaW1hbHMiO2k6MDtzOjk6ImRlY19wb2ludCI7czoxOiIuIjtzOjEzOiJ0aG91c2FuZHNfc2VwIjtzOjE6IiwiO3M6Nzoic3RvcmFnZSI7TjtzOjY6ImV2ZW50cyI7Tjt9czo4OiIAKgBpdGVtcyI7YTo2OntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjEyOiJUZXN0ICAgIEl0ZW0iO3M6NToicHJpY2UiO2Q6MjAwO3M6ODoicXVhbnRpdHkiO3M6MToiMSI7czoxMDoiYXR0cmlidXRlcyI7Tzo0MToiRGFycnlsZGVjb2RlXENhcnRcSXRlbUF0dHJpYnV0ZUNvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7aTowO2E6MTp7czo3OiJwaWN0dXJlIjtzOjE0OiIxNjYyMTY4NjU4LnBuZyI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6MTA6ImNvbmRpdGlvbnMiO2E6MDp7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX0=', 1663898787);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 0,
  `address` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `oid`, `uid`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'House: 32 Groud Floor, Road: 8, Block: E, Section: 1, Mirpur-1', '2022-09-24 20:17:52', '2022-09-25 02:17:52'),
(2, 2, 2, 'House: 32 Groud Floor, Road: 8, Block: E, Section: 1, Mirpur-1', '2022-09-24 20:20:05', '2022-09-25 02:20:05');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Md Mahbubul Alam', 'evanpab@gmail.com', NULL, '$2y$10$fcqHOcqxZZjLQ4KmysZxXuBbMKOIdA00l960rp3a3DbYFpzgfYYHC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-04 10:22:17', '2022-06-04 10:22:17'),
(2, 'Evan', 'evan@hostrare.com', NULL, '$2y$10$fcqHOcqxZZjLQ4KmysZxXuBbMKOIdA00l960rp3a3DbYFpzgfYYHC', NULL, NULL, NULL, 'rMH6aDRLA7zJ1DkzkL1uMA5lRw1bebLDjzVS5xQy9d3P8FuhaKr04tKToJTs', NULL, NULL, '2022-06-07 10:28:25', '2022-07-05 10:06:17'),
(3, 'Evan BIndin', 'evan@bindim.com', NULL, '$2y$10$Oj/tkGSyq062O7Lboi1KIOhSxZX3kBnTKwN2NUhHF7KOmOFL9HMSW', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-15 20:18:21', '2022-08-15 20:18:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
