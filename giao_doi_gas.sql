-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 05:05 AM
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
(44, 'Lê Văn Xuân', '2001-03-28', '2', '2021-01-14', '0837641469', 10000000, 'vanxuan@gmail.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau', 1, 'vanthanh34.jpg', 11223311, 1),
(45, 'Nguyễn Văn Anh', '1999-07-22', '3', '2021-08-26', '0848828730', 6000000, 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang', 1, 'chaien93.jpg', 114422334, 1),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', '2022-06-22', '0919954639', 6000000, 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ', 1, 'dekisugi42.jpg', 368741235, 1),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', '2022-01-19', '0717756873', 6000000, 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau', 1, 'doraemon27.png', 887462354, 1),
(48, 'Lê Văn Duy', '2001-07-18', '1', '2022-02-11', '0983768651', 6000000, 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ', 1, 'shenio3.png', 898865368, 1),
(49, 'Trần Tuấn Anh', '2000-06-09', '1', '2022-01-24', '0857698327', 6000000, 'tuananh@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long', 0, 'nobitajpg37.jpg', 778741246, 1),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '3', '2022-11-16', '0918936887', 7000000, 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang', 1, 'shiduku38.png', 114421456, 2),
(62, 'Hà Văn Ý', '1997-12-30', '1', '2022-08-04', '0837641469', 6000000, 'vany114@gmail.com', 'Phước Long, Bạc Liêu', 1, 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg', 230474149, 1),
(66, 'Hoàng Văn Thanh', '2001-03-08', '2', '2023-03-03', '0837641469', 11000000, 'thanh@gmail.com', '672, đường 30/4, phường Hưng Lợi Quận Ninh Kiều, Cần Thơ', 1, 'ưu60.jpg', 88747469, 1),
(68, 'Lý Minh Tâm', '1999-03-12', '1', '2022-03-02', '0783382169', 6000000, 'tam@gmai.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau', 0, 'nobita266.png', 11235986, 1),
(70, 'Hà Ngọc Ý', '2002-05-20', '3', '2023-03-01', '0848875631', 6000000, 'ngocy@gmai.com', 'Mang Thích, Vĩnh Long', 1, 'hình chỉnh42.jpg', 124789865, 2),
(82, 'Ngô Văn Minh Khôi', '2001-08-06', '3', '2023-08-15', '0847968769', 6000000, 'vankhoi86@gmail.com', 'trà ôn, Vĩnh Long', 0, '1692098981.png', 88457456, 2);

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
(91, 'null', '2023-07-08 05:22:34', 25, 22, 5, 15),
(92, 'null', '2023-07-08 05:29:56', 25, 20, 5, 15),
(93, 'null', '2023-07-14 17:18:26', 26, 21, 5, 15),
(94, 'null', '2023-08-13 14:20:55', 26, 125, 5, 15);

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
(1, '2014_10_12_000000_create_users_table', 1);

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
(242, 'Hoàng Văn Thanh', '0837641469', 'đường 30/4 hẻm 672', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'null', '1', 1870000, '3', '15', 'Lê Ngọc Quan', '64ec2fe5ef097', '2023-08-28 05:25:57', '[{\"product_id\":178,\"product_name\":\"gas v\\u1ea1n l\\u1ed9c petro h\\u1ed3ng 45kg\",\"product_price\":1870000,\"quantity\":\"1\"}]', '0', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(28, 'ngocy@gmai.com', 'ngocy1313', 'Hà Ngọc Ý', '3', 'hình chỉnh42.jpg'),
(30, 'huong17@gmail.com', 'camhuong17', 'Lê Thị Cẩm Hường', '3', 'shiduku38.png'),
(31, 'duy15@gmail.com', 'vanduy15', 'Lê Văn Duy', '1', 'shenio3.png'),
(33, 'vany114@gmail.com', '111111', 'Hà Văn Ý', '1', 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg'),
(36, 'vanxuan@gmail.com', '111111', 'Lê Văn Xuân', '2', 'vanthanh34.jpg'),
(37, 'thanh@gmail.com', '11223344', 'Hoàng Văn Thanh', '2', 'ưu60.jpg');

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
(9, 'Gas Tech', 'GT128', 1, '10', '2023-08-12 10:21:00', '2023-08-12 03:21:13', '2023-08-17 10:21:00', 2, 1, 10000),
(10, 'VANTHANH', 'VANTHANH2803', 6, '50000', '2023-08-12 21:22:00', '2023-08-12 14:23:03', '2023-08-14 21:22:00', 2, 2, 1000000),
(11, 'VUIVUI', 'VUIVUI11', 8, '1', '2023-08-16 13:44:00', '2023-08-16 06:44:37', '2023-08-24 13:44:00', 2, 1, 20000),
(13, 'gas tech xin chao', 'GTXINCHAO1', 3, '10', '2023-08-25 10:08:00', '2023-08-25 03:08:07', '2023-08-31 10:08:00', 1, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `loai` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) NOT NULL,
  `original_price` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name_product`, `loai`, `price`, `quantity`, `original_price`, `image`) VALUES
(170, 'gas magic flame 45kg', '1', 925000, 0, 1550000, 'binh-gas-cong-nghiep-45kg43.jpg'),
(171, 'Gas dầu khí 45kg', '1', 974000, 0, 1630000, 'binh-gas-dau-khi-45kg85.png'),
(172, 'gas bình minh 45kg vàng', '1', 841000, 0, 1600000, 'gas-binhminh-45kg57.png'),
(174, 'gas gia đình 45kg', '1', 1050000, 0, 1670000, 'gas-giadinh-45kg22.png'),
(175, 'gas petro hồng hà 45kg', '1', 1280000, 0, 1845000, 'gas-hongha-45kg50.jpg'),
(176, 'gas petro limex xanh 45kg', '1', 1010000, 0, 1600000, 'Petrolimex 48kg51.jpg'),
(177, 'Gas saigon petro 45kg xám', '1', 811000, 10, 1650000, 'gas-saigon-petro-45kg39.jpg'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 1200000, 2, 1870000, 'gas-van-loc-45kg71.png'),
(179, 'gas petro limex xanh 48kg', '1', 1180000, 4, 1960000, 'Petrolimex 48kg97.jpg'),
(180, 'gas petro limex hồng 45kg', '1', 910000, 14, 1630000, 'PetroVietNam 45kg màu hồng88.jpg'),
(181, 'gas total 45kg xám', '1', 955000, 5, 1763000, 'total-gas-45kg42.png'),
(182, 'gas petro limex xanh 12kg', '2', 165000, 0, 537000, 'gas_petrolimex_van-chup-12kg41.jpg'),
(183, 'gas sh petro 12kg', '2', 110000, 0, 603000, 'gas_shp_petro_12kg84.jpg'),
(185, 'gas bìnhminh vàng 12kg', '2', 99000, 0, 550000, 'gas-binh-minh-mau-vang-12kg16.jpg'),
(186, 'gas bình minh xanh12kg', '2', 99000, 9, 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg'),
(187, 'gas mini max vina đỏ', '2', 2000, 16, 8000, 'gas-mini-đỏ50.jpg'),
(188, 'gas mini max vina vàng', '2', 2000, 10, 10000, 'gas-mini-max-vang18.png'),
(189, 'gas mini max vina xanh', '2', 2000, 19, 8000, 'gas-mini-max-xanh51.png'),
(190, 'gas namilux cam', '2', 2000, 0, 10000, 'gas-mini-naminlux-cam-247.jpg'),
(191, 'gas namilux xanh', '2', 2000, 18, 10000, 'gas-namilux-xanh37.jpg'),
(192, 'gas petro đỏ 6kg', '2', 55000, 15, 460000, 'gas-petrovn-6kg67.jpg'),
(193, 'gas petro vn 12kg đỏ', '2', 120000, 11, 530000, 'gas-petrovn-đỏ-12kg93.jpg'),
(194, 'gas petro vn hồng 12kg', '2', 120000, 13, 550000, 'gas-petrovn-hồng-12kg99.png'),
(195, 'gas petro vn 12kg xám', '2', 120000, 14, 550000, 'gas-petrovn-xám-12kg78.png'),
(196, 'gas Thủ Đức 6kg', '2', 150000, 8, 460000, 'gas-thu-duc-6kg11.png'),
(208, 'gas petro màu xanh', '1', 900000, 0, 1000000, 'gas-petrolimex-48kg 16.jpg'),
(211, 'gas vàng bình minh', '1', 800000, 0, 1000000, 'gas-binhminh-45kg99.png');

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
(34, '187000000', 'NCB', 'VNP14102782', 'ATM', 'thanh toan don hang', '20230828122629', 'AKXJR8ZD', '14102782', 15, 242);

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
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img`) VALUES
(14, 'Hồ Minh Nam', 'nam@gmail.com', '11223344', ''),
(15, 'Hoàng Văn Thanh', 'hoangthanh28032001@gmail.com', '123456', '1691851117.png'),
(32, 'Trần Vĩnh Tâm', 'vinhtam@gmail.com', 'tam123', '1685432452.jpg'),
(33, 'Cao Ngọc Mai', 'ngocmai@gmail.com', '12341234', '1685708801.jpg'),
(34, 'Nguyễn Khang', 'khang@gmail.com', 'khang123', ''),
(35, 'thanhquyen', 'vophamthanhquyen2308@gmail.com', '123456', '');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
