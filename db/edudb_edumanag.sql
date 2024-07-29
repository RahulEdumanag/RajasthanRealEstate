-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edudb_edumanag`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `Car_Id` int(20) NOT NULL,
  `Car_Job_Id` int(20) DEFAULT 0,
  `Car_ConInf_Id` int(20) DEFAULT 0,
  `Car_Name` varchar(255) DEFAULT NULL,
  `Car_Email` varchar(255) DEFAULT NULL,
  `Car_Number` varchar(255) DEFAULT NULL,
  `Car_Address` text DEFAULT NULL,
  `Car_Experince` varchar(255) DEFAULT NULL,
  `Car_Attachment` text DEFAULT NULL,
  `Car_KeySkills` text DEFAULT NULL,
  `Car_Status` int(20) NOT NULL DEFAULT 0,
  `Car_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `Car_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Car_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `Car_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`Car_Id`, `Car_Job_Id`, `Car_ConInf_Id`, `Car_Name`, `Car_Email`, `Car_Number`, `Car_Address`, `Car_Experince`, `Car_Attachment`, `Car_KeySkills`, `Car_Status`, `Car_CreatedBy`, `Car_CreatedDate`, `Car_UpdatedBy`, `Car_UpdatedDate`) VALUES
(1, NULL, NULL, 'Rahul Sony', 'rahulsony@gmail.com', '9588871256', 'Ajmer', '13', NULL, 'php', 3, 0, '2024-07-27 13:33:04', 0, '2024-07-27 13:33:04'),
(2, 2, 3, 'Amit Sony', 'amit@gmail.com', '9696969696', 'Ajmer', '12', 'Attachments/1722067732_66a4ab1472f86.pdf', '44', 0, 0, '2024-07-27 13:38:52', 0, '2024-07-27 13:38:52'),
(3, NULL, NULL, 'Amit Sony', 'amit.edumanag@gmail.com', '7474747474', 'Ajmer', '0', NULL, NULL, 3, 0, '2024-07-27 17:08:01', 0, '2024-07-27 17:08:01'),
(4, NULL, NULL, 'Amit Sony', 'amit.edumanag@gmail.com', '9696969696', 'Ajmer', '13', NULL, NULL, 3, 0, '2024-07-27 17:09:28', 0, '2024-07-27 17:09:28'),
(5, NULL, NULL, 'Amit Sony', 'amit.edumanag@gmail.com', '9696969696', 'Ajmer,Rajasthan', '1', NULL, NULL, 3, 0, '2024-07-27 17:10:57', 0, '2024-07-27 17:10:57'),
(6, NULL, NULL, 'Amit', 'amit.edumanag@gmail.com', '9696969696', 'Ajmer', '3', NULL, NULL, 3, 0, '2024-07-27 17:12:03', 0, '2024-07-27 17:12:03'),
(7, NULL, NULL, 'amit.edumanag@gmail.com', 'amit.edumanag@gmail.com', '5858585858', 'Ajmer', '1', NULL, '53', 3, 0, '2024-07-27 17:17:17', 0, '2024-07-27 17:17:17'),
(8, NULL, NULL, 'amit', 'amit.edumanag@gmail.com', '7474747474', 'ajmer', '2', NULL, NULL, 3, 0, '2024-07-27 17:19:05', 0, '2024-07-27 17:19:05'),
(9, NULL, NULL, 'Amit', 'amit.edumanag@gmail.com', '7474747474', 'Ajmer', '9', NULL, NULL, 3, 0, '2024-07-27 17:20:50', 0, '2024-07-27 17:20:50'),
(10, NULL, NULL, 'Amit', 'amit.edumanag@gmail.com', '7894569874', 'Ajmer', '1', NULL, NULL, 3, 0, '2024-07-27 17:26:33', 0, '2024-07-27 17:26:33'),
(11, NULL, NULL, 'Amit', 'amit.edumanag@gmail.com', '1414141414', 'Ajmer', '11', NULL, NULL, 3, 0, '2024-07-27 17:27:55', 0, '2024-07-27 17:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `Cit_Id` int(11) NOT NULL,
  `Cit_Sta_Id` int(11) DEFAULT 0,
  `Cit_Name` varchar(255) DEFAULT NULL,
  `Cit_Code` varchar(10) DEFAULT NULL,
  `Cit_Status` int(11) NOT NULL DEFAULT 0,
  `Cit_CreatedBy` int(11) DEFAULT 0,
  `Cit_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Cit_UpdatedBy` int(11) DEFAULT 0,
  `Cit_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`Cit_Id`, `Cit_Sta_Id`, `Cit_Name`, `Cit_Code`, `Cit_Status`, `Cit_CreatedBy`, `Cit_CreatedDate`, `Cit_UpdatedBy`, `Cit_UpdatedDate`) VALUES
(1, 1, 'Jaipur', 'RJ0141', 0, 1, '2024-05-07 12:44:42', 1, '2024-05-09 12:14:23'),
(2, 2, 'Sapporo', 'HK000', 0, 1, '2024-05-07 12:44:48', 1, '2024-05-09 12:14:35'),
(3, 1, 'Jodhpur', 'Rj19', 0, 1, '2024-05-09 12:16:40', 0, '2024-05-09 12:16:40'),
(4, 1, 'Ajmer', NULL, 0, 1, '2024-05-13 13:33:09', 1, '2024-06-05 14:21:20'),
(5, 3, 'test_City', 'test_City', 0, 1, '2024-06-05 12:01:29', 0, '2024-06-05 12:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `Cli_Id` int(11) NOT NULL,
  `Cli_ProCat_Id` int(20) NOT NULL DEFAULT 0,
  `Cli_InnerBanner` varchar(255) DEFAULT NULL,
  `Cli_Order` int(11) DEFAULT NULL,
  `Cli_Name` varchar(255) DEFAULT NULL,
  `Cli_Image` varchar(255) DEFAULT NULL,
  `Cli_Link` text DEFAULT NULL,
  `Cli_ShortDesc` text DEFAULT NULL,
  `Cli_FullDesc` text DEFAULT NULL,
  `Cli_Status` int(11) DEFAULT 0,
  `Cli_CreatedBy` int(11) DEFAULT NULL,
  `Cli_CreatedDate` datetime DEFAULT current_timestamp(),
  `Cli_UpdatedBy` int(11) DEFAULT NULL,
  `Cli_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`Cli_Id`, `Cli_ProCat_Id`, `Cli_InnerBanner`, `Cli_Order`, `Cli_Name`, `Cli_Image`, `Cli_Link`, `Cli_ShortDesc`, `Cli_FullDesc`, `Cli_Status`, `Cli_CreatedBy`, `Cli_CreatedDate`, `Cli_UpdatedBy`, `Cli_UpdatedDate`) VALUES
(1, 21, NULL, 1, 'a', NULL, 'a', 'a', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(2, 21, NULL, 1, 'b', NULL, 'b', 'b', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(3, 21, NULL, 1, 'c', NULL, 'c', 'c', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(4, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(5, 21, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(6, 21, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(7, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(8, 21, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(9, 21, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(10, 21, NULL, 1, 'g', NULL, 'g', 'g', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(11, 21, NULL, 1, 'h', NULL, 'h', 'h', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(12, 21, NULL, 1, 'i', NULL, 'i', 'i', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(13, 22, NULL, 1, 'a', NULL, 'a', 'a', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(14, 22, NULL, 1, 'b', NULL, 'b', 'b', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(15, 22, NULL, 1, 'c', NULL, 'c', 'c', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(16, 22, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(17, 22, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(18, 22, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(19, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(20, 21, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(21, 21, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(22, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(23, 21, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(24, 21, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(25, 22, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(26, 22, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(27, 22, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(28, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(29, 21, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(30, 21, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(31, 21, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(32, 23, NULL, 111, 'Testing', NULL, '1', '1', '<p>1</p>', 0, 1, '2024-06-19 11:09:32', NULL, '2024-06-19 11:09:32'),
(33, 22, NULL, 1, 'a', NULL, 'a', 'a', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(34, 22, NULL, 1, 'b', NULL, 'b', 'b', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(35, 22, NULL, 1, 'c', NULL, 'c', 'c', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(36, 22, NULL, 1, 'd', NULL, 'd', 'd', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(37, 22, NULL, 1, 'e', NULL, 'e', 'e', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(38, 22, NULL, 1, 'f', NULL, 'f', 'f', NULL, 0, 1, '2024-06-19 10:44:52', NULL, '2024-06-19 10:44:52'),
(39, 21, NULL, 112, 'a', NULL, 'a', NULL, NULL, 0, 1, '2024-06-19 12:40:26', NULL, '2024-06-19 12:40:26'),
(40, 22, NULL, 113, 's', NULL, 's', NULL, NULL, 0, 1, '2024-06-19 12:40:33', NULL, '2024-06-19 12:40:33'),
(41, 23, NULL, 114, 't', NULL, 't', NULL, NULL, 0, 1, '2024-06-19 12:40:39', NULL, '2024-06-19 12:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactinformation`
--

CREATE TABLE `tbl_contactinformation` (
  `ConInf_Id` int(20) NOT NULL,
  `ConInf_PerInf_Id` int(20) NOT NULL DEFAULT 0,
  `ConInf_Cit_Id` int(20) NOT NULL DEFAULT 0,
  `ConInf_Name` varchar(255) DEFAULT NULL,
  `ConInf_Address` text DEFAULT NULL,
  `ConInf_Number` varchar(255) DEFAULT NULL,
  `ConInf_Email` varchar(255) DEFAULT NULL,
  `ConInf_Remark` varchar(255) DEFAULT NULL,
  `ConInf_Status` int(20) NOT NULL DEFAULT 0,
  `ConInf_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `ConInf_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ConInf_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `ConInf_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contactinformation`
--

INSERT INTO `tbl_contactinformation` (`ConInf_Id`, `ConInf_PerInf_Id`, `ConInf_Cit_Id`, `ConInf_Name`, `ConInf_Address`, `ConInf_Number`, `ConInf_Email`, `ConInf_Remark`, `ConInf_Status`, `ConInf_CreatedBy`, `ConInf_CreatedDate`, `ConInf_UpdatedBy`, `ConInf_UpdatedDate`) VALUES
(3, 1, 4, 'shruti', '33 & 33A, Rama Road, Industrial Area, Near Kirti Nagar Metro Station', '9856985698', 'test@gmail.com', 'remark', 0, 1, '2024-06-05 14:22:11', 0, '2024-06-05 14:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `Con_Id` int(11) NOT NULL,
  `Con_Pro_Id` int(11) NOT NULL DEFAULT 0,
  `Con_ProCat_Id` int(20) NOT NULL DEFAULT 0,
  `Con_Ser_Id` int(20) DEFAULT 0,
  `Con_Name` varchar(255) DEFAULT NULL,
  `Con_Email` varchar(255) DEFAULT NULL,
  `Con_Mobile` varchar(255) DEFAULT NULL,
  `Con_Address` text DEFAULT NULL,
  `Con_Subject` varchar(255) DEFAULT NULL,
  `Con_Message` text DEFAULT NULL,
  `Con_Status` int(11) DEFAULT 0,
  `Con_CreatedBy` int(11) DEFAULT NULL,
  `Con_CreatedDate` datetime DEFAULT current_timestamp(),
  `Con_UpdatedBy` int(11) DEFAULT NULL,
  `Con_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`Con_Id`, `Con_Pro_Id`, `Con_ProCat_Id`, `Con_Ser_Id`, `Con_Name`, `Con_Email`, `Con_Mobile`, `Con_Address`, `Con_Subject`, `Con_Message`, `Con_Status`, `Con_CreatedBy`, `Con_CreatedDate`, `Con_UpdatedBy`, `Con_UpdatedDate`) VALUES
(15, 0, 0, 0, 's', 'sw@gmail.com', '7896547896', 'Ajmer', NULL, 'Message', 0, NULL, '2024-06-15 17:16:45', NULL, '2024-06-15 17:16:45'),
(16, 0, 0, 0, 's', 'sw@gmail.com', '7896547896', 'Ajmer', NULL, 'Message', 0, NULL, '2024-06-15 17:17:08', NULL, '2024-06-15 17:17:08'),
(17, 0, 0, 0, 'q', 'a@gmail.com', '7575757575', 'ajmer', NULL, 'message', 0, NULL, '2024-06-15 17:21:02', NULL, '2024-06-15 17:21:02'),
(18, 0, 0, 0, 'q', 'a@gmail.com', '7575757575', 'ajmer', NULL, 'message', 0, NULL, '2024-06-15 17:22:16', NULL, '2024-06-15 17:22:16'),
(19, 0, 0, 0, 'q', 'a@gmail.com', '7575757575', 'ajmer', NULL, 'message', 0, NULL, '2024-06-15 17:43:39', NULL, '2024-06-15 17:43:39'),
(20, 0, 0, 0, 'q', 'a@gmail.com', '7575757575', 'ajmer', NULL, 'message', 0, NULL, '2024-06-15 17:43:55', NULL, '2024-06-15 17:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `Cou_Id` int(11) NOT NULL,
  `Cou_Name` varchar(255) DEFAULT NULL,
  `Cou_Code` varchar(255) DEFAULT NULL,
  `Cou_Status` int(11) NOT NULL DEFAULT 0,
  `Cou_CreatedBy` int(11) NOT NULL DEFAULT 0,
  `Cou_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Cou_UpdatedBy` int(11) NOT NULL DEFAULT 0,
  `Cou_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`Cou_Id`, `Cou_Name`, `Cou_Code`, `Cou_Status`, `Cou_CreatedBy`, `Cou_CreatedDate`, `Cou_UpdatedBy`, `Cou_UpdatedDate`) VALUES
(1, 'India', '+91', 0, 1, '2024-04-12 12:14:42', 1, '2024-05-04 13:22:03'),
(2, 'Japan', '+82', 0, 1, '2024-04-12 12:43:52', 1, '2024-05-04 13:22:09'),
(3, 'test', '00', 0, 1, '2024-06-05 11:50:07', 0, '2024-06-05 11:50:07');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(44, 29, 55, 'mindsup@gmail.com', '$2y$10$usYuv47avJ3/n4uA8gWybOkScU0mv6HGRLWXeUoJwtqbJOHDtr68.', 1, 1, '2024-03-08 11:52:02', NULL, NULL, NULL, NULL),
(45, 1, NULL, 'rahulsoni@admin.com', '$2y$10$sOV4IiljuJ5c8qMI6r/RhuWepDElaMaIkPWaaAvMFI2obb3IYKeu2', 1, 1, '2024-03-15 14:52:24', NULL, '2024-03-15 14:52:24', NULL, NULL),
(46, 1, NULL, 'rahulsoni@admin.com', '$2y$10$a3YgzAgHPch7fUpc6R/E.OOraGjU/3Femlgd8cRiS85Pbsh1rTqEq', 1, 1, '2024-03-15 14:52:55', NULL, '2024-03-15 14:52:55', NULL, NULL),
(47, 1, NULL, 'rahulsoni@admin.com', '$2y$10$TEfR/.QC/o/hekiOoF6oEe2aH2q3BpBjmKTPlVSJ.jaZQXdC/PQkS', 1, 1, '2024-03-15 14:53:37', NULL, '2024-03-15 14:53:37', NULL, NULL),
(48, 1, NULL, 'rahulsoni@admin.com', '$2y$10$BYtTdAfqY92zbsDmMU86VO3YkCcjp6RV5Fpi8xVa5OVie3NTb6wfq', 1, 1, '2024-03-15 14:54:54', NULL, '2024-03-15 14:54:54', NULL, NULL),
(49, 1, NULL, 'rahulsoni@admin.com', '$2y$10$XCLb9/2vDsowWKIOhDZ4yOZfJWTFcNQ08R.kZhw5k4h0pkeIu4XGy', 1, 1, '2024-03-15 14:55:05', NULL, '2024-03-15 14:55:05', NULL, NULL),
(50, 1, NULL, 'rahulsoni@admin.com', '$2y$10$EHpgxAYbQQUPHoq8jpZenOJ0FNmjmFebXyhkyR9.oWdVXggvoCuZC', 1, 1, '2024-03-15 14:55:41', NULL, '2024-03-15 14:55:41', NULL, NULL),
(51, 1, NULL, 'rahulsoni@admin.com', '$2y$10$4QcYIYL0oGDcpTR3.cC7A.9nOhpMBcfLXfA8MRXcfOjkqq1N7bH1G', 1, 1, '2024-03-15 14:56:09', NULL, '2024-03-15 14:56:09', NULL, NULL),
(52, 1, NULL, 'rahulsoni@admin.com', '$2y$10$r5BLkZsmkzOKZXeCjR1Dv.OXedYoaTfuSvNd/almq2j9C7pb3ivv6', 1, 1, '2024-03-15 14:56:29', NULL, '2024-03-15 14:56:29', NULL, NULL),
(53, 1, NULL, 'rahulsoni@admin.com', '$2y$10$3KR7/gRNxsiAlJwQy1iVGObjQ9i.T25h03oZ2ZFRKKhXDiIawfVJm', 1, 1, '2024-03-15 14:56:38', NULL, '2024-03-15 14:56:38', NULL, NULL),
(54, 1, NULL, 'rahulsoni@admin.com', '$2y$10$cavo2rqoL1QjQ7au6cQwW.Q3KA6Oek1.Zu5QvlhrB1QpdhGy3fQne', 1, 1, '2024-06-03 16:52:33', NULL, '2024-06-03 16:52:33', NULL, NULL),
(55, 1, NULL, 'rahulsoni@admin.com', '$2y$10$XcDvPc.VpXBiTNbX.15Pn.BucEP0wGpEr/NKrBssbNPz1e6FIpS.2', 1, 1, '2024-06-03 16:52:45', NULL, '2024-06-03 16:52:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_errors`
--

CREATE TABLE `tbl_errors` (
  `Err_Id` bigint(20) UNSIGNED NOT NULL,
  `Err_Title` varchar(255) DEFAULT NULL,
  `Err_Message` text DEFAULT NULL,
  `Err_Status` tinyint(1) NOT NULL DEFAULT 0,
  `Err_CreatedBy` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `Err_UpdatedBy` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `Err_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Err_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_errors`
--

INSERT INTO `tbl_errors` (`Err_Id`, `Err_Title`, `Err_Message`, `Err_Status`, `Err_CreatedBy`, `Err_UpdatedBy`, `Err_CreatedDate`, `Err_UpdatedDate`) VALUES
(1, NULL, 'Undefined variable: request', 0, 1, 0, '2024-04-27 11:02:44', '2024-04-27 11:02:44'),
(2, 'q', '<p>q</p>', 2, 1, 0, '2024-06-03 12:20:14', '2024-06-03 12:20:14'),
(3, 'aaaa', '<p>aa</p>', 2, 1, 1, '2024-06-03 12:20:24', '2024-06-03 12:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `Fac_Id` int(20) NOT NULL,
  `Fac_ProCat_Id` int(20) NOT NULL,
  `Fac_Image` varchar(255) DEFAULT NULL,
  `Fac_InnerBanner` varchar(255) DEFAULT NULL,
  `Fac_Name` varchar(255) DEFAULT NULL,
  `Fac_Order` int(20) DEFAULT NULL,
  `Fac_Desc` text DEFAULT NULL,
  `Fac_Status` int(11) NOT NULL DEFAULT 0,
  `Fac_CreatedBy` int(11) NOT NULL,
  `Fac_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Fac_UpdatedBy` int(11) DEFAULT NULL,
  `Fac_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`Fac_Id`, `Fac_ProCat_Id`, `Fac_Image`, `Fac_InnerBanner`, `Fac_Name`, `Fac_Order`, `Fac_Desc`, `Fac_Status`, `Fac_CreatedBy`, `Fac_CreatedDate`, `Fac_UpdatedBy`, `Fac_UpdatedDate`) VALUES
(1, 12, 'fas fa-tools', 'Plan_images/1714045698_662a4302748a4.jpg', 'Free Installation', 1, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:49:56', 1, '2024-04-25 17:18:18'),
(2, 12, 'fas fa-bolt', NULL, 'Ultrafast Connect', 2, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:09', 1, '2024-04-04 12:30:49'),
(3, 7, 'fas fa-tv', NULL, '4K and 8K Quality', 3, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:24', 1, '2024-03-28 14:03:18'),
(4, 7, 'fas fa-headset', NULL, 'Fast Support 24/7', 4, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:37', 1, '2024-03-28 14:01:42'),
(5, 8, 'fas fa-tv', NULL, '4K and 8K Quality', 3, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:24', 1, '2024-03-28 14:03:13'),
(6, 8, NULL, NULL, 'Fast Support 24/7', 4, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:37', NULL, '2024-03-22 15:50:37'),
(7, 8, 'fas fa-tools', NULL, 'Free Installation', 1, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:49:56', 1, '2024-03-28 14:03:33'),
(8, 8, 'fas fa-bolt', NULL, 'Ultrafast Connect', 2, '<p>Lorem ipsum dolor sit amet them consec tetur elit sed do eiumod. Donec quam felis ies nec.</p>', 0, 1, '2024-03-22 15:50:09', 1, '2024-03-28 14:04:03'),
(9, 12, NULL, NULL, 'dsf', 5, NULL, 0, 1, '2024-04-27 11:52:13', NULL, '2024-04-27 11:52:13'),
(10, 12, NULL, NULL, 'a', 6, NULL, 0, 1, '2024-05-01 12:41:31', NULL, '2024-05-01 12:41:31'),
(11, 12, 'e', NULL, 'b', 7, NULL, 0, 1, '2024-05-01 12:41:36', 1, '2024-05-01 12:42:07'),
(12, 20, '1', NULL, '1', 1, '<p>1</p>', 0, 1, '2024-06-03 15:53:43', NULL, '2024-06-03 15:53:43'),
(13, 20, '1', NULL, '1', 1, '<p>1</p>', 0, 1, '2024-06-03 15:55:16', 1, '2024-06-03 15:56:09'),
(14, 21, 'a', NULL, 'aa', 8, NULL, 0, 1, '2024-06-19 15:09:57', NULL, '2024-06-19 15:09:57'),
(15, 23, 'a', NULL, 'a', 9, NULL, 0, 1, '2024-06-19 15:10:23', NULL, '2024-06-19 15:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE `tbl_faqs` (
  `Faq_Id` int(11) NOT NULL,
  `Faq_Name` varchar(255) DEFAULT NULL,
  `Faq_Order` int(11) DEFAULT NULL,
  `Faq_Desc` text DEFAULT NULL,
  `Faq_Status` int(11) DEFAULT 0,
  `Faq_CreatedBy` int(11) DEFAULT NULL,
  `Faq_CreatedDate` datetime DEFAULT current_timestamp(),
  `Faq_UpdatedBy` int(11) DEFAULT NULL,
  `Faq_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`Faq_Id`, `Faq_Name`, `Faq_Order`, `Faq_Desc`, `Faq_Status`, `Faq_CreatedBy`, `Faq_CreatedDate`, `Faq_UpdatedBy`, `Faq_UpdatedDate`) VALUES
(1, '1', 1, '1', 2, 1, '2024-03-20 12:34:03', 1, '2024-03-20 12:34:11'),
(2, 'What types of IT solutions does EduManag specialize in?', 1, 'EduManag excels in dynamic website and mobile app development, using diverse frameworks and cutting-edge tech for seamless integration and exceptional user experiences.', 0, 1, '2024-03-20 12:34:42', 1, '2024-03-30 12:39:04'),
(3, 'PHP (Laravel)', NULL, NULL, 0, 1, '2024-03-20 12:34:54', 1, '2024-06-05 11:34:21'),
(4, 'Can EduManag customize IT solutions based on specific business needs?', 3, 'Absolutely! We take pride in delivering top-notch IT solutions tailored to meet the unique needs of our clients. Whether you require a robust web platform or a responsive mobile application, we have the expertise and resources to bring your vision to life.', 0, 1, '2024-03-20 12:35:05', 1, '2024-03-30 12:28:03'),
(5, 'What sets EduManag apart from other IT solutions providers?', 4, 'EduManag stands out due to our commitment to excellence and customer satisfaction. We work closely with our clients throughout the development process, ensuring clear communication, timely delivery, and superior quality outcomes. Our goal is to empower businesses with digital solutions that drive growth, efficiency, and success.', 0, 1, '2024-03-20 12:35:13', 1, '2024-03-30 12:28:27'),
(6, '2', 2, '2', 2, 1, '2024-06-03 16:34:04', 1, '2024-06-03 16:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imagesize`
--

CREATE TABLE `tbl_imagesize` (
  `Img_Id` bigint(20) UNSIGNED NOT NULL,
  `Img_Title` varchar(255) DEFAULT NULL,
  `Img_Value` varchar(255) DEFAULT NULL,
  `Img_Status` varchar(255) NOT NULL DEFAULT '0',
  `Img_CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `Img_CreatedBy` int(20) NOT NULL,
  `Img_UpdatedDate` timestamp NULL DEFAULT NULL,
  `Img_UpdatedBy` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_imagesize`
--

INSERT INTO `tbl_imagesize` (`Img_Id`, `Img_Title`, `Img_Value`, `Img_Status`, `Img_CreatedDate`, `Img_CreatedBy`, `Img_UpdatedDate`, `Img_UpdatedBy`) VALUES
(1, 'Image Size', 'Image Size', '2', '2024-03-26 09:08:03', 1, NULL, NULL),
(2, '102400', '100 KB', '0', '2024-03-26 09:08:41', 1, NULL, NULL),
(3, '204800', '200 KB', '0', '2024-03-26 09:08:59', 1, NULL, NULL),
(4, '307200', '300 KB', '0', '2024-03-26 09:09:20', 1, NULL, NULL),
(5, '409600', '400 KB', '0', '2024-03-26 09:09:48', 1, '2024-03-26 09:14:41', 1),
(6, '1048576', '1 MB', '0', '2024-03-26 09:15:00', 1, NULL, NULL),
(10, 's', NULL, '2', '2024-03-26 09:54:25', 1, NULL, NULL),
(11, '10kb', '10kb', '2', '2024-03-26 10:00:43', 1, NULL, NULL),
(12, 'image', 'image', '2', '2024-03-26 10:03:47', 1, NULL, NULL),
(13, 'aaa', 'aa', '2', '2024-03-26 10:09:27', 1, NULL, NULL),
(14, 'sass', 'ss', '2', '2024-03-26 10:24:25', 1, NULL, NULL),
(15, 'ss', 'ss', '2', '2024-03-26 10:24:36', 1, NULL, NULL),
(16, 'New Image', 'New Image', '2', '2024-03-27 06:15:39', 1, NULL, NULL),
(17, 'name 1 kb', '87498', '2', '2024-03-27 07:06:51', 1, '2024-03-27 07:07:40', 1),
(18, '54654', '2mb', '2', '2024-03-27 07:07:54', 1, NULL, NULL),
(19, '10kbbbbbbbbbbbbb', '54665', '2', '2024-03-27 07:10:28', 1, NULL, NULL),
(20, 'New Max Size Title', 'New Max Size Value', '2', '2024-03-27 07:13:09', 1, NULL, NULL),
(21, 'title', 'value', '2', '2024-03-27 07:24:42', 1, NULL, NULL),
(22, '100MB', '100000000', '2', '2024-03-27 07:57:30', 1, NULL, NULL),
(23, '1212=1', 'title 100 km', '2', '2024-03-27 07:58:35', 1, NULL, NULL),
(24, '299292', '5 MB', '0', '2024-03-27 08:00:26', 1, NULL, NULL),
(25, 'aa', 'aa', '2', '2024-03-27 09:15:43', 1, NULL, NULL),
(26, '13', 'test', '0', '2024-06-03 06:40:33', 1, NULL, NULL),
(27, '13', 'test', '0', '2024-06-03 06:40:45', 1, NULL, NULL),
(28, 'AS', '€A', '0', '2024-06-03 06:41:55', 1, NULL, NULL),
(29, 'A', 'A', '0', '2024-06-03 06:43:01', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobrole`
--

CREATE TABLE `tbl_jobrole` (
  `JobRol_Id` int(20) NOT NULL,
  `JobRol_Name` varchar(255) DEFAULT NULL,
  `JobRol_Remark` varchar(255) DEFAULT NULL,
  `JobRol_Status` int(20) NOT NULL DEFAULT 0,
  `JobRol_CreatedBy` int(20) DEFAULT NULL,
  `JobRol_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `JobRol_UpdatedBy` int(20) DEFAULT NULL,
  `JobRol_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobrole`
--

INSERT INTO `tbl_jobrole` (`JobRol_Id`, `JobRol_Name`, `JobRol_Remark`, `JobRol_Status`, `JobRol_CreatedBy`, `JobRol_CreatedDate`, `JobRol_UpdatedBy`, `JobRol_UpdatedDate`) VALUES
(3, 'PHP (Laravel)', 'Developer', 0, 1, '2024-06-05 11:33:22', 1, '2024-06-05 11:35:10'),
(6, '2', '2', 2, 1, '2024-06-14 11:26:22', NULL, '2024-06-14 11:26:22'),
(7, 'new jobs', NULL, 0, 1, '2024-06-19 12:05:33', NULL, '2024-06-19 12:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `Job_Id` int(20) NOT NULL,
  `Job_JobRol_Id` int(20) NOT NULL DEFAULT 0,
  `Job_Cit_Id` int(20) NOT NULL DEFAULT 0,
  `Job_ConInf_Id` int(20) NOT NULL DEFAULT 0,
  `Job_Name` varchar(255) DEFAULT NULL,
  `Job_Experience` varchar(255) DEFAULT NULL,
  `Job_Package` varchar(255) DEFAULT NULL,
  `Job_KeySkills` varchar(255) DEFAULT NULL,
  `Job_Desc` text DEFAULT NULL,
  `Job_ExpiryStatus` int(20) NOT NULL DEFAULT 0 COMMENT '0 / 1(Expiry Date)',
  `Job_ExpiryDate` datetime DEFAULT NULL,
  `Job_Status` int(20) NOT NULL DEFAULT 0,
  `Job_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `Job_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Job_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `Job_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`Job_Id`, `Job_JobRol_Id`, `Job_Cit_Id`, `Job_ConInf_Id`, `Job_Name`, `Job_Experience`, `Job_Package`, `Job_KeySkills`, `Job_Desc`, `Job_ExpiryStatus`, `Job_ExpiryDate`, `Job_Status`, `Job_CreatedBy`, `Job_CreatedDate`, `Job_UpdatedBy`, `Job_UpdatedDate`) VALUES
(2, 3, 4, 3, 'Core Php Developer (Full Time)', '3 - 7 Years', '3 Lac To 5.50 Lac P.A.', 'Good Communication Core PHP HTML CSS Javascript AJAX JQuery PHP web developer web services walk in', 'Proven Software Development Experience in Php\r\nexpert in Php, Html, Css, Javascript, Ajax, Jquery\r\nexperience of Object-oriented Php Programming\r\nproficient in Web Services\r\nstrong Debugging Skills and the Ability to Easily and Quickly Read and Modify Existing Co\r\nenthusiastic and Show Interest in all Technology Things\r\nKnowledge of Laravel is Must\r\n\r\nInterested candidates can contact on the below mention contact details\r\nShruti', 1, '2024-06-30 00:00:00', 0, 1, '2024-06-05 16:46:29', 1, '2024-06-10 11:16:31'),
(10, 3, 1, 3, 'Test', '3 - 7 Years', '3 Lac To 5.50 Lac P.A.', 'php', 'Description', 1, '2024-06-27 00:00:00', 0, 1, '2024-06-10 15:34:24', 1, '2024-06-10 15:51:40'),
(11, 7, 1, 3, 'aa', 'a', 'a', 'a', 'a', 1, '2024-06-21 00:00:00', 0, 1, '2024-06-19 12:06:09', 0, '2024-06-19 12:06:09'),
(12, 7, 3, 3, 'a', '1', 'a', 'a', NULL, 0, NULL, 0, 1, '2024-06-19 12:19:16', 0, '2024-06-19 12:19:16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Log_Id`, `Log_Reg_Id`, `Log_Emp_Id`, `Log_Username`, `Log_Password`, `Log_Status`, `Log_CreatedBy`, `Log_CreatedDate`, `Log_UpdatedBy`, `Log_UpdatedDate`, `Log_DeletedDate`, `Log_DeletedBy`) VALUES
(1, 1, 1, 'rahulsoni@admin.com', '$2y$10$XcDvPc.VpXBiTNbX.15Pn.BucEP0wGpEr/NKrBssbNPz1e6FIpS.2', 1, NULL, NULL, 1, '2024-06-03 16:52:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `Men_Id` int(11) NOT NULL,
  `Men_InnerBanner` varchar(255) DEFAULT NULL,
  `Men_Name` varchar(255) DEFAULT NULL,
  `Men_Order` int(11) DEFAULT NULL,
  `Men_SubMenuExists` varchar(255) DEFAULT NULL,
  `Men_URL` varchar(255) DEFAULT NULL,
  `Men_Desc` text DEFAULT NULL,
  `Men_Status` int(11) DEFAULT 0,
  `Men_CreatedBy` int(11) DEFAULT NULL,
  `Men_CreatedDate` datetime DEFAULT current_timestamp(),
  `Men_UpdatedBy` int(11) DEFAULT NULL,
  `Men_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`Men_Id`, `Men_InnerBanner`, `Men_Name`, `Men_Order`, `Men_SubMenuExists`, `Men_URL`, `Men_Desc`, `Men_Status`, `Men_CreatedBy`, `Men_CreatedDate`, `Men_UpdatedBy`, `Men_UpdatedDate`) VALUES
(1, 'Clients_images/1710740685_65f7d4cd869f1.webp', 'Home', 1, 'on', '/', '<h3><img alt=\"\" src=\"http://127.0.0.1:8000/images/home2_1711779044.png\" style=\"float:left; height:449px; margin-right:10px; width:500px\" /></h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>your trusted IT solutions partner for unlocking digital success!</strong></h3>\r\n\r\n<p>EduManag stands out as a premier IT solutions provider, specializing in dynamic websites and mobile applications. With expertise in various frameworks and cutting-edge technologies, we ensure seamless integration and exceptional user experiences. Our team of skilled professionals is well-versed in the latest industry trends, allowing us to develop scalable, secure, and innovative solutions tailored to meet the unique needs of our clients.</p>\r\n\r\n<p>What sets EduManag apart is our commitment to excellence and customer satisfaction. We work closely with our clients throughout the development process, ensuring clear communication, timely delivery, and superior quality outcomes. Our goal is to empower businesses and organizations with digital solutions that drive growth, efficiency, and success.</p>\r\n\r\n<p>At EduManag, we don&#39;t just deliver IT solutions; we create transformative experiences that unlock the full potential of technology for your business. Choose EduManag as your trusted partner in navigating the digital landscape and achieving your goals with confidence.</p>', 0, 1, '2024-03-15 15:40:11', 1, '2024-04-01 12:49:53'),
(2, 'Menu_images/1711785821_6607c75ddb415.jpg', 'About', 2, 'on', '/about', '<h3><img alt=\"\" src=\"http://127.0.0.1:8000/images/about1_1711779867.png\" style=\"float:left; height:500px; margin-right:10px; width:600px\" /><strong>Your Gateway to Innovative ERP and Technology Solutions</strong></h3>\r\n\r\n<p>Welcome to EduManag, your go-to destination for cutting-edge IT solutions specializing in Enterprise Resource Planning (ERP) and a diverse range of technologies. With a strong focus on delivering exceptional services, we offer customized packages designed to meet the unique requirements of each client.</p>\r\n\r\n<p>At EduManag, we understand the importance of technology in today&#39;s digital landscape. That&#39;s why we provide comprehensive solutions that encompass ERP systems, software development, mobile applications, web development, and more. Our expertise in various technologies allows us to create seamless integrations and deliver exceptional user experiences.</p>\r\n\r\n<p>One of our key strengths lies in our ability to develop portals that streamline processes and enhance productivity. Whether you need a customer portal, employee portal, or vendor portal, we have the skills and experience to bring your vision to life.</p>\r\n\r\n<p>Our success is reflected in the numerous projects we have completed with utmost satisfaction. We take pride in our track record of delivering high-quality outcomes, on-time delivery, and transparent communication throughout the development process.</p>\r\n\r\n<p>Choosing EduManag means partnering with a team dedicated to your success. We work collaboratively with our clients, understanding their business goals and delivering solutions that drive growth, efficiency, and success. Experience the difference with EduManag &ndash; your trusted IT solutions provider.</p>', 0, 1, '2024-03-15 15:41:52', 1, '2024-04-01 12:07:07'),
(4, 'Menu_images/1711785985_6607c801a3154.jpg', 'Services', 3, NULL, '/service', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eius to mod tempor incididunt ut labore et dolore magna aliqua. Ut enims ad minim veniam. Aenean massa. Cum sociis natoque penatibus et magnis dis partu rient to montes.Aene an massa.</p>', 0, 1, '2024-03-19 15:32:16', 1, '2024-03-30 13:36:25'),
(5, 'Menu_images/1710843402_65f9660ab6557.jpg', 'Contact Us', 5, NULL, '/contact', NULL, 0, 1, '2024-03-19 15:46:42', 1, '2024-03-23 16:09:36'),
(6, 'Menu_images/1711019422_65fc159ea04a9.jpg', 'Products', 4, NULL, '/product', '<p>s</p>', 0, 1, '2024-03-21 16:40:22', 1, '2024-03-23 16:09:21'),
(7, NULL, 'test', 6, NULL, NULL, NULL, 2, 1, '2024-04-17 13:51:41', NULL, '2024-04-17 13:51:41'),
(8, NULL, 'test', 6, NULL, NULL, NULL, 2, 1, '2024-04-17 16:29:45', NULL, '2024-04-17 16:29:45'),
(9, 'Menu_images/1718002382_6666a2cea5094.jpg', 'Career', 7, NULL, 'career', '<p>d</p>', 0, 1, '2024-04-17 16:41:33', 1, '2024-06-10 12:23:02'),
(10, NULL, 'new menu', 8, NULL, NULL, '<p>sdff</p>', 1, 1, '2024-04-17 17:35:19', NULL, '2024-04-17 17:35:19'),
(11, NULL, '2', 2, 'on', '2', '<p>2</p>', 2, 1, '2024-06-03 15:32:14', 1, '2024-06-03 15:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metatags`
--

CREATE TABLE `tbl_metatags` (
  `MetTyp_Id` int(20) NOT NULL,
  `MetTyp_Type` int(20) NOT NULL DEFAULT 0 COMMENT '0 =Default | 1 = ProCat | 2: Product',
  `MetTyp_ProCat_Id` int(20) DEFAULT 0,
  `MetTyp_Pro_Id` int(20) DEFAULT 0,
  `MetTyp_MetaType` int(20) NOT NULL DEFAULT 0 COMMENT '0 = Name | 1 = Property',
  `MetTyp_Property` text DEFAULT NULL,
  `MetTyp_Content` text DEFAULT NULL,
  `MetTyp_Status` int(20) NOT NULL DEFAULT 0,
  `MetTyp_CreatedBy` int(20) NOT NULL,
  `MetTyp_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `MetTyp_UpdatedBy` int(11) DEFAULT NULL,
  `MetTyp_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_metatags`
--

INSERT INTO `tbl_metatags` (`MetTyp_Id`, `MetTyp_Type`, `MetTyp_ProCat_Id`, `MetTyp_Pro_Id`, `MetTyp_MetaType`, `MetTyp_Property`, `MetTyp_Content`, `MetTyp_Status`, `MetTyp_CreatedBy`, `MetTyp_CreatedDate`, `MetTyp_UpdatedBy`, `MetTyp_UpdatedDate`) VALUES
(1, 2, 12, 6, 1, '1', '1', 2, 1, '2024-04-30 12:11:38', 1, '2024-06-03 12:37:12'),
(2, 2, 12, 6, 0, '1', '1', 2, 1, '2024-06-03 12:31:11', NULL, '2024-06-03 12:31:11'),
(3, 2, 12, 1, 0, '1', '1', 2, 1, '2024-06-03 12:31:26', NULL, '2024-06-03 12:31:26'),
(4, 2, 12, 6, 0, '1', '1', 2, 1, '2024-06-03 12:33:42', NULL, '2024-06-03 12:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `Mod_Id` int(20) NOT NULL,
  `Mod_Pro_Id` int(20) NOT NULL DEFAULT 0,
  `Mod_Name` varchar(255) DEFAULT NULL,
  `Mod_Image` varchar(255) DEFAULT NULL,
  `Mod_FullDesc` text DEFAULT NULL,
  `Mod_Status` int(11) NOT NULL DEFAULT 0,
  `Mod_CreatedBy` int(11) NOT NULL DEFAULT 0,
  `Mod_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Mod_UpdatedBy` int(11) NOT NULL DEFAULT 0,
  `Mod_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`Mod_Id`, `Mod_Pro_Id`, `Mod_Name`, `Mod_Image`, `Mod_FullDesc`, `Mod_Status`, `Mod_CreatedBy`, `Mod_CreatedDate`, `Mod_UpdatedBy`, `Mod_UpdatedDate`) VALUES
(1, 1, 'Homework Management', 'fas fa-yin-yang', '<p>&lt;p&gt;<strong>Homework Management</strong>&nbsp;is a critical module within a School Management System (SMS) or&nbsp;<strong>School ERP</strong>&nbsp;that streamlines the process of assigning, submitting, and tracking homework assignments.&lt;/p&gt;</p>', 1, 1, '2024-04-12 16:02:15', 1, '2024-04-27 11:10:44'),
(2, 2, 'Alert Management', 'fas fa-wrench', '<p><strong>Alert Management</strong>&nbsp;is a crucial module within a School Management System (SMS)&nbsp;</p>', 1, 1, '2024-04-12 16:02:15', 1, '2024-04-27 11:15:12'),
(3, 1, 'Fast Support 24/7', 'fas fa-wrench', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2024-04-12 16:02:15', 1, '2024-04-27 11:15:29'),
(4, 2, 'Fast Support 24/7', 'fas fa-wrench', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2024-04-12 16:02:15', 1, '2024-04-27 11:15:36'),
(13, 1, '1', '1', '<p>1</p>', 1, 1, '2024-06-03 13:09:08', 0, '2024-06-03 13:09:08'),
(14, 6, NULL, '1', NULL, 1, 1, '2024-06-03 13:11:40', 0, '2024-06-03 13:11:40'),
(16, 1, 'new', 'icon', '<p>Description</p>', 0, 1, '2024-06-19 12:53:48', 0, '2024-06-19 12:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `New_Id` int(11) NOT NULL,
  `New_EmailId` varchar(255) DEFAULT NULL,
  `New_Status` int(11) DEFAULT 0,
  `New_CreatedBy` int(11) DEFAULT NULL,
  `New_CreatedDate` datetime DEFAULT current_timestamp(),
  `New_UpdatedBy` int(11) DEFAULT NULL,
  `New_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`New_Id`, `New_EmailId`, `New_Status`, `New_CreatedBy`, `New_CreatedDate`, `New_UpdatedBy`, `New_UpdatedDate`) VALUES
(3, 'rahuls@gmail.com', 0, NULL, '2024-06-01 17:51:27', NULL, '2024-06-01 17:51:27'),
(4, 'ra@gmail.com', 0, NULL, '2024-06-15 12:51:21', NULL, '2024-06-15 12:51:21'),
(5, 'a@gmail', 0, NULL, '2024-06-15 13:40:07', NULL, '2024-06-15 13:40:07'),
(6, 'a@gmail.com', 0, NULL, '2024-06-15 13:41:46', NULL, '2024-06-15 13:41:46'),
(7, 'aa@gmail', 0, NULL, '2024-06-15 13:43:14', NULL, '2024-06-15 13:43:14'),
(8, 'aaa@agmail', 0, NULL, '2024-06-15 13:44:05', NULL, '2024-06-15 13:44:05'),
(9, 'asasa@gmail', 0, NULL, '2024-06-15 13:44:51', NULL, '2024-06-15 13:44:51'),
(10, 'aad@gmail', 0, NULL, '2024-06-15 13:45:05', NULL, '2024-06-15 13:45:05'),
(11, '32@gmail', 0, NULL, '2024-06-15 13:45:44', NULL, '2024-06-15 13:45:44'),
(12, '32ad@gmail', 0, NULL, '2024-06-15 13:45:48', NULL, '2024-06-15 13:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personalinformation`
--

CREATE TABLE `tbl_personalinformation` (
  `PerInf_Id` int(11) NOT NULL,
  `PerInf_Name` varchar(255) DEFAULT NULL,
  `PerInf_Emails` varchar(255) DEFAULT NULL,
  `PerInf_Contacts` varchar(255) DEFAULT NULL,
  `PerInf_Address` text DEFAULT NULL,
  `PerInf_Map` text DEFAULT NULL,
  `PerInf_QR` text DEFAULT NULL,
  `PerInf_Playstore` text DEFAULT NULL,
  `PerInf_AppStore` text DEFAULT NULL,
  `PerInf_About` text DEFAULT NULL,
  `PerInf_Timings` varchar(255) DEFAULT NULL,
  `PerInf_FavIcon` varchar(255) DEFAULT NULL,
  `PerInf_HeaderLogo` varchar(255) DEFAULT NULL,
  `PerInf_FooterLogo` varchar(255) DEFAULT NULL,
  `PerInf_Status` int(11) DEFAULT 0,
  `PerInf_CreatedBy` int(11) DEFAULT NULL,
  `PerInf_CreatedDate` datetime DEFAULT current_timestamp(),
  `PerInf_UpdatedBy` int(11) DEFAULT NULL,
  `PerInf_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_personalinformation`
--

INSERT INTO `tbl_personalinformation` (`PerInf_Id`, `PerInf_Name`, `PerInf_Emails`, `PerInf_Contacts`, `PerInf_Address`, `PerInf_Map`, `PerInf_QR`, `PerInf_Playstore`, `PerInf_AppStore`, `PerInf_About`, `PerInf_Timings`, `PerInf_FavIcon`, `PerInf_HeaderLogo`, `PerInf_FooterLogo`, `PerInf_Status`, `PerInf_CreatedBy`, `PerInf_CreatedDate`, `PerInf_UpdatedBy`, `PerInf_UpdatedDate`) VALUES
(1, 'EduManag IT Solution Private Limited', 'rahuledumanag@gmail.com', '1234567890,2234567890', '14, First Floor Cine Mall, Vaishali Nagar, Ajmer (Rajasthan)', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.22241227081!2d74.62883122265946!3d26.480782788025493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be7af02f0af91%3A0xee6b7e71510742e6!2sCine%20Mall!5e0!3m2!1sen!2sin!4v1710850593112!5m2!1sen!2sin', 'Qr', 'play store', 'app Store', 'Company refers to a business that specializes in information technology (IT) services, software development, and technology solutions for various industries and clients.', '10:00 to 06:00', 'Personalinfo_images/1714045272_662a4158e3cf2.jpg', 'Personalinfo_images/1711715224_6606b39804520.png', 'Personalinfo_images/1711715224_6606b398048f1.png', 0, 1, '2024-03-16 13:33:09', 1, '2024-04-25 17:11:12'),
(2, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', NULL, NULL, NULL, 2, 1, '2024-06-03 15:08:16', 1, '2024-06-03 15:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `Pla_Id` int(11) NOT NULL,
  `Pla_PlaCat_Id` int(11) DEFAULT NULL,
  `Pla_Name` varchar(255) DEFAULT NULL,
  `Pla_Order` int(11) DEFAULT NULL,
  `Pla_Icon` varchar(255) DEFAULT NULL,
  `Pla_Status` int(11) DEFAULT 0,
  `Pla_CreatedBy` int(11) DEFAULT NULL,
  `Pla_CreatedDate` datetime DEFAULT current_timestamp(),
  `Pla_UpdatedBy` int(11) DEFAULT NULL,
  `Pla_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`Pla_Id`, `Pla_PlaCat_Id`, `Pla_Name`, `Pla_Order`, `Pla_Icon`, `Pla_Status`, `Pla_CreatedBy`, `Pla_CreatedDate`, `Pla_UpdatedBy`, `Pla_UpdatedDate`) VALUES
(1, 1, 'Internet with a 100Mbps', 1, NULL, 0, 1, '2024-04-27 10:37:05', NULL, '2024-04-27 10:37:05'),
(2, 1, 'WiFi router & prevention', 2, NULL, 0, 1, '2024-04-27 10:37:15', NULL, '2024-04-27 10:37:15'),
(3, 2, 'Connect multiple users', 3, NULL, 0, 1, '2024-04-27 10:37:28', NULL, '2024-04-27 10:37:28'),
(4, 2, 'Unlimited devices', 4, NULL, 0, 1, '2024-04-27 10:37:35', NULL, '2024-04-27 10:37:35'),
(5, 2, 'Internet with a 100Mbps', 5, NULL, 0, 1, '2024-04-27 10:50:01', NULL, '2024-04-27 10:50:01'),
(6, 3, 'gc', 6, NULL, 2, 1, '2024-04-27 11:38:02', NULL, '2024-04-27 11:38:02'),
(7, 1, 'Internet with a 100Mbps', 6, NULL, 0, 1, '2024-04-27 11:40:20', NULL, '2024-04-27 11:40:20'),
(8, 1, 'Internet with a 100Mbps', 7, NULL, 0, 1, '2024-04-27 11:40:46', NULL, '2024-04-27 11:40:46'),
(9, 2, 'Internet with a 100Mbps', 8, NULL, 0, 1, '2024-04-27 11:40:51', NULL, '2024-04-27 11:40:51'),
(10, 1, '1', 91, NULL, 2, 1, '2024-06-03 14:24:30', NULL, '2024-06-03 14:24:30'),
(11, 1, 'Internet with a 100Mbps', 1, NULL, 0, 1, '2024-04-27 10:37:05', NULL, '2024-04-27 10:37:05'),
(12, 1, 'WiFi router & prevention', 2, NULL, 0, 1, '2024-04-27 10:37:15', NULL, '2024-04-27 10:37:15'),
(13, 2, 'Connect multiple users', 3, NULL, 0, 1, '2024-04-27 10:37:28', NULL, '2024-04-27 10:37:28'),
(14, 2, 'Unlimited devices', 4, NULL, 0, 1, '2024-04-27 10:37:35', NULL, '2024-04-27 10:37:35'),
(15, 2, 'Internet with a 100Mbps', 5, NULL, 0, 1, '2024-04-27 10:50:01', NULL, '2024-04-27 10:50:01'),
(16, 3, 'gc', 6, NULL, 2, 1, '2024-04-27 11:38:02', NULL, '2024-04-27 11:38:02'),
(17, 1, 'Internet with a 100Mbps', 6, NULL, 0, 1, '2024-04-27 11:40:20', NULL, '2024-04-27 11:40:20'),
(18, 1, 'Internet with a 100Mbps', 7, NULL, 0, 1, '2024-04-27 11:40:46', NULL, '2024-04-27 11:40:46'),
(19, 2, 'Internet with a 100Mbps', 8, NULL, 0, 1, '2024-04-27 11:40:51', NULL, '2024-04-27 11:40:51'),
(20, 1, '1', 91, NULL, 2, 1, '2024-06-03 14:24:30', NULL, '2024-06-03 14:24:30'),
(21, 1, 'Internet with a 100Mbps', 1, NULL, 0, 1, '2024-04-27 10:37:05', NULL, '2024-04-27 10:37:05'),
(22, 2, 'Internet with a 100Mbps', 5, NULL, 0, 1, '2024-04-27 10:50:01', NULL, '2024-04-27 10:50:01'),
(23, 3, 'gc', 6, NULL, 2, 1, '2024-04-27 11:38:02', NULL, '2024-04-27 11:38:02'),
(24, 1, 'Internet with a 100Mbps', 6, NULL, 0, 1, '2024-04-27 11:40:20', NULL, '2024-04-27 11:40:20'),
(25, 1, 'Internet with a 100Mbps', 7, NULL, 0, 1, '2024-04-27 11:40:46', NULL, '2024-04-27 11:40:46'),
(26, 2, 'Internet with a 100Mbps', 8, NULL, 0, 1, '2024-04-27 11:40:51', NULL, '2024-04-27 11:40:51'),
(27, 2, 'Unlimited devices', 4, NULL, 0, 1, '2024-04-27 10:37:35', NULL, '2024-04-27 10:37:35'),
(28, 2, 'Internet with a 100Mbps', 5, NULL, 0, 1, '2024-04-27 10:50:01', NULL, '2024-04-27 10:50:01'),
(29, 3, 'gc', 6, NULL, 2, 1, '2024-04-27 11:38:02', NULL, '2024-04-27 11:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plancategory`
--

CREATE TABLE `tbl_plancategory` (
  `PlaCat_Id` int(11) NOT NULL,
  `PlaCat_ProCat_Id` int(11) DEFAULT NULL,
  `PlaCat_Name` varchar(255) DEFAULT NULL,
  `PlaCat_Order` int(11) DEFAULT NULL,
  `PlaCat_Amount` decimal(10,2) DEFAULT NULL,
  `PlaCat_ShortDesc` text DEFAULT NULL,
  `PlaCat_FullDesc` text DEFAULT NULL,
  `PlaCat_Image` varchar(255) DEFAULT NULL,
  `PlaCat_InnerBanner` varchar(255) DEFAULT NULL,
  `PlaCat_Status` int(11) DEFAULT 0,
  `PlaCat_CreatedBy` int(11) DEFAULT NULL,
  `PlaCat_CreatedDate` datetime DEFAULT current_timestamp(),
  `PlaCat_UpdatedBy` int(11) DEFAULT NULL,
  `PlaCat_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_plancategory`
--

INSERT INTO `tbl_plancategory` (`PlaCat_Id`, `PlaCat_ProCat_Id`, `PlaCat_Name`, `PlaCat_Order`, `PlaCat_Amount`, `PlaCat_ShortDesc`, `PlaCat_FullDesc`, `PlaCat_Image`, `PlaCat_InnerBanner`, `PlaCat_Status`, `PlaCat_CreatedBy`, `PlaCat_CreatedDate`, `PlaCat_UpdatedBy`, `PlaCat_UpdatedDate`) VALUES
(1, 21, 'q', 1, 1.00, '1', NULL, NULL, NULL, 0, 1, '2024-06-19 13:48:58', NULL, '2024-06-19 13:48:58'),
(2, 22, '11', 2, 1.00, NULL, NULL, NULL, NULL, 0, 1, '2024-06-19 13:49:05', NULL, '2024-06-19 13:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `Pro_Id` int(11) NOT NULL,
  `Pro_Cli_Id` int(11) DEFAULT NULL,
  `Pro_ProCat_Id` int(11) DEFAULT NULL,
  `Pro_Name` varchar(255) DEFAULT NULL,
  `Pro_Link` text DEFAULT NULL,
  `Pro_ShortDesc` text DEFAULT NULL,
  `Pro_FullDesc` text DEFAULT NULL,
  `Pro_Order` int(11) DEFAULT NULL,
  `Pro_Image` varchar(255) DEFAULT NULL,
  `Pro_InnerBanner` varchar(255) DEFAULT NULL,
  `Pro_Status` int(11) DEFAULT 0,
  `Pro_CreatedBy` int(11) DEFAULT NULL,
  `Pro_CreatedDate` datetime DEFAULT current_timestamp(),
  `Pro_UpdatedBy` int(11) DEFAULT NULL,
  `Pro_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`Pro_Id`, `Pro_Cli_Id`, `Pro_ProCat_Id`, `Pro_Name`, `Pro_Link`, `Pro_ShortDesc`, `Pro_FullDesc`, `Pro_Order`, `Pro_Image`, `Pro_InnerBanner`, `Pro_Status`, `Pro_CreatedBy`, `Pro_CreatedDate`, `Pro_UpdatedBy`, `Pro_UpdatedDate`) VALUES
(1, NULL, 21, 'a', NULL, 'a', NULL, 1, NULL, NULL, 0, 1, '2024-06-19 12:41:57', NULL, '2024-06-19 12:41:57'),
(2, NULL, 22, 'b', NULL, NULL, NULL, 2, NULL, NULL, 0, 1, '2024-06-19 12:42:03', NULL, '2024-06-19 12:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE `tbl_productcategory` (
  `ProCat_Id` int(11) NOT NULL,
  `ProCat_Name` varchar(255) DEFAULT NULL,
  `ProCat_ShortDesc` text DEFAULT NULL,
  `ProCat_FullDesc` text DEFAULT NULL,
  `ProCat_Image` varchar(255) DEFAULT NULL,
  `ProCat_InnerBanner` varchar(255) DEFAULT NULL,
  `ProCat_Order` int(11) DEFAULT NULL,
  `ProCat_Status` int(11) DEFAULT 0,
  `ProCat_CreatedBy` int(11) DEFAULT NULL,
  `ProCat_CreatedDate` datetime DEFAULT current_timestamp(),
  `ProCat_UpdatedBy` int(11) DEFAULT NULL,
  `ProCat_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`ProCat_Id`, `ProCat_Name`, `ProCat_ShortDesc`, `ProCat_FullDesc`, `ProCat_Image`, `ProCat_InnerBanner`, `ProCat_Order`, `ProCat_Status`, `ProCat_CreatedBy`, `ProCat_CreatedDate`, `ProCat_UpdatedBy`, `ProCat_UpdatedDate`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-18 12:36:05', NULL, '2024-03-18 12:36:05'),
(2, 'Product Category1', 'Product Category2', '<p>Product Category3</p>', NULL, NULL, 1, 2, 1, '2024-03-18 12:39:48', NULL, '2024-03-18 12:39:48'),
(3, '1', '2', '<p>3</p>', NULL, NULL, 1, 2, 1, '2024-03-18 12:40:51', NULL, '2024-03-18 12:40:51'),
(4, 'aaa', 'aa', '<p>aa</p>', 'ProductCategory_images/1710745895_65f7e927d26de.webp', 'ProductCategory_images/1710745895_65f7e927d2b0c.jpg', 2, 2, 1, '2024-03-18 12:41:35', NULL, '2024-03-18 12:41:35'),
(5, 'CCTV', 'CCTV (closed-circuit television)', '<p>CCTV (closed-circuit television) is&nbsp;<strong>a TV system in which signals are not publicly distributed but are monitored, primarily for surveillance and security purposes</strong>. CCTV relies on strategic placement of cameras and private observation of the camera&#39;s input on monitors.CCTV (closed-circuit television) is&nbsp;<strong>a TV system in which signals are not publicly distributed but are monitored, primarily for surveillance and security purposes</strong>. CCTV relies on strategic placement of cameras and private observation of the camera&#39;s input on monitors.CCTV (closed-circuit television) is&nbsp;<strong>a TV system in which signals are not publicly distributed but are monitored, primarily for surveillance and security purposes</strong>. CCTV relies on strategic placement of cameras and private observation of the camera&#39;s input on monitors.CCTV (closed-circuit television) is&nbsp;<strong>a TV system in which signals are not publicly distributed but are monitored, primarily for surveillance and security purposes</strong>. CCTV relies on strategic placement of cameras and private observation of the camera&#39;s input on monitors.</p>', 'Clients_images/1710746077_65f7e9dd7de49.jpg', 'Clients_images/1710746077_65f7e9dd7e1ff.jpg', 1, 2, 1, '2024-03-18 12:42:09', 1, '2024-03-18 12:44:37'),
(6, 'Id Card', 'An identity card is a card with a person\'s name, photograph, date of birth, and other information on it', '<p>An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.An identity card is&nbsp;<strong>a card with a person&#39;s name, photograph, date of birth, and other information on it</strong>. In some countries, people are required to carry identity cards in order to prove who they are.</p>', 'ProductCategory_images/1710751704_65f7ffd83ad53.jpg', 'ProductCategory_images/1710751704_65f7ffd83b1d7.webp', 2, 2, 1, '2024-03-18 14:18:24', NULL, '2024-03-18 14:18:24'),
(7, 'Pro Category 2', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;</p>', 'ProductCategory_images/1714194080_662c86a06cd81.jpg', 'ProductCategory_images/1711021225_65fc1ca9d026d.jpg', 3, 2, 1, '2024-03-21 10:58:14', 1, '2024-04-27 10:31:52'),
(8, 'Ultra HD 2GB+8GB TV Box', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'ProductCategory_images/1710999678_65fbc87eaa8a0.png', 'ProductCategory_images/1711021237_65fc1cb578430.jpg', 4, 2, 1, '2024-03-21 11:11:18', 1, '2024-03-22 11:09:35'),
(9, 'Bluetooth Speaker', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p>Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40</p>', 'ProductCategory_images/1711021536_65fc1de067dda.jpg', 'ProductCategory_images/1711021245_65fc1cbd8c174.jpg', 5, 2, 1, '2024-03-21 11:11:38', 1, '2024-03-22 11:09:42'),
(10, 'Nest Cam Indoor', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p>Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40</p>', 'ProductCategory_images/1710999723_65fbc8abc7821.png', 'ProductCategory_images/1711021253_65fc1cc5c8cfb.jpg', 6, 2, 1, '2024-03-21 11:12:03', 1, '2024-03-22 11:10:03'),
(11, 'WiFe Streaming Router', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p>Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40</p>', 'ProductCategory_images/1710999749_65fbc8c596065.png', 'ProductCategory_images/1711021263_65fc1ccf40886.png', 7, 2, 1, '2024-03-21 11:12:29', 1, '2024-03-22 11:09:29'),
(12, 'Pro Category 1', NULL, NULL, 'ProductCategory_images/1714194071_662c8697927bd.png', 'ProductCategory_images/1714043866_662a3bdaae19f.jpg', 1, 2, 1, '2024-03-22 11:02:43', 1, '2024-04-29 16:57:39'),
(13, 'New', 'Short Description', '<p>Short Description</p>', 'ProductCategory_images/1714213205_662cd1559f3db.png', NULL, 8, 2, 1, '2024-04-27 15:50:05', NULL, '2024-04-27 15:50:05'),
(14, 'sdas', 'dasd', '<p>asd</p>', NULL, NULL, 4, 2, 1, '2024-05-01 15:12:04', NULL, '2024-05-01 15:12:04'),
(15, 'Pro Category 3', NULL, NULL, 'ProductCategory_images/1714194071_662c8697927bd.png', 'ProductCategory_images/1714043866_662a3bdaae19f.jpg', 1, 2, 1, '2024-03-22 11:02:43', 1, '2024-04-29 16:57:39'),
(16, 'Pro Category 4', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations Ultra HD 2GB+8GB TV Box $33.40', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;</p>', 'ProductCategory_images/1714194080_662c86a06cd81.jpg', 'ProductCategory_images/1711021225_65fc1ca9d026d.jpg', 3, 2, 1, '2024-03-21 10:58:14', 1, '2024-04-27 10:31:52'),
(17, 'Pro Category 5', NULL, NULL, 'ProductCategory_images/1714194071_662c8697927bd.png', 'ProductCategory_images/1714043866_662a3bdaae19f.jpg', 1, 2, 1, '2024-03-22 11:02:43', 1, '2024-04-29 16:57:39'),
(18, 'q', '1', '<p>1</p>', NULL, NULL, 1, 2, 1, '2024-06-03 12:47:59', NULL, '2024-06-03 12:47:59'),
(19, '2', '2', '<p>2</p>', NULL, NULL, 2, 2, 1, '2024-06-03 12:49:05', 1, '2024-06-03 12:49:24'),
(20, '1', '1', '<p>1</p>', NULL, NULL, 1, 2, 1, '2024-06-03 13:02:15', NULL, '2024-06-03 13:02:15'),
(21, 'Ecommerce', NULL, NULL, NULL, NULL, 1, 0, 1, '2024-06-19 10:42:44', NULL, '2024-06-19 10:42:44'),
(22, 'Static', NULL, NULL, NULL, NULL, 2, 0, 1, '2024-06-19 10:43:18', NULL, '2024-06-19 10:43:18'),
(23, 'Testing', NULL, NULL, NULL, NULL, 3, 0, 1, '2024-06-19 10:43:25', NULL, '2024-06-19 10:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `Ser_Id` int(11) NOT NULL,
  `Ser_Name` varchar(255) DEFAULT NULL,
  `Ser_Order` int(11) DEFAULT NULL,
  `Ser_ShortDesc` text DEFAULT NULL,
  `Ser_FullDesc` text DEFAULT NULL,
  `Ser_Image` varchar(255) DEFAULT NULL,
  `Ser_InnerBanner` varchar(255) DEFAULT NULL,
  `Ser_Status` int(11) DEFAULT 0,
  `Ser_CreatedBy` int(11) DEFAULT NULL,
  `Ser_CreatedDate` datetime DEFAULT current_timestamp(),
  `Ser_UpdatedBy` int(11) DEFAULT NULL,
  `Ser_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`Ser_Id`, `Ser_Name`, `Ser_Order`, `Ser_ShortDesc`, `Ser_FullDesc`, `Ser_Image`, `Ser_InnerBanner`, `Ser_Status`, `Ser_CreatedBy`, `Ser_CreatedDate`, `Ser_UpdatedBy`, `Ser_UpdatedDate`) VALUES
(1, 'ID Cards Service', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>11Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Clients_images/1710757025_65f814a12ba5a.webp', 'Clients_images/1710757025_65f814a12bf0f.jpg', 2, 1, '2024-03-18 15:26:38', 1, '2024-03-18 15:47:05'),
(2, 'Broadband', 1, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', '<p>Lorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modern</p>', 'Service_images/1710910469_65fa6c05b6dc7.png', 'Service_images/1710910469_65fa6c05b73eb.jpg', 2, 1, '2024-03-20 10:24:29', NULL, '2024-03-20 10:24:29'),
(3, 'TV & Streaming', 2, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910950_65fa6de665a70.png', 'Service_images/1710910950_65fa6de665fe9.jpg', 2, 1, '2024-03-20 10:25:17', 1, '2024-03-20 10:32:30'),
(4, 'Home Phone', 3, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910537_65fa6c4999092.png', NULL, 2, 1, '2024-03-20 10:25:37', NULL, '2024-03-20 10:25:37'),
(5, 'TV & Streaming', 4, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910556_65fa6c5cce0af.png', NULL, 2, 1, '2024-03-20 10:25:56', NULL, '2024-03-20 10:25:56'),
(6, 'ID Cards Service', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>11Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Clients_images/1710757025_65f814a12ba5a.webp', 'Clients_images/1710757025_65f814a12bf0f.jpg', 2, 1, '2024-03-18 15:26:38', 1, '2024-03-18 15:47:05'),
(7, 'Broadband', 1, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', '<p>Lorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modernLorem ipsum dolor sit amet them elit seding doeiumod Donec modern</p>', 'Service_images/1710910469_65fa6c05b6dc7.png', 'Service_images/1710910469_65fa6c05b73eb.jpg', 2, 1, '2024-03-20 10:24:29', NULL, '2024-03-20 10:24:29'),
(8, 'Home Phone', 3, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910537_65fa6c4999092.png', NULL, 2, 1, '2024-03-20 10:25:37', NULL, '2024-03-20 10:25:37'),
(9, 'TV & Streaming', 4, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910556_65fa6c5cce0af.png', NULL, 2, 1, '2024-03-20 10:25:56', NULL, '2024-03-20 10:25:56'),
(10, 'TV & Streaming', 2, 'Lorem ipsum dolor sit amet them elit seding doeiumod Donec modern', NULL, 'Service_images/1710910950_65fa6de665a70.png', 'Service_images/1710910950_65fa6de665fe9.jpg', 2, 1, '2024-03-20 10:25:17', 1, '2024-03-20 10:32:30'),
(12, 'Web Development Management', 1, 'IFW Web Studio is a Udaipur based company providing website development services across the globe. IFW Web Studio has been providing web design services for over a decade and has consistently delivered high quality websites and web based applications and portals. IFW Web Studio has maintained high standards and has created landmark websites in terms of design and development. IFW Web Studio is an customer-oriented website design and development company in Udaipur. Our team excels at ensuring 100% client satisfaction, helping businesses strengthen their online presence. Committed to deliver quality, you can count on our expert team for creative and professional web design and development services in Udaipur, Rajasthan, India.\r\n\r\nOur vast portfolio of web designs in India & abroad and commitment to productive website development make us an industry-leading web development and web designing company in India. We keep ourselves updated with the latest technologies and techniques to design websites that ensure outstanding success of brand in online world.\r\n\r\nUnlike any other web development company in India, IFW Web Studio offers a rich forte of web development services in Udaipur. Website Development services offered by IFW Web Studio includes:', '<p>IFW Web Studio is a Udaipur based company providing website development services across the globe. IFW Web Studio has been providing web design services for over a decade and has consistently delivered high quality websites and web based applications and portals. IFW Web Studio has maintained high standards and has created landmark websites in terms of design and development. IFW Web Studio is an customer-oriented website design and development company in Udaipur. Our team excels at ensuring 100% client satisfaction, helping businesses strengthen their online presence. Committed to deliver quality, you can count on our expert team for creative and professional web design and development services in Udaipur, Rajasthan, India.</p>\r\n\r\n<p>Our vast portfolio of web designs in India &amp; abroad and commitment to productive website development make us an industry-leading web development and web designing company in India. We keep ourselves updated with the latest technologies and techniques to design websites that ensure outstanding success of brand in online world.</p>\r\n\r\n<p>Unlike any other web development company in India, IFW Web Studio offers a rich forte of web development services in Udaipur. Website Development services offered by IFW Web Studio includes:</p>\r\n\r\n<p>&nbsp;</p>', 'Service_images/1711788942_6607d38e9494c.png', NULL, 0, 1, '2024-03-30 14:25:42', NULL, '2024-03-30 14:25:42'),
(14, '1', 1, NULL, NULL, NULL, NULL, 0, 1, '2024-06-03 16:01:17', NULL, '2024-06-03 16:01:17'),
(15, '3', 2, '233', '<p>033</p>', NULL, NULL, 2, 1, '2024-06-03 16:01:58', 1, '2024-06-03 16:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `Set_Id` int(20) NOT NULL,
  `Set_Img_Id` int(20) NOT NULL,
  `Set_Website` varchar(255) DEFAULT NULL,
  `Set_Status` int(20) NOT NULL DEFAULT 0,
  `Set_CreatedBy` int(20) NOT NULL,
  `Set_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Set_UpdatedBy` int(20) DEFAULT NULL,
  `Set_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`Set_Id`, `Set_Img_Id`, `Set_Website`, `Set_Status`, `Set_CreatedBy`, `Set_CreatedDate`, `Set_UpdatedBy`, `Set_UpdatedDate`) VALUES
(1, 6, '0', 0, 1, '2024-03-27 14:59:37', 1, '2024-03-30 12:58:30'),
(2, 2, '1', 2, 1, '2024-06-03 16:56:08', 1, '2024-06-03 16:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `Ski_Id` int(20) NOT NULL,
  `Ski_Name` varchar(255) DEFAULT NULL,
  `Ski_Remark` text DEFAULT NULL,
  `Ski_Status` int(20) NOT NULL DEFAULT 0,
  `Ski_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `Ski_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Ski_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `Ski_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`Ski_Id`, `Ski_Name`, `Ski_Remark`, `Ski_Status`, `Ski_CreatedBy`, `Ski_CreatedDate`, `Ski_UpdatedBy`, `Ski_UpdatedDate`) VALUES
(1, 'Java', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(2, 'Python', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(3, 'C#', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(4, 'C++', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(5, 'JavaScript', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(6, 'PHP', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(7, 'Ruby', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(8, 'Swift', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(9, 'Kotlin', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(10, 'Go', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(11, 'TypeScript', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(12, 'Rust', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(13, 'Perl', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(14, 'R', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(15, 'Scala', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(16, 'Haskell', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(17, 'Objective-C', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(18, 'MATLAB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(19, 'Ada', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(20, 'HTML', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(21, 'CSS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(22, 'React.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(23, 'Angular', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(24, 'Vue.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(25, 'Sass', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(26, 'Bootstrap', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(27, 'Tailwind CSS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(28, 'jQuery', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(29, 'Ember.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(30, 'Backbone.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(31, 'Preact', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(32, 'LitElement', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(33, 'Foundation', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(34, 'Materialize CSS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(35, 'Bulma', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(36, 'Semantic UI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(37, 'Node.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(38, 'Express.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(39, 'Django', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(40, 'Flask', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(41, 'Ruby on Rails', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(42, 'Laravel', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(43, 'Spring Boot', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(44, 'ASP.NET', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(45, 'NestJS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(46, 'Koa.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(47, 'ASP.NET Core', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(48, 'CakePHP', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(49, 'CodeIgniter', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(50, 'Symfony', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(51, 'Phalcon', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(52, 'Hapi.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(53, 'Sails.js', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(54, 'AdonisJS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(55, 'Micronaut', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(56, 'Grails', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(57, 'MySQL', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(58, 'PostgreSQL', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(59, 'SQLite', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(60, 'MongoDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(61, 'Oracle', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(62, 'Microsoft SQL Server', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(63, 'Redis', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(64, 'Cassandra', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(65, 'Firebase', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(66, 'Elasticsearch', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(67, 'MariaDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(68, 'CouchDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(69, 'Neo4j', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(70, 'RethinkDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(71, 'Amazon DynamoDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(72, 'Azure Cosmos DB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(73, 'CockroachDB', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(74, 'ClickHouse', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(75, 'Docker', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(76, 'Kubernetes', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(77, 'Jenkins', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(78, 'GitLab CI/CD', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(79, 'AWS (Amazon Web Services)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(80, 'Azure', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(81, 'Google Cloud Platform (GCP)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(82, 'Terraform', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(83, 'Ansible', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(84, 'Chef', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(85, 'Puppet', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(86, 'OpenShift', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(87, 'Heroku', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(88, 'Cloud Foundry', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(89, 'CircleCI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(90, 'Travis CI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(91, 'GitOps', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(92, 'Prometheus', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(93, 'Grafana', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(94, 'New Relic', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(95, 'React Native', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(96, 'Flutter', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(97, 'Swift (iOS)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(98, 'Kotlin (Android)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(99, 'Objective-C', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(100, 'Xamarin', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(101, 'Ionic', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(102, 'Apache Cordova', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(103, 'PhoneGap', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(104, 'Unity3D', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(105, 'Corona SDK', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(106, 'Sencha Touch', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(107, 'Git', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(108, 'GitHub', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(109, 'GitLab', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(110, 'Bitbucket', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(111, 'Subversion (SVN)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(112, 'Mercurial', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(113, 'Perforce', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(114, 'JUnit', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(115, 'Selenium', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(116, 'Cypress', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(117, 'Mocha', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(118, 'Jest', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(119, 'PyTest', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(120, 'RSpec', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(121, 'Postman', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(122, 'SoapUI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(123, 'TestNG', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(124, 'Appium', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(125, 'BrowserStack', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(126, 'JUnit 5', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(127, 'QUnit', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(128, 'Protractor', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(129, 'Chai', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(130, 'SuperTest', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(131, 'Jira', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(132, 'Trello', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(133, 'Asana', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(134, 'Slack', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(135, 'Microsoft Teams', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(136, 'Confluence', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(137, 'Monday.com', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(138, 'ClickUp', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(139, 'Notion', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(140, 'Basecamp', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(141, 'Smartsheet', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(142, 'Wrike', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(143, 'Miro', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(144, 'GraphQL', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(145, 'RESTful APIs', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(146, 'SOAP', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(147, 'Webpack', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(148, 'Babel', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(149, 'Vite', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(150, 'Microservices Architecture', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(151, 'Serverless Framework', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(152, 'OAuth', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(153, 'JWT (JSON Web Tokens)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(154, 'Apache Kafka', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(155, 'RabbitMQ', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(156, 'Nginx', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(157, 'Apache HTTP Server', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(158, 'Webpack', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(159, 'ESLint', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(160, 'Prettier', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(161, 'FastAPI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(162, 'FeathersJS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(163, 'LoopBack', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(164, 'NestJS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(165, 'Seneca', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(166, 'Meteor', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(167, 'Caddy', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(168, 'Traefik', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(169, 'Helm', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(170, 'Istio', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(171, 'OpenAPI/Swagger', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(172, 'Kong', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(173, 'Moleculer', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(174, 'TensorFlow', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(175, 'PyTorch', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(176, 'Scikit-Learn', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(177, 'Pandas', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(178, 'NumPy', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(179, 'Matplotlib', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(180, 'Keras', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(181, 'Hadoop', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(182, 'Spark', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(183, 'Apache Mahout', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(184, 'XGBoost', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(185, 'LightGBM', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(186, 'CatBoost', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(187, 'MLflow', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(188, 'Dask', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(189, 'Seaborn', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(190, 'Gensim', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(191, 'NLTK', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(192, 'OpenCV', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(193, 'Tableau', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(194, 'Power BI', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(195, 'QlikView', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(196, 'Looker', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(197, 'Alteryx', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(198, 'SAS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(199, 'Domo', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(200, 'MicroStrategy', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(201, 'Sisense', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(202, 'TIBCO Spotfire', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(203, 'IBM Cognos Analytics', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(204, 'Google Data Studio', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(205, 'OWASP', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(206, 'Penetration Testing', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(207, 'Burp Suite', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(208, 'Nmap', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(209, 'Metasploit', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(210, 'Wireshark', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(211, 'Kali Linux', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(212, 'OpenVAS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(213, 'Qualys', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(214, 'Nessus', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(215, 'Splunk', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(216, 'Snort', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(217, 'Checkmarx', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(218, 'Fortify', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(219, 'CyberArk', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(220, 'ZAP (Zed Attack Proxy)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(221, 'WordPress', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(222, 'Joomla', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(223, 'Drupal', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(224, 'Magento', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(225, 'TYPO3', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(226, 'Ghost', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(227, 'Grav', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(228, 'ExpressionEngine', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(229, 'Craft CMS', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(230, 'Concrete5', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(231, 'Contentful', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(232, 'SAP', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(233, 'Salesforce', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(234, 'Microsoft Dynamics', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(235, 'Odoo', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(236, 'NetSuite', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(237, 'Infor', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(238, 'Epicor', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(239, 'Acumatica', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(240, 'SugarCRM', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(241, 'Zoho CRM', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(242, 'HubSpot CRM', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(243, 'Cisco Technologies', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(244, 'Juniper Networks', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(245, 'Network Protocols (TCP/IP, DNS, DHCP)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(246, 'VPN Technologies', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(247, 'Firewall Management', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(248, 'Arista Networks', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(249, 'F5 Networks', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(250, 'Riverbed Technology', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(251, 'Aruba Networks', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(252, 'Palo Alto Networks', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(253, 'Check Point Software', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(254, 'Fortinet', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(255, 'VPN Technologies (OpenVPN, IPsec)', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25'),
(256, 'SD-WAN', NULL, 0, 1, '2024-06-15 14:42:25', 1, '2024-06-15 14:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `Sli_Id` int(11) NOT NULL,
  `Sli_Title` varchar(255) DEFAULT NULL,
  `Sli_Order` int(11) DEFAULT NULL,
  `Sli_Image` varchar(255) DEFAULT NULL,
  `Sli_Link` varchar(255) DEFAULT NULL,
  `Sli_ShortDesc` text DEFAULT NULL,
  `Sli_FullDesc` text DEFAULT NULL,
  `Sli_InnerBanner` varchar(255) DEFAULT NULL,
  `Sli_Status` int(11) DEFAULT 0,
  `Sli_CreatedBy` int(11) DEFAULT NULL,
  `Sli_CreatedDate` datetime DEFAULT current_timestamp(),
  `Sli_UpdatedBy` int(11) DEFAULT NULL,
  `Sli_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`Sli_Id`, `Sli_Title`, `Sli_Order`, `Sli_Image`, `Sli_Link`, `Sli_ShortDesc`, `Sli_FullDesc`, `Sli_InnerBanner`, `Sli_Status`, `Sli_CreatedBy`, `Sli_CreatedDate`, `Sli_UpdatedBy`, `Sli_UpdatedDate`) VALUES
(1, 'Slider 0', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, '2024-06-20 14:53:06', 1, '2024-06-20 14:54:11'),
(2, 'Slider 1', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-06-20 14:53:20', 1, '2024-06-20 14:54:17'),
(3, 'Slider 2', 1, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-06-20 14:53:25', 1, '2024-06-20 14:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socialinformation`
--

CREATE TABLE `tbl_socialinformation` (
  `SocInf_Id` int(11) NOT NULL,
  `SocInf_Icon` varchar(255) DEFAULT NULL,
  `SocInf_Name` varchar(255) DEFAULT NULL,
  `SocInf_Link` varchar(255) DEFAULT NULL,
  `SocInf_Order` int(11) DEFAULT NULL,
  `SocInf_Status` int(11) DEFAULT 0,
  `SocInf_CreatedBy` int(11) DEFAULT NULL,
  `SocInf_CreatedDate` datetime DEFAULT current_timestamp(),
  `SocInf_UpdatedBy` int(11) DEFAULT NULL,
  `SocInf_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_socialinformation`
--

INSERT INTO `tbl_socialinformation` (`SocInf_Id`, `SocInf_Icon`, `SocInf_Name`, `SocInf_Link`, `SocInf_Order`, `SocInf_Status`, `SocInf_CreatedBy`, `SocInf_CreatedDate`, `SocInf_UpdatedBy`, `SocInf_UpdatedDate`) VALUES
(1, 'fa fa-instagram', 'Instagram', '#', 1, 0, 1, '2024-03-18 16:48:42', 1, '2024-04-03 13:34:12'),
(2, 'fa fa-youtube', 'Youtube', '#', 2, 0, 1, '2024-03-18 16:57:09', 1, '2024-03-29 14:29:36'),
(3, 'fa fa-twitter', 'Twitter', '#', 3, 0, 1, '2024-03-18 16:57:48', 1, '2024-03-19 14:23:24'),
(4, 'fa fa-instagram', 'Instagram22', '2', 4, 2, 1, '2024-03-19 14:19:57', NULL, '2024-03-19 14:19:57'),
(5, 'fa fa-linkedin', 'linkedin', '#', 4, 0, 1, '2024-03-19 14:24:40', NULL, '2024-03-19 14:24:40'),
(6, '1', '1', '1', 1, 2, 1, '2024-06-03 16:06:03', 1, '2024-06-03 16:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `Sta_Id` int(11) NOT NULL,
  `Sta_Cou_Id` int(11) NOT NULL DEFAULT 0,
  `Sta_Name` varchar(255) DEFAULT NULL,
  `Sta_Code` varchar(10) DEFAULT NULL,
  `Sta_Status` int(11) NOT NULL DEFAULT 0,
  `Sta_CreatedBy` int(11) NOT NULL DEFAULT 0,
  `Sta_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Sta_UpdatedBy` int(11) NOT NULL DEFAULT 0,
  `Sta_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`Sta_Id`, `Sta_Cou_Id`, `Sta_Name`, `Sta_Code`, `Sta_Status`, `Sta_CreatedBy`, `Sta_CreatedDate`, `Sta_UpdatedBy`, `Sta_UpdatedDate`) VALUES
(1, 1, 'Rajasthan', 'RJ', 0, 1, '2024-05-07 12:44:01', 1, '2024-05-09 12:13:18'),
(2, 2, 'Hokkaido', 'HK', 0, 1, '2024-05-07 12:44:05', 1, '2024-05-09 12:13:28'),
(3, 3, 'test state', 'test s', 0, 1, '2024-06-05 11:54:21', 0, '2024-06-05 11:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `SubMen_Id` int(11) NOT NULL,
  `SubMen_Men_Id` int(11) DEFAULT NULL,
  `SubMen_Name` varchar(255) DEFAULT NULL,
  `SubMen_URL` varchar(255) DEFAULT NULL,
  `SubMen_Desc` text DEFAULT NULL,
  `SubMen_InnerBanner` varchar(255) DEFAULT NULL,
  `SubMen_Order` int(11) DEFAULT NULL,
  `SubMen_Status` int(11) DEFAULT 0,
  `SubMen_CreatedBy` int(11) DEFAULT NULL,
  `SubMen_CreatedDate` datetime DEFAULT current_timestamp(),
  `SubMen_UpdatedBy` int(11) DEFAULT NULL,
  `SubMen_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`SubMen_Id`, `SubMen_Men_Id`, `SubMen_Name`, `SubMen_URL`, `SubMen_Desc`, `SubMen_InnerBanner`, `SubMen_Order`, `SubMen_Status`, `SubMen_CreatedBy`, `SubMen_CreatedDate`, `SubMen_UpdatedBy`, `SubMen_UpdatedDate`) VALUES
(1, 1, 'Home 1', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 'SubMenu_images/1714045605_662a42a50ca37.jpg', 1, 1, 1, '2024-03-16 11:11:06', 1, '2024-04-29 10:21:19'),
(2, 2, 'About 1', 'About.html', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 'SubMenu_images/1710842320_65f961d06aba8.jpg', 2, 2, 1, '2024-03-16 11:13:10', 1, '2024-03-19 15:28:40'),
(3, 1, 'sadasd', 'sad', '<p>asd</p>', NULL, 3, 2, 1, '2024-03-28 12:32:59', NULL, '2024-03-28 12:32:59'),
(4, 2, 'sdasd', 'w34', '<p>asd</p>', NULL, 4, 2, 1, '2024-03-29 17:46:26', NULL, '2024-03-29 17:46:26'),
(5, 1, 'd', 'd', '<p>d</p>', NULL, 5, 2, 1, '2024-04-17 14:53:09', NULL, '2024-04-17 14:53:09'),
(6, 2, '1', '2', NULL, NULL, 6, 2, 1, '2024-04-27 11:48:15', NULL, '2024-04-27 11:48:15'),
(7, 2, 'sdf', 'sdf', NULL, NULL, 7, 2, 1, '2024-04-27 11:48:45', NULL, '2024-04-27 11:48:45'),
(8, 2, 'sdf', 'dsf', NULL, NULL, 8, 2, 1, '2024-04-27 11:48:50', NULL, '2024-04-27 11:48:50'),
(9, 2, 'Service', '/service', '<p>Full Desc</p>', 'SubMenu_images/1714369701_662f34a5dfcf4.jpg', 2, 1, 1, '2024-04-27 16:21:10', 1, '2024-04-29 11:18:37'),
(10, 1, 'home', NULL, NULL, NULL, 3, 1, 1, '2024-04-27 16:32:30', 1, '2024-04-27 16:34:53'),
(11, 1, 'contact', 'contact', NULL, NULL, 4, 1, 1, '2024-04-27 16:33:07', NULL, '2024-04-27 16:33:07'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-06-03 15:36:44', NULL, '2024-06-03 15:36:44'),
(13, NULL, 'q', 'q', '<p>q</p>', NULL, 5, 2, 1, '2024-06-03 15:44:20', NULL, '2024-06-03 15:44:20'),
(14, NULL, 'q', 'q', '<p>q</p>', NULL, 6, 2, 1, '2024-06-03 15:44:32', NULL, '2024-06-03 15:44:32'),
(15, 11, '2', '2', '<p>2</p>', NULL, 52, 2, 1, '2024-06-03 15:46:54', 1, '2024-06-03 15:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `Tea_Id` int(11) NOT NULL,
  `Tea_Name` varchar(255) DEFAULT NULL,
  `Tea_Order` int(11) DEFAULT NULL,
  `Tea_ShortDesc` text DEFAULT NULL,
  `Tea_FullDesc` text DEFAULT NULL,
  `Tea_Image` varchar(255) DEFAULT NULL,
  `Tea_InnerBanner` varchar(255) DEFAULT NULL,
  `Tea_Status` int(11) DEFAULT 0,
  `Tea_CreatedBy` int(11) DEFAULT NULL,
  `Tea_CreatedDate` datetime DEFAULT current_timestamp(),
  `Tea_UpdatedBy` int(11) DEFAULT NULL,
  `Tea_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`Tea_Id`, `Tea_Name`, `Tea_Order`, `Tea_ShortDesc`, `Tea_FullDesc`, `Tea_Image`, `Tea_InnerBanner`, `Tea_Status`, `Tea_CreatedBy`, `Tea_CreatedDate`, `Tea_UpdatedBy`, `Tea_UpdatedDate`) VALUES
(1, '1', 1, '1', '<p>1</p>', 'Team_images/1711708580_660699a4bc475.jpg', 'Team_images/1711709027_66069b6367aac.avif', 2, 1, '2024-03-29 16:06:20', 1, '2024-03-29 16:14:01'),
(2, 'Member 1', 1, 'Senior Architect', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 'Team_images/1714045915_662a43db68462.jpg', 'Team_images/1714045915_662a43db68827.jpg', 1, 1, '2024-03-29 16:15:55', 1, '2024-04-25 17:21:55'),
(3, '1', 1, '1', '<p>1</p>', 'Team_images/1711708580_660699a4bc475.jpg', 'Team_images/1711709027_66069b6367aac.avif', 2, 1, '2024-03-29 16:06:20', 1, '2024-03-29 16:14:01'),
(4, 'Member 2', 2, 'Senior Architect', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 'Team_images/1711709155_66069be30b23c.jpg', NULL, 1, 1, '2024-03-29 16:15:55', 1, '2024-03-29 16:38:34'),
(5, '1', 1, '1', '<p>1</p>', 'Team_images/1711708580_660699a4bc475.jpg', 'Team_images/1711709027_66069b6367aac.avif', 2, 1, '2024-03-29 16:06:20', 1, '2024-03-29 16:14:01'),
(6, 'Member 3', 3, 'Senior Architect', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 'Team_images/1711709155_66069be30b23c.jpg', NULL, 1, 1, '2024-03-29 16:15:55', 1, '2024-03-29 16:38:42'),
(7, '1', 1, '1', '<p>1</p>', 'Team_images/1711708580_660699a4bc475.jpg', 'Team_images/1711709027_66069b6367aac.avif', 2, 1, '2024-03-29 16:06:20', 1, '2024-03-29 16:14:01'),
(8, 'Member 4', 4, 'Senior Architect', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 'Team_images/1711709155_66069be30b23c.jpg', NULL, 1, 1, '2024-03-29 16:15:55', 1, '2024-03-29 16:38:51'),
(9, '2', 2, '2', '<p>2</p>', NULL, NULL, 2, 1, '2024-06-03 16:15:16', 1, '2024-06-03 16:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `Tes_Id` int(11) NOT NULL,
  `Tes_Name` varchar(255) DEFAULT NULL,
  `Tes_Designation` varchar(255) DEFAULT NULL,
  `Tes_Order` int(11) DEFAULT NULL,
  `Tes_Link` varchar(255) DEFAULT NULL,
  `Tes_Desc` text DEFAULT NULL,
  `Tes_Image` varchar(255) DEFAULT NULL,
  `Tes_Status` int(11) DEFAULT 0,
  `Tes_CreatedBy` int(11) DEFAULT NULL,
  `Tes_CreatedDate` datetime DEFAULT current_timestamp(),
  `Tes_UpdatedBy` int(11) DEFAULT NULL,
  `Tes_UpdatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`Tes_Id`, `Tes_Name`, `Tes_Designation`, `Tes_Order`, `Tes_Link`, `Tes_Desc`, `Tes_Image`, `Tes_Status`, `Tes_CreatedBy`, `Tes_CreatedDate`, `Tes_UpdatedBy`, `Tes_UpdatedDate`) VALUES
(1, 'Testimonial 1', 'Testimonial 1', 1, 'https://fontawesome.com/', 'Testimonial 1', 'Testimonial_images/1710765613_65f8362d16f88.webp', 0, 1, '2024-03-18 17:37:37', 1, '2024-04-17 14:45:32'),
(2, 't2', 't2t', 2, 'https://fontawesome.com/', 't2', 'Testimonial_images/1710763724_65f82eccd8308.webp', 0, 1, '2024-03-18 17:38:44', 1, '2024-04-17 14:45:40'),
(3, 'Stiven Morgan', 'Ajmer Rajasthan', 2, 'https://fontawesome.com/', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consec tetur, adipisci velit, sed quia non num the quam eius modi the tempora Neque porro quis quam.', 'Testimonial_images/1710846482_65f97212a70d4.jpg', 0, 1, '2024-03-19 16:32:35', 1, '2024-04-17 14:45:45'),
(4, 'Stiven Morgan', 'Ajmer Rajasthan', 1, 'https://fontawesome.com/', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consec tetur, adipisci velit, sed quia non num the quam eius modi the tempora Neque porro quis quam.', 'Testimonial_images/1710846833_65f97371c9d8b.jpg', 0, 1, '2024-03-19 16:32:35', 1, '2024-04-17 14:45:36'),
(5, 'Stiven Morgan', 'Ajmer Rajasthan', 3, 'https://fontawesome.com/', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consec tetur, adipisci velit, sed quia non num the quam eius modi the tempora Neque porro quis quam.', 'Testimonial_images/1710846489_65f9721998ce3.jpg', 0, 1, '2024-03-19 16:32:35', 1, '2024-04-17 14:45:50'),
(6, 'a', 'a', 4, 'a1', '1', NULL, 2, 1, '2024-03-23 14:18:15', NULL, '2024-03-23 14:18:15'),
(7, '0', '0', 0, '00', '01', NULL, 0, 1, '2024-06-03 16:10:53', 1, '2024-06-03 16:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usefullinks`
--

CREATE TABLE `tbl_usefullinks` (
  `UseLin_Id` int(20) NOT NULL,
  `UseLin_Name` varchar(255) DEFAULT NULL,
  `UseLin_Desc` text DEFAULT NULL,
  `UseLin_InnerBanner` varchar(255) DEFAULT NULL,
  `UseLin_Order` int(20) NOT NULL DEFAULT 0,
  `UseLin_Status` int(20) NOT NULL DEFAULT 0,
  `UseLin_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `UseLin_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `UseLin_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `UseLin_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usefullinks`
--

INSERT INTO `tbl_usefullinks` (`UseLin_Id`, `UseLin_Name`, `UseLin_Desc`, `UseLin_InnerBanner`, `UseLin_Order`, `UseLin_Status`, `UseLin_CreatedBy`, `UseLin_CreatedDate`, `UseLin_UpdatedBy`, `UseLin_UpdatedDate`) VALUES
(1, 'Privacy Policy', '<h3>GDPR &amp; Privacy Policy</h3>\r\n\r\n<p>lipsum.com is committed to protecting your privacy online. This Privacy Policy endeavours to describe to you our practices regarding the personal information we collect from users on our website, located at lipsum.com (the &ldquo;Site&rdquo;), and the services offered through the Site. If you have any questions about our Privacy Policy, our collection practices, the processing of user information, or if you would like to report a security violation to us directly, please contact us at help@lipsum.com</p>\r\n\r\n<p>Please read this policy in conjunction with the&nbsp;<a href=\"https://freestar.com/privacy-policy/\" target=\"_blank\">Freestar Privacy Policy</a></p>\r\n\r\n<h3>What Data We Collect</h3>\r\n\r\n<p><strong>General Data:</strong>&nbsp;The use of our services will automatically create information that will be collected. For example, when you use our Services, your geographic location, how you use the Services, information about the type of device you use, your Open Device Identification Number, date/time stamps for your visit, your unique device identifier, your browser type, operating system, Internet Protocol (IP) address, and domain name are all collected. This information is generally used to help us deliver the most relevant information to you and administer and improve the Site.</p>\r\n\r\n<p><strong>Log Files:</strong>&nbsp;As is true of most websites, we gather certain information automatically and store it in log files. This information includes IP addresses, browser type, Internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and clickstream data. We use this information to maintain and improve the performance of the Services.</p>\r\n\r\n<p><strong>Analytics:</strong>&nbsp;We use analytics services (including, but not limited to, Google Analytics) to help analyze how users use the Site. Analytics services use Cookies to collect information such as how often users visit the Site and we use the information to improve our Site and Services. The analytics services&#39; ability to use and share information collected by them is restricted by their terms of use and privacy policy, which you should refer to for more information about how these entities use this information.</p>\r\n\r\n<p><strong>Location Information:</strong>&nbsp;If you have enabled location services on your mobile device, we may collect your location information to improve the Services we offer. If you do not want this information collected, you can disable location services on your device.</p>\r\n\r\n<p><strong>Cookies:</strong>&nbsp;&ldquo;Cookies&rdquo; are small pieces of information (text files) that a website sends to your computer&rsquo;s hard drive while you are viewing the website. These text files can be used by websites to make the users experience more efficient. The law states that we can store these cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission. To that end, this site uses different types of cookies. Some cookies are placed by third party services that appear on our pages. We and some third parties may use both session Cookies (which expire once you close your web browser) and persistent Cookies (which stay on your computer until you delete them) to provide you with a more personal and interactive experience on our Services and to market the Services or other products. Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers. This tracking is done on an anonymous basis and, while not an exhaustive list, some of the companies we work with are Google, AppNexus, Criteo, Rubicon, Pubmatic and DistrictM. To learn more about this practice, including the Self Regulatory Principles for Online Advertising, to which we adhere, you can visit www.aboutads.info/choices, optout.networkadvertising.org and www.youronlinechoices.com</p>\r\n\r\n<h3>Use of Your Personal information</h3>\r\n\r\n<p>In general, personal information you submit to us is used either to respond to requests that you make, aid us in serving you better, or market our Services. We use your personal information in the following ways:</p>\r\n\r\n<ul>\r\n	<li>Operate, maintain, and improve our site(s), products, and services;</li>\r\n	<li>Respond to comments and questions and provide customer service;</li>\r\n	<li>Link or combine user information with other personal information we get from third parties, to help understand your needs and provide you with better service;</li>\r\n	<li>Develop, improve, and deliver marketing and advertising for the Services;</li>\r\n	<li>Provide and deliver products and services you request;</li>\r\n	<li>Identify you as a user in our system;</li>\r\n</ul>\r\n\r\n<p>We may store and process your personal information on servers located in both the United States and Europe. We may also create anonymous data records from your personal information by completely excluding information (such as your name) that makes the data personally identifiable to you. We use this anonymous data to analyze request and usage patterns so that we may enhance the content of our Services and improve Site functionality. We reserve the right to use anonymous data for any purpose and disclose anonymous data to third parties at our sole discretion.</p>\r\n\r\n<p>We may receive testimonials and comments from users who have had positive experiences with our Services. We may publish such content. When we publish this content, we may identify our users by their first and last name. We obtain the user&#39;s consent prior to posting this information along with the testimonial.</p>\r\n\r\n<h3>Disclosure of Your Personal information</h3>\r\n\r\n<p>We disclose your personal information as described below and as described elsewhere in this Privacy Policy.</p>\r\n\r\n<p><strong>Third Parties Designated by You:</strong>&nbsp;When you use the Services, the personal information you provide will be shared with the third parties that you authorize to receive such information.</p>\r\n\r\n<p><strong>Third Party Service Providers:</strong>&nbsp;We may share your personal information with third party service providers to: provide you with the Services that we offer you through our Services; conduct quality assurance testing; to provide technical support; market the Services; and/or to provide other services to us.</p>\r\n\r\n<p><strong>Information We Share:</strong>&nbsp;We may disclose aggregated information about our users and information that does not identify any individual without restriction. In addition, we may disclose personal information that we collect or you provide:</p>\r\n\r\n<ul>\r\n	<li>To fulfill the purpose for which you provide it, for any other purpose disclosed by us when you provide the information, or with your consent;</li>\r\n	<li>To third parties designated by you;</li>\r\n	<li>With our subsidiaries and affiliates;</li>\r\n	<li>To third parties to process payments made through the Services;</li>\r\n	<li>With contractors, service providers and other third parties we use to support our business;</li>\r\n	<li>To a buyer or other successor in the event of a merger, divestiture, restructuring, reorganization, dissolution or other sale or transfer of some or all of our assets, whether as a going concern or as part of bankruptcy, liquidation or similar proceeding, in which personal information held by us about users is among the assets transferred; and</li>\r\n</ul>\r\n\r\n<p><strong>Other Disclosures:</strong>&nbsp;Regardless of any choices you make regarding your Personal information (as described below), lipsum.com may disclose Personal information if it believes in good faith that such disclosure is necessary: (i) in connection with any legal investigation; (ii) to comply with relevant laws or to respond to subpoenas or warrants served on our company; (iii) to protect or defend the rights or property of lipsum.com or users of the Services; and/or (iv) to investigate or assist in preventing any violation or potential violation of the law, this Privacy Policy, or our Terms of Use.</p>\r\n\r\n<h3>Third Party Websites</h3>\r\n\r\n<p>Our Site may contain links to third party websites. When you click on a link to any other website or location, you will leave our Site or Services and go to another site, and another entity may collect personal information or anonymous data from you. We have no control over, do not review, and are not responsible for, these outside websites or their content. Please be aware that the terms of this Privacy Policy do not apply to these outside websites or content, or to any collection of your personal information after you click on links to such outside websites. We encourage you to read the privacy policies of every website you visit. The links to third party websites or locations are for your convenience and do not signify our endorsement of such third parties or their products, content or websites.</p>\r\n\r\n<h3>Your Choices Regarding Information</h3>\r\n\r\n<p><strong>Choices:</strong>&nbsp;We offer you choices regarding the collection, use, and sharing of your personal information. We may periodically send you emails that directly promote the use of our Services. When you receive promotional communications from us, you may indicate a preference to stop receiving further communications from us and you will have the opportunity to &ldquo;opt-out&rdquo; by following the unsubscribe instructions provided in the email you receive or by contacting us directly. Despite your indicated email preferences, we may send you service related communications, including notices of any updates to our Terms of Use or Privacy Policy.</p>\r\n\r\n<p><strong>Cookies:</strong>&nbsp;If you decide at any time that you no longer wish to accept cookies from our Services for any of the purposes described above, then you can instruct your browser, by changing its settings, to stop accepting cookies or to prompt you before accepting a cookie from the websites you visit. Consult your browser&rsquo;s technical information. If you do not accept cookies, however, you may not be able to use all portions of the Services or all functionality of the Services. If you have any questions about how to disable or modify cookies, please contact us at help@lipsum.com</p>\r\n\r\n<h3>Young People</h3>\r\n\r\n<p>Our Services are not directed to children under the age of 13. If a child under 13 submits personal information to us and we learn that this is the case, we will take steps to remove the personal information from our databases. If you believe that we might have any personal information from a child under 13, please contact us at help@lipsum.com</p>\r\n\r\n<h3>Your Rights</h3>\r\n\r\n<p>As a user of our site you have the following rights, any of which you may exercise by contacting us at help@lipsum.com</p>\r\n\r\n<ul>\r\n	<li>The right to ask what personal data that we hold about you at any time. Extra requests (particularly repetitive) for data may result in a fee being charged to the user.</li>\r\n	<li>The right to ask us to update and correct any out-of-date or incorrect personal data that we hold about you free of charge.</li>\r\n	<li>As set out above, the right to opt out of any marketing communications that we may send you.</li>\r\n</ul>\r\n\r\n<p>Further information regarding your rights can be found under: https://ico.org.uk/for-organisations/guide-to-the-general-data-protection-regulation-gdpr/individual-rights/</p>\r\n\r\n<p>&nbsp;</p>', 'UsefulLink_images/1714046001_662a4431dbf1a.jpg', 1, 0, 1, '2024-04-25 12:43:54', 1, '2024-04-25 17:23:21'),
(2, 'Terms & Conditions', '<h3>he standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n\r\n<hr />\r\n<p><a href=\"mailto:help@lipsum.com\">help@lipsum.com</a><br />\r\n<a href=\"https://www.lipsum.com/privacy\">Privacy Policy</a>&nbsp;&middot;&nbsp;</p>', '', 2, 0, 1, '2024-04-25 12:54:06', 0, '2024-04-25 12:54:06'),
(5, '3', '<p>3</p>', NULL, 3, 2, 1, '2024-06-03 16:49:37', 1, '2024-06-03 16:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitorcounter`
--

CREATE TABLE `tbl_visitorcounter` (
  `id` int(20) NOT NULL,
  `Vis_Reg_Id` int(11) DEFAULT NULL,
  `Vis_Ip` varchar(255) DEFAULT NULL,
  `Vis_Country` varchar(255) DEFAULT NULL,
  `Vis_Region` varchar(255) DEFAULT NULL,
  `Vis_City` varchar(255) DEFAULT NULL,
  `Vis_CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_visitorcounter`
--

INSERT INTO `tbl_visitorcounter` (`id`, `Vis_Reg_Id`, `Vis_Ip`, `Vis_Country`, `Vis_Region`, `Vis_City`, `Vis_CreatedDate`) VALUES
(1, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-29 12:43:52'),
(2, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(3, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(4, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(5, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(6, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(7, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(8, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(9, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(10, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(11, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(12, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(13, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(14, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(15, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(16, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(17, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(18, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(19, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(20, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(21, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(22, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(23, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(24, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(25, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(26, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(27, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(28, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(29, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(30, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(31, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(32, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(33, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-27 15:35:34'),
(34, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-28 15:16:39'),
(35, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-03-30 12:17:43'),
(36, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-01 10:07:17'),
(37, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-03 12:16:42'),
(38, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-04 12:28:32'),
(39, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-05 15:54:59'),
(40, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-08 10:19:42'),
(41, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-09 13:23:46'),
(42, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-10 16:10:46'),
(43, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-12 10:33:46'),
(44, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-17 12:09:17'),
(45, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-23 10:29:52'),
(46, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-24 13:45:17'),
(47, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-25 13:20:17'),
(48, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-27 10:19:54'),
(49, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-29 10:16:15'),
(50, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-04-30 10:30:15'),
(51, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-02 15:15:26'),
(52, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-03 17:28:19'),
(53, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-08 14:54:33'),
(54, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-10 10:34:07'),
(55, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-11 10:21:38'),
(56, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-13 11:30:44'),
(57, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-05-28 13:27:00'),
(58, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-01 11:55:01'),
(59, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-03 12:00:25'),
(60, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-05 10:16:42'),
(61, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-06 10:29:36'),
(62, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-07 10:31:04'),
(63, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-08 12:07:37'),
(64, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-10 10:29:15'),
(65, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-14 10:21:58'),
(66, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-15 12:16:58'),
(67, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-17 11:19:32'),
(68, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-19 10:34:33'),
(69, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-06-20 10:33:11'),
(70, NULL, '127.0.0.1', NULL, NULL, NULL, '2024-07-27 12:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_websitehelp`
--

CREATE TABLE `tbl_websitehelp` (
  `WebHel_Id` int(20) NOT NULL,
  `WebHel_Desc` text DEFAULT NULL,
  `WebHel_Status` int(20) NOT NULL DEFAULT 0,
  `WebHel_CreatedBy` int(20) NOT NULL DEFAULT 0,
  `WebHel_UpdatedBy` int(20) NOT NULL DEFAULT 0,
  `WebHel_CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `WebHel_UpdatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_websitehelp`
--

INSERT INTO `tbl_websitehelp` (`WebHel_Id`, `WebHel_Desc`, `WebHel_Status`, `WebHel_CreatedBy`, `WebHel_UpdatedBy`, `WebHel_CreatedDate`, `WebHel_UpdatedDate`) VALUES
(1, '<p>aa</p>', 2, 1, 1, '2024-06-03 17:00:13', '2024-06-03 17:00:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`Car_Id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`Cit_Id`),
  ADD KEY `FK_Cit_Sta_Id` (`Cit_Sta_Id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`Cli_Id`);

--
-- Indexes for table `tbl_contactinformation`
--
ALTER TABLE `tbl_contactinformation`
  ADD PRIMARY KEY (`ConInf_Id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`Con_Id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`Cou_Id`);

--
-- Indexes for table `tbl_credential_log`
--
ALTER TABLE `tbl_credential_log`
  ADD PRIMARY KEY (`CreLog_Id`);

--
-- Indexes for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  ADD PRIMARY KEY (`Err_Id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`Fac_Id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`Faq_Id`);

--
-- Indexes for table `tbl_imagesize`
--
ALTER TABLE `tbl_imagesize`
  ADD PRIMARY KEY (`Img_Id`) USING BTREE;

--
-- Indexes for table `tbl_jobrole`
--
ALTER TABLE `tbl_jobrole`
  ADD PRIMARY KEY (`JobRol_Id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`Job_Id`);

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
-- Indexes for table `tbl_metatags`
--
ALTER TABLE `tbl_metatags`
  ADD PRIMARY KEY (`MetTyp_Id`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`Mod_Id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`New_Id`),
  ADD UNIQUE KEY `New_EmailId` (`New_EmailId`);

--
-- Indexes for table `tbl_personalinformation`
--
ALTER TABLE `tbl_personalinformation`
  ADD PRIMARY KEY (`PerInf_Id`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`Pla_Id`);

--
-- Indexes for table `tbl_plancategory`
--
ALTER TABLE `tbl_plancategory`
  ADD PRIMARY KEY (`PlaCat_Id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`Pro_Id`);

--
-- Indexes for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  ADD PRIMARY KEY (`ProCat_Id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`Ser_Id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`Set_Id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`Ski_Id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`Sli_Id`);

--
-- Indexes for table `tbl_socialinformation`
--
ALTER TABLE `tbl_socialinformation`
  ADD PRIMARY KEY (`SocInf_Id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`Sta_Id`),
  ADD KEY `FK_Sta_Cou_Id` (`Sta_Cou_Id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`SubMen_Id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`Tea_Id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`Tes_Id`);

--
-- Indexes for table `tbl_usefullinks`
--
ALTER TABLE `tbl_usefullinks`
  ADD PRIMARY KEY (`UseLin_Id`);

--
-- Indexes for table `tbl_visitorcounter`
--
ALTER TABLE `tbl_visitorcounter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_websitehelp`
--
ALTER TABLE `tbl_websitehelp`
  ADD PRIMARY KEY (`WebHel_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `Car_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `Cit_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `Cli_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_contactinformation`
--
ALTER TABLE `tbl_contactinformation`
  MODIFY `ConInf_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `Con_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `Cou_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_credential_log`
--
ALTER TABLE `tbl_credential_log`
  MODIFY `CreLog_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  MODIFY `Err_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `Fac_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `Faq_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_imagesize`
--
ALTER TABLE `tbl_imagesize`
  MODIFY `Img_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_jobrole`
--
ALTER TABLE `tbl_jobrole`
  MODIFY `JobRol_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `Job_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `Log_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `Men_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_metatags`
--
ALTER TABLE `tbl_metatags`
  MODIFY `MetTyp_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `Mod_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `New_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_personalinformation`
--
ALTER TABLE `tbl_personalinformation`
  MODIFY `PerInf_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `Pla_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_plancategory`
--
ALTER TABLE `tbl_plancategory`
  MODIFY `PlaCat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `Pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  MODIFY `ProCat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `Ser_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `Set_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `Ski_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `Sli_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_socialinformation`
--
ALTER TABLE `tbl_socialinformation`
  MODIFY `SocInf_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `Sta_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `SubMen_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `Tea_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `Tes_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_usefullinks`
--
ALTER TABLE `tbl_usefullinks`
  MODIFY `UseLin_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_visitorcounter`
--
ALTER TABLE `tbl_visitorcounter`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_websitehelp`
--
ALTER TABLE `tbl_websitehelp`
  MODIFY `WebHel_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
