-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2017 at 04:03 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `11708.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipadr`
--

CREATE TABLE `ipadr` (
  `id` int(6) UNSIGNED NOT NULL,
  `ipbin` int(11) DEFAULT NULL,
  `ipstring` varchar(30) DEFAULT NULL,
  `lip` int(11) DEFAULT NULL,
  `lipstring` varchar(30) DEFAULT NULL,
  `wann` timestamp NULL DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `local` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipadr`
--

INSERT INTO `ipadr` (`id`, `ipbin`, `ipstring`, `lip`, `lipstring`, `wann`, `type`, `status`, `lat`, `lng`, `local`, `name`) VALUES
(26, 1481569610, '1481569610', 168428085, '168428085', '2017-12-12 07:50:28', '88.78.245.74', 'K', 51.500999, 7.337100, '10.10.2.53', 'K2017-12-12 08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipadr`
--
ALTER TABLE `ipadr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ipadr`
--
ALTER TABLE `ipadr`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
