-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 06:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hitrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `autonomy_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `external_marks` double NOT NULL,
  `internal_marks` double NOT NULL,
  `total_marks` double NOT NULL,
  `year_of_exam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit_points` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `Theory_Papers_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Paper_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Credit_Points` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college_roll_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registration_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autonomy_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_joining` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_passout` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `dept_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_code`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`emp_code`,`dept_code`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`autonomy_roll`,`paper_code`,`year_of_exam`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`Paper_Code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`autonomy_roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`paper_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
