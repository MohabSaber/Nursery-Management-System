
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";






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



INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 1),
(3, 'Admin2', 'admin22', 1234567891, 'a@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 0);


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



INSERT INTO `tblclasses` (`id`, `teacherId`, `className`, `ageGroup`, `classTiming`, `capacity`, `feacturePic`, `addedBy`, `postingDate`) VALUES
(1, 1, 'Art and Drawing', '3-4 Year', '11-12 PM', '20', '5a202841bcc60530918a7523a5848cd31679164973.jpg', 'admin', '2023-03-18 18:42:53'),
(2, 2, 'Dance', '2-3 Year', '12-1 PM', '25', 'f73fd44701a97d0ca929f3ff41dca5171679165124.jpg', 'admin', '2023-03-18 18:45:24'),
(3, 3, 'Language and Speaking', '4-5 Year', '12-1 PM', '30', 'be498647266a2b65d6f1660ec7fe4ad61679249810.jpg', 'admin', '2023-03-18 18:46:09');





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



INSERT INTO `tblenrollment` (`id`, `enrollmentNumber`, `fatherName`, `motherName`, `parentmobNo`, `parentEmail`, `childName`, `childAge`, `enrollProgram`, `message`, `postingDate`, `enrollStatus`, `officialRemark`, `updationDate`) VALUES
(1, 4562123651, ' Mohab', 'x', 1425362514, 'x@test.com', 'omar', '2-3 Year', 'PlayGroup-1.8 to 3 years', ' We want enrollment', '2023-03-21 02:06:43', 'Accepted', 'Enrollment of the child accepted.', '2023-03-21 02:55:43');




CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Welcome to Gannate Nursery, where the seeds of knowledge and creativity are sown to nurture the future leaders of tomorrow. Our Story: Gannate Nursery was founded with a vision to provide a nurturing and stimulating environment for children to grow and thrive. Since our inception, we have been committed to creating a foundation for lifelong learning while fostering a love for exploration and discovery. Our Mission: At Gannate Nursery, our mission is to provide a safe, loving, and enriching early childhood education experience. We believe in empowering children to become confident, compassionate, and curious individuals, ready to embrace the world with enthusiasm. Our Philosophy: Child-Centered Approach: We believe that every child is unique and has their own pace of development. Our programs are designed to cater to the individual needs and interests of each child. Experiential Learning: We promote hands-on learning experiences, encouraging children to explore, experiment, and question the world around them. Holistic Development: Our curriculum encompasses not only academic skills but also social, emotional, and physical development, ensuring that children grow in all aspects. Dedicated and Caring Staff: Our team consists of passionate and experienced educators who are committed to providing a warm and nurturing atmosphere for children. Safe and Stimulating Environment: We have carefully designed our facilities to provide a secure and inspiring setting where children can flourish. Programs: We offer a range of programs tailored to the different age groups, from infants to preschoolers. Our programs include: Infant Care: A safe and loving environment for babies to develop their first social interactions. Toddler Program: Fostering independence and early social skills through play-based learning. Preschool: Preparing children for a smooth transition into elementary school with a focus on foundational skills. Enrichment Activities: Supplementing our curriculum with extracurricular activities such as art, music, and physical education. Parent Partnership: We strongly believe that parents are a childs first and most important teachers. We encourage open communication and collaboration between our educators and parents, ensuring that we work together to support each childs growth and development. Join us at Gannate Nursery and let us be a part of your childs exciting journey of discovery, growth, and learning. Together, we can help your child build a strong foundation for a successful and happy future. ', NULL, NULL, '2023-03-21 01:33:20'),
(2, 'contactus', 'Contact Us', '27 Omar baker St, Sant fatima Sq, Heliopolis, Cairo, Egypt', 'gannate-nursery@gmail.com', 1234567890, '2021-07-04 06:17:35');

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



INSERT INTO `tblteachers` (`id`, `fullName`, `teacherEmail`, `teacherMobileNo`, `teacherSubject`, `teacherPic`, `AddedBy`, `regDate`) VALUES
(1, 'Ahmed', 'Ahmed@gmail.com', 1231231231, 'Art Drawing', 'ddc01577479ff46e6d42027edc5fba5c1679016943.jpg', 'admin', '2023-03-17 01:35:43'),
(2, 'Mohab', 'Mohab@test.com', 1425362514, 'Dance', '06940303f580ef89805d5242166fb8671679017065.jpg', 'admin', '2023-03-17 01:37:45'),
(3, 'yassin', 'yasssin@test.com', 1232123210, 'Language & Speaking', 'ddc01577479ff46e6d42027edc5fba5c1679277564.jpg', 'admin', '2023-03-17 01:38:32');


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



INSERT INTO `tblvisitor` (`id`, `gurdianName`, `gurdianEmail`, `childName`, `childAge`, `message`, `officeRemark`, `status`, `visitTime`, `postingDate`, `updationDate`) VALUES
(1, 'Omar', 'omar@gmail.com', 'mohamed', '2-3 Year', 'I want to visit the school for my son.', 'Visited the school. they want to enroll their 2 year old daughter.', 'Visited', '2023-03-24T10:30', '2023-03-20 01:55:18', '2023-03-21 03:22:20'),
(2, 'Yassin', 'Yassin@test.com', 'ahmed', '3-4 Year', 'NA', NULL, NULL, '2023-03-23T12:30', '2023-03-21 03:59:58', NULL);

ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);





ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `tblenrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


COMMIT;




