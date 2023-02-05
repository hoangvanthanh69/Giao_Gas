-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 08:47 AM
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
-- Table structure for table `add_staff`
--

CREATE TABLE `add_staff` (
  `id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `chuc_vu` varchar(30) NOT NULL,
  `code_staff` int(10) NOT NULL,
  `date_input` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `luong` varchar(20) NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `dia_chi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_staff`
--

INSERT INTO `add_staff` (`id`, `last_name`, `birth`, `chuc_vu`, `code_staff`, `date_input`, `phone`, `luong`, `taikhoan`, `dia_chi`) VALUES
(44, 'Hoàng Văn Thanh', '2001-03-21', '2', 1111, '2021-01-13', '0837641469', '10000000', 'admin@gmai.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau'),
(45, 'Nguyễn Văn Anh', '1999-07-22', '1', 1112, '2021-08-26', '0848828730', '6000000', 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang'),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', 1113, '2022-06-22', '0919954639', '6000000', 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ'),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', 1114, '2022-01-19', '0717756873', '6000000', 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau'),
(48, 'Lê Văn Duy', '2001-07-18', '1', 1115, '2022-02-11', '0983768651', '6000000', 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ'),
(49, 'Trần Tuấn Khang', '2000-06-09', '1', 1116, '2022-01-24', '0857698326', '6000000', 'khang16@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long'),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '1', 1117, '2022-11-16', '0918936887', '5000000', 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang'),
(52, 'Nguyên Văn Minh', '2001-03-11', '1', 6633, '2022-02-01', '0919936896', '5000000', 'minh@gmail.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau');

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
  `id` int(10) NOT NULL,
  `nameCustomer` varchar(30) NOT NULL,
  `phoneCustomer` varchar(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ghichu` varchar(30) NOT NULL,
  `amount` int(15) NOT NULL,
  `type` int(2) NOT NULL,
  `idProduct` int(30) NOT NULL,
  `name_product` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tong` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `nameCustomer`, `phoneCustomer`, `diachi`, `country`, `state`, `district`, `ghichu`, `amount`, `type`, `idProduct`, `name_product`, `price`, `image`, `created_at`, `tong`) VALUES
(198, 'Lê văn Minh', '0847756873', 'ktx đại học Cần Thơ', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'giao tới ktx A', 2, 2, 187, 'gas mini max vina đỏ', 8000, 'gas-mini-đỏ50.jpg', '2022-11-06 09:37:01', 16000),
(199, 'Lâm Thị Tuyết Nga', '0836745687', 'khu dân cân Hưng Phú Đường số 6', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hành nhanh', 1, 2, 182, 'gas petro limex xanh 12kg', 537000, 'gas_petrolimex_van-chup-12kg41.jpg', '2022-11-06 09:38:21', 537000),
(200, 'Nhà Hàng Hải Sản', '0917765478', 'đường 30/4 số nhà 443', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'nhà hàng hải sản', 5, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2022-11-06 09:40:07', 7750000),
(201, 'Lê Thị Xuân Lan', '0846983572', 'số nhà 337/21', 'Cần Thơ', 'Bình Thủy', 'Trà Nóc', 'cần gắp', 1, 1, 172, 'gas bình minh 45kg vàng', 1600000, 'gas-binhminh-45kg8.png', '2022-11-06 09:41:55', 1600000),
(202, 'Quán ăn già đình 1', '0636764829', 'số nhà 221/2 chợ tân an', 'Cần Thơ', 'Ninh Kiều', 'Tân An', 'giao nhanh', 2, 1, 179, 'gas petro limex xanh 48kg', 1960000, 'Petrolimex 48kg97.jpg', '2022-11-06 09:46:32', 3920000),
(203, 'Kim Thị Mai', '0786843967', 'hẻm 223 số nhà 556', 'Cần Thơ', 'Cái Răng', 'Ba Láng', 'giao tận nhà', 1, 2, 196, 'gas thu duc 6kg', 460000, 'gas-thu-duc-6kg11.png', '2022-11-06 09:47:51', 460000),
(204, 'Quán Nhậu Ốc', '0856798442', '66/6 Nguyễn Văn Linh', 'Cần Thơ', 'Bình Thủy', 'Bình Thủy', 'giao nhanh', 1, 1, 181, 'gas total 45kg xám', 1763000, 'total-gas-45kg42.png', '2022-11-06 09:49:32', 1763000),
(205, 'Quán Cơm Sinh Viên', '0786534496', 'đường Mạc Thiên Tích hẻm 334', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'tới quán', 2, 2, 184, 'gas sopet tím 12kg', 490000, 'gas_sopet_nhat_12kg43.png', '2022-11-06 09:50:57', 980000),
(206, 'Ngọc Sơn Nguyễn', '0848875467', 'đường số 6 hẻm 7 số nhà 221', 'Cần Thơ', 'Ô Môn', 'Châu Văn Liêm', 'tới quán', 4, 1, 179, 'gas petro limex xanh 48kg', 1960000, 'Petrolimex 48kg97.jpg', '2022-11-06 09:52:16', 7840000),
(207, 'Trần Vĩnh Khiêm', '0981635784', 'đường hòa bình, số nhà 30', 'Cần Thơ', 'Ninh Kiều', 'An Khánh', 'giao hàng gắp', 2, 2, 194, 'gas petro vn hồng 12kg', 550000, 'gas-petrovn-hồng-12kg99.png', '2022-11-10 02:03:10', 1100000),
(210, 'Minh Lâm', '012547891', 'dd', 'Cần Thơ', 'Ninh Kiều', 'An Hòa', 'giao hàng nhanh', 2, 1, 176, 'gas petro limex xanh 45kg', 1600000, 'gas-petrolimex-48kg 22.jpg', '2022-11-15 00:43:46', 3200000),
(216, 'nguyễn văn toàn', '01234567891', 'đường 30 /4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hàng nhanh', 3, 1, 177, 'Gas saigon petro 45kg xám', 1650000, 'gas-saigon-petro-45kg39.jpg', '2022-11-23 04:02:47', 4950000),
(219, 'Lê văn Minh', '01234567891', 'số nhà 33 đường 30/4', 'Cần Thơ', 'Ninh Kiều', 'Hưng Lợi', 'giao hàng nhanh', 2, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2022-11-23 07:37:56', 3100000);

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
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', '123456', 'thanh', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `loai` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `code_product` int(10) NOT NULL,
  `original_price` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name_product`, `loai`, `price`, `code_product`, `original_price`, `image`) VALUES
(170, 'gas magic flame 45kg', '1', 925000, 6630, 1550000, 'binh-gas-cong-nghiep-45kg98.jpg'),
(171, 'Gas dầu khí 45kg', '1', 974000, 6631, 1630000, 'binh-gas-dau-khi-45kg85.png'),
(172, 'gas bình minh 45kg vàng', '1', 841000, 6632, 1600000, 'gas-binhminh-45kg8.png'),
(174, 'gas gia đình 45kg', '1', 1050000, 6633, 1670000, 'gas-giadinh-45kg57.png'),
(175, 'gas petro hồng hà 45kg', '1', 1280000, 6634, 1845000, 'gas-hongha-45kg50.jpg'),
(176, 'gas petro limex xanh 45kg', '1', 1010000, 6635, 1600000, 'gas-petrolimex-48kg 22.jpg'),
(177, 'Gas saigon petro 45kg xám', '1', 811000, 6636, 1650000, 'gas-saigon-petro-45kg39.jpg'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 1200000, 6637, 1870000, 'gas-van-loc-45kg71.png'),
(179, 'gas petro limex xanh 48kg', '1', 1180000, 6638, 1960000, 'Petrolimex 48kg97.jpg'),
(180, 'gas petro limex hồng 45kg', '1', 910000, 6639, 1630000, 'PetroVietNam 45kg màu hồng15.jpg'),
(181, 'gas total 45kg xám', '1', 955000, 6640, 1763000, 'total-gas-45kg42.png'),
(182, 'gas petro limex xanh 12kg', '2', 165000, 4401, 537000, 'gas_petrolimex_van-chup-12kg41.jpg'),
(183, 'gas sh petro 12kg', '2', 110000, 4402, 603000, 'gas_shp_petro_12kg84.jpg'),
(184, 'gas sopet tím 12kg', '2', 98000, 4403, 490000, 'gas_sopet_nhat_12kg43.png'),
(185, 'gas binh minh vàng 12kg', '2', 99000, 4404, 550000, 'gas-binh-minh-mau-vang-12kg32.jpg'),
(186, 'gas binh minh xanh12kg', '2', 99000, 4405, 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg'),
(187, 'gas mini max vina đỏ', '2', 2000, 7741, 8000, 'gas-mini-đỏ50.jpg'),
(188, 'gas mini max vina vàng', '2', 2000, 7742, 8000, 'gas-mini-max-vang34.png'),
(189, 'gas mini max vina xanh', '2', 2000, 7743, 8000, 'gas-mini-max-xanh51.png'),
(190, 'gas namilux cam', '2', 2000, 7744, 10000, 'gas-mini-naminlux-cam-247.jpg'),
(191, 'gas namilux xanh', '2', 2000, 7745, 10000, 'gas-namilux-xanh37.jpg'),
(192, 'gas petro đỏ 6kg', '2', 55000, 9931, 460000, 'gas-petrovn-6kg67.jpg'),
(193, 'gas petro vn 12kg đỏ', '2', 120000, 4406, 530000, 'gas-petrovn-đỏ-12kg93.jpg'),
(194, 'gas petro vn hồng 12kg', '2', 120000, 4407, 550000, 'gas-petrovn-hồng-12kg99.png'),
(195, 'gas petro vn 12kg xám', '2', 120000, 4408, 550000, 'gas-petrovn-xám-12kg78.png'),
(196, 'gas Thủ Đức 6kg', '2', 150000, 9932, 460000, 'gas-thu-duc-6kg11.png'),
(203, 'gas edit', '1', 700000, 33667, 1000000, 'gas-binhminh-45kg96.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_staff`
--
ALTER TABLE `add_staff`
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
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_staff`
--
ALTER TABLE `add_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
