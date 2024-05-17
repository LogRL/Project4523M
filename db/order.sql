-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2024-05-17 14:32:37
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

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `sales_manager_id` int DEFAULT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manager_contactnumber` int DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` date NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deliverty_date` date NOT NULL,
  `partimgage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `partname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Quantity` int NOT NULL,
  `price` double NOT NULL,
  `Amount` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `item_id` int NOT NULL,
  `dealer_id` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `item_id_fk` (`item_id`),
  KEY `sales_manager_id_fk` (`sales_manager_id`),
  KEY `dealer_id_fk` (`dealer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `dealer_id_fk` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`deal_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `spare` (`item_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sales_manager_id_fk` FOREIGN KEY (`sales_manager_id`) REFERENCES `manager` (`sales_manager_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
