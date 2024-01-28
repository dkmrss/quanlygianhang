-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 07:32 PM
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
-- Database: `db_quan_ly_gian_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `price_export` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT 1 COMMENT '1: nhập hàng, 2 : bán hàng '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `price_export`, `user_id`, `type`) VALUES
(15, 'Sữa tươi', 30000, 0, 43, 1),
(16, 'Trân châu', 15000, 0, 43, 1),
(17, 'Trà ', 40000, 0, 43, 1),
(18, 'Trà sữa trân châu ', 0, 35000, 43, 2),
(19, 'Trà sữa nướng ', 0, 40000, 43, 2),
(23, 'Nước ép táo ', 0, 25000, 44, 2),
(24, 'Nước ép cà rốt', 0, 35000, 44, 2),
(28, 'Đường', 1000, 0, 45, 1),
(29, 'Siro', 15000, 0, 45, 1),
(30, 'Thịt bò', 50000, 0, 45, 1),
(31, 'Dầu ăn', 56000, 0, 45, 1),
(32, 'Bún', 4000, 0, 45, 1),
(33, 'Thịt bò bít tết', 0, 50000, 45, 2),
(34, 'Bánh bao', 0, 25000, 45, 2),
(35, 'Bánh mì que', 0, 5000, 45, 2),
(36, 'Trà Thái', 0, 10000, 45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_role`, `phone`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '9cfe705d5edf2511f94d06b579c4a48b', 1, '1', 1),
(46, '11A1', '11@1.tp', '4466afd2612b9b40870d0b899210b870', 0, '40', 1),
(47, '11A2', '11@2.tp', 'a85030baa33512be30f8996ea22a20d8', 0, '40', 1),
(48, '11A3', '11@3.tp', 'ad398a64f71770ae5533c1a8e56c5c08', 0, '40', 1),
(49, '11A4', '11@4.tp', 'c05ab979b337162a03dad15d45d48d1a', 0, '40', 1),
(50, '11A5', '11@5.tp', '63185976676cac5572f98a2710e26f26', 0, '40', 1),
(51, '11A6', '11@6.tp', 'c7223f5616fd462517729d2bedb74ac3', 0, '40', 1),
(52, '11A7', '11@7.tp', '8550e80f959f742ef4db4e638e9a223a', 0, '40', 1),
(53, '11A8', '11@8.tp', 'ae6244fcb5d1fa2f5911a516fd5216b0', 0, '40', 1),
(54, '11A9', '11@9.tp', '33921630ab26b80761d7d314ba6c7f87', 0, '40', 1),
(55, '11A10', '11@10.tp', '70a3525b8462f3659c0b85354cf86edb', 0, '40', 1),
(56, '11A11', '11@11.tp', 'f94e21a749d2f9fb1be7db25e4ba8aff', 0, '40', 1),
(58, '11A12', '11@12.tp', '5aaa7376c808fb83e336bfc53bd85e81', 0, '40', 1),
(59, '11A13', '11@13.tp', '2fb98b9561a7cc072686f5271a704dff', 0, '40', 1),
(60, '11A14', '11@14.tp', '5146b762346c5785ab9ca1cb28566a39', 0, '40', 1),
(61, '11A15', '11@15.tp', 'f5b3fd6a3c0b4af01900774b9e028052', 0, '40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `number` int(20) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `number`, `product_id`, `type`) VALUES
(19, 10, 9, 1),
(20, 2, 10, 1),
(21, 10, 11, 1),
(22, 10, 12, 1),
(23, 5, 14, 2),
(24, 5, 15, 1),
(25, 3, 16, 1),
(26, 2, 17, 1),
(27, 5, 18, 2),
(28, 8, 19, 2),
(29, 3, 20, 1),
(30, 3, 21, 1),
(31, 5, 22, 1),
(32, 6, 23, 2),
(33, 8, 24, 2),
(34, 20, 25, 1),
(35, 20, 27, 2),
(36, 5, 17, 1),
(37, 5, 17, 1),
(38, 4, 28, 1),
(39, 4, 32, 1),
(40, -4, 28, 1),
(41, 2, 32, 1),
(42, 20, 34, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
