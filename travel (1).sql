-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2020 年 01 月 13 日 04:10
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `travel`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`adminID`, `account`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test123', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE `customer_orders` (
  `customer_orderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `order_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `pay_method` varchar(255) DEFAULT NULL,
  `receive_method` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer_orders`
--

INSERT INTO `customer_orders` (`customer_orderID`, `memberID`, `status`, `order_no`, `order_date`, `name`, `phone`, `address`, `total`, `shipping`, `pay_method`, `receive_method`, `memo`, `created_at`, `updated_at`) VALUES
(49, 5, 0, 'HC20200109170028', '2020-01-09 17:00:28', '王Q', '0298765432', '馬公', '17260', '100', '信用卡', '貨到付款', NULL, '2020-01-09 17:00:28', NULL),
(50, 5, 0, 'HC20200110142452', '2020-01-10 14:24:52', '王Q', '0298765432', '馬公', '6360', '100', '信用卡', '貨到付款', NULL, '2020-01-10 14:24:52', NULL),
(51, 5, 0, 'HC20200110142525', '2020-01-10 14:25:25', '王Q', '0298765432', '馬公', '1680', '100', '信用卡', '貨到付款', NULL, '2020-01-10 14:25:25', NULL),
(52, 6, 0, 'HC20200110145556', '2020-01-10 14:55:56', '王Q', '0298765432', '馬公', '15180', '100', '信用卡', '貨到付款', NULL, '2020-01-10 14:55:56', NULL),
(53, 6, 0, 'HC20200110150112', '2020-01-10 15:01:12', '王Q', '0298765432', '馬公', '9720', '100', '信用卡', '貨到付款', NULL, '2020-01-10 15:01:12', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `members`
--

INSERT INTO `members` (`memberID`, `level`, `account`, `password`, `name`, `phone`, `email`, `birthday`, `mobile`, `gender`, `address`, `created_at`, `updated_at`, `county`, `district`, `zipcode`) VALUES
(4, 0, 'test123@gmail.com', '', '王二', '10101010', '', '2019-12-17', '010020203', 1, '中山路', NULL, NULL, '', '', ''),
(5, 0, 'test@gmail.com', 'qwerty', '王Q', '0298765432', '', '2019-12-17', NULL, 1, '馬公', '2019-12-26:11-45-36', NULL, '澎湖縣', '馬公市', '880'),
(6, 0, 'test1233@gmail.com', '123123', 'luggage123', '', '', '', '', 1, '', NULL, NULL, '', '', ''),
(7, 0, 'test1233@gmail.com', 'kuh', 'luggage', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10:15-50-38', NULL, NULL, NULL, NULL),
(8, 0, 'test1233@gmail.com', 'qqqqqq', 'luggage6', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13:09-45-58', NULL, NULL, NULL, NULL),
(9, 0, 'test123333@gmail.com', 'qqqqqq', 'luggage', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13:09-49-30', NULL, NULL, NULL, NULL),
(10, 0, 'test123333@gmail.com', 'qqqqqq', 'luggage', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13:09-49-30', NULL, NULL, NULL, NULL),
(11, 0, 'test123333@gmail.com', 'eeeeee', 'luggage', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13:09-50-24', NULL, NULL, NULL, NULL),
(12, 0, 'test123433@gmail.com', 'eeeeee', 'luggage6', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13:09-51-20', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `published_at` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`newsID`, `picture`, `published_at`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'news1.png', '1202', '尋豆師迎新春獻極品', '<h4 style=\"font-weight: 300;\"><span style=\"font-weight: 400;\"><strong>水洗曼特寧最高評選</strong></span></h4>\r\n<h5 style=\"font-weight: 400;\">～美國咖啡評鑑權威 Coffee Review 94分最高讚賞～</h5>\r\n<h5 style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">黑卡價$</span><span style=\"font-weight: 400;\">90 (</span><span style=\"font-weight: 400;\">定價</span><span style=\"font-weight: 400;\">$150)</span><span style=\"font-weight: 400;\">＊限量／新品＊</span></h5>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">產區：印尼亞齊省</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">海拔：</span><span style=\"font-weight: 400;\">1740</span><span style=\"font-weight: 400;\">公尺</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">處理：肯亞式水洗</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">焙度：中深</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">風味：巧克力、核果香氣、尾韻富有甜感</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">獲得美國 CoffeeReview 評測94分高分，富有巧克力甜味、層次豐富、口感乾淨，採用肯亞式水洗處理，透過重複循環洗淨&mdash;發酵，多次測試找出最能釋放風味的烘焙曲線，中深烘焙尾韻甜感厚實棉長。</span></p>\r\n<p style=\"font-weight: 400;\">&nbsp;</p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">註：Coffee Review是美國世界知名的咖啡評鑑指標，常被當作咖啡生豆採購指南，透過第三方專家盲測對於香味、酸度、風味、餘韻等做綜合評分，90分以上表示極優異完美之選！</span></p>', '12-02', '2019-12-31 10:48:09'),
(5, 'news2.png', '2019-12-04', '法式鹹派Ｘ玩味內餡 新上市', '<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">冬天嘴饞想來點溫暖鹹食！路易莎餐食x烘焙聯手推出三款法式鹹派「醬香濃郁的三杯杏鮑菇、辣勁十足的川味椒麻雞、及鹹香多汁的培根蔬食」</span><u><span style=\"font-weight: 400;\">即日起～12/31 三款新鹹派・</span><span style=\"font-weight: 400;\">嚐鮮價$55 /個（定價$65）</span></u><span style=\"font-weight: 400;\">，份量適中作為早餐或下午茶點心都很可以！</span></p>\r\n<p style=\"font-weight: 400;\">&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"> 三杯杏鮑菇鹹派</span> (五辛素)</p>\r\n<p><span style=\"font-weight: 400;\">遵循傳統三杯料理作法，用麻油慢煸蒜薑加入塊狀杏鮑菇煨燒，口感</span><span style=\"font-weight: 400;\">Q</span><span style=\"font-weight: 400;\">嫰、麻油醬香濃郁入味！&nbsp; &nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">主要食材：</span>〔內餡〕杏鮑菇、九層塔、蒜頭｜法式鹹派皮｜蛋奶液｜</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"> 川味椒麻雞鹹派</span> (葷)</p>\r\n<p><span style=\"font-weight: 400;\">以四川麻辣鍋元素為基底，爆炒燈籠椒、二荊條乾辣椒、大紅袍、花椒粒、青麻椒、朝天椒，加入香酥雞丁煨煮收汁，椒香酥麻辣味十足！</span><span style=\"font-weight: 400;\">&nbsp; &nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">主要食材：</span>〔內餡〕燈籠椒、二荊條乾辣椒、大紅袍、花椒粒、青麻椒、朝天椒、雞丁｜法式鹹派皮｜乳酪絲｜</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"> 培根蔬食鹹派</span> (葷)</p>\r\n<p><span style=\"font-weight: 400;\">慢炒培根出香氣後加入花椰菜碎丁拌炒，軟嫩蔬菜吸入培根香氣完美融合，少許黑胡椒提味，鹹香多汁的美味！&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">主要食材：</span>〔內餡〕培根、花椰菜、黑胡椒｜法式鹹派皮｜乳酪絲｜</p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">備註</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">・</span><span style=\"font-weight: 400;\">優惠不並行</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">・不適用網路訂購和外送服務</span></p>\r\n<p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">・品項以各門市實際販售數量為準</span></p>', '2019-12-04 16:14:45', '2019-12-31 10:46:55'),
(6, 'news4.png', '2019-12-05', '2020新年美好，與您一起慶賀', '<ul class=\"breadcrumb\">\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n<li>鼠年新春禮盒</li>\r\n</ul>', '2019-12-04 16:35:47', '2019-12-31 10:53:58'),
(17, 'news3.png', '2019-12-05', '抹茶好喝唷', '<p>一抹茶香，揭開暖心序幕<br />無糖醇濃抹茶粉，搭配新鮮牛奶<br />還可以根據你的喜好添加糖漿，客製化調整甜度!<br />試試淋上沖繩黑糖醬與烘烤黃豆撒粉<br />撲鼻淡淡甜味和糖蜜香氣，帶給你前所未有的溫暖冬季!<br /><a class=\"\" href=\"https://www.instagram.com/explore/tags/%E9%86%87%E6%BF%83%E6%8A%B9%E8%8C%B6%E9%82%A3%E5%A0%A4/\">#醇濃抹茶那堤</a>&nbsp;&amp;&nbsp;<a class=\"\" href=\"https://www.instagram.com/explore/tags/%E9%BB%91%E7%B3%96%E8%B1%86%E9%A6%99%E9%86%87%E6%BF%83%E6%8A%B9%E8%8C%B6%E9%82%A3%E5%A0%A4/\">#黑糖豆香醇濃抹茶那堤</a><br />香醇冬日、美味隨行????????&nbsp;<a class=\"\" href=\"https://www.instagram.com/explore/tags/purematchalatte/\">#PureMatchaLatte</a><br /><a class=\"\" href=\"https://www.instagram.com/explore/tags/roastedsoybeanpurematchalatte/\">#RoastedSoybeanPureMatchaLatte</a></p>', '2019-12-06 10:26:49', '2019-12-31 10:52:25');

-- --------------------------------------------------------

--
-- 資料表結構 `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_detailsID` int(11) NOT NULL,
  `customer_orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `order_details`
--

INSERT INTO `order_details` (`order_detailsID`, `customer_orderID`, `productID`, `picture`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(26, 49, 137, '20200108012153.png', 'qwer', 5780, 1, '2020-01-09 17:00:28', NULL),
(27, 49, 138, '20200108012210.png', 'asdf', 4500, 1, '2020-01-09 17:00:28', NULL),
(28, 49, 140, '20200108012912.png', 'poiu', 1200, 1, '2020-01-09 17:00:28', NULL),
(29, 49, 139, '20200108012227.png', 'zxcvcxv', 5780, 1, '2020-01-09 17:00:28', NULL),
(30, 49, 137, '20200108012153.png', 'qwer', 5780, 1, '2020-01-09 17:00:28', NULL),
(31, 49, 140, '20200108012912.png', 'poiu', 1200, 1, '2020-01-09 17:00:28', NULL),
(32, 49, 139, '20200108012227.png', 'zxcvcxv', 5780, 1, '2020-01-09 17:00:28', NULL),
(33, 49, 146, '20200110014825.png', 'luggage', 4860, 1, '2020-01-09 17:00:28', NULL),
(34, 49, 146, '20200110014825.png', 'luggage', 4860, 1, '2020-01-09 17:00:28', NULL),
(35, 49, 146, '20200110014825.png', 'luggage', 4860, 1, '2020-01-09 17:00:28', NULL),
(36, 49, 146, '20200110014825.png', 'luggage', 4860, 1, '2020-01-09 17:00:28', NULL),
(37, 50, 147, '20200110014855.png', 'lugg', 4860, 1, '2020-01-10 14:24:52', NULL),
(38, 50, 142, '20200108013013.png', 'gfvb', 1500, 1, '2020-01-10 14:24:52', NULL),
(39, 51, 148, '20200110014925.png', 'baggggg', 1680, 1, '2020-01-10 14:25:25', NULL),
(40, 52, 145, '20200108013148.png', 'iopluih', 600, 1, '2020-01-10 14:55:56', NULL),
(41, 52, 146, '20200110014825.png', 'luggage', 4860, 3, '2020-01-10 14:55:56', NULL),
(42, 53, 147, '20200110014855.png', 'lugg', 4860, 1, '2020-01-10 15:01:12', NULL),
(43, 53, 146, '20200110014825.png', 'luggage', 4860, 1, '2020-01-10 15:01:12', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `pageID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `page`
--

INSERT INTO `page` (`pageID`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '關於我們', '<p>從原產地的一株咖啡樹，最終成為您手中的一杯咖啡；我們堅持採購並且烘焙最高品質的咖啡，這是我們一直努力的基本原則；最初的十英呎到最後十英呎的珍貴體驗，為咖啡的故事做了最佳的註解，同時也塑造出咖啡家族的獨特風味及口感特性，閱讀咖啡的故事，可以讓您更瞭解咖啡，豐富您的咖啡體驗。</p>\r\n<p>1971 年星巴克創立於美國西雅圖派克市場，1987 年霍華．舒茲(星巴克主席、總裁暨行政總裁)在當地投資者的協助下買下星巴克，同年在加拿大溫哥華開拓門市，為首次進軍國際市場。今日星巴克門市遍佈全球，已是全世界最主要的咖啡烘焙與零售業者，霍華‧蕭茲先生經營咖啡事業著重在人文特質與品質堅持，強調尊重顧客與員工，並堅持採購全球最好的咖啡豆烘焙製作，提供消費者最佳的咖啡產品與最舒適的消費場所，經營 Starbucks Coffee 成為當今全球精品咖啡領導品牌，備受國際學者專家推崇，譽為「咖啡王國傳奇」。</p>\r\n<p>星巴克的企業使命：啟發並滋潤人們的心靈，在每個人、每一杯、每個社區中皆能體現。秉持續追求卓越以及實踐企業使命與價值觀，我們透過每一杯咖啡的傳遞，將獨特的星巴克體驗帶入每位顧客的生活中。</p>', '2', '2019-12-31 10:58:27');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `product_categoryID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `picture3` varchar(255) DEFAULT NULL,
  `picture4` varchar(255) DEFAULT NULL,
  `picture5` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`productID`, `product_categoryID`, `status`, `name`, `description`, `picture`, `picture1`, `picture2`, `picture3`, `picture4`, `picture5`, `price`, `created_at`, `updated_at`) VALUES
(137, 11, 0, 'qwer', '<p>●超輕羽量PC材質 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200108012153.png', '20200108012153-1.png', '20200108012153-2.png', '', '', '', '5780', '2020-01-08 13:21:41', '2020-01-13 09:18:50'),
(138, 11, 0, 'asdf', '', '20200108012210.png', '20200108012210-1.png', '20200108012210-2.png', NULL, NULL, NULL, '4500', '2020-01-08 13:21:54', NULL),
(139, 11, 0, 'zxcvcxv', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200108012227.png', '20200108012227-1.png', '20200108012227-2.png', '', '', '', '5780', '2020-01-08 13:22:11', '2020-01-13 09:18:46'),
(140, 12, 0, 'poiu', '', '20200108012912.png', '20200108012912-1.png', '20200108012912-2.png', '20200108012912-3.1-3', '20200108012912-4.png', '20200108012912-5.png', '1200', '2020-01-08 13:22:35', NULL),
(142, 12, 0, 'gfvb', '', '20200108013013.png', '20200108013013-1.png', '20200108013013-2.png', '20200108013013-3.5-3', '20200108013013-4.png', '20200108013013-5.png', '1500', '2020-01-08 13:29:39', NULL),
(144, 13, 0, 'uikjhk', '', '20200108013124.png', '20200108013124-1.png', '20200108013124-2.png', '20200108013124-3.7-3', '20200108013124-4.png', NULL, '850', '2020-01-08 13:31:06', NULL),
(145, 13, 0, 'iopluih', '', '20200108013148.png', '20200108013148-1.png', '20200108013148-2.png', '20200108013148-3.3-3', '20200108013148-4.png', '20200108013148-5.png', '600', '2020-01-08 13:31:25', '2020-01-08 13:43:21'),
(146, 11, 0, 'luggage', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200110014825.png', '20200110014825-1.png', '20200110014825-2.png', '', '', '', '4860', '2020-01-10 13:47:40', '2020-01-13 09:18:42'),
(147, 11, 0, 'lugg', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200110014855.png', '20200110014855-1.png', '20200110014855-2.png', '', '', '', '4860', '2020-01-10 13:48:27', '2020-01-13 09:18:37'),
(148, 12, 0, 'baggggg', '', '20200110014925.png', '20200110014925-1.png', '20200110014925-2.png', '20200110014925-3.2-3', '20200110014925-4.png', '20200110014925-5.png', '1680', '2020-01-10 13:49:01', NULL),
(149, 11, 0, 'luggage4', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200113091742.png', '20200113091742-1.png', '20200113091742-2.png', '', '', '', '4860', '2020-01-13 09:17:09', '2020-01-13 09:18:18'),
(150, 11, 0, 'luggage5', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200113091919.png', '20200113091919-1.png', '20200113091919-2.png', NULL, NULL, NULL, '5760', '2020-01-13 09:19:01', NULL),
(151, 11, 0, 'luggage6', '', '20200113091938.png', '20200113091938-1.png', '20200113091938-2.png', NULL, NULL, NULL, '5760', '2020-01-13 09:19:21', NULL),
(153, 11, 0, 'luggage6', '<p>●超輕羽量PC材質 ●玉山級彎月型手把及多段拉桿 ●TSA國際標準海關密碼鎖 ●雙層複雜咬合防盜拉鍊 ●NIFCO脆聲型內扣 ●稀有宮廷黑內裡布 ●航空級萬向飛機輪</p>', '20200113092026.png', '20200113092026-1.png', '20200113092026-2.png', NULL, NULL, NULL, '5760', '2020-01-13 09:20:07', NULL),
(154, 12, 0, 'baggggg2', '<p><strong><span>光滑，寬敞且完全必要。</span></strong></p>\r\n<p><span>旅途中的去向。我們的Urbo 2手提袋採用優質材料製成，堅固耐用。外部皮帶可滑動到任何行李提手上，便於配對，並且口袋經過精心設計，適合現實生活。</span></p>', '20200113092057.png', '20200113092057-1.png', '20200113092057-2.png', '20200113092057-3.6-3', '20200113092057-4.png', '20200113092057-5.png', '1680', '2020-01-13 09:20:31', '2020-01-13 09:20:59'),
(155, 12, 0, 'baggggg3', '<p><strong><span>準備好前往任何目的地。</span></strong></p>\r\n<p><span>您的工作不可或缺的要素。我們的Urbo 2手提袋採用優質材料製成，堅固耐用。外部皮帶可滑動到任何行李提手上，便於配對，並且口袋經過精心設計，適合現實生活。</span></p>', '20200113092212.png', '20200113092212-1.png', '20200113092212-2.png', '20200113092212-3.3-3', '20200113092212-4.png', '20200113092212-5.png', '1580', '2020-01-13 09:21:37', NULL),
(156, 13, 0, 'ACC3', '<p><strong><span>有組織的旅行者最好的朋友。</span></strong></p>\r\n<p><span>包裝整齊，最大程度地提高容量。我們為旅行量身定做的包裝套件提供緊湊的組織結構，可為您節省更多的包裝空間並保持相似狀態。每個立方體的防水尼龍底座可以保護和保護您的物品，因此您可以在旅途中保持衣服整齊地折疊和整理。</span></p>', '20200113092258.png', '20200113092258-1.png', '20200113092258-2.png', '20200113092258-3.1-3', '20200113092258-4.png', NULL, '1280', '2020-01-13 09:22:18', NULL),
(157, 13, 0, 'ACC4', '<p><strong><span>緊緊固定的必需品，一個拉鍊即可。</span></strong></p>\r\n<p><span>跳過潛水袋和行李袋。這款小巧的收納袋平衡了旅行定制的內部口袋和堅固耐用且輕巧的純聚碳酸酯外殼。非常適合保持秩序，同時將所有物品都放在一個緊湊的空間中，其內部存儲旅行證件，護照，便攜式電子產品以及您在旅途中需要的其他任何東西。而其外殼提供了額外的保護層。</span></p>', '20200113092400.png', '20200113092400-1.png', '20200113092400-2.png', NULL, NULL, NULL, '1190', '2020-01-13 09:23:06', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `product_categoryID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product_categories`
--

INSERT INTO `product_categories` (`product_categoryID`, `category`, `created_at`, `updated_at`) VALUES
(11, 'Luggage', '2020-01-08 10:43:02', NULL),
(12, 'Bags', '2020-01-08 10:54:20', '2020-01-08 11:05:48'),
(13, 'Accessories', '2020-01-08 10:54:33', NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- 資料表索引 `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`customer_orderID`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- 資料表索引 `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detailsID`);

--
-- 資料表索引 `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pageID`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- 資料表索引 `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_categoryID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `customer_orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表 AUTO_INCREMENT `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- 使用資料表 AUTO_INCREMENT `page`
--
ALTER TABLE `page`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- 使用資料表 AUTO_INCREMENT `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
