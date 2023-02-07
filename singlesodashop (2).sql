-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 08:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singlesodashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchuser_table`
--

CREATE TABLE `branchuser_table` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `buser` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branchuser_table`
--

INSERT INTO `branchuser_table` (`id`, `date`, `name`, `email`, `buser`) VALUES
(1, '2022-08-30', 'hussnain', 'admin@gmail.com', 'admin'),
(2, '2022-08-31', 'pagal', 'free@gmail.com', 'user'),
(4, '2022-09-14', 'pagal', 'pagal@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `branch_table`
--

CREATE TABLE `branch_table` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_table`
--

INSERT INTO `branch_table` (`id`, `date`, `name`, `address`, `city`, `phone`, `status`) VALUES
(1, '0000-00-00', 'Soda Shop', 'Sukkur', 'Rohri', '45502', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `catagory_table`
--

CREATE TABLE `catagory_table` (
  `id` int(55) NOT NULL,
  `catagory` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory_table`
--

INSERT INTO `catagory_table` (`id`, `catagory`) VALUES
(1, 'Cold '),
(5, 'refreshment');

-- --------------------------------------------------------

--
-- Table structure for table `newexpence`
--

CREATE TABLE `newexpence` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(55) NOT NULL,
  `amount` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newexpence`
--

INSERT INTO `newexpence` (`id`, `date`, `detail`, `amount`) VALUES
(2, '2022-08-30', 'update', 0),
(4, '2022-08-31', 'hjjjjjjg', 4007),
(5, '2022-09-15', 'mobile charger', 350),
(6, '2022-09-07', 'karachi', 35000),
(7, '2022-09-09', 'tea', 4000),
(8, '2022-09-09', 'karachi', 250),
(9, '2022-09-09', 'mobile charger', 100),
(10, '2022-09-10', 'mobile charger', 1200),
(11, '2022-09-10', 'asas', 121),
(12, '2022-09-10', 'mobile charger', 1200),
(13, '2022-09-10', 'asasa', 1200),
(14, '2022-09-11', 'karachi', 350),
(15, '2022-09-11', 'tea', 35000),
(16, '2022-09-10', 'roti', 100),
(17, '2022-09-10', 'mobile charger', 350),
(18, '2022-09-10', 'asasdf', 1200),
(19, '2022-09-13', 'update', 2500),
(20, '2022-09-15', 'karachi', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `newproduct`
--

CREATE TABLE `newproduct` (
  `id` int(11) NOT NULL,
  `catagory` varchar(55) NOT NULL,
  `product` varchar(55) NOT NULL,
  `refreshment` varchar(55) NOT NULL,
  `price` float NOT NULL,
  `buser` varchar(55) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newproduct`
--

INSERT INTO `newproduct` (`id`, `catagory`, `product`, `refreshment`, `price`, `buser`, `img`) VALUES
(1, 'cold drink', 'pepsi', 'fries', 59, '1', 'pepsi-can-white-background-chisinau-moldova-november-pepsi-can-white-background-pepsi-carbonated-soft-drink-produced-13129933746.jpg'),
(2, 'hot drink', 'cofe', 'fries', 221, '1', 'png-clipart-espresso-turkish-coffee-instant-coffee-cafe-coffee-tea-coffee3.png'),
(3, 'refreshment', 'burger', 'fries', 300, '1', 'burger_sandwich_PNG41352.png'),
(4, 'hot drink', 'tea', '', 60, '1', 'png-clipart-espresso-turkish-coffee-instant-coffee-cafe-coffee-tea-coffee4.png'),
(5, 'cold drink', 'Pakola', '', 60, '1', 'grocerapp-pakola-cream-soda-drink-5e6d913095e9d4.jpeg'),
(6, 'Jucies', 'cofe', '', 300, '1', 'burger_sandwich_PNG41353.png'),
(8, 'hot drink', 'burger', '', 300, '1', '67-678068_chicken-roll-png-chicken-paratha-roll-png-transparent5.png'),
(9, 'Jucies', 'burger', '', 300, '1', '67-678068_chicken-roll-png-chicken-paratha-roll-png-transparent6.png'),
(10, 'refreshment', 'roll', '', 300, '1', '67-678068_chicken-roll-png-chicken-paratha-roll-png-transparent7.png'),
(11, 'hot drink', 'cofe', '', 60, '2', 'png-clipart-espresso-turkish-coffee-instant-coffee-cafe-coffee-tea-coffee5.png');

-- --------------------------------------------------------

--
-- Table structure for table `profile_table`
--

CREATE TABLE `profile_table` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_table`
--

INSERT INTO `profile_table` (`id`, `name`, `phone`, `address`) VALUES
(1, 'biloo', '1234', 'rohri');

-- --------------------------------------------------------

--
-- Table structure for table `saledetail`
--

CREATE TABLE `saledetail` (
  `id` int(11) NOT NULL,
  `billno` int(55) NOT NULL,
  `pid` int(55) NOT NULL,
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saledetail`
--

INSERT INTO `saledetail` (`id`, `billno`, `pid`, `qty`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 1, 3, 3),
(4, 2, 1, 8),
(5, 2, 3, 4),
(6, 2, 4, 5),
(7, 2, 2, 5),
(8, 3, 1, 1),
(9, 3, 3, 1),
(10, 4, 5, 2),
(11, 4, 6, 1),
(12, 4, 8, 1),
(13, 4, 9, 1),
(14, 4, 4, 1),
(15, 4, 3, 1),
(16, 4, 2, 1),
(17, 4, 1, 1),
(18, 5, 5, 1),
(19, 6, 1, 1),
(20, 6, 3, 1),
(21, 7, 10, 1),
(22, 7, 8, 1),
(23, 7, 6, 1),
(24, 7, 5, 1),
(25, 8, 1, 1),
(26, 8, 2, 1),
(27, 9, 1, 1),
(28, 10, 1, 1),
(29, 11, 2, 1),
(30, 11, 1, 1),
(31, 11, 5, 1),
(32, 12, 2, 1),
(33, 12, 1, 1),
(34, 12, 4, 1),
(35, 13, 1, 1),
(36, 13, 2, 1),
(37, 14, 1, 1),
(38, 14, 2, 1),
(39, 15, 1, 1),
(40, 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salehead`
--

CREATE TABLE `salehead` (
  `id` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salehead`
--

INSERT INTO `salehead` (`id`, `billno`, `date`, `datetime`, `total`) VALUES
(1, 1, '2022-08-27', '2022-08-27 06:00:39', 1740),
(2, 2, '2022-08-27', '2022-08-27 06:01:16', 3077),
(3, 3, '2022-08-29', '2022-08-29 03:07:03', 359),
(4, 4, '2022-09-06', '2022-09-06 11:23:32', 1660),
(5, 5, '2022-09-06', '2022-09-06 11:58:07', 60),
(6, 6, '2022-09-07', '2022-09-07 13:47:21', 359),
(7, 7, '2022-09-08', '2022-09-08 03:56:40', 960),
(8, 8, '2022-09-09', '2022-09-09 13:54:29', 280),
(9, 9, '2022-09-09', '2022-09-09 14:45:04', 59),
(10, 10, '2022-09-10', '2022-09-10 03:36:26', 59),
(11, 11, '2022-09-13', '2022-09-13 14:45:11', 340),
(12, 12, '2022-09-15', '2022-09-15 13:28:39', 340),
(13, 13, '2022-10-18', '2022-10-18 09:46:54', 280),
(14, 14, '2022-10-18', '2022-10-18 11:39:20', 280),
(15, 15, '2022-10-26', '2022-10-26 10:57:15', 280);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_table`
--

CREATE TABLE `supplier_table` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_table`
--

INSERT INTO `supplier_table` (`id`, `name`, `address`, `phone`, `user`) VALUES
(1, 'biloo', 'rohri', '1234', 1),
(3, 'hussnain', 'lahori', '123', 1),
(4, 'pagal', 'edit', '345678', 1),
(5, '', '', '', 1),
(7, '', '', '', 1),
(8, '', '', '', 1),
(9, '', '', '', 1),
(10, '', '', '', 1),
(11, '', '', '', 1),
(12, '', '', '', 1),
(13, '', '', '', 1),
(14, '', '', '', 1),
(15, 'biloo', 'lahori', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123'),
(2, 'biloo', 'free@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchuser_table`
--
ALTER TABLE `branchuser_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_table`
--
ALTER TABLE `branch_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory_table`
--
ALTER TABLE `catagory_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newexpence`
--
ALTER TABLE `newexpence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_table`
--
ALTER TABLE `profile_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saledetail`
--
ALTER TABLE `saledetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salehead`
--
ALTER TABLE `salehead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_table`
--
ALTER TABLE `supplier_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchuser_table`
--
ALTER TABLE `branchuser_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch_table`
--
ALTER TABLE `branch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagory_table`
--
ALTER TABLE `catagory_table`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newexpence`
--
ALTER TABLE `newexpence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newproduct`
--
ALTER TABLE `newproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile_table`
--
ALTER TABLE `profile_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saledetail`
--
ALTER TABLE `saledetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `salehead`
--
ALTER TABLE `salehead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier_table`
--
ALTER TABLE `supplier_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
