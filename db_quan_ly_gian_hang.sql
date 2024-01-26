-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 09:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(9, 'Tương ớt', 10000, 0, 42, 1),
(10, 'Pate', 25000, 0, 42, 1),
(11, 'Bánh mì', 1000, 0, 42, 1),
(12, 'Trứng', 3000, 0, 42, 1),
(14, 'Bánh mì pate trứng', 0, 25000, 42, 2),
(15, 'Sữa tươi', 30000, 0, 43, 1),
(16, 'Trân châu', 15000, 0, 43, 1),
(17, 'Trà ', 40000, 0, 43, 1),
(18, 'Trà sữa trân châu ', 0, 35000, 43, 2),
(19, 'Trà sữa nướng ', 0, 40000, 43, 2),
(20, 'Táo', 15000, 0, 44, 1),
(21, 'Cà Rốt', 25000, 0, 44, 1),
(22, 'Si rô đường', 30000, 0, 44, 1),
(23, 'Nước ép táo ', 0, 25000, 44, 2),
(24, 'Nước ép cà rốt', 0, 35000, 44, 2);

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
(42, 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '0928817229', 1),
(43, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '0359020898', 1),
(44, 'Nguyễn Văn AA', 'nguyenvana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '0359020888', 1);

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
(33, 8, 24, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
