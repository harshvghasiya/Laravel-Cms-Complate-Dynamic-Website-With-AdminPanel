-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2021 at 02:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessusers`
--

CREATE TABLE `accessusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `access_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessusers`
--

INSERT INTO `accessusers` (`id`, `user_id`, `module_id`, `access_slug`, `created_at`, `updated_at`) VALUES
(40, 25, 4, 'add_banner', '2021-03-10 22:45:29', '2021-03-10 22:45:29'),
(41, 25, 4, 'del_banner', '2021-03-10 22:45:29', '2021-03-10 22:45:29'),
(42, 25, 5, 'del_blog', '2021-03-10 22:45:30', '2021-03-10 22:45:30'),
(43, 25, 6, 'del_catagory', '2021-03-10 22:45:30', '2021-03-10 22:45:30'),
(44, 26, 4, 'edit_banner', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(45, 26, 4, 'del_banner', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(46, 26, 5, 'edit_blog', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(47, 26, 5, 'del_blog', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(48, 26, 6, 'add_catagory', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(49, 26, 6, 'edit_catagory', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(50, 26, 9, 'del_contact', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(51, 26, 10, 'edit_module', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(52, 26, 10, 'del_module', '2021-03-10 22:52:14', '2021-03-10 22:52:14'),
(53, 26, 12, 'del_port', '2021-03-10 22:52:15', '2021-03-10 22:52:15'),
(54, 26, 15, 'del_some', '2021-03-10 22:52:15', '2021-03-10 22:52:15'),
(55, 27, 4, 'add_banner', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(56, 27, 4, 'edit_banner', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(57, 27, 4, 'del_banner', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(58, 27, 5, 'add_blog', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(59, 27, 5, 'edit_blog', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(60, 27, 5, 'del_blog', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(61, 27, 6, 'add_catagory', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(62, 27, 6, 'edit_catagory', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(63, 27, 6, 'del_catagory', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(64, 27, 17, 'add_user', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(65, 27, 17, 'edit_user', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(66, 27, 17, 'del_user', '2021-03-10 22:53:28', '2021-03-10 22:53:28'),
(67, 28, 4, 'add_banner', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(68, 28, 4, 'del_banner', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(69, 28, 5, 'edit_blog', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(70, 28, 6, 'add_catagory', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(71, 28, 6, 'del_catagory', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(72, 28, 7, 'del_tag', '2021-03-10 22:54:23', '2021-03-10 22:54:23'),
(73, 29, 4, 'add_banner', '2021-03-10 23:54:26', '2021-03-10 23:54:26'),
(74, 30, 4, 'add_banner', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(75, 30, 4, 'edit_banner', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(76, 30, 4, 'del_banner', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(77, 30, 4, 'status_banner', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(78, 30, 4, 'del_all_banner', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(79, 30, 5, 'add_blog', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(80, 30, 5, 'edit_blog', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(81, 30, 5, 'del_blog', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(82, 30, 6, 'add_catagory', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(83, 30, 6, 'edit_catagory', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(84, 30, 6, 'del_catagory', '2021-03-11 03:33:24', '2021-03-11 03:33:24'),
(85, 30, 7, 'add_tag', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(86, 30, 7, 'edit_tag', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(87, 30, 7, 'del_tag', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(88, 30, 8, 'add_cms', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(89, 30, 8, 'edit_cms', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(90, 30, 8, 'del_cms', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(91, 30, 9, 'del_contact', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(92, 30, 10, 'add_module', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(93, 30, 10, 'edit_module', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(94, 30, 10, 'del_module', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(95, 30, 11, 'del_news', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(96, 30, 12, 'add_port', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(97, 30, 12, 'edit_port', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(98, 30, 12, 'del_port', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(99, 30, 15, 'add_some', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(100, 30, 15, 'edit_some', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(101, 30, 15, 'del_some', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(102, 30, 17, 'add_user', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(103, 30, 17, 'edit_user', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(104, 30, 17, 'del_user', '2021-03-11 03:33:25', '2021-03-11 03:33:25'),
(105, 30, 27, 'add_apmodule', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(106, 30, 27, 'edit_apmodule', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(107, 30, 27, 'del_apmodule', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(108, 30, 28, 'add_test', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(109, 30, 28, 'edit_test', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(110, 30, 28, 'del_test', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(111, 30, 29, 'add_qna', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(112, 30, 29, 'edit_qna', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(113, 30, 29, 'del_qna', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(114, 30, 30, 'edit_setting', '2021-03-11 03:33:26', '2021-03-11 03:33:26'),
(115, 31, 4, 'add_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(116, 31, 4, 'edit_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(117, 31, 4, 'del_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(118, 31, 4, 'status_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(119, 31, 4, 'del_all_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(120, 31, 4, 'status_all_banner', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(121, 31, 5, 'add_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(122, 31, 5, 'edit_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(123, 31, 5, 'del_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(124, 31, 5, 'del_all_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(125, 31, 5, 'status_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(126, 31, 5, 'status_all_blog', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(127, 31, 6, 'add_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(128, 31, 6, 'edit_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(129, 31, 6, 'del_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(130, 31, 6, 'del_all_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(131, 31, 6, 'status_all_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(132, 31, 6, 'status_catagory', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(133, 31, 7, 'add_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(134, 31, 7, 'edit_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(135, 31, 7, 'del_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(136, 31, 7, 'status_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(137, 31, 7, 'status_all_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(138, 31, 7, 'del_all_tag', '2021-03-11 04:40:00', '2021-03-11 04:40:00'),
(139, 31, 8, 'add_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(140, 31, 8, 'edit_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(141, 31, 8, 'del_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(142, 31, 8, 'status_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(143, 31, 8, 'status_all_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(144, 31, 8, 'del_all_cms', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(145, 31, 9, 'del_contact', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(146, 31, 9, 'del_all_contact', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(147, 31, 10, 'add_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(148, 31, 10, 'edit_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(149, 31, 10, 'del_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(150, 31, 10, 'status_all_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(151, 31, 10, 'status_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(152, 31, 10, 'del_all_module', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(153, 31, 11, 'del_news', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(154, 31, 11, 'del_all_news', '2021-03-11 04:40:01', '2021-03-11 04:40:01'),
(155, 31, 12, 'add_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(156, 31, 12, 'edit_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(157, 31, 12, 'del_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(158, 31, 12, 'status_all_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(159, 31, 12, 'status_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(160, 31, 12, 'del_all_port', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(161, 31, 15, 'add_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(162, 31, 15, 'edit_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(163, 31, 15, 'del_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(164, 31, 15, 'status_all_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(165, 31, 15, 'status_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(166, 31, 15, 'del_all_some', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(167, 31, 17, 'add_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(168, 31, 17, 'edit_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(169, 31, 17, 'del_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(170, 31, 17, 'status_all_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(171, 31, 17, 'status_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(172, 31, 17, 'del_all_user', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(173, 31, 27, 'add_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(174, 31, 27, 'edit_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(175, 31, 27, 'del_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(176, 31, 27, 'status_all_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(177, 31, 27, 'status_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(178, 31, 27, 'del_all_apmodule', '2021-03-11 04:40:02', '2021-03-11 04:40:02'),
(179, 31, 28, 'add_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(180, 31, 28, 'edit_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(181, 31, 28, 'del_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(182, 31, 28, 'status_all_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(183, 31, 28, 'status_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(184, 31, 28, 'del_all_test', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(185, 31, 29, 'add_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(186, 31, 29, 'edit_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(187, 31, 29, 'del_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(188, 31, 29, 'status_all_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(189, 31, 29, 'status_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(190, 31, 29, 'del_all_qna', '2021-03-11 04:40:03', '2021-03-11 04:40:03'),
(191, 31, 30, 'edit_setting', '2021-03-11 04:40:03', '2021-03-11 04:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acount_privacy` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `email`, `password`, `name`, `status`, `remember_token`, `created_at`, `updated_at`, `image`, `acount_privacy`) VALUES
(8, 'ha@gmail.com', '$2y$10$F1qm9JfEoLoeLI6zM10FtODS6jvreMJJmcJ3.mUh2dEvbvJwIP7dW', 'harsh vaghasiya', 'InActive', 'mvaqJ2dIoBuvKSjTUsJ86NXVjkr19ed3aZAQ04jaYI2lMcWQb7CyaBOyQdJQ', '2021-02-24 00:59:22', '2021-03-11 03:31:55', 'noimage.png', 1),
(15, 'hya@gmail.comi', '$2y$10$k7mJbadPcr0ZPibmJLAKAeHN4sSfnjrJrLdDDmFrMg4P3jDcAYvOm', 'harsh vaghasiya', 'Active', 'V8OCNJLrCVciVrsUeqW13KA4wtLjpLReOv7c9wUEGwH7U2ar19vu1zGMB91b', '2021-03-09 00:40:01', '2021-03-09 21:50:46', 'noimage.png', 0),
(16, 'h3@gmail.com', '$2y$10$rs4S8PdnYrENdH6aN3OPROimn/1zwItI8EgFANGgMX.UmyhVKIXmy', 'harsh vaghasiya', 'Active', 'fe0KSJPusj0FRZQZEU1kJMkb73NUsBB6yU5DMDcVbIo27mtbQJEYCowEBhki', '2021-03-09 01:22:24', '2021-03-09 21:41:36', '1615272744.jpg', 0),
(19, 'harshvghasiyuiiya@gmail.com', '$2y$10$J5vHVWmf3QQYLjNAumYymeEDiXTY2tbRIzXon63DHwHSmrKB.alvC', 'harsh vaghasiya', 'Active', NULL, '2021-03-10 22:21:35', '2021-03-10 22:21:35', '1615434695.jpg', 0),
(27, 'h22@gmail.com', '$2y$10$r3cyzY6V9iey5Br8CxpqK.tYZYlNfeLj7/qaD.onETv2kYYrXAVUy', 'harsh vaghasiya', 'Active', NULL, '2021-03-10 22:53:27', '2021-03-10 22:53:27', '1615436607.jpg', 0),
(28, 'h33@gmail.com', '$2y$10$pxefHDECOa4xSDxw0y7b2Oo4kzZsghkvVJVZBifZLtecJaZZ2ohtm', 'harsh vaghasiya', 'Active', 'BjUHySrH1MU0DyzHiiSAVfNoc7WpROKQXz54eCEOvslIh4HokylMUYPR6vUU', '2021-03-10 22:54:23', '2021-03-10 22:54:23', '1615436663.jpg', 0),
(29, 'h45@gmail.com', '$2y$10$V2h5Oq.Ajri1ONdy9LUHL.epqo/zr6y2OdO7nSGatkh0cE4cz/kl2', 'harsh vaghasiya', 'Active', 'hsjqeBf7TSuxFVjUXYFlWbWUj8LmVoF3A1mHv5cHRhN7sPkjygmo0PcCKlfx', '2021-03-10 23:54:26', '2021-03-10 23:54:26', '1615440266.jpg', 0),
(30, 's@gmail.com', '$2y$10$x28JK2nje1Xo3HPI2RWL8OGVUXhvAR/M7R55YKmfdPPcGCnzghNzO', 'Harsh Vaghasiya (s)', 'Active', 'ZkEZ7H1uHAMF4LmCjkHPxkimVhcYd2eguhwb4LpPOI8ncqHaHXHdn8gCtVmp', '2021-03-11 03:33:24', '2021-03-11 03:33:24', '1615453404.jpg', 0),
(31, 'all@gmail.com', '$2y$10$i46rpHqdfoShNoxoedJFCeRF7v31U/acUw1AAZLjQ/vqVxKV8xM.2', 'harsh (All)', 'Active', 'WLSgslVSDMiHitDqJVgE4XXW00ZPWML5NRqRCmkrOZkQ9maDJsgWd76xxAa8', '2021-03-11 04:40:00', '2021-03-13 21:39:52', 'noimage.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `apdeledits`
--

CREATE TABLE `apdeledits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apdeledits`
--

INSERT INTO `apdeledits` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(26, 27, 'Add Apmodule', 'add_apmodule', NULL, NULL),
(27, 27, 'Edit Apmodule', 'edit_apmodule', NULL, NULL),
(28, 27, 'Delete Apmodule', 'del_apmodule', NULL, NULL),
(29, 15, 'Add Social Media', 'add_some', NULL, NULL),
(30, 15, 'Edit Socialmedia', 'edit_some', NULL, NULL),
(31, 15, 'Delete Social Media', 'del_some', NULL, NULL),
(32, 29, 'Add Qna', 'add_qna', NULL, NULL),
(33, 29, 'Edit Qna', 'edit_qna', NULL, NULL),
(34, 29, 'Delete Qna', 'del_qna', NULL, NULL),
(35, 17, 'Add User', 'add_user', NULL, NULL),
(36, 17, 'Edit User', 'edit_user', NULL, NULL),
(37, 17, 'Delete User', 'del_user', NULL, NULL),
(38, 28, 'Add Testimonial', 'add_test', NULL, NULL),
(39, 28, 'Edit Testimonial', 'edit_test', NULL, NULL),
(40, 28, 'Delete Testimonial', 'del_test', NULL, NULL),
(41, 4, 'Add  Banner', 'add_banner', NULL, NULL),
(42, 4, 'Edit Banner', 'edit_banner', NULL, NULL),
(43, 4, 'Delete Banner', 'del_banner', NULL, NULL),
(44, 5, 'Add Blog', 'add_blog', NULL, NULL),
(45, 5, 'Edit BLog', 'edit_blog', NULL, NULL),
(46, 5, 'Delete Blog', 'del_blog', NULL, NULL),
(47, 6, 'Add Catagory', 'add_catagory', NULL, NULL),
(48, 6, 'Edit Catagory', 'edit_catagory', NULL, NULL),
(49, 6, 'Delete Catagory', 'del_catagory', NULL, NULL),
(50, 7, 'Add Tag', 'add_tag', NULL, NULL),
(51, 7, 'Edit Tag', 'edit_tag', NULL, NULL),
(52, 8, 'Add Cms', 'add_cms', NULL, NULL),
(53, 8, 'Edit Cms', 'edit_cms', NULL, NULL),
(54, 7, 'Delte Tag', 'del_tag', NULL, NULL),
(55, 8, 'Delete Cms', 'del_cms', NULL, NULL),
(56, 9, 'Delete ConactUs', 'del_contact', NULL, NULL),
(57, 10, 'Add Module', 'add_module', NULL, NULL),
(58, 10, 'Edit Module', 'edit_module', NULL, NULL),
(59, 10, 'Delete Module', 'del_module', NULL, NULL),
(60, 11, 'Delete NewsLetter', 'del_news', NULL, NULL),
(61, 12, 'Add ProtFolio', 'add_port', NULL, NULL),
(62, 12, 'Edit Portfolio', 'edit_port', NULL, NULL),
(63, 12, 'Delete Portfolio', 'del_port', NULL, NULL),
(64, 30, 'Edit Setting', 'edit_setting', NULL, NULL),
(65, 4, 'Status Banner', 'status_banner', NULL, NULL),
(66, 4, 'DeleteAll Banner', 'del_all_banner', NULL, NULL),
(67, 4, 'StatusAll Banner', 'status_all_banner', NULL, NULL),
(68, 5, 'DeleteAll Blog', 'del_all_blog', NULL, NULL),
(69, 5, 'Status Blog', 'status_blog', NULL, NULL),
(70, 5, 'StatusAll Blog', 'status_all_blog', NULL, NULL),
(71, 6, 'Delete All ', 'del_all_catagory', NULL, NULL),
(72, 6, 'Status All', 'status_all_catagory', NULL, NULL),
(73, 6, 'Status Catagory', 'status_catagory', NULL, NULL),
(74, 7, 'Status Tag', 'status_tag', NULL, NULL),
(75, 7, 'StatusAll Tag', 'status_all_tag', NULL, NULL),
(76, 7, 'DeleteAll Tag', 'del_all_tag', NULL, NULL),
(77, 8, 'Status Cms', 'status_cms', NULL, NULL),
(78, 8, 'StatusAll Cms', 'status_all_cms', NULL, NULL),
(79, 8, 'DeleteAll Cms ', 'del_all_cms', NULL, NULL),
(80, 9, 'DeleteAll', 'del_all_contact', NULL, NULL),
(81, 10, 'StatusAll Module', 'status_all_module', NULL, NULL),
(82, 10, 'Status Module', 'status_module', NULL, NULL),
(83, 10, 'DeleteAll Module', 'del_all_module', NULL, NULL),
(84, 11, 'Delete All', 'del_all_news', NULL, NULL),
(85, 12, 'StatusAll Portfolio', 'status_all_port', NULL, NULL),
(86, 12, 'Status Portfolio', 'status_port', NULL, NULL),
(87, 12, 'DeleteAll PortFolio', 'del_all_port', NULL, NULL),
(88, 29, 'StatusAll Qna', 'status_all_qna', NULL, NULL),
(89, 29, 'Status Qna', 'status_qna', NULL, NULL),
(90, 29, 'DeleteAll Qna', 'del_all_qna', NULL, NULL),
(91, 15, 'StatusAll ', 'status_all_some', NULL, NULL),
(92, 15, 'Status', 'status_some', NULL, NULL),
(93, 15, 'DeleteAll', 'del_all_some', NULL, NULL),
(94, 17, 'StatusAll User', 'status_all_user', NULL, NULL),
(95, 17, 'Status User', 'status_user', NULL, NULL),
(96, 17, 'DeleteAll User', 'del_all_user', NULL, NULL),
(97, 27, 'StatusAll Apmodule', 'status_all_apmodule', NULL, NULL),
(98, 27, 'Status Apmodule', 'status_apmodule', NULL, NULL),
(99, 27, 'DeleteAll Apmodule', 'del_all_apmodule', NULL, NULL),
(100, 28, 'Status All ', 'status_all_test', NULL, NULL),
(101, 28, 'Status', 'status_test', NULL, NULL),
(102, 28, 'DeleteAll ', 'del_all_test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apmodules`
--

CREATE TABLE `apmodules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apmodules`
--

INSERT INTO `apmodules` (`id`, `name`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(4, 'Banner', 'Active', '2021-03-06 06:40:53', '2021-03-07 01:03:32', 8),
(5, 'Blog', 'Active', '2021-03-06 06:41:05', '2021-03-06 06:41:05', 8),
(6, 'Blog Catagory', 'Active', '2021-03-06 06:41:18', '2021-03-06 06:41:18', 8),
(7, 'Blog Tag', 'Active', '2021-03-06 06:41:29', '2021-03-06 06:41:29', 8),
(8, 'Cms', 'Active', '2021-03-06 06:41:39', '2021-03-06 06:41:39', 8),
(9, 'Contact Us', 'Active', '2021-03-06 06:41:54', '2021-03-06 06:41:54', 8),
(10, 'Module', 'Active', '2021-03-06 06:42:06', '2021-03-06 06:42:06', 8),
(11, 'Newsletter', 'Active', '2021-03-06 06:42:19', '2021-03-06 06:42:19', 8),
(12, 'Portfolio', 'Active', '2021-03-06 06:42:32', '2021-03-06 06:42:32', 8),
(15, 'Social Media', 'Active', '2021-03-06 06:42:51', '2021-03-06 06:42:51', 8),
(17, 'User', 'Active', '2021-03-06 06:43:25', '2021-03-06 06:43:25', 8),
(27, 'Access Controller Module', 'Active', '2021-03-09 00:46:39', '2021-03-09 00:46:39', 8),
(28, 'Testimonial', 'Active', '2021-03-09 00:57:36', '2021-03-09 00:57:36', 8),
(29, 'Qna', 'Active', '2021-03-09 00:57:43', '2021-03-09 00:57:43', 8),
(30, 'Settings', 'Active', '2021-03-09 01:07:23', '2021-03-09 01:07:23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `apm_users`
--

CREATE TABLE `apm_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apm_id` bigint(255) UNSIGNED NOT NULL,
  `user_id` bigint(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apm_users`
--

INSERT INTO `apm_users` (`id`, `created_at`, `updated_at`, `apm_id`, `user_id`) VALUES
(27, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 4, 16),
(28, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 5, 16),
(29, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 6, 16),
(30, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 7, 16),
(31, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 8, 16),
(32, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 9, 16),
(33, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 10, 16),
(34, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 11, 16),
(35, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 12, 16),
(36, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 15, 16),
(37, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 17, 16),
(38, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 27, 16),
(39, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 28, 16),
(40, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 29, 16),
(41, '2021-03-09 01:22:24', '2021-03-09 01:22:24', 30, 16),
(174, '2021-03-09 06:28:26', '2021-03-09 06:28:26', 4, 8),
(181, '2021-03-09 06:28:51', '2021-03-09 06:28:51', 12, 8),
(182, '2021-03-09 06:28:51', '2021-03-09 06:28:51', 27, 8),
(183, '2021-03-09 06:28:51', '2021-03-09 06:28:51', 30, 8),
(391, '2021-03-09 21:31:30', '2021-03-09 21:31:30', 6, 15),
(410, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 7, 15),
(411, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 8, 15),
(412, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 9, 15),
(413, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 10, 15),
(414, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 15, 15),
(415, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 28, 15),
(416, '2021-03-09 21:42:03', '2021-03-09 21:42:03', 30, 15),
(435, '2021-03-10 22:21:35', '2021-03-10 22:21:35', 4, 19),
(456, '2021-03-10 22:53:28', '2021-03-10 22:53:28', 4, 27),
(457, '2021-03-10 22:53:28', '2021-03-10 22:53:28', 5, 27),
(458, '2021-03-10 22:53:28', '2021-03-10 22:53:28', 6, 27),
(459, '2021-03-10 22:53:28', '2021-03-10 22:53:28', 17, 27),
(460, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 4, 28),
(461, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 5, 28),
(462, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 6, 28),
(463, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 7, 28),
(464, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 17, 28),
(465, '2021-03-10 22:54:23', '2021-03-10 22:54:23', 29, 28),
(466, '2021-03-10 23:54:26', '2021-03-10 23:54:26', 4, 29),
(467, '2021-03-11 03:33:24', '2021-03-11 03:33:24', 4, 30),
(468, '2021-03-11 03:33:24', '2021-03-11 03:33:24', 5, 30),
(469, '2021-03-11 03:33:24', '2021-03-11 03:33:24', 6, 30),
(470, '2021-03-11 03:33:24', '2021-03-11 03:33:24', 7, 30),
(471, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 8, 30),
(472, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 9, 30),
(473, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 10, 30),
(474, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 11, 30),
(475, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 12, 30),
(476, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 15, 30),
(477, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 17, 30),
(478, '2021-03-11 03:33:25', '2021-03-11 03:33:25', 27, 30),
(479, '2021-03-11 03:33:26', '2021-03-11 03:33:26', 28, 30),
(480, '2021-03-11 03:33:26', '2021-03-11 03:33:26', 29, 30),
(481, '2021-03-11 03:33:26', '2021-03-11 03:33:26', 30, 30),
(482, '2021-03-11 04:40:00', '2021-03-11 04:40:00', 4, 31),
(497, '2021-03-13 21:39:52', '2021-03-13 21:39:52', 5, 31),
(498, '2021-03-13 21:39:52', '2021-03-13 21:39:52', 6, 31),
(499, '2021-03-13 21:39:52', '2021-03-13 21:39:52', 7, 31),
(500, '2021-03-13 21:39:52', '2021-03-13 21:39:52', 8, 31),
(501, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 9, 31),
(502, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 10, 31),
(503, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 11, 31),
(504, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 12, 31),
(505, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 15, 31),
(506, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 17, 31),
(507, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 27, 31),
(508, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 28, 31),
(509, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 29, 31),
(510, '2021-03-13 21:39:53', '2021-03-13 21:39:53', 30, 31);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `url`, `status`, `image`, `created_at`, `updated_at`, `created_by`) VALUES
(5, 'client', 'http://localhost/blog_web/public', 'Active', '1609303545.png', '2020-12-29 23:03:33', '2021-03-09 22:01:03', NULL),
(6, 'client', 'http://localhost/blog_web/public', 'Active', '1609303556.png', '2020-12-29 23:06:19', '2021-03-04 22:28:35', NULL),
(17, 'harsh vaghasiya', 'http://localhost/blog_web/public/addsocialmedia', 'Active', '1615281753.jpg', '2021-03-09 03:52:33', '2021-03-09 03:52:33', 16),
(18, 'tyutyu', 'http://localhost/blog_web/public', 'Active', '1615282025.jpg', '2021-03-09 03:57:05', '2021-03-09 03:57:05', 16);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(20, 'Google inks pact for new 35-storey office', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '1609160452.jpg', 'InActive', '2020-12-28 06:47:13', '2021-03-20 05:09:08', 0),
(26, 'sad', '<p>jfgj</p>', '1615291349.jpg', 'Active', '2021-03-09 06:32:29', '2021-03-09 06:32:29', 16),
(27, 'Google inks pact for new 35-storey office', '<p>yuiy</p>', '1615691947.jpg', 'Active', '2021-03-13 21:49:07', '2021-03-13 21:49:07', 31),
(28, 'sad', '<p>f</p>', '1615692123.jpg', 'Active', '2021-03-13 21:52:03', '2021-03-13 21:52:03', 31),
(29, 'Google inks pact for new 35-storey office', '<p>yry</p>', '1615715882.png', 'Active', '2021-03-14 04:28:02', '2021-03-14 04:28:02', 31),
(30, 'yui', '<p>ui</p>', '1615716564.jpg', 'Active', '2021-03-14 04:39:24', '2021-03-14 04:39:24', 31),
(31, 'hgfh', '<p>ghfgh</p>', '1616219716.jpg', 'Active', '2021-03-20 00:25:16', '2021-03-20 00:25:16', 31),
(32, 'sad', '<p>ytutyutyu</p>', '1616219858.png', 'Active', '2021-03-20 00:27:38', '2021-03-20 00:27:38', 31),
(33, 'tryrtyr', '<p>tyrt</p>', '1616220126.jpg', 'Active', '2021-03-20 00:32:06', '2021-03-20 00:32:06', 31);

-- --------------------------------------------------------

--
-- Table structure for table `blog_catagories`
--

CREATE TABLE `blog_catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_id` bigint(20) UNSIGNED NOT NULL DEFAULT '5',
  `blogs_id` bigint(20) UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_catagories`
--

INSERT INTO `blog_catagories` (`id`, `catagory_id`, `blogs_id`, `created_at`, `updated_at`) VALUES
(31, 7, 26, '2021-03-09 06:32:29', '2021-03-09 06:32:29'),
(32, 16, 26, '2021-03-09 06:32:29', '2021-03-09 06:32:29'),
(62, 15, 20, '2021-03-09 07:23:53', '2021-03-09 07:23:53'),
(88, 7, 27, '2021-03-13 21:49:07', '2021-03-13 21:49:07'),
(89, 16, 27, '2021-03-13 21:49:07', '2021-03-13 21:49:07'),
(90, 5, 28, '2021-03-13 21:52:03', '2021-03-13 21:52:03'),
(91, 16, 20, '2021-03-13 21:56:38', '2021-03-13 21:56:38'),
(92, 18, 20, '2021-03-13 21:56:38', '2021-03-13 21:56:38'),
(93, 7, 29, '2021-03-14 04:28:02', '2021-03-14 04:28:02'),
(95, 7, 30, '2021-03-14 04:39:24', '2021-03-14 04:39:24'),
(112, 15, 29, '2021-03-14 04:50:05', '2021-03-14 04:50:05'),
(113, 7, 31, '2021-03-20 00:25:16', '2021-03-20 00:25:16'),
(114, 5, 32, '2021-03-20 00:27:38', '2021-03-20 00:27:38'),
(115, 15, 32, '2021-03-20 00:27:38', '2021-03-20 00:27:38'),
(116, 7, 33, '2021-03-20 00:32:06', '2021-03-20 00:32:06'),
(117, 15, 33, '2021-03-20 00:32:06', '2021-03-20 00:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `created_at`, `updated_at`, `tag_id`) VALUES
(21, 30, '2021-03-14 04:39:24', '2021-03-14 04:39:24', 1),
(22, 30, '2021-03-14 04:39:24', '2021-03-14 04:39:24', 3),
(36, 29, '2021-03-14 04:49:18', '2021-03-14 04:49:18', 1),
(37, 31, '2021-03-20 00:25:16', '2021-03-20 00:25:16', 1),
(38, 31, '2021-03-20 00:25:16', '2021-03-20 00:25:16', 2),
(39, 32, '2021-03-20 00:27:38', '2021-03-20 00:27:38', 1),
(40, 32, '2021-03-20 00:27:38', '2021-03-20 00:27:38', 2),
(41, 33, '2021-03-20 00:32:06', '2021-03-20 00:32:06', 1),
(42, 33, '2021-03-20 00:32:06', '2021-03-20 00:32:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(5, 'harsh', 'Active', '2020-12-21 05:26:20', '2020-12-21 05:28:49', 0),
(6, 'fgdfg', 'InActive', '2020-12-21 07:26:26', '2020-12-24 09:18:36', 0),
(7, 'sdfsd', 'Active', '2020-12-21 07:26:29', '2020-12-21 07:26:29', 0),
(15, 'harsh23', 'Active', '2020-12-24 22:11:33', '2020-12-24 22:11:33', 0),
(16, 'gdfgfd', 'Active', '2020-12-25 04:36:53', '2020-12-25 04:39:58', 0),
(18, 'fgdg', 'Active', '2021-03-05 09:06:52', '2021-03-05 09:06:52', 8),
(19, 'fgdfg8', 'Active', '2021-03-09 03:59:52', '2021-03-09 03:59:52', 16),
(20, 'yuytu', 'Active', '2021-03-20 01:07:02', '2021-03-20 01:07:02', 31);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_on_header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_on_footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` longtext COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(255) DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `secondary_title`, `display_on_header`, `display_on_footer`, `status`, `image`, `seo_title`, `seo_keyword`, `seo_description`, `short_description`, `long_description`, `created_at`, `updated_at`, `module_id`, `parent_id`, `created_by`) VALUES
(10, 'fsf', 'fsdfsdf', 'Yes', 'Yes', 'Active', '1609321673.png', 'sdf', 'sdf', 'dsf', NULL, NULL, '2020-12-30 04:17:53', '2021-03-07 00:53:29', 3, NULL, 8),
(11, 'harsh', 'We are team of talanted designers making websites with Bootstrap', 'Yes', 'Yes', 'Active', '1609321855.png', 'gk', 'jkl', 'jl', NULL, NULL, '2020-12-30 04:20:55', '2020-12-30 04:20:55', 3, 10, 8),
(12, 'PHP', 'PHP', 'No', 'No', 'Active', '1614743332.png', 'PHP', 'PHP', 'Based on the Pearl language, PHP is used for developing light-weight web applications.', '<p>Based on the Pearl language, PHP is used for developing light-weight web applications.</p>', '<p>Based on the Pearl language, PHP is used for developing light-weight web applications.</p>', '2021-03-02 21:53:55', '2021-03-02 22:18:52', 6, 10, 8),
(13, 'Laravel', 'Laravel', 'No', 'No', 'Active', '1614741945.png', 'Laravel', 'laravel', 'One of the latest trending frameworks for PHP-MVC web applications.', NULL, NULL, '2021-03-02 21:55:45', '2021-03-02 21:55:45', 6, 10, 8),
(14, 'Responsive Web Design', 'Responsive Web Design', 'No', 'No', 'Active', '1614742055.jpg', 'Responsive Web Design', 'Responsive Web Design', 'The craze nowadays. All our web apps are built in this fashion as they support multiple devices.', NULL, NULL, '2021-03-02 21:57:35', '2021-03-02 21:57:35', 6, 10, 8),
(15, 'Web Design & Web Development', 'Web Design & Web Development', 'No', 'No', 'Active', '1614742152.jpg', 'Web Design & Web Development', 'Web Design & Web Development', 'We provide for both the web-design as well as web-development for a web-site. In our team we have separate specialists for each of the jobs.', '<p>We provide for both the web-design as well as web-development for a web-site. In our team we have separate specialists for each of the jobs.</p>', '<p>We provide for both the web-design as well as web-development for a web-site. In our team we have separate specialists for each of the jobs.</p>', '2021-03-02 21:59:12', '2021-03-02 21:59:12', 6, 10, 8),
(16, 'Developing Website Solutions with Laravel', 'Developing Website Solutions with Laravel', 'No', 'No', 'Active', '1614744799.png', 'Developing Website Solutions with Laravel', 'Developing Website Solutions with Laravel', 'We, at Softtechover, are one the rapidly growing ​Laravel development company who offer ​Laravel website Development in India for our customers. Our clients are based all over the globe and we provide web solutions to them using the Laravel Software platform. Through our efficiency, protection and well-documented code we believe in providing our clients with the best services', NULL, NULL, '2021-03-02 22:43:19', '2021-03-07 00:52:49', 5, 10, 8),
(17, 'Lightweight PHP Website Solution Development', 'Lightweight PHP Website Solution Development', 'No', 'No', 'Active', '1614744904.png', 'Lightweight PHP Website Solution Development', 'Lightweight PHP Website Solution Development', 'We, at Softtechover, are the best ​PHP application development company known for developing PHP websites for interactive, database-driven, and high-performance enterprise. Online PHP business applications, e-commerce systems, back-end data management systems are also our expertise. Besides PHP, we specialize in e-Commerce solutions, Web development with Laravel, and website designing', NULL, NULL, '2021-03-02 22:45:04', '2021-03-02 22:45:04', 5, 10, 8),
(21, 'Corporis voluptates sit', 'Corporis voluptates sit', 'Yes', 'Yes', 'Active', '1616581921.png', 'f', 'df', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', '<p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>', '<p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>', '2021-03-24 05:02:02', '2021-03-24 05:02:02', 10, 10, 31);

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `name`, `message`, `email`, `created_at`, `updated_at`, `subject`) VALUES
(37, 'harsh vaghasiya', 'fdgfdgfd', 'harshvghasiya@gmail.com', '2021-03-04 22:33:02', '2021-03-04 22:33:02', 'About bussines');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_blogs`
--

CREATE TABLE `front_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_12_21_034703_create_blogs_table', 1),
(10, '2020_12_21_035428_create_catagories_table', 1),
(11, '2020_12_21_131613_create_settings_table', 2),
(12, '2020_12_22_034336_create_social_media_table', 3),
(13, '2020_12_22_124725_create_contactuses_table', 4),
(14, '2020_12_22_140305_create_modules_table', 5),
(15, '2020_12_23_055103_create_blog_catagories_table', 6),
(16, '2020_12_24_061053_create_blog_tags_table', 7),
(17, '2020_12_25_055842_create_cms_table', 8),
(18, '2020_12_25_141356_create_banners_table', 9),
(19, '2020_12_28_112849_create_front_blogs_table', 10),
(20, '2021_02_22_090846_create_testimonials_table', 11),
(21, '2021_02_23_040015_create_portfolios_table', 12),
(22, '2021_02_23_052838_create_qnas_table', 13),
(23, '2021_02_23_102619_create_admin_logins_table', 14),
(24, '2021_02_26_042243_create_userfollows_table', 15),
(25, '2021_03_05_042254_create_newsletters_table', 16),
(26, '2021_03_06_112303_create_apmodules_table', 17),
(27, '2021_03_06_123914_create_apm_users_table', 18),
(28, '2021_03_10_092324_create_apdeledits_table', 19),
(29, '2021_03_11_033243_create_accessusers_table', 20),
(30, '2021_03_14_092017_create_tags_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(3, 'harsh vaghasiya222', 'ty', 'Active', '2020-12-22 23:22:54', '2021-03-07 00:57:48', 8),
(4, 'header', 'header', 'Active', '2020-12-29 23:19:03', '2020-12-29 23:41:16', 8),
(5, 'Services', 'services', 'Active', '2021-03-02 21:25:08', '2021-03-02 21:25:08', 8),
(6, 'OUR TOP WEB DEVELOPMENT SOLUTIONS', 'ourtopwebdevelopmentsolutions', 'Active', '2021-03-02 21:27:45', '2021-03-02 21:27:45', 8),
(10, 'AboutUs', 'aboutus', 'Active', '2021-03-24 04:52:35', '2021-03-24 04:52:35', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'harshvghasiya@gmail.com', 'Active', '2021-03-04 23:01:16', '2021-03-04 23:33:04');

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
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noimage.png',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `url`, `image`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(2, 'harsh vaghasiya', 'http://localhost/blog_web/public/addsocialmedia', '1614055883.png', 'InActive', '2021-02-22 23:21:23', '2021-02-22 23:45:40', 8),
(4, 'erwer', 'http://localhost/blog_web/public/addsocialmedia', 'noimage.png', 'InActive', '2021-02-22 23:28:03', '2021-02-22 23:45:39', 8),
(5, 'App', 'http://localhost/blog_web/public/addsocialmedia', '1614745812.jpg', 'Active', '2021-03-02 23:00:12', '2021-03-02 23:00:12', 8),
(6, 'App', 'http://localhost/blog_web/public/addsocialmedia', '1614745925.jpg', 'Active', '2021-03-02 23:02:05', '2021-03-02 23:02:05', 8),
(7, 'App', 'http://localhost/blog_web/public/addsocialmedia', '1614745961.jpg', 'Active', '2021-03-02 23:02:41', '2021-03-02 23:02:41', 8),
(8, 'Card', 'http://localhost/blog_web/public/addsocialmedia', '1614745995.jpg', 'Active', '2021-03-02 23:03:15', '2021-03-02 23:03:15', 8),
(9, 'Card', 'http://localhost/blog_web/public/addsocialmedia', '1614746059.jpg', 'Active', '2021-03-02 23:04:19', '2021-03-02 23:04:19', 8),
(10, 'Web', 'http://localhost/blog_web/public/addsocialmedia', '1614746073.jpg', 'Active', '2021-03-02 23:04:33', '2021-03-02 23:04:33', 8),
(11, 'Web', 'http://localhost/blog_web/public/addsocialmedia', '1614746100.jpg', 'Active', '2021-03-02 23:05:00', '2021-03-02 23:05:00', 8),
(12, 'Draw', 'http://localhost/blog_web/public/addsocialmedia', '1614914419.jpg', 'Active', '2021-03-04 21:50:20', '2021-03-04 21:50:20', 8),
(13, '789', 'http://localhost/blog_web/public/addsocialmedia', '1615090062.jpg', 'InActive', '2021-03-06 22:37:24', '2021-03-06 22:37:51', 8);

-- --------------------------------------------------------

--
-- Table structure for table `qnas`
--

CREATE TABLE `qnas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qnas`
--

INSERT INTO `qnas` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(3, 'er', 'rewrwe', 'InActive', '2021-02-23 00:40:19', '2021-03-04 22:20:34', 8),
(4, 'Non consectetur a erat nam at lectus urna duis?', 'Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.', 'Active', '2021-03-04 22:07:57', '2021-03-04 22:20:35', 8),
(5, 'Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?', 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.', 'Active', '2021-03-04 22:12:40', '2021-03-04 22:20:29', 8),
(6, 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?', 'Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis', 'Active', '2021-03-04 22:12:59', '2021-03-04 22:20:29', 8),
(7, 'Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?', 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.', 'Active', '2021-03-04 22:13:14', '2021-03-04 22:20:29', 8),
(8, 'Tempus quam pellentesque nec nam aliquam sem et tortor consequat?', 'Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in', 'Active', '2021-03-04 22:13:28', '2021-03-04 22:20:29', 8),
(9, 'll', 'kk', 'Active', '2021-03-06 22:50:50', '2021-03-06 22:52:32', 8);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_decription_footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_decription_sidebar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `first_email`, `second_email`, `first_mobile`, `second_mobile`, `web_url`, `author_name`, `author_decription_footer`, `author_decription_sidebar`, `address`, `created_at`, `updated_at`, `image`) VALUES
(1, 'vghasiyaharsh@gmail.com', 'admin@xyz.com', '9724434838', '9874561231', 'http://localhost/blog_web/public/admin/setting', 'harsh', '<p>Harsh Vaghasiya Intern and developer at softtechover,Studing in Goverment Engniring Collage Bhavnagar.</p>', '<p>Harsh Vaghasiya Intern and developer at softtechover,Studing in Goverment Engniring Collage Bhavnagar.</p>', '<p>Plote No.-233, Nari,Navapara,</p>\r\n\r\n<p>Bavnagagar,Gujarat,India,</p>\r\n\r\n<p>PinNo - 364004</p>\r\n\r\n<p> </p>', '2020-12-21 13:54:10', '2020-12-30 10:37:00', '1609344420.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `title` varchar(20000) NOT NULL,
  `icon` varchar(20000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `title`, `icon`, `status`, `url`, `created_at`, `updated_at`, `created_by`) VALUES
(2, 'facebook', '1609319226.png', 'Active', 'http://localhost/blog_web/public/addsocialmedia', '2020-12-28 08:08:57', '2020-12-30 03:37:06', 8),
(3, 'instagram', '1609319148.jpg', 'Active', 'https://www.instagram.com/', '2020-12-30 03:29:15', '2020-12-30 03:35:48', 8),
(4, 'linkedin', '1609318847.png', 'Active', 'https://www.linkedin.com/in/harsh-vaghasiya-b03180202/', '2020-12-30 03:30:47', '2020-12-30 03:30:47', 8),
(6, 'yty', '1615110932.jpg', 'InActive', 'http://localhost/blog_web/public/addsocialmedia', '2021-03-07 04:25:32', '2021-03-14 05:42:52', 8),
(7, 'sad', '1615110953.jpg', 'InActive', 'http://localhost/blog_web/public/addsocialmedia', '2021-03-07 04:25:53', '2021-03-14 05:42:47', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'InActive',
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`, `status`, `created_by`) VALUES
(1, 'ewr', '2021-03-14 04:06:43', '2021-03-14 04:06:43', 'Active', 8),
(2, 'yuytu', '2021-03-14 04:07:06', '2021-03-14 04:07:06', 'Active', 8),
(3, 'Harsh4', '2021-03-14 04:07:58', '2021-03-14 04:19:04', 'Active', 8),
(5, 'jhkjhkjhkhk', '2021-03-14 04:08:08', '2021-03-14 04:14:56', 'InActive', 8),
(8, 'retretret', '2021-03-14 04:54:24', '2021-03-14 05:04:12', 'InActive', 8);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(11) UNSIGNED NOT NULL DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role`, `about`, `created_at`, `updated_at`, `image`, `status`, `created_by`) VALUES
(1, 'Sara Wilsson', 'Designer', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', '2021-03-04 21:54:28', '2021-03-04 21:54:28', '1614914668.jpg', 'Active', 8),
(2, 'Jena Karlis', 'Store Owner', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', '2021-03-04 21:55:13', '2021-03-04 21:55:13', '1614914713.jpg', 'Active', 8),
(3, 'Matt Brandon', 'Freelancer', 'Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.', '2021-03-04 21:55:54', '2021-03-04 21:55:54', '1614914754.jpg', 'Active', 8),
(4, 'John Larson', 'Entrepreneur', 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat esse veniam culpa fore nisi cillum quid.', '2021-03-04 21:56:42', '2021-03-04 21:56:42', '1614914802.jpg', 'Active', 8),
(5, 'harsh vaghasiya', 'xyz', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit', '2021-03-04 22:02:46', '2021-03-07 01:02:14', '1614915166.jpg', 'InActive', 8);

-- --------------------------------------------------------

--
-- Table structure for table `userfollows`
--

CREATE TABLE `userfollows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_id` bigint(11) UNSIGNED DEFAULT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `follow_status` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'harsh vaghasiya', 'harshvghasiya@gmail.com', NULL, '$2y$10$syMhNshqdNeW4H9xtc9EU.n1HfTewnWtlnvCQXqppjAxGyrbiesI.', NULL, '2021-02-19 23:40:51', '2021-02-19 23:40:51'),
(2, 'harsh', 'harsh@gmail.com', NULL, '$2y$10$c1a1gRGG.CaNRyAFgHL0EO3XnvbKbB2rGgJB7tuvNm5vNFdC4mnaS', NULL, '2021-02-20 00:09:06', '2021-02-20 00:09:06'),
(3, 'harsh vaghasiya', 'hara@gmail.com', NULL, '$2y$10$aJX.AwU4cje6BYkGLSoLRuHIV4QAwsoRhLY9ewMno9tKElJrlq26a', NULL, '2021-02-20 00:45:55', '2021-02-20 00:45:55'),
(4, 'harsh vaghasiya', 'hgh@gmail.com', NULL, '$2y$10$Nfb.15UTCzI24A.NtF80kualui8HELoZvVd7cNL0ejpZmB45MQv56', NULL, '2021-02-20 00:55:34', '2021-02-20 00:55:34'),
(5, 'harsh vaghasiya', 'harshvghadsad@com.vom', NULL, '$2y$10$TT.7Nk5n9iVRcTmeqwdOV.tf.uIk671R2SnHiTSMyRxN7d1n906rm', NULL, '2021-02-22 03:14:57', '2021-02-22 03:14:57'),
(7, 'harsh vaghasiya', 'hars@gmail.com', NULL, '$2y$10$ThXMXAn.VqzAx35/OjODgOg7YTOBlmOa.jBDOSiLi4jktboRnjNbG', NULL, '2021-03-11 22:27:36', '2021-03-11 22:27:36'),
(8, 'harsh vaghasiya', 'ha@gmail.com', NULL, '$2y$10$sHBGDz1yD3C1HYL.K2WSkeggTXuOfd80f6Gs7R7b2iaKqEnelYURO', NULL, '2021-03-11 22:30:03', '2021-03-11 22:30:03'),
(9, 'harsh vaghasiya', 'hewa@gmail.com', NULL, '$2y$10$4L7YTSDQmm3qsi.TAEgRg.hobNddm5yfGZ1.XjmZoGcuzq1hvNDyS', NULL, '2021-03-11 22:42:55', '2021-03-11 22:42:55'),
(10, 'harsh vaghasiya', 'harshvgerwerhasiya@gmail.com', NULL, '$2y$10$0iiNWWq4C3h7BW.QUZmuFerpH1LD0ZIZHt8w2FlA5nNJdfi.imGNm', NULL, '2021-03-11 22:48:16', '2021-03-11 22:48:16'),
(11, 'harsh vaghasiya', 'qq@gmail.com', NULL, '$2y$10$h4O4sYbBaPJeuf1bI.e3bulxte2PF1blbBNobkj9pN.vS31Rr4Eiu', NULL, '2021-03-11 22:48:46', '2021-03-11 22:48:46'),
(12, 'harsh vaghasiya', 'a@gmail.com', NULL, '$2y$10$QuyeLQXPTewOuTESFmMNq.887uKFz6axyqHA.AoMgYv91Hx6WhK3K', NULL, '2021-03-11 23:23:37', '2021-03-11 23:23:37'),
(13, 'harsh vaghasiya', 'tryharshvghasiya@gmail.com', NULL, '$2y$10$eWew3DIVA46lmDfOv1wTWeOlEqlcP.JcMKNRJG.VdJnqo25OhIafK', NULL, '2021-03-11 23:39:02', '2021-03-11 23:39:02'),
(14, 'harsh vaghasiya', 'harshvghasiya14@gmail.com', NULL, '$2y$10$JiTNh8iFXLr/qVkJN2y2DeDh8szLB8/I4dLHqNyLI74uuok4HADVy', NULL, '2021-03-12 04:40:01', '2021-03-12 04:40:01'),
(15, 'harsh vaghasiya', 'e@gmail.com', NULL, '$2y$10$KTVmkd5INDu0B9gPOJzNquPb.8DoU0WS3A4D0k8IhTMkHq8MFT1wO', NULL, '2021-03-24 05:14:11', '2021-03-24 05:14:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessusers`
--
ALTER TABLE `accessusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_logins_email_unique` (`email`);

--
-- Indexes for table `apdeledits`
--
ALTER TABLE `apdeledits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `y` (`module_id`);

--
-- Indexes for table `apmodules`
--
ALTER TABLE `apmodules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rwerwer` (`created_by`);

--
-- Indexes for table `apm_users`
--
ALTER TABLE `apm_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testfgd` (`apm_id`),
  ADD KEY `test3gf` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testg` (`created_by`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_catagories`
--
ALTER TABLE `blog_catagories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`blogs_id`),
  ADD KEY `test3` (`catagory_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fgfdg` (`blog_id`),
  ADD KEY `dsa` (`tag_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trt` (`module_id`),
  ADD KEY `tret` (`created_by`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_blogs`
--
ALTER TABLE `front_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fdg` (`created_by`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rtrty` (`created_by`);

--
-- Indexes for table `qnas`
--
ALTER TABLE `qnas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iyui` (`created_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hjgj` (`created_by`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfollows`
--
ALTER TABLE `userfollows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testy` (`auth_id`),
  ADD KEY `test3y` (`user_id`);

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
-- AUTO_INCREMENT for table `accessusers`
--
ALTER TABLE `accessusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `apdeledits`
--
ALTER TABLE `apdeledits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `apmodules`
--
ALTER TABLE `apmodules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `apm_users`
--
ALTER TABLE `apm_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blog_catagories`
--
ALTER TABLE `blog_catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_blogs`
--
ALTER TABLE `front_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `qnas`
--
ALTER TABLE `qnas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userfollows`
--
ALTER TABLE `userfollows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apdeledits`
--
ALTER TABLE `apdeledits`
  ADD CONSTRAINT `y` FOREIGN KEY (`module_id`) REFERENCES `apmodules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apmodules`
--
ALTER TABLE `apmodules`
  ADD CONSTRAINT `rwerwer` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apm_users`
--
ALTER TABLE `apm_users`
  ADD CONSTRAINT `test3gf` FOREIGN KEY (`user_id`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testfgd` FOREIGN KEY (`apm_id`) REFERENCES `apmodules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `testg` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_catagories`
--
ALTER TABLE `blog_catagories`
  ADD CONSTRAINT `test` FOREIGN KEY (`blogs_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test3` FOREIGN KEY (`catagory_id`) REFERENCES `catagories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD CONSTRAINT `dsa` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fgfdg` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms`
--
ALTER TABLE `cms`
  ADD CONSTRAINT `tret` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trt` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fdg` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `rtrty` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qnas`
--
ALTER TABLE `qnas`
  ADD CONSTRAINT `iyui` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `hjgj` FOREIGN KEY (`created_by`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userfollows`
--
ALTER TABLE `userfollows`
  ADD CONSTRAINT `test3y` FOREIGN KEY (`user_id`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testy` FOREIGN KEY (`auth_id`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
