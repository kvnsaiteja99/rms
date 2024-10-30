-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 05:14 AM
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
-- Database: `restaurant_billing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `item_id`, `quantity`, `added_at`) VALUES
(26, 4, 1, 31, '2024-10-26 04:12:20'),
(27, 4, 1, 31, '2024-10-26 04:17:06'),
(28, 4, 1, 31, '2024-10-26 04:17:08'),
(29, 4, 1, 31, '2024-10-26 04:17:12'),
(30, 4, 1, 31, '2024-10-26 04:17:16'),
(31, 4, 1, 31, '2024-10-26 04:17:19'),
(32, 4, 1, 31, '2024-10-26 04:17:23'),
(33, 4, 1, 31, '2024-10-26 04:17:29'),
(34, 4, 16, 1, '2024-10-26 04:22:11'),
(35, 4, 1, 1, '2024-10-26 04:22:26'),
(36, 4, 1, 1, '2024-10-26 04:22:33'),
(37, 4, 3, 2, '2024-10-26 04:22:41'),
(46, 7, 98, 1, '2024-10-29 08:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `table_number`) VALUES
(1, 'tejaa', 8),
(2, 'gyyy', 0),
(3, 'gyyy', 0),
(4, 'tejaaa', 6),
(5, 'tejaaa', 7),
(6, 'Srihari', 8),
(7, 'Joshu', 5),
(8, 'Josh', 7),
(9, 'Tejaaaa', 8),
(10, 'amar', 1),
(11, 'hiii', 8),
(12, 'hiii', 8);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `item_name`, `category`, `price`) VALUES
(1, 'Idli', 'Veg', 30.00),
(2, 'Vada', 'Veg', 25.00),
(3, 'Dosa', 'Veg', 50.00),
(4, 'Masala Dosa', 'Veg', 60.00),
(5, 'Rava Dosa', 'Veg', 65.00),
(6, 'Pesarattu', 'Veg', 55.00),
(7, 'Uttapam', 'Veg', 50.00),
(8, 'Pongal', 'Veg', 40.00),
(9, 'Sambar Rice', 'Veg', 70.00),
(10, 'Curd Rice', 'Veg', 50.00),
(11, 'Vegetable Biryani', 'Veg', 90.00),
(12, 'Tomato Rice', 'Veg', 65.00),
(13, 'Lemon Rice', 'Veg', 60.00),
(14, 'Puliyodarai', 'Veg', 60.00),
(15, 'Chapati', 'Veg', 20.00),
(16, 'Parotta', 'Veg', 25.00),
(17, 'Paneer Butter Masala', 'Veg', 100.00),
(18, 'Aloo Gobi', 'Veg', 80.00),
(19, 'Chana Masala', 'Veg', 85.00),
(20, 'Bhindi Fry', 'Veg', 70.00),
(21, 'Sambar', 'Veg', 30.00),
(22, 'Rasam', 'Veg', 25.00),
(23, 'Papad', 'Veg', 15.00),
(24, 'Chutney', 'Veg', 10.00),
(25, 'Chicken Biryani', 'Non-Veg', 150.00),
(26, 'Mutton Biryani', 'Non-Veg', 180.00),
(27, 'Egg Biryani', 'Non-Veg', 120.00),
(28, 'Fish Curry', 'Non-Veg', 130.00),
(29, 'Chicken 65', 'Non-Veg', 140.00),
(30, 'Mutton Curry', 'Non-Veg', 170.00),
(31, 'Prawn Curry', 'Non-Veg', 160.00),
(32, 'Fish Fry', 'Non-Veg', 150.00),
(33, 'Egg Curry', 'Non-Veg', 90.00),
(34, 'Pepper Chicken', 'Non-Veg', 140.00),
(35, 'Hyderabadi Chicken', 'Non-Veg', 160.00),
(36, 'Tandoori Chicken', 'Non-Veg', 180.00),
(37, 'Grilled Fish', 'Non-Veg', 170.00),
(38, 'Crab Curry', 'Non-Veg', 180.00),
(39, 'Mutton Keema', 'Non-Veg', 150.00),
(40, 'Chicken Chettinad', 'Non-Veg', 160.00),
(41, 'Kozhi Varuval', 'Non-Veg', 140.00),
(42, 'Kadai Chicken', 'Non-Veg', 150.00),
(43, 'Egg Dosa', 'Non-Veg', 80.00),
(44, 'Chicken Dosa', 'Non-Veg', 100.00),
(45, 'Fish Dosa', 'Non-Veg', 120.00),
(46, 'Egg Fried Rice', 'Non-Veg', 120.00),
(47, 'Chicken Fried Rice', 'Non-Veg', 140.00),
(48, 'Prawn Fried Rice', 'Non-Veg', 160.00),
(49, 'Medu Vada', 'Starters', 80.00),
(50, 'Idli Sambar', 'Starters', 70.00),
(51, 'Masala Vada', 'Starters', 90.00),
(52, 'Paniyaram', 'Starters', 100.00),
(53, 'Chicken 65', 'Starters', 180.00),
(54, 'Fish Fry', 'Starters', 200.00),
(55, 'Mutton Pepper Fry', 'Starters', 250.00),
(56, 'Gobi 65', 'Starters', 110.00),
(57, 'Vegetable Pakora', 'Starters', 90.00),
(58, 'Mushroom Pepper Fry', 'Starters', 150.00),
(59, 'Vegetable Biryani', 'Main Course', 220.00),
(60, 'Sambar Rice', 'Main Course', 180.00),
(61, 'Curd Rice', 'Main Course', 150.00),
(62, 'Lemon Rice', 'Main Course', 160.00),
(63, 'Pongal', 'Main Course', 140.00),
(64, 'Bisi Bele Bath', 'Main Course', 200.00),
(65, 'Tamarind Rice', 'Main Course', 150.00),
(66, 'Rasam Rice', 'Main Course', 130.00),
(67, 'Puliyogare', 'Main Course', 140.00),
(68, 'Kara Kuzhambu Rice', 'Main Course', 190.00),
(69, 'Chicken Biryani', 'Main Course', 300.00),
(70, 'Mutton Biryani', 'Main Course', 350.00),
(71, 'Fish Curry Rice', 'Main Course', 280.00),
(72, 'Egg Curry Rice', 'Main Course', 200.00),
(73, 'Chicken Curry Rice', 'Main Course', 290.00),
(74, 'Prawn Biryani', 'Main Course', 330.00),
(75, 'Crab Curry Rice', 'Main Course', 400.00),
(76, 'Naatu Kodi Pulusu Rice', 'Main Course', 320.00),
(77, 'Mutton Curry Rice', 'Main Course', 350.00),
(78, 'Egg Biryani', 'Main Course', 220.00),
(79, 'Aloo Kurma', 'Veg', 120.00),
(80, 'Bagara Baingan', 'Veg', 140.00),
(81, 'Kootu Curry', 'Veg', 130.00),
(82, 'Avial', 'Veg', 150.00),
(83, 'Vegetable Stew', 'Veg', 160.00),
(84, 'Drumstick Sambar', 'Veg', 140.00),
(85, 'Pumpkin Erissery', 'Veg', 130.00),
(86, 'Chettinad Kurma', 'Veg', 160.00),
(87, 'Pindi Miriyam', 'Veg', 150.00),
(88, 'Masala Dosa', 'Veg', 100.00),
(89, 'Andhra Chicken Curry', 'Non-Veg', 280.00),
(90, 'Mutton Rogan Josh', 'Non-Veg', 320.00),
(91, 'Kozhi Curry', 'Non-Veg', 290.00),
(92, 'Fish Molee', 'Non-Veg', 300.00),
(93, 'Crab Masala', 'Non-Veg', 380.00),
(94, 'Kerala Beef Fry', 'Non-Veg', 320.00),
(95, 'Prawn Masala', 'Non-Veg', 350.00),
(96, 'Egg Kurma', 'Non-Veg', 180.00),
(97, 'Nadan Chicken Curry', 'Non-Veg', 290.00),
(98, 'Mutton Sukka', 'Non-Veg', 330.00),
(99, 'Paneer Tikka', 'Starters', 180.00),
(100, 'Vegetable Spring Roll', 'Starters', 120.00),
(101, 'Samosa', 'Starters', 60.00),
(102, 'Hara Bhara Kebab', 'Starters', 150.00),
(103, 'Cheese Balls', 'Starters', 170.00),
(104, 'Gobi Manchurian', 'Starters', 130.00),
(105, 'Crispy Corn', 'Starters', 140.00),
(106, 'Chilli Paneer', 'Starters', 180.00),
(107, 'Onion Pakora', 'Starters', 100.00),
(108, 'Dahi Ke Kebab', 'Starters', 160.00),
(109, 'Chicken 65', 'Starters', 190.00),
(110, 'Prawn Tempura', 'Starters', 220.00),
(111, 'Chicken Lollipop', 'Starters', 180.00),
(112, 'Fish Tikka', 'Starters', 230.00),
(113, 'Mutton Kebab', 'Starters', 250.00),
(114, 'Prawn Manchurian', 'Starters', 240.00),
(115, 'Egg Pakora', 'Starters', 80.00),
(116, 'Fish Fingers', 'Starters', 200.00),
(117, 'Mutton Shami Kebab', 'Starters', 270.00),
(118, 'Chicken Wings', 'Starters', 190.00),
(119, 'Paneer Butter Masala', 'Main Course', 210.00),
(120, 'Aloo Gobi', 'Main Course', 160.00),
(121, 'Chole Bhature', 'Main Course', 140.00),
(122, 'Dal Makhani', 'Main Course', 190.00),
(123, 'Palak Paneer', 'Main Course', 200.00),
(124, 'Mix Veg Curry', 'Main Course', 180.00),
(125, 'Kadai Paneer', 'Main Course', 210.00),
(126, 'Veg Kolhapuri', 'Main Course', 180.00),
(127, 'Malai Kofta', 'Main Course', 220.00),
(128, 'Bhindi Masala', 'Main Course', 170.00),
(129, 'Butter Chicken', 'Main Course', 250.00),
(130, 'Mutton Rogan Josh', 'Main Course', 300.00),
(131, 'Chicken Chettinad', 'Main Course', 270.00),
(132, 'Fish Curry', 'Main Course', 240.00),
(133, 'Egg Curry', 'Main Course', 190.00),
(134, 'Mutton Keema', 'Main Course', 280.00),
(135, 'Prawn Masala', 'Main Course', 290.00),
(136, 'Chicken Vindaloo', 'Main Course', 260.00),
(137, 'Fish Molee', 'Main Course', 300.00),
(138, 'Andhra Chicken Curry', 'Main Course', 270.00),
(139, 'Butter Naan', 'Breads', 40.00),
(140, 'Garlic Naan', 'Breads', 50.00),
(141, 'Tandoori Roti', 'Breads', 30.00),
(142, 'Roomali Roti', 'Breads', 35.00),
(143, 'Lachha Paratha', 'Breads', 45.00),
(144, 'Missi Roti', 'Breads', 40.00),
(145, 'Plain Paratha', 'Breads', 35.00),
(146, 'Stuffed Kulcha', 'Breads', 50.00),
(147, 'Aloo Paratha', 'Breads', 45.00),
(148, 'Pudina Paratha', 'Breads', 40.00),
(149, 'Veg Biryani', 'Rice & Biryanis', 200.00),
(150, 'Chicken Biryani', 'Rice & Biryanis', 250.00),
(151, 'Mutton Biryani', 'Rice & Biryanis', 300.00),
(152, 'Egg Biryani', 'Rice & Biryanis', 180.00),
(153, 'Prawn Biryani', 'Rice & Biryanis', 320.00),
(154, 'Jeera Rice', 'Rice & Biryanis', 120.00),
(155, 'Ghee Rice', 'Rice & Biryanis', 130.00),
(156, 'Curd Rice', 'Rice & Biryanis', 110.00),
(157, 'Sambar Rice', 'Rice & Biryanis', 150.00),
(158, 'Lemon Rice', 'Rice & Biryanis', 140.00),
(159, 'Gulab Jamun', 'Desserts', 80.00),
(160, 'Rasgulla', 'Desserts', 90.00),
(161, 'Ice Cream Sundae', 'Desserts', 120.00),
(162, 'Gajar Ka Halwa', 'Desserts', 100.00),
(163, 'Ras Malai', 'Desserts', 110.00),
(164, 'Kheer', 'Desserts', 90.00),
(165, 'Brownie with Ice Cream', 'Desserts', 130.00),
(166, 'Kulfi', 'Desserts', 80.00),
(167, 'Jalebi', 'Desserts', 70.00),
(168, 'Phirni', 'Desserts', 90.00),
(169, 'Masala Chai', 'Beverages', 30.00),
(170, 'Lassi', 'Beverages', 50.00),
(171, 'Cold Coffee', 'Beverages', 60.00),
(172, 'Fresh Lime Soda', 'Beverages', 50.00),
(173, 'Sweet Lassi', 'Beverages', 55.00),
(174, 'Butter Milk', 'Beverages', 40.00),
(175, 'Mango Shake', 'Beverages', 70.00),
(176, 'Fruit Juice', 'Beverages', 60.00),
(177, 'Coca Cola', 'Beverages', 30.00),
(178, 'Sprite', 'Beverages', 30.00),
(179, 'Cheese Corn Balls', 'Starters', 120.00),
(180, 'Paneer Pakora', 'Starters', 110.00),
(181, 'Fish Amritsari', 'Starters', 210.00),
(182, 'Mutton Seekh Kebab', 'Starters', 230.00),
(183, 'Mushroom Tikka', 'Starters', 160.00),
(184, 'Paneer Lababdar', 'Main Course', 220.00),
(185, 'Mushroom Do Pyaza', 'Main Course', 190.00),
(186, 'Egg Bhurji', 'Main Course', 160.00),
(187, 'Dal Tadka', 'Main Course', 150.00),
(188, 'Rajma Curry', 'Main Course', 170.00),
(189, 'Fruit Salad with Ice Cream', 'Desserts', 120.00),
(190, 'Mysore Pak', 'Desserts', 90.00),
(191, 'Shahi Tukda', 'Desserts', 100.00),
(192, 'Basundi', 'Desserts', 110.00),
(193, 'Caramel Custard', 'Desserts', 130.00),
(194, 'Black Coffee', 'Beverages', 40.00),
(195, 'Green Tea', 'Beverages', 50.00),
(196, 'Herbal Tea', 'Beverages', 60.00),
(197, 'Strawberry Milkshake', 'Beverages', 70.00),
(198, 'Masala Soda', 'Beverages', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT 'Pending',
  `item_name` text DEFAULT NULL,
  `table` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `status`, `payment_status`, `item_name`, `table`) VALUES
(15, 8, 340.00, 'Delivered', 'Paid', 'Chicken Biryani (Qty: 1), Idli (Qty: 1), Mushroom Tikka (Qty: 1)', 1),
(16, 8, 285.00, 'Rejected', 'Pending', 'Idli (Qty: 1), Chana Masala (Qty: 3)', 1),
(17, 8, 90.00, 'Undelivered', 'Pending', 'Idli (Qty: 3)', 1),
(18, 9, 175.00, 'Delivered', 'Paid', 'Idli (Qty: 3), Chana Masala (Qty: 1)', 1),
(19, 10, 30.00, 'Delivered', 'Paid', 'Idli (Qty: 1)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_rejections`
--

CREATE TABLE `order_rejections` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `order_rejections`
--
ALTER TABLE `order_rejections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_rejections`
--
ALTER TABLE `order_rejections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `order_rejections`
--
ALTER TABLE `order_rejections`
  ADD CONSTRAINT `order_rejections_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
