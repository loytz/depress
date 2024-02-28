-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 02:17 AM
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
-- Database: `amhc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `occupation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `occupation`) VALUES
(1, 'Sample Name', 'Sample Middle Name', 'Sample Last Name', 'advancementalhealth09@gmail.com', 'Vld4TG5aclZkcWo5cmp1N3NuOUozdz09', 'Sample Occupation');

-- --------------------------------------------------------

--
-- Table structure for table `learners_assessment`
--

CREATE TABLE `learners_assessment` (
  `id` bigint(10) NOT NULL,
  `lrn` varchar(12) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `year_level` int(10) NOT NULL,
  `depression_score` float NOT NULL,
  `summary_choice` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`summary_choice`)),
  `assessment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learners_assessment`
--

INSERT INTO `learners_assessment` (`id`, `lrn`, `strand`, `year_level`, `depression_score`, `summary_choice`, `assessment_date`) VALUES
(1, '110000545454', 'STEM', 11, 4.15, '[\"5\",\"4\",\"3\",\"5\",\"4\",\"3\",\"5\",\"4\",\"3\",\"5\",\"3\",\"5\",\"5\",\"5\",\"5\",\"5\",\"1\",\"3\",\"5\",\"5\"]', '2024-01-11'),
(2, '999562323223', 'GAS', 11, 2.8, '[\"5\",\"4\",\"4\",\"2\",\"2\",\"2\",\"2\",\"2\",\"3\",\"5\",\"5\",\"5\",\"1\",\"1\",\"1\",\"2\",\"2\",\"3\",\"2\",\"3\"]', '2024-01-16'),
(3, '123356000266', 'STEM', 12, 4, '[\"5\",\"5\",\"2\",\"2\",\"5\",\"3\",\"5\",\"3\",\"5\",\"2\",\"5\",\"4\",\"5\",\"5\",\"1\",\"5\",\"4\",\"5\",\"4\",\"5\"]', '2024-01-12'),
(4, '000212323566', 'ABM', 11, 3.5, '[\"5\",\"4\",\"3\",\"2\",\"3\",\"4\",\"5\",\"2\",\"3\",\"1\",\"5\",\"4\",\"3\",\"5\",\"1\",\"3\",\"4\",\"5\",\"4\",\"4\"]', '2024-01-12'),
(5, '112125454222', 'Gas', 12, 3.65, '[\"5\",\"4\",\"3\",\"5\",\"5\",\"1\",\"3\",\"3\",\"4\",\"5\",\"4\",\"3\",\"2\",\"5\",\"4\",\"3\",\"2\",\"4\",\"3\",\"5\"]', '2024-01-14'),
(6, '003232255552', 'ICT', 10, 3.5, '[\"5\",\"1\",\"3\",\"2\",\"4\",\"4\",\"5\",\"2\",\"4\",\"4\",\"4\",\"4\",\"4\",\"5\",\"3\",\"4\",\"2\",\"2\",\"4\",\"4\"]', '2024-01-21');

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
-- Indexes for table `learners_assessment`
--
ALTER TABLE `learners_assessment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learners_assessment`
--
ALTER TABLE `learners_assessment`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
