-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graph_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `pattern_tabs`
--

CREATE TABLE `pattern_tabs` (
  `id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `ikey` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pattern_tabs`
--

INSERT INTO `pattern_tabs` (`id`, `picture`, `ikey`) VALUES
(1, 'bench1.gif', '1'),
(2, 'bench2.gif', '2'),
(3, 'bench3.gif', '3'),
(4, 'bench4.gif', '4'),
(5, 'bench5.gif', '5'),
(6, 'bench6.gif', '6'),
(7, 'bench7.gif', '7'),
(8, 'bench8.gif', '8'),
(9, 'bench9.gif', '9'),
(10, 'bench10.gif', '10'),
(11, 'bench11.gif', '11'),
(12, 'bench12.gif', '12'),
(13, 'bench13.gif', '13'),
(14, 'bench14.gif', '14'),
(15, 'bench15.gif', '15'),
(16, 'bench16.gif', '16');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id` int(11) NOT NULL,
  `usr` text NOT NULL,
  `sig` text NOT NULL,
  `b1` varchar(11) NOT NULL,
  `b2` varchar(11) NOT NULL,
  `b3` varchar(11) NOT NULL,
  `b4` varchar(11) NOT NULL,
  `b5` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `usr`, `sig`, `b1`, `b2`, `b3`, `b4`, `b5`) VALUES
(1, 'akins@gmail.com', 'NULL', '415,8.09375', '419,17.0937', '417,10.0937', '415,6.09375', '422,15.0937'),
(2, 'as@g.com', 'NULL', '417,12.0937', '419,19.0937', '412,17.0937', '17,289.0937', '415,16.0937'),
(3, 'asap@g.com', 'NULL', '413,20.0937', '417,289.093', '417,11.0937', '420,19.0937', '412,27.0937'),
(4, 'dele@gmail.com', 'NULL', '408.8125,46', '408.8125,49', '62.8125,35.', '38.8125,242', '414.8125,38'),
(5, 'kunle@gmail.com', 'NULL', '414,16.0937', '409,275.093', '222,146.093', '11,11.09375', '12,295.0937'),
(6, 'k@gmail.com', 'NULL', '16,17.09375', '16,14.09375', '30,19.09375', '24,22.09375', '19,21.09375'),
(7, 'j@j.com', 'NULL', '423,14.0937', '425,25.0937', '412,20.0937', '22,27.09375', '56,92.09375'),
(8, 'cv@c.com', 'NULL', '424.171875,', '426.171875,', '7.171875,9.', '424.171875,', '6.171875,5.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pattern_tabs`
--
ALTER TABLE `pattern_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pattern_tabs`
--
ALTER TABLE `pattern_tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
