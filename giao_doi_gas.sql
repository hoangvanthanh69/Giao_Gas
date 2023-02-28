-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 01:15 PM
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
  `date_input` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `luong` float NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `dia_chi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_staff`
--

INSERT INTO `add_staff` (`id`, `last_name`, `birth`, `chuc_vu`, `date_input`, `phone`, `luong`, `taikhoan`, `dia_chi`) VALUES
(44, 'Hoàng Văn Thanh', '2001-03-21', '2', '2021-01-13', '0837641469', 10000000, 'admin@gmai.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau'),
(45, 'Nguyễn Văn Anh', '1999-07-22', '1', '2021-08-26', '0848828730', 6000000, 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang'),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', '2022-06-22', '0919954639', 6000000, 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ'),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', '2022-01-19', '0717756873', 6000000, 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau'),
(48, 'Lê Văn Duy', '2001-07-18', '1', '2022-02-11', '0983768651', 6000000, 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ'),
(49, 'Trần Tuấn Anh', '2000-06-09', '1', '2022-01-24', '0857698326', 6000000, 'khang16@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long'),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '1', '2022-11-16', '0918936887', 5000000, 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang'),
(52, 'Nguyên Văn Linh', '2001-03-11', '1', '2022-02-01', '0919936896', 5000000, 'minh@gmail.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau'),
(62, 'Hà Văn Ý', '1997-12-30', '1', '2022-08-04', '0837641469', 6000000, 'vany114@gmail.com', 'Phước Long, Bạc Liêu');

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
  `tong` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `nameCustomer`, `phoneCustomer`, `diachi`, `country`, `state`, `district`, `ghichu`, `amount`, `type`, `idProduct`, `name_product`, `price`, `image`, `created_at`, `tong`, `status`, `user_id`, `admin_name`) VALUES
(265, 'Lê văn Minh', '1', '1', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', '1', 1, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2023-02-25 07:15:07', 1550000, '3', 15, 'admin'),
(267, 'hoàng văn thanh', '0125478912', '342/12', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'giao hàng nhanh', 2, 2, 183, 'gas sh petro 12kg', 603000, 'gas_shp_petro_12kg84.jpg', '2023-02-25 07:54:27', 1206000, '3', 15, '0'),
(268, 'Lê văn Minh', '0848828793', 'kdc hưng phú 1 đường A2', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hàng nhanh', 3, 1, 172, 'gas bình minh 45kg vàng', 1600000, 'gas-binhminh-45kg8.png', '2023-02-25 08:12:48', 4800000, '3', 13, '0'),
(269, 'nguyen van a', '0123456', 'ư', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'tới nhà', 2, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-02-25 08:42:46', 3260000, '3', 15, '0'),
(270, 'Hoàng Văn Thanh', '0897641467', '35/8/82', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'tới nhà', 2, 2, 194, 'gas petro vn hồng 12kg', 550000, 'gas-petrovn-hồng-12kg99.png', '2023-02-27 08:01:42', 1100000, '2', 15, 'nam'),
(271, 'Lê văn Minh', '0123456', '1', 'Cần Thơ', 'Ninh Kiều', 'An Khánh', 'giao hàng nhanh', 1, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2023-02-28 11:34:21', 1550000, '4', 15, '0'),
(272, 'Lê văn Minh', '0123456', '2', 'Cần Thơ', 'Ninh Kiều', 'An Phú', '2', 2, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-02-28 11:39:36', 3260000, '1', 15, '0'),
(273, 'Lê văn Minh', '01254789', '1', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', '1', 1, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2023-02-28 12:05:56', 1550000, '1', 15, 'thanh'),
(274, 'Lê văn Minh', '01254789', 'ff', 'Cần Thơ', 'Ô Môn', 'Thới Hòa', 'giao hàng nhanh', 2, 2, 187, 'gas mini max vina đỏ', 8000, 'gas-mini-đỏ50.jpg', '2023-02-28 12:11:13', 16000, '1', 15, 'admin_name'),
(275, 'Lê văn Minh', '0123456', 'sc', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'giao hàng nhanh', 2, 1, 181, 'gas total 45kg xám', 1763000, 'total-gas-45kg42.png', '2023-02-28 12:12:53', 3526000, '1', 15, 'chưa giao');

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
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `product_id`) VALUES
(2, 'admin@gmail.com', '123456', 'admin', 265),
(3, 'thanh@gmail.com', '11223344', 'thanh', 270),
(4, 'nam@gmail.com', '123456', 'nam', 265);

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
(170, 'gas magic flame 45kg', '1', 925000, 19, 1550000, 'binh-gas-cong-nghiep-45kg98.jpg'),
(171, 'Gas dầu khí 45kg', '1', 974000, 18, 1630000, 'binh-gas-dau-khi-45kg85.png'),
(172, 'gas bình minh 45kg vàng', '1', 841000, 13, 1600000, 'gas-binhminh-45kg8.png'),
(174, 'gas gia đình 45kg', '1', 1050000, 20, 1670000, 'gas-giadinh-45kg57.png'),
(175, 'gas petro hồng hà 45kg', '1', 1280000, 20, 1845000, 'gas-hongha-45kg50.jpg'),
(176, 'gas petro limex xanh 45kg', '1', 1010000, 20, 1600000, 'gas-petrolimex-48kg 22.jpg'),
(177, 'Gas saigon petro 45kg xám', '1', 811000, 20, 1650000, 'gas-saigon-petro-45kg39.jpg'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 1200000, 20, 1870000, 'gas-van-loc-45kg71.png'),
(179, 'gas petro limex xanh 48kg', '1', 1180000, 20, 1960000, 'Petrolimex 48kg97.jpg'),
(180, 'gas petro limex hồng 45kg', '1', 910000, 20, 1630000, 'PetroVietNam 45kg màu hồng15.jpg'),
(181, 'gas total 45kg xám', '1', 955000, 18, 1763000, 'total-gas-45kg42.png'),
(182, 'gas petro limex xanh 12kg', '2', 165000, 20, 537000, 'gas_petrolimex_van-chup-12kg41.jpg'),
(183, 'gas sh petro 12kg', '2', 110000, 20, 603000, 'gas_shp_petro_12kg84.jpg'),
(184, 'gas sopet tím 12kg', '2', 98000, 20, 490000, 'gas_sopet_nhat_12kg43.png'),
(185, 'gas binh minh vàng 12kg', '2', 99000, 20, 550000, 'gas-binh-minh-mau-vang-12kg32.jpg'),
(186, 'gas binh minh xanh12kg', '2', 99000, 20, 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg'),
(187, 'gas mini max vina đỏ', '2', 2000, 18, 8000, 'gas-mini-đỏ50.jpg'),
(188, 'gas mini max vina vàng', '2', 2000, 20, 8000, 'gas-mini-max-vang34.png'),
(189, 'gas mini max vina xanh', '2', 2000, 20, 8000, 'gas-mini-max-xanh51.png'),
(190, 'gas namilux cam', '2', 2000, 20, 10000, 'gas-mini-naminlux-cam-247.jpg'),
(191, 'gas namilux xanh', '2', 2000, 20, 10000, 'gas-namilux-xanh37.jpg'),
(192, 'gas petro đỏ 6kg', '2', 55000, 20, 460000, 'gas-petrovn-6kg67.jpg'),
(193, 'gas petro vn 12kg đỏ', '2', 120000, 20, 530000, 'gas-petrovn-đỏ-12kg93.jpg'),
(194, 'gas petro vn hồng 12kg', '2', 120000, 18, 550000, 'gas-petrovn-hồng-12kg99.png'),
(195, 'gas petro vn 12kg xám', '2', 120000, 20, 550000, 'gas-petrovn-xám-12kg78.png'),
(196, 'gas Thủ Đức 6kg', '2', 150000, 20, 460000, 'gas-thu-duc-6kg11.png'),
(208, 'gas mới', '1', 900000, 20, 1000000, 'Petrolimex 48kg52.jpg');

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
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(12, 'Nguyên Văn A', 'A@gmail.com', '123456'),
(13, 'Lê Văn Minh', 'minh@gmail.com', 'minh1122'),
(14, 'Hồ Minh Nam', 'nam@gmail.com', '11223344'),
(15, 'Hoàng Văn Thanh', 'hoangthanh@gmail.com', '123456');

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
-- AUTO_INCREMENT for table `add_staff`
--
ALTER TABLE `add_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
