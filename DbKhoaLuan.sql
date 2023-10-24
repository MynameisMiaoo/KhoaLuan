-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 08:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoaluan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE `tbl_ads` (
  `id_ads` int(11) NOT NULL,
  `img_ads` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id_ads`, `img_ads`) VALUES
(1, 'public/img/img1.png'),
(2, 'public/img/img2.png'),
(3, 'public/img/img3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id_brand` int(11) NOT NULL,
  `brand` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id_brand`, `brand`) VALUES
(1, 'Adidas'),
(2, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cate_id` int(11) NOT NULL,
  `cate_product` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_product`) VALUES
(1, 'Thể Thao'),
(2, 'Dã Ngoại'),
(3, 'Chạy Bộ'),
(4, 'Lười');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id_color`, `color`) VALUES
(1, 'Đen'),
(2, 'Đỏ'),
(8, 'Vàng'),
(9, 'Trắng'),
(11, 'Xanh ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_comment` varchar(256) NOT NULL,
  `time_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `id_product`, `id_user`, `content_comment`, `time_up`) VALUES
(33, 31, 1, 'Sản phẩm đẹp quá', '2023-10-22'),
(34, 31, 1, 'Giày đẹp, giao hàng nhanh.', '2023-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `email_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`email_id`, `email`) VALUES
(1, 'test@gmail.com'),
(2, 'admin@gmail.com'),
(3, 'sanhsnsg2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_oder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `orderdate` date NOT NULL,
  `id_pay` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_ship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_oder`, `id_user`, `name_user`, `address`, `phone`, `email`, `total`, `orderdate`, `id_pay`, `status`, `id_ship`) VALUES
(1697993650, 1, 'Nguyễn Văn Sáng', 'Quận 12, Hồ Chí Minh', '0387449173', 'sanhsnsg2@gmail.com', 4060000, '2023-10-22', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `id_orderdetail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count_product` int(11) NOT NULL,
  `price_product` decimal(11,0) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`id_orderdetail`, `id_order`, `id_product`, `count_product`, `price_product`, `id_color`, `id_size`) VALUES
(41, 1697993650, 32, 1, 2000000, 9, 3),
(42, 1697993650, 32, 1, 2000000, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id_pay` int(11) NOT NULL,
  `pay` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id_pay`, `pay`) VALUES
(1, 'MoMo'),
(2, 'Thanh toán khi nhận hàng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `img_product` varchar(256) NOT NULL,
  `des_product` varchar(256) NOT NULL,
  `price_product` decimal(10,0) NOT NULL,
  `name_product` varchar(256) NOT NULL,
  `brand_product` int(11) NOT NULL,
  `id_status_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `cate_id`, `img_product`, `des_product`, `price_product`, `name_product`, `brand_product`, `id_status_products`) VALUES
(31, 1, 'public/img/ad0101.jpg', 'Mô tả sản phẩm adidas 01', 1000000, 'Adidas 01', 1, 1),
(32, 2, 'public/img/ad0201.jpg', 'Mô tả sản phẩm adidas 02', 2000000, 'Adidas 02', 1, 1),
(33, 1, 'public/img/ad0301.jpg', 'Mô tả sản phẩm Adidas 03', 3000000, 'Adidas 03', 1, 1),
(34, 2, 'public/img/ad0401.jpg', 'Mô tả sản phẩm Adidas 04', 4000000, 'Adidas 04', 1, 1),
(35, 2, 'public/img/ad0502.png', 'Mô tả sản phẩm Adidas 05', 5000000, 'Adidas 05', 1, 1),
(36, 2, 'public/img/nike0101.jpg', 'Mô tả Nike 01', 1000000, 'Nike 01', 2, 1),
(37, 2, 'public/img/nike02.jpg', 'Nike02', 2000000, 'Nike 02', 2, 1),
(38, 2, 'public/img/nike03.jpg', 'Mô tả Nike 03', 3000000, 'Nike 03', 2, 1),
(39, 2, 'public/img/nike04.jpg', 'Mô tả Nike 04', 4000000, 'Nike 04', 2, 1),
(40, 3, 'public/img/nike05.jpg', 'Mô tả Nike 05', 5000000, 'Nike 05', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_detail`
--

CREATE TABLE `tbl_products_detail` (
  `id_products_detail` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `img_product` varchar(256) NOT NULL,
  `id_size` int(11) NOT NULL,
  `count_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products_detail`
--

INSERT INTO `tbl_products_detail` (`id_products_detail`, `id_product`, `id_color`, `img_product`, `id_size`, `count_product`) VALUES
(22, 31, 9, 'public/img/ad0101.jpg', 3, 10),
(23, 32, 9, 'public/img/ad0201.jpg', 3, 10),
(24, 32, 1, 'public/img/ad0202.jpg', 3, 10),
(25, 33, 9, 'public/img/ad0301.jpg', 1, 10),
(26, 34, 11, 'public/img/ad0401.jpg', 3, 10),
(27, 35, 11, 'public/img/ad0502.png', 3, 11),
(28, 35, 11, 'public/img/ad0502.png', 4, 10),
(29, 34, 11, 'public/img/ad0401.jpg', 4, 15),
(30, 31, 9, 'public/img/ad0101.jpg', 4, 15),
(31, 36, 11, 'public/img/nike0101.jpg', 1, 10),
(32, 36, 1, 'public/img/nike0102.jpg', 1, 10),
(33, 37, 9, 'public/img/nike02.jpg', 2, 10),
(34, 38, 11, 'public/img/nike03.jpg', 3, 10),
(35, 39, 11, 'public/img/nike04.jpg', 2, 10),
(36, 40, 1, 'public/img/nike05.jpg', 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship`
--

CREATE TABLE `tbl_ship` (
  `id_ship` int(11) NOT NULL,
  `ship` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ship`
--

INSERT INTO `tbl_ship` (`id_ship`, `ship`) VALUES
(1, 'Nhanh'),
(2, 'Hỏa Tốc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id_size` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id_size`, `size`) VALUES
(1, 40),
(2, 41),
(3, 42),
(4, 43),
(5, 44),
(6, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`) VALUES
(1, 'Chờ xử lý'),
(2, 'Đang Giao Hàng'),
(3, 'Đã giao hàng'),
(4, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_products`
--

CREATE TABLE `tbl_status_products` (
  `id_status` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_products`
--

INSERT INTO `tbl_status_products` (`id_status`, `status`) VALUES
(1, 'Hiển thị'),
(2, 'Ẩn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin@gmail.com', '$2y$10$qM9/rKsgqRQtUA479Tsi6eYrjbIQrJmwdDYtm1ch1fm8Sq0h/VGlm'),
(2, 'test@gmail.com', '$2y$10$NKWNpJK9iGAX6IKTFN2gau9RhgxK6klzIkTfFET86At6ZKHe7pN4S'),
(3, 'min@gmail.com', '$2y$10$3snktKgq5iRGiwBMCr8D8u2CHHwCn/CyeOL6gymVXSYaLGtovOFES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  ADD PRIMARY KEY (`id_ads`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_oder`),
  ADD KEY `id_ship` (`id_ship`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status` (`status`),
  ADD KEY `id_pay` (`id_pay`);

--
-- Indexes for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD PRIMARY KEY (`id_orderdetail`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id_pay`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `id_status_products` (`id_status_products`),
  ADD KEY `brand_product` (`brand_product`);

--
-- Indexes for table `tbl_products_detail`
--
ALTER TABLE `tbl_products_detail`
  ADD PRIMARY KEY (`id_products_detail`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_ship`
--
ALTER TABLE `tbl_ship`
  ADD PRIMARY KEY (`id_ship`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_status_products`
--
ALTER TABLE `tbl_status_products`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  MODIFY `id_ads` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  MODIFY `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id_pay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_products_detail`
--
ALTER TABLE `tbl_products_detail`
  MODIFY `id_products_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_ship`
--
ALTER TABLE `tbl_ship`
  MODIFY `id_ship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status_products`
--
ALTER TABLE `tbl_status_products`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_ship`) REFERENCES `tbl_ship` (`id_ship`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`status`) REFERENCES `tbl_status` (`id_status`),
  ADD CONSTRAINT `tbl_order_ibfk_4` FOREIGN KEY (`id_pay`) REFERENCES `tbl_payment` (`id_pay`);

--
-- Constraints for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD CONSTRAINT `tbl_orderdetail_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `tbl_color` (`id_color`),
  ADD CONSTRAINT `tbl_orderdetail_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `tbl_size` (`id_size`),
  ADD CONSTRAINT `tbl_orderdetail_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_oder`),
  ADD CONSTRAINT `tbl_orderdetail_ibfk_4` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`cate_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`id_status_products`) REFERENCES `tbl_status_products` (`id_status`),
  ADD CONSTRAINT `tbl_products_ibfk_3` FOREIGN KEY (`brand_product`) REFERENCES `tbl_brand` (`id_brand`);

--
-- Constraints for table `tbl_products_detail`
--
ALTER TABLE `tbl_products_detail`
  ADD CONSTRAINT `tbl_products_detail_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `tbl_color` (`id_color`),
  ADD CONSTRAINT `tbl_products_detail_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `tbl_size` (`id_size`),
  ADD CONSTRAINT `tbl_products_detail_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
