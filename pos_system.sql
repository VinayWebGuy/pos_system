-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 01:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `unique_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'b728d9571d34cd80c23104e44dff869c1701156023', 'Charger', 'charger', 1, '2023-11-28 07:20:23', '2023-11-28 07:55:23'),
(2, '34457b322a744d9e37fe2783e0f2f4511701156029', 'Earphones', 'earphones', 1, '2023-11-28 07:20:29', '2023-11-28 07:20:29'),
(3, '11290d644f90ec01fc6486a5f986429e1701156032', 'Phone Case', 'phone-case', 1, '2023-11-28 07:20:32', '2023-11-28 07:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `buying_price` float DEFAULT NULL,
  `selling_price` float DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `images` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `unique_id`, `name`, `slug`, `category`, `quantity`, `buying_price`, `selling_price`, `discount_type`, `discount`, `status`, `images`, `created_at`, `updated_at`) VALUES
(3, 'f0118e9bd2c4fb29c64ee03abce698b831701158103', 'Samsung Charger', 'samsung-charger', 1, 25, 130, 390, 'percent', 5, 1, '1701158146-samsung charger.jpg,1701158146-samsung-charger.jpg', '2023-11-28 07:55:03', '2023-11-28 07:55:46'),
(4, '46b8c981c8be8de47c47cd2de16751d621701174074', 'Boat Earphones', 'boat-earphones', 2, 50, 400, 650, 'fixed', 50, 1, '1701174074-earphones.png', '2023-11-28 17:51:14', '2023-11-28 17:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_email` varchar(255) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `notifications` int(11) NOT NULL DEFAULT 1,
  `preferred_system` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`id`, `business_name`, `business_email`, `business_address`, `full_name`, `mobile`, `city`, `state`, `notifications`, `preferred_system`, `currency`, `pwd`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smart Club', 'smartclub@gmail.com', 'Shop no 3, Railway Road, Karnal', 'Vinay Munjal', '7206881088', 'Karnal', 'Haryana', 1, 'pc', '₹', 'e10adc3949ba59abbe56e057f20f883e', 1, '2023-11-28 06:45:08', '2023-11-28 06:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `unique_id`, `name`, `email`, `mobile`, `status`, `city`, `state`, `created_at`, `updated_at`) VALUES
(2, 'f05c497693f26b5885d945c9f1d362de1701160007', 'Angad Singh', 'iamangad@gmail.com', '7206881088', 1, 'Karnal', 'Haryana', '2023-11-28 13:56:47', '2023-11-28 14:51:38'),
(3, '71ba98aecd7885526bbe81a6fb8ad3181701163291', 'Preeti Arora', 'preetiaccessories@gmail.com', '9812242412', 1, 'Panipat', 'Haryana', '2023-11-28 14:51:31', '2023-11-28 14:51:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup`
--
ALTER TABLE `setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
