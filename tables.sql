-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 06:23 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angeliku_angel_fr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `status`, `city_name`, `country_id`, `state_id`, `is_deleted`) VALUES
(2, 'APPROVED', 'Lyon', 31, 0, 'No'),
(3, 'APPROVED', 'Paris', 31, 0, 'No'),
(4, 'APPROVED', 'Strasbourg', 31, 0, 'No'),
(5, 'APPROVED', 'Bordeaux', 31, 0, 'No'),
(6, 'APPROVED', 'Montpellier', 31, 0, 'No'),
(7, 'APPROVED', 'Toulouse', 31, 0, 'No'),
(8, 'APPROVED', 'Nantes', 31, 0, 'No'),
(9, 'APPROVED', 'Lille', 31, 0, 'No'),
(10, 'APPROVED', 'Nice', 31, 0, 'No'),
(11, 'APPROVED', 'Marseille', 31, 0, 'No'),
(12, 'APPROVED', 'Grenoble', 31, 0, 'No'),
(13, 'APPROVED', 'Reims', 31, 0, 'No'),
(14, 'APPROVED', 'Dijon', 31, 0, 'No'),
(15, 'APPROVED', 'Rennes', 31, 0, 'No'),
(16, 'APPROVED', 'Rouen', 31, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country_code` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'For use mobile code',
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` enum('APPROVED','UNAPPROVED') CHARACTER SET utf8 NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country_code` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'For use mobile code',
  `is_deleted` enum('Yes','No') CHARACTER SET utf8 NOT NULL DEFAULT 'No' COMMENT 'Yes - Deleted data, No - Not deleted data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(31, 'APPROVED', 'France', '+33', 'Yes'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Afta', 'almado@gmail.co', NULL, '$2y$12$mYY90ipUa2d2Lu4dCYiDN.8IzdqRjRNDcdmZ3nFjVsEba78ikZuJO', NULL, '2024-04-01 22:45:26', '2024-04-01 22:45:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`,`state_id`),
  ADD KEY `is_deleted` (`is_deleted`);

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
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_name` (`template_name`);

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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
