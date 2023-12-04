-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:23 PM
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
(1, 'e179f0bcf9190ee2b46fc8381d7ed9c31701406484', 'Refined', 'refined', 1, '2023-12-01 10:24:44', '2023-12-01 10:24:44'),
(2, 'db2d405bda8a6980a6f0c1362624368c1701406488', 'Biscuits', 'biscuits', 1, '2023-12-01 10:24:48', '2023-12-01 10:24:48'),
(3, 'df6fa65df18a533349b0ad5544c082ee1701406491', 'Cold Drink', 'cold-drink', 1, '2023-12-01 10:24:51', '2023-12-01 10:24:51'),
(4, 'af334c7b6ef89b42a94f7932a1ee9ffe1701406496', 'Salt', 'salt', 1, '2023-12-01 10:24:56', '2023-12-01 10:24:56'),
(5, 'f0dc7a91ef793fd0a59d9568168dec4d1701406499', 'Sugar', 'sugar', 1, '2023-12-01 10:24:59', '2023-12-01 10:24:59'),
(6, '2e69df5961f20aee0897cf19051563441701406504', 'Oil', 'oil', 1, '2023-12-01 10:25:04', '2023-12-01 10:25:04'),
(7, 'b8ccdbffe04253da498d27b5d8686dea1701406507', 'Rusk', 'rusk', 1, '2023-12-01 10:25:07', '2023-12-01 10:25:07'),
(8, 'f2a373d72cb2ee5189b25bb18b43a3f91701406522', 'Sauce', 'sauce', 1, '2023-12-01 10:25:22', '2023-12-01 10:25:22'),
(9, '3a5951c09df623e4f8b4542604dc1d341701406541', 'Masala', 'masala', 1, '2023-12-01 10:25:41', '2023-12-01 10:25:41'),
(10, '84667ab105c327e9409ab06a6637ee661701406548', 'Namkeen', 'namkeen', 1, '2023-12-01 10:25:48', '2023-12-01 10:25:48'),
(11, '9f2692b236e2632aed785b8e600429711701406552', 'Toothpaste', 'toothpaste', 1, '2023-12-01 10:25:52', '2023-12-01 10:27:47'),
(12, 'b10b6174b818023916b983324036a5ed1701406680', 'Toothbrush', 'toothbrush', 1, '2023-12-01 10:28:00', '2023-12-01 10:28:00'),
(13, 'cce42a7254e62e9becbfc3b351875c411701406693', 'Dry Fruits', 'dry-fruits', 1, '2023-12-01 10:28:13', '2023-12-01 10:28:13'),
(14, '7192a41ca60fd5e45677d79d83d6503b1701406711', 'Detergent', 'detergent', 1, '2023-12-01 10:28:31', '2023-12-01 10:28:31');

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
(1, 'a19fc0cfd044956b155835b7c849a8bb101701515330', 'Diet Namkeen', 'diet-namkeen', 10, 0, 18, 20, NULL, NULL, 1, '', '2023-12-02 16:38:50', '2023-12-04 17:45:06'),
(2, '2037ba59b9306c02ee931b181f104487101701515415', 'Punjabi Tadka (10)', 'punjabi-tadka-10', 10, 0, 8, 10, NULL, NULL, 1, '', '2023-12-02 16:40:15', '2023-12-04 17:19:51'),
(3, 'a09c14fa7b6d444d5e9f93346ff141e651701515697', 'Sugar Packet 1kg', 'sugar-packet-1kg', 5, 0, 38, 42, 'percent', NULL, 1, '', '2023-12-02 16:44:57', '2023-12-04 17:45:24'),
(4, 'c09d3a802e744cd54da4a6f3151363e541701515720', 'Tata Salt 1kg', 'tata-salt-1kg', 4, 0, 27, 32, 'percent', NULL, 1, '', '2023-12-02 16:45:20', '2023-12-04 17:45:31'),
(5, 'a2d862483a687dbb007938c628670066131701677681', 'Badam 250g', 'badam-250g', 13, 0, 220, 250, 'percent', 5, 1, '', '2023-12-04 13:44:41', '2023-12-04 17:45:08'),
(6, '85ac0138c0fc32da99e07ed2de3b005d131701677702', 'Kaju 250g', 'kaju-250g', 13, 0, 230, 260, 'percent', 5, 1, '', '2023-12-04 13:45:02', '2023-12-04 17:19:51'),
(7, 'ab0d2250cf556e7e46286ebf9fc84259131701677724', 'Pista 250g', 'pista-250g', 13, 0, 310, 360, NULL, NULL, 1, '', '2023-12-04 13:45:24', '2023-12-04 17:19:51'),
(8, '14a82dd740b9281ab8a25d22a41b69ab131701677741', 'Kishmish 100g', 'kishmish-100g', 13, 0, 45, 70, 'fixed', 5, 1, '', '2023-12-04 13:45:41', '2023-12-04 17:19:51'),
(9, '5e50b15b128bb72fe1251c8f51a4b8af91701682282', 'Haldi Packet 100g', 'haldi-packet-100g', 9, 0, 18, 20, NULL, NULL, 1, '', '2023-12-04 15:01:22', '2023-12-04 17:52:29');

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
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `total_product_cost` float DEFAULT NULL,
  `total_products` int(11) NOT NULL,
  `total_quantity` float NOT NULL,
  `total_cost` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `bill_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `unique_id`, `invoice_no`, `supplier`, `date`, `product_id`, `product_name`, `quantity`, `cost`, `total_product_cost`, `total_products`, `total_quantity`, `total_cost`, `status`, `bill_file`, `created_at`, `updated_at`) VALUES
(17, 'e775fd1d69ccad822e3a948075aa546e1701692226', 'BPS-2023-24-14301', '1', '2023-12-04', '5e50b15b128bb72fe1251c8f51a4b8af91701682282', 'Haldi Packet 100g', 100, 18, 1800, 1, 100, 1800, 1, NULL, '2023-12-04 17:47:06', '2023-12-04 17:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `total_product_cost` float DEFAULT NULL,
  `total_products` int(11) NOT NULL,
  `total_quantity` float NOT NULL,
  `total_cost` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `unique_id`, `invoice_no`, `customer`, `date`, `product_id`, `product_name`, `quantity`, `cost`, `total_product_cost`, `total_products`, `total_quantity`, `total_cost`, `status`, `discount`, `discount_type`, `created_at`, `updated_at`) VALUES
(8, 'a138cd418bf73c84c50d1bdf244532061701692493', 'INV-01', '7008001234', '2023-12-04', '5e50b15b128bb72fe1251c8f51a4b8af91701682282', 'Haldi Packet 100g', 12, 20, 240, 1, 12, 240, 1, 0, NULL, '2023-12-04 17:51:33', '2023-12-04 17:51:33'),
(9, 'af7e8e4d02407c9c891cfaf8f7cedca51701692549', 'INV-02', '7404201252', '2023-12-04', '5e50b15b128bb72fe1251c8f51a4b8af91701682282', 'Haldi Packet 100g', 88, 20, 1760, 1, 88, 1760, 1, 0, NULL, '2023-12-04 17:52:29', '2023-12-04 17:52:29');

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
(1, 'Ramesh Kiryana Store', 'ramesh@gmail.com', 'Shop no 33, Prem Nagar Karnal', 'Ramesh Kumar', '8812292400', 'Karnal', 'Haryana', 1, 'pc', '₹', 'e15a9925cac59f52e1f520cf8e2697b9', 1, '2023-12-01 10:23:30', '2023-12-01 10:23:30');

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
(1, '2617cd7d05d3bac8dc1d35d5a62706921701409224', 'Baba Provision Store', 'baba@gmail.com', '8820204400', 1, 'Karnal', 'Haryana', '2023-12-01 11:10:24', '2023-12-01 11:10:24'),
(2, '6fc5be5d7eaf97acc9b34cd1cfa26d921701409256', 'Sumit Groceries', 'iamsumit@yahoo.com', '9416200200', 1, 'Panipat', 'Haryana', '2023-12-01 11:10:56', '2023-12-01 11:10:56'),
(3, '02d164f2b7370c09cf49a6133d376aac1701677597', 'Vishal Confectionary', 'admin@vishalconfectionary.com', '9671000002', 1, 'Karnal', 'Haryana', '2023-12-04 13:43:17', '2023-12-04 13:43:17');

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
-- Indexes for table `sale`
--
ALTER TABLE `sale`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
