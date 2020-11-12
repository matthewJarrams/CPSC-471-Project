CREATE DATABASE  IF NOT EXISTS `coursereviewer` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `coursereviewer`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: coursereviewer
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `building` (
  `Building_name` varchar(45) NOT NULL,
  `Type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Building_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES ('Mac Hall','Food area');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building_review`
--

DROP TABLE IF EXISTS `building_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `building_review` (
  `Building_Review_id` int NOT NULL,
  `Building_name` varchar(45) NOT NULL,
  `Accessibility` varchar(45) DEFAULT NULL,
  `Is_Crowded` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Building_Review_id`,`Building_name`),
  KEY `BuildingNameReviewFK_idx` (`Building_name`),
  CONSTRAINT `BuildingNameReviewFK` FOREIGN KEY (`Building_name`) REFERENCES `building` (`Building_name`),
  CONSTRAINT `BuildingReviewFK` FOREIGN KEY (`Building_Review_id`) REFERENCES `review` (`Review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building_review`
--

LOCK TABLES `building_review` WRITE;
/*!40000 ALTER TABLE `building_review` DISABLE KEYS */;
INSERT INTO `building_review` VALUES (4,'Mac Hall','Great','yes');
/*!40000 ALTER TABLE `building_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class` (
  `Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('CPSC 471','Database course');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_review`
--

DROP TABLE IF EXISTS `class_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_review` (
  `Class_review_id` int NOT NULL,
  `Class_code` varchar(45) NOT NULL,
  `Would_take_again` varchar(3) DEFAULT NULL,
  `Required` varchar(3) DEFAULT NULL,
  `Textbook` varchar(3) DEFAULT NULL,
  `Work_load` varchar(15) DEFAULT NULL,
  `Difficulty` varchar(45) DEFAULT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Year` year DEFAULT NULL,
  PRIMARY KEY (`Class_review_id`,`Class_code`),
  KEY `ClassReviewCodeFK_idx` (`Class_code`),
  CONSTRAINT `ClassReviewCodeFK` FOREIGN KEY (`Class_code`) REFERENCES `class` (`Code`),
  CONSTRAINT `ClassReviewFK` FOREIGN KEY (`Class_review_id`) REFERENCES `review` (`Review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_review`
--

LOCK TABLES `class_review` WRITE;
/*!40000 ALTER TABLE `class_review` DISABLE KEYS */;
INSERT INTO `class_review` VALUES (1,'CPSC 471','yes','no','no','heavy','hard','Fall 2020',2003);
/*!40000 ALTER TABLE `class_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club` (
  `Club_name` varchar(45) NOT NULL,
  `Club_description` varchar(150) DEFAULT NULL,
  `Club_location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Club_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES ('Chess','Play matches','MS 1148'),('Key club','Volunteering club','mac hall');
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club_review`
--

DROP TABLE IF EXISTS `club_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club_review` (
  `Club_Review_id` int NOT NULL,
  `Club_Name` varchar(45) NOT NULL,
  `Cost` int DEFAULT NULL,
  `Academic` varchar(45) DEFAULT NULL,
  `Leisure` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Club_Review_id`,`Club_Name`),
  KEY `ClubNameReviewFK_idx` (`Club_Name`),
  CONSTRAINT `ClubNameReviewFK` FOREIGN KEY (`Club_Name`) REFERENCES `club` (`Club_name`),
  CONSTRAINT `ClubReviewFK` FOREIGN KEY (`Club_Review_id`) REFERENCES `review` (`Review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club_review`
--

LOCK TABLES `club_review` WRITE;
/*!40000 ALTER TABLE `club_review` DISABLE KEYS */;
INSERT INTO `club_review` VALUES (2,'Chess',400,'yes','yes'),(3,'Key club',0,'no','yes');
/*!40000 ALTER TABLE `club_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `D_Code` varchar(45) NOT NULL,
  `D_Description` varchar(100) DEFAULT NULL,
  `D_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`D_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('CPSC','Computer Science Department','Computer Science'),('ENGL','English Department, analyze complex literature','English'),('MATH','Mathematics Department, solve complex math problems','Mathematics');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `experience` (
  `E_review_id` int NOT NULL,
  `E_Building_name` varchar(45) NOT NULL,
  `Experience` varchar(45) NOT NULL,
  PRIMARY KEY (`E_review_id`,`E_Building_name`,`Experience`),
  KEY `E_BuildingFK_idx` (`E_Building_name`),
  CONSTRAINT `E_BuildingFK` FOREIGN KEY (`E_Building_name`) REFERENCES `building` (`Building_name`),
  CONSTRAINT `E_BuildingR_FK` FOREIGN KEY (`E_review_id`) REFERENCES `review` (`Review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,'mac hall','Socializing with my friends during lunch');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graduate_student`
--

DROP TABLE IF EXISTS `graduate_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `graduate_student` (
  `SG_id` int NOT NULL,
  `GDep_code` varchar(45) DEFAULT NULL,
  `Faculty` varchar(45) DEFAULT NULL,
  `Has_graduated` varchar(45) DEFAULT NULL,
  `Research_interest` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`SG_id`),
  KEY `GDepFK_idx` (`GDep_code`),
  CONSTRAINT `GDepFK` FOREIGN KEY (`GDep_code`) REFERENCES `department` (`D_Code`),
  CONSTRAINT `GradFK` FOREIGN KEY (`SG_id`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graduate_student`
--

LOCK TABLES `graduate_student` WRITE;
/*!40000 ALTER TABLE `graduate_student` DISABLE KEYS */;
INSERT INTO `graduate_student` VALUES (2,'ENGL','Faculty of Arts','no','Shakesphere'),(3,'MATH','Faculty of Science','yes','Graph Theory');
/*!40000 ALTER TABLE `graduate_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makes_review`
--

DROP TABLE IF EXISTS `makes_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makes_review` (
  `Stu_R_id` int NOT NULL,
  `Review_M_id` int NOT NULL,
  PRIMARY KEY (`Stu_R_id`,`Review_M_id`),
  KEY `Review_MadeFK_idx` (`Review_M_id`),
  CONSTRAINT `Review_MadeFK` FOREIGN KEY (`Review_M_id`) REFERENCES `review` (`Review_id`),
  CONSTRAINT `Student_RMFK` FOREIGN KEY (`Stu_R_id`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makes_review`
--

LOCK TABLES `makes_review` WRITE;
/*!40000 ALTER TABLE `makes_review` DISABLE KEYS */;
INSERT INTO `makes_review` VALUES (1,1),(1,2),(1,3),(2,4);
/*!40000 ALTER TABLE `makes_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_of`
--

DROP TABLE IF EXISTS `member_of`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_of` (
  `StuClubID` int NOT NULL,
  `Club_name` varchar(45) NOT NULL,
  PRIMARY KEY (`StuClubID`,`Club_name`),
  KEY `ClubMemberFK_idx` (`Club_name`),
  CONSTRAINT `ClubMemberFK` FOREIGN KEY (`Club_name`) REFERENCES `club` (`Club_name`),
  CONSTRAINT `StudentClubID` FOREIGN KEY (`StuClubID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_of`
--

LOCK TABLES `member_of` WRITE;
/*!40000 ALTER TABLE `member_of` DISABLE KEYS */;
INSERT INTO `member_of` VALUES (1,'Chess'),(2,'Chess'),(3,'Chess'),(1,'Key club');
/*!40000 ALTER TABLE `member_of` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minors_in`
--

DROP TABLE IF EXISTS `minors_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `minors_in` (
  `Stu_ID` int NOT NULL,
  `MinD_code` varchar(45) NOT NULL,
  PRIMARY KEY (`MinD_code`,`Stu_ID`),
  KEY `MinorFKS_idx` (`Stu_ID`),
  CONSTRAINT `MinorDep` FOREIGN KEY (`MinD_code`) REFERENCES `department` (`D_Code`),
  CONSTRAINT `MinorFKS` FOREIGN KEY (`Stu_ID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minors_in`
--

LOCK TABLES `minors_in` WRITE;
/*!40000 ALTER TABLE `minors_in` DISABLE KEYS */;
INSERT INTO `minors_in` VALUES (1,'MATH');
/*!40000 ALTER TABLE `minors_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `OffDepCode` varchar(45) NOT NULL,
  `Class_O_code` varchar(45) NOT NULL,
  PRIMARY KEY (`OffDepCode`,`Class_O_code`),
  KEY `OfferingCourseFK_idx` (`Class_O_code`) /*!80000 INVISIBLE */,
  CONSTRAINT `DepCodeOfferingFK` FOREIGN KEY (`OffDepCode`) REFERENCES `department` (`D_Code`),
  CONSTRAINT `OfferingCourseFK` FOREIGN KEY (`Class_O_code`) REFERENCES `class` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES ('CPSC','CPSC 471');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `Prof_id` int NOT NULL,
  `Department_code` varchar(45) DEFAULT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Prof_id`),
  KEY `ProfFK_idx` (`Department_code`),
  CONSTRAINT `ProfFK` FOREIGN KEY (`Department_code`) REFERENCES `department` (`D_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1000,'CPSC','James','Colin'),(1001,'ENGL','Gareth','Smith'),(1002,'MATH','Sarah','Wood');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `Review_id` int NOT NULL,
  `Description_review` varchar(500) DEFAULT NULL,
  `Rating` int DEFAULT NULL,
  `Date_made` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Great Class',10,'2020-09-09 06:00:00'),(2,'Great club and fun',7,'2020-09-30 06:00:00'),(3,'Fun club',8,'2020-09-08 06:00:00'),(4,'Great building to have fun with friends and to get food',9,'2020-11-20 07:00:00');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ta_classes`
--

DROP TABLE IF EXISTS `ta_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ta_classes` (
  `TA_ID` int NOT NULL,
  `Class_name` varchar(45) NOT NULL,
  PRIMARY KEY (`Class_name`,`TA_ID`),
  KEY `TAClasses_idx` (`TA_ID`),
  CONSTRAINT `TAClasses` FOREIGN KEY (`TA_ID`) REFERENCES `graduate_student` (`SG_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ta_classes`
--

LOCK TABLES `ta_classes` WRITE;
/*!40000 ALTER TABLE `ta_classes` DISABLE KEYS */;
INSERT INTO `ta_classes` VALUES (2,'Introduction to Language Arts'),(3,'Discrete Math');
/*!40000 ALTER TABLE `ta_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `takes`
--

DROP TABLE IF EXISTS `takes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `takes` (
  `Stu_id` int NOT NULL,
  `Class_code` varchar(45) NOT NULL,
  PRIMARY KEY (`Stu_id`,`Class_code`),
  KEY `CFK_idx` (`Class_code`),
  CONSTRAINT `CFK` FOREIGN KEY (`Class_code`) REFERENCES `class` (`Code`),
  CONSTRAINT `StuFK` FOREIGN KEY (`Stu_id`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takes`
--

LOCK TABLES `takes` WRITE;
/*!40000 ALTER TABLE `takes` DISABLE KEYS */;
INSERT INTO `takes` VALUES (1,'CPSC 471');
/*!40000 ALTER TABLE `takes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teaches` (
  `Prof_T_id` int NOT NULL,
  `Class_T_code` varchar(45) NOT NULL,
  `Year` varchar(45) DEFAULT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Prof_T_id`,`Class_T_code`),
  KEY `TeachingClassFK_idx` (`Class_T_code`),
  CONSTRAINT `TeachingClassFK` FOREIGN KEY (`Class_T_code`) REFERENCES `class` (`Code`),
  CONSTRAINT `TeachingProfFK` FOREIGN KEY (`Prof_T_id`) REFERENCES `professor` (`Prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teaches`
--

LOCK TABLES `teaches` WRITE;
/*!40000 ALTER TABLE `teaches` DISABLE KEYS */;
INSERT INTO `teaches` VALUES (1000,'CPSC 471','2020','Fall');
/*!40000 ALTER TABLE `teaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `undergraduate_student`
--

DROP TABLE IF EXISTS `undergraduate_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `undergraduate_student` (
  `S_id` int NOT NULL,
  `Dep_code` varchar(45) DEFAULT NULL,
  `Has_graduated` varchar(45) DEFAULT NULL,
  `Year` int DEFAULT NULL,
  `Concentration` varchar(45) DEFAULT NULL,
  `Faculty` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`S_id`),
  KEY `MajFK_idx` (`Dep_code`),
  CONSTRAINT `MajFK` FOREIGN KEY (`Dep_code`) REFERENCES `department` (`D_Code`),
  CONSTRAINT `StudentFK` FOREIGN KEY (`S_id`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `undergraduate_student`
--

LOCK TABLES `undergraduate_student` WRITE;
/*!40000 ALTER TABLE `undergraduate_student` DISABLE KEYS */;
INSERT INTO `undergraduate_student` VALUES (1,'CPSC','no',3,'Software Eng','Faculty of Science');
/*!40000 ALTER TABLE `undergraduate_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `ID` int NOT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) DEFAULT NULL,
  `Date_made` date DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Super_flag` int DEFAULT NULL,
  `Permissions` varchar(45) DEFAULT NULL,
  `Client_flag` int DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  `Univeristy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jack','Leclerc','2020-03-14','JL1000','password',0,'none',1,'Jack.Leclerc1@gmail.com','user','University of Calgary'),(2,'Karen','Russell','2020-04-04','KR100','greatpassword',0,'none',1,'KarenR52@hotmail.com','user','University of Calgary'),(3,'George','Norris','2020-05-04','NorG45','bestpassword',0,'none',1,'GerogeNorris@yahoo.com','user','University of Calgary');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-12 14:29:06
