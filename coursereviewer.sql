-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 07:55 PM
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
-- Table structure for table `class_review`
--

CREATE TABLE `class_review` (
  `Review_id` int(11) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Would_take_again` varchar(45) NOT NULL,
  `Required` varchar(45) NOT NULL,
  `Textbook` varchar(45) NOT NULL,
  `Work_load` varchar(45) NOT NULL,
  `Difficulty` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_review`
--

INSERT INTO `class_review` (`Review_id`, `Code`, `Would_take_again`, `Required`, `Textbook`, `Work_load`, `Difficulty`, `Semester`, `Year`) VALUES
(2, 'CPSC 471', 'No', 'No', 'Fundamentals of Database Systems', 'Medium', 'Medium', 'Fall', '2020'),
(3, 'CPSC 471', 'No', 'No', 'Fundamentals of Database Systems', 'Medium', 'Medium', 'Fall', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Date_made` date NOT NULL DEFAULT current_timestamp(),
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Super_flag` varchar(45) NOT NULL DEFAULT '0',
  `Client_flag` varchar(45) NOT NULL DEFAULT '1',
  `Email_address` varchar(45) NOT NULL,
  `Role` varchar(45) NOT NULL,
  `University` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_name`, `Last_name`, `Date_made`, `Username`, `Password`, `Super_flag`, `Client_flag`, `Email_address`, `Role`, `University`) VALUES
(1, 'John', 'Smith', '0000-00-00', 'johnsmith', 'cd4388c0c62e65ac8b99e3ec49fd9409', '0', '1', 'johnsmith@ucalgary.ca', 'Professor', 'Harvard'),
(2, 'Spider', 'Man', '2020-11-12', 'spiderman', '9f05aa4202e4ce8d6a72511dc735cce9', '0', '1', 'spiderman@gmail.com', 'Spider-Man', 'New York University'),
(3, 'Bat', 'Man', '2020-11-12', 'batman', 'ec0e2603172c73a8b644bb9456c1ff6e', '0', '1', 'batman@ucalgart.ca', 'Batman', 'University of Gotham');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_review`
--
ALTER TABLE `class_review`
  ADD PRIMARY KEY (`Review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_review`
--
ALTER TABLE `class_review`
  MODIFY `Review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
