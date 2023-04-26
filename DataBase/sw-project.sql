-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 12:29 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Ad_ID` int(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `Image` varchar(100) NOT NULL DEFAULT 'profile.jpg',
  `Full_Name` varchar(1000) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Job` varchar(100) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Phone_Number` int(12) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT 'الحاسبات والمعلومات',
  `University` varchar(100) DEFAULT 'المنوفيه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Ad_ID`, `Password`, `status`, `Image`, `Full_Name`, `Gender`, `Address`, `Job`, `Email_Address`, `Phone_Number`, `Faculty`, `University`) VALUES
(2002, '2002', 0, '', 'mostafa hossam', 'انثي', 'qusina', 'مسئول عن اداره شئون الطلاب', 'moustafa.yehia160800@ci.menofia.edu.eg', 1226717838, 'الحاسبات والمعلومات', ' المنوفيه'),
(1112001, '1112001', 0, 'IMG_20220324_135045.jpg', 'zahra', 'ذكر', 'menofia', 'مسئول عن اداره شئون الطلاب', 'zahra852@gmail.com', 288595, 'الحاسبات والمعلومات', ' المنوفيه'),
(2252002, '2002', 1, 'DSC_2459.jpg', 'teefa', 'ذكر', 'ميت بره مركز قويسنا المنوفيه', 'Admin', 'gad993813@gmail.com', 1226717838, 'الحاسبات والمعلومات', 'المنوفيه');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Departmanet_ID` int(30) NOT NULL,
  `Departmanet_Name` varchar(100) DEFAULT NULL,
  `Departmanet_Image` varchar(100) NOT NULL,
  `Departmanet_Date` varchar(100) NOT NULL,
  `Departmanet_manger` varchar(100) NOT NULL,
  `Departmanet_Student` int(100) NOT NULL,
  `Departmanet_Doctors` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Departmanet_ID`, `Departmanet_Name`, `Departmanet_Image`, `Departmanet_Date`, `Departmanet_manger`, `Departmanet_Student`, `Departmanet_Doctors`) VALUES
(1, 'علوم حاسب', 'Screenshot 2023-04-04 010857.png', '2023-04-26', 'د/ حمدي', 100, 80);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Dr_ID` int(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL DEFAULT 'profile.jpg',
  `Full_Name` varchar(100) DEFAULT NULL,
  `Job` varchar(100) NOT NULL DEFAULT 'دكتور',
  `Gender` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT 'مصري',
  `Religion` varchar(100) DEFAULT NULL,
  `Date_Birth` date DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(30) DEFAULT NULL,
  `Degree` varchar(100) DEFAULT NULL,
  `University` varchar(100) DEFAULT 'المنوفيه',
  `Faculty` varchar(100) DEFAULT 'الحاسبات والمعلومات',
  `Department` varchar(100) DEFAULT NULL,
  `Email_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Dr_ID`, `Password`, `Image`, `Full_Name`, `Job`, `Gender`, `Nationality`, `Religion`, `Date_Birth`, `Address`, `Phone_Number`, `Degree`, `University`, `Faculty`, `Department`, `Email_Address`) VALUES
(47, '47', 'profile.jpg', 'اسلام', 'دكتور', 'ذكر', 'مصري', 'مسلم', '2023-04-19', 'Quisna Menufia Egypt', '01226717838', 'يي', 'المنوفيه', 'الحاسبات والمعلومات', 'علوم', 'gad993813@gmail.com'),
(600, '600', '', 'mostafa yehia gad', 'دكتور', 'on', 'مصري', 'مسلم', '2023-04-21', 'Quisna Menufia Egypt', '', '88', 'المنوفيه', 'الحاسبات والمعلومات', 'العام', 'gad993813@gmail.com'),
(900, '900', '1607262221104.jpg', 'mostafa yehia gad', 'دكتور', 'on', 'مصري', 'مسلم', '2023-04-07', 'Quisna Menufia Egypt', '126', 'ماستر', 'المنوفيه', 'الحاسبات والمعلومات', 'العام', 'moustafa.yehia160800@ci.menofia.edu.eg'),
(123456, '123456', 'profile.jpg', 'احمد', 'دكتور', 'ذكر', 'مصري', 'مسلم', '0000-00-00', 'القاهره', '01226717838', 'مدرس مساعد', 'المنوفيه', 'الحاسبات والمعلومات', 'علوم حاسب', 'gad993813@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `St_ID` int(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL DEFAULT 'profile.jpg',
  `Full_Name` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT 'مصري',
  `Religion` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `National_ID` varchar(30) DEFAULT NULL,
  `Phone_Number` varchar(30) DEFAULT NULL,
  `Academic_Email` varchar(100) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Qualification` varchar(100) DEFAULT 'ثانوي عام',
  `Total_Degree` double DEFAULT NULL,
  `Average` float DEFAULT NULL,
  `Date_Coordination` date DEFAULT NULL,
  `Number_Coordination` varchar(100) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT 'الحاسبات والمعلومات',
  `University` varchar(100) DEFAULT 'المنوفيه',
  `Department` varchar(100) DEFAULT 'عام',
  `Joining_Date` date DEFAULT NULL,
  `Job` varchar(100) NOT NULL DEFAULT 'طالب'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`St_ID`, `Password`, `Image`, `Full_Name`, `Gender`, `Nationality`, `Religion`, `Address`, `Date_of_Birth`, `National_ID`, `Phone_Number`, `Academic_Email`, `School`, `Qualification`, `Total_Degree`, `Average`, `Date_Coordination`, `Number_Coordination`, `Faculty`, `University`, `Department`, `Joining_Date`, `Job`) VALUES
(55, '124', '', 'خالد', 'ذكر', 'مصري', '', 'Quisna Menufia Egypt', '0000-00-00', '124', '01226717838', 'gad993813@gmail.com', '', '', 0, 0, '0000-00-00', '', 'الحاسبات والمعلومات', 'المنوفية', 'العام', '0000-00-00', 'طالب'),
(1234567, '1234567', 'profile.jpg', 'علي', 'ذكر', 'مصري', 'مسلم', 'الجيزه', '2002-05-22', '12346882', '01226717838', 'gad993813@gmail.com', 'ثانوي', 'ثانوي عام', 365, 92, '2019-05-07', '5', 'الحاسبات والمعلومات', 'المنوفيه', 'عام', '2019-07-20', 'طالب');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Ad_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Departmanet_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Dr_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`St_ID`),
  ADD UNIQUE KEY `National ID` (`National_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
