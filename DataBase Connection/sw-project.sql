-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 04:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sw-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Ad_ID` int(14) NOT NULL,
  `Full_Name` varchar(1000) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Jop` varchar(100) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Phone_Number` int(12) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(14) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(14) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `Dr_ID` int(14) NOT NULL,
  `Full_Name` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Date_of_Birth` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(12) DEFAULT NULL,
  `Degree` varchar(100) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE `doctor_login` (
  `ID` int(14) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(14) NOT NULL,
  `Image` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `St_ID` int(10) NOT NULL,
  `Full_Name` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Date_of_Birth` varchar(100) DEFAULT NULL,
  `National_ID` varchar(14) DEFAULT NULL,
  `Phone_Number` varchar(12) DEFAULT NULL,
  `Academic_Email` varchar(100) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Qualification` varchar(100) DEFAULT NULL,
  `Total_Degree` double DEFAULT NULL,
  `Average` float DEFAULT NULL,
  `Date_of_Coordination` varchar(100) DEFAULT NULL,
  `Number_of_Coordination` varchar(100) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Joining_Date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(14) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Ad_ID`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`Dr_ID`);

--
-- Indexes for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`St_ID`),
  ADD UNIQUE KEY `National ID` (`National_ID`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD CONSTRAINT `admin_info_ibfk_1` FOREIGN KEY (`Ad_ID`) REFERENCES `admin_login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD CONSTRAINT `doctor_info_ibfk_1` FOREIGN KEY (`Dr_ID`) REFERENCES `doctor_login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `student_info_ibfk_1` FOREIGN KEY (`St_ID`) REFERENCES `student_login` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
