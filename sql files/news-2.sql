-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 06:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news` varchar(5000) NOT NULL,
  `image` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`, `image`, `date`) VALUES
(1, 'fknkelwnklqk', 'logo.png', '2022-12-09 05:33:52'),
(2, 'MANY DHJBCJCBJ\r\nBXJBCJBWCJWBCJnskncviwebvb\r\nwelvwvbjkv', 'logo.png', '2022-12-09 05:35:41'),
(3, 'ew kev lav elk vl', 'compost.png', '2022-12-09 05:40:06'),
(4, 'c. cwk wek vkv ', 'compost.png', '2022-12-09 05:40:18'),
(5, 'newnjvjebjkvb', 'logo.png', '2022-12-09 14:28:19'),
(6, 'mckncnvk', '409-grassy-globe.jpg', '2022-12-09 14:36:39'),
(7, 'jkbksjabfjkfk \r\nwnfklnefklnef\r\ne djkw efkj', 'logo.png', '2022-12-09 14:46:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
