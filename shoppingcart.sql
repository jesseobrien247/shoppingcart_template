-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2021 at 02:39 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '8d3a85614b6f848c085a4919e4a3b4c2');

-- --------------------------------------------------------

--
-- Table structure for table `authorrole`
--

CREATE TABLE `authorrole` (
  `id` int(11) DEFAULT NULL,
  `authorid` int(11) NOT NULL,
  `roleid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authorrole`
--

INSERT INTO `authorrole` (`id`, `authorid`, `roleid`) VALUES
(NULL, 1, 'Admin'),
(NULL, 2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `rrp`, `quantity`, `img`) VALUES
(1, 'Assassin\'s Creed Valhalla', '120.00', '120.00', 30, 'valhalla.jpg'),
(2, 'Assassin\'s Creed Odyssey', '100.00', '100.00', 34, 'odyssey.jpg'),
(3, 'Assassin\'s Creed Origins', '100.00', '100.00', 23, 'origins.jpg'),
(4, 'Assassin\'s Creed Syndicate', '60.00', '80.00', 7, 'syndicate.jpg'),
(5, 'Assassin\'s Creed Unity', '60.00', '80.00', 7, 'unity.jpg'),
(6, 'Assassin\'s Creed The Ezio Trilogy', '80.00', '80.00', 10, 'ezio.jpg'),
(7, 'Assassin\'s Creed 3', '40.00', '40.00', 7, 'AC3.jpg'),
(8, 'Assassin\'s Creed Black Flag', '40.00', '40.00', 12, 'blackflag.jpg'),
(9, 'Assassin\'s Creed Rogue', '20.00', '40.00', 6, 'rogue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `description`) VALUES
('Admin', 'admin perks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `authorrole`
--
ALTER TABLE `authorrole`
  ADD PRIMARY KEY (`authorid`,`roleid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
