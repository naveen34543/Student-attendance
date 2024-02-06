-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `day_to_day_attendance`
--

CREATE TABLE `day_to_day_attendance` (
  `sname` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `attendance_status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `day_to_day_attendance`
--

INSERT INTO `day_to_day_attendance` (`sname`, `reg`, `course`, `year`, `hour`, `semester`, `attendance_status`, `date`) VALUES
('Naveen', '123', 'MCA', 2023, 'I', 'I', 'present', '2024-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `index`
--

CREATE TABLE `index` (
  `user` varchar(25) NOT NULL,
  `reg` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index`
--

INSERT INTO `index` (`user`, `reg`, `pass`, `mobile`, `email`) VALUES
('Naveen', '123', '123', 45454545, 'naveen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `studenntregister`
--

CREATE TABLE `studenntregister` (
  `sname` varchar(30) NOT NULL,
  `reg` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenntregister`
--

INSERT INTO `studenntregister` (`sname`, `reg`, `course`, `year`, `email`, `mobile`) VALUES
('Naveen', '123', 'MCA', 2023, 'naveen@gmail.com', 123451234);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
