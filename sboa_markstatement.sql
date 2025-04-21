-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sboa markstatement`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Password` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Email`, `Password`) VALUES
('Arjumaan21', 'arjumaan21@gmail.com', '1234'),
('Myself21', 'blank@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `marklist`
--

CREATE TABLE `marklist` (
  `ADNO` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ROLLNO` int(5) NOT NULL,
  `CLASS` int(5) NOT NULL,
  `SECTION` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GROUPS` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LANGUAGE` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EXAMINATION` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `YEAR` varchar(10) DEFAULT NULL,
  `ENG` varchar(3) DEFAULT NULL,
  `LANG` varchar(3) DEFAULT NULL,
  `PHY_ECO` varchar(3) DEFAULT NULL,
  `CHE_ACC` varchar(3) DEFAULT NULL,
  `MAT_COM` varchar(3) DEFAULT NULL,
  `BIO_CS_CA_BM` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marklist2`
--

CREATE TABLE `marklist2` (
  `ADNO` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ROLLNO` int(5) NOT NULL,
  `CLASS` int(5) NOT NULL,
  `SECTION` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EXAMINATION` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `YEAR` varchar(10) DEFAULT NULL,
  `ENG` varchar(3) DEFAULT NULL,
  `TAM` varchar(3) DEFAULT NULL,
  `MAT` varchar(3) DEFAULT NULL,
  `SCI` varchar(3) DEFAULT NULL,
  `SOC_SCI` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `NAME` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `ADNO` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0000/00',
  `CLASS` int(5) NOT NULL DEFAULT 11,
  `SECTION` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A',
  `ROLLNO` int(5) NOT NULL DEFAULT 11101,
  `GROUPS` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'BIO-MATHS',
  `LANGUAGE` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE `student2` (
  `NAME` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `ADNO` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0000/00',
  `CLASS` int(5) NOT NULL DEFAULT 1,
  `SECTION` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A',
  `ROLLNO` int(5) NOT NULL DEFAULT 1101
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ADNO`),
  ADD UNIQUE KEY `ROLLNO` (`ROLLNO`);

--
-- Indexes for table `student2`
--
ALTER TABLE `student2`
  ADD PRIMARY KEY (`ADNO`),
  ADD UNIQUE KEY `ROLLNO` (`ROLLNO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
