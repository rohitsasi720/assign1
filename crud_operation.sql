-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 07:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_operation`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `title`, `price`, `image`) VALUES
(6, 'Puma', 'Clothing', 'Tshirt', 700, 'puma-tshirt.jpg'),
(8, 'Nike', 'Footwear', 'Slipper', 500, 'nike-slipper.jpg'),
(9, 'LG', 'Electronic', 'TV', 5000, 'lg-tv.avif'),
(11, 'Adidas', 'Footwear', 'Sandal', 500, 'adidas-sandal.jpg'),
(19, 'Pan Macmillan India', 'Book', 'Novel', 200, 'alchemist.jpg'),
(20, 'HRX', 'Clothing', 'Tshirt', 400, 'hrx-tshirt.jpg'),
(21, 'Manyavaar', 'Clothing', 'Saree', 800, 'saree.jpg'),
(22, 'Nike', 'Footwear', 'Sneaker', 1200, 'sneaker.jpg'),
(23, 'Arihant Books', 'Book', 'Autobiography', 300, 'wings of fire.jpg'),
(24, 'Harper Collins', 'Book', 'Novel', 300, 'Harrypotter.jpg'),
(25, 'Samsung', 'Electronic', 'TV', 5000, 'samsung-tv.jpg'),
(26, 'Dell', 'Electronic', 'Laptop', 10000, 'dell-laptop.jpg'),
(27, 'Apple', 'Electronic', 'Laptop', 12000, 'apple-laptop.jpg'),
(28, 'Wrogn', 'Clothing', 'Tshirt', 700, 'wrogn.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
