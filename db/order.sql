-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2024-05-27 14:20:30
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
-- 資料庫： `project4523mdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dealer`
--

DROP TABLE IF EXISTS `dealer`;
CREATE TABLE IF NOT EXISTS `dealer` (
  `dealerID` int NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `dealerName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contactName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contactNumber` int NOT NULL,
  `faxNumber` int NOT NULL,
  `deliveryAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`dealerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `dealer`
--

INSERT INTO `dealer` (`dealerID`, `password`, `dealerName`, `contactName`, `contactNumber`, `faxNumber`, `deliveryAddress`) VALUES
(1, '001', 'd001', 'KenLau', 54946051, 54946051, 'Chai Wan');

-- --------------------------------------------------------

--
-- 資料表結構 `salesmanager`
--

DROP TABLE IF EXISTS `salesmanager`;
CREATE TABLE IF NOT EXISTS `salesmanager` (
  `salesManagerID` int NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `managerName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contactName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contactNumber` int NOT NULL,
  PRIMARY KEY (`salesManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `salesmanager`
--

INSERT INTO `salesmanager` (`salesManagerID`, `password`, `managerName`, `contactName`, `contactNumber`) VALUES
(1, '001', 'sm001', 'Lau King Yuet', 54946051);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
