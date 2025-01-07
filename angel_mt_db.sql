-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 01:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angel_mt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_emails_master`
--

CREATE TABLE `admin_emails_master` (
  `id` int(11) NOT NULL,
  `status_type` int(11) NOT NULL COMMENT '[1 = All, 2= Active, 3 = Inactive, 4 = Paid]',
  `template_id` int(11) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_content` text NOT NULL,
  `bulk_cat` int(11) NOT NULL,
  `selected_mails` longtext DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '[0 = all, 1= emp, 2 = js]',
  `added_by` int(11) NOT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(225) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mob_code` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `reset_token` longtext DEFAULT NULL COMMENT '[ When Apply show token, \r\nWhen Reset Done Show Time Stamp]',
  `profile_img` longtext DEFAULT NULL,
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `fullname`, `email`, `email_verified`, `mob_code`, `mobile`, `password`, `reset_token`, `profile_img`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 'Aftab', 'test', 'No', '+356', '9165855422', '$2y$10$yEVKDtp6lFiaC0oKUNPXx.L2mlxDNNxpwRyyZ/dRFqRnf5Pyu9eia', '', NULL, 'No', '2024-01-16 07:58:47', '2024-01-16 02:28:47'),
(5, 'Roshan', 'roshan1@yopmail.com', 'No', '+91', '9632587412', '$2y$10$GVLiGZ.fj6DlPFTVoUzGqugta1hce9WyOoYbWzPKY2JBUxJH6jdua', '', NULL, 'No', '2024-01-23 12:11:31', '2024-01-23 06:41:31'),
(6, 'Chetan2', 'chetan2@yopmail.com', 'No', '+356', '77755512', '$2y$10$HOHm/2RsPC4gtcdZeg1zqOKIulAxqAD.UroW8hiw4hM7qvmLtTrBq', '', NULL, 'No', '2024-01-23 13:25:47', '2024-01-23 07:55:47'),
(7, 'Chetan1', 'chetan1@yopmail.com', 'No', '+356', '7412589632', '$2y$10$JQ2hDDNU3h9uyMpId9yxjOtZIFMYDV67fkS7QPdEdh7dJPRJ3PdUO', '', NULL, 'No', '2024-01-25 04:57:18', '2024-01-24 23:27:18'),
(8, 'Chetan3', 'chetan3@yopmail.com', 'No', '+33', '7896541', '$2y$10$U2ohVCKEbScggXrNjNgudePlnNb8f6fn0jKyukw7ff.X22IcEBDMy', '', NULL, 'No', '2024-01-25 05:23:45', '2024-01-24 23:53:45'),
(9, 'ca1', 'ca1@yopmail.coma', 'No', '+356', '7548521458', '$2y$10$fvuUEM3tXP93dGmm0aLIpecs9KRXRzzBG4arHPJwTP1JHdMQTp1K2', '', NULL, 'No', '2024-01-25 12:19:34', '2024-01-25 06:49:34'),
(10, 'Chetan', 'jobca@yopmail.com', 'No', '+91', '745125487', '$2y$10$Xt01Ql.HOrtNRqsrrSH58er2GlIJdf5.mMuiq1gBsid7GQ9OTIXV6', '', NULL, 'No', '2024-01-29 08:33:32', '2024-01-29 03:03:32'),
(11, 'Arman', 'test1@gmail.com', 'No', '+64', '986666666', '$2y$10$kJaK6XVeBeHq37gI19pjAu7rnqDmipwxHMCLTKcbUX/bm.L6tSp6a', '', NULL, 'No', '2024-01-31 10:42:09', '2024-01-31 05:12:09'),
(12, 'job5', 'job5@yopmail.com', 'No', '+356', '789546', '$2y$10$yUU1s3S1eYcoFLKiWjk66eUuqOA1QfbW1kK4PIbUZu7SQf7h5ETTW', '', NULL, 'No', '2024-02-05 09:47:12', '2024-02-05 04:17:12'),
(13, 'Chetan5', 'chetan5@yopmail.com', 'Yes', '+91', '7531598524', '$2y$10$wx6P8FWpjd4zAG.6Aah0.u2JkDMFuj.41.rJu9ejzbOc.Jhfjl2Ra', '2024-02-29 13:31:56', '13_1709104392.jpg', 'No', '2024-02-07 13:17:50', '2024-02-28 01:42:38'),
(15, 'Chetan Arote', 'chetan@angel-portal.com', 'No', '+91', '7474747474', '$2y$10$HdtL.ErEfRYGeQC258KbS.hhaHFVSqukmvdjfQ32bfaP5.nQAORbm', '', NULL, 'No', '2024-02-12 11:13:59', '2024-02-12 05:43:59'),
(34, 'fdfd', 'Yes', 'Yes', '+356', '0225222222', '$2y$10$TA.MtCMnHy.DUx7LbH7c/O2e0F4UZaAzGFJ2WLUFTSB2KKlahSjMu', '', NULL, 'No', '2024-02-12 12:41:48', '2024-02-12 07:11:48'),
(37, 'Mail11', 'mail11@yopmail.com', 'Yes', '+91', '741258125896', '$2y$10$yaHblyWGaeWd./bPoE3/Z.Ylijxwvq.rqdN8wB2X5OtJizMa/THGC', '2024-02-28 09:55:53', '37_1709096783.png', 'No', '2024-02-13 05:18:31', '2024-02-12 23:49:39'),
(39, 'tata', 'tata@yopmail.com', 'No', '+356', '77778888', '$2y$10$kp0.k3QHCJHEttHZN1N1D./Z92zYiWxC4lbgfV304J0ozezPULqpG', '', NULL, 'No', '2024-02-13 10:07:15', '2024-02-13 04:37:15'),
(41, 'aftab', 'aftab@angel-portal.com', 'Yes', '+356', '025533666', '$2y$10$NxpJZASrHHR.UilxjagGUuIO.rbm3xkgaF4ae1yf07Sqz8aT5FGZC', 'w1L1h0C15azBhOVkcvRLdbCawWdjFUzjQx2rgpPo5QQNeMSpjuulVjRnuxstG8By', NULL, 'No', '2024-02-13 11:17:27', '2024-02-27 04:53:38'),
(42, 'aftab', 'testjs@yopmail.com', 'Yes', '+212', '6633333333', '$2y$10$UcP7IcdX3TvwWWbWTFrq8Ohv/Mr0S/pvtGzC38/To01a0rKgaA8cW', '', NULL, 'No', '2024-02-21 05:44:46', '2024-02-21 00:16:27'),
(43, 'Aftab', 'testjs2@yopmail.com', 'No', '+20', '965666666', '$2y$10$NN2LXDu0WNvsj/nSgABr3..eXt6/iEgHpsyo1jiPpruf.sSm2.Fmq', '', NULL, 'No', '2024-02-21 05:49:59', '2024-02-21 00:19:59'),
(44, 'tester', 'tester1@yopmail.com', 'Yes', '+91', '123456789112', '$2y$10$0X.XQi.t6cmD7TUOAFgUyeINrZJAYko.aYKyWZc0AVZJdVjodyNgm', '', NULL, 'No', '2024-02-21 09:31:05', '2024-02-29 07:11:18'),
(45, 'Feb1', 'feb23@yopmail.com', 'No', '+91', '7896542586', '$2y$10$bdIKK555Jh5l7.Gbss.Ywu4pVN2kEiR3Nkgcgl5WaE/kUYjQ0C9IC', '', NULL, 'No', '2024-02-22 05:13:36', '2024-02-21 23:43:36'),
(46, 'yopmail', 'testjsnew@yopmail.com', 'Yes', '+20', '256333333', '$2y$10$xAE.zhEuuhHHku6ILZKYuuV6Z9Eom3Aok71r5UuBJOhrmieLHk4oS', '', '46_1709031338.png', 'No', '2024-02-22 11:11:26', '2024-02-22 05:41:48'),
(47, 'mob24', 'mob24@yopmail.com', 'Yes', '+91', '7855699952', '$2y$10$f0Cvr3DdRluSX/rfqfK1VuvgMOFY.UCldPve/3dLysDTQ/6b0Pf1.', '', NULL, 'No', '2024-02-23 08:16:44', '2024-02-23 02:48:15'),
(48, 'trua', 'mob11@yopmail.com', 'No', '+1490', '4556698887886', '$2y$10$cZVx/6tJJnQpYW0zSt80Seo5zObt3iYpCYhw1Ehn0TralZWmw0xLW', '', NULL, 'No', '2024-02-23 09:18:56', '2024-02-23 03:48:56'),
(49, 'Ang10', 'ang10@yopmail.com', 'Yes', '+211', '78965425', '$2y$10$L5dMqOiv8dk4mUsAsNXy8eabR9TGm8kohC6jjVGmTynOl7aD73tcm', '', '49_1709031573.jpg', 'No', '2024-02-27 10:43:15', '2024-02-27 05:14:21'),
(50, 'aftab', 'aftab@angel-portal2.com', 'No', '+212', '6666666666', '$2y$10$kfTm3rqLcjXuF7TPwsj/T.H09jVgJIrDpaL1IUd4RiuXXKHzcfweG', NULL, '50_1709270686.jpg', 'No', '2024-02-29 05:18:35', '2024-02-28 23:48:35'),
(51, 'ca', 'ca30@yopmail.com', 'Yes', '+20', '78965485', '$2y$10$MMOuPKsY2odDK8nTxjneBeY3CrgtV94IsI9p7TUSooFH7CXUB2ivK', NULL, '51_1709210821.jpg', 'No', '2024-02-29 12:34:25', '2024-02-29 07:05:02'),
(52, 'browse jobseeker', 'mail10@yopmail.com', 'Yes', '+20', '45698758', '$2y$10$5CfHKOoXbOFObfL9J/hmWefSZEV5qwi7CN4kXekGGyF/OWf.LG.5q', NULL, '52_1709268852.png', 'No', '2024-03-01 04:48:39', '2024-02-29 23:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `status`, `city_name`, `country_id`, `state_id`, `is_deleted`) VALUES
(1, 'APPROVED', 'Ahmedabad', 1, 1, 'Yes'),
(2, 'APPROVED', 'Vadodara', 1, 1, 'Yes'),
(3, 'APPROVED', 'Surat', 1, 1, 'Yes'),
(4, 'APPROVED', 'Mumbai', 1, 29, 'Yes'),
(5, 'APPROVED', 'Pune', 1, 29, 'Yes'),
(6, 'APPROVED', 'Jalandhar', 1, 2, 'Yes'),
(7, 'APPROVED', 'Punjab Kot', 1, 2, 'Yes'),
(8, 'APPROVED', 'Sydney', 3, 4, 'Yes'),
(9, 'APPROVED', 'Valsad', 1, 1, 'Yes'),
(10, 'APPROVED', 'Wollongong', 3, 4, 'Yes'),
(11, 'APPROVED', 'Brisbane', 3, 6, 'Yes'),
(12, 'APPROVED', 'Adelaide', 3, 7, 'Yes'),
(13, 'APPROVED', 'Hobart', 3, 8, 'Yes'),
(14, 'APPROVED', 'Melbourne', 3, 9, 'Yes'),
(15, 'APPROVED', 'Perth', 3, 10, 'Yes'),
(16, 'APPROVED', 'Airdrie', 5, 12, 'Yes'),
(17, 'APPROVED', 'Camrose', 5, 12, 'Yes'),
(18, 'APPROVED', 'Brampton', 5, 11, 'Yes'),
(19, 'APPROVED', 'Cambridge', 5, 11, 'Yes'),
(20, 'APPROVED', 'Mississauga', 5, 11, 'Yes'),
(21, 'APPROVED', 'Jamnagar', 1, 1, 'Yes'),
(22, 'APPROVED', 'Rajkot', 1, 1, 'Yes'),
(23, 'APPROVED', 'Bhavnagar', 1, 1, 'Yes'),
(24, 'APPROVED', 'Gandhinagar', 1, 1, 'Yes'),
(25, 'APPROVED', 'Mehsana', 1, 1, 'Yes'),
(26, 'APPROVED', 'Kutch', 1, 1, 'Yes'),
(27, 'APPROVED', 'Surendranagar', 1, 1, 'Yes'),
(28, 'APPROVED', 'Delhi', 1, 19, 'Yes'),
(29, 'APPROVED', 'Bengaluru', 1, 25, 'Yes'),
(30, 'APPROVED', 'Hyderabad', 1, 39, 'Yes'),
(31, 'APPROVED', 'Chennai', 1, 38, 'Yes'),
(32, 'APPROVED', 'Kolkata', 1, 43, 'Yes'),
(33, 'APPROVED', 'Jaipur', 1, 36, 'Yes'),
(34, 'APPROVED', 'Lucknow', 1, 41, 'Yes'),
(35, 'APPROVED', 'Kanpur', 1, 41, 'Yes'),
(36, 'APPROVED', 'Nagpur', 1, 29, 'Yes'),
(37, 'APPROVED', 'Visakhapatnam', 1, 13, 'Yes'),
(38, 'APPROVED', 'Indore', 1, 28, 'Yes'),
(39, 'APPROVED', 'Thane', 1, 29, 'Yes'),
(40, 'APPROVED', 'Bhopal', 1, 28, 'Yes'),
(41, 'APPROVED', 'Pimpri-Chinchwad', 1, 29, 'Yes'),
(42, 'APPROVED', 'Patna', 1, 16, 'Yes'),
(43, 'APPROVED', 'Ghaziabad', 1, 41, 'Yes'),
(44, 'APPROVED', 'Ludhiana', 1, 2, 'Yes'),
(45, 'APPROVED', 'Coimbatore', 1, 38, 'Yes'),
(46, 'APPROVED', 'Agra', 1, 41, 'Yes'),
(47, 'APPROVED', 'Madurai', 1, 38, 'Yes'),
(48, 'APPROVED', 'Nashik', 1, 29, 'Yes'),
(49, 'APPROVED', 'Faridabad', 1, 21, 'Yes'),
(50, 'APPROVED', 'Meerut', 1, 41, 'Yes'),
(51, 'APPROVED', 'Kalyan-Dombivali', 1, 29, 'Yes'),
(52, 'APPROVED', 'Vasai-Virar', 1, 29, 'Yes'),
(53, 'APPROVED', 'Varanasi', 1, 41, 'Yes'),
(54, 'APPROVED', 'Srinagar', 1, 23, 'Yes'),
(55, 'APPROVED', 'Aurangabad', 1, 29, 'Yes'),
(56, 'APPROVED', 'Dhanbad', 1, 24, 'Yes'),
(57, 'APPROVED', 'Amritsar', 1, 2, 'Yes'),
(58, 'APPROVED', 'Navi Mumbai', 1, 29, 'Yes'),
(59, 'APPROVED', 'Allahabad', 1, 41, 'Yes'),
(60, 'APPROVED', 'Ranchi', 1, 24, 'Yes'),
(61, 'APPROVED', 'Howrah', 1, 43, 'Yes'),
(62, 'APPROVED', 'Jabalpur', 1, 28, 'Yes'),
(63, 'APPROVED', 'Gwalior', 1, 28, 'Yes'),
(64, 'APPROVED', 'Vijayawada', 1, 13, 'Yes'),
(65, 'APPROVED', 'Jodhpur', 1, 36, 'Yes'),
(66, 'APPROVED', 'Raipur', 1, 18, 'Yes'),
(67, 'APPROVED', 'Kota', 1, 36, 'Yes'),
(68, 'APPROVED', 'Guwahati', 1, 15, 'Yes'),
(69, 'APPROVED', 'Chandigarh', 1, 17, 'Yes'),
(70, 'APPROVED', 'Thiruvananthapuram', 1, 26, 'Yes'),
(71, 'APPROVED', 'Guntur', 1, 13, 'Yes'),
(72, 'APPROVED', 'Bhilai', 1, 18, 'Yes'),
(73, 'APPROVED', 'Gurgaon', 1, 21, 'Yes'),
(74, 'APPROVED', 'Jamshedpur', 1, 24, 'Yes'),
(75, 'APPROVED', 'Hubballi-Dharwad', 1, 25, 'Yes'),
(76, 'APPROVED', 'Mysore', 1, 25, 'Yes'),
(77, 'APPROVED', 'Kochi', 1, 26, 'Yes'),
(78, 'APPROVED', 'Solapur', 1, 29, 'Yes'),
(79, 'APPROVED', 'Mira-Bhayandar', 1, 29, 'Yes'),
(80, 'APPROVED', 'Bhiwandi', 1, 29, 'Yes'),
(81, 'APPROVED', 'Amravati', 1, 29, 'Yes'),
(82, 'APPROVED', 'Bhubaneswar', 1, 34, 'Yes'),
(83, 'APPROVED', 'Cuttack', 1, 34, 'Yes'),
(84, 'APPROVED', 'Bikaner', 1, 36, 'Yes'),
(85, 'APPROVED', 'Tiruchirappalli', 1, 38, 'Yes'),
(86, 'APPROVED', 'Tiruppur', 1, 38, 'Yes'),
(87, 'APPROVED', 'Salem', 1, 38, 'Yes'),
(88, 'APPROVED', 'Warangal', 1, 39, 'Yes'),
(89, 'APPROVED', 'Bareilly', 1, 41, 'Yes'),
(90, 'APPROVED', 'Moradabad', 1, 41, 'Yes'),
(91, 'APPROVED', 'Aligarh', 1, 41, 'Yes'),
(92, 'APPROVED', 'Saharanpur', 1, 41, 'Yes'),
(93, 'APPROVED', 'Gorakhpur', 1, 41, 'Yes'),
(94, 'APPROVED', 'Noida', 1, 41, 'Yes'),
(95, 'APPROVED', 'Firozabad', 1, 41, 'Yes'),
(96, 'APPROVED', 'Nellore', 1, 13, 'Yes'),
(97, 'APPROVED', 'Dehradun', 1, 42, 'Yes'),
(98, 'APPROVED', 'Durgapur', 1, 43, 'Yes'),
(99, 'APPROVED', 'Asansol', 1, 43, 'Yes'),
(100, 'APPROVED', 'Rourkela', 1, 34, 'Yes'),
(101, 'APPROVED', 'Nanded', 1, 29, 'Yes'),
(102, 'APPROVED', 'Kolhapur', 1, 29, 'Yes'),
(103, 'APPROVED', 'Ajmer', 1, 36, 'Yes'),
(104, 'APPROVED', 'Gulbarga', 1, 25, 'Yes'),
(105, 'APPROVED', 'Ujjain', 1, 28, 'Yes'),
(106, 'APPROVED', 'Loni', 1, 41, 'Yes'),
(107, 'APPROVED', 'Siliguri', 1, 43, 'Yes'),
(108, 'APPROVED', 'Jhansi', 1, 41, 'Yes'),
(109, 'APPROVED', 'Ulhasnagar', 1, 29, 'Yes'),
(110, 'APPROVED', 'Jammu', 1, 23, 'Yes'),
(111, 'APPROVED', 'Sangli-Miraj & Kupwad', 1, 29, 'Yes'),
(112, 'APPROVED', 'Mangalore', 1, 25, 'Yes'),
(113, 'APPROVED', 'Erode', 1, 38, 'Yes'),
(114, 'APPROVED', 'Belgaum', 1, 25, 'Yes'),
(115, 'APPROVED', 'Ambattur', 1, 38, 'Yes'),
(116, 'APPROVED', 'Tirunelveli', 1, 38, 'Yes'),
(117, 'APPROVED', 'Malegaon', 1, 29, 'Yes'),
(118, 'APPROVED', 'Gaya', 1, 16, 'Yes'),
(119, 'APPROVED', 'Jalgaon', 1, 29, 'Yes'),
(120, 'APPROVED', 'Udaipur', 1, 36, 'Yes'),
(121, 'APPROVED', 'Maheshtala', 1, 43, 'Yes'),
(122, 'APPROVED', 'Davanagere', 1, 25, 'Yes'),
(123, 'APPROVED', 'Kozhikode', 1, 26, 'Yes'),
(124, 'APPROVED', 'Akola', 1, 29, 'Yes'),
(125, 'APPROVED', 'Kurnool', 1, 13, 'Yes'),
(126, 'APPROVED', 'Rajpur Sonarpur', 1, 43, 'Yes'),
(127, 'APPROVED', 'Rajahmundry', 1, 13, 'Yes'),
(128, 'APPROVED', 'Bokaro', 1, 24, 'Yes'),
(129, 'APPROVED', 'South Dumdum', 1, 43, 'Yes'),
(130, 'APPROVED', 'Bellary', 1, 25, 'Yes'),
(131, 'APPROVED', 'Patiala', 1, 2, 'Yes'),
(132, 'APPROVED', 'Gopalpur', 1, 43, 'Yes'),
(133, 'APPROVED', 'Agartala', 1, 40, 'Yes'),
(134, 'APPROVED', 'Bhagalpur', 1, 16, 'Yes'),
(135, 'APPROVED', 'Muzaffarnagar', 1, 41, 'Yes'),
(136, 'APPROVED', 'Bhatpara', 1, 43, 'Yes'),
(137, 'APPROVED', 'Panihati', 1, 43, 'Yes'),
(138, 'APPROVED', 'Latur', 1, 29, 'Yes'),
(139, 'APPROVED', 'Dhule', 1, 29, 'Yes'),
(140, 'APPROVED', 'Tirupati', 1, 13, 'Yes'),
(141, 'APPROVED', 'Rohtak', 1, 21, 'Yes'),
(142, 'APPROVED', 'Korba', 1, 18, 'Yes'),
(143, 'APPROVED', 'Bhilwara', 1, 36, 'Yes'),
(144, 'APPROVED', 'Berhampur', 1, 34, 'Yes'),
(145, 'APPROVED', 'Bilaspur', 1, 18, 'Yes'),
(146, 'APPROVED', 'Satara', 1, 29, 'Yes'),
(147, 'APPROVED', 'Bijapur', 1, 25, 'Yes'),
(148, 'APPROVED', 'Alwar', 1, 36, 'Yes'),
(149, 'APPROVED', 'Panipat', 1, 21, 'Yes'),
(150, 'APPROVED', 'Darbhanga', 1, 16, 'Yes'),
(151, 'APPROVED', 'Bathinda', 1, 2, 'Yes'),
(152, 'APPROVED', 'Sonipat', 1, 21, 'Yes'),
(153, 'APPROVED', 'Ratlam', 1, 28, 'Yes'),
(154, 'APPROVED', 'Bharatpur', 1, 36, 'Yes'),
(155, 'APPROVED', 'Begusarai', 1, 16, 'Yes'),
(156, 'APPROVED', 'Gandhidham', 1, 1, 'Yes'),
(157, 'APPROVED', 'Puducherry', 1, 35, 'Yes'),
(158, 'APPROVED', 'Pali', 1, 36, 'Yes'),
(159, 'APPROVED', 'Vellore', 1, 38, 'Yes'),
(160, 'APPROVED', 'Shimla', 1, 22, 'Yes'),
(161, 'APPROVED', 'Itanagar', 1, 14, 'Yes'),
(162, 'APPROVED', 'Dispur', 1, 15, 'Yes'),
(163, 'APPROVED', 'Panaji', 1, 20, 'Yes'),
(164, 'APPROVED', 'Shillong', 1, 31, 'Yes'),
(165, 'APPROVED', 'Imphal', 1, 30, 'Yes'),
(166, 'APPROVED', 'Aizawl', 1, 32, 'Yes'),
(167, 'APPROVED', 'Kohima', 1, 33, 'Yes'),
(168, 'APPROVED', 'Gangtok', 1, 37, 'Yes'),
(169, 'APPROVED', 'Dubai', 4, 5, 'Yes'),
(170, 'APPROVED', 'Abu Dhabi', 4, 44, 'Yes'),
(171, 'APPROVED', 'Sharjah', 4, 45, 'Yes'),
(172, 'APPROVED', 'Ajman', 4, 46, 'Yes'),
(173, 'APPROVED', 'Fujairah', 4, 48, 'Yes'),
(174, 'APPROVED', 'Umm al-Quwain', 4, 49, 'Yes'),
(175, 'APPROVED', 'Ras Al Khaimah', 4, 47, 'Yes'),
(176, 'APPROVED', 'Al Ain', 4, 44, 'Yes'),
(177, 'APPROVED', 'Dibba', 4, 48, 'Yes'),
(178, 'APPROVED', 'Khor Fakkan', 4, 45, 'Yes'),
(179, 'APPROVED', 'Jebel Ali', 4, 5, 'Yes'),
(180, 'APPROVED', 'Liwa', 4, 44, 'Yes'),
(181, 'APPROVED', 'Zayed City', 4, 44, 'Yes'),
(182, 'APPROVED', 'Hatta', 4, 5, 'Yes'),
(183, 'APPROVED', 'Al Salam City', 4, 49, 'Yes'),
(184, 'APPROVED', 'Auckland', 8, 50, 'Yes'),
(185, 'APPROVED', 'Christchurch', 8, 50, 'Yes'),
(186, 'APPROVED', 'Wellington', 8, 53, 'Yes'),
(187, 'APPROVED', 'Hamilton', 8, 53, 'Yes'),
(188, 'APPROVED', 'Dunedin', 8, 56, 'Yes'),
(189, 'APPROVED', 'Canterbury', 8, 57, 'Yes'),
(190, 'APPROVED', 'Hawke\'s Bay', 8, 52, 'Yes'),
(191, 'APPROVED', 'Marlborough', 8, 55, 'Yes'),
(192, 'APPROVED', 'Nelson', 8, 54, 'Yes'),
(193, 'APPROVED', 'New Plymouth', 8, 51, 'Yes'),
(194, 'APPROVED', 'Otago', 8, 58, 'Yes'),
(195, 'APPROVED', 'Southland', 8, 59, 'Yes'),
(196, 'APPROVED', 'Quetta', 2, 60, 'Yes'),
(197, 'APPROVED', 'Turbat', 2, 60, 'Yes'),
(198, 'APPROVED', 'Islamabad', 2, 61, 'Yes'),
(199, 'APPROVED', 'Peshawar', 2, 62, 'Yes'),
(200, 'APPROVED', 'Abbottabad', 2, 62, 'Yes'),
(201, 'APPROVED', 'Dera Ismail Khan', 2, 62, 'Yes'),
(202, 'APPROVED', 'Lahore', 2, 63, 'Yes'),
(203, 'APPROVED', 'Faisalabad', 2, 63, 'Yes'),
(204, 'APPROVED', 'Rawalpindi', 2, 63, 'Yes'),
(205, 'APPROVED', 'Multan', 2, 63, 'Yes'),
(206, 'APPROVED', 'Sialkot', 2, 63, 'Yes'),
(207, 'APPROVED', 'Karachi', 2, 64, 'Yes'),
(208, 'APPROVED', 'Hyderabad', 2, 64, 'Yes'),
(209, 'APPROVED', 'Mirpur Khas', 2, 64, 'Yes'),
(210, 'APPROVED', 'Jacobabad', 2, 64, 'Yes'),
(211, 'APPROVED', 'East London', 9, 65, 'Yes'),
(212, 'APPROVED', 'Port Elizabeth', 9, 65, 'Yes'),
(213, 'APPROVED', 'Queenstown', 9, 65, 'Yes'),
(214, 'APPROVED', 'Bethlehem', 9, 66, 'Yes'),
(215, 'APPROVED', 'Virginia', 9, 66, 'Yes'),
(216, 'APPROVED', 'Johannesburg', 9, 67, 'Yes'),
(217, 'APPROVED', 'Randburg', 9, 67, 'Yes'),
(218, 'APPROVED', 'Randfontein', 9, 67, 'Yes'),
(219, 'APPROVED', 'Durban', 9, 68, 'Yes'),
(220, 'APPROVED', 'Pietermaritzburg', 9, 68, 'Yes'),
(221, 'APPROVED', 'Pinetown', 9, 68, 'Yes'),
(222, 'APPROVED', 'Giyani', 9, 69, 'Yes'),
(223, 'APPROVED', 'Phalaborwa', 9, 69, 'Yes'),
(224, 'APPROVED', 'Emalahleni', 9, 70, 'Yes'),
(225, 'APPROVED', 'Secunda', 9, 70, 'Yes'),
(226, 'APPROVED', 'Klerksdorp', 9, 71, 'Yes'),
(227, 'APPROVED', 'Mahikeng', 9, 71, 'Yes'),
(228, 'APPROVED', 'Potchefstroom', 9, 71, 'Yes'),
(229, 'APPROVED', 'Kimberley', 9, 72, 'Yes'),
(230, 'APPROVED', 'Port Nolloth', 9, 72, 'Yes'),
(231, 'APPROVED', 'Bellville', 9, 73, 'Yes'),
(232, 'APPROVED', 'Cape Town', 9, 73, 'Yes'),
(233, 'APPROVED', 'George', 9, 73, 'Yes'),
(234, 'APPROVED', 'Paarl', 9, 73, 'Yes'),
(235, 'APPROVED', 'Worcester', 9, 73, 'Yes'),
(236, 'APPROVED', 'London', 7, 74, 'Yes'),
(237, 'APPROVED', 'Birmingham', 7, 74, 'Yes'),
(238, 'APPROVED', 'Liverpool', 7, 74, 'Yes'),
(239, 'APPROVED', 'Bristol', 7, 74, 'Yes'),
(240, 'APPROVED', 'Manchester', 7, 74, 'Yes'),
(241, 'APPROVED', 'Sheffield', 7, 74, 'Yes'),
(242, 'APPROVED', 'Leeds', 7, 74, 'Yes'),
(243, 'APPROVED', 'Leicester', 7, 74, 'Yes'),
(244, 'APPROVED', 'Armagh', 7, 75, 'Yes'),
(245, 'APPROVED', 'Belfast', 7, 75, 'Yes'),
(246, 'APPROVED', 'Londonderry', 7, 75, 'Yes'),
(247, 'APPROVED', 'Lisburn', 7, 75, 'Yes'),
(248, 'APPROVED', 'Newry', 7, 75, 'Yes'),
(249, 'APPROVED', 'Aberdeen', 7, 76, 'Yes'),
(250, 'APPROVED', 'Dundee', 7, 76, 'Yes'),
(251, 'APPROVED', 'Edinburgh', 7, 76, 'Yes'),
(252, 'APPROVED', 'Glasgow', 7, 76, 'Yes'),
(253, 'APPROVED', 'Inverness', 7, 76, 'Yes'),
(254, 'APPROVED', 'Stirling', 7, 76, 'Yes'),
(255, 'APPROVED', 'Bangor', 7, 77, 'Yes'),
(256, 'APPROVED', 'Cardiff', 7, 77, 'Yes'),
(257, 'APPROVED', 'Newport', 7, 77, 'Yes'),
(258, 'APPROVED', 'St Davids', 7, 77, 'Yes'),
(259, 'APPROVED', 'Swansea', 7, 77, 'Yes'),
(260, 'APPROVED', 'Cambridge', 7, 74, 'Yes'),
(261, 'APPROVED', 'York', 7, 74, 'Yes'),
(262, 'APPROVED', 'Nottingham', 7, 74, 'Yes'),
(263, 'APPROVED', 'Kingston', 7, 74, 'Yes'),
(264, 'APPROVED', 'Birmingham', 6, 78, 'Yes'),
(265, 'APPROVED', 'Montgomery', 6, 78, 'Yes'),
(266, 'APPROVED', 'Mobile', 6, 78, 'Yes'),
(267, 'APPROVED', 'Huntsville', 6, 78, 'Yes'),
(268, 'APPROVED', 'Tuscaloosa', 6, 78, 'Yes'),
(269, 'APPROVED', 'Anchorage', 6, 79, 'Yes'),
(270, 'APPROVED', 'Fairbanks', 6, 79, 'Yes'),
(271, 'APPROVED', 'Juneau', 6, 79, 'Yes'),
(272, 'APPROVED', 'Ketchikan', 6, 79, 'Yes'),
(273, 'APPROVED', 'Phoenix', 6, 80, 'Yes'),
(274, 'APPROVED', 'Tucson', 6, 80, 'Yes'),
(275, 'APPROVED', 'Mesa', 6, 80, 'Yes'),
(276, 'APPROVED', 'Glendale', 6, 80, 'Yes'),
(277, 'APPROVED', 'Little Rock', 6, 81, 'Yes'),
(278, 'APPROVED', 'Fort Smith', 6, 81, 'Yes'),
(279, 'APPROVED', 'Fayetteville', 6, 81, 'Yes'),
(280, 'APPROVED', 'Los Angeles', 6, 82, 'Yes'),
(281, 'APPROVED', 'San Diego', 6, 82, 'Yes'),
(282, 'APPROVED', 'San Jose', 6, 82, 'Yes'),
(283, 'APPROVED', 'San Francisco', 6, 82, 'Yes'),
(284, 'APPROVED', 'Denver', 6, 83, 'Yes'),
(285, 'APPROVED', 'Colorado Springs', 6, 83, 'Yes'),
(286, 'APPROVED', 'Aurora', 6, 83, 'Yes'),
(287, 'APPROVED', 'Fort Collins', 6, 83, 'Yes'),
(288, 'APPROVED', 'Lakewood', 6, 83, 'Yes'),
(289, 'APPROVED', 'Chicago', 6, 84, 'Yes'),
(290, 'APPROVED', 'Aurora', 6, 84, 'Yes'),
(291, 'APPROVED', 'Rockford', 6, 84, 'Yes'),
(292, 'APPROVED', 'Joliet', 6, 84, 'Yes'),
(293, 'APPROVED', 'Naperville', 6, 84, 'Yes'),
(294, 'APPROVED', 'Boston', 6, 85, 'Yes'),
(295, 'APPROVED', 'Worcester', 6, 85, 'Yes'),
(296, 'APPROVED', 'Springfield', 6, 85, 'Yes'),
(297, 'APPROVED', 'Lowell', 6, 85, 'Yes'),
(298, 'APPROVED', 'Cambridge', 6, 85, 'Yes'),
(299, 'APPROVED', 'Detroit', 6, 86, 'Yes'),
(300, 'APPROVED', 'Grand Rapids', 6, 86, 'Yes'),
(301, 'APPROVED', 'Warren', 6, 86, 'Yes'),
(302, 'APPROVED', 'Sterling Heights', 6, 86, 'Yes'),
(303, 'APPROVED', 'Ann Arbor', 6, 86, 'Yes'),
(304, 'APPROVED', 'New York City', 6, 87, 'Yes'),
(305, 'APPROVED', 'Buffalo', 6, 87, 'Yes'),
(306, 'APPROVED', 'Rochester', 6, 87, 'Yes'),
(307, 'APPROVED', 'Yonkers', 6, 87, 'Yes'),
(308, 'APPROVED', 'Syracuse', 6, 87, 'Yes'),
(309, 'APPROVED', 'Cleveland', 6, 88, 'Yes'),
(310, 'APPROVED', 'Cincinnati', 6, 88, 'Yes'),
(311, 'APPROVED', 'Toledo', 6, 88, 'Yes'),
(312, 'APPROVED', 'Philadelphia', 6, 89, 'Yes'),
(313, 'APPROVED', 'Pittsburgh', 6, 89, 'Yes'),
(314, 'APPROVED', 'Allentown', 6, 89, 'Yes'),
(315, 'APPROVED', 'Erie', 6, 89, 'Yes'),
(316, 'APPROVED', 'Memphis', 6, 90, 'Yes'),
(317, 'APPROVED', 'Nashville', 6, 90, 'Yes'),
(318, 'APPROVED', 'Knoxville', 6, 90, 'Yes'),
(319, 'APPROVED', 'Chattanooga', 6, 90, 'Yes'),
(320, 'APPROVED', 'Seattle', 6, 91, 'Yes'),
(321, 'APPROVED', 'Spokane', 6, 91, 'Yes'),
(322, 'APPROVED', 'Tacoma', 6, 91, 'Yes'),
(323, 'APPROVED', 'Vancouver', 6, 91, 'Yes'),
(324, 'APPROVED', 'Test', 1, 36, 'Yes'),
(326, 'APPROVED', 'test city', 31, 94, 'Yes'),
(327, 'APPROVED', 'Lyon', 31, 95, 'Yes'),
(335, 'APPROVED', 'Valletta', 32, 96, 'No'),
(336, 'APPROVED', 'Zabbar', 32, 96, 'No'),
(337, 'APPROVED', 'Senglea', 32, 96, 'No'),
(338, 'APPROVED', 'Sliema', 32, 96, 'No'),
(339, 'APPROVED', 'Qormi', 32, 96, 'No'),
(340, 'APPROVED', 'Vittoriosa', 32, 96, 'No'),
(341, 'APPROVED', 'Birkirkara', 32, 96, 'No'),
(342, 'APPROVED', 'Saint Julian', 32, 96, 'No'),
(343, 'APPROVED', 'Bugibba', 32, 96, 'No'),
(344, 'APPROVED', 'Attard', 32, 96, 'No'),
(345, 'APPROVED', 'Balzan', 32, 96, 'No'),
(346, 'APPROVED', 'Birgu', 32, 96, 'No'),
(348, 'APPROVED', 'Birżebbuġa\n', 32, 96, 'No'),
(349, 'APPROVED', 'Bormla', 32, 96, 'No'),
(350, 'APPROVED', 'Dingli', 32, 96, 'No'),
(351, 'APPROVED', 'Fgura', 32, 96, 'No'),
(352, 'APPROVED', 'Floriana', 32, 96, 'No'),
(353, 'APPROVED', 'Gudja', 32, 96, 'No'),
(354, 'APPROVED', 'Gżira\n', 32, 96, 'No'),
(355, 'APPROVED', 'Għargħur\n', 32, 96, 'No'),
(356, 'APPROVED', 'Ghaxaq', 32, 96, 'No'),
(357, 'APPROVED', 'Hamrun', 32, 96, 'No'),
(358, 'APPROVED', 'Iklin', 32, 96, 'No'),
(359, 'APPROVED', 'Isla', 32, 96, 'No'),
(360, 'APPROVED', 'Kalkara', 32, 96, 'No'),
(361, 'APPROVED', 'Kirkop', 32, 96, 'No'),
(362, 'APPROVED', 'Lija', 32, 96, 'No'),
(363, 'APPROVED', 'Luqa', 32, 96, 'No'),
(364, 'APPROVED', 'Marsa', 32, 96, 'No'),
(365, 'APPROVED', 'Marsaskala', 32, 96, 'No'),
(366, 'APPROVED', 'Marsaxlokk', 32, 96, 'No'),
(367, 'APPROVED', 'Mdina', 32, 96, 'No'),
(368, 'APPROVED', 'Mellieħa\n', 32, 96, 'No'),
(369, 'APPROVED', 'Mġarr\n', 32, 96, 'No'),
(370, 'APPROVED', 'Mosta', 32, 96, 'No'),
(371, 'APPROVED', 'Mqabba', 32, 96, 'No'),
(372, 'APPROVED', 'Msida ', 32, 96, 'No'),
(373, 'APPROVED', 'Mtarfa', 32, 96, 'No'),
(374, 'APPROVED', 'Naxxar \n', 32, 96, 'No'),
(375, 'APPROVED', 'Paola', 32, 96, 'No'),
(376, 'APPROVED', 'Pembroke', 32, 96, 'No'),
(377, 'APPROVED', 'Pieta', 32, 96, 'No'),
(379, 'APPROVED', 'San Giljan', 32, 96, 'No'),
(380, 'APPROVED', 'San Gwann', 32, 96, 'No'),
(381, 'APPROVED', 'San Pawl il-Bahar', 32, 96, 'No'),
(382, 'APPROVED', 'Santa Lucija', 32, 96, 'No'),
(383, 'APPROVED', 'Santa Venera', 32, 96, 'No'),
(384, 'APPROVED', 'Siġġiewi\n', 32, 96, 'No'),
(386, 'APPROVED', 'Swieqi', 32, 96, 'No'),
(387, 'APPROVED', 'Ta\'Xbiex\n', 32, 96, 'No'),
(388, 'APPROVED', 'Tarxian', 32, 96, 'No'),
(390, 'APPROVED', 'Xghajra', 32, 96, 'No'),
(392, 'APPROVED', 'Zebbug', 32, 96, 'No'),
(393, 'APPROVED', 'Zejtun', 32, 96, 'No'),
(394, 'APPROVED', 'Zurrieq', 32, 96, 'No'),
(395, 'APPROVED', 'Gozo', 32, 96, 'No'),
(396, 'APPROVED', 'Fontana', 32, 96, 'No'),
(397, 'APPROVED', 'Ghajnsielem', 32, 96, 'No'),
(398, 'APPROVED', 'Gharb', 32, 96, 'No'),
(399, 'APPROVED', 'Ghasri', 32, 96, 'No'),
(400, 'APPROVED', 'Kercem', 32, 96, 'No'),
(401, 'APPROVED', 'Munxar', 32, 96, 'No'),
(402, 'APPROVED', 'Nadur', 32, 96, 'No'),
(403, 'APPROVED', 'Qala', 32, 96, 'No'),
(404, 'APPROVED', 'Rabat', 32, 96, 'No'),
(405, 'APPROVED', 'San Lawrenz', 32, 96, 'No'),
(406, 'APPROVED', 'Sannat', 32, 96, 'No'),
(407, 'APPROVED', 'Xaghra', 32, 96, 'No'),
(410, 'APPROVED', 'North', 32, 96, 'No'),
(411, 'APPROVED', 'South', 32, 96, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `company_sizes`
--

CREATE TABLE `company_sizes` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_size` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_sizes`
--

INSERT INTO `company_sizes` (`id`, `status`, `company_size`, `is_deleted`) VALUES
(2, 'APPROVED', '0-50 Employee', 'No'),
(3, 'APPROVED', '51-100 Employee ', 'No'),
(4, 'APPROVED', '101-150 Employee ', 'No'),
(5, 'APPROVED', '151-500 Employee ', 'No'),
(6, 'APPROVED', 'More than 500 Employee', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `company_types`
--

CREATE TABLE `company_types` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_types`
--

INSERT INTO `company_types` (`id`, `status`, `company_type`, `is_deleted`) VALUES
(1, 'APPROVED', 'Partnership', 'No'),
(2, 'APPROVED', 'Public Listed', 'No'),
(3, 'APPROVED', 'Private Limited', 'No'),
(5, 'APPROVED', 'Sole Proprietor', 'No'),
(6, 'APPROVED', 'Government Ministry', 'No'),
(7, 'APPROVED', 'Statutory Board', 'No'),
(8, 'APPROVED', 'Non-Profitable Organization', 'No'),
(9, 'APPROVED', 'Small and Medium Enterprise', 'No'),
(10, 'APPROVED', 'Multinational Corporation', 'No'),
(11, 'APPROVED', 'Limited Exempt Private Company', 'No'),
(12, 'APPROVED', 'N Demo Com Type', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'For use mobile code',
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `status`, `country_name`, `country_code`, `is_deleted`) VALUES
(1, 'APPROVED', 'India', '+91', 'No'),
(2, 'APPROVED', 'Pakistan', '+92', 'No'),
(3, 'APPROVED', 'Australia', '61', 'No'),
(4, 'APPROVED', 'United Arab Emirates', '+971', 'No'),
(5, 'APPROVED', 'Canada', '+1', 'No'),
(6, 'APPROVED', 'United States', '+1', 'No'),
(7, 'APPROVED', 'United Kingdom', '+44', 'No'),
(8, 'APPROVED', 'New Zealand', '+64', 'No'),
(9, 'APPROVED', 'South Africa', '+27', 'No'),
(31, 'APPROVED', 'France', '+33', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'For use mobile code',
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `status`, `country_name`, `country_code`, `is_deleted`) VALUES
(1, 'UNAPPROVED', 'India', '+91', 'Yes'),
(2, 'APPROVED', 'Pakistan', '+92', 'Yes'),
(3, 'APPROVED', 'Australia', '+61', 'Yes'),
(4, 'APPROVED', 'United Arab Emirates', '+971', 'Yes'),
(5, 'APPROVED', 'Canada', '+53', 'Yes'),
(6, 'APPROVED', 'United States', '+1', 'Yes'),
(7, 'APPROVED', 'United Kingdom', '+44', 'Yes'),
(8, 'APPROVED', 'New Zealand', '+64', 'Yes'),
(9, 'APPROVED', 'South Africa', '+27', 'Yes'),
(31, 'UNAPPROVED', 'Franced', '+33', 'Yes'),
(32, 'APPROVED', 'Malta', '+356', 'Yes'),
(33, 'APPROVED', 'Afganistan', '+93', 'Yes'),
(34, 'APPROVED', 'Albania', '+355', 'Yes'),
(35, 'APPROVED', 'Algeria', '+213', 'Yes'),
(36, 'UNAPPROVED', 'American Samoa', '+683', 'No'),
(37, 'UNAPPROVED', 'Andorra', '+376', 'No'),
(38, 'UNAPPROVED', 'Angola', '+244', 'Yes'),
(39, 'APPROVED', 'Anguilla', '+263', 'No'),
(40, 'APPROVED', 'Antarctica', '+672', 'No'),
(41, 'APPROVED', 'Antigua and Barbuda', '+267', 'No'),
(42, 'APPROVED', 'Argentina', '+54', 'No'),
(43, 'APPROVED', 'Armenia', '+374', 'No'),
(44, 'APPROVED', 'Aruba', '+297', 'No'),
(45, 'APPROVED', 'Australia', '+61', 'No'),
(46, 'APPROVED', 'Austria', '+43', 'No'),
(47, 'APPROVED', 'Azerbaijan', '+994', 'No'),
(48, 'APPROVED', 'Bahamas', '+241', 'No'),
(49, 'APPROVED', 'Bahrain', '+973', 'No'),
(50, 'APPROVED', 'Bangladesh', '+880', 'No'),
(51, 'APPROVED', 'Barbados', '+245', 'No'),
(52, 'APPROVED', 'Belarus', '+375', 'No'),
(53, 'APPROVED', 'Belgium', '+32', 'No'),
(54, 'APPROVED', 'Belize', '+501', 'No'),
(55, 'APPROVED', 'Benin', '+229', 'No'),
(56, 'APPROVED', 'Bermuda', '+440', 'No'),
(57, 'APPROVED', 'Bhutan', '+975', 'No'),
(58, 'APPROVED', 'Bolivia', '+591', 'No'),
(59, 'APPROVED', 'Bosnia and Herzegovina', '+387', 'No'),
(60, 'APPROVED', 'Botswana', '+267', 'No'),
(61, 'APPROVED', 'Brazil', '+55', 'No'),
(62, 'APPROVED', 'British Indian Ocean Territory', '+246', 'No'),
(63, 'APPROVED', 'British Virgin Islands', '+283', 'No'),
(64, 'APPROVED', 'Brunei', '+673', 'No'),
(65, 'APPROVED', 'Bulgaria', '+359', 'No'),
(66, 'APPROVED', 'Burkina Faso', '+226', 'No'),
(67, 'APPROVED', 'Burundi', '+257', 'No'),
(68, 'APPROVED', 'Cambodia', '+855', 'No'),
(69, 'APPROVED', 'Cameroon', '+237', 'No'),
(70, 'APPROVED', 'Canada', '+1', 'No'),
(71, 'APPROVED', 'Cape Verde', '+238', 'No'),
(72, 'APPROVED', 'Cayman Islands', '+344', 'No'),
(73, 'APPROVED', 'Central African Republic', '+236', 'No'),
(74, 'APPROVED', 'Chad', '+235', 'No'),
(75, 'APPROVED', 'Chile', '+56', 'No'),
(76, 'APPROVED', 'China', '+86', 'No'),
(77, 'APPROVED', 'Christmas Island', '+61', 'No'),
(78, 'APPROVED', 'Cocos Islands', '+61', 'No'),
(79, 'APPROVED', 'Colombia', '+57', 'No'),
(80, 'APPROVED', 'Comoros', '+269', 'No'),
(81, 'APPROVED', 'Cook Islands', '+682', 'No'),
(82, 'APPROVED', 'Costa Rica', '+506', 'No'),
(83, 'APPROVED', 'Croatia', '+385', 'No'),
(84, 'APPROVED', 'Cuba', '+53', 'No'),
(85, 'APPROVED', 'Curacao', '+599', 'No'),
(86, 'APPROVED', 'Cyprus', '+357', 'No'),
(87, 'APPROVED', 'Czech Republic', '+420', 'No'),
(88, 'APPROVED', 'Democratic Republic of the Congo', '+243', 'No'),
(89, 'APPROVED', 'Denmark', '+45', 'No'),
(90, 'APPROVED', 'Djibouti', '+253', 'No'),
(91, 'APPROVED', 'Dominica', '+766', 'No'),
(92, 'APPROVED', 'Dominican Republic', '+1-809', 'No'),
(93, 'APPROVED', 'East Timor', '+670', 'No'),
(94, 'APPROVED', 'Ecuador', '+593', 'No'),
(95, 'APPROVED', 'Egypt', '+20', 'No'),
(96, 'APPROVED', 'El Salvador', '+503', 'No'),
(97, 'APPROVED', 'Equatorial Guinea', '+240', 'No'),
(98, 'APPROVED', 'Eritrea', '+291', 'No'),
(99, 'APPROVED', 'Estonia', '+372', 'No'),
(100, 'APPROVED', 'Ethiopia', '+251', 'No'),
(101, 'APPROVED', 'Falkland Islands', '+500', 'No'),
(102, 'APPROVED', 'Faroe Islands', '+298', 'No'),
(103, 'APPROVED', 'Fiji', '+679', 'No'),
(104, 'APPROVED', 'Finland', '+358', 'No'),
(105, 'APPROVED', 'France', '+33', 'No'),
(106, 'APPROVED', 'French Polynesia', '+689', 'No'),
(107, 'APPROVED', 'Gabon', '+241', 'No'),
(108, 'APPROVED', 'Gambia', '+220', 'No'),
(109, 'APPROVED', 'Georgia', '+995', 'No'),
(110, 'APPROVED', 'Germany', '+49', 'No'),
(111, 'APPROVED', 'Ghana', '+233', 'No'),
(112, 'APPROVED', 'Gibraltar', '+350', 'No'),
(113, 'APPROVED', 'Greece', '+30', 'No'),
(114, 'APPROVED', 'Greenland', '+299', 'No'),
(115, 'APPROVED', 'Grenada', '+472', 'No'),
(116, 'APPROVED', 'Guam', '+670', 'No'),
(117, 'APPROVED', 'Guatemala', '+502', 'No'),
(118, 'APPROVED', 'Guernsey', '+1437', 'No'),
(119, 'APPROVED', 'Guinea', '+224', 'No'),
(120, 'APPROVED', 'Guinea-Bissau', '+245', 'No'),
(121, 'APPROVED', 'Guyana', '+592', 'No'),
(122, 'APPROVED', 'Haiti', '+509', 'No'),
(123, 'APPROVED', 'Honduras', '+504', 'No'),
(124, 'APPROVED', 'Hong Kong', '+852', 'No'),
(125, 'APPROVED', 'Hungary', '+36', 'No'),
(126, 'APPROVED', 'Iceland', '+354', 'No'),
(127, 'APPROVED', 'Indonesia', '+62', 'No'),
(128, 'APPROVED', 'Iran', '+98', 'No'),
(129, 'APPROVED', 'Iraq', '+964', 'No'),
(130, 'APPROVED', 'Ireland', '+353', 'No'),
(131, 'APPROVED', 'Isle of Man', '+1580', 'No'),
(132, 'APPROVED', 'Israel', '+972', 'No'),
(133, 'APPROVED', 'Italy', '+39', 'No'),
(134, 'APPROVED', 'Ivory Coast', '+225', 'No'),
(135, 'APPROVED', 'Jamaica', '+875', 'No'),
(136, 'APPROVED', 'Japan', '+81', 'No'),
(137, 'APPROVED', 'Jersey', '+1490', 'No'),
(138, 'APPROVED', 'Jordan', '+962', 'No'),
(139, 'APPROVED', 'Kazakhstan', '+7', 'No'),
(140, 'APPROVED', 'Kenya', '+254', 'No'),
(141, 'APPROVED', 'Kiribati', '+686', 'No'),
(142, 'APPROVED', 'Kosovo', '+383', 'No'),
(143, 'APPROVED', 'Kuwait', '+965', 'No'),
(144, 'APPROVED', 'Kyrgyzstan', '+996', 'No'),
(145, 'APPROVED', 'Laos', '+856', 'No'),
(146, 'APPROVED', 'Latvia', '+371', 'No'),
(147, 'APPROVED', 'Lebanon', '+961', 'No'),
(148, 'APPROVED', 'Lesotho', '+266', 'No'),
(149, 'APPROVED', 'Liberia', '+231', 'No'),
(150, 'APPROVED', 'Libya', '+218', 'No'),
(151, 'APPROVED', 'Liechtenstein', '+423', 'No'),
(152, 'APPROVED', 'Lithuania', '+370', 'No'),
(153, 'APPROVED', 'Luxembourg', '+352', 'No'),
(154, 'APPROVED', 'Macau', '+853', 'No'),
(155, 'APPROVED', 'Macedonia', '+389', 'No'),
(156, 'APPROVED', 'Madagascar', '+261', 'No'),
(157, 'APPROVED', 'Malawi', '+265', 'No'),
(158, 'APPROVED', 'Malaysia', '+60', 'No'),
(159, 'APPROVED', 'Maldives', '+960', 'No'),
(160, 'APPROVED', 'Mali', '+223', 'No'),
(161, 'APPROVED', 'Marshall Islands', '+692', 'No'),
(162, 'APPROVED', 'Mauritania', '+222', 'No'),
(163, 'APPROVED', 'Mauritius', '+230', 'No'),
(164, 'APPROVED', 'Mayotte', '+262', 'No'),
(165, 'APPROVED', 'Mexico', '+52', 'No'),
(166, 'APPROVED', 'Micronesia', '+691', 'No'),
(167, 'APPROVED', 'Moldova', '+373', 'No'),
(168, 'APPROVED', 'Monaco', '+377', 'No'),
(169, 'APPROVED', 'Mongolia', '+976', 'No'),
(170, 'APPROVED', 'Montenegro', '+382', 'No'),
(171, 'APPROVED', 'Montserrat', '+663', 'No'),
(172, 'APPROVED', 'Morocco', '+212', 'No'),
(173, 'APPROVED', 'Mozambique', '+258', 'No'),
(174, 'APPROVED', 'Myanmar', '+95', 'No'),
(175, 'APPROVED', 'Namibia', '+264', 'No'),
(176, 'APPROVED', 'Nauru', '+674', 'No'),
(177, 'APPROVED', 'Nepal', '+977', 'No'),
(178, 'APPROVED', 'Netherlands', '+31', 'No'),
(179, 'APPROVED', 'Netherlands Antilles', '+599', 'No'),
(180, 'APPROVED', 'New Caledonia', '+687', 'No'),
(181, 'APPROVED', 'New Zealand', '+64', 'No'),
(182, 'APPROVED', 'Nicaragua', '+505', 'No'),
(183, 'APPROVED', 'Niger', '+227', 'No'),
(184, 'APPROVED', 'Nigeria', '+234', 'No'),
(185, 'APPROVED', 'Niue', '+683', 'No'),
(186, 'APPROVED', 'North Korea', '+850', 'No'),
(187, 'APPROVED', 'Northern Mariana Islands', '+669', 'No'),
(188, 'APPROVED', 'Norway', '+47', 'No'),
(189, 'APPROVED', 'Oman', '+968', 'No'),
(190, 'APPROVED', 'Pakistan', '+92', 'No'),
(191, 'APPROVED', 'Palau', '+680', 'No'),
(192, 'APPROVED', 'Palestine', '+970', 'No'),
(193, 'APPROVED', 'Panama', '+507', 'No'),
(194, 'APPROVED', 'Papua New Guinea', '+675', 'No'),
(195, 'APPROVED', 'Paraguay', '+595', 'No'),
(196, 'APPROVED', 'Peru', '+51', 'No'),
(197, 'APPROVED', 'Philippines', '+63', 'No'),
(198, 'APPROVED', 'Pitcairn', '+64', 'No'),
(199, 'APPROVED', 'Poland', '+48', 'No'),
(200, 'APPROVED', 'Portugal', '+351', 'No'),
(201, 'APPROVED', 'Puerto Rico', '+1-787', 'No'),
(202, 'APPROVED', 'Qatar', '+974', 'No'),
(203, 'APPROVED', 'Republic of the Congo', '+242', 'No'),
(204, 'APPROVED', 'Reunion', '+262', 'No'),
(205, 'APPROVED', 'Romania', '+40', 'No'),
(206, 'APPROVED', 'Russia', '+7', 'No'),
(207, 'APPROVED', 'Rwanda', '+250', 'No'),
(208, 'APPROVED', 'Saint Barthelemy', '+590', 'No'),
(209, 'APPROVED', 'Saint Helena', '+290', 'No'),
(210, 'APPROVED', 'Saint Kitts and Nevis', '+868', 'No'),
(211, 'APPROVED', 'Saint Lucia', '+757', 'No'),
(212, 'APPROVED', 'Saint Martin', '+590', 'No'),
(213, 'APPROVED', 'Saint Pierre and Miquelon', '+508', 'No'),
(214, 'APPROVED', 'Saint Vincent and the Grenadines', '+783', 'No'),
(215, 'APPROVED', 'Samoa', '+685', 'No'),
(216, 'APPROVED', 'San Marino', '+378', 'No'),
(217, 'APPROVED', 'Sao Tome and Principe', '+239', 'No'),
(218, 'APPROVED', 'Saudi Arabia', '+966', 'No'),
(219, 'APPROVED', 'Senegal', '+221', 'No'),
(220, 'APPROVED', 'Serbia', '+381', 'No'),
(221, 'APPROVED', 'Seychelles', '+248', 'No'),
(222, 'APPROVED', 'Sierra Leone', '+232', 'No'),
(223, 'APPROVED', 'Singapore', '+65', 'No'),
(224, 'APPROVED', 'Sint Maarten', '+720', 'No'),
(225, 'APPROVED', 'Slovakia', '+421', 'No'),
(226, 'APPROVED', 'Slovenia', '+386', 'No'),
(227, 'APPROVED', 'Solomon Islands', '+677', 'No'),
(228, 'APPROVED', 'Somalia', '+252', 'No'),
(229, 'APPROVED', 'South Africa', '+27', 'No'),
(230, 'APPROVED', 'South Korea', '+82', 'No'),
(231, 'APPROVED', 'South Sudan', '+211', 'No'),
(232, 'APPROVED', 'Spain', '+34', 'No'),
(233, 'APPROVED', 'Sri Lanka', '+94', 'No'),
(234, 'APPROVED', 'Sudan', '+249', 'No'),
(235, 'APPROVED', 'Suriname', '+597', 'No'),
(236, 'APPROVED', 'Svalbard and Jan Mayen', '+47', 'No'),
(237, 'APPROVED', 'Swaziland', '+268', 'No'),
(238, 'APPROVED', 'Sweden', '+46', 'No'),
(239, 'APPROVED', 'Switzerland', '+41', 'No'),
(240, 'APPROVED', 'Syria', '+963', 'No'),
(241, 'APPROVED', 'Taiwan', '+886', 'No'),
(242, 'APPROVED', 'Tajikistan', '+992', 'No'),
(243, 'APPROVED', 'Tanzania', '+255', 'No'),
(244, 'APPROVED', 'Thailand', '+66', 'No'),
(245, 'APPROVED', 'Togo', '+228', 'No'),
(246, 'APPROVED', 'Tokelau', '+690', 'No'),
(247, 'APPROVED', 'Tonga', '+676', 'No'),
(248, 'APPROVED', 'Trinidad and Tobago', '+867', 'No'),
(249, 'APPROVED', 'Tunisia', '+216', 'No'),
(250, 'APPROVED', 'Turkey', '+90', 'No'),
(251, 'APPROVED', 'Turkmenistan', '+993', 'No'),
(252, 'APPROVED', 'Turks and Caicos Islands', '+648', 'No'),
(253, 'APPROVED', 'Tuvalu', '+688', 'No'),
(254, 'APPROVED', 'U.S. Virgin Islands', '+339', 'No'),
(255, 'APPROVED', 'Uganda', '+256', 'No'),
(256, 'APPROVED', 'Ukraine', '+380', 'No'),
(257, 'APPROVED', 'United Arab Emirates', '+971', 'No'),
(258, 'APPROVED', 'United Kingdom', '+44', 'No'),
(260, 'APPROVED', 'Uruguay', '+598', 'No'),
(261, 'APPROVED', 'Uzbekistan', '+998', 'No'),
(262, 'APPROVED', 'Vanuatu', '+678', 'No'),
(263, 'APPROVED', 'Vatican', '+379', 'No'),
(264, 'APPROVED', 'Venezuela', '+58', 'No'),
(265, 'APPROVED', 'Vietnam', '+84', 'No'),
(266, 'APPROVED', 'Wallis and Futuna', '+681', 'No'),
(267, 'APPROVED', 'Western Sahara', '+212', 'No'),
(268, 'APPROVED', 'Yemen', '+967', 'No'),
(269, 'APPROVED', 'Zambia', '+260', 'No'),
(270, 'APPROVED', 'Zimbabwe', '+263', 'No'),
(272, 'APPROVED', 'Test', '855', 'No'),
(273, 'APPROVED', 'dfd', 'fdfd', 'No'),
(274, 'APPROVED', 'Malta', '+356', 'No'),
(275, 'APPROVED', 'Afganistan', '+93', 'No'),
(276, 'APPROVED', 'India', '+91', 'No'),
(277, 'APPROVED', 'India', '+91', 'No'),
(278, 'APPROVED', 'India', '+91', 'No'),
(279, 'APPROVED', 'Malta', '+356', 'No'),
(280, 'APPROVED', 'Malta', '+356', 'No'),
(281, 'UNAPPROVED', 'India', '+91', 'No'),
(282, 'UNAPPROVED', 'India', '+91', 'No'),
(283, 'UNAPPROVED', 'India', '+91', 'No'),
(284, 'UNAPPROVED', 'Malta', '+356', 'No'),
(285, 'UNAPPROVED', 'India', '+91', 'No'),
(286, 'UNAPPROVED', 'India', '+91', 'No'),
(287, 'UNAPPROVED', 'India', '+91', 'No'),
(288, 'UNAPPROVED', 'India', '+91', 'No'),
(289, 'APPROVED', 'Malta', '+356', 'No'),
(290, 'APPROVED', 'Malta', '+356', 'No'),
(291, 'APPROVED', 'test', 'test', 'No'),
(292, 'UNAPPROVED', 'India', '+91', 'No'),
(293, 'APPROVED', 'India', '+91', 'No'),
(294, 'APPROVED', 'India', '+91', 'No'),
(295, 'UNAPPROVED', 'India', '+91', 'No'),
(296, 'UNAPPROVED', 'Angola', '+244', 'No'),
(297, 'UNAPPROVED', 'India', '+91', 'No'),
(298, 'UNAPPROVED', 'India', '+91', 'No'),
(299, 'APPROVED', 'American Samoad', '+563', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `functional_area` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `status`, `functional_area`, `role_name`, `is_deleted`) VALUES
(1, 'APPROVED', 1, 'Engineering Design/Design Engineerd', 'No'),
(3, 'APPROVED', 3, 'IT Hardware Repair & Maintenance', 'No'),
(8, 'APPROVED', 4, 'Able Seaman (AB)', 'No'),
(9, 'APPROVED', 5, 'Academic Coordinator', 'No'),
(10, 'APPROVED', 6, 'Accessory Designer', 'No'),
(11, 'APPROVED', 7, 'Accessory Designer', 'Yes'),
(12, 'APPROVED', 7, 'Account Director', 'No'),
(13, 'APPROVED', 8, 'Account Planning', 'No'),
(14, 'APPROVED', 9, 'Account Services Executive', 'No'),
(15, 'APPROVED', 8, 'Account Servicing', 'Yes'),
(16, 'APPROVED', 10, 'Accountant', 'Yes'),
(17, 'APPROVED', 10, 'Accounts Executive', 'Yes'),
(18, 'APPROVED', 10, 'Accounts Executive/Accountant', 'No'),
(19, 'APPROVED', 10, 'Accounts Manager', 'No'),
(20, 'APPROVED', 5, 'Accounts Teacher', 'No'),
(21, 'APPROVED', 11, 'Actuary', 'No'),
(22, 'APPROVED', 11, 'Actuary Manager - General', 'No'),
(23, 'APPROVED', 11, 'Actuary Manager - Life', 'No'),
(24, 'APPROVED', 5, 'Adjunct Lecturer', 'No'),
(25, 'APPROVED', 12, 'Administration Executive', 'No'),
(26, 'APPROVED', 12, 'Administration Manager', 'No'),
(27, 'APPROVED', 13, 'Advertising - Executive', 'No'),
(28, 'APPROVED', 13, 'Advertising - Manager', 'No'),
(29, 'APPROVED', 14, 'Advisor / Outside Consultant', 'No'),
(30, 'APPROVED', 11, 'Advisory', 'No'),
(31, 'APPROVED', 13, 'Affiliate Marketing Manager', 'No'),
(32, 'APPROVED', 11, 'Agency Manager', 'No'),
(33, 'APPROVED', 15, 'Agent', 'No'),
(34, 'APPROVED', 16, 'Air Hostess / Steward / Cabin Crew', 'No'),
(35, 'APPROVED', 16, 'Air Traffic Controller', 'No'),
(36, 'APPROVED', 16, 'Airline Security Officer', 'No'),
(37, 'APPROVED', 16, 'Airport Coordinator', 'No'),
(38, 'APPROVED', 17, 'Anaesthetist', 'No'),
(39, 'APPROVED', 7, 'Analytical Chemistry Associate / Scientist', 'No'),
(40, 'APPROVED', 7, 'Analytical Chemistry Manager', 'No'),
(41, 'APPROVED', 18, 'Analytical Chemistry Scientist', 'Yes'),
(42, 'APPROVED', 19, 'Animation / Graphic Artist', 'No'),
(43, 'APPROVED', 20, 'Animation Designer', 'No'),
(44, 'APPROVED', 6, 'Apparel / Garment Designer', 'No'),
(45, 'APPROVED', 7, 'Apparel Designer', 'Yes'),
(46, 'APPROVED', 7, 'Application Engineer', 'No'),
(47, 'APPROVED', 21, 'Appraisals - Head / Mgr', 'No'),
(48, 'APPROVED', 14, 'Apprentice / Intern', 'No'),
(49, 'APPROVED', 17, 'AR Analyst / Senior AR Analyst / Ar Caller', 'No'),
(50, 'APPROVED', 9, 'AR Caller / AR Analyst', 'Yes'),
(51, 'APPROVED', 5, 'Arabic Teacher', 'No'),
(52, 'APPROVED', 22, 'Architect', 'No'),
(53, 'APPROVED', 23, 'Architect', 'Yes'),
(54, 'APPROVED', 24, 'Architect', 'Yes'),
(55, 'APPROVED', 25, 'Area / Territory Sales Manager', 'No'),
(56, 'APPROVED', 26, 'Area Manager', 'No'),
(57, 'APPROVED', 25, 'Area Sales Manager', 'No'),
(58, 'APPROVED', 27, 'Army / Navy / Airforce Personnel', 'No'),
(59, 'APPROVED', 8, 'Art Director', 'Yes'),
(60, 'APPROVED', 13, 'Art Director / Sr Art Director', 'No'),
(61, 'APPROVED', 20, 'Art Director / Sr Art Director', 'Yes'),
(62, 'APPROVED', 5, 'Arts Teacher', 'No'),
(63, 'APPROVED', 7, 'Assembler', 'No'),
(64, 'APPROVED', 11, 'Asset Manager', 'No'),
(65, 'APPROVED', 11, 'Asset Operations / Documentation-Exec / Mgr', 'No'),
(66, 'APPROVED', 13, 'Assistant / Associate Marketing Manager', 'No'),
(67, 'APPROVED', 5, 'Assistant Professor', 'No'),
(68, 'APPROVED', 9, 'Associate/Senior Associate -(NonTechnical)', 'No'),
(69, 'APPROVED', 13, 'Asst Art Director', 'No'),
(70, 'APPROVED', 19, 'Asst Director / Director', 'No'),
(71, 'APPROVED', 19, 'Asst Editor / Editor', 'No'),
(72, 'APPROVED', 11, 'ATM Operations Mgr', 'No'),
(73, 'APPROVED', 28, 'Attendant', 'No'),
(74, 'APPROVED', 10, 'Audit Executive', 'No'),
(75, 'APPROVED', 10, 'Audit Manager', 'No'),
(76, 'APPROVED', 11, 'Audit Manager', 'Yes'),
(77, 'APPROVED', 7, 'Automotive Engineer', 'No'),
(78, 'APPROVED', 19, 'AV Editor', 'Yes'),
(79, 'APPROVED', 8, 'AV Executive / Editor', 'No'),
(80, 'APPROVED', 7, 'Aviation Engineer', 'No'),
(81, 'APPROVED', 16, 'Aviation Engnr', 'Yes'),
(82, 'APPROVED', 17, 'Ayurvedic Doctor', 'No'),
(83, 'APPROVED', 11, 'Back Office Executive', 'No'),
(84, 'APPROVED', 9, 'Back Office Operations', 'No'),
(85, 'APPROVED', 11, 'Bad Debts / Workouts Mgr', 'No'),
(86, 'APPROVED', 11, 'Banc Assurance - General', 'No'),
(87, 'APPROVED', 11, 'Bancassurance Executive / Manager', 'No'),
(88, 'APPROVED', 28, 'Banquet Manager', 'No'),
(89, 'APPROVED', 28, 'Banquet Sales Exec', 'Yes'),
(90, 'APPROVED', 25, 'Banquet Sales Exec / Mgr', 'No'),
(91, 'APPROVED', 28, 'Banquet Sales Mgr', 'Yes'),
(92, 'APPROVED', 28, 'Bar Manager', 'No'),
(93, 'APPROVED', 4, 'Bar Tender', 'No'),
(94, 'APPROVED', 28, 'Bartender', 'Yes'),
(95, 'APPROVED', 18, 'Basic Research Scientist', 'No'),
(96, 'APPROVED', 15, 'BD Manager', 'No'),
(97, 'APPROVED', 16, 'BD Manager', 'Yes'),
(98, 'APPROVED', 29, 'Beauty Manager / Beautician', 'No'),
(99, 'APPROVED', 5, 'Bengali Teacher', 'No'),
(100, 'APPROVED', 25, 'Bid Manager', 'No'),
(101, 'APPROVED', 17, 'Bio - Chemist', 'No'),
(102, 'APPROVED', 18, 'Bio - Technology Research Scientist', 'No'),
(103, 'APPROVED', 7, 'Bio / Pharma Informatics Associate / Scientist', 'No'),
(104, 'APPROVED', 7, 'Bio Statistician', 'No'),
(105, 'APPROVED', 7, 'Bio-Tech Research Associate / Scientist', 'No'),
(106, 'APPROVED', 7, 'Bio-Tech Research Mgr', 'No'),
(107, 'APPROVED', 5, 'Biology Teacher', 'No'),
(108, 'APPROVED', 10, 'Book Keeper / Accounts Assistant', 'No'),
(109, 'APPROVED', 4, 'Bosun', 'No'),
(110, 'APPROVED', 16, 'Branch Head', 'No'),
(111, 'APPROVED', 25, 'Branch Manager', 'No'),
(112, 'APPROVED', 11, 'Branch Manager', 'Yes'),
(113, 'APPROVED', 13, 'Branch Marketing Manager', 'No'),
(114, 'APPROVED', 16, 'Branch Mgr', 'Yes'),
(115, 'APPROVED', 11, 'Broker / Trader', 'No'),
(116, 'APPROVED', 24, 'Brokerage', 'No'),
(117, 'APPROVED', 10, 'Business / Strategic Planning - Manager', 'No'),
(118, 'APPROVED', 13, 'Business Alliances Manager', 'No'),
(119, 'APPROVED', 11, 'Business Alliances Manager', 'Yes'),
(120, 'APPROVED', 30, 'Business Analyst', 'Yes'),
(121, 'APPROVED', 31, 'Business Analyst', 'Yes'),
(122, 'APPROVED', 3, 'Business Analyst', 'Yes'),
(123, 'APPROVED', 13, 'Business Analyst / Consultant', 'No'),
(124, 'APPROVED', 28, 'Business Center Manager', 'No'),
(125, 'APPROVED', 32, 'Business Content Developer', 'No'),
(126, 'APPROVED', 25, 'Business Development Executive', 'No'),
(127, 'APPROVED', 25, 'Business Development Manager', 'No'),
(128, 'APPROVED', 32, 'Business Editor', 'No'),
(129, 'APPROVED', 5, 'Business Studies Teacher', 'No'),
(130, 'APPROVED', 28, 'Busser', 'No'),
(131, 'APPROVED', 28, 'Butler', 'No'),
(132, 'APPROVED', 26, 'Buyer / Sourcing Manager', 'No'),
(133, 'APPROVED', 4, 'Cabin Attendent', 'No'),
(134, 'APPROVED', 19, 'Camera Man / Technician', 'No'),
(135, 'APPROVED', 8, 'Cameraman', 'Yes'),
(136, 'APPROVED', 28, 'Captain', 'No'),
(137, 'APPROVED', 11, 'Card Approvals Officer', 'No'),
(138, 'APPROVED', 17, 'Cardiologist', 'No'),
(139, 'APPROVED', 11, 'Cards Operations Executive', 'No'),
(140, 'APPROVED', 11, 'Cards Operations Manager', 'No'),
(141, 'APPROVED', 11, 'Cards-Sales Officer / Exec', 'No'),
(142, 'APPROVED', 16, 'Cargo Operations / Officer / Loadmaster', 'No'),
(143, 'APPROVED', 11, 'Cash Management Operations', 'No'),
(144, 'APPROVED', 11, 'Cash Officer / Manager', 'No'),
(145, 'APPROVED', 28, 'Cashier', 'Yes'),
(146, 'APPROVED', 26, 'Cashier', 'Yes'),
(147, 'APPROVED', 16, 'Cashier', 'Yes'),
(148, 'APPROVED', 16, 'Cashier / Billing Mgr', 'No'),
(149, 'APPROVED', 28, 'Casino Manager', 'No'),
(150, 'APPROVED', 29, 'Centre Head / Branch Head / Club Manager', 'No'),
(151, 'APPROVED', 5, 'CEO / MD', 'No'),
(152, 'APPROVED', 15, 'CEO / MD / Country Manager', 'No'),
(153, 'APPROVED', 18, 'CEO / MD / Country Manager', 'Yes'),
(154, 'APPROVED', 17, 'CEO / MD / Country Manager', 'Yes'),
(155, 'APPROVED', 33, 'CEO / MD / Country Manager', 'Yes'),
(156, 'APPROVED', 22, 'CEO / MD / Country Manager', 'Yes'),
(157, 'APPROVED', 7, 'CEO / MD / Country Manager', 'Yes'),
(158, 'APPROVED', 8, 'CEO / MD / Country Manager', 'Yes'),
(159, 'APPROVED', 34, 'CEO / MD / Country Manager', 'Yes'),
(160, 'APPROVED', 30, 'CEO / MD / Country Manager', 'Yes'),
(161, 'APPROVED', 28, 'CEO / MD / Country Manager', 'Yes'),
(162, 'APPROVED', 24, 'CEO / MD / Country Manager', 'Yes'),
(163, 'APPROVED', 9, 'CEO / MD / Country Manager', 'Yes'),
(164, 'APPROVED', 26, 'CEO / MD / Country Manager', 'Yes'),
(165, 'APPROVED', 16, 'CEO / MD / Country Manager', 'Yes'),
(166, 'APPROVED', 3, 'CEO / MD / Country Manager', 'Yes'),
(167, 'APPROVED', 35, 'CEO / MD / Country Manager', 'Yes'),
(168, 'APPROVED', 11, 'CEO / MD / Country Manager', 'Yes'),
(169, 'APPROVED', 15, 'CEO / MD / Director', 'No'),
(170, 'APPROVED', 28, 'CEO / MD / Director', 'Yes'),
(171, 'APPROVED', 31, 'CEO / MD / Director', 'Yes'),
(172, 'APPROVED', 36, 'CEO / MD / Director', 'Yes'),
(173, 'APPROVED', 37, 'CEO / MD / Director', 'Yes'),
(174, 'APPROVED', 34, 'CFA', 'No'),
(175, 'APPROVED', 5, 'Chairman', 'No'),
(176, 'APPROVED', 5, 'Chancellor', 'No'),
(177, 'APPROVED', 25, 'Channel Sales Manager', 'No'),
(178, 'APPROVED', 10, 'Chartered Accountant (CPA)', 'No'),
(179, 'APPROVED', 11, 'Chartered Accountant (CPA)', 'Yes'),
(180, 'APPROVED', 28, 'Chef / Kitchen Manager', 'No'),
(181, 'APPROVED', 28, 'Chef De Partis', 'No'),
(182, 'APPROVED', 7, 'Chemical Engineer', 'No'),
(183, 'APPROVED', 35, 'Chemical Engineer', 'Yes'),
(184, 'APPROVED', 7, 'Chemical Research Associate / Scientist', 'No'),
(185, 'APPROVED', 7, 'Chemical Research Mgr', 'No'),
(186, 'APPROVED', 18, 'Chemical Research Scientist', 'Yes'),
(187, 'APPROVED', 18, 'Chemist', 'No'),
(188, 'APPROVED', 17, 'Chemist', 'Yes'),
(189, 'APPROVED', 5, 'Chemistry Teacher', 'No'),
(190, 'APPROVED', 8, 'Chief / Deputy Chief Of Bureau', 'No'),
(191, 'APPROVED', 28, 'Chief Chef', 'No'),
(192, 'APPROVED', 4, 'Chief Cook', 'No'),
(193, 'APPROVED', 4, 'Chief Electro Technical Officer (ETO)', 'No'),
(194, 'APPROVED', 7, 'Chief Engineer', 'No'),
(195, 'APPROVED', 28, 'Chief Engineer', 'Yes'),
(196, 'APPROVED', 4, 'Chief Engineer', 'Yes'),
(197, 'APPROVED', 30, 'Chief Information Officer', 'No'),
(198, 'APPROVED', 3, 'Chief Information Officer', 'Yes'),
(199, 'APPROVED', 4, 'Chief Mate', 'No'),
(200, 'APPROVED', 4, 'Chief Mechanic / Machinist / Motorman', 'No'),
(201, 'APPROVED', 32, 'Chief Of Bureau / Editor In Chief', 'No'),
(202, 'APPROVED', 4, 'Chief Operation Officer', 'No'),
(203, 'APPROVED', 27, 'Chief Security Officer', 'No'),
(204, 'APPROVED', 4, 'Chief Steward', 'No'),
(205, 'APPROVED', 3, 'Chief Technology Officer', 'No'),
(206, 'APPROVED', 5, 'Chinese Teacher', 'No'),
(207, 'APPROVED', 8, 'Choreographer', 'No'),
(208, 'APPROVED', 19, 'Choreographer', 'Yes'),
(209, 'APPROVED', 19, 'Cinematographer', 'No'),
(210, 'APPROVED', 36, 'CIO', 'No'),
(211, 'APPROVED', 22, 'Civil Engineer', 'No'),
(212, 'APPROVED', 7, 'Civil Engineer', 'Yes'),
(213, 'APPROVED', 1, 'Civil Engnr-Aviation', 'No'),
(214, 'APPROVED', 1, 'Civil Engnr-Highway Roadway', 'No'),
(215, 'APPROVED', 1, 'Civil Engnr-Municipal', 'No'),
(216, 'APPROVED', 1, 'Civil Engnr-Telecom', 'No'),
(217, 'APPROVED', 1, 'Civil Engnr-Traffic', 'No'),
(218, 'APPROVED', 1, 'Civil Engnr-Water/Waste Water', 'No'),
(219, 'APPROVED', 22, 'Civil Foreman', 'No'),
(220, 'APPROVED', 11, 'Claims Executive', 'No'),
(221, 'APPROVED', 11, 'Claims Management', 'No'),
(222, 'APPROVED', 11, 'Claims Manager', 'No'),
(223, 'APPROVED', 5, 'Class Teacher / Classroom Coordinator', 'No'),
(224, 'APPROVED', 11, 'Clearing Officer / Head', 'No'),
(225, 'APPROVED', 25, 'Client Relationship Manager', 'No'),
(226, 'APPROVED', 13, 'Client Servicing / Key Account Mgr', 'No'),
(227, 'APPROVED', 11, 'Client Servicing / Key Account Mgr', 'Yes'),
(228, 'APPROVED', 25, 'Client Servicing / Key Account Mgr', 'Yes'),
(229, 'APPROVED', 13, 'Client Servicing Executive', 'No'),
(230, 'APPROVED', 7, 'Clinical Research Associate / Scientist', 'No'),
(231, 'APPROVED', 7, 'Clinical Research Manager', 'No'),
(232, 'APPROVED', 18, 'Clinical Research Scientist', 'Yes'),
(233, 'APPROVED', 28, 'Club Floor Manager', 'No'),
(234, 'APPROVED', 16, 'Co-Pilot / First Officer / Second Officer / Third Officer / Captain', 'No'),
(235, 'APPROVED', 25, 'Collaterals / Flyers Manager', 'No'),
(236, 'APPROVED', 11, 'Collections Executive', 'No'),
(237, 'APPROVED', 11, 'Collections Manager', 'No'),
(238, 'APPROVED', 11, 'Collections Officer', 'No'),
(239, 'APPROVED', 5, 'Commerce Teacher', 'No'),
(240, 'APPROVED', 34, 'Commercial - Manager', 'Yes'),
(241, 'APPROVED', 20, 'Commercial Artist', 'No'),
(242, 'APPROVED', 10, 'Commercial Executive / Manager', 'No'),
(243, 'APPROVED', 28, 'Commis', 'Yes'),
(244, 'APPROVED', 35, 'Commissioning', 'No'),
(245, 'APPROVED', 11, 'Commodity Dealer', 'No'),
(246, 'APPROVED', 34, 'Commodity Trading Mgr', 'No'),
(247, 'APPROVED', 14, 'Company Secretary', 'No'),
(248, 'APPROVED', 10, 'Company Secretary', 'Yes'),
(249, 'APPROVED', 11, 'Compliance & Control', 'No'),
(250, 'APPROVED', 12, 'Computer Operator / Data Entry', 'No'),
(251, 'APPROVED', 34, 'Computer Operator / Data Entry', 'Yes'),
(252, 'APPROVED', 3, 'Computer Operator / Data Entry', 'Yes'),
(253, 'APPROVED', 5, 'Computer Teacher', 'No'),
(254, 'APPROVED', 28, 'Concierge', 'No'),
(255, 'APPROVED', 3, 'Configuration Manager / Release Manager', 'No'),
(256, 'APPROVED', 22, 'Construction Suptd / Inspector', 'No'),
(257, 'APPROVED', 1, 'Construction-Construction Management', 'No'),
(258, 'APPROVED', 1, 'Construction-General Building', 'No'),
(259, 'APPROVED', 1, 'Construction-Heavy', 'No'),
(260, 'APPROVED', 1, 'Construction-Other', 'No'),
(261, 'APPROVED', 1, 'Construction-Residential', 'No'),
(262, 'APPROVED', 1, 'Construction-Specialty', 'No'),
(263, 'APPROVED', 17, 'Consultant', 'No'),
(264, 'APPROVED', 11, 'Consumer Banking Asset Operations', 'No'),
(265, 'APPROVED', 11, 'Consumer Banking Branch Head', 'No'),
(266, 'APPROVED', 11, 'Consumer Banking Head', 'No'),
(267, 'APPROVED', 11, 'Consumer Banking Region Head', 'No'),
(268, 'APPROVED', 11, 'Consumer Branch Banking Operations', 'No'),
(269, 'APPROVED', 32, 'Content Developer', 'No'),
(270, 'APPROVED', 8, 'Content Writer', 'No'),
(271, 'APPROVED', 22, 'Contracting', 'No'),
(272, 'APPROVED', 4, 'Cook', 'No'),
(273, 'APPROVED', 8, 'Copy Writer', 'No'),
(274, 'APPROVED', 13, 'Copywriter', 'Yes'),
(275, 'APPROVED', 20, 'Copywriter', 'Yes'),
(276, 'APPROVED', 32, 'Coresspondent / Asst Editor / Associate Editor', 'No'),
(277, 'APPROVED', 13, 'Corp Communications - Manager / Executive', 'No'),
(278, 'APPROVED', 11, 'Corporate Advisory Mgr', 'No'),
(279, 'APPROVED', 11, 'Corporate Banking Branch Head', 'No'),
(280, 'APPROVED', 11, 'Corporate Banking Credit Analyst', 'No'),
(281, 'APPROVED', 11, 'Corporate Banking Credit Control Manager', 'No'),
(282, 'APPROVED', 11, 'Corporate Banking Credit Head', 'No'),
(283, 'APPROVED', 11, 'Corporate Banking Customer Support Manager', 'No'),
(284, 'APPROVED', 11, 'Corporate Banking Head', 'No'),
(285, 'APPROVED', 11, 'Corporate Banking Region Head', 'No'),
(286, 'APPROVED', 31, 'Corporate Planning / Strategy Mgr', 'No'),
(287, 'APPROVED', 25, 'Corporate Sales', 'No'),
(288, 'APPROVED', 19, 'Correspondent', 'Yes'),
(289, 'APPROVED', 8, 'Correspondent / Reporter', 'No'),
(290, 'APPROVED', 10, 'Cost Accountant / ICWA', 'No'),
(291, 'APPROVED', 5, 'Counsellor', 'No'),
(292, 'APPROVED', 25, 'Counter Sales', 'No'),
(293, 'APPROVED', 34, 'Country Network Coordinator', 'No'),
(294, 'APPROVED', 4, 'Crane Operator', 'No'),
(295, 'APPROVED', 38, 'Creative ', 'No'),
(296, 'APPROVED', 8, 'Creative Director', 'No'),
(297, 'APPROVED', 7, 'Creative Director', 'Yes'),
(298, 'APPROVED', 20, 'Creative Director', 'Yes'),
(299, 'APPROVED', 5, 'Creche Teacher / Incharge / Attendant', 'No'),
(300, 'APPROVED', 10, 'Credit / Control Executive', 'No'),
(301, 'APPROVED', 10, 'Credit / Control Mgr', 'No'),
(302, 'APPROVED', 11, 'Credit Analyst-Corporate Banking', 'No'),
(303, 'APPROVED', 10, 'Credit Control & Collections', 'No'),
(304, 'APPROVED', 11, 'Credit Head - Consumer Banking', 'No'),
(305, 'APPROVED', 11, 'Credit Mgr-Corporate Banking', 'No'),
(306, 'APPROVED', 11, 'Credit Officer', 'No'),
(307, 'APPROVED', 11, 'Credit Research Analyst', 'No'),
(308, 'APPROVED', 11, 'CRM / Cust Service Exec', 'No'),
(309, 'APPROVED', 11, 'CRM / Cust Service Mgr', 'No'),
(310, 'APPROVED', 11, 'CRM / Phone / Internet Banking Exec', 'No'),
(311, 'APPROVED', 39, 'CSR Manager', 'No'),
(312, 'APPROVED', 9, 'CSR/Teller', 'No'),
(313, 'APPROVED', 36, 'CTO / Head / VP Technology (Telecom / ISP)', 'No'),
(314, 'APPROVED', 5, 'Curriculum Designer', 'No'),
(315, 'APPROVED', 9, 'Customer Service / Back Office Operations', 'No'),
(316, 'APPROVED', 7, 'Customer Service / Tech Support', 'No'),
(317, 'APPROVED', 11, 'Customer Service Executive', 'No'),
(318, 'APPROVED', 9, 'Customer Service Executive (Non-voice)', 'No'),
(319, 'APPROVED', 9, 'Customer Service Executive (Voice)', 'No'),
(320, 'APPROVED', 11, 'Customer Service Manager', 'No'),
(321, 'APPROVED', 33, 'Customer Support Engineer / Technician', 'No'),
(322, 'APPROVED', 30, 'Data Analyst', 'No'),
(323, 'APPROVED', 18, 'Data Management / Statistics', 'No'),
(324, 'APPROVED', 7, 'Data Management / Statistics', 'Yes'),
(325, 'APPROVED', 9, 'Data Processing Executive', 'No'),
(326, 'APPROVED', 3, 'Data Warehousing Consultants', 'No'),
(327, 'APPROVED', 3, 'Database Administrator (DBA)', 'No'),
(328, 'APPROVED', 3, 'Database Architect / Designer', 'No'),
(329, 'APPROVED', 5, 'Daycare Teacher / Incharge / Attendant', 'No'),
(330, 'APPROVED', 5, 'Dean / Director', 'No'),
(331, 'APPROVED', 11, 'Debt Analyst', 'No'),
(332, 'APPROVED', 11, 'Debt Instrument Dealer', 'No'),
(333, 'APPROVED', 11, 'Debt Operations Mgr', 'No'),
(334, 'APPROVED', 4, 'Deck Cadet', 'No'),
(335, 'APPROVED', 4, 'Deck Fitter / Oilers', 'No'),
(336, 'APPROVED', 3, 'Delivery Manager', 'No'),
(337, 'APPROVED', 17, 'Dentist', 'No'),
(338, 'APPROVED', 11, 'Depository Participant', 'No'),
(339, 'APPROVED', 11, 'Depository Services-Exec / Mgr', 'No'),
(340, 'APPROVED', 11, 'Derivatives Analyst', 'No'),
(341, 'APPROVED', 11, 'Derivatives Dealer', 'No'),
(342, 'APPROVED', 17, 'Dermatologist', 'No'),
(343, 'APPROVED', 35, 'Desalination Expert', 'No'),
(344, 'APPROVED', 22, 'Desalinational Engineering', 'No'),
(345, 'APPROVED', 22, 'Design Engineer', 'Yes'),
(346, 'APPROVED', 7, 'Design Engineer', 'Yes'),
(347, 'APPROVED', 40, 'Design Engnr / Mgr', 'No'),
(348, 'APPROVED', 7, 'Design Manager', 'No'),
(349, 'APPROVED', 6, 'Designer', 'No'),
(350, 'APPROVED', 12, 'Despatch Incharge', 'No'),
(351, 'APPROVED', 22, 'Detailer', 'No'),
(352, 'APPROVED', 17, 'Dietician', 'No'),
(353, 'APPROVED', 13, 'Direct Marketing - Executive', 'No'),
(354, 'APPROVED', 13, 'Direct Marketing - Manager', 'No'),
(355, 'APPROVED', 13, 'Direct Mktg Exec', 'Yes'),
(356, 'APPROVED', 13, 'Direct Mktg Mgr', 'Yes'),
(357, 'APPROVED', 25, 'Direct Sales Agent / Commission Agent', 'No'),
(358, 'APPROVED', 22, 'Director - Architecture', 'No'),
(359, 'APPROVED', 22, 'Director - Constructions', 'No'),
(360, 'APPROVED', 22, 'Director - Projects', 'No'),
(361, 'APPROVED', 15, 'Director On Board', 'No'),
(362, 'APPROVED', 18, 'Director On Board', 'Yes'),
(363, 'APPROVED', 17, 'Director On Board', 'Yes'),
(364, 'APPROVED', 33, 'Director On Board', 'Yes'),
(365, 'APPROVED', 22, 'Director On Board', 'Yes'),
(366, 'APPROVED', 7, 'Director On Board', 'Yes'),
(367, 'APPROVED', 8, 'Director On Board', 'Yes'),
(368, 'APPROVED', 34, 'Director On Board', 'Yes'),
(369, 'APPROVED', 30, 'Director On Board', 'Yes'),
(370, 'APPROVED', 21, 'Director On Board', 'Yes'),
(371, 'APPROVED', 9, 'Director On Board', 'Yes'),
(372, 'APPROVED', 26, 'Director On Board', 'Yes'),
(373, 'APPROVED', 16, 'Director On Board', 'Yes'),
(374, 'APPROVED', 3, 'Director On Board', 'Yes'),
(375, 'APPROVED', 35, 'Director On Board', 'Yes'),
(376, 'APPROVED', 11, 'Director On Board', 'Yes'),
(377, 'APPROVED', 13, 'Display Marketing Executive', 'No'),
(378, 'APPROVED', 13, 'Display Marketing Manager', 'No'),
(379, 'APPROVED', 34, 'Distribution - Head', 'No'),
(380, 'APPROVED', 17, 'Doctor', 'No'),
(381, 'APPROVED', 22, 'Document Controller', 'No'),
(382, 'APPROVED', 16, 'Documentaion & VISA', 'No'),
(383, 'APPROVED', 14, 'Documentation / Medical Writing', 'No'),
(384, 'APPROVED', 7, 'Documentation / Medical Writing', 'Yes'),
(385, 'APPROVED', 18, 'Documentation / Medical Writing', 'Yes'),
(386, 'APPROVED', 15, 'Documentation / Shipment Management Exec / Mgr', 'No'),
(387, 'APPROVED', 35, 'Documentation Controller', 'No'),
(388, 'APPROVED', 11, 'Domestic Debt Mgr', 'No'),
(389, 'APPROVED', 11, 'Domestic Private Banking-Exec / Mgr', 'No'),
(390, 'APPROVED', 16, 'Domestic Travel', 'No'),
(391, 'APPROVED', 22, 'Draftsman', 'No'),
(392, 'APPROVED', 5, 'Drama / Theater Teacher', 'No'),
(393, 'APPROVED', 35, 'Draughtsman', 'No'),
(394, 'APPROVED', 7, 'Draughtsman', 'Yes'),
(395, 'APPROVED', 23, 'Draughtsman', 'Yes'),
(396, 'APPROVED', 5, 'Drawing Teacher', 'No'),
(397, 'APPROVED', 35, 'Drilling Expert', 'No'),
(398, 'APPROVED', 18, 'Drug Regulatory Doctor', 'No'),
(399, 'APPROVED', 14, 'Drug Regulatory Dr', 'Yes'),
(400, 'APPROVED', 7, 'Drug Regulatory Dr', 'No'),
(401, 'APPROVED', 41, 'DSA / Company Rep', 'No'),
(402, 'APPROVED', 22, 'Duct Engineers', 'No'),
(403, 'APPROVED', 31, 'EA To Chairman / President / VP', 'No'),
(404, 'APPROVED', 17, 'ECG / CGA Technician', 'No'),
(405, 'APPROVED', 5, 'Economics Teacher', 'No'),
(406, 'APPROVED', 11, 'Economist', 'No'),
(407, 'APPROVED', 8, 'Editor / Managing Editor', 'No'),
(408, 'APPROVED', 3, 'EDP Analyst', 'No'),
(409, 'APPROVED', 11, 'EFT / ACH Manager', 'No'),
(410, 'APPROVED', 35, 'Electrical & Instrumentation Engineering', 'No'),
(411, 'APPROVED', 22, 'Electrical Engineer', 'No'),
(412, 'APPROVED', 7, 'Electrical Engineer', 'Yes'),
(413, 'APPROVED', 4, 'Electrical Engineer', 'Yes'),
(414, 'APPROVED', 1, 'Electrical Engnr-Commercial', 'No'),
(415, 'APPROVED', 1, 'Electrical Engnr-Industrial', 'No'),
(416, 'APPROVED', 1, 'Electrical Engnr-Other', 'No'),
(417, 'APPROVED', 1, 'Electrical Engnr-Telecom', 'No'),
(418, 'APPROVED', 1, 'Electrical Engnr-Utility', 'No'),
(419, 'APPROVED', 4, 'Electrical Officer', 'No'),
(420, 'APPROVED', 22, 'Electrical Technician', 'No'),
(421, 'APPROVED', 40, 'Electrician', 'No'),
(422, 'APPROVED', 7, 'Electronics / Instrumentation Engineer', 'No'),
(423, 'APPROVED', 13, 'Email Marketing Manager', 'No'),
(424, 'APPROVED', 21, 'Employee Relations Executive', 'No'),
(425, 'APPROVED', 21, 'Employee Relations Manager', 'No'),
(426, 'APPROVED', 4, 'Engine Fitter', 'No'),
(427, 'APPROVED', 35, 'Engineering - Facilities / Surface', 'No'),
(428, 'APPROVED', 35, 'Engineering - Heating & Thermal Equipment', 'No'),
(429, 'APPROVED', 35, 'Engineering - Materials & Corrosion', 'No'),
(430, 'APPROVED', 35, 'Engineering - Offshore Structures', 'No'),
(431, 'APPROVED', 35, 'Engineering - Pipelines', 'No'),
(432, 'APPROVED', 35, 'Engineering - Pressure Equipment', 'No'),
(433, 'APPROVED', 35, 'Engineering - Reactor & Solids Processing', 'No'),
(434, 'APPROVED', 35, 'Engineering - Support', 'No'),
(435, 'APPROVED', 40, 'Engineering Mgr', 'No'),
(436, 'APPROVED', 5, 'English Teacher', 'No'),
(437, 'APPROVED', 17, 'ENT Specialist', 'No'),
(438, 'APPROVED', 40, 'Environment Engnr / Officer', 'No'),
(439, 'APPROVED', 7, 'Environmental Engineer', 'Yes'),
(440, 'APPROVED', 35, 'EPC (Engineering Procurement & Construction', 'No'),
(441, 'APPROVED', 11, 'Equity Analyst', 'No'),
(442, 'APPROVED', 11, 'Equity Dealer', 'No'),
(443, 'APPROVED', 11, 'Equity Manager', 'No'),
(444, 'APPROVED', 3, 'ERP CRM / Functional Consultant', 'No'),
(445, 'APPROVED', 3, 'ERP CRM / Support Engineer', 'No'),
(446, 'APPROVED', 3, 'ERP CRM / Technical Consultant', 'No'),
(447, 'APPROVED', 8, 'Event Management', 'No'),
(448, 'APPROVED', 28, 'Event Planner', 'No'),
(449, 'APPROVED', 13, 'Events / Promotion Exec', 'No'),
(450, 'APPROVED', 13, 'Events / Promotions Manager', 'No'),
(451, 'APPROVED', 13, 'Executive - Internet Marketing', 'No'),
(452, 'APPROVED', 28, 'Executive / Master Chef', 'No'),
(453, 'APPROVED', 36, 'Executive / Master Chef', 'Yes'),
(454, 'APPROVED', 21, 'Executive / Sr Executive - Administration', 'No'),
(455, 'APPROVED', 21, 'Executive / Sr Executive - Facility Management', 'No'),
(456, 'APPROVED', 12, 'Executive Secretary / Personal Assistant', 'No'),
(457, 'APPROVED', 28, 'Executive Sous Chef / Chef De Cuisine', 'No'),
(458, 'APPROVED', 35, 'Exploration & Production Engineering', 'No'),
(459, 'APPROVED', 10, 'External Auditor', 'No'),
(460, 'APPROVED', 15, 'External Consultant', 'No'),
(461, 'APPROVED', 10, 'External Consultant', 'Yes'),
(462, 'APPROVED', 18, 'External Consultant', 'Yes'),
(463, 'APPROVED', 33, 'External Consultant', 'Yes'),
(464, 'APPROVED', 22, 'External Consultant', 'Yes'),
(465, 'APPROVED', 8, 'External Consultant', 'Yes'),
(466, 'APPROVED', 7, 'External Consultant', 'Yes'),
(467, 'APPROVED', 34, 'External Consultant', 'Yes'),
(468, 'APPROVED', 30, 'External Consultant', 'Yes'),
(469, 'APPROVED', 28, 'External Consultant', 'Yes'),
(470, 'APPROVED', 9, 'External Consultant', 'Yes'),
(471, 'APPROVED', 26, 'External Consultant', 'Yes'),
(472, 'APPROVED', 16, 'External Consultant', 'Yes'),
(473, 'APPROVED', 13, 'External Consultant', 'Yes'),
(474, 'APPROVED', 21, 'External Consultant', 'Yes'),
(475, 'APPROVED', 25, 'External Consultant', 'Yes'),
(476, 'APPROVED', 3, 'External Consultant', 'Yes'),
(477, 'APPROVED', 35, 'External Consultant', 'Yes'),
(478, 'APPROVED', 11, 'External Consultant', 'Yes'),
(479, 'APPROVED', 28, 'F&B Manager', 'No'),
(480, 'APPROVED', 12, 'Facilities Manager', 'No'),
(481, 'APPROVED', 40, 'Factory Head', 'No'),
(482, 'APPROVED', 22, 'Fashion Content Developer', 'No'),
(483, 'APPROVED', 32, 'Fashion Editor', 'No'),
(484, 'APPROVED', 32, 'Features Content Developer', 'No'),
(485, 'APPROVED', 32, 'Features Editor', 'No'),
(486, 'APPROVED', 35, 'Field Engineer', 'No'),
(487, 'APPROVED', 19, 'Film Producer', 'No'),
(488, 'APPROVED', 10, 'Finance / Budgeting Mgr', 'No'),
(489, 'APPROVED', 11, 'Finance / Budgeting Mgr', 'Yes'),
(490, 'APPROVED', 10, 'Finance Assistant', 'No'),
(491, 'APPROVED', 10, 'Finance Executive', 'No'),
(492, 'APPROVED', 10, 'Finance Manager', 'Yes'),
(493, 'APPROVED', 10, 'Financial / Business Analyst', 'No'),
(494, 'APPROVED', 10, 'Financial Accountant', 'No'),
(495, 'APPROVED', 30, 'Financial Analyst', 'Yes'),
(496, 'APPROVED', 10, 'Financial Controller', 'No'),
(497, 'APPROVED', 35, 'Fire & Gas Technician', 'No'),
(498, 'APPROVED', 29, 'Fitness Trainer / Gym Instructor', 'No'),
(499, 'APPROVED', 34, 'Fleet Supervisor', 'No'),
(500, 'APPROVED', 16, 'Flight Dispatcher', 'No'),
(501, 'APPROVED', 16, 'Flight Engineer / Air Mechanic', 'No'),
(502, 'APPROVED', 15, 'Floor Manager', 'No'),
(503, 'APPROVED', 7, 'Floor Supervisor', 'No'),
(504, 'APPROVED', 6, 'Footwear Designer', 'No'),
(505, 'APPROVED', 7, 'Footwear Designer', 'Yes'),
(506, 'APPROVED', 10, 'Foreign Exchange Officer', 'No'),
(507, 'APPROVED', 35, 'Foreman', 'No'),
(508, 'APPROVED', 7, 'Foreman', 'Yes'),
(509, 'APPROVED', 11, 'Forex Dealer', 'No'),
(510, 'APPROVED', 10, 'Forex Manager', 'No'),
(511, 'APPROVED', 11, 'Forex Operations Mgr', 'No'),
(512, 'APPROVED', 18, 'Formulation Scientist', 'No'),
(513, 'APPROVED', 7, 'Formulation Scientists', 'Yes'),
(514, 'APPROVED', 35, 'FPSO / FSO Conversion Engineer', 'No'),
(515, 'APPROVED', 32, 'Freelance Journalist', 'No'),
(516, 'APPROVED', 6, 'Freelancer', 'No'),
(517, 'APPROVED', 5, 'French Teacher', 'No'),
(518, 'APPROVED', 3, 'Fresher', 'No'),
(519, 'APPROVED', 1, 'Fresher', 'Yes'),
(520, 'APPROVED', 15, 'Fresher', 'Yes'),
(521, 'APPROVED', 35, 'Fresher', 'Yes'),
(522, 'APPROVED', 14, 'Fresher', 'Yes'),
(523, 'APPROVED', 42, 'Fresher', 'Yes'),
(524, 'APPROVED', 6, 'Fresher', 'Yes'),
(525, 'APPROVED', 27, 'Fresher', 'Yes'),
(526, 'APPROVED', 11, 'Fresher', 'Yes'),
(527, 'APPROVED', 10, 'Fresher', 'Yes'),
(528, 'APPROVED', 12, 'Fresher', 'Yes'),
(529, 'APPROVED', 18, 'Fresher', 'Yes'),
(530, 'APPROVED', 40, 'Fresher', 'Yes'),
(531, 'APPROVED', 33, 'Fresher', 'Yes'),
(532, 'APPROVED', 22, 'Fresher', 'Yes'),
(533, 'APPROVED', 32, 'Fresher', 'Yes'),
(534, 'APPROVED', 8, 'Fresher', 'Yes'),
(535, 'APPROVED', 30, 'Fresher', 'Yes'),
(536, 'APPROVED', 7, 'Fresher', 'Yes'),
(537, 'APPROVED', 23, 'Fresher', 'Yes'),
(538, 'APPROVED', 34, 'Fresher', 'Yes'),
(539, 'APPROVED', 24, 'Fresher', 'Yes'),
(540, 'APPROVED', 28, 'Fresher', 'Yes'),
(541, 'APPROVED', 26, 'Fresher', 'Yes'),
(542, 'APPROVED', 5, 'Fresher', 'Yes'),
(543, 'APPROVED', 16, 'Fresher', 'Yes'),
(544, 'APPROVED', 19, 'Fresher', 'Yes'),
(545, 'APPROVED', 21, 'Fresher', 'Yes'),
(546, 'APPROVED', 13, 'Fresher', 'Yes'),
(547, 'APPROVED', 25, 'Fresher', 'Yes'),
(548, 'APPROVED', 20, 'Fresher', 'Yes'),
(549, 'APPROVED', 43, 'Fresher', 'Yes'),
(550, 'APPROVED', 31, 'Freshers', 'Yes'),
(551, 'APPROVED', 9, 'Freshers', 'Yes'),
(552, 'APPROVED', 26, 'Front Desk', 'Yes'),
(553, 'APPROVED', 25, 'Front Desk / Cashier / Billing', 'No'),
(554, 'APPROVED', 17, 'Front Office', 'No'),
(555, 'APPROVED', 28, 'Front Office Executive', 'No'),
(556, 'APPROVED', 28, 'Front Office Manager', 'No'),
(557, 'APPROVED', 11, 'Fund Manager Debt', 'No'),
(558, 'APPROVED', 11, 'Fund Mgr Equity', 'No'),
(559, 'APPROVED', 35, 'Gas Commercial Negotiator', 'No'),
(560, 'APPROVED', 4, 'Gas Engineer', 'No'),
(561, 'APPROVED', 35, 'Gas Regulators / Planners', 'No'),
(562, 'APPROVED', 35, 'Gas Turbine Expert', 'No'),
(563, 'APPROVED', 17, 'Gastronomist / Gastrologist', 'No'),
(564, 'APPROVED', 28, 'General Manager', 'No'),
(565, 'APPROVED', 16, 'General Mgr', 'Yes'),
(566, 'APPROVED', 1, 'Geographic Information Systems / GIS', 'No'),
(567, 'APPROVED', 5, 'Geography Teacher', 'No'),
(568, 'APPROVED', 1, 'Geotechnical Engnr', 'No'),
(569, 'APPROVED', 5, 'German Teacher', 'No'),
(570, 'APPROVED', 26, 'GM', 'No'),
(571, 'APPROVED', 16, 'GM', 'Yes'),
(572, 'APPROVED', 11, 'GM - Treasury', 'No'),
(573, 'APPROVED', 28, 'GM / DGM', 'No'),
(574, 'APPROVED', 10, 'GM / Head / VP Corporate Planning / Strategy', 'No'),
(575, 'APPROVED', 18, 'Goods Manufacturing Practices (GMP)', 'No'),
(576, 'APPROVED', 11, 'Graduate Trainee / Management Trainee', 'No'),
(577, 'APPROVED', 10, 'Graduate Trainee / Management Trainee', 'Yes'),
(578, 'APPROVED', 33, 'Graduate Trainee / Management Trainee', 'Yes'),
(579, 'APPROVED', 8, 'Graduate Trainee / Management Trainee', 'Yes'),
(580, 'APPROVED', 7, 'Graduate Trainee / Management Trainee', 'Yes'),
(581, 'APPROVED', 34, 'Graduate Trainee / Management Trainee', 'Yes'),
(582, 'APPROVED', 21, 'Graduate Trainee / Management Trainee', 'Yes'),
(583, 'APPROVED', 13, 'Graphic Designer', 'Yes'),
(584, 'APPROVED', 20, 'Graphic Designer', 'Yes'),
(585, 'APPROVED', 8, 'Graphic Designer / Animator', 'No'),
(586, 'APPROVED', 3, 'Graphic Designer / Animator', 'Yes'),
(587, 'APPROVED', 16, 'Ground Staff', 'No'),
(588, 'APPROVED', 33, 'GSM Engineer', 'No'),
(589, 'APPROVED', 28, 'Guest Relations Executive', 'No'),
(590, 'APPROVED', 28, 'Guest Relations Manager', 'No'),
(591, 'APPROVED', 28, 'Guest Service Agent', 'No'),
(592, 'APPROVED', 17, 'Gyanecologist', 'No'),
(593, 'APPROVED', 3, 'H / W Installation / Maintenance Engg', 'No'),
(594, 'APPROVED', 29, 'Hair Stylist', 'No'),
(595, 'APPROVED', 3, 'Hardware Design Engineer', 'No'),
(596, 'APPROVED', 3, 'Hardware Design Technical Leader', 'No'),
(597, 'APPROVED', 13, 'Head - Advertising', 'No'),
(598, 'APPROVED', 13, 'Head - Corp Communications', 'No'),
(599, 'APPROVED', 35, 'Head - Development & Projects', 'No'),
(600, 'APPROVED', 13, 'Head - Direct Marketing', 'No'),
(601, 'APPROVED', 35, 'Head - Drilling & Completions', 'No'),
(602, 'APPROVED', 35, 'Head - EPC', 'No'),
(603, 'APPROVED', 8, 'Head - Lighting', 'No'),
(604, 'APPROVED', 13, 'Head - Public Relations', 'No'),
(605, 'APPROVED', 36, 'Head / Mgr / GM-Media Buying', 'No'),
(606, 'APPROVED', 13, 'Head / Mgr / GM-Media Buying', 'Yes'),
(607, 'APPROVED', 36, 'Head / Mgr / GM-Media Planning', 'No'),
(608, 'APPROVED', 13, 'Head / Mgr / GM-Media Planning', 'Yes'),
(609, 'APPROVED', 13, 'Head / VP / GM / Mgr-Online / Digital Marketing', 'No'),
(610, 'APPROVED', 28, 'Head / VP / GM / National Manager Sales', 'No'),
(611, 'APPROVED', 36, 'Head / VP / GM / National Manager-Sales', 'Yes'),
(612, 'APPROVED', 25, 'Head / VP / GM / National Mgr -Sales', 'Yes'),
(613, 'APPROVED', 36, 'Head / VP / GM Accounts', 'No'),
(614, 'APPROVED', 36, 'Head / VP / GM Credit / Risk', 'No'),
(615, 'APPROVED', 36, 'Head / VP / GM Documentation / Shipping', 'No'),
(616, 'APPROVED', 36, 'Head / VP / GM F&B', 'No'),
(617, 'APPROVED', 7, 'Head / VP / GM Formulations', 'No'),
(618, 'APPROVED', 11, 'Head / VP / GM Legal', 'No'),
(619, 'APPROVED', 11, 'Head / VP / GM Operations', 'No'),
(620, 'APPROVED', 36, 'Head / VP / GM Production', 'No'),
(621, 'APPROVED', 36, 'Head / VP / GM QA&QC', 'No'),
(622, 'APPROVED', 7, 'Head / VP / GM R&D', 'No'),
(623, 'APPROVED', 11, 'Head / VP / GM Treasury', 'No'),
(624, 'APPROVED', 13, 'Head / VP / GM- MR', 'No'),
(625, 'APPROVED', 36, 'Head / VP / GM- Purchase / Material Mgmt', 'No'),
(626, 'APPROVED', 10, 'Head / VP / GM-Accounts', 'No'),
(627, 'APPROVED', 28, 'Head / VP / GM-Accounts', 'Yes'),
(628, 'APPROVED', 36, 'Head / VP / GM-Admin & Facilities', 'No'),
(629, 'APPROVED', 21, 'Head / VP / GM-Admin & Facilities', 'Yes'),
(630, 'APPROVED', 36, 'Head / VP / GM-BD', 'No'),
(631, 'APPROVED', 36, 'Head / VP / GM-Broking', 'No'),
(632, 'APPROVED', 11, 'Head / VP / GM-Broking', 'Yes'),
(633, 'APPROVED', 36, 'Head / VP / GM-Business Alliances', 'No'),
(634, 'APPROVED', 13, 'Head / VP / GM-Business Alliances', 'Yes'),
(635, 'APPROVED', 10, 'Head / VP / GM-CFO / Financial Controller', 'No'),
(636, 'APPROVED', 36, 'Head / VP / GM-CFO / Financial Controller', 'Yes'),
(637, 'APPROVED', 11, 'Head / VP / GM-CFO / Financial Controller', 'Yes'),
(638, 'APPROVED', 36, 'Head / VP / GM-Claims', 'No'),
(639, 'APPROVED', 11, 'Head / VP / GM-Claims', 'Yes'),
(640, 'APPROVED', 36, 'Head / VP / GM-Client Servicing', 'No'),
(641, 'APPROVED', 13, 'Head / VP / GM-Client Servicing', 'Yes'),
(642, 'APPROVED', 34, 'Head / VP / GM-Commercial', 'No'),
(643, 'APPROVED', 36, 'Head / VP / GM-Commercial', 'Yes'),
(644, 'APPROVED', 21, 'Head / VP / GM-Compensation & Benefits', 'No'),
(645, 'APPROVED', 36, 'Head / VP / GM-Corporate Advisory', 'No'),
(646, 'APPROVED', 11, 'Head / VP / GM-Corporate Advisory', 'Yes'),
(647, 'APPROVED', 36, 'Head / VP / GM-Corporate Planning / Strategy', 'No'),
(648, 'APPROVED', 31, 'Head / VP / GM-Corporate Planning / Strategy', 'Yes'),
(649, 'APPROVED', 36, 'Head / VP / GM-Credit', 'Yes'),
(650, 'APPROVED', 11, 'Head / VP / GM-Credit / Risk', 'No'),
(651, 'APPROVED', 39, 'Head / VP / GM-CSR', 'No'),
(652, 'APPROVED', 36, 'Head / VP / GM-Depository Services', 'No'),
(653, 'APPROVED', 11, 'Head / VP / GM-Depository Services', 'Yes'),
(654, 'APPROVED', 15, 'Head / VP / GM-Documentation / Shipping', 'No'),
(655, 'APPROVED', 11, 'Head / VP / GM-Domestic / Offshore Debt', 'No'),
(656, 'APPROVED', 36, 'Head / VP / GM-Domestic Debt', 'No'),
(657, 'APPROVED', 36, 'Head / VP / GM-Equity', 'No'),
(658, 'APPROVED', 11, 'Head / VP / GM-Equity', 'Yes'),
(659, 'APPROVED', 28, 'Head / VP / GM-F&B', 'No'),
(660, 'APPROVED', 21, 'Head / VP / GM-Facility Management', 'No'),
(661, 'APPROVED', 10, 'Head / VP / GM-Finance / Audit', 'No'),
(662, 'APPROVED', 36, 'Head / VP / GM-Finance / Audit', 'Yes'),
(663, 'APPROVED', 36, 'Head / VP / GM-Formulations', 'No'),
(664, 'APPROVED', 11, 'Head / VP / GM-Fund Management', 'No'),
(665, 'APPROVED', 36, 'Head / VP / GM-Fund Mgmt', 'Yes'),
(666, 'APPROVED', 36, 'Head / VP / GM-HR', 'No'),
(667, 'APPROVED', 21, 'Head / VP / GM-HR', 'Yes'),
(668, 'APPROVED', 36, 'Head / VP / GM-Insurance Operations', 'No'),
(669, 'APPROVED', 11, 'Head / VP / GM-Insurance Operations', 'Yes'),
(670, 'APPROVED', 36, 'Head / VP / GM-Investment Banking', 'No'),
(671, 'APPROVED', 11, 'Head / VP / GM-Investment Banking', 'Yes'),
(672, 'APPROVED', 14, 'Head / VP / GM-Legal', 'No'),
(673, 'APPROVED', 36, 'Head / VP / GM-Legal', 'Yes'),
(674, 'APPROVED', 36, 'Head / VP / GM-Mergers & Acquisitions', 'No'),
(675, 'APPROVED', 11, 'Head / VP / GM-Mergers & Acquisitions', 'Yes'),
(676, 'APPROVED', 36, 'Head / VP / GM-Mktg', 'No'),
(677, 'APPROVED', 13, 'Head / VP / GM-Mktg', 'Yes'),
(678, 'APPROVED', 11, 'Head / VP / GM-Mktg', 'Yes'),
(679, 'APPROVED', 36, 'Head / VP / GM-MR', 'No'),
(680, 'APPROVED', 36, 'Head / VP / GM-Offshore Debt', 'No'),
(681, 'APPROVED', 40, 'Head / VP / GM-Operations', 'No'),
(682, 'APPROVED', 36, 'Head / VP / GM-Operations', 'Yes'),
(683, 'APPROVED', 42, 'Head / VP / GM-Packaging Development', 'No'),
(684, 'APPROVED', 36, 'Head / VP / GM-Packaging Development', 'Yes'),
(685, 'APPROVED', 13, 'Head / VP / GM-PR / Corp Communication', 'No'),
(686, 'APPROVED', 36, 'Head / VP / GM-Private Equity / Hedge Fund / VC', 'No'),
(687, 'APPROVED', 11, 'Head / VP / GM-Private Equity / Hedge Fund / VC', 'Yes'),
(688, 'APPROVED', 15, 'Head / VP / GM-Production', 'No'),
(689, 'APPROVED', 7, 'Head / VP / GM-Production', 'Yes'),
(690, 'APPROVED', 40, 'Head / VP / GM-Production / Manufacturing / Maintenance', 'No'),
(691, 'APPROVED', 36, 'Head / VP / GM-Production / Manufacturing / Maintenance', 'Yes'),
(692, 'APPROVED', 36, 'Head / VP / GM-Project Finance', 'No'),
(693, 'APPROVED', 11, 'Head / VP / GM-Project Finance', 'Yes'),
(694, 'APPROVED', 15, 'Head / VP / GM-Purchase', 'No'),
(695, 'APPROVED', 34, 'Head / VP / GM-Purchase / Material Mgmt', 'No'),
(696, 'APPROVED', 7, 'Head / VP / GM-QA / QC', 'No'),
(697, 'APPROVED', 40, 'Head / VP / GM-QA / QC', 'Yes'),
(698, 'APPROVED', 36, 'Head / VP / GM-Quality', 'No'),
(699, 'APPROVED', 36, 'Head / VP / GM-R&D', 'No'),
(700, 'APPROVED', 36, 'Head / VP / GM-Recruitment', 'No'),
(701, 'APPROVED', 21, 'Head / VP / GM-Recruitment', 'Yes'),
(702, 'APPROVED', 10, 'Head / VP / GM-Regulatory Affairs', 'No'),
(703, 'APPROVED', 14, 'Head / VP / GM-Regulatory Affairs', 'Yes'),
(704, 'APPROVED', 7, 'Head / VP / GM-Regulatory Affairs', 'Yes'),
(705, 'APPROVED', 40, 'Head / VP / GM-Regulatory Affairs', 'Yes'),
(706, 'APPROVED', 36, 'Head / VP / GM-Regulatory Affairs', 'Yes'),
(707, 'APPROVED', 36, 'Head / VP / GM-Relationships', 'No'),
(708, 'APPROVED', 11, 'Head / VP / GM-Relationships', 'Yes'),
(709, 'APPROVED', 36, 'Head / VP / GM-Sales', 'No'),
(710, 'APPROVED', 11, 'Head / VP / GM-Sales', 'Yes'),
(711, 'APPROVED', 34, 'Head / VP / GM-SCM / Logistics', 'No'),
(712, 'APPROVED', 36, 'Head / VP / GM-SCM / Logistics', 'Yes'),
(713, 'APPROVED', 39, 'Head / VP / GM-Sustainability', 'No'),
(714, 'APPROVED', 36, 'Head / VP / GM-Technology (IT) CTO', 'No'),
(715, 'APPROVED', 16, 'Head / VP / GM-Tour Management', 'No'),
(716, 'APPROVED', 36, 'Head / VP / GM-Tour Mgmt', 'Yes'),
(717, 'APPROVED', 36, 'Head / VP / GM-Training & Development', 'No'),
(718, 'APPROVED', 36, 'Head / VP / GM-Transitions', 'No'),
(719, 'APPROVED', 36, 'Head / VP / GM-Treasury', 'No'),
(720, 'APPROVED', 36, 'Head / VP / GM-Underwritting', 'No'),
(721, 'APPROVED', 11, 'Head / VP / GM-Underwritting', 'Yes'),
(722, 'APPROVED', 36, 'Head / VP / PR / Corp Communication', 'No'),
(723, 'APPROVED', 28, 'Head / VP / PR / Corp Communication', 'Yes'),
(724, 'APPROVED', 21, 'Head / VP/ GM-Training & Development', 'Yes'),
(725, 'APPROVED', 19, 'Head Lighting', 'No'),
(726, 'APPROVED', 19, 'Head Special Effects', 'No'),
(727, 'APPROVED', 5, 'Head Teacher / Head Mistress / Head Master', 'No'),
(728, 'APPROVED', 11, 'Head Underwriting - General', 'No'),
(729, 'APPROVED', 28, 'Health Club Asst', 'No'),
(730, 'APPROVED', 28, 'Health Club Manager', 'No'),
(731, 'APPROVED', 18, 'Health-Officer / Mgr', 'No'),
(732, 'APPROVED', 40, 'Health-Officer / Mgr', 'Yes'),
(733, 'APPROVED', 17, 'Hearing Aid Technician', 'No'),
(734, 'APPROVED', 11, 'Hedge Fund Analyst / Trader', 'No'),
(735, 'APPROVED', 16, 'Helicopter Pilots', 'No'),
(736, 'APPROVED', 17, 'Hepatologist', 'No'),
(737, 'APPROVED', 5, 'Hindi Teacher', 'No'),
(738, 'APPROVED', 5, 'History Teacher', 'No'),
(739, 'APPROVED', 5, 'HOD', 'No'),
(740, 'APPROVED', 5, 'Home Science Teacher', 'No'),
(741, 'APPROVED', 28, 'Hostess / Host', 'No'),
(742, 'APPROVED', 17, 'House Keeping', 'No'),
(743, 'APPROVED', 28, 'House Keeping - Head / Manager', 'No'),
(744, 'APPROVED', 28, 'House Keeping Executive', 'No'),
(745, 'APPROVED', 21, 'HR Business Partner', 'No'),
(746, 'APPROVED', 21, 'HR Executive / Recruiter', 'No'),
(747, 'APPROVED', 21, 'HR Manager', 'No'),
(748, 'APPROVED', 35, 'HSE Management Specialist', 'No'),
(749, 'APPROVED', 35, 'HSEQ', 'No'),
(750, 'APPROVED', 22, 'HVAC Engineering', 'No'),
(751, 'APPROVED', 35, 'HVAC Expert', 'No'),
(752, 'APPROVED', 22, 'HVAC Technician', 'No'),
(753, 'APPROVED', 16, 'In Flight Services / Operations', 'No'),
(754, 'APPROVED', 41, 'Independent Rep', 'No'),
(755, 'APPROVED', 7, 'Industrial Engineering', 'No'),
(756, 'APPROVED', 40, 'Industrial Engnr', 'Yes'),
(757, 'APPROVED', 21, 'Industrial Relations / Personnel Manager', 'No'),
(758, 'APPROVED', 3, 'Information Systems (MIS) - Manager', 'No'),
(759, 'APPROVED', 35, 'Inspection Engineer', 'No'),
(760, 'APPROVED', 25, 'Institutional Sales / BD Mgr', 'No'),
(761, 'APPROVED', 8, 'Instructional Designer', 'No'),
(762, 'APPROVED', 3, 'Instructional Designer', 'Yes'),
(763, 'APPROVED', 11, 'Insurance Advisor - General', 'No'),
(764, 'APPROVED', 11, 'Insurance Advisor - Life', 'No'),
(765, 'APPROVED', 30, 'Insurance Analyst', 'No'),
(766, 'APPROVED', 11, 'Insurance Analyst', 'Yes'),
(767, 'APPROVED', 11, 'Insurance Operations Manager', 'No'),
(768, 'APPROVED', 11, 'Insurance Operations Officer', 'No'),
(769, 'APPROVED', 20, 'Interaction Designer', 'No'),
(770, 'APPROVED', 23, 'Interior Designer', 'No'),
(771, 'APPROVED', 24, 'Interior Designer', 'Yes'),
(772, 'APPROVED', 10, 'Internal Auditor', 'No'),
(773, 'APPROVED', 15, 'International Business Dev Mgr', 'No'),
(774, 'APPROVED', 25, 'International Business Dev Mgr', 'Yes'),
(775, 'APPROVED', 13, 'International Marketing Manager', 'No'),
(776, 'APPROVED', 16, 'International Travel', 'No'),
(777, 'APPROVED', 32, 'Intnl Business Content Developer', 'No'),
(778, 'APPROVED', 32, 'Intnl Business Editor', 'No'),
(779, 'APPROVED', 26, 'Inventory Control Manager', 'No'),
(780, 'APPROVED', 34, 'Inventory Control Manager / Materials Manager', 'No'),
(781, 'APPROVED', 32, 'Investigative Journalist', 'No'),
(782, 'APPROVED', 11, 'Investment / Treasury Mgr', 'No'),
(783, 'APPROVED', 11, 'Investment Advisor', 'No'),
(784, 'APPROVED', 11, 'Investment Banking', 'No'),
(785, 'APPROVED', 10, 'Investor Relationship Exec / Mgr', 'No'),
(786, 'APPROVED', 11, 'Issues / IPO Mgr', 'No'),
(787, 'APPROVED', 3, 'IT / Networking (EDP) - Manager', 'No'),
(788, 'APPROVED', 32, 'IT / Technical Content Developer', 'No'),
(789, 'APPROVED', 32, 'IT / Technical Editor', 'No'),
(790, 'APPROVED', 3, 'IT Hardware Support ', 'No'),
(791, 'APPROVED', 5, 'IT Instructor', 'No'),
(792, 'APPROVED', 5, 'Italian Teacher', 'No'),
(793, 'APPROVED', 5, 'Japanese Teacher', 'No'),
(794, 'APPROVED', 6, 'Jewellery Designer', 'No'),
(795, 'APPROVED', 7, 'Jewelry Designer', 'Yes'),
(796, 'APPROVED', 5, 'Junior / Primary / Assistant Teacher', 'No'),
(797, 'APPROVED', 25, 'Key Account Manager', 'No'),
(798, 'APPROVED', 5, 'Kindergarten / Pre-primary Teacher', 'No'),
(799, 'APPROVED', 5, 'Lab Assistant', 'No'),
(800, 'APPROVED', 18, 'Lab Staff', 'No'),
(801, 'APPROVED', 17, 'Lab Technician', 'Yes'),
(802, 'APPROVED', 35, 'Lab Technician', 'Yes'),
(803, 'APPROVED', 7, 'Lab Technician / Medical Technician / Lab Staff', 'No'),
(804, 'APPROVED', 5, 'Laboratory Assistant', 'No'),
(805, 'APPROVED', 24, 'Land Development', 'No'),
(806, 'APPROVED', 23, 'Landscape Architect', 'No'),
(807, 'APPROVED', 5, 'Language Teacher', 'No'),
(808, 'APPROVED', 4, 'Laundry Man', 'No'),
(809, 'APPROVED', 28, 'Laundry Manager', 'No'),
(810, 'APPROVED', 14, 'Law Officer', 'No'),
(811, 'APPROVED', 14, 'Lawyer / Attorney', 'No'),
(812, 'APPROVED', 5, 'Lecturer / Professor', 'No'),
(813, 'APPROVED', 14, 'Legal Advisor', 'No'),
(814, 'APPROVED', 14, 'Legal Assistant / Apprentcie', 'No'),
(815, 'APPROVED', 14, 'Legal Consultant / Solicitor', 'No'),
(816, 'APPROVED', 14, 'Legal Editor', 'No'),
(817, 'APPROVED', 11, 'Legal Manager General', 'No'),
(818, 'APPROVED', 11, 'Legal Manager Life', 'No'),
(819, 'APPROVED', 11, 'Legal Officer - General', 'No'),
(820, 'APPROVED', 11, 'Legal Officer - Life', 'No'),
(821, 'APPROVED', 14, 'Legal Services - Manager', 'No'),
(822, 'APPROVED', 28, 'Leisure Staff / Manager', 'No'),
(823, 'APPROVED', 15, 'Liaison', 'No'),
(824, 'APPROVED', 15, 'Liason Officer / Mgr', 'No'),
(825, 'APPROVED', 5, 'Librarian', 'No'),
(826, 'APPROVED', 41, 'Life Insurance Agent', 'No'),
(827, 'APPROVED', 19, 'Lighting Technician', 'No'),
(828, 'APPROVED', 28, 'Lobby / Duty Manager', 'No'),
(829, 'APPROVED', 19, 'Locations Mgr', 'No'),
(830, 'APPROVED', 34, 'Logistics - Co-ordinator', 'No'),
(831, 'APPROVED', 34, 'Logistics - Head / Mgr', 'No'),
(832, 'APPROVED', 26, 'Loss Prevention Manager', 'No'),
(833, 'APPROVED', 26, 'Loyalty Program', 'No'),
(834, 'APPROVED', 11, 'M & A Advisor', 'No'),
(835, 'APPROVED', 7, 'Machine Operator', 'No'),
(836, 'APPROVED', 7, 'Maintenance', 'No'),
(837, 'APPROVED', 22, 'Maintenance Engineer', 'No'),
(838, 'APPROVED', 16, 'Maintenance Engineer', 'Yes'),
(839, 'APPROVED', 1, 'Maintenance Engnr', 'Yes'),
(840, 'APPROVED', 28, 'Maintenance Technician', 'No'),
(841, 'APPROVED', 22, 'Maintenance Technician', 'Yes'),
(842, 'APPROVED', 29, 'Make-Up Artist', 'No'),
(843, 'APPROVED', 24, 'Management Trainee', 'No'),
(844, 'APPROVED', 9, 'Manager - Data Processing', 'No'),
(845, 'APPROVED', 10, 'Manager - Financial Planning / Budgeting', 'No'),
(846, 'APPROVED', 13, 'Manager - Market Research / Consumer Insights / Industry Analysis', 'No'),
(847, 'APPROVED', 9, 'Manager - Migrations / Transitions', 'No'),
(848, 'APPROVED', 9, 'Manager - Service Delivery', 'No'),
(849, 'APPROVED', 13, 'Manager / Head - Internet Marketing', 'No'),
(850, 'APPROVED', 21, 'Manager / Sr Manager - Administration', 'No'),
(851, 'APPROVED', 21, 'Manager / Sr Manager - Facility Management', 'No'),
(852, 'APPROVED', 13, 'Manager Marketing - Internal / External Communication', 'No'),
(853, 'APPROVED', 32, 'Managing Editor', 'No'),
(854, 'APPROVED', 13, 'Marcom - Manager / Head', 'No'),
(855, 'APPROVED', 13, 'Marcom Executive', 'No'),
(856, 'APPROVED', 4, 'Marine Captain / Master Mariner', 'No'),
(857, 'APPROVED', 7, 'Marine Engineer', 'No'),
(858, 'APPROVED', 22, 'Marine Engineering', 'Yes'),
(859, 'APPROVED', 8, 'Market Research', 'No'),
(860, 'APPROVED', 13, 'Market Research - Executive', 'No'),
(861, 'APPROVED', 30, 'Marketing Analyst', 'No'),
(862, 'APPROVED', 13, 'Marketing Executive', 'No'),
(863, 'APPROVED', 13, 'Marketing Manager', 'No'),
(864, 'APPROVED', 28, 'Masseur', 'No'),
(865, 'APPROVED', 34, 'Material Mgmt Exec / Mgr', 'No'),
(866, 'APPROVED', 5, 'Mathematics Teacher', 'No'),
(867, 'APPROVED', 1, 'Mech Engnr-Other', 'No'),
(868, 'APPROVED', 1, 'Mech. Engnr-HVAC', 'No'),
(869, 'APPROVED', 1, 'Mech. Engnr-Plumbing / Fire Protection', 'No'),
(870, 'APPROVED', 1, 'Mech. Engnr-Telecom', 'No'),
(871, 'APPROVED', 22, 'Mechanical Engineer', 'No'),
(872, 'APPROVED', 7, 'Mechanical Engineer', 'Yes'),
(873, 'APPROVED', 35, 'Mechanical Engineering', 'Yes'),
(874, 'APPROVED', 22, 'Mechanical Technician', 'No'),
(875, 'APPROVED', 8, 'Media Buying', 'No'),
(876, 'APPROVED', 13, 'Media Buying Exec / Mgr', 'No'),
(877, 'APPROVED', 8, 'Media Planning', 'No'),
(878, 'APPROVED', 13, 'Media Planning Exec / Mgr', 'No'),
(879, 'APPROVED', 18, 'Medical Affairs Manager', 'No'),
(880, 'APPROVED', 17, 'Medical Coder', 'No'),
(881, 'APPROVED', 17, 'Medical Lab Supervisor', 'No'),
(882, 'APPROVED', 17, 'Medical Officer', 'No'),
(883, 'APPROVED', 25, 'Medical Representative', 'No'),
(884, 'APPROVED', 17, 'Medical Superintendent / Dean / Director', 'No'),
(885, 'APPROVED', 9, 'Medical Transcriptionist', 'No'),
(886, 'APPROVED', 22, 'MEP - Buyers', 'No'),
(887, 'APPROVED', 22, 'MEP - Surveyors', 'No'),
(888, 'APPROVED', 15, 'Merchandiser', 'No'),
(889, 'APPROVED', 6, 'Merchandiser', 'Yes'),
(890, 'APPROVED', 26, 'Merchandiser', 'Yes'),
(891, 'APPROVED', 25, 'Merchandiser', 'Yes'),
(892, 'APPROVED', 11, 'Merchant Acquisition Executive', 'No'),
(893, 'APPROVED', 11, 'Mergers & Acquisitions Analyst', 'No'),
(894, 'APPROVED', 11, 'Mergers & Acquisitions Mgr', 'No'),
(895, 'APPROVED', 7, 'Microbiologist', 'No'),
(896, 'APPROVED', 18, 'Microbiologist', 'Yes'),
(897, 'APPROVED', 17, 'Microbiologist', 'Yes'),
(898, 'APPROVED', 7, 'Mines Engineer', 'No'),
(899, 'APPROVED', 3, 'MIS Executive', 'No'),
(900, 'APPROVED', 16, 'Mktg Mgr', 'No'),
(901, 'APPROVED', 11, 'Mktg Mgr', 'Yes'),
(902, 'APPROVED', 18, 'Molecular Biologist', 'No'),
(903, 'APPROVED', 7, 'Molecular Biology', 'No'),
(904, 'APPROVED', 11, 'Money Markets Dealer', 'No'),
(905, 'APPROVED', 13, 'MR Exec / Mgr', 'No'),
(906, 'APPROVED', 13, 'MR Field Supervisor', 'No'),
(907, 'APPROVED', 5, 'Music / Dance Teacher', 'No'),
(908, 'APPROVED', 19, 'Music Director', 'No'),
(909, 'APPROVED', 4, 'Musician', 'Yes'),
(910, 'APPROVED', 8, 'Musician / Music Director', 'No'),
(911, 'APPROVED', 36, 'National Creative Director / VP Creative', 'No'),
(912, 'APPROVED', 20, 'National Creative Director / VP Creative', 'Yes'),
(913, 'APPROVED', 13, 'National Creative Director / VP-Creative', 'Yes'),
(914, 'APPROVED', 11, 'National Head', 'No'),
(915, 'APPROVED', 25, 'National Sales Manager', 'No'),
(916, 'APPROVED', 23, 'Naval Architect', 'No'),
(917, 'APPROVED', 17, 'Nephrologist', 'No'),
(918, 'APPROVED', 33, 'Network Administrator', 'No'),
(919, 'APPROVED', 3, 'Network Administrator', 'Yes'),
(920, 'APPROVED', 3, 'Network Designer', 'No'),
(921, 'APPROVED', 33, 'Network Installation & Administration', 'No'),
(922, 'APPROVED', 33, 'Network Planning - Chief Engineer', 'No'),
(923, 'APPROVED', 33, 'Network Planning - Engineer', 'No'),
(924, 'APPROVED', 17, 'Neurologist', 'No'),
(925, 'APPROVED', 19, 'News / Features Head', 'No'),
(926, 'APPROVED', 19, 'News Anchor / TV Presenter', 'No'),
(927, 'APPROVED', 19, 'News Compiler', 'No'),
(928, 'APPROVED', 19, 'News Editor', 'No'),
(929, 'APPROVED', 28, 'Night Manager', 'No'),
(930, 'APPROVED', 41, 'Non Life Insurance Agent', 'No'),
(931, 'APPROVED', 18, 'Nuclear Medicine', 'No'),
(932, 'APPROVED', 17, 'Nurse', 'No'),
(933, 'APPROVED', 5, 'Nursery Teacher', 'No'),
(934, 'APPROVED', 7, 'Nutritionist', 'No'),
(935, 'APPROVED', 18, 'Nutritionist', 'Yes'),
(936, 'APPROVED', 33, 'O & M Engineer', 'No'),
(937, 'APPROVED', 17, 'Occupational Therapist', 'No'),
(938, 'APPROVED', 16, 'Office Assistant', 'No'),
(939, 'APPROVED', 11, 'Offshore Debt Mgr', 'No'),
(940, 'APPROVED', 35, 'Oil Trader / Bunker Trader', 'No'),
(941, 'APPROVED', 17, 'Oncologist', 'No'),
(942, 'APPROVED', 17, 'Operation Theater Technician', 'No'),
(943, 'APPROVED', 16, 'Operations Exec', 'Yes'),
(944, 'APPROVED', 26, 'Operations Executive / Supervisor', 'No'),
(945, 'APPROVED', 9, 'Operations Manager', 'No'),
(946, 'APPROVED', 16, 'Operations Mgr', 'Yes'),
(947, 'APPROVED', 17, 'Opthalmologist', 'No'),
(948, 'APPROVED', 17, 'Optometrist', 'No'),
(949, 'APPROVED', 4, 'Ordinary Seaman (OS)', 'No'),
(950, 'APPROVED', 17, 'Orthopaedist', 'No'),
(951, 'APPROVED', 4, 'Other', 'No'),
(952, 'APPROVED', 42, 'Other', 'Yes'),
(953, 'APPROVED', 6, 'Other', 'Yes'),
(954, 'APPROVED', 1, 'Other', 'Yes'),
(955, 'APPROVED', 27, 'Other', 'Yes'),
(956, 'APPROVED', 40, 'Other', 'Yes'),
(957, 'APPROVED', 23, 'Other', 'Yes');
INSERT INTO `designations` (`id`, `status`, `functional_area`, `role_name`, `is_deleted`) VALUES
(958, 'APPROVED', 31, 'Other', 'Yes'),
(959, 'APPROVED', 39, 'Other', 'Yes'),
(960, 'APPROVED', 19, 'Other', 'Yes'),
(961, 'APPROVED', 20, 'Other', 'Yes'),
(962, 'APPROVED', 43, 'Other', 'Yes'),
(963, 'APPROVED', 37, 'Other', 'Yes'),
(964, 'APPROVED', 12, 'Other Admin / Clerical / Secretarial', 'No'),
(965, 'APPROVED', 30, 'Other Analytics / Business Intelligent', 'No'),
(966, 'APPROVED', 11, 'Other Banking', 'No'),
(967, 'APPROVED', 22, 'Other Construction', 'No'),
(968, 'APPROVED', 9, 'Other Customer Service / Call Center', 'No'),
(969, 'APPROVED', 15, 'Other Export / Import', 'No'),
(970, 'APPROVED', 10, 'Other Finance & Accounts', 'No'),
(971, 'APPROVED', 17, 'Other Health Care / Hospitals', 'No'),
(972, 'APPROVED', 28, 'Other Hotels / Restaurants', 'No'),
(973, 'APPROVED', 21, 'Other Human Resource', 'No'),
(974, 'APPROVED', 14, 'Other Legal / Law', 'No'),
(975, 'APPROVED', 13, 'Other Marketing', 'No'),
(976, 'APPROVED', 8, 'Other Media / Journalism', 'No'),
(977, 'APPROVED', 35, 'Other Oil & Gas', 'No'),
(978, 'APPROVED', 18, 'Other Pharma', 'No'),
(979, 'APPROVED', 7, 'Other Production / Engineering / R&D', 'No'),
(980, 'APPROVED', 34, 'Other Purchase / Supply Chain', 'No'),
(981, 'APPROVED', 24, 'Other Real Estate', 'No'),
(982, 'APPROVED', 26, 'Other Retail Chains / Shops', 'No'),
(983, 'APPROVED', 25, 'Other Sales', 'No'),
(984, 'APPROVED', 7, 'Other Scientist', 'No'),
(985, 'APPROVED', 3, 'Other Software / Hardware / EDP', 'No'),
(986, 'APPROVED', 33, 'Other Telecom / ISP', 'No'),
(987, 'APPROVED', 16, 'Other Travel / Airlines', 'No'),
(988, 'APPROVED', 14, 'Others', 'Yes'),
(989, 'APPROVED', 15, 'Others', 'Yes'),
(990, 'APPROVED', 10, 'Others', 'Yes'),
(991, 'APPROVED', 44, 'Others', 'Yes'),
(992, 'APPROVED', 18, 'Others', 'Yes'),
(993, 'APPROVED', 29, 'Others', 'Yes'),
(994, 'APPROVED', 33, 'Others', 'Yes'),
(995, 'APPROVED', 17, 'Others', 'Yes'),
(996, 'APPROVED', 12, 'Others', 'Yes'),
(997, 'APPROVED', 22, 'Others', 'Yes'),
(998, 'APPROVED', 32, 'Others', 'Yes'),
(999, 'APPROVED', 7, 'Others', 'Yes'),
(1000, 'APPROVED', 8, 'Others', 'Yes'),
(1001, 'APPROVED', 34, 'Others', 'Yes'),
(1002, 'APPROVED', 41, 'Others', 'Yes'),
(1003, 'APPROVED', 30, 'Others', 'Yes'),
(1004, 'APPROVED', 28, 'Others', 'Yes'),
(1005, 'APPROVED', 24, 'Others', 'Yes'),
(1006, 'APPROVED', 9, 'Others', 'Yes'),
(1007, 'APPROVED', 26, 'Others', 'Yes'),
(1008, 'APPROVED', 16, 'Others', 'Yes'),
(1009, 'APPROVED', 13, 'Others', 'Yes'),
(1010, 'APPROVED', 21, 'Others', 'Yes'),
(1011, 'APPROVED', 25, 'Others', 'Yes'),
(1012, 'APPROVED', 3, 'Others', 'Yes'),
(1013, 'APPROVED', 35, 'Others', 'Yes'),
(1014, 'APPROVED', 11, 'Others', 'Yes'),
(1015, 'APPROVED', 5, 'Others', 'Yes'),
(1016, 'APPROVED', 27, 'Others', 'Yes'),
(1017, 'APPROVED', 42, 'Outside Consultant', 'No'),
(1018, 'APPROVED', 40, 'Outside Consultant', 'Yes'),
(1019, 'APPROVED', 23, 'Outside Consultant', 'Yes'),
(1020, 'APPROVED', 31, 'Outside Consultant', 'Yes'),
(1021, 'APPROVED', 16, 'Outside Consultant', 'Yes'),
(1022, 'APPROVED', 37, 'Outside Consultant', 'Yes'),
(1023, 'APPROVED', 33, 'Outside Service Providers', 'No'),
(1024, 'APPROVED', 7, 'Packaging', 'No'),
(1025, 'APPROVED', 35, 'Packaging & Product Development', 'No'),
(1026, 'APPROVED', 42, 'Packaging Development Exec / Mgr', 'No'),
(1027, 'APPROVED', 7, 'Paint Shop', 'No'),
(1028, 'APPROVED', 28, 'Pastry Chef', 'No'),
(1029, 'APPROVED', 14, 'Patent', 'No'),
(1030, 'APPROVED', 17, 'Pathologist', 'No'),
(1031, 'APPROVED', 17, 'Patient Service Associate', 'No'),
(1032, 'APPROVED', 21, 'Payroll / Compensation - Head / Mgr', 'Yes'),
(1033, 'APPROVED', 10, 'Payroll / Compensation - Manager / Head', 'No'),
(1034, 'APPROVED', 10, 'Payroll / Compensation Executive', 'No'),
(1035, 'APPROVED', 21, 'Payroll / Compensation Executive', 'Yes'),
(1036, 'APPROVED', 17, 'Pediatrician', 'No'),
(1037, 'APPROVED', 21, 'Performance Management Manager', 'No'),
(1038, 'APPROVED', 17, 'Perfusionist', 'No'),
(1039, 'APPROVED', 35, 'Petrophysics / Geologist / Seismic Interpreta', 'No'),
(1040, 'APPROVED', 17, 'PFT Technician', 'No'),
(1041, 'APPROVED', 18, 'Pharmaceutical Research Scientist', 'No'),
(1042, 'APPROVED', 18, 'Pharmacist', 'Yes'),
(1043, 'APPROVED', 17, 'Pharmacist', 'Yes'),
(1044, 'APPROVED', 7, 'Pharmacist / Chemist / Bio Chemist', 'No'),
(1045, 'APPROVED', 11, 'Phone Banking Officer', 'No'),
(1046, 'APPROVED', 8, 'Photographer', 'No'),
(1047, 'APPROVED', 19, 'Photographer', 'Yes'),
(1048, 'APPROVED', 3, 'Php', 'No'),
(1049, 'APPROVED', 17, 'Physician', 'No'),
(1050, 'APPROVED', 5, 'Physics Teacher', 'No'),
(1051, 'APPROVED', 17, 'Physiotherapist', 'No'),
(1052, 'APPROVED', 16, 'Pilot', 'No'),
(1053, 'APPROVED', 35, 'Piping Engineering', 'No'),
(1054, 'APPROVED', 22, 'Planning Engineer', 'No'),
(1055, 'APPROVED', 7, 'Planning Engineer', 'Yes'),
(1056, 'APPROVED', 7, 'Plant Head / Factory Manager', 'No'),
(1057, 'APPROVED', 35, 'Plant Supervisor', 'No'),
(1058, 'APPROVED', 22, 'Plumbing Engineer', 'No'),
(1059, 'APPROVED', 34, 'POD Management', 'No'),
(1060, 'APPROVED', 27, 'Policeman', 'No'),
(1061, 'APPROVED', 32, 'Political Content Developer', 'No'),
(1062, 'APPROVED', 32, 'Political Editor', 'No'),
(1063, 'APPROVED', 11, 'Portfolio Manager', 'No'),
(1064, 'APPROVED', 25, 'Post Sales Consultant', 'No'),
(1065, 'APPROVED', 7, 'Postdoc Position / Fellowship', 'No'),
(1066, 'APPROVED', 18, 'Postdoc Position / Fellowship', 'Yes'),
(1067, 'APPROVED', 22, 'Power & Telecom Engineering', 'No'),
(1068, 'APPROVED', 13, 'PPC / Pay Per Click Lead', 'No'),
(1069, 'APPROVED', 13, 'PPC / Pay Per Click Specialist', 'No'),
(1070, 'APPROVED', 13, 'PR & Media Relations Mgr', 'No'),
(1071, 'APPROVED', 13, 'PR Exec', 'No'),
(1072, 'APPROVED', 7, 'Practical Training / Internship', 'No'),
(1073, 'APPROVED', 18, 'Practical Training / Internship', 'Yes'),
(1074, 'APPROVED', 25, 'Presales Consultant', 'No'),
(1075, 'APPROVED', 7, 'Press Shop', 'No'),
(1076, 'APPROVED', 32, 'Principal Coresspondent / Features Writer / Resident Writer', 'No'),
(1077, 'APPROVED', 5, 'Principal/ Head Of School', 'No'),
(1078, 'APPROVED', 8, 'Printing Technologist / Manager', 'No'),
(1079, 'APPROVED', 11, 'Private Banker', 'No'),
(1080, 'APPROVED', 11, 'Private Equity / Hedge Fund / VC Mgr', 'No'),
(1081, 'APPROVED', 14, 'Private Practitioner / Lawyer', 'No'),
(1082, 'APPROVED', 5, 'Private Tutor', 'No'),
(1083, 'APPROVED', 9, 'Process / Work Flow Analyst', 'No'),
(1084, 'APPROVED', 35, 'Process Engineering', 'Yes'),
(1085, 'APPROVED', 1, 'Process Engnr-Plant Design', 'No'),
(1086, 'APPROVED', 35, 'Process Maintenance Engineer', 'No'),
(1087, 'APPROVED', 7, 'Process Manager / Engineer', 'No'),
(1088, 'APPROVED', 22, 'Process Reporting Manager', 'No'),
(1089, 'APPROVED', 9, 'Process Trainer', 'No'),
(1090, 'APPROVED', 34, 'Procurement Specialist', 'No'),
(1091, 'APPROVED', 8, 'Producer / Production Manager', 'No'),
(1092, 'APPROVED', 13, 'Product / Brand Manager', 'No'),
(1093, 'APPROVED', 20, 'Product Designer', 'No'),
(1094, 'APPROVED', 7, 'Product Development Exec', 'No'),
(1095, 'APPROVED', 40, 'Product Development Exec', 'Yes'),
(1096, 'APPROVED', 7, 'Product Development Mgr', 'No'),
(1097, 'APPROVED', 40, 'Product Development Mgr', 'Yes'),
(1098, 'APPROVED', 13, 'Product Executive', 'No'),
(1099, 'APPROVED', 18, 'Product Manager', 'No'),
(1100, 'APPROVED', 7, 'Product Manager', 'Yes'),
(1101, 'APPROVED', 3, 'Product Manager', 'Yes'),
(1102, 'APPROVED', 11, 'Product Manager - Auto / Home / Personal Loan', 'No'),
(1103, 'APPROVED', 11, 'Product Manager - Cards', 'No'),
(1104, 'APPROVED', 11, 'Product Manager - General', 'No'),
(1105, 'APPROVED', 11, 'Product Manager - Insurance', 'No'),
(1106, 'APPROVED', 11, 'Product Manager - Life', 'No'),
(1107, 'APPROVED', 11, 'Product Manager - Mutual Funds', 'No'),
(1108, 'APPROVED', 13, 'Product Manager / Product Head', 'No'),
(1109, 'APPROVED', 11, 'Product Mgr Auto / Home Loans', 'No'),
(1110, 'APPROVED', 35, 'Production & Manufacturing Downstream', 'No'),
(1111, 'APPROVED', 15, 'Production Executive', 'No'),
(1112, 'APPROVED', 15, 'Production Manager', 'Yes'),
(1113, 'APPROVED', 18, 'Production Manager', 'Yes'),
(1114, 'APPROVED', 7, 'Production Manager / Engineer', 'No'),
(1115, 'APPROVED', 40, 'Production Mgr', 'Yes'),
(1116, 'APPROVED', 3, 'Program Manager', 'No'),
(1117, 'APPROVED', 3, 'Programming & Design', 'No'),
(1118, 'APPROVED', 23, 'Project Architect', 'No'),
(1119, 'APPROVED', 3, 'Project Co-ordinator', 'No'),
(1120, 'APPROVED', 22, 'Project Engineer', 'No'),
(1121, 'APPROVED', 35, 'Project Engineering', 'Yes'),
(1122, 'APPROVED', 11, 'Project Finance - Head / Mgr', 'No'),
(1123, 'APPROVED', 3, 'Project Leader / Project Manager', 'No'),
(1124, 'APPROVED', 33, 'Project Manager', 'No'),
(1125, 'APPROVED', 22, 'Project Manager', 'Yes'),
(1126, 'APPROVED', 1, 'Project Mgr-IT / Software', 'No'),
(1127, 'APPROVED', 1, 'Project Mgr-Production / Manufacturing / Maintenance', 'No'),
(1128, 'APPROVED', 40, 'Project Mgr-Production / Manufacturing / Maintenance', 'Yes'),
(1129, 'APPROVED', 1, 'Project Mgr-Telecom', 'No'),
(1130, 'APPROVED', 7, 'Projects', 'No'),
(1131, 'APPROVED', 8, 'Proof Reader', 'No'),
(1132, 'APPROVED', 32, 'Proof Reader', 'Yes'),
(1133, 'APPROVED', 14, 'Proof Reader (Law)', 'No'),
(1134, 'APPROVED', 24, 'Property Management', 'No'),
(1135, 'APPROVED', 35, 'Proposal & Estimation', 'No'),
(1136, 'APPROVED', 25, 'Proposal Response Manager', 'No'),
(1137, 'APPROVED', 22, 'Proposals & Estimation', 'Yes'),
(1138, 'APPROVED', 17, 'Psychiatrist', 'No'),
(1139, 'APPROVED', 17, 'Psycologist', 'Yes'),
(1140, 'APPROVED', 13, 'Public Relations - Executive', 'No'),
(1141, 'APPROVED', 13, 'Public Relations - Manager', 'No'),
(1142, 'APPROVED', 17, 'Pulmonologist', 'No'),
(1143, 'APPROVED', 4, 'Pumpman', 'No'),
(1144, 'APPROVED', 5, 'Punjabi Teacher', 'No'),
(1145, 'APPROVED', 34, 'Purchase - Head', 'No'),
(1146, 'APPROVED', 34, 'Purchase Manager', 'No'),
(1147, 'APPROVED', 15, 'Purchase Officer', 'Yes'),
(1148, 'APPROVED', 34, 'Purchase Officer / Co-ordinator / Executive', 'No'),
(1149, 'APPROVED', 4, 'Purser', 'No'),
(1150, 'APPROVED', 7, 'QA & QC Executive', 'Yes'),
(1151, 'APPROVED', 7, 'QA & QC Mgr', 'Yes'),
(1152, 'APPROVED', 35, 'QA / QC', 'No'),
(1153, 'APPROVED', 40, 'QA / QC Exec', 'Yes'),
(1154, 'APPROVED', 34, 'QA / QC Exec', 'Yes'),
(1155, 'APPROVED', 15, 'QA / QC Executive', 'No'),
(1156, 'APPROVED', 15, 'QA / QC Manager', 'No'),
(1157, 'APPROVED', 40, 'QA / QC Mgr', 'Yes'),
(1158, 'APPROVED', 34, 'QA / QC Mgr', 'Yes'),
(1159, 'APPROVED', 33, 'Quality Assurance - Manager', 'No'),
(1160, 'APPROVED', 18, 'Quality Assurance - Manager', 'Yes'),
(1161, 'APPROVED', 7, 'Quality Assurance - Manager', 'Yes'),
(1162, 'APPROVED', 9, 'Quality Assurance - Manager', 'Yes'),
(1163, 'APPROVED', 3, 'Quality Assurance - Manager', 'Yes'),
(1164, 'APPROVED', 18, 'Quality Assurance / Control', 'No'),
(1165, 'APPROVED', 7, 'Quality Assurance / Control', 'Yes'),
(1166, 'APPROVED', 28, 'Quality Assurance / Control', 'Yes'),
(1167, 'APPROVED', 26, 'Quality Assurance / Control', 'Yes'),
(1168, 'APPROVED', 33, 'Quality Assurance Executive', 'No'),
(1169, 'APPROVED', 9, 'Quality Assurance Executive', 'Yes'),
(1170, 'APPROVED', 3, 'Quality Assurance Executive', 'Yes'),
(1171, 'APPROVED', 22, 'Quantity Surveyor', 'No'),
(1172, 'APPROVED', 7, 'R & D Manager', 'No'),
(1173, 'APPROVED', 7, 'R&D Executive', 'No'),
(1174, 'APPROVED', 4, 'Radio Officer', 'No'),
(1175, 'APPROVED', 16, 'Radio Operator / Radio Engineer / Radar Operator', 'No'),
(1176, 'APPROVED', 17, 'Radiographer', 'No'),
(1177, 'APPROVED', 17, 'Radiologist', 'No'),
(1178, 'APPROVED', 11, 'Ratings Analyst', 'No'),
(1179, 'APPROVED', 41, 'Real Estate Agent', 'No'),
(1180, 'APPROVED', 24, 'Real Estate Appraising', 'No'),
(1181, 'APPROVED', 24, 'Real Estate Counseling', 'No'),
(1182, 'APPROVED', 24, 'Real Estate Research', 'No'),
(1183, 'APPROVED', 43, 'Receptionist', 'Yes'),
(1184, 'APPROVED', 12, 'Receptionist / Front Desk', 'No'),
(1185, 'APPROVED', 21, 'Recruitment - Head / Mgr', 'No'),
(1186, 'APPROVED', 4, 'Reefer Engineer', 'No'),
(1187, 'APPROVED', 35, 'Refinery Manager / Project Manager', 'No'),
(1188, 'APPROVED', 26, 'Regional Manager', 'No'),
(1189, 'APPROVED', 11, 'Regional Manager', 'Yes'),
(1190, 'APPROVED', 13, 'Regional Marketing Manager', 'No'),
(1191, 'APPROVED', 16, 'Regional Mgr', 'Yes'),
(1192, 'APPROVED', 25, 'Regional Mgr', 'Yes'),
(1193, 'APPROVED', 33, 'Regional Mgr / Manager (Operations)', 'No'),
(1194, 'APPROVED', 25, 'Regional Sales Manager', 'No'),
(1195, 'APPROVED', 14, 'Regulatory Affairs Mgr', 'No'),
(1196, 'APPROVED', 7, 'Regulatory Affairs Mgr', 'Yes'),
(1197, 'APPROVED', 18, 'Regulatory Executive', 'No'),
(1198, 'APPROVED', 11, 'Relationship Exec', 'No'),
(1199, 'APPROVED', 11, 'Relationship Manager', 'No'),
(1200, 'APPROVED', 25, 'Relationship Mgr / Account Servicing', 'No'),
(1201, 'APPROVED', 35, 'Reliability Engineer', 'No'),
(1202, 'APPROVED', 35, 'Research &Technology Development', 'No'),
(1203, 'APPROVED', 7, 'Research Assistant', 'No'),
(1204, 'APPROVED', 31, 'Research Associate', 'No'),
(1205, 'APPROVED', 7, 'Research Scientist', 'No'),
(1206, 'APPROVED', 16, 'Reservation And Ticketing', 'No'),
(1207, 'APPROVED', 28, 'Reservation Manager', 'No'),
(1208, 'APPROVED', 16, 'Reservations Exec', 'No'),
(1209, 'APPROVED', 16, 'Reservations Mgr', 'Yes'),
(1210, 'APPROVED', 35, 'Reservoir Engineering', 'No'),
(1211, 'APPROVED', 17, 'Resident Medical Officer', 'No'),
(1212, 'APPROVED', 28, 'Restaurant Manager', 'No'),
(1213, 'APPROVED', 13, 'Retail Marketing Manager', 'No'),
(1214, 'APPROVED', 26, 'Retail Store Manager', 'No'),
(1215, 'APPROVED', 25, 'Retail Store Mgr', 'Yes'),
(1216, 'APPROVED', 28, 'Revenue Manager', 'No'),
(1217, 'APPROVED', 33, 'RF Installation & Administration Engineer', 'No'),
(1218, 'APPROVED', 33, 'RF Planning - Chief Engineer', 'No'),
(1219, 'APPROVED', 33, 'RF Planning Engineer', 'No'),
(1220, 'APPROVED', 25, 'RFI / RFP Manager', 'No'),
(1221, 'APPROVED', 35, 'Rigger', 'No'),
(1222, 'APPROVED', 35, 'Risk Assessment Engineer', 'No'),
(1223, 'APPROVED', 28, 'Room Service Manager', 'No'),
(1224, 'APPROVED', 13, 'Rural Marketing Manager', 'No'),
(1225, 'APPROVED', 3, 'S W Installation / Maintenance Engg', 'No'),
(1226, 'APPROVED', 35, 'Safety Engineer', 'Yes'),
(1227, 'APPROVED', 22, 'Safety Officer', 'Yes'),
(1228, 'APPROVED', 7, 'Safety Officer / Engineer', 'No'),
(1229, 'APPROVED', 40, 'Safety Officer / Mgr', 'No'),
(1230, 'APPROVED', 25, 'Sales / BD Manager', 'No'),
(1231, 'APPROVED', 11, 'Sales / BD Mgr Broking', 'No'),
(1232, 'APPROVED', 11, 'Sales / BD Mgr-Debt Instruments', 'No'),
(1233, 'APPROVED', 11, 'Sales / BD Mgr-Derivatives', 'No'),
(1234, 'APPROVED', 11, 'Sales / BD Mgr-Forex', 'No'),
(1235, 'APPROVED', 11, 'Sales / BD-Mgr', 'Yes'),
(1236, 'APPROVED', 25, 'Sales /BD Mgr', 'Yes'),
(1237, 'APPROVED', 25, 'Sales Coordinator', 'No'),
(1238, 'APPROVED', 7, 'Sales Engineer', 'No'),
(1239, 'APPROVED', 25, 'Sales Engineer', 'Yes'),
(1240, 'APPROVED', 25, 'Sales Exec / Officer', 'Yes'),
(1241, 'APPROVED', 26, 'Sales Exec / Sales Representative', 'No'),
(1242, 'APPROVED', 25, 'Sales Exec / Sales Representative', 'Yes'),
(1243, 'APPROVED', 25, 'Sales Executive / Officer', 'No'),
(1244, 'APPROVED', 11, 'Sales Head', 'No'),
(1245, 'APPROVED', 11, 'Sales Officer', 'No'),
(1246, 'APPROVED', 25, 'Sales Promotion Manager', 'No'),
(1247, 'APPROVED', 25, 'Sales Trainee / Management Trainee', 'No'),
(1248, 'APPROVED', 25, 'Sales Trainer', 'No'),
(1249, 'APPROVED', 5, 'Sanskrit Teacher', 'No'),
(1250, 'APPROVED', 36, 'SBU / Profit Center Head', 'No'),
(1251, 'APPROVED', 16, 'SBU / Profit Center Head', 'Yes'),
(1252, 'APPROVED', 15, 'SBU Head / Profit Centre Head', 'Yes'),
(1253, 'APPROVED', 18, 'SBU Head / Profit Centre Head', 'Yes'),
(1254, 'APPROVED', 17, 'SBU Head / Profit Centre Head', 'Yes'),
(1255, 'APPROVED', 33, 'SBU Head / Profit Centre Head', 'Yes'),
(1256, 'APPROVED', 22, 'SBU Head / Profit Centre Head', 'Yes'),
(1257, 'APPROVED', 8, 'SBU Head / Profit Centre Head', 'Yes'),
(1258, 'APPROVED', 7, 'SBU Head / Profit Centre Head', 'Yes'),
(1259, 'APPROVED', 40, 'SBU Head / Profit Centre Head', 'Yes'),
(1260, 'APPROVED', 34, 'SBU Head / Profit Centre Head', 'Yes'),
(1261, 'APPROVED', 28, 'SBU Head / Profit Centre Head', 'Yes'),
(1262, 'APPROVED', 24, 'SBU Head / Profit Centre Head', 'Yes'),
(1263, 'APPROVED', 9, 'SBU Head / Profit Centre Head', 'Yes'),
(1264, 'APPROVED', 26, 'SBU Head / Profit Centre Head', 'Yes'),
(1265, 'APPROVED', 16, 'SBU Head / Profit Centre Head', 'Yes'),
(1266, 'APPROVED', 3, 'SBU Head / Profit Centre Head', 'Yes'),
(1267, 'APPROVED', 35, 'SBU Head / Profit Centre Head', 'Yes'),
(1268, 'APPROVED', 11, 'SBU Head / Profit Centre Head', 'Yes'),
(1269, 'APPROVED', 22, 'Scaffolding Sales Professionals', 'No'),
(1270, 'APPROVED', 5, 'School Coordinator', 'No'),
(1271, 'APPROVED', 5, 'School Nurse', 'No'),
(1272, 'APPROVED', 5, 'School Teacher', 'No'),
(1273, 'APPROVED', 5, 'Science Teacher', 'No'),
(1274, 'APPROVED', 42, 'Scientist', 'No'),
(1275, 'APPROVED', 4, 'Seaman', 'No'),
(1276, 'APPROVED', 13, 'Search Engine Marketing / SEM Specialist', 'No'),
(1277, 'APPROVED', 13, 'Search Engine Optimisation / SEO Analyst', 'No'),
(1278, 'APPROVED', 13, 'Search Engine Optimisation / SEO Lead', 'No'),
(1279, 'APPROVED', 13, 'Search Engine Optimisation / SEO Specialist', 'No'),
(1280, 'APPROVED', 12, 'Secretarial', 'No'),
(1281, 'APPROVED', 43, 'Secretary / PA', 'No'),
(1282, 'APPROVED', 11, 'Securities Analyst / Stock Broker', 'No'),
(1283, 'APPROVED', 3, 'Security Analyst', 'No'),
(1284, 'APPROVED', 27, 'Security Guard', 'No'),
(1285, 'APPROVED', 28, 'Security Manager / Officer', 'No'),
(1286, 'APPROVED', 27, 'Security Mgr', 'Yes'),
(1287, 'APPROVED', 27, 'Security Supervisor', 'No'),
(1288, 'APPROVED', 3, 'SEO Expert', 'No'),
(1289, 'APPROVED', 40, 'Service / Maintenance Engnr', 'No'),
(1290, 'APPROVED', 40, 'Service / Maintenance Supervisor', 'No'),
(1291, 'APPROVED', 36, 'Service Delivery Leader', 'No'),
(1292, 'APPROVED', 25, 'Service Engineer', 'Yes'),
(1293, 'APPROVED', 25, 'Service Manager', 'Yes'),
(1294, 'APPROVED', 7, 'Service Manager / Engineer', 'No'),
(1295, 'APPROVED', 10, 'Shares Services Executive', 'No'),
(1296, 'APPROVED', 28, 'Shift Engineer / Supervisor', 'No'),
(1297, 'APPROVED', 26, 'Shift Manager', 'No'),
(1298, 'APPROVED', 9, 'Shift Supervisor', 'No'),
(1299, 'APPROVED', 4, 'Ship Captain', 'No'),
(1300, 'APPROVED', 22, 'Site Engineer', 'No'),
(1301, 'APPROVED', 22, 'Site Enigneer', 'Yes'),
(1302, 'APPROVED', 29, 'Slimming Manager', 'No'),
(1303, 'APPROVED', 13, 'Social Media Executive', 'No'),
(1304, 'APPROVED', 13, 'Social Media Marketing Manager', 'No'),
(1305, 'APPROVED', 5, 'Social Sciences Teacher', 'No'),
(1306, 'APPROVED', 5, 'Social Studies Teacher', 'No'),
(1307, 'APPROVED', 5, 'Soft Skill Trainer', 'No'),
(1308, 'APPROVED', 9, 'Soft Skills Trainer', 'Yes'),
(1309, 'APPROVED', 3, 'Software Engineer / Programmer', 'No'),
(1310, 'APPROVED', 3, 'Software Test Engineer', 'No'),
(1311, 'APPROVED', 8, 'Sound Mixer / Engineer', 'No'),
(1312, 'APPROVED', 19, 'Sound Mixer / Engr', 'Yes'),
(1313, 'APPROVED', 13, 'Sourcing Manager', 'No'),
(1314, 'APPROVED', 28, 'Sous Chef', 'No'),
(1315, 'APPROVED', 4, 'Sous Chef', 'Yes'),
(1316, 'APPROVED', 29, 'Spa Therapist', 'No'),
(1317, 'APPROVED', 28, 'Spa Therapist', 'Yes'),
(1318, 'APPROVED', 5, 'Spanish Teacher', 'No'),
(1319, 'APPROVED', 7, 'Spares Manager / Engineer', 'No'),
(1320, 'APPROVED', 5, 'Special Education Teacher', 'No'),
(1321, 'APPROVED', 19, 'Special Effects Technician', 'No'),
(1322, 'APPROVED', 17, 'Specialist - Medicine', 'No'),
(1323, 'APPROVED', 17, 'Speech Language Pathologist / Therapist', 'No'),
(1324, 'APPROVED', 5, 'Sports / Physical Education Teacher', 'No'),
(1325, 'APPROVED', 32, 'Sports Content Developer', 'No'),
(1326, 'APPROVED', 32, 'Sports Editor', 'No'),
(1327, 'APPROVED', 19, 'Spot Boy', 'No'),
(1328, 'APPROVED', 19, 'Sr / Principal Coresspondent', 'No'),
(1329, 'APPROVED', 7, 'Sr Design Engineer', 'No'),
(1330, 'APPROVED', 31, 'Sr Outside Consultant', 'No'),
(1331, 'APPROVED', 3, 'Sr Software Developer', 'No'),
(1332, 'APPROVED', 32, 'Sr Sub Editor / Sr Reporter', 'No'),
(1333, 'APPROVED', 13, 'Sr Visualiser', 'No'),
(1334, 'APPROVED', 28, 'Staff Function', 'No'),
(1335, 'APPROVED', 21, 'Staffing Specialist / Manpower Planning', 'No'),
(1336, 'APPROVED', 43, 'Stenographer / Data Entry Operator', 'No'),
(1337, 'APPROVED', 4, 'Steward', 'No'),
(1338, 'APPROVED', 28, 'Steward / Waiter', 'No'),
(1339, 'APPROVED', 34, 'Store Keeper / Warehouse Assistant', 'No'),
(1340, 'APPROVED', 22, 'Structural Designing', 'No'),
(1341, 'APPROVED', 35, 'Structural Engineering', 'No'),
(1342, 'APPROVED', 1, 'Structural Engnr-Bridge', 'No'),
(1343, 'APPROVED', 1, 'Structural Engnr-Building', 'No'),
(1344, 'APPROVED', 1, 'Structural Engnr-Other', 'No'),
(1345, 'APPROVED', 8, 'Studio Operations Manager', 'No'),
(1346, 'APPROVED', 19, 'Stunt Coordinator', 'No'),
(1347, 'APPROVED', 32, 'Sub Editor / Reporter', 'No'),
(1348, 'APPROVED', 35, 'Subsea - Pipeline / Flow Assurance', 'No'),
(1349, 'APPROVED', 35, 'Subsea - Project', 'No'),
(1350, 'APPROVED', 35, 'Subsea Installation / System & Controls', 'No'),
(1351, 'APPROVED', 34, 'Supply Chain - Head', 'No'),
(1352, 'APPROVED', 35, 'SURF Engineers Subsea Umbilicals, Risers Flowlines', 'No'),
(1353, 'APPROVED', 17, 'Surgeon', 'No'),
(1354, 'APPROVED', 22, 'Surveyor', 'No'),
(1355, 'APPROVED', 35, 'Surveyor', 'Yes'),
(1356, 'APPROVED', 39, 'Sustainability Manager', 'No'),
(1357, 'APPROVED', 33, 'Switching - Chief Engineer', 'No'),
(1358, 'APPROVED', 33, 'Switching - Engineer', 'No'),
(1359, 'APPROVED', 33, 'System Administrator', 'No'),
(1360, 'APPROVED', 3, 'System Administrator', 'Yes'),
(1361, 'APPROVED', 3, 'System Analyst / Tech Architect', 'No'),
(1362, 'APPROVED', 33, 'System Engineer', 'No'),
(1363, 'APPROVED', 3, 'System Integrator', 'No'),
(1364, 'APPROVED', 33, 'System Security - Chief Engineer', 'No'),
(1365, 'APPROVED', 33, 'System Security - Engineer', 'No'),
(1366, 'APPROVED', 3, 'System Security / Engineer', 'Yes'),
(1367, 'APPROVED', 3, 'Systems Engineer', 'Yes'),
(1368, 'APPROVED', 5, 'Tamil Teacher', 'No'),
(1369, 'APPROVED', 35, 'Tank Design Engineering', 'No'),
(1370, 'APPROVED', 10, 'Taxation (Direct) Mgr', 'No'),
(1371, 'APPROVED', 10, 'Taxation (Indirect) Mgr', 'No'),
(1372, 'APPROVED', 10, 'Taxation - Manager', 'No'),
(1373, 'APPROVED', 5, 'Teacher', 'No'),
(1374, 'APPROVED', 5, 'Teacher / Private Tutor', 'No'),
(1375, 'APPROVED', 9, 'Team Leader', 'No'),
(1376, 'APPROVED', 25, 'Team Leader', 'Yes'),
(1377, 'APPROVED', 3, 'Team Leader / Technical Leader', 'No'),
(1378, 'APPROVED', 7, 'Tech / Engg - Manager', 'No'),
(1379, 'APPROVED', 7, 'Tech Lead / Project Lead', 'No'),
(1380, 'APPROVED', 26, 'Technical - Manager', 'Yes'),
(1381, 'APPROVED', 5, 'Technical / Process Trainer', 'No'),
(1382, 'APPROVED', 3, 'Technical Support Engineer', 'No'),
(1383, 'APPROVED', 9, 'Technical Support Executive (voice)', 'No'),
(1384, 'APPROVED', 31, 'Technical Support Representative (Non-voice)', 'No'),
(1385, 'APPROVED', 9, 'Technical Trainer', 'No'),
(1386, 'APPROVED', 7, 'Technical Writer', 'No'),
(1387, 'APPROVED', 8, 'Technical Writer', 'Yes'),
(1388, 'APPROVED', 3, 'Technical Writer', 'Yes'),
(1389, 'APPROVED', 7, 'Technician', 'No'),
(1390, 'APPROVED', 22, 'Technician', 'Yes'),
(1391, 'APPROVED', 11, 'Technology Manager', 'No'),
(1392, 'APPROVED', 18, 'Technology Transfer Engineer', 'No'),
(1393, 'APPROVED', 33, 'Telecom Engineer', 'No'),
(1394, 'APPROVED', 9, 'Telemarketing Executive', 'Yes'),
(1395, 'APPROVED', 13, 'Telesales / Telemarketing Executive', 'No'),
(1396, 'APPROVED', 9, 'Telesales Executive', 'Yes'),
(1397, 'APPROVED', 6, 'Textile Designer', 'No'),
(1398, 'APPROVED', 7, 'Textile Designer', 'Yes'),
(1399, 'APPROVED', 20, 'Textile Designer', 'Yes'),
(1400, 'APPROVED', 35, 'Thermal Inspector', 'No'),
(1401, 'APPROVED', 7, 'Tool Room', 'No'),
(1402, 'APPROVED', 16, 'Tour Mgmt Mgr / Sr Mgr', 'No'),
(1403, 'APPROVED', 16, 'Tour Mngmt Exec', 'No'),
(1404, 'APPROVED', 23, 'Town Planner', 'No'),
(1405, 'APPROVED', 18, 'Toxicologist', 'No'),
(1406, 'APPROVED', 11, 'Trade Finance / Cash Mgmt Services - Head / Mgr', 'No'),
(1407, 'APPROVED', 15, 'Trader', 'No'),
(1408, 'APPROVED', 15, 'Trading', 'Yes'),
(1409, 'APPROVED', 11, 'Trading Advisor', 'No'),
(1410, 'APPROVED', 34, 'Traffic Clerk', 'No'),
(1411, 'APPROVED', 3, 'Trainee', 'No'),
(1412, 'APPROVED', 14, 'Trainee', 'Yes'),
(1413, 'APPROVED', 1, 'Trainee', 'Yes'),
(1414, 'APPROVED', 42, 'Trainee', 'Yes'),
(1415, 'APPROVED', 6, 'Trainee', 'Yes'),
(1416, 'APPROVED', 27, 'Trainee', 'Yes'),
(1417, 'APPROVED', 40, 'Trainee', 'Yes'),
(1418, 'APPROVED', 32, 'Trainee', 'Yes'),
(1419, 'APPROVED', 23, 'Trainee', 'Yes'),
(1420, 'APPROVED', 5, 'Trainee', 'Yes'),
(1421, 'APPROVED', 19, 'Trainee', 'Yes'),
(1422, 'APPROVED', 20, 'Trainee', 'Yes'),
(1423, 'APPROVED', 43, 'Trainee', 'Yes'),
(1424, 'APPROVED', 15, 'Trainee', 'Yes'),
(1425, 'APPROVED', 17, 'Trainee / Intern', 'No'),
(1426, 'APPROVED', 28, 'Trainee / Management Trainee', 'No'),
(1427, 'APPROVED', 26, 'Trainee / Management Trainee', 'Yes'),
(1428, 'APPROVED', 9, 'Trainee / Management Trainee', 'Yes'),
(1429, 'APPROVED', 16, 'Trainee / Management Trainee', 'Yes'),
(1430, 'APPROVED', 13, 'Trainee / Management Trainee', 'Yes'),
(1431, 'APPROVED', 4, 'Trainee Cadet', 'No'),
(1432, 'APPROVED', 4, 'Trainee Engineer', 'No'),
(1433, 'APPROVED', 31, 'Trainees', 'No'),
(1434, 'APPROVED', 5, 'Trainer', 'No'),
(1435, 'APPROVED', 3, 'Trainer / Faculty', 'No'),
(1436, 'APPROVED', 21, 'Training & Development - Head / Mgr', 'No'),
(1437, 'APPROVED', 21, 'Training & Development Executive', 'No'),
(1438, 'APPROVED', 28, 'Training Manager', 'No'),
(1439, 'APPROVED', 9, 'Training Manager', 'Yes'),
(1440, 'APPROVED', 9, 'Transactions Processing Executive', 'No'),
(1441, 'APPROVED', 5, 'Transcriptionist', 'No'),
(1442, 'APPROVED', 34, 'Transit Centre (Rail) - Executive', 'No'),
(1443, 'APPROVED', 8, 'Translator', 'No'),
(1444, 'APPROVED', 5, 'Translator', 'Yes'),
(1445, 'APPROVED', 21, 'Transport Executive', 'No'),
(1446, 'APPROVED', 21, 'Transport Manager', 'No'),
(1447, 'APPROVED', 34, 'Transportation / Shipping Supervisor', 'No'),
(1448, 'APPROVED', 12, 'Travel / Immigration Coordinator', 'No'),
(1449, 'APPROVED', 41, 'Travel Agent', 'Yes'),
(1450, 'APPROVED', 28, 'Travel Agent / Tour Operator', 'No'),
(1451, 'APPROVED', 16, 'Travel Agent / Tour Operator', 'Yes'),
(1452, 'APPROVED', 21, 'Travel Desk / Coordinator', 'No'),
(1453, 'APPROVED', 28, 'Travel Desk Mgr', 'No'),
(1454, 'APPROVED', 10, 'Treasury Manager', 'No'),
(1455, 'APPROVED', 11, 'Treasury Marketing Fixed Income', 'No'),
(1456, 'APPROVED', 11, 'Treasury Operations Mgr', 'No'),
(1457, 'APPROVED', 8, 'TV Anchor', 'No'),
(1458, 'APPROVED', 19, 'TV Producer', 'No'),
(1459, 'APPROVED', 12, 'Typist', 'No'),
(1460, 'APPROVED', 11, 'Underwriter - General', 'No'),
(1461, 'APPROVED', 11, 'Underwriter - Life', 'No'),
(1462, 'APPROVED', 11, 'Underwriting', 'No'),
(1463, 'APPROVED', 11, 'Unit Manager', 'No'),
(1464, 'APPROVED', 5, 'Urdu Teacher', 'No'),
(1465, 'APPROVED', 20, 'User Experience Designer', 'No'),
(1466, 'APPROVED', 34, 'Vendor Development Manager', 'No'),
(1467, 'APPROVED', 5, 'Vice - Chancellor', 'No'),
(1468, 'APPROVED', 5, 'Vice Principal', 'No'),
(1469, 'APPROVED', 5, 'Visiting Faculty / Guest Faculty', 'No'),
(1470, 'APPROVED', 26, 'Visual Merchandiser', 'No'),
(1471, 'APPROVED', 20, 'Visual Merchandiser', 'Yes'),
(1472, 'APPROVED', 13, 'Visualiser', 'No'),
(1473, 'APPROVED', 19, 'Visualiser', 'Yes'),
(1474, 'APPROVED', 20, 'Visualiser', 'Yes'),
(1475, 'APPROVED', 8, 'VJ / RJ / DJ', 'No'),
(1476, 'APPROVED', 9, 'Voice & Accent Trainer', 'No'),
(1477, 'APPROVED', 5, 'Voice & Accent Trainer', 'Yes'),
(1478, 'APPROVED', 8, 'VP - Media Planning & Buying', 'No'),
(1479, 'APPROVED', 15, 'VP - Operations / COO', 'No'),
(1480, 'APPROVED', 17, 'VP - Operations / COO', 'Yes'),
(1481, 'APPROVED', 22, 'VP - Operations / COO', 'Yes'),
(1482, 'APPROVED', 9, 'VP - Operations / COO', 'Yes'),
(1483, 'APPROVED', 16, 'VP - Operations / COO', 'Yes'),
(1484, 'APPROVED', 3, 'VP - Operations / COO', 'Yes'),
(1485, 'APPROVED', 35, 'VP - Operations / COO', 'Yes'),
(1486, 'APPROVED', 12, 'VP / GM - Administration', 'No'),
(1487, 'APPROVED', 22, 'VP / GM - Architecture', 'No'),
(1488, 'APPROVED', 22, 'VP / GM - Constructions', 'No'),
(1489, 'APPROVED', 35, 'VP / GM - Constructions', 'Yes'),
(1490, 'APPROVED', 7, 'VP / GM - Design (Production & Engg)', 'No'),
(1491, 'APPROVED', 7, 'VP / GM - Engg / Production', 'No'),
(1492, 'APPROVED', 35, 'VP / GM - Manufacturing Plant', 'No'),
(1493, 'APPROVED', 22, 'VP / GM - Projects', 'No'),
(1494, 'APPROVED', 35, 'VP / GM - Projects', 'Yes'),
(1495, 'APPROVED', 33, 'VP / GM - Quality', 'Yes'),
(1496, 'APPROVED', 18, 'VP / GM - Quality', 'No'),
(1497, 'APPROVED', 7, 'VP / GM - Quality', 'Yes'),
(1498, 'APPROVED', 28, 'VP / GM - Quality', 'Yes'),
(1499, 'APPROVED', 26, 'VP / GM - Quality', 'Yes'),
(1500, 'APPROVED', 9, 'VP / GM - Quality', 'Yes'),
(1501, 'APPROVED', 7, 'VP / GM - R & D (Production & Engg)', 'No'),
(1502, 'APPROVED', 13, 'VP / GM / Head - Marketing', 'No'),
(1503, 'APPROVED', 3, 'VP / GM Quality', 'No'),
(1504, 'APPROVED', 18, 'VP / GM R&D (Pharma)', 'No'),
(1505, 'APPROVED', 15, 'VP / GM-Quality', 'No'),
(1506, 'APPROVED', 9, 'VP / Head - Customer Service', 'No'),
(1507, 'APPROVED', 3, 'VP / Head - Technology (IT)', 'No'),
(1508, 'APPROVED', 33, 'VP / Head - Technology (Telecom / ISP)', 'No'),
(1509, 'APPROVED', 36, 'VP / President / Partner', 'No'),
(1510, 'APPROVED', 31, 'VP / President / Partner', 'Yes'),
(1511, 'APPROVED', 37, 'VP / President / Partner', 'Yes'),
(1512, 'APPROVED', 8, 'VP Client Servicing', 'No'),
(1513, 'APPROVED', 10, 'VP Finance / CFO', 'No'),
(1514, 'APPROVED', 33, 'VP Operations / COO', 'Yes'),
(1515, 'APPROVED', 18, 'VP Operations / COO', 'Yes'),
(1516, 'APPROVED', 7, 'VP Operations / COO', 'Yes'),
(1517, 'APPROVED', 8, 'VP Operations / COO', 'Yes'),
(1518, 'APPROVED', 34, 'VP Operations / COO', 'Yes'),
(1519, 'APPROVED', 30, 'VP Operations / COO', 'Yes'),
(1520, 'APPROVED', 28, 'VP Operations / COO', 'Yes'),
(1521, 'APPROVED', 24, 'VP Operations / COO', 'Yes'),
(1522, 'APPROVED', 26, 'VP Operations / COO', 'Yes'),
(1523, 'APPROVED', 11, 'VP Operations / COO', 'Yes'),
(1524, 'APPROVED', 5, 'Warden', 'No'),
(1525, 'APPROVED', 19, 'Wardrobe / Make Up / Hair Artist', 'No'),
(1526, 'APPROVED', 34, 'Warehouse Mgr', 'No'),
(1527, 'APPROVED', 22, 'Water Treatment', 'No'),
(1528, 'APPROVED', 11, 'Wealth Manager', 'No'),
(1529, 'APPROVED', 30, 'Web Analyst', 'No'),
(1530, 'APPROVED', 20, 'Web Designer', 'No'),
(1531, 'APPROVED', 3, 'Web Master / Web Site Manager', 'No'),
(1532, 'APPROVED', 7, 'Weld Shop', 'No'),
(1533, 'APPROVED', 35, 'Well Engineering', 'No'),
(1534, 'APPROVED', 4, 'Wiper', 'No'),
(1535, 'APPROVED', 40, 'Workman / Foreman / Technician', 'No'),
(1536, 'APPROVED', 7, 'Workshop Manager', 'No'),
(1537, 'APPROVED', 5, 'Yoga Teacher', 'No'),
(1538, 'APPROVED', 29, 'Yoga Trainer', 'No'),
(1539, 'APPROVED', 13, 'Zonal Marketing Manager', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') NOT NULL DEFAULT 'UNAPPROVED',
  `template_name` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_content` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '	[0 = common, 1= emp, 2 = js]',
  `added_by` int(11) NOT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `status`, `template_name`, `email_subject`, `email_content`, `type`, `added_by`, `is_deleted`) VALUES
(1, 'APPROVED', 'Job Seeker Registration', 'Hello #Name#, Your are Successfully Registered!!!', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Dear #Name#,&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Thank you for being a registered member with Angel-jobs.mt....&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;You are now ready to search and contact millions of validated jobs.It is our prime emphasis to help you find a suitable job. You will be assigned with personalized username and password . Please find the login details below&amp;amp; confirm your email-id by clicking the following link&lt;br /&gt;\r\n&lt;br /&gt;\r\nEmail-ID : #Email#&lt;br /&gt;\r\nConfirmation Link : &lt;a href=&quot;#Link#&quot;&gt; Click here to Verify Email id &lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Regards ,&lt;br /&gt;\r\nAngel-jobs.mt&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 2, 0, 'Yes'),
(2, 'APPROVED', 'Contact us admin', 'Someone has tried to contact you on your website from contact us page', '<p>Dear admin,</p>\r\n\r\n<p>This mail is to inform you that someone has tried to contact you from your website webname.</p>\r\n\r\n<p>Following are the details that has been provided by him/her.</p>\r\n\r\n<p><strong>Name : name_provided<br>\r\nEmail  : email_provided<br>\r\nMessage : message_provided</strong><br>\r\n<strong>Contact Mobile : mobile_no_provided</strong></p>', 0, 0, 'Yes'),
(5, 'APPROVED', 'Forgot password', 'Forgot password', '&lt;p&gt;Dear Member,&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;This is a notification that you have recently reset your password.&lt;/p&gt;\r\n\r\n&lt;p&gt;Your new password is :&amp;nbsp;xxxxxddd&lt;/p&gt;\r\n\r\n&lt;p&gt;Thank you for choosing us to reach you better.&lt;/p&gt;\r\n\r\n&lt;p&gt;Regards,&lt;br /&gt;\r\nwebsitename.&lt;/p&gt;', 2, 0, 'Yes'),
(6, 'APPROVED', 'Employer Registration', 'New Employer  Registration', '&lt;p&gt;Dear #Name#,&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Thank you for registering as an employer at Angel-jobs.mt&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;You are now ready to search and contact millions of job seekers and post various types jobs for them.It is our prime emphasis to help you find a suitable candidate. From now on your email id will be your username and password which you provided at the time of registration . Please verify your account by clicking the below given link and enjoy our sevices&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Dear, #Name#&lt;br /&gt;\r\nEmail-ID : #Email#&lt;br /&gt;\r\nConfirmation Link : &lt;a href=&quot;#Link#&quot;&gt; Click here to Verify your Email. &lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Regards ,&lt;br /&gt;\r\nAngel-jobs.mt&lt;/p&gt;', 2, 0, 'No'),
(7, 'APPROVED', 'password reset successfull', 'Hello, Password reset for your account as Jobseeker on Angel-jobs.mt was successfull', '<h4>Dear Jobseeker,</h4>\n\n<p><strong>This is the mail regarding the password change for your account as an Jobseeker at Angel-jobs.mt.Please note that your the password of your account is changed which will be effective from now onwards.</strong></p>\n\n\nClick on Reset Your Password Link : <a href=\"#Link#\"> Reset Now </a></strong></p>\n<p>Regards ,<br>\nAngel-jobs.mt</p>', 0, 0, 'Yes'),
(8, 'APPROVED', 'Employer password reset', 'Hello, Password reset for your account as Employer on Angel-jobs.mt', '<h6>Dear Employer,</h6>\n\n<p><strong>This is the mail regarding the password change for your account as an Employer at Angel-jobs.mt.</strong></p>\n\n\nClick on Reset Your Password Link : <a href=\"#Link#\"> Reset Now </a></strong></p>\n<p>Regards ,<br>\n    Angel-jobs.mt</p>', 0, 0, 'No'),
(9, 'APPROVED', 'profile edited', 'Hello #Name#, #Cat# section changed successfully.', '<h4>Dear #Name#,</h4>\n\n<p><strong>This is the mail regarding the profile details change for your account as an #Cat# at Angel-portal.mt.Please note that your profile has been changed and if you think it was not you, then login to your account and change the password.</strong></p>\n\n<p>Regards ,<br>\nAngel-portal.mt</p>', 0, 0, 'No'),
(13, 'APPROVED', 'Send message to employer', 'Job seeker sent message', '<h6>Dear Employer,</h6>\r\n\r\n<p><strong>This  mail is  regarding the job seeker  send a message on websitename.For more details check your account.</strong></p>\r\n\r\n<p><strong>Job seeker name : sender_name</strong></p>\r\n\r\n<p>Regards ,<br>\r\nwebsitename</p>', 0, 0, 'No'),
(14, 'APPROVED', 'Apply for job', 'New application receive for job', '<h6>Dear Employer,</h6>\r\n\r\n<p><strong>This mail is  regarding the </strong>new application is  receive for job <strong>on websitename.For details check your account.</strong></p>\r\n\r\n<p>Applicant name : sender_name</p>\r\n\r\n<p>Regards ,<br>\r\nwebsitename</p>', 0, 0, 'No'),
(15, 'APPROVED', 'Send message to jobseeker', 'Employer sent message', '&lt;p&gt;Dear jobseeker,&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;This is mail is regarding the employer send a message on websitename.For more details check your account.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Employer name : sender_name&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Regards ,&lt;br /&gt;\r\nwebsitename&lt;/p&gt;', 1, 0, 'No'),
(16, 'APPROVED', 'Jobseeker password reset', 'Password reset for your account as jobseeker on webfriendlyname', '<p>Dear Job seeker,</p>\r\n\r\n<p><strong>This is the mail regarding the password change request for your account as an jobseeker at websitename.Please ignore this email if the password change request was not made by you.</strong></p>\r\n\r\n<p><strong>Dear, yourname<br>\r\nPlease click the below link and set the new password for your account as an job seeker at websitename.<br>\r\nPassword reset Link : <a href=\"site domain name/cpass/email_id\">site domain name/cpass/email_id</a></strong></p>\r\n\r\n<p>Regards ,<br>\r\nwebsitename</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>', 0, 0, 'No'),
(17, 'APPROVED', 'password reset successfull', 'Hello #Name#, Password reset for your account as #Cat# on Angel-Jobs.mt was successfull', '<p>Dear #Name#,</p>\n\n<p><strong>This is the mail regarding the password change for your account as an #Cat# at Angel-jobs.mt .Please note that your the password of your account is changed which will be effective from now onwards.</strong></p>\n\n<p>Regards ,<br>\nAngel-jobs.mt</p>\n\n<p> </p>', 0, 0, 'No'),
(18, 'APPROVED', 'http://192.168.1.111/job_portal/login/forgot-password', 'View of forgot password for job seeker', '', 0, 0, 'Yes'),
(19, 'APPROVED', 'posted_job', 'Hello #Name#, Your Recent Posted Job ', '<h4>Dear #Name#,</h4>\n\n<p><strong>This is the mail regarding your recent job posted on our Angel-jobs.mt.Please Find below link to access your recent posted job</strong></p>\n<p>Job Url : <a href=\"#Link#\">Click to See Posted Job</a></p> \n\n\n<h4>Thanks & Regards</h4>\n<h5>Angel-jobs.mt</h5>', 0, 0, 'No'),
(23, 'APPROVED', 'change_job_status', 'Hello #Name#, Your Recent Posted Job statuts has been Changed', '<h4>Dear #Name#,</h4>\n\n<p><strong>This is the mail regarding your recent job posted on our Angel-jobs.mt Status has been Change Now its #Cat#.Please Find below link to access your recent posted job</strong></p>\n\n\n\n<h4>Thanks & Regards</h4>\n<h5>Angel-jobs.mt</h5>', 0, 0, 'No'),
(24, 'APPROVED', 'tests', 'tests', '&lt;p&gt;tetsts&lt;/p&gt;', 1, 1, 'No'),
(25, 'APPROVED', 'test', 'test', '&lt;p&gt;tesergergergdgdfgv&amp;nbsp; erhberhbreh&lt;/p&gt;\r\n\r\n&lt;p&gt;rtujrfjtk&lt;/p&gt;\r\n\r\n&lt;p&gt;fjhfrtjt&lt;/p&gt;', 1, 1, 'No'),
(26, 'APPROVED', 'ffddfd', 'fdfd', '&lt;p&gt;fdfddf&lt;/p&gt;', 1, 1, 'No'),
(27, 'APPROVED', 'tset', 'test', '&lt;p&gt;tstse&lt;/p&gt;', 1, 1, 'Yes'),
(28, 'APPROVED', 'common1', 'common11', '&lt;p&gt;common&lt;/p&gt;', 1, 1, 'No'),
(29, 'APPROVED', 'try1', 'try1', '&lt;p&gt;Dear #Name#,&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Thank you for registering as an employer at Angel-jobs.mt&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;You are now ready to search and contact millions of job seekers and post various types jobs for them.It is our prime emphasis to help you find a suitable candidate. From now on your email id will be your username and password which you provided at the time of registration . Please verify your account by clicking the below given link and enjoy our sevices&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Dear, #Name#&lt;br /&gt;\r\nEmail-ID : #Email#&lt;br /&gt;\r\nConfirmation Link :&amp;nbsp;&lt;a href=&quot;http://192.168.1.8:8000/admin/email-view#Link#&quot;&gt;Click here to Verify your Email.&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Regards ,&lt;br /&gt;\r\nAngel-jobs.mt&lt;/p&gt;', 1, 1, 'Yes'),
(30, 'APPROVED', 'test', 'tests', '&lt;p&gt;testtstsfdfff&lt;/p&gt;', 2, 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(225) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mob_code` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `company_name` longtext NOT NULL,
  `company_type` varchar(100) DEFAULT NULL COMMENT '[ join with Company type table   ] ',
  `company_size` varchar(100) DEFAULT NULL COMMENT '[ join with Company size table   ] ',
  `license_no` varchar(100) DEFAULT NULL,
  `industry` int(11) DEFAULT NULL COMMENT '[ join with industry table ] ',
  `address` longtext DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 32,
  `city` int(11) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `left_credit_job_posting_plan` int(11) NOT NULL DEFAULT 0,
  `free_assign_job_posting` int(11) NOT NULL DEFAULT 0,
  `assign_by` int(11) DEFAULT NULL COMMENT '[Admin pid]',
  `plan_start_from` date DEFAULT NULL,
  `plan_expired_on` date DEFAULT NULL,
  `last_payment_recieved_id` int(11) DEFAULT NULL,
  `last_payment_recieved` varchar(100) DEFAULT NULL,
  `last_payment_recieved_on` date DEFAULT NULL,
  `website` longtext DEFAULT NULL,
  `facebook` longtext DEFAULT NULL,
  `instagram` longtext DEFAULT NULL,
  `linkedin` longtext DEFAULT NULL,
  `profile_img` longtext DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `password` varchar(100) NOT NULL,
  `reset_token` longtext DEFAULT NULL COMMENT '	[ When Apply show token, When Reset Done Show Time Stamp]',
  `created_at` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `fullname`, `email`, `email_verified`, `mob_code`, `mobile`, `company_name`, `company_type`, `company_size`, `license_no`, `industry`, `address`, `country`, `city`, `zip`, `plan_id`, `left_credit_job_posting_plan`, `free_assign_job_posting`, `assign_by`, `plan_start_from`, `plan_expired_on`, `last_payment_recieved_id`, `last_payment_recieved`, `last_payment_recieved_on`, `website`, `facebook`, `instagram`, `linkedin`, `profile_img`, `is_deleted`, `password`, `reset_token`, `created_at`, `updated_at`) VALUES
(18, 'Altaf', 'test@gmail.co', 'No', '+356', '25866666', 'Gulf', '1', '3', 'fdfd', 0, 'fdffd', 232, 0, '400095', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'http://192.168.1.21:8000/admin/employer-edit-view/MTg%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MTg%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MTg%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MTg%3D', '18_1709889762.png', 'Yes', '$2y$10$OudZrlPEl.Y8QkxIWbz68uWTHasLThH2RLdiGD7kJ1KGXFtb8p.cy', NULL, '2024-01-10 09:06:25', '2024-03-08 09:22:42'),
(19, 'Chetan', 'chetan@angel-portal.com1', 'No', '+356', '7666599791', 'Angel-Portal', '0', '0', 'dfddfdff', 0, '', 232, 0, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '19_1709892550.png', 'Yes', '$2y$10$ymXHy2irrrqAbKG7Cab8Degiu1qXyVxA3ihRwuHgWixEwHKMzDrcu', NULL, '2024-01-22 12:11:23', '2024-03-08 10:09:10'),
(20, 'Chetan', 'chetan.arote2910@gmail.com', 'Yes', '+356', '9370174308', 'Angel-jobs', '0', '0', 'dfdfdf', 0, '', 232, 334, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '20_1709892447.png', 'Yes', '$2y$10$RtUIHXl0hL3XWVaWO5B9iemx8ULCW.jrknpC9XqZ8dBz.GMJ/cUc6', NULL, '2024-01-23 06:18:58', '2024-03-08 10:07:27'),
(21, 'Chetan', 'chetan1@yopmail.com', 'No', '+91', 'abcd', 'Angel-jobs', '16', '3', '963258753415', 150, 'Birkirkara, malta', 232, 341, 'BKR 1010', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'http://192.168.1.21:8000/admin/employer-edit-view/MjE%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjE%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjE%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjE%3D', '21_1707822376.jpg', 'Yes', '$2y$10$qn4KM3MMaNWS6e.xLRHHKevmCgQ6K2wZwlHAEahmklnt.iQsIXKLC', NULL, '2024-01-23 06:31:57', '2024-03-08 05:32:55'),
(22, 'com', 'com@yopmail.com', 'Yes', '+356', '742114512145', 'ca2', 'Partnership', '0-50 Employee', '', 0, 'malta', 232, 0, 'bjy125', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '22_1707728258.jpg', 'Yes', '$2y$10$VbBe9spTuxHn46mCVos4.ekqJmWjh4Gp4JNrzY8PFx/NGXqvmU3Ay', NULL, '2024-01-23 07:21:01', '2024-02-14 12:44:15'),
(23, 'Aftab', 'test1@gmail.com', 'No', '+356', '9865996666', 'Angel Malta', '0', '0', 'ffdfdfdd', 0, '', 232, 0, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'http://192.168.1.21:8000/admin/employer-edit-view/MjM%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjM%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjM%3D', 'http://192.168.1.21:8000/admin/employer-edit-view/MjM%3D', '23_1709889901.png', 'Yes', '$2y$10$tVUFf2WDge21FRODRHW2fuWQWJGG4FlEg5V6xMnWVdR3VqdnaRN7q', NULL, '2024-01-31 08:19:02', '2024-03-08 09:25:01'),
(24, 'Chetan', 'chetan@gmail.com', 'No', '+356', '98566666', 'Chetan Bhai Pvt Ltd', '0', '0', 'dfdf', 0, 'ADDRESS', 232, 0, 'DFDD5522', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', '24_1709892732.png', 'Yes', '$2y$10$SHJLv7rfPK89XBONAnrrruVCfrmCbSu5u8wn8X1I09K7tFqK5BBy2', NULL, '2024-01-31 08:42:13', '2024-03-08 10:12:12'),
(25, 'AFtab', 'email@gmail.com', 'No', '+356', '9666666', 'Abv', '0', '0', 'ffddfd', 0, '', 232, 0, '', 1, 2, 5, NULL, '2024-02-05', '2024-05-05', NULL, NULL, NULL, '', '', '', '', '25_1709892721.png', 'Yes', '$2y$10$uVPAi84bmO5POL183n5neOek0Rp9lYDSYCeJgRIX/HjotoX67jVUW', NULL, '2024-02-05 08:34:54', '2024-03-08 10:12:01'),
(26, 'Test', 'xyz@yopmail.com', 'No', '+356', '125896', 'xyz', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-05', '2024-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$u//53nIilrkdb2zeyR.taObZWkW4wtgdRdVglyQZQnaUg3xJGDvtK', NULL, '2024-02-05 12:34:00', '2024-02-05 12:34:00'),
(27, 'Chetan', 'feb@yopmail.com', 'No', '+356', '751245', 'Angel11', '1', '4', '452364', 151, 'Zabbar', 232, 336, 'ZAB 1010', 1, 0, 2, NULL, '2024-02-06', '2024-05-06', NULL, NULL, NULL, 'feb', 'feb', 'feb', 'feb', '27_1707199008.jpg', 'Yes', '$2y$10$N0Q7prbmNY19yCk7tTSD4OQOFSLlyCbuaUn3pm57MrclRISXuPuVu', NULL, '2024-02-06 04:46:37', '2024-02-08 11:40:53'),
(28, 'Chetan', 'test1@yopmail.com', 'No', '+356', '789654859', 'Eclipse1', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-06', '2024-05-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$UktnZFDym98PlVWNQ3bfreQNJFoSNgXxJZwrHLCk378c7uj2VO21q', NULL, '2024-02-06 08:34:19', '2024-02-06 08:34:19'),
(29, 'plan1', 'plan@yopmail.com', 'No', '+356', '753159', 'Plan', '', '', '456852', 0, '', 232, 0, '', 1, 0, 0, NULL, '2024-02-06', '2024-05-06', NULL, NULL, NULL, '', '', '', '', '29_1707215199.jpg', 'Yes', '$2y$10$EntLf5UOCypfjZvUxXSvj.BweYOf7V2ZUwYwbbmfqNXbrNNn.pbDm', NULL, '2024-02-06 09:59:56', '2024-02-06 10:52:18'),
(30, 'ffdfd', 'test@gd.com', 'No', '+356', '000000000', 'testse', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-08', '2024-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$/v2Pl7/3Fxx3qyGNYyUevusJ5PZP.3ySFfpxqeBS.CUfn57kR0qeq', NULL, '2024-02-08 11:21:10', '2024-02-08 11:21:10'),
(31, 'PQR1', 'pqr@yopmail.com', 'Yes', '+356', '74589156', 'pqr', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 0, NULL, '2024-02-08', '2024-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31_1707824147.jpg', 'Yes', '$2y$10$h2CwH9FRxnBOD5.hmYMR/.ENtTMfGoqC1vh6uwXYpQlAXLGHJl4om', NULL, '2024-02-08 12:08:57', '2024-02-23 13:41:58'),
(32, 'mob1', 'mob@yopmail.com', 'Yes', '+356', '75315985', 'Emp mob', '3', '2', 'BAR12345', 126, 'Mumbai', 232, 338, '125584', 1, 0, 0, NULL, '2024-02-09', '2024-05-09', NULL, NULL, NULL, 'asd', 'asd', 'asd', 'asd1', '32_1707463389.jpg', 'Yes', '$2y$10$ZZzA2UAENjpMNHroYfwPx.wuzWBhKyzWVbYf9iSMhs1nDdJMU1M1i', '2024-02-28 10:30:59', '2024-02-09 06:18:35', '2024-03-01 12:26:35'),
(47, 'test', 'arotchetan703@gmail.com', 'No', '+356', '000000000000', 'test', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$gwsVqFAlzuFHZAPZlx9lVuO/3ioSCDPz7q1iO9Hyj4yWkvHQTRSlu', NULL, '2024-02-12 10:53:50', '2024-02-12 10:53:50'),
(48, 'chetan', 'arotechetan703@gmail.com', 'No', '+356', '0000000000001', 'company name', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$xctEux4DFHFHX4UVRTlTDO7Wxqhg6vUTsgX5JDt2.8xYj3./le.E2', NULL, '2024-02-12 10:54:59', '2024-02-12 10:54:59'),
(49, 'dsd', 'haresh@angel-portal.com', 'No', '+356', '434343434', 'dsd', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$hpfheMDQ/F6BepeErSmCj.zhtj.KUgqf22cyw7FrmkCuL2zqaEDVW', NULL, '2024-02-12 10:56:07', '2024-02-12 10:56:07'),
(50, 'yopmil', 'angelem5@yopmail.com', 'No', '+356', '789789789', 'yop', '3', '5', '74589', 156, '', 232, 0, '', 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, '', '', '', '', '50_1707737595.jpg', 'Yes', '$2y$10$XPLYj0CfqeUwoZN4FiPPIuqYk7gW5.72eEndvwR7G0mmDY2TwZqHC', NULL, '2024-02-12 11:31:27', '2024-02-12 11:34:04'),
(51, 'qwqwq', 'haresh1@angel-portal.com', 'No', '+356', '32323232323', 'wwqwqw', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$YzXE80grS10kk7s2sBlJROWd5Q.Rbzn6ABc5fWHl6.vodICdZ3itu', NULL, '2024-02-12 12:25:18', '2024-02-12 12:25:18'),
(52, 'qwqwq', 'haresh11@angel-portal.com', 'No', '+356', '212121212', 'wwqwqw', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$zxA4e2h6JnjqEQv.Gy4rOuw.V3k0zmkJ12Q0tmWcMz1.wTLxAu90u', NULL, '2024-02-12 12:25:37', '2024-02-12 12:25:37'),
(55, 'aff', 'aftab@angel-portal.com', 'No', '+356', '256633333', 'afta', '0', '0', 'ffdfdddfdf', 0, '', 232, 0, '', 1, 0, 3, NULL, '2024-02-12', '2024-05-12', NULL, NULL, NULL, '', '', '', '', '55_1707889533.png', 'Yes', '$2y$10$yK0yERuNCJ6b7h.wo/MBGeW.dy30UfW0oy62.ZHnV0kne7tziCt1C', '2024-02-28 09:52:06', '2024-02-12 12:59:36', '2024-04-04 10:17:26'),
(56, 'Mail10', 'mail13@yopmail.com', 'Yes', '+356', '789654857', 'mail1', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 4, 50, 5, 41, '2024-03-11', '2026-12-06', 44, NULL, '2024-03-11', NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$iz7lPHfs/Df8Sh6flLK32OohWZxhWCh0vOhU93a7CKBWZylF.a6Aq', NULL, '2024-02-13 04:44:08', '2024-02-13 04:58:56'),
(57, 'trail', 'trial1@yopmail.com', 'Yes', '+356', '74587878', 'trial1', '6', '2', '7896545', 96, 'malta', 232, 341, '123', 4, 50, 1, 41, '2024-03-11', '2026-12-06', 42, NULL, '2024-03-11', 'trial', 'trial', 'trial', 'trial', NULL, 'Yes', '$2y$10$XbPVOpG/UgoPF9mbabhml.deHO72MKAqSbFa7CZzNCYMv.BbjLW.G', NULL, '2024-02-14 12:46:48', '2024-02-15 08:37:03'),
(58, 'CA10', 'ca10@yopmail.com', 'Yes', '+356', '123456', 'CA', '0', '0', '123456', 0, '', 232, 0, '', 5, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, '', '', '', '', '58_1708419960.jpg', 'Yes', '$2y$10$.x9aPfil.4.weth.Pvv.mewbnq6X/rNNbonggHommlPVyGZuJbETO', NULL, '2024-02-20 05:21:19', '2024-02-20 08:59:27'),
(59, 'fdfdfd', 'testeste@gmail.com', 'No', '+356', '123253333', 'fdfdfd', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 3, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$oUfwgxIQq8GJe3Vn6Z0BV.otjsarYYFocCUPyqSnwNQIz9FDZUhOW', NULL, '2024-02-20 06:13:42', '2024-02-20 06:13:42'),
(60, 'testesefd@gmai.com', 'testesefd@gmai.com', 'No', '+356', '2555', 'testesefd@gmai.com', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$iL5lJIYK3F55Yl0h.D4EiODVrBCOEbRlRS4BJ2L5pWw1ufh/GTzhi', NULL, '2024-02-20 06:52:31', '2024-02-20 06:52:31'),
(61, 'Aftab Test sfdffffd', 'testesefd@gmai.com655', 'No', '+356', '54466333', 'testesefd@gmai.com', '3', '3', 'dfdfdfdf', 152, 'fdfdfd', 232, 346, 'dfdfd', 1, 5, 5, 41, '2024-04-01', '2024-05-01', 54, NULL, '2024-04-01', 'http://192.168.1.8:8000/Website', 'http://192.168.1.8:8000/Facebook', 'http://192.168.1.8:8000/Instagram', 'http://192.168.1.8:8000/Linkedin', '61_1711947666.png', 'No', '$2y$10$HQznnc/5g.K4ZSeOUl6biOl8YjN6rNOvl66WwStSjCPbFiwJ4F2uW', NULL, '2024-02-20 06:54:03', '2024-04-01 05:01:07'),
(62, 'testesefd@gmai.com', 'testesefd@gmai.com6666', 'No', '+356', '66', 'testesefd@gmai.com', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$xNeLgfXjFOg7OCCO9ouoVunoO5LNRLYCo7gkYwqEOLNt.XxnsjICS', NULL, '2024-02-20 06:58:59', '2024-02-20 06:58:59'),
(63, 'testesefd@gmai.com', 'testesefd@gmai.com66666', 'No', '+356', '12345678', 'testesefd@gmai.com', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 2, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$O0MWITTvWNz3tFOZkOFHV.cBTeUe85oQuFLySKf6.tfn.PJZrfmOO', NULL, '2024-02-20 07:07:55', '2024-02-20 07:07:55'),
(64, 'fdfdfdf', 'email@gmail.coo', 'No', '+356', '36666663', 'fdfd', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$yTD/hN9XaB.IdHNPqPjvqe/96tzctxoIxlEOgbl76CqaUCbGxt/he', NULL, '2024-02-20 07:18:03', '2024-02-20 07:18:03'),
(65, '1fdfd', 'fddfdfd@gmail.com', 'No', '+356', '66333333', 'ffdf', '0', '0', 'DFFDDDFDF', 0, '', 232, 0, '', 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, '', '', '', '', '', 'No', '$2y$10$D4AdUMu.IIGcWb6wEivkLejKfqysI6xWb/TFHWLvA68lICbDofUGy', NULL, '2024-02-20 07:19:32', '2024-03-08 09:12:07'),
(66, 'fdff', 'test52222@yopmail.com', 'No', '+356', '11111111', 'fddfdf', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$81EcJ/eUXkAi3/h2FZd8.eHX1FfQ7Kaw3GYRrSqkUJS4S/0kiVt/S', NULL, '2024-02-20 07:22:39', '2024-02-20 07:22:39'),
(68, 'dfdf', 'ffdf@gmail.com', 'No', '+356', '12333333', 'fdfdf', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$Hio1EMCcR5JqX4J/XPFNSed48sd/dZFdmE8TRdL.VJAA8/wQ/Y7Za', NULL, '2024-02-20 07:51:38', '2024-02-20 07:51:38'),
(69, 'dfdf', 'ffdf@gmail.com333666', 'No', '+356', '12523333', 'fdfdf', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$r9GlAwoViO/SfIaGMnomiuz82civy2O253GoCdhojsBQ6Fggx0Pda', NULL, '2024-02-20 07:53:18', '2024-02-20 07:53:18'),
(70, 'fdfdfd', 'testss@gmai.com9', 'No', '+356', '12353369', 'fdf', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$fMg95sEi8HD0iTZrgq5Y4u.yrRET2ESI/ffHOM90tAieHLvktFaQ6', NULL, '2024-02-20 07:55:32', '2024-02-20 07:55:32'),
(71, 'fdfdfd', 'testst@gmai.com', 'No', '+356', '66666666', 'tse', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$VsT7lMDEM0Xal.So2GxI3uBh0PuDQPhjfgtNMIeAswCR08aUuLdr.', NULL, '2024-02-20 07:56:50', '2024-02-20 07:56:50'),
(72, 'testest', 'afta15@angel-portal.com', 'No', '+356', '66666668', 'tests', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$4TlkHQjbSK5/kKYtRvsExeFQgvZ1dwZ7nwbYjClqNYj/L.Jdiz6DG', NULL, '2024-02-20 08:02:28', '2024-02-20 08:02:28'),
(73, 'ankita', 'ankita24gavas@gmail.com', 'Yes', '+356', '65656565', 'test', '11', '3', '555555555', 98, 'ADDDRESS,FFDF', 232, 344, '544FDFDFD', 1, 0, 2, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', 'http://192.168.1.11:8000/employer/get-employer-profile', '73_1708925772.jpg', 'No', '$2y$10$CAjrhza7DoCtLGH6xAsDhOo.dCNArsvWAsztzVTSK5CPN1AjrK8Jy', NULL, '2024-02-20 08:03:44', '2024-02-20 08:35:25'),
(74, 'Mar', 'mar11@yopmail.com', 'Yes', '+356', '78945682', 'Martest', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 1, NULL, '2024-02-20', '2024-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '74_1708515551.png', 'No', '$2y$10$r6mgspAI1sNoQkJuqTS7wu90Ww85fd7vrWhCs/CXIounSLU408BrG', NULL, '2024-02-20 12:05:27', '2024-02-20 12:06:03'),
(75, 'feb', 'feb22@yopmail.com', 'Yes', '+356', '75959595', 'feb22', '10', '3', '123456', 111, 'fdbdf368', 232, 349, 'sd8668', 1, 0, 0, NULL, '2024-02-22', '2024-05-22', NULL, NULL, NULL, 'ryth', 'rth', 'hrt', 'hhhrt', '75_1708770881.jpg', 'No', '$2y$10$4nHUKh1bA6O/cQ9mie0zxuUsRpRdJPyeibHpQFCPrE7R9GB7XeqJy', NULL, '2024-02-22 04:25:40', '2024-02-24 10:05:51'),
(76, 'Feb201', 'feb20@yopmail.com', 'Yes', '+356', '78965898', 'Feb20', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 3, NULL, '2024-02-22', '2024-05-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '76_1708605090.jpg', 'No', '$2y$10$6udNAfCD50VWWAnugSQuu.xnRum.SBPprgT6EEahxUUiq.wo9sCIe', NULL, '2024-02-22 12:22:28', '2024-02-22 12:23:46'),
(77, 'Aftab', '123@Aftab.com', 'No', '+356', '12345688', 'Company', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 5, NULL, '2024-02-23', '2024-05-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '77_1708666138.jpg', 'No', '$2y$10$u6/pn6pQhIGa/CSdt.1/DuyFWQ2zdZ1pOakZ17CP1PlHJM58G41OO', NULL, '2024-02-23 05:28:17', '2024-02-23 05:28:17'),
(78, 'Mob', 'mob23@yopmail.com', 'Yes', '+356', '14785236', 'Mob23', NULL, NULL, NULL, NULL, NULL, 232, NULL, NULL, 1, 0, 0, NULL, '2024-02-23', '2024-05-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78_1708667041.jpg', 'No', '$2y$10$fOk2SrG1CcnhR892xqTbcOimzW.M6RrE6RisqG9ONUWeK2oUvqPIq', NULL, '2024-02-23 05:36:04', '2024-02-23 05:37:50'),
(79, 'tset', 'almakhdoom0786921@gmail.com', 'No', '+356', '66559666', 'test', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-05', '2024-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$ir7RF7ePxfkpIira5MusXe11DV5Mv81f9HnZF6IsgDxXeNVcarbZC', NULL, '2024-03-05 05:51:50', '2024-03-05 05:51:50'),
(80, 'Aftab Aalm', 'amservices12info@gmail.com', 'No', '+356', '23522666', 'Test 1', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$qKnFjF2j3swM7lqPsy43yOiv5NQjVHRwbJtpBC1zujL2AOuxJ0vCO', NULL, '2024-03-08 07:33:06', '2024-03-08 07:33:06'),
(81, 'Aftab Aalm', 'amservices12info@gmail.com1', 'No', '+356', '23522661', 'Test 1', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$xYNmM6ZSy9CaAu.NABnIJeQ9FN5R1Z1ehPLhFbSy8hiZGdjnlWi1y', NULL, '2024-03-08 07:33:25', '2024-03-08 07:33:25'),
(82, 'dffdf', 'fdsfdff@gmail.com', 'No', '+356', '05323333', 'comp', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$ZXqVDE794MMaXU/7Hq/IFO9eFRBBvA.L2HCFBRwdd9/9e2o7612RG', NULL, '2024-03-08 08:56:13', '2024-03-08 08:56:13'),
(83, 'dfdfd', 'fdfdffd@gmail.com', 'No', '+356', '12345675', 'fdf', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$./rDRuDVUwZcCuXfqJcMruCTatKaqvCycKcuM3BBm82GF5eTvZClm', NULL, '2024-03-08 08:58:07', '2024-03-08 08:58:07'),
(84, 'dfdf', 'fdfdfdfdf@gmail.com', 'No', '+356', '12356366', 'fdf', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$NQe4c/x.7EEeg7oEhZsvaemsF2vkWMFuq68E7fq8AYmiNbXrQgWs6', NULL, '2024-03-08 08:59:34', '2024-03-08 08:59:34'),
(85, 'fdfdfd', 'test@gmail.co2', 'No', '+356', '63355666', 'fdfd', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$D.cB0Qe0ii7jC74AwAySIOhEU8e5YHuN5aqF/Yr1RvTMKn8O6bhBS', NULL, '2024-03-08 09:01:10', '2024-03-08 09:01:10'),
(86, 'fdfdfdfdf', 'fdfdfdfdf@gmail.com2', 'No', '+356', '63333333', 'aftadfdf', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-08', '2024-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$W36mpS6y4HMA67zOtN7QzOiqPC4CecdBDkeoM7Wx/v65zOh.y3vnW', NULL, '2024-03-08 09:04:45', '2024-03-08 09:04:45'),
(87, 'Admin1', 'admin@yopmail.com', 'No', '+356', '12451289', 'Admin1', '3', '3', '1234567', 76, 'xyz', 32, 341, 'AD10', 2, 35, 5, 41, '2024-03-12', '2024-06-10', 52, NULL, '2024-03-12', 'http://192.168.1.21:8000/', 'http://192.168.1.21:8000/', 'http://192.168.1.21:8000/', 'http://192.168.1.21:8000/', '87_1710231934.jpg', 'No', '$2y$10$oJe6tbsMUcm0JfKJ0jCwi.qLqTL7M2HqDfnW6d4wcq1hG6WVTxw2.', NULL, '2024-03-12 06:51:02', '2024-03-12 11:02:49'),
(88, 'admin', 'admin2@yopmail.com', 'No', '+356', '45698254', 'Admin2', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-12', '2024-06-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$CUg/kKaMPk41nhJBu1wTcOdGlfC7.Gl6Yyk8jgg2PUMKE5dRAwdhW', NULL, '2024-03-12 07:11:02', '2024-03-12 07:11:02'),
(89, 'Tester', 'test2@yopmail.com', 'No', '+356', '45698528', 'Test2', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-13', '2024-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$lhcHD9DMKoK2m7g7Qod6FeOFqEdu/J079rKgZvS8OIMpvyZRTAL6.', NULL, '2024-03-13 08:35:51', '2024-03-13 08:35:51'),
(90, 'Admin2', 'admin3@yopmail.com', 'No', '+356', '78965843', 'Admin3', '0', '0', '123', 0, '', 32, 0, '', 1, 0, 5, NULL, '2024-03-13', '2024-06-11', NULL, NULL, NULL, '', '', '', '', '', 'No', '$2y$10$u9VyFjWbIWZp5.bWb37t0uwUnNGf3eGG6atd1UdvpwXwYxg2HLOZS', NULL, '2024-03-13 08:38:50', '2024-03-14 04:26:06'),
(91, 'admin5', 'admin5@yopmail.com', 'No', '+356', '48489568', 'Admin5', '10', '5', '456321', 76, 'Malta', 32, 341, 'BKR10', 1, 0, 5, NULL, '2024-03-13', '2024-06-11', NULL, NULL, NULL, 'asd', 'asd', 'asd', 'asd', '91_1710319677.jpg', 'Yes', '$2y$10$t4hQJGvD3wQ2nSlrmx7ZR.ggL5nrquaaw8FmG1ieXLC4wtakMxT1S', NULL, '2024-03-13 08:43:54', '2024-03-13 08:48:52'),
(92, 'Front End', 'front1@yopmail.com', 'No', '+356', '45632975', 'Front', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-15', '2024-06-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$lJCrlf3IbQDv6S7WbVGfT.X6WwzQm8E1T8n2lba7GqcmhSGEPfQgO', NULL, '2024-03-15 06:54:11', '2024-03-15 06:54:11'),
(93, 'Adm', 'adm1@yopmail.com', 'No', '+356', '75698521', 'Adm1', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 1, NULL, '2024-03-18', '2024-06-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '$2y$10$WUOn/lHil1r08kkzHrzKwuGm5IlzZVuLb7fYYdO2CGJDxAdqF54i2', NULL, '2024-03-18 08:56:32', '2024-03-18 08:56:32'),
(94, 'Test', 'almakhdoom0786923@gmail.com', 'No', '+356', '12353336', 'Test', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-21', '2024-06-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$qKnFjF2j3swM7lqPsy43yOiv5NQjVHRwbJtpBC1zujL2AOuxJ0vCO', NULL, '2024-03-21 07:50:10', '2024-03-21 07:50:10'),
(95, 'test', 'almakhdoom078692@gmail.com', 'No', '+356', '96596866', 'test', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-03-21', '2024-06-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$yLupAtbAP0xMDZcjgmOdTucruwK2ZB6BzRy2vlVVNYaAVE26CZh7y', NULL, '2024-03-21 07:53:39', '2024-03-21 07:53:39'),
(96, 'Com2', 'com1@yopmail.com', 'No', '+356', '75315984', 'com1', '3', '2', '123456', 76, 'Malta', 32, 341, '', 2, 35, 3, 41, '2024-04-02', '2024-07-01', 55, NULL, '2024-04-02', '', '', '', '', '96_1712034117.PNG', 'No', '$2y$10$Vtk/mzKfikbuLgSeSZNDcuaLwCEGwyMKusTU5gpRERxQfyH/kmdAm', NULL, '2024-04-02 04:21:19', '2024-04-02 05:19:09'),
(97, 'try75', 'try75@yopmail.com', 'No', '+356', '75315751', 'try75', NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, 1, 0, 5, NULL, '2024-04-04', '2024-07-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '$2y$10$oACg77wkbC6wKV/vo00JFel4bfRSOnZuUTua9YVW2K.L3gMTZF69m', NULL, '2024-04-04 10:12:17', '2024-04-04 10:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `employer_down_js_resume`
--

CREATE TABLE `employer_down_js_resume` (
  `id` int(255) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `jobseeker_id` int(255) NOT NULL,
  `last_dwn_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employer_down_js_resume`
--

INSERT INTO `employer_down_js_resume` (`id`, `employer_id`, `jobseeker_id`, `last_dwn_on`) VALUES
(1, 1, 6, '2021-11-19 06:40:49'),
(2, 2, 6, '2021-11-15 10:48:27'),
(3, 1, 55, '2021-11-18 12:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `employer_payments`
--

CREATE TABLE `employer_payments` (
  `id` int(11) NOT NULL,
  `order_id` longtext NOT NULL,
  `emp_id` int(225) NOT NULL,
  `plan_id` int(225) NOT NULL,
  `payment_id` longtext DEFAULT NULL,
  `payment_amount` int(255) NOT NULL,
  `pay_method` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '[1 = Pending,  2 = Rejected,  3 = Confirm ]',
  `confirm_by` int(11) DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_payments`
--

INSERT INTO `employer_payments` (`id`, `order_id`, `emp_id`, `plan_id`, `payment_id`, `payment_amount`, `pay_method`, `status`, `confirm_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '', 17, 2, NULL, 70, '', NULL, NULL, 'No', '2024-02-08 07:50:00', '2024-02-08 06:50:01'),
(2, '20240208091106', 17, 3, NULL, 70, '', 1, NULL, 'No', '2024-02-08 09:11:06', '2024-02-08 08:11:08'),
(3, '20240208094401', 17, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 09:44:01', '2024-02-08 08:44:03'),
(4, '20240208111456', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:14:56', '2024-02-08 10:14:57'),
(5, '20240208111458', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:14:58', '2024-02-08 10:15:00'),
(6, '20240208114121', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:21', '2024-02-08 10:41:25'),
(7, '20240208114125', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:25', '2024-02-08 10:41:27'),
(8, '20240208114127', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:27', '2024-02-08 10:41:28'),
(9, '20240208114128', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:28', '2024-02-08 10:41:29'),
(10, '20240208114129', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:29', '2024-02-08 10:41:30'),
(11, '20240208114130', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:30', '2024-02-08 10:41:31'),
(12, '20240208114131', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:31', '2024-02-08 10:41:32'),
(13, '20240208114132', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:32', '2024-02-08 10:41:34'),
(14, '20240208114134', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:34', '2024-02-08 10:41:35'),
(15, '20240208114145', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 11:41:45', '2024-02-08 10:41:47'),
(16, '20240208123709', 27, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-08 12:37:09', '2024-02-08 11:37:10'),
(17, '20240208123828', 27, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 12:38:28', '2024-02-08 11:38:29'),
(18, '20240208133943', 22, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-08 13:39:43', '2024-02-08 12:39:45'),
(19, '20240212075440', 22, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-12 07:54:40', '2024-02-12 06:54:42'),
(20, '20240212104115', 22, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-12 10:41:15', '2024-02-12 09:41:17'),
(21, '20240214102621', 31, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-14 10:26:21', '2024-02-14 09:26:23'),
(22, '20240214104340', 31, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-14 10:43:40', '2024-02-14 09:43:41'),
(23, '20240216102952', 57, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-16 10:29:52', '2024-02-16 09:29:53'),
(24, '20240222072720', 75, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-22 07:27:20', '2024-02-22 06:27:22'),
(25, '20240223105727', 78, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-23 10:57:27', '2024-02-23 09:57:29'),
(26, '20240224091940', 73, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 09:19:40', '2024-02-24 08:19:41'),
(27, '20240224092030', 73, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 09:20:30', '2024-02-24 08:20:31'),
(28, '20240224092237', 73, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 09:22:37', '2024-02-24 08:22:38'),
(29, '20240224102335', 31, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 10:23:35', '2024-02-24 09:23:36'),
(30, '20240224102527', 31, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 10:25:27', '2024-02-24 09:25:28'),
(31, '20240224102552', 31, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 10:25:52', '2024-02-24 09:25:54'),
(32, '20240224102602', 31, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 10:26:02', '2024-02-24 09:26:03'),
(33, '20240224102614', 31, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 10:26:14', '2024-02-24 09:26:15'),
(34, '20240224113813', 75, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 11:38:13', '2024-02-24 10:38:14'),
(35, '20240224114005', 75, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 11:40:05', '2024-02-24 10:40:06'),
(36, '20240224114143', 75, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 11:41:43', '2024-02-24 10:41:44'),
(37, '20240224120754', 75, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 12:07:54', '2024-02-24 11:07:56'),
(38, '20240228082838', 32, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-02-28 08:28:38', '2024-02-28 07:28:39'),
(39, '20240228082851', 32, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-28 08:28:51', '2024-02-28 07:28:52'),
(40, '20240228131746', 32, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-02-28 13:17:46', '2024-02-28 12:17:47'),
(41, '20240229130315', 22, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-02-29 13:03:15', '2024-02-29 12:03:17'),
(42, '20240311073819', 57, 4, '', 660, 'ADMIN', 3, 41, 'No', '2024-03-11 07:38:19', '2024-03-11 06:38:19'),
(43, '20240311073908', 56, 3, '', 70, 'ADMIN', 3, 41, 'No', '2024-03-11 07:39:08', '2024-03-11 06:39:08'),
(44, '20240311080044', 56, 4, '', 660, 'ADMIN', 3, 41, 'No', '2024-03-11 08:00:44', '2024-03-11 07:00:44'),
(45, '20240311082527', 61, 4, '', 660, 'ADMIN', 3, 41, 'No', '2024-03-11 08:25:27', '2024-03-11 07:25:27'),
(46, '20240311082611', 61, 3, '', 70, 'ADMIN', 3, 41, 'No', '2024-03-11 08:26:11', '2024-03-11 07:26:11'),
(47, '20240311082645', 61, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-03-11 08:26:45', '2024-03-11 07:26:45'),
(48, '20240312103050', 87, 3, '', 70, 'ADMIN', 3, 41, 'No', '2024-03-12 10:30:50', '2024-03-12 09:30:50'),
(49, '20240312103430', 87, 1, '', 0, 'ADMIN', 3, 41, 'No', '2024-03-12 10:34:30', '2024-03-12 09:34:30'),
(50, '20240312103510', 87, 1, '', 10, 'ADMIN', 3, 41, 'No', '2024-03-12 10:35:10', '2024-03-12 09:35:10'),
(51, '20240312103624', 87, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-03-12 10:36:24', '2024-03-12 09:36:24'),
(52, '20240312105109', 87, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-03-12 10:51:09', '2024-03-12 09:51:09'),
(53, '20240401070359', 61, 1, '', 0, 'ADMIN', 3, 41, 'No', '2024-04-01 07:03:59', '2024-04-01 05:03:59'),
(54, '20240401070602', 61, 1, '', 0, 'ADMIN', 3, 41, 'No', '2024-04-01 07:06:02', '2024-04-01 05:06:02'),
(55, '20240402065829', 96, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-04-02 06:58:29', '2024-04-02 04:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `employer_plan`
--

CREATE TABLE `employer_plan` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_type` enum('Free','Paid') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Paid',
  `plan_currency` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_amount` double NOT NULL,
  `plan_duration` int(11) NOT NULL,
  `plan_offers` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `job_post_limit` int(11) NOT NULL,
  `cv_access_limit` int(11) NOT NULL,
  `highlight_job_limit` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employer_plan`
--

INSERT INTO `employer_plan` (`id`, `status`, `plan_name`, `plan_type`, `plan_currency`, `plan_amount`, `plan_duration`, `plan_offers`, `job_post_limit`, `cv_access_limit`, `highlight_job_limit`, `created_on`, `is_deleted`) VALUES
(1, 'APPROVED', 'Free', 'Paid', 'EUR', 0, 30, '', 5, 5, 1, '2017-05-01 06:40:25', 'No'),
(2, 'APPROVED', 'Bronze', 'Paid', 'EUR', 50, 90, '35', 35, 35, 35, '2017-05-02 14:27:56', 'No'),
(3, 'APPROVED', 'Silver', 'Paid', 'Euro', 70, 3, 'Test offer', 50, 50, 70, '2017-06-23 09:38:07', 'No'),
(4, 'APPROVED', 'Gold', 'Paid', 'Euro', 660, 3, 'Free access to all job seeker', 50, 60, 660, '2017-11-04 06:39:50', 'No'),
(5, 'APPROVED', 'GOLD', 'Paid', 'EUR', 2000, 100, '', 30, 30, 5, '2017-12-20 09:45:06', 'Yes'),
(6, 'APPROVED', 'Freed', 'Paid', 'Euro', 10, 3, NULL, 10, 10, 10, '2024-03-22 12:10:04', 'Yes'),
(7, 'APPROVED', 'Silver1', 'Paid', 'Euro', 201, 3, NULL, 3, 1, 200, '2024-03-26 12:18:13', 'Yes'),
(8, 'UNAPPROVED', 'Silver3', 'Paid', 'Pound', 100, 6, NULL, 2, 3, 1, '2024-03-26 12:41:57', 'Yes'),
(9, 'UNAPPROVED', 'Silver 1', 'Paid', 'US Dollar', 100, 6, NULL, 2, 1, 3, '2024-03-27 06:17:37', 'Yes'),
(10, 'APPROVED', 'Silver2', 'Paid', 'Indian Rupee', 1000, 3, NULL, 2, 1, 3, '2024-03-27 06:19:16', 'Yes'),
(11, 'UNAPPROVED', 'Silver4', 'Paid', 'Euro', 200, 6, NULL, 2, 1, 3, '2024-03-27 06:25:22', 'Yes'),
(12, 'APPROVED', 'Test', 'Paid', 'US Dollar', 10, 3, NULL, 10, 10, 10, '2024-04-01 13:12:03', 'Yes'),
(13, 'APPROVED', 'tset', 'Paid', 'Indian Rupee', 10, 10, NULL, 0, 10, 1, '2024-04-01 13:13:12', 'Yes'),
(14, 'APPROVED', 'test0', 'Paid', 'Euro', 100, 101, NULL, 100, 0, 1000, '2024-04-01 13:14:38', 'Yes'),
(15, 'UNAPPROVED', 'fdfdfd', 'Paid', 'Euro', 1, 10, NULL, 0, 0, 10, '2024-04-01 13:34:00', 'Yes'),
(16, 'UNAPPROVED', 'fdfdfd', 'Paid', 'Euro', 10, 101, NULL, 10, 10, 1010, '2024-04-01 13:37:43', 'Yes'),
(17, 'UNAPPROVED', 'test', 'Paid', 'Indian Rupee', 10, 101, NULL, 10, 1, 10, '2024-04-01 13:40:32', 'Yes'),
(18, 'APPROVED', 'test', 'Paid', 'Indian Rupee', 10, 10, NULL, 1, 0, 1, '2024-04-01 13:42:02', 'Yes'),
(19, 'UNAPPROVED', 'Gold1', 'Paid', 'Euro', 550, 4, NULL, 55, 10, 550, '2024-04-02 11:16:15', 'No');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employer_view`
-- (See below for the actual view)
--
CREATE TABLE `employer_view` (
`id` int(225)
,`fullname` varchar(100)
,`email` varchar(100)
,`email_verified` enum('Yes','No')
,`mob_code` varchar(100)
,`mobile` varchar(100)
,`company_name` longtext
,`company_type` varchar(100)
,`company_size` varchar(100)
,`industry` int(11)
,`license_no` varchar(100)
,`address` longtext
,`country` int(11)
,`city` int(11)
,`zip` varchar(100)
,`left_credit_job_posting_plan` int(11)
,`free_assign_job_posting` int(11)
,`plan_start_from` date
,`plan_expired_on` date
,`last_payment_recieved_id` int(11)
,`last_payment_recieved` varchar(100)
,`last_payment_recieved_on` date
,`website` longtext
,`facebook` longtext
,`instagram` longtext
,`linkedin` longtext
,`profile_img` longtext
,`is_deleted` enum('Yes','No')
,`password` varchar(100)
,`created_at` varchar(100)
,`updated_at` datetime
,`company_size_name` varchar(255)
,`company_type_name` varchar(255)
,`industry_name` varchar(255)
,`country_name` varchar(255)
,`city_name` varchar(255)
,`plan_name` varchar(255)
,`job_post_limit` int(11)
,`payment_amount` int(255)
,`pay_method` varchar(100)
,`payment_status` int(11)
,`plan_id` int(225)
,`confirm_by` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `employer_viewed_js_contact`
--

CREATE TABLE `employer_viewed_js_contact` (
  `id` int(255) NOT NULL,
  `employer_id` int(255) NOT NULL,
  `jobseeker_id` int(255) NOT NULL,
  `last_viewed_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employer_viewed_js_contact`
--

INSERT INTO `employer_viewed_js_contact` (`id`, `employer_id`, `jobseeker_id`, `last_viewed_on`) VALUES
(1, 1, 7, '2021-08-23 12:52:44'),
(2, 1, 6, '2021-11-12 10:34:26'),
(3, 1, 65, '2021-11-15 08:22:57'),
(4, 1, 55, '2021-11-16 06:41:28'),
(5, 1, 64, '2021-11-15 07:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `experiances`
--

CREATE TABLE `experiances` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `exp_no` varchar(100) NOT NULL,
  `experiance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `experiances`
--

INSERT INTO `experiances` (`id`, `status`, `exp_no`, `experiance`, `is_deleted`) VALUES
(1, 'APPROVED', '0', 'Fresher', 'No'),
(2, 'APPROVED', '0.5', '0 Year 6 Month', 'No'),
(3, 'APPROVED', '1', '1 Year 0 Month', 'No'),
(4, 'APPROVED', '1.5', '1 Year 6 Month', 'No'),
(6, 'APPROVED', '2', '2 Years 0 Month', 'No'),
(7, 'APPROVED', '2.5', '2 Years 6 Month', 'No'),
(8, 'APPROVED', '3', '3 Years 0 Month', 'No'),
(9, 'APPROVED', '3.5', '3 Years 6 Month', 'No'),
(10, 'APPROVED', '4', '4 Years 0 Month', 'No'),
(11, 'APPROVED', '4.5', '4 Years 6 Month', 'No'),
(14, 'APPROVED', '5', '5 Years 0 Month', 'No'),
(15, 'APPROVED', '5.1', 'More Then 5 Years', 'No');

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
-- Table structure for table `functional_areas`
--

CREATE TABLE `functional_areas` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `functional_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `functional_areas`
--

INSERT INTO `functional_areas` (`id`, `status`, `functional_name`, `is_deleted`) VALUES
(1, 'APPROVED', 'Site Engineering / Project Management', 'No'),
(2, 'APPROVED', 'Engineering Design, R&D', 'No'),
(3, 'APPROVED', 'IT', 'No'),
(4, 'APPROVED', 'Shipping', 'No'),
(5, 'APPROVED', 'Education / Teaching', 'No'),
(6, 'APPROVED', 'Fashion / Garments / Merchandising', 'No'),
(7, 'APPROVED', 'Manufacturing / Engineering Design / R & D', 'No'),
(8, 'APPROVED', 'Advertising / Entertainment / Media', 'No'),
(9, 'APPROVED', 'Customer Service / Call Centre / BPO', 'No'),
(10, 'APPROVED', 'Accounts / Finance / Tax / CS / Audit', 'No'),
(11, 'APPROVED', 'Banking / Insurance / Financial Services', 'No'),
(12, 'APPROVED', 'Admin / Secretarial', 'No'),
(13, 'APPROVED', 'Marketing / Advertising / MR / PR', 'No'),
(14, 'APPROVED', 'Legal', 'No'),
(15, 'APPROVED', 'Export / Import / Merchandising', 'No'),
(16, 'APPROVED', 'Travel / Airlines / Ticketing', 'No'),
(17, 'APPROVED', 'Health Care', 'No'),
(18, 'APPROVED', 'Pharmaceutical / Biotechnology', 'No'),
(19, 'APPROVED', 'TV / Films / Production', 'No'),
(20, 'APPROVED', 'Web / Graphic Design / Visualiser', 'No'),
(21, 'APPROVED', 'Human Resources', 'No'),
(22, 'APPROVED', 'Construction', 'No'),
(23, 'APPROVED', 'Architecture / Interior Design', 'No'),
(24, 'APPROVED', 'Real Estate', 'No'),
(25, 'APPROVED', 'Sales / Business Development', 'No'),
(26, 'APPROVED', 'Retail Chains', 'No'),
(27, 'APPROVED', 'Guards / Security Services', 'No'),
(28, 'APPROVED', 'Hotels / Restaurants', 'No'),
(29, 'APPROVED', 'Beauty / Fitness / Spa Services', 'No'),
(30, 'APPROVED', 'Analytics / Business Intelligence', 'No'),
(31, 'APPROVED', 'Corporate Planning / Consulting', 'No'),
(32, 'APPROVED', 'Content / Journalism', 'No'),
(33, 'APPROVED', 'Telecom / ISP', 'No'),
(34, 'APPROVED', 'Purchase / Logistics / Supply Chain', 'No'),
(35, 'APPROVED', 'Oil / Gas', 'No'),
(36, 'APPROVED', 'Top Management', 'No'),
(37, 'APPROVED', 'Self Employed / Consultants', 'No'),
(38, 'APPROVED', 'Design, Creative, User Experience', 'No'),
(39, 'APPROVED', 'CSR & Sustainability', 'No'),
(40, 'APPROVED', 'Production / Maintenance / Quality', 'No'),
(41, 'APPROVED', 'Agent', 'No'),
(42, 'APPROVED', 'Packaging', 'No'),
(43, 'APPROVED', 'Secretary / Front Office / Data Entry', 'No'),
(44, 'APPROVED', 'Other', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `grievance`
--

CREATE TABLE `grievance` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `country_code` varchar(225) NOT NULL,
  `contact_no` varchar(225) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `report_url` longtext DEFAULT NULL,
  `date_oc` date DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `grfile` longtext DEFAULT NULL,
  `confirm` varchar(225) DEFAULT NULL,
  `tnc` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grievance`
--

INSERT INTO `grievance` (`id`, `name`, `country_code`, `contact_no`, `email`, `address`, `report_url`, `date_oc`, `message`, `grfile`, `confirm`, `tnc`, `created_at`) VALUES
(1, 'fdffdf', '+345', 'fffdf', 'ffd@gmail.com', 'fdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-21', 'ffdfdff', NULL, 'on', 'on', '2024-02-24 10:53:52'),
(2, 'fdffdf', '+345', 'fffdf', 'ffd@gmail.com', 'fdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-21', 'ffdfdff', NULL, 'on', 'on', '2024-02-24 10:54:20'),
(3, 'ffd', '+91', 'fdfdf', 'fdfdfd@gmail.com', 'ffdddf', 'http://192.168.1.11:8000/grievance-form', '2024-02-22', 'fdfdf', NULL, 'on', 'on', '2024-02-24 10:55:12'),
(4, 'ffd', '+91', 'fdfdf', 'fdfdfd@gmail.com', 'ffdddf', 'http://192.168.1.11:8000/grievance-form', '2024-02-22', 'fdfdf', NULL, 'on', 'on', '2024-02-24 10:55:42'),
(5, 'ffdd', '+345', 'fdfdfd', 'dfdfdfd@mail.com', 'tsefdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-16', 'fdfdf', NULL, 'on', 'on', '2024-02-24 10:58:06'),
(6, 'ffdd', '+345', 'fdfdfd', 'dfdfdfd@mail.com', 'tsefdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-16', 'fdfdf', NULL, 'on', 'on', '2024-02-24 10:58:55'),
(7, 'fdfdfdf', '+345', 'f113121', 'tset@gmai.com', 'fdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-15', 'ffdfd', NULL, 'on', 'on', '2024-02-24 11:02:20'),
(8, 'fddfdf', '+91', '5666262', 'fddf@gmai.com', 'fdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-15', 'fdfd', NULL, 'on', 'on', '2024-02-24 11:02:58'),
(9, 'fdfd', '+52', '152fdfd', 'fdfdf@gmail.com', 'fdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-02-08', 'ffdf', NULL, 'on', 'on', '2024-02-24 11:04:09'),
(10, 'fdfdfd', '+91', 'fdfdfdf', 'fdfdf@gmai.com', 'fdfd', 'http://192.168.1.11:8000/grievance-form', '2024-02-22', 'fdfd', NULL, 'on', 'on', '2024-02-24 11:04:46'),
(11, 'Chetan', '+91', '7854215', '', '', '', '1010-10-10', 'Testing', NULL, 'on', 'on', '2024-02-24 11:14:22'),
(12, 'Chetan', '+91', '7584612332', 'gdfg@yopmail.com', 'dfgdg', 'http://192.168.1.11:8000/grievance-form', '2023-09-05', 'vwegvwefgbvfd', NULL, 'on', 'on', '2024-02-24 11:18:34'),
(13, 'fdfdf', '+1-787', 'fdfd', 'fdf@gmail.com', 'afdfdf', 'http://192.168.1.11:8000/grievance-form', '2024-03-17', 'test', NULL, 'on', 'on', '2024-03-06 13:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `industries_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data',
  `is_featured` enum('No','Yes') NOT NULL DEFAULT 'No',
  `icon_name` varchar(255) DEFAULT NULL,
  `icone_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `status`, `industries_name`, `is_deleted`, `is_featured`, `icon_name`, `icone_code`) VALUES
(1, 'APPROVED', 'Accounting/Finance', 'Yes', 'Yes', 'fa fa-whatsapp', '&#xf232;'),
(2, 'APPROVED', 'Advertising/PR/MR/Events', 'Yes', 'Yes', 'fa fa-500px', '&#xf26e;'),
(3, 'APPROVED', 'Agriculture/Dairy', 'Yes', 'Yes', 'fa fa-500px', '&#xf26e;'),
(4, 'APPROVED', 'Animation', 'Yes', 'Yes', NULL, NULL),
(5, 'APPROVED', 'Architecture/Interior Designing', 'Yes', 'Yes', NULL, NULL),
(6, 'APPROVED', 'Auto/Auto Ancillary', 'Yes', 'Yes', NULL, NULL),
(7, 'APPROVED', 'Aviation / Aerospace Firms', 'Yes', 'Yes', NULL, NULL),
(8, 'APPROVED', 'Banking/Financial Services/Broking', 'Yes', 'Yes', NULL, NULL),
(9, 'APPROVED', 'BPO/ITES', 'Yes', 'No', NULL, NULL),
(10, 'APPROVED', 'Brewery / Distillery', 'Yes', 'No', NULL, NULL),
(11, 'APPROVED', 'Broadcasting', 'Yes', 'No', NULL, NULL),
(12, 'APPROVED', 'Ceramics /Sanitary ware', 'Yes', 'No', NULL, NULL),
(13, 'APPROVED', 'Chemicals / PetroChemical / Plastic / Rubber', 'Yes', 'No', NULL, NULL),
(14, 'APPROVED', 'Construction / Engineering / Cement / Metals', 'Yes', 'No', NULL, NULL),
(15, 'APPROVED', 'Consumer Durables', 'Yes', 'No', NULL, NULL),
(16, 'APPROVED', 'Courier/Transportation/Freight', 'Yes', 'No', NULL, NULL),
(17, 'APPROVED', 'Defence/Government', 'Yes', 'No', NULL, NULL),
(18, 'APPROVED', 'Education/Teaching/Training', 'Yes', 'No', NULL, NULL),
(19, 'APPROVED', 'Electricals / Switchgears', 'Yes', 'No', NULL, NULL),
(20, 'APPROVED', 'Export/Import', 'Yes', 'Yes', 'ln  ln-icon-Globe', NULL),
(21, 'APPROVED', 'Facility Management', 'Yes', 'No', NULL, NULL),
(22, 'APPROVED', 'Fertilizers/Pesticides', 'Yes', 'No', NULL, NULL),
(23, 'APPROVED', 'FMCG/Foods/Beverage', 'Yes', 'No', NULL, NULL),
(24, 'APPROVED', 'Food Processing', 'Yes', 'Yes', NULL, NULL),
(25, 'APPROVED', 'Fresher/Trainee', 'Yes', 'Yes', 'ln ln-icon-Student-Female', NULL),
(26, 'APPROVED', 'Gems & Jewellery', 'Yes', 'No', NULL, NULL),
(27, 'APPROVED', 'Glass', 'Yes', 'No', NULL, NULL),
(28, 'APPROVED', 'Heat Ventilation Air Conditioning', 'Yes', 'No', NULL, NULL),
(29, 'APPROVED', 'Hotels/Restaurants/Airlines/Travel', 'Yes', 'Yes', 'ln ln-icon-Car', NULL),
(30, 'APPROVED', 'Industrial Products/Heavy Machinery', 'Yes', 'No', NULL, NULL),
(31, 'APPROVED', 'Insurance', 'Yes', 'No', NULL, NULL),
(32, 'APPROVED', 'Internet/Ecommerce', 'Yes', 'No', NULL, NULL),
(33, 'APPROVED', 'IT-Hardware & Networking', 'Yes', 'No', NULL, NULL),
(34, 'APPROVED', 'IT-Software/Software Services', 'Yes', 'Yes', 'ln  ln-icon-Laptop-3', NULL),
(35, 'APPROVED', 'KPO / Research /Analytics', 'Yes', 'No', NULL, NULL),
(36, 'APPROVED', 'Leather', 'Yes', 'No', NULL, NULL),
(37, 'APPROVED', 'Legal', 'Yes', 'No', NULL, NULL),
(38, 'APPROVED', 'Media/Dotcom/Entertainment', 'Yes', 'Yes', 'ln  ln-icon-Plates', NULL),
(39, 'APPROVED', 'Medical/Healthcare/Hospital', 'Yes', 'Yes', 'ln  ln-icon-Medical-Sign', NULL),
(40, 'APPROVED', 'Medical Devices / Equipments', 'Yes', 'Yes', 'ln ln-icon-Laptop-3', NULL),
(41, 'APPROVED', 'Mining', 'Yes', 'No', NULL, NULL),
(42, 'APPROVED', 'NGO/Social Services', 'Yes', 'No', NULL, NULL),
(43, 'APPROVED', 'Office Equipment/Automation', 'Yes', 'No', NULL, NULL),
(44, 'APPROVED', 'Oil and Gas/Power/Infrastructure/Energy', 'Yes', 'No', NULL, NULL),
(45, 'APPROVED', 'Paper', 'Yes', 'No', NULL, NULL),
(46, 'APPROVED', 'Pharma/Biotech/Clinical Research', 'Yes', 'No', NULL, NULL),
(47, 'APPROVED', 'Printing/Packaging', 'Yes', 'No', NULL, NULL),
(48, 'APPROVED', 'Publishing', 'Yes', 'No', NULL, NULL),
(49, 'APPROVED', 'Real Estate/Property', 'Yes', 'Yes', 'ln ln-icon-Laptop-3', NULL),
(50, 'APPROVED', 'MANAGEMENT', 'Yes', 'Yes', 'fa fa-flag', '&#xf024;'),
(51, 'APPROVED', 'Retail', 'Yes', 'No', NULL, NULL),
(52, 'APPROVED', 'Security/Law Enforcement', 'Yes', 'No', NULL, NULL),
(53, 'APPROVED', 'Semiconductors/Electronics', 'Yes', 'No', NULL, NULL),
(54, 'APPROVED', 'Shipping/Marine', 'Yes', 'No', NULL, NULL),
(55, 'APPROVED', 'Steel', 'Yes', 'No', NULL, NULL),
(56, 'APPROVED', 'Strategy /Management Consulting Firms', 'Yes', 'No', NULL, NULL),
(57, 'APPROVED', 'Sugar', 'Yes', 'No', NULL, NULL),
(58, 'APPROVED', 'Telcom/ISP', 'Yes', 'No', NULL, NULL),
(59, 'APPROVED', 'Textiles/Garments/Accessories', 'Yes', 'No', NULL, NULL),
(60, 'APPROVED', 'Tyres', 'Yes', 'No', NULL, NULL),
(61, 'APPROVED', 'Water Treatment / Waste Management', 'Yes', 'No', NULL, NULL),
(62, 'APPROVED', 'Wellness / Fitness / Sports / Beauty', 'Yes', 'No', NULL, NULL),
(63, 'APPROVED', 'Test', 'Yes', 'Yes', 'fa fa-question', NULL),
(64, 'APPROVED', 'N Demo Industry', 'Yes', 'No', 'fa fa-500px', '&#xf26e;'),
(65, 'APPROVED', 'NEET COACHING', 'Yes', 'Yes', 'fa fa-bookmark', '&#xf02e;'),
(66, 'APPROVED', 'FOUNDATION (7th-10th)', 'Yes', 'Yes', 'fa fa-mortar-board', '&#xf19d;'),
(67, 'APPROVED', 'SCHOOL PROJECT', 'Yes', 'Yes', 'fa fa-clipboard', '&#xf0ea;'),
(68, 'APPROVED', 'JEE- MAINS COACHING', 'Yes', 'Yes', 'fa fa-dashboard', '&#xf0e4;'),
(69, 'APPROVED', 'JEE - ADVANCED COACHING', 'Yes', 'Yes', 'fa fa-bank', '&#xf19c;'),
(70, 'APPROVED', 'NTSE-OLYMPIARD', 'Yes', 'Yes', 'fa fa-comments', '&#xf086;'),
(71, 'APPROVED', 'ACADMIC FACULTY', 'Yes', 'Yes', 'fa fa-database', '&#xf1c0;'),
(72, 'APPROVED', 'Test', 'Yes', 'Yes', 'fa fa-asterisk', '&#xf069;'),
(73, 'APPROVED', 'Strategy / Management Consulting Firms', 'No', 'Yes', 'fa fa-archive', '&#xf187;'),
(74, 'APPROVED', 'Recruitment / Staffing / RPO', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(75, 'APPROVED', 'Brewery / Distillery', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(76, 'APPROVED', 'Accounting / Finance', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(77, 'APPROVED', 'Broadcasting', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(78, 'APPROVED', 'Fresher / Trainee', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(79, 'APPROVED', 'Animation', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(80, 'APPROVED', 'Steel', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(81, 'APPROVED', 'Glass', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(82, 'APPROVED', 'Other', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(83, 'APPROVED', 'Social Media', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(84, 'APPROVED', 'Semiconductor', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(85, 'APPROVED', 'Public Relations PR', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(86, 'APPROVED', 'Office Equipment / Automation', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(87, 'APPROVED', 'Non Ferrous / Metals / Aluminium / Zinc', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(88, 'APPROVED', 'Medical Transcription', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(89, 'APPROVED', 'Market Research', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(90, 'APPROVED', 'Internet Service Provider ISP', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(91, 'APPROVED', 'Hospitals / Health Care / Diagnostics', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(92, 'APPROVED', 'Food / Packaged Food', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(93, 'APPROVED', 'Facility Management', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(94, 'APPROVED', 'Electricals / Switchgears', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(95, 'APPROVED', 'Dotcom', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(96, 'APPROVED', 'Cement / Building / Material', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(97, 'APPROVED', 'Beverages / Liquor', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(98, 'APPROVED', 'Advertising / PR / Events', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(99, 'APPROVED', 'IT Computers / Hardware', 'No', 'Yes', 'fa fa-laptop', '&#xf109;'),
(100, 'APPROVED', 'ITES / BPO', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(101, 'APPROVED', 'Paper', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(102, 'APPROVED', 'Sugar', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(103, 'APPROVED', 'Power / Energy', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(104, 'APPROVED', 'Plastic / Rubber', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(105, 'APPROVED', 'Bio Technology / Life Sciences', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(106, 'APPROVED', 'Import / Export', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(107, 'APPROVED', 'Shipping / Marine Services', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(108, 'APPROVED', 'Leather', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(109, 'APPROVED', 'E-learning', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(110, 'APPROVED', 'Engineering / Procurement / Construction', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(111, 'APPROVED', 'Chemicals / Petrochemicals', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(112, 'APPROVED', 'Environmental Services', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(113, 'APPROVED', 'Research Development', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(114, 'APPROVED', 'Heat Ventilation / Air Conditioning HVAC', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(115, 'APPROVED', 'Tyres', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(116, 'APPROVED', 'Water Treatment / Waste Management', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(117, 'APPROVED', 'Hotels / Restaurant', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(118, 'APPROVED', 'Government / PSU / Defence', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(119, 'APPROVED', 'Machinery / Equipment Mfg', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(120, 'APPROVED', 'Law Enforcement / Security Services', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(121, 'APPROVED', 'Textiles / Garments / Accessories', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(122, 'APPROVED', 'Insurance', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(123, 'APPROVED', 'Gems / Jewellery', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(124, 'APPROVED', 'Pharmaceutical', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(125, 'APPROVED', 'E Commerce', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(126, 'APPROVED', 'Travel / Tourism', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(127, 'APPROVED', 'Courier / Freight / Transportation', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(128, 'APPROVED', 'Ceramics / Sanitary Ware', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(129, 'APPROVED', 'Wellness / Fitness / Sports / Beauty', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(130, 'APPROVED', 'Sculpture / Craft', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(131, 'APPROVED', 'Retailing', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(132, 'APPROVED', 'Consultancy / Placement', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(133, 'APPROVED', 'Real Estate / Property', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(134, 'APPROVED', 'Packaging', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(135, 'APPROVED', 'Printing / Packaging Publishing', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(136, 'APPROVED', 'Beauty / Personal Care / SPA', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(137, 'APPROVED', 'Wood', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(138, 'APPROVED', 'Paints', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(139, 'APPROVED', 'Oil / Gas / Petroleum', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(140, 'APPROVED', 'NGO / Social Work', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(141, 'APPROVED', 'Mining', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(142, 'APPROVED', 'Iron / Steel', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(143, 'APPROVED', 'Matrimony', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(144, 'APPROVED', 'Legal', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(145, 'APPROVED', 'KPO / Analytics', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(146, 'APPROVED', 'FMCG', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(147, 'APPROVED', 'Fertilizers / Pesticides', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(148, 'APPROVED', 'Consumer Electronics / Appliances', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(149, 'APPROVED', 'Aviation / Aerospace', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(150, 'APPROVED', 'Architecture / Interior Design', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(151, 'APPROVED', 'Astrology', 'No', 'Yes', 'fa fa-500px', '&#xf26e;'),
(152, 'APPROVED', 'Agriculture / Dairy Based / Forestry / Fishing', 'No', 'Yes', 'fa fa-universal-access', ''),
(153, 'APPROVED', 'Entertainment / Media / Publishing', 'No', 'No', 'fa fa-resistance', '&#xf1d0;'),
(154, 'APPROVED', 'Medical / Healthcare', 'No', 'No', 'fa fa-hotel', '&#xf236;'),
(155, 'APPROVED', 'Telecom', 'No', 'Yes', 'fa fa-television', '&#xf26c;'),
(156, 'APPROVED', 'Automotive / Ancillaries', 'No', 'Yes', 'fa fa-automobile', '&#xf1b9;'),
(157, 'APPROVED', 'IT Hardware / Networking', 'No', 'Yes', 'fa fa-wifi', '&#xf1eb;'),
(158, 'APPROVED', 'Education / Teaching / Training', 'No', 'Yes', 'fa fa-institution', '&#xf19c;'),
(159, 'APPROVED', 'Construction & Engineering', 'No', 'Yes', 'fa fa-building', '&#xf1ad;'),
(160, 'APPROVED', 'Manufacturing', 'No', 'Yes', 'fa fa-cog', '&#xf013;'),
(161, 'APPROVED', 'Banking / Financial Services / Broking', 'No', 'Yes', 'fa fa-industry', '&#xf275;'),
(162, 'APPROVED', 'IT Computers / Software', 'No', 'No', 'fa fa-desktop', '&#xf108;'),
(163, 'UNAPPROVED', 'Fabrication', 'No', 'No', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE `jobseekers` (
  `id` int(225) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mob_code` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `reset_token` longtext DEFAULT NULL COMMENT '[ When Apply show token, \r\nWhen Reset Done Show Time Stamp]',
  `profile_img` longtext DEFAULT NULL,
  `plan_id` int(11) NOT NULL DEFAULT 1,
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseekers`
--

INSERT INTO `jobseekers` (`id`, `fullname`, `email`, `email_verified`, `mob_code`, `mobile`, `password`, `reset_token`, `profile_img`, `plan_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 'Aftabfgfg FDFDFD', 'test', 'No', '+356', '9165855422', '$2y$10$yEVKDtp6lFiaC0oKUNPXx.L2mlxDNNxpwRyyZ/dRFqRnf5Pyu9eia', '', '4_1710315046.png', 1, 'Yes', '2024-01-16 07:58:47', '2024-03-13 02:00:46'),
(5, 'Roshana', 'roshan1@yopmail.com', 'No', '+91', '9632587412', '$2y$10$GVLiGZ.fj6DlPFTVoUzGqugta1hce9WyOoYbWzPKY2JBUxJH6jdua', '', '5_1710315993.png', 2, 'Yes', '2024-01-23 12:11:31', '2024-03-30 05:59:21'),
(6, 'Chetan2', 'chetan2@yopmail.com', 'No', '+356', '77755512', '$2y$10$HOHm/2RsPC4gtcdZeg1zqOKIulAxqAD.UroW8hiw4hM7qvmLtTrBq', '', NULL, 1, 'Yes', '2024-01-23 13:25:47', '2024-01-23 07:55:47'),
(7, 'Chetan1d', 'chetan1@yopmail.com', 'No', '+356', '7412589632', '$2y$10$JQ2hDDNU3h9uyMpId9yxjOtZIFMYDV67fkS7QPdEdh7dJPRJ3PdUO', '', '7_1711792920.png', 3, 'Yes', '2024-01-25 04:57:18', '2024-03-30 05:50:31'),
(8, 'Chetan3', 'chetan3@yopmail.com', 'No', '+33', '7896541', '$2y$10$U2ohVCKEbScggXrNjNgudePlnNb8f6fn0jKyukw7ff.X22IcEBDMy', '', NULL, 1, 'Yes', '2024-01-25 05:23:45', '2024-01-24 23:53:45'),
(9, 'ca1', 'ca1@yopmail.coma', 'No', '+356', '7548521458', '$2y$10$fvuUEM3tXP93dGmm0aLIpecs9KRXRzzBG4arHPJwTP1JHdMQTp1K2', '', NULL, 1, 'Yes', '2024-01-25 12:19:34', '2024-01-25 06:49:34'),
(10, 'Chetan', 'jobca@yopmail.com', 'No', '+91', '745125487', '$2y$10$Xt01Ql.HOrtNRqsrrSH58er2GlIJdf5.mMuiq1gBsid7GQ9OTIXV6', '', NULL, 1, 'Yes', '2024-01-29 08:33:32', '2024-01-29 03:03:32'),
(11, 'Arman', 'test1@gmail.com', 'No', '+64', '986666666', '$2y$10$kJaK6XVeBeHq37gI19pjAu7rnqDmipwxHMCLTKcbUX/bm.L6tSp6a', '', NULL, 1, 'No', '2024-01-31 10:42:09', '2024-01-31 05:12:09'),
(12, 'job5', 'job5@yopmail.com', 'No', '+356', '789546', '$2y$10$yUU1s3S1eYcoFLKiWjk66eUuqOA1QfbW1kK4PIbUZu7SQf7h5ETTW', '', NULL, 1, 'Yes', '2024-02-05 09:47:12', '2024-02-05 04:17:12'),
(13, 'Chetan5', 'chetan5@yopmail.com', 'Yes', '+91', '7531598524', '$2y$10$wx6P8FWpjd4zAG.6Aah0.u2JkDMFuj.41.rJu9ejzbOc.Jhfjl2Ra', '2024-02-29 13:31:56', '13_1709104392.jpg', 3, 'Yes', '2024-02-07 13:17:50', '2024-02-28 01:42:38'),
(15, 'Chetan Arote', 'chetan@angel-portal.com', 'No', '+91', '7474747474', '$2y$10$HdtL.ErEfRYGeQC258KbS.hhaHFVSqukmvdjfQ32bfaP5.nQAORbm', '', NULL, 1, 'No', '2024-02-12 11:13:59', '2024-02-12 05:43:59'),
(34, 'fdfd', 'Yes', 'Yes', '+356', '0225222222', '$2y$10$TA.MtCMnHy.DUx7LbH7c/O2e0F4UZaAzGFJ2WLUFTSB2KKlahSjMu', '', NULL, 1, 'No', '2024-02-12 12:41:48', '2024-02-12 07:11:48'),
(37, 'Mail11', 'mail11@yopmail.com', 'Yes', '+91', '741258125896', '$2y$10$yaHblyWGaeWd./bPoE3/Z.Ylijxwvq.rqdN8wB2X5OtJizMa/THGC', '2024-02-28 09:55:53', '37_1709096783.png', 1, 'No', '2024-02-13 05:18:31', '2024-02-12 23:49:39'),
(39, 'tata', 'tata@yopmail.com', 'No', '+356', '77778888', '$2y$10$kp0.k3QHCJHEttHZN1N1D./Z92zYiWxC4lbgfV304J0ozezPULqpG', '', NULL, 1, 'No', '2024-02-13 10:07:15', '2024-02-13 04:37:15'),
(41, 'aftab', 'aftab@angel-portal.com', 'Yes', '+356', '025533666', '$2y$10$NxpJZASrHHR.UilxjagGUuIO.rbm3xkgaF4ae1yf07Sqz8aT5FGZC', 'w1L1h0C15azBhOVkcvRLdbCawWdjFUzjQx2rgpPo5QQNeMSpjuulVjRnuxstG8By', NULL, 1, 'No', '2024-02-13 11:17:27', '2024-02-27 04:53:38'),
(42, 'aftab', 'testjs@yopmail.com', 'Yes', '+212', '6633333333', '$2y$10$UcP7IcdX3TvwWWbWTFrq8Ohv/Mr0S/pvtGzC38/To01a0rKgaA8cW', '', NULL, 1, 'No', '2024-02-21 05:44:46', '2024-02-21 00:16:27'),
(43, 'Aftab', 'testjs2@yopmail.com', 'No', '+20', '965666666', '$2y$10$NN2LXDu0WNvsj/nSgABr3..eXt6/iEgHpsyo1jiPpruf.sSm2.Fmq', '', NULL, 1, 'No', '2024-02-21 05:49:59', '2024-02-21 00:19:59'),
(44, 'tester', 'tester1@yopmail.com', 'Yes', '+91', '123456789112', '$2y$10$0X.XQi.t6cmD7TUOAFgUyeINrZJAYko.aYKyWZc0AVZJdVjodyNgm', '', NULL, 1, 'Yes', '2024-02-21 09:31:05', '2024-02-29 07:11:18'),
(45, 'Feb1', 'feb23@yopmail.com', 'No', '+91', '7896542586', '$2y$10$bdIKK555Jh5l7.Gbss.Ywu4pVN2kEiR3Nkgcgl5WaE/kUYjQ0C9IC', '', NULL, 1, 'Yes', '2024-02-22 05:13:36', '2024-02-21 23:43:36'),
(46, 'yopmail', 'testjsnew@yopmail.com', 'Yes', '+20', '256333333', '$2y$10$xAE.zhEuuhHHku6ILZKYuuV6Z9Eom3Aok71r5UuBJOhrmieLHk4oS', '', '46_1709031338.png', 1, 'No', '2024-02-22 11:11:26', '2024-02-22 05:41:48'),
(47, 'mob24', 'mob24@yopmail.com', 'Yes', '+91', '7855699952', '$2y$10$f0Cvr3DdRluSX/rfqfK1VuvgMOFY.UCldPve/3dLysDTQ/6b0Pf1.', '', NULL, 1, 'Yes', '2024-02-23 08:16:44', '2024-02-23 02:48:15'),
(48, 'trua', 'mob11@yopmail.com', 'No', '+1490', '4556698887886', '$2y$10$cZVx/6tJJnQpYW0zSt80Seo5zObt3iYpCYhw1Ehn0TralZWmw0xLW', '', NULL, 1, 'Yes', '2024-02-23 09:18:56', '2024-02-23 03:48:56'),
(49, 'Ang10', 'ang10@yopmail.com', 'Yes', '+211', '78965425', '$2y$10$L5dMqOiv8dk4mUsAsNXy8eabR9TGm8kohC6jjVGmTynOl7aD73tcm', '', '49_1709031573.jpg', 1, 'Yes', '2024-02-27 10:43:15', '2024-02-27 05:14:21'),
(50, 'aftab', 'aftab@angel-portal2.com', 'No', '+212', '6666666666', '$2y$10$kfTm3rqLcjXuF7TPwsj/T.H09jVgJIrDpaL1IUd4RiuXXKHzcfweG', NULL, '50_1709270686.jpg', 1, 'No', '2024-02-29 05:18:35', '2024-02-28 23:48:35'),
(51, 'ca', 'ca30@yopmail.com', 'Yes', '+20', '78965485', '$2y$10$MMOuPKsY2odDK8nTxjneBeY3CrgtV94IsI9p7TUSooFH7CXUB2ivK', NULL, '51_1709210821.jpg', 1, 'No', '2024-02-29 12:34:25', '2024-02-29 07:05:02'),
(52, 'browse jobseeker', 'mail10@yopmail.com', 'Yes', '+20', '45698758', '$2y$10$5CfHKOoXbOFObfL9J/hmWefSZEV5qwi7CN4kXekGGyF/OWf.LG.5q', NULL, '52_1709268852.png', 1, 'No', '2024-03-01 04:48:39', '2024-02-29 23:19:55'),
(56, 'fdfdffd', 'fdfdf@gmail.com', 'No', '+1', '1235666', '$2y$10$dqTb5iJRcKRk/OQ9E4E.rObetpteyClHAm8ywO7RIWtI45FhYD6qq', NULL, NULL, 1, 'No', '2024-03-11 13:38:06', '2024-03-11 12:38:06'),
(57, 'Aftab', '123@Aftab.com', 'No', '+222', '13563699', '$2y$10$LXgdWyO0bm3/B8gvCppB2eDMVNE9qeHNsqRiev/uir/5oYaKDQSPe', NULL, NULL, 1, 'No', '2024-03-11 13:39:15', '2024-03-11 12:39:15'),
(58, 'Aftab Alam', 'test@gmail.com', 'No', '+220', '6866666', '$2y$10$7b5Ej.TghQidw26uI6X76.r4L6LXC7GiHQ4sJjWlLsliYJfV1CtJ.', NULL, NULL, 1, 'No', '2024-03-12 05:40:30', '2024-03-12 04:40:31'),
(59, 'Tset', 'testset@mgail.com', 'No', '+221', '6633333', '$2y$10$vlpYMIaDZtUbfUBpP/P20OraabJH3TmqWp.phAYbsjnJDJ1PmzZh2', NULL, NULL, 1, 'No', '2024-03-13 08:47:09', '2024-03-13 07:47:09'),
(60, 'Job1', 'job1@yopmail.com', 'No', '+241', '756982654', '$2y$10$0x4bRQIYVPNmcQF5luDeZOxhHruIwt8LPZ.BsvVKp0.TRnAQpq1Va', NULL, NULL, 1, 'Yes', '2024-03-13 08:56:28', '2024-03-13 03:26:28'),
(61, 'job0', 'job0@yopmail.com', 'No', '+220', '4567895286', '$2y$10$SpEJAgO5DewHPlfiJU/PmulDcYSgykqDN/vOTp0pPtXXngcy3pJw.', NULL, NULL, 1, 'Yes', '2024-03-13 12:14:25', '2024-03-13 11:14:25'),
(62, 'Job15', 'job15@yopmail.com', 'No', '+218', '78966542', '$2y$10$ItTrREtdyMWTijHQGDwt..GLQWcTnoP4MIZxJrBH3gKq0hwATHpH2', NULL, NULL, 1, 'Yes', '2024-03-13 12:17:08', '2024-03-13 11:17:08'),
(63, 'Admin11', 'admin11@yopmail.com', 'No', '+20', '78965454', '$2y$10$Lw9eoECEvHNfromMbMERCOgAiu5ljbi0Xj/3a8bSKCLNK9gV6a4yO', NULL, '63_1710391286.jpg', 1, 'No', '2024-03-14 04:27:36', '2024-03-13 22:57:36'),
(64, 'my0', 'my0@yopmail.com', 'No', '+218', '789654258623', '$2y$10$FQ62j9fY3i0da4tX4jUEEOhBUkrFHg4FuncNc2X3mikYHztKupuKO', NULL, NULL, 1, 'No', '2024-03-15 05:43:33', '2024-03-15 04:43:33'),
(70, 'test', 'tset@gmailco.com', 'No', '+356', '00022222', '$2y$10$M139nQej0mK/kvf.X9OSpOpBqg0aKcG8auh2KPDFyax/72zw6Inpa', NULL, NULL, 1, 'No', '2024-03-30 07:39:21', '2024-03-30 06:39:21'),
(71, 'testset', 'tsetete@gmail.com', 'No', '+356', '555566666', '$2y$10$kVuLDLD2ilYGJ1c6ffJVNORrFIsNOmGrnjlia/XYj90XbJ737D.l.', NULL, NULL, 1, 'No', '2024-03-30 09:13:40', '2024-03-30 08:13:40'),
(72, 'Apr', 'apr1@yopmail.com', 'No', '+263', '753159', '$2y$10$LmBWm9xI1pcUbjZVVGG2G.OtsdQBCpGTmILRrJJFLWEKTljepocme', NULL, '72_1711965710.png', 1, 'No', '2024-04-01 06:54:56', '2024-04-01 04:54:56'),
(73, 'Job3', 'job3@yopmail.com', 'No', '+20', '78965412369', '$2y$10$caPM3gURpAEFjeFYAboIw.ThGhU95qC7aYp5.G6DrBID4y3gVsIWe', NULL, NULL, 2, 'No', '2024-04-02 07:29:19', '2024-04-02 05:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_access_employer`
--

CREATE TABLE `jobseeker_access_employer` (
  `id` int(11) NOT NULL,
  `js_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `is_block` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_follow` enum('No','Yes') NOT NULL DEFAULT 'No',
  `is_liked` enum('Yes','No') NOT NULL DEFAULT 'No',
  `liked_on` datetime NOT NULL,
  `followed_on` datetime NOT NULL,
  `blocked_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Stores the data of job seeker who follows the employer';

--
-- Dumping data for table `jobseeker_access_employer`
--

INSERT INTO `jobseeker_access_employer` (`id`, `js_id`, `employer_id`, `is_block`, `is_follow`, `is_liked`, `liked_on`, `followed_on`, `blocked_on`) VALUES
(1, 3, 1, 'No', 'No', 'No', '0000-00-00 00:00:00', '2021-07-03 10:34:24', '0000-00-00 00:00:00'),
(2, 6, 2, 'Yes', 'Yes', 'No', '0000-00-00 00:00:00', '2021-10-02 13:38:22', '2021-10-02 13:40:29'),
(3, 6, 1, 'No', 'No', 'Yes', '2021-10-22 09:52:30', '2021-11-12 14:19:02', '0000-00-00 00:00:00'),
(4, 55, 2, 'No', 'No', 'No', '0000-00-00 00:00:00', '2021-10-04 13:34:54', '2021-10-04 13:35:21'),
(5, 55, 1, 'No', 'Yes', 'No', '0000-00-00 00:00:00', '2021-11-10 12:45:00', '0000-00-00 00:00:00'),
(6, 59, 1, 'No', 'No', 'No', '0000-00-00 00:00:00', '2021-10-05 11:42:01', '0000-00-00 00:00:00'),
(7, 64, 2, 'Yes', 'No', 'No', '0000-00-00 00:00:00', '2021-11-15 11:06:54', '2021-10-25 12:48:22'),
(8, 57, 1, 'No', 'Yes', 'No', '0000-00-00 00:00:00', '2021-11-15 08:25:40', '0000-00-00 00:00:00'),
(9, 67, 54, 'No', 'Yes', 'No', '0000-00-00 00:00:00', '2021-11-30 13:33:49', '0000-00-00 00:00:00'),
(10, 71, 58, 'No', 'Yes', 'No', '0000-00-00 00:00:00', '2022-01-27 07:12:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_educations`
--

CREATE TABLE `jobseeker_educations` (
  `id` int(225) NOT NULL,
  `js_id` int(11) NOT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `degree_id` int(11) NOT NULL DEFAULT 0,
  `professional_title` varchar(100) DEFAULT NULL,
  `specilization` varchar(100) DEFAULT NULL,
  `passing_year` date DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_educations`
--

INSERT INTO `jobseeker_educations` (`id`, `js_id`, `institute_name`, `degree_id`, `professional_title`, `specilization`, `passing_year`, `is_deleted`, `updated_at`) VALUES
(1, 4, 'Yes', 8, '', '', '2024-02-01', 'No', '2024-02-12 00:43:29'),
(2, 8, 'Pune University', 2, 'Tester', 'Social Science', '2018-10-10', 'No', '2024-01-25 01:52:04'),
(3, 10, 'Pune University', 11, '--', 'Account', '2020-10-10', 'No', '2024-01-29 09:59:28'),
(4, 7, 'Mumbaiddd', 9, '', '', '2021-06-08', 'No', '2024-02-20 05:57:35'),
(5, 5, 'Puned', 10, '', '', '2023-06-15', 'No', '2024-02-13 07:48:16'),
(6, 6, 'Pune', 18, '', 'Civil', '2020-06-07', 'No', '2024-02-16 08:04:23'),
(7, 13, 'pune', 12, '', 'Marathi', '2021-06-08', 'No', '2024-02-08 05:09:15'),
(8, 41, 'NA fdfd', 4, '', 'NAfdfd', '2024-03-01', 'No', '2024-02-13 07:40:55'),
(9, 37, 'Pune', 2, '', 'SC', '2021-10-12', 'No', '2024-02-21 02:57:01'),
(10, 42, '', 5, '', 'fdfd', '2024-02-21', 'No', '2024-02-21 04:58:32'),
(11, 44, 'Pune', 2, NULL, 'SC', '2024-02-21', 'No', '2024-02-21 05:47:17'),
(12, 45, 'Pune', 17, NULL, 'Computer', '2023-12-06', 'No', '2024-02-22 00:34:38'),
(13, 47, '', 6, NULL, '', NULL, 'No', '2024-02-23 08:26:03'),
(14, 48, '', 5, NULL, '', NULL, 'No', '2024-02-23 04:32:40'),
(15, 46, 'MU', 2, NULL, 'MCA', '2024-02-22', 'No', '2024-02-24 12:49:01'),
(16, 56, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-11 12:38:06'),
(17, 57, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-11 12:39:15'),
(18, 58, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-12 04:40:31'),
(19, 59, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 07:47:09'),
(20, 61, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 11:14:25'),
(21, 62, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 11:17:08'),
(22, 64, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-15 04:43:33'),
(23, 70, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-30 06:39:21'),
(24, 71, NULL, 0, NULL, NULL, NULL, 'No', '2024-03-30 08:13:40'),
(25, 72, NULL, 0, NULL, NULL, NULL, 'No', '2024-04-01 04:54:56'),
(26, 73, NULL, 0, NULL, NULL, NULL, 'No', '2024-04-02 05:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_exps`
--

CREATE TABLE `jobseeker_exps` (
  `id` int(225) NOT NULL,
  `js_id` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(100) NOT NULL DEFAULT 'NA',
  `work_industry_id` int(11) DEFAULT NULL,
  `work_desination_id` int(11) NOT NULL DEFAULT 0,
  `annual_salary` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_exps`
--

INSERT INTO `jobseeker_exps` (`id`, `js_id`, `company_name`, `work_industry_id`, `work_desination_id`, `annual_salary`, `joining_date`, `ending_date`, `is_deleted`, `updated_at`) VALUES
(1, 4, 'fdfdfd', 0, 25, '1', '2024-01-26', '2024-02-29', 'No', '2024-02-12 01:10:39'),
(2, 8, 'Sgp2', 73, 5, '1500001', '2021-02-02', '2020-06-09', 'No', '2024-01-25 02:59:35'),
(3, 10, 'Jobca', 76, 16, '1200', '2021-07-08', '2024-01-26', 'No', '2024-01-29 10:03:51'),
(4, 7, 'Angeldd', 0, 30, '566,2625,2527', '2021-06-30', '2021-11-18', 'No', '2024-02-20 05:57:21'),
(5, 5, 'Angel11d', 0, 9, '2623', '2022-06-15', '2023-10-17', 'No', '2024-02-13 07:24:18'),
(6, 41, 'NAa', NULL, 9, NULL, '2024-02-22', '2024-02-27', 'No', '2024-02-13 13:13:20'),
(7, 37, 'Mail', NULL, 10, NULL, '2022-06-21', '2024-01-16', 'No', '2024-02-21 05:59:28'),
(8, 42, 'test', NULL, 8, NULL, NULL, NULL, 'No', '2024-02-21 03:13:12'),
(9, 44, 'egerg', NULL, 11, NULL, '2024-02-07', '2024-02-21', 'No', '2024-02-21 05:48:02'),
(10, 45, 'Angel', NULL, 12, NULL, '2022-12-08', '2023-12-07', 'No', '2024-02-22 00:41:05'),
(11, 6, 'fdgsdh', NULL, 14, NULL, '2022-12-15', '2024-02-16', 'No', '2024-02-23 07:17:34'),
(12, 47, 'trial', NULL, 13, NULL, NULL, NULL, 'No', '2024-02-23 08:26:29'),
(13, 48, 'fhshg', NULL, 11, NULL, '2023-02-16', '2024-02-23', 'No', '2024-02-23 09:25:37'),
(14, 46, 'ABCS', NULL, 3, NULL, '2024-02-28', '2024-02-27', 'No', '2024-02-24 05:43:44'),
(15, 13, 'Angel', NULL, 13, NULL, '2024-02-06', '2024-02-27', 'No', '2024-02-28 07:17:40'),
(16, 56, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-11 12:38:06'),
(17, 57, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-11 12:39:15'),
(18, 58, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-12 04:40:31'),
(19, 59, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 07:47:09'),
(20, 61, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 11:14:25'),
(21, 62, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-13 11:17:08'),
(22, 64, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-15 04:43:33'),
(23, 70, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-30 06:39:21'),
(24, 71, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-03-30 08:13:40'),
(25, 72, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-04-01 04:54:56'),
(26, 73, 'NA', NULL, 0, NULL, NULL, NULL, 'No', '2024-04-02 05:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_payments`
--

CREATE TABLE `jobseeker_payments` (
  `id` int(11) NOT NULL,
  `order_id` longtext NOT NULL,
  `js_id` int(225) NOT NULL,
  `plan_id` int(225) NOT NULL,
  `payment_id` longtext DEFAULT NULL,
  `payment_amount` int(255) NOT NULL,
  `pay_method` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '[1 = Pending,  2 = Rejected,  3 = Confirm ]',
  `confirm_by` int(11) DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_payments`
--

INSERT INTO `jobseeker_payments` (`id`, `order_id`, `js_id`, `plan_id`, `payment_id`, `payment_amount`, `pay_method`, `status`, `confirm_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(26, '20240224091502', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 09:15:02', '2024-02-24 08:15:04'),
(27, '20240224091533', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 09:15:33', '2024-02-24 08:15:34'),
(28, '20240224095650', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 09:56:50', '2024-02-24 08:56:51'),
(29, '20240224100210', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 10:02:10', '2024-02-24 09:02:11'),
(30, '20240224101230', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 10:12:30', '2024-02-24 09:12:31'),
(31, '20240224101247', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 10:12:47', '2024-02-24 09:12:48'),
(32, '20240224113617', 37, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 11:36:17', '2024-02-24 10:36:19'),
(33, '20240224113636', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 11:36:36', '2024-02-24 10:36:37'),
(34, '20240224113643', 37, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 11:36:43', '2024-02-24 10:36:45'),
(35, '20240224114246', 37, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-02-24 11:42:46', '2024-02-24 10:42:48'),
(36, '20240224142639', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 14:26:39', '2024-02-24 13:26:40'),
(37, '20240224142655', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-24 14:26:55', '2024-02-24 13:26:56'),
(38, '20240227095316', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-27 09:53:16', '2024-02-27 08:53:17'),
(39, '20240227095417', 46, 2, NULL, 40, 'Flywire', 1, NULL, 'No', '2024-02-27 09:54:17', '2024-02-27 08:54:18'),
(40, '20240227095700', 46, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-02-27 09:57:00', '2024-02-27 08:57:01'),
(41, '20240301063126', 50, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-03-01 06:31:26', '2024-03-01 05:31:27'),
(42, '20240301063336', 50, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-03-01 06:33:36', '2024-03-01 05:33:38'),
(43, '20240301064010', 50, 2, NULL, 50, 'Flywire', 1, NULL, 'No', '2024-03-01 06:40:10', '2024-03-01 05:40:11'),
(44, '20240301064301', 50, 3, NULL, 70, 'Flywire', 1, NULL, 'No', '2024-03-01 06:43:01', '2024-03-01 05:43:02'),
(49, '20240313095806', 5, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-03-13 09:58:06', '2024-03-13 08:58:07'),
(50, '20240313095820', 7, 3, '', 70, 'ADMIN', 3, 41, 'No', '2024-03-13 09:58:20', '2024-03-13 08:58:20'),
(51, '20240313095832', 13, 3, '', 70, 'ADMIN', 3, 41, 'No', '2024-03-13 09:58:32', '2024-03-13 08:58:32'),
(52, '20240315073212', 64, 2, '', 50, 'ADMIN', 3, 41, 'No', '2024-03-15 07:32:12', '2024-03-15 06:32:12'),
(53, '20240315073329', 64, 1, '', 0, 'ADMIN', 3, 41, 'No', '2024-03-15 07:33:29', '2024-03-15 06:33:29'),
(54, '20240330073438', 5, 1, '', 850, 'ADMIN', 3, 41, 'No', '2024-03-30 07:34:38', '2024-03-30 06:34:38'),
(55, '20240330122251', 5, 2, '', 500, 'ADMIN', 3, 41, 'No', '2024-03-30 12:22:51', '2024-03-30 11:22:51'),
(56, '20240401113357', 72, 1, '', 0, 'ADMIN', 3, 41, 'No', '2024-04-01 11:33:57', '2024-04-01 09:33:57'),
(57, '20240402080001', 73, 2, '', 500, 'ADMIN', 3, 41, 'No', '2024-04-02 08:00:01', '2024-04-02 06:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_plan`
--

CREATE TABLE `jobseeker_plan` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_type` enum('Free','Paid') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Paid',
  `plan_currency` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plan_amount` double NOT NULL,
  `plan_duration` int(11) NOT NULL,
  `plan_offers` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `highlight_job_limit` int(11) NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No',
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobseeker_plan`
--

INSERT INTO `jobseeker_plan` (`id`, `status`, `plan_name`, `plan_type`, `plan_currency`, `plan_amount`, `plan_duration`, `plan_offers`, `highlight_job_limit`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'APPROVED', 'Free', 'Paid', 'Euro', 0, 3, 'RESUME HIGHLIGHTER', 3, 'No', '', '2024-03-30 04:36:59'),
(2, 'UNAPPROVED', 'Bronzedd', 'Paid', 'Euro', 500, 3, 'RESUME HIGHLIGHTER', 3, 'No', '', '2024-04-01 11:24:17'),
(3, 'UNAPPROVED', 'Freeddd', 'Paid', 'Euro', 0, 3, 'RESUME HIGHLIGHTER', 3, 'Yes', '', '2024-03-26 09:12:36'),
(4, 'APPROVED', 'Gold', 'Paid', 'EUR', 660, 1000, 'RESUME HIGHLIGHTER', 34, 'Yes', '', '2024-03-11 09:56:00'),
(5, 'APPROVED', 'GOLD', 'Paid', 'EUR', 2000, 100, 'RESUME HIGHLIGHTER', 5, 'Yes', '', '2024-03-11 09:56:00'),
(6, '', 'fdfd', 'Paid', 'Indian Rupee', 0, 6, NULL, 6, 'Yes', '2024-03-21 12:37:10', '2024-03-22 08:52:16'),
(7, 'APPROVED', 'dfdfd', 'Paid', 'Indian Rupee', 10, 6, NULL, 6, 'Yes', '2024-03-21 12:37:47', '2024-03-22 08:52:16'),
(8, '', 'Test', 'Paid', 'Euro', 100, 3, NULL, 3, 'Yes', '2024-03-22 05:32:09', '2024-03-22 08:41:43'),
(9, 'APPROVED', 'Test1', 'Paid', 'Euro', 200, 3, NULL, 3, 'Yes', '2024-03-22 05:33:51', '2024-03-22 08:41:43'),
(10, '', 'Test2', 'Paid', 'Indian Rupee', 300, 6, NULL, 6, 'Yes', '2024-03-22 05:40:30', '2024-03-22 08:41:43'),
(11, 'UNAPPROVED', 'Free', 'Paid', 'US Dollar', 10, 6, NULL, 6, 'Yes', '2024-03-22 09:52:30', '2024-03-27 04:47:57'),
(12, 'UNAPPROVED', 'testf', 'Paid', 'Euro', 11, 6, NULL, 10, 'Yes', '2024-04-01 12:37:15', '2024-04-02 08:57:58'),
(13, 'UNAPPROVED', 'test', 'Paid', 'Euro', 10000, 6, NULL, 12, 'Yes', '2024-04-01 12:49:53', '2024-04-01 11:07:07'),
(14, 'UNAPPROVED', 'Silver', 'Paid', 'Euro', 300, 5, NULL, 5, 'Yes', '2024-04-02 10:48:23', '2024-04-02 08:57:58'),
(15, 'UNAPPROVED', 'Gold', 'Paid', 'Euro', 700, 6, NULL, 3, 'No', '2024-04-02 10:55:33', '2024-04-02 09:07:31'),
(16, 'UNAPPROVED', 'try', 'Paid', 'Euro', 510, 2, NULL, 5, 'No', '2024-04-02 11:27:22', '2024-04-02 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_plan_services`
--

CREATE TABLE `jobseeker_plan_services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `status` enum('UNAPPROVED','APPROVED') NOT NULL,
  `is_deleted` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobseeker_plan_services`
--

INSERT INTO `jobseeker_plan_services` (`id`, `service_title`, `service_description`, `service_image`, `status`, `is_deleted`) VALUES
(1, 'RESUME VIEW', 'Showcase your resume to top placement consultants & employers @ Angel-Jobs.com so you can land your dream job. Our exclusive RESUME VIEW feature will ensure that your profile is seen by every verified recruiter that falls under your career segment, by notifying them that you are actively looking for a job. We will also routinely forward your resumes to the most relevant job openings posted by recruiters and employers that match your set preferences.', 'be5654b4bdc9fb1ed85eb24d5f855cb7.png', 'APPROVED', 'No'),
(2, 'FEATURES OF RESUME VIEW', 'Helps your job search by ensuring your active presence in the job market Ensures constant visibility among verified recruiters within your industry segment Improves your chance of landing the right job', 'ccfb7c33f2f966f73ec64973d7a8d9f5.png', 'APPROVED', 'No'),
(3, 'SKILL HIGHLIGHTER', 'Highlight your skill-set with our special feature Skill Highlighter, and let the recruiters know that you are their perfect candidate, in an instant. Angel-Jobs SKILL HIGHLIGHTER gives your resume a lead in terms of exposure to recruiters. With the focus on your skills, you can draw a recruiter`s immediate attention to particular expertise or competence by highlighting specific skill sets, thus enabling brighter career possibilities.', 'b80c68212c97d4e25e489c0ad3ab2665.png', 'APPROVED', 'No'),
(4, 'FEATURES OF SKILL HIGHLIGHTER', 'Brings your resume to the forefront during resume searches Grabs potential employers immediate attention & view Helps you receive interview calls from the right employer', '9ebe97212e232762c701135198a7cbdc.png', 'APPROVED', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_profiles`
--

CREATE TABLE `jobseeker_profiles` (
  `id` int(225) NOT NULL,
  `js_id` int(11) NOT NULL,
  `designaiton` int(11) DEFAULT NULL,
  `skill` varchar(100) DEFAULT NULL,
  `prefered_location` int(11) DEFAULT NULL,
  `total_exp_year` int(11) DEFAULT NULL,
  `total_exp_month` int(11) DEFAULT NULL,
  `curr_salary` varchar(100) DEFAULT NULL,
  `expected_salary` int(11) DEFAULT NULL,
  `industry` int(11) DEFAULT NULL,
  `functional_area` int(11) DEFAULT NULL,
  `proflie_summary` longtext DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `martial_status` int(11) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `prefered_job_type` int(11) DEFAULT NULL,
  `prefered_industry` int(11) DEFAULT NULL,
  `passport_no` varchar(100) DEFAULT NULL,
  `work_permit` enum('Yes','No') DEFAULT NULL,
  `is_hadicaped` enum('Yes','No') DEFAULT 'No',
  `lang_skills` varchar(100) DEFAULT NULL,
  `notice_period` int(11) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `full_address` longtext DEFAULT NULL,
  `facebook_link` longtext DEFAULT NULL,
  `insta_link` longtext DEFAULT NULL,
  `twitter_link` longtext DEFAULT NULL,
  `linkedin` longtext DEFAULT NULL,
  `resume_link` longtext DEFAULT NULL,
  `left_plan_credit_highlight` int(11) DEFAULT NULL,
  `free_assign_highlight` int(11) DEFAULT NULL,
  `assign_by` int(11) DEFAULT NULL,
  `plan_start_from` date DEFAULT NULL,
  `plan_expired_on` date DEFAULT NULL,
  `last_payment_recieved_id` int(11) DEFAULT NULL,
  `last_payment_recieved` varchar(100) DEFAULT NULL,
  `last_payment_recieved_on` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_profiles`
--

INSERT INTO `jobseeker_profiles` (`id`, `js_id`, `designaiton`, `skill`, `prefered_location`, `total_exp_year`, `total_exp_month`, `curr_salary`, `expected_salary`, `industry`, `functional_area`, `proflie_summary`, `dob`, `gender`, `martial_status`, `nationality`, `country`, `city`, `prefered_job_type`, `prefered_industry`, `passport_no`, `work_permit`, `is_hadicaped`, `lang_skills`, `notice_period`, `postal_code`, `full_address`, `facebook_link`, `insta_link`, `twitter_link`, `linkedin`, `resume_link`, `left_plan_credit_highlight`, `free_assign_highlight`, `assign_by`, `plan_start_from`, `plan_expired_on`, `last_payment_recieved_id`, `last_payment_recieved`, `last_payment_recieved_on`, `updated_at`) VALUES
(1, 4, 85, '1', 343, 4, 1, '', 6, 80, 8, 'testfdfd', '2024-01-19', 'Others', 5, 'test', 4, 'NA', 17, 98, 'test', 'Yes', 'Yes', '3', 1, 'test', 'tset', '', 'http://localhost:8000/jobseeker/jobseeker-profile', 'http://localhost:8000/jobseeker/jobseeker-profile', 'http://localhost:8000/jobseeker/jobseeker-profile', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 02:00:46'),
(2, 5, 8, '2623', 344, 1, 1, '0', 5, 75, 6, 'freshera', '1995-06-07', 'Female', 5, '25787d', 52, '341d', 19, 111, 'R100s', 'Yes', NULL, '2', 2, 'yfdf5325dd', '2555365d', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/NQ%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/NQ%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/NQ%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/NQ%3D%3D', '', 3, NULL, 41, '2024-03-30', '2024-04-02', 55, NULL, '2024-03-30', '2024-03-30 05:59:21'),
(3, 6, 1, '1,2,3,2,3,1', 335, 3, 3, '30000', 5, 73, 1, 'ggerger', '1995-10-10', 'Male', 3, 'Indian', 1, 'gdsg', 17, 149, '', 'No', NULL, '1,2,3,2,1,3', 1, '410254', 'Madina,Malta', 'https://angel-jobs.fr/1', 'https://angel-jobs.fr/2', 'https://angel-jobs.fr/3', 'https://angel-jobs.fr/4', 'resume.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 01:54:52'),
(4, 7, 9, '566,2625,2527', 346, 7, 4, '0100', 6, 74, 2, 'fresher', '2017-07-05', 'Male', 5, 'Indiandd', 39, '33dd9', 16, 111, 'NAdd', 'No', NULL, '10,4,13,27,15', 3, '123ddd', 'mumbaiddd', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/Nw%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/Nw%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/Nw%3D%3D', 'http://192.168.1.8:8000/admin/jobseeker-edit-view/Nw%3D%3D', '', 50, NULL, 41, '2024-03-13', '2024-09-09', 50, NULL, '2024-03-13', '2024-03-30 05:50:31'),
(5, 8, 10, '5,6,7', 337, 0, 4, '10000', NULL, 77, 13, 'ffjk', '1995-10-10', 'Male', 3, '', 1, '341', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '', '', '', '', '', 'resume.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-25 06:01:23'),
(6, 10, 146, '33,76', 341, 4, 3, '100', NULL, 76, 10, 'job search', '1995-10-10', 'Male', 3, 'Indian', 1, '339', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'BKR 1210', 'Birkirkara,India', '', '', '', '', 'resume.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 08:51:56'),
(7, 11, 1, '2625,24,2', 2, 1, NULL, '452222', NULL, NULL, 11, 'test', '2024-01-26', 'Female', 1, 'test', 2, '337', 0, 0, '566666', 'Yes', 'No', '', 1, 'DFDD', 'ADDRESS', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'resume.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 11:16:45'),
(8, 37, 1, '1649,972,1649,972,1649,972,1649,972', 346, 1, NULL, '010', 3, NULL, 1, 'wefweagf', '', 'Male', 3, 'Indian', 1, 'mh', 16, 150, 'R10101', 'Yes', 'No', '27,2,3,13,27,2,13,3,27,2,13,3,27,2,13,3', 2, 'BKR 1010', 'Mumbai', 'gd', 'xbx', 'bxb', 'xbxb', '37_1709272651.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 01:44:58'),
(9, 41, 9, '2623', 344, 3, NULL, '10', 3, NULL, 6, 'dfd', '', '', 0, 'INS', 1, 'jhh', 17, 156, '', 'No', 'No', '4', 5, '55F5DF5D', 'FFDF', '', '', '', '', '41_1709029453.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 04:54:13'),
(10, 42, 12, '2623,566', 344, 7, NULL, '250000', 4, NULL, 7, 'ffdffdf', '2024-02-15', 'Female', 3, 'fdf', 31, '336', 16, 77, 'ffddffd', 'No', 'No', '4', 2, 'fdfdf', 'dfdfd', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', 'http://192.168.1.11:8000/jobseeker/jobseeker-profile', '42_1708503329.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 06:49:07'),
(11, 44, 10, '972,1213,966', 350, 6, NULL, '100', 4, NULL, 4, 'bbrbrf', '2024-02-21', 'Male', 5, 'Indian', 33, 'Mumbai', 19, 150, 'rvger', 'Yes', 'No', '10,4,3', 4, 'dfg3832', 'rtghsrte', 'fdg', 'egs', 'gee', 'eg', '44_1708513888.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 05:41:28'),
(12, 46, 8, '1649,2623,2625,566,2625', 349, 1, NULL, '', 6, NULL, 29, '', '', 'Male', 3, 'in', 37, 'lhkl', 17, 149, '', NULL, 'No', '29,13,3,14,31', 4, '', '', '', '', '', '', '46_1708752515.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 03:23:02'),
(13, 45, 26, '566,1213,566,1213', 349, 8, NULL, '', 5, NULL, 23, 'cdcawsd', '2021-02-03', 'Female', 4, 'Indian', 32, 'Birgu', 16, 75, 'vfdg', 'No', 'No', '4,3,4,3', 4, '1222', 'mh', '', '', '', '', '45_1708605447.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 07:07:27'),
(14, 47, 9, '1649,972,1213', 344, 1, NULL, '', 4, NULL, 31, 'Fhjvhhj', '1996-02-15', '', 0, 'indian', 36, 'nhffg', 17, 161, 'R1456', 'No', 'No', '3,11,31', 4, '', '', '', '', '', '', '47_1708676659.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 03:46:43'),
(15, 48, 15, '2527', 396, 1, NULL, '', 6, NULL, 11, 'Hvvjvjv', '2022-02-16', '', 0, 'indian', 41, 'maharashtra', 16, 105, '', 'No', 'No', '6,12', 5, '', '', '', '', '', '', '48_1708680681.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 04:01:21'),
(16, 49, 9, '2623,2625,566', 344, 7, NULL, '100', 3, NULL, 11, 'testing', '2001-02-10', 'Male', 0, 'Indian', 35, 'Birgu', 17, 151, '', 'Yes', 'No', '27,15,2', 4, '', '', '', '', '', '', '49_1709031757.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 06:39:55'),
(17, 13, 16, '2623,2625,566', 344, 7, NULL, '100', 2, NULL, 10, 'Accountant', '1997-02-26', 'Female', 4, 'Indian', 36, 'Samoa', 17, 76, 'R100', 'Yes', 'No', '2,3,31', 4, 'SAm10', 'America', 'asd', 'asd', 'asd', 'asd', '13_1709104557.pdf', 50, NULL, 41, '2024-03-13', '2024-09-09', 51, NULL, '2024-03-13', '2024-03-01 07:16:25'),
(18, 51, 77, '2527,878', 349, 1, NULL, '100', 2, NULL, 41, 'testing', '1996-03-29', 'Male', 3, 'Indian', 34, 'Mumbai', 16, 79, 'R100', 'Yes', 'No', '2', 3, '', '', '', '', '', '', '51_1709210745.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 07:15:45'),
(19, 50, 8, '2535', 346, 3, NULL, '', 3, NULL, 32, '', '', '', 0, 'INS', 32, 'Mumbai', 17, 136, '', NULL, 'No', '11', 4, '', '', '', '', '', '', '50_1709270604.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 05:23:24'),
(23, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-11', '2024-06-09', NULL, NULL, NULL, '2024-03-11 12:38:06'),
(24, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-11', '2024-06-09', NULL, NULL, NULL, '2024-03-11 12:39:15'),
(25, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-12', '2024-06-10', NULL, NULL, NULL, '2024-03-12 04:40:31'),
(26, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-13', '2024-06-11', NULL, NULL, NULL, '2024-03-13 07:47:09'),
(27, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-13', '2024-06-11', NULL, NULL, NULL, '2024-03-13 11:14:25'),
(28, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 41, '2024-03-13', '2024-06-11', NULL, NULL, NULL, '2024-03-13 11:17:08'),
(29, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 41, '2024-03-15', '2024-04-14', 53, NULL, '2024-03-15', '2024-03-15 04:43:33'),
(30, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 41, '2024-03-30', '2024-06-28', NULL, NULL, NULL, '2024-03-30 06:39:21'),
(31, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 41, '2024-03-30', '2024-06-28', NULL, NULL, NULL, '2024-03-30 08:13:40'),
(32, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 41, '2024-04-01', '2024-04-04', 56, NULL, '2024-04-01', '2024-04-01 04:54:56'),
(33, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 41, '2024-04-02', '2024-04-05', 57, NULL, '2024-04-02', '2024-04-02 05:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_qualification_level`
--

CREATE TABLE `jobseeker_qualification_level` (
  `id` int(15) NOT NULL,
  `qualification_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='This table for getting qualification like , diploma , graduate ,Master , phd etc';

--
-- Dumping data for table `jobseeker_qualification_level`
--

INSERT INTO `jobseeker_qualification_level` (`id`, `qualification_name`, `status`, `is_deleted`) VALUES
(1, 'Graduate', 'APPROVED', 'No'),
(2, 'Post Graduate', 'APPROVED', 'No'),
(3, 'Doctorate', 'APPROVED', 'No'),
(4, 'Class X', 'APPROVED', 'Yes'),
(6, 'Class XII', 'APPROVED', 'Yes'),
(7, 'N Demo', 'APPROVED', 'Yes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jobseeker_view`
-- (See below for the actual view)
--
CREATE TABLE `jobseeker_view` (
`id` int(225)
,`js_id` int(11)
,`designaiton` int(11)
,`skill` varchar(100)
,`prefered_location` int(11)
,`total_exp_year` int(11)
,`total_exp_month` int(11)
,`curr_salary` varchar(100)
,`expected_salary` int(11)
,`industry` int(11)
,`functional_area` int(11)
,`proflie_summary` longtext
,`dob` varchar(100)
,`gender` varchar(10)
,`martial_status` int(11)
,`nationality` varchar(100)
,`work_permit` enum('Yes','No')
,`is_hadicaped` enum('Yes','No')
,`lang_skills` varchar(100)
,`passport_no` varchar(100)
,`notice_period` int(11)
,`prefered_job_type` int(11)
,`prefered_industry` int(11)
,`country` int(11)
,`city` varchar(100)
,`postal_code` varchar(100)
,`full_address` longtext
,`facebook_link` longtext
,`insta_link` longtext
,`twitter_link` longtext
,`resume_link` longtext
,`linkedin` longtext
,`updated_at` timestamp
,`fullname` varchar(100)
,`email` varchar(100)
,`email_verified` enum('Yes','No')
,`mob_code` varchar(100)
,`mobile` varchar(100)
,`profile_img` longtext
,`is_delete` enum('Yes','No')
,`created_at` varchar(100)
,`qual_name` varchar(255)
,`professional_title` varchar(100)
,`specilization` varchar(100)
,`passing_year` date
,`qul_id` int(11)
,`institute_name` varchar(100)
,`company_name` varchar(100)
,`work_industry_id` int(11)
,`work_industry_name` varchar(255)
,`work_desination_id` int(11)
,`work_desination_name` varchar(255)
,`annual_salary` varchar(100)
,`joining_date` date
,`ending_date` date
,`industries_name` varchar(255)
,`role_name` varchar(255)
,`functional_name` varchar(255)
,`prefered_location_name` varchar(255)
,`martial_status_name` varchar(255)
,`country_name` varchar(255)
,`city_name` varchar(100)
,`pref_job_type_name` varchar(255)
,`notice_name` varchar(255)
,`expected_salary_name` varchar(255)
,`experiance_name` varchar(255)
,`pref_indus_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_viewed_employer_contact`
--

CREATE TABLE `jobseeker_viewed_employer_contact` (
  `id` int(255) NOT NULL,
  `js_id` int(255) NOT NULL,
  `employer_id` int(255) NOT NULL DEFAULT 0,
  `last_viewed_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobseeker_viewed_employer_contact`
--

INSERT INTO `jobseeker_viewed_employer_contact` (`id`, `js_id`, `employer_id`, `last_viewed_on`) VALUES
(4, 6, 1, '2021-10-07 07:41:21'),
(3, 6, 2, '2021-10-04 14:05:41'),
(2, 55, 1, '2021-11-19 13:19:05'),
(1, 55, 2, '2021-11-15 06:58:50'),
(5, 55, 45, '2021-11-15 08:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_viewed_jobs`
--

CREATE TABLE `jobseeker_viewed_jobs` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL DEFAULT 0,
  `js_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `update_on` datetime DEFAULT NULL COMMENT 'Job View',
  `saved_on` datetime DEFAULT NULL,
  `is_saved` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='This table saves the jobs that job seeker has viewed';

--
-- Dumping data for table `jobseeker_viewed_jobs`
--

INSERT INTO `jobseeker_viewed_jobs` (`id`, `employer_id`, `js_id`, `job_id`, `update_on`, `saved_on`, `is_saved`) VALUES
(122, 55, 41, 64, '2024-02-16 14:51:36', '2024-02-19 06:23:52', 'No'),
(123, 57, 41, 67, '2024-02-16 12:28:52', '2024-02-16 11:23:37', 'Yes'),
(124, 57, 41, 68, NULL, '2024-02-16 11:35:47', 'Yes'),
(125, 55, 41, 65, '2024-02-16 15:01:29', '2024-02-19 06:23:49', 'No'),
(126, 31, 41, 63, NULL, '2024-02-19 08:13:41', 'No'),
(127, 27, 41, 59, '2024-02-16 11:07:22', '2024-02-19 08:13:25', 'No'),
(128, 17, 41, 45, '2024-02-19 07:38:26', '2024-02-19 06:23:37', 'No'),
(129, 0, 37, 68, '2024-02-15 13:36:49', NULL, 'No'),
(130, 0, 41, 60, '2024-02-15 13:00:34', NULL, 'No'),
(131, 32, 41, 62, '2024-02-19 07:45:07', '2024-02-19 08:13:38', 'No'),
(132, 32, 41, 61, '2024-02-16 14:34:30', '2024-02-19 08:13:35', 'Yes'),
(133, 31, 41, 66, '2024-02-16 14:55:39', '2024-02-19 06:23:54', 'No'),
(134, 0, 41, 69, '2024-02-15 13:09:51', NULL, 'No'),
(135, 0, 41, 33, '2024-02-15 13:10:23', NULL, 'No'),
(136, 57, 7, 68, '2024-02-16 10:02:01', '2024-02-16 12:02:59', 'No'),
(137, 0, 7, 62, '2024-02-16 06:28:48', NULL, 'No'),
(138, 0, 7, 64, '2024-02-16 10:01:55', NULL, 'No'),
(139, 0, 7, 69, '2024-02-16 07:21:52', NULL, 'No'),
(140, 0, 7, 66, '2024-02-16 12:47:46', NULL, 'No'),
(141, 0, 4, 53, '2024-02-16 09:29:40', NULL, 'No'),
(142, 29, 41, 52, '2024-02-16 11:05:07', '2024-02-19 06:24:19', 'Yes'),
(143, 0, 41, 41, '2024-02-16 11:07:16', NULL, 'No'),
(144, 29, 41, 54, '2024-02-19 07:33:13', '2024-02-19 06:24:24', 'Yes'),
(145, 27, 41, 58, '2024-02-16 11:07:07', '2024-02-19 06:32:52', 'Yes'),
(146, 0, 41, 40, '2024-02-16 11:07:11', NULL, 'No'),
(147, 57, 7, 70, '2024-02-16 12:53:12', '2024-02-16 12:18:11', 'No'),
(148, 57, 41, 70, '2024-02-19 09:02:13', '2024-02-19 08:13:18', 'No'),
(149, 0, 7, 53, '2024-02-16 12:05:08', NULL, 'No'),
(150, 0, 7, 47, '2024-02-16 12:46:04', NULL, 'No'),
(151, 0, 7, 63, '2024-02-20 12:33:51', NULL, 'No'),
(152, 17, 41, 47, '2024-02-19 06:31:37', '2024-02-19 06:23:39', 'No'),
(153, 17, 41, 48, '2024-02-16 14:33:49', '2024-02-19 06:31:45', 'Yes'),
(154, 0, 41, 51, '2024-02-16 13:25:24', NULL, 'No'),
(155, 57, 6, 70, '2024-02-16 14:14:19', '2024-02-16 13:31:28', 'Yes'),
(156, 0, 6, 62, '2024-02-16 13:45:35', NULL, 'No'),
(157, 0, 41, 50, '2024-02-16 14:34:23', NULL, 'No'),
(158, 29, 41, 53, NULL, '2024-02-19 06:24:21', 'Yes'),
(159, 17, 41, 56, NULL, '2024-02-19 06:24:26', 'Yes'),
(160, 0, 41, 46, '2024-02-19 06:30:08', NULL, 'No'),
(161, 0, 41, 43, '2024-02-19 07:02:41', NULL, 'No'),
(162, 0, 41, 57, '2024-02-19 07:04:16', NULL, 'No'),
(163, 31, 37, 63, '2024-02-21 07:02:25', '2024-02-19 11:39:15', 'No'),
(164, 57, 37, 70, '2024-02-28 12:51:56', '2024-02-19 13:21:30', 'No'),
(165, 0, 37, 61, '2024-02-28 14:39:17', NULL, 'No'),
(166, 0, 37, 57, '2024-02-19 11:25:29', NULL, 'No'),
(167, 0, 37, 62, '2024-02-28 09:08:42', NULL, 'No'),
(168, 0, 37, 64, '2024-02-28 09:50:03', NULL, 'No'),
(169, 0, 37, 42, '2024-02-19 11:45:06', NULL, 'No'),
(170, 31, 4, 63, NULL, '2024-02-19 12:50:03', 'Yes'),
(171, 17, 4, 48, '2024-02-19 13:01:36', '2024-02-20 06:08:49', 'Yes'),
(172, 0, 4, 46, '2024-02-19 13:01:51', NULL, 'No'),
(173, 0, 4, 52, '2024-02-19 13:21:59', NULL, 'No'),
(174, 57, 4, 70, NULL, '2024-02-19 13:22:39', 'Yes'),
(175, 32, 4, 61, NULL, '2024-02-19 13:22:41', 'Yes'),
(176, 17, 4, 45, '2024-02-19 13:26:31', '2024-02-20 06:08:46', 'Yes'),
(177, 32, 4, 62, NULL, '2024-02-19 13:29:35', 'Yes'),
(178, 0, 4, 42, '2024-02-19 13:29:50', NULL, 'No'),
(179, 73, 37, 73, '2024-02-28 08:08:13', '2024-02-20 12:12:30', 'Yes'),
(180, 0, 37, 72, '2024-02-20 12:12:59', NULL, 'No'),
(181, 0, 37, 71, '2024-02-20 12:13:19', NULL, 'No'),
(182, 73, 7, 73, '2024-02-20 12:14:22', '2024-02-20 12:14:20', 'Yes'),
(183, 0, 7, 72, '2024-02-20 12:30:55', NULL, 'No'),
(184, 0, 41, 73, '2024-02-20 14:56:29', NULL, 'No'),
(185, 0, 41, 71, '2024-02-20 14:08:14', NULL, 'No'),
(186, 0, 41, 72, '2024-02-20 14:08:19', NULL, 'No'),
(187, 0, 7, 74, '2024-02-20 14:29:45', NULL, 'No'),
(188, 73, 42, 73, '2024-02-21 10:35:00', '2024-02-21 12:31:27', 'No'),
(189, 0, 42, 72, '2024-02-21 10:35:46', NULL, 'No'),
(190, 0, 42, 70, '2024-02-21 10:36:07', NULL, 'No'),
(191, 0, 44, 63, '2024-02-21 11:45:54', NULL, 'No'),
(192, 74, 44, 74, '2024-02-21 13:59:53', '2024-02-21 12:56:30', 'Yes'),
(193, 0, 44, 72, '2024-02-21 11:46:56', NULL, 'No'),
(194, 0, 44, 70, '2024-02-21 12:22:33', NULL, 'No'),
(195, 73, 44, 73, '2024-02-21 12:46:31', '2024-02-21 12:19:14', 'Yes'),
(196, 74, 42, 74, NULL, '2024-02-21 12:57:07', 'Yes'),
(197, 73, 42, 71, NULL, '2024-02-21 12:51:12', 'Yes'),
(198, 73, 44, 71, '2024-02-21 12:22:38', '2024-02-21 12:32:20', 'No'),
(199, 32, 44, 61, '2024-02-21 12:22:27', '2024-02-21 12:32:14', 'No'),
(200, 74, 44, 75, '2024-02-21 12:40:51', '2024-02-21 12:38:54', 'Yes'),
(201, 74, 44, 76, '2024-02-21 13:12:38', '2024-02-21 13:12:47', 'Yes'),
(202, 74, 44, 77, '2024-02-21 14:17:27', '2024-02-21 13:16:27', 'Yes'),
(203, 0, 42, 77, '2024-02-21 13:27:31', NULL, 'No'),
(204, 0, 42, 76, '2024-02-21 13:22:09', NULL, 'No'),
(205, 0, 44, 66, '2024-02-21 13:59:19', NULL, 'No'),
(206, 0, 44, 59, '2024-02-21 14:39:17', NULL, 'No'),
(207, 75, 45, 81, '2024-02-22 07:07:02', '2024-02-22 07:11:32', 'Yes'),
(208, 0, 45, 80, '2024-02-22 14:08:02', NULL, 'No'),
(209, 0, 45, 77, '2024-02-22 06:40:16', NULL, 'No'),
(210, 0, 45, 79, '2024-02-22 07:07:09', NULL, 'No'),
(211, 0, 45, 74, '2024-02-22 14:08:27', NULL, 'No'),
(212, 0, 45, 78, '2024-02-22 14:33:35', NULL, 'No'),
(213, 0, 37, 79, '2024-02-28 12:07:56', NULL, 'No'),
(214, 75, 46, 80, '2024-02-22 13:23:35', '2024-02-22 12:14:48', 'Yes'),
(215, 75, 46, 79, '2024-02-22 13:24:45', '2024-02-23 05:44:00', 'Yes'),
(216, 0, 46, 73, '2024-02-22 13:50:11', NULL, 'No'),
(217, 0, 45, 84, '2024-02-22 14:08:07', NULL, 'No'),
(218, 0, 45, 82, '2024-02-22 13:43:34', NULL, 'No'),
(219, 0, 45, 83, '2024-02-22 14:30:47', NULL, 'No'),
(220, 0, 46, 84, '2024-02-22 14:11:27', NULL, 'No'),
(221, 75, 46, 82, '2024-02-23 05:44:08', '2024-02-23 05:44:04', 'Yes'),
(222, 0, 45, 71, '2024-02-22 14:08:36', NULL, 'No'),
(223, 0, 45, 70, '2024-02-22 14:08:46', NULL, 'No'),
(224, 0, 45, 64, '2024-02-22 14:30:50', NULL, 'No'),
(225, 0, 46, 83, '2024-02-22 14:13:23', NULL, 'No'),
(226, 0, 46, 64, '2024-02-22 14:12:46', NULL, 'No'),
(227, 31, 46, 63, NULL, '2024-02-23 05:43:42', 'Yes'),
(228, 32, 46, 61, NULL, '2024-02-23 05:43:45', 'Yes'),
(229, 57, 46, 70, NULL, '2024-02-23 05:43:48', 'Yes'),
(230, 73, 46, 72, '2024-03-04 09:27:46', '2024-02-23 05:43:51', 'Yes'),
(231, 74, 46, 74, NULL, '2024-02-23 05:43:54', 'Yes'),
(232, 74, 46, 77, NULL, '2024-02-23 05:43:57', 'Yes'),
(233, 0, 7, 87, '2024-02-23 08:02:03', NULL, 'No'),
(234, 0, 7, 85, '2024-02-23 07:56:39', NULL, 'No'),
(235, 0, 7, 80, '2024-02-23 07:56:18', NULL, 'No'),
(236, 0, 7, 88, '2024-02-23 07:58:14', NULL, 'No'),
(237, 0, 7, 86, '2024-02-23 08:02:08', NULL, 'No'),
(238, 78, 47, 85, '2024-02-23 09:55:42', '2024-02-23 09:38:55', 'No'),
(239, 78, 47, 88, '2024-02-23 09:54:19', '2024-02-23 09:35:54', 'Yes'),
(240, 78, 47, 87, NULL, '2024-02-23 09:37:13', 'Yes'),
(241, 0, 47, 86, '2024-02-23 12:48:54', NULL, 'No'),
(242, 0, 47, 89, '2024-02-23 12:47:57', NULL, 'No'),
(243, 0, 48, 88, '2024-02-23 10:38:46', NULL, 'No'),
(244, 0, 47, 29, '2024-02-23 12:05:34', NULL, 'No'),
(245, 0, 47, 27, '2024-02-23 12:05:45', NULL, 'No'),
(246, 0, 48, 89, '2024-02-23 12:47:10', NULL, 'No'),
(247, 0, 47, 79, '2024-02-23 12:49:24', NULL, 'No'),
(248, 0, 37, 90, '2024-02-28 14:23:52', NULL, 'No'),
(249, 31, 46, 91, NULL, '2024-02-27 06:53:22', 'Yes'),
(250, 78, 46, 89, NULL, '2024-02-27 07:01:36', 'Yes'),
(251, 29, 46, 52, NULL, '2024-02-27 07:01:58', 'Yes'),
(252, 78, 46, 88, NULL, '2024-02-27 07:02:02', 'Yes'),
(253, 31, 46, 90, NULL, '2024-02-27 07:02:15', 'Yes'),
(254, 22, 46, 41, NULL, '2024-02-27 07:02:19', 'Yes'),
(255, 19, 46, 16, NULL, '2024-02-27 07:45:41', 'Yes'),
(256, 31, 49, 91, '2024-02-27 13:46:06', '2024-02-27 12:03:00', 'Yes'),
(257, 78, 49, 86, '2024-02-27 13:21:41', '2024-02-27 13:21:26', 'No'),
(258, 0, 49, 80, '2024-02-27 13:21:46', NULL, 'No'),
(259, 0, 49, 77, '2024-02-27 13:46:40', NULL, 'No'),
(260, 78, 37, 86, '2024-02-28 14:25:29', '2024-02-28 14:25:27', 'Yes'),
(261, 0, 37, 89, '2024-02-28 14:06:27', NULL, 'No'),
(262, 0, 37, 91, '2024-02-28 14:23:25', NULL, 'No'),
(263, 31, 13, 91, NULL, '2024-02-28 08:18:02', 'No'),
(264, 78, 13, 86, NULL, '2024-02-28 08:18:13', 'Yes'),
(265, 0, 13, 90, '2024-02-28 08:18:53', NULL, 'No'),
(266, 0, 13, 47, '2024-02-28 08:18:29', NULL, 'No'),
(267, 32, 13, 62, '2024-02-28 08:22:08', '2024-02-28 08:20:34', 'Yes'),
(268, 0, 13, 65, '2024-02-28 08:23:00', NULL, 'No'),
(269, 0, 37, 83, '2024-02-28 09:47:17', NULL, 'No'),
(270, 32, 37, 92, '2024-03-01 13:02:36', '2024-03-01 13:02:33', 'Yes'),
(271, 0, 37, 11, '2024-02-28 12:55:57', NULL, 'No'),
(272, 0, 37, 93, '2024-02-28 14:19:51', NULL, 'No'),
(273, 22, 37, 41, '2024-02-29 13:59:51', '2024-02-29 13:59:49', 'Yes'),
(274, 32, 50, 93, NULL, '2024-03-01 06:26:48', 'Yes'),
(275, 0, 37, 94, '2024-03-04 09:51:01', NULL, 'No'),
(276, 0, 13, 94, '2024-03-01 13:17:51', NULL, 'No'),
(277, 32, 13, 93, '2024-03-01 13:46:04', '2024-03-01 13:23:35', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_workhistory`
--

CREATE TABLE `jobseeker_workhistory` (
  `id` int(11) NOT NULL,
  `js_id` int(11) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` date DEFAULT NULL,
  `industry` int(11) NOT NULL,
  `functional_area` int(11) NOT NULL,
  `job_role` int(11) NOT NULL,
  `annual_salary` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `currency_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `achievements` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `update_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_application_history`
--

CREATE TABLE `job_application_history` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Employer Pid',
  `job_id` int(11) NOT NULL DEFAULT 0,
  `js_id` int(11) NOT NULL COMMENT 'Jobseeker Pid',
  `is_shortlisted` enum('No','Yes') NOT NULL DEFAULT 'No',
  `applied_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='This table saves the Job Application history of job seeker';

--
-- Dumping data for table `job_application_history`
--

INSERT INTO `job_application_history` (`id`, `employer_id`, `job_id`, `js_id`, `is_shortlisted`, `applied_on`) VALUES
(149, 32, 0, 37, 'No', NULL),
(150, 32, 0, 13, 'Yes', NULL),
(151, 73, 0, 48, 'Yes', NULL),
(152, 32, 0, 4, 'No', NULL),
(153, 73, 0, 41, 'Yes', NULL),
(154, 73, 0, 46, 'No', NULL),
(155, 73, 0, 45, 'Yes', NULL),
(156, 32, 0, 37, 'No', '2024-03-04 09:25:11'),
(157, 0, 72, 46, 'Yes', '2024-03-04 09:27:47'),
(158, 32, 0, 37, 'No', '2024-03-04 09:42:18'),
(159, 32, 0, 37, 'No', '2024-03-04 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_postings`
--

CREATE TABLE `job_postings` (
  `id` int(15) NOT NULL,
  `approval_status` enum('UNAPPROVED','APPROVED') NOT NULL DEFAULT 'UNAPPROVED',
  `job_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `job_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `skill_keyword` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'skill for require job like php,css,html etc',
  `location_hiring` int(11) NOT NULL COMMENT 'hire for which location',
  `no_of_openings` int(11) DEFAULT NULL,
  `link_job` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `job_industry` int(11) NOT NULL,
  `functional_area` int(11) NOT NULL,
  `job_designation` int(11) NOT NULL,
  `work_experience_from` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `work_experience_to` varchar(255) DEFAULT NULL,
  `job_salary_to` varchar(255) DEFAULT NULL,
  `salary_hide` enum('Yes','No') NOT NULL DEFAULT 'No',
  `currency_type` varchar(255) DEFAULT NULL,
  `job_type` int(11) NOT NULL,
  `job_education` int(11) NOT NULL,
  `desire_candidate_profile` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `no_of_views` int(11) DEFAULT NULL COMMENT 'how much time view the post',
  `no_of_like` int(15) DEFAULT NULL,
  `no_of_apply` int(11) DEFAULT NULL COMMENT 'how much apply for the job',
  `posted_by` int(11) DEFAULT NULL COMMENT 'Employer Table pid',
  `admin_posted` varchar(100) NOT NULL DEFAULT 'No',
  `contact_person` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `hide_contact_details` enum('Yes','No') NOT NULL DEFAULT 'No',
  `specialization` varchar(100) DEFAULT NULL,
  `gender` varchar(100) NOT NULL DEFAULT 'Not Specified',
  `posted_on` datetime NOT NULL,
  `status` enum('Live','Inactive') NOT NULL DEFAULT 'Live',
  `job_highlighted` enum('No','Yes') DEFAULT 'No',
  `is_deleted` enum('No','Yes') DEFAULT 'No',
  `job_life` int(11) DEFAULT 0 COMMENT 'Job life days to job expired',
  `job_expired_on` date DEFAULT NULL,
  `required_language` varchar(200) NOT NULL COMMENT 'skill_language',
  `start_date` datetime DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='This table for store posted job data';

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`id`, `approval_status`, `job_title`, `job_description`, `skill_keyword`, `location_hiring`, `no_of_openings`, `link_job`, `job_industry`, `functional_area`, `job_designation`, `work_experience_from`, `work_experience_to`, `job_salary_to`, `salary_hide`, `currency_type`, `job_type`, `job_education`, `desire_candidate_profile`, `no_of_views`, `no_of_like`, `no_of_apply`, `posted_by`, `admin_posted`, `contact_person`, `contact_email`, `contact_phone`, `hide_contact_details`, `specialization`, `gender`, `posted_on`, `status`, `job_highlighted`, `is_deleted`, `job_life`, `job_expired_on`, `required_language`, `start_date`, `update_at`) VALUES
(8, 'UNAPPROVED', 'Teacher', '&lt;ul&gt;\r\n	&lt;li&gt;Role:&amp;nbsp;&lt;a href=&quot;http://localhost:8000/job-details#&quot; target=&quot;_blank&quot;&gt;Front End Developer&lt;/a&gt;&lt;/li&gt;\r\n	&lt;li&gt;Industry Type:&amp;nbsp;&lt;a href=&quot;http://localhost:8000/job-details#&quot; target=&quot;_blank&quot;&gt;Management Consulting&lt;/a&gt;&lt;/li&gt;\r\n	&lt;li&gt;Department:&amp;nbsp;&lt;a href=&quot;http://localhost:8000/job-details#&quot; target=&quot;_blank&quot;&gt;Engineering - Software &amp;amp; QA&lt;/a&gt;&lt;/li&gt;\r\n	&lt;li&gt;Employment Type:&amp;nbsp;Full Time, Permanent&lt;/li&gt;\r\n	&lt;li&gt;Role Category:&amp;nbsp;Software Development&lt;/li&gt;\r\n&lt;/ul&gt;', '7,9', 340, 12, NULL, 79, 12, 10, '2', NULL, NULL, 'Yes', NULL, 19, 6, NULL, NULL, NULL, NULL, 17, 'No', 'tes', 'taset@gmai.com', '00000', 'No', 'test', 'Female', '2024-01-19 00:00:00', 'Live', 'No', 'No', 0, '2024-01-22', '5,4', '2024-02-26 00:00:00', '2024-03-07 13:04:24'),
(9, 'UNAPPROVED', 'Php Developer', '&lt;table align=&quot;center&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; style=&quot;width:100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;You&amp;rsquo;ll find plenty of options at our&amp;nbsp;&lt;a href=&quot;https://mcafeeinc-mkt-prod2-t.adobe-campaign.com/r/?id=hc4006c5a,6675510f,667552d4&amp;amp;e=cDE9MjAyNF8wMV8xN19SRVRfQ2hQX01vbnRoMl9PbmJvYXJkaW5nX0VtYWlsX0RNMjc1NjA4MyZwMj1ETTI3NTYwODMmcDM9ZE90TnhCTkRhZzVUSnk2UzctY3d1Z01FRVp0NW5pVzFDUm82bXcyS05URnFkNkNvU1VZcDFRdjl3bEVoWnRJWjA&amp;amp;s=4KZV0iKjs6MvvQQd-xF17xgq8lsPnNgt-0ouMhWD8Ao&quot; target=&quot;_blank&quot;&gt;Support Center&lt;/a&gt;&amp;nbsp;including:&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;table cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;\r\n				&lt;tbody&gt;\r\n					&lt;tr&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;&lt;img src=&quot;https://ci3.googleusercontent.com/meips/ADKq_NaoDsP4m7N4NDSaD4zS9X3KvtdnilLKeyrpf_H3y6u6szJWCA7bAyvTI9DTqSR9XdDdvlVRwcHVWwN1u6oJc7iyxoKUpOT5Qsq6TRrvpjH3W9oPpPJbgWChBSqTnUXtKBlaG132eerqBMW7wE07qbuCWk1M6vKZeTXIXPU=s0-d-e1-ft#https://www.mcafee.com/content/dam/email/retention/brand-refresh/Onboarding-LCM-Phase-1/grey_check.png&quot; style=&quot;height:13px; width:12px&quot; /&gt;&lt;/td&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;Virtual assistants&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n					&lt;tr&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;&lt;img src=&quot;https://ci3.googleusercontent.com/meips/ADKq_NaoDsP4m7N4NDSaD4zS9X3KvtdnilLKeyrpf_H3y6u6szJWCA7bAyvTI9DTqSR9XdDdvlVRwcHVWwN1u6oJc7iyxoKUpOT5Qsq6TRrvpjH3W9oPpPJbgWChBSqTnUXtKBlaG132eerqBMW7wE07qbuCWk1M6vKZeTXIXPU=s0-d-e1-ft#https://www.mcafee.com/content/dam/email/retention/brand-refresh/Onboarding-LCM-Phase-1/grey_check.png&quot; style=&quot;height:13px; width:12px&quot; /&gt;&lt;/td&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;Self-diagnosis and repair​&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n					&lt;tr&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;&lt;img src=&quot;https://ci3.googleusercontent.com/meips/ADKq_NaoDsP4m7N4NDSaD4zS9X3KvtdnilLKeyrpf_H3y6u6szJWCA7bAyvTI9DTqSR9XdDdvlVRwcHVWwN1u6oJc7iyxoKUpOT5Qsq6TRrvpjH3W9oPpPJbgWChBSqTnUXtKBlaG132eerqBMW7wE07qbuCWk1M6vKZeTXIXPU=s0-d-e1-ft#https://www.mcafee.com/content/dam/email/retention/brand-refresh/Onboarding-LCM-Phase-1/grey_check.png&quot; style=&quot;height:13px; width:12px&quot; /&gt;&lt;/td&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;Troubleshoot and repair&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n					&lt;tr&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;&lt;img src=&quot;https://ci3.googleusercontent.com/meips/ADKq_NaoDsP4m7N4NDSaD4zS9X3KvtdnilLKeyrpf_H3y6u6szJWCA7bAyvTI9DTqSR9XdDdvlVRwcHVWwN1u6oJc7iyxoKUpOT5Qsq6TRrvpjH3W9oPpPJbgWChBSqTnUXtKBlaG132eerqBMW7wE07qbuCWk1M6vKZeTXIXPU=s0-d-e1-ft#https://www.mcafee.com/content/dam/email/retention/brand-refresh/Onboarding-LCM-Phase-1/grey_check.png&quot; style=&quot;height:13px; width:12px&quot; /&gt;&lt;/td&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;Live technical support chat&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n					&lt;tr&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;&lt;img src=&quot;https://ci3.googleusercontent.com/meips/ADKq_NaoDsP4m7N4NDSaD4zS9X3KvtdnilLKeyrpf_H3y6u6szJWCA7bAyvTI9DTqSR9XdDdvlVRwcHVWwN1u6oJc7iyxoKUpOT5Qsq6TRrvpjH3W9oPpPJbgWChBSqTnUXtKBlaG132eerqBMW7wE07qbuCWk1M6vKZeTXIXPU=s0-d-e1-ft#https://www.mcafee.com/content/dam/email/retention/brand-refresh/Onboarding-LCM-Phase-1/grey_check.png&quot; style=&quot;height:13px; width:12px&quot; /&gt;&lt;/td&gt;\r\n						&lt;td style=&quot;vertical-align:middle&quot;&gt;Support from experts in the McAfee community&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n					&lt;tr&gt;\r\n						&lt;td colspan=&quot;2&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n					&lt;/tr&gt;\r\n				&lt;/tbody&gt;\r\n			&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;', '5,7,9', 340, 10, NULL, 74, 6, 4, '3', NULL, NULL, 'Yes', NULL, 19, 5, NULL, NULL, NULL, NULL, 17, 'No', 'Aftab', 'test@gmail.com', '96666666', 'Yes', 'Specialization', 'Other', '2024-01-25 00:00:00', 'Inactive', 'No', 'No', 0, '2024-01-26', '6,9,10', '2024-01-12 00:00:00', '2024-02-13 10:24:20'),
(10, 'UNAPPROVED', 'Sales Executive', '&lt;p&gt;&lt;strong&gt;1. To achieve the target sales that are communicated from time to time.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. To visit two hospitals every day and meet gynecologists and generate leads of expectant mothers.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. To give 3 presentations to expectant parents per day.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. To enter the leads generated from the field and to fill the activities carried out in the field daily in CRM.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. To project an appropriate image of the company in the field (expectant mother and doctors)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;6. To inform all activities happening in the field such as competitor activities and market feedback to Center Head.&lt;/strong&gt;&lt;/p&gt;', '1,83,412', 340, 1, NULL, 88, 44, 1243, '0', NULL, NULL, 'No', NULL, 16, 2, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Male', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-02-22', '2,3,22', '2024-01-22 00:00:00', '2024-01-23 10:29:20'),
(11, 'UNAPPROVED', 'Chartered Accountant', '&lt;ul&gt;\r\n	&lt;li&gt;Good written &amp;amp; oral communication skills. Should be able to write a basic email&lt;/li&gt;\r\n	&lt;li&gt;Should have handled taxation work in relation non-financial sector. Should know about the above&lt;/li&gt;\r\n	&lt;li&gt;Candidates born after 1995&lt;/li&gt;\r\n	&lt;li&gt;Immediate joiners would be given priority we can accept candidates up to 40 days notice period as well.&lt;/li&gt;\r\n	&lt;li&gt;Candidate may be required to visit client locations as well if required for meetings or taxation work.&lt;/li&gt;\r\n&lt;/ul&gt;', '135,144,185,416', 335, 1, NULL, 76, 10, 178, '1.5', NULL, NULL, 'Yes', NULL, 19, 26, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7228043682', 'No', '', 'Female', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-23', '2,8', '2024-01-24 00:00:00', '2024-01-23 10:29:28'),
(12, 'UNAPPROVED', 'Software Test Engineer', '&lt;p&gt;Candidate must have 0&amp;nbsp;to 1&amp;nbsp;years of experience as a manual&amp;nbsp;tester and should have relevant work experience in testing role.&lt;br /&gt;\r\n&lt;br /&gt;\r\nUse existing tools and techniques to execute test cases for performing testing/validation function.&lt;br /&gt;\r\n&lt;br /&gt;\r\nCreate test conditions and scripts to address business and technical use cases&lt;br /&gt;\r\n&lt;br /&gt;\r\nShould be thorough with essential testing methodologies/process.&lt;br /&gt;\r\n&lt;br /&gt;\r\nManual Testing Tools Experience like JIRA&lt;br /&gt;\r\n&lt;br /&gt;\r\nExperience in Agile Methodology and Scrum team (Preferable)&lt;/p&gt;', '63,480,493,613,614', 340, 2, NULL, 162, 3, 1310, '1', NULL, NULL, 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Computer Engineer', 'Other', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-12', '2,4,8', '2024-01-22 00:00:00', '2024-01-23 10:29:20'),
(13, 'UNAPPROVED', 'Instrumentation Project Engineer', '&lt;ul&gt;\r\n	&lt;li&gt;Shall be responsible for on-site project execution of Flame &amp;amp; Gas Detection System and Fire Alarm System in Oil &amp;amp; Gas Industries.&lt;/li&gt;\r\n	&lt;li&gt;Responsible for Technical Documentation preparation&lt;/li&gt;\r\n	&lt;li&gt;Review project specifications, drawings and project-specific documents to establish project intent&lt;/li&gt;\r\n	&lt;li&gt;Receiving quotation for any works/products which will be outsourced for project implementation&lt;/li&gt;\r\n	&lt;li&gt;Prepare MIS reports for managements review&lt;/li&gt;\r\n	&lt;li&gt;Work with internal team on product/safety automation projects.&lt;/li&gt;\r\n	&lt;li&gt;Develop and maintain strong relationships with the customers technical teams&lt;/li&gt;\r\n	&lt;li&gt;Reviewing customer provided (technical) information&lt;/li&gt;\r\n	&lt;li&gt;Providing customers with technical information and documentation related to products/solutions&lt;/li&gt;\r\n	&lt;li&gt;Track resources and project progress.&lt;/li&gt;\r\n	&lt;li&gt;Gantt Chart Preparation for project implementation&lt;/li&gt;\r\n&lt;/ul&gt;', '132,813,1019', 339, 3, NULL, 139, 35, 1120, '1.5', NULL, NULL, 'No', NULL, 17, 18, NULL, NULL, NULL, NULL, 17, 'No', 'Chetan', 'chetan@angel-portal.com', '766599791', 'No', 'Electronics/Telecommunication, Instrumentation, Electrical', 'Male', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-21', '2,5', '2024-01-23 00:00:00', '2024-02-07 07:40:08'),
(14, 'UNAPPROVED', 'Graphic Designer &amp; Animation Artist', '&lt;ul&gt;\r\n	&lt;li&gt;Who will have to work on conceptualizing, designing and animating dynamic 2D and/or dynamic 2D and 3D typography&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Designing and animating broadcast quality motion graphics scenes in After Effects&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Completing projects from concept to completion as a team of one and as part of a larger team collaboration&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Working with input and direction from Senior Artists&lt;/li&gt;\r\n&lt;/ul&gt;', '532,972,1354,1651', 340, 2, NULL, 79, 8, 585, '1.5', NULL, NULL, 'Yes', NULL, 19, 22, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Design', 'Male', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-22', '2,3,27,28', '2024-01-22 00:00:00', '2024-02-22 09:56:05'),
(15, 'UNAPPROVED', 'HR Executive / HR Recruiter', '&lt;p&gt;Wanted HR Executives /HR Recruiters&lt;/p&gt;\r\n\r\n&lt;p&gt;Good Knowledge of Hiring and calling&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Interested candidates contact or direct walk-in&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Required Candidate profile&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Good Knowledge of Hiring / Recruitment&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nSourcing the candidates through different portals, making calls to them conducting Telephonic interviews with candidates, Scheduling shortlisted candidates .&lt;/p&gt;', '107,564,576,835', 340, 1, NULL, 158, 5, 746, '0.5', NULL, NULL, 'No', NULL, 16, 43, NULL, NULL, NULL, NULL, 17, 'No', 'Chetan', 'chetan@angel-jobs.com', '7666599791', 'No', 'HR', 'Female', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-22', '2,3', '2024-01-23 00:00:00', '2024-02-07 07:07:06'),
(16, 'UNAPPROVED', 'Plumber', '&lt;ul&gt;\r\n	&lt;li&gt;good knowledgeof plumbing.&lt;/li&gt;\r\n	&lt;li&gt;Work completed in desired time.&lt;/li&gt;\r\n	&lt;li&gt;Ready to work anywhere.&lt;/li&gt;\r\n	&lt;li&gt;Emergency work time available any time&lt;/li&gt;\r\n&lt;/ul&gt;', '406,1511', 340, 4, NULL, 159, 22, 995, '1', NULL, NULL, 'No', NULL, 19, 1, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Male', '2024-01-22 00:00:00', 'Live', 'No', 'No', 0, '2024-03-21', '3', '2024-01-22 00:00:00', '2024-01-23 10:29:20'),
(17, 'UNAPPROVED', 'Manager-Agriculture', '&lt;ul&gt;\r\n	&lt;li&gt;Development of technology solutions for agriculture insurance portfolio&lt;/li&gt;\r\n	&lt;li&gt;Development of GIS and weather data solutions for crop health monitoring and yield forecasting&lt;/li&gt;\r\n	&lt;li&gt;Development and maintenance of mobile applications to support our client needs&lt;/li&gt;\r\n	&lt;li&gt;Continuous analysis of technological developments in agricultural primary and reinsurance markets in India and other Asian markets&lt;/li&gt;\r\n	&lt;li&gt;Develop and maintain good working relationships with clients, government, and other agricultural insurance-related stakeholders (e.g. service providers, claims agencies, CCE agencies, etc.)&lt;/li&gt;\r\n	&lt;li&gt;Develop Individual client technology strategies in consultation with the Head of Agriculture and the India Branch CEO&lt;/li&gt;\r\n	&lt;li&gt;Active participation in client/ market events (congresses, market events)&lt;/li&gt;\r\n	&lt;li&gt;Supporting concept and strategy development within the position&amp;rsquo;s area of responsibility&lt;/li&gt;\r\n	&lt;li&gt;Work closely with key stakeholders internally and externally to identify trends and new opportunities.&lt;/li&gt;\r\n	&lt;li&gt;Play an active role in the servicing of clients.&lt;/li&gt;\r\n	&lt;li&gt;Assume full responsibility for the client&amp;rsquo;s tech journey.&lt;/li&gt;\r\n&lt;/ul&gt;', '288,399,700', 341, 1, NULL, 152, 11, 767, '1.5', NULL, NULL, 'No', NULL, 17, 17, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'No', 'Agriculture', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-03-23', '2,3,22', '2024-01-23 00:00:00', '2024-01-23 10:29:39'),
(18, 'UNAPPROVED', 'Security Guard', '&lt;p&gt;We are currently seeking a highly skilled and experienced security guard to join our team. primary responsibility will be to oversee and coordinate security operations to safeguard our premises, assets, and personnel. You will play a key role&lt;/p&gt;', '454', 340, 2, NULL, 82, 27, 1284, '0', NULL, NULL, 'Yes', NULL, 19, 1, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,3,8', '2024-01-23 00:00:00', '2024-01-23 10:29:20'),
(19, 'UNAPPROVED', 'Industrial Safety', '&lt;ul&gt;\r\n	&lt;li&gt;Ensuring the implementation of the work permit system to maintain a safe working environment.&lt;/li&gt;\r\n	&lt;li&gt;Individually handling a shift as the shift safety in charge to oversee safety operations.&lt;/li&gt;\r\n	&lt;li&gt;Familiarizing with construction and fire safety measures at the site to prevent and address potential hazards.&lt;/li&gt;\r\n	&lt;li&gt;Conducting risk assessments using HAZOP tools for API processes to mitigate potential risks.&lt;/li&gt;\r\n	&lt;li&gt;Conducting periodic, refresh, and induction training sessions for various groups across the plant to ensure awareness of safety protocols.&lt;/li&gt;\r\n	&lt;li&gt;Continuous monitoring of unsafe and safe conditions to take necessary preventive measures.&lt;/li&gt;\r\n	&lt;li&gt;Applying strong knowledge of chemical compatibility, chemical storage, and UGT tank safety to prevent accidents and ensure safe handling of materials.&lt;/li&gt;\r\n	&lt;li&gt;Thoroughly investigating all near misses for root cause analysis and implementing corrective and preventive actions.&lt;/li&gt;\r\n&lt;/ul&gt;', '348,978,843,1283', 340, 1, NULL, 124, 18, 1228, '0', NULL, NULL, 'No', NULL, 16, 42, NULL, NULL, NULL, NULL, 19, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Industrial Safety', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,3', '2024-01-23 00:00:00', '2024-01-23 10:29:20'),
(20, 'UNAPPROVED', 'Tele Sales Executive', '&lt;p&gt;1. Conduct tele sales and field sales to promote company products and services.&lt;/p&gt;\r\n\r\n&lt;p&gt;2. Build and maintain client relationships to achieve sales targets.&lt;/p&gt;\r\n\r\n&lt;p&gt;3. Understand customer needs and offer appropriate solutions.&lt;/p&gt;\r\n\r\n&lt;p&gt;4. Collaborate with the sales team to achieve common goals and objectives.&lt;/p&gt;\r\n\r\n&lt;p&gt;5. Keep updated on product knowledge and market trends.&lt;/p&gt;', '1919,1555,1974,1496', 343, 1, NULL, 100, 25, 1396, '0.5', NULL, NULL, 'Yes', NULL, 17, 2, NULL, NULL, NULL, NULL, 19, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Female', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-03-23', '2,3', '2024-01-23 00:00:00', '2024-01-23 10:29:43'),
(21, 'UNAPPROVED', 'Production Engineer', '&lt;p&gt;Production Engineer and Quality Engineer 0-2 Exp Fresher Mechanical&lt;br /&gt;\r\nLocation- Govindpura and Mandideep Bhopal&lt;br /&gt;\r\nSalary 10-15k&lt;/p&gt;', '1077,1780,1792,1667,574,375', 340, 1, NULL, 156, 40, 1114, '1', NULL, NULL, 'Yes', NULL, 19, 18, NULL, NULL, NULL, NULL, 17, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Mechanical', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2', '2024-01-23 00:00:00', '2024-02-07 07:40:07'),
(22, 'UNAPPROVED', 'Manual test engineer', '&lt;ul&gt;\r\n	&lt;li&gt;Basic knowledge of Ms office&lt;/li&gt;\r\n	&lt;li&gt;Basic knowledge of testing tools like Jira, Agile methodology,SQL.Postman etc.&lt;/li&gt;\r\n&lt;/ul&gt;', '1140,2217,2244,2620', 343, 1, NULL, 162, 3, 1310, '0.5', NULL, NULL, 'Yes', NULL, 19, 18, NULL, NULL, NULL, NULL, 20, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Female', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-01-25', '2,10', '2024-01-23 00:00:00', '2024-02-22 09:56:12'),
(23, 'UNAPPROVED', 'project engineer', '&lt;ul&gt;\r\n	&lt;li&gt;Manpower handling&lt;/li&gt;\r\n	&lt;li&gt;Coordinate with clients&lt;/li&gt;\r\n	&lt;li&gt;manpower handealing&lt;/li&gt;\r\n	&lt;li&gt;on time delivery&lt;/li&gt;\r\n&lt;/ul&gt;', '207,1712,1019,813,436', 342, 1, NULL, 139, 1, 1120, '1.5', NULL, NULL, 'No', NULL, 19, 17, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-01-26', '2,3', '2024-01-23 00:00:00', '2024-02-06 13:04:16'),
(24, 'UNAPPROVED', 'Electrician', '&lt;ul&gt;\r\n	&lt;li&gt;Electrical maintenance, labour handling&amp;nbsp;&lt;/li&gt;\r\n&lt;/ul&gt;', '926,924,928,1089,925,927,248', 340, 1, NULL, 94, 33, 421, '1.5', NULL, NULL, 'Yes', NULL, 17, 1, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,3', '2024-01-28 00:00:00', '2024-01-23 10:29:20'),
(25, 'UNAPPROVED', 'Receptionist', '&lt;p&gt;Reception&lt;/p&gt;', '808,1411,810,313', 340, 1, NULL, 150, 23, 1184, '1', NULL, NULL, 'Yes', NULL, 17, 11, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Female', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,1,3', '2024-01-24 00:00:00', '2024-01-23 10:29:20'),
(26, 'UNAPPROVED', 'Accountant', '&lt;p&gt;Accounting&lt;/p&gt;', '1584,1611,185', 338, 1, NULL, 76, 10, 16, '0', NULL, NULL, 'Yes', NULL, 16, 11, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Female', '2024-01-23 00:00:00', 'Inactive', 'No', 'No', 0, '2024-01-31', '1,3', '2024-01-24 00:00:00', '2024-01-23 10:44:08'),
(27, 'UNAPPROVED', 'Civil engineer', '&lt;p&gt;Civil engineering&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Building construction&lt;/p&gt;', '612,1775,398,783,784', 337, 1, NULL, 96, 22, 211, '1.5', NULL, NULL, 'Yes', NULL, 19, 18, NULL, NULL, NULL, NULL, 21, 'No', 'Chetan', 'Chetan@angel-portal.com', '7666599791', 'Yes', 'Civil', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,10', '2024-01-24 00:00:00', '2024-02-13 11:14:05'),
(28, 'UNAPPROVED', 'Doctor', '&lt;p&gt;doctor&lt;/p&gt;', '221', 338, 1, NULL, 154, 17, 380, '1.5', NULL, NULL, 'Yes', NULL, 17, 21, NULL, NULL, NULL, NULL, 21, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', 'genecology', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'Yes', 0, '2024-02-23', '2,1,3', '2024-01-24 00:00:00', '2024-02-13 11:21:29'),
(29, 'UNAPPROVED', 'Navy Officer', '&lt;p&gt;Retired Navy Officer&lt;/p&gt;', '1893', 336, 1, NULL, 107, 44, 58, '1.5', NULL, NULL, 'No', NULL, 19, 2, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-02-23', '2,4', '2024-01-23 00:00:00', '2024-02-22 09:56:17'),
(30, 'UNAPPROVED', 'CNC Operator', '&lt;p&gt;CNC Operator&lt;/p&gt;', '1128,920,1008,922', 337, 1, NULL, 119, 40, 958, '0.5', NULL, NULL, 'No', NULL, 19, 1, NULL, NULL, NULL, NULL, 20, 'No', 'chetan', 'chetan@angel-portal.com', '7666599791', 'No', '', 'Male', '2024-01-23 00:00:00', 'Live', 'No', 'No', 0, '2024-01-31', '2,3,22', '2024-01-24 00:00:00', '2024-01-23 11:47:49'),
(31, 'UNAPPROVED', 'Aerospace engineer', '&lt;p&gt;Experience in Aerospace engineering&lt;/p&gt;\r\n\r\n&lt;p&gt;Knowledge of aeronautical engineering&lt;/p&gt;', '1772,1773', 343, 1, NULL, 149, 2, 37, '1.5', NULL, NULL, 'Yes', NULL, 16, 18, NULL, NULL, NULL, NULL, 20, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Aerospace', 'Male', '2024-01-25 00:00:00', 'Live', 'No', 'No', 0, '2024-02-02', '2,10', '2024-01-25 00:00:00', '2024-01-25 10:03:04'),
(32, 'UNAPPROVED', 'Jewallary Designer', '&lt;p&gt;JEwallary Designer&lt;/p&gt;', '2606,1800,1438', 342, 2, NULL, 123, 38, 794, '0', NULL, NULL, 'Yes', NULL, 19, 22, NULL, NULL, NULL, NULL, 20, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'No', 'Design', 'Female', '2024-01-25 00:00:00', 'Live', 'No', 'No', 0, '2024-02-14', '1,3', '2024-01-25 00:00:00', '2024-01-25 10:15:00'),
(33, 'UNAPPROVED', 'Beautician', '&lt;p&gt;beauty parlour skill&lt;/p&gt;', '1696,1830', 337, 3, NULL, 129, 29, 98, '0.5', NULL, '0', 'No', NULL, 17, 12, NULL, NULL, NULL, NULL, 22, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', '', 'Female', '2024-02-03 00:00:00', 'Live', 'No', 'No', 0, '2024-03-04', '27,2,3', '2024-03-04 00:00:00', '2024-02-03 11:30:05'),
(34, 'UNAPPROVED', 'Tour Manager', '&lt;p&gt;tour experience&lt;/p&gt;', '872,805,175', 341, 1, NULL, 126, 16, 1402, '1.5', NULL, NULL, 'Yes', NULL, 17, 17, NULL, NULL, NULL, NULL, 22, 'No', 'Chetan', 'chetan@angel-portal.com', '7666599791', 'Yes', 'Travel &amp; Tourism', 'Female', '2024-01-27 00:00:00', 'Live', 'No', 'No', 0, '2024-02-12', '2', '2024-01-27 00:00:00', '2024-01-27 10:06:22'),
(35, 'UNAPPROVED', 'Jr. Surveyor', '&lt;p&gt;Land survey knowledge&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Scale knowledge&lt;/p&gt;', '1856,991', 335, 2, NULL, 133, 24, 1354, '0', NULL, NULL, 'No', NULL, 16, 18, NULL, NULL, NULL, NULL, 22, 'No', 'chetan', 'chetan@angel-portal.com', '575245857', 'Yes', '', 'Male', '2024-01-27 00:00:00', 'Live', 'No', 'No', 0, '2024-02-09', '2,10', '2024-01-29 00:00:00', '2024-02-06 13:04:04'),
(36, 'UNAPPROVED', 'Software Developer', '&lt;p&gt;&lt;strong&gt;Client:&lt;/strong&gt;&amp;nbsp;SSI People&lt;br /&gt;\r\n&lt;strong&gt;Location:&lt;/strong&gt;&amp;nbsp;Remote&lt;br /&gt;\r\n&lt;strong&gt;Contract:&lt;/strong&gt;&amp;nbsp;Contractor&lt;br /&gt;\r\n&lt;br /&gt;\r\nJob Description:&lt;br /&gt;\r\n----------------&lt;br /&gt;\r\nThe role requires designing, implementing, and operating a framework for Machine Learning Operations (MLOps) on AWS cloud. This includes building MLOps pipelines orchestration on Amazon SageMaker, reviewing data science models, code...&lt;/p&gt;', '2623,2625,566,1649,1213', 343, 10, NULL, 152, 8, 8, '0 Year 6 Month', NULL, NULL, 'Yes', NULL, 16, 3, NULL, NULL, NULL, NULL, 24, 'No', 'Chetan Ray', 'chetan@gmail.com', '986659666', 'Yes', 'Specialization', 'Female', '2024-01-31 00:00:00', 'Live', 'No', 'No', 0, '2024-02-24', '24,2,4', '2024-01-26 00:00:00', '2024-01-31 10:22:00'),
(39, 'UNAPPROVED', 'test', '&lt;p&gt;fdf&lt;/p&gt;', '2625,878', 341, 10, NULL, 98, 22, 15, '0 Year 6 Month', NULL, '0', 'No', NULL, 17, 8, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'test@gmail.com', '00000000', 'Yes', '', '', '2024-02-03 00:00:00', 'Inactive', 'No', 'No', 0, '2024-03-04', '24,24,2', '2024-03-04 00:00:00', '2024-02-13 10:24:04'),
(40, 'UNAPPROVED', 'Accountant', '&lt;p&gt;qdwe&lt;/p&gt;', '', 341, 2, NULL, 76, 10, 16, '4 Years 0 Month', NULL, '0', 'No', NULL, 17, 2, NULL, NULL, NULL, NULL, 22, 'No', 'fwafe', 'chetan@yopmail.com', '6432547536', 'Yes', '', '', '2024-02-03 00:00:00', 'Live', 'No', 'No', 0, '2024-03-04', '2,10', '2024-03-04 00:00:00', '2024-02-06 13:04:16'),
(41, 'UNAPPROVED', 'Civil engineer', '&lt;p&gt;wgserg&lt;/p&gt;', '', 339, 1, NULL, 76, 10, 3, '3 Years 0 Month', NULL, '3', 'Yes', NULL, 19, 3, NULL, NULL, NULL, NULL, 22, 'No', 'chetan', 'sffg@dfweq.com', '75873123', 'Yes', 'fwaf', 'Male', '2024-02-03 00:00:00', 'Live', 'No', 'No', 0, '2024-03-04', '4,13', '2024-03-04 00:00:00', '2024-02-03 06:58:54'),
(42, 'UNAPPROVED', 'Travel agent', '&lt;p&gt;Travel &amp;amp; Tourism&lt;/p&gt;', '872,1026,805', 342, 1, NULL, 126, 16, 1449, '6', NULL, '0', 'No', NULL, 17, 17, NULL, NULL, NULL, NULL, 21, 'No', 'Chetan', 'chetan@yopmail.com', '75312332', 'Yes', '', '', '2024-02-05 00:00:00', 'Live', 'No', 'No', 0, '2024-03-06', '2,10,4', '2024-03-06 00:00:00', '2024-02-06 13:04:16'),
(43, 'UNAPPROVED', 'Travel Manager', '&lt;p&gt;Travel Manager&lt;/p&gt;', '872,805,175', 335, 1, NULL, 126, 16, 1451, '8', NULL, '1', 'Yes', NULL, 17, 2, NULL, NULL, NULL, NULL, 21, 'No', 'Chetan', 'chetan@yopmail.com', '95125', 'Yes', 'Geography', '', '2024-02-05 00:00:00', 'Live', 'No', 'No', 0, '2024-03-06', '2,10', '2024-03-06 00:00:00', '2024-02-05 08:19:52'),
(44, 'UNAPPROVED', 'Software developer', '&lt;p&gt;Programming&lt;/p&gt;', '2295,2313,2326', 340, 1, NULL, 162, 3, 1309, '7', NULL, '2', 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 21, 'No', 'Chetan', 'chetan@yopmail.com', '7587578', 'No', 'computer', 'Male', '2024-02-05 00:00:00', 'Live', 'No', 'Yes', 0, '2024-03-06', '27,2', '2024-03-06 00:00:00', '2024-02-13 11:17:47'),
(45, 'UNAPPROVED', 'Php', '&lt;p&gt;test&lt;/p&gt;', '1097,2535', 339, 10, NULL, 79, 32, 16, '3', NULL, '0', 'No', NULL, 16, 6, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'test@gmai.com', '00000000', 'Yes', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '24', '2024-03-07 00:00:00', '2024-02-07 07:07:06'),
(46, 'UNAPPROVED', 'test', '&lt;p&gt;test&lt;/p&gt;', '566', 343, 10, NULL, 152, 31, 16, '10', NULL, '4', 'No', NULL, 16, 2, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'test@gmail.com', '00000000', 'Yes', '', 'Female', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '27', '2024-03-07 00:00:00', '2024-02-07 07:07:06'),
(47, 'UNAPPROVED', 'test', '&lt;p&gt;test&lt;/p&gt;', '1007', 335, 10, NULL, 152, 10, 15, '10', NULL, '0', 'No', NULL, 16, 17, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'tset@gmail.com', '00000000', 'Yes', '', 'Female', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '24,15', '2024-03-07 00:00:00', '2024-02-07 07:07:06'),
(48, 'UNAPPROVED', 'test', '&lt;p&gt;test&lt;/p&gt;', '566', 343, 10, NULL, 98, 32, 8, '2', NULL, '2', 'No', NULL, 16, 3, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'test@gmail.com', '00000000', 'Yes', '', 'Male', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '15', '2024-03-07 00:00:00', '2024-02-13 10:24:20'),
(49, 'UNAPPROVED', 'Softwaer Inct', '&lt;p&gt;test&lt;/p&gt;', '878', 335, 10, NULL, 152, 10, 3, '10', NULL, '0', 'No', NULL, 17, 16, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'test@gmail.com', '00000000', 'Yes', '', '', '2024-02-06 00:00:00', 'Inactive', 'No', 'No', 0, '2024-03-07', '27', '2024-03-07 00:00:00', '2024-02-13 10:24:20'),
(50, 'UNAPPROVED', 'Advertiser', '&lt;p&gt;Advertising&lt;/p&gt;', '1332,1333,1334,1543', 336, 1, NULL, 98, 8, 27, '8', NULL, '2', 'Yes', NULL, 16, 2, NULL, NULL, NULL, NULL, 29, 'No', 'Chetan', 'plan@yopmail.com', '75315915', 'Yes', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '2,10', '2024-03-07 00:00:00', '2024-02-06 10:05:14'),
(51, 'UNAPPROVED', 'Marketing Manager', '&lt;p&gt;Marketing&lt;/p&gt;', '1361,963,229', 342, 2, NULL, 105, 13, 863, '6', NULL, '0', 'No', NULL, 17, 43, NULL, NULL, NULL, NULL, 29, 'No', 'Chetan', 'chetan@yopmail.com', '75315995', 'No', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '2,10', '2024-03-07 00:00:00', '2024-02-06 10:13:24'),
(52, 'UNAPPROVED', 'Pharmacist', '&lt;p&gt;Pharmacy&lt;/p&gt;', '638', 339, 2, NULL, 124, 18, 1042, '10', NULL, '3', 'No', NULL, 19, 16, NULL, NULL, NULL, NULL, 29, 'No', 'chetan', 'plan@yopmail.com', '95935785', 'Yes', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '2,10', '2024-03-07 00:00:00', '2024-02-06 10:16:52'),
(53, 'UNAPPROVED', 'Textile engineer', '&lt;p&gt;Textile engineer&lt;/p&gt;', '1804,1788,514', 338, 2, NULL, 121, 38, 1398, '10', NULL, '2', 'Yes', NULL, 16, 18, NULL, NULL, NULL, NULL, 29, 'No', 'Chetan', 'plan@yopmail.com', '15935785', 'Yes', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '27,2', '2024-03-07 00:00:00', '2024-02-06 10:19:45'),
(54, 'UNAPPROVED', 'Mechanical Engineer', '&lt;p&gt;Manufacturing&lt;/p&gt;', '1792,1667,1782', 342, 1, NULL, 160, 7, 871, '14', NULL, '0', 'No', NULL, 17, 18, NULL, NULL, NULL, NULL, 29, 'No', 'Chetan', 'plan@yopmail.com', '15935785', 'Yes', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '27,2', '2024-03-07 00:00:00', '2024-02-06 10:22:31'),
(55, 'UNAPPROVED', 'fdf', '&lt;p&gt;tests&lt;/p&gt;', '566', 343, 10, NULL, 79, 31, 17, '3', NULL, '5', 'No', NULL, 17, 16, NULL, NULL, NULL, NULL, 17, 'No', 'tet', 'test@gmail.com', '00000000', 'Yes', '', '', '2024-02-06 00:00:00', 'Inactive', 'No', 'No', 0, '2024-03-07', '24', '2024-03-07 00:00:00', '2024-02-13 10:24:20'),
(56, 'UNAPPROVED', 'fdfd', '&lt;p&gt;fd&lt;/p&gt;', '2625', 343, 10, NULL, 152, 39, 3, '10', NULL, '0', 'No', NULL, 17, 18, NULL, NULL, NULL, NULL, 17, 'No', 'test', 'tset@gmail.com', '00000000', 'No', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '24', '2024-03-07 00:00:00', '2024-02-07 07:40:27'),
(57, 'UNAPPROVED', 'Accountant', '&lt;p&gt;yfythmfmhj&lt;/p&gt;', '1649,966,2527', 339, 1, NULL, 76, 22, 9, '8', NULL, '4', 'No', NULL, 17, 4, NULL, NULL, NULL, NULL, 27, 'No', 'test', 'plan@yopmail.com', '15285612', 'No', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '2,10', '2024-03-07 00:00:00', '2024-02-07 11:02:41'),
(58, 'UNAPPROVED', 'Electrician', '&lt;p&gt;Electrician&lt;/p&gt;', '928,925,248', 336, 1, NULL, 94, 22, 421, '6', NULL, '1', 'No', NULL, 17, 1, NULL, NULL, NULL, NULL, 27, 'No', 'chetan', 'plan@yopmail.com', '75315985', 'No', '', '', '2024-02-06 00:00:00', 'Live', 'No', 'No', 0, '2024-03-07', '2,4', '2024-03-07 00:00:00', '2024-02-06 11:33:08'),
(59, 'UNAPPROVED', 'Project Manager', '&lt;p&gt;About Project&lt;/p&gt;', '207,1019,813,1954', 338, 1, NULL, 96, 22, 1125, '8', NULL, '3', 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 27, 'No', 'chetan', 'feb@yopmail.com', '75316598', 'Yes', 'Civil', 'Female', '2024-02-07 00:00:00', 'Live', 'No', 'No', 0, '2024-03-08', '2,10', '2024-03-08 00:00:00', '2024-02-07 12:37:55'),
(60, 'UNAPPROVED', 'Content Writer', '&lt;p&gt;Content Writer&lt;/p&gt;', '1513,186,1413', 343, 1, NULL, 162, 32, 270, '10', NULL, '3', 'Yes', NULL, 17, 17, NULL, NULL, NULL, NULL, 31, 'No', 'Chetan', 'pqr@yopmail.com', '12598545', 'Yes', 'Science', 'Male', '2024-02-13 00:00:00', 'Live', 'No', 'Yes', 0, '2024-03-14', '27,2', '2024-03-14 00:00:00', '2024-02-13 11:58:10'),
(61, 'UNAPPROVED', 'Teacher', '&lt;p&gt;Teacher&lt;/p&gt;', '1400,1514,562', 339, 1, NULL, 76, 37, 1373, '11', NULL, '0', 'No', NULL, 17, 12, NULL, NULL, NULL, NULL, 32, 'No', 'Chetan', 'mob@yopmail.com', '75315985', 'No', '', '', '2024-02-09 00:00:00', 'Live', 'No', 'No', 0, '2024-03-10', '2,10,4', '2024-03-10 00:00:00', '2024-02-13 10:24:20'),
(62, 'UNAPPROVED', 'Gym Trainer', '&lt;p&gt;GYm trainer&lt;/p&gt;', '1732', 340, 2, NULL, 129, 44, 1002, '1', NULL, '4', 'Yes', NULL, 16, 1, NULL, NULL, NULL, NULL, 32, 'No', 'chetan', 'mob@yopmail.com', '75315985', 'Yes', '', '', '2024-02-09 00:00:00', 'Live', 'No', 'No', 0, '2024-03-10', '10,3', '2024-03-10 00:00:00', '2024-02-09 11:55:40'),
(63, 'UNAPPROVED', 'Video Editor', '&lt;ul&gt;\r\n	&lt;li&gt;Video Editor&lt;/li&gt;\r\n	&lt;li&gt;Video Visualizer&lt;/li&gt;\r\n	&lt;li&gt;Video editing exp&lt;/li&gt;\r\n&lt;/ul&gt;', '1658,1429,1659', 341, 2, NULL, 83, 19, 1470, '6', NULL, '2', 'Yes', NULL, 17, 22, NULL, NULL, NULL, NULL, 31, 'No', 'Chetan', 'chetan@yopmail.com', '12435212', 'Yes', 'Video Editing', '', '2024-02-12 00:00:00', 'Live', 'No', 'No', 0, '2024-03-13', '2,10,4', '2024-03-13 00:00:00', '2024-02-13 12:12:58'),
(64, 'UNAPPROVED', 'Php Developer', '&lt;p&gt;test&lt;/p&gt;', '566,2535', 339, 10, NULL, 152, 32, 14, '3', NULL, '5', 'Yes', NULL, 19, 6, NULL, NULL, NULL, NULL, 55, 'No', 'alam', 'aftab@angel-portal.com', '00000000', 'Yes', 'tset', 'Female', '2023-11-18 00:00:00', 'Live', 'No', 'No', 0, '2024-03-14', '24', '2024-03-14 00:00:00', '2024-02-16 11:31:01'),
(65, 'UNAPPROVED', 'fdfdfdfd', '&lt;p&gt;test&lt;/p&gt;', '566,1649', 343, 10, NULL, 76, 10, 8, '2', NULL, '0', 'No', NULL, 16, 8, NULL, NULL, NULL, NULL, 55, 'No', 'test', 'tets@gmailco.com', '00000000', 'No', 'test', '', '2024-01-17 00:00:00', 'Live', 'No', 'No', 0, '2024-03-14', '24', '2024-03-14 00:00:00', '2024-02-16 11:30:51'),
(66, 'UNAPPROVED', 'Software Developer', '&lt;p&gt;IT&lt;/p&gt;', '826,720,542', 338, 2, NULL, 162, 3, 1309, '9', NULL, '2', 'Yes', NULL, 16, 18, NULL, NULL, NULL, NULL, 31, 'No', 'Chetan', 'chetan@yopmail.com', '75757575', 'Yes', 'Computer', '', '2024-02-01 00:00:00', 'Live', 'No', 'No', 0, '2024-03-14', '2,10,4', '2024-03-14 00:00:00', '2024-02-16 11:30:44'),
(70, 'UNAPPROVED', 'Graphics Designer', '&lt;p&gt;graphic designer&lt;/p&gt;', '818,734,532', 339, 1, NULL, 162, 20, 584, '8', NULL, '1', 'Yes', NULL, 16, 17, NULL, NULL, NULL, NULL, 57, 'No', 'trial', 'trial@yopmail.com', '78787878', 'No', 'Computer science', 'Male', '2024-02-16 14:39:23', 'Live', 'No', 'No', 0, '2024-03-17', '2,10,4', '2024-03-17 00:00:00', '2024-02-16 13:39:23'),
(71, 'UNAPPROVED', 'UI/UX Developer', '&lt;h2&gt;Benefits&lt;/h2&gt;\r\n\r\n&lt;p&gt;Pulled from the full job description&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Paid time off&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Position: UI/UX Developer&amp;nbsp;&lt;strong&gt;(Portfolio Submission is mandatory. Please mail the same to asingh@mantradigital.co)&lt;/strong&gt;&lt;/p&gt;', '878', 348, 1, NULL, 150, 10, 9, '8', NULL, '6', 'No', NULL, 16, 12, NULL, NULL, NULL, NULL, 73, 'No', 'Chetan', 'chetan1@yopmail.com', '12345678', 'No', 'MCA', 'Male', '2024-02-20 12:01:19', 'Live', 'No', 'Yes', 0, '2024-03-21', '14,11', '2024-03-21 11:07:27', '2024-02-22 13:16:49'),
(72, 'UNAPPROVED', 'Telly Sales', '&lt;p&gt;Well-organized and detail-oriented&lt;/p&gt;\r\n\r\n&lt;p&gt;Strong problem-solving skills&lt;/p&gt;\r\n\r\n&lt;p&gt;Critical thinking and analytical thinking skills&lt;/p&gt;\r\n\r\n&lt;p&gt;Excellent multitasker with time management skills&lt;/p&gt;\r\n\r\n&lt;p&gt;Sales experience, a plus&lt;/p&gt;\r\n\r\n&lt;p&gt;Location: Mumbai&lt;/p&gt;\r\n\r\n&lt;p&gt;vacancies : 2&lt;/p&gt;', '2625,1649,966', 347, 10, NULL, 156, 10, 9, '8', NULL, '7', 'No', NULL, 17, 12, NULL, NULL, NULL, NULL, 73, 'No', 'aftab', 'aftab@angel-portal.com', '65333666', 'Yes', 'Specialization', 'Female', '2024-02-20 11:55:54', 'Live', 'No', 'No', 0, '2024-03-21', '13,11', '2024-03-21 11:55:54', '2024-02-20 10:55:54'),
(73, 'UNAPPROVED', 'PHP Laravel Developer', '&lt;p&gt;h offices in USA, UK, Dubai, Italy, Germany, Japan &amp;amp; Australia. Our commitment to quality and 25+ years of excellence has made us serve over&lt;/p&gt;', '2527', 349, 10, NULL, 149, 12, 9, '7', NULL, '7', 'No', NULL, 16, 6, NULL, NULL, NULL, NULL, 73, 'No', 'test', 'aftab@angel-portal.com', '22222222', 'No', '10', 'Male', '2024-02-20 12:07:35', 'Live', 'No', 'Yes', 0, '2024-03-21', '14', '2024-03-21 12:07:35', '2024-02-22 13:14:34'),
(74, 'UNAPPROVED', 'Mechanical Engineer', '&lt;p&gt;Manufacturing fvrsbg&lt;/p&gt;', '1649,972,1213,966,1097', 352, 2, NULL, 160, 7, 838, '1', NULL, '3', 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 74, 'No', 'Chetan', 'mar11@yopmail.com', '78945685', 'No', 'Mechanical', 'Male', '2024-02-20 14:08:54', 'Live', 'No', 'No', 0, '2024-03-21', '2,10,2,10', '2024-02-20 14:08:54', '2024-02-21 11:34:51'),
(75, 'UNAPPROVED', 'Civil engg', '&lt;p&gt;Civil engineer&lt;/p&gt;', '1213,966,1097', 344, 1, NULL, 96, 22, 211, '14', NULL, '3', 'Yes', NULL, 16, 18, NULL, NULL, NULL, NULL, 74, 'No', 'martest', 'mar11@yopmail.com', '75458745', 'Yes', 'Civil Engineer', '', '2024-02-21 12:38:29', 'Inactive', 'No', 'No', 0, '2024-03-22', '4,3', '2024-02-21 12:38:29', '2024-02-21 12:53:20'),
(76, 'UNAPPROVED', 'Project Manager', '&lt;p&gt;Project Engineer&lt;/p&gt;', '1019,813', 345, 1, NULL, 133, 24, 1120, '1', NULL, '2', 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 74, 'No', 'chetan', 'mar11@yopmail.com', '74587458', 'Yes', 'Civil', 'Male', '2024-02-21 13:00:43', 'Live', 'No', 'Yes', 0, '2024-03-22', '4,3', '2024-02-21 13:00:43', '2024-02-21 12:52:50'),
(77, 'UNAPPROVED', 'Painter', '&lt;p&gt;Painter&lt;/p&gt;', '1942', 399, 1, NULL, 138, 44, 1027, '15', NULL, '6', 'No', NULL, 17, 1, NULL, NULL, NULL, NULL, 74, 'No', 'Chetan', 'mar11@yopmail.com', '78548745', 'No', '10th', 'Female', '2024-02-21 13:05:41', 'Live', 'No', 'No', 0, '2024-03-22', '3', '2024-02-21 13:05:41', '2024-02-21 12:05:41'),
(78, 'UNAPPROVED', 'Health Manager', '&lt;p&gt;Health Manager&lt;/p&gt;', '1728,636', 396, 1, NULL, 132, 17, 731, '10', NULL, '6', 'No', NULL, 17, 7, NULL, NULL, NULL, NULL, 75, 'No', 'Chetan', 'chetan@yopmail.com', '75959595', 'No', 'Diploma', 'Male', '2024-02-22 05:35:27', 'Live', 'No', 'Yes', 0, '2024-03-23', '2,10', '2024-02-22 05:35:27', '2024-02-22 13:46:22'),
(79, 'UNAPPROVED', 'Instrumentation engineer', '&lt;p&gt;Instrumentation&lt;/p&gt;', '1777,1966', 341, 2, NULL, 94, 2, 410, '1', NULL, '1', 'Yes', NULL, 16, 18, NULL, NULL, NULL, NULL, 75, 'No', 'chetan', 'chetan@yopmail.com', '78945685', 'Yes', '', 'Female', '2024-02-22 05:45:17', 'Live', 'No', 'No', 0, '2024-03-23', '13,3', '2024-02-22 05:45:17', '2024-02-22 04:45:17'),
(80, 'UNAPPROVED', 'Hr', '&lt;p&gt;Hr&lt;/p&gt;', '1913,758', 404, 2, NULL, 76, 10, 746, '3', NULL, '2', 'Yes', NULL, 19, 11, NULL, NULL, NULL, NULL, 75, 'No', 'Chetan', 'Chetan@yopmail.com', '78945685', 'No', 'HR', 'Female', '2024-02-22 05:47:18', 'Live', 'No', 'No', 0, '2024-03-23', '27,2', '2024-02-22 05:47:18', '2024-02-22 12:13:19'),
(81, 'UNAPPROVED', 'Tester', '&lt;p&gt;tester&lt;/p&gt;', '63,493', 346, 1, NULL, 162, 3, 1310, '10', NULL, '2', 'Yes', NULL, 17, 18, NULL, NULL, NULL, NULL, 75, 'No', 'Chetan', 'chetan@yopmail.com', '78965489', 'Yes', 'Computer', 'Female', '2024-02-22 06:11:01', 'Live', 'No', 'Yes', 0, '2024-01-23', '2,10', '2024-02-22 06:11:01', '2024-02-24 10:07:04'),
(82, 'UNAPPROVED', 'test1', '&lt;p&gt;test1&lt;/p&gt;', '1649,972,1213', 349, 1, NULL, 98, 10, 11, '9', NULL, '4', 'No', NULL, 17, 50, NULL, NULL, NULL, NULL, 75, 'No', 'Chetan', 'chetan@yopmail.com', '45698758', 'Yes', 'CS', 'Male', '2024-02-22 12:47:16', 'Live', 'No', 'No', 0, '2024-03-23', '2', '2024-02-22 12:47:16', '2024-02-22 13:11:00'),
(83, 'UNAPPROVED', 'trial1', '&lt;p&gt;dfvdsfb&lt;/p&gt;', '1097', 341, 1, NULL, 150, 11, 14, '6', NULL, '5', 'No', NULL, 17, 11, NULL, NULL, NULL, NULL, 76, 'No', 'chetan', 'chetan@yopmail.com', '78965485', 'No', 'trial', 'Female', '2024-02-22 13:25:03', 'Live', 'No', 'No', 0, '2024-03-23', '10,3', '2024-02-22 13:25:03', '2024-02-22 12:25:03'),
(84, 'UNAPPROVED', 'trial2', '&lt;p&gt;trial2&lt;/p&gt;', '1649,972', 335, 1, NULL, 79, 30, 11, '1', NULL, '6', 'Yes', NULL, 16, 16, NULL, NULL, NULL, NULL, 76, 'No', 'try', 'trial1@yopmail.com', '78965485', 'Yes', 'pharma', 'Female', '2024-02-22 13:27:58', 'Live', 'No', 'Yes', 0, '2024-03-23', '10,10,13', '2024-02-22 13:27:58', '2024-02-22 13:11:14'),
(85, 'UNAPPROVED', 'Manager', '&lt;p&gt;Final Testing&lt;/p&gt;', '1899,1600,98', 396, 1, NULL, 125, 36, 850, '10', NULL, '4', 'Yes', NULL, 17, 43, NULL, NULL, NULL, NULL, 78, 'No', 'Chetan', 'mob@yopmail.com', '34567890', 'Yes', 'HR', 'Male', '2024-02-23 06:56:15', 'Live', 'No', 'Yes', 0, '2024-03-24', '2,31', '2024-02-23 06:56:15', '2024-02-23 09:03:42'),
(86, 'UNAPPROVED', 'Doctor', '&lt;p&gt;Dental clinic&lt;/p&gt;', '1723,1725,1726', 336, 3, NULL, 91, 17, 380, '3', NULL, '3', 'No', NULL, 16, 4, NULL, NULL, NULL, NULL, 78, 'No', 'mob', 'mob@yopmail.com', '85698562', 'No', 'dentist', 'Female', '2024-02-23 07:25:15', 'Live', 'No', 'No', 0, '2024-03-24', '2,10,31', '2024-02-23 07:25:15', '2024-02-23 06:26:46'),
(87, 'UNAPPROVED', 'QA', '&lt;p&gt;Quality engineer&lt;/p&gt;', '1507,115,1423', 341, 1, NULL, 111, 22, 1152, '1', NULL, '0', 'No', NULL, 17, 17, NULL, NULL, NULL, NULL, 78, 'No', 'mob', 'mob@yopmail.com', '45398575', 'No', '', '', '2024-02-23 07:35:02', 'Live', 'No', 'No', 0, '2024-03-24', '2,3,31', '2024-02-23 07:35:02', '2024-02-23 10:10:30'),
(88, 'APPROVED', 'Driver', '&lt;p&gt;Gxgjvjjv&lt;/p&gt;', '972,966,878', 337, 1, NULL, 136, 11, 13, '2', NULL, '1', 'No', NULL, 17, 50, NULL, NULL, NULL, NULL, 78, 'No', 'mob', 'mob@yopmail.com', '76554567', 'No', '', '', '2024-02-23 07:50:37', 'Live', 'No', 'No', 0, '2024-03-24', '3,31', '2024-02-23 07:50:37', '2024-03-15 07:08:33'),
(89, 'APPROVED', 'Doctor', '&lt;p&gt;wfeg&lt;/p&gt;', '1213,1097,878', 349, 1, NULL, 156, 32, 380, '1', NULL, '0', 'No', NULL, 17, 11, NULL, NULL, NULL, NULL, 78, 'No', 'ferfgew', 'mob@yopmail.com', '36476384', 'No', '', '', '2024-02-23 09:58:19', 'Live', 'No', 'No', 0, '2024-03-24', '4,13,14', '2024-02-23 09:58:19', '2024-03-15 07:04:44'),
(90, 'APPROVED', 'Doctor', '&lt;p&gt;WEFRAWG&lt;/p&gt;', '1649,1213,966', 348, 1, NULL, 149, 22, 15, '4', NULL, '5', 'Yes', NULL, 16, 3, NULL, NULL, NULL, NULL, 31, 'No', 'FWFW', 'MOB@yopmail.com', '75896585', 'Yes', 'FWEFWA', '', '2024-02-23 14:43:10', 'Live', 'No', 'No', 0, '2024-03-24', '3', '2024-02-23 14:43:10', '2024-03-15 11:01:29'),
(91, 'UNAPPROVED', 'doctor', '&lt;p&gt;qfdwqe&lt;/p&gt;', '1649,1213,966', 349, 1, NULL, 156, 22, 380, '6', NULL, '0', 'No', NULL, 17, 12, NULL, NULL, NULL, NULL, 31, 'No', 'wefw', 'mob@yopmail.com', '76783686', 'Yes', '', 'Male', '2024-02-23 14:45:51', 'Live', 'No', 'Yes', 0, '2024-03-24', '3', '2024-02-23 14:45:51', '2024-03-15 07:05:02'),
(92, 'UNAPPROVED', 'Design Engineer', '&lt;p&gt;Design Equipments&lt;/p&gt;', '575,733,734', 337, 1, NULL, 160, 38, 346, '6', NULL, '6', 'Yes', NULL, 16, 42, NULL, NULL, NULL, NULL, 32, 'No', 'chetan', 'chetan@angel-portal.com', '78965485', 'No', 'Design', '', '2024-02-28 09:19:34', 'Live', 'No', 'Yes', 0, '2024-03-29', '2,13', '2024-02-28 09:19:34', '2024-03-15 07:05:02'),
(93, 'UNAPPROVED', 'Chef', '&lt;p&gt;Cooking&lt;/p&gt;', '266,1805', 410, 1, NULL, 117, 28, 180, '6', NULL, '6', 'Yes', NULL, 19, 2, NULL, NULL, NULL, NULL, 32, 'No', 'chetan', 'chetan@yopmail.com', '78965458', 'Yes', 'SC', 'Male,Female', '2024-02-28 13:02:38', 'Live', 'No', 'Yes', 0, '2024-03-29', '2,31', '2024-02-28 13:02:38', '2024-03-15 07:05:02'),
(94, 'UNAPPROVED', 'new Chef', '&lt;p&gt;chef&lt;/p&gt;', '566,972,1097', 411, 2, NULL, 125, 22, 15, '1', NULL, '1', 'No', NULL, 19, 50, NULL, NULL, NULL, NULL, 32, 'No', 'chetan', 'chetan@yopmail.com', '78965485', 'No', 'Diploma', 'Female', '2024-02-28 13:05:30', 'Live', 'No', 'Yes', 0, '2024-03-29', '2,3', '2024-02-28 13:05:30', '2024-03-15 06:09:16'),
(95, 'UNAPPROVED', 'tff', '&lt;p&gt;test&lt;/p&gt;', '2625,566', 395, 10, NULL, 79, 41, 26, '3', NULL, '3', 'No', NULL, 17, 8, NULL, NULL, NULL, NULL, 63, 'aftab@angel-portal.com', 'test', 'test@gamil.com', '12345678', 'Yes', 'fdffd', 'Male,Female', '2024-03-14 07:04:20', 'Live', 'No', 'Yes', 0, '2024-04-13', '15,2', '2024-03-14 07:04:20', '2024-03-15 06:08:49'),
(96, 'APPROVED', 'tff', '&lt;p&gt;test&lt;/p&gt;', '2625,566', 395, 10, NULL, 152, 41, 26, '3', NULL, '3', 'No', NULL, 16, 8, NULL, NULL, NULL, NULL, 63, 'aftab@angel-portal.com', 'test', 'test@gamil.com', '13345678', 'Yes', 'fdffd', 'Male,Female', '2024-03-14 07:06:59', 'Live', 'No', 'Yes', 0, '2024-04-13', '15,2', '2024-03-14 07:06:59', '2024-03-15 06:09:16'),
(97, 'APPROVED', 'Php', '&lt;p&gt;test&lt;/p&gt;', '2474,1307', 346, 10, NULL, 150, 41, 12, '3', NULL, '3', 'No', NULL, 19, 9, NULL, NULL, NULL, NULL, 17, 'aftab@angel-portal.com', 'test', 'test@gmail.com', '66333366', 'Yes', 'test', 'Male,Female', '2024-03-14 07:17:26', 'Live', 'Yes', 'No', 0, '2024-04-13', '15,10', '2024-03-14 07:17:26', '2024-03-14 06:53:50'),
(98, 'APPROVED', 'Accountant', '&lt;p&gt;Accountant&lt;/p&gt;', '2623,2625', 341, 1, NULL, 76, 10, 12, '8', NULL, '3', 'No', NULL, 16, 11, NULL, NULL, NULL, NULL, 93, 'aftab@angel-portal.com', 'Chetan', 'chetan@angel-portal.com', '75896542', 'Yes', 'Accountant', 'Male,Female', '2024-03-18 10:47:14', 'Live', 'Yes', 'No', 0, '2024-04-17', '2', '2024-03-18 10:47:14', '2024-03-18 09:49:35'),
(99, 'UNAPPROVED', 'project engineer', '&lt;p&gt;enter manually&lt;/p&gt;', '2623,2625', 341, 1, NULL, 96, 10, 21, '8', NULL, '3', 'No', NULL, 19, 7, NULL, NULL, NULL, NULL, 93, 'aftab@angel-portal.com', 'ca', 'ca@yopmail.com', '78532596', 'Yes', 'dc', 'Male,Female', '2024-03-18 11:38:01', 'Live', 'Yes', 'Yes', 0, '2024-04-17', '27,2', '2024-03-18 11:38:01', '2024-03-19 06:08:10'),
(100, 'APPROVED', 'Civil engineer', '&lt;p&gt;Civil&lt;/p&gt;', '612', 340, 1, NULL, 96, 22, 211, '8', NULL, '5', 'No', NULL, 19, 18, NULL, NULL, NULL, NULL, 93, 'aftab@angel-portal.com', 'Chetan', 'Chetan@yopmail.com', '78965475', 'Yes', 'Civil', 'Male', '2024-03-19 05:49:40', 'Live', 'No', 'No', 0, '2024-04-18', '2', '2024-03-19 05:49:40', '2024-04-01 06:09:18'),
(101, 'APPROVED', 'testing', '&lt;p&gt;Testing&lt;/p&gt;', '2625,2625,1649', 350, 1, NULL, 149, 39, 21, '6', NULL, '1', 'Yes', NULL, 17, 11, NULL, NULL, NULL, NULL, 93, 'aftab@angel-portal.com', 'ca', 'ca@yopmail.com', '75425968', 'Yes', '', 'Male', '2024-03-19 06:55:07', 'Live', 'No', 'No', 0, '2024-04-18', '27,15,27,2,11', '2024-03-19 06:55:07', '2024-04-01 10:23:36'),
(102, 'UNAPPROVED', 'project engineer', '&lt;p&gt;testing&lt;/p&gt;', '625,207,813', 396, 2, NULL, 76, 10, 20, '8', NULL, '4', 'No', NULL, 17, 11, NULL, NULL, NULL, NULL, 96, 'aftab@angel-portal.com', 'com', 'com1@yopmail.com', '78965544', 'Yes', 'Finance', 'Male,Female', '2024-04-02 08:31:01', 'Live', 'Yes', 'No', 0, '2024-05-02', '27,15,2,10,4', '2024-04-02 08:31:01', '2024-04-02 06:31:01'),
(103, 'APPROVED', 'tester', '&lt;p&gt;&lt;strong&gt;testing&lt;/strong&gt;&lt;/p&gt;', '1298,726,2053', 341, 1, NULL, 162, 3, 1310, '1', NULL, '0', 'No', NULL, 16, 18, NULL, NULL, NULL, NULL, 96, 'aftab@angel-portal.com', 'com', 'com1@yopmail.com', '68378671', 'Yes', 'cs', 'Female', '2024-04-02 08:55:04', 'Live', 'No', 'No', 0, '2024-05-02', '2,4', '2024-04-02 08:55:04', '2024-04-02 06:55:04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `job_posting_view`
-- (See below for the actual view)
--
CREATE TABLE `job_posting_view` (
`id` int(15)
,`job_title` varchar(255)
,`approval_status` enum('UNAPPROVED','APPROVED')
,`job_description` text
,`skill_keyword` text
,`location_hiring` int(11)
,`no_of_openings` int(11)
,`link_job` varchar(255)
,`job_industry` int(11)
,`functional_area` int(11)
,`job_designation` int(11)
,`work_experience_from` varchar(255)
,`work_experience_to` varchar(255)
,`job_salary_to` varchar(255)
,`salary_hide` enum('Yes','No')
,`currency_type` varchar(255)
,`job_type` int(11)
,`job_education` int(11)
,`desire_candidate_profile` text
,`no_of_views` int(11)
,`no_of_like` int(15)
,`no_of_apply` int(11)
,`posted_by` int(11)
,`contact_person` varchar(100)
,`contact_email` varchar(100)
,`contact_phone` varchar(100)
,`hide_contact_details` enum('Yes','No')
,`specialization` varchar(100)
,`gender` varchar(100)
,`posted_on` datetime
,`status` enum('Live','Inactive')
,`job_highlighted` enum('No','Yes')
,`is_deleted` enum('No','Yes')
,`job_life` int(11)
,`job_expired_on` date
,`required_language` varchar(200)
,`start_date` datetime
,`update_at` timestamp
,`fullname` varchar(100)
,`email` varchar(100)
,`mob_code` varchar(100)
,`mobile` varchar(100)
,`company_name` longtext
,`company_type` varchar(100)
,`company_size` varchar(100)
,`industry` int(11)
,`address` longtext
,`country` int(11)
,`city` int(11)
,`zip` varchar(100)
,`website` longtext
,`facebook` longtext
,`instagram` longtext
,`linkedin` longtext
,`profile_img` longtext
,`location_hiring_name` varchar(255)
,`job_designation_name` varchar(255)
,`functional_name` varchar(255)
,`job_industry_name` varchar(255)
,`job_type_name` varchar(255)
,`key_skill_name` varchar(255)
,`required_language_name` varchar(255)
,`job_education_name` varchar(255)
,`job_salary_to_name` varchar(255)
,`company_size_name` varchar(255)
,`experiance` varchar(255)
,`exp_no` varchar(100)
,`company_type_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `job_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `status`, `job_type`, `is_deleted`) VALUES
(16, 'UNAPPROVED', 'Internship', 'No'),
(17, 'APPROVED', 'Part Time', 'No'),
(19, 'APPROVED', 'Full Time', 'No'),
(20, 'APPROVED', 'Freelancer', 'Yes'),
(21, 'APPROVED', 'Freelancer', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `key_skills`
--

CREATE TABLE `key_skills` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `key_skill_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `key_skills`
--

INSERT INTO `key_skills` (`id`, `status`, `key_skill_name`, `is_deleted`) VALUES
(1, 'APPROVED', 'test', 'Yes'),
(2, 'APPROVED', 'Dealer Network', 'No'),
(3, 'APPROVED', 'Direct Retail Sales', 'No'),
(4, 'APPROVED', 'Attendance Management', 'No'),
(5, 'APPROVED', 'Resourcing', 'No'),
(6, 'APPROVED', 'Business Services', 'No'),
(7, 'APPROVED', 'Client Server', 'No'),
(8, 'APPROVED', 'Blue Prism', 'Yes'),
(9, 'APPROVED', 'Power Shell', 'No'),
(10, 'APPROVED', 'Core Data', 'No'),
(11, 'APPROVED', 'Tender Document', 'No'),
(12, 'APPROVED', 'Agreement Document', 'No'),
(13, 'APPROVED', 'Visa And Immigration', 'No'),
(14, 'APPROVED', 'Developing', 'No'),
(15, 'APPROVED', 'Lifecycle Management', 'No'),
(16, 'APPROVED', 'Bmc Software', 'No'),
(17, 'APPROVED', 'Computer Proficiency', 'No'),
(18, 'APPROVED', 'Parlour', 'No'),
(19, 'APPROVED', 'Quality Manager', 'No'),
(20, 'APPROVED', 'Expenses Reporting', 'No'),
(21, 'APPROVED', 'Retail Distribuition', 'No'),
(22, 'APPROVED', 'Dealer Manager', 'No'),
(23, 'APPROVED', 'Regional Sales', 'No'),
(24, 'APPROVED', 'Adjudicate Claims', 'No'),
(25, 'APPROVED', 'Financial Markets', 'No'),
(26, 'APPROVED', 'Field Data', 'No'),
(27, 'APPROVED', 'Tele Calling', 'No'),
(28, 'APPROVED', 'Analyze Calls', 'No'),
(29, 'APPROVED', 'Queue Management', 'No'),
(30, 'APPROVED', 'Configuring Routers', 'No'),
(31, 'APPROVED', 'Software Quality Assurance', 'No'),
(32, 'APPROVED', 'Software Quality', 'No'),
(33, 'APPROVED', 'Cash Application Process', 'No'),
(34, 'APPROVED', 'Integration', 'No'),
(35, 'APPROVED', 'Hyperion Financial Reporting', 'No'),
(36, 'APPROVED', 'Cafe', 'No'),
(37, 'APPROVED', 'Continental Cook', 'No'),
(38, 'APPROVED', 'Italian Cook', 'No'),
(39, 'APPROVED', 'Duty Manager', 'No'),
(40, 'APPROVED', 'Resorts', 'No'),
(41, 'APPROVED', 'Sales Forecasting', 'No'),
(42, 'APPROVED', 'Travel Trade', 'No'),
(43, 'APPROVED', 'Reveune Plan', 'No'),
(44, 'APPROVED', 'Processing', 'No'),
(45, 'APPROVED', 'Pastry Chef', 'No'),
(46, 'APPROVED', 'Head Pastry Chef', 'No'),
(47, 'APPROVED', 'Hospital Pharmacist', 'No'),
(48, 'APPROVED', 'General Trade', 'No'),
(49, 'APPROVED', 'Area Sales Manager', 'No'),
(50, 'APPROVED', 'Batch Manufacturing', 'No'),
(51, 'APPROVED', 'Sales Training', 'No'),
(52, 'APPROVED', 'Salary Negotiation', 'No'),
(53, 'APPROVED', 'Telephonic', 'No'),
(54, 'APPROVED', 'Finance And International Business', 'No'),
(55, 'APPROVED', 'Biz Development', 'No'),
(56, 'APPROVED', 'Database Support', 'No'),
(57, 'APPROVED', 'Functional Consultancy', 'No'),
(58, 'APPROVED', 'License Management', 'No'),
(59, 'APPROVED', 'Task Management', 'No'),
(60, 'APPROVED', 'Process Service Delivery', 'No'),
(61, 'APPROVED', 'Training Management', 'No'),
(62, 'APPROVED', 'Management Support', 'No'),
(63, 'APPROVED', 'Test Engineer', 'No'),
(64, 'APPROVED', 'Infrastructure Administration', 'No'),
(65, 'APPROVED', 'User Access Management', 'No'),
(66, 'APPROVED', 'Product Servicing', 'No'),
(67, 'APPROVED', 'Escalations Management', 'Yes'),
(68, 'APPROVED', 'Backend Operations', 'No'),
(69, 'APPROVED', 'Effective Management', 'No'),
(70, 'APPROVED', 'Fax Management', 'No'),
(71, 'APPROVED', 'Ar Calling', 'No'),
(72, 'APPROVED', 'Blended Process', 'No'),
(73, 'APPROVED', 'Health Care Bpo', 'No'),
(74, 'APPROVED', 'Claim Processing', 'No'),
(75, 'APPROVED', 'Clinical Development', 'No'),
(76, 'APPROVED', 'Accounting Management', 'No'),
(77, 'APPROVED', 'Business Development Executive', 'No'),
(78, 'APPROVED', 'Mobile Tester', 'No'),
(79, 'APPROVED', 'Post Delivery Support', 'No'),
(80, 'APPROVED', 'Network Infrastructure', 'No'),
(81, 'APPROVED', 'Sales Assistant', 'No'),
(82, 'APPROVED', 'Selling', 'No'),
(83, 'APPROVED', 'Sales Officer', 'No'),
(84, 'APPROVED', 'Personnel Management', 'No'),
(85, 'APPROVED', 'Demand Forecasting', 'No'),
(86, 'APPROVED', 'Area Management', 'No'),
(87, 'APPROVED', 'Investigation', 'No'),
(88, 'APPROVED', 'Pediatrician', 'No'),
(89, 'APPROVED', 'Monitoring Revenue', 'No'),
(90, 'APPROVED', 'General Ledger Accounting', 'No'),
(91, 'APPROVED', 'Real Estate', 'No'),
(92, 'APPROVED', 'Direct Sales', 'No'),
(93, 'APPROVED', 'Branch Management', 'No'),
(94, 'APPROVED', 'Migrations', 'No'),
(95, 'APPROVED', 'Organization Skills', 'No'),
(96, 'APPROVED', 'Technical Expert', 'No'),
(97, 'APPROVED', 'Sales Reperesntative', 'Yes'),
(98, 'APPROVED', 'Manager Development', 'No'),
(99, 'APPROVED', 'Sap Finance', 'No'),
(100, 'APPROVED', 'Training Support', 'No'),
(101, 'APPROVED', 'Liquidity Management', 'No'),
(102, 'APPROVED', 'Leadership Hiring', 'No'),
(103, 'APPROVED', 'Computer Software', 'No'),
(104, 'APPROVED', 'Settling', 'No'),
(105, 'APPROVED', 'Storage Configuration', 'No'),
(106, 'APPROVED', 'Data Center Operations', 'No'),
(107, 'APPROVED', 'Customer Management', 'No'),
(108, 'APPROVED', 'Load Testing', 'No'),
(109, 'APPROVED', 'Machine Learning', 'No'),
(110, 'APPROVED', 'Contracts Negotiations', 'No'),
(111, 'APPROVED', 'Technology Solutions', 'No'),
(112, 'APPROVED', 'Packer', 'No'),
(113, 'APPROVED', 'Case Analysis', 'No'),
(114, 'APPROVED', 'Drug Safety', 'No'),
(115, 'APPROVED', 'Quality Check', 'No'),
(116, 'APPROVED', 'Guitar Teacher', 'No'),
(117, 'APPROVED', 'Music Teacher', 'No'),
(118, 'APPROVED', 'Organizational Leadership', 'No'),
(119, 'APPROVED', 'Integration Testing', 'No'),
(120, 'APPROVED', 'File Preparation', 'No'),
(121, 'APPROVED', 'Process  Management', 'No'),
(122, 'APPROVED', 'People Development', 'No'),
(123, 'APPROVED', 'Static Analysis', 'No'),
(124, 'APPROVED', 'Motor Claims Management', 'No'),
(125, 'APPROVED', 'Transaction Processing', 'No'),
(126, 'APPROVED', 'Service Excellence', 'No'),
(127, 'APPROVED', 'Data Volume Management', 'No'),
(128, 'APPROVED', 'Technical Analysis', 'No'),
(129, 'APPROVED', 'Revenue Enhancement', 'No'),
(130, 'APPROVED', 'Process Outsourcing', 'No'),
(131, 'APPROVED', 'Performance Measurement', 'No'),
(132, 'APPROVED', 'Manpower Management', 'No'),
(133, 'APPROVED', 'System Maintenance', 'No'),
(134, 'APPROVED', 'Iso Documentation', 'No'),
(135, 'APPROVED', 'Financial Accounting', 'No'),
(136, 'APPROVED', 'Turnaround Management', 'No'),
(137, 'APPROVED', 'Prospecting Customers', 'No'),
(138, 'APPROVED', 'Systems Integration', 'No'),
(139, 'APPROVED', 'Accent Neutralisation', 'No'),
(140, 'APPROVED', 'Generating Reports', 'No'),
(141, 'APPROVED', 'Customer Support Management', 'No'),
(142, 'APPROVED', 'Solutions Architecture', 'No'),
(143, 'APPROVED', 'Business Process Alignment', 'No'),
(144, 'APPROVED', 'Customer Invoicing', 'No'),
(145, 'APPROVED', 'Enrollment', 'No'),
(146, 'APPROVED', 'Payment Allocation', 'No'),
(147, 'APPROVED', 'Process Establishment', 'No'),
(148, 'APPROVED', 'Workforce Management', 'Yes'),
(149, 'APPROVED', 'Superior Leadership', 'No'),
(150, 'APPROVED', 'Monitoring Transactions', 'No'),
(151, 'APPROVED', 'Global Outsourcing', 'No'),
(152, 'APPROVED', 'Executive Assistant', 'No'),
(153, 'APPROVED', 'Hardware Support', 'No'),
(154, 'APPROVED', 'Internal Audits', 'No'),
(155, 'APPROVED', 'Middle Management', 'No'),
(156, 'APPROVED', 'Configuration Management', 'No'),
(157, 'APPROVED', 'Infrastructure Planning', 'No'),
(158, 'APPROVED', 'Pmo Management', 'No'),
(159, 'APPROVED', 'Rate Analysis', 'No'),
(160, 'APPROVED', 'Analysing Performance', 'No'),
(161, 'APPROVED', 'Asset Servicing', 'No'),
(162, 'APPROVED', 'Lead Management', 'No'),
(163, 'APPROVED', 'Service Deployment', 'No'),
(164, 'APPROVED', 'Reconciliation Process', 'No'),
(165, 'APPROVED', 'Risk Based Management', 'No'),
(166, 'APPROVED', 'Mailbox Migration', 'No'),
(167, 'APPROVED', 'Socket Programming', 'No'),
(168, 'APPROVED', 'Unit Testing', 'No'),
(169, 'APPROVED', 'Area Development Manager', 'No'),
(170, 'APPROVED', 'Promotional Activities', 'No'),
(171, 'APPROVED', 'Field Activities', 'No'),
(172, 'APPROVED', 'Data Research', 'No'),
(173, 'APPROVED', 'Agency Development', 'No'),
(174, 'APPROVED', 'Car Service', 'No'),
(175, 'APPROVED', 'Travel Process', 'No'),
(176, 'APPROVED', 'Hotel Operations', 'No'),
(177, 'APPROVED', 'Assistant Sales Manager', 'No'),
(178, 'APPROVED', 'Electronic Manufacturing', 'No'),
(179, 'APPROVED', 'Cyber Security', 'No'),
(180, 'APPROVED', 'Process Consulting', 'No'),
(181, 'APPROVED', 'Citrix Xenapp', 'No'),
(182, 'APPROVED', 'Quality Deployment', 'No'),
(183, 'APPROVED', 'Floor Management', 'No'),
(184, 'APPROVED', 'Microsoft Word', 'No'),
(185, 'APPROVED', 'Accounting Skills', 'Yes'),
(186, 'APPROVED', 'Content Management', 'No'),
(187, 'APPROVED', 'Sanity Testing', 'No'),
(188, 'APPROVED', 'Accounts Receivables', 'Yes'),
(189, 'APPROVED', 'Chain Management', 'No'),
(190, 'APPROVED', 'Talent Development', 'No'),
(191, 'APPROVED', 'Stakeholder Relationship Management', 'No'),
(192, 'APPROVED', 'Data Administration', 'No'),
(193, 'APPROVED', 'International Payroll', 'No'),
(194, 'APPROVED', 'Service Delivery Management', 'No'),
(195, 'APPROVED', 'Time Analysis', 'No'),
(196, 'APPROVED', 'Inbound Process', 'No'),
(197, 'APPROVED', 'Research Development', 'No'),
(198, 'APPROVED', 'Computer Management', 'No'),
(199, 'APPROVED', 'General?ledger', 'Yes'),
(200, 'APPROVED', 'Business Applications', 'No'),
(201, 'APPROVED', 'Category Management', 'No'),
(202, 'APPROVED', 'Work Management', 'No'),
(203, 'APPROVED', 'Voice Communication', 'No'),
(204, 'APPROVED', 'Purchasing Officer', 'No'),
(205, 'APPROVED', 'Cath Lab Technician', 'No'),
(206, 'APPROVED', 'Six Sigma', 'No'),
(207, 'APPROVED', 'Project Control', 'No'),
(208, 'APPROVED', 'Scheduling', 'No'),
(209, 'APPROVED', 'Property Management', 'No'),
(210, 'APPROVED', 'Gas Processing', 'No'),
(211, 'APPROVED', 'Airlines', 'No'),
(212, 'APPROVED', 'Fleet Management', 'No'),
(213, 'APPROVED', 'Questionnaire Designing', 'No'),
(214, 'APPROVED', 'Oriented Management', 'No'),
(215, 'APPROVED', 'Sql Database Administration', 'No'),
(216, 'APPROVED', 'Network Management', 'No'),
(217, 'APPROVED', 'Meeting Management', 'No'),
(218, 'APPROVED', 'Cash Reconciliation', 'No'),
(219, 'APPROVED', 'Schedule Management', 'No'),
(220, 'APPROVED', 'Manufacture', 'Yes'),
(221, 'APPROVED', 'Gynaecology', 'No'),
(222, 'APPROVED', 'Network Administration', 'No'),
(223, 'APPROVED', 'Resource Allocation', 'No'),
(224, 'APPROVED', 'File Management', 'No'),
(225, 'APPROVED', 'Technician', 'No'),
(226, 'APPROVED', 'Facilities Management', 'No'),
(227, 'APPROVED', 'Customer Service Management', 'No'),
(228, 'APPROVED', 'Mobile Sales', 'No'),
(229, 'APPROVED', 'Marketing Management', 'No'),
(230, 'APPROVED', 'Technician Activities', 'No'),
(231, 'APPROVED', 'Overhauling', 'No'),
(232, 'APPROVED', 'Servicing', 'No'),
(233, 'APPROVED', 'Automobile Service', 'No'),
(234, 'APPROVED', 'Interpersonal', 'No'),
(235, 'APPROVED', 'Good Management', 'No'),
(236, 'APPROVED', 'Analyzing Customer Requirements', 'No'),
(237, 'APPROVED', 'Process And Reporting Analysis', 'No'),
(238, 'APPROVED', 'Account Receivable', 'Yes'),
(239, 'APPROVED', 'Process Handelling', 'No'),
(240, 'APPROVED', 'Income Recognition', 'No'),
(241, 'APPROVED', 'Monitoring Reviews', 'No'),
(242, 'APPROVED', 'Adobe Acrobat', 'No'),
(243, 'APPROVED', 'Presales Solutioning', 'No'),
(244, 'APPROVED', 'Sales Representative', 'No'),
(245, 'APPROVED', 'System Troubleshooting', 'No'),
(246, 'APPROVED', 'User Support', 'No'),
(247, 'APPROVED', 'Field Technician', 'No'),
(248, 'APPROVED', 'Electronic Technician', 'No'),
(249, 'APPROVED', 'Mechanic', 'No'),
(250, 'APPROVED', 'Supply Planning', 'No'),
(251, 'APPROVED', 'Product Benchmarking', 'No'),
(252, 'APPROVED', 'Training Program', 'No'),
(253, 'APPROVED', 'Bid Management', 'No'),
(254, 'APPROVED', 'Local Provisioning', 'No'),
(255, 'APPROVED', 'Cellular Provisioning', 'No'),
(256, 'APPROVED', 'Senior Management Interaction', 'No'),
(257, 'APPROVED', 'Bottom Quartile Management', 'No'),
(258, 'APPROVED', 'Escalation Management', 'No'),
(259, 'APPROVED', 'Business Mnaqgement', 'Yes'),
(260, 'APPROVED', 'Strategic Analysis', 'No'),
(261, 'APPROVED', 'Library Management System', 'No'),
(262, 'APPROVED', 'Restriction Analysis', 'No'),
(263, 'APPROVED', 'Work Force Management', 'No'),
(264, 'APPROVED', 'Customer Relationship Managemnet', 'No'),
(265, 'APPROVED', 'Site Management', 'No'),
(266, 'APPROVED', 'Chef', 'No'),
(267, 'APPROVED', 'Risk Analysis', 'No'),
(268, 'APPROVED', 'Factory', 'No'),
(269, 'APPROVED', 'Worker', 'No'),
(270, 'APPROVED', 'Machinery', 'No'),
(271, 'APPROVED', 'Process Operations', 'No'),
(272, 'APPROVED', 'Resolving Queries', 'No'),
(273, 'APPROVED', 'Health Management Systems', 'No'),
(274, 'APPROVED', 'Truck Operator', 'No'),
(275, 'APPROVED', 'Cooperative Management', 'No'),
(276, 'APPROVED', 'Instructional Designing', 'No'),
(277, 'APPROVED', 'Leading Team', 'No'),
(278, 'APPROVED', 'Process Enhancements', 'No'),
(279, 'APPROVED', 'System Development', 'No'),
(280, 'APPROVED', 'Six Sigma Management', 'No'),
(281, 'APPROVED', 'Client Communication', 'No'),
(282, 'APPROVED', 'Vendor Operation', 'No'),
(283, 'APPROVED', 'System Management', 'No'),
(284, 'APPROVED', 'Roster Management', 'No'),
(285, 'APPROVED', 'Blog Writing', 'No'),
(286, 'APPROVED', 'Supervision', 'No'),
(287, 'APPROVED', 'Posttension', 'No'),
(288, 'APPROVED', 'Agriculture', 'No'),
(289, 'APPROVED', 'Internal Medicine', 'No'),
(290, 'APPROVED', 'Gastroenterologist', 'No'),
(291, 'APPROVED', 'Planning Engineer', 'No'),
(292, 'APPROVED', 'Trademarketing', 'No'),
(293, 'APPROVED', 'Process Documentation', 'No'),
(294, 'APPROVED', 'Process Improvement', 'No'),
(295, 'APPROVED', 'Processes Analysis', 'No'),
(296, 'APPROVED', 'Line Monitoring', 'No'),
(297, 'APPROVED', 'Water Analyst', 'No'),
(298, 'APPROVED', 'Presales', 'No'),
(299, 'APPROVED', 'Delivery Catalyst', 'No'),
(300, 'APPROVED', 'Situation Management', 'No'),
(301, 'APPROVED', 'Planning Management', 'No'),
(302, 'APPROVED', 'Distribution Operation', 'No'),
(303, 'APPROVED', 'Invoice Booking', 'No'),
(304, 'APPROVED', 'Cost Management', 'No'),
(305, 'APPROVED', 'Managing Team', 'No'),
(306, 'APPROVED', 'Maintaining Productivity', 'No'),
(307, 'APPROVED', 'Printing', 'No'),
(308, 'APPROVED', 'Maintaining Routing', 'No'),
(309, 'APPROVED', 'Managing Clusters', 'No'),
(310, 'APPROVED', 'Mercahndiser', 'Yes'),
(311, 'APPROVED', 'Process Standardization', 'No'),
(312, 'APPROVED', 'Team Handling Skills', 'No'),
(313, 'APPROVED', 'Receptionsit Cum Secratory', 'Yes'),
(314, 'APPROVED', 'Transport Management', 'No'),
(315, 'APPROVED', 'Printer Management', 'No'),
(316, 'APPROVED', 'Microsoft Vss', 'No'),
(317, 'APPROVED', 'Operational Management', 'No'),
(318, 'APPROVED', 'Monitoring', 'No'),
(319, 'APPROVED', 'Heavy Machinery', 'No'),
(320, 'APPROVED', 'Trade Management', 'No'),
(321, 'APPROVED', 'Capital Market', 'No'),
(322, 'APPROVED', 'Client Meetings', 'No'),
(323, 'APPROVED', 'Telecaller', 'No'),
(324, 'APPROVED', 'Application Development', 'No'),
(325, 'APPROVED', 'Digital Asset Management', 'No'),
(326, 'APPROVED', 'Car Rental', 'No'),
(327, 'APPROVED', 'Coaching Skills', 'No'),
(328, 'APPROVED', 'Client Interfacing Skills', 'No'),
(329, 'APPROVED', 'Business Process Consulting', 'No'),
(330, 'APPROVED', 'Export Import Documentation', 'No'),
(331, 'APPROVED', 'Customs Documentation', 'No'),
(332, 'APPROVED', 'Performance Auditing', 'No'),
(333, 'APPROVED', 'Scaffolding', 'No'),
(334, 'APPROVED', 'Catalog Management', 'Yes'),
(335, 'APPROVED', 'Master Data Management', 'No'),
(336, 'APPROVED', 'Catalogue Management', 'No'),
(337, 'APPROVED', 'Profit And Loss Analysis', 'No'),
(338, 'APPROVED', 'Payroll Processing', 'No'),
(339, 'APPROVED', 'Attendance Maintenance', 'No'),
(340, 'APPROVED', 'Employee Retention', 'No'),
(341, 'APPROVED', 'Typing', 'No'),
(342, 'APPROVED', 'System Administration', 'No'),
(343, 'APPROVED', 'Reconciling Cash', 'No'),
(344, 'APPROVED', 'Internal Auditor', 'No'),
(345, 'APPROVED', 'Project Planner', 'No'),
(346, 'APPROVED', 'Project Scheduler', 'No'),
(347, 'APPROVED', 'Manager Operations', 'No'),
(348, 'APPROVED', 'Safety', 'No'),
(349, 'APPROVED', 'Hse Officer', 'No'),
(350, 'APPROVED', 'Sales Marketing', 'No'),
(351, 'APPROVED', 'Software', 'No'),
(352, 'APPROVED', 'Internet Applications', 'No'),
(353, 'APPROVED', 'Program Assistants', 'No'),
(354, 'APPROVED', 'Tally Erp', 'No'),
(355, 'APPROVED', 'Solid Edge', 'No'),
(356, 'APPROVED', 'C Language', 'No'),
(357, 'APPROVED', 'Conflict Resolution', 'No'),
(358, 'APPROVED', 'Conflict Management', 'No'),
(359, 'APPROVED', 'Oracle Bi', 'No'),
(360, 'APPROVED', 'Ansible', 'No'),
(361, 'APPROVED', 'Devops', 'No'),
(362, 'APPROVED', 'Draftsman', 'No'),
(363, 'APPROVED', 'Autocad', 'No'),
(364, 'APPROVED', 'Construction', 'No'),
(365, 'APPROVED', 'Water System', 'No'),
(366, 'APPROVED', 'Swimming Pool Attendant', 'No'),
(367, 'APPROVED', 'Visa Processing', 'No'),
(368, 'APPROVED', 'Induction', 'No'),
(369, 'APPROVED', 'Onboarding', 'No'),
(370, 'APPROVED', 'Hr Resources', 'No'),
(371, 'APPROVED', 'Hr Executive', 'No'),
(372, 'APPROVED', 'Commodity Trading', 'No'),
(373, 'APPROVED', 'Trading', 'No'),
(374, 'APPROVED', 'Traders', 'No'),
(375, 'APPROVED', 'Quality Control Engineer', 'No'),
(376, 'APPROVED', 'Document Controller', 'No'),
(377, 'APPROVED', 'Ppe Sales', 'No'),
(378, 'APPROVED', 'Industrial Sale', 'No'),
(379, 'APPROVED', 'Audit', 'No'),
(380, 'APPROVED', 'Tenant', 'No'),
(381, 'APPROVED', 'Purchase Management', 'No'),
(382, 'APPROVED', 'Catering', 'No'),
(383, 'APPROVED', 'Waiter', 'No'),
(384, 'APPROVED', 'Lifting Inspector', 'No'),
(385, 'APPROVED', 'Pmp', 'No'),
(386, 'APPROVED', 'Lead Engineer', 'No'),
(387, 'APPROVED', 'Oil And Gas', 'No'),
(388, 'APPROVED', 'Junior Accountant', 'No'),
(389, 'APPROVED', 'Wireshark', 'No'),
(390, 'APPROVED', 'Estimation And Proposal Engineering', 'No'),
(391, 'APPROVED', 'Commerical Manager', 'No'),
(392, 'APPROVED', 'Spring Framework', 'No'),
(393, 'APPROVED', 'Biomedical', 'No'),
(394, 'APPROVED', 'Yard Manager', 'No'),
(395, 'APPROVED', 'Oil Petroleum', 'No'),
(396, 'APPROVED', 'Loss Prevention', 'No'),
(397, 'APPROVED', 'Tender Prepration', 'No'),
(398, 'APPROVED', 'Civil Maintenance', 'No'),
(399, 'APPROVED', 'Relationship Officer', 'No'),
(400, 'APPROVED', 'Rm Manager', 'No'),
(401, 'APPROVED', 'Relationship Manager', 'No'),
(402, 'APPROVED', 'Property Manager', 'No'),
(403, 'APPROVED', 'Labour Camp', 'No'),
(404, 'APPROVED', 'Store Operations', 'No'),
(405, 'APPROVED', 'Store Keeping', 'No'),
(406, 'APPROVED', 'Fitter', 'No'),
(407, 'APPROVED', 'Pest Control Services', 'No'),
(408, 'APPROVED', 'Sales Head', 'No'),
(409, 'APPROVED', 'Fmcg', 'No'),
(410, 'APPROVED', 'Building Planner', 'No'),
(411, 'APPROVED', 'Planner', 'No'),
(412, 'APPROVED', 'Marking', 'No'),
(413, 'APPROVED', 'Analytical Thinking', 'No'),
(414, 'APPROVED', 'Interior Design', 'No'),
(415, 'APPROVED', 'Sales Manager', 'No'),
(416, 'APPROVED', 'Auditor', 'No'),
(417, 'APPROVED', 'Maintenance', 'No'),
(418, 'APPROVED', 'Visualization', 'No'),
(419, 'APPROVED', 'ENHANCEMENT', 'No'),
(420, 'APPROVED', 'Technical Architecture', 'No'),
(421, 'APPROVED', 'System Analyst', 'No'),
(422, 'APPROVED', 'Sales Lead Generation', 'No'),
(423, 'APPROVED', 'Mvc Framework', 'No'),
(424, 'APPROVED', 'Tfs', 'No'),
(425, 'APPROVED', 'Solution Sales', 'No'),
(426, 'APPROVED', 'Product Sales', 'No'),
(427, 'APPROVED', 'Pre Sales Executive', 'No'),
(428, 'APPROVED', 'Sales & Business Development', 'No'),
(429, 'APPROVED', 'Logistics Procurement', 'No'),
(430, 'APPROVED', 'Operation Head', 'No'),
(431, 'APPROVED', 'Commercial Executive', 'No'),
(432, 'APPROVED', 'Estimation', 'No'),
(433, 'APPROVED', 'Power Builder Developer', 'No'),
(434, 'APPROVED', 'Budgeting & Cost Control', 'No'),
(435, 'APPROVED', 'Strategy Planning', 'No'),
(436, 'APPROVED', 'Project Handling', 'No'),
(437, 'APPROVED', 'Project Budget', 'No'),
(438, 'APPROVED', 'Hiring  Sourcing', 'No'),
(439, 'APPROVED', 'Interview Scheduling', 'No'),
(440, 'APPROVED', 'It Staffing', 'No'),
(441, 'APPROVED', 'Screening', 'No'),
(442, 'APPROVED', 'Data Analyst', 'No'),
(443, 'APPROVED', 'React.js', 'No'),
(444, 'APPROVED', 'Git', 'No'),
(445, 'APPROVED', 'Node.js', 'No'),
(446, 'APPROVED', 'Xslt', 'No'),
(447, 'APPROVED', 'Markup Languages', 'No'),
(448, 'APPROVED', 'Object Oriented Javascript', 'No'),
(449, 'APPROVED', 'Investment Process', 'No'),
(450, 'APPROVED', 'Communication Skills', 'No'),
(451, 'APPROVED', 'Major Incident Management', 'No'),
(452, 'APPROVED', 'Employee Transport', 'No'),
(453, 'APPROVED', 'Purchase Orders', 'No'),
(454, 'APPROVED', 'Security Services', 'No'),
(455, 'APPROVED', 'Plant Merchandiser', 'No'),
(456, 'APPROVED', 'Apparel Merchandising', 'No'),
(457, 'APPROVED', 'Apparel Manufacturing', 'No'),
(458, 'APPROVED', 'Fabric Planner', 'No'),
(459, 'APPROVED', 'Hardware', 'No'),
(460, 'APPROVED', 'Broadband', 'No'),
(461, 'APPROVED', 'Test Environment Management', 'No'),
(462, 'APPROVED', 'Windows Server', 'No'),
(463, 'APPROVED', 'Inter Personal Skills', 'No'),
(464, 'APPROVED', 'Logical Reasoning', 'No'),
(465, 'APPROVED', 'Reporting', 'No'),
(466, 'APPROVED', 'Management Skill', 'No'),
(467, 'APPROVED', 'Borrowers Verification', 'No'),
(468, 'APPROVED', 'Ratio Calculation', 'No'),
(469, 'APPROVED', 'Calendar Maintenance', 'No'),
(470, 'APPROVED', 'Managing Communication', 'No'),
(471, 'APPROVED', 'Meeting Coordination', 'No'),
(472, 'APPROVED', 'Talent Management', 'No'),
(473, 'APPROVED', 'Employee Engagement', 'No'),
(474, 'APPROVED', 'Hardware Troubleshoot', 'No'),
(475, 'APPROVED', 'Soft Skills', 'No'),
(476, 'APPROVED', 'Inventory Control', 'No'),
(477, 'APPROVED', 'Interaction Skills', 'No'),
(478, 'APPROVED', 'Citrix Application', 'No'),
(479, 'APPROVED', 'Online Sales', 'No'),
(480, 'APPROVED', 'E - Commerce', 'No'),
(481, 'APPROVED', 'Marketing Campaigns', 'No'),
(482, 'APPROVED', 'Storage Solutions', 'No'),
(483, 'APPROVED', 'Climate Technologies', 'No'),
(484, 'APPROVED', 'Team Coordination', 'No'),
(485, 'APPROVED', 'Network Design', 'No'),
(486, 'APPROVED', 'Networking Operations', 'No'),
(487, 'APPROVED', 'Transmission', 'No'),
(488, 'APPROVED', 'Program Management', 'No'),
(489, 'APPROVED', 'Environment Management', 'No'),
(490, 'APPROVED', 'Vba Developer', 'No'),
(491, 'APPROVED', 'Data Analytics', 'No'),
(492, 'APPROVED', 'Internal External Reconciliation', 'No'),
(493, 'APPROVED', 'Test Management', 'No'),
(494, 'APPROVED', 'Security Automation', 'No'),
(495, 'APPROVED', 'Security Testing', 'No'),
(496, 'APPROVED', 'Security Analysis', 'No'),
(497, 'APPROVED', 'Consumer Insights', 'No'),
(498, 'APPROVED', 'Customer Interaction', 'No'),
(499, 'APPROVED', 'Client Interaction', 'No'),
(500, 'APPROVED', 'Form Filling', 'No'),
(501, 'APPROVED', 'Treasury Management', 'No'),
(502, 'APPROVED', 'Financial Operations', 'No'),
(503, 'APPROVED', 'Data Validation', 'No'),
(504, 'APPROVED', 'Functional Consulting', 'No'),
(505, 'APPROVED', 'Mulesoft Developer', 'No'),
(506, 'APPROVED', 'Oracle Cloud Apps', 'No'),
(507, 'APPROVED', 'Handling Conference Call', 'No'),
(508, 'APPROVED', 'Field Service Management', 'No'),
(509, 'APPROVED', 'Crm Consultanting', 'No'),
(510, 'APPROVED', 'People Leadership', 'No'),
(511, 'APPROVED', 'Strategic Management', 'No'),
(512, 'APPROVED', 'Stock Inventory', 'No'),
(513, 'APPROVED', 'Washing', 'No'),
(514, 'APPROVED', 'Textile Testing', 'No'),
(515, 'APPROVED', 'Data Entry Skills', 'No'),
(516, 'APPROVED', 'Mis Operation', 'No'),
(517, 'APPROVED', 'Outbound Customer Services', 'No'),
(518, 'APPROVED', 'Voice Proces', 'Yes'),
(519, 'APPROVED', 'B2c Sales', 'No'),
(520, 'APPROVED', 'Automation', 'No'),
(521, 'APPROVED', 'Lfs', 'No'),
(522, 'APPROVED', 'Accounts Process', 'No'),
(523, 'APPROVED', 'Customer Engagement', 'No'),
(524, 'APPROVED', 'Report Analysis', 'No'),
(525, 'APPROVED', 'Request Management', 'No'),
(526, 'APPROVED', 'Swot Analysis', 'No'),
(527, 'APPROVED', 'Leadership Skills', 'No'),
(528, 'APPROVED', 'Transaction Analysis', 'No'),
(529, 'APPROVED', 'Personality Development', 'No'),
(530, 'APPROVED', 'Emotional Intelligence', 'No'),
(531, 'APPROVED', 'Siebel Crm', 'No'),
(532, 'APPROVED', 'Graphic Designing', 'No'),
(533, 'APPROVED', 'Desktop Publishing', 'No'),
(534, 'APPROVED', 'Microsoft', 'No'),
(535, 'APPROVED', 'Excel Macros', 'No'),
(536, 'APPROVED', 'International Bpo', 'No'),
(537, 'APPROVED', 'Leave Management', 'No'),
(538, 'APPROVED', 'Analyzing Business Requirements', 'No'),
(539, 'APPROVED', 'Ssis', 'Yes'),
(540, 'APPROVED', 'Server Data Modeling', 'No'),
(541, 'APPROVED', 'Ssrs', 'Yes'),
(542, 'APPROVED', 'Software Development Methodologies', 'No'),
(543, 'APPROVED', 'Management Consulting', 'No'),
(544, 'APPROVED', 'Typewriting', 'No'),
(545, 'APPROVED', 'Network Planning', 'No'),
(546, 'APPROVED', 'Nostro Reconciliation', 'No'),
(547, 'APPROVED', 'Trade Booking', 'No'),
(548, 'APPROVED', 'Reconciliation', 'No'),
(549, 'APPROVED', 'Process Consultation', 'No'),
(550, 'APPROVED', 'Financial Transactions', 'No'),
(551, 'APPROVED', 'Mentoring Team Work', 'No'),
(552, 'APPROVED', 'Organizing', 'No'),
(553, 'APPROVED', 'Development Specialist', 'No'),
(554, 'APPROVED', 'Behavioral Training', 'No'),
(555, 'APPROVED', 'Report Automation', 'No'),
(556, 'APPROVED', 'Six Sigma Black Belt', 'No'),
(557, 'APPROVED', 'Inbound Outbound Calling', 'No'),
(558, 'APPROVED', 'Payment Posting', 'No'),
(559, 'APPROVED', 'Medical Billing', 'No'),
(560, 'APPROVED', 'Troubleshoot Presentation', 'No'),
(561, 'APPROVED', 'Virtual Management', 'No'),
(562, 'APPROVED', 'Teaching Skills', 'No'),
(563, 'APPROVED', 'Sla Management', 'No'),
(564, 'APPROVED', 'Call Monitoring', 'No'),
(565, 'APPROVED', 'Aws', 'No'),
(566, 'APPROVED', '.net Framework', 'No'),
(567, 'APPROVED', 'Web Services', 'No'),
(568, 'APPROVED', 'Account Manager', 'No'),
(569, 'APPROVED', 'Enterprise Sales', 'No'),
(570, 'APPROVED', 'Hvac Engineering', 'No'),
(571, 'APPROVED', 'System Support', 'No'),
(572, 'APPROVED', 'Application Engineering', 'No'),
(573, 'APPROVED', 'Database Design', 'No'),
(574, 'APPROVED', 'Production Engineering', 'No'),
(575, 'APPROVED', 'Design Development', 'No'),
(576, 'APPROVED', 'Recruitment Skills', 'No'),
(577, 'APPROVED', 'Requirement Anlysis', 'Yes'),
(578, 'APPROVED', 'Hr Administration', 'No'),
(579, 'APPROVED', 'Financial Staffing', 'No'),
(580, 'APPROVED', 'Vendor Reconciliation', 'No'),
(581, 'APPROVED', 'Invoice Processing', 'No'),
(582, 'APPROVED', 'Remote Infrastructure', 'No'),
(583, 'APPROVED', 'Data Center Migration', 'No'),
(584, 'APPROVED', 'Counseling', 'Yes'),
(585, 'APPROVED', 'Analyzing', 'No'),
(586, 'APPROVED', 'Service Management', 'No'),
(587, 'APPROVED', 'Group Leading', 'No'),
(588, 'APPROVED', 'Infrastructure Management', 'No'),
(589, 'APPROVED', 'Recruiting', 'No'),
(590, 'APPROVED', 'Service Provider', 'No'),
(591, 'APPROVED', 'Change Management', 'Yes'),
(592, 'APPROVED', 'Process Design', 'No'),
(593, 'APPROVED', 'Process Mapping', 'No'),
(594, 'APPROVED', 'Process Assessment', 'No'),
(595, 'APPROVED', 'Ratio Analysis', 'No'),
(596, 'APPROVED', 'Detail Oriented Skills', 'No'),
(597, 'APPROVED', 'Customs Process Management', 'No'),
(598, 'APPROVED', 'Application Implementation Management', 'No'),
(599, 'APPROVED', 'Digital Media', 'No'),
(600, 'APPROVED', 'Data Extraction', 'No'),
(601, 'APPROVED', 'Interpersonal Relationships', 'No'),
(602, 'APPROVED', 'Release Management', 'No'),
(603, 'APPROVED', 'Report Writing ', 'No'),
(604, 'APPROVED', 'Deliver Quality Requirements', 'No'),
(605, 'APPROVED', 'Client Relationship Management', 'No'),
(606, 'APPROVED', 'Vendor Cataloguing', 'No'),
(607, 'APPROVED', 'Software Operating', 'No'),
(608, 'APPROVED', 'Data Management', 'No'),
(609, 'APPROVED', 'Qa Management', 'No'),
(610, 'APPROVED', 'Resource Management', 'No'),
(611, 'APPROVED', 'Kg Teacher', 'No'),
(612, 'APPROVED', 'Civil Construction', 'No'),
(613, 'APPROVED', 'Functional Testing', 'No'),
(614, 'APPROVED', 'Crm Testing', 'No'),
(615, 'APPROVED', 'Dynamics Testing', 'No'),
(616, 'APPROVED', 'Qaqc Inspector', 'No'),
(617, 'APPROVED', 'Proposal Engineering', 'No'),
(618, 'APPROVED', 'Technical Sales', 'No'),
(619, 'APPROVED', 'Sql Database Administrator', 'No'),
(620, 'APPROVED', 'Microsoft Azure', 'No'),
(621, 'APPROVED', 'Sap Maintenance', 'No'),
(622, 'APPROVED', 'Technical Writer', 'No'),
(623, 'APPROVED', 'Technical Author', 'No'),
(624, 'APPROVED', 'Reliability Studies', 'No'),
(625, 'APPROVED', 'Planning Project', 'No'),
(626, 'APPROVED', 'Planning Manager', 'No'),
(627, 'APPROVED', 'Technical Sales Engineer', 'No'),
(628, 'APPROVED', 'Trade Settlement', 'No'),
(629, 'APPROVED', 'Concrete Research', 'No'),
(630, 'APPROVED', 'Manager Research Development', 'No'),
(631, 'APPROVED', 'Magento', 'No'),
(632, 'APPROVED', 'Research & Development', 'No'),
(633, 'APPROVED', 'Settlement', 'No'),
(634, 'APPROVED', 'Stock Reconciliation', 'No'),
(635, 'APPROVED', 'Transition Management', 'No'),
(636, 'APPROVED', 'Health Care Management', 'No'),
(637, 'APPROVED', 'Database Maintenance', 'No'),
(638, 'APPROVED', 'Pharamcy', 'Yes'),
(639, 'APPROVED', 'Media Planning', 'No'),
(640, 'APPROVED', 'Cost Estimation', 'No'),
(641, 'APPROVED', 'Senior Management', 'No'),
(642, 'APPROVED', 'Commercial Negotiations', 'No'),
(643, 'APPROVED', 'Team Building', 'No'),
(644, 'APPROVED', 'Cost Control', 'No'),
(645, 'APPROVED', 'Mutual Funds', 'No'),
(646, 'APPROVED', 'Investment', 'No'),
(647, 'APPROVED', 'Wealth Manager', 'No'),
(648, 'APPROVED', 'Organization Restructuring', 'No'),
(649, 'APPROVED', 'Competency Mapping', 'No'),
(650, 'APPROVED', 'Succession Planning', 'No'),
(651, 'APPROVED', 'Policy Formulation', 'No'),
(652, 'APPROVED', 'Project Development', 'No'),
(653, 'APPROVED', 'Stock Market', 'No'),
(654, 'APPROVED', 'Cash Applications', 'No'),
(655, 'APPROVED', 'Management Foreasting', 'No'),
(656, 'APPROVED', 'Product Costing', 'No'),
(657, 'APPROVED', 'Asset Accounting', 'No'),
(658, 'APPROVED', 'Material Ledger', 'No'),
(659, 'APPROVED', 'Network Monitoring', 'No'),
(660, 'APPROVED', 'Ip Telephony', 'No'),
(661, 'APPROVED', 'Labour Laws', 'No'),
(662, 'APPROVED', 'Helpdesk', 'Yes'),
(663, 'APPROVED', 'Hospitality', 'No'),
(664, 'APPROVED', 'Redhat Linux', 'Yes'),
(665, 'APPROVED', 'Dialux', 'No'),
(666, 'APPROVED', 'Network Theory', 'No'),
(667, 'APPROVED', 'Signal Integrity Analysis', 'No'),
(668, 'APPROVED', 'Pcb Verification', 'No'),
(669, 'APPROVED', 'Interaction Design', 'No'),
(670, 'APPROVED', 'Information Architecture', 'No'),
(671, 'APPROVED', 'Quality Center', 'No'),
(672, 'APPROVED', 'Selenium Web Driver', 'No'),
(673, 'APPROVED', 'Commercial Officer', 'No'),
(674, 'APPROVED', 'Commercial', 'No'),
(675, 'APPROVED', 'Commercial Assistant Manager', 'No'),
(676, 'APPROVED', 'Sales Strategy', 'No'),
(677, 'APPROVED', 'Commercial Senior Manager', 'No'),
(678, 'APPROVED', 'Market Survey', 'No'),
(679, 'APPROVED', 'Commercial Manager', 'No'),
(680, 'APPROVED', 'System Programming', 'No'),
(681, 'APPROVED', 'Audit Report', 'No'),
(682, 'APPROVED', 'Information Technology', 'No'),
(683, 'APPROVED', 'System Audit', 'No'),
(684, 'APPROVED', 'It Audit', 'No'),
(685, 'APPROVED', 'Contract Manufacturing', 'No'),
(686, 'APPROVED', 'It Helpdesk', 'No'),
(687, 'APPROVED', 'Cisco Voice', 'No'),
(688, 'APPROVED', 'Proper Management', 'No'),
(689, 'APPROVED', 'Accounting System', 'No'),
(690, 'APPROVED', 'Microservices', 'No'),
(691, 'APPROVED', 'Kitchen', 'No'),
(692, 'APPROVED', 'Restaurant', 'No'),
(693, 'APPROVED', 'Butler Service', 'No'),
(694, 'APPROVED', 'Food Production', 'No'),
(695, 'APPROVED', 'Roomservice', 'No'),
(696, 'APPROVED', 'Hotel', 'No'),
(697, 'APPROVED', 'Editing Software', 'No'),
(698, 'APPROVED', 'Revit Structure', 'No'),
(699, 'APPROVED', 'Hr Co-ordinator', 'No'),
(700, 'APPROVED', 'Insurance Underwriting', 'No'),
(701, 'APPROVED', 'Motor Insurance', 'No'),
(702, 'APPROVED', 'Mis Reporting Preparation', 'No'),
(703, 'APPROVED', 'Sales Coordination', 'No'),
(704, 'APPROVED', 'Sales Management', 'No'),
(705, 'APPROVED', 'Chemist', 'No'),
(706, 'APPROVED', 'Qa Testing', 'No'),
(707, 'APPROVED', 'Telecommunication', 'No'),
(708, 'APPROVED', 'Revenue Accounting', 'No'),
(709, 'APPROVED', 'Business Management', 'No'),
(710, 'APPROVED', 'Business Modeling', 'No'),
(711, 'APPROVED', 'Data Migration', 'No'),
(712, 'APPROVED', 'Project Delivery', 'No'),
(713, 'APPROVED', 'Business Process', 'No'),
(714, 'APPROVED', 'Requirement Gathering', 'No'),
(715, 'APPROVED', 'Time Management', 'No'),
(716, 'APPROVED', 'Bookkeeping', 'Yes'),
(717, 'APPROVED', 'Management System', 'No'),
(718, 'APPROVED', 'Technical Lead', 'No'),
(719, 'APPROVED', 'Scrummaster', 'No'),
(720, 'APPROVED', 'Software Development', 'No'),
(721, 'APPROVED', 'Hydraulic Design', 'No'),
(722, 'APPROVED', 'Salesforce Developer', 'No'),
(723, 'APPROVED', 'Engineering Management', 'No'),
(724, 'APPROVED', 'Business Intelligence', 'No'),
(725, 'APPROVED', 'Microstrategy', 'No'),
(726, 'APPROVED', 'Automation Test', 'No'),
(727, 'APPROVED', 'Team Leading', 'No'),
(728, 'APPROVED', 'Fermentation', 'No'),
(729, 'APPROVED', 'Research', 'No'),
(730, 'APPROVED', 'Process Development', 'No'),
(731, 'APPROVED', 'Email Support', 'No'),
(732, 'APPROVED', 'Sram Architecture', 'No'),
(733, 'APPROVED', 'Design Engineering', 'No'),
(734, 'APPROVED', 'Design Verification', 'No'),
(735, 'APPROVED', 'Circuit Designing', 'No'),
(736, 'APPROVED', 'Client Management', 'No'),
(737, 'APPROVED', 'Performance Tuning', 'No'),
(738, 'APPROVED', 'Migration', 'Yes'),
(739, 'APPROVED', 'Testing Automation', 'No'),
(740, 'APPROVED', 'Twitter Bootstrap', 'No'),
(741, 'APPROVED', 'Linux Kernel', 'No'),
(742, 'APPROVED', 'Information Security', 'No'),
(743, 'APPROVED', 'Qa Manager', 'No'),
(744, 'APPROVED', 'Turbine?maintenance', 'No'),
(745, 'APPROVED', 'Testing Inspection', 'No'),
(746, 'APPROVED', 'Ethical Security', 'No'),
(747, 'APPROVED', 'Strategic Sourcing', 'No'),
(748, 'APPROVED', 'Purchase Processes', 'No'),
(749, 'APPROVED', 'Case Manager', 'No'),
(750, 'APPROVED', 'Program Logic Control', 'No'),
(751, 'APPROVED', 'Security Supervisor', 'No'),
(752, 'APPROVED', 'Corporate Planning', 'No'),
(753, 'APPROVED', 'Corporate Strategy', 'No'),
(754, 'APPROVED', 'Budget Controller', 'No'),
(755, 'APPROVED', 'Insurance Operations', 'No'),
(756, 'APPROVED', 'Life Insurance', 'No'),
(757, 'APPROVED', 'Health Insurance', 'No'),
(758, 'APPROVED', 'Hr Activities', 'No'),
(759, 'APPROVED', 'Senior Sales Engineer', 'No'),
(760, 'APPROVED', 'Hydraulic Foreman', 'No'),
(761, 'APPROVED', 'Retail Operations', 'No'),
(762, 'APPROVED', 'Cassandra Database', 'No'),
(763, 'APPROVED', 'Product Marketing', 'No'),
(764, 'APPROVED', 'Service Delivery', 'No'),
(765, 'APPROVED', 'Adobe Creative Suite', 'No'),
(766, 'APPROVED', 'Office Automation', 'No'),
(767, 'APPROVED', 'Service Operation', 'No'),
(768, 'APPROVED', 'Service Strategy', 'No'),
(769, 'APPROVED', 'Service Design', 'No'),
(770, 'APPROVED', 'Server Virtualization', 'No'),
(771, 'APPROVED', 'Server Management', 'No'),
(772, 'APPROVED', 'Computer Programming', 'No'),
(773, 'APPROVED', 'Portforwarding', 'No'),
(774, 'APPROVED', 'Business Operations', 'No'),
(775, 'APPROVED', 'Process Excellence', 'No'),
(776, 'APPROVED', 'Brand Promotion', 'No'),
(777, 'APPROVED', 'Sales Promotion', 'No'),
(778, 'APPROVED', 'Data Entry', 'No'),
(779, 'APPROVED', 'Document Control', 'No'),
(780, 'APPROVED', 'Database Testing', 'No'),
(781, 'APPROVED', 'Legal Drafting', 'No'),
(782, 'APPROVED', 'Internal Audit', 'No'),
(783, 'APPROVED', 'Civil Site', 'No'),
(784, 'APPROVED', 'Civil Supervision', 'No'),
(785, 'APPROVED', 'Senior Sales Executive', 'No'),
(786, 'APPROVED', 'Qc Inspector', 'No'),
(787, 'APPROVED', 'Contract Development', 'No'),
(788, 'APPROVED', 'Credit Rating', 'No'),
(789, 'APPROVED', 'Laboratory', 'No'),
(790, 'APPROVED', 'Industrial Administration', 'No'),
(791, 'APPROVED', 'Welfare Activities', 'No'),
(792, 'APPROVED', 'Solution Manager', 'No'),
(793, 'APPROVED', 'Mobile Application Developer', 'No'),
(794, 'APPROVED', 'Integration Specialist', 'No'),
(795, 'APPROVED', 'Microsoft Dynamics', 'No'),
(796, 'APPROVED', 'Salesman', 'No'),
(797, 'APPROVED', 'System Improvement', 'No'),
(798, 'APPROVED', 'Vendor Rating', 'No'),
(799, 'APPROVED', 'Coordination', 'No'),
(800, 'APPROVED', 'Material Handling', 'No'),
(801, 'APPROVED', 'Risk Mitigation', 'No'),
(802, 'APPROVED', 'Record Keeping', 'No'),
(803, 'APPROVED', 'Payment Processing', 'No'),
(804, 'APPROVED', 'Accounting Operations', 'No'),
(805, 'APPROVED', 'Travel Arrangements', 'No'),
(806, 'APPROVED', 'Guest Relation Executive', 'No'),
(807, 'APPROVED', 'Guest Handling', 'No'),
(808, 'APPROVED', 'Reception', 'No'),
(809, 'APPROVED', 'Maintenance Department', 'No'),
(810, 'APPROVED', 'Receptionist  Activities', 'No'),
(811, 'APPROVED', 'Travel Desk', 'No'),
(812, 'APPROVED', 'People Management', 'No'),
(813, 'APPROVED', 'Project Engineer', 'No'),
(814, 'APPROVED', 'Retail Sales Manager', 'No'),
(815, 'APPROVED', 'Relatioship Manager', 'Yes'),
(816, 'APPROVED', 'Competitive', 'No'),
(817, 'APPROVED', 'Innovative', 'No'),
(818, 'APPROVED', 'Design Manager', 'No'),
(819, 'APPROVED', 'Customer Service Shipping', 'No'),
(820, 'APPROVED', 'Car Denting', 'No'),
(821, 'APPROVED', 'Car Electrician', 'No'),
(822, 'APPROVED', 'Car Painter', 'No'),
(823, 'APPROVED', 'Construction Supervisor', 'No'),
(824, 'APPROVED', 'Hr Payroll', 'No'),
(825, 'APPROVED', 'It Administration', 'No'),
(826, 'APPROVED', 'It Engineer', 'No'),
(827, 'APPROVED', 'Food Safety', 'No'),
(828, 'APPROVED', 'Senior Designer', 'No'),
(829, 'APPROVED', 'Access Management', 'No'),
(830, 'APPROVED', 'Incident Management', 'No'),
(831, 'APPROVED', 'It Service Management', 'No'),
(832, 'APPROVED', 'Switch Configuration', 'No'),
(833, 'APPROVED', 'Router Configuration', 'No'),
(834, 'APPROVED', 'Fabric Executive', 'No'),
(835, 'APPROVED', 'Administration Support', 'No'),
(836, 'APPROVED', 'Purchase & Compliances', 'No'),
(837, 'APPROVED', 'General Manager', 'No'),
(838, 'APPROVED', 'General Management', 'No'),
(839, 'APPROVED', 'Fabric Testing', 'No'),
(840, 'APPROVED', 'Process Engineering', 'No'),
(841, 'APPROVED', 'Edms Engineer', 'No'),
(842, 'APPROVED', 'Carpenter', 'No'),
(843, 'APPROVED', 'Safety Officer', 'No'),
(844, 'APPROVED', 'Delivery Management', 'No'),
(845, 'APPROVED', 'Statutory Reporting', 'No'),
(846, 'APPROVED', 'Process Enhancement', 'Yes'),
(847, 'APPROVED', 'Unix Administration', 'No'),
(848, 'APPROVED', 'Account Management', 'No'),
(849, 'APPROVED', 'Customer Relationship', 'No'),
(850, 'APPROVED', 'Office365', 'No'),
(851, 'APPROVED', 'Training & Development', 'No'),
(852, 'APPROVED', 'React Native', 'No'),
(853, 'APPROVED', 'Adobe Framemaker', 'No'),
(854, 'APPROVED', 'Access Database', 'No'),
(855, 'APPROVED', 'Fund Accounting', 'No'),
(856, 'APPROVED', 'Quality Management', 'No'),
(857, 'APPROVED', 'It Infrastructure Implementation', 'No'),
(858, 'APPROVED', 'Visual J++', 'No'),
(859, 'APPROVED', 'Google Analyst', 'No'),
(860, 'APPROVED', 'Web Analyst', 'No'),
(861, 'APPROVED', 'Web Promotion', 'No'),
(862, 'APPROVED', 'Web Producer', 'No'),
(863, 'APPROVED', 'Manual Method', 'No'),
(864, 'APPROVED', 'Analytical', 'No'),
(865, 'APPROVED', 'Wiring', 'No'),
(866, 'APPROVED', 'Development', 'No'),
(867, 'APPROVED', 'Waitresses', 'No'),
(868, 'APPROVED', 'Pcb Designing And Fabrication', 'No'),
(869, 'APPROVED', 'Data Analyzer', 'No'),
(870, 'APPROVED', 'Ergonomics', 'No'),
(871, 'APPROVED', 'Flow Simulation', 'No'),
(872, 'APPROVED', 'Travel & Tourism', 'No'),
(873, 'APPROVED', 'Instrumentation', 'No'),
(874, 'APPROVED', 'Sales Specialist', 'No'),
(875, 'APPROVED', 'System Technician', 'No'),
(876, 'APPROVED', 'Maintenance Technician', 'No'),
(877, 'APPROVED', 'Retention', 'No'),
(878, 'APPROVED', 'Abacus', 'No'),
(879, 'APPROVED', 'Photo Editing', 'No'),
(880, 'APPROVED', 'Print Media', 'No'),
(881, 'APPROVED', 'Adobe Premiere Pro', 'No'),
(882, 'APPROVED', 'Adobe After Effects', 'No'),
(883, 'APPROVED', 'Motion Graphic', 'No'),
(884, 'APPROVED', 'Iot Services', 'No'),
(885, 'APPROVED', 'Insurance', 'No'),
(886, 'APPROVED', 'Road Estimator', 'No'),
(887, 'APPROVED', 'Newspaper?ad Space Selling', 'No'),
(888, 'APPROVED', 'Publisher', 'No'),
(889, 'APPROVED', 'Client Servicing', 'No'),
(890, 'APPROVED', 'Printing Sales', 'No'),
(891, 'APPROVED', 'Printing Press', 'No'),
(892, 'APPROVED', 'Business Development?marketing', 'No'),
(893, 'APPROVED', 'Electrical Autocad Designing', 'No'),
(894, 'APPROVED', 'Roads Maintenance', 'No'),
(895, 'APPROVED', 'Road Management', 'No'),
(896, 'APPROVED', 'Traffic Modeling', 'No'),
(897, 'APPROVED', 'Traffic Engineering', 'No'),
(898, 'APPROVED', 'Traffic Signal Management', 'No'),
(899, 'APPROVED', 'Static Routing', 'No'),
(900, 'APPROVED', 'Network Port Assignment', 'No'),
(901, 'APPROVED', 'Unicommerce', 'No'),
(902, 'APPROVED', 'Oracle Hrms', 'No'),
(903, 'APPROVED', 'Social Media', 'No'),
(904, 'APPROVED', 'Ios Developer', 'No'),
(905, 'APPROVED', 'Team Management', 'No'),
(906, 'APPROVED', 'Logistics', 'No'),
(907, 'APPROVED', 'Shift Management', 'No'),
(908, 'APPROVED', 'Effective Mailers', 'No'),
(909, 'APPROVED', 'Field Work', 'No'),
(910, 'APPROVED', 'Performance Evaluation', 'No'),
(911, 'APPROVED', 'Secondary Sales', 'No'),
(912, 'APPROVED', 'Brand Communication', 'No'),
(913, 'APPROVED', 'Trade Support', 'No'),
(914, 'APPROVED', 'Xilinx Software', 'No'),
(915, 'APPROVED', 'Scaffolding Supervisor', 'No'),
(916, 'APPROVED', 'Quality Control Management', 'No'),
(917, 'APPROVED', 'Construction Management', 'No'),
(918, 'APPROVED', 'Radius Analysist', 'No'),
(919, 'APPROVED', 'Draft Analysis', 'No'),
(920, 'APPROVED', 'Cnc Machinst', 'No'),
(921, 'APPROVED', 'Lathe Machine', 'No'),
(922, 'APPROVED', 'Cnc Operator', 'No'),
(923, 'APPROVED', 'Qc Tools', 'No'),
(924, 'APPROVED', 'Electrical Labour', 'No'),
(925, 'APPROVED', 'Electrical Works', 'No'),
(926, 'APPROVED', 'Electrical Installation', 'No'),
(927, 'APPROVED', 'Electrician Technician', 'No'),
(928, 'APPROVED', 'Electrical Maintenance', 'No'),
(929, 'APPROVED', 'Labour', 'No'),
(930, 'APPROVED', 'Condition Monitoring', 'No'),
(931, 'APPROVED', 'Quantity Surveyor', 'No'),
(932, 'APPROVED', 'Trouble Shooting', 'Yes'),
(933, 'APPROVED', 'Motor Rewinding', 'No'),
(934, 'APPROVED', 'Vendor Selection', 'No'),
(935, 'APPROVED', 'Hospital Customer Service', 'No'),
(936, 'APPROVED', 'Plc Designer', 'No'),
(937, 'APPROVED', 'Psychiatry', 'No'),
(938, 'APPROVED', 'Ascent Payroll', 'No'),
(939, 'APPROVED', 'Sales?promoter', 'No'),
(940, 'APPROVED', 'Technical Manager', 'No'),
(941, 'APPROVED', 'Biomedical Engineer', 'No'),
(942, 'APPROVED', 'Radiology', 'No'),
(943, 'APPROVED', 'Radiologist', 'No'),
(944, 'APPROVED', 'Application Specialist?', 'No'),
(945, 'APPROVED', 'Application Engineer', 'No'),
(946, 'APPROVED', 'Application Executive', 'No'),
(947, 'APPROVED', 'Session Manager', 'No'),
(948, 'APPROVED', 'Capitaline', 'No'),
(949, 'APPROVED', 'Plasma Programming', 'No'),
(950, 'APPROVED', 'Schematic Manager', 'No'),
(951, 'APPROVED', 'English Typing', 'No'),
(952, 'APPROVED', 'Coupling', 'No'),
(953, 'APPROVED', 'Enineering Drawings', 'No'),
(954, 'APPROVED', 'Die Casting', 'No'),
(955, 'APPROVED', 'Plastic Moulding', 'No'),
(956, 'APPROVED', 'Industrial Machinery', 'No'),
(957, 'APPROVED', 'Technical Service', 'No'),
(958, 'APPROVED', 'Site Supervision', 'No'),
(959, 'APPROVED', 'Commercial Director', 'No'),
(960, 'APPROVED', 'Legal Assistant?', 'No'),
(961, 'APPROVED', 'Legal Advisor', 'No'),
(962, 'APPROVED', 'Business Development Sales', 'No'),
(963, 'APPROVED', 'Marketing Executive', 'No'),
(964, 'APPROVED', 'Packaging', 'No'),
(965, 'APPROVED', 'Solidedge', 'Yes'),
(966, 'APPROVED', '7mp Tools', 'No'),
(967, 'APPROVED', 'Calibration', 'No'),
(968, 'APPROVED', 'Accounts And Finance', 'No'),
(969, 'APPROVED', 'Part Design', 'No'),
(970, 'APPROVED', 'Power Shape', 'No'),
(971, 'APPROVED', 'Piping', 'No'),
(972, 'APPROVED', '3d Modeling', 'No'),
(973, 'APPROVED', 'Stress Analysis', 'No'),
(974, 'APPROVED', 'Cloud?project Manager', 'No'),
(975, 'APPROVED', 'Consultant Gynecologist', 'No'),
(976, 'APPROVED', 'Specialist Dermatologist', 'No'),
(977, 'APPROVED', 'Site Engineer', 'No'),
(978, 'APPROVED', 'Safety Analysis', 'No'),
(979, 'APPROVED', 'Production Planning?', 'Yes'),
(980, 'APPROVED', 'Procurement', 'No'),
(981, 'APPROVED', 'Project Life Cycle Management', 'No'),
(982, 'APPROVED', 'Operations Supervisor', 'No'),
(983, 'APPROVED', 'Drafting And Pro Mechanism', 'No'),
(984, 'APPROVED', 'Automobile Technician', 'No'),
(985, 'APPROVED', 'Sheet Metal Work', 'No'),
(986, 'APPROVED', 'Manufacturing Drawing', 'No'),
(987, 'APPROVED', 'Interior Designing??', 'Yes'),
(988, 'APPROVED', 'Interior Finishing', 'No'),
(989, 'APPROVED', 'Fire Alarm?', 'No'),
(990, 'APPROVED', 'Sales Engineer', 'No'),
(991, 'APPROVED', 'Survelliance', 'No'),
(992, 'APPROVED', 'Security', 'No'),
(993, 'APPROVED', 'Operations Manager', 'No'),
(994, 'APPROVED', 'Hydraulics?', 'No'),
(995, 'APPROVED', 'Electrical Drawing', 'No'),
(996, 'APPROVED', 'Specialist Gastroenterology', 'No'),
(997, 'APPROVED', 'Drafting And Assembly', 'No'),
(998, 'APPROVED', 'Printing Machine Operator', 'No'),
(999, 'APPROVED', 'Process Instrumentation', 'No'),
(1000, 'APPROVED', 'Industrial Automation', 'No'),
(1001, 'APPROVED', 'Adobe Corel Draw', 'No'),
(1002, 'APPROVED', 'Industrial Electrician', 'No'),
(1003, 'APPROVED', 'Surface Modeling', 'No'),
(1004, 'APPROVED', 'Process Simulator', 'No'),
(1005, 'APPROVED', 'Sales & Marketing', 'No'),
(1006, 'APPROVED', 'Automatic Packaging', 'No'),
(1007, 'APPROVED', 'Abaqus', 'No'),
(1008, 'APPROVED', 'Cnc Operations', 'No'),
(1009, 'APPROVED', 'Microsoft Sql Server 2008', 'Yes'),
(1010, 'APPROVED', 'Lead Generation', 'No'),
(1011, 'APPROVED', 'Cnc Programming', 'No'),
(1012, 'APPROVED', 'Stock Management', 'No'),
(1013, 'APPROVED', 'Oracle Erp', 'No'),
(1014, 'APPROVED', 'Store Management', 'No'),
(1015, 'APPROVED', 'Material Management', 'No'),
(1016, 'APPROVED', 'Mainframe Database', 'No'),
(1017, 'APPROVED', 'Deep Exploration', 'No'),
(1018, 'APPROVED', 'Hypermesh', 'No'),
(1019, 'APPROVED', 'Project Documentation', 'No'),
(1020, 'APPROVED', 'Automobile', 'No'),
(1021, 'APPROVED', 'Autodesk Inventor', 'No'),
(1022, 'APPROVED', 'Poka Yoke', 'No'),
(1023, 'APPROVED', 'Radiographer', 'No'),
(1024, 'APPROVED', 'Oracle Database Maintenance', 'No'),
(1025, 'APPROVED', 'Dermatologist', 'No'),
(1026, 'APPROVED', 'Travel Agent', 'No'),
(1027, 'APPROVED', 'Canalyzer', 'No'),
(1028, 'APPROVED', 'International Bpo?', 'Yes'),
(1029, 'APPROVED', 'Non Voice', 'No'),
(1030, 'APPROVED', 'Legal Research', 'No'),
(1031, 'APPROVED', 'Business Development Management', 'No'),
(1032, 'APPROVED', 'Key Account Management', 'Yes'),
(1033, 'APPROVED', 'Mis Preparation', 'No'),
(1034, 'APPROVED', 'Cold Calling', 'No'),
(1035, 'APPROVED', 'Business Planning', 'No'),
(1036, 'APPROVED', 'School Supervisor', 'No'),
(1037, 'APPROVED', 'Customer Support?', 'Yes'),
(1038, 'APPROVED', 'Social Science', 'No'),
(1039, 'APPROVED', 'Computer Teacher', 'No'),
(1040, 'APPROVED', 'Hindi Teacher', 'No'),
(1041, 'APPROVED', 'English Teacher', 'No'),
(1042, 'APPROVED', 'Government Proposals', 'No'),
(1043, 'APPROVED', 'Drafting Proposal', 'No'),
(1044, 'APPROVED', 'Proposal Writing', 'No'),
(1045, 'APPROVED', 'Proposal Generation', 'No'),
(1046, 'APPROVED', 'Research Proposal', 'No'),
(1047, 'APPROVED', 'Adobe Acrobat Professional', 'No'),
(1048, 'APPROVED', 'Data Collection', 'No'),
(1049, 'APPROVED', 'General Administration', 'No'),
(1050, 'APPROVED', 'Hospitality Management', 'No'),
(1051, 'APPROVED', 'Marketo Automation Tool', 'No'),
(1052, 'APPROVED', 'Digital Media Design', 'No'),
(1053, 'APPROVED', 'Spss Software', 'No'),
(1054, 'APPROVED', 'School Nurse', 'No'),
(1055, 'APPROVED', 'Scratch Testing', 'No'),
(1056, 'APPROVED', 'Sigma Plot', 'No'),
(1057, 'APPROVED', 'Analytics', 'No'),
(1058, 'APPROVED', 'Display Marketing', 'No'),
(1059, 'APPROVED', 'Php 5', 'Yes'),
(1060, 'APPROVED', 'Normalize.css', 'No'),
(1061, 'APPROVED', 'Content Management System', 'No'),
(1062, 'APPROVED', 'Web Server Administration', 'No'),
(1063, 'APPROVED', 'Coral Draw', 'No'),
(1064, 'APPROVED', 'Healthcare', 'No'),
(1065, 'APPROVED', 'Distributed Control Systems', 'No'),
(1066, 'APPROVED', 'Trading Networks', 'No'),
(1067, 'APPROVED', 'Centrasite', 'No'),
(1068, 'APPROVED', 'Adapters', 'No'),
(1069, 'APPROVED', 'Integration Server', 'No'),
(1070, 'APPROVED', 'Deployment', 'No'),
(1071, 'APPROVED', 'Hvac Design', 'No'),
(1072, 'APPROVED', 'Inventory', 'No'),
(1073, 'APPROVED', 'Adobe Acrobat 8 Standard Writer', 'No'),
(1074, 'APPROVED', 'Arbortext Editor', 'No'),
(1075, 'APPROVED', 'Adobe Pagemaker 7', 'No'),
(1076, 'APPROVED', 'Production Support', 'No'),
(1077, 'APPROVED', 'Fabrication', 'No'),
(1078, 'APPROVED', 'Maintenance Management?', 'No'),
(1079, 'APPROVED', 'Apache Spark', 'No'),
(1080, 'APPROVED', 'R Programming', 'No'),
(1081, 'APPROVED', 'Stakeholder Management', 'No'),
(1082, 'APPROVED', 'It Operations', 'No'),
(1083, 'APPROVED', 'Risk Assessment', 'No'),
(1084, 'APPROVED', 'Sox Audit', 'No'),
(1085, 'APPROVED', 'Acrobat X Pro', 'No'),
(1086, 'APPROVED', 'Adobe Photoshop Cs6', 'No'),
(1087, 'APPROVED', 'Adobe Framemaker 10.0', 'No'),
(1088, 'APPROVED', 'Contracts Specialist', 'No'),
(1089, 'APPROVED', 'Electrical Supervisor', 'No'),
(1090, 'APPROVED', 'Civil Supervisor', 'No'),
(1091, 'APPROVED', 'Perl?', 'Yes'),
(1092, 'APPROVED', 'Payroll Management', 'No'),
(1093, 'APPROVED', 'Embedded Engineer', 'No'),
(1094, 'APPROVED', 'Automotive', 'No'),
(1095, 'APPROVED', 'Sap System', 'No'),
(1096, 'APPROVED', 'Erp System', 'No'),
(1097, 'APPROVED', '8d Analysis', 'No'),
(1098, 'APPROVED', 'Outlook Express', 'No'),
(1099, 'APPROVED', 'Team Center Visualization', 'No'),
(1100, 'APPROVED', 'Administrator', 'No'),
(1101, 'APPROVED', 'Xml Publisher', 'No'),
(1102, 'APPROVED', 'Vendor Development', 'No'),
(1103, 'APPROVED', 'Part Modeling', 'No'),
(1104, 'APPROVED', 'Transformer Designing', 'No'),
(1105, 'APPROVED', 'Sap Applications', 'No'),
(1106, 'APPROVED', 'Purchasing', 'No'),
(1107, 'APPROVED', 'Provident Fund', 'No'),
(1108, 'APPROVED', 'Catia And Ansys', 'No'),
(1109, 'APPROVED', 'Scada System', 'No'),
(1110, 'APPROVED', 'Regulatory Affairs', 'No'),
(1111, 'APPROVED', 'Photoshop 7.0', 'Yes'),
(1112, 'APPROVED', 'Microsoft Office Tools', 'No'),
(1113, 'APPROVED', 'Conveyors?grinders', 'No'),
(1114, 'APPROVED', 'Material Blender Systems', 'No'),
(1115, 'APPROVED', 'Technical Officer', 'No'),
(1116, 'APPROVED', 'Marine Technical Superintendent', 'No'),
(1117, 'APPROVED', 'Qa Qc Engineer', 'No'),
(1118, 'APPROVED', 'Production', 'No'),
(1119, 'APPROVED', 'Multicasting', 'No'),
(1120, 'APPROVED', 'Office Adminstration', 'Yes'),
(1121, 'APPROVED', 'International Logistics', 'No'),
(1122, 'APPROVED', 'Oracle Hyperion Consultant', 'No'),
(1123, 'APPROVED', 'Plc Coding', 'No'),
(1124, 'APPROVED', 'Server Administration', 'No'),
(1125, 'APPROVED', 'Executive', 'No'),
(1126, 'APPROVED', 'Arm Controllers', 'No'),
(1127, 'APPROVED', 'Machining', 'No'),
(1128, 'APPROVED', 'CNC', 'No'),
(1129, 'APPROVED', 'CMM', 'No'),
(1130, 'APPROVED', 'Query Designer', 'No'),
(1131, 'APPROVED', 'Query Analyzer', 'No'),
(1132, 'APPROVED', 'Business Object', 'Yes'),
(1133, 'APPROVED', 'Big Data', 'No'),
(1134, 'APPROVED', 'Condeco Booking Tool', 'No'),
(1135, 'APPROVED', 'Quick Learner', 'No'),
(1136, 'APPROVED', 'Flash Tool', 'No'),
(1137, 'APPROVED', 'Eclipse Indigo', 'No'),
(1138, 'APPROVED', 'Core Director', 'No'),
(1139, 'APPROVED', 'Spring Mvc', 'No'),
(1140, 'APPROVED', 'Agile Methodology', 'No'),
(1141, 'APPROVED', 'Altium Designer', 'No'),
(1142, 'APPROVED', 'Simatic Manager', 'No'),
(1143, 'APPROVED', 'Rope Access Technician', 'No'),
(1144, 'APPROVED', 'Wireless Technology', 'No'),
(1145, 'APPROVED', 'Piping Design', 'No'),
(1146, 'APPROVED', 'Material Inspection', 'No'),
(1147, 'APPROVED', 'Sales Executive', 'No'),
(1148, 'APPROVED', 'Sales Associate', 'No'),
(1149, 'APPROVED', 'Medical', 'No'),
(1150, 'APPROVED', 'Linux Mint', 'No');
INSERT INTO `key_skills` (`id`, `status`, `key_skill_name`, `is_deleted`) VALUES
(1151, 'APPROVED', 'Protocase Designer', 'No'),
(1152, 'APPROVED', 'Windows Powershell', 'No'),
(1153, 'APPROVED', 'Xpath', 'No'),
(1154, 'APPROVED', 'Xml Schema', 'No'),
(1155, 'APPROVED', 'Nokia Siemens Network', 'No'),
(1156, 'APPROVED', 'Siebel Scripting', 'No'),
(1157, 'APPROVED', 'Vehicle Tracking', 'No'),
(1158, 'APPROVED', 'Voice Gateways', 'No'),
(1159, 'APPROVED', 'Marketing Analysis', 'No'),
(1160, 'APPROVED', 'Trade Marketing Executive', 'No'),
(1161, 'APPROVED', 'Sales And Marketing', 'No'),
(1162, 'APPROVED', 'Rail Safety', 'No'),
(1163, 'APPROVED', 'Export Sales', 'No'),
(1164, 'APPROVED', 'Export Manager', 'No'),
(1165, 'APPROVED', 'Audit Management System', 'No'),
(1166, 'APPROVED', 'Query Optimization', 'No'),
(1167, 'APPROVED', 'Circuit Maker', 'No'),
(1168, 'APPROVED', 'Regression Testing', 'No'),
(1169, 'APPROVED', 'Web Testing', 'No'),
(1170, 'APPROVED', 'Sap Testing', 'No'),
(1171, 'APPROVED', 'Siebel Testing', 'No'),
(1172, 'APPROVED', 'Etherchannel', 'No'),
(1173, 'APPROVED', 'Linux Centos', 'No'),
(1174, 'APPROVED', 'Pcb Designing', 'No'),
(1175, 'APPROVED', 'Agile', 'No'),
(1176, 'APPROVED', 'Packet Tracer', 'No'),
(1177, 'APPROVED', 'Proteus Pcb Design Software', 'No'),
(1178, 'APPROVED', 'Eagle Pcb Design Software', 'No'),
(1179, 'APPROVED', 'Purchase Executive', 'No'),
(1180, 'APPROVED', 'Windows Outlook', 'No'),
(1181, 'APPROVED', 'Rational Quality Manager', 'No'),
(1182, 'APPROVED', 'Rational Functional Tester', 'No'),
(1183, 'APPROVED', 'Telecom Billing', 'No'),
(1184, 'APPROVED', 'Eagle Software', 'No'),
(1185, 'APPROVED', 'Drive Test', 'No'),
(1186, 'APPROVED', 'Collection Framework', 'No'),
(1187, 'APPROVED', 'Perl Scripts', 'No'),
(1188, 'APPROVED', 'Supervisor', 'No'),
(1189, 'APPROVED', 'Contract Engineer', 'No'),
(1190, 'APPROVED', 'Market Intelligence', 'No'),
(1191, 'APPROVED', 'Drafting', 'No'),
(1192, 'APPROVED', 'Paediatric Ophthalmology', 'No'),
(1193, 'APPROVED', 'Communication Skill', 'Yes'),
(1194, 'APPROVED', 'Neurosurgery', 'No'),
(1195, 'APPROVED', 'Process Safety', 'No'),
(1196, 'APPROVED', 'Powershell', 'Yes'),
(1197, 'APPROVED', 'Azure', 'No'),
(1198, 'APPROVED', 'Process Implementation', 'No'),
(1199, 'APPROVED', 'Operations Management', 'No'),
(1200, 'APPROVED', 'Credit Analysis', 'No'),
(1201, 'APPROVED', 'Database Management', 'No'),
(1202, 'APPROVED', 'Patch Management', 'No'),
(1203, 'APPROVED', 'User Management', 'No'),
(1204, 'APPROVED', 'Solidworks', 'No'),
(1205, 'APPROVED', 'Embedded System', 'No'),
(1206, 'APPROVED', 'Computer Networks', 'No'),
(1207, 'APPROVED', 'Control Systems', 'No'),
(1208, 'APPROVED', 'Digital Logic', 'No'),
(1209, 'APPROVED', 'Rest Services', 'No'),
(1210, 'APPROVED', 'Eclipse Ide', 'No'),
(1211, 'APPROVED', 'Selenium Ide', 'No'),
(1212, 'APPROVED', 'Sabre Tool', 'No'),
(1213, 'APPROVED', '4tel Test System', 'No'),
(1214, 'APPROVED', 'Android Sdk', 'No'),
(1215, 'APPROVED', 'Android Studio', 'No'),
(1216, 'APPROVED', 'Microsoft Active?directory', 'No'),
(1217, 'APPROVED', 'Sql Navigator', 'No'),
(1218, 'APPROVED', 'Siebel Call Center', 'No'),
(1219, 'APPROVED', 'Gps Modules', 'No'),
(1220, 'APPROVED', 'Html 5', 'No'),
(1221, 'APPROVED', 'Assembly Language Programming', 'No'),
(1222, 'APPROVED', 'Restful Web Services', 'No'),
(1223, 'APPROVED', 'Trunking', 'No'),
(1224, 'APPROVED', 'Inter Vlan Routing', 'No'),
(1225, 'APPROVED', 'Intec Interconnect Billing', 'No'),
(1226, 'APPROVED', 'Sun Solaris', 'No'),
(1227, 'APPROVED', 'Ip Transit Services', 'No'),
(1228, 'APPROVED', 'Ip Subnetting', 'No'),
(1229, 'APPROVED', 'Mac Operating System', 'No'),
(1230, 'APPROVED', 'System Integration Testing', 'No'),
(1231, 'APPROVED', 'Cuda Programming', 'No'),
(1232, 'APPROVED', 'Synopsis', 'No'),
(1233, 'APPROVED', 'Flash Magic', 'No'),
(1234, 'APPROVED', 'Network Checker', 'No'),
(1235, 'APPROVED', 'Powersim', 'No'),
(1236, 'APPROVED', 'Shell Script', 'No'),
(1237, 'APPROVED', 'Microsoft Sql Server', 'No'),
(1238, 'APPROVED', 'Filezilla', 'No'),
(1239, 'APPROVED', 'Cisco Packet Tracer', 'No'),
(1240, 'APPROVED', 'Windows Scheduler', 'No'),
(1241, 'APPROVED', 'Wlan', 'No'),
(1242, 'APPROVED', 'Hp Quality Center', 'No'),
(1243, 'APPROVED', 'Semaphores', 'No'),
(1244, 'APPROVED', 'Shared Memory', 'No'),
(1245, 'APPROVED', 'Inter Process Communication', 'No'),
(1246, 'APPROVED', 'Crash Debugging', 'No'),
(1247, 'APPROVED', 'Redistribution', 'No'),
(1248, 'APPROVED', 'Eigrp Protocol', 'No'),
(1249, 'APPROVED', 'System And Regression Testing', 'No'),
(1250, 'APPROVED', 'Descriptive Programming', 'No'),
(1251, 'APPROVED', 'Port Security', 'No'),
(1252, 'APPROVED', 'Ruby', 'No'),
(1253, 'APPROVED', 'Remote Desktop', 'No'),
(1254, 'APPROVED', 'Data Backup', 'No'),
(1255, 'APPROVED', 'Voice Portals', 'No'),
(1256, 'APPROVED', 'Wap Gateway', 'No'),
(1257, 'APPROVED', 'Relocation', 'No'),
(1258, 'APPROVED', 'Winscp', 'No'),
(1259, 'APPROVED', 'Performance  Testing', 'No'),
(1260, 'APPROVED', 'Brioquery', 'No'),
(1261, 'APPROVED', 'Exchange Server', 'No'),
(1262, 'APPROVED', 'Recording Macro', 'No'),
(1263, 'APPROVED', 'Design And Creating Macro', 'No'),
(1264, 'APPROVED', 'Mac Mail', 'No'),
(1265, 'APPROVED', 'Rdlc Report', 'No'),
(1266, 'APPROVED', 'Red Hat Linux', 'Yes'),
(1267, 'APPROVED', 'Glassfish', 'No'),
(1268, 'APPROVED', 'Subnetting', 'No'),
(1269, 'APPROVED', 'Ip Addressing', 'No'),
(1270, 'APPROVED', 'Oracle Sql', 'No'),
(1271, 'APPROVED', 'Infographics', 'No'),
(1272, 'APPROVED', 'Vpn Server', 'No'),
(1273, 'APPROVED', 'Ms Cloud', 'No'),
(1274, 'APPROVED', 'Red Hat Cloud', 'No'),
(1275, 'APPROVED', 'Qms Operations', 'No'),
(1276, 'APPROVED', 'Microsoft Frontpage', 'No'),
(1277, 'APPROVED', 'Web Logic', 'No'),
(1278, 'APPROVED', 'Microsoft Powerpoint', 'No'),
(1279, 'APPROVED', 'Manual Accountants', 'No'),
(1280, 'APPROVED', 'Advanced Java', 'No'),
(1281, 'APPROVED', 'Servlet', 'No'),
(1282, 'APPROVED', 'Risk Assesment', 'Yes'),
(1283, 'APPROVED', 'Safety Training', 'No'),
(1284, 'APPROVED', 'Emergency Planning', 'No'),
(1285, 'APPROVED', 'Construction Safety', 'No'),
(1286, 'APPROVED', 'Fire Safety', 'No'),
(1287, 'APPROVED', 'Billing', 'No'),
(1288, 'APPROVED', 'Refinery', 'No'),
(1289, 'APPROVED', 'Interpersonal Skills', 'No'),
(1290, 'APPROVED', 'Electrical Machines', 'No'),
(1291, 'APPROVED', 'Switchgear', 'No'),
(1292, 'APPROVED', 'Piping Engineer', 'No'),
(1293, 'APPROVED', 'Collaborative Networking', 'No'),
(1294, 'APPROVED', 'Strategic Planning', 'No'),
(1295, 'APPROVED', 'Retail Store Operations', 'No'),
(1296, 'APPROVED', 'Channel Development', 'No'),
(1297, 'APPROVED', 'Mysql', 'No'),
(1298, 'APPROVED', 'Api Testing', 'No'),
(1299, 'APPROVED', 'Performance Testing', 'No'),
(1300, 'APPROVED', 'Selenium', 'No'),
(1301, 'APPROVED', 'Vue.js', 'No'),
(1302, 'APPROVED', 'React', 'No'),
(1303, 'APPROVED', 'Angular Js', 'No'),
(1304, 'APPROVED', 'Accounts', 'No'),
(1305, 'APPROVED', 'Account Acquisition Manager', 'No'),
(1306, 'APPROVED', 'Account Associate', 'No'),
(1307, 'APPROVED', 'Ac Drivers', 'No'),
(1308, 'APPROVED', 'AC Induction', 'No'),
(1309, 'APPROVED', 'AC Mechanic', 'No'),
(1310, 'APPROVED', 'AC Refrigerator Mechanic', 'No'),
(1311, 'APPROVED', 'AC Sales', 'No'),
(1312, 'APPROVED', 'Accounts Director', 'No'),
(1313, 'APPROVED', 'Accounts Handling', 'No'),
(1314, 'APPROVED', 'Accounts Management', 'Yes'),
(1315, 'APPROVED', 'Accounts Payable', 'No'),
(1316, 'APPROVED', 'Accounts Receivable', 'No'),
(1317, 'APPROVED', 'F&A', 'No'),
(1318, 'APPROVED', 'Accounts Fundamental', 'No'),
(1319, 'APPROVED', 'Accent Neutralization', 'Yes'),
(1320, 'APPROVED', 'Accent Trainer', 'No'),
(1321, 'APPROVED', 'Academic Centre Head', 'No'),
(1322, 'APPROVED', 'Academic Head', 'No'),
(1323, 'APPROVED', 'ACBS System Implementation', 'No'),
(1324, 'APPROVED', 'AD Sales', 'No'),
(1325, 'APPROVED', 'Ad Placing', 'No'),
(1326, 'APPROVED', 'Ad Scheduling', 'No'),
(1327, 'APPROVED', 'Ad Serving', 'No'),
(1328, 'APPROVED', 'Ad Space', 'No'),
(1329, 'APPROVED', 'Ad Space Sales', 'No'),
(1330, 'APPROVED', 'Adverse Event Reporting', 'No'),
(1331, 'APPROVED', 'Adverse Events Monitoring', 'No'),
(1332, 'APPROVED', 'Advertisement Campaign', 'No'),
(1333, 'APPROVED', 'Advertisement Promotions', 'No'),
(1334, 'APPROVED', 'Advertisement Sales', 'No'),
(1335, 'APPROVED', 'Media Analytics', 'No'),
(1336, 'APPROVED', 'Media Budget', 'No'),
(1337, 'APPROVED', 'Media Coordinator', 'No'),
(1338, 'APPROVED', 'Media Executive', 'No'),
(1339, 'APPROVED', 'News Editor', 'No'),
(1340, 'APPROVED', 'Copy Writers', 'No'),
(1341, 'APPROVED', 'News Reporters', 'No'),
(1342, 'APPROVED', 'Entertainment', 'No'),
(1343, 'APPROVED', 'ArchiCAD', 'No'),
(1344, 'APPROVED', 'Architect', 'No'),
(1345, 'APPROVED', 'Contractor', 'No'),
(1346, 'APPROVED', 'Solution Architect', 'No'),
(1347, 'APPROVED', 'Interior Designer', 'No'),
(1348, 'APPROVED', 'Architect Planner', 'No'),
(1349, 'APPROVED', 'Architects Civil', 'No'),
(1350, 'APPROVED', 'Architectural Design', 'No'),
(1351, 'APPROVED', 'Builders Developers', 'No'),
(1352, 'APPROVED', 'Concept Design', 'No'),
(1353, 'APPROVED', 'Concept Planning', 'No'),
(1354, 'APPROVED', 'Conceptualization', 'No'),
(1355, 'APPROVED', 'Process Audit', 'No'),
(1356, 'APPROVED', 'Product Audit', 'No'),
(1357, 'APPROVED', 'Product Architech', 'No'),
(1358, 'APPROVED', 'Product Development', 'No'),
(1359, 'APPROVED', 'Marketing Strategy', 'No'),
(1360, 'APPROVED', 'Team Managment', 'Yes'),
(1361, 'APPROVED', 'Marketing', 'No'),
(1362, 'APPROVED', 'Business Development', 'No'),
(1363, 'APPROVED', 'Tele Sales', 'No'),
(1364, 'APPROVED', 'Instituational Sales', 'No'),
(1365, 'APPROVED', 'Corporate Sales', 'No'),
(1366, 'APPROVED', 'Retails Assets', 'No'),
(1367, 'APPROVED', 'Retails Banking', 'No'),
(1368, 'APPROVED', 'Corporate Banking', 'No'),
(1369, 'APPROVED', 'Inhouse Sales', 'No'),
(1370, 'APPROVED', 'Inbound', 'No'),
(1371, 'APPROVED', 'Outbound', 'No'),
(1372, 'APPROVED', 'Capital Markets', 'Yes'),
(1373, 'APPROVED', 'Bank Reconciliation', 'No'),
(1374, 'APPROVED', 'Aquisition Managmenet', 'No'),
(1375, 'APPROVED', 'Credit Analyst', 'No'),
(1376, 'APPROVED', 'Credit Operation', 'No'),
(1377, 'APPROVED', 'Cash Drawer Maintenance', 'No'),
(1378, 'APPROVED', 'Customer Relations', 'No'),
(1379, 'APPROVED', 'Cross Sales Of Service', 'No'),
(1380, 'APPROVED', 'Cash Management', 'No'),
(1381, 'APPROVED', 'Restocking Merchandise', 'No'),
(1382, 'APPROVED', 'Team Player', 'No'),
(1383, 'APPROVED', 'Teamwork', 'No'),
(1384, 'APPROVED', 'Timeliness', 'No'),
(1385, 'APPROVED', 'Budgeting', 'No'),
(1386, 'APPROVED', 'Event Planning', 'No'),
(1387, 'APPROVED', 'Planning And Organising', 'No'),
(1388, 'APPROVED', 'Business Focus', 'No'),
(1389, 'APPROVED', 'Critical Thinking', 'No'),
(1390, 'APPROVED', 'PR', 'No'),
(1391, 'APPROVED', 'Corporate Communication', 'No'),
(1392, 'APPROVED', 'Media Branding', 'No'),
(1393, 'APPROVED', 'Exhibition', 'No'),
(1394, 'APPROVED', 'Biotechnology', 'No'),
(1395, 'APPROVED', 'Microbiology', 'No'),
(1396, 'APPROVED', 'Biochemistry', 'No'),
(1397, 'APPROVED', 'Genetics', 'No'),
(1398, 'APPROVED', 'Botany', 'No'),
(1399, 'APPROVED', 'Biology', 'No'),
(1400, 'APPROVED', 'Teacher', 'No'),
(1401, 'APPROVED', 'Online Tutor', 'No'),
(1402, 'APPROVED', 'Lecturers', 'No'),
(1403, 'APPROVED', 'Sciences', 'No'),
(1404, 'APPROVED', 'Tutors', 'No'),
(1405, 'APPROVED', 'Nurse', 'No'),
(1406, 'APPROVED', 'Nursing Superintendent', 'No'),
(1407, 'APPROVED', 'HVAC', 'No'),
(1408, 'APPROVED', 'MEP', 'No'),
(1409, 'APPROVED', 'Chiller', 'No'),
(1410, 'APPROVED', 'Front Office', 'No'),
(1411, 'APPROVED', 'Receptionist', 'No'),
(1412, 'APPROVED', 'Journalism', 'No'),
(1413, 'APPROVED', 'Content Writing', 'No'),
(1414, 'APPROVED', 'Editor', 'No'),
(1415, 'APPROVED', 'Mass Communication', 'No'),
(1416, 'APPROVED', 'Copy Editor', 'No'),
(1417, 'APPROVED', 'Editorial', 'No'),
(1418, 'APPROVED', 'Creative Writer', 'No'),
(1419, 'APPROVED', 'Innovation', 'No'),
(1420, 'APPROVED', 'Innovative Writer', 'No'),
(1421, 'APPROVED', 'Innovative Thinker', 'No'),
(1422, 'APPROVED', 'Quality Assurance', 'Yes'),
(1423, 'APPROVED', 'Quality Control', 'No'),
(1424, 'APPROVED', 'Photographer', 'No'),
(1425, 'APPROVED', 'Image Editor', 'No'),
(1426, 'APPROVED', 'Retouching Expert', 'No'),
(1427, 'APPROVED', 'Camera Operator', 'No'),
(1428, 'APPROVED', 'Photo Editor', 'No'),
(1429, 'APPROVED', 'Video Editor', 'No'),
(1430, 'APPROVED', 'Phone Banking', 'No'),
(1431, 'APPROVED', 'Inventory Management', 'No'),
(1432, 'APPROVED', 'EXIM Coordinator', 'No'),
(1433, 'APPROVED', 'Import / Export', 'No'),
(1434, 'APPROVED', 'International Trade', 'No'),
(1435, 'APPROVED', 'Foreign Trade', 'No'),
(1436, 'APPROVED', 'Logistics Operation', 'No'),
(1437, 'APPROVED', 'Corporate Finance', 'No'),
(1438, 'APPROVED', 'Jewellery Designer', 'No'),
(1439, 'APPROVED', 'Dealer', 'No'),
(1440, 'APPROVED', 'Research Associate', 'No'),
(1441, 'APPROVED', 'Research Analyst', 'No'),
(1442, 'APPROVED', 'Talent Acquisition', 'No'),
(1443, 'APPROVED', 'Visual Merchandiser', 'No'),
(1444, 'APPROVED', 'Store Supervisor', 'No'),
(1445, 'APPROVED', 'Merchandiser', 'No'),
(1446, 'APPROVED', 'Fashion Designer', 'No'),
(1447, 'APPROVED', 'Counter Staff', 'No'),
(1448, 'APPROVED', 'Counselor', 'No'),
(1449, 'APPROVED', 'Machine Operator', 'No'),
(1450, 'APPROVED', 'Visualliser', 'No'),
(1451, 'APPROVED', 'Art Director', 'No'),
(1452, 'APPROVED', 'Training And Development', 'Yes'),
(1453, 'APPROVED', 'Payroll', 'No'),
(1454, 'APPROVED', 'Compliances', 'No'),
(1455, 'APPROVED', 'Landscap Management', 'No'),
(1456, 'APPROVED', 'Email Marketing', 'No'),
(1457, 'APPROVED', 'Vendor Management', 'No'),
(1458, 'APPROVED', 'Advisory', 'No'),
(1459, 'APPROVED', 'Business Analyst', 'No'),
(1460, 'APPROVED', 'Process Associate', 'No'),
(1461, 'APPROVED', 'Lawyer', 'No'),
(1462, 'APPROVED', 'Computer Operator', 'No'),
(1463, 'APPROVED', 'Lab Chemist', 'No'),
(1464, 'APPROVED', 'Labaratory', 'Yes'),
(1465, 'APPROVED', 'Lab Incharge', 'No'),
(1466, 'APPROVED', 'Lab Technician', 'No'),
(1467, 'APPROVED', 'Guest Service', 'No'),
(1468, 'APPROVED', 'Guest Relationship', 'No'),
(1469, 'APPROVED', 'Hostress', 'No'),
(1470, 'APPROVED', 'Steward', 'No'),
(1471, 'APPROVED', 'Restaurant Hostress', 'No'),
(1472, 'APPROVED', 'Front Desk', 'No'),
(1473, 'APPROVED', 'Floor Manager', 'No'),
(1474, 'APPROVED', 'Shift Supervisor', 'No'),
(1475, 'APPROVED', 'Shift Manager', 'No'),
(1476, 'APPROVED', 'Negotiation', 'No'),
(1477, 'APPROVED', 'Trade Execution', 'No'),
(1478, 'APPROVED', 'Upholstery', 'No'),
(1479, 'APPROVED', 'Counselling', 'No'),
(1480, 'APPROVED', 'Costing', 'No'),
(1481, 'APPROVED', 'Convencing', 'No'),
(1482, 'APPROVED', 'Motivating', 'No'),
(1483, 'APPROVED', 'Housekeeping', 'No'),
(1484, 'APPROVED', 'F&B Agent', 'No'),
(1485, 'APPROVED', 'Litigation', 'No'),
(1486, 'APPROVED', 'Business Associate', 'No'),
(1487, 'APPROVED', 'Office Management', 'No'),
(1488, 'APPROVED', 'Cost Accounting', 'No'),
(1489, 'APPROVED', 'Book Keeping', 'No'),
(1490, 'APPROVED', 'Waste Management', 'No'),
(1491, 'APPROVED', 'Craftman', 'No'),
(1492, 'APPROVED', 'Weaving', 'No'),
(1493, 'APPROVED', 'Bleaching', 'No'),
(1494, 'APPROVED', 'Spinning', 'No'),
(1495, 'APPROVED', 'Trainer', 'No'),
(1496, 'APPROVED', 'Tele Marketing', 'No'),
(1497, 'APPROVED', 'Fashion Consultant', 'No'),
(1498, 'APPROVED', 'Store Keeper', 'No'),
(1499, 'APPROVED', 'Recruitment', 'No'),
(1500, 'APPROVED', 'Associate', 'No'),
(1501, 'APPROVED', 'Consultant', 'No'),
(1502, 'APPROVED', 'Risk Management', 'No'),
(1503, 'APPROVED', 'Custom', 'No'),
(1504, 'APPROVED', 'Supply Chain Management', 'No'),
(1505, 'APPROVED', 'Phone Assistant', 'No'),
(1506, 'APPROVED', 'Composite Manufacturing', 'No'),
(1507, 'APPROVED', 'Quality Analyst', 'No'),
(1508, 'APPROVED', 'Resume Writing', 'No'),
(1509, 'APPROVED', 'Office Assistant', 'No'),
(1510, 'APPROVED', 'Facility Management', 'No'),
(1511, 'APPROVED', 'Plumbing', 'No'),
(1512, 'APPROVED', 'Nursing Supervisor', 'No'),
(1513, 'APPROVED', 'Content Development', 'No'),
(1514, 'APPROVED', 'Teaching', 'No'),
(1515, 'APPROVED', 'Biotech', 'No'),
(1516, 'APPROVED', 'Media Relation', 'No'),
(1517, 'APPROVED', 'Learning', 'No'),
(1518, 'APPROVED', 'Self Management', 'No'),
(1519, 'APPROVED', 'Problem Solving', 'No'),
(1520, 'APPROVED', 'Banking Operation', 'No'),
(1521, 'APPROVED', 'Portfolio Management', 'No'),
(1522, 'APPROVED', 'Investment Banking', 'No'),
(1523, 'APPROVED', 'Wholsale Banking', 'No'),
(1524, 'APPROVED', 'Promotion', 'No'),
(1525, 'APPROVED', 'Market Expansion', 'No'),
(1526, 'APPROVED', 'Market Development', 'No'),
(1527, 'APPROVED', 'Direct Selling', 'No'),
(1528, 'APPROVED', 'Communication', 'No'),
(1529, 'APPROVED', 'Usage And Retention', 'No'),
(1530, 'APPROVED', 'Retention Management', 'No'),
(1531, 'APPROVED', 'Channel Marketing', 'No'),
(1532, 'APPROVED', 'Process Management', 'No'),
(1533, 'APPROVED', 'Product Management', 'No'),
(1534, 'APPROVED', 'Product Analyst', 'No'),
(1535, 'APPROVED', 'Administration', 'No'),
(1536, 'APPROVED', 'Concept Marketing', 'No'),
(1537, 'APPROVED', 'Builder', 'No'),
(1538, 'APPROVED', 'BTL', 'No'),
(1539, 'APPROVED', 'Space Selling', 'No'),
(1540, 'APPROVED', 'Branding', 'No'),
(1541, 'APPROVED', 'Media', 'No'),
(1542, 'APPROVED', 'Ad Operation', 'No'),
(1543, 'APPROVED', 'Advertising', 'No'),
(1544, 'APPROVED', 'Accent Coach', 'No'),
(1545, 'APPROVED', 'General Ledger', 'No'),
(1546, 'APPROVED', 'Accounts Finalization', 'No'),
(1547, 'APPROVED', 'Auditing', 'No'),
(1548, 'APPROVED', 'Taxation', 'No'),
(1549, 'APPROVED', 'Finance', 'No'),
(1550, 'APPROVED', 'Account Derivable', 'No'),
(1551, 'APPROVED', 'Account Assistant', 'No'),
(1552, 'APPROVED', 'Relationships', 'No'),
(1553, 'APPROVED', 'Management', 'No'),
(1554, 'APPROVED', 'Cost Accountant', 'No'),
(1555, 'APPROVED', 'Call Center', 'No'),
(1556, 'APPROVED', 'International Voice Process', 'No'),
(1557, 'APPROVED', 'Voice Process', 'No'),
(1558, 'APPROVED', 'Human Resource', 'No'),
(1559, 'APPROVED', 'Accounts Executive', 'No'),
(1560, 'APPROVED', 'Tally', 'No'),
(1561, 'APPROVED', 'Channel Account Manager', 'No'),
(1562, 'APPROVED', 'Chief Accountant', 'No'),
(1563, 'APPROVED', 'Office Executive', 'No'),
(1564, 'APPROVED', 'Sales Accountant', 'No'),
(1565, 'APPROVED', 'Managing Key Accounts', 'No'),
(1566, 'APPROVED', 'Manager Finance', 'No'),
(1567, 'APPROVED', 'Store Planning', 'No'),
(1568, 'APPROVED', 'Electrical Distribution', 'No'),
(1569, 'APPROVED', 'Sales Planning', 'No'),
(1570, 'APPROVED', 'Company Laws', 'No'),
(1571, 'APPROVED', 'Character Rigging', 'No'),
(1572, 'APPROVED', 'Visual Merchandising', 'No'),
(1573, 'APPROVED', 'Recruiter', 'No'),
(1574, 'APPROVED', 'Buying', 'No'),
(1575, 'APPROVED', 'Adquisitions', 'No'),
(1576, 'APPROVED', 'Knowledge Management', 'No'),
(1577, 'APPROVED', 'Mergers', 'No'),
(1578, 'APPROVED', 'Hiring', 'No'),
(1579, 'APPROVED', 'Recruitments', 'No'),
(1580, 'APPROVED', 'It Recruiter', 'No'),
(1581, 'APPROVED', 'Document Administration', 'No'),
(1582, 'APPROVED', 'Accounts Assistant', 'Yes'),
(1583, 'APPROVED', 'Accounts Manager', 'Yes'),
(1584, 'APPROVED', 'Accountant', 'No'),
(1585, 'APPROVED', 'Visa Associate', 'No'),
(1586, 'APPROVED', 'Account Officer', 'No'),
(1587, 'APPROVED', 'Income Tax', 'No'),
(1588, 'APPROVED', 'Sales Accounting', 'No'),
(1589, 'APPROVED', 'Account Executive', 'No'),
(1590, 'APPROVED', 'It Recruitment', 'No'),
(1591, 'APPROVED', 'Headhunting', 'No'),
(1592, 'APPROVED', 'Teller', 'No'),
(1593, 'APPROVED', 'Backend', 'No'),
(1594, 'APPROVED', 'Marketing Ad Space Selling', 'No'),
(1595, 'APPROVED', 'Banking Insurance', 'No'),
(1596, 'APPROVED', 'Chartered Accountant', 'No'),
(1597, 'APPROVED', 'Mba Marketing', 'No'),
(1598, 'APPROVED', 'Training Personnel', 'No'),
(1599, 'APPROVED', 'Admin', 'No'),
(1600, 'APPROVED', 'Manager Accounts', 'No'),
(1601, 'APPROVED', 'Mis Reports', 'No'),
(1602, 'APPROVED', 'Sales Tax', 'No'),
(1603, 'APPROVED', 'Back Office Operations', 'No'),
(1604, 'APPROVED', 'Tax Laws', 'No'),
(1605, 'APPROVED', 'Vendor Manager', 'No'),
(1606, 'APPROVED', 'Tax Audits', 'No'),
(1607, 'APPROVED', 'HR Operations', 'No'),
(1608, 'APPROVED', 'Asset Management', 'No'),
(1609, 'APPROVED', 'IFRS', 'No'),
(1610, 'APPROVED', 'Relationship Management', 'No'),
(1611, 'APPROVED', 'Accounting', 'No'),
(1612, 'APPROVED', 'Accounting Software', 'No'),
(1613, 'APPROVED', 'Balance Sheet', 'No'),
(1614, 'APPROVED', 'Business Analytics', 'No'),
(1615, 'APPROVED', 'Business Awareness', 'No'),
(1616, 'APPROVED', 'CA', 'No'),
(1617, 'APPROVED', 'Cash Flow Management', 'No'),
(1618, 'APPROVED', 'Certified Public Accountant', 'No'),
(1619, 'APPROVED', 'CFA', 'No'),
(1620, 'APPROVED', 'Chart Of Accounts', 'No'),
(1621, 'APPROVED', 'Corporate Tax', 'No'),
(1622, 'APPROVED', 'Cost Analysis', 'No'),
(1623, 'APPROVED', 'Cost Center Report Analysis', 'No'),
(1624, 'APPROVED', 'Data Analysis', 'No'),
(1625, 'APPROVED', 'Debt Management', 'No'),
(1626, 'APPROVED', 'Financial Advising', 'No'),
(1627, 'APPROVED', 'Financial Analysis', 'No'),
(1628, 'APPROVED', 'Financial Concepts', 'No'),
(1629, 'APPROVED', 'Financial Data', 'No'),
(1630, 'APPROVED', 'Financial Management', 'No'),
(1631, 'APPROVED', 'Financial Modeling', 'No'),
(1632, 'APPROVED', 'Financial Planning', 'No'),
(1633, 'APPROVED', 'Financial Reporting', 'No'),
(1634, 'APPROVED', 'Financial Statement Analysis', 'No'),
(1635, 'APPROVED', 'Financial Statements', 'No'),
(1636, 'APPROVED', 'Financial Systems', 'No'),
(1637, 'APPROVED', 'Forecasting', 'No'),
(1638, 'APPROVED', 'GAAP', 'No'),
(1639, 'APPROVED', 'Interest Calculations', 'No'),
(1640, 'APPROVED', 'Invoices', 'No'),
(1641, 'APPROVED', 'Journal Entry', 'No'),
(1642, 'APPROVED', 'Performance Management', 'No'),
(1643, 'APPROVED', 'Processing & Reconciling', 'No'),
(1644, 'APPROVED', 'Quantitative Analysis', 'No'),
(1645, 'APPROVED', 'SOX Compliance', 'No'),
(1646, 'APPROVED', 'Sales And Assets Reporting', 'No'),
(1647, 'APPROVED', 'Tax Analysis', 'No'),
(1648, 'APPROVED', 'VAT Input & Output Reporting', 'No'),
(1649, 'APPROVED', '3D Max', 'No'),
(1650, 'APPROVED', 'Acting', 'No'),
(1651, 'APPROVED', 'Animation', 'No'),
(1652, 'APPROVED', 'Documentation', 'No'),
(1653, 'APPROVED', 'Drama', 'No'),
(1654, 'APPROVED', 'Dramatic Art', 'No'),
(1655, 'APPROVED', 'Film Editing', 'No'),
(1656, 'APPROVED', 'Film', 'No'),
(1657, 'APPROVED', 'Graphic Design', 'No'),
(1658, 'APPROVED', 'Video Editing', 'No'),
(1659, 'APPROVED', 'Video Production', 'No'),
(1660, 'APPROVED', 'Brake Repair', 'No'),
(1661, 'APPROVED', 'Car AC Repair', 'No'),
(1662, 'APPROVED', 'Car Engine Servicing', 'No'),
(1663, 'APPROVED', 'Diesel Engine Repair', 'No'),
(1664, 'APPROVED', 'Engine Repair', 'No'),
(1665, 'APPROVED', 'Auto Service Center', 'No'),
(1666, 'APPROVED', 'Machine Repair', 'No'),
(1667, 'APPROVED', 'Mechanical', 'No'),
(1668, 'APPROVED', 'Petrol Engine Repair', 'No'),
(1669, 'APPROVED', 'Car Driver', 'No'),
(1670, 'APPROVED', 'Truck Driver', 'No'),
(1671, 'APPROVED', 'Vehicle Repair', 'No'),
(1672, 'APPROVED', 'Bus Driver', 'No'),
(1673, 'APPROVED', 'Vehicle Operating', 'No'),
(1674, 'APPROVED', 'Candidate Search', 'No'),
(1675, 'APPROVED', 'Candidate Sourcing', 'No'),
(1676, 'APPROVED', 'Employee Development', 'No'),
(1677, 'APPROVED', 'Employment Manager', 'No'),
(1678, 'APPROVED', 'Human Resource Director', 'No'),
(1679, 'APPROVED', 'Human Resources Manager', 'No'),
(1680, 'APPROVED', 'Labor Relations Specialist', 'No'),
(1681, 'APPROVED', 'Placement Management', 'No'),
(1682, 'APPROVED', 'Placement Manager', 'No'),
(1683, 'APPROVED', 'Recruitment Manager', 'No'),
(1684, 'APPROVED', 'T&D Manager', 'No'),
(1685, 'APPROVED', 'Talent Acquisition Manager', 'No'),
(1686, 'APPROVED', 'Talent Management Systems', 'No'),
(1687, 'APPROVED', 'Talent Planning', 'No'),
(1688, 'APPROVED', 'Training Manager', 'No'),
(1689, 'APPROVED', 'HR VP', 'No'),
(1690, 'APPROVED', 'Administration Manager', 'No'),
(1691, 'APPROVED', 'Ad Agency', 'No'),
(1692, 'APPROVED', 'Brand Management', 'No'),
(1693, 'APPROVED', 'Brand Manager', 'No'),
(1694, 'APPROVED', 'Brand Marketing', 'No'),
(1695, 'APPROVED', 'Business Design', 'No'),
(1696, 'APPROVED', 'Client Relationship', 'No'),
(1697, 'APPROVED', 'Client Support', 'No'),
(1698, 'APPROVED', 'Direct Marketing', 'No'),
(1699, 'APPROVED', 'Fundraising', 'No'),
(1700, 'APPROVED', 'Inside Sales', 'No'),
(1701, 'APPROVED', 'Market Research', 'No'),
(1702, 'APPROVED', 'Merchandising', 'No'),
(1703, 'APPROVED', 'Mobile Marketing', 'No'),
(1704, 'APPROVED', 'National Marketing', 'No'),
(1705, 'APPROVED', 'New Account Setup', 'No'),
(1706, 'APPROVED', 'Online Marketing', 'No'),
(1707, 'APPROVED', 'Outside Sales', 'No'),
(1708, 'APPROVED', 'Price Quoting', 'No'),
(1709, 'APPROVED', 'Product Demonstration', 'No'),
(1710, 'APPROVED', 'Product Promotion', 'No'),
(1711, 'APPROVED', 'Product Research', 'No'),
(1712, 'APPROVED', 'Project Coordination', 'No'),
(1713, 'APPROVED', 'Public Relations', 'No'),
(1714, 'APPROVED', 'Sales Presentations', 'No'),
(1715, 'APPROVED', 'Sales Support', 'No'),
(1716, 'APPROVED', 'Sales Tracking', 'No'),
(1717, 'APPROVED', 'Social Media Marketing', 'No'),
(1718, 'APPROVED', 'Social Research', 'No'),
(1719, 'APPROVED', 'Test Marketing', 'No'),
(1720, 'APPROVED', 'BPT', 'No'),
(1721, 'APPROVED', 'Biosystems', 'No'),
(1722, 'APPROVED', 'Clinical Research', 'No'),
(1723, 'APPROVED', 'Dental Medicine', 'No'),
(1724, 'APPROVED', 'Dental Science', 'No'),
(1725, 'APPROVED', 'Dental Surgery', 'No'),
(1726, 'APPROVED', 'Dentist', 'No'),
(1727, 'APPROVED', 'Diet', 'No'),
(1728, 'APPROVED', 'Health Administration', 'No'),
(1729, 'APPROVED', 'Health Informatics', 'No'),
(1730, 'APPROVED', 'Health Science', 'No'),
(1731, 'APPROVED', 'Homeopathy', 'No'),
(1732, 'APPROVED', 'GYM', 'No'),
(1733, 'APPROVED', 'Medicine', 'No'),
(1734, 'APPROVED', 'Pharmacy', 'No'),
(1735, 'APPROVED', 'Lab Assistance', 'No'),
(1736, 'APPROVED', 'MLT', 'No'),
(1737, 'APPROVED', 'Nursing', 'No'),
(1738, 'APPROVED', 'OPD', 'No'),
(1739, 'APPROVED', 'Para Medical', 'No'),
(1740, 'APPROVED', 'Physiotherapist', 'No'),
(1741, 'APPROVED', 'Psychology', 'No'),
(1742, 'APPROVED', 'Surgeon', 'No'),
(1743, 'APPROVED', 'Therapists', 'No'),
(1744, 'APPROVED', 'Veterinary', 'No'),
(1745, 'APPROVED', 'Veterinary Medicine', 'No'),
(1746, 'APPROVED', 'Veterinary Surgeon', 'No'),
(1747, 'APPROVED', 'X-Ray', 'No'),
(1748, 'APPROVED', 'Business Administration', 'No'),
(1749, 'APPROVED', 'Business Informatics', 'No'),
(1750, 'APPROVED', 'Clerical', 'No'),
(1751, 'APPROVED', 'Client Relations', 'No'),
(1752, 'APPROVED', 'Contract Management', 'No'),
(1753, 'APPROVED', 'Environmental Management', 'No'),
(1754, 'APPROVED', 'Event Coordination', 'No'),
(1755, 'APPROVED', 'Event Management', 'No'),
(1756, 'APPROVED', 'Hospital Administration', 'No'),
(1757, 'APPROVED', 'Hotel Management', 'No'),
(1758, 'APPROVED', 'Human Resource Management', 'No'),
(1759, 'APPROVED', 'Information Management', 'No'),
(1760, 'APPROVED', 'Key Accounts Management', 'No'),
(1761, 'APPROVED', 'Legal Familiarity', 'No'),
(1762, 'APPROVED', 'Maintaining Office Records', 'No'),
(1763, 'APPROVED', 'Management Trainee', 'No'),
(1764, 'APPROVED', 'Office Administration', 'No'),
(1765, 'APPROVED', 'Oral Communication', 'No'),
(1766, 'APPROVED', 'Order Processing', 'No'),
(1767, 'APPROVED', 'Project Management', 'No'),
(1768, 'APPROVED', 'Public Management', 'No'),
(1769, 'APPROVED', 'Retail Marketing', 'No'),
(1770, 'APPROVED', 'Securities', 'No'),
(1771, 'APPROVED', 'Wealth Management', 'No'),
(1772, 'APPROVED', 'Aeronautical Engineering', 'No'),
(1773, 'APPROVED', 'Aerospace Engineering', 'No'),
(1774, 'APPROVED', 'Architectural Engineering', 'No'),
(1775, 'APPROVED', 'Civil Engineering', 'No'),
(1776, 'APPROVED', 'Computer Engineering', 'No'),
(1777, 'APPROVED', 'Electircal Engineering', 'No'),
(1778, 'APPROVED', 'Engineering Physics', 'No'),
(1779, 'APPROVED', 'Financial Engineering', 'No'),
(1780, 'APPROVED', 'Industrial Engineering', 'No'),
(1781, 'APPROVED', 'Materials Engineering', 'No'),
(1782, 'APPROVED', 'Mechanical Engineering', 'No'),
(1783, 'APPROVED', 'Medical Engineering', 'No'),
(1784, 'APPROVED', 'Metallurgical Engineering', 'No'),
(1785, 'APPROVED', 'Petroleum Engineering', 'No'),
(1786, 'APPROVED', 'Polymer & Fiber Engineering', 'No'),
(1787, 'APPROVED', 'Software Engineering', 'No'),
(1788, 'APPROVED', 'Textile Engineering', 'No'),
(1789, 'APPROVED', 'Banking', 'No'),
(1790, 'APPROVED', 'Wireless Engineering', 'No'),
(1791, 'APPROVED', 'Writing', 'No'),
(1792, 'APPROVED', 'Manufacturing', 'No'),
(1793, 'APPROVED', 'Photography', 'No'),
(1794, 'APPROVED', 'Architecture', 'No'),
(1795, 'APPROVED', 'Education', 'No'),
(1796, 'APPROVED', 'Supply Chain', 'No'),
(1797, 'APPROVED', 'Design', 'No'),
(1798, 'APPROVED', 'Yoga', 'No'),
(1799, 'APPROVED', 'Copy Writing', 'No'),
(1800, 'APPROVED', 'Jewellery', 'No'),
(1801, 'APPROVED', 'Music', 'No'),
(1802, 'APPROVED', 'Training', 'No'),
(1803, 'APPROVED', 'Art', 'No'),
(1804, 'APPROVED', 'Textile Designing', 'No'),
(1805, 'APPROVED', 'Cooking', 'No'),
(1806, 'APPROVED', 'Dance', 'No'),
(1807, 'APPROVED', 'Screen Printing', 'No'),
(1808, 'APPROVED', 'Coaching', 'No'),
(1809, 'APPROVED', 'Analysis', 'No'),
(1810, 'APPROVED', 'Landscape Architecture', 'No'),
(1811, 'APPROVED', 'Astrology', 'No'),
(1812, 'APPROVED', 'Baking', 'No'),
(1813, 'APPROVED', 'Illustration', 'No'),
(1814, 'APPROVED', 'Lighting', 'No'),
(1815, 'APPROVED', 'Aquisitions', 'No'),
(1816, 'APPROVED', 'Art Therapy', 'No'),
(1817, 'APPROVED', 'Authoring', 'No'),
(1818, 'APPROVED', 'Body Art', 'No'),
(1819, 'APPROVED', 'Book Binding', 'No'),
(1820, 'APPROVED', 'Channel Account Management', 'No'),
(1821, 'APPROVED', 'Chartered Accountancy', 'No'),
(1822, 'APPROVED', 'Advertising Account Management', 'No'),
(1823, 'APPROVED', 'Advertising Art Direction', 'No'),
(1824, 'APPROVED', 'Visa Expat Management', 'No'),
(1825, 'APPROVED', 'Wine Making', 'No'),
(1826, 'APPROVED', 'Cloth Design', 'No'),
(1827, 'APPROVED', 'Composing', 'No'),
(1828, 'APPROVED', 'Curating', 'No'),
(1829, 'APPROVED', 'Floristry', 'No'),
(1830, 'APPROVED', 'Hair Dressing', 'No'),
(1831, 'APPROVED', 'Image Consulting', 'No'),
(1832, 'APPROVED', 'Industrial Designing', 'No'),
(1833, 'APPROVED', 'Landscape Gardening', 'No'),
(1834, 'APPROVED', 'Make Up Art', 'No'),
(1835, 'APPROVED', 'Map Making', 'No'),
(1836, 'APPROVED', 'Mathematical', 'No'),
(1837, 'APPROVED', 'Motivating Skill', 'No'),
(1838, 'APPROVED', 'Negotiating Skill', 'No'),
(1839, 'APPROVED', 'Personal Services', 'No'),
(1840, 'APPROVED', 'Private Tutoring', 'No'),
(1841, 'APPROVED', 'Producing', 'No'),
(1842, 'APPROVED', 'Record Producing', 'No'),
(1843, 'APPROVED', 'Supervising', 'No'),
(1844, 'APPROVED', 'Instructing', 'No'),
(1845, 'APPROVED', 'Telling', 'No'),
(1846, 'APPROVED', 'Therapy', 'No'),
(1847, 'APPROVED', 'Customer Service Sales', 'No'),
(1848, 'APPROVED', 'Customer Services', 'No'),
(1849, 'APPROVED', 'End To End Recruitment', 'No'),
(1850, 'APPROVED', 'Good Relationship Management', 'No'),
(1851, 'APPROVED', 'Finance Manager', 'No'),
(1852, 'APPROVED', 'Customer Services Executive', 'No'),
(1853, 'APPROVED', 'Non Voice Process', 'No'),
(1854, 'APPROVED', 'Student Counselor', 'No'),
(1855, 'APPROVED', 'Audit Assistant', 'No'),
(1856, 'APPROVED', 'Site Engineering', 'No'),
(1857, 'APPROVED', 'Fire', 'No'),
(1858, 'APPROVED', 'Insurance Sales', 'No'),
(1859, 'APPROVED', 'Excellent Communication Skills', 'No'),
(1860, 'APPROVED', 'Marketing Planning', 'No'),
(1861, 'APPROVED', 'International', 'No'),
(1862, 'APPROVED', 'Piping Supervisor', 'No'),
(1863, 'APPROVED', 'Banking Sales', 'No'),
(1864, 'APPROVED', 'New Client Acquisition', 'No'),
(1865, 'APPROVED', 'Products', 'No'),
(1866, 'APPROVED', 'Revenue Genaration', 'No'),
(1867, 'APPROVED', 'Warehouse And Storekeeping', 'No'),
(1868, 'APPROVED', 'Vendor Development & Management', 'No'),
(1869, 'APPROVED', 'Sales And Team Handling', 'No'),
(1870, 'APPROVED', 'Project Procurement', 'No'),
(1871, 'APPROVED', 'Global Sourcing', 'No'),
(1872, 'APPROVED', 'Import Operations', 'No'),
(1873, 'APPROVED', 'Mis Reporting', 'No'),
(1874, 'APPROVED', 'Project Lead', 'No'),
(1875, 'APPROVED', 'Qa/Qc', 'No'),
(1876, 'APPROVED', 'Engineering Field', 'No'),
(1877, 'APPROVED', 'Sourcing Management', 'No'),
(1878, 'APPROVED', 'Team Training', 'No'),
(1879, 'APPROVED', 'Business Strategy', 'No'),
(1880, 'APPROVED', 'Sourcing', 'No'),
(1881, 'APPROVED', 'Voice Tech Support', 'No'),
(1882, 'APPROVED', 'Customer Executive', 'No'),
(1883, 'APPROVED', 'Excel Powerpoint', 'No'),
(1884, 'APPROVED', 'Freight Management', 'No'),
(1885, 'APPROVED', 'Operational Planning', 'No'),
(1886, 'APPROVED', 'Corporate', 'No'),
(1887, 'APPROVED', 'Team Leader', 'No'),
(1888, 'APPROVED', 'Collection', 'No'),
(1889, 'APPROVED', 'Leadership', 'No'),
(1890, 'APPROVED', 'B2b', 'No'),
(1891, 'APPROVED', 'B2c Collection', 'No'),
(1892, 'APPROVED', 'Operations', 'No'),
(1893, 'APPROVED', 'Officer', 'No'),
(1894, 'APPROVED', 'Project Finance', 'No'),
(1895, 'APPROVED', 'Cross Selling', 'No'),
(1896, 'APPROVED', 'Customer Handling', 'No'),
(1897, 'APPROVED', 'Order Management Manager', 'No'),
(1898, 'APPROVED', 'Cost Analyst', 'No'),
(1899, 'APPROVED', 'Manager', 'No'),
(1900, 'APPROVED', 'Finanlisation Of Accounts', 'No'),
(1901, 'APPROVED', 'Sales', 'No'),
(1902, 'APPROVED', 'Assistant Manager', 'No'),
(1903, 'APPROVED', 'Channel Sales', 'No'),
(1904, 'APPROVED', 'Reviewer', 'No'),
(1905, 'APPROVED', 'Customer Support', 'No'),
(1906, 'APPROVED', 'Team Handling', 'No'),
(1907, 'APPROVED', 'Target Achievement', 'No'),
(1908, 'APPROVED', 'Production Management', 'No'),
(1909, 'APPROVED', 'Production Planning', 'No'),
(1910, 'APPROVED', 'Senior Accountant', 'No'),
(1911, 'APPROVED', 'Corporate Law', 'No'),
(1912, 'APPROVED', 'Problem Management', 'No'),
(1913, 'APPROVED', 'Hr', 'No'),
(1914, 'APPROVED', 'Cashier', 'No'),
(1915, 'APPROVED', 'Investment Products', 'No'),
(1916, 'APPROVED', 'Legal Compliance', 'No'),
(1917, 'APPROVED', 'International Sales', 'No'),
(1918, 'APPROVED', 'Software Sales', 'No'),
(1919, 'APPROVED', 'Bpo', 'No'),
(1920, 'APPROVED', 'Help Desk', 'No'),
(1921, 'APPROVED', 'Commerce', 'No'),
(1922, 'APPROVED', 'Software Selling', 'No'),
(1923, 'APPROVED', 'Software Marketing', 'No'),
(1924, 'APPROVED', 'Planning & Investment Advise', 'No'),
(1925, 'APPROVED', 'Marketing Operation', 'No'),
(1926, 'APPROVED', 'Sme', 'No'),
(1927, 'APPROVED', 'Medical Reviewer', 'No'),
(1928, 'APPROVED', 'Business Consulting', 'No'),
(1929, 'APPROVED', 'Business Analysis', 'No'),
(1930, 'APPROVED', 'Financial Services', 'No'),
(1931, 'APPROVED', 'Indirect Taxation', 'No'),
(1932, 'APPROVED', 'Invoice Upload', 'No'),
(1933, 'APPROVED', 'Credit Risk', 'No'),
(1934, 'APPROVED', 'Planning', 'No'),
(1935, 'APPROVED', 'Returns Filing', 'No'),
(1936, 'APPROVED', 'Inbound Selling Skills', 'No'),
(1937, 'APPROVED', 'Domestic', 'No'),
(1938, 'APPROVED', 'Voice', 'No'),
(1939, 'APPROVED', 'Premium Cards', 'No'),
(1940, 'APPROVED', 'Client Co-Ordination', 'No'),
(1941, 'APPROVED', 'Consulting', 'No'),
(1942, 'APPROVED', 'Painting', 'No'),
(1943, 'APPROVED', 'Physical Fitness', 'No'),
(1944, 'APPROVED', 'Cctv', 'No'),
(1945, 'APPROVED', 'Access', 'No'),
(1946, 'APPROVED', 'Hvac Technician', 'No'),
(1947, 'APPROVED', 'Library Services', 'No'),
(1948, 'APPROVED', 'Processor', 'No'),
(1949, 'APPROVED', 'Field Sales', 'No'),
(1950, 'APPROVED', 'Team Leadership', 'No'),
(1951, 'APPROVED', 'Performance Reporting', 'No'),
(1952, 'APPROVED', 'Financial Controller', 'No'),
(1953, 'APPROVED', 'Fmcg Marketing', 'No'),
(1954, 'APPROVED', 'Project Manager', 'No'),
(1955, 'APPROVED', 'Customer Care', 'No'),
(1956, 'APPROVED', 'Library Administration', 'No'),
(1957, 'APPROVED', 'Export Marketing', 'No'),
(1958, 'APPROVED', 'Primary Sales', 'No'),
(1959, 'APPROVED', 'Personal Care', 'No'),
(1960, 'APPROVED', 'Manpower Handling', 'No'),
(1961, 'APPROVED', 'Hardware Sales', 'No'),
(1962, 'APPROVED', 'International Marketing', 'No'),
(1963, 'APPROVED', 'Business Targets', 'No'),
(1964, 'APPROVED', 'Corporate Advisory', 'No'),
(1965, 'APPROVED', 'Business Executive', 'No'),
(1966, 'APPROVED', 'Instrumentation Control', 'No'),
(1967, 'APPROVED', 'Instrumentation Maintenance', 'No'),
(1968, 'APPROVED', 'Order Management', 'No'),
(1969, 'APPROVED', 'Finance And Accounts', 'No'),
(1970, 'APPROVED', 'Secretarial Activities', 'No'),
(1971, 'APPROVED', 'Requirement Analysis', 'No'),
(1972, 'APPROVED', 'Inspection', 'No'),
(1973, 'APPROVED', 'Amc Sales', 'No'),
(1974, 'APPROVED', 'Calling', 'No'),
(1975, 'APPROVED', 'Air Cargo', 'No'),
(1976, 'APPROVED', 'Electronics And Telecommunication Engineer', 'No'),
(1977, 'APPROVED', 'Revit', 'No'),
(1978, 'APPROVED', 'Duct Design', 'No'),
(1979, 'APPROVED', 'Project Planning', 'No'),
(1980, 'APPROVED', 'B2c', 'No'),
(1981, 'APPROVED', 'Time Keeping', 'No'),
(1982, 'APPROVED', 'Visa Medical', 'No'),
(1983, 'APPROVED', 'Testing', 'No'),
(1984, 'APPROVED', 'Auto-Cad Using Cad / Cam', 'No'),
(1985, 'APPROVED', 'Fire Fighting', 'No'),
(1986, 'APPROVED', 'Operation And Maintanence', 'No'),
(1987, 'APPROVED', 'Testing Commisioning', 'No'),
(1988, 'APPROVED', 'Document Management', 'No'),
(1989, 'APPROVED', 'Strategic Alliance', 'No'),
(1990, 'APPROVED', 'Legal Documentation', 'No'),
(1991, 'APPROVED', 'Online Trading', 'No'),
(1992, 'APPROVED', 'Airport Ground Services', 'No'),
(1993, 'APPROVED', 'Relay Test', 'No'),
(1994, 'APPROVED', 'Ms Word', 'No'),
(1995, 'APPROVED', 'Polymer Lab Executive', 'No'),
(1996, 'APPROVED', 'Switiching', 'Yes'),
(1997, 'APPROVED', 'Computer Application', 'No'),
(1998, 'APPROVED', 'Filing', 'No'),
(1999, 'APPROVED', 'Metro', 'No'),
(2000, 'APPROVED', 'Taskforce Assignment', 'No'),
(2001, 'APPROVED', 'Including Drawing', 'No'),
(2002, 'APPROVED', 'Cricket Coaching', 'No'),
(2003, 'APPROVED', 'Ms Office', 'No'),
(2004, 'APPROVED', 'Mechanical System Designing', 'No'),
(2005, 'APPROVED', 'Advance Exce', 'No'),
(2006, 'APPROVED', 'Pro-Engineer', 'No'),
(2007, 'APPROVED', 'Team Work', 'No'),
(2008, 'APPROVED', 'Fast Learner', 'No'),
(2009, 'APPROVED', 'Positive Attitude', 'No'),
(2010, 'APPROVED', 'Production Manager', 'No'),
(2011, 'APPROVED', 'Convincing Ability', 'No'),
(2012, 'APPROVED', 'Installation', 'No'),
(2013, 'APPROVED', 'Wordpress', 'No'),
(2014, 'APPROVED', 'Wordpress Developer', 'No'),
(2015, 'APPROVED', 'Hardware Networking', 'No'),
(2016, 'APPROVED', 'Csharp', 'No'),
(2017, 'APPROVED', 'VAX/VMS', 'Yes'),
(2018, 'APPROVED', 'FileNet', 'Yes'),
(2019, 'APPROVED', 'JavaScript', 'No'),
(2020, 'APPROVED', 'Back Office', 'No'),
(2021, 'APPROVED', 'CAD/CAM', 'No'),
(2022, 'APPROVED', 'ColdFusion', 'No'),
(2023, 'APPROVED', 'XML', 'No'),
(2024, 'APPROVED', 'Active Directory', 'No'),
(2025, 'APPROVED', 'Chordiant', 'No'),
(2026, 'APPROVED', 'Pro*C', 'Yes'),
(2027, 'APPROVED', 'TCP/IP', 'No'),
(2028, 'APPROVED', 'SAP BI', 'No'),
(2029, 'APPROVED', 'Css3', 'No'),
(2030, 'APPROVED', 'Asp.NetALE', 'No'),
(2031, 'APPROVED', 'ALE', 'No'),
(2032, 'APPROVED', 'Android', 'No'),
(2033, 'APPROVED', 'Anglais', 'No'),
(2034, 'APPROVED', 'Ansys', 'No'),
(2035, 'APPROVED', 'Apache', 'No'),
(2036, 'APPROVED', 'Apache Solr', 'No'),
(2037, 'APPROVED', 'Apache Tomcat', 'No'),
(2038, 'APPROVED', 'Apex', 'No'),
(2039, 'APPROVED', 'Apple IOS', 'No'),
(2040, 'APPROVED', 'Aqualogic Service', 'No'),
(2041, 'APPROVED', 'Ariba', 'No'),
(2042, 'APPROVED', 'Artpro', 'No'),
(2043, 'APPROVED', 'AS 400', 'No'),
(2044, 'APPROVED', 'ASIC', 'No'),
(2045, 'APPROVED', 'ASP', 'No'),
(2046, 'APPROVED', 'Asp.Net', 'No'),
(2047, 'APPROVED', 'Assembler', 'No'),
(2048, 'APPROVED', 'Assembly Language', 'No'),
(2049, 'APPROVED', 'Asynchronous Transfer Mode', 'No'),
(2050, 'APPROVED', 'ATG Commerce', 'No'),
(2051, 'APPROVED', 'ATL', 'No'),
(2052, 'APPROVED', 'Auto Cad', 'No'),
(2053, 'APPROVED', 'Automation Testing', 'No'),
(2054, 'APPROVED', 'Autosys', 'No'),
(2055, 'APPROVED', 'Axapta', 'No'),
(2056, 'APPROVED', 'Baan', 'No'),
(2057, 'APPROVED', 'Base 24', 'No'),
(2058, 'APPROVED', 'BASIC', 'No'),
(2059, 'APPROVED', 'BGP', 'No'),
(2060, 'APPROVED', 'Bigdata', 'Yes'),
(2061, 'APPROVED', 'Biz Talk Server', 'No'),
(2062, 'APPROVED', 'Blue Coat', 'No'),
(2063, 'APPROVED', 'BMC CLM', 'No'),
(2064, 'APPROVED', 'BPCS', 'No'),
(2065, 'APPROVED', 'BPEL', 'No'),
(2066, 'APPROVED', 'Business Continuity Planning', 'No'),
(2067, 'APPROVED', 'Business Objects', 'No'),
(2068, 'APPROVED', 'Business Process Modeling', 'No'),
(2069, 'APPROVED', 'C', 'No'),
(2070, 'APPROVED', 'C#', 'No'),
(2071, 'APPROVED', 'C#.Net', 'No'),
(2072, 'APPROVED', 'C++', 'No'),
(2073, 'APPROVED', 'CA Identity Manager', 'No'),
(2074, 'APPROVED', 'Calypso', 'No'),
(2075, 'APPROVED', 'CATI', 'Yes'),
(2076, 'APPROVED', 'CATIA', 'No'),
(2077, 'APPROVED', 'CATV', 'No'),
(2078, 'APPROVED', 'CCIE', 'No'),
(2079, 'APPROVED', 'CGI', 'No'),
(2080, 'APPROVED', 'Checkpoint', 'No'),
(2081, 'APPROVED', 'CICS', 'No'),
(2082, 'APPROVED', 'CIN', 'No'),
(2083, 'APPROVED', 'CISCO', 'No'),
(2084, 'APPROVED', 'Citrix', 'No'),
(2085, 'APPROVED', 'Cloud Computing', 'No'),
(2086, 'APPROVED', 'CMTS', 'No'),
(2087, 'APPROVED', 'Cobol', 'No'),
(2088, 'APPROVED', 'Codeigniter', 'No'),
(2089, 'APPROVED', 'Cognos', 'No'),
(2090, 'APPROVED', 'Cold Fusion', 'No'),
(2091, 'APPROVED', 'Adobe Indesign', 'No'),
(2092, 'APPROVED', 'Communique', 'No'),
(2093, 'APPROVED', 'Confirmit', 'No'),
(2094, 'APPROVED', 'CORBA', 'No'),
(2095, 'APPROVED', 'Core PHP', 'No'),
(2096, 'APPROVED', 'Core Java', 'No'),
(2097, 'APPROVED', 'Corel Draw', 'No'),
(2098, 'APPROVED', 'Coremetrics', 'No'),
(2099, 'APPROVED', 'CQ', 'No'),
(2100, 'APPROVED', 'CRM', 'No'),
(2101, 'APPROVED', 'Crystal Report', 'No'),
(2102, 'APPROVED', 'CSS', 'No'),
(2103, 'APPROVED', 'Data Mining', 'No'),
(2104, 'APPROVED', 'Data Modeling', 'No'),
(2105, 'APPROVED', 'Data Plane', 'No'),
(2106, 'APPROVED', 'Database', 'No'),
(2107, 'APPROVED', 'Database Developer', 'No'),
(2108, 'APPROVED', 'Datastage', 'No'),
(2109, 'APPROVED', 'Data Warehousing', 'No'),
(2110, 'APPROVED', 'DB2', 'No'),
(2111, 'APPROVED', 'DBASE', 'No'),
(2112, 'APPROVED', 'DBMS', 'No'),
(2113, 'APPROVED', 'Dbus', 'No'),
(2114, 'APPROVED', 'DCA', 'No'),
(2115, 'APPROVED', 'Delphi', 'No'),
(2116, 'APPROVED', 'Demantra', 'No'),
(2117, 'APPROVED', 'Developer 2000', 'No'),
(2118, 'APPROVED', 'DHCP', 'No'),
(2119, 'APPROVED', 'Dimensions', 'No'),
(2120, 'APPROVED', 'Disaster Recovery Planning', 'No'),
(2121, 'APPROVED', 'DJANGO', 'No'),
(2122, 'APPROVED', 'DNS', 'No'),
(2123, 'APPROVED', 'Documentum', 'Yes'),
(2124, 'APPROVED', 'DOJO', 'No'),
(2125, 'APPROVED', 'Downstream', 'No'),
(2126, 'APPROVED', 'Dreamweaver', 'No'),
(2127, 'APPROVED', 'Drools Developer', 'No'),
(2128, 'APPROVED', 'Drupal', 'No'),
(2129, 'APPROVED', 'DSP', 'No'),
(2130, 'APPROVED', 'DTP', 'No'),
(2131, 'APPROVED', 'Duck Creek', 'No'),
(2132, 'APPROVED', 'DWDM', 'No'),
(2133, 'APPROVED', 'Dynamics CRM', 'No'),
(2134, 'APPROVED', 'Eclipse', 'No'),
(2135, 'APPROVED', 'EIGRP', 'No'),
(2136, 'APPROVED', 'EJB', 'No'),
(2137, 'APPROVED', 'Embedded C', 'No'),
(2138, 'APPROVED', 'Enovia', 'No'),
(2139, 'APPROVED', 'Entity Framework', 'No'),
(2140, 'APPROVED', 'ERP', 'No'),
(2141, 'APPROVED', 'Ethernet', 'No'),
(2142, 'APPROVED', 'Expeditor', 'No'),
(2143, 'APPROVED', 'ExtJS', 'No'),
(2144, 'APPROVED', 'Fast Ethernet', 'No'),
(2145, 'APPROVED', 'Fatwire', 'No'),
(2146, 'APPROVED', 'File Net', 'No'),
(2147, 'APPROVED', 'Finacle', 'No'),
(2148, 'APPROVED', 'Finagle', 'No'),
(2149, 'APPROVED', 'Firewall', 'No'),
(2150, 'APPROVED', 'Fireworks', 'No'),
(2151, 'APPROVED', 'Flash', 'No'),
(2152, 'APPROVED', 'Flex', 'No'),
(2153, 'APPROVED', 'Flexcube', 'No'),
(2154, 'APPROVED', 'Focus', 'No'),
(2155, 'APPROVED', 'ForTran', 'No'),
(2156, 'APPROVED', 'FoxPro', 'No'),
(2157, 'APPROVED', 'FPGA', 'No'),
(2158, 'APPROVED', 'Free BSD', 'No'),
(2159, 'APPROVED', 'Frontend Developer', 'No'),
(2160, 'APPROVED', 'FTP', 'No'),
(2161, 'APPROVED', 'Fusion Middle Ware', 'No'),
(2162, 'APPROVED', 'Groovy', 'No'),
(2163, 'APPROVED', 'Groovy On Grails', 'No'),
(2164, 'APPROVED', 'GSM', 'No'),
(2165, 'APPROVED', 'GUI Design', 'No'),
(2166, 'APPROVED', 'Hadoop', 'No'),
(2167, 'APPROVED', 'Hbase', 'No'),
(2168, 'APPROVED', 'HDLC', 'No'),
(2169, 'APPROVED', 'Hibernate', 'No'),
(2170, 'APPROVED', 'Hiperv', 'No'),
(2171, 'APPROVED', 'Hitachi', 'No'),
(2172, 'APPROVED', 'HOGN', 'No'),
(2173, 'APPROVED', 'HOP UNIX', 'No'),
(2174, 'APPROVED', 'HSRP', 'No'),
(2175, 'APPROVED', 'HTML-DHTML', 'No'),
(2176, 'APPROVED', 'HTTP', 'No'),
(2177, 'APPROVED', 'Hybris', 'No'),
(2178, 'APPROVED', 'Hyperion', 'No'),
(2179, 'APPROVED', 'IIS', 'No'),
(2180, 'APPROVED', 'IMS', 'No'),
(2181, 'APPROVED', 'IMSDB', 'No'),
(2182, 'APPROVED', 'Informatica', 'No'),
(2183, 'APPROVED', 'InputAccel', 'No'),
(2184, 'APPROVED', 'Installshield', 'No'),
(2185, 'APPROVED', 'Insteon', 'No'),
(2186, 'APPROVED', 'Intershop Enfinity', 'No'),
(2187, 'APPROVED', 'Intrusion Prevention System', 'No'),
(2188, 'APPROVED', 'Intrusion Detection System', 'No'),
(2189, 'APPROVED', 'Ipad / Iphone', 'No'),
(2190, 'APPROVED', 'Iphone', 'Yes'),
(2191, 'APPROVED', 'IPSec', 'No'),
(2192, 'APPROVED', 'IPV', 'No'),
(2193, 'APPROVED', 'IRise', 'No'),
(2194, 'APPROVED', 'Iron Port', 'No'),
(2195, 'APPROVED', 'ISA Server', 'No'),
(2196, 'APPROVED', 'ISDN', 'No'),
(2197, 'APPROVED', 'IT Architecture', 'No'),
(2198, 'APPROVED', 'IT Security', 'No'),
(2199, 'APPROVED', 'ITIL', 'No'),
(2200, 'APPROVED', 'ITSM', 'No'),
(2201, 'APPROVED', 'J D Edwards', 'No'),
(2202, 'APPROVED', 'J2EE', 'No'),
(2203, 'APPROVED', 'J2ME', 'No'),
(2204, 'APPROVED', 'J2SE', 'No'),
(2205, 'APPROVED', 'Java', 'No'),
(2206, 'APPROVED', 'Java Database Connectivity', 'No'),
(2207, 'APPROVED', 'Java EE', 'No'),
(2208, 'APPROVED', 'Java Swing', 'No'),
(2209, 'APPROVED', 'Java Beans', 'No'),
(2210, 'APPROVED', 'Java FX', 'No'),
(2211, 'APPROVED', 'Java Script', 'No'),
(2212, 'APPROVED', 'Jax Rs', 'No'),
(2213, 'APPROVED', 'Jax Ws', 'No'),
(2214, 'APPROVED', 'Jboss', 'No'),
(2215, 'APPROVED', 'JCL', 'No'),
(2216, 'APPROVED', 'JDBC', 'No'),
(2217, 'APPROVED', 'JIRA', 'No'),
(2218, 'APPROVED', 'Joomla', 'No'),
(2219, 'APPROVED', 'JPA', 'No'),
(2220, 'APPROVED', 'Jprofiler', 'No'),
(2221, 'APPROVED', 'Jquery', 'No'),
(2222, 'APPROVED', 'JSF', 'No'),
(2223, 'APPROVED', 'Json', 'No'),
(2224, 'APPROVED', 'JSP', 'No'),
(2225, 'APPROVED', 'Juniper', 'No'),
(2226, 'APPROVED', 'Kabira Action Language', 'No'),
(2227, 'APPROVED', 'Lab VIEW', 'No'),
(2228, 'APPROVED', 'LAMP', 'No'),
(2229, 'APPROVED', 'LAN', 'No'),
(2230, 'APPROVED', 'Lawson', 'No'),
(2231, 'APPROVED', 'LDAP', 'No'),
(2232, 'APPROVED', 'Life 400', 'No'),
(2233, 'APPROVED', 'Liferay', 'No'),
(2234, 'APPROVED', 'LINQ', 'No'),
(2235, 'APPROVED', 'Adobe Pagemaker', 'No'),
(2236, 'APPROVED', 'LIS', 'No'),
(2237, 'APPROVED', 'Loadrunner', 'Yes'),
(2238, 'APPROVED', 'Loan IQ', 'No'),
(2239, 'APPROVED', 'Lotus Domino Developer', 'No'),
(2240, 'APPROVED', 'Lotus Notes', 'No'),
(2241, 'APPROVED', 'LTE / WiMAX', 'No'),
(2242, 'APPROVED', 'Mac OS', 'No'),
(2243, 'APPROVED', 'Mainframes', 'No'),
(2244, 'APPROVED', 'Manual Testing', 'No'),
(2245, 'APPROVED', 'Manufacturing Execution System', 'No'),
(2246, 'APPROVED', 'MATLAB', 'No'),
(2247, 'APPROVED', 'Maven', 'No'),
(2248, 'APPROVED', 'Maximo', 'No'),
(2249, 'APPROVED', 'Maya', 'No'),
(2250, 'APPROVED', 'MCP', 'No'),
(2251, 'APPROVED', 'MCSA', 'No'),
(2252, 'APPROVED', 'MCSE', 'No'),
(2253, 'APPROVED', 'Message Broker', 'No'),
(2254, 'APPROVED', 'MFC', 'No'),
(2255, 'APPROVED', 'Microsoft Access', 'No'),
(2256, 'APPROVED', 'Microsoft Excel', 'No'),
(2257, 'APPROVED', 'Microsoft Exchange', 'No'),
(2258, 'APPROVED', 'Microsoft Hyper V', 'No'),
(2259, 'APPROVED', 'Microsoft Identify Integration', 'No'),
(2260, 'APPROVED', 'Microsoft NT Server', 'No'),
(2261, 'APPROVED', 'Microsoft Office', 'No'),
(2262, 'APPROVED', 'Microsoft Outlook', 'No'),
(2263, 'APPROVED', 'Microsoft Virtual Server', 'No'),
(2264, 'APPROVED', 'Microsoft Deployment Toolkit', 'No'),
(2265, 'APPROVED', 'Micro Station', 'No'),
(2266, 'APPROVED', 'Mongo DB', 'No'),
(2267, 'APPROVED', 'MPLS', 'No'),
(2268, 'APPROVED', 'MQ', 'No'),
(2269, 'APPROVED', 'MQ Admin', 'No'),
(2270, 'APPROVED', 'MS Access', 'No'),
(2271, 'APPROVED', 'MS Excel', 'No'),
(2272, 'APPROVED', 'MS Powerpoint', 'No'),
(2273, 'APPROVED', 'MS Project', 'No'),
(2274, 'APPROVED', 'MS SQL', 'No'),
(2275, 'APPROVED', 'MS Visio', 'No'),
(2276, 'APPROVED', 'Adobe Photoshop', 'No'),
(2277, 'APPROVED', 'MSCIT', 'No'),
(2278, 'APPROVED', 'Multimedia', 'No'),
(2279, 'APPROVED', 'Multithreading', 'No'),
(2280, 'APPROVED', 'MVC', 'No'),
(2281, 'APPROVED', 'MVS', 'No'),
(2282, 'APPROVED', 'MVS Assembler', 'No'),
(2283, 'APPROVED', 'NAS / Networl Attached Storage', 'No'),
(2284, 'APPROVED', 'Natural Adabas', 'No'),
(2285, 'APPROVED', 'Nebu', 'No'),
(2286, 'APPROVED', 'Netcool', 'No'),
(2287, 'APPROVED', 'Netsol', 'No'),
(2288, 'APPROVED', 'Network Security', 'No'),
(2289, 'APPROVED', 'Networking', 'No'),
(2290, 'APPROVED', 'Nortel', 'No'),
(2291, 'APPROVED', 'NoSQL', 'No'),
(2292, 'APPROVED', 'Novell', 'No'),
(2293, 'APPROVED', 'Objective C', 'No'),
(2294, 'APPROVED', 'Omniture', 'No'),
(2295, 'APPROVED', 'OOPS', 'No'),
(2296, 'APPROVED', 'Operating System', 'No'),
(2297, 'APPROVED', 'Optimax', 'No'),
(2298, 'APPROVED', 'Oracle', 'No'),
(2299, 'APPROVED', 'Oracle Apps', 'No'),
(2300, 'APPROVED', 'Oracle BPM', 'No'),
(2301, 'APPROVED', 'Oracle Database', 'No'),
(2302, 'APPROVED', 'Oracle Fusion Middleware', 'No'),
(2303, 'APPROVED', 'Oracel SOA', 'No'),
(2304, 'APPROVED', 'Oracle Warehouse Builder', 'No'),
(2305, 'APPROVED', 'Orbeon', 'No'),
(2306, 'APPROVED', 'ORCAD', 'No'),
(2307, 'APPROVED', 'Page Maker', 'No'),
(2308, 'APPROVED', 'PASCAL', 'No'),
(2309, 'APPROVED', 'PDH', 'No'),
(2310, 'APPROVED', 'PEGA PRPC', 'No'),
(2311, 'APPROVED', 'Peoplesoft', 'No'),
(2312, 'APPROVED', 'Perl', 'No'),
(2313, 'APPROVED', 'PHP', 'No'),
(2314, 'APPROVED', 'Picanol Gammex', 'No'),
(2315, 'APPROVED', 'PIM', 'No'),
(2316, 'APPROVED', 'PL / SQL', 'No'),
(2317, 'APPROVED', 'PLC Programming', 'No'),
(2318, 'APPROVED', 'Polyurea Sprayer', 'No'),
(2319, 'APPROVED', 'PostgreSQL', 'No'),
(2320, 'APPROVED', 'Power Builder', 'No'),
(2321, 'APPROVED', 'Power Play', 'No'),
(2322, 'APPROVED', 'Predictive Analytics And Modeling', 'No'),
(2323, 'APPROVED', 'Primavera', 'No'),
(2324, 'APPROVED', 'Pro C', 'No'),
(2325, 'APPROVED', 'Pro E', 'No'),
(2326, 'APPROVED', 'Programming And Application Development', 'No'),
(2327, 'APPROVED', 'Puppet', 'No'),
(2328, 'APPROVED', 'PVST', 'No'),
(2329, 'APPROVED', 'Python', 'No'),
(2330, 'APPROVED', 'QTP', 'No'),
(2331, 'APPROVED', 'Quantum', 'No'),
(2332, 'APPROVED', 'QuarkXpress', 'No'),
(2333, 'APPROVED', 'Radius', 'No'),
(2334, 'APPROVED', 'Rapier Looms', 'No'),
(2335, 'APPROVED', 'Rational Tools', 'No'),
(2336, 'APPROVED', 'RDBMS', 'No'),
(2337, 'APPROVED', 'Red Hat Enterprise Linux', 'No'),
(2338, 'APPROVED', 'Red Hat / Linux', 'No'),
(2339, 'APPROVED', 'Remedy', 'No'),
(2340, 'APPROVED', 'Remedy ITSM', 'No'),
(2341, 'APPROVED', 'Remoting', 'No'),
(2342, 'APPROVED', 'REST', 'No'),
(2343, 'APPROVED', 'RESTful', 'No'),
(2344, 'APPROVED', 'REXX', 'No'),
(2345, 'APPROVED', 'RFID Radio Frequesncy Identification', 'No'),
(2346, 'APPROVED', 'RMI', 'No'),
(2347, 'APPROVED', 'Routing', 'No'),
(2348, 'APPROVED', 'RPG', 'No'),
(2349, 'APPROVED', 'RPGILE', 'No'),
(2350, 'APPROVED', 'RTOS', 'No'),
(2351, 'APPROVED', 'RTSP', 'No'),
(2352, 'APPROVED', 'Ruby On Rails', 'No'),
(2353, 'APPROVED', 'SAAS', 'No'),
(2354, 'APPROVED', 'Salesforce', 'No'),
(2355, 'APPROVED', 'SAN / Storage Area Networks', 'No'),
(2356, 'APPROVED', 'SAP', 'No'),
(2357, 'APPROVED', 'SAP ABAP', 'No'),
(2358, 'APPROVED', 'SAP AFS', 'No'),
(2359, 'APPROVED', 'SAP APO', 'No'),
(2360, 'APPROVED', 'SAP Banking', 'No'),
(2361, 'APPROVED', 'SAP Basis', 'No'),
(2362, 'APPROVED', 'SAP BODI Business Objects Data Integrator', 'No'),
(2363, 'APPROVED', 'SAP BPC', 'No'),
(2364, 'APPROVED', 'SAP BSP', 'No'),
(2365, 'APPROVED', 'SAP Business One', 'No'),
(2366, 'APPROVED', 'SAP BW / BI', 'No'),
(2367, 'APPROVED', 'SAP CFM', 'No');
INSERT INTO `key_skills` (`id`, `status`, `key_skill_name`, `is_deleted`) VALUES
(2368, 'APPROVED', 'SAP CO', 'No'),
(2369, 'APPROVED', 'SAP Controlling', 'No'),
(2370, 'APPROVED', 'SAP CRM', 'No'),
(2371, 'APPROVED', 'SAP Crystal Reports', 'No'),
(2372, 'APPROVED', 'SAP CS', 'No'),
(2373, 'APPROVED', 'SAP EP', 'No'),
(2374, 'APPROVED', 'SAP HR', 'No'),
(2375, 'APPROVED', 'SAP IM', 'No'),
(2376, 'APPROVED', 'SAP Is Gas And Oil', 'Yes'),
(2377, 'APPROVED', 'SAP IS Retail', 'No'),
(2378, 'APPROVED', 'SAP MDM', 'No'),
(2379, 'APPROVED', 'SAP MI', 'No'),
(2380, 'APPROVED', 'SAP MM', 'No'),
(2381, 'APPROVED', 'SAP Mobile', 'No'),
(2382, 'APPROVED', 'SAP MRO', 'No'),
(2383, 'APPROVED', 'SAP Netweaver', 'No'),
(2384, 'APPROVED', 'SAP Netweaver Applications Sever', 'No'),
(2385, 'APPROVED', 'SAP Netweaver Visual Composer', 'No'),
(2386, 'APPROVED', 'SAP PLM', 'No'),
(2387, 'APPROVED', 'SAP PM', 'No'),
(2388, 'APPROVED', 'SAP PP', 'No'),
(2389, 'APPROVED', 'SAP PS', 'No'),
(2390, 'APPROVED', 'SAP PSCD', 'No'),
(2391, 'APPROVED', 'SAP PY Payroll', 'No'),
(2392, 'APPROVED', 'SAP QM', 'No'),
(2393, 'APPROVED', 'SAP RE / Auto ID', 'No'),
(2394, 'APPROVED', 'SAP SCM', 'No'),
(2395, 'APPROVED', 'SAP SD', 'No'),
(2396, 'APPROVED', 'SAP SD GTS', 'No'),
(2397, 'APPROVED', 'SAP Security', 'No'),
(2398, 'APPROVED', 'SAP SEM', 'No'),
(2399, 'APPROVED', 'SAP Service Asset Mgt', 'No'),
(2400, 'APPROVED', 'SAP SM', 'No'),
(2401, 'APPROVED', 'SAP Smart Forms', 'No'),
(2402, 'APPROVED', 'PL / 1', 'No'),
(2403, 'APPROVED', 'KBE Knowledge Based Engineering', 'No'),
(2404, 'APPROVED', 'WCF', 'No'),
(2405, 'APPROVED', 'Selection', 'No'),
(2406, 'APPROVED', 'Liability Audit', 'No'),
(2407, 'APPROVED', 'Internal Auditing', 'No'),
(2408, 'APPROVED', 'SEO', 'No'),
(2409, 'APPROVED', 'Sql Server', 'No'),
(2410, 'APPROVED', 'JBoss Seam', 'No'),
(2411, 'APPROVED', 'Log4j', 'No'),
(2412, 'APPROVED', 'Seam', 'No'),
(2413, 'APPROVED', 'BREW', 'No'),
(2414, 'APPROVED', 'MIDP', 'No'),
(2415, 'APPROVED', 'CLDC', 'No'),
(2416, 'APPROVED', 'Symbian C++', 'No'),
(2417, 'APPROVED', 'JavaCard', 'No'),
(2418, 'APPROVED', 'Symbian', 'No'),
(2419, 'APPROVED', 'JSE', 'No'),
(2420, 'APPROVED', 'JavaSE', 'No'),
(2421, 'APPROVED', 'Jini', 'No'),
(2422, 'APPROVED', 'S60', 'No'),
(2423, 'APPROVED', 'RIM', 'No'),
(2424, 'APPROVED', 'OpenGL ES', 'No'),
(2425, 'APPROVED', 'JavaFX', 'No'),
(2426, 'APPROVED', 'Flash Lite', 'No'),
(2427, 'APPROVED', 'WML', 'No'),
(2428, 'APPROVED', 'Blackberry', 'No'),
(2429, 'APPROVED', 'UIQ', 'No'),
(2430, 'APPROVED', 'SyncML', 'No'),
(2431, 'APPROVED', 'Visual Basic', 'No'),
(2432, 'APPROVED', 'ADO', 'No'),
(2433, 'APPROVED', 'Visual Interdev', 'No'),
(2434, 'APPROVED', 'ActiveX', 'No'),
(2435, 'APPROVED', 'VBScript', 'No'),
(2436, 'APPROVED', 'DCOM', 'No'),
(2437, 'APPROVED', 'Visual C++', 'No'),
(2438, 'APPROVED', 'ODBC', 'No'),
(2439, 'APPROVED', 'RDO', 'No'),
(2440, 'APPROVED', 'Qbasic', 'No'),
(2441, 'APPROVED', 'COM', 'No'),
(2442, 'APPROVED', 'J++', 'No'),
(2443, 'APPROVED', 'VSS', 'No'),
(2444, 'APPROVED', 'Turbo Pascal', 'No'),
(2445, 'APPROVED', 'Visual C#', 'Yes'),
(2446, 'APPROVED', 'AWT', 'No'),
(2447, 'APPROVED', 'JavaMail', 'No'),
(2448, 'APPROVED', 'JDOM', 'No'),
(2449, 'APPROVED', 'JMock', 'No'),
(2450, 'APPROVED', 'Java2D', 'No'),
(2451, 'APPROVED', 'SWT', 'No'),
(2452, 'APPROVED', 'XStream', 'No'),
(2453, 'APPROVED', 'Apache Commons', 'No'),
(2454, 'APPROVED', 'XDoclet', 'No'),
(2455, 'APPROVED', 'Db4o', 'No'),
(2456, 'APPROVED', 'Derby', 'No'),
(2457, 'APPROVED', 'JFace', 'No'),
(2458, 'APPROVED', 'JNI', 'No'),
(2459, 'APPROVED', 'RichFaces', 'No'),
(2460, 'APPROVED', 'Unix', 'No'),
(2461, 'APPROVED', 'VAX / VMS', 'No'),
(2462, 'APPROVED', 'Xenix', 'No'),
(2463, 'APPROVED', 'VMS', 'No'),
(2464, 'APPROVED', 'Ksh', 'No'),
(2465, 'APPROVED', 'DOS', 'No'),
(2466, 'APPROVED', 'MS / DOS', 'No'),
(2467, 'APPROVED', 'Shell Scripting', 'No'),
(2468, 'APPROVED', 'PVCS', 'No'),
(2469, 'APPROVED', 'Informix', 'No'),
(2470, 'APPROVED', 'Tuxedo', 'No'),
(2471, 'APPROVED', 'Motif', 'No'),
(2472, 'APPROVED', 'Ingres', 'No'),
(2473, 'APPROVED', 'Sybase', 'No'),
(2474, 'APPROVED', 'Abinitio', 'No'),
(2475, 'APPROVED', 'SunOS', 'No'),
(2476, 'APPROVED', 'Struts', 'No'),
(2477, 'APPROVED', 'Spring', 'No'),
(2478, 'APPROVED', 'Weblogic', 'No'),
(2479, 'APPROVED', 'JMS', 'No'),
(2480, 'APPROVED', 'JUnit', 'No'),
(2481, 'APPROVED', 'Websphere', 'No'),
(2482, 'APPROVED', 'IBatis', 'No'),
(2483, 'APPROVED', 'Ant', 'No'),
(2484, 'APPROVED', 'Unix / Linux', 'No'),
(2485, 'APPROVED', 'Siebel', 'No'),
(2486, 'APPROVED', 'Web Methods', 'No'),
(2487, 'APPROVED', 'Quality Assurance / QA', 'No'),
(2488, 'APPROVED', 'Solaris', 'No'),
(2489, 'APPROVED', 'MS Sql Server', 'No'),
(2490, 'APPROVED', 'NetWeaver', 'No'),
(2491, 'APPROVED', 'Software Testing', 'No'),
(2492, 'APPROVED', 'Sap Practice', 'No'),
(2493, 'APPROVED', 'Adobe Flash Player', 'No'),
(2494, 'APPROVED', 'Apache Web Server', 'No'),
(2495, 'APPROVED', 'CAD CAM', 'Yes'),
(2496, 'APPROVED', 'Data Structures', 'No'),
(2497, 'APPROVED', 'Dhtml', 'No'),
(2498, 'APPROVED', 'HTML', 'No'),
(2499, 'APPROVED', 'IT Support', 'No'),
(2500, 'APPROVED', 'Java Trainee', 'No'),
(2501, 'APPROVED', 'Mac', 'No'),
(2502, 'APPROVED', 'Mobile Application', 'No'),
(2503, 'APPROVED', 'OS Programming', 'No'),
(2504, 'APPROVED', 'SharePoint', 'No'),
(2505, 'APPROVED', 'Silverlight', 'No'),
(2506, 'APPROVED', 'Simulation Programming', 'No'),
(2507, 'APPROVED', 'Agile PLM', 'No'),
(2508, 'APPROVED', 'VB.NET', 'No'),
(2509, 'APPROVED', 'Visual Foxpro', 'No'),
(2510, 'APPROVED', 'Web Designing', 'No'),
(2511, 'APPROVED', 'Web Developer', 'No'),
(2512, 'APPROVED', 'Web Server', 'No'),
(2513, 'APPROVED', 'CDMA', 'No'),
(2514, 'APPROVED', 'VLSI', 'No'),
(2515, 'APPROVED', 'VOIP', 'No'),
(2516, 'APPROVED', 'VPN J', 'No'),
(2517, 'APPROVED', 'VSAT', 'No'),
(2518, 'APPROVED', 'VSS Clearcase', 'No'),
(2519, 'APPROVED', 'WAN', 'No'),
(2520, 'APPROVED', 'WAP', 'No'),
(2521, 'APPROVED', 'CCNA', 'No'),
(2522, 'APPROVED', 'Computer Networking', 'No'),
(2523, 'APPROVED', 'Computer Hardware', 'No'),
(2524, 'APPROVED', 'Desktop Support Technician', 'No'),
(2525, 'APPROVED', 'Fibre Optics', 'No'),
(2526, 'APPROVED', 'Embeded Technology', 'No'),
(2527, 'APPROVED', 'A Level', 'No'),
(2528, 'APPROVED', 'O Level', 'No'),
(2529, 'APPROVED', 'CSC ECE', 'No'),
(2530, 'APPROVED', 'Web / HTTP', 'No'),
(2531, 'APPROVED', 'SAP FICO', 'No'),
(2532, 'APPROVED', 'SAS', 'No'),
(2533, 'APPROVED', 'Tibco', 'No'),
(2534, 'APPROVED', 'Photoshop', 'No'),
(2535, 'APPROVED', 'ABAP', 'No'),
(2536, 'APPROVED', 'Internet Marketing', 'No'),
(2537, 'APPROVED', 'Digital Marketing', 'No'),
(2538, 'APPROVED', 'Editing', 'No'),
(2539, 'APPROVED', 'PPC', 'No'),
(2540, 'APPROVED', 'Teradata', 'No'),
(2541, 'APPROVED', 'Excel', 'No'),
(2542, 'APPROVED', 'SAP BW', 'No'),
(2543, 'APPROVED', 'FACT', 'No'),
(2544, 'APPROVED', 'UniGraphics', 'No'),
(2545, 'APPROVED', 'SCADA', 'No'),
(2546, 'APPROVED', 'Vision Plus', 'No'),
(2547, 'APPROVED', 'AIX', 'No'),
(2548, 'APPROVED', 'Programming', 'No'),
(2549, 'APPROVED', 'RedHat', 'Yes'),
(2550, 'APPROVED', 'SAP SRM', 'No'),
(2551, 'APPROVED', 'TPF', 'No'),
(2552, 'APPROVED', 'SPSS', 'No'),
(2553, 'APPROVED', 'Sharepoint MOSS', 'No'),
(2554, 'APPROVED', 'TLM', 'No'),
(2555, 'APPROVED', 'Murex', 'No'),
(2556, 'APPROVED', 'SAP XI', 'No'),
(2557, 'APPROVED', 'Progress 4GL', 'No'),
(2558, 'APPROVED', 'Distribution', 'No'),
(2559, 'APPROVED', 'Switching', 'No'),
(2560, 'APPROVED', 'Android Development', 'No'),
(2561, 'APPROVED', 'Savvion', 'No'),
(2562, 'APPROVED', 'Load Runner', 'No'),
(2563, 'APPROVED', 'Affiliate Marketing', 'No'),
(2564, 'APPROVED', 'HP UNIX', 'No'),
(2565, 'APPROVED', 'SAP IS Utilities', 'No'),
(2566, 'APPROVED', 'Website Development', 'No'),
(2567, 'APPROVED', 'Auto LISP', 'No'),
(2568, 'APPROVED', 'Bluetooth', 'No'),
(2569, 'APPROVED', 'COM/COM+/DCOM', 'No'),
(2570, 'APPROVED', 'C Sharp', 'No'),
(2571, 'APPROVED', 'Clipper', 'No'),
(2572, 'APPROVED', 'Humming Bird', 'No'),
(2573, 'APPROVED', 'Ideas', 'No'),
(2574, 'APPROVED', 'Image Ready', 'No'),
(2575, 'APPROVED', 'Impromptu', 'No'),
(2576, 'APPROVED', 'Database Administration', 'No'),
(2577, 'APPROVED', 'Developer / D2K', 'No'),
(2578, 'APPROVED', 'Finone', 'No'),
(2579, 'APPROVED', 'GLOSS', 'No'),
(2580, 'APPROVED', 'MOSS', 'No'),
(2581, 'APPROVED', 'Kickboxing', 'No'),
(2582, 'APPROVED', 'Microcontrollers', 'No'),
(2583, 'APPROVED', 'Microprocessors', 'No'),
(2584, 'APPROVED', 'Office Operations', 'No'),
(2585, 'APPROVED', 'SAP WMS', 'No'),
(2586, 'APPROVED', 'Sharepoint Server', 'No'),
(2587, 'APPROVED', 'SMARTY', 'No'),
(2588, 'APPROVED', 'SMTP', 'No'),
(2589, 'APPROVED', 'SoundForge', 'No'),
(2590, 'APPROVED', 'STAAD', 'Yes'),
(2591, 'APPROVED', 'SAP Bl', 'Yes'),
(2592, 'APPROVED', 'SAP COPA', 'No'),
(2593, 'APPROVED', 'SAP Idocs', 'No'),
(2594, 'APPROVED', 'SAP IS-GAS/OIL', 'No'),
(2595, 'APPROVED', 'T SQL', 'No'),
(2596, 'APPROVED', 'TELNET', 'No'),
(2597, 'APPROVED', 'TOAD', 'No'),
(2598, 'APPROVED', 'UML', 'No'),
(2599, 'APPROVED', 'Upstream', 'No'),
(2600, 'APPROVED', 'Vignette', 'No'),
(2601, 'APPROVED', 'VPN', 'No'),
(2602, 'APPROVED', 'Winform', 'No'),
(2603, 'APPROVED', 'Winrunner', 'No'),
(2604, 'APPROVED', 'XHTML', 'No'),
(2605, 'APPROVED', 'Yantra', 'No'),
(2606, 'APPROVED', 'Designing', 'No'),
(2607, 'APPROVED', 'SMO', 'No'),
(2608, 'APPROVED', 'TCL/TK', 'No'),
(2609, 'APPROVED', 'OS/2', 'No'),
(2610, 'APPROVED', 'Web Development', 'No'),
(2611, 'APPROVED', 'PL SQL', 'Yes'),
(2612, 'APPROVED', 'PL 1', 'Yes'),
(2613, 'APPROVED', 'AJAX', 'No'),
(2614, 'APPROVED', 'Bootstrap', 'No'),
(2615, 'APPROVED', 'Application Support', 'No'),
(2616, 'APPROVED', 'It Services', 'No'),
(2617, 'APPROVED', 'Application Support Engineer', 'No'),
(2618, 'APPROVED', 'Data Recovery', 'No'),
(2619, 'APPROVED', 'Linux', 'No'),
(2620, 'APPROVED', 'Sql', 'No'),
(2621, 'APPROVED', 'Network', 'No'),
(2622, 'APPROVED', 'Os', 'No'),
(2623, 'APPROVED', '.Net', 'No'),
(2624, 'APPROVED', 'Adobe CQ5', 'No'),
(2625, 'APPROVED', '.Net Developer', 'No'),
(2626, 'APPROVED', 'Windows Administration', 'No'),
(2627, 'APPROVED', 'Asp Dot Net', 'No'),
(2628, 'APPROVED', 'Technical Design', 'No'),
(2629, 'APPROVED', 'Sap Bo', 'No'),
(2630, 'APPROVED', 'Troubleshooting', 'No'),
(2631, 'APPROVED', 'Backup And Recovery', 'No'),
(2632, 'APPROVED', 'Sap Security Professional', 'No'),
(2633, 'APPROVED', 'Developer', 'No'),
(2634, 'APPROVED', 'Software Installation', 'No'),
(2635, 'APPROVED', 'Networking Skills', 'No'),
(2636, 'APPROVED', 'Support Engineer', 'No'),
(2637, 'APPROVED', 'Adobe Illustrator', 'No'),
(2638, 'APPROVED', 'Cms', 'No'),
(2639, 'APPROVED', 'Datastage Odi', 'No'),
(2640, 'APPROVED', 'Wpf', 'No'),
(2641, 'APPROVED', 'Technical Support', 'No'),
(2642, 'APPROVED', 'System Administrator', 'No'),
(2643, 'APPROVED', 'System Engineer', 'No'),
(2644, 'APPROVED', 'Server Engineer', 'No'),
(2645, 'APPROVED', 'Windows Administrator', 'No'),
(2646, 'UNAPPROVED', 'CNC machine operator', 'No'),
(2647, 'APPROVED', 'Piping Fitter', 'No'),
(2648, 'APPROVED', 'Dealer Network', 'No'),
(2649, 'APPROVED', 'Dealer Network', 'No'),
(2650, 'UNAPPROVED', 'load testing', 'No'),
(2651, 'UNAPPROVED', 'CA', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `skill_language` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `status`, `skill_language`, `is_deleted`) VALUES
(1, 'APPROVED', 'Gujarati', 'Yes'),
(2, 'APPROVED', 'English', 'No'),
(3, 'APPROVED', 'Hindi', 'No'),
(4, 'APPROVED', 'German - deutsch', 'No'),
(5, 'APPROVED', 'Russian', 'No'),
(6, 'APPROVED', 'Polish', 'No'),
(7, 'APPROVED', 'Ukrainian', 'No'),
(8, 'APPROVED', 'Spanish - Español', 'No'),
(9, 'APPROVED', 'Portuguese', 'No'),
(10, 'APPROVED', 'French - français', 'No'),
(11, 'APPROVED', 'Italian', 'No'),
(12, 'APPROVED', 'Romanian', 'No'),
(13, 'APPROVED', 'Greek', 'No'),
(14, 'APPROVED', 'Hungarian', 'No'),
(15, 'APPROVED', 'Chinese', 'No'),
(16, 'APPROVED', 'Japanese', 'No'),
(17, 'APPROVED', 'Punjabi', 'Yes'),
(18, 'APPROVED', 'Tamil', 'Yes'),
(19, 'APPROVED', 'Telugu', 'Yes'),
(20, 'APPROVED', 'Kannada', 'Yes'),
(21, 'APPROVED', 'Malayalam', 'Yes'),
(22, 'APPROVED', 'Marathi', 'Yes'),
(23, 'APPROVED', 'Konkani', 'Yes'),
(24, 'APPROVED', 'Bengali', 'Yes'),
(25, 'APPROVED', 'Sindhi', 'Yes'),
(26, 'APPROVED', 'Urdu', 'Yes'),
(27, 'APPROVED', 'Arabic', 'No'),
(28, 'APPROVED', 'Sanskrit', 'Yes'),
(29, 'APPROVED', 'Persian', 'No'),
(30, 'APPROVED', 'N Demo Language', 'Yes'),
(31, 'APPROVED', 'Maltese', 'No'),
(32, 'UNAPPROVED', 'test', 'Yes'),
(33, 'UNAPPROVED', 'Marathi', 'Yes'),
(34, 'UNAPPROVED', 'Marathi', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `martial_status`
--

CREATE TABLE `martial_status` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `martial_status`
--

INSERT INTO `martial_status` (`id`, `status`, `marital_status`, `is_deleted`) VALUES
(1, 'APPROVED', 'Unmarried', 'No'),
(2, 'APPROVED', 'Widowedd', 'Yes'),
(3, 'UNAPPROVED', 'Married', 'No'),
(4, 'APPROVED', 'Divorced', 'No'),
(5, 'APPROVED', 'Separated', 'No'),
(6, 'APPROVED', 'widow', 'No'),
(7, 'APPROVED', 'Single', 'Yes'),
(8, 'APPROVED', 'Single', 'Yes'),
(9, 'UNAPPROVED', 'single', 'Yes');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`, `is_deleted`) VALUES
(7, 'Invalid', 'No'),
(8, 'test@gmai.com', 'No'),
(9, 'testst@gmai.com', 'No'),
(10, 'tsetts@gmail.com', 'No'),
(11, 'test@gmail.com', 'No'),
(12, 'dfdfdfd@gmai.com', 'No'),
(13, 'tests@gmail.com', 'No'),
(14, 'dsdsd@gmail.com', 'No'),
(15, 'fdddfd@gmail.com', 'No'),
(16, 'test@gfdf@gamo.com', 'No'),
(17, 'mob10@yopmail.com', 'No'),
(18, 'mob11@yopmail.com', 'No'),
(19, 'mail0@yopmail.com', 'No'),
(20, 'mail11@yopmail.com', 'No'),
(21, 'chet420@yopmail.com', 'No'),
(22, 'chet420@yopm2ail.com', 'No'),
(23, 'fdfdfd@gmai.com', 'No'),
(24, 'fdfdddfd@gmai.com', 'No'),
(25, 'teste@gmail.com', 'No'),
(26, 'teste@gmail.com2', 'No'),
(27, 'mob101@yopmail.com', 'No'),
(28, 'mtr101@yopmail.com', 'No'),
(29, 'chetan@angel-portal.com', 'No'),
(30, 'test1@gmail.com', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `notice_periods`
--

CREATE TABLE `notice_periods` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED','','') NOT NULL DEFAULT 'UNAPPROVED',
  `notice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notice_periods`
--

INSERT INTO `notice_periods` (`id`, `status`, `notice`, `is_deleted`) VALUES
(1, 'APPROVED', 'Immediate', 'No'),
(2, 'APPROVED', '15 Days +', 'No'),
(3, 'APPROVED', '30 Days +', 'No'),
(4, 'APPROVED', '45 Days +', 'No'),
(5, 'APPROVED', '60 Days+', 'No'),
(6, 'APPROVED', '90+', 'Yes'),
(7, 'APPROVED', '90 Days+', 'Yes'),
(8, 'APPROVED', '90 Days+', 'Yes');

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
-- Table structure for table `personal_titles`
--

CREATE TABLE `personal_titles` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `personal_titles` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personal_titles`
--

INSERT INTO `personal_titles` (`id`, `status`, `personal_titles`, `is_deleted`) VALUES
(1, 'APPROVED', 'Mr.', 'No'),
(2, 'APPROVED', 'Mrs.', 'No'),
(3, 'APPROVED', 'Ms.', 'No'),
(4, 'APPROVED', 'Ma\'am', 'No'),
(5, 'APPROVED', 'Dr.', 'No'),
(6, 'APPROVED', 'Prof.', 'No'),
(7, 'APPROVED', 'Er.', 'No'),
(8, 'APPROVED', 'a', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `qualification_level_id` int(15) NOT NULL COMMENT 'jobseeker_qualification_level table field id',
  `educational_qualification` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `status`, `qualification_level_id`, `educational_qualification`, `is_deleted`) VALUES
(1, 'APPROVED', 1, 'Undergraduate', 'Yes'),
(2, 'APPROVED', 1, 'B.A', 'No'),
(3, 'APPROVED', 1, 'B.Arch', 'No'),
(4, 'APPROVED', 1, 'B.Des.', 'No'),
(5, 'APPROVED', 1, 'B.El.Ed', 'No'),
(6, 'APPROVED', 1, 'B.P.Ed', 'No'),
(7, 'APPROVED', 1, 'B.U.M.S', 'No'),
(8, 'APPROVED', 1, 'BAMS', 'No'),
(9, 'APPROVED', 1, 'BCA', 'No'),
(10, 'APPROVED', 1, 'B.B.A/ B.M.S', 'No'),
(11, 'APPROVED', 1, 'B.Com', 'No'),
(12, 'APPROVED', 1, 'B.Ed', 'No'),
(13, 'APPROVED', 1, 'BDS', 'No'),
(14, 'APPROVED', 1, 'BFA', 'No'),
(15, 'APPROVED', 1, 'BHM', 'No'),
(16, 'APPROVED', 1, 'B.Pharma', 'No'),
(17, 'APPROVED', 1, 'B.Sc', 'No'),
(18, 'APPROVED', 1, 'B.Tech/B.E.', 'No'),
(19, 'APPROVED', 1, 'BHMS', 'No'),
(20, 'APPROVED', 1, 'LLB', 'No'),
(21, 'APPROVED', 1, 'MBBS', 'No'),
(22, 'APPROVED', 1, 'Diploma', 'No'),
(23, 'APPROVED', 1, 'BVSC', 'No'),
(24, 'APPROVED', 3, 'MPHIL', 'No'),
(25, 'APPROVED', 3, 'Ph.D', 'No'),
(26, 'APPROVED', 2, 'CA', 'No'),
(27, 'APPROVED', 2, 'CS', 'No'),
(28, 'APPROVED', 2, 'DM', 'No'),
(29, 'APPROVED', 2, 'ICWA (CMA)', 'No'),
(30, 'APPROVED', 2, 'Integrated PG', 'No'),
(31, 'APPROVED', 2, 'LLM', 'No'),
(32, 'APPROVED', 2, 'M.A', 'No'),
(33, 'APPROVED', 2, 'M.Arch', 'No'),
(34, 'APPROVED', 2, 'M.Ch', 'No'),
(35, 'APPROVED', 2, 'M.Com', 'No'),
(36, 'APPROVED', 2, 'M.Des.', 'No'),
(37, 'APPROVED', 2, 'M.Ed', 'No'),
(38, 'APPROVED', 2, 'M.Pharma', 'No'),
(39, 'APPROVED', 2, 'MDS', 'No'),
(40, 'APPROVED', 2, 'MFA', 'No'),
(41, 'APPROVED', 2, 'MS/M.Sc(Science)', 'No'),
(42, 'APPROVED', 2, 'M.Tech', 'No'),
(43, 'APPROVED', 2, 'MBA/PGDM', 'No'),
(44, 'APPROVED', 2, 'MCA', 'No'),
(45, 'APPROVED', 2, 'Medical-MS/MD', 'No'),
(46, 'APPROVED', 2, 'PG Diploma', 'No'),
(47, 'APPROVED', 2, 'MVSC', 'No'),
(48, 'APPROVED', 2, 'MCM', 'No'),
(49, 'APPROVED', 7, 'N Demo', 'Yes'),
(50, 'APPROVED', 3, 'Any Graduate', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `salary_ranges`
--

CREATE TABLE `salary_ranges` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_ranges`
--

INSERT INTO `salary_ranges` (`id`, `status`, `salary_range`, `is_deleted`) VALUES
(1, 'APPROVED', '€50 - €100', 'No'),
(2, 'APPROVED', '€100 - €200', 'No'),
(3, 'APPROVED', '€200 - €500', 'No'),
(4, 'APPROVED', '€500 - €1500', 'No'),
(5, 'APPROVED', '€1500 - €2500', 'No'),
(6, 'APPROVED', '€2500 - €5000', 'No'),
(7, 'APPROVED', '€5000 Above', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_types`
--

CREATE TABLE `shift_types` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shift_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shift_types`
--

INSERT INTO `shift_types` (`id`, `status`, `shift_type`, `is_deleted`) VALUES
(1, 'APPROVED', 'Day', 'No'),
(2, 'APPROVED', 'Night', 'No'),
(3, 'APPROVED', 'Flexible', 'No'),
(4, 'APPROVED', 'N Demo Job Shift Type', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `site_configs`
--

CREATE TABLE `site_configs` (
  `id` enum('1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `web_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `web_frienly_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `upload_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contact_no` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `website_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `website_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `website_keywords` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `upload_favicon` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `google_analytics_code` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `footer_text` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `from_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `job_prefix` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `linkedin_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `google_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `colour_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `default_currency` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `full_address` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `service_tax` double DEFAULT NULL,
  `map_address` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `map_tooltip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes- Deleted Data, No - Not Deleted data',
  `sms_api` text DEFAULT NULL,
  `sms_api_status` enum('APPROVED','UNAPPROVED') NOT NULL DEFAULT 'APPROVED',
  `current_date_crone` date DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `web_appkey` varchar(255) DEFAULT NULL,
  `home_page_banner_text` varchar(255) DEFAULT NULL,
  `home_page_banner_description` varchar(255) DEFAULT NULL,
  `android_app_link` varchar(255) DEFAULT NULL,
  `ios_app_link` varchar(255) DEFAULT NULL,
  `js_plan_banner_description` varchar(255) DEFAULT NULL,
  `js_plan_footer_description` text DEFAULT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_configs`
--

INSERT INTO `site_configs` (`id`, `web_name`, `web_frienly_name`, `upload_logo`, `contact_no`, `website_title`, `website_description`, `website_keywords`, `upload_favicon`, `google_analytics_code`, `footer_text`, `from_email`, `contact_email`, `job_prefix`, `facebook_link`, `twitter_link`, `linkedin_link`, `google_link`, `colour_name`, `default_currency`, `full_address`, `service_tax`, `map_address`, `map_tooltip`, `is_deleted`, `sms_api`, `sms_api_status`, `current_date_crone`, `client_id`, `web_appkey`, `home_page_banner_text`, `home_page_banner_description`, `android_app_link`, `ios_app_link`, `js_plan_banner_description`, `js_plan_footer_description`, `last_update_by`, `last_update_at`, `created_at`) VALUES
('1', 'https://www.angel-jobs.fr/', 'Job Portal', 'd2fcbf789bf80d532f13f16a8ffa1946.png', '9988774455', 'Search Jobs in France, Recruitment in France', 'Search jobs in France with Angel JobS France directly by skills, designation, experience, location etc. Best recruitment in France for foreigners.', 'Search Jobs in France, Recruitment in France, jobs in france,  jobs in paris ', '8ce58f1205bfb39a035ba3be5401d61a.png', 'fdfdfd', 'Copyright 2016-2021 by Job Portal. All Rights Reserved.', 'info@angel-jobs.fr', 'info@angel-jobs.fr', 'job portal', 'http://www.facebook.com', 'http://www.twitter.com', 'https://in.linkedin.com/', 'https://plus.google.com', '#008000', 'EUR', '1 rue Deschamps-Guérin 78260 Achères – France RCS PARIS', 0, '1 rue Deschamps-Guérin 78260 Achères – France RCS PARIS', '<strong>Jobportal</strong><br>1 Mastermind 5 royal palm', 'No', 'http://dnd.saakshisoftware.com/api/mt/SendSMS?user=7skyee&password=k@7skyee&senderid=KNOCKJ&channel=trans&DCS=0&flashsms=0&number=##contacts##&text=##sms_text##&route=15', 'APPROVED', '2023-09-22', 794, 'df75794da97f0b4f60a4ec4ea822c2d3', 'Search Online', 'Jobs For Hire Employees  | Course of Select Student', '', '', '<h3><b>NOT GETTING ENOUGH PROFILE VIEWS?</b></h3>\r\n                     <h3>SHOWCASE YOUR RESUME TO TOP PLACEMENT CONSULTANTS & EMPLOYERS\r\n                        @ ANGEL-JOBS.COM SO YOU CAN LAND YOUR DREAM JOB.\r\n                     </h3>', '<p>Disclaimer <br>\r\n       While Angel-jobs services have helped many customers over the years, we do not guarantee any interview calls or assure\r\n       any job offers with any of our services. The services associated with Angel-jobs are only provided through the website\r\n       Angel-jobs.com. You are advised to be cautious of any fraud calls/emails asking for payment from other web sites that\r\n       claim to offer similar services under the name of Angel-jobs.com. We have no associates/agents other than the partner\r\n       sites that have been specifically named on the homepage of the website Angel-jobs.com. We also recommend that you go\r\n       through the Security Guidelines and Terms & Conditions before replying or falling prey to any fraudulent acts.</p>', 41, '2024-03-23 09:45:24', '2024-03-23 10:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `skill_levels`
--

CREATE TABLE `skill_levels` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `skill_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `skill_levels`
--

INSERT INTO `skill_levels` (`id`, `status`, `skill_level`, `is_deleted`) VALUES
(1, 'APPROVED', 'Very poor', 'No'),
(2, 'APPROVED', 'Poor', 'No'),
(3, 'APPROVED', 'Fair', 'No'),
(4, 'APPROVED', 'Expert', 'No'),
(5, 'APPROVED', 'Average', 'No'),
(6, 'APPROVED', 'N Demo Skill', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `state_masters`
--

CREATE TABLE `state_masters` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_masters`
--

INSERT INTO `state_masters` (`id`, `status`, `country_id`, `state_name`, `is_deleted`) VALUES
(1, 'APPROVED', 1, 'Gujarat', 'Yes'),
(2, 'APPROVED', 1, 'Punjab', 'Yes'),
(4, 'APPROVED', 3, 'New South Wales', 'Yes'),
(5, 'APPROVED', 4, 'Dubai', 'Yes'),
(6, 'APPROVED', 3, 'Queensland', 'Yes'),
(7, 'APPROVED', 3, 'South Australia', 'Yes'),
(8, 'APPROVED', 3, 'Tasmania', 'Yes'),
(9, 'APPROVED', 3, 'Victoria', 'Yes'),
(10, 'APPROVED', 3, 'Western Australia', 'Yes'),
(11, 'APPROVED', 5, 'Ontario', 'Yes'),
(12, 'APPROVED', 5, 'Alberta', 'Yes'),
(13, 'APPROVED', 1, 'Andhra Pradesh', 'Yes'),
(14, 'APPROVED', 1, 'Arunachal Pradesh', 'Yes'),
(15, 'APPROVED', 1, 'Assam', 'Yes'),
(16, 'APPROVED', 1, 'Bihar', 'Yes'),
(17, 'APPROVED', 1, 'Chandigarh', 'Yes'),
(18, 'APPROVED', 1, 'Chhattisgarh', 'Yes'),
(19, 'APPROVED', 1, 'National Capital Territory of Delhi', 'Yes'),
(20, 'APPROVED', 1, 'Goa', 'Yes'),
(21, 'APPROVED', 1, 'Haryana', 'Yes'),
(22, 'APPROVED', 1, 'Himachal Pradesh', 'Yes'),
(23, 'APPROVED', 1, 'Jammu and Kashmir', 'Yes'),
(24, 'APPROVED', 1, 'Jharkhand', 'Yes'),
(25, 'APPROVED', 1, 'Karnataka', 'Yes'),
(26, 'APPROVED', 1, 'Kerala', 'Yes'),
(27, 'APPROVED', 1, 'Lakshadweep', 'Yes'),
(28, 'APPROVED', 1, 'Madhya Pradesh', 'Yes'),
(29, 'APPROVED', 1, 'Maharashtra', 'Yes'),
(30, 'APPROVED', 1, 'Manipur', 'Yes'),
(31, 'APPROVED', 1, 'Meghalaya', 'Yes'),
(32, 'APPROVED', 1, 'Mizoram', 'Yes'),
(33, 'APPROVED', 1, 'Nagaland', 'Yes'),
(34, 'APPROVED', 1, 'Odisha', 'Yes'),
(35, 'APPROVED', 1, 'Puducherry', 'Yes'),
(36, 'APPROVED', 1, 'Rajasthan', 'Yes'),
(37, 'APPROVED', 1, 'Sikkim', 'Yes'),
(38, 'APPROVED', 1, 'Tamil Nadu', 'Yes'),
(39, 'APPROVED', 1, 'Telangana', 'Yes'),
(40, 'APPROVED', 1, 'Tripura', 'Yes'),
(41, 'APPROVED', 1, 'Uttar Pradesh', 'Yes'),
(42, 'APPROVED', 1, 'Uttarakhand', 'Yes'),
(43, 'APPROVED', 1, 'West Bengal', 'Yes'),
(44, 'APPROVED', 4, 'Abu Dhabi', 'Yes'),
(45, 'APPROVED', 4, 'Sharjah', 'Yes'),
(46, 'APPROVED', 4, 'Ajman', 'Yes'),
(47, 'APPROVED', 4, 'Ras Al Khaimah', 'Yes'),
(48, 'APPROVED', 4, 'Fujairah', 'Yes'),
(49, 'APPROVED', 4, 'Umm al-Quwain', 'Yes'),
(50, 'APPROVED', 8, 'Auckland', 'Yes'),
(51, 'APPROVED', 8, 'New Plymouth', 'Yes'),
(52, 'APPROVED', 8, 'Hawke\'s Bay', 'Yes'),
(53, 'APPROVED', 8, 'Wellington', 'Yes'),
(54, 'APPROVED', 8, 'Nelson', 'Yes'),
(55, 'APPROVED', 8, 'Marlborough', 'Yes'),
(56, 'APPROVED', 8, 'Westland', 'Yes'),
(57, 'APPROVED', 8, 'Canterbury', 'Yes'),
(58, 'APPROVED', 8, 'Otago', 'Yes'),
(59, 'APPROVED', 8, 'Southland', 'Yes'),
(60, 'APPROVED', 2, 'Balochistan', 'Yes'),
(61, 'APPROVED', 2, 'Islamabad Capital Territory', 'Yes'),
(62, 'APPROVED', 2, 'Khyber-Pakhtunkhwa', 'Yes'),
(63, 'APPROVED', 2, 'Punjab', 'Yes'),
(64, 'APPROVED', 2, 'Sindh', 'Yes'),
(65, 'APPROVED', 9, 'Eastern Cape', 'Yes'),
(66, 'APPROVED', 9, 'Free State', 'Yes'),
(67, 'APPROVED', 9, 'Gauteng', 'Yes'),
(68, 'APPROVED', 9, 'KwaZulu-Natal', 'Yes'),
(69, 'APPROVED', 9, 'Limpopo', 'Yes'),
(70, 'APPROVED', 9, 'Mpumalanga', 'Yes'),
(71, 'APPROVED', 9, 'North West', 'Yes'),
(72, 'APPROVED', 9, 'Northern Cape', 'Yes'),
(73, 'APPROVED', 9, 'Western Cape', 'Yes'),
(74, 'APPROVED', 7, 'England', 'Yes'),
(75, 'APPROVED', 7, 'Northern Ireland', 'Yes'),
(76, 'APPROVED', 7, 'Scotland', 'Yes'),
(77, 'APPROVED', 7, 'Wales', 'Yes'),
(78, 'APPROVED', 6, 'Alabama', 'Yes'),
(79, 'APPROVED', 6, 'Alaska', 'Yes'),
(80, 'APPROVED', 6, 'Arizona', 'Yes'),
(81, 'APPROVED', 6, 'Arkansas', 'Yes'),
(82, 'APPROVED', 6, 'California', 'Yes'),
(83, 'APPROVED', 6, 'Colorado', 'Yes'),
(84, 'APPROVED', 6, 'Illinois', 'Yes'),
(85, 'APPROVED', 6, 'Massachusetts', 'Yes'),
(86, 'APPROVED', 6, 'Michigan', 'Yes'),
(87, 'APPROVED', 6, 'New York', 'Yes'),
(88, 'APPROVED', 6, 'Ohio', 'Yes'),
(89, 'APPROVED', 6, 'Pennsylvania', 'Yes'),
(90, 'APPROVED', 6, 'Tennessee', 'Yes'),
(91, 'APPROVED', 6, 'Washington', 'Yes'),
(92, 'UNAPPROVED', 1, '34', 'Yes'),
(93, 'APPROVED', 26, 'z', 'Yes'),
(94, 'APPROVED', 31, 'test', 'Yes'),
(95, 'APPROVED', 36, 'Metropolitan', 'No'),
(96, 'UNAPPROVED', 38, 'Malta', 'No'),
(97, 'UNAPPROVED', 45, 'testss', 'Yes'),
(98, 'APPROVED', 38, 'New', 'No'),
(99, 'UNAPPROVED', 36, 'Maharashtra', 'No'),
(100, 'UNAPPROVED', 293, 'Gujarat', 'No'),
(101, 'APPROVED', 276, 'Rajasthan', 'No'),
(102, 'APPROVED', 276, 'Gujarat', 'No'),
(103, 'UNAPPROVED', 36, 'Metropolitan', 'No'),
(104, 'UNAPPROVED', 39, 'Metropolitan', 'No'),
(105, 'UNAPPROVED', 40, 'test', 'Yes');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Afta', 'almado@gmail.co', NULL, '$2y$12$mYY90ipUa2d2Lu4dCYiDN.8IzdqRjRNDcdmZ3nFjVsEba78ikZuJO', NULL, '2024-04-01 22:45:26', '2024-04-01 22:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `page_content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `h1_tag` longtext NOT NULL,
  `meta_tags` longtext NOT NULL,
  `page_status` enum('Live','Inactive') NOT NULL DEFAULT 'Inactive',
  `page_url` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data',
  `last_update_by` int(11) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`id`, `page_name`, `page_title`, `page_content`, `slug`, `keywords`, `h1_tag`, `meta_tags`, `page_status`, `page_url`, `is_deleted`, `last_update_by`, `created_on`, `last_update`) VALUES
(4, 'Home', 'home-title', 'meta', 'home-page', 'home', 'HOMEE', 'meta tags', 'Inactive', 'http://192.168.1.21:8000/admin/seo-page-edit', 'No', 4, '2024-03-23 06:53:56', '2024-03-23 05:53:56'),
(5, 'Home', 'home-title', 'meta', 'home-page', 'home', 'HOMEE', 'meta tags', 'Live', 'http://192.168.1.21:8000/admin/seo-page-edit', 'No', 41, '2024-03-23 07:46:40', '2024-03-23 06:46:40'),
(6, 'Home', 'home-title', 'meta', 'home-page', 'home', 'HOMEE', 'meta tags', 'Inactive', 'http://192.168.1.21:8000/admin/seo-page-edit', 'No', 41, '2024-03-23 07:49:51', '2024-03-23 06:49:51'),
(7, 'Home', 'home-title', 'meta', 'home-page', 'home', 'HOMEE', 'meta tags', 'Live', 'http://192.168.1.21:8000/admin/seo-page-edit', 'Yes', 41, '2024-03-23 07:50:00', '2024-03-23 06:50:00');

-- --------------------------------------------------------

--
-- Structure for view `employer_view`
--
DROP TABLE IF EXISTS `employer_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employer_view`  AS SELECT `emp`.`id` AS `id`, `emp`.`fullname` AS `fullname`, `emp`.`email` AS `email`, `emp`.`email_verified` AS `email_verified`, `emp`.`mob_code` AS `mob_code`, `emp`.`mobile` AS `mobile`, `emp`.`company_name` AS `company_name`, `emp`.`company_type` AS `company_type`, `emp`.`company_size` AS `company_size`, `emp`.`industry` AS `industry`, `emp`.`license_no` AS `license_no`, `emp`.`address` AS `address`, `emp`.`country` AS `country`, `emp`.`city` AS `city`, `emp`.`zip` AS `zip`, `emp`.`left_credit_job_posting_plan` AS `left_credit_job_posting_plan`, `emp`.`free_assign_job_posting` AS `free_assign_job_posting`, `emp`.`plan_start_from` AS `plan_start_from`, `emp`.`plan_expired_on` AS `plan_expired_on`, `emp`.`last_payment_recieved_id` AS `last_payment_recieved_id`, `emp`.`last_payment_recieved` AS `last_payment_recieved`, `emp`.`last_payment_recieved_on` AS `last_payment_recieved_on`, `emp`.`website` AS `website`, `emp`.`facebook` AS `facebook`, `emp`.`instagram` AS `instagram`, `emp`.`linkedin` AS `linkedin`, `emp`.`profile_img` AS `profile_img`, `emp`.`is_deleted` AS `is_deleted`, `emp`.`password` AS `password`, `emp`.`created_at` AS `created_at`, `emp`.`updated_at` AS `updated_at`, `size`.`company_size` AS `company_size_name`, `type`.`company_type` AS `company_type_name`, `indus`.`industries_name` AS `industry_name`, `country`.`country_name` AS `country_name`, `city`.`city_name` AS `city_name`, `plan`.`plan_name` AS `plan_name`, `plan`.`job_post_limit` AS `job_post_limit`, `pay`.`payment_amount` AS `payment_amount`, `pay`.`pay_method` AS `pay_method`, `pay`.`status` AS `payment_status`, `pay`.`plan_id` AS `plan_id`, `pay`.`confirm_by` AS `confirm_by` FROM (((((((`employers` `emp` left join `company_sizes` `size` on(`emp`.`company_size` = `size`.`id`)) left join `company_types` `type` on(`emp`.`company_type` = `type`.`id`)) left join `industries` `indus` on(`emp`.`industry` = `indus`.`id`)) left join `country_master` `country` on(`emp`.`country` = `country`.`id`)) left join `cities` `city` on(`emp`.`city` = `city`.`id`)) left join `employer_plan` `plan` on(`emp`.`plan_id` = `plan`.`id`)) left join `employer_payments` `pay` on(`emp`.`last_payment_recieved_id` = `pay`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jobseeker_view`
--
DROP TABLE IF EXISTS `jobseeker_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobseeker_view`  AS SELECT `jsp`.`id` AS `id`, `jsp`.`js_id` AS `js_id`, `jsp`.`designaiton` AS `designaiton`, `jsp`.`skill` AS `skill`, `jsp`.`prefered_location` AS `prefered_location`, `jsp`.`total_exp_year` AS `total_exp_year`, `jsp`.`total_exp_month` AS `total_exp_month`, `jsp`.`curr_salary` AS `curr_salary`, `jsp`.`expected_salary` AS `expected_salary`, `jsp`.`industry` AS `industry`, `jsp`.`functional_area` AS `functional_area`, `jsp`.`proflie_summary` AS `proflie_summary`, `jsp`.`dob` AS `dob`, `jsp`.`gender` AS `gender`, `jsp`.`martial_status` AS `martial_status`, `jsp`.`nationality` AS `nationality`, `jsp`.`work_permit` AS `work_permit`, `jsp`.`is_hadicaped` AS `is_hadicaped`, `jsp`.`lang_skills` AS `lang_skills`, `jsp`.`passport_no` AS `passport_no`, `jsp`.`notice_period` AS `notice_period`, `jsp`.`prefered_job_type` AS `prefered_job_type`, `jsp`.`prefered_industry` AS `prefered_industry`, `jsp`.`country` AS `country`, `jsp`.`city` AS `city`, `jsp`.`postal_code` AS `postal_code`, `jsp`.`full_address` AS `full_address`, `jsp`.`facebook_link` AS `facebook_link`, `jsp`.`insta_link` AS `insta_link`, `jsp`.`twitter_link` AS `twitter_link`, `jsp`.`resume_link` AS `resume_link`, `jsp`.`linkedin` AS `linkedin`, `jsp`.`updated_at` AS `updated_at`, `js`.`fullname` AS `fullname`, `js`.`email` AS `email`, `js`.`email_verified` AS `email_verified`, `js`.`mob_code` AS `mob_code`, `js`.`mobile` AS `mobile`, `js`.`profile_img` AS `profile_img`, `js`.`is_delete` AS `is_delete`, `js`.`created_at` AS `created_at`, `qul`.`educational_qualification` AS `qual_name`, `edu`.`professional_title` AS `professional_title`, `edu`.`specilization` AS `specilization`, `edu`.`passing_year` AS `passing_year`, `edu`.`degree_id` AS `qul_id`, `edu`.`institute_name` AS `institute_name`, `exp`.`company_name` AS `company_name`, `exp`.`work_industry_id` AS `work_industry_id`, `work_indus`.`industries_name` AS `work_industry_name`, `exp`.`work_desination_id` AS `work_desination_id`, `work_desig`.`role_name` AS `work_desination_name`, `exp`.`annual_salary` AS `annual_salary`, `exp`.`joining_date` AS `joining_date`, `exp`.`ending_date` AS `ending_date`, `indus`.`industries_name` AS `industries_name`, `desig`.`role_name` AS `role_name`, `func`.`functional_name` AS `functional_name`, `pre_loc`.`city_name` AS `prefered_location_name`, `mts`.`marital_status` AS `martial_status_name`, `cntm`.`country_name` AS `country_name`, `jsp`.`city` AS `city_name`, `pre_job_type`.`job_type` AS `pref_job_type_name`, `notice`.`notice` AS `notice_name`, `exp_sal`.`salary_range` AS `expected_salary_name`, `expr`.`experiance` AS `experiance_name`, `pref_indus`.`industries_name` AS `pref_indus_name` FROM ((((((((((((((((((`jobseekers` `js` left join `jobseeker_profiles` `jsp` on(`jsp`.`js_id` = `js`.`id`)) left join `jobseeker_educations` `edu` on(`edu`.`js_id` = `js`.`id`)) left join `jobseeker_exps` `exp` on(`exp`.`js_id` = `js`.`id`)) left join `industries` `indus` on(`jsp`.`industry` = `indus`.`id`)) left join `designations` `desig` on(`jsp`.`designaiton` = `desig`.`id`)) left join `country_master` `cntm` on(`jsp`.`country` = `cntm`.`id`)) left join `cities` `ct` on(`jsp`.`city` = `ct`.`id`)) left join `martial_status` `mts` on(`jsp`.`martial_status` = `mts`.`id`)) left join `functional_areas` `func` on(`jsp`.`functional_area` = `func`.`id`)) left join `qualifications` `qul` on(`edu`.`degree_id` = `qul`.`id`)) left join `cities` `pre_loc` on(`jsp`.`prefered_location` = `pre_loc`.`id`)) left join `designations` `work_desig` on(`exp`.`work_desination_id` = `work_desig`.`id`)) left join `industries` `work_indus` on(`exp`.`work_industry_id` = `work_indus`.`id`)) left join `notice_periods` `notice` on(`jsp`.`notice_period` = `notice`.`id`)) left join `job_types` `pre_job_type` on(`jsp`.`prefered_job_type` = `pre_job_type`.`id`)) left join `industries` `pref_indus` on(`jsp`.`prefered_industry` = `pref_indus`.`id`)) left join `salary_ranges` `exp_sal` on(`jsp`.`expected_salary` = `exp_sal`.`id`)) left join `experiances` `expr` on(`jsp`.`total_exp_year` = `expr`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `job_posting_view`
--
DROP TABLE IF EXISTS `job_posting_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `job_posting_view`  AS SELECT `jp`.`id` AS `id`, `jp`.`job_title` AS `job_title`, `jp`.`approval_status` AS `approval_status`, `jp`.`job_description` AS `job_description`, `jp`.`skill_keyword` AS `skill_keyword`, `jp`.`location_hiring` AS `location_hiring`, `jp`.`no_of_openings` AS `no_of_openings`, `jp`.`link_job` AS `link_job`, `jp`.`job_industry` AS `job_industry`, `jp`.`functional_area` AS `functional_area`, `jp`.`job_designation` AS `job_designation`, `jp`.`work_experience_from` AS `work_experience_from`, `jp`.`work_experience_to` AS `work_experience_to`, `jp`.`job_salary_to` AS `job_salary_to`, `jp`.`salary_hide` AS `salary_hide`, `jp`.`currency_type` AS `currency_type`, `jp`.`job_type` AS `job_type`, `jp`.`job_education` AS `job_education`, `jp`.`desire_candidate_profile` AS `desire_candidate_profile`, `jp`.`no_of_views` AS `no_of_views`, `jp`.`no_of_like` AS `no_of_like`, `jp`.`no_of_apply` AS `no_of_apply`, `jp`.`posted_by` AS `posted_by`, `jp`.`contact_person` AS `contact_person`, `jp`.`contact_email` AS `contact_email`, `jp`.`contact_phone` AS `contact_phone`, `jp`.`hide_contact_details` AS `hide_contact_details`, `jp`.`specialization` AS `specialization`, `jp`.`gender` AS `gender`, `jp`.`posted_on` AS `posted_on`, `jp`.`status` AS `status`, `jp`.`job_highlighted` AS `job_highlighted`, `jp`.`is_deleted` AS `is_deleted`, `jp`.`job_life` AS `job_life`, `jp`.`job_expired_on` AS `job_expired_on`, `jp`.`required_language` AS `required_language`, `jp`.`start_date` AS `start_date`, `jp`.`update_at` AS `update_at`, `emp`.`fullname` AS `fullname`, `emp`.`email` AS `email`, `emp`.`mob_code` AS `mob_code`, `emp`.`mobile` AS `mobile`, `emp`.`company_name` AS `company_name`, `emp`.`company_type` AS `company_type`, `emp`.`company_size` AS `company_size`, `emp`.`industry` AS `industry`, `emp`.`address` AS `address`, `emp`.`country` AS `country`, `emp`.`city` AS `city`, `emp`.`zip` AS `zip`, `emp`.`website` AS `website`, `emp`.`facebook` AS `facebook`, `emp`.`instagram` AS `instagram`, `emp`.`linkedin` AS `linkedin`, `emp`.`profile_img` AS `profile_img`, `ct`.`city_name` AS `location_hiring_name`, `desig`.`role_name` AS `job_designation_name`, `func`.`functional_name` AS `functional_name`, `indus`.`industries_name` AS `job_industry_name`, `jtype`.`job_type` AS `job_type_name`, `skills`.`key_skill_name` AS `key_skill_name`, `lang`.`skill_language` AS `required_language_name`, `qual`.`educational_qualification` AS `job_education_name`, `salrang`.`salary_range` AS `job_salary_to_name`, `com_size`.`company_size` AS `company_size_name`, `work_exp`.`experiance` AS `experiance`, `work_exp`.`exp_no` AS `exp_no`, `com_type`.`company_type` AS `company_type_name` FROM (((((((((((((`job_postings` `jp` left join `employers` `emp` on(`jp`.`posted_by` = `emp`.`id`)) left join `cities` `ct` on(`jp`.`location_hiring` = `ct`.`id`)) left join `designations` `desig` on(`jp`.`job_designation` = `desig`.`id`)) left join `functional_areas` `func` on(`jp`.`functional_area` = `func`.`id`)) left join `industries` `indus` on(`jp`.`job_industry` = `indus`.`id`)) left join `job_types` `jtype` on(`jp`.`job_type` = `jtype`.`id`)) left join `key_skills` `skills` on(`jp`.`skill_keyword` = `skills`.`id`)) left join `languages` `lang` on(`jp`.`required_language` = `lang`.`id`)) left join `qualifications` `qual` on(`jp`.`job_education` = `qual`.`id`)) left join `salary_ranges` `salrang` on(`jp`.`job_salary_to` = `salrang`.`id`)) left join `company_sizes` `com_size` on(`emp`.`company_size` = `com_size`.`id`)) left join `company_types` `com_type` on(`emp`.`company_type` = `com_type`.`id`)) left join `experiances` `work_exp` on(`jp`.`work_experience_from` = `work_exp`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_emails_master`
--
ALTER TABLE `admin_emails_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_name` (`template_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `password` (`password`(768));

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`,`state_id`),
  ADD KEY `is_deleted` (`is_deleted`);

--
-- Indexes for table `company_sizes`
--
ALTER TABLE `company_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_types`
--
ALTER TABLE `company_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_deleted` (`is_deleted`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `functional_area` (`functional_area`),
  ADD KEY `is_deleted` (`is_deleted`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_name` (`template_name`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `is_deleted` (`is_deleted`),
  ADD KEY `password` (`password`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `last_payment_recieved_id` (`last_payment_recieved_id`);

--
-- Indexes for table `employer_down_js_resume`
--
ALTER TABLE `employer_down_js_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`employer_id`,`jobseeker_id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `employer_payments`
--
ALTER TABLE `employer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_plan`
--
ALTER TABLE `employer_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_viewed_js_contact`
--
ALTER TABLE `employer_viewed_js_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`employer_id`,`jobseeker_id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `experiances`
--
ALTER TABLE `experiances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_deleted` (`is_deleted`),
  ADD KEY `exp_no` (`exp_no`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `functional_areas`
--
ALTER TABLE `functional_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grievance`
--
ALTER TABLE `grievance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `password` (`password`(768));

--
-- Indexes for table `jobseeker_access_employer`
--
ALTER TABLE `jobseeker_access_employer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `js_id` (`js_id`,`employer_id`),
  ADD KEY `js_id_2` (`js_id`,`employer_id`),
  ADD KEY `liked_on` (`liked_on`,`followed_on`,`blocked_on`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobseeker_educations`
--
ALTER TABLE `jobseeker_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_exps`
--
ALTER TABLE `jobseeker_exps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_payments`
--
ALTER TABLE `jobseeker_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_plan`
--
ALTER TABLE `jobseeker_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_plan_services`
--
ALTER TABLE `jobseeker_plan_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_profiles`
--
ALTER TABLE `jobseeker_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `js_id` (`js_id`);

--
-- Indexes for table `jobseeker_qualification_level`
--
ALTER TABLE `jobseeker_qualification_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_viewed_employer_contact`
--
ALTER TABLE `jobseeker_viewed_employer_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `js_id` (`js_id`,`employer_id`,`last_viewed_on`);

--
-- Indexes for table `jobseeker_viewed_jobs`
--
ALTER TABLE `jobseeker_viewed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `js_id` (`js_id`,`job_id`),
  ADD KEY `js_id_2` (`js_id`,`job_id`,`update_on`,`saved_on`);

--
-- Indexes for table `jobseeker_workhistory`
--
ALTER TABLE `jobseeker_workhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `js_id` (`js_id`,`joining_date`,`leaving_date`,`industry`,`functional_area`,`job_role`);

--
-- Indexes for table `job_application_history`
--
ALTER TABLE `job_application_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`,`js_id`),
  ADD KEY `job_id_2` (`job_id`,`js_id`,`applied_on`),
  ADD KEY `posted_by` (`employer_id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobPostIndex` (`is_deleted`,`posted_by`,`status`,`job_expired_on`),
  ADD KEY `location_hiring` (`location_hiring`),
  ADD KEY `location_hiring_2` (`location_hiring`,`job_industry`,`job_type`),
  ADD KEY `job_education` (`job_education`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_skills`
--
ALTER TABLE `key_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_skill_name_2` (`key_skill_name`),
  ADD KEY `key_skill_name_3` (`key_skill_name`),
  ADD KEY `is_deleted` (`is_deleted`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `martial_status`
--
ALTER TABLE `martial_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `notice_periods`
--
ALTER TABLE `notice_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_titles`
--
ALTER TABLE `personal_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shift_types`
--
ALTER TABLE `shift_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_configs`
--
ALTER TABLE `site_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_levels`
--
ALTER TABLE `skill_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_masters`
--
ALTER TABLE `state_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `page_url` (`page_url`(1024));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_emails_master`
--
ALTER TABLE `admin_emails_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `company_sizes`
--
ALTER TABLE `company_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_types`
--
ALTER TABLE `company_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `employer_down_js_resume`
--
ALTER TABLE `employer_down_js_resume`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer_payments`
--
ALTER TABLE `employer_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employer_plan`
--
ALTER TABLE `employer_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employer_viewed_js_contact`
--
ALTER TABLE `employer_viewed_js_contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiances`
--
ALTER TABLE `experiances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `functional_areas`
--
ALTER TABLE `functional_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `grievance`
--
ALTER TABLE `grievance`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `jobseeker_access_employer`
--
ALTER TABLE `jobseeker_access_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobseeker_educations`
--
ALTER TABLE `jobseeker_educations`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobseeker_exps`
--
ALTER TABLE `jobseeker_exps`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobseeker_payments`
--
ALTER TABLE `jobseeker_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `jobseeker_plan`
--
ALTER TABLE `jobseeker_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobseeker_plan_services`
--
ALTER TABLE `jobseeker_plan_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobseeker_profiles`
--
ALTER TABLE `jobseeker_profiles`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jobseeker_qualification_level`
--
ALTER TABLE `jobseeker_qualification_level`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobseeker_viewed_employer_contact`
--
ALTER TABLE `jobseeker_viewed_employer_contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobseeker_viewed_jobs`
--
ALTER TABLE `jobseeker_viewed_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `jobseeker_workhistory`
--
ALTER TABLE `jobseeker_workhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `job_application_history`
--
ALTER TABLE `job_application_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `key_skills`
--
ALTER TABLE `key_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2652;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `martial_status`
--
ALTER TABLE `martial_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notice_periods`
--
ALTER TABLE `notice_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_titles`
--
ALTER TABLE `personal_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shift_types`
--
ALTER TABLE `shift_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill_levels`
--
ALTER TABLE `skill_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state_masters`
--
ALTER TABLE `state_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
