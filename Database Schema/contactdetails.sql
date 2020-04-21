-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2020 at 01:58 PM
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
-- Table structure for table `contactdetails`
--

CREATE TABLE `contactdetails` (
  `contactInfoID` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `venue` varchar(80) NOT NULL,
  `number_guests` int(11) NOT NULL,
  `event_date` varchar(11) NOT NULL,
  `comments` varchar(300) NOT NULL,
  `consent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`contactInfoID`, `full_name`, `email`, `phone_number`, `venue`, `number_guests`, `event_date`, `comments`, `consent`) VALUES
(1, 'Michael Mulholland', 'micmul06@yahoo.ie', 870845656, 'Bellingham Castle', 100, '19/06/2020', 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789 @{}[];:\'<,>.?/!\"Â£â‚¬%^&*()-_=+|\\#~', 'on'),
(3, 'Kevin Flanagan', 'kevflan@yahoo.ie', 878865321, 'TF', 200, '26/06/2020', 'Test Message', 'on'),
(7, 'sss', 'www@www', 22, 'qweqw', 222, '01/05/2020', 'qwqw', 'on'),
(8, 'iyg', 'uh@dqwd', 999, 'n', 99, '20/04/2020', 'jnln', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`contactInfoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `contactInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
