
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2022 lúc 05:16 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lkgear`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `userName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `userName`, `password`, `displayName`, `avatarImg`, `email`, `addr`, `sdt`, `role`) VALUES
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', '123', 'public/img/account/logo.png', 'bakasll910@gmail.com', '123', 123, 1),
(25, 'admin1', '[value-3]', 'hiển thị123', 'public/img/account/191517667_793756114658151_5355563704133084111_n.jpg', '123@123', '123', 2147483647, 1),
(33, 'nv1', '202cb962ac59075b964b07152d234b70', 'Nhân Viên 1', 'public/img/account/o11_thumb.jpg', 'nv1@gmail.com', 'Hà Nội', 9123, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `accID` int(11) NOT NULL DEFAULT 19,
  `userName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `accID`, `userName`, `sdt`, `email`, `addr`, `date`, `qty`, `total`, `status`) VALUES
(8, 19, 'Kiên', '09123456', 'ken@gmail.com', 'Hà Lội', '2021-12-16', 15, 220600008, 1),
(9, 19, 'Kiên', '09123456', 'ken@gmail.com', 'Hà Lội', '2021-12-16', 15, 220600008, 1),
(10, 19, 'Lưu Nam', '098123876', 'namgay@gmail.com', 'Uống Bia', '2021-11-17', 6, 176396002, 1),
(11, 19, 'llong', '09123456', 'bakasll910@gmail.com', 'HN', '2021-10-29', 2, 28200001, 1),
(14, 33, 'llong', '09123456', 'bakasll910@gmail.com', 'HN', '2021-12-29', 4, 96997000, 1),
(15, 19, 'llong', '09123456', 'bakasll910@gmail.com', 'HN', '2021-07-29', 4, 117198001, 1),
(16, 19, 'llong', '09123456', 'bakasll910@gmail.com', 'HN', '2021-12-29', 1, 26000000, 1),
(17, 19, 'ken', '09123456', 'bakasll910@gmail.com', 'abc', '2021-12-29', 1, 2200001, 1),
(18, 19, 'llong123', '09128312', 'bakasll910@gmail.com', '333', '2021-12-29', 1, 2200001, 1),
(20, 19, 'llong', '09123456', 'bakasll910@gmail.com', 'HN', '2021-12-31', 3, 19699000, 1),
(21, 19, '1', '123', 'bakasll910@gmail.com', '1', '2022-02-23', 6, 14499000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billinfor`
--

CREATE TABLE `billinfor` (
  `billID` int(11) NOT NULL,
  `prdChillID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `priceSale` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billinfor`
--

INSERT INTO `billinfor` (`billID`, `prdChillID`, `qty`, `price`, `priceSale`, `total`) VALUES
(8, 5, 8, 2599999, 2200001, 17600008),
(8, 7, 7, 30000000, 29000000, 203000000),
(9, 5, 8, 2599999, 2200001, 17600008),
(9, 7, 7, 30000000, 29000000, 203000000),
(10, 5, 2, 2599999, 2200001, 4400002),
(10, 10, 4, 44999000, 42999000, 171996000),
(11, 5, 1, 2599999, 2200001, 2200001),
(11, 6, 1, 28000000, 26000000, 26000000),
(14, 4, 1, 21999000, 20999000, 20999000),
(14, 6, 1, 28000000, 26000000, 26000000),
(14, 9, 2, 25999000, 24999000, 49998000),
(15, 5, 1, 2599999, 2200001, 2200001),
(15, 7, 1, 30000000, 29000000, 29000000),
(15, 10, 2, 44999000, 42999000, 85998000),
(16, 6, 1, 28000000, 26000000, 26000000),
(17, 5, 1, 2599999, 2200001, 2200001),
(18, 5, 1, 2599999, 2200001, 2200001),
(20, 16, 2, 4100000, 2600000, 5200000),
(20, 18, 1, 16000000, 14499000, 14499000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `detail`, `description`, `avatarImg`, `qty`, `active`) VALUES
(2, 'Acer', 'acer', 'Acer', 'Acer', 'public/img/brand/acer_logo.png', 1, 1),
(3, 'ASUS', 'asus', 'ASUS', 'ASUS', 'public/img/brand/asus_logo.png', 1, 1),
(4, 'MSI', 'msi', 'MSI', 'MSI', 'public/img/brand/MSI-logo.png', 1, 1),
(5, 'AMD', 'amd', 'AMD', 'AMD', 'public/img/brand/amd.jpg', 1, 1),
(6, 'DELL', 'dell', 'DELL', 'DELL', 'public/img/brand/dell.png', 1, 1),
(7, 'INTEIL', 'inteil', 'INTEIL', 'INTEIL                                                                                ', 'public/img/brand/intel.jpg', 2, 1),
(8, 'LENOVO', 'lenovo', 'LENOVO', 'LENOVO', 'public/img/brand/lenovo.jpg', 5, 1),
(9, 'GIGABYTE', 'gigabyte', 'gigabyte', 'gigabyte', 'public/img/brand/gigabyte_logo.png', 0, 1),
(10, 'ASROCK', 'asrock', 'ASROCK', 'asrock', 'public/img/brand/asrock.png', 0, 1),
(11, 'COOLER MASTER', 'cooler-master', 'COOLER MASTER', 'COOLER MASTER', 'public/img/brand/coolermaster.png', 200, 1),
(12, 'RAZER', 'razer', 'RAZER', 'RAZER                                        ', 'public/img/brand/razer.jpg', 0, 1),
(13, 'AMD', 'amd', 'AMD', 'AMD', 'public/img/brand/AMD-Logo.png', 2, 1),
(14, 'AKKO', 'akko', 'AKKO ', 'AKKO ', 'public/img/brand/akko.png', 3, 1),
(15, 'CORSAIR', 'corsair', 'CORSAIR', 'CORSAIR', 'public/img/brand/corsair.png', 123, 1),
(16, 'KINGSTON', 'kingston', 'KINGSTON', 'KINGSTON', 'public/img/brand/Kingston-Logo.png', 200, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `avatarImg`, `detail`, `description`, `qty`, `active`) VALUES
(2, 'CPU', 'cpu', 'public/img/category/cpu1.2.png', 'CPU', 'Bộ Vi Sử Lý\r\n                                                                                                                        ', 0, 1),
(3, 'PSU', 'psu', 'public/img/category/30462_super_flower_leadex_platinum_2000w_1.jpg', 'PSU', 'Nguồn Máy Tính                                               ', 12, 1),
(4, 'VGA', 'vga', 'public/img/category/vga3.2.png', 'VGA', 'Card Màn Hình    ', 11, 1),
(5, 'MAINBOARD', 'mainboard', 'public/img/category/39555_1000.png', 'MAINBOARD', 'BO MẠCH CHỦ', 10, 1),
(6, 'Ram', 'ram', 'public/img/category/32645_ktc_product_memory_beast_ddr4_rgb_kit2_1_lg.jpg', 'Ram', 'Bộ nhớ trong', 30, 1),
(7, 'SSD', 'ssd', 'public/img/category/22501_ssd_kingston_a400_120gb_3.jpg', 'SSD', 'Ổ cứng thể rắn', 3, 1),
(8, ' Case', 'case', 'public/img/category/case2.png', ' Case', 'Vỏ máy tính\r\n                                        ', 2, 1),
(9, 'Laptop', 'laptop', 'public/img/category/product2.1.jpg', 'Laptop', 'Laptop', 1, 1),
(10, 'KEYBOARD', 'keyboard', 'public/img/category/39393_e_dra_ek396w__2_.jpg', 'KEYBOARD', 'KEYBOARD', 2, 1),
(11, 'MOUSE', 'mouse', 'public/img/category/chuot.png', 'MOUSE', 'MOUSE', 0, 1),
(12, 'SCREEN', 'screen', 'public/img/category/mh2.png', 'SCREEN', 'SCREEN', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `prdID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respone` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `prdID`, `name`, `email`, `time`, `content`, `respone`, `rate`, `active`) VALUES
(5, 6, 'long', 'bakasll910@gmail.com', '2021-12-09', 'Xịn', '', 4, 0),
(6, 4, 'long', 'bakasll910@gmail.com', '2021-12-10', 'Đểu thế', '', 4, 1),
(8, 8, 'phúc', 'phucwibu@gmail.com', '2021-12-16', 'Hàng đẹp, mượt như gái 18', '', 0, 1),
(9, 8, 'phúc', 'phucwibu@gmail.com', '2021-12-16', 'Hàng đẹp, mượt như gái 18', '', 5, 1),
(10, 8, 'Phúc wibu', 'phuscwibu@gmail.com', '2021-12-16', 'Chà. Hàng đẹp giá ngon', '', 4, 1),
(11, 10, 'Kiên Béo', 'ken@gmail.com', '2021-12-16', 'Ngon Bổ Rẻ. Sẽ ko ủng hộ ', '', 4, 1),
(12, 10, 'Phúc Béo', 'phucwibu@gmail.com', '2021-12-16', 'Trắng như ngọc trinh vậy', '', 2, 1),
(13, 6, 'Kiên gay', 'kiengay123@gmail.com', '2021-12-16', 'ngon ngọt nước quá đi. Sẽ ủng hộ thêm', '', 5, 1),
(14, 4, 'long', 'bakasll910@gmail.com', '2021-12-16', 'Xịn vcl', '', 5, 1),
(15, 6, 'llong', 'bakasll910@gmail.com', '2021-12-29', 'Như cặc', '', 0, 0),
(16, 6, 'phucnigga', 'abc@gmail.com', '0000-00-00', 'vai lon luon', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `mail`, `content`) VALUES
(1, 'long', 'bakasll910@gmail.com', 'hihi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `descprdchill`
--

CREATE TABLE `descprdchill` (
  `id` int(11) NOT NULL,
  `prdChillID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `descprdchill`
--

INSERT INTO `descprdchill` (`id`, `prdChillID`, `name`, `slug`, `detail`, `description`) VALUES
(1, 4, 'Ram', 'ram', '8', 'Ram 8GB'),
(2, 4, 'SSD', 'ssd', '512', 'SSD 512 GB'),
(3, 6, 'GAMING X TRIO', 'gaming-x-trio', 'GAMING X TRIO', 'GAMING X TRIO'),
(4, 6, 'ROG OC ', 'rog-oc', 'ROG OC ', 'ROG OC ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fe`
--

CREATE TABLE `fe` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `fe`
--

INSERT INTO `fe` (`id`, `name`, `slug`, `img`, `title`, `description`, `link`, `active`) VALUES
(5, 'ad1', 'ad1', 'public/img/fe/slideshow_11.jpg', 'ad1', 'ad1', 'this is link', 1),
(6, 'ad2', 'ad2', 'public/img/fe/06_Decc0a905293e57928dddb18b696c37cb4f.jpg', 'ad2', 'ad2', 'link', 1),
(10, 'slider', 'slider', 'public/img/fe/slideshow_5.jpg', 'slider', 'slider', '1', 1),
(11, 'sale cuối năm', 'sale-cuoi-nam', 'public/img/fe/popup_T12-2021-POPUP.png', 'giáng sinh', '                                            sale giáng sinh                                        ', 'this is link', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prdchill`
--

CREATE TABLE `prdchill` (
  `id` int(11) NOT NULL,
  `prdID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `priceSale` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prdchill`
--

INSERT INTO `prdchill` (`id`, `prdID`, `name`, `slug`, `detail`, `brandID`, `price`, `priceSale`, `qty`, `active`) VALUES
(4, 5, 'i5 10300H', 'i5-10300h', 'i5 10300H', 3, 21999000, 20999000, 5, 1),
(5, 10, 'Gloaming Silent Red switch', 'gloaming-silent-red-switch', 'Gloaming Silent Red switch', 3, 2599999, 2200001, 6, 1),
(6, 12, 'GIGABYTE  RTX 3070 MASTER 8G', 'gigabyte-rtx-3070-master-8g', 'GIGABYTE  RTX 3070 MASTER 8G', 3, 28000000, 26000000, 3, 1),
(7, 6, 'i5-11400H', 'i5-11400h', 'i5-11400H | 8GB | 512GB', 2, 30000000, 29000000, 3, 1),
(8, 5, 'i7-11800H', 'i7-11800h', 'i7-11800H | 16GB | 1TB SSD | RTX 3070 8GB', 3, 32000000, 31000000, 7, 1),
(9, 12, ' OC 8G', 'oc-8g', ' OC 8G', 3, 25999000, 24999000, 2, 1),
(10, 8, 'i7-11800H', 'i7-11800h', 'i7-11800H | 16GB | 512GB | RTX 3060 6GB', 8, 44999000, 42999000, 15, 1),
(11, 13, 'AMD R5 5600H | 16GB | 512GB | RTX 3060 | 15.6 inch WQHD | Win 11 | Xanh', 'amd-r5-5600h-16gb-512gb-rtx-3060-156-inch-wqhd-win-11-xanh', 'AMD R5 5600H | 16GB | 512GB | RTX 3060 | 15.6 inch WQHD | Win 11 | Xanh', 8, 37000000, 36000000, 10, 1),
(12, 14, 'Mainboard ASUS TUF GAMING B450M-PRO II', 'mainboard-asus-tuf-gaming-b450m-pro-ii', 'mainboard', 3, 2600000, 2399000, 200, 1),
(13, 15, 'CPU Intel Core i9-12900KF (30M Cache, up to 5.20 GHz, 16C24T, Socket 1700)', 'cpu-intel-core-i9-12900kf-30m-cache-up-to-520-ghz-16c24t-socket-1700', 'cpu', 7, 20000000, 18699000, 200, 1),
(14, 16, 'VGA GIGABYTE GeForce RTX 3060 EAGLE OC 12G (rev. 2.0) (GV-N3060EAGLE OC-12GD)', 'vga-gigabyte-geforce-rtx-3060-eagle-oc-12g-rev-20-gv-n3060eagle-oc-12gd', 'vga', 9, 20000000, 17999000, 200, 1),
(15, 5, 'VGA ASROCK Radeon RX 6600 XT Phantom Gaming D 8GB OC (RX6600XT PGD 8GO)', 'vga-asrock-radeon-rx-6600-xt-phantom-gaming-d-8gb-oc-rx6600xt-pgd-8go', 'vga', 2, 16999000, 15399000, 200, 1),
(16, 18, 'Nguồn máy tính Cooler Master V750 SFX Gold 750W A/EU Cable', 'nguon-may-tinh-cooler-master-v750-sfx-gold-750w-aeu-cable', 'psu', 11, 4100000, 2600000, 200, 1),
(17, 19, 'Chuột Razer DeathAdder V2 Pro Wireless', 'chuot-razer-deathadder-v2-pro-wireless', 'Chuột Razer DeathAdder V2 Pro Wireless', 12, 3499000, 2499000, 200, 1),
(18, 20, 'CPU AMD Ryzen 9 5900X / 3.7 GHz (4.8GHz Max Boost) / 70MB Cache / 12 cores, 24 threads / 105W / Socket AM4', 'cpu-amd-ryzen-9-5900x-37-ghz-48ghz-max-boost-70mb-cache-12-cores-24-threads-105w-socket-am4', 'cpu', 2, 16000000, 14499000, 123, 1),
(19, 21, 'Vỏ case CoolerMaster MASTERCASE H500P TG ARGB', 'vo-case-coolermaster-mastercase-h500p-tg-argb', 'case', 11, 4600000, 4200000, 200, 1),
(20, 22, 'Bàn phím cơ AKKO ACR59 Pink Akko CS Jelly Pink switch', 'ban-phim-co-akko-acr59-pink-akko-cs-jelly-pink-switch', 'Bàn phím cơ AKKO ACR59 Pink Akko CS Jelly Pink switch', 14, 2789000, 2489000, 2, 1),
(21, 23, 'RAM Corsair DOMINATOR PLATINUM RGB 32GB (2x16GB) DDR5 5600MHz Black (CMT32GX5M2X5600C36)', 'ram-corsair-dominator-platinum-rgb-32gb-2x16gb-ddr5-5600mhz-black-cmt32gx5m2x5600c36', 'ram', 15, 14000000, 11990000, 123, 1),
(22, 24, 'RAM Corsair Vengeance LPX 32GB (2x16GB) DDR5 5600MHz Black (CMK32GX5M2B5600C36)', 'ram-corsair-vengeance-lpx-32gb-2x16gb-ddr5-5600mhz-black-cmk32gx5m2b5600c36', 'RAM Corsair Vengeance LPX 32GB (2x16GB) DDR5 5600MHz Black (CMK32GX5M2B5600C36)', 15, 9999000, 9799000, 123, 1),
(23, 25, 'Ram Kingston FURY Beast RGB 32GB (2x16GB) DDR4 3600MHz', 'ram-kingston-fury-beast-rgb-32gb-2x16gb-ddr4-3600mhz', 'Ram Kingston FURY Beast RGB 32GB (2x16GB) DDR4 3600MHz', 16, 4999000, 4499000, 123, 1),
(24, 26, 'Màn hình máy tính Dell P2319H 23\'\' FHD 60Hz', 'man-hinh-may-tinh-dell-p2319h-23-fhd-60hz', 'screen', 6, 4999000, 4690000, 200, 1),
(25, 6, 'Laptop Acer Gaming Nitro 5 AN515-57-56S5 (NH.QEKSV.001) (i5 11400H/8GB Ram/512GB SSD/GTX1650 4G/15.6 inch FHD 144Hz/Win 11/Đen) (2021)', 'laptop-acer-gaming-nitro-5-an515-57-56s5-nhqeksv001-i5-11400h8gb-ram512gb-ssdgtx1650-4g156-inch-fhd-144hzwin-11den-2021', 'Laptop', 2, 22000000, 20000000, 200, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` int(11) NOT NULL,
  `avatarImg1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `categoryID`, `avatarImg1`, `avatarImg2`, `avatarImg3`, `avatarImg4`, `detail`, `active`) VALUES
(5, 'Laptop Asus TUF Gaming A15', 'laptop-asus-tuf-gaming-a15', 9, 'public/img/product/product1.1.jpg', 'public/img/product/product1.2.jpg', 'public/img/product/product1.jpg', 'public/img/product/asus tuf.jpg', 'Laptop Asus TUF Gaming A15 ', 1),
(6, 'Laptop Acer Gaming Nitro 5', 'laptop-acer-gaming-nitro-5', 9, 'public/img/product/product2.1.jpg', 'public/img/product/product2.2.jpg', 'public/img/product/product2.jpg', 'public/img/product/product2.1.jpg', 'Laptop Acer Gaming Nitro 5', 1),
(7, 'Bàn phím cơ E-DRA EK396W', 'ban-phim-co-e-dra-ek396w', 10, 'public/img/product/39393_e_dra_ek396w__2_.jpg', 'public/img/product/39393_e_dra_ek396w__3_.jpg', 'public/img/product/39393_e_dra_ek396w__5_.jpg', 'public/img/product/39393_e_dra_ek396w__1_.jpg', 'Bàn phím cơ E-DRA EK396W', 1),
(8, 'Laptop Lenovo Legion 5', 'laptop-lenovo-legion-5', 9, 'public/img/product/37915_60652_laptop_lenovo_legion_5_pro_12.jpg', 'public/img/product/37915_lenovo_legion_5_pro_16ith6h_ct1_03.png', 'public/img/product/37915_lenovo_legion_5_pro_16ith6h_ct1_06.png', 'public/img/product/37915_lenovo_legion_5_pro_16ith6h_ct2_03.png', 'Laptop Lenovo Legion 5', 1),
(9, 'Bàn phím cơ DareU EK87', 'ban-phim-co-dareu-ek87', 10, 'public/img/product/28894_dareu_ek87_white__1_.png', 'public/img/product/28894_dareu_ek87_white__2_.png', 'public/img/product/28894_dareu_ek87_white__3_.png', 'public/img/product/28894_dareu_ek87_white__2_ (1).png', 'Bàn phím cơ DareU EK87', 1),
(10, 'Bàn phím cơ Mistel Sleeker X-VIII', 'ban-phim-co-mistel-sleeker-x-viii', 10, 'public/img/product/40000_mistel_sleeker_viii_gloaming__1_.jpg', 'public/img/product/40000_mistel_sleeker_viii_gloaming__2_ (1).jpg', 'public/img/product/40000_mistel_sleeker_viii_gloaming__2_.jpg', 'public/img/product/39393_e_dra_ek396w__5_.jpg', 'Bàn phím cơ Mistel Sleeker X-VIII', 1),
(12, 'GeForce RTX 3070', 'geforce-rtx-3070', 4, 'public/img/product/35089_1.png', 'public/img/product/35089_10.png', 'public/img/product/35089_4.png', 'public/img/product/35089_7.png', 'GeForce RTX 3070', 1),
(13, 'Laptop Gaming Lenovo Legion 5', 'laptop-gaming-lenovo-legion-5', 9, 'public/img/product/40011_laptop_gaming_lenovo_legion_5_15ach6h_82ju00mmvn__3_.jpg', 'public/img/product/40011_laptop_gaming_lenovo_legion_5_15ach6h_82ju00mmvn__5_.jpg', 'public/img/product/40011_laptop_gaming_lenovo_legion_5_15ach6h_82ju00mmvn__7_.jpg', 'public/img/product/40011_laptop_gaming_lenovo_legion_5_15ach6h_82ju00mmvn__8_.jpg', 'Laptop Gaming Lenovo Legion 5', 1),
(14, 'Mainboard ASUS TUF GAMING B450M-PRO II', 'mainboard-asus-tuf-gaming-b450m-pro-ii', 5, 'public/img/product/mb1.png', 'public/img/product/mb2.png', 'public/img/product/mb3.png', 'public/img/product/mb4.png', 'mainboard', 1),
(15, 'CPU Intel Core i9-12900KF (30M Cache, up to 5.20 GHz, 16C24T, Socket 1700)', 'cpu-intel-core-i9-12900kf-30m-cache-up-to-520-ghz-16c24t-socket-1700', 2, 'public/img/product/cpu4.jpg', 'public/img/product/cpu4.jpg', 'public/img/product/cpu4.jpg', 'public/img/product/cpu4.jpg', 'cpu', 1),
(16, 'VGA GIGABYTE GeForce RTX 3060 EAGLE OC 12G (rev. 2.0) (GV-N3060EAGLE OC-12GD)', 'vga-gigabyte-geforce-rtx-3060-eagle-oc-12g-rev-20-gv-n3060eagle-oc-12gd', 4, 'public/img/product/vga7.png', 'public/img/product/vga7.1.png', 'public/img/product/vga7.2.png', 'public/img/product/vga7.3.png', 'vga', 1),
(17, 'VGA ASROCK Radeon RX 6600 XT Phantom Gaming D 8GB OC (RX6600XT PGD 8GO)', 'vga-asrock-radeon-rx-6600-xt-phantom-gaming-d-8gb-oc-rx6600xt-pgd-8go', 4, 'public/img/product/vga8.png', 'public/img/product/vga8.1.png', 'public/img/product/vga8.2.png', 'public/img/product/vga8.3.png', 'vga', 1),
(18, 'Nguồn máy tính Cooler Master V750 SFX Gold 750W A/EU Cable', 'nguon-may-tinh-cooler-master-v750-sfx-gold-750w-aeu-cable', 3, 'public/img/product/psu1.png', 'public/img/product/psu2.png', 'public/img/product/psu2.1.png', 'public/img/product/psu2.2.png', 'psu', 1),
(19, 'Chuột Razer DeathAdder V2 Pro Wireless', 'chuot-razer-deathadder-v2-pro-wireless', 11, 'public/img/product/chuot2.jpg', 'public/img/product/chuot2.1.jpg', 'public/img/product/chuot2.2.jpg', 'public/img/product/chuot2.3.jpg', 'Chuột Razer DeathAdder V2 Pro Wireless', 1),
(20, 'CPU AMD Ryzen 9 5900X / 3.7 GHz (4.8GHz Max Boost) / 70MB Cache / 12 cores, 24 threads / 105W / Socket AM4', 'cpu-amd-ryzen-9-5900x-37-ghz-48ghz-max-boost-70mb-cache-12-cores-24-threads-105w-socket-am4', 2, 'public/img/product/cpu1.png', 'public/img/product/cpu1.2.png', 'public/img/product/cpu1.png', 'public/img/product/cpu1.png', 'cpu', 1),
(21, 'Vỏ case CoolerMaster MASTERCASE H500P TG ARGB', 'vo-case-coolermaster-mastercase-h500p-tg-argb', 8, 'public/img/product/case6.png', 'public/img/product/case6.1.png', 'public/img/product/case6.2.png', 'public/img/product/case6.3.png', 'case', 1),
(22, 'Bàn phím cơ AKKO ACR59 Pink Akko CS Jelly Pink switch', 'ban-phim-co-akko-acr59-pink-akko-cs-jelly-pink-switch', 10, 'public/img/product/bp2.jpg', 'public/img/product/bp2.1.jpg', 'public/img/product/bp2.2.jpg', 'public/img/product/bp2.3.jpg', 'Bàn phím cơ AKKO ACR59 Pink Akko CS Jelly Pink switch', 1),
(23, 'RAM Corsair DOMINATOR PLATINUM RGB 32GB (2x16GB) DDR5 5600MHz Black (CMT32GX5M2X5600C36)', 'ram-corsair-dominator-platinum-rgb-32gb-2x16gb-ddr5-5600mhz-black-cmt32gx5m2x5600c36', 6, 'public/img/product/ram1.jpg', 'public/img/product/ram1.jpg', 'public/img/product/ram1.jpg', 'public/img/product/ram1.jpg', 'RAM Corsair DOMINATOR PLATINUM RGB 32GB (2x16GB) DDR5 5600MHz Black (CMT32GX5M2X5600C36)', 1),
(24, 'RAM Corsair Vengeance LPX 32GB (2x16GB) DDR5 5600MHz Black (CMK32GX5M2B5600C36)', 'ram-corsair-vengeance-lpx-32gb-2x16gb-ddr5-5600mhz-black-cmk32gx5m2b5600c36', 6, 'public/img/product/ram2.jpg', 'public/img/product/ram2.1.jpg', 'public/img/product/ram2.2.jpg', 'public/img/product/ram2.3.jpg', 'RAM Corsair Vengeance LPX 32GB (2x16GB) DDR5 5600MHz Black (CMK32GX5M2B5600C36)', 1),
(25, 'Ram Kingston FURY Beast RGB 32GB (2x16GB) DDR4 3600MHz', 'ram-kingston-fury-beast-rgb-32gb-2x16gb-ddr4-3600mhz', 6, 'public/img/product/ram3.png', 'public/img/product/ram3.png', 'public/img/product/ram3.png', 'public/img/product/ram3.png', 'Ram Kingston FURY Beast RGB 32GB (2x16GB) DDR4 3600MHz', 1),
(26, 'Màn hình máy tính Dell P2319H 23\'\' FHD 60Hz', 'man-hinh-may-tinh-dell-p2319h-23-fhd-60hz', 12, 'public/img/product/screen2.jpg', 'public/img/product/screen2.1.jpg', 'public/img/product/screen2.2.jpg', 'public/img/product/screen2.3.jpg', 'Màn hình máy tính Dell P2319H 23\'\' FHD 60Hz', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyendung`
--

INSERT INTO `tuyendung` (`id`, `name`, `mail`, `sdt`, `description`) VALUES
(5, 'long', 'admin@gmail.com', '09123456', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarImg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `displayName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `userName`, `password`, `avatarImg`, `email`, `addr`, `sdt`, `birthday`, `displayName`) VALUES
(6, 'user1', '202cb962ac59075b964b07152d234b70', 'public/img/user/BelugaJrPFP_400x400.jpg', '123@123', 'HN', 912345, '2021-12-01', 'Nguyễn Kiên'),
(8, 'user2', '202cb962ac59075b964b07152d234b70', 'public/img/user/174019167_2891174874432576_1085923473426167080_n.jpg', 'nhoi@gmail.com', 'Yên Bái', 9123, '2001-02-07', 'Hoàng Nhoi'),
(11, 'tam', '202cb962ac59075b964b07152d234b70', 'public/img/user/st,small,507x507-pad,600x600,f8f8f8.jpg', 'tamgai@gmail.com', 'HN', 9123456, '2007-07-19', 'Tâm Gai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warranty`
--

CREATE TABLE `warranty` (
  `id` int(11) NOT NULL,
  `accID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `billID` int(11) NOT NULL,
  `prdid` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accID` (`accID`);

--
-- Chỉ mục cho bảng `billinfor`
--
ALTER TABLE `billinfor`
  ADD PRIMARY KEY (`billID`,`prdChillID`),
  ADD KEY `prdID` (`prdChillID`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prdID` (`prdID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `descprdchill`
--
ALTER TABLE `descprdchill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prdChillParent` (`prdChillID`);

--
-- Chỉ mục cho bảng `fe`
--
ALTER TABLE `fe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prdchill`
--
ALTER TABLE `prdchill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prdParent` (`prdID`),
  ADD KEY `brandID` (`brandID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Chỉ mục cho bảng `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accID` (`accID`),
  ADD KEY `billID` (`billID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `prdid` (`prdid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `descprdchill`
--
ALTER TABLE `descprdchill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `fe`
--
ALTER TABLE `fe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `prdchill`
--
ALTER TABLE `prdchill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `warranty`
--
ALTER TABLE `warranty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`accID`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `billinfor`
--
ALTER TABLE `billinfor`
  ADD CONSTRAINT `billinfor_ibfk_1` FOREIGN KEY (`prdChillID`) REFERENCES `prdchill` (`id`),
  ADD CONSTRAINT `billinfor_ibfk_2` FOREIGN KEY (`billID`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`prdID`) REFERENCES `prdchill` (`id`);

--
-- Các ràng buộc cho bảng `descprdchill`
--
ALTER TABLE `descprdchill`
  ADD CONSTRAINT `descprdchill_ibfk_1` FOREIGN KEY (`prdChillID`) REFERENCES `prdchill` (`id`);

--
-- Các ràng buộc cho bảng `prdchill`
--
ALTER TABLE `prdchill`
  ADD CONSTRAINT `prdchill_ibfk_1` FOREIGN KEY (`prdID`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `prdchill_ibfk_2` FOREIGN KEY (`brandID`) REFERENCES `brand` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `warranty`
--
ALTER TABLE `warranty`
  ADD CONSTRAINT `warranty_ibfk_1` FOREIGN KEY (`accID`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `warranty_ibfk_2` FOREIGN KEY (`billID`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `warranty_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `warranty_ibfk_4` FOREIGN KEY (`prdid`) REFERENCES `prdchill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
