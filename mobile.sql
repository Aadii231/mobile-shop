-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2013 at 09:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `contact` varchar(22) NOT NULL,
  `status` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `address`, `contact`, `status`, `password`) VALUES
(1, 'Qaiser mehmood', 'Qaiser@gmail.com', 'street 3 muhalla rehmatabad hafizabad', '12345678234', 'Approve', 'qqqq');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL,
  `reciever_name` varchar(256) NOT NULL,
  `reciever_contact` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `mobile_company` varchar(256) NOT NULL,
  `mobile_model` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_info`
--

INSERT INTO `delivery_info` (`id`, `reciever_name`, `reciever_contact`, `address`, `amount`, `mobile_company`, `mobile_model`, `date`) VALUES
(1, 'Qaiser mehmood', '12345678234', 'street 3 muhalla rehmatabad hafizabad', 27850, 'Techno', 'spark7', '2013-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_ad`
--

CREATE TABLE `mobile_ad` (
  `id` int(11) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `color` varchar(256) NOT NULL,
  `retail_price` int(11) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `pic` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile_ad`
--

INSERT INTO `mobile_ad` (`id`, `company_name`, `model`, `sale_price`, `color`, `retail_price`, `detail`, `pic`) VALUES
(1, 'Techno', 'spark7', 27500, 'black', 25600, 'battery 4500 mA display 4x5 ', 'mobile_img/class csd1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `s_account` varchar(256) NOT NULL,
  `r_account` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `bank` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `mobile_id`, `s_account`, `r_account`, `amount`, `bank`, `date`) VALUES
(1, 1, 1, '23456789', '7865789', 27500, 'Allied', '2013-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `review_detail` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `mobile_id`, `review_detail`) VALUES
(1, 0, 1, 'amazing stuff of great mobiles');

-- --------------------------------------------------------

--
-- Table structure for table `sold_mobile`
--

CREATE TABLE `sold_mobile` (
  `id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_mobile`
--

INSERT INTO `sold_mobile` (`id`, `mobile_id`, `date`) VALUES
(1, 1, '2013-06-04'),
(2, 1, '2013-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutomer_id` (`customer_id`),
  ADD KEY `mobile_id` (`mobile_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_ad`
--
ALTER TABLE `mobile_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mobile_id` (`mobile_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mobile_id` (`mobile_id`);

--
-- Indexes for table `sold_mobile`
--
ALTER TABLE `sold_mobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobile_id` (`mobile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobile_ad`
--
ALTER TABLE `mobile_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sold_mobile`
--
ALTER TABLE `sold_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
