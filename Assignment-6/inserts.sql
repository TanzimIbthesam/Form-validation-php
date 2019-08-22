-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 04:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cit crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `inserts`
--

CREATE TABLE `inserts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inserts`
--

INSERT INTO `inserts` (`id`, `name`, `username`, `phonenumber`, `email`, `password`) VALUES
(1, 'Tanzim', 'tanzim', 2147483647, 'tanzim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'John Doe', 'johndoe', 2147483647, 'john@doe.com', '123456789'),
(3, 'John Doe25', 'johndoe25', 2147483647, 'john25@doe.com', '25f9e794323b453885f5181f1b624d0b'),
(5, 'John Den', 'johnden ', 2147483647, 'johnden@doe.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Tanzim', 'tanzim4', 2147483647, 'tanzim4@gmail.com', '123456789Aa'),
(7, 'Tanzim', 'tanzim656', 2147483647, 'tanzim656@gmail.com', '123456789Aa'),
(8, 'Tanzim', 'tanzim676', 2147483647, 'tanzim676@gmail.com', 'a5f2528e34b3949610b2b3cde387c84c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inserts`
--
ALTER TABLE `inserts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inserts`
--
ALTER TABLE `inserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
