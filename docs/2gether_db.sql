-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 05:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2gether_db`
--
CREATE DATABASE IF NOT EXISTS `2gether_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `2gether_db`;

-- --------------------------------------------------------

--
-- Table structure for table `albumcat`
--

DROP TABLE IF EXISTS `albumcat`;
CREATE TABLE `albumcat` (
  `id` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albumcat`
--

INSERT INTO `albumcat` (`id`, `category`) VALUES
(1, 'Cover Photos'),
(2, 'Profile Pictures'),
(3, 'Timeline Pictures'),
(4, 'Posted Photos'),
(5, 'Uploaded Photos'),
(6, 'Videos');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `album_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_desc` text COLLATE utf8_unicode_ci,
  `album_city` int(11) DEFAULT NULL,
  `album_country` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `album_thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `album_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `album_cat` int(11) NOT NULL,
  `album_privacy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_title`, `album_desc`, `album_city`, `album_country`, `created_by`, `created_at`, `album_thumb`, `album_path`, `album_cat`, `album_privacy`) VALUES
(2, 'Cover Photos', NULL, 1, 86, 1, '2017-06-09 22:01:23', 'users/covers/thumbs/2014-11-26-TheOldWoman3_credit_Courtesy.jpg', '../users/covers/', 1, 0),
(3, 'Cover Photos', NULL, 1, 86, 2, '2017-06-09 18:12:54', 'users/covers/thumbs/552616_10151006339583555_673577249_n.jpg', '../users/covers/', 1, 0),
(5, 'Profile Pictures', NULL, 1, 86, 18, '2017-06-09 18:13:17', 'users/profiles/thumbs/nikos_panoskaltsis.jpg', '../users/profiles/', 2, 0),
(6, 'Profile Pictures', NULL, 1, 86, 1, '2017-06-09 18:12:41', 'users/profiles/thumbs/Vergados_Dimitrios_b.jpg', '../users/profiles/', 2, 0),
(7, 'Profile Pictures', NULL, 1, 86, 2, '2017-06-09 18:13:07', 'users/profiles/thumbs/vana_stergiou.png', '../users/profiles/', 2, 0),
(13, 'Cover Photos', NULL, 1, 86, 18, '2017-06-09 18:13:30', 'users/covers/thumbs/12471715_10207337738496685_6252088187534488663_o.jpg', '../users/covers/', 1, 0),
(18, 'Oedipus 2+2', 'A theatrical show directed by Dimitrios Vergados in 2007', 1, 86, 1, '2017-06-09 17:03:16', 'users/uploads/16678/thumb_21884215931_0324a750fe_k.jpg', '../users/uploads/16678/', 5, 1),
(19, 'Cover Photos', NULL, 1, 86, 5, '2017-06-09 18:27:29', 'users/covers/thumbs/11156356_1100800899946478_9179000002999197732_n.jpg', '../users/covers/', 1, 0),
(25, 'Dourgouti Island Hotel', 'A promenade performance directed by Giorgos Sahinis in 2015', 1, 86, 1, '2017-06-09 22:01:52', 'users/uploads/13919/thumb_22979090591_3299a22f33_k.jpg', '../users/uploads/13919/', 5, 1),
(28, 'Cover Photos', NULL, 1, 86, 13, '2017-06-11 08:29:18', 'users/covers/thumbs/4437720-sky-wallpapers.png', '../users/covers/', 1, 0),
(29, 'Profile Pictures', NULL, 2, 86, 3, '2017-06-11 11:12:57', 'users/profiles/thumbs/fotini_timotheou.jpg', '../users/profiles/', 2, 0),
(30, 'Profile Pictures', NULL, 1, 86, 5, '2017-06-11 11:12:57', 'users/profiles/thumbs/elias_dapoulakis.jpg', '../users/profiles/', 2, 0),
(31, 'Profile Pictures', NULL, 1, 86, 13, '2017-06-11 11:12:57', 'users/profiles/thumbs/katerina_chalkou.jpg', '../users/profiles/', 2, 0),
(32, 'Profile Pictures', NULL, 1, 86, 14, '2017-06-11 11:12:57', 'users/profiles/thumbs/eleni_koumoura.jpg', '../users/profiles/', 2, 0),
(33, 'Profile Pictures', NULL, 1, 86, 15, '2017-06-11 11:12:57', 'users/profiles/thumbs/dimitris_fragioglou.jpg', '../users/profiles/', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bcity`
--

DROP TABLE IF EXISTS `bcity`;
CREATE TABLE `bcity` (
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bcity`
--

INSERT INTO `bcity` (`user_id`, `city_id`, `updated_at`) VALUES
(1, 1, '2017-06-05 14:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `bcountry`
--

DROP TABLE IF EXISTS `bcountry`;
CREATE TABLE `bcountry` (
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bcountry`
--

INSERT INTO `bcountry` (`user_id`, `country_id`, `updated_at`) VALUES
(1, 86, '2017-06-16 15:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `bdaymonthprivacy`
--

DROP TABLE IF EXISTS `bdaymonthprivacy`;
CREATE TABLE `bdaymonthprivacy` (
  `user_id` int(11) NOT NULL,
  `bdaymonth_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bdaymonthprivacy`
--

INSERT INTO `bdaymonthprivacy` (`user_id`, `bdaymonth_privacy`, `updated_at`) VALUES
(1, 1, '2017-06-05 20:11:49'),
(2, 1, '2017-06-06 05:22:36'),
(3, 1, '2017-06-05 15:41:38'),
(5, 1, '2017-06-05 15:41:38'),
(13, 1, '2017-06-05 15:41:46'),
(14, 1, '2017-06-05 15:41:46'),
(15, 1, '2017-06-05 15:41:51'),
(18, 1, '2017-06-06 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `birthplace`
--

DROP TABLE IF EXISTS `birthplace`;
CREATE TABLE `birthplace` (
  `user_id` int(11) NOT NULL,
  `birthplace_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `birthplace`
--

INSERT INTO `birthplace` (`user_id`, `birthplace_privacy`, `updated_at`) VALUES
(1, 1, '2017-06-05 14:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `byearprivacy`
--

DROP TABLE IF EXISTS `byearprivacy`;
CREATE TABLE `byearprivacy` (
  `user_id` int(11) NOT NULL,
  `byear_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `byearprivacy`
--

INSERT INTO `byearprivacy` (`user_id`, `byear_privacy`, `updated_at`) VALUES
(1, 1, '2017-06-05 20:11:59'),
(2, 1, '2017-06-06 00:32:19'),
(3, 1, '2017-06-05 15:32:26'),
(5, 1, '2017-06-05 15:32:26'),
(13, 2, '2017-06-11 07:50:25'),
(14, 1, '2017-06-05 15:32:35'),
(15, 1, '2017-06-05 15:32:40'),
(18, 1, '2017-06-06 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Athens'),
(2, 'Thessaloniki'),
(3, 'Patras'),
(4, 'Heraclion');

-- --------------------------------------------------------

--
-- Table structure for table `comments_photos`
--

DROP TABLE IF EXISTS `comments_photos`;
CREATE TABLE `comments_photos` (
  `id` int(11) NOT NULL,
  `photo_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photocom_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photocom_by` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments_photos`
--

INSERT INTO `comments_photos` (`id`, `photo_comment`, `photocom_at`, `photocom_by`, `photo_id`) VALUES
(1, 'Αξέχαστη εμπειρία!', '2017-06-19 23:31:27', 1, 12),
(2, 'Δεν θα ξεχάσω ποτέ το Κάιρο!', '2017-06-20 00:54:33', 1, 33),
(3, 'Κούκλα!!!!', '2017-06-20 01:13:44', 1, 17),
(4, 'Υπερβάλλεις...', '2017-06-20 01:14:34', 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `comments_posts`
--

DROP TABLE IF EXISTS `comments_posts`;
CREATE TABLE `comments_posts` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `com_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments_posts`
--

INSERT INTO `comments_posts` (`id`, `comment`, `com_at`, `com_by`, `post_id`) VALUES
(4, 'Τι κρατάει ο Ναπολέων;', '2017-06-19 00:45:25', 1, 34),
(5, 'Μήπως να το ρίξω στον παγανισμό;', '2017-06-19 00:46:49', 1, 25),
(6, 'Τα χάπια μου τα χάπια μου κι ένα ταξί να φύγω', '2017-06-19 16:09:42', 1, 22),
(7, 'Έλα μου ντε... Τι να κρατάει...', '2017-06-19 16:25:15', 2, 34),
(9, 'Δεν τρέχει τίποτα, τη βγάζουμε και ξεμπερδεύουμε...', '2017-06-19 18:24:32', 2, 37),
(11, 'Ό.τι πεις!', '2017-06-19 18:31:57', 1, 37),
(14, 'To βράδυ σού ''ρχομαι, εντάξει;', '2017-06-19 18:37:26', 2, 37),
(16, 'Ελπίζω μόνο να έχει άφθονο αλκοόλ γιατί σκοπεύω να γίνω ντίρλα!', '2017-06-19 19:06:36', 1, 38),
(17, 'Πέρνα εσύ καλά εκεί και θα σε πάω μετά στους  ΑΑ!!!', '2017-06-19 22:31:56', 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `comments_videos`
--

DROP TABLE IF EXISTS `comments_videos`;
CREATE TABLE `comments_videos` (
  `id` int(11) NOT NULL,
  `video_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videocom_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `videocom_by` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments_videos`
--

INSERT INTO `comments_videos` (`id`, `video_comment`, `videocom_at`, `videocom_by`, `video_id`) VALUES
(1, 'Πρώτη ύλη κανονικά...', '2017-06-20 03:09:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country_abr` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `country_abr`) VALUES
(1, 'Afghanistan', 'AFG'),
(2, 'Åland Islands', 'ALA'),
(3, 'Albania', 'ALB'),
(4, 'Algeria', 'DZA'),
(5, 'American Samoa', 'ASM'),
(6, 'Andorra', 'AND'),
(7, 'Angola', 'AGO'),
(8, 'Anguilla', 'AIA'),
(9, 'Antarctica', 'ATA'),
(10, 'Antigua and Barbuda', 'ATG'),
(11, 'Argentina', 'ARG'),
(12, 'Armenia', 'ARM'),
(13, 'Aruba', 'ABW'),
(14, 'Australia', 'AUS'),
(15, 'Austria', 'AUT'),
(16, 'Azerbaijan', 'AZE'),
(17, 'Bahamas', 'BHS'),
(18, 'Bahrain', 'BHR'),
(19, 'Bangladesh', 'BGD'),
(20, 'Barbados', 'BRB'),
(21, 'Belarus', 'BLR'),
(22, 'Belgium', 'BEL'),
(23, 'Belize', 'BLZ'),
(24, 'Benin', 'BEN'),
(25, 'Bermuda', 'BMU'),
(26, 'Bhutan', 'BTN'),
(27, 'Bolivia, Plurinational State of', 'BOL'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BES'),
(29, 'Bosnia and Herzegovina', 'BIH'),
(30, 'Botswana', 'BWA'),
(31, 'Bouvet Island', 'BVT'),
(32, 'Brazil', 'BRA'),
(33, 'British Indian Ocean Territory', 'IOT'),
(34, 'Brunei Darussalam', 'BRN'),
(35, 'Bulgaria', 'BGR'),
(36, 'Burkina Faso', 'BFA'),
(37, 'Burundi', 'BDI'),
(38, 'Cambodia', 'KHM'),
(39, 'Cameroon', 'CMR'),
(40, 'Canada', 'CAN'),
(41, 'Cape Verde', 'CPV'),
(42, 'Cayman Islands', 'CYM'),
(43, 'Central African Republic', 'CAF'),
(44, 'Chad', 'TCD'),
(45, 'Chile', 'CHL'),
(46, 'China', 'CHN'),
(47, 'Christmas Island', 'CXR'),
(48, 'Cocos (Keeling) Islands', 'CCK'),
(49, 'Colombia', 'COL'),
(50, 'Comoros', 'COM'),
(51, 'Congo', 'COG'),
(52, 'Congo, the Democratic Republic of the', 'COD'),
(53, 'Cook Islands', 'COK'),
(54, 'Costa Rica', 'CRI'),
(55, 'Côte d’Ivoire', 'CIV'),
(56, 'Croatia', 'HRV'),
(57, 'Cuba', 'CUB'),
(58, 'Curaçao', 'CUW'),
(59, 'Cyprus', 'CYP'),
(60, 'Czech Republic', 'CZE'),
(61, 'Denmark', 'DNK'),
(62, 'Djibouti', 'DJI'),
(63, 'Domenica', 'DMA'),
(64, 'Dominican RepDominicaublic', 'DOM'),
(65, 'Ecuador', 'ECU'),
(66, 'Egypt', 'EGY'),
(67, 'El Salvador', 'SLV'),
(68, 'Equatorial Guinea', 'GNQ'),
(69, 'Eritrea', 'ERI'),
(70, 'Estonia', 'EST'),
(71, 'Ethiopia', 'ETH'),
(72, 'Falkland Islands (Malvinas)', 'FLK'),
(73, 'Faroe Islands', 'FRO'),
(74, 'Fiji', 'FJI'),
(75, 'Finland', 'FIN'),
(76, 'France', 'FRA'),
(77, 'French Guiana', 'GUF'),
(78, 'French Polynesia', 'PYF'),
(79, 'French Southern Territories', 'ATF'),
(80, 'Gabon', 'GAB'),
(81, 'Gambia', 'GMB'),
(82, 'Georgia', 'GEO'),
(83, 'Germany', 'DEU'),
(84, 'Ghana', 'GHA'),
(85, 'Gibraltar', 'GIB'),
(86, 'Greece', 'GRC'),
(87, 'Greenland', 'GRL'),
(88, 'Grenada', 'GRD'),
(89, 'Guadeloupe', 'GLP'),
(90, 'Guam', 'GUM'),
(91, 'Guatemala', 'GTM'),
(92, 'Guernsey', 'GGY'),
(93, 'Guinea', 'GIN'),
(94, 'Guinea-Bissau', 'GNB'),
(95, 'Guyana', 'GUY'),
(96, 'Haiti', 'HTI'),
(97, 'Heard Island and McDonald Islands', 'HMD'),
(98, 'Holy See (Vatican City State)', 'VAT'),
(99, 'Honduras', 'HND'),
(100, 'Hong Kong', 'HKG'),
(101, 'Hungary', 'HUN'),
(102, 'Iceland', 'ISL'),
(103, 'India', 'IND'),
(104, 'Indonesia', 'IDN'),
(105, 'Iran, Islamic Republic of', 'IRN'),
(106, 'Iraq', 'IRQ'),
(107, 'Ireland', 'IRL'),
(108, 'Isle of Man', 'IMN'),
(109, 'Israel', 'ISR'),
(110, 'Italy', 'ITA'),
(111, 'Jamaica', 'JAM'),
(112, 'Japan', 'JPN'),
(113, 'Jersey', 'JEY'),
(114, 'Jordan', 'JOR'),
(115, 'Kazakhstan', 'KAZ'),
(116, 'Kenya', 'KEN'),
(117, 'Kiribati', 'KIR'),
(118, 'Korea, Democratic People’s Republic of', 'PRK'),
(119, 'Korea, Republic of', 'KOR'),
(120, 'Kuwait', 'KWT'),
(121, 'Kyrgyzstan', 'KGZ'),
(122, 'Lao People’s Democratic Republic', 'LAO'),
(123, 'Latvia', 'LVA'),
(124, 'Lebanon', 'LBN'),
(125, 'Lesotho', 'LSO'),
(126, 'Liberia', 'LBR'),
(127, 'Libya', 'LBY'),
(128, 'Liechtenstein', 'LIE'),
(129, 'Lithuania', 'LTU'),
(130, 'Luxembourg', 'LUX'),
(131, 'Macao', 'MAC'),
(132, 'Macedonia, the former Yugoslav Republic of', 'MKD'),
(133, 'Madagascar', 'MDG'),
(134, 'Malawi', 'MWI'),
(135, 'Malaysia', 'MYS'),
(136, 'Maldives', 'MDV'),
(137, 'Mali', 'MLI'),
(138, 'Malta', 'MLT'),
(139, 'Marshall Islands', 'MHL'),
(140, 'Martinique', 'MTQ'),
(141, 'Mauritania', 'MRT'),
(142, 'Mauritius', 'MUS'),
(143, 'Mayotte', 'MYT'),
(144, 'Mexico', 'MEX'),
(145, 'Micronesia, Federated States of', 'FSM'),
(146, 'Moldova, Republic of', 'MDA'),
(147, 'Monaco', 'MCO'),
(148, 'Mongolia', 'MNG'),
(149, 'Montenegro', 'MNE'),
(150, 'Montserrat', 'MSR'),
(151, 'Morocco', 'MAR'),
(152, 'Mozambique', 'MOZ'),
(153, 'Myanmar', 'MMR'),
(154, 'Namibia', 'NAM'),
(155, 'Nauru', 'NRU'),
(156, 'Nepal', 'NPL'),
(157, 'Netherlands', 'NLD'),
(158, 'New Caledonia', 'NCL'),
(159, 'New Zealand', 'NZL'),
(160, 'Nicaragua', 'NIC'),
(161, 'Niger', 'NER'),
(162, 'Nigeria', 'NGA'),
(163, 'Niue', 'NIU'),
(164, 'Norfolk Island', 'NFK'),
(165, 'Northern Mariana Islands', 'MNP'),
(166, 'Norway', 'NOR'),
(167, 'Oman', 'OMN'),
(168, 'Pakistan', 'PAK'),
(169, 'Palau', 'PLW'),
(170, 'Palestinian Territory, Occupied', 'PSE'),
(171, 'Panama', 'PAN'),
(172, 'Papua New Guinea', 'PNG'),
(173, 'Paraguay', 'PRY'),
(174, 'Peru', 'PER'),
(175, 'Philippines', 'PHL'),
(176, 'Pitcairn', 'PCN'),
(177, 'Poland', 'POL'),
(178, 'Portugal', 'PRT'),
(179, 'Puerto Rico', 'PRI'),
(180, 'Qatar', 'QAT'),
(181, 'Réunion', 'REU'),
(182, 'Romania', 'ROU'),
(183, 'Russian Federation', 'RUS'),
(184, 'Rwanda', 'RWA'),
(185, 'Saint Barthélemy', 'BLM'),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SHN'),
(187, 'Saint Kitts and Nevis', 'KNA'),
(188, 'Saint Lucia', 'LCA'),
(189, 'Saint Martin (French part)', 'MAF'),
(190, 'Saint Pierre and Miquelon', 'SPM'),
(191, 'Saint Vincent and the Grenadines', 'VCT'),
(192, 'Samoa', 'WSM'),
(193, 'San Marino', 'SMR'),
(194, 'Sao Tome and Principe', 'STP'),
(195, 'Saudi Arabia', 'SAU'),
(196, 'Senegal', 'SEN'),
(197, 'Serbia', 'SRB'),
(198, 'Seychelles', 'SYC'),
(199, 'Sierra Leone', 'SLE'),
(200, 'Singapore', 'SGP'),
(201, 'Sint Maarten (Dutch part)', 'SXM'),
(202, 'Slovakia', 'SVK'),
(203, 'Slovenia', 'SVN'),
(204, 'Solomon Islands', 'SLB'),
(205, 'Somalia', 'SOM'),
(206, 'South Africa', 'ZAF'),
(207, 'South Georgia and the South Sandwich Islands', 'SGS'),
(208, 'South Sudan', 'SSD'),
(209, 'Spain', 'ESP'),
(210, 'Sri Lanka', 'LKA'),
(211, 'Sudan', 'SDN'),
(212, 'Suriname', 'SUR'),
(213, 'Svalbard and Jan Mayen', 'SJM'),
(214, 'Swaziland', 'SWZ'),
(215, 'Sweden', 'SWE'),
(216, 'Switzerland', 'CHE'),
(217, 'Syrian Arab Republic', 'SYR'),
(218, 'Taiwan, Province of China', 'TWN'),
(219, 'Tajikistan', 'TJK'),
(220, 'Tanzania, United Republic of', 'TZA'),
(221, 'Thailand', 'THA'),
(222, 'Timor-Leste', 'TLS'),
(223, 'Togo', 'TGO'),
(224, 'Tokelau', 'TKL'),
(225, 'Tonga', 'TON'),
(226, 'Trinidad and Tobago', 'TTO'),
(227, 'Tunisia', 'TUN'),
(228, 'Turkey', 'TUR'),
(229, 'Turkmenistan', 'TKM'),
(230, 'Turks and Caicos Islands', 'TCA'),
(231, 'Tuvalu', 'TUV'),
(232, 'Uganda', 'UGA'),
(233, 'Ukraine', 'UKR'),
(234, 'United Arab Emirates', 'ARE'),
(235, 'United Kingdom', 'GBR'),
(236, 'United States', 'USA'),
(237, 'United States Minor Outlying Islands', 'UMI'),
(238, 'Uruguay', 'URY'),
(239, 'Uzbekistan', 'UZB'),
(240, 'Vanuatu', 'VUT'),
(241, 'Venezuela, Bolivarian Republic of', 'VEN'),
(242, 'Viet Nam', 'VNM'),
(243, 'Virgin Islands, British', 'VGB'),
(244, 'Virgin Islands, U.S.', 'VIR'),
(245, 'Wallis and Futuna', 'WLF'),
(246, 'Western Sahara', 'ESH'),
(247, 'Yemen', 'YEM'),
(248, 'Zambia', 'ZMB'),
(249, 'Zimbabwe', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `req_from` int(11) NOT NULL,
  `req_to` int(11) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `req_from`, `req_to`, `req_date`) VALUES
(4, 1, 2, '2017-04-26 18:03:09'),
(5, 1, 3, '2017-04-27 05:27:02'),
(7, 5, 1, '2017-04-27 11:30:59'),
(8, 5, 3, '2017-04-29 08:54:58'),
(9, 13, 1, '2017-04-29 09:03:47'),
(10, 13, 14, '2017-04-29 10:02:10'),
(11, 14, 5, '2017-04-29 10:10:01'),
(12, 13, 2, '2017-04-29 11:01:57'),
(13, 14, 2, '2017-04-29 11:02:17'),
(14, 5, 2, '2017-04-29 15:27:13'),
(15, 1, 18, '2017-06-07 08:40:49'),
(20, 1, 14, '2017-06-11 10:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `homeplace`
--

DROP TABLE IF EXISTS `homeplace`;
CREATE TABLE `homeplace` (
  `user_id` int(11) NOT NULL,
  `homeplace_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homeplace`
--

INSERT INTO `homeplace` (`user_id`, `homeplace_privacy`, `updated_at`) VALUES
(1, 0, '2017-06-05 20:12:10'),
(2, 0, '2017-06-05 23:01:15'),
(3, 0, '2017-06-05 23:01:23'),
(5, 0, '2017-06-05 23:01:30'),
(13, 0, '2017-06-05 23:01:38'),
(14, 0, '2017-06-05 23:01:47'),
(15, 0, '2017-06-05 23:01:54'),
(18, 0, '2017-06-06 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `linkposts`
--

DROP TABLE IF EXISTS `linkposts`;
CREATE TABLE `linkposts` (
  `id` int(11) NOT NULL,
  `linkpost_src` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkposts`
--

INSERT INTO `linkposts` (`id`, `linkpost_src`, `post_id`) VALUES
(1, 'https://www.youtube.com/embed/m4d-mHjtCG8', 16),
(3, 'https://www.youtube.com/embed/FzTLNXfTquA', 21),
(4, 'https://player.vimeo.com/video/9681393', 22),
(7, 'https://player.vimeo.com/video/7010018', 24),
(8, 'https://player.vimeo.com/video/8902035', 25),
(11, 'http://www.lifo.gr/now/san_simera/148853', 28),
(14, 'http://www.lifo.gr/articles/photography_articles/148730', 29),
(15, 'http://www.lifo.gr/guide/cultureblogs/theaterblog/35067', 30),
(16, 'https://www.youtube.com/embed/-OTuvTV1VPw', 31);

-- --------------------------------------------------------

--
-- Table structure for table `mailprivacy`
--

DROP TABLE IF EXISTS `mailprivacy`;
CREATE TABLE `mailprivacy` (
  `user_id` int(11) NOT NULL,
  `email_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mailprivacy`
--

INSERT INTO `mailprivacy` (`user_id`, `email_privacy`, `updated_at`) VALUES
(1, 2, '2017-06-05 23:27:01'),
(2, 2, '2017-06-05 23:27:21'),
(3, 2, '2017-05-31 14:36:04'),
(5, 2, '2017-06-05 23:28:17'),
(13, 2, '2017-06-05 23:27:52'),
(14, 2, '2017-06-05 23:35:26'),
(15, 2, '2017-05-31 14:36:31'),
(18, 2, '2017-06-06 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_from` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `opened` int(1) NOT NULL,
  `opened_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recipient_del` int(1) NOT NULL,
  `sender_del` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `sent_at`, `msg_from`, `msg_to`, `opened`, `opened_at`, `recipient_del`, `sender_del`) VALUES
(1, 'Σήμερα έκανα κοπάνα.', '2017-06-14 09:58:08', 1, 2, 1, '2017-06-14 10:10:28', 0, 0),
(2, 'Και πολύ καλά έκανες!', '2017-06-14 12:24:27', 2, 1, 0, '2017-06-14 18:36:12', 0, 0),
(3, 'Από τον Ηλία στον Δημήτρη', '2017-06-14 12:38:16', 5, 1, 1, '2017-06-18 20:17:25', 0, 0),
(4, 'Από τον Δημήτρη στον Ηλία', '2017-06-14 12:38:40', 1, 5, 1, '2017-06-14 12:38:40', 0, 0),
(5, 'Από τη Βάνα στον Ηλία', '2017-06-14 12:39:39', 2, 5, 0, '2017-06-14 12:39:39', 0, 0),
(6, 'Από τον Ηλία στη Βάνα', '2017-06-14 12:39:57', 5, 2, 1, '2017-06-18 15:26:39', 0, 0),
(7, 'Από τη Φωτεινή στον Δημήτρη', '2017-06-14 13:15:08', 3, 1, 1, '2017-06-18 20:17:30', 0, 0),
(8, 'Από τον Δημήτρη στην Φωτεινή ', '2017-06-14 14:31:03', 1, 3, 1, '2017-06-14 14:31:03', 0, 0),
(9, 'Όλα καλά με τον Κωστάκη; χαχαχαχα!', '2017-06-14 17:12:48', 1, 2, 1, '2017-06-14 18:37:44', 0, 1),
(10, 'Δεν πα να γαμηθεί κι αυτός ο μαλάκας!', '2017-06-14 18:37:14', 2, 1, 0, NULL, 1, 0),
(11, 'Μου τα ''χει ζαλίσει κανονικά...', '2017-06-14 18:37:41', 2, 1, 1, '2017-06-20 02:04:47', 0, 0),
(12, 'Κατερινάκι μου τι κάνεις;', '2017-06-14 19:25:54', 1, 13, 1, NULL, 0, 0),
(13, 'Όλα καλά;', '2017-06-14 19:29:46', 1, 13, 1, '2017-06-16 07:31:32', 0, 0),
(22, 'Τώρα μπήκα σπίτι', '2017-06-14 22:22:39', 13, 1, 1, '2017-06-18 20:17:30', 0, 0),
(23, 'Καλημέρα', '2017-06-15 05:48:22', 1, 2, 1, '2017-06-19 08:14:21', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE `months` (
  `id` tinyint(2) NOT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `month_abr` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `month_abr`) VALUES
(1, 'Ιανουάριος', 'Ιαν'),
(2, 'Φεβρουάριος', 'Φεβ'),
(3, 'Μάρτιος', 'Μαρ'),
(4, 'Απρίλιος', 'Απρ'),
(5, 'Μάιος', 'Μαϊ'),
(6, 'Ιούνιος', 'Ιουν'),
(7, 'Ιούλιος', 'Ιουλ'),
(8, 'Αύγουστος', 'Αυγ'),
(9, 'Σεπτέμβριος', 'Σεπ'),
(10, 'Οκτώβριος', 'Οκτ'),
(11, 'Νοέμβριος', 'Νοε'),
(12, 'Δεκέμβριιος', 'Δεκ');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`user_id`, `phone_number`, `phone_privacy`, `updated_at`) VALUES
(1, '6945370529', 2, '2017-06-05 00:36:08'),
(13, '+306972594180', 2, '2017-06-11 07:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `photoposts`
--

DROP TABLE IF EXISTS `photoposts`;
CREATE TABLE `photoposts` (
  `id` int(11) NOT NULL,
  `photopost_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photopost_thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photopost_src` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photopost_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photoposts`
--

INSERT INTO `photoposts` (`id`, `photopost_title`, `photopost_thumb`, `photopost_src`, `photopost_path`, `post_id`) VALUES
(2, 'Gustav Klimt: The tree of life', 'users/timeline/12935/thumb_The-Tree-Of-Life.jpg', 'users/timeline/12935/The-Tree-Of-Life.jpg', '../users/timeline/12935/', 6),
(5, 'Pablo Picasso', 'users/timeline/24187/thumb_Guernica-1937-image-via-jkrwebcom.jpg', 'users/timeline/24187/Guernica-1937-image-via-jkrwebcom.jpg', '../users/timeline/24187/', 7),
(11, 'Ryoji Ikeda: The Transfinite', 'users/timeline/31447/thumb_dbox_recent-photography_ryoji-ikeda_the-transfinite_mini.jpg', 'users/timeline/31447/dbox_recent-photography_ryoji-ikeda_the-transfinite_mini.jpg', '../users/timeline/31447/', 10),
(13, 'Το μέγεθος μετράει;', 'users/timeline/30907/thumb_ORIGINAL-funny-valentines-day-cards-dictator-ben-kling-10.jpg', 'users/timeline/30907/ORIGINAL-funny-valentines-day-cards-dictator-ben-kling-10.jpg', '../users/timeline/30907/', 34),
(16, 'Amazing Architecture?', 'users/timeline/19355/thumb_rn-03.jpg', 'users/timeline/19355/rn-03.jpg', '../users/timeline/19355/', 37),
(17, 'Dubrovnik ', 'users/timeline/21289/thumb_dubrovnik-coastline-croatia-1440x960.jpg', 'users/timeline/21289/dubrovnik-coastline-croatia-1440x960.jpg', '../users/timeline/21289/', 38);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `img_thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_src` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_desc` text COLLATE utf8_unicode_ci,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img_privacy` tinyint(1) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `img_thumb`, `img_src`, `img_title`, `img_desc`, `uploaded_by`, `uploaded_at`, `img_privacy`, `album_id`) VALUES
(12, 'users/covers/thumbs/12141808_10153668611392964_7271658304547479619_n.jpg', 'users/covers/12141808_10153668611392964_7271658304547479619_n.jpg', NULL, NULL, 1, '2017-06-06 19:40:39', 0, 2),
(13, 'users/covers/thumbs/552616_10151006339583555_673577249_n.jpg', 'users/covers/552616_10151006339583555_673577249_n.jpg', NULL, NULL, 2, '2017-06-06 19:59:34', 0, 3),
(15, 'users/profiles/thumbs/nikos_panoskaltsis.jpg', 'users/profiles/nikos_panoskaltsis.jpg', NULL, NULL, 18, '2017-06-07 03:54:21', 0, 5),
(16, 'users/profiles/thumbs/Vergados_Dimitrios_b.jpg', 'users/profiles/Vergados_Dimitrios_b.jpg', NULL, NULL, 1, '2017-06-07 04:14:58', 0, 6),
(17, 'users/profiles/thumbs/vana_stergiou.png', 'users/profiles/vana_stergiou.png', NULL, NULL, 2, '2017-06-07 04:14:58', 0, 7),
(23, 'users/covers/thumbs/12471715_10207337738496685_6252088187534488663_o.jpg', 'users/covers/12471715_10207337738496685_6252088187534488663_o.jpg', NULL, NULL, 18, '2017-06-07 04:22:24', 0, 13),
(24, 'users/covers/thumbs/hand-abstract-art-facebook-cover-photo.jpg', 'users/covers/hand-abstract-art-facebook-cover-photo.jpg', NULL, NULL, 1, '2017-06-07 17:44:25', 0, 2),
(25, 'users/covers/thumbs/wilson-cover.jpg', 'users/covers/wilson-cover.jpg', NULL, NULL, 1, '2017-06-10 23:12:04', 1, 2),
(26, 'users/covers/thumbs/2014-11-26-TheOldWoman3_credit_Courtesy.jpg', 'users/covers/2014-11-26-TheOldWoman3_credit_Courtesy.jpg', NULL, NULL, 1, '2017-06-07 18:04:54', 0, 2),
(33, 'users/uploads/16678/thumb_21883946841_bf3886cac1_k.jpg', 'users/uploads/16678/21883946841_bf3886cac1_k.jpg', 'Oedipus 2+2 | Open Theater 2007', 'Konstantinos Yiannakopoulos as Creon', 1, '2017-06-10 19:39:56', 1, 18),
(34, 'users/uploads/16678/thumb_21884053671_95bb8b811b_k.jpg', 'users/uploads/16678/21884053671_95bb8b811b_k.jpg', 'Oedipus 2+2', 'A theatrical show directed by Dimitrios Vergados in 2007', 1, '2017-06-09 17:02:48', 1, 18),
(35, 'users/uploads/16678/thumb_21884215931_0324a750fe_k.jpg', 'users/uploads/16678/21884215931_0324a750fe_k.jpg', 'Oedipus 2+2', 'A theatrical show directed by Dimitrios Vergados in 2007', 1, '2017-06-09 17:02:58', 1, 18),
(36, 'users/covers/thumbs/11156356_1100800899946478_9179000002999197732_n.jpg', 'users/covers/11156356_1100800899946478_9179000002999197732_n.jpg', NULL, NULL, 5, '2017-06-09 18:27:29', 0, 19),
(56, 'users/uploads/13919/thumb_22549646118_3d52cc675b_k.jpg', 'users/uploads/13919/22549646118_3d52cc675b_k.jpg', 'Dourgouti Island Hotel', 'A promenade performance directed by Giorgos Sahinis in 2015', 1, '2017-06-09 19:07:49', 1, 25),
(57, 'users/uploads/13919/thumb_22575800529_8d095f3aba_o.jpg', 'users/uploads/13919/22575800529_8d095f3aba_o.jpg', 'Dourgouti Island Hotel', 'A promenade performance directed by Giorgos Sahinis in 2015', 1, '2017-06-09 19:07:49', 1, 25),
(58, 'users/uploads/13919/thumb_22979090591_3299a22f33_k.jpg', 'users/uploads/13919/22979090591_3299a22f33_k.jpg', 'Dourgouti Island Hotel', 'A promenade performance directed by Giorgos Sahinis in 2015', 1, '2017-06-09 19:07:49', 1, 25),
(61, 'users/covers/thumbs/4437720-sky-wallpapers.png', 'users/covers/4437720-sky-wallpapers.png', NULL, NULL, 13, '2017-06-11 08:29:18', 0, 28),
(62, 'users/profiles/thumbs/fotini_timotheou.jpg', 'users/profiles/fotini_timotheou.jpg', NULL, NULL, 3, '2017-06-11 11:31:53', 0, 29),
(63, 'users/profiles/thumbs/elias_dapoulakis.jpg', 'users/profiles/elias_dapoulakis.jpg', NULL, NULL, 5, '2017-06-11 11:31:53', 0, 30),
(64, 'users/profiles/thumbs/katerina_chalkou.jpg', 'users/profiles/katerina_chalkou.jpg', NULL, NULL, 13, '2017-06-11 11:31:53', 0, 31),
(65, 'users/profiles/thumbs/eleni_koumoura.jpg', 'users/profiles/eleni_koumoura.jpg', NULL, NULL, 14, '2017-06-11 11:31:53', 0, 32),
(66, 'users/profiles/thumbs/dimitris_fragioglou.jpg', 'users/profiles/dimitris_fragioglou.jpg', NULL, NULL, 15, '2017-06-11 11:31:53', 0, 33);

-- --------------------------------------------------------

--
-- Table structure for table `postcat`
--

DROP TABLE IF EXISTS `postcat`;
CREATE TABLE `postcat` (
  `id` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `postcat`
--

INSERT INTO `postcat` (`id`, `category`) VALUES
(1, 'text'),
(2, 'photo'),
(3, 'video'),
(4, 'youtube'),
(5, 'vimeo'),
(6, 'link');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `posted_to` int(11) NOT NULL,
  `post_city` int(11) DEFAULT NULL,
  `post_country` int(11) DEFAULT NULL,
  `post_cat` int(11) NOT NULL,
  `post_privacy` tinyint(1) NOT NULL,
  `post_hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_at`, `added_by`, `posted_to`, `post_city`, `post_country`, `post_cat`, `post_privacy`, `post_hide`) VALUES
(1, 'Αυτή είναι η πρώτη μου δημοσίευση...', '2017-06-17 12:50:16', 1, 1, NULL, 86, 1, 1, 0),
(2, 'Second post', '2017-06-17 12:54:36', 1, 1, 1, 86, 1, 1, 0),
(4, 'Βάνα γεια σου', '2017-06-17 21:30:18', 1, 2, 1, 86, 1, 1, 0),
(6, 'Gustan Klimt: ένας από τους μεγαλύτερους ζωγράφους όλων των εποχών...', '2017-06-17 23:56:18', 1, 1, 1, 86, 2, 1, 0),
(7, 'Picasso και ξερό ψωμί!', '2017-06-18 00:17:37', 1, 1, 1, 86, 2, 1, 0),
(10, 'Ryoji Ikeda: τον χειμώνα από την Στέγη στην Αθήνα', '2017-06-18 01:33:33', 1, 2, 1, 86, 2, 1, 0),
(14, 'Pina Bausch: ήταν τεράστιο δώρο να προλάβω να την δω...', '2017-06-18 01:56:38', 1, 1, 1, 86, 3, 1, 0),
(15, 'Ολόκληρο, μισό ή ένα;', '2017-06-18 02:18:02', 1, 2, 1, 86, 3, 1, 0),
(16, 'Dead can dance', '2017-06-18 02:28:56', 1, 1, 1, 86, 4, 1, 0),
(21, 'Ready to make sense of anyone, anything', '2017-06-18 08:41:54', 1, 2, 1, 86, 4, 1, 0),
(22, 'Baby, did you forget to take your meds? ', '2017-06-18 08:52:42', 1, 1, 1, 86, 5, 1, 0),
(24, ' Placebo - The Innocence Of Sleep', '2017-06-18 09:00:14', 1, 2, 1, 86, 5, 1, 0),
(25, 'Bjork - Pagan Poetry', '2017-06-18 09:03:20', 1, 2, 1, 86, 5, 1, 0),
(28, 'Δέκα σπάνια βίντεο του Μάνου Χατζιδάκι', '2017-06-19 16:08:57', 1, 1, 1, 86, 6, 1, 0),
(29, 'Athens Photo Festival 2017', '2017-06-18 09:27:04', 1, 2, 1, 86, 6, 1, 0),
(30, 'Λένα Κιτσοπούλου: η Αθηναία της εβδομάδας', '2017-06-18 09:32:24', 1, 2, 1, 86, 6, 1, 0),
(31, 'Τι κάθαρμα που είσαι, τι μαχαιριά χρυσή!', '2017-06-18 11:49:55', 2, 2, 1, 86, 4, 1, 0),
(32, 'Πλησιάζει η Ημέρα της Κρίσης!!!', '2017-06-18 13:26:13', 1, 2, 1, 86, 1, 1, 0),
(34, 'Περί μεγέθους ο λόγος...', '2017-06-18 22:00:11', 2, 2, 1, 86, 2, 1, 0),
(37, 'Συμμετρικό, χρωματιστό αλλά η κάμερα στο κέντρο Ελενίτσα...', '2017-06-19 18:22:52', 1, 2, 1, 86, 2, 1, 0),
(38, 'Εκεί θα σε πάω Βέργαδε!  Λίγες μείνανε...', '2017-06-19 18:44:59', 2, 1, 1, 86, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

DROP TABLE IF EXISTS `professions`;
CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profession_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `user_id`, `profession_desc`, `profession_privacy`, `updated_at`) VALUES
(1, 1, 'Boussias Communications, Proof Editor', 1, '2017-06-04 14:45:03'),
(3, 1, 'Railway Carriage Theatre "to Treno sto Rouf"', 1, '2017-06-16 15:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
CREATE TABLE `relationship` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `action_id` int(11) NOT NULL,
  `rel_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`user1_id`, `user2_id`, `status`, `action_id`, `rel_date`) VALUES
(1, 2, 1, 2, '2017-04-29 08:20:35'),
(1, 3, 1, 3, '2017-04-29 08:56:15'),
(1, 14, 1, 14, '2017-06-11 11:01:51'),
(1, 18, 1, 18, '2017-06-07 08:42:00'),
(5, 1, 1, 1, '2017-04-27 11:31:27'),
(5, 2, 1, 2, '2017-04-29 15:27:53'),
(5, 3, 1, 3, '2017-04-29 08:56:15'),
(13, 1, 1, 1, '2017-04-29 09:29:08'),
(13, 2, 1, 2, '2017-04-29 15:22:38'),
(13, 14, 1, 14, '2017-04-29 10:02:57'),
(14, 2, 1, 2, '2017-04-29 15:22:38'),
(14, 5, 1, 5, '2017-04-29 10:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2017-04-18 16:14:40', '0000-00-00 00:00:00'),
(2, 'user', 'Normal User', '2017-04-18 16:14:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `login_time`, `online`) VALUES
(7, 3, '2017-06-19 14:19:26', 0),
(8, 5, '2017-06-19 14:20:02', 0),
(9, 14, '2017-06-19 14:20:39', 1),
(10, 18, '2017-06-19 14:20:39', 1),
(25, 1, '2017-06-20 02:15:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sexprivacy`
--

DROP TABLE IF EXISTS `sexprivacy`;
CREATE TABLE `sexprivacy` (
  `user_id` int(11) NOT NULL,
  `sex_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sexprivacy`
--

INSERT INTO `sexprivacy` (`user_id`, `sex_privacy`, `updated_at`) VALUES
(1, 0, '2017-06-05 08:21:21'),
(2, 0, '2017-06-05 08:07:12'),
(3, 0, '2017-06-05 08:07:30'),
(5, 0, '2017-06-05 08:07:30'),
(13, 0, '2017-06-05 08:07:45'),
(14, 0, '2017-06-05 08:07:45'),
(15, 0, '2017-06-05 08:07:53'),
(18, 0, '2017-06-06 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

DROP TABLE IF EXISTS `studies`;
CREATE TABLE `studies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `study_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`id`, `user_id`, `study_desc`, `study_privacy`, `updated_at`) VALUES
(3, 1, 'National and Kapodistrian University of Athens', 1, '2017-06-04 14:43:17'),
(4, 1, '"Veaki" Drama School', 1, '2017-06-03 12:32:29'),
(5, 13, 'National and Kapodistrian University of Athens - Department of History and Archaeology', 1, '2017-06-11 07:54:29'),
(6, 13, 'Veaki Drama School', 1, '2017-06-11 07:54:29'),
(7, 13, 'University of Patras - Department of Theatre Studies', 1, '2017-06-11 07:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT '2',
  `last_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `day_id` tinyint(2) NOT NULL,
  `month_id` tinyint(2) NOT NULL,
  `year_id` tinyint(4) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `last_name`, `first_name`, `email`, `password`, `day_id`, `month_id`, `year_id`, `sex`, `city_id`, `country_id`, `avatar`, `created_at`, `updated_at`, `token`) VALUES
(1, 2, 'Vergados', 'Dimitrios', 'dimbergy@gmail.com', '2dea550bc0a5b435dad1ecc9ed0176f4', 28, 4, 48, 1, 1, 86, 'users/profiles/thumbs/Vergados_Dimitrios_b.jpg', '2017-04-18 16:19:35', '2017-06-02 08:15:20', ''),
(2, 2, 'Stergiou', 'Vana', 'vana.stergiou@gmail.com', '93ef81a1cdd8f0833c9190edab3d11fa', 24, 5, 35, 2, 1, 86, 'users/profiles/thumbs/vana_stergiou.png', '2017-04-18 18:45:25', '2017-04-18 18:45:25', NULL),
(3, 2, 'Timotheou', 'Fotini', 'f.timotheou@hotmail.com', 'f8183fb6499114db4d43bcfccbe68f00', 6, 2, 35, 2, 2, 86, 'users/profiles/thumbs/fotini_timotheou.jpg', '2017-04-18 18:49:35', '2017-04-18 18:49:35', NULL),
(5, 2, 'ΔΑΠΟΥΛΑΚΗΣ', 'ΗΛΙΑΣ', 'elias.dapoulakis@yahoo.com', 'e220f645fb512ac74898a17224997b92', 16, 3, 47, 1, 1, 86, 'users/profiles/thumbs/elias_dapoulakis.jpg', '2017-04-27 08:55:15', '2017-04-27 08:55:15', NULL),
(13, 2, 'Chalkou', 'Katerina', 'aechalkou@gmail.com', 'a17e3b9506f85bb9370b4077f553e4c0', 18, 2, 47, 2, 1, 86, 'users/profiles/thumbs/katerina_chalkou.jpg', '2017-04-28 11:58:34', '2017-04-28 11:58:34', NULL),
(14, 2, 'Koumoura', 'Eleni', 'e.koumoura@hotmail.com', 'd83d9e5acadb74e79cf35f29d17b0c3c', 10, 7, 46, 2, 1, 86, 'users/profiles/thumbs/eleni_koumoura.jpg', '2017-04-28 12:04:20', '2017-04-28 12:04:20', NULL),
(15, 2, 'Frangioglou', 'Dimitris', 'd.fragioglou@gmail.com', '9cabf71dbb847736f64c699b662f04dd', 30, 8, 52, 1, 1, 86, 'users/profiles/thumbs/dimitris_fragioglou.jpg', '2017-04-28 17:37:03', '2017-04-28 17:37:03', NULL),
(18, 2, 'Panoskaltsis', 'Nikos', 'nikos.pan@gmail.com', 'e5c40f11488911787d2a024d0c0cfe26', 29, 8, 32, 1, 1, 86, 'users/profiles/thumbs/nikos_panoskaltsis.jpg', '2017-06-06 00:09:21', '2017-06-07 06:27:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videoposts`
--

DROP TABLE IF EXISTS `videoposts`;
CREATE TABLE `videoposts` (
  `id` int(11) NOT NULL,
  `videopost_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `videopost_src` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `videopost_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videoposts`
--

INSERT INTO `videoposts` (`id`, `videopost_title`, `videopost_src`, `videopost_path`, `post_id`) VALUES
(1, 'Pina Bausch - Jun Miyake / Lillies Of The Valley', 'users/videos/18375.mp4', 'users/videos/', 14),
(4, 'The story of the missing piece', 'users/videos/3609.mp4', 'users/videos/', 15);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_src` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `video_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `video_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `video_city` int(11) DEFAULT NULL,
  `video_country` int(11) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `video_privacy` tinyint(1) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_src`, `video_path`, `video_title`, `video_desc`, `video_city`, `video_country`, `uploaded_by`, `uploaded_at`, `video_privacy`, `album_id`) VALUES
(1, 'users/videos/4327.mp4', 'users/videos/', 'Primal Matter', 'Video editing by Dimitrios Vergados on Dimitris'' Papaioannou "Primal Matter" promo video', 1, 86, 1, '2017-06-10 09:35:05', 1, 6),
(2, 'users/videos/18180.mp4', 'users/videos/', 'Πιάνο Βυθού', 'Sound design by Dimitrios Vergados, based on a poem by Yiannis Varveris', 1, 86, 1, '2017-06-10 09:39:22', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

DROP TABLE IF EXISTS `websites`;
CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `website_privacy` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `website_link`, `website_privacy`, `updated_at`) VALUES
(1, 1, 'http://www.noitigrammi.gr/', 1, '2017-06-04 14:41:57'),
(2, 1, 'http://www.diplareios.edu.gr/', 1, '2017-06-04 13:32:50'),
(3, 1, 'https://totrenostorouf.gr/', 1, '2017-06-04 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE `years` (
  `id` tinyint(4) NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`) VALUES
(1, '2017'),
(2, '2016'),
(3, '2015'),
(4, '2014'),
(5, '2013'),
(6, '2012'),
(7, '2011'),
(8, '2010'),
(9, '2009'),
(10, '2008'),
(11, '2007'),
(12, '2006'),
(13, '2005'),
(14, '2004'),
(15, '2003'),
(16, '2002'),
(17, '2001'),
(18, '2000'),
(19, '1999'),
(20, '1998'),
(21, '1997'),
(22, '1996'),
(23, '1995'),
(24, '1994'),
(25, '1993'),
(26, '1992'),
(27, '1991'),
(28, '1990'),
(29, '1989'),
(30, '1988'),
(31, '1987'),
(32, '1986'),
(33, '1985'),
(34, '1984'),
(35, '1983'),
(36, '1982'),
(37, '1981'),
(38, '1980'),
(39, '1979'),
(40, '1978'),
(41, '1977'),
(42, '1976'),
(43, '1975'),
(44, '1974'),
(45, '1973'),
(46, '1972'),
(47, '1971'),
(48, '1970'),
(49, '1969'),
(50, '1968'),
(51, '1967'),
(52, '1966'),
(53, '1965'),
(54, '1964'),
(55, '1963'),
(56, '1962'),
(57, '1961'),
(58, '1960'),
(59, '1959'),
(60, '1958'),
(61, '1957'),
(62, '1956'),
(63, '1955'),
(64, '1954'),
(65, '1953'),
(66, '1952'),
(67, '1951'),
(68, '1950'),
(69, '1949'),
(70, '1948'),
(71, '1947'),
(72, '1946'),
(73, '1945'),
(74, '1944'),
(75, '1943'),
(76, '1942'),
(77, '1941'),
(78, '1940'),
(79, '1939'),
(80, '1938'),
(81, '1937'),
(82, '1936'),
(83, '1935'),
(84, '1934'),
(85, '1933'),
(86, '1932'),
(87, '1931'),
(88, '1930');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumcat`
--
ALTER TABLE `albumcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`,`created_by`,`created_at`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `album_cat` (`album_cat`),
  ADD KEY `album_city` (`album_city`),
  ADD KEY `album_country` (`album_country`);

--
-- Indexes for table `bcity`
--
ALTER TABLE `bcity`
  ADD PRIMARY KEY (`user_id`,`city_id`,`updated_at`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `bcountry`
--
ALTER TABLE `bcountry`
  ADD PRIMARY KEY (`user_id`,`country_id`,`updated_at`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `bdaymonthprivacy`
--
ALTER TABLE `bdaymonthprivacy`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `birthplace`
--
ALTER TABLE `birthplace`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `byearprivacy`
--
ALTER TABLE `byearprivacy`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_photos`
--
ALTER TABLE `comments_photos`
  ADD PRIMARY KEY (`id`,`photo_id`),
  ADD KEY `photocom_by` (`photocom_by`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `comments_posts`
--
ALTER TABLE `comments_posts`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD KEY `com_by` (`com_by`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `comments_videos`
--
ALTER TABLE `comments_videos`
  ADD PRIMARY KEY (`id`,`video_id`),
  ADD KEY `videocom_by` (`videocom_by`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_from` (`req_from`),
  ADD KEY `req_to` (`req_to`);

--
-- Indexes for table `homeplace`
--
ALTER TABLE `homeplace`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `linkposts`
--
ALTER TABLE `linkposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `mailprivacy`
--
ALTER TABLE `mailprivacy`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`,`sent_at`),
  ADD KEY `msg_from` (`msg_from`),
  ADD KEY `msg_to` (`msg_to`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`user_id`,`phone_number`,`updated_at`);

--
-- Indexes for table `photoposts`
--
ALTER TABLE `photoposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`,`uploaded_by`,`uploaded_at`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `postcat`
--
ALTER TABLE `postcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `posted_to` (`posted_to`),
  ADD KEY `post_cat` (`post_cat`),
  ADD KEY `post_city` (`post_city`),
  ADD KEY `post_country` (`post_country`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`,`user_id`,`updated_at`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`user1_id`,`user2_id`,`rel_date`),
  ADD KEY `user2_id` (`user2_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`user_id`,`login_time`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sexprivacy`
--
ALTER TABLE `sexprivacy`
  ADD PRIMARY KEY (`user_id`,`updated_at`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`,`user_id`,`updated_at`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `month_id` (`month_id`),
  ADD KEY `year_id` (`year_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `videoposts`
--
ALTER TABLE `videoposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`,`uploaded_by`,`uploaded_at`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `video_city` (`video_city`),
  ADD KEY `video_country` (`video_country`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`,`user_id`,`updated_at`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumcat`
--
ALTER TABLE `albumcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments_photos`
--
ALTER TABLE `comments_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments_posts`
--
ALTER TABLE `comments_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comments_videos`
--
ALTER TABLE `comments_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `linkposts`
--
ALTER TABLE `linkposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `photoposts`
--
ALTER TABLE `photoposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `postcat`
--
ALTER TABLE `postcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `videoposts`
--
ALTER TABLE `videoposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`album_cat`) REFERENCES `albumcat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums_ibfk_3` FOREIGN KEY (`album_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums_ibfk_4` FOREIGN KEY (`album_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bcity`
--
ALTER TABLE `bcity`
  ADD CONSTRAINT `bcity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bcity_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bcountry`
--
ALTER TABLE `bcountry`
  ADD CONSTRAINT `bcountry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bcountry_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bdaymonthprivacy`
--
ALTER TABLE `bdaymonthprivacy`
  ADD CONSTRAINT `bdaymonthprivacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `birthplace`
--
ALTER TABLE `birthplace`
  ADD CONSTRAINT `birthplace_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `byearprivacy`
--
ALTER TABLE `byearprivacy`
  ADD CONSTRAINT `byearprivacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_photos`
--
ALTER TABLE `comments_photos`
  ADD CONSTRAINT `comments_photos_ibfk_1` FOREIGN KEY (`photocom_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_photos_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_posts`
--
ALTER TABLE `comments_posts`
  ADD CONSTRAINT `comments_posts_ibfk_1` FOREIGN KEY (`com_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_videos`
--
ALTER TABLE `comments_videos`
  ADD CONSTRAINT `comments_videos_ibfk_1` FOREIGN KEY (`videocom_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_videos_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`req_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`req_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homeplace`
--
ALTER TABLE `homeplace`
  ADD CONSTRAINT `homeplace_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `linkposts`
--
ALTER TABLE `linkposts`
  ADD CONSTRAINT `linkposts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mailprivacy`
--
ALTER TABLE `mailprivacy`
  ADD CONSTRAINT `mailprivacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`msg_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`msg_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photoposts`
--
ALTER TABLE `photoposts`
  ADD CONSTRAINT `photoposts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photos_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`posted_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`post_cat`) REFERENCES `postcat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`post_city`) REFERENCES `users` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`post_country`) REFERENCES `users` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professions`
--
ALTER TABLE `professions`
  ADD CONSTRAINT `professions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relationship_ibfk_3` FOREIGN KEY (`action_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sexprivacy`
--
ALTER TABLE `sexprivacy`
  ADD CONSTRAINT `sexprivacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videoposts`
--
ALTER TABLE `videoposts`
  ADD CONSTRAINT `videoposts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`video_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_3` FOREIGN KEY (`video_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
