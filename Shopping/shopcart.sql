-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 12:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pid` int(20) NOT NULL,
  `uname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pid`, `uname`) VALUES
(645, 'Keval'),
(647, 'Keval'),
(646, 'Ishan'),
(646, 'Keval'),
(650, 'Keval'),
(651, 'Keval');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_des` varchar(100) NOT NULL,
  `c_img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_des`, `c_img`) VALUES
(43, 'Women Fashion', 'Not Available', 'Women Fashion_woman.png'),
(44, 'Electronics', 'Not Available', 'Books_responsive.png'),
(45, 'Men Fashion', 'Not Available', 'Men Fashion_man.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pimage` varchar(50) NOT NULL,
  `pdes` varchar(150) NOT NULL,
  `price` int(20) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pimage`, `pdes`, `price`, `category`) VALUES
(643, 'Shirt', 'Shirt_polo.png', 'not available', 500, 'Men Fashion'),
(644, 'T-shirt', 'T-shirt_shirt.png', 'not available', 600, 'Men Fashion'),
(646, 'Mobile', 'Mobile_smartphone-call.png', 'not available', 600, 'Electronics'),
(648, 'Dress', 'Dress_dress.png', 'Not Available', 500, 'Women Fashion'),
(651, 'Television', 'Television_monitor.png', 'Not Available', 25000, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `pro_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ID`, `firstname`, `lastname`, `emailid`, `password`, `address`, `contact`, `pro_image`) VALUES
(15, 'Keval', 'Bhogayata', 'bhogayatakb@gmail.com', '7359402419', 'Rameshwar Nagar', '9099953167', 'Keval_Prisma 2.jpg'),
(18, 'Ishan', 'Patel', 'ishan@gmail.com', '7359402409', 'Junagadh', '7359402409', 'Ishan_Prisma 1.jpg'),
(19, 'Kunal', 'Dholiya', 'kunal@gmail.com', '7359402439', '', '0', 'Kunal_Result 1.png'),
(20, 'Rudraksh', 'Shukla', 'banna@gmail.com', '7359402439', '', '0', 'Rudraksh_Pinak 1.jpg'),
(21, 'Vaibhav', 'Shah', 'vaibhav@gmail.com', 'qwerty', 'Sanskar Nagar, Bhuj, Kutch', '9725574272', 'Vaibhav_Prisma 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopadmin`
--

CREATE TABLE `shopadmin` (
  `adminid` int(20) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopadmin`
--

INSERT INTO `shopadmin` (`adminid`, `adminname`, `adminpass`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `shopadmin`
--
ALTER TABLE `shopadmin`
  ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `shopadmin`
--
ALTER TABLE `shopadmin`
  MODIFY `adminid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
