CREATE DATABASE  IF NOT EXISTS `coursereviewer` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
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
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES ('Mac Hall','Food area');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `building_review`
--

LOCK TABLES `building_review` WRITE;
/*!40000 ALTER TABLE `building_review` DISABLE KEYS */;
INSERT INTO `building_review` VALUES (4,'mac hall','Great','yes');
/*!40000 ALTER TABLE `building_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('CPSC 471','Database course');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class_review`
--

LOCK TABLES `class_review` WRITE;
/*!40000 ALTER TABLE `class_review` DISABLE KEYS */;
INSERT INTO `class_review` VALUES (1,'CPSC 471','yes','no','no','heavy','hard','Fall 2020',2003);
/*!40000 ALTER TABLE `class_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES ('Chess','Play matches','MS 1148'),('Key club','Volunteering club','mac hall');
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `club_review`
--

LOCK TABLES `club_review` WRITE;
/*!40000 ALTER TABLE `club_review` DISABLE KEYS */;
INSERT INTO `club_review` VALUES (2,'Chess',400,'yes','yes'),(3,'Key club',0,'no','yes');
/*!40000 ALTER TABLE `club_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('CPSC','Computer Science Department','Computer Science'),('ENGL','English Department, analyze complex literature','English'),('MATH','Mathematics Department, solve complex math problems','Mathematics');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,'mac hall','Socializing with my friends during lunch');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `graduate_student`
--

LOCK TABLES `graduate_student` WRITE;
/*!40000 ALTER TABLE `graduate_student` DISABLE KEYS */;
INSERT INTO `graduate_student` VALUES (2,'ENGL','Faculty of Arts','no','Shakesphere'),(3,'MATH','Faculty of Science','yes','Graph Theory');
/*!40000 ALTER TABLE `graduate_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `makes_review`
--

LOCK TABLES `makes_review` WRITE;
/*!40000 ALTER TABLE `makes_review` DISABLE KEYS */;
INSERT INTO `makes_review` VALUES (1,1),(1,2),(1,3),(2,4);
/*!40000 ALTER TABLE `makes_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `member_of`
--

LOCK TABLES `member_of` WRITE;
/*!40000 ALTER TABLE `member_of` DISABLE KEYS */;
INSERT INTO `member_of` VALUES (1,'Chess'),(2,'Chess'),(3,'Chess'),(1,'Key club');
/*!40000 ALTER TABLE `member_of` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `minors_in`
--

LOCK TABLES `minors_in` WRITE;
/*!40000 ALTER TABLE `minors_in` DISABLE KEYS */;
INSERT INTO `minors_in` VALUES (1,'MATH');
/*!40000 ALTER TABLE `minors_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES ('CPSC','CPSC 471');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1000,'CPSC','James','Colin'),(1001,'ENGL','Gareth','Smith'),(1002,'MATH','Sarah','Wood');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Great Class',10,'2020-09-09 06:00:00'),(2,'Great club and fun',7,'2020-09-30 06:00:00'),(3,'Fun club',8,'2020-09-08 06:00:00'),(4,'Great building to have fun with friends and to get food',9,'2020-11-20 07:00:00');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ta_classes`
--

LOCK TABLES `ta_classes` WRITE;
/*!40000 ALTER TABLE `ta_classes` DISABLE KEYS */;
INSERT INTO `ta_classes` VALUES (2,'Introduction to Language Arts'),(3,'Discrete Math');
/*!40000 ALTER TABLE `ta_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `takes`
--

LOCK TABLES `takes` WRITE;
/*!40000 ALTER TABLE `takes` DISABLE KEYS */;
INSERT INTO `takes` VALUES (1,'CPSC 471');
/*!40000 ALTER TABLE `takes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `teaches`
--

LOCK TABLES `teaches` WRITE;
/*!40000 ALTER TABLE `teaches` DISABLE KEYS */;
INSERT INTO `teaches` VALUES (1000,'CPSC 471','2020','Fall');
/*!40000 ALTER TABLE `teaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `undergraduate_student`
--

LOCK TABLES `undergraduate_student` WRITE;
/*!40000 ALTER TABLE `undergraduate_student` DISABLE KEYS */;
INSERT INTO `undergraduate_student` VALUES (1,'CPSC','no',3,'Software Eng','Faculty of Science');
/*!40000 ALTER TABLE `undergraduate_student` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2020-11-12 12:57:49
