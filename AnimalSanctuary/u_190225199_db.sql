-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2021 at 07:28 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_190225199_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(255) NOT NULL,
  `animalname` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `anidescription` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `aniowner` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `anistate` int(10) DEFAULT NULL,
  `picture1` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `picture2` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `picture3` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animalname`, `dob`, `anidescription`, `aniowner`, `anistate`, `picture1`, `picture2`, `picture3`) VALUES
(4, 'Dog', '21/06/2001', 'Very nice dog', 'UKGamer19', 2, 'uploads/6090042dcd51b6.61139455.jpg', 'uploads/6090042dcd5537.86243135.jpg', ''),
(5, 'Cat', '6/05/2002', 'Nice Friendly Cat', 'None', 1, 'uploads/60907d01b57cb9.50671146.jpg', 'uploads/60907d01b59693.71884091.jpg', 'uploads/60907d01b59787.99356875.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requester` varchar(400) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `animal` varchar(400) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `reasonwhy` varchar(400) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `statusof` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requester`, `animal`, `reasonwhy`, `statusof`) VALUES
('UKGamer19', 'Dog', 'I think I have a great home for this Animal', 'Approved'),
('UKGamer19', 'Dog', 'Think I can take good care of this animal', 'Approved'),
('UKGamer19', 'Cat', 'Cats are my Fav!', 'Pending'),
('jackson5', 'Cat', 'because i want to', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(255) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Passwords` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Staff` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `Passwords`, `Staff`) VALUES
(1, 'TestStaff', '$2y$10$uZgzEjJH9ijwFcYwOqI85eKabq45H.Y02MmGNYIVwaydKpjjTQVzS', 1),
(2, 'UKGamer19', '$2y$10$QMcNPdjrK6.mcVoQADcy1eX/XgbvSiyxGExSqR.l5SFmYb1fqFtWO', 0),
(3, 'monky', '$2y$10$Qsv9wSjKVVm2bhnKM/N21OV/iUiSHv3AZ/SokojBhJL7Eevc./dqS', 0),
(4, 'monky', '$2y$10$Qpbd3P0k/.55ZsjW62ro.O58lBQqf7VjwKWiA2tA61AiTm3C8JG.u', 0),
(5, 'aaaaaaaaaaaa', '$2y$10$.XcI2aPIrY.MOt/xrOMM6uRowClDP9XvqYY7rm/3/3N0qBoADl8fy', 0),
(6, 'jackson5', '$2y$10$h7iO4GB2lNI0g9K52UOlB.Ncx39YkaTbBtyIaytGNTe0vxKITE4/C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
