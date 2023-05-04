-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 10:27 PM
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
(22, '22', 1, 'IMG_20220324_135045.jpg', 'اسلام', 'ذكر', 'qusina', 'مسئول عن اداره شئون الطلاب', 'moustafa.yehia160800@ci.menofia.edu.eg', 1226717838, 'الحاسبات والمعلومات', ' المنوفيه'),
(2002, '2002', 1, 'IMG_20220324_135045.jpg', 'mostafa hossam', 'ذكر', 'qusina', 'مسئول عن اداره شئون الطلاب', 'moustafa.yehia160800@ci.menofia.edu.eg', 1226717838, 'الحاسبات والمعلومات', ' المنوفيه'),
(2252002, '2002', 1, 'SAVE_20210512_150255.jpg', 'مصطفي يحيي', 'انثي', 'ميت بره مركز قويسنا المنوفيه', 'مسئول السيستم', 'gad993813@gmail.com', 1226717838, 'الحاسبات والمعلومات', 'المنوفيه'),
(2147483647, '30208161600398', 1, '', 'مصطفي حسام رزق', 'ذكر', 'Mansoura', 'مسئول عن اداره شئون الطلاب', 'ma9856603@gmail.com', 0, 'الحاسبات والمعلومات', ' المنوفيه');

-- --------------------------------------------------------

--
-- Table structure for table `computer_science_dependence_subject`
--

CREATE TABLE `computer_science_dependence_subject` (
  `Dependence_Subject_ID` int(11) NOT NULL,
  `Dependence_Subject_Name` varchar(100) NOT NULL,
  `Dependence_Subject_Code` varchar(100) NOT NULL,
  `Dependence_Subject_Hours` int(11) NOT NULL,
  `Dependence_Subject_Level` int(11) NOT NULL,
  `Dependence_Subject_Semister` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_science_dependence_subject`
--

INSERT INTO `computer_science_dependence_subject` (`Dependence_Subject_ID`, `Dependence_Subject_Name`, `Dependence_Subject_Code`, `Dependence_Subject_Hours`, `Dependence_Subject_Level`, `Dependence_Subject_Semister`) VALUES
(1, 'لا يوجد', '0', 0, 0, 0),
(2, 'os-1', 'cs789', 3, 2, 1),
(4, 'math-1', 'Cs7897', 3, 1, 1),
(5, 'math-1', 'Cs7897', 3, 1, 1),
(7, 'sw-1', 'cs30', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `computer_science_subject`
--

CREATE TABLE `computer_science_subject` (
  `Subject_ID` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Subject_Code` varchar(100) NOT NULL,
  `Subject_Hours` int(100) NOT NULL,
  `Subject_semister` int(100) NOT NULL,
  `Subject_Levels` int(100) NOT NULL,
  `Dependence_Subject_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_science_subject`
--

INSERT INTO `computer_science_subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`, `Subject_Hours`, `Subject_semister`, `Subject_Levels`, `Dependence_Subject_ID`) VALUES
(1, 'sw-24', 'cs50', 3, 2, 3, 7),
(2, 'os-2', 'cs74', 3, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `Department_Code` varchar(30) NOT NULL,
  `Department_Arabic_Name` varchar(100) DEFAULT NULL,
  `Department_English_Name` varchar(100) NOT NULL,
  `Department_Image` varchar(100) NOT NULL,
  `Department_Date` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `Department_manger` varchar(100) NOT NULL,
  `Department_Number_Students` int(100) NOT NULL,
  `Department_Number_Doctors` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `Department_Code`, `Department_Arabic_Name`, `Department_English_Name`, `Department_Image`, `Department_Date`, `Department_manger`, `Department_Number_Students`, `Department_Number_Doctors`) VALUES
(1, 'CS', 'علوم حاسب', 'computer_science', 'Screenshot 2023-04-04 010857.png', '2023-04-26', 'د/ حمدي', 100, 80);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `ID` int(11) NOT NULL,
  `Doctor_ID` char(14) NOT NULL,
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

INSERT INTO `doctor` (`ID`, `Doctor_ID`, `Password`, `Image`, `Full_Name`, `Job`, `Gender`, `Nationality`, `Religion`, `Date_Birth`, `Address`, `Phone_Number`, `Degree`, `University`, `Faculty`, `Department`, `Email_Address`) VALUES
(600, '14567894520236', '600', '', 'mostafa yehia gad', 'دكتور', 'انثي', 'مصري', 'مسلم', '2023-04-21', 'Quisna Menufia Egypt', '', '88', 'المنوفيه', 'الحاسبات والمعلومات', 'العام', 'gad993813@gmail.com'),
(900, '12345678901478', '900', '1607262221104.jpg', 'mostafa yehia gad', 'دكتور', 'انثي', 'مصري', 'مسلم', '2023-04-07', 'Quisna Menufia Egypt', '126', 'ماستر', 'المنوفيه', 'الحاسبات والمعلومات', 'العام', 'moustafa.yehia160800@ci.menofia.edu.eg'),
(123456, '9876543210000', '123456', 'profile.jpg', 'احمد', 'دكتور', 'ذكر', 'مصري', 'مسلم', '0000-00-00', 'القاهره', '01226717838', 'مدرس مساعد', 'المنوفيه', 'الحاسبات والمعلومات', 'علوم حاسب', 'gad993813@gmail.com'),
(2147483647, '78945612314789', '47', 'profile.jpg', 'اسلام', 'دكتور', 'ذكر', 'مصري', 'مسلم', '2023-04-19', 'Quisna Menufia Egypt', '01226717838', 'يي', 'المنوفيه', 'الحاسبات والمعلومات', 'علوم', 'gad993813@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_subjects`
--

CREATE TABLE `doctor_subjects` (
  `id` int(11) NOT NULL,
  `Doctor_Id` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `Date_Birth` date DEFAULT NULL,
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

INSERT INTO `student` (`St_ID`, `Password`, `Image`, `Full_Name`, `Gender`, `Nationality`, `Religion`, `Address`, `Date_Birth`, `National_ID`, `Phone_Number`, `Academic_Email`, `School`, `Qualification`, `Total_Degree`, `Average`, `Date_Coordination`, `Number_Coordination`, `Faculty`, `University`, `Department`, `Joining_Date`, `Job`) VALUES
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
-- Indexes for table `computer_science_dependence_subject`
--
ALTER TABLE `computer_science_dependence_subject`
  ADD PRIMARY KEY (`Dependence_Subject_ID`);

--
-- Indexes for table `computer_science_subject`
--
ALTER TABLE `computer_science_subject`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD KEY `Dependence_Subject_ID` (`Dependence_Subject_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor_subjects`
--
ALTER TABLE `doctor_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Doctor_Id` (`Doctor_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`St_ID`),
  ADD UNIQUE KEY `National ID` (`National_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer_science_dependence_subject`
--
ALTER TABLE `computer_science_dependence_subject`
  MODIFY `Dependence_Subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `computer_science_subject`
--
ALTER TABLE `computer_science_subject`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `doctor_subjects`
--
ALTER TABLE `doctor_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer_science_subject`
--
ALTER TABLE `computer_science_subject`
  ADD CONSTRAINT `computer_science_subject_ibfk_1` FOREIGN KEY (`Dependence_Subject_ID`) REFERENCES `computer_science_dependence_subject` (`Dependence_Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_subjects`
--
ALTER TABLE `doctor_subjects`
  ADD CONSTRAINT `doctor_subjects_ibfk_1` FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
