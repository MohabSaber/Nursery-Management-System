-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preschooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 1),
(3, 'Anuj kumar', 'akr305', 1234567891, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `teacherId` int(10) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `ageGroup` varchar(150) DEFAULT NULL,
  `classTiming` varchar(120) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `feacturePic` varchar(255) DEFAULT NULL,
  `addedBy` varchar(150) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `teacherId`, `className`, `ageGroup`, `classTiming`, `capacity`, `feacturePic`, `addedBy`, `postingDate`) VALUES
(1, 1, 'Art and Drawing', '3-4 Year', '11-12 PM', '20', 'eea8296fdd2922e42c748fe37472205c1698258897.jpg', 'admin', '2023-03-18 18:42:53'),
(2, 2, 'Montsware', '2-3 Year', '12-1 PM', '25', '7fabc830fe6f4f4b46289eb80219c6c41698258963.jpg', 'admin', '2023-03-18 18:45:24'),
(3, 3, 'Sceince', '4-5 Year', '12-1 PM', '30', '82353485c9e4b8916d89cd6c4bb055801698259093.jpg', 'admin', '2023-03-18 18:46:09'),
(6, 6, 'Montsware', '5-6 Year', '4-5 PM', '30', '7fabc830fe6f4f4b46289eb80219c6c41698261168.jpg', 'admin', '2023-10-25 19:12:48'),
(7, 6, 'Art and Drawing', '4-5 Year', '3-4 PM', '40', 'eea8296fdd2922e42c748fe37472205c1698261201.jpg', 'admin', '2023-10-25 19:13:21'),
(8, 6, 'Sceince', '4-5 Year', '4-5 PM', '45', '82353485c9e4b8916d89cd6c4bb055801698261229.jpg', 'admin', '2023-10-25 19:13:49'),
(10, 9, 'Montsware', '3-4 Year', '11-12 PM', '20', '7fabc830fe6f4f4b46289eb80219c6c41702546312.jpg', 'admin', '2023-12-14 09:31:52'),
(11, 8, 'Science', '4-5 Year', '12-1 PM', '30', '82353485c9e4b8916d89cd6c4bb055801702546345.jpg', 'admin', '2023-12-14 09:32:25'),
(12, 10, 'Art & Drawing', '3-4 Year', '2-3 PM', '15', 'eea8296fdd2922e42c748fe37472205c1702546511.jpg', 'admin', '2023-12-14 09:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `id` int(11) NOT NULL,
  `enrollmentNumber` bigint(12) DEFAULT NULL,
  `fatherName` varchar(120) DEFAULT NULL,
  `motherName` varchar(120) DEFAULT NULL,
  `parentmobNo` bigint(12) DEFAULT NULL,
  `parentEmail` varchar(150) DEFAULT NULL,
  `childName` varchar(150) DEFAULT NULL,
  `childAge` varchar(200) DEFAULT NULL,
  `enrollProgram` varchar(255) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `enrollStatus` varchar(100) DEFAULT NULL,
  `officialRemark` mediumtext DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblenrollment`
--

INSERT INTO `tblenrollment` (`id`, `enrollmentNumber`, `fatherName`, `motherName`, `parentmobNo`, `parentEmail`, `childName`, `childAge`, `enrollProgram`, `message`, `postingDate`, `enrollStatus`, `officialRemark`, `updationDate`) VALUES
(1, 4562123651, 'Amit Kumar', 'Garima Singh', 1425362514, 'akt@test.com', 'Anika', '2-3 Year', 'PlayGroup-1.8 to 3 years', ' We want enrollment', '2023-03-21 02:06:43', 'Accepted', 'Enrollment of the child accepted.', '2023-03-21 02:55:43'),
(2, 784123651, 'Ajay ', 'Sunita ', 7852145220, 'sunot@test.com', 'Anvi', '3-4 Year', 'Junior KG- 3.5 to 5 years', 'Enrollment for  kg3.5to5 year programm', '2023-03-21 02:09:33', 'Rejected', 'All seats are full.', '2023-03-21 03:00:16'),
(3, 7857665463, 'Sanjeev', 'Pallavi', 452145623, 'abc@test.com', 'Rahul', '2-3 Year', 'Nursery-2.5 to 4 years', 'NA', '2023-03-21 03:48:25', NULL, NULL, '2023-03-21 03:50:07'),
(4, 493477266, 'Sushil', 'Amita', 5236520145, 'ahd@test.com', 'Tanvi', '3-4 Year', 'Junior KG- 3.5 to 5 years', 'Looking for enrollment', '2023-03-21 03:49:55', NULL, NULL, NULL),
(5, 851293119, 'Atul k Singh', 'Ritu', 6321456203, 'rkt@test.com', 'Avisha', '2-3 Year', 'Nursery-2.5 to 4 years', ' We want to enroll our daughter for pres nursery ', '2023-03-21 04:01:25', 'Accepted', 'Enrollment accepted', '2023-03-21 04:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Playschool helps in building a strong foundation in social, pre-academics, and general life skills. It helps in the development of a child’s emotional and personal growth and provides opportunities for children to learn in ways that sheerly interests them and develop a strong sense of curiosity. Consequently, it helps in building a positive association with inquisitive learning in the form of fun activities and guided play. \r\n\r\nPlayschool is important for your child as it helps in making the child habitual of the routine. The child also becomes aware of himself/herself and develops motor and cognitive skills. Playschools further enable the child to receive individual attention as the school has a very low student-to-teacher ratio. According to the report, only 48% of poor children who were born in 2001 \"started school ready to learn, compared to 75% of children from middle-income families.\"\r\n\r\nAdditionally, the amount of time parents of various socioeconomic statuses spend reading to their children has changed since the 1960s and 1970s. Parents with higher education read to their kids for up to an additional 30 minutes per day between 2010 and 2012, which adds up by the time the kids enter kindergarten.The kids are given the ‘right’ toys to play with according to their age of development which helps them to develop and learn the things that can be implemented or transferred onto them, such as changing the clothes of the doll, feeding the doll, etc. Some more benefits of playschool are mentioned below: ', NULL, NULL, '2023-03-21 01:33:20'),
(2, 'contactus', 'Contact Us', '27 omar baker SantFatima masr gdeda', 'www.ganatenuersy@gmail.com', 115638292, '2023-12-14 12:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `teacherEmail` varchar(255) DEFAULT NULL,
  `teacherMobileNo` bigint(11) DEFAULT NULL,
  `teacherSubject` varchar(255) DEFAULT NULL,
  `teacherPic` varchar(255) DEFAULT NULL,
  `AddedBy` varchar(120) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `fullName`, `teacherEmail`, `teacherMobileNo`, `teacherSubject`, `teacherPic`, `AddedBy`, `regDate`) VALUES
(8, 'amal ', 'amal@gmail.com', 101010101, 'qqqq', 'c28fde4b301245661917bae59eb183201702546123.jpg', 'admin', '2023-12-14 09:28:43'),
(9, 'abeer', 'aber@gmail.com', 100101010, 'teacher', 'c28fde4b301245661917bae59eb183201702546265.jpg', 'admin', '2023-12-14 09:31:05'),
(10, 'mayar', 'mayar@gmail.com', 123456789, 'teacher', 'c28fde4b301245661917bae59eb183201702546391.jpg', 'admin', '2023-12-14 09:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `id` int(11) NOT NULL,
  `gurdianName` varchar(220) DEFAULT NULL,
  `gurdianEmail` varchar(220) DEFAULT NULL,
  `childName` varchar(225) DEFAULT NULL,
  `childAge` varchar(120) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `officeRemark` mediumtext DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `visitTime` varchar(220) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`id`, `gurdianName`, `gurdianEmail`, `childName`, `childAge`, `message`, `officeRemark`, `status`, `visitTime`, `postingDate`, `updationDate`) VALUES
(1, 'Rahul Singh', 'rahul12@gmail.com', 'Anik', '2-3 Year', 'I want to visit the school for my son.', 'Visited the school. they want to enroll their 2 year old daughter.', 'Visited', '2023-03-24T10:30', '2023-03-20 01:55:18', '2023-03-21 03:22:20'),
(2, 'Rahul Kumar', 'rahulk@test.com', 'Amit', '3-4 Year', 'NA', NULL, NULL, '2023-03-23T12:30', '2023-03-21 03:59:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
