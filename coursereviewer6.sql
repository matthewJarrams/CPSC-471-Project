-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 10:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursereviewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `Building_name` varchar(45) NOT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`Building_name`, `Type`) VALUES
('Mac Hall', 'Food area');

-- --------------------------------------------------------

--
-- Table structure for table `building_review`
--

CREATE TABLE `building_review` (
  `Building_Review_id` int(11) NOT NULL,
  `Building_name` varchar(45) NOT NULL,
  `Accessibility` varchar(45) DEFAULT NULL,
  `Is_Crowded` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building_review`
--

INSERT INTO `building_review` (`Building_Review_id`, `Building_name`, `Accessibility`, `Is_Crowded`) VALUES
(4, 'Mac Hall', 'Great', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Code`, `Description`) VALUES
('CPSC 418', 'Cryptography '),
('CPSC 471', 'Database course');

-- --------------------------------------------------------

--
-- Table structure for table `class_review`
--

CREATE TABLE `class_review` (
  `Class_review_id` int(11) NOT NULL,
  `Class_code` varchar(45) NOT NULL,
  `Would_take_again` varchar(3) DEFAULT NULL,
  `Required` varchar(3) DEFAULT NULL,
  `Textbook` varchar(3) DEFAULT NULL,
  `Work_load` varchar(15) DEFAULT NULL,
  `Difficulty` varchar(45) DEFAULT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_review`
--

INSERT INTO `class_review` (`Class_review_id`, `Class_code`, `Would_take_again`, `Required`, `Textbook`, `Work_load`, `Difficulty`, `Semester`, `Year`) VALUES
(1, 'CPSC 471', 'yes', 'no', 'no', 'heavy', 'hard', 'Fall 2020', 2003);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `Club_name` varchar(45) NOT NULL,
  `Club_description` varchar(150) DEFAULT NULL,
  `Club_location` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`Club_name`, `Club_description`, `Club_location`) VALUES
('Chess', 'Play matches', 'MS 1148'),
('Key club', 'Volunteering club', 'mac hall');

-- --------------------------------------------------------

--
-- Table structure for table `club_review`
--

CREATE TABLE `club_review` (
  `Club_Review_id` int(11) NOT NULL,
  `Club_Name` varchar(45) NOT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Academic` varchar(45) DEFAULT NULL,
  `Leisure` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_review`
--

INSERT INTO `club_review` (`Club_Review_id`, `Club_Name`, `Cost`, `Academic`, `Leisure`) VALUES
(2, 'Chess', 400, 'yes', 'yes'),
(3, 'Key club', 0, 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_Code` varchar(45) NOT NULL,
  `D_Description` varchar(100) DEFAULT NULL,
  `D_Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`D_Code`, `D_Description`, `D_Name`) VALUES
('CPSC', 'Computer Science Department', 'Computer Science'),
('ENGL', 'English Department, analyze complex literature', 'English'),
('MATH', 'Mathematics Department, solve complex math problems', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `E_review_id` int(11) NOT NULL,
  `E_Building_name` varchar(45) NOT NULL,
  `Experience` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`E_review_id`, `E_Building_name`, `Experience`) VALUES
(4, 'Mac Hall', 'Socializing with my friends during lunch');

-- --------------------------------------------------------

--
-- Table structure for table `graduate_student`
--

CREATE TABLE `graduate_student` (
  `SG_id` int(11) NOT NULL,
  `GDep_code` varchar(45) DEFAULT NULL,
  `Faculty` varchar(45) DEFAULT NULL,
  `Has_graduated` varchar(45) DEFAULT NULL,
  `Research_interest` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `graduate_student`
--

INSERT INTO `graduate_student` (`SG_id`, `GDep_code`, `Faculty`, `Has_graduated`, `Research_interest`) VALUES
(2, 'ENGL', 'Faculty of Arts', 'no', 'Shakesphere'),
(3, 'MATH', 'Faculty of Science', 'yes', 'Graph Theory');

-- --------------------------------------------------------

--
-- Table structure for table `makes_review`
--

CREATE TABLE `makes_review` (
  `Stu_R_id` int(11) NOT NULL,
  `Review_M_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makes_review`
--

INSERT INTO `makes_review` (`Stu_R_id`, `Review_M_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `member_of`
--

CREATE TABLE `member_of` (
  `StuClubID` int(11) NOT NULL,
  `Club_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_of`
--

INSERT INTO `member_of` (`StuClubID`, `Club_name`) VALUES
(1, 'Chess'),
(1, 'Key club'),
(2, 'Chess'),
(3, 'Chess');

-- --------------------------------------------------------

--
-- Table structure for table `minors_in`
--

CREATE TABLE `minors_in` (
  `Stu_ID` int(11) NOT NULL,
  `MinD_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minors_in`
--

INSERT INTO `minors_in` (`Stu_ID`, `MinD_code`) VALUES
(1, 'MATH');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `OffDepCode` varchar(45) NOT NULL,
  `Class_O_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`OffDepCode`, `Class_O_code`) VALUES
('CPSC', 'CPSC 418'),
('CPSC', 'CPSC 471');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `Prof_id` int(11) NOT NULL,
  `Department_code` varchar(45) DEFAULT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`Prof_id`, `Department_code`, `First_name`, `Last_name`) VALUES
(1000, 'CPSC', 'James', 'Colin'),
(1001, 'ENGL', 'Gareth', 'Smith'),
(1002, 'MATH', 'Sarah', 'Wood');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_id` int(11) NOT NULL,
  `Description_review` varchar(500) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Date_made` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_id`, `Description_review`, `Rating`, `Date_made`) VALUES
(1, 'Great Class', 10, '2020-09-09 06:00:00'),
(2, 'Great club and fun', 7, '2020-09-30 06:00:00'),
(3, 'Fun club', 8, '2020-09-08 06:00:00'),
(4, 'Great building to have fun with friends and to get food', 9, '2020-11-20 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `Stu_id` int(11) NOT NULL,
  `Class_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`Stu_id`, `Class_code`) VALUES
(1, 'CPSC 471');

-- --------------------------------------------------------

--
-- Table structure for table `ta_classes`
--

CREATE TABLE `ta_classes` (
  `TA_ID` int(11) NOT NULL,
  `Class_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta_classes`
--

INSERT INTO `ta_classes` (`TA_ID`, `Class_name`) VALUES
(3, 'Discrete Math'),
(2, 'Introduction to Language Arts');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `Prof_T_id` int(11) NOT NULL,
  `Class_T_code` varchar(45) NOT NULL,
  `Year` varchar(45) DEFAULT NULL,
  `Semester` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`Prof_T_id`, `Class_T_code`, `Year`, `Semester`) VALUES
(1000, 'CPSC 471', '2020', 'Fall');

-- --------------------------------------------------------

--
-- Table structure for table `undergraduate_student`
--

CREATE TABLE `undergraduate_student` (
  `S_id` int(11) NOT NULL,
  `Dep_code` varchar(45) DEFAULT NULL,
  `Has_graduated` varchar(45) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Concentration` varchar(45) DEFAULT NULL,
  `Faculty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `undergraduate_student`
--

INSERT INTO `undergraduate_student` (`S_id`, `Dep_code`, `Has_graduated`, `Year`, `Concentration`, `Faculty`) VALUES
(1, 'CPSC', 'no', 3, 'Software Eng', 'Faculty of Science');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) DEFAULT NULL,
  `Date_made` date DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Super_flag` int(11) DEFAULT NULL,
  `Permissions` varchar(45) DEFAULT NULL,
  `Client_flag` int(11) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  `Univeristy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_name`, `Last_name`, `Date_made`, `Username`, `Password`, `Super_flag`, `Permissions`, `Client_flag`, `email_address`, `Role`, `Univeristy`) VALUES
(1, 'Jack', 'Leclerc', '2020-03-14', 'JL1000', 'password', 0, 'none', 1, 'Jack.Leclerc1@gmail.com', 'user', 'University of Calgary'),
(2, 'Karen', 'Russell', '2020-04-04', 'KR100', 'greatpassword', 0, 'none', 1, 'KarenR52@hotmail.com', 'user', 'University of Calgary'),
(3, 'George', 'Norris', '2020-05-04', 'NorG45', 'bestpassword', 0, 'none', 1, 'GerogeNorris@yahoo.com', 'user', 'University of Calgary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`Building_name`);

--
-- Indexes for table `building_review`
--
ALTER TABLE `building_review`
  ADD PRIMARY KEY (`Building_Review_id`,`Building_name`),
  ADD KEY `BuildingNameReviewFK_idx` (`Building_name`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `class_review`
--
ALTER TABLE `class_review`
  ADD PRIMARY KEY (`Class_review_id`,`Class_code`),
  ADD KEY `ClassReviewCodeFK_idx` (`Class_code`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`Club_name`);

--
-- Indexes for table `club_review`
--
ALTER TABLE `club_review`
  ADD PRIMARY KEY (`Club_Review_id`,`Club_Name`),
  ADD KEY `ClubNameReviewFK_idx` (`Club_Name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_Code`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`E_review_id`,`E_Building_name`,`Experience`),
  ADD KEY `E_BuildingFK_idx` (`E_Building_name`);

--
-- Indexes for table `graduate_student`
--
ALTER TABLE `graduate_student`
  ADD PRIMARY KEY (`SG_id`),
  ADD KEY `GDepFK_idx` (`GDep_code`);

--
-- Indexes for table `makes_review`
--
ALTER TABLE `makes_review`
  ADD PRIMARY KEY (`Stu_R_id`,`Review_M_id`),
  ADD KEY `Review_MadeFK_idx` (`Review_M_id`);

--
-- Indexes for table `member_of`
--
ALTER TABLE `member_of`
  ADD PRIMARY KEY (`StuClubID`,`Club_name`),
  ADD KEY `ClubMemberFK_idx` (`Club_name`);

--
-- Indexes for table `minors_in`
--
ALTER TABLE `minors_in`
  ADD PRIMARY KEY (`MinD_code`,`Stu_ID`),
  ADD KEY `MinorFKS_idx` (`Stu_ID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OffDepCode`,`Class_O_code`),
  ADD KEY `OfferingCourseFK_idx` (`Class_O_code`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`Prof_id`),
  ADD KEY `ProfFK_idx` (`Department_code`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_id`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`Stu_id`,`Class_code`),
  ADD KEY `CFK_idx` (`Class_code`);

--
-- Indexes for table `ta_classes`
--
ALTER TABLE `ta_classes`
  ADD PRIMARY KEY (`Class_name`,`TA_ID`),
  ADD KEY `TAClasses_idx` (`TA_ID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`Prof_T_id`,`Class_T_code`),
  ADD KEY `TeachingClassFK_idx` (`Class_T_code`);

--
-- Indexes for table `undergraduate_student`
--
ALTER TABLE `undergraduate_student`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `MajFK_idx` (`Dep_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_review`
--
ALTER TABLE `building_review`
  ADD CONSTRAINT `BuildingNameReviewFK` FOREIGN KEY (`Building_name`) REFERENCES `building` (`Building_name`),
  ADD CONSTRAINT `BuildingReviewFK` FOREIGN KEY (`Building_Review_id`) REFERENCES `review` (`Review_id`);

--
-- Constraints for table `class_review`
--
ALTER TABLE `class_review`
  ADD CONSTRAINT `ClassReviewCodeFK` FOREIGN KEY (`Class_code`) REFERENCES `class` (`Code`),
  ADD CONSTRAINT `ClassReviewFK` FOREIGN KEY (`Class_review_id`) REFERENCES `review` (`Review_id`);

--
-- Constraints for table `club_review`
--
ALTER TABLE `club_review`
  ADD CONSTRAINT `ClubNameReviewFK` FOREIGN KEY (`Club_Name`) REFERENCES `club` (`Club_name`),
  ADD CONSTRAINT `ClubReviewFK` FOREIGN KEY (`Club_Review_id`) REFERENCES `review` (`Review_id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `E_BuildingFK` FOREIGN KEY (`E_Building_name`) REFERENCES `building` (`Building_name`),
  ADD CONSTRAINT `E_BuildingR_FK` FOREIGN KEY (`E_review_id`) REFERENCES `review` (`Review_id`);

--
-- Constraints for table `graduate_student`
--
ALTER TABLE `graduate_student`
  ADD CONSTRAINT `GDepFK` FOREIGN KEY (`GDep_code`) REFERENCES `department` (`D_Code`),
  ADD CONSTRAINT `GradFK` FOREIGN KEY (`SG_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `makes_review`
--
ALTER TABLE `makes_review`
  ADD CONSTRAINT `Review_MadeFK` FOREIGN KEY (`Review_M_id`) REFERENCES `review` (`Review_id`),
  ADD CONSTRAINT `Student_RMFK` FOREIGN KEY (`Stu_R_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `member_of`
--
ALTER TABLE `member_of`
  ADD CONSTRAINT `ClubMemberFK` FOREIGN KEY (`Club_name`) REFERENCES `club` (`Club_name`),
  ADD CONSTRAINT `StudentClubID` FOREIGN KEY (`StuClubID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `minors_in`
--
ALTER TABLE `minors_in`
  ADD CONSTRAINT `MinorDep` FOREIGN KEY (`MinD_code`) REFERENCES `department` (`D_Code`),
  ADD CONSTRAINT `MinorFKS` FOREIGN KEY (`Stu_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `DepCodeOfferingFK` FOREIGN KEY (`OffDepCode`) REFERENCES `department` (`D_Code`),
  ADD CONSTRAINT `OfferingCourseFK` FOREIGN KEY (`Class_O_code`) REFERENCES `class` (`Code`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `ProfFK` FOREIGN KEY (`Department_code`) REFERENCES `department` (`D_Code`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `CFK` FOREIGN KEY (`Class_code`) REFERENCES `class` (`Code`),
  ADD CONSTRAINT `StuFK` FOREIGN KEY (`Stu_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `ta_classes`
--
ALTER TABLE `ta_classes`
  ADD CONSTRAINT `TAClasses` FOREIGN KEY (`TA_ID`) REFERENCES `graduate_student` (`SG_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `TeachingClassFK` FOREIGN KEY (`Class_T_code`) REFERENCES `class` (`Code`),
  ADD CONSTRAINT `TeachingProfFK` FOREIGN KEY (`Prof_T_id`) REFERENCES `professor` (`Prof_id`);

--
-- Constraints for table `undergraduate_student`
--
ALTER TABLE `undergraduate_student`
  ADD CONSTRAINT `MajFK` FOREIGN KEY (`Dep_code`) REFERENCES `department` (`D_Code`),
  ADD CONSTRAINT `StudentFK` FOREIGN KEY (`S_id`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
