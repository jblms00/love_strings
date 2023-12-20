-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovestrings_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(12) NOT NULL,
  `product_name` text NOT NULL,
  `product_type` text NOT NULL,
  `product_price` int(25) NOT NULL,
  `product_image` text NOT NULL,
  `product_description` text NOT NULL,
  `product_stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_image`, `product_description`, `product_stock`) VALUES
(1, 'Sunflower', 'Bloom', 250, 'bc-1.png', 'Each flower is carefully handmade, ensuring its durability and beauty.', 50),
(2, 'Rose v1', 'Bloom', 199, 'bc-2.png', 'Each flower is carefully handmade, ensuring its durability and beauty.', 20),
(3, 'Rose v2', 'Bloom', 250, 'bc-3.png', 'Each flower is carefully handmade, ensuring its durability and beauty.', 20),
(4, 'Daisy', 'Bloom', 250, 'bc-4.png', 'Each flower is carefully handmade, ensuring its durability and beauty.', 8),
(5, 'Pillows Hat', 'Appawrel', 189, 'ap-1.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(6, 'Pillows Bib', 'Appawrel', 199, 'ap-2.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(7, 'Matcha Hat', 'Appawrel', 209, 'ap-3.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(8, 'Matcha Bib', 'Appawrel', 199, 'ap-4.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(9, 'Moby Hat', 'Appawrel', 179, 'ap-5.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(10, 'Moby Bib', 'Appawrel', 199, 'ap-6.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(11, 'Pillows Bundle', 'Appawrel', 379, 'ap-7.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(12, 'Matcha Bundle', 'Appawrel', 399, 'ap-8.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(13, 'Moby Bundle', 'Appawrel', 370, 'ap-9.png', 'Trendy, cute & high-quality perfect for all dog breeds!', 20),
(14, 'Sunflower Earrings', 'Charm', 189, 'cc-1.png', 'A unique and fashionable accessory that will elevate your style to the next level.', 20),
(15, 'Wave Earrings', 'Charm', 189, 'cc-2.png', 'A unique and fashionable accessory that will elevate your style to the next level.', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
