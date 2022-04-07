-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 01:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-3140_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `property_type` varchar(100) DEFAULT NULL,
  `bedroom_num` int(11) DEFAULT NULL,
  `bathroom_num` int(11) DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `bedroom_img` blob DEFAULT NULL,
  `rented_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `email`, `address`, `property_type`, `bedroom_num`, `bathroom_num`, `rent`, `bedroom_img`, `rented_by`) VALUES
(1, 'James', 'james@gmail.com', '123 University Private', 'apartment', 2, 1, 1300, 0x383430373337363233623635383331313136643033363932373234312e6a7067, NULL),
(2, 'Julie', 'julie@outlook.com', '45 Merivale Road', 'townhouse', 4, 4, 2100, 0x313131313831363233623636393638396631383735383236333738312e6a7067, NULL),
(3, 'Max', 'max@gmail.com', '145 March Road', 'house', 5, 6, 3000, 0x363534383637363233623637333936636235613039383037373534322e6a7067, NULL),
(4, 'Nancy', 'nancy@gmail.com', '565 Richmond Rd', 'condo', 2, 1, 1900, 0x363833313339363233626533626638343633623135373337313134322e6a7067, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
