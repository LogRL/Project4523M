-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2024-07-23 04:35:59
-- 伺服器版本： 8.0.37
-- PHP 版本： 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `projectdb`
--
CREATE DATABASE IF NOT EXISTS `projectdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `projectdb`;

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weight` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `category_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `item`
--

TRUNCATE TABLE `item`;
--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image`, `item_desc`, `weight`, `quantity`, `price`, `category_id`, `product_id`) VALUES
(1, 'Sheet Metal 1', '../asserts/img/A-Sheet Metal/100001.jpg', 'Sheet Metal 1', 5, 47, 100, 1, 1),
(2, 'Sheet Metal 2', '../asserts/img/A-Sheet Metal/100002.jpg', 'Sheet Metal 2', 1, 2498, 9999, 1, 2),
(3, 'Major Assemblies 1', '../asserts/img/B-Major Assemblies/200001.jpg', 'Major Assemblies 1 desc', 5, 1500, 50, 2, 1),
(4, 'Major Assemblies 2', '../asserts/img/B-Major Assemblies/200002.jpg', 'Major Assemblies 2 desc', 1, 2499, 80, 2, 2),
(5, 'Sheet Metal 3', '../asserts/img/A-Sheet Metal/100003.jpg', 'Sheet Metal 3 desc ', 4, 2502, 60, 1, 3),
(6, 'Sheet Metal 4', '../asserts/img/A-Sheet Metal/100004.jpg', 'Sheet Metal 4', 8, 1, 40, 1, 4),
(7, 'Sheet Metal 5', '../asserts/img/A-Sheet Metal/100005.jpg', 'Sheet Metal 5 desc', 10, 6502, 25, 1, 5),
(8, 'Major Assemblies 3', '../asserts/img/B-Major Assemblies/200003.jpg', 'Major Assemblies 3 desc', 15, 6500, 90, 2, 3),
(9, 'Major Assemblies 4', '../asserts/img/B-Major Assemblies/200004.jpg', 'Major Assemblies 4 desc', 20, 7499, 100, 2, 4),
(10, 'Major Assemblies 5', '../asserts/img/B-Major Assemblies/200005.jpg', 'Major Assemblies 5 desc', 25, 850, 110, 2, 5),
(11, 'Light\r\nComponents 1', '../asserts/img/C-Light Components/300001.jpg', 'Light\r\nComponents 1 desc', 10, 1200, 10, 3, 1),
(12, 'Light\r\nComponents 2', '../asserts/img/C-Light Components/300002.jpg', 'Light\r\nComponents 2 desc', 15, 1300, 15, 3, 2),
(13, 'Light\r\nComponents 3', '../asserts/img/C-Light Components/300003.jpg', 'Light\r\nComponents 3 desc', 20, 1400, 20, 3, 3),
(14, 'Light\r\nComponents 4', '../asserts/img/C-Light Components/300004.jpg', 'Light\r\nComponents 4 desc', 25, 1500, 25, 3, 4),
(15, 'Light\r\nComponents 5', '../asserts/img/C-Light Components/300005.jpg', 'Light\r\nComponents 5 desc', 30, 1600, 30, 3, 5),
(16, 'Accessories 1', '../asserts/img/D-Accessories/400001.jpg', 'Accessories 1 desc', 1, 249, 1, 4, 1),
(17, 'Accessories 2', '../asserts/img/D-Accessories/400002.jpg', 'Accessories 2 desc', 2, 260, 2, 4, 2),
(18, 'Accessories 3', '../asserts/img/D-Accessories/400003.jpg', 'Accessories 3 desc', 3, 270, 3, 4, 3),
(19, 'Accessories 4', '../asserts/img/D-Accessories/400004.jpg', 'Accessories 4 desc', 4, 280, 4, 4, 4),
(20, 'Accessories 5', '../asserts/img/D-Accessories/400005.jpg', 'Accessories 5 desc', 5, 290, 5, 4, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE IF NOT EXISTS `item_category` (
  `categroy_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`categroy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `item_category`
--

TRUNCATE TABLE `item_category`;
--
-- 傾印資料表的資料 `item_category`
--

INSERT INTO `item_category` (`categroy_id`, `category`) VALUES
(1, 'Sheet Metal'),
(2, 'Major Assemblies'),
(3, 'Light Components'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `deal_id` int NOT NULL,
  `sm_id` int DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `total_price` int NOT NULL,
  `shipping_cost` int NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `deal_id` (`deal_id`),
  KEY `sm_id` (`sm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `order`
--

TRUNCATE TABLE `order`;
--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_time`, `address`, `delivery_date`, `deal_id`, `sm_id`, `order_status`, `total_price`, `shipping_cost`, `shipping_method`) VALUES
(1, '2024-07-23', '12:31:14', 'Meow! Meow! Meow!Meow!Meow!', '2024-07-30', 1, NULL, 'waiting to process', 10909, 750, 'Weight'),
(2, '2024-07-23', '12:31:20', 'Meow! Meow! Meow!Meow!Meow!', '2024-07-30', 1, 1, 'accepted', 2320, 2050, 'Weight'),
(3, '2024-07-23', '12:31:29', 'Meow! Meow! Meow!Meow!Meow!', '2024-07-30', 1, 1, 'rejected', 556, 550, 'Weight'),
(4, '2024-07-23', '12:31:38', 'Meow! Meow! Meow!Meow!Meow!', '2024-07-30', 1, NULL, 'cancel', 862, 850, 'Weight'),
(5, '2024-07-23', '12:32:01', 'Meow! Meow! Meow!Meow!Meow!', '2024-07-25', 1, NULL, 'waiting to process', 301, 300, 'Weight');

-- --------------------------------------------------------

--
-- 資料表結構 `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`order_id`,`item_id`),
  KEY `fk_spare_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `order_item`
--

TRUNCATE TABLE `order_item`;
--
-- 傾印資料表的資料 `order_item`
--

INSERT INTO `order_item` (`order_id`, `item_id`, `quantity`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 5, 1),
(2, 4, 1),
(2, 8, 1),
(2, 9, 1),
(3, 16, 1),
(3, 17, 1),
(3, 18, 1),
(4, 18, 1),
(4, 19, 1),
(4, 20, 1),
(5, 16, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `sales_manager`
--

DROP TABLE IF EXISTS `sales_manager`;
CREATE TABLE IF NOT EXISTS `sales_manager` (
  `sm_id` int NOT NULL AUTO_INCREMENT,
  `pwd` int NOT NULL,
  `sm_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_num` int NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `sales_manager`
--

TRUNCATE TABLE `sales_manager`;
--
-- 傾印資料表的資料 `sales_manager`
--

INSERT INTO `sales_manager` (`sm_id`, `pwd`, `sm_name`, `contact_name`, `contact_num`) VALUES
(1, 123, 'ken_sm', 'Ken Sales Manager', 54946051),
(2, 123, 'ken_sm2', 'ken sales manager 2', 54946052);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `deal_id` int NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` int NOT NULL,
  `contact_num` int NOT NULL,
  `fax_num` int NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `user`
--

TRUNCATE TABLE `user`;
--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`deal_id`, `deal_name`, `email`, `pwd`, `contact_num`, `fax_num`, `address`) VALUES
(1, 'ken_deal', 'ken_deal@gmail.com', 123, 54946051, 54946051, 'Meow! Meow! Meow!Meow!Meow!'),
(2, 'ken_deal2', 'ken_deal2@gmail.com', 123, 60515494, 60515494, 'QingYi');

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`deal_id`) REFERENCES `user` (`deal_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`sm_id`) REFERENCES `sales_manager` (`sm_id`);

--
-- 資料表的限制式 `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_spare_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
