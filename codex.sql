-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 03:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psw` varchar(8) NOT NULL,
  `winner` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `psw`, `winner`) VALUES
(1, 'sgv9506@gmail.com', 'sgv9506', 19297);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `student_code` int(50) NOT NULL,
  `name` varchar(70) NOT NULL,
  `department` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `score` int(10) NOT NULL,
  `date` datetime(6) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`student_code`, `name`, `department`, `class`, `score`, `date`, `college`) VALUES
(18116, 'Adesh Ganpati Medhe', 'Computer Science and Enginnering', 'Third year', 30, '2021-07-22 18:23:38.000000', 'Dr. J. J. Magdum College of Engineering, Jaysingpur');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(50) NOT NULL,
  `student_code` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college` varchar(70) NOT NULL,
  `department` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `submitted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `student_code`, `name`, `email`, `college`, `department`, `class`, `psw`, `submitted`) VALUES
(1, 19297, 'Swarupa Gajanan Veturlekar', 'veturlekarswarupa2@gmail.com', 'Dr. J. J. Magdum College of Enginnering, Jaysingpur', 'Civil Enginnering', 'Third year', 'Swara@95', 0),
(11, 18116, 'Adesh Ganpati Medhe', 'adeshmedhe0000@gmail.com', 'Dr. J. J. Magdum College of Engineering, Jaysingpur', 'Computer Science and Enginnering', 'Third year', 'Adesh@1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`student_code`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
