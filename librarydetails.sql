-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 08:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Serial_no` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_no` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Serial_no`, `Username`, `Password`, `Name`, `Email`, `Phone_no`, `Address`, `State`) VALUES
(1, 'Ankita', '040901', 'Ankita Dey', 'ankita.raima@gmail.com', '9434800080', 'Kalnaroad Pirpukur Burdwan', 'West Bengal\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Serial_no` int(255) NOT NULL,
  `Book_id` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Serial_no`, `Book_id`, `Category`, `Name`, `Author`, `Quantity`, `Content`) VALUES
(1, '12345', 'programming', 'java', 'Biswaddip Pal', '37', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `Serial_no` int(255) NOT NULL,
  `Bookid` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Issued_date` varchar(255) NOT NULL,
  `Return_date` varchar(255) NOT NULL,
  `Amount_paid` varchar(255) NOT NULL,
  `Bookname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`Serial_no`, `Bookid`, `Username`, `email`, `Issued_date`, `Return_date`, `Amount_paid`, `Bookname`) VALUES
(1, '12345', 'ankita_04', 'ankita.raima@gmail.com', '2023-08-19', '', '', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `Serial_no` int(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_no` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`Serial_no`, `Username`, `Name`, `Email`, `Phone_no`, `State`, `Password`) VALUES
(1, 'ankita_04', 'Ankita Dey', 'ankita.raima@gmail.com', '9434800080', 'West Bengal', 'ankita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Serial_no`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Serial_no`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`Serial_no`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`Serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Serial_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `Serial_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `Serial_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
