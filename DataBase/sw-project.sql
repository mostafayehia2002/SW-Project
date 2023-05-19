-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 06:02 PM
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
(2002, '2002', 1, 'IMG_20220324_135045.jpg', 'mostafa hossam', 'انثي', 'qusina', 'مسئول عن اداره شئون الطلاب', 'moustafa.yehia160800@ci.menofia.edu.eg', 1226717838, 'الحاسبات والمعلومات', ' المنوفيه'),
(2252002, '2002', 1, 'teefa.jpg', 'مصطفي يحيي', 'ذكر', 'ميت بره مركز قويسنا المنوفيه', 'مسئول السيستم', 'gad993813@gmail.com', 1226717838, 'الحاسبات والمعلومات', 'المنوفيه');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `ID` int(11) NOT NULL,
  `Subject_Code` varchar(100) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Subject_Hours` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'ge12', 'عام', 'genral', '.trashed-1669419744-IMG_20220929_175009.jpg', '2023-05-18 22:52:29', 'عربي', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `date_birth` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone` int(30) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id`, `name`, `track`, `date_birth`, `image`, `faculty`, `department`, `phone`, `facebook`, `linkedin`, `email`) VALUES
(0, 'Mostafa Yehia', 'Full Stack Web Developer', '2002-05-22', 'teefa.jpg', 'Computer And Information El Menofia', 'Computer Science', 1226717838, 'https://www.facebook.com/mostafa.gad.9085?mibextid=ZbWKwL', 'https://www.linkedin.com/in/mostafa-yehia-84456a235', 'gad993813@gmail.com'),
(1, 'Mostafa Hossam', 'Full Stack Web Developer\r\n', '2002-08-16', 'hossam.jpg', 'Computer And Information El Menofia', 'Computer Science', 1064564850, 'https://www.facebook.com/profile.php?id=100015514423354', 'https://www.linkedin.com/in/mostafa1682002/', 'mosthossam123@gmail.com'),
(2, 'Mostafa Zahra', 'Back-End Developer', '2001-11-01', 'zhara.jpg', 'Computer And Information El Menofia', 'Computer Science', 1069320554, 'https://www.facebook.com/profile.php?id=100009546074886&mibextid=ZbWKwL', 'https://www.linkedin.com/in/mostafa-zahra-52530b260', 'mostafa.zahra69320@gmail.com'),
(3, 'Mostafa Maher', 'Front-End Developer', '2003-03-16', 'maher.jpg', 'Computer And Information El Menofia', 'Computer Science', 1015949752, 'https://www.facebook.com/profile.php?id=100056520471991&mibextid=ZbWKwL', 'https://www.linkedin.com/in/mostafa-maher-a71695240', 'mstfyabwsdyt@gmail.com'),
(4, 'Mostafa El Nagger', 'Back-End(.net) Developer', '2002-03-31', 'nagger.jpg', 'Computer And Information El Menofia', 'Computer Science', 1554766333, 'https://www.facebook.com/mostafa.elnager.3?mibextid=ZbWKwL', 'https://www.linkedin.com/in/mostafa-elnaggar-7a69922', 'mostafanasser23456789@gmail.com\r\n'),
(5, 'Eslam Galal', 'Front-End Developer\r\n', '2002-07-08', 'eslam.jpg', 'Computer And Information El Menofia', 'Computer Science', 1211901201, 'https://www.facebook.com/eslam.galal.1426?mibextid=ZbWKwL ', 'https://www.linkedin.com/in/eslam-galal-a59813258 LinkedIn\r\n', 'eslamgalal2024@gmail.com\r\n\r\n'),
(6, 'Nehal El Samoly', 'flutter Developer', '2002-06-22', 'unknown.jpg', 'Computer And Information Technology', 'Computer Science', 1288143936, 'https://www.facebook.com/nehal.nabil.5477/', 'https://www.linkedin.com/in/nehal-elsamoly-5a6977202/', 'nehalelsamoly123@gmail.com\r\n'),
(7, 'Radwa Khonany', 'Front-End Developer', '2002-07-27', 'unknown.jpg', 'Computer And Informantion El Menofia', 'Computer Science', 1118347919, 'https://www.facebook.com/profile.php?id=100009695685182&mibextid=ZbWKwL\r\n\r\n', 'https://www.linkedin.com/in/radwa-khonany-b9b80a254\r\n', 'radwakhonany@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_ID` bigint(30) NOT NULL,
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

INSERT INTO `doctor` (`Doctor_ID`, `Password`, `Image`, `Full_Name`, `Job`, `Gender`, `Nationality`, `Religion`, `Date_Birth`, `Address`, `Phone_Number`, `Degree`, `University`, `Faculty`, `Department`, `Email_Address`) VALUES
(12345, '12345', '', 'عربي', 'دكتور', 'ذكر', 'مصري', 'مسلم', '1980-01-24', 'daffascs', '015419552951', 'ماستر', 'المنوفيه', 'الحاسبات والمعلومات', 'genral', 'gad993813@gmail.com'),
(123456, '123456', '', 'اسامه', 'دكتور', 'ذكر', 'مصري', 'مسلم', '0000-00-00', 'qusina', '0159496592', 'ماستر', 'المنوفيه', 'الحاسبات والمعلومات', 'genral', 'moustafa.yehia160800@ci.menofia.edu.eg');

-- --------------------------------------------------------

--
-- Table structure for table `genral_course_registration`
--

CREATE TABLE `genral_course_registration` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Registration` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genral_doctor_subjects`
--

CREATE TABLE `genral_doctor_subjects` (
  `id` int(11) NOT NULL,
  `Doctor_Id` bigint(30) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genral_doctor_subjects`
--

INSERT INTO `genral_doctor_subjects` (`id`, `Doctor_Id`, `Subject_Name`) VALUES
(6, 12345, 'Computer Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `genral_subject`
--

CREATE TABLE `genral_subject` (
  `ID` int(11) NOT NULL,
  `Subject_Code` varchar(100) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Subject_Hours` tinyint(4) NOT NULL DEFAULT 3,
  `De_Subject_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genral_subject`
--

INSERT INTO `genral_subject` (`ID`, `Subject_Code`, `Subject_Name`, `Subject_Hours`, `De_Subject_Name`) VALUES
(1, ' cs111', 'Computer Introduction', 3, '0'),
(2, ' od111', ' Discrete Mathematics', 3, '0'),
(3, ' ma111', ' Mathematics-1', 3, '0'),
(4, ' cs110', ' Semiconductors', 3, '0'),
(5, ' gn170', ' Scientific&Technical Report Writing', 3, '0'),
(6, ' gn140', ' Professional Ethics', 3, '0'),
(7, ' gn112', ' Fundamentals of Management', 3, '0'),
(8, ' cs131', ' Fundamentals of  Programming', 3, 'Computer Introduction'),
(9, ' it181', ' Logic Design-1', 3, 'Semiconductors'),
(10, ' is111', ' Introduction to IS', 3, '0'),
(11, ' st190', ' Statistics&Probabilities', 3, 'Mathematics-1'),
(12, ' ma112', ' Mathematics-2', 3, 'Mathematics-1');

-- --------------------------------------------------------

--
-- Table structure for table `genral_subject_marks`
--

CREATE TABLE `genral_subject_marks` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Subject_Marks` double NOT NULL,
  `Subject_Midterm` double NOT NULL,
  `Subject_Quiz` double NOT NULL,
  `Subject_Attendance` double NOT NULL,
  `Total_Marks` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(200703, '200703', 'profile.jpg', 'مصطفي ماهر', 'ذكر', 'مصري', 'مسلم', 'البحيره', '2003-03-16', '12345678910', '015159339551', 'gad993813@gmail.com', 'البحيره', 'ثانوي عام', 370, 91, '2020-05-12', '1234', 'الحاسبات والمعلومات', 'المنوفيه', 'عام', '2023-05-02', 'طالب'),
(200713, '200713', 'profile.jpg', 'مصطفي يحيي', 'ذكر', 'مصري', 'مسلم', 'قويسنا', '2002-05-22', '123456789', '01226717838', 'gad993813@gmail.com', 'الثانويه المشتركه', 'ثانوي عام', 368, 90, '2020-05-10', '123', 'الحاسبات والمعلومات', 'المنوفيه', 'عام', '2020-05-04', 'طالب');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Ad_ID`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `genral_course_registration`
--
ALTER TABLE `genral_course_registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `genral_doctor_subjects`
--
ALTER TABLE `genral_doctor_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Doctor_Id` (`Doctor_Id`);

--
-- Indexes for table `genral_subject`
--
ALTER TABLE `genral_subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `genral_subject_marks`
--
ALTER TABLE `genral_subject_marks`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genral_course_registration`
--
ALTER TABLE `genral_course_registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genral_doctor_subjects`
--
ALTER TABLE `genral_doctor_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genral_subject`
--
ALTER TABLE `genral_subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genral_subject_marks`
--
ALTER TABLE `genral_subject_marks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genral_doctor_subjects`
--
ALTER TABLE `genral_doctor_subjects`
  ADD CONSTRAINT `genral_doctor_subjects_ibfk_1` FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`Doctor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
