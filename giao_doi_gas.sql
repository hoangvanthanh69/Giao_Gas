-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 04:12 AM
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
(44, 'Lê Văn Xuân', '2001-03-21', '2', '2021-01-13', '0837641469', 10000000, 'vanxuan@gmail.com', 'xã Tân Hải, huyện Phú Tân, tỉnh Cà Mau', 1, 'vanthanh34.jpg'),
(45, 'Nguyễn Văn Anh', '1999-07-22', '1', '2021-08-26', '0848828730', 6000000, 'anh12@gmail.com', 'xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang', 1, 'chaien93.jpg'),
(46, 'Lê Ngọc Quan', '2000-11-06', '1', '2022-06-22', '0919954639', 6000000, 'quan13@gmail.com', 'phường Thới Hòa, quận Ô Môn, thành phố Cần Thơ', 1, 'dekisugi42.jpg'),
(47, 'Hồ Xuân Minh', '1998-02-14', '1', '2022-01-19', '0717756873', 6000000, 'minh14@gmail.com', 'xã Phú Hưng, huyện Cái Nước, tỉnh Cà Mau', 1, 'doraemon27.png'),
(48, 'Lê Văn Duy', '2001-07-18', '1', '2022-02-11', '0983768651', 6000000, 'duy15@gmail.com', 'phường Trà Nóc, quận Bình Thủy, thành phố Cần Thơ', 1, 'shenio3.png'),
(49, 'Trần Tuấn Anh', '2000-06-09', '1', '2022-01-24', '0857698327', 6000000, 'tuananh@gmail.com', 'thị trấn Long Hồ, huyện Long Hồ, tỉnh Vĩnh Long', 1, 'nobitajpg14.jpg'),
(50, 'Lê Thị Cẩm Hường', '2002-11-08', '3', '2022-11-16', '0918936887', 7000000, 'huong17@gmail.com', 'xã Hòa Điền, huyện Kiên Lương, tỉnh Kiên Giang', 1, 'shiduku38.png'),
(62, 'Hà Văn Ý', '1997-12-30', '1', '2022-08-04', '0837641469', 6000000, 'vany114@gmail.com', 'Phước Long, Bạc Liêu', 1, 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg'),
(66, 'Hoàng Văn Thanh', '2001-03-08', '2', '2023-03-03', '0837641469', 11000000, 'thanh@gmail.com', 'hẻm 672, đường 30/4, phường Hưng Lơi, Quận Ninh Kiều, Cần Thơ', 1, 'ưu60.jpg'),
(68, 'Lý Minh Tâm', '1999-03-12', '1', '2022-03-02', '0783382169', 6000000, 'tam@gmai.com', 'xã Tân Hải, huyện Phú Tân, tình Cà Mau', 0, 'nobita266.png'),
(70, 'Hà Ngọc Ý', '2002-05-20', '3', '2023-03-01', '0848875631', 6000000, 'ngocy@gmai.com', 'Mang Thích, Vĩnh Long', 1, 'hình chỉnh42.jpg');

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
(5, '1', '2023-04-16 10:46:02', 25, 344, 2, 0),
(56, '1', '2023-04-17 03:40:19', 26, 322, 5, 0),
(57, '1', '2023-04-17 03:40:25', 26, 322, 2, 0),
(58, 'null', '2023-04-17 04:22:25', 32, 347, 3, 0),
(59, 'null', '2023-04-17 04:22:39', 32, 347, 1, 0),
(60, 'null', '2023-04-17 04:27:56', 32, 347, 1, 0),
(61, 'null', '2023-04-17 04:45:26', 32, 347, 4, 0),
(62, 'null', '2023-04-17 04:56:28', 26, 316, 1, 0),
(63, 'null', '2023-04-17 09:31:09', 27, 374, 5, 0),
(64, 'null', '2023-04-17 09:31:23', 27, 374, 4, 0),
(65, 'null', '2023-04-18 14:36:40', 26, 316, 2, 0),
(66, 'null', '2023-04-18 14:47:12', 32, 347, 5, 0),
(67, 'null', '2023-04-18 14:58:08', 32, 347, 5, 0),
(68, 'null', '2023-04-18 14:59:59', 32, 347, 5, 0),
(69, 'null', '2023-04-18 15:07:03', 32, 347, 5, 0),
(70, 'null', '2023-04-18 15:09:14', 32, 347, 5, 0),
(71, 'null', '2023-04-18 15:11:05', 32, 347, 5, 0),
(72, 'null', '2023-04-18 16:02:03', 32, 347, 5, 33),
(73, 'null', '2023-04-18 16:04:27', 32, 347, 4, 33),
(83, 'null', '2023-04-21 03:48:04', 26, 336, 5, 15),
(85, 'null', '2023-04-25 04:55:06', 26, 316, 4, 15),
(86, 'null', '2023-05-07 12:21:26', 33, 375, 4, 33),
(87, 'null', '2023-05-08 02:23:57', 33, 390, 5, 15),
(88, 'null', '2023-05-29 08:52:52', 26, 336, 5, 15);

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
(336, 'Hoàng Văn Thanh', '0125478911', '30/4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'giao hàng nhanh', 1, 2, 182, 'gas petro limex xanh 12kg', 537000, 'gas_petrolimex_van-chup-12kg41.jpg', '2023-03-27 03:22:24', 537000, '3', 15, 'Lê Ngọc Quan'),
(338, 'Trần Vĩnh Tâm', '0915567382', 'quán ăn nhậu Vĩnh Tâm 20/3', 'Cần Thơ', 'Cái Răng', 'Phú Thứ', 'tới quán', 4, 1, 181, 'gas total 45kg xám', 1763000, 'total-gas-45kg42.png', '2023-03-28 02:33:57', 7052000, '3', 32, 'Hồ Xuân Minh'),
(339, 'Trần Vĩnh Tâm', '0915567382', 'quán ăn nhậu Vĩnh Tâm 20/3', 'Cần Thơ', 'Cái Răng', 'Phú Thứ', 'tới quán', 2, 1, 179, 'gas petro limex xanh 48kg', 1960000, 'Petrolimex 48kg97.jpg', '2023-03-28 04:47:43', 3920000, '3', 32, 'Lê Ngọc Quan'),
(344, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'cần gắp', 2, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-04-03 12:54:16', 3260000, '3', 25, 'Nguyễn Văn Anh'),
(345, 'Trần Vĩnh Tâm', '0687624639', '133/3/225', 'Cần Thơ', 'Cái Răng', 'Hưng Thạnh', 'giao hàng nhanh', 2, 2, 186, 'gas binh minh xanh12kg', 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg', '2023-04-03 13:26:21', 1100000, '3', 32, 'Hà Ngọc Ý'),
(347, 'Cao Ngọc Mai', '0762734865', 'hẻm 572 623/229', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'giao hàng', 2, 2, 195, 'gas petro vn 12kg xám', 550000, 'gas-petrovn-xám-12kg78.png', '2023-04-07 02:26:41', 1100000, '3', 33, 'Trần Tuấn Anh'),
(367, 'Hoàng Văn Thanh', '0125478911', '30/4', 'Cần Thơ', 'Cái Răng', 'Hưng Phú', 'null', 2, 2, 185, 'gas binh minh vàng 12kg', 550000, 'gas-binh-minh-mau-vang-12kg16.jpg', '2023-04-15 12:32:14', 1100000, '3', 15, 'Lê Ngọc Quan'),
(374, 'Lê Thị Kim', '08377568702', 'hẻm 22/3 số nhà 121', 'Cần Thơ', 'Cái Răng', 'Lê Bình', 'cần gắp', 2, 2, 186, 'gas binh minh xanh12kg', 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg', '2023-04-17 09:27:38', 1100000, '3', 25, 'Hồ Xuân Minh'),
(375, 'Cao Ngọc Mai', '0762734865', 'hẻm 572 623/229', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'null', 1, 2, 193, 'gas petro vn 12kg đỏ', 530000, 'gas-petrovn-đỏ-12kg93.jpg', '2023-04-19 08:25:25', 530000, '3', 33, 'Hà Văn Ý'),
(389, 'Hoàng Văn Thanh', '0125478911', '223/33/156', 'Cần Thơ', 'Bình Thủy', 'Bùi Hữu Nghĩa', 'null', 2, 2, 195, 'gas petro vn 12kg xám', 550000, 'gas-petrovn-xám-12kg78.png', '2023-05-07 12:18:20', 1100000, '3', 15, 'Hà Văn Ý'),
(390, 'Hoàng Văn Thanh', '0125478911', '223/33/156', 'Cần Thơ', 'Bình Thủy', 'Bùi Hữu Nghĩa', 'null', 1, 1, 218, 'gas 123', 200000, 'binh-gas-cong-nghiep-45kg58.jpg', '2023-05-08 02:20:47', 200000, '3', 15, 'Hà Văn Ý'),
(392, 'Hoàng Văn Thanh', '0125478911', '223/33/156', 'Cần Thơ', 'Bình Thủy', 'Bùi Hữu Nghĩa', 'null', 1, 1, 181, 'gas total 45kg xám', 1763000, 'total-gas-45kg42.png', '2023-05-28 04:51:06', 1763000, '3', 15, 'Nguyễn Văn Anh'),
(393, 'Cao Ngọc Mai', '0762734865', '1', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', 1, 1, 175, 'gas petro hồng hà 45kg', 1845000, 'gas-hongha-45kg50.jpg', '2023-05-29 07:50:59', 1845000, '1', 33, 'Chưa có người giao'),
(394, 'Cao Ngọc Mai', '0762734865', '1', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'null', 1, 1, 171, 'Gas dầu khí 45kg', 1630000, 'binh-gas-dau-khi-45kg85.png', '2023-05-29 08:12:21', 1630000, '1', 33, 'Hồ Xuân Minh'),
(406, 'Hoàng Văn Thanh', '0125478911', '223/33/156', 'Cần Thơ', 'Bình Thủy', 'Bùi Hữu Nghĩa', 'null', 1, 1, 177, 'Gas saigon petro 45kg xám', 1650000, 'gas-saigon-petro-45kg39.jpg', '2023-05-29 08:58:49', 1650000, '1', 15, 'Người giao hủy'),
(407, 'Trần Vĩnh Tâm', '0687624639', '133/3/225', 'Cần Thơ', 'Cái Răng', 'Hưng Thạnh', 'null', 2, 2, 193, 'gas petro vn 12kg đỏ', 530000, 'gas-petrovn-đỏ-12kg93.jpg', '2023-05-30 07:41:17', 1060000, '1', 32, 'Lê Ngọc Quan'),
(408, 'Trần Vĩnh Tâm', '0687624639', '133/3/225', 'Cần Thơ', 'Cái Răng', 'Hưng Thạnh', 'null', 1, 2, 185, 'gas binh minh vàng 12kg', 550000, 'gas-binh-minh-mau-vang-12kg16.jpg', '2023-05-30 08:07:19', 550000, '2', 32, 'Lê Thị Cẩm Hường'),
(409, 'Hoàng Văn Thanh', '0125478911', '223/33/156', 'Cần Thơ', 'Bình Thủy', 'Bùi Hữu Nghĩa', 'null', 2, 2, 191, 'gas namilux xanh', 10000, 'gas-namilux-xanh37.jpg', '2023-06-12 04:12:39', 20000, '4', 15, 'Chưa có người giao');

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
(28, 'ngocy@gmai.com', 'ngocy1212', 'Hà Ngọc Ý', '3', 'hình chỉnh42.jpg'),
(30, 'huong17@gmail.com', 'camhuong17', 'Lê Thị Cẩm Hường', '3', 'shiduku38.png'),
(31, 'duy15@gmail.com', 'vanduy15', 'Lê Văn Duy', '1', 'shenio3.png'),
(32, 'tuananh@gmail.com', 'tuananh123', 'Trần Tuấn Anh', '1', 'nobitajpg14.jpg'),
(33, 'vany114@gmail.com', '111111', 'Hà Văn Ý', '1', 'z2067482415178_9d8517f9c18dd8cfb626717a14eceba712.jpg'),
(36, 'vanxuan@gmail.com', '111111', 'Lê Văn Xuân', '2', 'vanthanh34.jpg'),
(37, 'thanh@gmail.com', '11223344', 'Hoàng Văn Thanh', '2', 'ưu60.jpg');

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
(174, 'gas gia đình 45kg', '1', 1050000, 6, 1670000, 'gas-giadinh-45kg22.png'),
(175, 'gas petro hồng hà 45kg', '1', 1280000, 6, 1845000, 'gas-hongha-45kg50.jpg'),
(176, 'gas petro limex xanh 45kg', '1', 1010000, 17, 1600000, 'Petrolimex 48kg51.jpg'),
(177, 'Gas saigon petro 45kg xám', '1', 811000, 13, 1650000, 'gas-saigon-petro-45kg39.jpg'),
(178, 'gas vạn lộc petro hồng 45kg', '1', 1200000, 16, 1870000, 'gas-van-loc-45kg71.png'),
(179, 'gas petro limex xanh 48kg', '1', 1180000, 14, 1960000, 'Petrolimex 48kg97.jpg'),
(180, 'gas petro limex hồng 45kg', '1', 910000, 14, 1630000, 'PetroVietNam 45kg màu hồng88.jpg'),
(181, 'gas total 45kg xám', '1', 955000, 11, 1763000, 'total-gas-45kg42.png'),
(182, 'gas petro limex xanh 12kg', '2', 165000, 0, 537000, 'gas_petrolimex_van-chup-12kg41.jpg'),
(183, 'gas sh petro 12kg', '2', 110000, 15, 603000, 'gas_shp_petro_12kg84.jpg'),
(185, 'gas binh minh vàng 12kg', '2', 99000, 9, 550000, 'gas-binh-minh-mau-vang-12kg16.jpg'),
(186, 'gas binh minh xanh12kg', '2', 99000, 16, 550000, 'gas-binh-minh-mau-xanh_12kg98.jpg'),
(187, 'gas mini max vina đỏ', '2', 2000, 18, 8000, 'gas-mini-đỏ50.jpg'),
(188, 'gas mini max vina vàng', '2', 2000, 15, 8000, 'gas-mini-max-vang18.png'),
(189, 'gas mini max vina xanh', '2', 2000, 20, 8000, 'gas-mini-max-xanh51.png'),
(190, 'gas namilux cam', '2', 2000, 20, 10000, 'gas-mini-naminlux-cam-247.jpg'),
(191, 'gas namilux xanh', '2', 2000, 18, 10000, 'gas-namilux-xanh37.jpg'),
(192, 'gas petro đỏ 6kg', '2', 55000, 20, 460000, 'gas-petrovn-6kg67.jpg'),
(193, 'gas petro vn 12kg đỏ', '2', 120000, 14, 530000, 'gas-petrovn-đỏ-12kg93.jpg'),
(194, 'gas petro vn hồng 12kg', '2', 120000, 15, 550000, 'gas-petrovn-hồng-12kg99.png'),
(195, 'gas petro vn 12kg xám', '2', 120000, 14, 550000, 'gas-petrovn-xám-12kg78.png'),
(196, 'gas Thủ Đức 6kg', '2', 150000, 0, 460000, 'gas-thu-duc-6kg11.png'),
(208, 'gas petro màu xanh', '1', 900000, 16, 1000000, 'gas-petrolimex-48kg 16.jpg'),
(211, 'gas vàng bình minh', '1', 800000, 20, 1000000, 'gas-binhminh-45kg91.png');

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
(15, 'Hoàng Văn Thanh', 'hoangthanh@gmail.com', '1234567', '1686991598.jpg'),
(25, 'Lê Thị Kim', 'Kim@gmail.com', '123456', ''),
(32, 'Trần Vĩnh Tâm', 'vinhtam@gmail.com', 'tam123', '1685432452.jpg'),
(33, 'Cao Ngọc Mai', 'ngocmai@gmail.com', '12341234', '1685708801.jpg'),
(34, 'Nguyễn Khang', 'khang@gmail.com', 'khang123', ''),
(35, 'thanhquyen', 'thanhquyen23082001@gmail.com', '123456', ''),
(38, 'Trần Ngọc Vinh', 'ngocvinh123@gmail.com', '123456123456', NULL);

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `trangthai_dh`
--
ALTER TABLE `trangthai_dh`
  MODIFY `TTDH_Ma` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
