-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 09:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nien_luan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `products_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 4, 18, 2, '2023-11-28 02:14:46', '2023-11-28 02:21:54'),
(12, 2, 13, 1, '2023-11-29 20:20:04', '2023-11-29 20:20:04'),
(13, 2, 14, 1, '2023-11-29 20:20:08', '2023-11-29 20:20:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fillable`
--

CREATE TABLE `fillable` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `fillable` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `fillable`
--

INSERT INTO `fillable` (`id`, `type_id`, `fillable`, `name`) VALUES
(1, 1, 'socket', 'Socket'),
(2, 1, 'kichthuoc', 'Kích thước'),
(3, 1, 'kheram', 'Khe Ram tối đa'),
(4, 1, 'kieuram', 'Kiểu RAM hỗ trợ'),
(5, 1, 'dungluong', 'Dung lượng RAM tối đa'),
(6, 1, 'nhasanxuat', 'Hãng sản xuất'),
(7, 2, 'chipset', 'Chipset'),
(8, 2, 'loai', 'Dòng sản phẩm'),
(9, 2, 'thehe', 'Thế hệ CPU'),
(10, 2, 'socket', 'Socket'),
(11, 2, 'nhasanxuat', 'Hãng sản xuất'),
(12, 3, 'dungluong', 'Dung lượng'),
(13, 3, 'loai', 'Loại Gam'),
(14, 3, 'nhasanxuat', 'Hãng sản xuất'),
(15, 4, 'kichthuoc', 'Kích thước'),
(16, 4, 'dungluong', 'Dung lượng'),
(17, 4, 'loai', 'Loại ổ cứng'),
(18, 4, 'nhasanxuat', 'Hãng sản xuất'),
(20, 5, 'chipset', 'Chip set'),
(21, 5, 'dungluong', 'Dung lượng'),
(22, 5, 'loai', 'Kiểu bộ nhớ'),
(23, 5, 'nhasanxuat', 'Hãng sản xuất'),
(24, 6, 'congxuat', 'Công suất nguồn'),
(25, 6, 'nhasanxuat', 'Hãng sản xuất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_09_14_034937_create_carts_table', 1),
(26, '2023_09_16_154437_create_orders_table', 1),
(27, '2023_09_22_024728_create_order_products_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(26, 1, '2023-11-28 01:58:34', '2023-11-28 02:00:15', 1),
(30, 4, '2023-11-28 02:15:05', '2023-11-28 02:33:50', 1),
(31, 1, '2023-11-28 02:59:57', '2023-11-28 02:59:57', 0),
(32, 2, '2023-11-28 03:07:52', '2023-11-28 03:07:52', 0),
(33, 2, '2023-11-29 19:49:17', '2023-11-29 19:49:17', 0),
(34, 2, '2023-11-29 19:51:03', '2023-11-29 19:51:03', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `products_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(17, 26, 13, 1, 7690000, '2023-11-28 01:58:34', '2023-11-28 01:58:34'),
(18, 30, 18, 1, 3890000, '2023-11-28 02:15:05', '2023-11-28 02:15:05'),
(19, 31, 13, 1, 7690000, '2023-11-28 02:59:57', '2023-11-28 02:59:57'),
(20, 31, 24, 1, 1390000, '2023-11-28 02:59:57', '2023-11-28 02:59:57'),
(21, 32, 24, 1, 1390000, '2023-11-28 03:07:52', '2023-11-28 03:07:52'),
(22, 32, 13, 1, 7690000, '2023-11-28 03:07:52', '2023-11-28 03:07:52'),
(23, 33, 13, 1, 7690000, '2023-11-29 19:49:17', '2023-11-29 19:49:17'),
(24, 34, 13, 1, 7690000, '2023-11-29 19:51:03', '2023-11-29 19:51:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `images` varchar(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_type`, `price`, `product_quantity`, `images`, `created_at`, `updated_at`) VALUES
(13, 'Card màn hình Asus DUAL RTX 3060 O12G V2', 5, 7690000, 44, '1701138190.webp', '2023-11-28', '2023-11-30'),
(14, 'Gigabyte Geforce RTX 3060 Gaming OC 12GB', 5, 8190000, 10, '1701140138.webp', '2023-11-28', '2023-11-28'),
(16, 'CPU Intel Core i9 14900K', 2, 15999000, 2, '1701141773.webp', '2023-11-28', '2023-11-28'),
(17, 'CPU AMD Ryzen 5 5600G', 2, 4000000, 2, '1701141956.webp', '2023-11-28', '2023-11-28'),
(18, 'Mainboard Asrock B760M Pro RS/D4 Wifi', 1, 3890000, 2, '1701142083.webp', '2023-11-28', '2023-11-28'),
(19, 'Mainboard Gigabyte Z790 A Elite AX DDR4', 1, 8200000, 3, '1701142203.webp', '2023-11-28', '2023-11-28'),
(20, 'Ram PC G.SKILL Trident Z RGB 16GB 3600MHz DDR4', 3, 1650000, 2, '1701142380.webp', '2023-11-28', '2023-11-28'),
(21, 'RAM PC Corsair DOMINATOR PLATINUM RGB 32GB', 3, 1725000, 3, '1701142589.webp', '2023-11-28', '2023-11-28'),
(23, 'Kingston NV2 M.2 PCIe GEN4 NVMe 1TB', 4, 1290000, 5, '1701142831.webp', '2023-11-28', '2023-11-28'),
(24, 'HDD Seagate One Touch 1TB 2.5 inch', 4, 1390000, 2, '1701143046.webp', '2023-11-28', '2023-11-28'),
(26, 'CORSAIR CV750 750W', 6, 1650000, 2, '1701143272.webp', '2023-11-28', '2023-11-28'),
(27, 'DeepCool PF550D 550W', 6, 900000, 4, '1701143384.webp', '2023-11-28', '2023-11-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `chipset` varchar(10) DEFAULT NULL,
  `socket` varchar(10) DEFAULT NULL,
  `thehe` varchar(30) DEFAULT NULL,
  `kichthuoc` varchar(50) DEFAULT NULL,
  `kheram` int(10) DEFAULT NULL,
  `kieuram` varchar(10) DEFAULT NULL,
  `dungluong` varchar(10) DEFAULT NULL,
  `loai` varchar(20) DEFAULT NULL,
  `congxuat` varchar(30) DEFAULT NULL,
  `tieuchuan` varchar(11) DEFAULT NULL,
  `gpu` varchar(11) DEFAULT NULL,
  `nhasanxuat` varchar(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `chipset`, `socket`, `thehe`, `kichthuoc`, `kheram`, `kieuram`, `dungluong`, `loai`, `congxuat`, `tieuchuan`, `gpu`, `nhasanxuat`, `updated_at`, `created_at`) VALUES
(3, 13, 'NVIDIA', NULL, NULL, NULL, NULL, NULL, '30GB', 'GDDR6', NULL, NULL, NULL, 'ASUS', NULL, NULL),
(4, 14, 'NVIDIA', NULL, NULL, '1', NULL, NULL, '12GB', 'GDDR6', NULL, NULL, NULL, 'Gigabyte', NULL, NULL),
(5, 16, 'Intel', 'LGA 1700', 'Intel thế hệ 14', NULL, NULL, NULL, NULL, 'Core i9', NULL, NULL, NULL, 'INTEL', NULL, NULL),
(6, 17, 'AMD', 'AM4', 'AMD Ryzen thế hệ thứ 5', NULL, NULL, NULL, NULL, 'Ryzen 5', NULL, NULL, NULL, 'AMD', NULL, NULL),
(7, 18, NULL, 'LGA 1700', NULL, 'M-ATX', 4, 'DDR4', '128GB', NULL, NULL, NULL, NULL, 'ASRock', NULL, NULL),
(8, 19, NULL, 'LGA 1700', NULL, 'ATX', 4, 'DDR4', '128GB', NULL, NULL, NULL, NULL, 'Gigabyte', NULL, NULL),
(9, 20, NULL, NULL, NULL, NULL, NULL, NULL, '16GB', 'DDR4', NULL, NULL, NULL, 'G.SKILL', NULL, NULL),
(10, 21, NULL, NULL, NULL, NULL, NULL, NULL, '16GB', 'DDR4', NULL, NULL, NULL, 'Corsair', NULL, NULL),
(11, 23, NULL, NULL, NULL, '22mm x 80mm x 2.2mm', NULL, NULL, '1TB', 'SSD', NULL, NULL, NULL, 'Kingston', NULL, NULL),
(12, 24, NULL, NULL, NULL, '115 x 103 x 11.5 mm', NULL, NULL, '1TB', 'HDD', NULL, NULL, NULL, 'Seagate', NULL, NULL),
(13, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '750W', NULL, NULL, 'Corsair', NULL, NULL),
(14, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '550W', NULL, NULL, 'DeepCool', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_type`
--

CREATE TABLE `products_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products_type`
--

INSERT INTO `products_type` (`id`, `name`) VALUES
(1, 'Mainboard'),
(2, 'CPU'),
(3, 'RAM'),
(4, 'Ổ cứng'),
(5, 'Card màn hình'),
(6, 'Nguồn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `address`, `phone`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Võ Đức Thiên', 'root@root.com', '$2y$10$cfKjU.VLC38m1HW41hD/tOE8hN6Xe2dDcrhu3wWBWpbsGztei4gby', 'Cái Răng, Cần Thơ', 349879811, 1, NULL, '2023-11-13 23:12:38', '2023-11-14 02:17:07'),
(2, 'Võ Đức Thiên', 'thien879811@gmail.com', '$2y$10$Y75zCPznQQLQf1Otuxupre5sV.3ydxKw6ShIxSbrl.ef/YQ508M06', 'Cái Răng, Cần Thơ', 349879811, 0, NULL, '2023-11-14 01:41:53', '2023-11-28 03:07:48'),
(3, 'thien', 'thanh021402@gmail.com', '$2y$10$HOYRuabcVnf3W2tTN4R74OmPDxGS/xh7unbjQw.wjic4w4x14HYWC', 'Cái Răng, Cần Thơ', 123456789, 0, NULL, '2023-11-14 02:35:07', '2023-11-14 07:11:04'),
(4, 'Võ Đức Thiên', 'thienb2014702@outlook.com.vn', '$2y$10$DARR1oymCKhsnIgOa3FioutwEw2A1hnHgE5j86Os1GySKrNrNeGmq', 'Cái Răng, Cần Thơ', 349879811, 0, NULL, '2023-11-28 02:14:10', '2023-11-28 02:14:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_products_id_foreign` (`products_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `fillable`
--
ALTER TABLE `fillable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhasanxuat` (`nhasanxuat`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `fillable`
--
ALTER TABLE `fillable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products_type`
--
ALTER TABLE `products_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `fillable`
--
ALTER TABLE `fillable`
  ADD CONSTRAINT `fillable_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `products_type` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `products_detail_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
