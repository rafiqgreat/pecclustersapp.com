-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 04:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pecclusterappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

CREATE TABLE `ci_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_supper` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_supper`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(25, 1, 'admin', 'Admin', 'User', 'admin@admin.com', '544354353', '', '$2y$10$IEPxV1SzcjpQAMEcBbehje9Ewq8ffG1MA.TAzPmR/GmRAJi5FsQm2', '2019-01-09 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-07-08 10:07:11'),
(32, 0, 'codeglamour', 'Code', 'Glamour', 'codeglamour1@gmail.com', '', '', '$2y$10$IEPxV1SzcjpQAMEcBbehje9Ewq8ffG1MA.TAzPmR/GmRAJi5FsQm2', '0000-00-00 00:00:00', 0, 1, 1, 0, 'd395771085aab05244a4fb8fd91bf4ee', '', '', '2019-07-09 08:07:10', '2019-07-09 08:07:10'),
(34, 2, 'AdbuBakar', 'Abu', 'Bakar', 'mabubakar99@gmail.com', '03134732807', '', '$2y$10$c79PXGrBJA2mISsF3VCpG.wSxrkLTF7DY6QYXLSqdiV3HczfpsBpC', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2022-02-26 00:00:00', '2022-02-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_clustercenter`
--

CREATE TABLE `ci_clustercenter` (
  `cc_id` int(11) NOT NULL,
  `cc_username` varchar(255) DEFAULT NULL,
  `cc_password` varchar(255) DEFAULT NULL,
  `cc_department` char(27) DEFAULT NULL,
  `cc_type` enum('CLUSTER','PEF') DEFAULT NULL,
  `cc_name` varchar(255) DEFAULT NULL,
  `cc_address` varchar(255) DEFAULT NULL,
  `cc_district_id` int(11) DEFAULT NULL,
  `cc_tehsil_id` int(11) DEFAULT NULL,
  `cc_level` char(48) DEFAULT NULL,
  `cc_gender` char(18) DEFAULT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `cc_phone` varchar(255) DEFAULT NULL,
  `cc_location` char(15) DEFAULT NULL,
  `cc_contact_name` varchar(255) NOT NULL,
  `cc_contact_mobile` varchar(255) NOT NULL,
  `cc_status` tinyint(1) DEFAULT NULL,
  `cc_is_verify` tinyint(1) NOT NULL DEFAULT 0,
  `cc_verify_code` varchar(255) NOT NULL,
  `cc_createdby` int(11) DEFAULT NULL,
  `cc_created` datetime DEFAULT NULL,
  `cc_last_ip` varchar(255) DEFAULT NULL,
  `cc_last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_clusterschool`
--

CREATE TABLE `ci_clusterschool` (
  `cs_id` int(11) NOT NULL,
  `cs_type` enum('CLUSTER','PEF') DEFAULT NULL,
  `cs_name` varchar(255) DEFAULT NULL,
  `cs_address` varchar(255) DEFAULT NULL,
  `cs_district_id` int(11) DEFAULT NULL,
  `cs_tehsil_id` int(11) DEFAULT NULL,
  `cs_level` char(48) DEFAULT NULL,
  `cs_gender` char(18) DEFAULT NULL,
  `cs_email` varchar(255) DEFAULT NULL,
  `cs_phone` varchar(255) DEFAULT NULL,
  `cs_location` char(15) DEFAULT NULL,
  `cs_contact_name` varchar(255) NOT NULL,
  `cs_contact_mobile` varchar(255) NOT NULL,
  `cs_status` tinyint(1) DEFAULT NULL,
  `cs_is_verify` tinyint(1) NOT NULL DEFAULT 0,
  `cs_verify_code` varchar(255) NOT NULL,
  `cs_createdby` int(11) DEFAULT NULL,
  `cs_created` datetime DEFAULT NULL,
  `cs_last_ip` varchar(255) DEFAULT NULL,
  `cs_last_login` datetime DEFAULT NULL,
  `cs_parent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_clusterschool`
--

INSERT INTO `ci_clusterschool` (`cs_id`, `cs_type`, `cs_name`, `cs_address`, `cs_district_id`, `cs_tehsil_id`, `cs_level`, `cs_gender`, `cs_email`, `cs_phone`, `cs_location`, `cs_contact_name`, `cs_contact_mobile`, `cs_status`, `cs_is_verify`, `cs_verify_code`, `cs_createdby`, `cs_created`, `cs_last_ip`, `cs_last_login`, `cs_parent`) VALUES
(2, 'CLUSTER', 'GHS Roza Peer Abu Ishaq', 'Moang Lahore', 17, 68, 'Primary', 'MALE', 'mabubakar99@gmail.com', '03134732807', 'URBAN', 'Abu Bakar', '03134732807', 1, 0, '', 25, NULL, NULL, NULL, NULL),
(3, 'PEF', 'GHS Roza Peer Abu Ishaqs', 'Moang Lahores', 17, 68, 'Primary', 'MALE', 'mabubakar99s@gmail.com', '03134732807', 'URBAN', 'Abu Bakars', '03134732807', 1, 0, '', 25, NULL, NULL, NULL, 2),
(4, 'PEF', 'GHS Roza Peer Abu Ishaqssss', 'Moang Lahoressss', 17, 68, 'Primary', 'MALE', 'mabubakar99s@gmail.com', '03134732807', 'URBAN', 'Abu Bakar1111', '03134732807', 1, 0, '', 25, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_districts`
--

CREATE TABLE `ci_districts` (
  `district_id` int(11) NOT NULL,
  `district_code` int(11) DEFAULT NULL,
  `district_name_en` varchar(255) DEFAULT NULL,
  `district_name_ur` varchar(255) DEFAULT NULL,
  `district_latitude` varchar(150) DEFAULT NULL,
  `district_longitude` varchar(150) DEFAULT NULL,
  `district_sort` int(11) DEFAULT 0,
  `district_status` tinyint(1) DEFAULT 1,
  `district_created` datetime DEFAULT NULL,
  `district_createdby` int(11) DEFAULT NULL,
  `district_updated` datetime DEFAULT NULL,
  `district_updatedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_districts`
--

INSERT INTO `ci_districts` (`district_id`, `district_code`, `district_name_en`, `district_name_ur`, `district_latitude`, `district_longitude`, `district_sort`, `district_status`, `district_created`, `district_createdby`, `district_updated`, `district_updatedby`) VALUES
(1, 61, 'ATTOCK', 'اٹک', '0', '0', 0, 1, '2021-05-28 09:03:37', 0, '2021-05-28 09:03:37', NULL),
(2, 62, 'BAHAWALNAGAR', 'بہاولنگر', '0', '0', 0, 1, '2021-05-28 09:05:24', 0, '2021-05-28 09:05:24', NULL),
(3, 63, 'BAHAWALPUR', 'بہاولپور', '0', '0', 0, 1, '2021-05-28 09:06:11', 0, '2021-05-28 09:06:11', NULL),
(4, 64, 'BHAKKAR', 'بھکر', '0', '0', 0, 1, '2021-05-28 09:06:53', 0, '2021-05-28 09:06:53', NULL),
(5, 65, 'CHAKWAL', 'چکوال', '0', '0', 0, 1, '2021-05-28 09:08:25', 0, '2021-05-28 09:08:25', NULL),
(6, 66, 'CHINIOT', 'چنیوٹ', '0', '0', 0, 1, '2021-05-28 09:09:15', 0, '2021-05-28 09:09:15', NULL),
(7, 67, 'D.G. KHAN', 'ڈیرہ غازی خان', '0', '0', 0, 1, '2021-05-28 09:10:15', 0, '2021-05-28 09:10:15', NULL),
(8, 68, 'FAISALABAD', 'فیصل آباد', '0', '0', 0, 1, '2021-05-28 09:11:53', 0, '2021-05-28 09:11:53', NULL),
(9, 69, 'GUJRANWALA', 'گجرانوالہ', '0', '0', 0, 1, '2021-05-28 09:12:42', 0, '2021-05-28 09:12:42', NULL),
(10, 70, 'GUJRAT', 'گجرات', '0', '0', 0, 1, '2021-05-28 09:13:08', 0, '2021-05-28 09:13:08', NULL),
(11, 71, 'HAFIZABAD', 'حافظ آباد', '0', '0', 0, 1, '2021-05-28 09:14:26', 0, '2021-05-28 09:14:26', NULL),
(12, 72, 'JHANG', 'جھنگ', '0', '0', 0, 1, '2021-05-28 09:15:41', 0, '2021-05-28 09:15:41', NULL),
(13, 73, 'JHELUM', 'جہلم', '0', '0', 0, 1, '2021-05-28 09:16:20', 0, '2021-05-28 09:16:20', NULL),
(14, 74, 'KASUR', 'قصور', '0', '0', 0, 1, '2021-05-28 09:17:49', 0, '2021-05-28 09:17:49', NULL),
(15, 75, 'KHANEWAL', 'خانیوال', '0', '0', 0, 1, '2021-05-28 09:18:23', 0, '2021-05-28 09:18:23', NULL),
(16, 76, 'KHUSHAB', 'خوشاب', '0', '0', 0, 1, '2021-05-28 09:18:52', 0, '2021-05-28 09:18:52', NULL),
(17, 77, 'LAHORE', 'لاہور', '0', '0', 0, 1, '2021-05-28 09:19:26', 0, '2021-05-28 09:19:26', NULL),
(18, 78, 'LAYYAH', 'لیہ', '0', '0', 0, 1, '2021-05-28 09:19:58', 0, '2021-05-28 09:19:58', NULL),
(19, 79, 'LODHRAN', 'لودھراں', '0', '0', 0, 1, '2021-05-28 09:20:29', 0, '2021-05-28 09:20:29', NULL),
(20, 80, 'MANDI BAHA UD DIN', 'منڈی بہاوالدین', '0', '0', 0, 1, '2021-05-28 09:21:48', 0, '2021-05-28 09:21:48', NULL),
(21, 81, 'MIANWALI', 'میانوالی', '0', '0', 0, 1, '2021-05-28 09:22:28', 0, '2021-05-28 09:22:28', NULL),
(22, 80, 'MULTAN', 'ملتان', '0', '0', 0, 1, '2021-05-28 09:22:51', 0, '2021-05-28 09:22:51', NULL),
(23, 83, 'MUZAFFARGARH', 'مظفر گڑھ', '0', '0', 0, 1, '2021-05-28 09:23:30', 0, '2021-05-28 09:23:30', NULL),
(24, 84, 'NANKANA SAHIB', 'ننکانہ صاحب', '0', '0', 0, 1, '2021-05-28 09:24:04', 0, '2021-05-28 09:24:04', NULL),
(25, 85, 'NAROWAL', 'ناروال', '0', '0', 0, 1, '2021-05-28 09:24:30', 0, '2021-05-28 09:24:30', NULL),
(26, 86, 'OKARA', 'اوکاڑہ', '0', '0', 0, 1, '2021-05-28 09:24:54', 0, '2021-05-28 09:24:54', NULL),
(27, 87, 'PAKPATTAN', 'پاک پتن', '0', '0', 0, 1, '2021-05-28 09:25:46', 0, '2021-05-28 09:25:46', NULL),
(28, 88, 'RAHIMYAR KHAN', 'رحیم یار خان', '0', '0', 0, 1, '2021-05-28 09:33:49', 0, '2021-05-28 09:33:49', NULL),
(29, 89, 'RAJANPUR', 'راجن پور', '0', '0', 0, 1, '2021-05-28 09:34:51', 0, '2021-05-28 09:34:51', NULL),
(30, 90, 'RAWALPINDI', 'راولپنڈی', '0', '0', 0, 1, '2021-05-28 09:35:21', 0, '2021-05-28 09:35:21', NULL),
(31, 91, 'SAHIWAL', 'ساہیوال', '0', '0', 0, 1, '2021-05-28 09:35:44', 0, '2021-05-28 09:35:44', NULL),
(32, 92, 'SARGODHA', 'سرگودھا', '0', '0', 0, 1, '2021-05-28 09:37:00', 0, '2021-05-28 09:37:00', NULL),
(33, 93, 'SHEIKHUPURA', 'شیخوپورہ', '0', '0', 0, 1, '2021-05-28 09:38:19', 0, '2021-05-28 09:38:19', NULL),
(34, 94, 'SIALKOT', 'سیالکوٹ', '0', '0', 0, 1, '2021-05-28 09:38:42', 0, '2021-05-28 09:38:42', NULL),
(35, 95, 'T.T.SINGH', 'ٹوبہ ٹیک سنگھ', '0', '0', 0, 1, '2021-05-28 09:39:15', 0, '2021-05-28 09:39:15', NULL),
(36, 96, 'VEHARI', 'ویہاڑی', '0', '0', 0, 1, '2021-05-28 09:39:58', 0, '2021-05-28 09:39:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_general_settings`
--

CREATE TABLE `ci_general_settings` (
  `id` int(11) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `copyright` tinytext DEFAULT NULL,
  `email_from` varchar(100) NOT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `recaptcha_site_key` varchar(255) DEFAULT NULL,
  `recaptcha_lang` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_general_settings`
--

INSERT INTO `ci_general_settings` (`id`, `favicon`, `logo`, `application_name`, `timezone`, `currency`, `copyright`, `email_from`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `facebook_link`, `twitter_link`, `google_link`, `youtube_link`, `linkedin_link`, `instagram_link`, `recaptcha_secret_key`, `recaptcha_site_key`, `recaptcha_lang`, `created_date`, `updated_date`) VALUES
(1, 'assets/img/e3dd3cb33e517bb1c4d4dba9c0810556.png', 'assets/img/cc98ba555d7895418386076de6cff375.png', 'Light Admin', 'America/Adak', 'USD', 'Copyright © 2019 Light Admin All rights reserved.', 'no-reply@onjob.com', 'ssl://smtp.gmail.com', 465, 'smtp.codeglamour@gmail.com', 'Pakistan@123', 'https://facebook.com', 'https://twitter.com', 'https://google.com', 'https://youtube.com', 'https://linkedin.com', 'https://instagram.com', '', '', 'en', '2019-07-09 06:07:39', '2019-07-09 06:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `ci_schools_pef`
--

CREATE TABLE `ci_schools_pef` (
  `school_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `school_department` char(27) DEFAULT NULL,
  `school_type` char(21) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `school_district_id` int(11) DEFAULT NULL,
  `school_tehsil_id` int(11) DEFAULT NULL,
  `school_cluster_id` int(11) DEFAULT NULL,
  `school_level` char(48) DEFAULT NULL,
  `school_gender` char(18) DEFAULT NULL,
  `school_email` varchar(255) DEFAULT NULL,
  `school_phone` varchar(255) DEFAULT NULL,
  `school_location` char(15) DEFAULT NULL,
  `school_contact_name` varchar(255) NOT NULL,
  `school_contact_mobile` varchar(255) NOT NULL,
  `school_status` tinyint(1) DEFAULT NULL,
  `school_is_verify` tinyint(1) NOT NULL DEFAULT 0,
  `school_verify_code` varchar(255) NOT NULL,
  `school_createdby` int(11) DEFAULT NULL,
  `school_created` datetime DEFAULT NULL,
  `school_last_ip` varchar(255) DEFAULT NULL,
  `school_last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_tehsil`
--

CREATE TABLE `ci_tehsil` (
  `tehsil_id` int(11) NOT NULL,
  `tehsil_code` varchar(255) NOT NULL,
  `tehsil_name_en` varchar(255) NOT NULL,
  `tehsil_name_ur` varchar(255) NOT NULL,
  `tehsil_status` tinyint(1) NOT NULL DEFAULT 1,
  `tehsil_district_id` int(11) NOT NULL,
  `tehsil_order` int(11) NOT NULL,
  `tehsil_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tehsil_createdby` int(11) NOT NULL,
  `tehsil_updated` int(11) NOT NULL DEFAULT current_timestamp(),
  `tehsil_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_tehsil`
--

INSERT INTO `ci_tehsil` (`tehsil_id`, `tehsil_code`, `tehsil_name_en`, `tehsil_name_ur`, `tehsil_status`, `tehsil_district_id`, `tehsil_order`, `tehsil_created`, `tehsil_createdby`, `tehsil_updated`, `tehsil_updatedby`) VALUES
(1, '1', 'AHMAD PUR SIAL', 'احمد پور سیال', 1, 12, 0, '2021-05-28 14:53:47', 1, 2021, 0),
(2, '2', 'AHMADPUR EAST', 'احمد پور شرقیہ', 1, 3, 0, '2021-05-28 14:54:41', 1, 2021, 0),
(3, '3', 'ALIPUR', 'علی پور', 1, 23, 0, '2021-05-28 14:55:15', 1, 2021, 0),
(4, '4', 'ARIFWALA', 'عارف والا', 1, 27, 0, '2021-05-28 14:56:12', 1, 2021, 0),
(5, '5', 'ATTOCK', 'اٹک', 1, 1, 0, '2021-05-28 14:57:07', 1, 2021, 0),
(6, '6', 'BAHAWALNAGAR', 'بہاولنگر', 1, 2, 0, '2021-05-28 14:57:38', 1, 2021, 0),
(7, '7', 'BAHAWALPUR SADAR', 'بہاولپور صدر', 1, 3, 0, '2021-05-28 14:58:11', 1, 2021, 0),
(8, '8', 'BHAKKAR', 'بھکر', 1, 4, 0, '2021-05-28 14:58:43', 1, 2021, 0),
(9, '9', 'BHALWAL', 'بھلوال', 1, 32, 0, '2021-05-28 14:59:25', 1, 2021, 0),
(10, '10', 'BHOWANA', 'بھوانہ', 1, 6, 0, '2021-05-28 15:00:04', 1, 2021, 0),
(11, '11', 'BUREWALA', 'بورے والہ', 1, 36, 0, '2021-05-28 15:00:57', 1, 2021, 0),
(12, '12', 'CHAK JHUMARA', 'چک جھمرہ', 1, 8, 0, '2021-05-28 15:01:49', 1, 2021, 0),
(13, '13', 'CHAKWAL', 'چکوال', 1, 5, 0, '2021-05-28 15:02:47', 1, 2021, 0),
(14, '14', 'CHAUBARA', 'چوبارہ', 1, 18, 0, '2021-05-28 15:03:29', 1, 2021, 0),
(15, '15', 'CHICHAWATANI', 'چیچہ وطنی', 1, 31, 0, '2021-05-28 15:04:33', 1, 2021, 0),
(16, '16', 'CHINIOT', 'چنیوٹ', 1, 6, 0, '2021-05-28 15:05:02', 1, 2021, 0),
(17, '17', 'CHISHTIAN', 'چشتیاں', 1, 2, 0, '2021-05-28 15:05:49', 1, 2021, 0),
(18, '18', 'CHOA SAIDAN SHAH', 'چاو سیدن شاہ', 1, 5, 0, '2021-05-28 15:08:52', 1, 2021, 0),
(19, '19', 'CHUNIAN', 'چونیاں', 1, 14, 0, '2021-05-28 15:10:01', 1, 2021, 0),
(20, '20', 'D.G.KHAN', 'ڈیرہ غازی خان', 1, 7, 0, '2021-05-28 15:10:44', 1, 2021, 0),
(21, '21', 'DARYA KHAN', 'دریا خان', 1, 4, 0, '2021-05-28 15:11:21', 1, 2021, 0),
(22, '22', 'DASKA', 'ڈسکہ', 1, 34, 0, '2021-05-28 15:11:52', 1, 2021, 0),
(23, '23', 'DEPALPUR', 'دیپالپور', 1, 26, 0, '2021-05-28 15:12:27', 1, 2021, 0),
(24, '24', 'DINA', 'دینہ', 1, 13, 0, '2021-05-28 15:12:52', 1, 2021, 0),
(25, '25', 'DUNYAPUR', 'دنیاپور', 1, 19, 0, '2021-05-28 15:13:23', 1, 2021, 0),
(26, '26', 'FAISALABAD CITY', 'فیصل آباد سٹی', 1, 8, 0, '2021-05-28 15:14:34', 1, 2021, 0),
(27, '27', 'FAISALABAD SADDAR', 'فیصل آباد صدر', 1, 8, 0, '2021-05-28 15:15:57', 1, 2021, 0),
(28, '28', 'FATEH JANG', 'فتح جنگ', 1, 1, 0, '2021-05-28 15:16:27', 1, 2021, 0),
(29, '29', 'FEROZWALA', 'فیروزوالہ', 1, 33, 0, '2021-05-28 15:17:07', 1, 2021, 0),
(30, '30', 'FORT ABBAS', 'فورٹ عباس', 1, 2, 0, '2021-05-28 15:27:42', 1, 2021, 0),
(31, '31', 'GOJRA', 'گوجرہ', 1, 35, 0, '2021-05-28 15:28:10', 1, 2021, 0),
(32, '32', 'GUJAR KHAN', 'گوجر خان', 1, 30, 0, '2021-05-28 15:28:35', 1, 2021, 0),
(33, '33', 'GUJRANWALA CITY', 'گجرانوالہ سٹی', 1, 9, 0, '2021-05-28 15:29:04', 1, 2021, 0),
(34, '34', 'GUJRAT', 'گجرات', 1, 10, 0, '2021-05-28 15:29:43', 1, 2021, 0),
(35, '35', 'HAFIZABAD', 'حافظ آباد', 1, 11, 0, '2021-05-28 15:30:12', 1, 2021, 0),
(36, '36', 'HAROONABAD', 'ہارون آباد', 1, 2, 36, '2021-05-28 15:30:50', 1, 2021, 0),
(37, '37', 'HASILPUR', 'حاصل پور', 1, 3, 0, '2021-05-28 15:31:35', 1, 2021, 0),
(38, '38', 'HASSANABDAL', 'حسن آباد', 1, 1, 0, '2021-05-28 15:32:44', 1, 2021, 0),
(39, '39', 'HAZRO', 'حاضرو', 1, 1, 0, '2021-05-28 15:33:56', 1, 2021, 0),
(40, '40', 'ISA KHEL', 'عیسی خیل', 1, 21, 0, '2021-05-28 15:34:43', 1, 2021, 0),
(41, '41', 'JAHANIAN', 'جہانیاں', 1, 15, 0, '2021-05-28 15:35:31', 1, 2021, 0),
(42, '42', 'JALALPUR PIRWALA', 'جلالپور پیر والہ', 1, 22, 0, '2021-05-28 15:36:22', 1, 2021, 0),
(43, '43', 'JAMPUR', 'جام پور', 1, 29, 0, '2021-05-28 15:37:09', 1, 2021, 0),
(44, '44', 'JAND', 'جنڈ', 1, 1, 0, '2021-05-28 15:37:39', 1, 2021, 0),
(45, '45', 'JARANWALA', 'جڑنوالہ', 1, 8, 0, '2021-05-28 15:52:59', 1, 2021, 0),
(46, '46', 'JATOI', 'جتویٰ', 1, 23, 0, '2021-05-28 15:53:55', 1, 2021, 0),
(47, '47', 'JHANG', 'جھنگ', 1, 12, 0, '2021-05-28 15:54:33', 1, 2021, 0),
(48, '48', 'JHELUM', 'جہلم', 1, 13, 0, '2021-05-28 15:55:00', 1, 2021, 0),
(49, '49', 'KABIRWALA', 'کبیر والہ', 1, 15, 0, '2021-05-28 15:55:53', 1, 2021, 0),
(50, '50', 'KAHUTA', 'کہوٹہ', 1, 30, 0, '2021-05-28 15:56:49', 1, 2021, 0),
(51, '51', 'KALLAR KAHAR', 'کلر کہار', 1, 5, 0, '2021-05-28 15:57:36', 1, 2021, 0),
(52, '52', 'KALLAR SYEDAN', 'کلر سیداں', 1, 30, 0, '2021-05-28 15:58:26', 1, 2021, 0),
(53, '53', 'KALLUR KOT', 'کلور کوٹ', 1, 4, 0, '2021-05-28 15:59:11', 1, 2021, 0),
(54, '54', 'KAMALIA', 'کمالیہ', 1, 35, 0, '2021-05-28 15:59:46', 1, 2021, 0),
(55, '55', 'KAMOKE', 'کامونکی', 1, 9, 0, '2021-05-28 16:00:30', 1, 2021, 0),
(56, '56', 'KAROR LALISAN', 'کروڑ للیساں', 1, 18, 0, '2021-05-28 16:01:07', 1, 2021, 0),
(57, '57', 'KAROR PACCA', 'کروڑ پکا', 1, 19, 0, '2021-05-28 16:01:43', 1, 2021, 0),
(58, '58', 'KASUR', 'قصور', 1, 14, 0, '2021-05-28 16:02:09', 1, 2021, 0),
(59, '59', 'KHAIRPUR TAMEWALI', 'خیر پور ٹامیوالی', 1, 3, 0, '2021-05-28 16:03:36', 1, 2021, 0),
(60, '60', 'KHANEWAL', 'خانیوال', 1, 15, 0, '2021-05-28 16:04:26', 1, 2021, 0),
(61, '61', 'KHANPUR', 'خانپور', 1, 28, 0, '2021-05-28 16:05:03', 1, 2021, 0),
(62, '62', 'KHARIAN', 'کھاریاں', 1, 10, 0, '2021-05-28 16:05:29', 1, 2021, 0),
(63, '63', 'KHUSHAB', 'خوشاب', 1, 16, 0, '2021-05-28 16:06:00', 1, 2021, 0),
(64, '64', 'KOT ADU', 'کوٹ ادو', 1, 23, 0, '2021-05-28 16:06:41', 1, 2021, 0),
(65, '65', 'KOT RADHA KISHAN', 'کوٹ رادھا کشن', 1, 14, 0, '2021-05-28 16:08:00', 1, 2021, 0),
(66, '66', 'KOTLI SATTIAN', 'کوٹلی ستیاں', 1, 30, 0, '2021-05-28 16:08:52', 1, 2021, 0),
(67, '67', 'CANTT', 'کینٹ', 1, 17, 0, '2021-05-28 16:10:06', 1, 2021, 0),
(68, '68', 'CITY', 'سٹی', 1, 17, 0, '2021-05-28 16:12:04', 1, 2021, 0),
(69, '69', 'LALIAN', 'لالياں', 1, 6, 0, '2021-05-28 16:13:24', 1, 2021, 0),
(70, '70', 'LAYYAH', 'لیہ', 1, 18, 0, '2021-05-28 16:17:45', 1, 2021, 0),
(71, '71', 'LIAQATPUR', 'لیاقت پور', 1, 28, 0, '2021-05-28 16:18:21', 1, 2021, 0),
(72, '72', 'LODHRAN', 'لودھراں', 1, 19, 0, '2021-05-28 16:18:43', 1, 2021, 0),
(73, '73', 'MAILSI', 'میلسی', 1, 36, 0, '2021-05-28 16:19:24', 1, 2021, 0),
(74, '74', 'MALIKWAL', 'ملک وال', 1, 20, 0, '2021-05-28 16:19:49', 1, 2021, 0),
(75, '75', 'MANDI BAH U DDIN', 'منڈی بہاوالدین', 1, 20, 0, '2021-05-28 16:20:43', 1, 2021, 0),
(76, '76', 'MANKERA', 'منكيره', 1, 4, 0, '2021-05-28 16:22:00', 1, 2021, 0),
(77, '77', 'MIAN CHANNU', 'میاں چنوں', 1, 15, 0, '2021-05-28 16:22:38', 1, 2021, 0),
(78, '78', 'MIANWALI', 'میاں والی', 1, 21, 0, '2021-05-28 16:23:11', 1, 2021, 0),
(79, '79', 'MINCHINABAD', 'منچن آباد', 1, 2, 0, '2021-05-28 16:24:54', 1, 2021, 0),
(80, '80', 'MULTAN CITY', 'ملتان سٹی', 1, 22, 0, '2021-05-28 16:26:28', 1, 2021, 0),
(81, '81', 'MULTAN SADAR', 'ملتان صدر', 1, 22, 0, '2021-05-28 16:27:44', 1, 2021, 0),
(82, '82', 'MURIDKE', 'مرید کے', 1, 33, 0, '2021-05-28 16:30:11', 1, 2021, 0),
(83, '83', 'MURREE', 'مری', 1, 30, 0, '2021-05-28 16:30:35', 1, 2021, 0),
(84, '84', 'MUZAFFARGARH', 'مظفر گڑھ', 1, 23, 0, '2021-05-28 16:32:48', 1, 2021, 0),
(85, '85', 'NANKANA SAHIB', 'ننکانہ صاحب', 1, 24, 0, '2021-05-28 16:35:33', 1, 2021, 0),
(86, '86', 'NAROWAL', 'نارووال', 1, 25, 0, '2021-05-28 16:36:47', 1, 2021, 0),
(87, '87', 'NOORPUR THAL', 'نورپورتھل', 1, 16, 0, '2021-05-28 16:37:28', 1, 2021, 0),
(88, '88', 'NOSHERA VIRKAN', 'نوشہرہ ورکاں', 1, 9, 0, '2021-05-28 16:38:30', 1, 2021, 0),
(89, '89', 'OKARA', 'اوکاڑہ', 1, 26, 0, '2021-05-28 16:39:51', 1, 2021, 0),
(90, '90', 'PAKPATTAN', 'پاکپتن', 1, 27, 0, '2021-05-28 16:43:12', 1, 2021, 0),
(91, '91', 'PASRUR', 'پسرور', 1, 34, 0, '2021-05-28 16:43:31', 1, 2021, 0),
(92, '92', 'PATTOKI', 'پتوکی', 1, 14, 0, '2021-05-28 16:43:53', 1, 2021, 0),
(93, '93', 'PHALIA', 'پھالیہ', 1, 20, 0, '2021-05-28 16:44:21', 1, 2021, 0),
(94, '94', 'PIND DADAN KHAN', 'پنڈدادن خان', 1, 13, 0, '2021-05-28 16:44:56', 1, 2021, 0),
(95, '95', 'PINDI BHATTIAN', 'پنڈی بھٹیاں', 1, 11, 0, '2021-05-28 16:47:12', 1, 2021, 0),
(96, '96', 'PINDI GHEB', 'پیڈی گھیپ', 1, 1, 0, '2021-05-28 16:47:43', 1, 2021, 0),
(97, '97', 'PIPLAN', 'پپلاں', 1, 21, 0, '2021-05-28 16:48:04', 1, 2021, 0),
(98, '98', 'QUAIDABAD', 'قائد آباد', 1, 16, 0, '2021-05-28 16:48:50', 1, 2021, 0),
(99, '99', 'RAHIMYAR KHAN', 'رحیم یار خان', 1, 28, 0, '2021-05-28 16:49:38', 1, 2021, 0),
(100, '100', 'RAJANPUR', 'راجن پور', 1, 29, 0, '2021-05-28 16:50:13', 1, 2021, 0),
(101, '101', 'RAWALPINDI', 'راولپیڈی', 1, 30, 0, '2021-05-28 16:50:46', 1, 2021, 0),
(102, '102', 'RENALA KHURD', 'رینالہ خورد', 1, 26, 0, '2021-05-28 16:51:13', 1, 2021, 0),
(103, '103', 'ROJHAN', 'روجهان', 1, 29, 0, '2021-05-28 16:55:55', 1, 2021, 0),
(104, '104', 'SADIQABAD', 'صادق آباد', 1, 28, 0, '2021-05-28 16:57:06', 1, 2021, 0),
(105, '105', 'SAFDARABAD', 'صفدر آباد', 1, 33, 0, '2021-05-28 16:57:39', 1, 2021, 0),
(106, '106', 'SAHIWAL', 'ساہیوال', 1, 32, 0, '2021-05-28 17:01:31', 1, 2021, 0),
(107, '107', 'SAMBRIAL', 'سمبڑیال', 1, 34, 0, '2021-05-28 17:02:32', 1, 2021, 0),
(108, '108', 'SAMUNDARI', 'سمندری', 1, 8, 0, '2021-05-28 17:03:13', 1, 2021, 0),
(109, '109', 'SANGLA HILL', 'سانگلہ ہل', 1, 24, 0, '2021-05-28 17:03:43', 1, 2021, 0),
(110, '110', 'SARAI ALAM GIR', 'سرائے عالمگیر', 1, 10, 0, '2021-05-28 17:05:41', 1, 2021, 0),
(111, '111', 'SARGODHA', 'سرگودھا', 1, 32, 0, '2021-05-28 17:06:18', 1, 2021, 0),
(112, '112', 'SHAHKOT', 'شاہ کوٹ', 1, 24, 0, '2021-05-28 17:07:17', 1, 2021, 0),
(113, '113', 'SHAHPUR', 'شاہ پور', 1, 32, 0, '2021-05-28 17:08:15', 1, 2021, 0),
(114, '114', 'SHAKARGARH', 'شکر گڑھ', 1, 25, 0, '2021-05-28 17:09:08', 1, 2021, 0),
(115, '115', 'SHARAQPUR', 'شرقپور', 1, 33, 0, '2021-05-28 17:09:56', 1, 2021, 0),
(116, '116', 'SHEIKHUPURA', 'شیخوپورہ', 1, 33, 0, '2021-05-28 17:10:37', 1, 2021, 0),
(117, '117', 'SHORKOT', 'شور کوٹ', 1, 12, 0, '2021-05-28 17:11:12', 1, 2021, 0),
(118, '118', 'SHUJA ABAD', 'شجاع آباد', 1, 22, 0, '2021-05-28 17:11:40', 1, 2021, 0),
(119, '119', 'SIALKOT', 'سیالکوٹ', 1, 34, 0, '2021-05-28 17:12:05', 1, 2021, 0),
(120, '120', 'SILLANWALI', 'سِلانٚوالى', 1, 32, 0, '2021-05-28 17:12:54', 1, 2021, 0),
(121, '121', 'SOHAWA', 'سوہاوہ‎', 1, 13, 0, '2021-05-28 17:13:38', 1, 2021, 0),
(122, '122', 'TALAGANG', 'تلہ گنگ', 1, 5, 0, '2021-05-28 17:14:06', 1, 2021, 0),
(123, '123', 'TANDLIAN WALA', 'تاندلیانوالہ‎', 1, 8, 0, '2021-05-28 17:15:30', 1, 2021, 0),
(124, '124', 'TAUNSA', 'تونسہ', 1, 7, 0, '2021-05-28 17:16:29', 1, 2021, 0),
(125, '125', 'TAXILA', 'ٹیکسلا', 1, 30, 0, '2021-05-28 17:17:39', 1, 2021, 0),
(126, '126', 'TOBA TEK SINGH', 'ٹوبہ ٹیک سنگھ', 1, 35, 0, '2021-05-28 17:18:35', 1, 2021, 0),
(127, '127', 'VEHARI', 'ویہاڑی', 1, 36, 0, '2021-05-28 17:19:09', 1, 2021, 0),
(128, '128', 'WAZIRABAD', 'وزیرآباد', 1, 9, 0, '2021-05-28 17:19:40', 1, 2021, 0),
(129, '129', 'YAZMAN', 'یزمان', 1, 3, 0, '2021-05-28 17:21:38', 1, 2021, 0),
(130, '130', 'ZAFARWAL', 'ظفروال', 1, 25, 0, '2021-05-28 17:22:24', 1, 2021, 0),
(131, '131', 'KOT MOMIN', 'کوٹ مومن', 1, 32, 0, '2021-05-28 17:22:54', 1, 2021, 0),
(132, '132', '18-HAZARI', 'اٹھارہ ہزاری', 1, 12, 0, '2021-05-28 17:24:17', 1, 2021, 0),
(133, '133', 'NAUSHERA', 'نوشہرہ', 1, 16, 0, '2021-05-28 17:25:02', 1, 2021, 0),
(134, '134', 'PIR MAHAL', 'پیر محل', 1, 35, 0, '2021-05-28 17:28:24', 1, 2021, 0),
(135, '135', 'KOT CHUTTA', 'كوٹ چهُٹّہ', 1, 7, 0, '2021-05-28 17:29:12', 1, 2021, 0),
(136, '136', 'RAIWIND', 'رائیونڈ', 1, 17, 0, '2021-05-28 17:31:39', 1, 2021, 0),
(137, '137', 'MODEL TOWN', 'ماڈل ٹاون', 1, 17, 0, '2021-05-28 17:33:14', 1, 2021, 0),
(138, '138', 'SHALIMAR', 'شالیمار', 1, 17, 0, '2021-05-28 17:33:47', 1, 2021, 0),
(139, '139', 'BHERA', 'بھیرہ', 1, 32, 0, '2021-05-28 17:34:18', 1, 2021, 0),
(140, '140', 'SAHIWAL', 'ساہیوال', 1, 31, 0, '2021-05-28 17:34:48', 1, 2021, 0),
(141, '141', 'BAHAWALPUR CITY', 'بہاولپور سٹی', 1, 3, 0, '2021-05-28 17:35:39', 1, 2021, 0),
(142, '142', 'LAWA', 'لاوا', 1, 5, 0, '2021-05-28 17:36:06', 1, 2021, 0),
(143, '143', 'GUJRANWALA SADAR', 'گجرانوالہ صدر', 1, 9, 0, '2021-05-28 17:36:41', 1, 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.com', '12345', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '27 new jersey - Level 58 - CA 444 \r\nUnited State ', 1, 1, 1, 1, '', '', '', '2017-09-29 10:09:44', '2017-12-14 10:12:41'),
(32, 'user', 'user', 'user', 'user@user.com', '44897866462', '$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS', '', 1, 1, 1, 0, '352fe25daf686bdb4edca223c921acea', '', '', '2018-04-24 07:04:07', '2019-01-26 03:01:30'),
(40, 'AdbuBakar', 'Abu', 'Bakar', 'mabubakar99@gmail.com', '03134732807', '$2y$10$H3p7qwa8TZ/ZrrRWvY79puJ/370.umrzKjamic5K3KQqXFGk61yxS', '', 1, 1, 0, 0, '', '', '', '2022-02-26 00:00:00', '2022-02-26 00:00:00'),
(41, 'AdbuBakar', 'Abu', 'Bakar', 'mabubakar99@gmail.com', '03134732807', '$2y$10$L21uS1mzwZs01UGEF0uA0OtS5WjQnbILyNoj9ji60kG6pNzv/ZkfO', '', 1, 1, 0, 0, '', '', '', '2022-02-26 00:00:00', '2022-02-26 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ci_clustercenter`
--
ALTER TABLE `ci_clustercenter`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `ci_clusterschool`
--
ALTER TABLE `ci_clusterschool`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `ci_districts`
--
ALTER TABLE `ci_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_schools_pef`
--
ALTER TABLE `ci_schools_pef`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `ci_tehsil`
--
ALTER TABLE `ci_tehsil`
  ADD PRIMARY KEY (`tehsil_id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_admin`
--
ALTER TABLE `ci_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ci_clustercenter`
--
ALTER TABLE `ci_clustercenter`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_clusterschool`
--
ALTER TABLE `ci_clusterschool`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_districts`
--
ALTER TABLE `ci_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_schools_pef`
--
ALTER TABLE `ci_schools_pef`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_tehsil`
--
ALTER TABLE `ci_tehsil`
  MODIFY `tehsil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
