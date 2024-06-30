-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2024-06-30 05:35:35
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
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `item`
--

TRUNCATE TABLE `item`;
--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image`, `item_desc`, `weight`, `quantity`, `price`, `category_id`) VALUES
(1, 'Sheet Metal 1', '../asserts/img/A-Sheet Metal/100001.jpg', 'Sheet Metal 1', 5, 2000, 100, 1),
(2, 'Sheet Metal 2', '../asserts/img/A-Sheet Metal/100002.jpg', 'Sheet Metal 2', 1, 2500, 9999, 1),
(3, 'Major Assemblies 1', '../asserts/img/B-Major Assemblies/200001.jpg', 'Major Assemblies 1 desc', 5, 1500, 50, 2),
(4, 'Major Assemblies 2', '../asserts/img/B-Major Assemblies/200002.jpg', 'Major Assemblies 2 desc', 1, 2500, 80, 2),
(5, 'Sheet Metal 3', '../asserts/img/A-Sheet Metal/100003.jpg', 'Sheet Metal 3 desc ', 4, 2500, 60, 1),
(6, 'Sheet Metal 4', '../asserts/img/A-Sheet Metal/100004.jpg', 'Sheet Metal 4', 8, 70, 40, 1),
(7, 'Sheet Metal 5', '../asserts/img/A-Sheet Metal/100005.jpg', 'Sheet Metal 5 desc', 10, 6500, 25, 1),
(8, 'Major Assemblies 3', '../asserts/img/B-Major Assemblies/200003.jpg', 'Major Assemblies 3 desc', 15, 6500, 90, 2),
(9, 'Major Assemblies 4', '../asserts/img/B-Major Assemblies/200004.jpg', 'Major Assemblies 4 desc', 20, 7500, 100, 2),
(10, 'Major Assemblies 5', '../asserts/img/B-Major Assemblies/200005.jpg', 'Major Assemblies 5 desc', 25, 850, 110, 2),
(11, 'Light\r\nComponents 1', '../asserts/img/C-Light Components/300001.jpg', 'Light\r\nComponents 1 desc', 10, 1200, 10, 3),
(12, 'Light\r\nComponents 2', '../asserts/img/C-Light Components/300002.jpg', 'Light\r\nComponents 2 desc', 15, 1300, 15, 3),
(13, 'Light\r\nComponents 3', '../asserts/img/C-Light Components/300003.jpg', 'Light\r\nComponents 3 desc', 20, 1400, 20, 3),
(14, 'Light\r\nComponents 4', '../asserts/img/C-Light Components/300004.jpg', 'Light\r\nComponents 4 desc', 25, 1500, 25, 3),
(15, 'Light\r\nComponents 5', '../asserts/img/C-Light Components/300005.jpg', 'Light\r\nComponents 5 desc', 30, 1600, 30, 3),
(16, 'Accessories 1', '../asserts/img/D-Accessories/400001.jpg', 'Accessories 1 desc', 1, 250, 1, 4),
(17, 'Accessories 2', '../asserts/img/D-Accessories/400002.jpg', 'Accessories 2 desc', 2, 260, 2, 4),
(18, 'Accessories 3', '../asserts/img/D-Accessories/400003.jpg', 'Accessories 3 desc', 3, 270, 3, 4),
(19, 'Accessories 4', '../asserts/img/D-Accessories/400004.jpg', 'Accessories 4 desc', 4, 280, 4, 4),
(20, 'Accessories 5', '../asserts/img/D-Accessories/400005.jpg', 'Accessories 5 desc', 5, 290, 5, 4);

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
(3, 'Light\r\nComponents'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_datetime` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `deal_id` int NOT NULL,
  `sm_id` int DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `deal_id` (`deal_id`),
  KEY `sm_id` (`sm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `order`
--

TRUNCATE TABLE `order`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `sales_manager`
--

TRUNCATE TABLE `sales_manager`;
--
-- 傾印資料表的資料 `sales_manager`
--

INSERT INTO `sales_manager` (`sm_id`, `pwd`, `sm_name`, `contact_name`, `contact_num`) VALUES
(1, 123, 'ken_sm', 'Ken Sales Manager', 54946051);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表新增資料前，先清除舊資料 `user`
--

TRUNCATE TABLE `user`;
--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`deal_id`, `deal_name`, `email`, `pwd`, `contact_num`, `fax_num`, `address`) VALUES
(1, 'ken_deal', 'ken_deal@gmail.com', 123, 12345678, 12345678, 'Chai Wan Estate Wan Yin House');

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
