-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 10:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giao_doi_gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_order`
--

CREATE TABLE `add_order` (
  `id` int(11) NOT NULL,
  `infor_gas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nameCustomer` varchar(30) NOT NULL,
  `phoneCustomer` varchar(11) NOT NULL,
  `diachi` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ghichu` varchar(30) DEFAULT NULL,
  `loai` varchar(10) NOT NULL,
  `status` int(3) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `admin_name` varchar(30) NOT NULL,
  `order_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_order`
--

INSERT INTO `add_order` (`id`, `infor_gas`, `nameCustomer`, `phoneCustomer`, `diachi`, `country`, `state`, `district`, `ghichu`, `loai`, `status`, `user_id`, `admin_name`, `order_code`) VALUES
(17, '[{\"product_id\":170,\"quantity\":\"1\"},{\"product_id\":171,\"quantity\":\"2\"}]', 'Hoàng Văn Thanh', '01254789', '1', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', NULL, '', 0, 0, '', ''),
(18, '[{\"product_id\":182,\"quantity\":\"1\"},{\"product_id\":183,\"quantity\":\"2\"}]', 'Hoàng Văn Thanh', '01254789', '11', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', '2', 1, NULL, 'Chưa có người giao', '64a132d1c4d42');

-- --------------------------------------------------------

--
-- Table structure for table `add_staff`
--

CREATE TABLE `add_staff` (
  `id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `chuc_vu` varchar(30) NOT NULL,
  `date_input` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `luong` float NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `status_add` tinyint(1) NOT NULL,
  `image_staff` varchar(300) DEFAULT NULL,
  `CCCD` int(11) NOT NULL,
  `gioi_tinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_staff`
--

INSERT INTO `add_staff` (`id`, `last_name`, `birth`, `chuc_vu`, `date_input`, `phone`, `luong`, `taikhoan`, `dia_chi`, `status_add`, `image_staff`, `CCCD`, `gioi_tinh`) VALUES
(44, 'Lê Văn Xuân', '2001-03-28', '2', '2022-01-14', '0837641469', 10000000, 'vanxuan@gmail.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau', 1, 'vanthanh34.jpg', 11223311, 1),
(45, 'Nguyễn Văn Anh', '1999-07-22', '3', '2021-08-26', '0848828730', 6000000, 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang', 1, 'chaien93.jpg', 114422334, 1),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', '2022-06-22', '0919954639', 6000000, 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ', 1, 'dekisugi42.jpg', 368741235, 1),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', '2022-01-19', '0717756873', 6000000, 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau', 1, 'doraemon27.png', 887462354, 1),
(48, 'Lê Văn Duy', '2001-07-18', '1', '2022-02-11', '0983768651', 6000000, 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ', 1, 'shenio3.png', 898865368, 1),
(49, 'Trần Tuấn Anh', '2000-06-09', '1', '2022-01-24', '0857698327', 6000000, 'tuananh@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long', 0, 'nobitajpg37.jpg', 778741246, 1),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '3', '2022-11-16', '0918936887', 7000000, 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang', 1, 'shiduku38.png', 114421456, 2),
(62, 'Hà Văn Ý', '1997-12-30', '1', '2022-08-04', '0837641469', 6000000, 'vany114@gmail.com', 'Phước Long, Bạc Liêu', 1, 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg', 230474149, 1),
(66, 'Hoàng Văn Thanh', '2001-03-08', '2', '2023-03-03', '0837641469', 11000000, 'thanh@gmail.com', '672, đường 30/4, phường Hưng Lợi Quận Ninh Kiều, Cần Thơ', 1, 'ưu60.jpg', 88747469, 1),
(68, 'Lý Minh Tâm', '1999-03-12', '1', '2022-03-02', '0783382169', 6000000, 'tam@gmai.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau', 0, 'nobita266.png', 11235986, 1),
(70, 'Hà Ngọc Ý', '2002-05-20', '3', '2023-03-01', '0848875631', 6000000, 'ngocy@gmai.com', 'Mang Thích, Vĩnh Long', 0, 'hình chỉnh42.jpg', 124789865, 2),
(82, 'Ngô Văn Minh Khôi', '2001-08-06', '3', '2023-08-15', '0847968769', 6000000, 'vankhoi86@gmail.com', 'trà ôn, Vĩnh Long', 0, '1692098981.png', 88457456, 2),
(86, 'Haaaaaa', '2023-08-28', '1', '2023-09-05', '0837641468', 93333, 'aa@gmai.com', 'Cà Mau', 0, '1694840646.jpg', 11223311, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL,
  `Comment` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `staff_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `Comment`, `created_at`, `staff_id`, `order_id`, `rating`, `user_id`) VALUES
(98, 'null', '2023-09-07 15:54:06', 26, 242, 5, 15),
(99, 'null', '2023-09-16 01:35:30', 25, 262, 5, 44),
(100, 'null', '2023-09-16 06:12:43', 25, 251, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(4, '2023_09_17_031826_product_warehouse', 3),
(5, '2023_09_17_041532_edit_product_warehouse', 4),
(6, '2023_09_18_024447_edits_product_warehouse', 5),
(7, '2023_09_18_025408_editss_product_warehouse', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `nameCustomer` varchar(30) NOT NULL,
  `phoneCustomer` varchar(11) NOT NULL,
  `diachi` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ghichu` varchar(30) DEFAULT NULL,
  `loai` varchar(11) NOT NULL,
  `tong` double DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `admin_name` varchar(30) NOT NULL,
  `order_code` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `infor_gas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reduced_value` varchar(30) DEFAULT NULL,
  `coupon` varchar(30) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `nameCustomer`, `phoneCustomer`, `diachi`, `country`, `state`, `district`, `ghichu`, `loai`, `tong`, `status`, `user_id`, `admin_name`, `order_code`, `created_at`, `infor_gas`, `reduced_value`, `coupon`, `payment_status`) VALUES
(243, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 1683000, '2', '15', 'Nguyễn Văn Anh', '64eeb0d8dc283', '2023-08-30 03:00:40', '[{\"product_id\":178,\"product_name\":\"gas v\\u1ea1n l\\u1ed9c petro h\\u1ed3ng 45kg\",\"product_price\":1870000,\"quantity\":\"1\"}]', '187000', 'GTXINCHAO1', 2),
(244, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 6820000, '4', '15', 'Người giao hủy', '64eeb140045aa', '2023-08-30 03:02:24', '[{\"product_id\":177,\"product_name\":\"Gas saigon petro 45kg x\\u00e1m\",\"product_price\":1650000,\"quantity\":\"3\"},{\"product_id\":178,\"product_name\":\"gas v\\u1ea1n l\\u1ed9c petro h\\u1ed3ng 45kg\",\"product_price\":1870000,\"quantity\":\"1\"}]', '0', NULL, 1),
(251, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '2', 1100000, '3', '15', 'Nguyễn Văn Anh', '64f9cfa06eedc', '2023-09-07 13:26:56', '[{\"product_id\":186,\"product_name\":\"gas b\\u00ecnh minh xanh12kg\",\"product_price\":550000,\"quantity\":\"2\"}]', '0', NULL, 2),
(256, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 1763000, '4', '15', 'Chưa có người giao', '64fff709ed23a', '2023-09-12 05:28:41', '[{\"product_id\":181,\"product_name\":\"gas total 45kg x\\u00e1m\",\"product_price\":1763000,\"quantity\":\"1\"}]', '0', 'GTXINCHAO1', 1),
(261, 'Nguyên Mỹ Lan', '0123456789', '1', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', '1', 1630000, '1', '44', 'Chưa có người giao', '65000c2aa9998', '2023-09-12 06:58:50', '[{\"product_id\":180,\"product_name\":\"gas petro limex h\\u1ed3ng 45kg\",\"product_price\":1630000,\"quantity\":\"1\"}]', '0', NULL, 1),
(264, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '2', 550000, '1', 'null', 'Nguyễn Văn Anh', '650523d69758b', '2023-09-16 03:41:10', '[{\"product_id\":186,\"product_name\":\"gas b\\u00ecnh minh xanh12kg\",\"product_price\":550000,\"quantity\":\"1\"}]', NULL, NULL, 1),
(265, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1650000, '1', 'null', 'Chưa có người giao', '65054abdbde1c', '2023-09-16 06:27:09', '[{\"product_id\":177,\"product_name\":\"Gas saigon petro 45kg x\\u00e1m\",\"product_price\":1650000,\"quantity\":\"1\"}]', NULL, NULL, 1),
(266, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 1860000, '4', '15', 'Chưa có người giao', '65054ce8f17b7', '2023-09-16 06:36:24', '[{\"product_id\":178,\"product_name\":\"gas v\\u1ea1n l\\u1ed9c petro h\\u1ed3ng 45kg\",\"product_price\":1870000,\"quantity\":\"1\"}]', '10000', 'CNM0012', 1),
(268, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1640000, '1', 'null', 'Chưa có người giao', '6505500813f6c', '2023-09-16 06:49:44', '[{\"product_id\":177,\"product_name\":\"Gas saigon petro 45kg x\\u00e1m\",\"product_price\":1650000,\"quantity\":\"1\"}]', NULL, 'CNM0012', 1),
(269, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1640000, '1', 'null', 'Chưa có người giao', '650550aae00c8', '2023-09-16 06:52:26', '[{\"product_id\":177,\"product_name\":\"Gas saigon petro 45kg x\\u00e1m\",\"product_price\":1650000,\"quantity\":\"1\"}]', NULL, 'CNM0012', 1),
(270, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1640000, '1', 'null', 'Chưa có người giao', '650550b9c659c', '2023-09-16 06:52:41', '[{\"product_id\":177,\"product_name\":\"Gas saigon petro 45kg x\\u00e1m\",\"product_price\":1650000,\"quantity\":\"1\"}]', NULL, 'CNM0012', 1),
(271, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1860000, '1', 'null', 'Chưa có người giao', '6505510480927', '2023-09-16 06:53:56', '[{\"product_id\":178,\"product_name\":\"gas v\\u1ea1n l\\u1ed9c petro h\\u1ed3ng 45kg\",\"product_price\":1870000,\"quantity\":\"1\"}]', NULL, 'CNM0012', 1),
(272, 'Thanh Hoàng', '0918937641', '123/78', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'giao hàng nhanh', '2', 550000, '1', '59', 'Chưa có người giao', '6505d1dcd5a70', '2023-09-16 16:03:40', '[{\"product_id\":186,\"product_name\":\"gas b\\u00ecnh minh xanh12kg\",\"product_price\":550000,\"quantity\":\"1\"}]', '0', NULL, 2),
(284, 'Hồ Quỳnh Như', '0868741452', '11', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', '2', 530000, '1', '56', 'Chưa có người giao', '65065d69e46b2', '2023-09-17 01:59:05', '[{\"product_id\":193,\"product_name\":\"gas petro vn 12kg \\u0111\\u1ecf\",\"product_price\":530000,\"quantity\":\"1\"}]', '0', NULL, 2),
(285, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '2', 10000, '4', '15', 'Chưa có người giao', '65065dba774f8', '2023-09-17 02:00:26', '[{\"product_id\":188,\"product_name\":\"gas mini max vina v\\u00e0ng\",\"product_price\":10000,\"quantity\":\"1\"}]', '0', NULL, 2),
(286, 'Trần Vĩnh Tâm', '0837648322', '77A/8//8', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', '2', 10000, '1', '32', 'Chưa có người giao', '6506eee86b414', '2023-09-17 12:19:52', '[{\"product_id\":188,\"product_name\":\"gas mini max vina v\\u00e0ng\",\"product_price\":10000,\"quantity\":\"1\"}]', '0', NULL, 1),
(287, 'Thanh Hoàng', '0919987457', '12D/87', 'Cần Thơ', 'Ô Môn', 'Thới Long', 'null', '2', 8000, '1', '62', 'Chưa có người giao', '6506ef2f81586', '2023-09-17 12:21:03', '[{\"product_id\":187,\"product_name\":\"gas mini max vina \\u0111\\u1ecf\",\"product_price\":8000,\"quantity\":\"1\"}]', '0', NULL, 1),
(289, 'Thanh Hoàng', '0919987457', '12D/87', 'Cần Thơ', 'Ô Môn', 'Thới Long', 'null', '1', 20000, '1', '62', 'Chưa có người giao', '6507d5fdccaa8', '2023-09-18 04:45:49', '[{\"product_id\":222,\"product_name\":\"gas m\\u1edbi\",\"product_price\":10000,\"quantity\":\"3\"}]', '10000', 'CNM0012', 1),
(290, 'Lê Văn Vinh Nguyên', '0896354711', '121/34', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 40000, '1', 'null', 'Chưa có người giao', '6507d7c235465', '2023-09-18 04:53:22', '[{\"product_id\":222,\"product_name\":\"gas m\\u1edbi\",\"product_price\":20000,\"quantity\":\"2\"}]', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warehouse`
--

INSERT INTO `product_warehouse` (`id`, `quantity`, `product_id`, `staff_id`, `created_at`, `updated_at`, `batch_code`, `price`, `total`) VALUES
(11, 20, 170, 25, '2023-09-17 13:50:54', NULL, '6507043ecbafc', 0, 0),
(12, 10, 170, 25, '2023-09-17 13:52:12', NULL, '6507048c7f36c', 0, 0),
(13, 100, 222, 27, '2023-09-17 14:08:20', NULL, '6507085475616', 0, 0),
(14, 20, 171, 25, '2023-09-18 02:48:20', NULL, '6507ba7448597', 320000, 0),
(15, 20, 174, 27, '2023-09-18 03:32:50', NULL, '6507c4e2c0de5', 200000, 4000000),
(16, 20, 178, 25, '2023-09-18 05:01:39', NULL, '6507d9b3c6b6e', 100000, 2000000),
(17, 20, 222, 25, '2023-09-18 05:03:00', NULL, '6507da0448036', 150000, 3000000),
(18, 20, 222, 26, '2023-09-18 05:14:01', NULL, '6507dc99825e7', 150000, 3000000),
(19, 20, 222, 26, '2023-09-18 05:15:01', NULL, '6507dcd5d86e7', 160000, 3200000),
(20, 1, 171, 2, '2023-09-18 05:18:03', NULL, '6507dd8bd1a02', 1, 1),
(21, 1, 171, 2, '2023-09-18 05:18:26', NULL, '6507dda22178f', 1, 1),
(22, 1, 171, 2, '2023-09-18 05:18:39', NULL, '6507ddafea50a', 1, 1),
(23, 1, 171, 2, '2023-09-18 05:18:42', NULL, '6507ddb260b02', 1, 1),
(24, 2, 222, 25, '2023-09-18 05:19:40', NULL, '6507ddec3853e', 160000, 320000),
(25, 10, 222, 25, '2023-09-18 05:20:38', NULL, '6507de264a697', 170000, 1700000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuc_vu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_staff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `chuc_vu`, `image_staff`) VALUES
(2, 'admin@gmail.com', '123456', 'admin', '2', 'vanthanh34.jpg'),
(25, 'anh12@gmail.com', '222222', 'Nguyễn Văn Anh', '1', 'chaien93.jpg'),
(26, 'quan13@gmail.com', 'quan123', 'Lê Ngọc Quan', '1', 'dekisugi42.jpg'),
(27, 'minh14@gmail.com', 'minh123', 'Hồ Xuân Minh', '1', 'doraemon27.png'),
(30, 'huong17@gmail.com', 'camhuong17', 'Lê Thị Cẩm Hường', '3', 'shiduku38.png'),
(31, 'duy15@gmail.com', 'vanduy15', 'Lê Văn Duy', '1', 'shenio3.png'),
(33, 'vany114@gmail.com', '111111', 'Hà Văn Ý', '1', 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg'),
(36, 'vanxuan@gmail.com', '111111', 'Lê Văn Xuân', '2', 'vanthanh34.jpg'),
(37, 'thanh@gmail.com', '11223344', 'Hoàng Văn Thanh', '2', 'ưu60.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_name` varchar(100) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_comment` int(11) NOT NULL,
  `comment_parent_comment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `comment`, `comment_name`, `comment_date`, `staff_id`, `user_id`, `status_comment`, `comment_parent_comment`) VALUES
(137, 'Nhân viên vui vẻ, giao hàng nhanh', 'Hoàng Văn Thanh', '2023-09-16 06:13:04', 25, 15, 1, 0),
(138, 'Cảm ơn bạn', 'GasTech', '2023-09-16 06:13:16', 25, 15, 0, 137),
(139, 'sản phẩm ok', 'Hoàng Văn Thanh', '2023-09-16 06:24:27', 25, 15, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `name_voucher` varchar(30) NOT NULL,
  `ma_giam` varchar(30) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_tri` varchar(30) NOT NULL,
  `thoi_gian_giam` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `het_han` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `Prerequisites` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `name_voucher`, `ma_giam`, `so_luong`, `gia_tri`, `thoi_gian_giam`, `created_at`, `het_han`, `status`, `type`, `Prerequisites`) VALUES
(2, 'HOANGTHANH', 'VT002', 2, '20000', '2023-08-01 10:00:00', '2023-08-01 02:59:36', '2023-08-08 10:00:00', 2, 2, 10000),
(3, 'KHACHHANGMOI', 'HT001', 10, '5', '2023-08-01 10:00:00', '2023-08-01 03:04:22', '2023-08-08 10:00:00', 2, 1, 10000),
(8, 'NGAYVUI', 'NV131', 11, '20000', '2023-08-10 13:26:00', '2023-08-10 06:26:27', '2023-08-11 13:26:00', 2, 2, 10000),
(9, 'Gas Tech', 'GT128', 0, '10', '2023-08-12 10:21:00', '2023-08-12 03:21:13', '2023-08-17 10:21:00', 2, 1, 10000),
(10, 'VANTHANH', 'VANTHANH2803', 6, '50000', '2023-08-12 21:22:00', '2023-08-12 14:23:03', '2023-08-14 21:22:00', 2, 2, 1000000),
(11, 'VUIVUI', 'VUIVUI11', 8, '1', '2023-08-16 13:44:00', '2023-08-16 06:44:37', '2023-08-24 13:44:00', 2, 1, 20000),
(13, 'gas tech xin chao', 'GTXINCHAO1', 1, '10', '2023-08-25 10:08:00', '2023-08-25 03:08:07', '2023-08-31 10:08:00', 2, 1, 20000),
(14, 'Chào Ngày Mới', 'CNM0012', 95, '10000', '2023-09-16 13:23:00', '2023-09-16 06:23:36', '2023-10-31 13:23:00', 1, 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `loai` varchar(20) NOT NULL,
  `original_price` double DEFAULT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name_product`, `loai`, `original_price`, `price`, `image`, `quantity`, `created_at`) VALUES
(170, 'gas magic flame 45kg', '1', 0, 0, 'binh-gas-cong-nghiep-45kg43.jpg', 30, '2023-09-17 14:09:32'),
(171, 'Gas dầu khí 45kg', '1', 0, 0, 'binh-gas-dau-khi-45kg85.png', 20, '2023-09-17 14:09:32'),
(172, 'gas bình minh 45kg vàng', '1', 0, 0, 'gas-binhminh-45kg57.png', 0, '2023-09-17 14:09:32'),
(174, 'gas gia đình 45kg', '1', 0, 0, 'gas-giadinh-45kg22.png', 20, '2023-09-17 14:09:32'),
(175, 'gas petro hồng hà 45kg', '1', 0, 0, 'gas-hongha-45kg50.jpg', 0, '2023-09-17 14:09:32'),
(176, 'gas petro limex xanh 45kg', '1', 0, 0, 'Petrolimex 48kg51.jpg', 0, '2023-09-17 14:09:32'),
(177, 'Gas saigon petro 45kg xám', '1', 0, 0, 'gas-saigon-petro-45kg39.jpg', 0, '2023-09-17 14:09:32'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 0, 0, 'gas-van-loc-45kg71.png', 0, '2023-09-17 14:09:32'),
(179, 'gas petro limex xanh 48kg', '1', 0, 0, 'Petrolimex 48kg97.jpg', 0, '2023-09-17 14:09:32'),
(180, 'gas petro limex hồng 45kg', '1', 0, 0, 'PetroVietNam 45kg màu hồng88.jpg', 0, '2023-09-17 14:09:32'),
(181, 'gas total 45kg xám', '1', 0, 0, 'total-gas-45kg42.png', 0, '2023-09-17 14:09:32'),
(182, 'gas petro limex xanh 12kg', '2', 0, 0, 'gas_petrolimex_van-chup-12kg41.jpg', 0, '2023-09-17 14:09:32'),
(183, 'gas sh petro 12kg', '2', 0, 0, 'gas_shp_petro_12kg84.jpg', 0, '2023-09-17 14:09:32'),
(185, 'gas bìnhminh vàng 12kg', '2', 0, 0, 'gas-binh-minh-mau-vang-12kg16.jpg', 0, '2023-09-17 14:09:32'),
(186, 'gas bình minh xanh12kg', '2', 0, 0, 'gas-binh-minh-mau-xanh_12kg98.jpg', 0, '2023-09-17 14:09:32'),
(187, 'gas mini max vina đỏ', '2', 0, 0, 'gas-mini-đỏ50.jpg', 0, '2023-09-17 14:09:32'),
(188, 'gas mini max vina vàng', '2', 0, 0, 'gas-mini-max-vang18.png', 0, '2023-09-17 14:09:32'),
(189, 'gas mini max vina xanh', '2', 0, 0, 'gas-mini-max-xanh51.png', 0, '2023-09-17 14:09:32'),
(190, 'gas namilux cam', '2', 0, 0, 'gas-mini-naminlux-cam-247.jpg', 0, '2023-09-17 14:09:32'),
(191, 'gas namilux xanh', '2', 0, 0, 'gas-namilux-xanh37.jpg', 0, '2023-09-17 14:09:32'),
(192, 'gas petro đỏ 6kg', '2', 0, 0, 'gas-petrovn-6kg67.jpg', 0, '2023-09-17 14:09:32'),
(193, 'gas petro vn 12kg đỏ', '2', 0, 0, 'gas-petrovn-đỏ-12kg93.jpg', 0, '2023-09-17 14:09:32'),
(194, 'gas petro vn hồng 12kg', '2', 0, 0, 'gas-petrovn-hồng-12kg99.png', 0, '2023-09-17 14:09:32'),
(195, 'gas petro vn 12kg xám', '2', 0, 0, 'gas-petrovn-xám-12kg78.png', 0, '2023-09-17 14:09:32'),
(196, 'gas Thủ Đức 6kg', '2', 0, 0, 'gas-thu-duc-6kg11.png', 0, '2023-09-17 14:09:32'),
(208, 'gas petro màu xanh', '1', 0, 0, 'gas-petrolimex-48kg 16.jpg', 0, '2023-09-17 14:09:32'),
(211, 'gas vàng bình minh', '1', 0, 0, 'gas-binhminh-45kg99.png', 0, '2023-09-17 14:09:32'),
(222, 'gas mới', '1', 160000, 221000, 'total-gas-45kg83.png', 167, '2023-09-17 14:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id` int(11) NOT NULL,
  `vnp_Amount` varchar(50) NOT NULL,
  `vnp_BankCode` varchar(50) NOT NULL,
  `vnp_BankTranNo` varchar(50) NOT NULL,
  `vnp_CardType` varchar(50) NOT NULL,
  `vnp_OrderInfo` varchar(100) NOT NULL,
  `vnp_PayDate` varchar(50) NOT NULL,
  `vnp_TmnCode` varchar(50) NOT NULL,
  `vnp_TransactionNo` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id`, `vnp_Amount`, `vnp_BankCode`, `vnp_BankTranNo`, `vnp_CardType`, `vnp_OrderInfo`, `vnp_PayDate`, `vnp_TmnCode`, `vnp_TransactionNo`, `user_id`, `order_id`) VALUES
(34, '187000000', 'NCB', 'VNP14102782', 'ATM', 'thanh toan don hang', '20230828122629', 'AKXJR8ZD', '14102782', 15, 242),
(35, '168300000', 'NCB', 'VNP14104669', 'ATM', 'thanh toan don hang', '20230830100113', 'AKXJR8ZD', '14104669', 15, 243),
(36, '196000000', 'MASTERCARD', '6934796453526520104012', 'MASTERCARD', 'thanh toan don hang', '20230831180038', 'AKXJR8ZD', '14105888', 34, 246),
(37, '110000000', 'NCB', 'VNP14109741', 'ATM', 'thanh toan don hang', '20230907202747', 'AKXJR8ZD', '14109741', 15, 251),
(38, '163000000', 'NCB', 'VNP14112943', 'ATM', 'thanh toan don hang', '20230912140141', 'AKXJR8ZD', '14112943', 44, 262),
(39, '55000000', 'NCB', 'VNP14116936', 'ATM', 'thanh toan don hang', '20230916230405', 'AKXJR8ZD', '14116936', 59, 272),
(40, '53000000', 'NCB', 'VNP14116977', 'ATM', 'thanh toan don hang', '20230917085944', 'AKXJR8ZD', '14116977', 56, 284),
(41, '1000000', 'NCB', 'VNP14116978', 'ATM', 'thanh toan don hang', '20230917090050', 'AKXJR8ZD', '14116978', 15, 285);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai_dh`
--

CREATE TABLE `trangthai_dh` (
  `TTDH_Ma` int(15) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `MoTa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img`, `phone`, `created_at`, `google_id`) VALUES
(15, 'Hoàng Văn Thanh', 'hoangthanh28032001@gmail.com', '123456', '1694828261.jpg', '0837641477', '2023-09-16 14:24:41', NULL),
(32, 'Trần Vĩnh Tâm', 'vinhtam@gmail.com', 'tam123', '1685432452.jpg', '0', '2023-09-16 14:24:41', NULL),
(33, 'Cao Ngọc Mai', 'ngocmai@gmail.com', '12341234', '1685708801.jpg', '0', '2023-09-16 14:24:41', NULL),
(34, 'Nguyễn Khang', 'khang@gmail.com', 'khang123', '1693479513.jpg', '0', '2023-09-16 14:24:41', NULL),
(44, 'Nguyên Mỹ Lan', 'lan@gmail.com', '123456', NULL, '0123764789', '2023-09-16 14:24:41', NULL),
(56, 'Hồ Quỳnh Như', NULL, '123123', NULL, '0868741452', '2023-09-16 14:24:41', NULL),
(62, 'Thanh Hoàng', 'hoangthanh28032001@gmail.com', 'eyJpdiI6ImJ0dUhYc29aUUNCazdJcTNDa1Vwbnc9PSIsInZhbHVlIjoiTXA0WWRPUmNiU2pEZ2R4Q2pRVklydEM1eHdqYU9haGhEdmNLakFRaUhjTT0iLCJtYWMiOiIyZmM1MTMwYTk0MTQ4ZmZjYjZkZDYyMTk0Mjg0YTUxZWVmZjQ1Zjg1NWE1NTQyY2U3ZGVmODhjZmMzNmEzMjM4IiwidGFnIjoiIn0=', NULL, NULL, '2023-09-17 02:19:16', '103818879814837903235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_order`
--
ALTER TABLE `add_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_staff`
--
ALTER TABLE `add_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  ADD PRIMARY KEY (`TTDH_Ma`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_order`
--
ALTER TABLE `add_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `add_staff`
--
ALTER TABLE `add_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
