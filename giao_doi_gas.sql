-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 04:04 PM
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
(82, 'Ngô Văn Minh Khôi', '2001-08-06', '3', '2023-08-15', '0847968769', 6000000, 'vankhoi86@gmail.com', 'trà ôn, Vĩnh Long', 0, 'nobita20.png', 88457456, 2),
(86, 'Haaaaaa', '2023-08-28', '1', '2023-09-05', '0837641468', 93333, 'aa@gmai.com', 'Cà Mau', 0, 'chaien21.jpg', 11223311, 1);

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
(101, 'null', '2023-10-03 05:23:53', 25, 292, 5, 62);

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
(291, 'Thanh Hoàng', '0837641469', 'đường 30/4, hẻm 672, 127/78', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'giao hàng nhanh', '2', 526900, '3', '62', 'Nguyễn Văn Anh', '650bab0303a8e', '2023-08-20 02:31:31', '[{\"product_id\":182,\"product_name\":\"Gas Petrolimex Van Ch\\u1ee5p 12kg\",\"product_price\":536900,\"quantity\":\"1\"}]', '10000', 'CNM0012', 1),
(292, 'Thanh Hoàng', '0837641469', 'đường 30/4', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 2457000, '3', '62', 'Nguyễn Văn Anh', '650bab6358558', '2023-09-21 02:33:07', '[{\"product_id\":208,\"product_name\":\"Gas Petrolimex xanh 48kg\",\"product_price\":2457000,\"quantity\":\"1\"}]', '0', NULL, 2),
(293, 'Nguyên Mỹ Lan', '0123764789', 'Lý Thái Tổ 234/12', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', '1', 1755000, '3', '44', 'Hồ Xuân Minh', '650bac18b4299', '2023-09-21 02:36:08', '[{\"product_id\":222,\"product_name\":\"gas m\\u1edbi\",\"product_price\":585000,\"quantity\":\"3\"}]', '0', NULL, 1),
(296, 'Hồ Quỳnh Như', '0868741452', '178/673', 'Cần Thơ', 'Ô Môn', 'Thới Hòa', 'giao hàng nhanh', '1', 1483300, '3', '56', 'Nguyễn Văn Anh', '651a1e5abeec6', '2023-10-02 01:35:22', '[{\"product_id\":172,\"product_name\":\"Gas B\\u00ecnh Minh 45kg v\\u00e0ng\",\"product_price\":1483300,\"quantity\":\"1\"}]', '0', NULL, 1),
(297, 'Thanh Hoàng', '0837641469', 'đường 30/4', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '2', 578500, '4', '62', 'Chưa có người giao', '651b854c1ee02', '2023-10-03 03:06:52', '[{\"product_id\":185,\"product_name\":\"Gas B\\u00ecnh Minh V\\u00e0ng 12kg\",\"product_price\":578500,\"quantity\":\"1\"}]', '0', NULL, 1),
(298, 'Kim Văn Tính', '0918827649', '364/986/76A', 'Cần Thơ', 'Bình thủy', 'Trà Nóc', 'null', '1', 1677000, '1', 'null', 'Chưa có người giao', '651bae1238034', '2023-10-03 06:00:50', '[{\"product_id\":176,\"product_name\":\"gas Petro Limex xanh 45kg\",\"product_price\":838500,\"quantity\":\"2\"}]', NULL, NULL, 1);

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
(28, 50, 171, 27, '2023-09-20 02:09:29', NULL, '650ba5d950b69', 1250000, 62500000),
(29, 50, 172, 27, '2023-08-21 02:10:40', NULL, '650ba6204e1ab', 1141000, 57050000),
(30, 50, 174, 27, '2023-09-21 02:11:09', NULL, '650ba63d86003', 1190000, 59500000),
(31, 50, 175, 27, '2023-09-21 02:11:52', NULL, '650ba66831c72', 1200000, 60000000),
(32, 50, 179, 27, '2023-09-21 02:12:24', NULL, '650ba6881259f', 1652000, 82600000),
(33, 50, 177, 27, '2023-09-21 02:12:51', NULL, '650ba6a37d00a', 1270000, 63500000),
(34, 50, 178, 26, '2023-09-21 02:13:34', NULL, '650ba6ce04324', 1177000, 58850000),
(35, 50, 180, 26, '2023-09-21 02:14:40', NULL, '650ba71043025', 1700000, 85000000),
(36, 50, 181, 26, '2023-09-21 02:15:07', NULL, '650ba72b94a27', 1290000, 64500000),
(37, 50, 223, 25, '2023-09-21 02:15:50', NULL, '650ba75661a64', 377000, 18850000),
(38, 50, 182, 25, '2023-09-21 02:16:24', NULL, '650ba778b5731', 413000, 20650000),
(39, 50, 183, 25, '2023-09-21 02:17:04', NULL, '650ba7a08ea31', 380000, 19000000),
(40, 50, 185, 25, '2023-09-21 02:18:56', NULL, '650ba810d014e', 445000, 22250000),
(41, 50, 186, 27, '2023-09-21 02:19:17', NULL, '650ba825317d3', 411000, 20550000),
(42, 50, 187, 27, '2023-09-21 02:19:38', NULL, '650ba83aa272e', 8000, 400000),
(43, 50, 188, 27, '2023-09-21 02:20:01', NULL, '650ba851d05c0', 8000, 400000),
(44, 50, 189, 27, '2023-09-21 02:20:20', NULL, '650ba86447b57', 8000, 400000),
(45, 60, 190, 27, '2023-09-21 02:20:41', NULL, '650ba87906861', 8000, 480000),
(46, 70, 191, 27, '2023-09-21 02:20:54', NULL, '650ba886e5f84', 8000, 560000),
(47, 50, 192, 26, '2023-09-21 02:21:39', NULL, '650ba8b333d7f', 270000, 13500000),
(48, 50, 193, 25, '2023-09-21 02:22:07', NULL, '650ba8cfd6509', 475000, 23750000),
(49, 50, 194, 26, '2023-09-21 02:22:24', NULL, '650ba8e056f21', 475000, 23750000),
(50, 40, 195, 26, '2023-09-21 02:22:43', NULL, '650ba8f30bca1', 475000, 19000000),
(51, 35, 196, 27, '2023-09-21 02:23:08', NULL, '650ba90c8f60f', 247000, 8645000),
(52, 10, 222, 26, '2023-09-21 02:23:44', NULL, '650ba930bfe24', 450000, 4500000),
(53, 50, 176, 27, '2023-09-21 02:25:04', NULL, '650ba9802ec67', 645000, 32250000),
(54, 16, 170, 26, '2023-09-21 02:26:18', NULL, '650ba9ca4ae31', 1300000, 20800000),
(55, 2, 211, 25, '2023-09-21 02:27:20', NULL, '650baa08c0d5a', 1450000, 2900000),
(56, 1, 208, 25, '2023-09-21 02:27:45', NULL, '650baa21ae340', 1890000, 1890000),
(59, 10, 228, 33, '2023-10-04 04:22:55', NULL, '651ce89fe0da8', 150000, 1500000);

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
(142, 'nhân viên vui vẻ thân thiện, giao hàng nhanh', 'Hồ Quỳnh Như', '2023-10-02 04:17:51', 25, 56, 1, 0),
(143, 'cảm ơn bạn đã đánh giá', 'GasTech', '2023-10-02 04:18:06', 25, 56, 0, 142),
(144, 'Sản phẩm ổn định ok', 'Thanh Hoàng', '2023-10-04 06:25:31', 25, 62, 1, 0),
(145, 'Nhân viên hoạt bát', 'Thanh Hoàng', '2023-10-06 03:55:14', 25, 62, 0, 0);

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
(13, 'gas tech xin chaos', 'GTXINCHAO1', 1, '10', '2023-08-25 10:08:00', '2023-08-25 03:08:07', '2023-08-31 10:08:00', 2, 1, 20000),
(15, 'Ngày mới', 'NGAYMOI365', 10, '10000', '2023-10-03 12:32:00', '2023-10-03 05:33:08', '2023-12-30 12:32:00', 1, 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_name` varchar(30) NOT NULL,
  `message_parent_message` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `message_content`, `user_id`, `message_name`, `message_parent_message`, `created_at`) VALUES
(1, 'hello', 62, 'Thanh Hoàng', 0, '2023-10-04 06:00:27'),
(2, 'xin chào bạn', 62, 'GasTech', 1, '2023-10-04 06:59:10'),
(3, 'cho mình hỏi có giao tận nhà không ạ', 62, 'Thanh Hoàng', 0, '2023-10-04 11:25:03'),
(4, 'Phí ship làm sao', 62, 'Thanh Hoàng', 0, '2023-10-04 12:14:36'),
(5, '2aaa', 62, 'Thanh Hoàng', 0, '2023-10-05 03:42:34'),
(6, '2aaaaa', 62, 'Thanh Hoàng', 0, '2023-10-05 03:42:41'),
(7, '123', 62, 'Thanh Hoàng', 0, '2023-10-05 03:42:51'),
(8, '😍', 62, 'Thanh Hoàng', 0, '2023-10-06 03:51:25'),
(9, 'hello', 62, 'Thanh Hoàng', 0, '2023-10-06 03:51:40'),
(10, 'xin chao a', 62, 'GasTech', 8, '2023-10-06 03:52:03'),
(26, 'xin chào', 62, 'Thanh Hoàng', 0, '2023-10-06 07:07:34'),
(27, 'mình có bình nhỏ không ạ', 62, 'Thanh Hoàng', 0, '2023-10-06 07:37:48'),
(29, 'This html snippet was created to help web designers, web developers, front-end and back-end developer save time. Use it for free in your project and build your app faster, You can also download the HTML, CSS, and JS code.', 62, 'Thanh Hoàng', 0, '2023-10-06 07:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `loai` varchar(20) NOT NULL,
  `original_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name_product`, `loai`, `original_price`, `price`, `image`, `quantity`, `unit`, `created_at`) VALUES
(170, 'Gas Magic Flame 45kg', '1', NULL, 1690000, 'binh-gas-cong-nghiep-45kg43.jpg', 16, 'bình', '2023-09-17 14:09:32'),
(171, 'Gas Dầu Khí 45kg', '1', NULL, 1625000, 'binh-gas-dau-khi-45kg85.png', 50, 'bình', '2023-09-17 14:09:32'),
(172, 'Gas Bình Minh 45kg vàng', '1', NULL, 1483300, 'gas-binhminh-45kg57.png', 49, 'bình', '2023-09-17 14:09:32'),
(174, 'Gas Gia Đình xám 45kg', '1', NULL, 1547000, 'gas-giadinh-45kg22.png', 50, 'bình', '2023-09-17 14:09:32'),
(175, 'Gas Petro Hồng Hà 45kg', '1', NULL, 1560000, 'gas-hongha-45kg50.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(176, 'gas Petro Limex xanh 45kg', '1', NULL, 838500, 'Petrolimex 48kg51.jpg', 48, 'bình', '2023-09-17 14:09:32'),
(177, 'Gas SaiGon Petro xám 45kg', '1', NULL, 1651000, 'gas-saigon-petro-45kg39.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(178, 'Gas Vạn Lộc Petro hồng 45kg', '1', NULL, 1530100, 'gas-van-loc-45kg71.png', 50, 'bình', '2023-09-17 14:09:32'),
(179, 'Gas Petro Limex xanh 48kg', '1', NULL, 2147600, 'Petrolimex 48kg97.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(180, 'Gas Petro Limex hồng 45kg', '1', NULL, 2210000, 'PetroVietNam 45kg màu hồng88.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(181, 'Gas Total 45kg xám', '1', NULL, 1677000, 'total-gas-45kg42.png', 50, 'bình', '2023-09-17 14:09:32'),
(182, 'Gas Petrolimex Van Chụp 12kg', '2', NULL, 536900, 'gas_petrolimex_van-chup-12kg41.jpg', 48, 'bình', '2023-09-17 14:09:32'),
(183, 'Gas SH Petro xanh 12kg', '2', NULL, 494000, 'gas_shp_petro_12kg84.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(185, 'Gas Bình Minh Vàng 12kg', '2', NULL, 578500, 'gas-binh-minh-mau-vang-12kg16.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(186, 'Gas Bình Minh Xanh 12kg', '2', NULL, 534300, 'gas-binh-minh-mau-xanh_12kg98.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(187, 'Gas Mini đỏ', '2', NULL, 10400, 'gas-mini-đỏ50.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(188, 'Gas Mini vàng', '2', NULL, 10400, 'gas-mini-max-vang18.png', 50, 'bình', '2023-09-17 14:09:32'),
(189, 'Gas Mini xanh', '2', NULL, 10400, 'gas-mini-max-xanh51.png', 50, 'bình', '2023-09-17 14:09:32'),
(190, 'Gas Mini Naminlux cam', '2', NULL, 10400, 'gas-mini-naminlux-cam-247.jpg', 60, 'bình', '2023-09-17 14:09:32'),
(191, 'Gas Mini Naminlux xanh', '2', NULL, 10400, 'gas-namilux-xanh37.jpg', 70, 'bình', '2023-09-17 14:09:32'),
(192, 'Gas PetroVN đỏ 6kg', '2', NULL, 351000, 'gas-petrovn-6kg67.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(193, 'Gas PetroVN đỏ 12kg', '2', NULL, 617500, 'gas-petrovn-đỏ-12kg93.jpg', 50, 'bình', '2023-09-17 14:09:32'),
(194, 'Gas PetroVN hồng 12kg', '2', NULL, 617500, 'gas-petrovn-hồng-12kg99.png', 50, 'bình', '2023-09-17 14:09:32'),
(195, 'Gas PetroVN xám 12kg', '2', NULL, 617500, 'gas-petrovn-xám-12kg78.png', 40, 'bình', '2023-09-17 14:09:32'),
(196, 'Gas Thủ Đức 6kg', '2', NULL, 321100, 'gas-thu-duc-6kg11.png', 35, 'bình', '2023-09-17 14:09:32'),
(208, 'Gas Petrolimex xanh 48kg', '1', NULL, 2457000, 'gas-petrolimex-48kg 16.jpg', 0, 'bình', '2023-09-17 14:09:32'),
(211, 'Gas Bình Minh vàng 45kg', '1', NULL, 1885000, 'gas-binhminh-45kg17.png', 2, 'bình', '2023-09-17 14:09:32'),
(222, 'gas mới', '1', NULL, 500000, 'total-gas-45kg83.png', 5, 'bình', '2023-09-17 14:09:32'),
(223, 'Gas Anpha Petrol 12kg', '2', NULL, 490100, 'Binh-gas-Alpha-Petro-Gas-12kg55.jpg', 50, 'bình', '2023-09-20 09:57:27'),
(228, 'gas 123', '1', 150000, 195000, 'gas_petrolimex_van-chup-12kg52.jpg', 10, 'bình', '2023-10-03 02:40:51');

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
(41, '1000000', 'NCB', 'VNP14116978', 'ATM', 'thanh toan don hang', '20230917090050', 'AKXJR8ZD', '14116978', 15, 285),
(42, '245700000', 'NCB', 'VNP14120972', 'ATM', 'thanh toan don hang', '20230921093352', 'AKXJR8ZD', '14120972', 62, 292);

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
(62, 'Thanh Hoàng', 'hoangthanh28032001@gmail.com', 'eyJpdiI6ImJ0dUhYc29aUUNCazdJcTNDa1Vwbnc9PSIsInZhbHVlIjoiTXA0WWRPUmNiU2pEZ2R4Q2pRVklydEM1eHdqYU9haGhEdmNLakFRaUhjTT0iLCJtYWMiOiIyZmM1MTMwYTk0MTQ4ZmZjYjZkZDYyMTk0Mjg0YTUxZWVmZjQ1Zjg1NWE1NTQyY2U3ZGVmODhjZmMzNmEzMjM4IiwidGFnIjoiIn0=', NULL, NULL, '2023-09-17 02:19:16', '103818879814837903235'),
(63, 'Hoang Van Thanh B1910445', 'thanhb1910445@student.ctu.edu.vn', 'eyJpdiI6ImcwRFAxMitEdE02Y3gvWTBGZ0swQ0E9PSIsInZhbHVlIjoiUUVONXJTV1dBcGp1ZmUrYzZQc0VpTkxRVEg2TXFCc3Z2cjFWNlpJVDVvVT0iLCJtYWMiOiJkM2YzYWU4ODY5ZDNmM2JmMTY3Y2Y2MWI4ZDQ2YzZjMjM3MDI1OWNmODgzNTg3NDE4MGMxMDM3YjZlNmYwNzVhIiwidGFnIjoiIn0=', NULL, NULL, '2023-09-20 03:45:08', '102722470295912129220');

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
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
