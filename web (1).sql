-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2020 lúc 07:58 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `od.orderNumber` int(11) NOT NULL,
  `od.productCode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `od.qualityOrdered` int(11) NOT NULL,
  `od.priceEach` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`od.orderNumber`, `od.productCode`, `od.qualityOrdered`, `od.priceEach`) VALUES
(34, '1', 1, 4500000),
(35, '5', 1, 3500000),
(36, '1', 1, 4500000),
(37, '1', 1, 4500000),
(38, '1', 1, 4500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `or.orderNumber` int(11) NOT NULL,
  `or.orderUser` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `or.amount` int(20) NOT NULL,
  `or.orderDate` date NOT NULL,
  `or.requiredDate` date NOT NULL,
  `or.shippedDate` date DEFAULT NULL,
  `or.message` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`or.orderNumber`, `or.orderUser`, `or.amount`, `or.orderDate`, `or.requiredDate`, `or.shippedDate`, `or.message`) VALUES
(34, '00000000', 4500000, '2020-05-06', '2020-06-05', NULL, NULL),
(35, '00000000', 3500000, '2020-05-06', '2020-06-05', NULL, NULL),
(36, '00000000', 4500000, '2020-05-06', '2020-06-05', NULL, NULL),
(37, '00000000', 4500000, '2020-05-06', '2020-06-05', NULL, NULL),
(38, '00000000', 4500000, '2020-05-06', '2020-06-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `pd.productCode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pd.productName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pd.productline` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pd.productVendor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd.productDescription` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd.buyPrice` int(20) NOT NULL,
  `pd.image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd.gender` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd.discount` varchar(10) DEFAULT NULL,
  `pd.qualityinStock` int(10) NOT NULL,
  `pd.view` int(10) NOT NULL,
  `pd.sold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`pd.productCode`, `pd.productName`, `pd.productline`, `pd.productVendor`, `pd.productDescription`, `pd.buyPrice`, `pd.image`, `pd.gender`, `pd.discount`, `pd.qualityinStock`, `pd.view`, `pd.sold`) VALUES
('1', 'Nike Air Max 1', 'Nike, Air Max', 'Nike', 'Nike\'s first lifestyle Air Max lets you greet the streets with the soft, smooth and resilient ride of the Nike Air Max 270. The design draws inspiration from the Air Max pantheon, showcasing Nike\'s greatest innovation with its large window and fresh array of colours.', 4500000, 'airmax1.jpg', 'Men\'s Shoe', NULL, 38, 0, 0),
('10', 'Adidas 1', 'Adidas', 'Adidas', 'No', 1000000, 'adidas1.jpg', 'Men\'s Shoe', NULL, 11, 0, 0),
('2', 'Nike Air Max 2', 'Nike, Air Max', 'Nike', 'The Nike Air Max 270 combines the exaggerated tongue from the Air Max 180 and classic elements from the Air Max 93. It features Nike\'s biggest heel Air unit yet for a super-soft ride that feels as impossible as it looks.', 4000000, 'airmax2.jpg', 'Men\'s Shoe', NULL, 93, 0, 0),
('3', 'Nike Air Max 3', 'Nike, Air Max', 'Nike', 'Inspired by Tinker\'s early sketches of the Air Max 1, Women\'s Nike Air Max Zero Shoe blends modern style with heritage roots. Crafted with premium upper materials, it features bootie construction and a visible Max Air unit for comfortable cushioning.', 3900000, 'airmax3.jpg', 'Women\'s Shoe', NULL, 45, 0, 0),
('4', 'Nike Air Max 270 Premium', 'Nike, Air Max', 'Nike', 'The Air Max 270 Premium Leather ‘Hyper Crimson’ features a lifestyle makeup and mid-top construction. Created with micro-perforated white leather and hits of black, the shoe’s standout feature is it’s signature Max Air unit, offering 270 degrees of visibility, finished in Hyper Crimson.', 5000000, 'airmax4.jpg', 'Women\'s Shoe', NULL, 58, 0, 0),
('5', 'Nike Air Max 270-University Gold', 'Nike, Air Max', 'Nike', 'The Nike Air Max 270 combines the exaggerated tongue from the Air Max 180 and classic elements from the Air Max 93. It features Nike\'s biggest heel Air unit yet for a super-soft ride that feels as impossible as it looks.', 3500000, 'airmax5.jpg', 'Men\'s Shoe', NULL, 16, 0, 0),
('6', 'Nike Air Max 270-Green, White', 'Nike, Air Max', 'Nike', 'The Nike Air Max 270 combines the exaggerated tongue from the Air Max 180 and classic elements from the Air Max 93. It features Nike\'s biggest heel Air unit yet for a super-soft ride that feels as impossible as it looks.', 3000000, 'airmax6.jpg', 'Men\'s Shoe', NULL, 19, 0, 0),
('7', 'Adidas Stan Smith Green', 'Adidas, Stan Smith', 'Adidas', 'Considered details set this Stan apart from the pack. These adidas shoes have a luxurious vibe with a combination of full grain and coated leather. Precise stitching gives them a polished look and feel. Strut your adidas pride as you walk away sporting \"Stan Smith\" on the heel.', 1200000, 'stansmith.jpg', 'Men\'s Shoe', NULL, 500, 0, 0),
('8', 'Adidas Superstar White', 'Adidas, Superstar', 'Adidas', 'Originally made for basketball courts in the \'70s. Celebrated by hip hop royalty in the \'80s. The adidas Superstar shoe is now a lifestyle staple for streetwear enthusiasts. The world-famous shell toe feature remains, providing style and protection. Just like it did on the B-ball courts back in the ', 2000000, 'Superstar1.jpg', 'Men\'s Shoe', NULL, 300, 0, 0),
('9', 'Adidas Superstar Black', 'Adidas, Superstar', 'Adidas', 'Originally made for basketball courts in the \'70s. Celebrated by hip hop royalty in the \'80s. The adidas Superstar shoe is now a lifestyle staple for streetwear enthusiasts. The world-famous shell toe feature remains, providing style and protection. Just like it did on the B-ball courts back in the ', 3000000, 'Superstar2.jpg', 'Woman\'s Shoe', NULL, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productlines`
--

CREATE TABLE `productlines` (
  `pl.productLine` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pl.numType` int(11) NOT NULL,
  `pl.textDescription` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl.htmlDescription` mediumtext DEFAULT NULL,
  `pl.image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `productlines`
--

INSERT INTO `productlines` (`pl.productLine`, `pl.numType`, `pl.textDescription`, `pl.htmlDescription`, `pl.image`) VALUES
('Adidas', 4, 'Dòng Adidas', NULL, NULL),
('Adidas, Stan Smith', 12, 'Dòng Stan Smith', NULL, NULL),
('Adidas, Superstar', 3, 'Dòng Superstar', NULL, NULL),
('Nike, Air Force', 6, 'Dòng Air Force', NULL, NULL),
('Nike, Air Max', 6, 'Dòng Air Max', NULL, NULL),
('Nike, Air Uptempo', 3, 'Dòng Air Uptempo', NULL, NULL),
('Nike, Epic', 4, 'Dòng Epic', NULL, NULL),
('Nike, Jordan', 6, 'Dòng Jordan', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `us.Full Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `us.Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `us.Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `us.Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `us.Phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `us.Address` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`us.Full Name`, `us.Username`, `us.Password`, `us.Email`, `us.Phone`, `us.Address`) VALUES
('Vũ Hữu Thắng', '00000000', '00000000', 'vuthang226@gmail.com', '0355154199', 'Số 11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`od.orderNumber`,`od.productCode`),
  ADD KEY `fk_productCode` (`od.productCode`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or.orderNumber`),
  ADD KEY `fk_orderUser` (`or.orderUser`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd.productCode`),
  ADD KEY `fk_productLine` (`pd.productline`);

--
-- Chỉ mục cho bảng `productlines`
--
ALTER TABLE `productlines`
  ADD PRIMARY KEY (`pl.productLine`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us.Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `or.orderNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderNumber` FOREIGN KEY (`od.orderNumber`) REFERENCES `orders` (`or.orderNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productCode` FOREIGN KEY (`od.productCode`) REFERENCES `product` (`pd.productCode`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orderUser` FOREIGN KEY (`or.orderUser`) REFERENCES `user` (`us.Username`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_productLine` FOREIGN KEY (`pd.productline`) REFERENCES `productlines` (`pl.productLine`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
