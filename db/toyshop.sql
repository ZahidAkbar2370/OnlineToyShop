-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 06:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblagegroups`
--

CREATE TABLE `tblagegroups` (
  `AG_ID` int(11) NOT NULL,
  `AG_Dscr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblagegroups`
--

INSERT INTO `tblagegroups` (`AG_ID`, `AG_Dscr`) VALUES
(1, 'New - Born'),
(2, '3 - 9 Months'),
(3, '10 – 18 Months'),
(4, '1.5 - 3 Years'),
(5, '3 - 5 Years'),
(6, '5 - 8 Years'),
(7, '8 - 10 Years');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE `tblcategories` (
  `cat_ID` int(11) NOT NULL,
  `cat_dscr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`cat_ID`, `cat_dscr`) VALUES
(1, 'Action figures'),
(2, 'Animals'),
(3, 'Cars and radio controlled'),
(4, 'Creative toys'),
(5, 'Dolls'),
(6, 'Educational toys'),
(7, 'Electronic toys'),
(8, 'Executive toys'),
(9, 'Food-related toys'),
(10, 'Games'),
(11, 'Model building'),
(12, 'Puzzle/assembly'),
(13, 'Science and optical'),
(14, 'Spinning toys'),
(15, 'Wooden toys');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(100) NOT NULL,
  `order_toy_id` int(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `order_by_id` varchar(250) NOT NULL,
  `order_expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `order_toy_id`, `order_status`, `order_date`, `order_by_id`, `order_expiry_date`) VALUES
(29, 2, 'Active', '2021-04-21', 'huma', '2021-04-24'),
(30, 2, 'Active', '2021-04-21', 'huma', '2021-04-24'),
(31, 6, 'Active', '2021-04-21', 'huma', '2021-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `tblordercod`
--

CREATE TABLE `tblordercod` (
  `cod_id` int(100) NOT NULL,
  `cod_toy_id` int(100) NOT NULL,
  `cod_order_date` varchar(100) NOT NULL,
  `cod_order_by_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblordercod`
--

INSERT INTO `tblordercod` (`cod_id`, `cod_toy_id`, `cod_order_date`, `cod_order_by_id`) VALUES
(6, 2, '2021-04-22 05:37:27pm', 'huma'),
(7, 2, '2021-04-22 05:55:40pm', 'huma'),
(8, 2, '2021-04-22 05:55:51pm', 'huma'),
(9, 2, '2021-04-22 05:56:00pm', 'huma'),
(10, 2, '2021-04-22 05:56:09pm', 'huma'),
(11, 2, '2021-04-22 05:56:19pm', 'huma'),
(12, 2, '2021-04-22 05:56:26pm', 'huma'),
(13, 2, '2021-04-22 05:56:33pm', 'huma'),
(14, 2, '2021-04-22 05:56:39pm', 'huma'),
(15, 2, '2021-04-22 05:56:45pm', 'huma');

-- --------------------------------------------------------

--
-- Table structure for table `tbltoys`
--

CREATE TABLE `tbltoys` (
  `Toy_ID` int(100) NOT NULL,
  `Toy_Name` varchar(200) NOT NULL,
  `Toy_Dscr` varchar(500) NOT NULL,
  `Toy_Price` int(100) NOT NULL,
  `Toy_Photo` varchar(500) NOT NULL,
  `Toy_Cat` int(100) NOT NULL,
  `Toy_Age` int(100) NOT NULL,
  `Stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltoys`
--

INSERT INTO `tbltoys` (`Toy_ID`, `Toy_Name`, `Toy_Dscr`, `Toy_Price`, `Toy_Photo`, `Toy_Cat`, `Toy_Age`, `Stock`) VALUES
(1, 'Truck', 'this is a truck', 5, 'truck.jpg', 2, 4, 2),
(2, 'Car', 'this is the car', 3, 'bn3.jpg', 1, 1, 0),
(6, 'Bus', 'this is the bus', 3, 'bn3.jpg', 1, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `fb_id` int(200) NOT NULL,
  `fb_dscr` varchar(500) NOT NULL,
  `fb_user_id` varchar(500) NOT NULL,
  `toy_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`fb_id`, `fb_dscr`, `fb_user_id`, `toy_id`) VALUES
(27, 'test here', 'huma', 1),
(28, 'test here', 'huma', 1),
(29, 'this feedback is for truck to check either it is good or not but in my opinion it is a good truck for childen quality is also very good.', 'huma', 1),
(30, 'this feedback is for truck to check either it is good or not but in my opinion it is a good truck for childen quality is also very good.', 'huma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `useraddress` varchar(500) NOT NULL,
  `usernumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `useraddress`, `usernumber`, `email`, `password`, `role`) VALUES
(1, 'huma tariq', 'address 123 address 123', '0311111111111', 'email@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(3, 'huma', 'User Address', '03211234567', 'email@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblagegroups`
--
ALTER TABLE `tblagegroups`
  ADD PRIMARY KEY (`AG_ID`);

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tblordercod`
--
ALTER TABLE `tblordercod`
  ADD PRIMARY KEY (`cod_id`);

--
-- Indexes for table `tbltoys`
--
ALTER TABLE `tbltoys`
  ADD PRIMARY KEY (`Toy_ID`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblagegroups`
--
ALTER TABLE `tblagegroups`
  MODIFY `AG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblordercod`
--
ALTER TABLE `tblordercod`
  MODIFY `cod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbltoys`
--
ALTER TABLE `tbltoys`
  MODIFY `Toy_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `fb_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
