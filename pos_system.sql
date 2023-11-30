-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 01:30 PM
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
(3, '11290d644f90ec01fc6486a5f986429e1701156032', 'Phone Case', 'phone-case', 1, '2023-11-28 07:20:32', '2023-11-28 07:20:32'),
(4, '4d77431d9282e1bb885cf7c66c1d24841701234672', 'Basic Tools', 'basic-tools', 1, '2023-11-29 10:41:12', '2023-11-29 10:41:12');

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
(4, '46b8c981c8be8de47c47cd2de16751d621701174074', 'Boat Earphones', 'boat-earphones', 2, 50, 400, 650, 'fixed', 50, 1, '1701174074-earphones.png', '2023-11-28 17:51:14', '2023-11-28 17:51:14'),
(5, '43a8f171c4508dd1a7efa91188936a2d41701234702', 'Sim Ejector Pin', 'sim-ejector-pin', 4, 500, 0.3, 2.5, NULL, NULL, 1, '', '2023-11-29 10:41:42', '2023-11-29 10:41:42'),
(6, '998438da136f5c35c5b473aa068bd65831701240706', 'Samsung F62 Case', 'samsung-f62-case', 3, 0, 40, 120, 'fixed', 20, 1, '', '2023-11-29 12:21:46', '2023-11-29 12:21:46'),
(7, '309986b82411e4f2f3d3f8ae509d177e1701240722', 'Samsung S21 Case', 'samsung-s21-case', NULL, 10, 60, 170, 'fixed', 20, 1, '', '2023-11-29 12:22:02', '2023-11-29 12:22:02'),
(8, '4c48d81371e31df74f248ec336d733bf1701240742', 'Redmi Note 11 Pro Case', 'redmi-note-11-pro-case', NULL, 40, 60, 150, NULL, NULL, 1, '', '2023-11-29 12:22:22', '2023-11-29 12:22:22'),
(9, '81bb6d52578b076a3f2e2847e04bd4181701240785', 'One Plus Earphones', 'one-plus-earphones', NULL, 3, 120, 250, 'percent', 3, 1, '', '2023-11-29 12:23:05', '2023-11-29 12:23:05'),
(10, '4c529722ef3063e8a8ccca82298997af21701240813', 'AKG Earphones', 'akg-earphones', 2, 10, 200, 270, NULL, NULL, 1, '', '2023-11-29 12:23:33', '2023-11-29 12:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` float DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `total_product_cost` float DEFAULT NULL,
  `total_products` int(11) NOT NULL,
  `total_quantity` float NOT NULL,
  `total_cost` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `unique_id`, `invoice_no`, `supplier`, `date`, `product_id`, `quantity`, `cost`, `total_product_cost`, `total_products`, `total_quantity`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, '202cb962ac59075b964b07152d234b701701347377', '123', '2', '2023-11-30', '46b8c981c8be8de47c47cd2de16751d621701174074', 10, 400, 4000, 2, 15, 5000, 1, '2023-11-30 17:59:37', '2023-11-30 17:59:37'),
(2, '202cb962ac59075b964b07152d234b701701347377', '123', '2', '2023-11-30', '4c529722ef3063e8a8ccca82298997af21701240813', 5, 200, 1000, 2, 15, 5000, 1, '2023-11-30 17:59:37', '2023-11-30 17:59:37');

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
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
