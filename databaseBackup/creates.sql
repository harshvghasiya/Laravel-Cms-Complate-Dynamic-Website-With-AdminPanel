-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2021 at 01:51 PM
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
-- Database: `collective`
--

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE `creates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creates`
--

INSERT INTO `creates` (`id`, `cat_name`, `cat_color`, `created_at`, `updated_at`) VALUES
(1, 'dsf', 'sdf', '2020-12-10 00:07:50', '2020-12-10 00:07:50'),
(2, 'dsf', 'sdf', '2020-12-10 00:08:33', '2020-12-10 00:08:33'),
(3, 'rwtrn', 'gtg', '2020-12-14 22:02:23', '2020-12-14 22:02:23'),
(4, 'haeshn', 'fsdf', '2020-12-14 22:03:21', '2020-12-14 22:03:21'),
(21, 'j4', '5', '2020-12-18 04:38:37', '2020-12-18 04:38:38'),
(22, 'g1', '5', '2020-12-18 04:39:10', '2020-12-18 04:39:10'),
(23, 'g2', '5', '2020-12-18 04:39:10', '2020-12-18 04:39:10'),
(24, 'g3', '5', '2020-12-18 04:39:10', '2020-12-18 04:39:10'),
(25, 'f4', '5', '2020-12-18 04:39:30', '2020-12-18 04:39:30'),
(26, 'ghjhgj', '5', '2020-12-18 04:46:24', '2020-12-18 04:46:24'),
(27, 'hjgjghj', '5', '2020-12-18 04:46:24', '2020-12-18 04:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creates`
--
ALTER TABLE `creates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creates`
--
ALTER TABLE `creates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
