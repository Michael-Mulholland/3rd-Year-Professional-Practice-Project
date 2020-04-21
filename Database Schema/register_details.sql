-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2020 at 07:32 PM
-- Server version: 5.7.27
-- PHP Version: 7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_details`
--

CREATE TABLE `register_details` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `emailAddress` mediumtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_details`
--

INSERT INTO `register_details` (`id`, `fullname`, `emailAddress`, `username`, `password`) VALUES
(1, 'Administrator', '', 'admin', '$2y$10$VBEYs5jJ1m5nsras7qrEbu7Ds.IsRIq.QDfwKfv1Y1bBk4kDZrXqq'),
(2, 'Evelyn Begley', 'Evelyn@gmail.com', 'abcde', '$2y$10$3aVIa67IlWAlaTrCYQpX1uJ.R0KVg/afWavekQzLe8ODR3TXrYeq2'),
(3, 'David Jones', 'dj15@yahoo.ie', 'fghij', '$2y$10$cxVF5Alz3AqmeRLupRGF/e.jl5q2pfEih.qUVhemaw7MzCeI8NBvq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_details`
--
ALTER TABLE `register_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_details`
--
ALTER TABLE `register_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
