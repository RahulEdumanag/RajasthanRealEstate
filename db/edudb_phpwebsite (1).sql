-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 01:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edudb_phpwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category` int(11) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT 1,
  `file_path` varchar(255) DEFAULT 'assets/images/blog/default.png',
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_02_02_112609_create_settings_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_07_08_141130_create_admins_table', 1),
(11, '2020_07_08_145603_create_permission_tables', 1),
(12, '2020_07_12_220312_create_blogs_table', 1),
(13, '2024_01_04_180133_add_timestamps_to_tbl_clientmaster', 1),
(14, '2024_01_22_162335_add_timestamps_to_tbl_registration', 1),
(15, '2024_02_07_161923_create_errors_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `stablished` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `layout` varchar(255) NOT NULL DEFAULT '1',
  `running_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminmenu`
--

CREATE TABLE `tbl_adminmenu` (
  `AddMen_Id` int(20) NOT NULL,
  `AddMen_Reg_Id` int(11) NOT NULL,
  `AddMen_Name` varchar(255) NOT NULL,
  `AddMen_SerialOrder` varchar(255) DEFAULT NULL,
  `AddMen_URL` varchar(255) DEFAULT NULL,
  `AddMen_Status` varchar(255) NOT NULL DEFAULT '0',
  `AddMen_CreatedBy` int(20) DEFAULT NULL,
  `AddMen_CreatedDate` datetime DEFAULT NULL,
  `AddMen_UpdatedBy` int(20) DEFAULT NULL,
  `AddMen_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminmenu`
--

INSERT INTO `tbl_adminmenu` (`AddMen_Id`, `AddMen_Reg_Id`, `AddMen_Name`, `AddMen_SerialOrder`, `AddMen_URL`, `AddMen_Status`, `AddMen_CreatedBy`, `AddMen_CreatedDate`, `AddMen_UpdatedBy`, `AddMen_UpdatedDate`) VALUES
(1, 13, 'Employee Registrations', '1', 'empRegistration', '0', 1, '2024-02-02 12:34:01', 1, '2024-02-07 13:34:58'),
(3, 13, 'Sliders', '2', 'slider', '0', 1, '2024-02-02 12:34:25', 1, '2024-02-21 14:12:11'),
(4, 13, 'Menu', '4', 'menu', '0', 1, '2024-02-02 12:34:36', NULL, '2024-02-02 12:34:36'),
(5, 13, 'Gallery Category', '6', 'galleryCategory', '0', 1, '2024-02-02 12:34:48', 1, '2024-02-05 14:36:04'),
(6, 13, 'Gallery', '7', 'gallery', '0', 1, '2024-02-02 12:35:01', NULL, '2024-02-02 12:35:01'),
(7, 13, 'Testimonials', '8', 'testimonial', '0', 1, '2024-02-02 12:35:15', NULL, '2024-02-02 12:35:15'),
(8, 13, 'Useful Links', '9', 'usefulLink', '0', 1, '2024-02-02 12:35:24', NULL, '2024-02-02 12:35:24'),
(9, 13, 'Social Links', '10', 'social', '0', 1, '2024-02-02 12:35:36', NULL, '2024-02-02 12:35:36'),
(10, 13, 'Facilities', '11', 'facility', '0', 1, '2024-02-02 12:35:47', NULL, '2024-02-02 12:35:47'),
(11, 13, 'Events', '12', 'event', '0', 1, '2024-02-02 12:35:56', NULL, '2024-02-02 12:35:56'),
(12, 13, 'Packages', '13', 'package', '0', 1, '2024-02-02 12:36:15', NULL, '2024-02-02 12:36:15'),
(13, 13, 'Services', '14', 'service', '0', 1, '2024-02-02 12:36:25', NULL, '2024-02-02 12:36:25'),
(15, 13, 'FAQ’s', '15', 'faq', '0', 1, '2024-02-02 12:36:38', NULL, '2024-02-02 12:36:38'),
(16, 13, 'Announcement', '16', 'announcement', '0', 1, '2024-02-02 12:36:51', NULL, '2024-02-02 12:36:51'),
(17, 13, 'Team', '17', 'team', '0', 1, '2024-02-02 12:37:01', NULL, '2024-02-02 12:37:01'),
(20, 1, 'Sub Menu', '5', 'submenu', '0', 1, '2024-02-02 14:18:20', NULL, '2024-02-02 14:18:20'),
(26, 1, 'Health Checkup', '3', 'healthCheckup', '0', 1, '2024-02-12 13:20:50', NULL, '2024-02-12 13:20:50'),
(28, 29, 'Blog', '18', 'blog', '0', 1, '2024-03-09 15:28:37', 1, '2024-03-09 15:29:13'),
(29, 1, 'covid-19', '22', 'covid', '2', 1, '2024-03-09 16:40:19', NULL, NULL),
(30, 29, 'covid-19', '19', 'covid', '2', 1, '2024-03-09 16:42:53', 1, '2024-03-09 16:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminmenuallotment`
--

CREATE TABLE `tbl_adminmenuallotment` (
  `Add_MenAllo_Id` int(20) NOT NULL,
  `Add_MenAllo_Reg_Id` int(20) NOT NULL,
  `Add_MenAllo_AddMen_Id` text NOT NULL,
  `Add_MenAllo_Status` int(255) NOT NULL DEFAULT 0,
  `Add_MenAllo_CreatedBy` int(20) DEFAULT NULL,
  `Add_MenAllo_CreatedDate` datetime DEFAULT NULL,
  `Add_MenAllo_UpdatedBy` int(20) DEFAULT NULL,
  `Add_MenAllo_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminmenuallotment`
--

INSERT INTO `tbl_adminmenuallotment` (`Add_MenAllo_Id`, `Add_MenAllo_Reg_Id`, `Add_MenAllo_AddMen_Id`, `Add_MenAllo_Status`, `Add_MenAllo_CreatedBy`, `Add_MenAllo_CreatedDate`, `Add_MenAllo_UpdatedBy`, `Add_MenAllo_UpdatedDate`) VALUES
(4, 13, '1,9,11,15,16,17,3,4,20,5,6,7,8', 0, 13, '2024-02-02 15:30:41', 13, '2024-02-07 13:47:49'),
(5, 4, '1,9,10,11,12,13,17,3,26,4,20,5,6,7,8', 0, 4, '2024-02-02 15:31:24', 4, '2024-02-12 13:53:06'),
(7, 28, '1,9,10,13,15,17,3,4,20,5,6,7,8', 0, 28, '2024-02-14 11:23:10', 28, '2024-02-14 17:31:44'),
(9, 1, '1,9,10,11,12,13,15,16,17,3,26,4,20,5,6,7,8', 0, 1, '2024-02-29 16:21:54', NULL, NULL),
(10, 29, '9,10,11,13,15,16,17,28,30,3,29,4,20,5,6,7,8', 0, 29, '2024-03-08 12:21:19', 29, '2024-03-09 16:48:15'),
(11, 29, '7', 2, 29, '2024-03-08 12:40:52', NULL, NULL),
(12, 29, '11', 2, 29, '2024-03-08 12:51:35', NULL, NULL),
(13, 29, '5,6', 2, 29, '2024-03-08 12:52:52', NULL, NULL),
(14, 29, '4,20,6', 2, 29, '2024-03-08 13:31:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `Con_Id` int(20) NOT NULL,
  `Con_Reg_Id` int(20) NOT NULL,
  `Con_Name` varchar(255) DEFAULT NULL,
  `Con_Email` varchar(255) NOT NULL,
  `Con_Number` varchar(255) NOT NULL,
  `Con_Desc` text NOT NULL,
  `Con_Status` int(11) DEFAULT NULL,
  `Con_CreatedBy` int(11) DEFAULT NULL,
  `Con_CreatedDate` datetime DEFAULT NULL,
  `Con_UpdatedBy` int(11) DEFAULT NULL,
  `Con_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`Con_Id`, `Con_Reg_Id`, `Con_Name`, `Con_Email`, `Con_Number`, `Con_Desc`, `Con_Status`, `Con_CreatedBy`, `Con_CreatedDate`, `Con_UpdatedBy`, `Con_UpdatedDate`) VALUES
(6, 13, 'asd', 'rahul@GMAIL.COM', '234234234233', 'a', NULL, NULL, NULL, NULL, NULL),
(8, 13, 'asd', 'rahul@GMAIL.COM', '1111111111111111', 'aaa', NULL, NULL, NULL, NULL, NULL),
(9, 13, 'asd', 'rahul@GMAILx.COM', '23423423423', 'a', NULL, NULL, NULL, NULL, NULL),
(10, 13, 'AAAA', 'SDAS@GMAIL.COM', '22', 'AAA', NULL, NULL, NULL, NULL, NULL),
(12, 28, 'adsf', 'frontend@gmail.com', '23423423423', 'ds', NULL, NULL, NULL, NULL, NULL),
(13, 28, 's', 'SDAS@GMAIL.COM', '234234234233', 's', NULL, NULL, NULL, NULL, NULL),
(14, 29, 'asd', 'rahul@GMAIL.COM', '1111111111111111', 'a', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credential_log`
--

CREATE TABLE `tbl_credential_log` (
  `CreLog_Id` int(20) NOT NULL,
  `CreLog_Reg_Id` int(20) NOT NULL,
  `CreLog_Emp_Id` int(11) DEFAULT NULL,
  `CreLog_Username` varchar(255) NOT NULL,
  `CreLog_Password` varchar(255) NOT NULL,
  `CreLog_Status` int(20) NOT NULL DEFAULT 1,
  `CreLog_CreatedBy` int(11) DEFAULT NULL,
  `CreLog_CreatedDate` datetime NOT NULL,
  `CreLog_UpdatedBy` int(11) DEFAULT NULL,
  `CreLog_UpdatedDate` datetime DEFAULT NULL,
  `CreLog_DeletedDate` datetime DEFAULT NULL,
  `CreLog_DeletedBy` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_credential_log`
--

INSERT INTO `tbl_credential_log` (`CreLog_Id`, `CreLog_Reg_Id`, `CreLog_Emp_Id`, `CreLog_Username`, `CreLog_Password`, `CreLog_Status`, `CreLog_CreatedBy`, `CreLog_CreatedDate`, `CreLog_UpdatedBy`, `CreLog_UpdatedDate`, `CreLog_DeletedDate`, `CreLog_DeletedBy`) VALUES
(2, 2, 2, 'arihantdiagnostics@gmail.com', '$2y$10$Fhd1kFHb6f0Ej2bDznIIOOHTy2n1hdOy0wlWfgGcBTT7TrxAY5zt6', 1, 37, '2024-01-24 22:42:19', NULL, '2024-01-24 22:42:19', NULL, NULL),
(3, 1, 1, 'rahulsoni@admin.com', '$2y$10$Fhd1kFHb6f0Ej2bDznIIOOHTy2n1hdOy0wlWfgGcBTT7TrxAY5zt6', 1, 37, '2024-01-25 16:59:19', NULL, '2024-01-25 16:59:19', NULL, NULL),
(8, 13, 7, 'AMD', '$2y$10$Fhd1kFHb6f0Ej2bDznIIOOHTy2n1hdOy0wlWfgGcBTT7TrxAY5zt6', 1, 1, '2024-01-29 12:54:12', NULL, '2024-01-29 12:54:12', NULL, NULL),
(33, 1, NULL, 'rahulsoni@admin.com', '$2y$10$eWaaCjJgF3iQns.XUuOGJOLLnA9E3E8EPabsBX468ySCEM1MFSpLa', 1, 1, '2024-02-03 13:28:20', NULL, '2024-02-03 13:28:20', NULL, NULL),
(35, 1, NULL, 'rahulsoni@admin.com', '$2y$10$45gWS13EteL84T7chbLQYuqCIZlT9Wt/MTVbI276eOj/jLLwd8XIa', 1, 1, '2024-02-05 17:09:39', NULL, '2024-02-05 17:09:39', NULL, NULL),
(36, 1, NULL, 'rahulsoni@admin.com', '$2y$10$DztGpgq/0n24hVk4b094le6gHp0a5mQ25DCT8wIFxAeo5Ae4XB9f6', 1, 1, '2024-02-06 15:26:51', NULL, '2024-02-06 15:26:51', NULL, NULL),
(38, 4, NULL, 'testuser@gmail.com', '$2y$10$lmZS24HB6Fw5VB.mw//IqO9r4QvR2DyCz.pjSDJiFoIWqoJUbP502', 1, 71, '2024-02-06 16:29:21', NULL, '2024-02-06 16:29:21', NULL, NULL),
(43, 28, 54, 'rajasthanconsultancy@gmail.com', '$2y$10$kfOrUh/STw6w/NZhDkqtiOFZy399ZHDFxy.JHxLE9aJUufkpCVwQq', 1, 1, '2024-02-13 16:11:02', NULL, NULL, NULL, NULL),
(44, 29, 55, 'mindsup@gmail.com', '$2y$10$usYuv47avJ3/n4uA8gWybOkScU0mv6HGRLWXeUoJwtqbJOHDtr68.', 1, 1, '2024-03-08 11:52:02', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_registration`
--

CREATE TABLE `tbl_employee_registration` (
  `Emp_Id` int(20) UNSIGNED NOT NULL,
  `Emp_Reg_Id` int(20) DEFAULT NULL,
  `Emp_Role` int(11) NOT NULL DEFAULT 2,
  `Emp_Organization_Name` varchar(255) DEFAULT NULL,
  `Emp_Logo` varchar(255) DEFAULT NULL,
  `Emp_Name` varchar(255) DEFAULT NULL,
  `Emp_Contact` varchar(255) DEFAULT NULL,
  `Emp_Email` varchar(255) DEFAULT NULL,
  `Emp_Address` varchar(255) DEFAULT NULL,
  `Emp_Remark` varchar(255) DEFAULT NULL,
  `Emp_StartDate` varchar(255) DEFAULT NULL,
  `Emp_ExpiryPeriod` varchar(255) DEFAULT NULL,
  `Emp_TwoStepVerification` varchar(255) DEFAULT NULL,
  `Emp_Status` int(12) DEFAULT 0,
  `Emp_CreatedBy` int(20) DEFAULT NULL,
  `Emp_CreatedDate` datetime DEFAULT NULL,
  `Emp_UpdatedBy` int(20) DEFAULT NULL,
  `Emp_UpdatedDate` datetime DEFAULT NULL,
  `Emp_DeletedDate` datetime DEFAULT NULL,
  `Emp_DeletedBy` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee_registration`
--

INSERT INTO `tbl_employee_registration` (`Emp_Id`, `Emp_Reg_Id`, `Emp_Role`, `Emp_Organization_Name`, `Emp_Logo`, `Emp_Name`, `Emp_Contact`, `Emp_Email`, `Emp_Address`, `Emp_Remark`, `Emp_StartDate`, `Emp_ExpiryPeriod`, `Emp_TwoStepVerification`, `Emp_Status`, `Emp_CreatedBy`, `Emp_CreatedDate`, `Emp_UpdatedBy`, `Emp_UpdatedDate`, `Emp_DeletedDate`, `Emp_DeletedBy`) VALUES
(1, 1, 1, NULL, 'Reg_Logo/1706180359.png', 'Rahul Sony', '092520 89089', 'info@edumanag.com', '4th Street, near Patanjali Store, Bihari Ganj, Ajmer, Rajasthan 305001', 'Remark', '2024-01-10', '2', NULL, 0, 37, '2024-01-25 16:59:19', NULL, NULL, NULL, NULL),
(2, 4, 2, NULL, 'Arihant_Diagnostic_Images/EmployeeReg_images/1706351176.png', 'User Arihant Diagnostics', '+91 9773346702', 'arihantdiagnostics1@gmail.com', '660, Near Pancholi Choraha, Opposite Postal Store Depot, BK Kaul Nagar,Ajmer, Rajasthan 305004', 'non', '2024-01-24', '4', '1', 0, 37, '2024-01-24 22:42:19', 37, '2024-01-27 16:26:16', NULL, NULL),
(7, 13, 2, NULL, 'AMD_Images/Registration_images/1706511252.png', 'AMD', '+821 (2365) 456 90', 'AMD', '503 Old Buffalo Street Northwest #205, New York-3087.', 'Hashtag going forward plagiarism West Seattle Blog Nook the power of the press belongs to the person who owns one Gannett get me rewrite project thunderdome.', '2024-01-05', '4', NULL, 0, 1, '2024-01-29 12:54:12', 1, '2024-01-29 16:55:50', NULL, NULL),
(54, 28, 2, 'RajasthanConsultancy', '1/Registration_images/1707820861.png', 'RajasthanConsultancy', '9876543210', 'rajasthanconsultancy@gmail.com', 'Dummy Address', 'Remark', '2024-02-14', '4', NULL, 0, 1, '2024-02-13 16:11:01', NULL, NULL, NULL, NULL),
(55, 29, 2, 'MindsUp', '28/Registration_images/1709878922.png', 'MindsUp', '9876543210', 'mindsup@gmail.com', 'MindsUp Address', 'Remark', '2024-03-09', '111', NULL, 0, 1, '2024-03-08 11:52:02', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_errors`
--

CREATE TABLE `tbl_errors` (
  `Error_Id` bigint(20) UNSIGNED NOT NULL,
  `Error_Title` varchar(255) DEFAULT NULL,
  `Error_Reg_Id` bigint(20) UNSIGNED DEFAULT NULL,
  `Error_Message` text NOT NULL,
  `Error_Status` tinyint(1) NOT NULL DEFAULT 0,
  `Error_CreatedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `Error_UpdatedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `Error_CreatedDate` datetime DEFAULT NULL,
  `Error_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_errors`
--

INSERT INTO `tbl_errors` (`Error_Id`, `Error_Title`, `Error_Reg_Id`, `Error_Message`, `Error_Status`, `Error_CreatedBy`, `Error_UpdatedBy`, `Error_CreatedDate`, `Error_UpdatedDate`) VALUES
(8, NULL, 13, 'SQLSTATE[23000]: Integrity constraint violation: 1048 Column \'Con_Desc\' cannot be null (SQL: insert into `tbl_Contact` (`Con_Reg_Id`, `Con_Name`, `Con_Email`, `Con_Number`, `Con_Desc`) values (13, newtt, rahul@GMAIL.COM, 23423423423, ?))', 2, NULL, NULL, '2024-02-21 17:12:20', NULL),
(9, NULL, 1, 'Route [admin.slider.updateOrder] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\layouts\\footer.blade.php)', 2, 1, NULL, '2024-02-21 18:25:24', NULL),
(10, NULL, 1, 'Call to undefined function imageOrDefault() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\admin\\webInfo\\edit.blade.php)', 2, 1, NULL, '2024-02-22 17:05:22', NULL),
(11, NULL, 1, 'Call to undefined function imageOrDefault() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\admin\\webInfo\\edit.blade.php)', 2, 1, NULL, '2024-02-22 17:07:53', NULL),
(12, NULL, 1, 'Call to undefined function imageOrDefault() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\admin\\webInfo\\edit.blade.php)', 2, 1, NULL, '2024-02-22 17:09:33', NULL),
(13, NULL, 1, 'Call to undefined function imageOrDefault() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\admin\\webInfo\\edit.blade.php)', 2, 1, NULL, '2024-02-22 17:09:49', NULL),
(14, NULL, 1, 'Call to undefined function imageOrDefault() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Adminpanel\\resources\\views\\backend\\admin\\webInfo\\edit.blade.php)', 2, 1, NULL, '2024-02-22 17:10:19', NULL),
(15, NULL, 13, 'Property [Pag_Name] does not exist on this collection instance. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\AMD\\resources\\views\\frontend\\usefullLink.blade.php)', 2, NULL, NULL, '2024-02-23 14:57:21', NULL),
(16, NULL, 4, 'Undefined variable: usefulLinkModel (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\galleryCategory.blade.php)', 2, NULL, NULL, '2024-02-23 17:12:10', NULL),
(17, NULL, 4, 'Undefined variable: value (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\galleryCategory.blade.php)', 2, NULL, NULL, '2024-02-23 17:14:40', NULL),
(18, NULL, 4, 'Route [searchHealthCheckup] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-26 12:48:22', NULL),
(19, NULL, 4, 'Route [searchHealthCheckup] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-26 12:48:35', NULL),
(20, NULL, 4, 'Route [searchHealthCheckup] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-26 12:49:11', NULL),
(21, NULL, 4, 'Route [searchHealthCheckup] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-26 13:02:08', NULL),
(22, NULL, 4, 'Route [searchHealthCheckup] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-26 13:11:08', NULL),
(23, NULL, 13, 'Use of undefined constant GalleryModel - assumed \'GalleryModel\' (this will throw an Error in a future version of PHP)', 2, NULL, NULL, '2024-02-26 13:38:03', NULL),
(24, NULL, 13, 'syntax error, unexpected end of file (View: C:\\xampp\\htdocs\\Edumanag-Projects\\AMD\\resources\\views\\frontend\\layouts\\footer.blade.php)', 2, NULL, NULL, '2024-02-28 14:26:45', NULL),
(25, NULL, 4, 'Use of undefined constant model - assumed \'model\' (this will throw an Error in a future version of PHP) (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-28 16:01:14', NULL),
(26, NULL, 4, 'Use of undefined constant model - assumed \'model\' (this will throw an Error in a future version of PHP) (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-28 16:02:37', NULL),
(27, NULL, 4, 'Undefined variable: model (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-28 17:18:52', NULL),
(28, NULL, 4, 'Call to undefined function str_limit() (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\healthCheckup.blade.php)', 2, NULL, NULL, '2024-02-28 18:15:58', NULL),
(29, NULL, 1, 'Route [admin.slider.updateOrder] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\AMD\\resources\\views\\backend\\layouts\\footer.blade.php)', 2, 1, NULL, '2024-02-29 12:12:04', NULL),
(30, NULL, 1, 'Route [admin.slider.updateOrder] not defined. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\AMD\\resources\\views\\backend\\layouts\\footer.blade.php)', 2, 1, NULL, '2024-02-29 12:12:36', NULL),
(31, NULL, 4, 'Trying to get property \'Men_ShortDesc\' of non-object (View: C:\\xampp\\htdocs\\Edumanag-Projects\\Arihant-Diagnostic\\resources\\views\\frontend\\index.blade.php)', 0, NULL, NULL, '2024-03-01 11:03:15', NULL),
(32, NULL, 28, 'syntax error, unexpected \')\', expecting \'&\' or variable (T_VARIABLE) (View: C:\\xampp\\htdocs\\Edumanag-Projects\\RajasthanConsultancy\\resources\\views\\frontend\\layouts\\header.blade.php)', 0, NULL, NULL, '2024-03-06 14:10:12', NULL),
(33, NULL, 28, 'Property [Pag_Name] does not exist on this collection instance. (View: C:\\xampp\\htdocs\\Edumanag-Projects\\RajasthanConsultancy\\resources\\views\\frontend\\usefullLink.blade.php)', 0, NULL, NULL, '2024-03-07 11:34:42', NULL),
(34, NULL, 29, 'Undefined variable: BlogModel (View: C:\\xampp\\htdocs\\Edumanag-Projects\\MindsUp\\resources\\views\\frontend\\index.blade.php)', 0, NULL, NULL, '2024-03-09 15:40:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `Gall_Id` int(20) NOT NULL,
  `Gall_Reg_Id` int(20) NOT NULL,
  `Gall_GallCat_Id` int(20) NOT NULL,
  `Gall_Image` text DEFAULT NULL,
  `Gall_Status` int(11) NOT NULL DEFAULT 0,
  `Gall_Name` varchar(255) DEFAULT NULL,
  `Gall_CreatedBy` int(11) DEFAULT NULL,
  `Gall_CreatedDate` datetime NOT NULL,
  `Gall_UpdatedBy` int(11) DEFAULT NULL,
  `Gall_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`Gall_Id`, `Gall_Reg_Id`, `Gall_GallCat_Id`, `Gall_Image`, `Gall_Status`, `Gall_Name`, `Gall_CreatedBy`, `Gall_CreatedDate`, `Gall_UpdatedBy`, `Gall_UpdatedDate`) VALUES
(1, 4, 9, 'Arihant_Diagnostic_Images/Gallery_images/1706348972.jpg', 0, 'Gallery1', 37, '2024-01-25 14:41:25', 37, '2024-01-27 15:49:32'),
(2, 4, 10, 'Arihant_Diagnostic_Images/Gallery_images/1706348965.jpg', 0, 'Gallery2', 37, '2024-01-25 14:41:40', 37, '2024-01-27 15:49:25'),
(3, 4, 11, 'Arihant_Diagnostic_Images/Gallery_images/1706348959.png', 0, 'Gallery3', 37, '2024-01-25 14:41:53', 1, '2024-01-28 19:16:34'),
(117, 13, 17, '13/Gallery_images/1709189219_1.png,13/Gallery_images/1709189219_2.png,13/Gallery_images/1709189219_3.png', 0, NULL, 1, '2024-02-29 12:16:59', NULL, NULL),
(118, 13, 18, '13/Gallery_images/1709189425_thumb_5.jpg,13/Gallery_images/1709189425_thumb_6.jpg,13/Gallery_images/1709189425_video-bg.jpg', 0, NULL, 1, '2024-02-29 12:20:25', NULL, NULL),
(119, 13, 73, '13/Gallery_images/1709189484_IMG_20240113_145302-resized.jpg,13/Gallery_images/1709189484_IMG_20240205_092130-resized.jpg,13/Gallery_images/1709189484_IMG_20240205_092147-resized.jpg,13/Gallery_images/1709189484_IMG_20240205_092536-resized.jpg,13/Gallery_images/1709189484_IMG_20240205_092827-resized.jpg,13/Gallery_images/1709189484_IMG_20240205_092846-resized.jpg', 0, NULL, 1, '2024-02-29 12:21:24', NULL, NULL),
(120, 28, 28, '28/Gallery_images/1709636049_services-1.png', 2, NULL, 1, '2024-03-05 16:24:09', NULL, NULL),
(121, 28, 28, '28/Gallery_images/1709636737_services-1.png,28/Gallery_images/1709636737_services-2.png,28/Gallery_images/1709636737_services-3.png,28/Gallery_images/1709636737_services-4.png,28/Gallery_images/1709636737_services-5.png,28/Gallery_images/1709636737_services-6.png', 2, NULL, 1, '2024-03-05 16:35:37', NULL, NULL),
(122, 28, 79, '', 2, NULL, 1, '2024-03-06 11:50:49', 1, '2024-03-06 12:21:26'),
(123, 28, 79, '28/Gallery_images/1709876580_banne-slider-1.webp', 0, NULL, 1, '2024-03-08 11:13:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallerycategory`
--

CREATE TABLE `tbl_gallerycategory` (
  `GallCat_Id` int(20) NOT NULL,
  `GallCat_Reg_Id` int(20) NOT NULL,
  `GallCat_Name` varchar(255) DEFAULT NULL,
  `GallCat_FullDesc` text DEFAULT NULL,
  `GallCat_Image` varchar(255) DEFAULT NULL,
  `GallCat_Status` int(11) NOT NULL DEFAULT 0,
  `GallCat_CreatedBy` int(11) DEFAULT NULL,
  `GallCat_CreatedDate` datetime DEFAULT NULL,
  `GallCat_UpdatedBy` int(11) DEFAULT NULL,
  `GallCat_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallerycategory`
--

INSERT INTO `tbl_gallerycategory` (`GallCat_Id`, `GallCat_Reg_Id`, `GallCat_Name`, `GallCat_FullDesc`, `GallCat_Image`, `GallCat_Status`, `GallCat_CreatedBy`, `GallCat_CreatedDate`, `GallCat_UpdatedBy`, `GallCat_UpdatedDate`) VALUES
(9, 4, 'd', NULL, 'Arihant_Diagnostic_Images/GalleryCategory_images/1706348997.webp', 0, 59, '2024-01-22 11:35:36', 1, '2024-02-22 16:06:19'),
(10, 4, 'Comprehensive Hematology Testing in One-Step', 'The Sysmex XP-100 is a state-of-the-art hematology analyzer. It´s a cutting-edge hematology analyzer. It can process up to 60 samples per hour. It utilizes innovative technologies to ensure precise and dependable results.', 'Arihant_Diagnostic_Images/GalleryCategory_images/1706348991.webp', 0, 59, '2024-01-22 11:37:46', 37, '2024-01-27 15:49:51'),
(11, 4, 'Semi-Automated Biochemistry Testing Made Easy', 'The Erba Chem-7 is a powerful and versatile semi-automated biochemistry analyzer that can perform a wide range of tests with minimal operator intervention. It provide accurate and reliable results quickly and easily.', 'Arihant_Diagnostic_Images/GalleryCategory_images/1706348984.webp', 0, 59, '2024-01-22 11:38:33', 37, '2024-01-27 15:49:44'),
(17, 13, 'Category1', 'Category1', 'AMD_Images/GalleryCategory_images/1706630902.png', 0, 1, '2024-01-29 16:26:21', 1, '2024-01-30 22:08:22'),
(18, 13, 'Category2', 'Category2', 'AMD_Images/GalleryCategory_images/1706630913.png', 0, 1, '2024-01-29 16:26:36', 1, '2024-01-30 22:08:33'),
(71, 1, 'Edu Catgeory 1', 'Edu Catgeory 1', '1/GalleryCategory_images/1708668354.jpg', 2, 1, '2024-02-23 11:35:54', NULL, NULL),
(72, 1, 'Edu Catgeory 2', 'Edu Catgeory 2', '1/GalleryCategory_images/1708668365.jpg', 2, 1, '2024-02-23 11:36:05', NULL, NULL),
(73, 13, 'amd', 'aa', '13/GalleryCategory_images/1709189470.jpg', 0, 1, '2024-02-29 12:21:10', NULL, NULL),
(74, 1, 'aaaaaa', 'aa', '1/GalleryCategory_images/1709203301.jpg', 2, 1, '2024-02-29 16:11:41', NULL, NULL),
(75, 13, 's', NULL, '13/GalleryCategory_images/1709289019.png', 2, 1, '2024-03-01 16:00:19', NULL, NULL),
(79, 28, '111111111', '11111111111111111111111', '28/GalleryCategory_images/1709876603.webp', 0, 1, '2024-03-06 11:50:25', 1, '2024-03-08 11:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `Log_Id` int(20) NOT NULL,
  `Log_Reg_Id` int(11) UNSIGNED NOT NULL,
  `Log_Emp_Id` int(11) DEFAULT NULL,
  `Log_Username` varchar(255) DEFAULT NULL,
  `Log_Password` varchar(255) DEFAULT '0',
  `Log_Status` int(20) DEFAULT 1,
  `Log_CreatedBy` int(11) DEFAULT NULL,
  `Log_CreatedDate` datetime DEFAULT NULL,
  `Log_UpdatedBy` int(11) DEFAULT NULL,
  `Log_UpdatedDate` datetime DEFAULT NULL,
  `Log_DeletedDate` datetime DEFAULT NULL,
  `Log_DeletedBy` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Log_Id`, `Log_Reg_Id`, `Log_Emp_Id`, `Log_Username`, `Log_Password`, `Log_Status`, `Log_CreatedBy`, `Log_CreatedDate`, `Log_UpdatedBy`, `Log_UpdatedDate`, `Log_DeletedDate`, `Log_DeletedBy`) VALUES
(1, 1, 1, 'rahulsoni@admin.com', '$2y$10$DztGpgq/0n24hVk4b094le6gHp0a5mQ25DCT8wIFxAeo5Ae4XB9f6', 1, NULL, NULL, 1, '2024-02-06 15:43:51', NULL, NULL),
(38, 4, 2, 'arihantdiagnostics@gmail.com', '$2y$10$4DQHS6Z7rjYZOt3npjYzuuV92IPhsNB9l7dUJWF54MOQPi8FU19JK', 1, 37, '2024-01-24 22:42:19', 1, '2024-02-07 13:18:42', NULL, NULL),
(42, 13, 7, 'AMD', '$2y$10$Fhd1kFHb6f0Ej2bDznIIOOHTy2n1hdOy0wlWfgGcBTT7TrxAY5zt6', 1, 1, '2024-01-29 12:54:12', NULL, '2024-01-29 12:54:12', NULL, NULL),
(77, 28, 54, 'rajasthanconsultancy@gmail.com', '$2y$10$Fhd1kFHb6f0Ej2bDznIIOOHTy2n1hdOy0wlWfgGcBTT7TrxAY5zt6', 1, 1, '2024-02-13 16:11:01', NULL, NULL, NULL, NULL),
(78, 29, 55, 'mindsup', '$2y$10$DztGpgq/0n24hVk4b094le6gHp0a5mQ25DCT8wIFxAeo5Ae4XB9f6', 1, 1, '2024-03-08 11:52:02', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `Men_Id` int(20) NOT NULL,
  `Men_Reg_Id` int(20) DEFAULT NULL,
  `Men_Name` varchar(255) DEFAULT NULL,
  `Men_URL` varchar(255) DEFAULT NULL,
  `Men_SubMenuExists` varchar(255) DEFAULT NULL,
  `Men_ShortDesc` varchar(255) DEFAULT NULL,
  `Men_FullDesc` text DEFAULT NULL,
  `Men_SerialOrder` varchar(255) DEFAULT NULL,
  `Men_AdminExists` varchar(255) DEFAULT NULL,
  `Men_Status` int(20) DEFAULT 0,
  `Men_CreatedBy` int(20) DEFAULT NULL,
  `Men_CreatedDate` datetime NOT NULL,
  `Men_UpdatedBy` int(11) DEFAULT NULL,
  `Men_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`Men_Id`, `Men_Reg_Id`, `Men_Name`, `Men_URL`, `Men_SubMenuExists`, `Men_ShortDesc`, `Men_FullDesc`, `Men_SerialOrder`, `Men_AdminExists`, `Men_Status`, `Men_CreatedBy`, `Men_CreatedDate`, `Men_UpdatedBy`, `Men_UpdatedDate`) VALUES
(14, 4, 'Home', '/', NULL, 'AT ARIHANT DIAGNOSTICS CENTRE', '<p>Our innovative pathology machine aims to revolutionize the way specimens are processed analyzed and diagnosed. Its exceptional precision and accuracy enable it to identify the subtle abnormalities that may go unnoticed, by human observers.</p>\r\n\r\n<p>Together our machine and technicians create a team. They represent the future of pathology. Remain committed, to providing timely diagnoses of utmost importance.</p>\r\n\r\n<p>If you seek top notch care for your patients look no further. Our pathology machine and technicians set the industry standard of excellence..</p>', '1', 'on', 0, 59, '2024-01-18 10:33:12', 1, '2024-02-12 13:04:10'),
(15, 4, 'About Us', 'about', 'on', 'We Employ Expert Technician & Latest Technology Machine', '<h1>The Ultimate Destination for Comprehensive Body Tests</h1>\r\n\r\n    <p>At <strong>Arihant Diagnostics Centre</strong>, we offer unmatched services catered towards individuals of all ages, from infants to the elderly, right in the comfort of your own home. With a wide range of top-to-bottom body tests available, we strive to provide the best quality service at the most affordable prices in Ajmer City.</p>\r\n\r\n    <p><em>Accuracy is our top priority.</em> We utilize state-of-the-art technology to ensure the highest level of accuracy in all our tests. Our team of experienced professionals is committed to delivering precise and reliable results to aid in your healthcare decisions.</p>\r\n\r\n    <p>What sets us apart is our convenient <strong>home blood sampling service</strong>. You no longer need to step out of your house to get your body tests done. Our certified phlebotomists will visit your home to collect the required samples, allowing you to stay in the comfort of your own environment. This hassle-free service saves you time, money, and effort.</p>\r\n\r\n    <p>At <strong>Arihant Diagnostics Centre</strong>, we understand that your health is of utmost importance. That’s why we strive to be your one-stop solution for all your body test needs. With just one blood sample, we are able to conduct a multitude of tests and provide you with a comprehensive report.</p>\r\n\r\n    <p>Experience the convenience and accuracy of <strong>Arihant Diagnostics Centre</strong> today. Schedule an appointment and let us take care of your body test requirements, ensuring a healthier future for you and your loved ones.</p>', '2', 'on', 0, 59, '2024-01-18 10:33:30', 1, '2024-02-05 13:10:21'),
(16, 4, 'Gallery', 'gallery', NULL, 'Gallery', '<p>Gallery</p>', '3', NULL, 0, 59, '2024-01-18 10:33:49', NULL, '2024-01-18 10:33:49'),
(17, 4, 'Contact', 'contact', NULL, 'For the most accurate, reliable, and compassionate pathology services in city Ajmer.', '<p>We have the latest technology, the most experienced technicians, and a team of board-certified pathologists with subspecialty expertise. We are committed to providing you with the best possible care for your patients.</p>', '6', NULL, 0, 59, '2024-01-18 10:34:06', 37, '2024-01-25 13:21:12'),
(19, 4, 'Services', 'service', NULL, 'Our body test can help you identify any potential health problems early, when they are most treatable. It is also a great way to track your health over time and see how your lifestyle changes are affecting your health.', '<p><strong>Together, our machine and our technicians form an unbeatable team. They are the future of pathology, and they are committed to providing the most accurate and timely diagnoses possible.</strong></p>', '5', NULL, 0, 29, '2024-01-24 11:52:55', NULL, '2024-01-24 11:52:55'),
(22, 13, 'Home2', '/', NULL, 'Why Plan a Career?', '<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&lsquo;Understanding oneself&rsquo; is a critical aspect of one&rsquo;s career building Program, educational exploration &amp; planning .The more you know yourself &amp; your career related interests, values ,skills , personality type and preferences ,the better equipped you will be to identify the career fields, major areas of study and training programs, and educational pathways that are compatible with your personal attributes. Goal setting program will help you smartly develop an accurate self-assessment of yourself.</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Today there are so many options available. Dynamics of employment market along with global competition.</span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '1', 'on', 0, 1, '2024-01-29 17:05:36', 42, '2024-03-01 17:13:36'),
(23, 13, 'About', 'about', NULL, 'a', '<h3><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">About AMD Career Shapers</span></span></span></strong></span></span></h3>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">AMD Career Shapers&nbsp; is a platform for career assessment, career guidance and career counseling, designed for school students and graduates. It helps a student discover his perfect career through career assessment, and revolutionary approach to career counseling ,assessment and career guidance.</span></span></span></span></span></p>\r\n\r\n<h2><span style=\"font-size:18pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">Our Philosophy</span></span></span></strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">Students spend 70% of their adult life at the workplace. Career decisions are one of the most important decisions in a student&#39;s academic and professional journey, if seeded right it saves on time, money, effort. It is essential that these decisions are made with utmost care and expertise.</span></span></span></span></span></span></p>\r\n\r\n<h2><span style=\"font-size:18pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">Our Strengths</span></span></span></strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">We blend technology with strategic human interventions to enable you decide a successful career. Our team &amp; psychometric support bring you a deciding experience with the single aim to help students.</span></span></span></span></span></span></p>\r\n\r\n<h2><span style=\"font-size:18pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">Our Pedagogy</span></span></span></strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">We aim to minimize confusion in the career decision making process. We blend technology and expertise to help students, parents, schools in making informed career decisions. Our platform and experts together simplify this process.</span></span></span></span></span></span></p>\r\n\r\n<h2><span style=\"font-size:18pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">Our Accord</span></span></span></strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,serif\"><span style=\"color:#484848\">We are a group of career experts, strategists, entrepreneurs, with whom you can Trust with your career decisions as we help you figure out your true self and help you craft your success stories.</span></span></span></span></span></span></p>', '2', NULL, 0, 1, '2024-01-29 17:06:05', 1, '2024-03-01 16:21:55'),
(24, 13, 'Career', 'career', NULL, 'CAREER', NULL, '3', NULL, 0, 1, '2024-01-29 17:06:42', 1, '2024-01-29 17:17:23'),
(25, 13, 'Gallery', 'gallery', 'on', 'gallery', NULL, '4', NULL, 0, 1, '2024-01-29 17:07:31', 1, '2024-02-05 13:51:05'),
(26, 13, 'Student', 'student', NULL, 'student', NULL, '5', NULL, 0, 1, '2024-01-29 17:07:40', 1, '2024-01-29 17:17:47'),
(27, 13, 'Contact', 'contact', NULL, 'contact', NULL, '8', NULL, 0, 1, '2024-01-29 17:08:08', 1, '2024-01-29 17:17:59'),
(28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-02-01 21:44:14', NULL, '2024-02-01 21:44:14'),
(29, 13, 'Work Buddies', 'team', NULL, 'Men_ShortDesc', NULL, '6', NULL, 0, 1, '2024-01-29 17:08:08', 1, '2024-01-29 17:17:59'),
(30, 13, 'Solutions', 'service', NULL, 'Men_ShortDesc', NULL, '7', NULL, 0, 1, '2024-01-29 17:08:08', 1, '2024-01-29 17:17:59'),
(31, 28, 'Home', '/', 'on', 'We Create a Culture That Inspires Us To Work Smart Together', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>', '1', NULL, 0, 1, '2024-02-14 11:27:26', 1, '2024-03-01 11:17:11'),
(32, 28, 'Our Services', 'service', NULL, 'Developing Solutions For The Future', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt&nbsp;ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation&nbsp; ullaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt&nbsp;ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation&nbsp; ullamco.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt&nbsp;ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation&nbsp; ullamco.mco.</p>', '6', NULL, 0, 1, '2024-02-14 11:27:56', 1, '2024-02-14 16:11:40'),
(33, 28, 'Team', 'team', NULL, 'short', NULL, '3', NULL, 0, 1, '2024-02-14 11:28:23', NULL, NULL),
(34, 28, 'Contact', 'contact', NULL, 'sd', NULL, '7', NULL, 0, 1, '2024-02-14 11:28:43', 1, '2024-02-21 12:21:37'),
(35, 28, 'Gallery', 'gallery', NULL, 's', NULL, '5', NULL, 0, 1, '2024-02-14 11:29:38', NULL, NULL),
(36, 28, 'About', 'about', NULL, 'Our Company Provide High Quality Idea', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>', '2', NULL, 0, 1, '2024-02-14 13:29:03', 1, '2024-02-14 13:33:47'),
(37, 29, 'Home', '/', NULL, 'Master the skills to drive your career', '<p>Get certified, master modern tech skills, and level up your career whether you&rsquo;re starting&nbsp;out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>', '1', NULL, 0, 1, '2024-03-08 13:33:42', 1, '2024-03-09 11:13:59'),
(38, 29, 'About Us', '/about', NULL, 'No matter what\'s troubling you, we will help you get through it.', '<p>MINDS UP is a Counselling Service platform that had been providing a professional, affordable counselling service to the community since very long time. We offers counselling to adults and young people from the age of 12 years. We are committed to providing an accessible service across the community. We provide help in dealing with emotional and behavioural problems like anxiety, depression, dependency, stress, guilt, lack of confidence, low self esteem, and internet addiction of any sort, personal problems in relationship like co-dependency, rejection, separation home-sickness etc. we try our best In order to do fostering and inculcating life skills to make better adjustments and enriching healthy relationships. We are working to promote well-being, protecting humans from life hurdles, aiding to develop better understanding of the self, to help them to grow behaviourally, intellectually and emotionally, to be more satisfied with present, ambitious for the future and balanced for the past, to be productive and improve the depth and quality of your life.</p>', '2', NULL, 0, 1, '2024-03-08 13:34:13', 1, '2024-03-09 17:28:27'),
(39, 29, 'Faq\'s', 'faqs', NULL, 'Most frequently asked questions', '<p>Here are the most frequently asked questions you may check before getting started</p>', '3', NULL, 0, 1, '2024-03-09 11:58:55', NULL, NULL),
(40, 29, 'Covid-19', 'covid', NULL, 'Short Desc', '<p>In present tough time whole world is under stress due to COVID effect, The COVID-19 pandemic affects everyone, everywhere whether it is a working man, working woman,&nbsp;house wives, school going children&rsquo;s, labor, businessman etc. it affects different groups of people differently, deepening existing inequalities.</p>\r\n\r\n<p>If we talk about the woman and girls the pandemic is having devastating social and economic consequences for women and girls. Nearly 60&nbsp;per cent of women around the world work in the informal economy, earning less, saving less, and at greater risk of falling into poverty.&nbsp; As markets fall and businesses close, millions of women&rsquo;s jobs have disappeared.&nbsp; At the same time, as they are losing paid employment, women&rsquo;s unpaid care work has increased exponentially as a result of school closures and the increased needs of older people. The pandemic has also led to a horrifying increase in violence against women.&nbsp; Nearly one in five women worldwide has experienced violence in the past year.&nbsp; Many of these women are now trapped at home with their abusers, struggling to access services that are suffering from cuts and restrictions.&nbsp; This was the basis for my appeal to Governments earlier this week to take urgent steps to protect women and expand support services.COVID-19 is not only challenging global health systems, but testing our common humanity.&nbsp; Gender equality and women&rsquo;s rights are essential to getting through this pandemic together, to recovering faster, and to building a better future for everyone.</p>\r\n\r\n<p>If we talk about working professionals, it was tough to cop between personal and professional life by doing work from home, it is also difficult for the students who are giving board exams this year and planning to take admission in reputed college or for those who are taking online classes, parents are feeling extreme pressure about the career of their wards.</p>\r\n\r\n<p>In general it is very common to have mood swings, depression, anxiety, tension, behavioral problem and career related queries and uncertainty among us, in order to overcome such problems one must take help of counsellor and must go through for counselling with professional career counselor, here at MINDS UP we are having a great team which can help you in this tough time. One can also refer following article by WHO&nbsp; entitled &ldquo;COVID-19 Pandemic Triggers Devastating Social, Economic Impact on Women, Girls, Secretary-General Says, Urging Governments to Protect Their Rights&rdquo;</p>\r\n\r\n<p><a href=\"https://www.who.int/docs/default-source/coronaviruse/mental-health-considerations.pdf?sfvrsn=6d3578af_2\" target=\"_blank\">WHO &ndash; MENTAL HEALTH AND PSYCHOSOCIAL CONSIDERATIONS DURING THE COVID-19 OUTBREAK</a></p>', '4', NULL, 0, 1, '2024-03-09 17:01:32', NULL, NULL),
(41, 29, 'Counselling', 'counselling', NULL, 'counselling', '<p>counselling</p>', '5', NULL, 0, 1, '2024-03-09 17:13:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `Pag_Id` int(20) NOT NULL,
  `Pag_Reg_Id` int(20) NOT NULL,
  `Pag_PagCat_Id` int(20) DEFAULT NULL,
  `Pag_Name` varchar(255) DEFAULT NULL,
  `Pag_URL` varchar(255) DEFAULT NULL,
  `Pag_Image` varchar(255) DEFAULT NULL,
  `Pag_ShortDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pag_FullDesc` text DEFAULT NULL,
  `Pag_SerialOrder` varchar(255) DEFAULT NULL,
  `Pag_Date` varchar(255) DEFAULT NULL,
  `Pag_AdminExists` varchar(255) DEFAULT NULL,
  `Pag_Status` int(20) DEFAULT 0,
  `Pag_CreatedBy` int(20) NOT NULL,
  `Pag_CreatedDate` datetime NOT NULL,
  `Pag_UpdatedBy` int(20) DEFAULT NULL,
  `Pag_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`Pag_Id`, `Pag_Reg_Id`, `Pag_PagCat_Id`, `Pag_Name`, `Pag_URL`, `Pag_Image`, `Pag_ShortDesc`, `Pag_FullDesc`, `Pag_SerialOrder`, `Pag_Date`, `Pag_AdminExists`, `Pag_Status`, `Pag_CreatedBy`, `Pag_CreatedDate`, `Pag_UpdatedBy`, `Pag_UpdatedDate`) VALUES
(16, 4, 22, 'Instagram', 'instagram', '<i class=\"fab fa-instagram\"></i>', NULL, NULL, NULL, NULL, 'on', 0, 1, '2024-01-10 16:51:45', 59, '2024-01-18 11:57:29'),
(17, 4, 22, 'Facebook', 'Facebook', '<i class=\"fab fa-facebook-f\"></i>', NULL, NULL, NULL, NULL, 'on', 0, 1, '2024-01-10 17:04:41', 59, '2024-01-18 11:45:37'),
(23, 4, 22, 'Telegram', 'Telegram', '<i class=\"fab fa-telegram\"></i>', NULL, NULL, NULL, NULL, NULL, 0, 44, '2024-01-10 17:25:00', 59, '2024-01-18 11:46:38'),
(58, 4, 22, 'Twitter', 'Twitter', '<i class=\"fab fa-twitter\"></i>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-01-13 12:26:11', 59, '2024-01-18 11:45:51'),
(59, 4, 22, 'Youtube', 'YouTube', '<i class=\"fab fa-youtube\"></i>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-01-13 12:26:41', 59, '2024-01-18 11:47:34'),
(67, 4, 19, 'Home', '/', '1705477290.jpg', 'ShortDesc', '<p>FullDesc</p>', '1', NULL, NULL, 0, 59, '2024-01-17 13:16:46', 59, '2024-01-17 14:12:41'),
(68, 4, 19, 'About Us', 'about', '1705477290.jpg', '2', '<p>2</p>', '2', NULL, NULL, 0, 59, '2024-01-17 13:21:51', 59, '2024-01-17 13:57:13'),
(69, 4, 19, 'Contact', 'contact', NULL, 'contact', '<p>contact</p>', '5', NULL, NULL, 0, 59, '2024-01-17 13:47:51', 59, '2024-01-17 14:30:04'),
(70, 4, 19, 'Gallery', 'gallery', NULL, 'Gallery', '<p>Gallery</p>', '4', NULL, NULL, 0, 59, '2024-01-17 13:58:20', NULL, '2024-01-17 13:58:20'),
(74, 4, 23, 'Harshit Jain', NULL, '4/Testimonial_images/1708595090.jpg', 'I understand feel better like doctor nurse and staffing', NULL, '1', NULL, NULL, 0, 59, '2024-01-17 15:40:36', 1, '2024-02-22 15:14:50'),
(81, 4, 20, 'About Company', 'About Company', NULL, 'About Company', '<p>About Company</p>', '10', NULL, NULL, 0, 59, '2024-01-17 17:02:12', NULL, '2024-01-17 17:02:12'),
(82, 4, 20, 'Services', 'Services', NULL, 'Services', '<p>Services</p>', '10', NULL, NULL, 0, 59, '2024-01-17 17:02:23', NULL, '2024-01-17 17:02:23'),
(83, 4, 20, 'How It Works', 'How It Works', NULL, 'How It Works', '<p>How It Works</p>', '10', NULL, NULL, 0, 59, '2024-01-17 17:02:31', NULL, '2024-01-17 17:02:31'),
(84, 4, 20, 'Our Blog', 'Our Blog', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '10', NULL, NULL, 0, 59, '2024-01-17 17:02:43', 59, '2024-01-17 17:55:37'),
(86, 4, 28, 'Blood Sample Collection at home.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 59, '2024-01-18 14:35:44', 59, '2024-01-18 14:37:43'),
(87, 4, 28, 'We Provide counseling services to patients who have been diagnosed with a disease.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 59, '2024-01-18 14:36:34', 59, '2024-01-18 14:38:03'),
(88, 4, 28, 'We Offers a service to help patients interpret their test results.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 59, '2024-01-18 14:38:11', NULL, '2024-01-18 14:38:11'),
(92, 4, 31, 'Vimal Jain', NULL, 'Arihant_Diagnostic_Images/Team_images/1708684303.jpg', 'Senior Lab Technician, J.L.N Hospital Ajmer (Retired)', NULL, '1', NULL, NULL, 0, 59, '2024-01-18 15:49:49', 1, '2024-02-23 16:31:43'),
(110, 4, 32, 'GalleryCategory 1', NULL, '1705651449.jpg', 'GalleryCategory 1', NULL, NULL, NULL, NULL, 0, 59, '2024-01-19 14:04:09', NULL, '2024-01-19 14:04:09'),
(111, 4, 26, 'Slider', NULL, '1705651526.jpg', NULL, NULL, NULL, NULL, NULL, 0, 59, '2024-01-19 14:05:26', NULL, '2024-01-19 14:05:26'),
(112, 4, 32, 'GalleryCategory 2', NULL, '1705651568.jpg', 'GalleryCategory 2', NULL, NULL, NULL, NULL, 0, 59, '2024-01-19 14:06:08', NULL, '2024-01-19 14:06:08'),
(113, 4, 26, 'Gallery 2', NULL, '1705651599.jpg', NULL, NULL, NULL, NULL, NULL, 0, 59, '2024-01-19 14:06:39', NULL, '2024-01-19 14:06:39'),
(120, 4, 33, 'CBC (27 Tests)', NULL, NULL, '100/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:24:27', NULL, '2024-01-24 11:32:35'),
(121, 4, 33, 'SUGAR (F & PP)', NULL, NULL, '10/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:32:46', NULL, '2024-01-24 11:32:46'),
(122, 4, 33, 'HbA1C', NULL, NULL, '250/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:32:57', NULL, '2024-01-24 11:32:57'),
(123, 4, 33, 'LIVER FUNCTION (11 TESTS)', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:33:16', NULL, '2024-01-24 11:33:16'),
(124, 4, 33, 'KIDNEY FUNCTION (6 Tests)', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:33:25', NULL, '2024-01-24 11:33:25'),
(125, 4, 33, 'LIPID PROFILE   (10 Tests)', NULL, NULL, '250/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:33:39', NULL, '2024-01-24 11:33:39'),
(126, 4, 33, 'THYROID PROFILE (3 TESTS)', NULL, NULL, '100/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:33:50', NULL, '2024-01-24 11:33:50'),
(127, 4, 33, 'VITAMIN B12', NULL, NULL, '250/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:01', NULL, '2024-01-24 11:34:01'),
(128, 4, 33, 'VITAMIN D3', NULL, NULL, '400/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:10', NULL, '2024-01-24 11:34:10'),
(129, 4, 33, 'LH', NULL, NULL, '100/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:19', NULL, '2024-01-24 11:34:19'),
(130, 4, 33, 'FSH', NULL, NULL, '100/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:27', NULL, '2024-01-24 11:34:27'),
(131, 4, 33, 'PROLACTIN', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:34', NULL, '2024-01-24 11:34:34'),
(132, 4, 33, 'TESTOSTERONE', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:45', NULL, '2024-01-24 11:34:45'),
(133, 4, 33, 'AMYLASE', NULL, NULL, '110/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:55', NULL, '2024-01-24 11:34:55'),
(134, 4, 33, 'CALCIUM', NULL, NULL, '50/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:03', NULL, '2024-01-24 11:35:03'),
(135, 4, 33, 'CRP', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:14', NULL, '2024-01-24 11:35:14'),
(136, 4, 33, 'RA FACTOR', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:23', NULL, '2024-01-24 11:35:23'),
(137, 4, 33, 'CPKMB', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:33', NULL, '2024-01-24 11:35:33'),
(138, 4, 33, 'IRON', NULL, NULL, '90/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:43', NULL, '2024-01-24 11:35:43'),
(139, 4, 33, 'LDH', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:51', NULL, '2024-01-24 11:35:51'),
(140, 4, 33, 'ANTI-CCP', NULL, NULL, '500/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:35:58', NULL, '2024-01-24 11:35:58'),
(141, 4, 33, 'BETA-HCG', NULL, NULL, '150/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:36:09', NULL, '2024-01-24 11:36:09'),
(142, 4, 33, 'PSA', NULL, NULL, '150/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:36:24', NULL, '2024-01-24 11:36:24'),
(143, 4, 33, 'FERRITIN', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:36:32', NULL, '2024-01-24 11:36:32'),
(144, 4, 33, 'TTG-IgA', NULL, NULL, '350/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:39:24', NULL, '2024-01-24 11:39:24'),
(145, 4, 33, 'IgE', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:39:32', NULL, '2024-01-24 11:39:32'),
(146, 4, 33, 'TSH', NULL, NULL, '40/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:39:39', NULL, '2024-01-24 11:39:39'),
(147, 4, 33, 'ALLERGY COMPLETE', NULL, NULL, '3500/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:39:50', NULL, '2024-01-24 11:39:50'),
(148, 4, 33, 'SEMEN ANALYSIS', NULL, NULL, '50/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:40:04', NULL, '2024-01-24 11:40:04'),
(149, 4, 33, 'ELECTROLYTES', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:41:27', NULL, '2024-01-24 11:41:27'),
(150, 4, 33, 'D-DIMER', NULL, NULL, '550/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:41:34', NULL, '2024-01-24 11:41:34'),
(151, 4, 33, 'PT-INR', NULL, NULL, '100/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:41:41', NULL, '2024-01-24 11:41:41'),
(152, 4, 33, 'ESR', NULL, NULL, '30/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:41:49', NULL, '2024-01-24 11:41:49'),
(153, 4, 33, 'HIV BY CARD', NULL, NULL, '80/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:41:56', NULL, '2024-01-24 11:41:56'),
(154, 4, 33, 'HBSAG BY CARD', NULL, NULL, '80/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:02', NULL, '2024-01-24 11:42:02'),
(155, 4, 33, 'HCV BY CARD', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:10', NULL, '2024-01-24 11:42:10'),
(156, 4, 33, 'DENGUE CARD', NULL, NULL, '400/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:17', NULL, '2024-01-24 11:42:17'),
(157, 4, 33, 'MALARIA CARD', NULL, NULL, '60/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:24', NULL, '2024-01-24 11:42:24'),
(158, 4, 33, 'VDRL', NULL, NULL, '40/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:32', NULL, '2024-01-24 11:42:32'),
(159, 4, 33, 'CORTISOL (4PM)', NULL, NULL, '175/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:42:49', NULL, '2024-01-24 11:43:05'),
(160, 4, 33, 'CORTISOL (8PM)', NULL, NULL, '175/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:43:14', NULL, '2024-01-24 11:43:14'),
(161, 4, 33, 'CORTISOL (8PM)', NULL, NULL, 'CORTISOL (8PM)', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:43:20', NULL, '2024-01-24 11:43:20'),
(162, 4, 33, 'BLOOD GROUP', NULL, NULL, '40/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:43:30', 37, '2024-01-25 16:34:09'),
(163, 4, 33, 'MICRO ALBUMIN', NULL, NULL, '150/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:43:40', NULL, '2024-01-24 11:43:40'),
(164, 4, 33, 'WIDAL SLIDE TEST', NULL, NULL, '50/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:43:50', NULL, '2024-01-24 11:43:50'),
(165, 4, 33, 'URINE ROUTINE EXAM', NULL, NULL, '20/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:44:02', NULL, '2024-01-24 11:44:02'),
(166, 4, 33, 'STOOL EXAMINATION', NULL, NULL, '20/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:44:10', NULL, '2024-01-24 11:44:10'),
(167, 4, 33, 'SPUTUM EXAMINATION', NULL, NULL, '40/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:44:18', NULL, '2024-01-24 11:44:18'),
(168, 4, 33, 'BT CT', NULL, NULL, '20/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:44:25', NULL, '2024-01-24 11:44:25'),
(169, 4, 30, 'Package1', NULL, 'Arihant_Diagnostic_Images/Package_images/1706348866.webp', NULL, NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:49:09', 1, '2024-02-22 14:55:11'),
(170, 4, 30, 'Package2', NULL, 'Arihant_Diagnostic_Images/Package_images/1706348872.webp', NULL, NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:50:51', 37, '2024-01-27 15:47:52'),
(171, 4, 30, 'Package3', NULL, 'Arihant_Diagnostic_Images/Package_images/1706348879.webp', NULL, NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:51:04', 37, '2024-01-27 15:47:59'),
(172, 4, 30, 'Package4', NULL, 'Arihant_Diagnostic_Images/Package_images/1706348886.webp', NULL, NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:51:15', 37, '2024-01-27 15:48:06'),
(173, 4, 30, 'Package5', NULL, 'Arihant_Diagnostic_Images/Package_images/1706348892.webp', NULL, NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:51:30', 37, '2024-01-27 15:48:12'),
(177, 4, 31, 'SK Ajaharuddin', NULL, 'Arihant_Diagnostic_Images/Team_images/1708684310.jpg', 'Laboratory Technician, B.sc MLT', NULL, '1', NULL, NULL, 0, 37, '2024-01-25 12:08:03', 1, '2024-02-23 16:31:50'),
(178, 4, 31, 'Syed Imraj Hossain', NULL, 'Arihant_Diagnostic_Images/Team_images/1706349913.jpeg', 'Laboratory Technician, B.Sc MLT', NULL, '1', NULL, NULL, 0, 37, '2024-01-25 12:08:32', 1, '2024-02-22 15:06:51'),
(180, 4, 23, 'Kanhiya Parwani', NULL, 'Arihant_Diagnostic_Images/Testimonial_images/1706349176.png', 'They took my blood collection medical check-up perfectly staff is very good nd respective nature', NULL, '6', NULL, NULL, 0, 37, '2024-01-25 13:43:39', 37, '2024-01-27 15:52:56'),
(181, 4, 23, 'POOJA KHINCHI', NULL, 'Arihant_Diagnostic_Images/Testimonial_images/1706349183.png', 'Very nice Arihant Diagnostic Centre', NULL, '7', NULL, NULL, 0, 37, '2024-01-25 13:53:44', 37, '2024-01-27 15:53:03'),
(183, 4, 33, 'MAGNESIUM', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 37, '2024-01-25 16:34:19', NULL, '2024-01-25 16:34:19'),
(217, 13, 22, 'Instagram', 'instagram', '<i class=\"fab fa-instagram\"></i>', NULL, NULL, '2', NULL, 'on', 0, 1, '2024-01-10 16:51:45', 59, '2024-01-18 11:57:29'),
(218, 13, 22, 'Facebook', 'Facebook', '<i class=\"fab fa-facebook-f\"></i>', NULL, NULL, '1', NULL, 'on', 0, 1, '2024-01-10 17:04:41', 59, '2024-01-18 11:45:37'),
(219, 13, 22, 'Telegram', 'Telegram', '<i class=\"fab fa-telegram\"></i>', NULL, NULL, '3', NULL, NULL, 0, 44, '2024-01-10 17:25:00', 59, '2024-01-18 11:46:38'),
(220, 13, 22, 'Twitter', 'Twitter', '<i class=\"fab fa-twitter\"></i>', NULL, NULL, '4', NULL, NULL, 0, 1, '2024-01-13 12:26:11', 59, '2024-01-18 11:45:51'),
(221, 13, 22, 'Youtube', 'YouTube', '<i class=\"fab fa-youtube\"></i>', NULL, NULL, '5', NULL, NULL, 0, 1, '2024-01-13 12:26:41', 59, '2024-01-18 11:47:34'),
(223, 13, 47, 'Habina Rehman', NULL, 'AMD_Images/Testimonial_images/1706527787.png', 'Suffered are many variation of passages lorem availle there on alterati of\r\n                                        some form by the injected for users.', NULL, '2', NULL, NULL, 0, 1, '2024-01-29 17:29:47', NULL, '2024-01-29 17:29:47'),
(224, 13, 47, 'John Leo', NULL, 'AMD_Images/Testimonial_images/1706527806.png', 'Suffered are many variation of passages lorem availle there on alterati of\r\n                                        some form by the injected for users.', NULL, '1', NULL, NULL, 0, 1, '2024-01-29 17:30:06', NULL, '2024-01-29 17:30:06'),
(225, 13, 47, 'Lisa Devis', NULL, 'AMD_Images/Testimonial_images/1706527825.png', 'Suffered are many variation of passages lorem availle there on alterati of\r\n                                        some form by the injected for users.', NULL, '3', NULL, NULL, 0, 1, '2024-01-29 17:30:25', NULL, '2024-01-29 17:30:25'),
(226, 13, 48, 'Kevin Walker', NULL, 'AMD_Images/Team_images/1706528560.png', 'Kevin Walker', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '5', NULL, NULL, 0, 1, '2024-01-29 17:42:40', 1, '2024-02-21 15:27:25'),
(227, 13, 48, 'Sarry Denia', NULL, 'AMD_Images/Team_images/1706528579.png', 'Sarry Denia', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '6', NULL, NULL, 0, 1, '2024-01-29 17:42:59', 1, '2024-02-21 15:27:17'),
(228, 13, 48, 'Marry Scott', NULL, 'AMD_Images/Team_images/1706528601.png', 'Marry Scott', NULL, '3', NULL, NULL, 0, 1, '2024-01-29 17:43:21', 1, '2024-02-21 15:27:09'),
(229, 13, 48, 'Lili Jameson', NULL, 'AMD_Images/Team_images/1706528626.png', 'Lili Jameson', NULL, '2', NULL, NULL, 0, 1, '2024-01-29 17:43:46', 1, '2024-02-21 15:27:02'),
(230, 13, 49, 'Slider1', 'Slider1', 'AMD_Images/Slider_images/1706528817.jpg', 'Slider1', 'Slider1', '2', NULL, NULL, 0, 1, '2024-01-29 17:46:57', NULL, '2024-01-29 17:46:57'),
(231, 13, 49, 'Slider2', NULL, 'AMD_Images/Slider_images/1706528832.jpg', 'Slider2', '<p>Slider2</p>', '1', NULL, NULL, 0, 1, '2024-01-29 17:47:12', 42, '2024-03-01 17:21:49'),
(232, 13, 49, 'Slider3', 'Slider3', 'AMD_Images/Slider_images/1706528848.jpg', 'Slider3', 'Slider3', '3', NULL, NULL, 0, 1, '2024-01-29 17:47:28', NULL, '2024-01-29 17:47:28'),
(233, 13, 49, 'Slider4', 'Slider4', 'AMD_Images/Slider_images/1706528863.jpg', 'Slider4', 'Slider4', '4', NULL, NULL, 0, 1, '2024-01-29 17:47:43', NULL, '2024-01-29 17:47:43'),
(234, 13, 50, 'Which type of course you want to learn?', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '3', NULL, NULL, 0, 1, '2024-01-29 18:19:29', 1, '2024-02-21 15:11:53'),
(235, 13, 50, 'How can you contact us?', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '1', NULL, NULL, 0, 1, '2024-01-29 18:21:50', 1, '2024-03-01 15:54:34'),
(236, 13, 50, 'How can you contact us?', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '2', NULL, NULL, 0, 1, '2024-01-29 18:22:46', 1, '2024-02-21 15:12:02'),
(238, 13, 51, 'Scholarship Facility', NULL, NULL, 'Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum dolore fugiat.', NULL, NULL, NULL, NULL, 0, 1, '2024-01-29 18:42:37', NULL, '2024-01-29 18:42:37'),
(239, 13, 51, 'Book Library & Lab', NULL, NULL, 'Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum dolore fugiat.', NULL, NULL, NULL, NULL, 0, 1, '2024-01-29 18:42:51', NULL, '2024-01-29 18:42:51'),
(240, 13, 52, 'Hashtag going forward plagiarism West Seattle Blog Nook the power', NULL, NULL, 'What is Lorem Ipsum?', '<p><span style=\"color:#f44336\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis libero arcu. Mauris non ligula ut sapien auctor elementum quis non nisi. Nulla hendrerit leo nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut sit amet ultrices neque. Nulla facilisi. Donec et scelerisque turpis. Duis euismod felis id orci vehicula congue ut ac nisl. Vestibulum a placerat tellus. Proin congue velit non justo eleifend, et fringilla magna imperdiet. Sed luctus justo in nisl sagittis, non ornare sapien feugiat. Ut ut posuere arcu. Donec aliquam tincidunt velit non pretium. Morbi semper turpis vel placerat tincidunt. Praesent laoreet magna laoreet sollicitudin finibus.</span></p>\r\n\r\n<p>Sed quis risus eu lacus aliquam suscipit vitae a risus. Sed luctus sem et molestie fermentum. Fusce congue id felis vitae consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam faucibus iaculis diam in congue. Nullam ex ipsum, interdum eget libero vitae, consequat mollis nibh. Duis placerat dolor eros, eget rutrum magna ornare nec. Nullam dignissim ut ex a mattis. Aenean viverra semper massa faucibus egestas. Aliquam erat volutpat. Suspendisse luctus arcu nec ultrices posuere. Duis vel diam nisl.</p>\r\n\r\n<p>Vivamus imperdiet elit lacus, nec volutpat dolor vulputate vitae. Fusce porttitor euismod mi ut mattis. Aenean euismod, orci vel efficitur maximus, ipsum odio posuere nibh, quis placerat velit enim a urna. Aenean maximus nisl et metus scelerisque congue. Integer scelerisque fringilla congue. Fusce non dolor mollis metus tincidunt sollicitudin non vel est. Nam id quam volutpat, ultrices diam consectetur, venenatis elit. Cras hendrerit, diam non auctor molestie, velit nulla condimentum nibh, a convallis dolor nibh non nunc. Ut non vestibulum nisi, vitae volutpat libero. Donec imperdiet, libero at ullamcorper egestas, mi metus tempor massa, in viverra dui nisi at ante. Proin justo ante, accumsan sit amet ultricies ac, ullamcorper et augue. Proin interdum diam ut ornare accumsan. Sed scelerisque sagittis urna. Pellentesque lobortis, augue sed cursus viverra, ipsum lectus interdum massa, in sagittis augue enim nec libero.</p>\r\n\r\n<p>Fusce ut feugiat justo, ac euismod sapien. In congue nisl massa. Aenean nec lacus at massa mattis faucibus. In id posuere sem. Suspendisse ac lacus nec ligula consequat fringilla. Morbi varius lectus id purus semper, non facilisis dui semper. Mauris fringilla maximus tortor vitae suscipit. Nam non leo sit amet justo rutrum tincidunt eu et quam.</p>\r\n\r\n<p>Suspendisse venenatis mauris non ex tempor, eu lacinia purus euismod. Vivamus eget ex elementum, feugiat enim in, tempor urna. Ut suscipit lacinia aliquet. Nam ut nulla quis urna semper tempus ac condimentum elit. Aenean efficitur est id consectetur viverra. Phasellus semper egestas lacus ullamcorper vulputate. Proin eget sem turpis. Vestibulum eget lectus ut urna vestibulum sollicitudin. Morbi tempus justo nec justo rhoncus porttitor. Morbi varius bibendum enim, id blandit neque tincidunt vel. Aliquam sagittis at dolor scelerisque cursus. Suspendisse commodo, sapien eu scelerisque interdum, ante augue faucibus urna, nec porttitor sapien felis mattis lorem. Duis pharetra ipsum et diam pellentesque consequat.</p>\r\n\r\n<p>Etiam suscipit velit non ligula efficitur, eu eleifend arcu imperdiet. Mauris laoreet urna leo, quis posuere erat malesuada id. Aenean hendrerit vel purus et finibus. Integer pharetra, leo nec consectetur tincidunt, sapien augue ornare lorem, quis sagittis odio ligula vitae nulla. Morbi sapien ipsum, iaculis non sem facilisis, volutpat interdum libero. Aliquam id orci vel tortor consequat elementum ac malesuada augue. Mauris fringilla sodales felis, quis efficitur nunc. Integer congue id nulla sit amet pellentesque. Sed consectetur turpis et neque venenatis bibendum. Suspendisse commodo nunc eu ipsum tincidunt ultrices. Aliquam erat volutpat. Aliquam euismod hendrerit ipsum, a lobortis est vestibulum vel. Morbi auctor turpis ac libero interdum facilisis vel eu tellus.<img alt=\"\" src=\"http://127.0.0.1:8000/images/course_3_1706601906.png\" style=\"height:720px; width:1280px\" /></p>', NULL, NULL, NULL, 0, 1, '2024-01-30 10:43:41', 1, '2024-01-31 16:44:43'),
(246, 13, 52, 'Announcement2Hashtag going forward plagiarism West Seattle Blog', NULL, NULL, 'What is Lorem Ipsum?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis libero arcu. Mauris non ligula ut sapien auctor elementum quis non nisi. Nulla hendrerit leo nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut sit amet ultrices neque. Nulla facilisi. Donec et scelerisque turpis. Duis euismod felis id orci vehicula congue ut ac nisl. Vestibulum a placerat tellus. Proin congue velit non justo eleifend, et fringilla magna imperdiet. Sed luctus justo in nisl sagittis, non ornare sapien feugiat. Ut ut posuere arcu. Donec aliquam tincidunt velit non pretium. Morbi semper turpis vel placerat tincidunt. Praesent laoreet magna laoreet sollicitudin finibus.</p>\r\n\r\n<p>Sed quis risus eu lacus aliquam suscipit vitae a risus. Sed luctus sem et molestie fermentum. Fusce congue id felis vitae consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam faucibus iaculis diam in congue. Nullam ex ipsum, interdum eget libero vitae, consequat mollis nibh. Duis placerat dolor eros, eget rutrum magna ornare nec. Nullam dignissim ut ex a mattis. Aenean viverra semper massa faucibus egestas. Aliquam erat volutpat. Suspendisse luctus arcu nec ultrices posuere. Duis vel diam nisl.</p>\r\n\r\n<p>Vivamus imperdiet elit lacus, nec volutpat dolor vulputate vitae. Fusce porttitor euismod mi ut mattis. Aenean euismod, orci vel efficitur maximus, ipsum odio posuere nibh, quis placerat velit enim a urna. Aenean maximus nisl et metus scelerisque congue. Integer scelerisque fringilla congue. Fusce non dolor mollis metus tincidunt sollicitudin non vel est. Nam id quam volutpat, ultrices diam consectetur, venenatis elit. Cras hendrerit, diam non auctor molestie, velit nulla condimentum nibh, a convallis dolor nibh non nunc. Ut non vestibulum nisi, vitae volutpat libero. Donec imperdiet, libero at ullamcorper egestas, mi metus tempor massa, in viverra dui nisi at ante. Proin justo ante, accumsan sit amet ultricies ac, ullamcorper et augue. Proin interdum diam ut ornare accumsan. Sed scelerisque sagittis urna. Pellentesque lobortis, augue sed cursus viverra, ipsum lectus interdum massa, in sagittis augue enim nec libero.</p>\r\n\r\n<p>Fusce ut feugiat justo, ac euismod sapien. In congue nisl massa. Aenean nec lacus at massa mattis faucibus. In id posuere sem. Suspendisse ac lacus nec ligula consequat fringilla. Morbi varius lectus id purus semper, non facilisis dui semper. Mauris fringilla maximus tortor vitae suscipit. Nam non leo sit amet justo rutrum tincidunt eu et quam.</p>\r\n\r\n<p>Suspendisse venenatis mauris non ex tempor, eu lacinia purus euismod. Vivamus eget ex elementum, feugiat enim in, tempor urna. Ut suscipit lacinia aliquet. Nam ut nulla quis urna semper tempus ac condimentum elit. Aenean efficitur est id consectetur viverra. Phasellus semper egestas lacus ullamcorper vulputate. Proin eget sem turpis. Vestibulum eget lectus ut urna vestibulum sollicitudin. Morbi tempus justo nec justo rhoncus porttitor. Morbi varius bibendum enim, id blandit neque tincidunt vel. Aliquam sagittis at dolor scelerisque cursus. Suspendisse commodo, sapien eu scelerisque interdum, ante augue faucibus urna, nec porttitor sapien felis mattis lorem. Duis pharetra ipsum et diam pellentesque consequat.</p>\r\n\r\n<p>Etiam suscipit velit non ligula efficitur, eu eleifend arcu imperdiet. Mauris laoreet urna leo, quis posuere erat malesuada id. Aenean hendrerit vel purus et finibus. Integer pharetra, leo nec consectetur tincidunt, sapien augue ornare lorem, quis sagittis odio ligula vitae nulla. Morbi sapien ipsum, iaculis non sem facilisis, volutpat interdum libero. Aliquam id orci vel tortor consequat elementum ac malesuada augue. Mauris fringilla sodales felis, quis efficitur nunc. Integer congue id nulla sit amet pellentesque. Sed consectetur turpis et neque venenatis bibendum. Suspendisse commodo nunc eu ipsum tincidunt ultrices. Aliquam erat volutpat. Aliquam euismod hendrerit ipsum, a lobortis est vestibulum vel. Morbi auctor turpis ac libero interdum facilisis vel eu tellus.<img alt=\"\" src=\"http://127.0.0.1:8000/images/course_2_1706601962.png\" style=\"height:333px; width:500px\" /></p>', NULL, NULL, NULL, 2, 1, '2024-01-30 11:00:37', 1, '2024-01-30 20:50:46'),
(247, 13, 52, '.marquee span.marquee span.marquee span', NULL, NULL, 'What is Lorem Ipsum?', '<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/course_5_1706602023.png\" style=\"height:788px; width:1400px\" /></p>\r\n\r\n<p><span style=\"background-color:#ffc107\">Lorem </span>ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis libero arcu. Mauris non ligula ut sapien auctor elementum quis non nisi. Nulla hendrerit leo nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut sit amet ultrices neque. Nulla facilisi. Donec et scelerisque turpis. Duis euismod felis id orci vehicula congue ut ac nisl. Vestibulum a placerat tellus. Proin congue velit non justo eleifend, et fringilla magna imperdiet. Sed luctus justo in nisl sagittis, non ornare sapien feugiat. Ut ut posuere arcu. Donec aliquam tincidunt velit non pretium. Morbi semper turpis vel placerat tincidunt. Praesent laoreet magna laoreet sollicitudin finibus.</p>\r\n\r\n<p>Sed quis risus eu lacus aliquam suscipit vitae a risus. Sed luctus sem et molestie fermentum. Fusce congue id felis vitae consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam faucibus iaculis diam in congue. Nullam ex ipsum, interdum eget libero vitae, consequat mollis nibh. Duis placerat dolor eros, eget rutrum magna ornare nec. Nullam dignissim ut ex a mattis. Aenean viverra semper massa faucibus egestas. Aliquam erat volutpat. Suspendisse luctus arcu nec ultrices posuere. Duis vel diam nisl.</p>\r\n\r\n<p>Vivamus imperdiet elit lacus, nec volutpat dolor vulputate vitae. Fusce porttitor euismod mi ut mattis. Aenean euismod, orci vel efficitur maximus, ipsum odio posuere nibh, quis placerat velit enim a urna. Aenean maximus nisl et metus scelerisque congue. Integer scelerisque fringilla congue. Fusce non dolor mollis metus tincidunt sollicitudin non vel est. Nam id quam volutpat, ultrices diam consectetur, venenatis elit. Cras hendrerit, diam non auctor molestie, velit nulla condimentum nibh, a convallis dolor nibh non nunc. Ut non vestibulum nisi, vitae volutpat libero. Donec imperdiet, libero at ullamcorper egestas, mi metus tempor massa, in viverra dui nisi at ante. Proin justo ante, accumsan sit amet ultricies ac, ullamcorper et augue. Proin interdum diam ut ornare accumsan. Sed scelerisque sagittis urna. Pellentesque lobortis, augue sed cursus viverra, ipsum lectus interdum massa, in sagittis augue enim nec libero.</p>\r\n\r\n<p>Fusce ut feugiat justo, ac euismod sapien. In congue nisl massa. Aenean nec lacus at massa mattis faucibus. In id posuere sem. Suspendisse ac lacus nec ligula consequat fringilla. Morbi varius lectus id purus semper, non facilisis dui semper. Mauris fringilla maximus tortor vitae suscipit. Nam non leo sit amet justo rutrum tincidunt eu et quam.</p>\r\n\r\n<p>Suspendisse venenatis mauris non ex tempor, eu lacinia purus euismod. Vivamus eget ex elementum, feugiat enim in, tempor urna. Ut suscipit lacinia aliquet. Nam ut nulla quis urna semper tempus ac condimentum elit. Aenean efficitur est id consectetur viverra. Phasellus semper egestas lacus ullamcorper vulputate. Proin eget sem turpis. Vestibulum eget lectus ut urna vestibulum sollicitudin. Morbi tempus justo nec justo rhoncus porttitor. Morbi varius bibendum enim, id blandit neque tincidunt vel. Aliquam sagittis at dolor scelerisque cursus. Suspendisse commodo, sapien eu scelerisque interdum, ante augue faucibus urna, nec porttitor sapien felis mattis lorem. Duis pharetra ipsum et diam pellentesque consequat.</p>\r\n\r\n<p>Etiam suscipit velit non ligula efficitur, eu eleifend arcu imperdiet. Mauris laoreet urna leo, quis posuere erat malesuada id. Aenean hendrerit vel purus et finibus. Integer pharetra, leo nec consectetur tincidunt, sapien augue ornare lorem, quis sagittis odio ligula vitae nulla. Morbi sapien ipsum, iaculis non sem facilisis, volutpat interdum libero. Aliquam id orci vel tortor consequat elementum ac malesuada augue. Mauris fringilla sodales felis, quis efficitur nunc. Integer congue id nulla sit amet pellentesque. Sed consectetur turpis et neque venenatis bibendum. Suspendisse commodo nunc eu ipsum tincidunt ultrices. Aliquam erat volutpat. Aliquam euismod hendrerit ipsum, a lobortis est vestibulum vel. Morbi auctor turpis ac libero interdum facilisis vel eu tellus.</p>', NULL, NULL, NULL, 1, 1, '2024-01-30 11:00:50', 1, '2024-01-31 16:44:18'),
(268, 13, 51, 'Psychometric tests', NULL, NULL, 'WHAT IS A PSYCHOMETRIC TEST?', '<p><strong>The </strong>word Psychometric is actually a combination of two words: Psyche (mind) and Metric (related to measurement). Thus, a psychometric assessment refers to a range of psychological tests which are used to evaluate human thought and behavior.</p>\r\n\r\n<p>Any psychometric assessment will always be created and used to measure behavior, thoughts, skills, potential, traits, and many more characteristics of the person.</p>\r\n\r\n<p>Different psychometric test questions measure, analyze, and report different aspects of the human mind.These tests are often used to measure cognitive functions like aptitude, behavioral traits like personality, developmental progress like intelligence or social constructs like interest. It can also be used for tapping and shaping personal, academic and professional growth of a person.</p>\r\n\r\n<p>Types of test:-</p>\r\n\r\n<p><a href=\"https://www.brainwonders.in/psychometric/aptitude-test.php\">Aptitude Test</a><u>:-</u>This test purports to assess the skills, talents and abilities of an individual across several domains.</p>\r\n\r\n<p><a href=\"https://www.brainwonders.in/psychometric/personality-test.php\">Personality Test</a><u>:-</u>Personality based test to explore and understand the individual&#39;s socio emotional characteristics.</p>\r\n\r\n<p><a href=\"https://www.brainwonders.in/psychometric/iq-test.php\">I.Q. Test</a><u>:-</u>IQ (Intelligence Quotient) is an assessment of cognitive development with respect to the development age.</p>\r\n\r\n<p><a href=\"https://www.brainwonders.in/psychometric/interest-test.php\">Interest Test</a><u>:-</u>Interest Inventory analyses the aspects and fields that provide long term satisfaction to the person.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>WHY SHOULD ONE TAKE A PSYCHOMETRIC TEST?</em></strong></p>\r\n\r\n<p>Various advantages one can avail via a Psychometric Test, Some of them are</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;<strong>Subject Selection:</strong>&nbsp;Choose the right topics and courses</li>\r\n	<li>&nbsp;&nbsp;<strong>Career Guidance:</strong>&nbsp;Opt and prepare for the dream job</li>\r\n	<li>&nbsp;&nbsp;<strong>Progress Report:</strong>&nbsp;Track growth in the chosen field</li>\r\n	<li>&nbsp;&nbsp;<strong>Intervention Planning:</strong>&nbsp;SWOT analysis and development</li>\r\n	<li>&nbsp;&nbsp;<strong>Relationship Management:</strong>&nbsp;Learn how the people around you work</li>\r\n	<li>&nbsp;&nbsp;<strong>Professional Grooming:</strong>&nbsp;Get ready to put the best forward</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>WHO CAN BENEFIT FROM A PSYCHOMETRIC TEST?</em></strong></p>\r\n\r\n<ul>\r\n	<li><strong>Children and Students</strong>: - It is well known that, the earlier one starts, the better it is. One can build their future smartly by taking the psychometric test.</li>\r\n	<li><strong>Schools and Colleges</strong>: - Knowing the traits and trajectory of students and faculty is important to plan the visions and resources- so a psychological profiling helps.</li>\r\n	<li><strong>Working Professionals</strong>:- A psychometric assessment is useful in selecting the right field and getting success in it while balancing the personal life becomes easier.</li>\r\n	<li><strong>Corporate Firms:- </strong>Recruiting right and managing mindfully is what every office can benefit from, and the right psychometric assessment will cover that beautifully.</li>\r\n</ul>\r\n\r\n<p>&nbsp;<strong><em>HOW TO TAKE A PSYCHOMETRIC TEST?</em></strong></p>\r\n\r\n<p>The psychometric tests can be taken in four simple steps</p>\r\n\r\n<ul>\r\n	<li>Speak to an Expert</li>\r\n	<li>Take the Test</li>\r\n	<li>Get the Report</li>\r\n	<li>Discuss and Understand with the expert</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>&nbsp;WHERE CAN ONE TAKE A PSYCHOMETRIC TEST?</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>One can take the test in any of the two ways</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Offline:-</strong>Walk in or schedule an appointment at office.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Online:-</strong>on the laptop or computer - all you need is a decent internet connection.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The psychometric test series aims to comprehensively address the issues faced by students when it comes to their&nbsp;<strong>career selection, subject selection, understanding their skills and behaviour and prepare for a professional organisational life.</strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 0, 1, '2024-01-30 22:00:51', 42, '2024-03-01 17:29:34'),
(269, 13, 48, 'Lili Jameson	2', NULL, 'AMD_Images/Team_images/1706684329.png', 'Lili Jameson	2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '4', NULL, NULL, 0, 1, '2024-01-31 12:06:04', 1, '2024-02-21 15:26:34'),
(270, 13, 48, 'AMIT KULSHRESTHA', NULL, '13/Team_images/1708514013.jpg', 'AMIT KULSHRESTHA', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', NULL, NULL, 0, 1, '2024-01-31 12:32:19', 42, '2024-02-21 16:43:33'),
(273, 4, 24, NULL, NULL, NULL, NULL, '<ol>\r\n	<li>The Slider image <strong>dimension</strong> should be <strong>1000x375</strong></li>\r\n</ol>', NULL, NULL, NULL, 0, 1, '2024-01-31 16:28:28', 1, '2024-02-17 15:36:45'),
(281, 13, 55, 'Terms of use', 'Terms of use', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<img alt=\"heart\" src=\"https://cdn.ckeditor.com/4.16.2/standard-all/plugins/smiley/images/heart.png\" style=\"height:23px; width:23px\" title=\"heart\" /></p>', '8', NULL, NULL, 0, 13, '2024-02-05 18:23:08', 1, '2024-03-05 12:46:19'),
(285, 13, 53, 'AMD Event 1', NULL, NULL, 'AMD Event 1', '<p>AMD Event 1</p>', '1', '2024-02-13', NULL, 0, 1, '2024-02-12 13:43:25', NULL, NULL),
(286, 13, 53, 'AMD Event 2', NULL, NULL, 'AMD Event 2', '<p>AMD Event 2</p>', '2', '2024-02-11', NULL, 0, 1, '2024-02-12 13:43:41', NULL, NULL),
(288, 1, 43, 'newName', NULL, '1/Team_images/1707729471.png', 'newName', NULL, NULL, NULL, NULL, 0, 1, '2024-02-12 14:47:51', NULL, NULL),
(289, 28, 22, 'Instagram', 'instagram', '<i class=\"fab fa-instagram\"></i>', NULL, NULL, '1', NULL, 'on', 0, 1, '2024-01-10 16:51:45', 1, '2024-02-21 12:04:52'),
(290, 28, 22, 'Facebook', 'Facebook', '<i class=\"fab fa-facebook-f\"></i>', NULL, NULL, '2', NULL, 'on', 0, 1, '2024-01-10 17:04:41', 1, '2024-02-21 11:56:31'),
(291, 28, 22, 'Telegram', 'Telegram', '<i class=\"fab fa-telegram\"></i>', NULL, NULL, '5', NULL, NULL, 0, 44, '2024-01-10 17:25:00', 1, '2024-02-21 11:55:43'),
(292, 28, 22, 'Twitter', 'Twitter', '<i class=\"fab fa-twitter\"></i>', NULL, NULL, '3', NULL, NULL, 0, 1, '2024-01-13 12:26:11', 1, '2024-02-21 11:55:53'),
(293, 28, 22, 'Youtube', 'YouTube', '<i class=\"fab fa-youtube\"></i>', NULL, NULL, '4', NULL, NULL, 1, 1, '2024-01-13 12:26:41', 1, '2024-02-21 11:55:35'),
(294, 28, 58, 'Solution for all business Problem', 'v', '28/Slider_images/1708494104.jpg', 'Best Grow Your Business', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '2', NULL, NULL, 2, 1, '2024-02-14 12:06:15', 1, '2024-02-21 11:11:44'),
(295, 28, 58, 'Solution for all business Problem', 'v', '28/Slider_images/1709641095.jpg', 'Best Grow Your Business', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '1', NULL, 'on', 2, 1, '2024-02-14 12:06:15', 1, '2024-03-05 17:48:15'),
(296, 28, 59, 'Stephen Larry', NULL, '28/Team_images/1707899605.png', 'Product Manager', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '3', NULL, NULL, 0, 1, '2024-02-14 13:46:36', 1, '2024-02-21 12:56:03'),
(297, 28, 59, 'Nusrat Jahan', NULL, '28/Team_images/1707898625.png', 'Assistent Manager, Finance', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2', NULL, NULL, 0, 1, '2024-02-14 13:47:05', 1, '2024-02-21 12:56:17'),
(298, 28, 59, 'Stephen Larry', NULL, '28/Team_images/1707899512.png', 'Product Manager', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', NULL, NULL, 0, 1, '2024-02-14 13:47:22', 1, '2024-02-21 12:56:10'),
(299, 28, 60, 'Md Ashikul Islam2', NULL, '28/Testimonial_images/1707902345.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor                                            incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', NULL, '2', NULL, NULL, 0, 1, '2024-02-14 14:49:05', 1, '2024-02-21 11:15:14'),
(300, 28, 60, 'Md Ashikul Islam1', NULL, '28/Testimonial_images/1707902388.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore  magnaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magnadolore dolore dolore', NULL, '1', NULL, NULL, 0, 1, '2024-02-14 14:49:48', 1, '2024-03-06 14:16:38');
INSERT INTO `tbl_page` (`Pag_Id`, `Pag_Reg_Id`, `Pag_PagCat_Id`, `Pag_Name`, `Pag_URL`, `Pag_Image`, `Pag_ShortDesc`, `Pag_FullDesc`, `Pag_SerialOrder`, `Pag_Date`, `Pag_AdminExists`, `Pag_Status`, `Pag_CreatedBy`, `Pag_CreatedDate`, `Pag_UpdatedBy`, `Pag_UpdatedDate`) VALUES
(301, 28, 60, 'Md Ashikul Islam3', NULL, '28/Testimonial_images/1707902400.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor                                            incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', NULL, '3', NULL, NULL, 0, 1, '2024-02-14 14:50:00', 1, '2024-02-21 11:15:23'),
(302, 28, 60, 'Md Ashikul Islam4', NULL, '28/Testimonial_images/1707902426.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor                                            incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', NULL, '4', NULL, NULL, 0, 1, '2024-02-14 14:50:26', 1, '2024-02-21 11:15:32'),
(304, 28, 61, 'Business Planning, Strategy & Execution', 'fa fa-usd', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', NULL, NULL, 0, 1, '2024-02-14 15:09:07', 1, '2024-03-08 11:18:50'),
(305, 28, 61, 'Business Planning, Strategy & Execution', NULL, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2', NULL, NULL, 2, 1, '2024-02-14 15:10:42', 1, '2024-02-21 12:39:34'),
(306, 28, 61, 'Business Planning, Strategy & Execution', 'fa fa-id-card', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '5', NULL, NULL, 0, 1, '2024-02-14 15:10:47', 1, '2024-03-07 15:46:47'),
(307, 28, 61, 'Business Planning, Strategy & Execution', NULL, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '3', NULL, NULL, 2, 1, '2024-02-14 15:10:53', 1, '2024-02-21 12:39:41'),
(308, 28, 61, 'Business Planning, Strategy & Execution', NULL, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '4', NULL, NULL, 2, 1, '2024-02-14 15:11:00', 1, '2024-02-21 12:39:47'),
(309, 28, 61, 'Business Planning, Strategy & Execution', NULL, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '6', NULL, NULL, 2, 1, '2024-02-14 15:11:06', 1, '2024-02-21 12:40:02'),
(310, 28, 62, '01. What should i included my personal details?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, '2', NULL, NULL, 0, 1, '2024-02-14 15:22:03', 1, '2024-02-21 12:49:46'),
(311, 28, 62, '02. We can help your business to grow?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, '1', NULL, NULL, 2, 1, '2024-02-14 15:22:24', 1, '2024-02-21 12:49:51'),
(312, 28, 62, '03. Best financial and consultancy advisors?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, NULL, NULL, NULL, 0, 1, '2024-02-14 15:22:43', NULL, NULL),
(313, 28, 62, '03. Best financial and consultancy advisors?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, NULL, NULL, NULL, 0, 1, '2024-02-14 15:22:43', NULL, NULL),
(314, 28, 62, '03. Best financial and consultancy advisors?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, NULL, NULL, NULL, 0, 1, '2024-02-14 15:22:43', NULL, NULL),
(315, 28, 62, '03. Best financial and consultancy advisors?', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\r\n                                            ad minim veniam, quis nostrud exercitation ullamco.', NULL, NULL, NULL, NULL, 0, 1, '2024-02-14 15:22:43', NULL, NULL),
(316, 28, NULL, 'Will give you a complete account', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-02-14 16:53:47', NULL, NULL),
(317, 28, 63, 'Will give you a complete account', NULL, NULL, NULL, NULL, '1', NULL, NULL, 0, 1, '2024-02-14 16:55:02', 1, '2024-02-21 11:59:13'),
(318, 28, 63, 'Easy Customer Service', NULL, NULL, NULL, NULL, '2', NULL, NULL, 0, 1, '2024-02-14 16:55:13', 1, '2024-02-21 11:59:36'),
(319, 28, 63, 'Excepteur sint occaecat cupidatat non.', NULL, NULL, NULL, NULL, '6', NULL, NULL, 0, 1, '2024-02-14 16:55:18', 1, '2024-02-21 11:59:54'),
(320, 28, 63, 'The master-builder of human happiness', NULL, NULL, NULL, NULL, '5', NULL, NULL, 0, 1, '2024-02-14 16:55:22', 1, '2024-02-21 11:59:49'),
(321, 28, 63, 'Duis aute irure dolor in reprehenderit', NULL, NULL, NULL, NULL, '4', NULL, NULL, 0, 1, '2024-02-14 16:55:27', 1, '2024-02-21 11:59:08'),
(322, 28, 63, 'complete account of the system', NULL, NULL, NULL, NULL, '3', NULL, NULL, 0, 1, '2024-02-14 16:55:31', 1, '2024-02-21 11:59:43'),
(323, 28, 64, 'Terms & Conditions', 'Terms & Conditions', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', NULL, NULL, 0, 28, '2024-02-14 17:33:14', 1, '2024-02-21 12:32:13'),
(324, 28, 64, 'Privacy Policy', 'Privacy Policy', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2', NULL, NULL, 0, 28, '2024-02-14 17:33:28', 1, '2024-02-21 12:31:47'),
(325, 4, 21, 's', 's', 'Arihant_Diagnostic_Images/Slider_images/1708684255.jpg', '1', '<p>s</p>', '8', NULL, NULL, 0, 1, '2024-02-17 14:13:57', 1, '2024-02-23 16:30:55'),
(326, 4, 21, '2', '2', 'Arihant_Diagnostic_Images/Slider_images/1708684266.jpg', '2', '<p>2</p>', '9', NULL, NULL, 0, 1, '2024-02-17 14:14:07', 1, '2024-02-23 16:31:06'),
(332, 1, 38, 'Testimonial sr1', NULL, '1/Testimonial_images/1708493328.png', '1', NULL, '2', NULL, NULL, 0, 1, '2024-02-21 10:58:48', 1, '2024-02-21 10:59:46'),
(333, 1, 38, 'Testimonial sr2', NULL, '1/Testimonial_images/1708493339.png', '11', NULL, '1', NULL, NULL, 0, 1, '2024-02-21 10:58:59', 1, '2024-02-21 10:59:55'),
(334, 1, 41, 'Facilities sr1', NULL, NULL, NULL, NULL, '1', NULL, NULL, 0, 1, '2024-02-21 11:32:42', NULL, NULL),
(335, 1, 41, 'Facilities sr 2', NULL, NULL, NULL, NULL, '2', NULL, NULL, 0, 1, '2024-02-21 11:32:49', NULL, NULL),
(336, 13, 48, 'ANSHUL SHARMA', NULL, '13/Team_images/1708513965.jpg', 'ANSHUL SHARMA', '<p>ANSHUL SHARMA</p>', NULL, NULL, NULL, 0, 42, '2024-02-21 16:42:45', NULL, NULL),
(337, 13, 48, 'SURENDER SINGH RATHOR', NULL, '13/Team_images/1708514076.jpg', 'SURENDER SINGH RATHOR', '<p>SURENDER SINGH RATHOR</p>', NULL, NULL, NULL, 0, 42, '2024-02-21 16:44:36', NULL, NULL),
(338, 13, 48, 'AKSHAY TIWARI', NULL, '13/Team_images/1708514087.jpg', 'AKSHAY TIWARI', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:44:47', NULL, NULL),
(339, 13, 48, 'AMIT JAIN', NULL, '13/Team_images/1708514107.jpg', 'AMIT JAIN', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:45:07', NULL, NULL),
(340, 13, 48, 'DR SWAPAN KUMAR MAJUMDAR', NULL, '13/Team_images/1708514131.jpg', 'DR SWAPAN KUMAR MAJUMDAR', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:45:31', NULL, NULL),
(341, 13, 48, 'VISHNU SHRIVASTAV', NULL, '13/Team_images/1708514152.jpg', 'VISHNU SHRIVASTAV', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:45:52', NULL, NULL),
(342, 13, 48, 'SANDEEP MEGHANI', NULL, '13/Team_images/1708514170.jpg', 'SANDEEP MEGHANI', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:46:10', NULL, NULL),
(343, 13, 48, 'SUNIEL', NULL, '13/Team_images/1708514196.jpg', 'SUNIEL', NULL, NULL, NULL, NULL, 0, 42, '2024-02-21 16:46:36', NULL, NULL),
(349, 1, 39, NULL, NULL, NULL, NULL, '<p>s</p>', NULL, NULL, NULL, 0, 1, '2024-02-22 17:27:58', NULL, NULL),
(350, 1, 43, 's', NULL, '1/Team_images/1708603113.jpg', 's', '<p>s</p>', '1', NULL, NULL, 0, 1, '2024-02-22 17:28:33', NULL, NULL),
(351, 1, 36, '1', '1', 'Arihant_Diagnostic_Images/Slider_images/1708684212.jpg', '1', '1', '3', NULL, NULL, 0, 1, '2024-02-23 16:30:12', NULL, '2024-02-23 16:30:12'),
(352, 4, 21, '2', '2', 'Arihant_Diagnostic_Images/Slider_images/1708684231.jpg', '2', '<p>2</p>', '10', NULL, 'on', 0, 1, '2024-02-23 16:30:31', 1, '2024-03-01 11:07:45'),
(354, 4, 33, 'TESTOSTERONE', NULL, NULL, '200/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:45', NULL, '2024-01-24 11:34:45'),
(355, 4, 33, 'PROLACTIN', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 29, '2024-01-24 11:34:34', NULL, '2024-01-24 11:34:34'),
(359, 4, 33, 'MAGNESIUM', NULL, NULL, '120/-', NULL, NULL, NULL, NULL, 0, 37, '2024-01-25 16:34:19', NULL, '2024-01-25 16:34:19'),
(360, 4, 56, 'Health Checkup', NULL, NULL, '100', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 16:57:00', NULL, NULL),
(361, 4, 56, 'Health Checkup2', NULL, NULL, '498', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, 0, 1, '2024-02-28 16:58:35', NULL, NULL),
(362, 4, 56, 'Health Checkup3', NULL, NULL, '3', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:01:33', NULL, NULL),
(363, 4, 56, 'dd', NULL, NULL, '10000', 'function displayHealthCheckups(models) {\r\n    var container = document.getElementById(\'healthCheckupContainer\');\r\n    container.innerHTML = \'\';\r\n\r\n    if (models.length > 0) {\r\n        var noRecordsMessage = document.getElementById(\'noRecordsMessage\');\r\n        noRecordsMessage.style.display = \'none\';\r\n\r\n        models.forEach(function (model) {\r\n            var healthCheckupHtml = `\r\n                <div class=\"col-lg-3 col-md-6 col-sm-12 service-block health-checkup\">\r\n                    <div class=\"service-block-one wow fadeInUp animated\" data-wow-delay=\"600ms\" data-wow-duration=\"1500ms\">\r\n                        <div class=\"inner-box price\" style=\"border: black; border: 1px solid black; margin-bottom: 15px;\">\r\n                            <h4><a href=\"/healthCheckup/${model.Pag_Id}\">${model.Pag_Name}</a></h4>\r\n                            ${model.Pag_FullDesc\r\n                                ? `<p>${model.Pag_FullDesc.length > 45 ? model.Pag_FullDesc.substring(0, 45) + \'...\' : model.Pag_FullDesc}</p>`\r\n                                : \'<p class=\"helthlogo\"><i class=\"fa fa-plus-square\" style=\"color: red;\"></i></p>\'}\r\n                            <p>₹ ${model.Pag_ShortDesc}/-</p>\r\n                            <div class=\"d-flex\">\r\n                                <div class=\"btn-box\"><a href=\"/booking\" class=\"theme-btn-two\">Book Now</a></div>\r\n                                <div class=\"btn-box\">\r\n                                    ${model.Pag_FullDesc ? `<a href=\"/healthCheckup/${model.Pag_Id}\" class=\"theme-btn-two\">Read More</a>` : \'\'}\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            `;\r\n            container.innerHTML += healthCheckupHtml;\r\n        });\r\n    } else {\r\n        var noRecordsMessage = document.getElementById(\'noRecordsMessage\');\r\n        noRecordsMessage.style.display = \'block\';\r\n    }\r\n}', NULL, NULL, NULL, 0, 1, '2024-02-28 17:02:05', NULL, NULL),
(364, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(365, 4, 56, 'Health  Health Checkup test test the Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(366, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(367, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(368, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(369, 4, 56, 'Health  Health Checkup test test the Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(370, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(371, 4, 56, 'Health  Health Checkup test Health Checkup3', NULL, NULL, '30', NULL, NULL, NULL, NULL, 0, 1, '2024-02-28 17:37:07', NULL, NULL),
(372, 13, 48, 'rahul', NULL, '13/Team_images/1709200892.jpg', '3131', NULL, '1', NULL, NULL, 2, 1, '2024-02-29 15:31:32', NULL, NULL),
(373, 1, 42, 'Rahul soni', NULL, '1/Package_images/1709201612.jpg', NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-02-29 15:43:32', NULL, NULL),
(374, 1, 38, 'a', NULL, '1/Testimonial_images/1709202317.jpg', 's', NULL, '3', NULL, NULL, 2, 1, '2024-02-29 15:55:17', NULL, NULL),
(375, 1, 36, 'cvsdf', 'sdfsdf', '1/Slider_images/1709202820.jpg', 'dsdfsd', 'sdf', '4', NULL, NULL, 2, 1, '2024-02-29 16:03:40', NULL, NULL),
(376, 28, 58, 's', 's', '28/Slider_images/1709210093.webp', 's', 's', '3', NULL, NULL, 2, 1, '2024-02-29 18:04:53', NULL, NULL),
(377, 28, 58, 's', 's', '28/Slider_images/1709210133.jpg', 's', 's', '4', NULL, NULL, 2, 1, '2024-02-29 18:05:33', NULL, NULL),
(379, 13, 49, 's', 's', '13/Slider_images/1709288894.png', 's', 's', '5', NULL, NULL, 2, 1, '2024-03-01 15:58:14', NULL, NULL),
(380, 13, 51, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 2, 42, '2024-03-01 17:29:39', NULL, NULL),
(381, 1, NULL, 's', NULL, NULL, 's', '<p>ss</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 10:19:15', NULL, NULL),
(382, 13, 52, 'a', NULL, NULL, 'a', '<p>a</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 10:19:33', NULL, NULL),
(383, 13, NULL, NULL, NULL, NULL, NULL, '<p>sd<img alt=\"\" src=\"http://127.0.0.1:8000/images/about-member-3_1709359740.png\" style=\"height:350px; width:298px\" /></p>', NULL, NULL, NULL, 0, 1, '2024-03-02 11:39:06', NULL, NULL),
(384, 1, 39, NULL, NULL, NULL, NULL, '<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/about-member-3_1709363293.png\" style=\"height:350px; width:298px\" /></p>', NULL, NULL, NULL, 0, 1, '2024-03-02 12:38:20', NULL, NULL),
(385, 1, 39, NULL, NULL, NULL, NULL, '<p>sadasd</p>\r\n\r\n<p>asdasd</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 13:21:26', NULL, NULL),
(386, 1, 39, NULL, NULL, NULL, NULL, '<p>sadasd</p>\r\n\r\n<p>asdasd</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 13:21:26', NULL, NULL),
(387, 1, 39, NULL, NULL, NULL, NULL, '<p>sadasd</p>\r\n\r\n<p>asdasd</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 13:21:26', NULL, NULL),
(388, 1, 39, NULL, NULL, NULL, NULL, '<p>sadasd</p>\r\n\r\n<p>asdasd</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 13:21:26', NULL, NULL),
(389, 1, 39, NULL, NULL, NULL, NULL, '<p><img alt=\"devil\" src=\"https://cdn.ckeditor.com/4.16.2/standard-all/plugins/smiley/images/devil_smile.png\" style=\"height:23px; width:23px\" title=\"devil\" />asdas</p>', NULL, NULL, NULL, 0, 1, '2024-03-02 13:26:42', NULL, NULL),
(390, 28, 57, 'Linkedin', '#', '<i class=\"fab fa-linkedin-in\"></i>', NULL, NULL, '6', NULL, NULL, 0, 28, '2024-03-05 15:59:03', NULL, NULL),
(391, 28, 58, 'a', 'aaa', '28/Slider_images/1709710818.jpg', 'aa', '<p>aa</p>', '5', NULL, NULL, 0, 1, '2024-03-05 18:21:14', 1, '2024-03-06 13:10:18'),
(392, 28, 61, 'Icons', 'fa fa-check-square', NULL, 'Icon', '<p>Icon</p>', '7', NULL, NULL, 0, 1, '2024-03-07 15:21:45', 1, '2024-03-07 15:36:36'),
(393, 1, 44, 'Service', 'Service', NULL, 'Service', '<p>Service</p>', '1', NULL, NULL, 0, 1, '2024-03-08 10:46:31', NULL, NULL),
(394, 28, 61, 'new service', 'new service', NULL, 'new service', '<p>new service</p>', '8', NULL, NULL, 0, 1, '2024-03-08 10:48:28', NULL, NULL),
(395, 29, 69, 'Instagram', '#', '<i class=\"fab fa-instagram\"></i>', NULL, NULL, '1', NULL, 'on', 0, 1, '2024-01-10 16:51:45', 1, '2024-03-08 12:22:58'),
(396, 29, 69, 'Facebook', 'Facebook', '<i class=\"fab fa-facebook-f\"></i>', NULL, NULL, '3', NULL, 'on', 0, 1, '2024-01-10 17:04:41', 1, '2024-03-08 12:21:58'),
(397, 29, 69, 'Twitter', '#', '<i class=\"fab fa-twitter\"></i>', NULL, NULL, '2', NULL, NULL, 0, 1, '2024-01-13 12:26:11', 1, '2024-03-08 12:23:16'),
(398, 29, 69, 'Instagram', '#', '<i class=\"fab fa-linkedin-in\"></i>', NULL, NULL, '4', NULL, NULL, 0, 28, '2024-03-05 15:59:03', 1, '2024-03-08 12:22:06'),
(399, 29, 70, 'Jeff J. Sparrow', NULL, '29/Testimonial_images/1709882030.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.', NULL, '1', NULL, NULL, 0, 1, '2024-03-08 12:43:50', NULL, NULL),
(400, 29, 70, 'Martin Harn', NULL, '29/Testimonial_images/1709882060.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor. Vitae donec porttitor risus tellus eget vitae sagittis id in.', NULL, '2', NULL, NULL, 0, 1, '2024-03-08 12:44:20', NULL, NULL),
(401, 29, 70, 'Noah Aarons', NULL, '29/Testimonial_images/1709882090.jpg', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor. Vitae donec porttitor risus tellus eget vitae sagittis id in. In', NULL, '3', NULL, NULL, 0, 1, '2024-03-08 12:44:50', NULL, NULL),
(402, 29, 72, 'Terms & Condition', 'Terms & Condition', NULL, NULL, '<ul>\r\n	<li>\r\n	<h3>Effective date:&nbsp;15rd of May, 2022</h3>\r\n\r\n	<p>This is a H1, Perfect&#39;s for titles.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain, sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup sad smile of the television set.</p>\r\n\r\n	<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n	<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n	<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n	</li>\r\n	<li>More than 60+ components</li>\r\n	<li>Five ready tests</li>\r\n	<li>Coming soon page</li>\r\n	<li>Check list with left icon</li>\r\n	<li>And much more ...</li>\r\n	<li>\r\n	<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n	<p>Changes about terms</p>\r\n\r\n	<p>If we change our terms of use we will post those changes on this page. Registered users will be sent an email that outlines changes made to the terms of use.</p>\r\n\r\n	<p>Questions? Please email us at&nbsp;<a href=\"javascript:void(0);\">[email&nbsp;protected]</a></p>\r\n	</li>\r\n</ul>', '1', NULL, NULL, 0, 29, '2024-03-08 13:52:56', 1, '2024-03-08 13:53:33'),
(403, 29, 72, 'Privacy Policy', 'Privacy Policy', NULL, NULL, '<h3>Effective date:&nbsp;23rd of March, 2022</h3>\r\n\r\n<p>This is a H1, Perfect&#39;s for titles.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain, sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup sad smile of the television set.</p>\r\n\r\n<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n<ul>\r\n	<li>More than 60+ components</li>\r\n	<li>Five ready tests</li>\r\n	<li>Coming soon page</li>\r\n	<li>Check list with left icon</li>\r\n	<li>And much more ...</li>\r\n</ul>\r\n\r\n<p>This is a H2&#39;s perfect for the titles.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Stress, for the United States element ante. Duis cursus, mi quis viverra ornare, eros pain , sometimes none at all, freedom of the living creature was as the profit and financial security. Jasmine neck adapter and just running it lorem makeup hairstyle. Now sad smile of the television set.</p>\r\n\r\n<p>Changes about terms</p>\r\n\r\n<p>If we change our terms of use we will post those changes on this page. Registered users will be sent an email that outlines changes made to the terms of use.</p>\r\n\r\n<p>Questions? Please email us at&nbsp;<a href=\"javascript:void(0);\">[email&nbsp;protected]</a></p>', '2', NULL, NULL, 0, 29, '2024-03-08 13:54:16', NULL, NULL),
(404, 29, 73, 'Slider', 'Slider', '29/Slider_images/1709962755.png', 'Engaging & Accessible Online Courses For All', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget aenean accumsan bibendum gravida maecenas augue elementum et', '1', NULL, NULL, 0, 1, '2024-03-09 11:09:15', NULL, NULL),
(405, 29, 74, 'Patricia', NULL, '29/Team_images/1709963903.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '1', NULL, NULL, 0, 1, '2024-03-09 11:28:23', NULL, NULL),
(406, 29, 74, 'Patricia', NULL, '29/Team_images/1709963927.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '2', NULL, NULL, 0, 1, '2024-03-09 11:28:47', NULL, NULL),
(407, 29, 74, 'Patricia', NULL, '29/Team_images/1709963940.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '3', NULL, NULL, 0, 1, '2024-03-09 11:29:00', NULL, NULL),
(408, 29, 74, 'Patricia', NULL, '29/Team_images/1709963953.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '4', NULL, NULL, 0, 1, '2024-03-09 11:29:13', NULL, NULL),
(409, 29, 74, 'Patricia', NULL, '29/Team_images/1709963966.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '5', NULL, NULL, 0, 1, '2024-03-09 11:29:26', NULL, NULL),
(410, 29, 74, 'Patricia', NULL, '29/Team_images/1709963977.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '6', NULL, NULL, 0, 1, '2024-03-09 11:29:37', NULL, NULL),
(411, 29, 74, 'Patricia', NULL, '29/Team_images/1709963991.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '7', NULL, NULL, 0, 1, '2024-03-09 11:29:51', NULL, NULL),
(412, 29, 74, 'Patricia', NULL, '29/Team_images/1709964003.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '8', NULL, NULL, 0, 1, '2024-03-09 11:30:03', NULL, NULL),
(413, 29, 74, 'Patricia', NULL, '29/Team_images/1709964013.jpg', 'Node Js', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor.</p>', '9', NULL, NULL, 0, 1, '2024-03-09 11:30:13', NULL, NULL),
(414, 29, 75, 'Is there a 14-days trial?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '1', NULL, NULL, 0, 1, '2024-03-09 12:08:58', NULL, NULL),
(415, 29, 75, 'How much time I will need to learn this app?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '2', NULL, NULL, 0, 1, '2024-03-09 12:09:12', NULL, NULL),
(416, 29, 75, 'Is there a month-to-month payment option?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '3', NULL, NULL, 0, 1, '2024-03-09 12:09:22', NULL, NULL),
(417, 29, 75, 'What’s the benefits of the Premium Membership?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '4', NULL, NULL, 0, 1, '2024-03-09 12:09:35', NULL, NULL),
(418, 29, 75, 'Are there any free tutorials available?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '5', NULL, NULL, 0, 1, '2024-03-09 12:09:45', NULL, NULL),
(419, 29, 75, 'How can I cancel my subscription plan?', NULL, NULL, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n\r\nIf several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.', NULL, '6', NULL, NULL, 0, 1, '2024-03-09 12:09:56', NULL, NULL),
(420, 29, 70, 'Martin Harn', NULL, '29/Testimonial_images/1709882060.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor. Vitae donec porttitor risus tellus eget vitae sagittis id in.', NULL, '2', NULL, NULL, 0, 1, '2024-03-08 12:44:20', NULL, NULL),
(421, 29, 70, 'Martin Harn', NULL, '29/Testimonial_images/1709882060.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor. Vitae donec porttitor risus tellus eget vitae sagittis id in.', NULL, '2', NULL, NULL, 0, 1, '2024-03-08 12:44:20', NULL, NULL),
(422, 29, 70, 'Martin Harn', NULL, '29/Testimonial_images/1709882060.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas pretium feugiat tellus eget vitae sagittis id in. In in tempor ac dignissim at. Scelerisque sociis consequat sit dolor. Vitae donec porttitor risus tellus eget vitae sagittis id in.', NULL, '2', NULL, NULL, 0, 1, '2024-03-08 12:44:20', NULL, NULL),
(423, 29, 76, 'Get certified with 100+ certification courses', NULL, NULL, 'Get certified, master modern tech skills, and level up your career whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', '<p>Get certified, master modern tech skills, and level up your career whether you&rsquo;re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>', '1', NULL, NULL, 0, 1, '2024-03-09 13:20:12', NULL, NULL),
(424, 29, 76, 'Build skills your way, from labs to courses', NULL, NULL, 'Get certified, master modern tech skills, and level up your career whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', '<p>Get certified, master modern tech skills, and level up your career whether you&rsquo;re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>', '2', NULL, NULL, 0, 1, '2024-03-09 13:20:50', NULL, NULL),
(425, 29, 76, 'Stay motivated with engaging instructors', NULL, NULL, 'Get certified, master modern tech skills, and level up your career whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', '<p>Get certified, master modern tech skills, and level up your career whether you&rsquo;re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>', '3', NULL, NULL, 0, 1, '2024-03-09 13:20:58', NULL, NULL),
(426, 29, 76, 'Get certified, master modern tech skills, and level up your career whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', NULL, NULL, 'Get certified, master modern tech skills, and level up your career whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', '<p>Get certified, master modern tech skills, and level up your career whether you&rsquo;re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>', '4', NULL, NULL, 0, 1, '2024-03-09 13:21:07', NULL, NULL),
(427, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '1', NULL, NULL, 0, 1, '2024-03-09 13:55:38', 1, '2024-03-09 14:14:10'),
(428, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '2', NULL, NULL, 0, 1, '2024-03-09 13:55:41', NULL, NULL),
(429, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '3', NULL, NULL, 0, 1, '2024-03-09 13:55:44', NULL, NULL),
(430, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '4', NULL, NULL, 0, 1, '2024-03-09 13:55:46', NULL, NULL),
(431, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '5', NULL, NULL, 0, 1, '2024-03-09 13:55:49', NULL, NULL),
(432, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '6', NULL, NULL, 0, 1, '2024-03-09 13:55:52', NULL, NULL),
(433, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '7', NULL, NULL, 0, 1, '2024-03-09 13:55:54', NULL, NULL),
(434, 29, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, NULL, NULL, '8', NULL, NULL, 0, 1, '2024-03-09 13:55:57', NULL, NULL),
(435, 29, 79, 'Personalized Learning', NULL, '29/Blog_images/1709978630.jpg', 'Build Responsive Websites with HTML', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', NULL, NULL, 0, 1, '2024-03-09 15:33:50', 1, '2024-03-09 15:35:09'),
(436, 29, 79, 'Personalized Learning2', NULL, '29/Blog_images/1709978729.jpg', 'Build Responsive Websites with HTML', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2', NULL, NULL, 0, 1, '2024-03-09 15:35:29', 1, '2024-03-09 16:03:04'),
(437, 29, 79, 'Personalized Learning3', NULL, '29/Blog_images/1709978739.jpg', 'Build Responsive Websites with HTML', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '3', NULL, NULL, 0, 1, '2024-03-09 15:35:39', 1, '2024-03-09 16:03:15');
INSERT INTO `tbl_page` (`Pag_Id`, `Pag_Reg_Id`, `Pag_PagCat_Id`, `Pag_Name`, `Pag_URL`, `Pag_Image`, `Pag_ShortDesc`, `Pag_FullDesc`, `Pag_SerialOrder`, `Pag_Date`, `Pag_AdminExists`, `Pag_Status`, `Pag_CreatedBy`, `Pag_CreatedDate`, `Pag_UpdatedBy`, `Pag_UpdatedDate`) VALUES
(438, 29, 79, 'Personalized Learning4', NULL, '29/Blog_images/1709978752.jpg', 'Build Responsive Websites with HTML', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '4', NULL, NULL, 0, 1, '2024-03-09 15:35:52', 1, '2024-03-09 16:03:23'),
(439, 29, 79, 'Build Responsive Websites with HTML5', NULL, '29/Blog_images/1709978764.jpg', 'Personalized Learning', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '5', NULL, NULL, 0, 1, '2024-03-09 15:36:04', 1, '2024-03-09 16:03:29'),
(440, 29, 80, 'a', NULL, NULL, 'a', '<p>a</p>', NULL, NULL, NULL, 2, 1, '2024-03-09 16:53:53', NULL, NULL),
(441, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:55:11', NULL, NULL),
(442, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:56:21', NULL, NULL),
(443, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:57:22', NULL, NULL),
(444, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:58:23', NULL, NULL),
(445, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:58:50', NULL, NULL),
(446, 29, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-09 16:59:20', NULL, NULL),
(447, 29, 80, NULL, NULL, NULL, NULL, '<p>In present tough time whole world is under stress due to COVID effect, The COVID-19 pandemic affects everyone, everywhere whether it is a working man, working woman,&nbsp;house wives, school going children&rsquo;s, labor, businessman etc. it affects different groups of people differently, deepening existing inequalities.</p>\r\n\r\n<p>If we talk about the woman and girls the pandemic is having devastating social and economic consequences for women and girls. Nearly 60&nbsp;per cent of women around the world work in the informal economy, earning less, saving less, and at greater risk of falling into poverty.&nbsp; As markets fall and businesses close, millions of women&rsquo;s jobs have disappeared.&nbsp; At the same time, as they are losing paid employment, women&rsquo;s unpaid care work has increased exponentially as a result of school closures and the increased needs of older people. The pandemic has also led to a horrifying increase in violence against women.&nbsp; Nearly one in five women worldwide has experienced violence in the past year.&nbsp; Many of these women are now trapped at home with their abusers, struggling to access services that are suffering from cuts and restrictions.&nbsp; This was the basis for my appeal to Governments earlier this week to take urgent steps to protect women and expand support services.COVID-19 is not only challenging global health systems, but testing our common humanity.&nbsp; Gender equality and women&rsquo;s rights are essential to getting through this pandemic together, to recovering faster, and to building a better future for everyone.</p>\r\n\r\n<p>If we talk about working professionals, it was tough to cop between personal and professional life by doing work from home, it is also difficult for the students who are giving board exams this year and planning to take admission in reputed college or for those who are taking online classes, parents are feeling extreme pressure about the career of their wards.</p>\r\n\r\n<p>In general it is very common to have mood swings, depression, anxiety, tension, behavioral problem and career related queries and uncertainty among us, in order to overcome such problems one must take help of counsellor and must go through for counselling with professional career counselor, here at MINDS UP we are having a great team which can help you in this tough time. One can also refer following article by WHO&nbsp; entitled &ldquo;COVID-19 Pandemic Triggers Devastating Social, Economic Impact on Women, Girls, Secretary-General Says, Urging Governments to Protect Their Rights&rdquo;</p>\r\n\r\n<p><a href=\"https://www.who.int/docs/default-source/coronaviruse/mental-health-considerations.pdf?sfvrsn=6d3578af_2\" target=\"_blank\">WHO &ndash; MENTAL HEALTH AND PSYCHOSOCIAL CONSIDERATIONS DURING THE COVID-19 OUTBREAK</a></p>', NULL, NULL, NULL, 0, 1, '2024-03-09 16:59:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pagecategory`
--

CREATE TABLE `tbl_pagecategory` (
  `PagCat_Id` int(20) NOT NULL,
  `PagCat_Reg_Id` int(20) NOT NULL,
  `PagCat_Name` varchar(255) NOT NULL,
  `PagCat_ShortDesc` varchar(255) DEFAULT NULL,
  `PagCat_ShortDescExists` varchar(255) DEFAULT NULL,
  `PagCat_FullDesc` varchar(255) NOT NULL,
  `PagCat_FullDescExists` varchar(255) DEFAULT NULL,
  `PagCat_SerialOrder` varchar(255) DEFAULT NULL,
  `PagCat_URL` varchar(255) DEFAULT NULL,
  `PagCat_Image` varchar(255) DEFAULT NULL,
  `PagCat_AdminExists` varchar(255) DEFAULT NULL,
  `PagCat_Status` int(20) DEFAULT 0,
  `PagCat_CreatedBy` int(11) DEFAULT NULL,
  `PagCat_CreatedDate` datetime NOT NULL,
  `PagCat_UpdatedBy` int(11) DEFAULT NULL,
  `PagCat_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pagecategory`
--

INSERT INTO `tbl_pagecategory` (`PagCat_Id`, `PagCat_Reg_Id`, `PagCat_Name`, `PagCat_ShortDesc`, `PagCat_ShortDescExists`, `PagCat_FullDesc`, `PagCat_FullDescExists`, `PagCat_SerialOrder`, `PagCat_URL`, `PagCat_Image`, `PagCat_AdminExists`, `PagCat_Status`, `PagCat_CreatedBy`, `PagCat_CreatedDate`, `PagCat_UpdatedBy`, `PagCat_UpdatedDate`) VALUES
(19, 4, 'Pages', 'Pages', NULL, '<p>Pages</p>', NULL, '1', 'Pages', NULL, NULL, 0, 59, '2024-01-17 13:15:06', NULL, '2024-01-17 13:15:06'),
(20, 4, 'UsefulLink', 'UsefulLink', NULL, '<p>UsefulLink</p>', NULL, '2', 'UsefulLink', NULL, NULL, 0, 59, '2024-01-17 13:15:16', NULL, '2024-01-17 13:15:16'),
(21, 4, 'Slider', 'Slider', NULL, '<p>Slider</p>', NULL, '3', 'Slider', NULL, NULL, 0, 59, '2024-01-17 13:15:35', NULL, '2024-01-17 13:15:35'),
(22, 4, 'SocialLink', 'SocialLink', NULL, '<p>SocialLink</p>', NULL, '4', 'SocialLink', NULL, NULL, 0, 59, '2024-01-17 13:15:46', NULL, '2024-01-17 13:15:46'),
(23, 4, 'Testimonial', 'Testimonial', NULL, '<p>Testimonial</p>', NULL, '5', 'Testimonial', NULL, NULL, 0, 59, '2024-01-17 13:15:53', NULL, '2024-01-17 13:15:53'),
(24, 4, 'WebsiteHelp', 'WebsiteHelp', NULL, '<p>WebsiteHelp</p>', NULL, '6', 'WebsiteHelp', NULL, NULL, 0, 59, '2024-01-17 13:16:00', NULL, '2024-01-17 13:16:00'),
(25, 4, 'Clients', 'Clients', NULL, '<p>Clients</p>', NULL, '7', 'Clients', NULL, NULL, 0, 59, '2024-01-17 13:16:10', 4, '2024-01-28 19:29:54'),
(28, 4, 'Facility', 'Facility', NULL, '<p>Facility</p>', NULL, '9', 'Facility', NULL, NULL, 0, 59, '2024-01-18 14:27:26', NULL, '2024-01-18 14:27:26'),
(30, 4, 'Package', 'Package', NULL, '<p>Package</p>', NULL, '10', 'Package', NULL, NULL, 0, 59, '2024-01-18 15:23:44', NULL, '2024-01-18 15:23:44'),
(31, 4, 'Team', 'TeamTeam', NULL, '<p>Team</p>', NULL, '10', 'Team', NULL, NULL, 0, 59, '2024-01-18 15:50:23', NULL, '2024-01-18 15:50:23'),
(33, 4, 'Service', 'Services', NULL, '<h1>Services</h1>', NULL, '10', 'Services', NULL, NULL, 0, NULL, '2024-01-24 11:04:16', NULL, '2024-01-24 11:04:16'),
(34, 1, 'UsefulLink', 'UsefulLink', NULL, '<p>UsefulLink</p>', NULL, '1', 'UsefulLink', NULL, NULL, 0, 1, '2024-01-28 17:57:01', NULL, '2024-01-28 17:57:01'),
(35, 1, 'Pages', 'Pages', NULL, '<p>Pages</p>', NULL, '1', 'Pages', NULL, NULL, 0, 59, '2024-01-17 13:15:06', NULL, '2024-01-17 13:15:06'),
(36, 1, 'Slider', 'Slider', NULL, '<p>Slider</p>', NULL, '3', 'Slider', NULL, NULL, 0, 59, '2024-01-17 13:15:35', NULL, '2024-01-17 13:15:35'),
(37, 1, 'SocialLink', 'SocialLink', NULL, '<p>SocialLink</p>', NULL, '4', 'SocialLink', NULL, NULL, 0, 59, '2024-01-17 13:15:46', NULL, '2024-01-17 13:15:46'),
(38, 1, 'Testimonial', 'Testimonial', NULL, '<p>Testimonial</p>', NULL, '5', 'Testimonial', NULL, NULL, 0, 59, '2024-01-17 13:15:53', NULL, '2024-01-17 13:15:53'),
(39, 1, 'WebsiteHelp', 'WebsiteHelp', NULL, '<p>WebsiteHelp</p>', NULL, '6', 'WebsiteHelp', NULL, NULL, 0, 59, '2024-01-17 13:16:00', NULL, '2024-01-17 13:16:00'),
(40, 1, 'Clients', 'Clients', NULL, '<p>Clients</p>', NULL, '7', 'Clients', NULL, NULL, 0, 59, '2024-01-17 13:16:10', NULL, '2024-01-17 13:16:10'),
(41, 1, 'Facility', 'Facility', NULL, '<p>Facility</p>', NULL, '9', 'Facility', NULL, NULL, 0, 59, '2024-01-18 14:27:26', NULL, '2024-01-18 14:27:26'),
(42, 1, 'Package', 'Package', NULL, '<p>Package</p>', NULL, '10', 'Package', NULL, NULL, 0, 59, '2024-01-18 15:23:44', NULL, '2024-01-18 15:23:44'),
(43, 1, 'Team', 'TeamTeam', NULL, '<p>Team</p>', NULL, '10', 'Team', NULL, NULL, 0, 59, '2024-01-18 15:50:23', NULL, '2024-01-18 15:50:23'),
(44, 1, 'Service', 'Services', NULL, '<h1>Services</h1>', NULL, '10', 'Services', NULL, NULL, 0, NULL, '2024-01-24 11:04:16', NULL, '2024-01-24 11:04:16'),
(45, 13, 'SocialLink', 'SocialLink', NULL, '<p>SocialLink</p>', NULL, '1', 'SocialLink', NULL, NULL, 0, 1, '2024-01-29 14:18:43', NULL, '2024-01-29 14:18:43'),
(47, 13, 'Testimonial', 'Testimonial', NULL, '<p>Testimonial</p>', NULL, '2', 'Testimonial', NULL, NULL, 0, 1, '2024-01-29 17:29:27', NULL, '2024-01-29 17:29:27'),
(48, 13, 'Team', 'Team', NULL, '<p>Team</p>', NULL, '3', 'Team', NULL, NULL, 0, 1, '2024-01-29 17:41:37', NULL, '2024-01-29 17:41:37'),
(49, 13, 'Slider', 'Slider', NULL, '<p>Slider</p>', NULL, '4', 'Slider', NULL, NULL, 0, 1, '2024-01-29 17:46:23', NULL, '2024-01-29 17:46:23'),
(50, 13, 'Faq', 'Faq', NULL, '<p>Faq</p>', NULL, '5', 'Faq', NULL, NULL, 0, 1, '2024-01-29 18:15:16', NULL, '2024-01-29 18:15:16'),
(51, 13, 'Service', 'Service', NULL, '<p>Service</p>', NULL, '6', 'Service', NULL, NULL, 0, 1, '2024-01-29 18:40:04', NULL, '2024-01-29 18:40:04'),
(52, 13, 'Announcement', 'Announcement', NULL, '<p>Announcement</p>', NULL, '7', 'Announcement', NULL, NULL, 0, 1, '2024-01-30 10:43:19', NULL, '2024-01-30 10:43:19'),
(53, 13, 'Event', 'Event', NULL, '<p>Event</p>', NULL, '8', 'Event', NULL, NULL, 0, 1, '2024-01-30 16:07:49', NULL, '2024-01-30 16:07:49'),
(55, 13, 'UsefulLink', 'UsefulLink', NULL, '<p>UsefulLink</p>', NULL, '9', 'UsefulLink', NULL, NULL, 0, 1, '2024-02-05 18:22:23', NULL, '2024-02-05 18:22:23'),
(56, 4, 'HealthCheckup', 'HealthCheckup', NULL, '<p>HealthCheckup</p>', NULL, '10', 'HealthCheckup', NULL, NULL, 0, 1, '2024-02-12 14:26:20', NULL, '2024-02-12 14:26:20'),
(57, 28, 'SocialLink', 'SocialLink', NULL, '<p>SocialLink</p>', NULL, '1', 'SocialLink', NULL, NULL, 0, 1, '2024-02-14 11:25:14', NULL, NULL),
(58, 28, 'Slider', 'Slider', NULL, '<p>Slider</p>', NULL, '2', 'Slider', NULL, NULL, 0, 1, '2024-02-14 11:59:44', NULL, NULL),
(59, 28, 'Team', 'Team', NULL, '<p>Team</p>', NULL, '3', 'Team', NULL, NULL, 0, 1, '2024-02-14 13:45:50', NULL, NULL),
(60, 28, 'Testimonial', 'Testimonial', NULL, '<p>Testimonial</p>', NULL, '4', 'Testimonial', NULL, NULL, 0, 1, '2024-02-14 14:48:12', NULL, NULL),
(61, 28, 'Service', 'Service', NULL, '<p>Service</p>', NULL, '5', 'Service', NULL, NULL, 0, 1, '2024-02-14 15:08:50', NULL, NULL),
(62, 28, 'Faq', 'Faq', NULL, '<p>Faq</p>', NULL, '6', 'Faq', NULL, NULL, 0, 1, '2024-02-14 15:21:13', NULL, NULL),
(63, 28, 'Facility', 'Facility', NULL, '<p>Facility</p>', NULL, '7', 'Facility', NULL, NULL, 0, 1, '2024-02-14 16:53:36', 1, '2024-02-14 16:54:52'),
(64, 28, 'UsefulLink', 'UsefulLink', NULL, '<p>UsefulLink</p>', NULL, '8', 'UsefulLink', NULL, NULL, 0, 1, '2024-02-14 17:32:16', NULL, NULL),
(65, 1, 'a', 'a', NULL, '<p>a</p>', NULL, '10', 'a', '1/PageCategory_images/1709276331.jpg', NULL, 2, 1, '2024-03-01 12:28:51', NULL, NULL),
(66, 1, 'a', 'a', NULL, '<p>a</p>', NULL, '10', 'a', '1/PageCategory_images/1709276557.jpg', NULL, 2, 1, '2024-03-01 12:32:37', 1, '2024-03-01 12:34:14'),
(67, 1, 'a', 'a', NULL, '<p>a</p>', NULL, '10', NULL, NULL, NULL, 2, 1, '2024-03-01 12:42:46', NULL, NULL),
(68, 1, 'A', 'A', NULL, '<p>A</p>', NULL, '10', NULL, NULL, NULL, 0, 1, '2024-03-01 12:49:05', NULL, NULL),
(69, 29, 'SocialLink', NULL, NULL, '<p>SocialLink</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-08 12:19:13', NULL, NULL),
(70, 29, 'Testimonial', NULL, NULL, '<p>Testimonial</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-08 12:40:23', NULL, NULL),
(71, 29, 'Event', NULL, NULL, '<p>Event</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-08 12:51:51', NULL, NULL),
(72, 29, 'UsefulLink', NULL, NULL, '<p>UsefulLink</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-08 13:51:07', NULL, NULL),
(73, 29, 'Slider', NULL, NULL, '<p>Slider</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 11:07:57', NULL, NULL),
(74, 29, 'Team', NULL, NULL, '<p>Team</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 11:26:45', NULL, NULL),
(75, 29, 'Faq', NULL, NULL, '<p>Faq</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 12:08:33', NULL, NULL),
(76, 29, 'Service', NULL, NULL, '<p>Service</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 13:16:18', NULL, NULL),
(77, 29, 'Facility', NULL, NULL, '<p>Facility</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 13:16:32', NULL, NULL),
(78, 29, 'News', NULL, NULL, '<p>News</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 14:26:30', NULL, NULL),
(79, 29, 'Blog', NULL, NULL, '<p>Blog</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 15:30:51', NULL, NULL),
(80, 29, 'Covid', NULL, NULL, '<p>Covid</p>', NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-03-09 16:51:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `Reg_Id` int(20) UNSIGNED NOT NULL,
  `Reg_Organization_Name` varchar(255) DEFAULT NULL,
  `Reg_Logo` varchar(255) DEFAULT NULL,
  `Reg_Name` varchar(255) DEFAULT NULL,
  `Reg_Contact` varchar(255) DEFAULT NULL,
  `Reg_Email` varchar(255) DEFAULT NULL,
  `Reg_Address` varchar(255) DEFAULT NULL,
  `Reg_Remark` varchar(255) DEFAULT NULL,
  `Reg_StartDate` varchar(255) DEFAULT NULL,
  `Reg_ExpiryPeriod` varchar(255) DEFAULT NULL,
  `Reg_TwoStepVerification` varchar(255) DEFAULT NULL,
  `Reg_Status` int(12) DEFAULT 0,
  `Reg_CreatedBy` int(20) DEFAULT NULL,
  `Reg_CreatedDate` datetime DEFAULT NULL,
  `Reg_UpdatedBy` int(20) DEFAULT NULL,
  `Reg_UpdatedDate` datetime DEFAULT NULL,
  `Reg_DeletedDate` datetime DEFAULT NULL,
  `Reg_DeletedBy` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`Reg_Id`, `Reg_Organization_Name`, `Reg_Logo`, `Reg_Name`, `Reg_Contact`, `Reg_Email`, `Reg_Address`, `Reg_Remark`, `Reg_StartDate`, `Reg_ExpiryPeriod`, `Reg_TwoStepVerification`, `Reg_Status`, `Reg_CreatedBy`, `Reg_CreatedDate`, `Reg_UpdatedBy`, `Reg_UpdatedDate`, `Reg_DeletedDate`, `Reg_DeletedBy`, `created_at`, `updated_at`) VALUES
(1, 'EduManag', 'Reg_Logo/1706180359.png', 'Rahul Sony', '092520 89089', 'info@edumanag.com', '4th Street, near Patanjali Store, Bihari Ganj, Ajmer, Rajasthan 305001', 'Remark', '2024-01-10', '2', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Arihant Diagnostics', 'Arihant_Diagnostic_Images/Registration_images/1706351189.png', 'Arihant Diagnostics', '9773346702', 'arihantdiagnostics@gmail.com', '660, Near Pancholi Choraha, Opposite Postal Store Depot, BK Kaul Nagar,Ajmer, Rajasthan 305004', 'non', '2024-01-24', '4 month', '1', 0, NULL, '2024-01-23 11:45:23', 37, '2024-01-27 16:26:29', NULL, NULL, NULL, NULL),
(13, 'AMD', 'AMD_Images/Registration_images/1706511252.png', 'AMD', '+821 (2365) 456 90', 'AMD', '503 Old Buffalo Street Northwest #205, New York-3087.', 'Remark', '2024-01-05', '4', NULL, 0, 1, '2024-01-29 12:54:12', 1, '2024-02-01 12:59:45', NULL, NULL, NULL, NULL),
(28, 'RajasthanConsultancy', '1/Registration_images/1707820861.png', 'RajasthanConsultancy', '9876543210', 'rajasthanconsultancy@gmail.com', 'Dummy Address', 'Remark', '2024-02-14', '4', NULL, 0, 1, '2024-02-13 16:11:01', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'MindsUp', '28/Registration_images/1709878922.png', 'MindsUp', '9876543210', 'mindsup@gmail.com', 'MindsUp Address', 'Remark', '2024-03-09', '111', NULL, 0, 1, '2024-03-08 11:52:02', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `SubMen_Id` int(20) NOT NULL,
  `SubMen_Reg_Id` int(20) DEFAULT NULL,
  `SubMen_Men_Id` int(20) DEFAULT NULL,
  `SubMen_Name` varchar(255) DEFAULT NULL,
  `SubMen_URL` text DEFAULT NULL,
  `SubMen_ShortDesc` varchar(255) DEFAULT NULL,
  `SubMen_FullDesc` text DEFAULT NULL,
  `SubMen_SerialOrder` varchar(255) DEFAULT NULL,
  `SubMen_AdminExists` varchar(255) DEFAULT NULL,
  `SubMen_Status` int(20) NOT NULL DEFAULT 0,
  `SubMen_CreatedBy` int(20) DEFAULT NULL,
  `SubMen_CreatedDate` datetime DEFAULT NULL,
  `SubMen_UpdatedBy` int(20) DEFAULT NULL,
  `SubMen_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`SubMen_Id`, `SubMen_Reg_Id`, `SubMen_Men_Id`, `SubMen_Name`, `SubMen_URL`, `SubMen_ShortDesc`, `SubMen_FullDesc`, `SubMen_SerialOrder`, `SubMen_AdminExists`, `SubMen_Status`, `SubMen_CreatedBy`, `SubMen_CreatedDate`, `SubMen_UpdatedBy`, `SubMen_UpdatedDate`) VALUES
(4, 13, NULL, 'AdmAbout Dummy Text1', 'Adm About US SubMenu', 'About US SubMenu', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>', '1', 'on', 0, 1, '2024-02-05 13:11:06', 42, '2024-03-01 17:17:01'),
(9, 28, 31, 'a', 'd', 'a', '<p>a</p>', '1', 'on', 2, 77, '2024-03-01 11:18:24', 1, '2024-03-01 11:19:11'),
(10, 28, 31, 'a', 'd', 'a', '<p>a</p>', '1', NULL, 2, 77, '2024-03-01 11:18:24', 1, '2024-03-01 11:20:07'),
(11, 28, 31, 'a', 'd', 'a', '<p>a</p>', '1', 'on', 2, 77, '2024-03-01 11:18:24', 1, '2024-03-01 11:19:11'),
(12, 28, 31, 'a', 'd', 'a', '<p>a</p>', '1', 'on', 2, 77, '2024-03-01 11:18:24', 1, '2024-03-01 11:19:11'),
(13, 29, 38, 'new', 'dfg', 'df', '<p>dfg</p>', '1', NULL, 1, 1, '2024-03-08 13:41:36', 1, '2024-03-09 11:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitorcounter`
--

CREATE TABLE `tbl_visitorcounter` (
  `id` int(20) NOT NULL,
  `Vis_Reg_Id` int(11) NOT NULL,
  `Vis_Ip` varchar(255) DEFAULT NULL,
  `Vis_Location` varchar(255) DEFAULT NULL,
  `Vis_CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_visitorcounter`
--

INSERT INTO `tbl_visitorcounter` (`id`, `Vis_Reg_Id`, `Vis_Ip`, `Vis_Location`, `Vis_CreatedDate`) VALUES
(16, 4, '127.0.0.1', NULL, '2024-03-07 17:47:21'),
(17, 28, '127.0.0.1', NULL, '2024-03-08 10:42:16'),
(18, 29, '127.0.0.1', NULL, '2024-03-08 12:08:13'),
(19, 29, '127.0.0.1', NULL, '2024-03-09 11:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_information`
--

CREATE TABLE `tbl_website_information` (
  `WebInf_Id` int(20) NOT NULL,
  `WebInf_Reg_Id` int(20) DEFAULT NULL,
  `WebInf_Name` varchar(255) DEFAULT NULL,
  `WebInf_Address` varchar(255) DEFAULT NULL,
  `WebInf_Tagline` varchar(255) DEFAULT NULL,
  `WebInf_HeaderLogo` varchar(255) DEFAULT NULL,
  `WebInf_FooterLogo` varchar(255) DEFAULT NULL,
  `WebInf_EmailId` varchar(255) DEFAULT NULL,
  `WebInf_ContactNo` varchar(255) DEFAULT NULL,
  `WebInf_Map` text DEFAULT NULL,
  `WebInf_Favicon` varchar(255) DEFAULT NULL,
  `WebInf_ShortInfo1` varchar(255) DEFAULT NULL,
  `WebInf_ShortInfo2` varchar(255) DEFAULT NULL,
  `WebInf_ShortInfo3` varchar(255) DEFAULT NULL,
  `WebInf_ShortInfo4` text DEFAULT NULL,
  `WebInf_About` varchar(255) NOT NULL,
  `WebInf_openingHours` varchar(255) DEFAULT NULL,
  `WebInf_Status` int(20) DEFAULT 0,
  `WebInf_CreatedBy` int(11) DEFAULT NULL,
  `WebInf_CreatedDate` datetime DEFAULT NULL,
  `WebInf_UpdatedBy` int(20) DEFAULT NULL,
  `WebInf_UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_website_information`
--

INSERT INTO `tbl_website_information` (`WebInf_Id`, `WebInf_Reg_Id`, `WebInf_Name`, `WebInf_Address`, `WebInf_Tagline`, `WebInf_HeaderLogo`, `WebInf_FooterLogo`, `WebInf_EmailId`, `WebInf_ContactNo`, `WebInf_Map`, `WebInf_Favicon`, `WebInf_ShortInfo1`, `WebInf_ShortInfo2`, `WebInf_ShortInfo3`, `WebInf_ShortInfo4`, `WebInf_About`, `WebInf_openingHours`, `WebInf_Status`, `WebInf_CreatedBy`, `WebInf_CreatedDate`, `WebInf_UpdatedBy`, `WebInf_UpdatedDate`) VALUES
(1, 1, 'EduManag', 'th Street, near Patanjali Store, Bihari Ganj, Ajmer, Rajasthan 305001', 'Tagline', '1/WebInformation_images/1706519262_65b76adeee7ef.png', '1706182849_65b248c1b31d8.png', 'info@edumang@gmail.com', '092520 89089', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14290.965952420249!2d74.6491126!3d26.4318177!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be6d255a71059%3A0x659cccb15ddd9beb!2sEduManag!5e0!3m2!1sen!2sin!4v1706182811411!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1706182849_65b248c1b39ab.png', '320', '10', '320', '10', 'About', NULL, 0, NULL, '2024-01-23 11:58:33', 1, '2024-01-29 15:07:42'),
(2, 4, 'Arihant Diagnostics', '660, Near Pancholi Choraha, Opposite Postal Store Depot, BK Kaul Nagar,Ajmer, Rajasthan 305004', 'Tagline', '4/WebInformation_images/1707382706_65c497b20920b.png', '4/WebInformation_images/1708595537_65d71951042e0.jpg', 'arihantdiagnostics1@gmail.com', '+91 9773346701 , +91 9773346702', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.5752226869654!2d74.60761331065287!3d26.469417976817926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be77130691009%3A0x548ee3a06921abad!2sArihant%20Diagnostics%20Center!5e0!3m2!1sen!2sin!4v1705481308782!5m2!1sen!2sin', 'Arihant_Diagnostic_Images/WebInformation_images/1706351206_65b4da66d3a5e.png', '320', '10', '320', '10', 'About', 'Every day: 9:00am - 6:00pm', 0, NULL, '2024-01-23 11:58:33', 1, '2024-02-22 15:22:17'),
(4, 13, 'AMD', 'AMD Career Shapers & Training Solutions\r\nZee Cinemall,shop No FF-34,Gauravpath\r\nOpposite .Samsung Street Talk ,\r\nVaishali Nagar,Ajmer', 'Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.', '1/WebInformation_images/1706511320_65b74bd818465.png', 'AMD_Images/WebInformation_images/1706511320_65b74bd818075.png', 'amdtrainingsolutions@gmail.com', '9983252676', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d446.40281920302226!2d74.63073397055268!3d26.480778235624072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be7af02f0af91%3A0xee6b7e71510742e6!2sCine%20Mall!5e0!3m2!1sen!2sin!4v1709108006474!5m2!1sen!2sin', 'AMD_Images/WebInformation_images/1706511320_65b74bd8186b9.png', '300', '1700', '11900', '157', 'About', 'Mon – Sat: 8.00 – 18.30', 0, 1, '2024-01-29 12:55:20', 1, '2024-02-28 13:45:24'),
(10, 28, 'Rajasthan Consultancy', 'Dummy Address', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ut enim ad minim veniam.', '28/WebInformation_images/1709710719_65e81d7f74fe4.jpeg', '28/WebInformation_images/1709641608_65e70f883baab.jpeg', 'rajasthanconsultancy@gmai.com', '9876543210,9829999193', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d892.8056402350932!2d74.631249!3d26.480778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be7af02f0af91%3A0xee6b7e71510742e6!2sCine%20Mall!5e0!3m2!1sen!2sin!4v1709632572837!5m2!1sen!2sin', '28/WebInformation_images/1709641608_65e70f883c251.jpeg', '24', '95', '5', '05', 'Dummy About', 'Mon – Sat: 8.00 – 18.00', 0, 1, '2024-02-13 16:14:32', 1, '2024-03-06 14:12:10'),
(11, 1, 'a', 'd', 's', '1/WebInformation_images/1709203029_65e05e55a9ea9.jpg', '1/WebInformation_images/1709203029_65e05e55a9a67.jpg', 'ra@gmail.com', '1211111111', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d892.8056402350932!2d74.631249!3d26.480778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be7af02f0af91%3A0xee6b7e71510742e6!2sCine%20Mall!5e0!3m2!1sen!2sin!4v1709632572837!5m2!1sen!2sin', '1/WebInformation_images/1709203029_65e05e55aa241.jpg', 'd', 'd', 'd', 'd', 'd', 'd', 2, 1, '2024-02-29 16:07:09', 1, '2024-03-05 15:27:22'),
(12, 29, 'MindsUp', 'MindsUp Address', 'MindsUp MindsUp', '29/WebInformation_images/1709879161_65eaaf791b09a.png', '29/WebInformation_images/1709879161_65eaaf791ab23.png', 'mindsup@gmail.com', '9876543210', 'MindsUp map link', '29/WebInformation_images/1709879161_65eaaf791b2ce.png', '1', '2', '3', '4', 'MindsUp About', '8:00am to 9:00pm', 0, 1, '2024-03-08 11:56:01', NULL, NULL);

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
  `file_path` varchar(255) DEFAULT 'assets/images/users/default.png',
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`);

--
-- Indexes for table `tbl_adminmenu`
--
ALTER TABLE `tbl_adminmenu`
  ADD PRIMARY KEY (`AddMen_Id`) USING BTREE;

--
-- Indexes for table `tbl_adminmenuallotment`
--
ALTER TABLE `tbl_adminmenuallotment`
  ADD PRIMARY KEY (`Add_MenAllo_Id`) USING BTREE;

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`Con_Id`);

--
-- Indexes for table `tbl_credential_log`
--
ALTER TABLE `tbl_credential_log`
  ADD PRIMARY KEY (`CreLog_Id`);

--
-- Indexes for table `tbl_employee_registration`
--
ALTER TABLE `tbl_employee_registration`
  ADD PRIMARY KEY (`Emp_Id`),
  ADD UNIQUE KEY `Emp_Email` (`Emp_Email`);

--
-- Indexes for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  ADD PRIMARY KEY (`Error_Id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`Gall_Id`);

--
-- Indexes for table `tbl_gallerycategory`
--
ALTER TABLE `tbl_gallerycategory`
  ADD PRIMARY KEY (`GallCat_Id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`Log_Id`) USING BTREE;

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`Men_Id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`Pag_Id`);

--
-- Indexes for table `tbl_pagecategory`
--
ALTER TABLE `tbl_pagecategory`
  ADD PRIMARY KEY (`PagCat_Id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`Reg_Id`),
  ADD UNIQUE KEY `Reg_Email` (`Reg_Email`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`SubMen_Id`);

--
-- Indexes for table `tbl_visitorcounter`
--
ALTER TABLE `tbl_visitorcounter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  ADD PRIMARY KEY (`WebInf_Id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_adminmenu`
--
ALTER TABLE `tbl_adminmenu`
  MODIFY `AddMen_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_adminmenuallotment`
--
ALTER TABLE `tbl_adminmenuallotment`
  MODIFY `Add_MenAllo_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `Con_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_credential_log`
--
ALTER TABLE `tbl_credential_log`
  MODIFY `CreLog_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_employee_registration`
--
ALTER TABLE `tbl_employee_registration`
  MODIFY `Emp_Id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  MODIFY `Error_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `Gall_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_gallerycategory`
--
ALTER TABLE `tbl_gallerycategory`
  MODIFY `GallCat_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `Log_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `Men_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `Pag_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `tbl_pagecategory`
--
ALTER TABLE `tbl_pagecategory`
  MODIFY `PagCat_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `Reg_Id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `SubMen_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_visitorcounter`
--
ALTER TABLE `tbl_visitorcounter`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  MODIFY `WebInf_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
