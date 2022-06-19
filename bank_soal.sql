-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 08:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_soal`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'd9e9a43015a4afe6eed92b2c326edcb8', '2022-02-05 18:53:58'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'fd1df83ad82b73470b866420b99c357f', '2022-02-05 19:08:11'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'f082996507ec3acfd1fdf32db7381009', '2022-02-12 01:19:05'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'dfa19869a42302d47d23f2cfe5226b62', '2022-03-16 08:22:22'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'c8754d286eb613f1792eeff1097fc022', '2022-03-16 09:01:47'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'c39712e7e8551e42e65fb953acdc03ee', '2022-03-16 09:17:34'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '04b55965a95fbf3c7ee0b953f426348a', '2022-03-16 19:26:27'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'a32ab5899867b9d7e8bf74ecf8515817', '2022-03-16 22:56:24'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'a32ab5899867b9d7e8bf74ecf8515817', '2022-03-16 22:58:03'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '86a4139f2d470e4aa5dc7fefaa56c603', '2022-06-03 04:58:33'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '851f7f4d46d0f391577073c7903f28c8', '2022-06-05 02:42:16'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'f11c47b6cd672ea89299b945c880b8cf', '2022-06-05 02:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Mengelola keseluruhan data '),
(2, 'guru', 'pengguna yang hanya dapat mengelola data soal'),
(3, 'mgmp', 'melakukan validator soal');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 24),
(2, 25),
(3, 21),
(3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ferdianrafli125@gmail.com', 3, '2022-02-05 18:58:02', 1),
(2, '::1', 'rafli', NULL, '2022-02-05 19:05:51', 0),
(3, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-05 19:09:11', 1),
(4, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-05 19:11:13', 1),
(5, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-05 21:34:38', 1),
(6, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-05 22:18:12', 1),
(7, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-05 22:30:11', 1),
(8, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-06 01:29:39', 1),
(9, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-06 02:37:58', 1),
(10, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-06 03:15:45', 1),
(11, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-07 08:35:19', 1),
(12, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-07 09:04:24', 1),
(13, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-07 20:25:52', 1),
(14, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-08 06:05:03', 1),
(15, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-08 19:45:59', 1),
(16, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-09 02:54:54', 1),
(17, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-09 19:08:37', 1),
(18, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-10 00:52:35', 1),
(19, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-10 05:23:08', 1),
(20, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-10 18:58:41', 1),
(21, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-11 04:09:43', 1),
(22, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-11 10:45:39', 1),
(23, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-11 20:20:55', 1),
(24, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-12 00:40:36', 1),
(25, '::1', 'RafliFerdian25', 5, '2022-02-12 01:16:33', 0),
(26, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 01:19:07', 1),
(27, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-12 01:23:22', 1),
(28, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 01:23:30', 1),
(29, '::1', 'RafliFerdian25asdsad', NULL, '2022-02-12 01:46:00', 0),
(30, '::1', 'tokosundip@gmail.com', 5, '2022-02-12 01:47:02', 1),
(31, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-12 04:48:09', 1),
(32, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 04:51:15', 1),
(33, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 04:55:08', 1),
(34, '::1', 'RafliFerdian25', NULL, '2022-02-12 04:55:49', 0),
(35, '::1', 'RafliFerdian25', NULL, '2022-02-12 05:00:51', 0),
(36, '::1', 'RafliFerdian25', NULL, '2022-02-12 05:01:00', 0),
(37, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 05:01:07', 1),
(38, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 05:11:16', 1),
(39, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 05:21:42', 1),
(40, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 06:40:30', 1),
(41, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-12 18:45:25', 1),
(42, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-12 18:51:56', 1),
(43, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-13 00:20:22', 1),
(44, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-13 00:25:27', 1),
(45, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-13 01:53:22', 1),
(46, '::1', 'RafliFerdian25', NULL, '2022-02-13 02:24:51', 0),
(47, '::1', 'RafliFerdian25', NULL, '2022-02-13 02:25:01', 0),
(48, '::1', 'RafliFerdian25', NULL, '2022-02-13 02:25:18', 0),
(49, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-13 02:25:51', 1),
(50, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-13 02:26:18', 1),
(51, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-13 02:37:38', 1),
(52, '::1', 'tokosundip@gmail.com', NULL, '2022-02-13 03:25:16', 0),
(53, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-13 03:30:42', 1),
(54, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-14 06:27:07', 1),
(55, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-14 08:21:47', 1),
(56, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-15 22:43:46', 1),
(57, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-15 23:38:40', 1),
(58, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-17 01:19:24', 1),
(59, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-17 01:29:28', 1),
(60, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-17 01:45:04', 1),
(61, '::1', 'RafliFerdian25', NULL, '2022-02-17 02:41:18', 0),
(62, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-17 02:41:26', 1),
(63, '::1', 'ferdianrafli32@gmail.com', 5, '2022-02-17 02:43:10', 1),
(64, '::1', 'ferdianrafli125@gmail.com', 4, '2022-02-17 21:04:37', 1),
(65, '::1', 'ferdianrafli32@gmail.com', 5, '2022-03-06 06:12:07', 1),
(66, '::1', 'ferdianrafli32@gmail.com', NULL, '2022-03-06 06:12:17', 0),
(67, '::1', 'admin1', NULL, '2022-03-06 06:12:25', 0),
(68, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-06 06:12:31', 1),
(69, '::1', 'admin1', NULL, '2022-03-11 18:51:33', 0),
(70, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-11 18:51:47', 1),
(71, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-13 19:16:47', 1),
(72, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-15 10:39:04', 1),
(73, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-15 22:55:23', 1),
(74, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 06:36:09', 1),
(75, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 07:07:21', 1),
(76, '::1', 'ferdianrafli125@gmail.com', NULL, '2022-03-16 08:03:57', 0),
(77, '::1', 'ferdianrafli25@gmail.com', 4, '2022-03-16 08:04:04', 1),
(78, '::1', 'ferdianrafli32@gmail.com', 14, '2022-03-16 08:23:00', 1),
(79, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 12:06:57', 1),
(80, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 12:07:26', 1),
(81, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 12:09:18', 1),
(82, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 12:12:09', 1),
(83, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 12:12:27', 1),
(84, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 17:55:30', 1),
(85, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 18:01:07', 1),
(86, '::1', 'rafliferdian1203@gmail.com', 16, '2022-03-16 18:34:41', 1),
(87, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 19:09:58', 1),
(88, '::1', 'tokosundip@gmail.com', 17, '2022-03-16 19:26:58', 1),
(89, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 19:27:16', 1),
(90, '::1', 'tokosundip@gmail.com', 17, '2022-03-16 19:41:28', 1),
(91, '::1', 'tokos', NULL, '2022-03-16 20:19:16', 0),
(92, '::1', 'ferdianrafli32@gmail.com', 15, '2022-03-16 20:19:21', 1),
(93, '::1', 'rafliferdian1203@gmail.com', 16, '2022-03-16 20:24:51', 1),
(94, '::1', 'ferdianrafli125@gmail.com', 4, '2022-03-16 22:23:15', 1),
(95, '::1', 'rafliferdian1203@gmail.com', 16, '2022-03-16 22:30:29', 1),
(96, '::1', 'tokosundip@gmail.com', 18, '2022-03-16 22:59:09', 1),
(97, '::1', 'rafliferdian1203@gmail.com', 16, '2022-03-16 23:11:44', 1),
(98, '::1', 'ferdianrafli125@gmail.com', 4, '2022-04-11 22:21:47', 1),
(99, '::1', 'ferdianrafli125@gmail.com', 4, '2022-04-12 08:35:33', 1),
(100, '::1', 'ferdianrafli125@gmail.com', 4, '2022-04-13 08:51:24', 1),
(101, '::1', 'ferdianrafli125@gmail.com', 4, '2022-04-29 21:30:48', 1),
(102, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-05 21:41:53', 1),
(103, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-06 01:39:26', 1),
(104, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-06 06:36:18', 1),
(105, '::1', 'rafli25', 19, '2022-05-06 06:54:08', 0),
(106, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-06 06:54:46', 1),
(107, '::1', 'Pesertadidik', NULL, '2022-05-12 03:08:29', 0),
(108, '::1', 'rafli', NULL, '2022-05-12 03:08:45', 0),
(109, '::1', 'Pesertadidik', NULL, '2022-05-12 03:08:53', 0),
(110, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-12 03:08:57', 1),
(111, '::1', 'ferdianrafli32@gmail.com', 15, '2022-05-12 03:09:17', 1),
(112, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-12 03:10:31', 1),
(113, '::1', 'ferdianrafli32@gmail.com', 15, '2022-05-18 01:38:03', 1),
(114, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-18 01:38:38', 1),
(115, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-18 01:38:49', 1),
(116, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-19 06:00:42', 1),
(117, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-22 23:23:55', 1),
(118, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-22 23:24:15', 1),
(119, '::1', 'ferdianrafli32@gmail.com', 15, '2022-05-23 00:27:30', 1),
(120, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 01:32:10', 1),
(121, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 01:52:43', 1),
(122, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 02:24:47', 1),
(123, '::1', 'guruIIPA1', NULL, '2022-05-23 02:36:38', 0),
(124, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-23 02:36:55', 1),
(125, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 02:38:26', 1),
(126, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-23 02:39:28', 1),
(127, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 02:40:29', 1),
(128, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-23 02:52:59', 1),
(129, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 03:11:26', 1),
(130, '::1', 'mgmpIPA', 21, '2022-05-23 05:20:30', 0),
(131, '::1', 'mgmpIPA', 21, '2022-05-23 05:30:34', 0),
(132, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 05:33:35', 1),
(133, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 05:39:02', 1),
(134, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 06:26:26', 1),
(135, '::1', 'mgmpIPS', 22, '2022-05-23 07:27:22', 0),
(136, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 07:27:47', 1),
(137, '::1', 'soalbank7@gmail.com', 22, '2022-05-23 07:29:13', 1),
(138, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 07:29:32', 1),
(139, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 07:29:32', 1),
(140, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-23 07:33:54', 1),
(141, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 07:34:33', 1),
(142, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 08:11:37', 1),
(143, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 08:13:16', 1),
(144, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 08:36:31', 1),
(145, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 18:09:52', 1),
(146, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-23 18:25:17', 1),
(147, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-23 21:50:33', 1),
(148, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-24 06:44:43', 1),
(149, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-24 06:44:58', 1),
(150, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-24 18:34:16', 1),
(151, '::1', 'admin1', NULL, '2022-05-24 18:35:10', 0),
(152, '::1', 'admin1', NULL, '2022-05-24 18:35:40', 0),
(153, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-24 18:35:50', 1),
(154, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-28 05:33:11', 1),
(155, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-28 07:32:22', 1),
(156, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-28 07:50:35', 1),
(157, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-28 09:52:06', 1),
(158, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-29 07:45:17', 1),
(159, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-29 08:35:57', 1),
(160, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-29 08:43:28', 1),
(161, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-29 08:52:03', 1),
(162, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-29 08:58:08', 1),
(163, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-29 09:00:56', 1),
(164, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-29 09:27:38', 1),
(165, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-30 02:44:57', 1),
(166, '::1', 'ferdianrafli25@gmail.com', 21, '2022-05-30 02:45:26', 1),
(167, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-30 02:46:11', 1),
(168, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-30 02:51:55', 1),
(169, '::1', 'rafliferdian1203@gmail.com', 16, '2022-05-30 03:28:37', 1),
(170, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-30 03:38:08', 1),
(171, '::1', 'ferdianrafli125@gmail.com', 4, '2022-05-30 03:38:19', 1),
(172, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-01 19:54:44', 1),
(173, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-02 09:05:51', 1),
(174, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-03 04:40:15', 1),
(175, '::1', 'rafliferdian1203@gmail.com', 16, '2022-06-03 04:55:02', 1),
(176, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-03 04:55:16', 1),
(177, '::1', 'ferdianrafli25@gmail.com', 23, '2022-06-03 04:59:00', 1),
(178, '::1', 'tokosundip@gmail.com', 21, '2022-06-03 04:59:39', 1),
(179, '::1', 'rafliferdian1203@gmail.com', 16, '2022-06-03 05:03:58', 1),
(180, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-03 08:05:22', 1),
(181, '::1', 'tokosundip@gmail.com', 21, '2022-06-03 08:53:13', 1),
(182, '::1', 'rafliferdian1203@gmail.com', 16, '2022-06-03 08:59:43', 1),
(183, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-03 09:01:09', 1),
(184, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-04 02:57:02', 1),
(185, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-04 09:21:51', 1),
(186, '::1', 'rafliferdian1203@gmail.com', 16, '2022-06-04 11:03:55', 1),
(187, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-04 11:20:25', 1),
(188, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-05 01:09:33', 1),
(189, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-05 06:39:12', 1),
(190, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-05 19:14:28', 1),
(191, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-05 19:19:10', 1),
(192, '::1', 'ferdianrafli125@gmail.com', 4, '2022-06-05 23:11:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'mengelola pengguna', 'mengelola seluruh pengguna'),
(2, 'mengelola profil', 'mengelola profil milik sendiri'),
(3, 'mengelola semua soal', 'mengelola data semua soal'),
(4, 'mengelola soal guru', 'mengelola data soal dari guru tertentu'),
(5, 'mengelola data sekolah', 'mengelola semua data sekolah'),
(6, 'mengelola data mata pelajaran', 'mengelola semua data mata pelajaran yang ada'),
(7, 'mengelola data guru', 'mengelola semua data guru'),
(8, 'melakukan validasi soal', 'melakukan validasi soal sudah apakah soal sudah benar');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '464b64e7488db9df772b8015a8647fd7', '2022-02-12 05:13:53'),
(2, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '464b64e7488db9df772b8015a8647fd7', '2022-02-12 05:14:16'),
(3, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '464b64e7488db9df772b8015a8647fd7', '2022-02-12 05:14:45'),
(4, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '0ed1d6257b96179d4cc6cd99c9f2b724', '2022-02-12 05:19:57'),
(5, 'ferdianrafli125@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '0ed1d6257b96179d4cc6cd99c9f2b724', '2022-02-12 05:20:26'),
(6, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '86f695d363cdd41a2a8eb99f356cff3a', '2022-02-12 05:21:37'),
(7, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', '69b92aba5d4df718acea542351237017', '2022-02-12 05:37:16'),
(8, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'cc91358b78d1b9ad27dfc65a5ab60142', '2022-02-12 06:40:05'),
(9, 'ferdianrafli32@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '40262691b50ec6a3dc5c87f60c5c2d74', '2022-02-17 01:32:48'),
(10, 'ferdianrafli125@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '1d12ddab430cdd5dcd0714a99657c418', '2022-03-16 07:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nuptk` varchar(16) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `npsn` varchar(8) DEFAULT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nuptk`, `nip`, `npsn`, `nama_guru`, `id_mapel`) VALUES
('1111222233334455', '112233445566778899', '11112222', 'Guru IPA 1', 24),
('1122334455667788', '112233445566777788', '11112222', 'Guru IPS 1', 25),
('‌004674264430001', '‌19640714200604200', '20322771', 'Siti Fatkhurohmah', 25),
('‌005474965130007', '‌19710722200701200', '20322780', 'Erniyati', 25),
('‌015676967013013', 'null', '20322787', 'Saparwati', 24),
('‌024675565621006', '‌19770914200701201', '20322760', 'Yayu Kartika Candra Dewi', 25),
('‌025175966021008', 'null', NULL, 'Esti Widyarini', 24),
('‌033674965030002', '‌19711004199802200', '20322720', 'Pudji Rahayu', 24),
('‌035177467523008', 'null', '20322767', 'Oktaviani Putri Sukmagati', 24),
('‌043377467513015', 'null', '20322758', 'Ari Efendi', 25),
('‌044474765030001', '‌19691112200604201', '20322791', 'Triyanti', 24),
('‌045174865030004', '‌19701119199702200', '20322749', 'Sholihatun Nisa', 24),
('‌046375265330004', '‌19740131200701201', '20322721', 'Listyana Tri Kusumawati', 25),
('‌063775665721010', '‌19780305200501200', '20322774', 'Kartikasari', 25),
('‌064675065230006', '‌19720314200701200', '20322755', 'Susilowati', 24),
('‌074476967013015', 'null', '20322758', 'Alfina', 24),
('‌075975966030001', 'null', NULL, 'Daningsih Yuliani', 24),
('‌076075865930001', 'null', '20322721', 'Nikmah Dwi Hastuti', 25),
('‌083375265330001', '‌19740501199702200', '20322779', 'Khusnul Chotimah', 25),
('‌083975365530005', 'null', '20322749', 'Tuniawati', 25),
('‌084275365430001', '‌19750510200801201', '20322773', 'Wakhyu Kristianawati', 25),
('‌084275865930001', 'null', '20322770', 'Dian Prasetyo E', 24),
('‌093874264330001', '‌19640606198903201', '20322764', 'Ida Tasilawati', 25),
('‌104276366412000', 'null', NULL, 'Widhi Mangestiono', 25),
('‌105475465430000', '‌19760722199802200', '20322764', 'Nurkhasanah', 25),
('‌105777167213009', 'null', '20322770', 'Dedy Bara Firmansyah', 24),
('‌106274464820000', '‌19660730199512100', '20322791', 'Suratin', 24),
('‌113674564620001', '‌19670408199512100', '20322790', 'Warsono', 25),
('‌115074865120005', '‌19700818200701101', '20322763', 'Rosyidin', 25),
('‌125476866913012', 'null', '20322788', 'Niken Wiji Harena', 24),
('‌126077067113010', 'null', '20322761', 'Nur Ifta Putri', 24),
('‌133476466513017', 'null', NULL, 'Estarina', 24),
('‌134376366511005', 'null', '20322784', 'Dianto', 24),
('‌135677167213007', 'null', '20322773', 'Oktavianto Hardian Bayu Saputra', 24),
('‌135775765730000', '‌19791025200801201', '20322772', 'Endah Suryaningrum', 24),
('‌143474066130000', '‌19620211198303200', '20322760', 'Sri Hastuti Handayani', 24),
('‌143775966330000', '‌19811105201406200', '20322792', 'Emi Erikawati', 24),
('‌145575265430001', '‌19741123200801200', '20322764', 'Tri Prasetyo Winarni', 25),
('‌146275565620002', '‌19770130200501101', '20322755', 'Yahya Ubaid', 25),
('‌153874364430005', '‌19650602198803200', '20322763', 'Titik Suparni', 24),
('‌154176066221010', 'null', NULL, 'Ely Noviani', 24),
('‌154776066220000', '‌19821215200604100', '20322760', 'Aziz Chakim', 24),
('‌156074764930008', '‌19690228199103200', '20322785', 'Suwarti', 24),
('‌156076566522000', 'null', NULL, 'Ika Wahyu Anggraeni', 24),
('‌163374564720001', '‌19670301199512100', '20322781', 'Drs. SUGIHARTONO', 24),
('‌166074764930001', '‌19690328199412200', '20322762', 'Singgih Handajani', 24),
('‌173675865930012', '‌19800404200801201', '20322707', 'Dian Rochdi Haryanti', 25),
('‌184474664720003', '‌19681205200312100', '20322786', 'Tri Sambodo', 25),
('‌186177167213008', 'null', NULL, 'Leny Anggraeni', 24),
('‌193674664520000', '‌19680604199302100', '20322752', 'Giyatno', 24),
('‌204774064220008', '‌19620715199702100', '20322785', 'Susun', 25),
('‌205574064120000', '‌19620723200604100', '20322707', 'Suwarno', 25),
('‌206075465530000', 'null', NULL, 'Siti Zumrotun', 25),
('‌206077067113008', 'null', NULL, 'Isatun Nasikhah', 24),
('‌206176066113013', 'null', '20322788', 'Sri Sukarti', 25),
('‌206176866913011', 'null', '20322779', 'Narulita Widia Primasita', 25),
('‌214575165220000', '‌19730813200801100', '20322753', 'Agus Susila', 25),
('‌215075665730007', '‌19780818200801201', '20322749', 'Listiyaningsih', 25),
('‌215576066130006', '‌19820823202121200', '20322768', 'Lestari Dewi Puspita Rini', 24),
('‌216074364320000', '‌19650828199512100', '20322790', 'Muhammad Shodik', 24),
('‌225575265320000', '‌19740923200801100', '20322774', 'Lukmono Dwi Ananto', 25),
('‌226275765830003', '‌19790930200801200', '20322786', 'Kusniasih', 24),
('‌233974264420000', '‌19641007199512100', '20322761', 'Kadim', 24),
('‌235676266321008', 'null', '20322774', 'Rohmi Isna Fu\'adati', 24),
('‌244374765030001', '‌19691111199802200', '20322783', 'Endah Woro Sri Sumekar', 25),
('‌244375565720001', '‌19771111200801100', '20322773', 'Budi Nuryanto', 24),
('‌244774464430000', '‌19660115200312200', '20322778', 'RATIPAH', 25),
('‌244975365520000', '‌19751117200801100', '20322774', 'Muh. Dawam', 25),
('‌245075365520000', '‌19750118200801100', '20322771', 'Eko Adi Wibowo', 24),
('‌245174564620000', '‌19670119199003100', '20322720', 'Umar Hamzah', 25),
('‌245575665830000', '‌19780123200801200', '20322719', 'Sri Puji Lestari', 25),
('‌245975165330001', '‌19731127199903200', '20322792', 'Siti Waliyah', 25),
('‌254475765830001', '‌19790212200801201', '20322775', 'Nur Salamah', 24),
('‌255674864920001', '‌19700224199412100', '20322763', 'Agus Pujono', 25),
('‌255875365520000', '‌19751226200801100', '20322754', 'Aris Suryani Putra', 24),
('‌263775766030000', '‌19790315201406200', '20322753', 'Dini Mardiani', 24),
('‌264274864920000', '‌19700310199502100', '20322752', 'Teguh Jatmiko', 25),
('‌264974664730000', '‌19680317199103200', '20322707', 'Sri Utami', 25),
('‌275374864920000', 'null', NULL, 'Hanifudin', 25),
('‌294974664830007', '‌19680617200312200', '20322755', 'Tur Susila Yekti', 25),
('‌304477067113011', 'null', '20322773', 'Fatkhatul Aliyah', 25),
('‌304774865120001', '‌19700715199802100', '20322776', 'Muhtadi', 25),
('‌305374864930002', '‌19700721199512200', '20322721', 'Boedihartini', 24),
('‌325177067113012', 'null', '20322769', 'Dwi Cahyani', 25),
('‌334274965230000', '‌19711010199802200', '20322764', 'Sri Umikarti', 24),
('‌334976866913014', 'null', '69912873', 'Dwi Pujiyanti', 25),
('‌344076866913013', 'null', '20322780', 'Adi Ibnu Fariz', 24),
('‌344077267313006', 'null', '20322757', 'Anggit Winestyawan', 24),
('‌344774764820001', '‌19691115200801100', '20322769', 'Sugiyanto', 25),
('‌345074865120000', '‌19701118200701100', '20322761', 'Sukiyatno', 24),
('‌345874664730000', '‌19680126199512200', '20322774', 'Woro Suhesti', 24),
('‌353674965030002', '‌19710412199412200', '20322786', 'Nurul Komariah', 24),
('‌354275265320000', '‌19740210200801100', '20322775', 'Dwi Sarjaka', 25),
('‌354976066220000', '‌19820217201001100', '20322791', 'Asfurin', 24),
('‌364275765830001', '‌19790310200801201', '20322792', 'Khifdhiatul Arofah', 24),
('‌364574664730000', '‌19680313200604200', '20322783', 'Sri Wahyuni', 25),
('‌364874664720000', '‌19680316199003100', '20322756', 'Sudarjito', 24),
('‌365476466521009', 'null', NULL, 'Nadhifah Myrna', 25),
('‌376074464430000', '‌19660428199003200', '20322782', 'Titik Widayati', 24),
('‌383775165330001', '‌19730505199802200', '20322775', 'Emi Anwarul Prastiwi', 25),
('‌384275165230006', '‌19731005200501200', '20322757', 'Dirahayu', 25),
('‌384475365530001', '‌19750512200801200', '20322773', 'Nurulisnaini', 24),
('‌404274664820000', '‌19680710199802100', '20322768', 'Nur Riwayadi', 25),
('‌404475365530001', '‌19750712200501200', '20322761', 'Puji Utami', 25),
('‌405275465530004', '‌19760720200801200', '20322721', 'Dinok Sudiami', 25),
('‌406276866913013', 'null', '20322792', 'Kurnia Yuliati', 25),
('‌416274965220000', '‌19710830199903100', '20322722', 'Bashori Rachmat', 24),
('‌425077567623003', 'null', '20322783', 'Ulul Ilma Nafiah', 24),
('‌425875265330002', '‌19740926200801200', '20322749', 'Khamimah', 25),
('‌426074364620003', '‌19650928200801100', '20322785', 'A. Thoriq', 25),
('‌433674364720000', '‌19651004199003100', '20322707', 'Sugimin', 25),
('‌443374464630003', '‌19660101199702200', '20322750', 'Kristiningsih', 25),
('‌445275765730000', '‌19790120200801200', '20322788', 'Aliya Nurkhasanah', 24),
('‌446077167213008', 'null', '20322781', 'WAHYU PUJIANI', 25),
('‌453875765820000', '‌19790206200312100', '20322783', 'Ady Susilo Ariwibowo', 24),
('‌453974664730003', '‌19680702199512200', '20322786', 'Sri Hartati', 24),
('‌454274364630001', '‌19651210200501200', '20322721', 'Durikah', 24),
('‌454776466521011', '‌19860215201001202', '20322770', 'Umi Haniin', 24),
('‌454876166230000', 'null', '20322792', 'Erva Triyana', 25),
('‌464875365530000', '‌19750316200801200', '20322760', 'Erna Dewi Palupi', 25),
('‌465075665830000', '‌19780318200501200', '20322762', 'Bintari Retna Kumala', 24),
('‌465776366430011', '‌19850325200903200', '20322764', 'Ratih Widyarni', 24),
('‌485576466512000', 'null', NULL, 'Moh. Agus Abdul Karim', 25),
('‌485774364530000', '‌19650525198803202', '20322707', 'Rochi Chayatun', 24),
('‌485874864930000', '‌19700526200701200', '20322779', 'Untung Ristati', 24),
('‌493676366413020', 'null', NULL, 'Nurul Rahma Wati', 25),
('‌493975065230001', '‌19720607200701201', '20322762', 'Ida Yuni Saptati', 25),
('‌494274464730001', '‌19660610199412200', '20322771', 'Sri Sukowati', 25),
('‌495276066220000', 'null', '20322754', 'Haji Makhfud', 25),
('‌503475265330000', '‌19740702200012200', '20322756', 'Eni Wiyati', 24),
('‌504174464620000', '‌19660709200701100', '20322774', 'Jaka Sutapa', 25),
('‌504775065130000', '‌19720715200501200', '20322782', 'Yuli Kus Suwandari', 25),
('‌505974064220000', '‌19620727199602100', '20322752', 'Supriyono', 25),
('‌514075565730007', '‌19770808200801201', '20322765', 'Early Permatasari', 25),
('‌514875165230004', '‌19730816200701200', '20322780', 'Titiari Hikmawati', 24),
('‌524974965120000', '‌19710917199401100', '20322773', 'Triyanto', 24),
('‌524975665730004', '‌19780917200501200', '20322763', 'Ghoniyah', 24),
('‌525476666713014', 'null', '20322720', 'Widya Septiani', 24),
('‌534175865930000', '‌19801009200801200', '20322779', 'Eri Handayani', 24),
('‌534375665730004', 'null', NULL, 'Eni Sadarina', 24),
('‌534674164230003', '‌19631014199802200', '20322778', 'Wahyu Rochyatiningsih', 25),
('‌535975565720000', '‌19771027200604100', '20322788', 'Nuryono', 24),
('‌544575065230000', '‌19721113199903200', '20322766', 'Purwaningsih', 24),
('‌553676066213015', 'null', '20322769', 'Widiyarsih', 24),
('‌553775965930001', '‌19810205200801201', '20322778', 'Anita Dwi Pujiastuti', 24),
('‌554274364420000', '‌19651210200501100', '20322751', 'Widodo', 25),
('‌554374464620003', '‌19661112199003100', '20322760', 'Nasron', 24),
('‌555474764920000', '‌19690222199103100', '20322764', 'Akhmad Mutohar', 24),
('‌555774764820000', '‌19690225200501100', '20322752', 'Moh. Hanafiah Pradani', 24),
('‌563776366413023', 'null', '20364894', 'Pujiono', 25),
('‌564474865030001', '‌19700312200701202', '20322771', 'Triwati Setiyamurni', 24),
('‌565475465530004', '‌19760322200701201', '20322784', 'Setiasih', 24),
('‌573675165220000', '‌19730404200801100', '20322720', 'Muhammad Khaeri', 24),
('‌574776466413149', 'null', '20322792', 'Didik Teguh Santosa', 24),
('‌574875365520000', '‌19750416200701101', '20322720', 'Ardi Wirawan', 24),
('‌575275065230001', '‌19730420200604200', '20322756', 'Rakhmi Wijayanti', 25),
('‌584176266321014', 'null', '20322788', 'Trisnawati Rahayu', 24),
('‌603375865930009', '‌19800107201406200', '20322720', 'Musta\'adah', 25),
('‌604775365420003', '‌19750715200701101', '20322770', 'Mohamad Yakop', 25),
('‌605075565630000', '‌19770718200312200', '20322753', 'Tri Riswakhyuningsih', 24),
('‌613576666721005', 'null', NULL, 'Urip Setiari', 25),
('‌613976166230000', 'null', NULL, 'Artistina Darmayanti', 25),
('‌614874965130001', '‌19710816199903200', '20322750', 'Sugiarti', 24),
('‌615174464820000', '‌19660819199003100', '20322776', 'Paimin', 24),
('‌624175765830000', 'null', '20322781', 'Retno Idha Riyana', 25),
('‌624874164320000', '‌19630916200012100', '20322765', 'Tri Arso Waluyo', 25),
('‌625674464630000', '‌19660924199103200', '20322782', 'Wijayanti', 24),
('‌625775665730000', '‌19780925200801201', '20322753', 'Sri Sulistiyani', 25),
('‌634176766823004', 'null', NULL, 'Dewi Susanti', 25),
('‌634874564820000', '‌19671016199103100', '20322719', 'Sabar', 24),
('‌635374364620000', '‌19651021200701100', '20322750', 'Solikhin', 25),
('‌643474564820000', '‌19671102200701101', '20322787', 'Darsono', 25),
('‌643675565720002', '‌19770401200801100', '20322768', 'Rusmono', 25),
('‌643675665730000', '‌19781104200801200', '20322770', 'Nufindah Pribadi', 25),
('‌643975465530000', '‌19760107200012200', '20322757', 'Eko Dian Pratiwi', 24),
('‌644576166230007', 'null', '20364894', 'Arfiani Nurhartati', 24),
('‌645275866020003', '‌19801120200801100', '20322764', 'Heru Novianto', 24),
('‌645575966211000', 'null', NULL, 'Tunut Sinang', 25),
('‌653375065230001', '‌19720201199903200', '20322772', 'Tasmuti', 25),
('‌653774364420005', '‌19650205200701101', '20322784', 'Sutikno', 25),
('‌654174764920000', '‌19691209199412100', '20322790', 'Mukhamad Mulazim', 25),
('‌654474965130006', '‌19711212200801201', '20322767', 'Ely Endriyani', 25),
('‌655777467523007', 'null', NULL, 'Aryani Sari Natalia', 25),
('‌656076266330004', '‌19841228201001200', '20322751', 'Rina Setiani', 24),
('‌663375065220000', '‌19720301199802100', '20322719', 'Heri Wibowo', 25),
('‌663577167213010', 'null', '20322773', 'Sri Handayani', 25),
('‌673674965030003', '‌19710404199802200', '20322784', 'Parlanti Handayani', 25),
('‌674876466513023', 'null', '20322779', 'Popo Santo Hudoyo', 24),
('‌675475765830000', 'null', '20322775', 'Rima Hidayati', 24),
('‌685475665730005', '‌19780522200801200', '20322758', 'Hastuti Ari Setyani', 24),
('‌685675665720003', '‌19780524200312100', '20322749', 'Bambang Tribowo', 24),
('‌695374664830000', '‌19680621199802200', '20322751', 'Sujadi Kusrini', 24),
('‌704477367413002', 'null', '20322753', 'Restianingsih', 24),
('‌704575465630000', '‌19760713200701201', '20322791', 'Happy Sugiharti Sujadi', 25),
('‌723375765930007', '‌19790109202121200', '20322768', 'Dian Anggraeni', 24),
('‌724474865020000', '‌19700912199702100', '20322776', 'Joko Asriyanto', 24),
('‌733975265430006', '‌19741007200701201', '20322785', 'Arifiyanti', 24),
('‌734076066130000', 'null', '20322762', 'Andri Ari Susanti', 24),
('‌735776666713014', 'null', NULL, 'Muhammad Haeron Nafi', 25),
('‌736275065230000', '‌19721030200801200', '20322792', 'Retno Sulistyorini', 24),
('‌744874364520000', '‌19650116199403100', '20322760', 'Machmud Sabarjo', 24),
('‌745575065120001', '‌19720123200501100', '20322758', 'Budi Kurnianto', 25),
('‌745576466513016', 'null', '69912873', 'Didik Kurniawan', 24),
('‌745875365430000', '‌19750126200501201', '20322788', 'Iswati', 24),
('‌754274164320007', '‌19631012198601100', '20322765', 'Mokh Imron', 24),
('‌754575665730002', '‌19781213200801200', '20322786', 'Wulan Dwi Aryani', 25),
('‌755674564830000', '‌19670224200604200', '20322759', 'Widayati', 25),
('‌765574864920001', '‌19700323200312100', '20322756', 'Yudi Suryanto', 24),
('‌765575765911005', '‌19790323201001102', '20322781', 'AHMAD BAROYI', 24),
('‌766374564930000', '‌19670331200701200', '20322785', 'Sri Rahayu', 25),
('‌773976566623013', 'null', NULL, 'Musriatun', 24),
('‌775774664930004', '‌19680425199103200', '20322778', 'Sih Amartani', 24),
('‌784474564830001', '‌19670512200312200', '20322722', 'Dasriyah', 25),
('‌786377067113009', 'null', '20322759', 'Kriyo Wiharto', 24),
('‌793776466421002', 'null', NULL, 'Dewi Astuti Purwaningsih', 24),
('‌795075765821008', '‌19790618200903200', '20322772', 'Ika Wahyuningsih', 24),
('‌795974764920002', '‌19690627199802100', '20322785', 'Ahmad Daroji', 25),
('‌803476967023002', 'null', NULL, 'Santika', 24),
('‌803777267313006', 'null', NULL, 'Abdul Wahab Fahrub', 25),
('‌803874364420000', '‌19650706199412100', '20322722', 'Sri Waluyo', 25),
('‌804174164330005', '‌19630907198703200', '20322770', 'Herlina', 25),
('‌804876466521009', 'null', NULL, 'Ratna Puspitasari', 24),
('‌805374765030000', '‌19690721199802200', '20322707', 'Nur Asiyah Jamil', 24),
('‌813875565630003', '‌19770608200801201', '20322722', 'Siti Irnani', 24),
('‌813975465430000', '‌19760708200801200', '20322721', 'Siti Qomsiyah', 24),
('‌815175365430003', '‌19750819200312200', '20322788', 'Endang Kiswati', 25),
('‌815677067113010', 'null', NULL, 'A\'ida Fariroh', 24),
('‌823475865930005', '‌19800209200801201', '20322792', 'Rosalia Susanti', 25),
('‌825176867013017', 'null', '20322719', 'Nur Hayati', 24),
('‌825674864930000', '‌19700924199103200', '20322763', 'Sri Rinaningsih', 24),
('‌833475966030000', '‌19811002201001202', '20322778', 'Dina Sukma Miranti', 25),
('‌843474564720000', '‌19670102199412100', '20322786', 'Joko Purwanto', 25),
('‌843774164220000', '‌19630105198403100', '20322774', 'Sunarso', 24),
('‌843774464630000', '‌19660105200801200', '20322782', 'Wijayanti', 25),
('‌845275165330005', '‌19731120200801200', '20322751', 'Ana Susanti', 25),
('‌853777367413003', 'null', '20322722', 'Febrilia Andika Sasmitasari', 24),
('‌854475265530000', '‌19741212200701201', '20322772', 'Roro Puspita Sari', 25),
('‌854674664730000', '‌19680214199802200', '20322762', 'Aini Atiqah', 24),
('‌854675565730000', '‌19771214200801200', '20322776', 'Titik Margiyati', 25),
('‌854776866913013', 'null', '20322786', 'Puri Arinta', 24),
('‌855474664830000', '‌19680222200801200', '20322769', 'Nur Indah', 24),
('‌855676967013005', 'null', '20322722', 'Kusniawati', 25),
('‌864375465530000', '‌19760311200801200', '20322720', 'Endang Haryanti', 25),
('‌865775865930000', '‌19800325201406200', '20322788', 'Prapti Martiyani', 25),
('‌873776666713014', 'null', '20364895', 'Sumariyah', 25),
('‌875177367423012', 'null', NULL, 'Dian Apriliani', 24),
('‌875675665811005', 'null', NULL, 'Edi Wibowo', 24),
('‌884174664820000', '‌19680509200501100', '20322779', 'Teguh Sudaryanto', 25),
('‌886175665730000', 'null', '20322719', 'Sri Rokhaniwati', 25),
('‌886274364620000', '‌19650530199103100', '20322756', 'Susatriyo Widodo', 25),
('‌886275265330000', '‌19740530199903200', '20322761', 'Sri Wiyanti Handayani', 25),
('‌894775966030001', '‌19810615200801201', '20322756', 'Ulya Mufidah', 25),
('‌903974064130006', '‌19620707198903200', '20322763', 'Niken Hutami Jati', 25),
('‌904074264320004', '‌19640708198601100', '20322787', 'Muhadistin', 25),
('‌904874764930010', '‌19690716200801200', '20322763', 'Tri Mularsih', 24),
('‌904974364430000', '‌19650717198803201', '20322791', 'Sri Setyo Marhaeni', 25),
('‌906074564730000', '‌19670728199903200', '20322762', 'Sri Lestari', 25),
('‌913775465530000', '‌19760805200801201', '20322762', 'Surati Kudung', 25),
('‌915574164320000', '‌19630823198501100', '20322775', 'Sutrisno', 24),
('‌924275465530000', '‌19760910200801201', '20322792', 'Kholidah', 25),
('‌924874965030001', '‌19710916200701200', '20322760', 'Hindah Wasis Hardaningtiastuti', 25),
('‌926176666723008', 'null', NULL, 'Ikga Santi Barokah', 24),
('‌935375265320000', '‌19741021199903100', '20322780', 'Miftahul Munir', 25),
('‌943375565620000', '‌19760928200501100', '20322754', 'Mokh Juanda', 24),
('‌943376066123013', 'null', NULL, 'Resiana', 24),
('‌943676666713016', 'null', '20364896', 'Achmad Damanhuri', 24),
('‌943975565620002', '‌19770701200801100', '20322749', 'Imam Iskandar', 24),
('‌944075565630000', '‌19770108200801200', '20322707', 'Nur Hidayati', 24),
('‌945775165320001', '‌19730125200012100', '20322765', 'Adam Malik', 24),
('‌946177267313004', 'null', '20322776', 'Turah Nofiyani', 24),
('‌953375665830006', '‌19781201200801201', '20322759', 'Khanif Muflikhatun', 24),
('‌954677367423011', 'null', '20322775', 'Kana Rizqiyah', 24),
('‌964576566621009', 'null', '20322707', 'Era Martia Amidia', 24),
('‌966074164230005', '‌19630328198501200', '20322786', 'Eni Muninggar', 25),
('‌973674364720000', '‌19650404200801100', '20322786', 'Asikin', 25),
('‌974574264330005', '‌19640413198601200', '20322760', 'Sony Tri Hastuti', 24),
('‌976175966130003', '‌19810429200801200', '20322770', 'Erma Fatmawati', 24);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(24, 'IPA'),
(25, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_materi` varchar(60) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_mapel`, `nama_materi`, `semester`) VALUES
(17, 24, 'Gerak benda dan makhluk hidup', 1),
(35, 24, 'Sistem Rangka, Sendi ,dan Otot', 1),
(36, 24, 'Sistem Gerak pada Hewan dan Tumbuhan', 1),
(37, 24, 'Bunyi', 2),
(38, 25, 'Megalithikum', 1),
(42, 24, 'Kecepatan', 2),
(45, 25, 'Kemerdekaan', 1),
(46, 25, 'Penjajahan', 2),
(47, 25, 'Kerajaan di Indonesia', 2),
(57, 24, 'Inersia', 2),
(86, 24, 'Struktur dan Fungsi Tumbuhan', 1),
(87, 24, 'Jaringan Tumbuhan, Akar, Batang, dan Daun', 1),
(88, 24, 'Teknologi Terinspirasi dari Struktur Tumbuhan', 1),
(89, 24, 'Sistem Pencernaan Manusia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mgmp`
--

CREATE TABLE `mgmp` (
  `id_mgmp` int(11) NOT NULL,
  `nama_mgmp` varchar(40) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mgmp`
--

INSERT INTO `mgmp` (`id_mgmp`, `nama_mgmp`, `id_mapel`) VALUES
(24, 'MGMP IPA', 24),
(25, 'MGMP IPS', 25);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1644033389, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `npsn` varchar(8) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`npsn`, `nama_sekolah`, `alamat`, `email`, `logo_sekolah`) VALUES
('11112222', 'SMP Negeri 50 Tulis', 'Tulis', 'tulis@gmail.com', 'logo-kemendikbud.png'),
('20322707', 'SMPN 1 Gringsing', 'Jl. Raya Kutosari Ds. Kutosari, Gringsing', NULL, 'logo-batang.png'),
('20322719', 'SMPN 1 Blado', 'Jl. Raya Blado No.1 Ds. Blado, Blado', NULL, 'logo-batang.png'),
('20322720', 'SMPN 1 Bawang', 'Jl. Desa Panempon, Bawang', NULL, 'logo-batang.png'),
('20322721', 'SMPN 1 Batang', 'Jl. Jend Sudirman No. 274 Kel. Kauman, Batang', NULL, 'logo-batang.png'),
('20322722', 'SMPN 1 Bandar', 'Jl. Raya Sidomulyo Ds. Bandar, Bandar', NULL, 'logo-batang.png'),
('20322749', 'SMPN 9 Batang', 'Jl. RE Martadinata GG Kakap Merah Kel. Karangasem Utara, Batang', NULL, 'logo-batang.png'),
('20322750', 'SMPN 3 Warungasem', 'Jl. Desa Sariglagah, Warungasem', NULL, 'logo-batang.png'),
('20322751', 'SMPN 2 Tulis', 'Jl. Desa Kenconorejo, Tulis', NULL, 'logo-batang.png'),
('20322752', 'SMPN 3 Tersono', 'Jl. Desa Sidalang, Tersono', NULL, 'logo-batang.png'),
('20322753', 'SMPN 2 Subah', 'Jl. Raya Kalimangggis Ds Kalimanggis, Subah', NULL, 'logo-batang.png'),
('20322754', 'SMPN 3 Reban', 'Jl. Raya Ngadirejo Ds. Ngadirejo, Reban', NULL, 'logo-batang.png'),
('20322755', 'SMPN 3 Limpung', 'Jl. Amongrogo Km 4 Ds. Amongrogo, Limpung', NULL, 'logo-batang.png'),
('20322756', 'SMPN 3 Gringsing', 'Jl. Raya Krengseng No. 107 Ds. Lebo, Gringsing', NULL, 'logo-batang.png'),
('20322757', 'SMPN 3 Blado', 'Jl. Raya pagilaran Km 7 Ds. Kalisari, Blado', NULL, 'logo-batang.png'),
('20322758', 'SMPN 2 Wonotunggal', 'Jl. Desa Siwatu, Wonotunggal', NULL, 'logo-batang.png'),
('20322759', 'SMPN 4 Bandar', 'Jl. Desa Binangun, Bandar', NULL, 'logo-batang.png'),
('20322760', 'SMPN 4 Batang', 'Jl. Pemuda Pasekaran Ds. Pasekaran, Batang', NULL, 'logo-batang.png'),
('20322761', 'SMPN 8 Batang', 'Jl. Desa Kecepak - Sambong, Batang', NULL, 'logo-batang.png'),
('20322762', 'SMPN 7 Batang', 'Jl. Tentara Pelajar No. 20 Ds. Kalisalak, Batang', NULL, 'logo-batang.png'),
('20322763', 'SMPN 6 Batang', 'Jl. Tampangsono Kel. Kasepuhan, Batang', NULL, 'logo-batang.png'),
('20322764', 'SMPN 5 Batang', 'Jl. RE Martadinata No. 138 Kel. Karangasem Selatan, Batang', NULL, 'logo-batang.png'),
('20322765', 'SMPN 2 Kandeman', 'Jl. Desa Karanggeneng, Kandeman', NULL, 'logo-batang.png'),
('20322766', 'SMPN 3 Subah', 'Jl. Desa Karangtengah, Subah', NULL, 'logo-batang.png'),
('20322767', 'SMPN 1 Banyuputih', 'Jl. Desa Kedawung, Banyuputih', NULL, 'logo-batang.png'),
('20322768', 'SMPN 4 Gringsing', 'Jl. Masjid Kebondalem Ds. Kebondalem, Gringsing', NULL, 'logo-batang.png'),
('20322769', 'SMPN 3 Bawang', 'Jl. Desa Purbo, Bawang', NULL, 'logo-batang.png'),
('20322770', 'SMPN 3 Batang', 'Jl. Ki Mangunsarkoro No. 6 Kel. Proyonanggan Selatan, Batang', NULL, 'logo-batang.png'),
('20322771', 'SMPN 2 Batang', 'Jl. RE Martadinata Sekalong Kel. Karangasem Selatan, Batang', NULL, 'logo-batang.png'),
('20322772', 'SMPN 2 Bandar', 'Jl. Desa Toso - Kluwih, Bandar', NULL, 'logo-batang.png'),
('20322773', 'SMPN 1 Wonotunggal', 'Jl. Raya Wonotunggal Ds. Wonotunggal, Wonotunggal', NULL, 'logo-batang.png'),
('20322774', 'SMPN 1 Warungasem', 'Jl. Raya Cepagan Ds. Cepagan, Warungasem', NULL, 'logo-batang.png'),
('20322775', 'SMPN 1 Tulis', 'Jl. Raya Simbangdesa Ds. Simbangdesa, Tulis', NULL, 'logo-batang.png'),
('20322776', 'SMPN 1 Tersono', 'Jl. Desa Tersono, Tersono', NULL, 'logo-batang.png'),
('20322778', 'SMPN 1 Subah', 'Jl. Jend Sudirman Timur Ds. Jatisari, Subah', NULL, 'logo-batang.png'),
('20322779', 'SMPN 1 Reban', 'Jl. Raya Reban - Blado Ds. Reban, Reban', NULL, 'logo-batang.png'),
('20322780', 'SMPN 2 Bawang', 'Jl. Desa Sangubanyu, Bawang', NULL, 'logo-batang.png'),
('20322781', 'SMPN 2 Blado', 'Jl. Desa Kambangan, Blado', NULL, 'logo-batang.png'),
('20322782', 'SMPN 2 Gringsing', 'Jl. Raya Surodadi Ds. Surodadi, Gringsing', NULL, 'logo-batang.png'),
('20322783', 'SMPN 3 Bandar', 'Jl. Desa Simbar, Bandar', NULL, 'logo-batang.png'),
('20322784', 'SMPN 3 Kandeman', 'Jl. Desa Botolambat, Kandeman', NULL, 'logo-batang.png'),
('20322785', 'SMPN 2 Warungasem', 'Jl. Desa Klibeluk, Warungasem', NULL, 'logo-batang.png'),
('20322786', 'SMPN 1 Kandeman', 'Jl. Raya Kandeman Ds. Kandeman, Kandeman', NULL, 'logo-batang.png'),
('20322787', 'SMPN 2 Tersono', 'Jl. Desa Harjowinangun, Tersono', NULL, 'logo-batang.png'),
('20322788', 'SMPN 1 Pecalungan', 'Jl. Raya Pecalungan Ds. Pecalungan, Pecalungan', NULL, 'logo-batang.png'),
('20322790', 'SMPN 2 Reban', 'Jl. Desa Kumesu, Reban', NULL, 'logo-batang.png'),
('20322791', 'SMPN 2 Limpung', 'Jl. Raya Limpung - Banyuputih Ds. Pungangan, Limpung', NULL, 'logo-batang.png'),
('20322792', 'SMPN 1 Limpung', 'Jl. Cokronegoro No. 20 Ds. Limpung, Limpung', NULL, 'logo-batang.png'),
('20364894', 'SMPN 3 Wonotunggal SATAP', 'Jl. Tugu - Silurah KM 12 Ds. Silurah, Wonotunggal', NULL, 'logo-batang.png'),
('20364895', 'SMPN 4 Blado SATAP', 'Jl. Bandar - Batur KM.20 Ds. Gerlang, Blado', NULL, 'logo-batang.png'),
('20364896', 'SMPN 4 Reban SATAP', 'Jl. Desa Mojotengah, Reban', NULL, 'logo-batang.png'),
('69912873', 'SMPN 4 Bawang', 'Jl. Sigemplong - Dieng Ds. Pranten, Bawang', NULL, 'logo-batang.png');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `soal_img` varchar(255) DEFAULT NULL,
  `alasan_jawaban` text DEFAULT NULL,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `id_materi` int(11) NOT NULL,
  `nuptk` varchar(16) DEFAULT NULL,
  `alasan_jawaban_img` varchar(255) DEFAULT NULL,
  `id_status_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `soal_img`, `alasan_jawaban`, `tgl_input`, `id_materi`, `nuptk`, `alasan_jawaban_img`, `id_status_soal`) VALUES
(97, 'jarak yang ditempuh jika mobil berkecepatan 40 km/jam dengan waktu 1 jam', '10 km', '20 km', '30 km', '40 km', 'D', NULL, 'S = V x T', '2022-06-04', 42, NULL, NULL, 2),
(100, 'Sebuah mobil dengan kecepatan 72 km/jam. Kecepatan mobil tersebut jika dinyatakan dalam SI adalah ….', '2 m/s', '20 m/s', '200 m/s', '1.800 m/s', 'B', NULL, '-', '2022-06-06', 17, NULL, NULL, 2),
(101, 'Jarak dari kota A ke kota B adalah 115 km. Pak Budi berangkat dari kota A pukul 09.00 menuju kota B menggunakan kendaraan dengan kecepatan 50 km/jam. Pak Budi akan sampai ke kota B pada pukul ….', '11.15', '11.18', '11.20', '11.30', 'A', NULL, '-', '2022-06-06', 17, NULL, NULL, 2),
(102, 'Gerak benda yang mengalami perlambatan  …', 'kelajuannya berkurang dengan cara tidak teratur', 'kelajuannya berkurang dengan teratur', 'kelajuannya tidak berpengaruh', 'tidak akan pernah berhenti', 'A', NULL, '-', '2022-06-06', 17, NULL, NULL, 2),
(103, 'Berdasarkan morfologi dan fungsinya, jaringan otot pada manusia dibagi menjadi 3 yaitu ….', 'otot lurik, otot jantung dan otot serat lintang', 'otot jantung, otot lurik dan otot bergaris', 'otot lurik, otot polos dan otot jantung', 'miofibril, otot volunter dan otot involunter ', 'C', NULL, '-', '2022-06-06', 35, NULL, NULL, 2),
(104, 'Daniel sedang mengamati awetan preparat dinding usus halus hewan sapi. Pada pengamatannya didapatkan bahwa awetan tersebut tersusun atas sel yang berbentuk gelendong dengan ujung yang meruncing, dan juga memiliki nukleus yang berada ditengah sel. Berikut ini preparat yang memiliki struktur yang hampir sama dengan struktur dinding usus halus sapi diatas adalah ….', 'Dinding organ jantung', 'Otot bisep pada manusia', 'Sfingter anus', 'Dinding lambung', 'D', NULL, '-', '2022-06-06', 35, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `soal_cetak`
--

CREATE TABLE `soal_cetak` (
  `id_soal_cetak` int(11) NOT NULL,
  `soal` text NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `soal_img` varchar(255) DEFAULT NULL,
  `alasan_jawaban` text DEFAULT NULL,
  `tgl_input` date DEFAULT current_timestamp(),
  `id_materi` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `alasan_jawaban_img` varchar(255) DEFAULT NULL,
  `id_status_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_cetak`
--

INSERT INTO `soal_cetak` (`id_soal_cetak`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `soal_img`, `alasan_jawaban`, `tgl_input`, `id_materi`, `id`, `alasan_jawaban_img`, `id_status_soal`) VALUES
(55, 'Sebuah mobil dengan kecepatan 72 km/jam. Kecepatan mobil tersebut jika dinyatakan dalam SI adalah ….', '2 m/s', '20 m/s', '200 m/s', '1.800 m/s', 'B', NULL, '-', '2022-06-06', 17, 4, NULL, 2),
(56, 'Gerak benda yang mengalami perlambatan  …', 'kelajuannya berkurang dengan cara tidak teratur', 'kelajuannya berkurang dengan teratur', 'kelajuannya tidak berpengaruh', 'tidak akan pernah berhenti', 'A', NULL, '-', '2022-06-06', 17, 4, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_soal`
--

CREATE TABLE `status_soal` (
  `id_status_soal` int(11) NOT NULL,
  `nama_status_soal` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_soal`
--

INSERT INTO `status_soal` (`id_status_soal`, `nama_status_soal`) VALUES
(1, 'belum'),
(2, 'lolos'),
(3, 'tidak lolos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(18) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nuptk` varchar(16) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_mgmp` int(11) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'user-3.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nuptk`, `id_mgmp`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ferdianrafli125@gmail.com', 'admin1', NULL, NULL, 'user-3.png', '$2y$10$SDZZ9zcxf3/uKGN2UfD5ZeUlukHvXpZ6rkfRmBWmkAGPrZgGMysMW', NULL, '2022-03-16 07:06:39', NULL, NULL, NULL, NULL, 1, 0, '2022-02-05 19:06:27', '2022-05-06 06:38:36', NULL),
(21, 'tokosundip@gmail.com', 'mgmpIPA', NULL, 24, 'user-3.png', '$2y$10$qj9Noj6uJ6qw/ApzIUfe9.mAFgVqOHw503ka/f6NyPVMsYtZJp11m', 'ea4ed9700667df3c75152062901fb3a4', NULL, '2022-06-05 20:18:38', NULL, NULL, NULL, 1, 0, '2022-05-06 06:57:17', '2022-06-05 19:18:38', NULL),
(22, 'soalbank7@gmail.com', 'mgmpIPS', NULL, 25, 'user-3.png', '$2y$10$naoZKSI6sBHTnhXgHqgWUeOKCQdUpPAWVhdgaFLZ9VpN9gRvRDP9q', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-05-23 05:34:15', '2022-05-23 05:34:15', NULL),
(24, 'ferdianrafli32@gmail.com', 'guruIPA1', '1111222233334455', NULL, 'user-3.png', '$2y$10$65fBb/zGngaf4zjTAV8r2.T7CwFDmuONigGRCiTeDXz5Q5TOT/5C2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-05 02:42:06', '2022-06-05 02:42:16', NULL),
(25, 'rafliferdian1203@gmail.com', 'guruIPS1', '1122334455667788', NULL, 'user-3.png', '$2y$10$2s2mxMMPTZamWmo2gS1T2.IJICGw6.o7znwwunCfQ9KwCG640cDx.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-05 02:43:11', '2022-06-05 02:43:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nuptk`),
  ADD KEY `sekolah_induk` (`npsn`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_mapel_2` (`id_mapel`),
  ADD KEY `id_mapel_3` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mgmp`
--
ALTER TABLE `mgmp`
  ADD PRIMARY KEY (`id_mgmp`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `nip` (`nuptk`),
  ADD KEY `id_materi_2` (`id_materi`),
  ADD KEY `status_soal` (`id_status_soal`);

--
-- Indexes for table `soal_cetak`
--
ALTER TABLE `soal_cetak`
  ADD PRIMARY KEY (`id_soal_cetak`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `nip` (`id`),
  ADD KEY `id_materi_2` (`id_materi`),
  ADD KEY `jawaban_2` (`jawaban`),
  ADD KEY `jawaban_3` (`jawaban`),
  ADD KEY `status_soal` (`id_status_soal`);

--
-- Indexes for table `status_soal`
--
ALTER TABLE `status_soal`
  ADD PRIMARY KEY (`id_status_soal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `NIP` (`nuptk`),
  ADD KEY `nuptk` (`nuptk`),
  ADD KEY `id_mgmp` (`id_mgmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `soal_cetak`
--
ALTER TABLE `soal_cetak`
  MODIFY `id_soal_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `status_soal`
--
ALTER TABLE `status_soal`
  MODIFY `id_status_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_6` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_ibfk_7` FOREIGN KEY (`npsn`) REFERENCES `sekolah` (`npsn`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mgmp`
--
ALTER TABLE `mgmp`
  ADD CONSTRAINT `mgmp_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_ibfk_3` FOREIGN KEY (`nuptk`) REFERENCES `guru` (`nuptk`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_ibfk_4` FOREIGN KEY (`id_status_soal`) REFERENCES `status_soal` (`id_status_soal`);

--
-- Constraints for table `soal_cetak`
--
ALTER TABLE `soal_cetak`
  ADD CONSTRAINT `soal_cetak_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_cetak_ibfk_3` FOREIGN KEY (`id_status_soal`) REFERENCES `status_soal` (`id_status_soal`),
  ADD CONSTRAINT `soal_cetak_ibfk_4` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nuptk`) REFERENCES `guru` (`nuptk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_mgmp`) REFERENCES `mgmp` (`id_mgmp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
