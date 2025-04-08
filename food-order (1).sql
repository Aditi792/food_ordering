-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(13, 'Jaison E Mathewerr', 'jaison123', '5f4dcc3b5aa765d61d8327deb882cf99'),
(14, 'Varghese Babu', 'password', '5f4dcc3b5aa765d61d8327deb882cf99'),
(34, 'ADITI MONDAL', 'aditi12', '81dc9bdb52d04dc20036dbd8313ed055'),
(35, 'Administrator', 'admin123', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(35, 'burger', 'Food_Category_643.jpg', 'No', 'Yes'),
(37, 'pizza', 'Food_Category_546.jpg ', 'Yes', 'Yes'),
(38, 'Dhosa', 'Food_Category_141.jpg ', 'Yes', 'Yes'),
(39, 'fried rice', 'Food_Category_444.jpg', 'No', 'Yes'),
(40, 'Biriyani', 'Food_Category_171.jpg', 'No', 'Yes'),
(41, 'chili chicken', 'Food_Category_381.jfif ', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(42, 'Hyderabadi Veg Biryani', 'Mixed vegetables inside layers of fluffy basmati rice ', 123.00, 'Food_Category_4495.jpg', 40, 'Yes', 'Yes'),
(43, 'Mediterranean Pizza', 'pizza sauce, mozzarella, pesto and fresh mozzarella.', 525.00, 'Food-Name-8513.jpg', 37, 'Yes', 'Yes'),
(44, 'McChicken Burger', 'Tender and juicy chicken patty cooked to perfection with mayonnaise', 229.00, 'Food-Name-7676.jfif', 35, 'No', 'No'),
(45, 'Cheese Shawarma Burger', 'kahif special big chicken cheese made with a cheesy twist', 233.00, 'Food-Name-1410.jfif', 35, 'No', 'Yes'),
(46, 'Schezwan Chicken Fried Rice', 'Wholesome stir-fried rice topped with juicy chicken chunks', 121.00, 'Food-Name-2278.jpg', 39, 'Yes', 'Yes'),
(47, 'Chilly Chicken', 'Chicken marinated with herbs with batter and gravy made with Chinese sauces', 234.00, 'Food-Name-7288.jfif', 41, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `u_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `u_id`) VALUES
(13, 'Biriyani', 200.00, 1, 200.00, '2022-11-12 12:50:24', 'Delivered', 6),
(14, 'Best Burger', 250.00, 1, 250.00, '2022-11-12 12:56:39', 'Delivered', 6),
(15, 'Best Burger', 250.00, 1, 250.00, '2022-11-12 02:20:43', 'Delivered', 7),
(16, 'Smoky BBQ Pizza', 525.00, 1, 525.00, '2022-11-12 02:20:53', 'Delivered', 7),
(17, 'Thalaserry Beef Biryani', 170.00, 1, 170.00, '2022-11-13 07:44:42', 'Ordered', 6),
(18, 'Peri Peri Alfaham Mandhi', 240.00, 1, 240.00, '2022-11-13 01:54:44', 'Delivered', 6),
(19, 'dhosa', 100.00, 3, 300.00, '2025-04-02 18:08:02', 'On Delivery', 1),
(25, 'Schezwan Chicken Fried Rice', 121.00, 2, 242.00, '2025-04-03 10:57:58', 'Ordered', 26),
(26, 'Schezwan Chicken Fried Rice', 121.00, 1, 121.00, '2025-04-08 05:24:19', 'Delivered', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_contact` bigint(25) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `created_at`) VALUES
(6, 'jaison_e_mathew', '$2y$10$d//Ey6eukf3xhnFlHUhrwet/xaTQEmhmjyvEF.MTT1a5NgBbMbhke', 'Jaison E Mathew', 'jaisone.bca2023@saintgits.org', 9526519828, 'Enchakattil Chengannur', '2022-11-12 17:20:06'),
(7, 'febin_binoy', '$2y$10$3.3PY8VemjmGEiYcynAB7uoRrBeAok/Sw3rv2Zo1/.P0bNi66gNbe', 'Febin Binoy', 'febin.bca2023@saintgits.org', 9038394034, 'Febin Villa Chenganassery', '2022-11-12 18:48:54'),
(8, 'varghese_babu', '$2y$10$eF5TxEyY1AS/xuJMurhvferx76E1fRe3ABxzBZQMZtJf4p3J32RRO', 'Varghese Babu', 'varghesebabu@gmail.com', 9284049384, 'Varghese Villa Chengannur', '2022-11-12 19:06:00'),
(12, 'jaison_thomas', '$2y$10$emiUy3AQRP6FMXlEb3lY4urt8jwjzHM.FZK2WZShJDLUpquCqKnAW', 'Jaison Thomas', 'jaisonthomas@gmail.com', 9319392053, 'Jaison Villa ,chengannur', '2022-11-14 21:06:09'),
(25, 'aditi', '202cb962ac59075b964b07152d234b70', 'ADITI MONDAL', 'chaitalimondal668@gmail.com', 1223333325, '16/1 K.P.N.R LANE, BARANAGAR', '2025-04-04 00:05:41'),
(26, 'sneha', '202cb962ac59075b964b07152d234b70', 'SNEHA MONDAL', 'aditimondalgc@gmail.com', 1234567890, 'Kutighat', '2025-04-04 00:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
