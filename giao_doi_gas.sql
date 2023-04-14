-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 04:52 PM
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
  `dia_chi` varchar(100) NOT NULL,
  `status_add` tinyint(1) NOT NULL,
  `image_staff` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_staff`
--

INSERT INTO `add_staff` (`id`, `last_name`, `birth`, `chuc_vu`, `date_input`, `phone`, `luong`, `taikhoan`, `dia_chi`, `status_add`, `image_staff`) VALUES
(44, 'Lê Văn Xuân', '2001-03-21', '2', '2021-01-13', '0837641469', 10000000, 'vanxuan@gmail.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau', 1, 'ưu11.jpg'),
(45, 'Nguyễn Văn Anh', '1999-07-22', '1', '2021-08-26', '0848828730', 6000000, 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang', 1, 'chaien93.jpg'),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', '2022-06-22', '0919954639', 6000000, 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ', 1, 'dekisugi42.jpg'),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', '2022-01-19', '0717756873', 6000000, 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau', 1, 'doraemon27.png'),
(48, 'Lê Văn Duy', '2001-07-18', '1', '2022-02-11', '0983768651', 6000000, 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ', 1, 'shenio3.png'),
(49, 'Trần Tuấn Anh', '2000-06-09', '1', '2022-01-24', '0857698327', 6000000, 'tuananh@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long', 1, 'nobitajpg14.jpg'),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '3', '2022-11-16', '0918936887', 7000000, 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang', 1, 'shiduku38.png'),
(62, 'Hà Văn Ý', '1997-12-30', '1', '2022-08-04', '0837641469', 6000000, 'vany114@gmail.com', 'Phước Long, Bạc Liêu', 0, 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg'),
(66, 'Hoàng Văn Thanh', '2001-03-08', '2', '2023-03-03', '0837641469', 11000000, 'thanh@gmail.com', 'hẻm 672, đường 30/4, phường Hưng Lơi, Quận Ninh Kiều, Cần Thơ', 1, 'vanthanh25.jpg'),
(68, 'Lý Minh Tâm', '1999-03-12', '1', '2022-03-02', '0783382169', 6000000, 'tam@gmai.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau', 0, 'nobita266.png'),
(70, 'Hà Ngọc Ý', '2002-05-20', '3', '2023-03-01', '0848875631', 6000000, 'ngocy@gmai.com', 'Mang Thích, Vĩnh Long', 1, 'thanhthanh75.jpg');

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
(297, 'Hồ Minh Nam', '0123456111', '1111', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'giao hàng nhanh', 1, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-03-24 05:23:57', 1630000, '3', 14, 'Hoàng Văn Thanh'),
(313, 'Hoàng Văn Thanh', '0877568708', 'quán ăn gia đình', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', '2', 2, 1, 172, 'gas bình minh 45kg vàng', 1600000, 'gas-binhminh-45kg8.png', '2023-03-24 10:57:27', 3200000, '3', 15, 'Lê Văn Xuân'),
(314, 'Hồ Minh Nam', '0919938012', 'hẻm 454 23/4/2', 'Cần Thơ', 'Bình Thủy', 'Trà An', '1', 1, 2, 182, 'gas petro limex xanh 12kg', 537000, 'gas_petrolimex_van-chup-12kg41.jpg', '2023-03-24 13:00:57', 537000, '3', 14, 'Lê Ngọc Quan'),
(316, 'Hoàng Văn Thanh', '0877568708', 'quán ăn gia đình', 'Cần Thơ', 'Cái Răng', 'Tân Phú', '1', 1, 2, 183, 'gas sh petro 12kg', 603000, 'gas_shp_petro_12kg84.jpg', '2023-03-24 14:28:41', 603000, '3', 15, 'Lê Ngọc Quan'),
(318, 'Hồ Minh Nam', '0919938012', 'hẻm 454 23/4/2', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', '1', 1, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-03-24 14:36:50', 1630000, '3', 14, 'Hoàng Văn Thanh'),
(319, 'Hồ Minh Nam', '0919938012', 'hẻm 454 23/4/2', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', '1', 1, 1, 172, 'gas bình minh 45kg vàng', 1600000, 'gas-binhminh-45kg8.png', '2023-03-24 14:41:12', 1600000, '3', 14, 'Lê Ngọc Quan'),
(322, 'Hồ Minh Nam', '0919938012', 'hẻm 454 23/4/2', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', '1', 1, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-03-24 15:26:56', 1630000, '3', 14, 'Lê Ngọc Quan'),
(336, 'Hoàng Văn Thanh', '0125478911', '30/4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hàng nhanh', 1, 2, 182, 'gas petro limex xanh 12kg', 537000, 'gas_petrolimex_van-chup-12kg41.jpg', '2023-03-27 03:22:24', 537000, '3', 15, 'Lê Ngọc Quan'),
(337, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'giao tới nhà', 3, 1, 177, 'Gas saigon petro 45kg xám', 1650000, 'gas-saigon-petro-45kg39.jpg', '2023-03-27 04:16:38', 4950000, '3', 25, 'Hoàng Văn Thanh'),
(338, 'Trần Vĩnh Tâm', '0915567382', 'quán ăn nhậu Vĩnh Tâm 20/3', 'Cần Thơ', 'Cái Răng', 'Phú Thứ', 'tới quán', 4, 1, 181, 'gas total 45kg xám', 1763000, 'total-gas-45kg42.png', '2023-03-28 02:33:57', 7052000, '3', 32, 'Hồ Xuân Minh'),
(339, 'Trần Vĩnh Tâm', '0915567382', 'quán ăn nhậu Vĩnh Tâm 20/3', 'Cần Thơ', 'Cái Răng', 'Phú Thứ', 'tới quán', 2, 1, 179, 'gas petro limex xanh 48kg', 1960000, 'Petrolimex 48kg97.jpg', '2023-03-28 04:47:43', 3920000, '3', 32, 'Lê Ngọc Quan'),
(341, 'Cao Ngọc Mai', '0762734865', 'hẻm 572 623/229', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'giao tới nhà', 4, 1, 211, 'gas vàng bình minh', 1000000, 'gas-binhminh-45kg29.png', '2023-03-31 03:26:58', 4000000, '3', 33, 'Người giao hủy'),
(343, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'cần gắp', 5, 1, 180, 'gas petro limex hồng 45kg', 1630000, 'PetroVietNam 45kg màu hồng15.jpg', '2023-04-03 12:10:19', 8150000, '3', 25, 'Hà Ngọc Ý'),
(344, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'cần gắp', 2, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-04-03 12:54:16', 3260000, '3', 25, 'Nguyễn Văn Anh'),
(345, 'Trần Vĩnh Tâm', '0687624639', '133/3/225', 'Cần Thơ', 'Cái Răng', 'Hưng Thạnh', 'giao hàng nhanh', 2, 2, 186, 'gas binh minh xanh12kg', 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg', '2023-04-03 13:26:21', 1100000, '3', 32, 'Hà Ngọc Ý'),
(346, 'Hoàng Văn Thanh', '0125478911', '30/4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hàng nhanh', 3, 2, 188, 'gas mini max vina vàng', 8000, 'gas-mini-max-vang34.png', '2023-04-06 08:21:10', 24000, '2', 15, 'Hồ Xuân Minh'),
(347, 'Cao Ngọc Mai', '0762734865', 'hẻm 572 623/229', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'giao hàng', 2, 2, 195, 'gas petro vn 12kg xám', 550000, 'gas-petrovn-xám-12kg78.png', '2023-04-07 02:26:41', 1100000, '3', 33, 'Trần Tuấn Anh'),
(351, 'Cao Ngọc Mai', '0762734865', 'hẻm 572 623/229', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', '1', 1, 1, 170, 'gas magic flame 45kg', 1550000, 'binh-gas-cong-nghiep-45kg98.jpg', '2023-04-07 05:52:22', 1550000, '1', 33, 'Chưa có người giao'),
(353, 'Hoàng Văn Thanh', '0125478911', '30/4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', '1', 1, 1, 211, 'gas vàng bình minh', 1000000, 'gas-binhminh-45kg29.png', '2023-04-07 07:32:32', 1000000, '1', 15, 'Người giao hủy'),
(364, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'giao hàng nhanh', 1, 2, 196, 'gas Thủ Đức 6kg', 460000, 'gas-thu-duc-6kg11.png', '2023-04-14 13:31:32', 460000, '4', 25, 'Chưa có người giao'),
(366, 'Trần Vĩnh Tâm', '0687624639', '133/3/225', 'Cần Thơ', 'Cái Răng', 'Hưng Thạnh', 'null', 1, 1, 211, 'gas vàng bình minh', 1000000, 'gas-binhminh-45kg29.png', '2023-04-14 05:36:26', 1000000, '1', 32, 'Chưa có người giao');

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
  `chuc_vu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `chuc_vu`) VALUES
(2, 'admin@gmail.com', '123456', 'admin', '2'),
(15, 'thanh@gmail.com', '123456', 'Hoàng Văn Thanh', '1'),
(22, 'vanxuan@gmail.com', '111111', 'Lê Văn Xuân', '2'),
(25, 'anh12@gmail.com', '222222', 'Nguyễn Văn Anh', '1'),
(26, 'quan13@gmail.com', 'quan123', 'Lê Ngọc Quan', '1'),
(27, 'minh14@gmail.com', 'minh123', 'Hồ Xuân Minh', '1'),
(28, 'ngocy@gmai.com', 'ngocy1212', 'Hà Ngọc Ý', '3'),
(30, 'huong17@gmail.com', 'camhuong17', 'Lê Thị Cẩm Hường', '3'),
(31, 'duy15@gmail.com', 'vanduy15', 'Lê Văn Duy', '1'),
(32, 'tuananh@gmail.com', 'tuananh123', 'Trần Tuấn Anh', '1');

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
(170, 'gas magic flame 45kg', '1', 925000, 4, 1550000, 'binh-gas-cong-nghiep-45kg98.jpg'),
(171, 'Gas dầu khí 45kg', '1', 974000, 10, 1630000, 'binh-gas-dau-khi-45kg85.png'),
(172, 'gas bình minh 45kg vàng', '1', 841000, 10, 1600000, 'gas-binhminh-45kg12.png'),
(174, 'gas gia đình 45kg', '1', 1050000, 18, 1670000, 'gas-giadinh-45kg85.png'),
(175, 'gas petro hồng hà 45kg', '1', 1280000, 14, 1845000, 'gas-hongha-45kg50.jpg'),
(176, 'gas petro limex xanh 45kg', '1', 1010000, 18, 1600000, 'gas-petrolimex-48kg 4.jpg'),
(177, 'Gas saigon petro 45kg xám', '1', 811000, 15, 1650000, 'gas-saigon-petro-45kg39.jpg'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 1200000, 17, 1870000, 'gas-van-loc-45kg71.png'),
(179, 'gas petro limex xanh 48kg', '1', 1180000, 18, 1960000, 'Petrolimex 48kg97.jpg'),
(180, 'gas petro limex hồng 45kg', '1', 910000, 15, 1630000, 'PetroVietNam 45kg màu hồng88.jpg'),
(181, 'gas total 45kg xám', '1', 955000, 12, 1763000, 'total-gas-45kg42.png'),
(182, 'gas petro limex xanh 12kg', '2', 165000, 5, 537000, 'gas_petrolimex_van-chup-12kg41.jpg'),
(183, 'gas sh petro 12kg', '2', 110000, 17, 603000, 'gas_shp_petro_12kg84.jpg'),
(185, 'gas binh minh vàng 12kg', '2', 99000, 12, 550000, 'gas-binh-minh-mau-vang-12kg16.jpg'),
(186, 'gas binh minh xanh12kg', '2', 99000, 18, 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg'),
(187, 'gas mini max vina đỏ', '2', 2000, 18, 8000, 'gas-mini-đỏ50.jpg'),
(188, 'gas mini max vina vàng', '2', 2000, 15, 8000, 'gas-mini-max-vang18.png'),
(189, 'gas mini max vina xanh', '2', 2000, 20, 8000, 'gas-mini-max-xanh51.png'),
(190, 'gas namilux cam', '2', 2000, 20, 10000, 'gas-mini-naminlux-cam-247.jpg'),
(191, 'gas namilux xanh', '2', 2000, 20, 10000, 'gas-namilux-xanh37.jpg'),
(192, 'gas petro đỏ 6kg', '2', 55000, 20, 460000, 'gas-petrovn-6kg67.jpg'),
(193, 'gas petro vn 12kg đỏ', '2', 120000, 18, 530000, 'gas-petrovn-đỏ-12kg93.jpg'),
(194, 'gas petro vn hồng 12kg', '2', 120000, 15, 550000, 'gas-petrovn-hồng-12kg99.png'),
(195, 'gas petro vn 12kg xám', '2', 120000, 18, 550000, 'gas-petrovn-xám-12kg78.png'),
(196, 'gas Thủ Đức 6kg', '2', 150000, 16, 460000, 'gas-thu-duc-6kg11.png'),
(208, 'gas petro màu xanh', '1', 900000, 19, 1000000, 'gas_petrolimex_van-chup-12kg97.jpg'),
(211, 'gas vàng bình minh', '1', 800000, 12, 1000000, 'gas-binhminh-45kg91.png'),
(216, 'gas mới', '2', 300000, 0, 550000, 'gas-petrovn-đỏ-12kg39.jpg');

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(14, 'Hồ Minh Nam', 'nam@gmail.com', '11223344'),
(15, 'Hoàng Văn Thanh', 'hoangthanh@gmail.com', '123456'),
(25, 'Lê Thị Kim', 'Kim@gmail.com', '123456'),
(32, 'Trần Vĩnh Tâm', 'vinhtam@gmail.com', 'tam123'),
(33, 'Cao Ngọc Mai', 'ngocmai@gmail.com', '123123'),
(34, 'Nguyễn Khang', 'khang@gmail.com', 'khang123');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
