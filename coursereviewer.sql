-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 09:44 AM
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
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ID` int(11) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID`, `First_name`, `Last_name`, `Age`) VALUES
(1, 'kj', 'jkl', 20),
(2, 'iop', 'iop', 20),
(3, 'asd', 'jkl', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

<<<<<<< Updated upstream
DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `D_code` int NOT NULL,
  `D_description` varchar(45) DEFAULT NULL,
  `D_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`D_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) DEFAULT NULL,
  `Date_made` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Pass` varchar(45) DEFAULT NULL,
  `Super_flag` int(11) DEFAULT 0,
  `Client_flag` int(11) DEFAULT 1,
  `Email_address` varchar(45) DEFAULT NULL,
  `User_role` varchar(45) DEFAULT NULL,
  `University` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Stashed changes

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_name`, `Last_name`, `Date_made`, `Username`, `Pass`, `Super_flag`, `Client_flag`, `Email_address`, `User_role`, `University`) VALUES
(1, 'Alex', 'Tran', '2020-11-11', 'alextran', 'cpsc471', 1, 0, 'alextran@gmail.com', 'Student', 'University of Calgary'),
(2, 'Spongebob', 'Squarepants', '2020/11/12', 'spongbob', 'ddf5c9d51356f7c95ea2ff24b81f2727', 0, 1, 'spongbob@ualgary.ca', 'Burger Maker', 'University of Krusty Krabs'),
(3, 'Thor', 'God', '2020/11/12', 'Thor', 'a92da8d9ebd1059f11a0e2f66c0b8e44', 0, 1, 'Thor@ucalgary.ca', 'Lightning God', 'University of Calgary'),
(4, 'Batman', 'Guy', '2020/11/12', 'Batman', 'ddf5c9d51356f7c95ea2ff24b81f2727', 0, 1, 'Batman@ucalgary.ca', 'Dark Knight', 'University of Calgary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
<<<<<<< Updated upstream

DROP TABLE IF EXISTS `undergraduate_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `undergraduate_student` (
  `ID` int NOT NULL,
  `D_code` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `D_code_idx` (`D_code`),
  CONSTRAINT `D_code` FOREIGN KEY (`D_code`) REFERENCES `department` (`D_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

<<<<<<< Updated upstream
LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'Spongbob','Squarepants','2020/11/09','spongebob','squarepants',1,0,'spongbob@gmail.com','Burger Maker','University of Calgary');
INSERT INTO `user` Values(1, 'Patrick', 'Starfish', '2020/12/12',  'PatStar', 'password', 1, 0, 'patrck@hotmail.com', 'SuperReview', 'U of C');
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

-- Dump completed on 2020-11-09 17:44:31
=======
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> Stashed changes
