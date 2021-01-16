-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 02:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Apple', 'Mac', 699.00, '../assets/products/a.jpg', '2021-01-15 14:29:50'),
(2, 'Apple', 'Mac Pro', 1999.00, '../assets/products/d.jpg', '2021-01-15 14:32:10'),
(3, 'Apple', 'Macbook', 1099.00, '../assets/products/f.jpg', '2021-01-15 14:33:17'),
(4, 'Apple', 'Macbok Pro', 1499.00, '../assets/products/l.jpg', '2021-01-15 14:33:53'),
(5, 'Apple', 'MacBook Air', 999.00, '../assets/products/m.jpg', '2021-01-15 14:34:31'),
(6, 'Lenovo', 'Lenovo', 499.00, '../assets/products/n.jpg', '2021-01-15 14:35:04'),
(7, 'DELL', 'DELL', 850.00, '../assets/products/k.jpg', '2021-01-15 14:35:25'),
(8, 'Microsoft', 'Microsoft', 999.00, '../assets/products/e.jpg', '2021-01-15 14:35:51'),
(11, 'Lenovo', 'Lenovo', 750.00, '../assets/products/t.jpg', '2020-03-28 11:08:57'),
(12, 'DELL', 'DELL', 599.00, '../assets/products/e.jpg', '2020-03-28 11:08:57'),
(13, 'Lenovo', 'Lenovo', 899.00, '../assets/products/x.jpg', '2020-03-28 11:08:57'),
(14, 'DELL', 'DELL', 699.00, '../assets/products/1.jpg', '2021-01-15 14:47:14'),
(15, 'Apple', 'MacBook Pro', 1399.00, '../assets/products/2.jpg', '2021-01-15 14:48:50'),
(16, 'DELL', 'DELL', 699.00, '../assets/products/3.jpg', '2021-01-15 14:50:24'),
(17, 'Apple', 'MacBook Air', 999.00, '../assets/products/4.jpg', '2021-01-15 14:51:18'),
(18, 'Lenovo', 'Lenovo', 520.00, '../assets/products/b.jpg', '2021-01-15 14:57:08'),
(19, 'Apple', 'MacBook Pro', 1399.00, '../assets/products/c.jpg', '2021-01-15 14:58:04'),
(20, 'DELL', 'DELL', 750.00, '../assets/products/g.jpg', '2021-01-15 14:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Berkay', 'Alatas', '2020-03-28 13:07:17'),
(2, 'Example', 'User', '2020-03-28 13:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
