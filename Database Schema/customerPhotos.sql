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
-- Table structure for table `customerPhotos`
--

CREATE TABLE `customerPhotos` (
  `idGallery` int(11) NOT NULL,
  `userID` int(255) NOT NULL,
  `imgFullNameGallery` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerPhotos`
--

INSERT INTO `customerPhotos` (`idGallery`, `userID`, `imgFullNameGallery`) VALUES
(1, 2, '5e9df6b006d634.07781029.jpg'),
(2, 2, '5e9df6b67d9ce3.43758765.jpg'),
(3, 2, '5e9df6bfac0f58.56827132.jpg'),
(4, 2, '5e9df6de1015b2.33614640.jpg'),
(5, 3, '5e9df7037915f8.49231694.jpg'),
(6, 3, '5e9df70abbade6.81126506.jpg'),
(7, 3, '5e9df70fda1e73.10750176.jpg'),
(8, 3, '5e9df7154846b6.45278656.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerPhotos`
--
ALTER TABLE `customerPhotos`
  ADD PRIMARY KEY (`idGallery`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerPhotos`
--
ALTER TABLE `customerPhotos`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerPhotos`
--
ALTER TABLE `customerPhotos`
  ADD CONSTRAINT `CustomerPhotos` FOREIGN KEY (`userID`) REFERENCES `register_details` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
