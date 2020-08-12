-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 11:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitpastel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitpusers`
--

CREATE TABLE `bitpusers` (
  `BITP_UID` int(4) NOT NULL,
  `UNAME` varchar(20) NOT NULL,
  `UMAIL` varchar(40) NOT NULL,
  `UPHONE` varchar(14) NOT NULL,
  `UPASSWORD` varchar(40) NOT NULL,
  `IMAGE_ADD` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitpusers`
--

INSERT INTO `bitpusers` (`BITP_UID`, `UNAME`, `UMAIL`, `UPHONE`, `UPASSWORD`, `IMAGE_ADD`) VALUES
(1, 'Soumyadeep', 'soumyadeep62@gmail.com', '858-301-0186', '487648b2b65867706a16ae2fc325112e', '../tempupld/sp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitpusers`
--
ALTER TABLE `bitpusers`
  ADD PRIMARY KEY (`BITP_UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitpusers`
--
ALTER TABLE `bitpusers`
  MODIFY `BITP_UID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
