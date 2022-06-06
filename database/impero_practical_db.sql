-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2022 at 02:45 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impero_practical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_images`
--

DROP TABLE IF EXISTS `branch_images`;
CREATE TABLE IF NOT EXISTS `branch_images` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `business_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `email`, `phoneNumber`, `logo`, `createdAt`, `updatedAt`) VALUES
('2edb9478-dac4-420d-98ef-f6622deaab3a', 'TGB Restro', 'tgb@yopmail.com', '8328238823', NULL, '2022-06-05 20:06:54', '2022-06-05 20:06:54'),
('f2cfdada-2e69-460a-83ce-f0b4f9f9515a', 'Dunge Dums1', 'dg@yopmail.com', '456456456', NULL, '2022-06-05 20:47:19', '2022-06-05 20:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `business_branches`
--

DROP TABLE IF EXISTS `business_branches`;
CREATE TABLE IF NOT EXISTS `business_branches` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `associatedBusinessName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workingDayAndTime` text COLLATE utf8mb4_unicode_ci,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_branches`
--

INSERT INTO `business_branches` (`id`, `businessId`, `associatedBusinessName`, `name`, `workingDayAndTime`, `createdAt`, `updatedAt`) VALUES
('0f0e0826-8929-4d2c-bd5e-bde4690c4e28', '2edb9478-dac4-420d-98ef-f6622deaab3a', 'Gota Branch', 'ascasca', '{\"monday\":[\"07:31-12:27\"],\"tuesday\":[\"18:27-17:27\"],\"wednesday\":[],\"thursday\":[\"12:27-17:27\"],\"friday\":[\"13:27-17:27\"],\"saturday\":[],\"sunday\":[]}', '2022-06-05 20:29:57', '2022-06-05 20:29:57'),
('fe9fdeac-6e02-46bf-afdf-d1477ef0ccac', '2edb9478-dac4-420d-98ef-f6622deaab3a', 'Gota Branch', 'ascasca', '{\"monday\":[\"07:31-12:27\"],\"tuesday\":[\"18:27-17:27\"],\"wednesday\":[],\"thursday\":[\"12:27-17:27\"],\"friday\":[\"13:27-17:27\",\"18:27-23:27\"],\"saturday\":[],\"sunday\":[]}', '2022-06-05 20:27:56', '2022-06-05 20:27:56'),
('5e9ab4a5-daa2-42af-bfe9-ff99b806afba', '2edb9478-dac4-420d-98ef-f6622deaab3a', 'Gota Branch 3', 'ascasca', '{\"monday\":[\"07:31-12:27\",\"11:30-13:30\",\"12:30-19:31\"],\"tuesday\":[\"18:27-21:27\"],\"wednesday\":[],\"thursday\":[\"14:27-17:27\"],\"friday\":[\"15:27-17:27\",\"11:31-00:31\"],\"saturday\":[],\"sunday\":[]}', '2022-06-05 20:31:16', '2022-06-05 20:31:16'),
('32d2a974-8334-4c0f-a3fe-556e764d00e0', 'f2cfdada-2e69-460a-83ce-f0b4f9f9515a', 'acasc', 'ascasca', '{\"monday\":[\"11:47-12:47\",\"13:47-16:47\"],\"tuesday\":[],\"wednesday\":[],\"thursday\":[\"12:47-13:47\",\"23:47-23:47\"],\"friday\":[],\"saturday\":[],\"sunday\":[]}', '2022-06-05 20:47:47', '2022-06-05 20:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_06_02_162010_create_businesses_table', 1),
(2, '2022_06_02_162408_create_business_branches_table', 1),
(3, '2022_06_02_164525_create_branch_images_table', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
