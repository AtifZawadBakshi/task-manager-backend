-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 12:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fairexdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sofen', 'sofen@gmail.com', NULL, '$2y$10$y1slJOm.xWe67G9WzZJrYeaZ96dzUcyYUuwBFxUmGk3Dr2D9.8TtG', '01700718852', NULL, '2021-12-13 21:19:48', '2021-12-13 21:19:48'),
(2, 'rabby', 'rabby@gmail.com', NULL, '$2y$10$a/lqyOyaCc80AVj2.yhzw.GVITw6BDcqdG6ZCkM/XtR5u6zx0y6tC', '01700718852', NULL, '2021-12-14 00:17:39', '2021-12-14 00:17:39'),
(3, 'Mahmud', 'mahmud@gmail.com', NULL, '$2y$10$l1v0ABJP369Uy5BAJDoEn.KEUzZSGkiUxhtUs4gPL1hJua2s746au', '01700718852', NULL, '2021-12-14 01:36:34', '2021-12-14 01:36:34'),
(4, 'Mahmudee', 'mahmudee@gmail.com', NULL, '$2y$10$ln/9O9L92CEy5qMvihZVqe5IeOABTvh78Jb/MqvMWYKpjdYw7qr3q', '01700718852', NULL, '2021-12-14 02:57:19', '2021-12-14 02:57:19'),
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$10$esuSV80wga01Js7vURIQh.f55EL8OnJzP5Bj0tOYASM36S3G6GPiG', '01700718852', NULL, '2021-12-21 03:10:56', '2021-12-21 03:10:56'),
(6, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$77eCdW0BcBOMJJ6xsZNhbOhKtMuo54.CXsG2WDwP7fm1bKxTzaIiy', '01878152754', NULL, '2021-12-21 03:12:56', '2021-12-21 03:12:56'),
(16, 'Mahmudeejhbhj', 'mahmudeeejhbhjbhj@gmail.com', NULL, '$2y$10$ymG1flxu9cWkoZxOWcMjHug8rTEPCh.BtAabjB2oXeUVXvAgKZkR.', '017007187787', NULL, '2022-04-02 00:45:15', '2022-04-02 00:45:15'),
(17, 'Kabir', 'kabir@gmail.com', NULL, '$2y$10$boHgr6jy7h1SF6uvNJqBqeur4TEqt7tBB1avGqfEDuhTJMQMZdD6K', '01700710001', NULL, '2022-04-02 22:48:13', '2022-04-02 22:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `availables`
--

CREATE TABLE `availables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availables`
--

INSERT INTO `availables` (`id`, `warehouse_id`, `location_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, '2021-12-15 02:13:50', '2021-12-15 02:13:50'),
(4, 1, 1, '2021-12-15 02:36:56', '2021-12-15 02:36:56'),
(5, 2, 2, '2021-12-15 03:29:30', '2021-12-15 03:29:30'),
(6, 3, 3, '2021-12-15 04:13:14', '2021-12-15 04:13:14'),
(7, 2, 3, '2021-12-15 04:15:02', '2021-12-15 04:15:02'),
(8, 3, 1, '2021-12-15 04:15:43', '2021-12-15 04:15:43'),
(9, 2, 3, '2021-12-15 04:17:20', '2022-01-11 22:49:36'),
(49, 1, 3, '2022-01-11 23:04:04', '2022-01-11 23:04:04'),
(50, 2, 1, '2022-01-11 23:04:56', '2022-01-11 23:04:56'),
(51, 1, 2, '2022-01-15 00:15:56', '2022-01-15 00:15:56');

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
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `medium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_issue` timestamp NULL DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `order_id`, `medium`, `date_of_issue`, `product_type`, `category`, `main_category`, `sub_category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Inbound1', '2022-01-05 18:00:00', 'CE', 'Survice1', 'Instlation1', 'Job Id1', 1, 4, NULL, '2022-01-06 06:04:41', '2022-01-06 06:04:41'),
(2, 2, 'Inbound', '2022-01-05 18:00:00', 'CE', 'Survice', 'Instlation', 'Job Id', 1, 4, NULL, '2022-01-06 06:05:07', '2022-01-06 06:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) NOT NULL,
  `home_delivery` tinyint(1) NOT NULL DEFAULT 0,
  `lockdown` tinyint(1) NOT NULL DEFAULT 0,
  `base_charge` double DEFAULT NULL,
  `per_kg_inside_dhaka_charge` double DEFAULT NULL,
  `per_kg_outside_dhaka_charge` double DEFAULT NULL,
  `cod_charge_outside_of_dhaka` double DEFAULT NULL,
  `cod_charge_inside_of_dhaka` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `division`, `district`, `area`, `thana`, `post_code`, `home_delivery`, `lockdown`, `base_charge`, `per_kg_inside_dhaka_charge`, `per_kg_outside_dhaka_charge`, `cod_charge_outside_of_dhaka`, `cod_charge_inside_of_dhaka`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Dhaka', 'Banani', 'Banani', 1213, 1, 0, 90, 50, 0, 0, 140, '2021-12-13 05:19:40', '2021-12-13 05:19:40'),
(2, 'Dhaka', 'Dhaka', 'Khilkhet', 'Khilkhet', 1229, 0, 0, 150, 50, 0, 0, 200, '2021-12-13 05:19:40', '2021-12-13 05:19:40'),
(3, 'Dhaka', 'Dhaka', 'Dhanmondi', 'Dhanmondi', 1209, 0, 0, 500, 0, 100, 50, 0, '2021-12-26 22:01:10', '2021-12-26 22:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routing_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `merchant_name`, `merchant_number`, `merchant_address`, `merchant_email`, `merchant_mobile`, `tax_no`, `bin_no`, `agreement_copy`, `account_title`, `account_number`, `bank_name`, `branch_name`, `routing_no`, `contact_name`, `contact_mobile`, `contact_email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fair Mart', '007', 'Banani 12', 'fairmart@gmail.com', '01700718852', '008', '009', NULL, 'Delivery Fair Mart', '001', 'Brac Bank', 'Banani 11', '000', 'Sofen', '01700718852', 'contact@fairmart.com.bd', 1, '2021-12-20 00:16:01', '2022-02-23 03:21:06'),
(2, 'Paper Flys', '112', 'Banani 11', 'paperfly@gmail.com', '01991989997', '006', '004', NULL, 'Delivery Paper Fly', '005', 'Brac Bank', 'Uttara', '000', 'Sofen', '01700718852', 'contact@fairmart.com.bd', 1, '2021-12-28 03:58:35', '2022-02-23 03:14:52'),
(4, 'Test 2', '44', 'Fatehabad, Hathazar, Chittagong', 'a@gmail.com', '01878152754', '444', '444', NULL, 'Test 2', '44444', 'Test 1', 'Test 1', '4444', 'Shamsuddin Mohammad Taiser', '01878152754', 'a@gmail.com', 1, '2022-01-02 01:54:15', '2022-01-02 03:33:10'),
(5, 's-courier', '6699', 'Airport', 's-courier@gmail.com', '01719272223', '9966', '9696', 'fairex-wjbwfrWy.viber_image_2022-01-02_11-04-01-362.jpg', 'Merchant S-courier', '9669', 'National', 'Gulshan 1', '6996', 'Agent', '01919272223', 'National@gmail.com', 0, '2022-01-03 05:58:46', '2022-01-03 23:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_users`
--

CREATE TABLE `merchant_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_users`
--

INSERT INTO `merchant_users` (`id`, `merchant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-12-20 01:25:23', '2021-12-20 01:26:15');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_24_093647_create_admins_table', 1),
(6, '2021_11_24_121629_create_permission_tables', 1),
(7, '2021_12_13_090257_create_locations_table', 1),
(8, '2021_12_13_090351_create_warehouses_table', 1),
(10, '2021_12_13_090610_create_pickup_delivery_men_table', 1),
(11, '2021_12_13_090647_create_availables_table', 1),
(12, '2021_12_13_090704_create_products_table', 1),
(13, '2021_12_20_040944_create_merchants_table', 2),
(14, '2021_12_20_041357_create_merchant_users_table', 2),
(15, '2021_12_20_071144_add_merchant_id_to_parcel_table', 3),
(16, '2021_12_27_050225_drop_user_id_to_parcel_table', 4),
(17, '2021_12_27_050610_drop_user_id_to_parcel_table', 5),
(18, '2021_12_27_051248_drop_user_id_to_parcel_table', 6),
(19, '2021_12_27_051737_add_pickup_location_id_to_parcel_table', 7),
(20, '2021_12_27_052047_drop_product_id_to_parcel_table', 8),
(21, '2021_12_27_052143_drop_location_id_to_parcel_table', 9),
(22, '2021_12_27_052241_add_delivery_location_id_to_parcel_table', 10),
(23, '2021_12_27_052418_add_pickup_warehouse_id_to_parcel_table', 11),
(24, '2021_12_27_052549_add_delivery_warehouse_id_to_parcel_table', 12),
(25, '2021_12_27_053042_drop_pickup_location_id_to_parcel_table', 13),
(26, '2021_12_27_053229_drop_pickup_warehouse_id_to_parcel_table', 14),
(27, '2021_12_27_053332_drop_delivery_location_id_to_parcel_table', 15),
(28, '2021_12_27_053438_add_pickup_location_id_to_parcel_table', 16),
(29, '2021_12_27_053800_add_delivery_location_id_to_parcel_table', 17),
(30, '2021_12_27_054120_add_pickup_warehouse_id_to_parcel_table', 18),
(31, '2021_12_27_054553_add_parcel_id_to_product_table', 19),
(32, '2021_12_27_054744_add_parcel_id_to_product_table', 20),
(40, '2022_01_06_041950_create_queries_table', 21),
(41, '2022_01_06_042656_create_issues_table', 21),
(42, '2022_01_06_043404_create_regulations_table', 21),
(43, '2022_02_06_053633_create_pickup_assigns_table', 22),
(47, '2021_12_13_090457_create_parcels_table', 23),
(48, '2022_03_28_060344_create_tasks_table', 24),
(51, '2022_03_28_062252_create_sub_tasks_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `available_id` int(11) DEFAULT NULL,
  `pickup_location_id` int(11) DEFAULT NULL,
  `delivery_location_id` int(11) DEFAULT NULL,
  `pickup_warehouse_id` int(11) DEFAULT NULL,
  `delivery_warehouse_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `merchant_id`, `available_id`, `pickup_location_id`, `delivery_location_id`, `pickup_warehouse_id`, `delivery_warehouse_id`, `order_no`, `customer_name`, `customer_number`, `customer_email`, `customer_address`, `customer_zip_code`, `customer_city`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 1, 2, '001', 'Akash', '0011118888', 'a@g.c', 'mirpure', '1212', 'dhaka', 'Cancelled', '2022-02-23 01:51:31', '2022-02-27 21:42:00'),
(2, 1, 1, 2, 3, 2, 3, '00243', 'asif1234', '01700718852', 'asif@gmail.com', 'mohomodpure', '1220', 'dhaka', 'Cancelled', '2022-02-25 22:53:48', '2022-02-27 21:41:43');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'warehouse_update', 'admin', '2021-12-26 04:40:21', '2021-12-26 04:40:21'),
(10, 'warehouse_view', 'admin', '2021-12-26 05:59:18', '2021-12-26 05:59:18'),
(13, 'localtion_view', 'admin', '2021-12-27 00:32:22', '2021-12-27 00:32:22'),
(14, 'localtion_delete', 'admin', '2021-12-27 00:42:42', '2021-12-27 00:42:42'),
(21, 'vendor_add', 'admin', '2021-12-27 01:31:00', '2021-12-27 01:31:00'),
(22, 'Information', 'admin', '2021-12-27 01:31:30', '2022-01-02 03:40:09'),
(23, 'permission_add', 'admin', '2021-12-27 01:33:33', '2021-12-27 01:33:33'),
(24, 'permission_view', 'admin', '2021-12-27 01:36:02', '2021-12-28 04:59:43'),
(25, 'permisson_delete', 'admin', '2021-12-27 01:36:43', '2021-12-27 01:36:43'),
(26, 'permission_delete', 'admin', '2021-12-27 01:38:33', '2021-12-27 01:38:33'),
(27, 'role_add', 'admin', '2021-12-27 23:52:39', '2022-01-15 04:13:09');

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
-- Table structure for table `pickup_assigns`
--

CREATE TABLE `pickup_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_man_id` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL,
  `parcel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_assigns`
--

INSERT INTO `pickup_assigns` (`id`, `pickup_man_id`, `delivery_man_id`, `parcel_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, NULL),
(2, 2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_delivery_men`
--

CREATE TABLE `pickup_delivery_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_delivery_men`
--

INSERT INTO `pickup_delivery_men` (`id`, `user_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-12-14 23:31:26', '2021-12-14 23:31:26'),
(2, 2, 2, '2022-02-03 01:05:00', '2022-02-03 01:05:00'),
(3, 3, 1, '2022-02-03 01:05:16', '2022-02-03 01:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parcel_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parcel_id`, `name`, `price`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsung A71', 34999.00, 10, 0, '2021-12-19 00:17:25', '2021-12-19 00:17:25'),
(2, 2, 'Samsung A52', 42999.00, 5, 0, '2022-02-25 22:51:42', '2022-02-25 22:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `title`, `contact_person`, `contact_number`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Complain', 'Habib', '01700718851', 'product query', 4, NULL, '2022-01-06 06:05:44', '2022-01-06 06:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `regulations`
--

CREATE TABLE `regulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `case_id` int(10) UNSIGNED DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateline` timestamp NULL DEFAULT NULL,
  `send_sms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regulation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulations`
--

INSERT INTO `regulations` (`id`, `type`, `case_id`, `remarks`, `attachment`, `status`, `dateline`, `send_sms`, `regulation_type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'okk1', 'fairex-l3kLb0BX.viber_image_2022-01-02_11-04-01-362.jpg', 'done1', '2022-01-05 18:00:00', 'send1', 'right1', 4, NULL, '2022-01-06 06:06:12', '2022-01-06 06:06:12'),
(2, 1, 2, 'sdfdasd', 'D:\\xampp\\tmp\\phpF60D.tmp', 'dSDSADCSAD', '2022-01-05 18:00:00', 'sdfdsFDsF', 'adsfDsFDSF', 4, 2, '2022-01-06 06:06:23', '2022-02-01 22:25:10'),
(3, 1, 2, 'okk', 'fairex-G6F4LJjh.Capture.PNG', 'done', '2022-01-05 18:00:00', 'send', 'right', 2, NULL, '2022-02-01 23:20:49', '2022-02-01 23:20:49'),
(4, 1, 2, 'okk', 'fairex-3QkXGO2R.Capture.PNG', 'done', '2022-01-05 18:00:00', 'send', 'right', 2, NULL, '2022-02-01 23:22:12', '2022-02-01 23:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(17, 'super admin', 'admin', '2022-01-03 03:20:37', '2022-01-04 04:23:55'),
(18, 'admin4', 'admin', '2022-01-03 03:21:12', '2022-01-04 04:16:52'),
(19, 'super admin2', 'admin', '2022-01-03 03:39:12', '2022-01-03 03:39:12'),
(20, 'admin', 'admin', '2022-01-04 02:58:03', '2022-01-04 02:58:03'),
(21, 'sdfsdf', 'web', '2022-01-04 03:42:08', '2022-01-04 03:42:08'),
(22, 'fsfdsad', 'web', '2022-01-04 03:42:16', '2022-01-04 03:42:16'),
(23, 'dsfsaf', 'web', '2022-01-04 03:42:23', '2022-01-04 03:42:23'),
(24, 'ghhh', 'admin', '2022-01-04 03:44:02', '2022-01-04 22:00:19'),
(25, 'dfsad', 'sdfasf', '2022-01-05 00:20:24', '2022-01-05 00:20:24'),
(26, 'Manager', 'admin', '2022-01-05 00:47:59', '2022-01-05 00:47:59'),
(27, 'Editor', 'admin', '2022-01-05 00:56:43', '2022-01-05 00:56:43'),
(28, 'Editor2', 'admin', '2022-01-05 00:56:59', '2022-01-05 00:56:59'),
(29, 'Editor3', 'admin', '2022-01-05 00:57:23', '2022-01-05 00:57:23'),
(30, 'Editor4', 'admin', '2022-01-05 00:58:22', '2022-01-05 00:58:22'),
(31, 'Editor5', 'admin', '2022-01-05 00:59:22', '2022-01-05 00:59:22'),
(32, 'admin22', 'admin', '2022-01-05 00:59:48', '2022-01-05 00:59:48'),
(33, 'admin28', 'admin', '2022-01-05 01:00:38', '2022-01-05 01:00:38'),
(34, 'admin25', 'admin', '2022-01-05 01:04:36', '2022-01-05 01:04:36'),
(35, 'Writer', 'admin', '2022-01-05 01:04:47', '2022-01-05 01:04:47'),
(36, 'Writer2', 'admin', '2022-01-05 01:04:56', '2022-01-05 01:04:56'),
(37, 'Writer3', 'admin', '2022-01-05 01:05:05', '2022-01-05 01:05:05'),
(38, 'admin26', 'admin', '2022-01-05 01:05:22', '2022-01-05 01:05:22'),
(39, 'admin29', 'admin', '2022-01-05 01:09:54', '2022-01-05 01:09:54'),
(40, 'admin288', 'admin', '2022-01-05 01:17:53', '2022-01-05 01:17:53'),
(41, 'admin00', 'admin', '2022-01-05 01:18:19', '2022-01-05 01:18:19'),
(42, 'admin420dd', 'admin', '2022-01-05 01:23:25', '2022-01-05 01:23:25'),
(43, 'fsdf', 'dfsadfsadffgyjfghj', '2022-01-05 04:03:47', '2022-01-09 00:38:54'),
(44, 'rrr', 'ttthyfytf', '2022-01-05 04:04:01', '2022-03-10 04:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(24, 37),
(25, 42),
(26, 32),
(26, 38);

-- --------------------------------------------------------

--
-- Table structure for table `sub_tasks`
--

CREATE TABLE `sub_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_tasks`
--

INSERT INTO `sub_tasks` (`id`, `title`, `task_id`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tt1', 2, 'tt2', 1, NULL, '2022-04-04 22:01:55'),
(2, 't2', 1, 't2', 1, NULL, '2022-04-02 21:25:21'),
(3, 'st1', 28, 'st1', 1, '2022-03-28 00:57:28', '2022-03-28 00:57:28'),
(4, 'st1', 2, 'st1', 1, '2022-03-28 01:02:33', '2022-03-28 01:02:33'),
(5, 'st1', 2, 'st1', 1, '2022-03-28 23:49:06', '2022-03-28 23:49:06'),
(6, 'st1', 3, 'st1', 1, '2022-03-29 05:42:34', '2022-03-29 05:42:34'),
(7, 'st1', 3, 'st1', 1, '2022-03-29 05:42:35', '2022-03-29 05:42:35'),
(8, 'st1', 3, 'st1', 1, '2022-03-29 05:42:35', '2022-03-29 05:42:35'),
(9, 'st1', 3, 'st1', 1, '2022-03-29 05:42:36', '2022-03-29 05:42:36'),
(10, 'st1', 3, 'st1', 1, '2022-03-31 00:20:24', '2022-03-31 00:20:24'),
(12, 'st1', 3, 'st1', NULL, '2022-03-31 04:26:14', '2022-03-31 04:26:14'),
(13, 'st1', 3, 'st1', NULL, '2022-03-31 05:29:39', '2022-03-31 05:29:39'),
(14, 'st1', 3, 'st1', NULL, '2022-03-31 05:30:28', '2022-03-31 05:30:28'),
(15, 'nhhhhhvgrb', NULL, '5:48 PM', NULL, '2022-03-31 05:48:09', '2022-03-31 05:48:09'),
(16, 'bgg', NULL, '5:49 PM', NULL, '2022-03-31 05:49:49', '2022-03-31 05:49:49'),
(17, 'st1', 3, 'st1', NULL, '2022-03-31 05:50:11', '2022-03-31 05:50:11'),
(18, 'vvvvv', 3, '11:01 AM', NULL, '2022-04-01 23:01:11', '2022-04-01 23:01:11'),
(19, 'yyyyyh', NULL, '11:38 AM', NULL, '2022-04-01 23:38:35', '2022-04-01 23:38:35'),
(20, 'Pick', 39, '5:30 PM', NULL, '2022-04-02 05:25:29', '2022-04-02 05:25:29'),
(21, 'njmmmmmk,', NULL, '5:28 PM', NULL, '2022-04-02 05:28:07', '2022-04-02 05:28:07'),
(22, 'Pick', NULL, '10:15 AM', NULL, '2022-04-02 22:14:54', '2022-04-02 22:14:54'),
(23, 'Drop', NULL, '11:15 AM', NULL, '2022-04-02 22:15:04', '2022-04-02 22:15:04'),
(24, 'Run', NULL, '12:15 PM', NULL, '2022-04-02 22:15:15', '2022-04-02 22:15:15'),
(25, 'Stop', NULL, '1:15 PM', NULL, '2022-04-02 22:15:40', '2022-04-02 22:15:40'),
(26, 'Pick', NULL, '10:15 AM', NULL, '2022-04-02 22:17:40', '2022-04-02 22:17:40'),
(27, 'Drop', NULL, '1:15 PM', NULL, '2022-04-02 22:17:50', '2022-04-02 22:17:50'),
(28, 'uuuuu', NULL, '10:20 AM', NULL, '2022-04-02 22:20:16', '2022-04-02 22:20:16'),
(29, 'qwer', NULL, '10:21 AM', NULL, '2022-04-02 22:21:43', '2022-04-02 22:21:43'),
(30, 'tt', NULL, '10:22 AM', NULL, '2022-04-02 22:22:56', '2022-04-02 22:22:56'),
(31, 'yy', 40, '10:24 AM', 1, '2022-04-02 22:24:17', '2022-04-02 22:36:27'),
(32, 'ndmsmme', 40, '10:35 AM', 1, '2022-04-02 22:35:42', '2022-04-02 22:37:05'),
(33, 'st1', 2, 'st1', 1, '2022-04-06 01:34:23', '2022-04-06 01:34:23'),
(34, 'Pich', 42, '1:00 PM', NULL, '2022-04-06 01:59:34', '2022-04-06 01:59:34'),
(35, 'Drop', 42, '2:00 PM', NULL, '2022-04-06 01:59:53', '2022-04-06 01:59:53'),
(36, 'god', 47, '2:16 PM', NULL, '2022-04-06 02:16:54', '2022-04-06 02:16:54'),
(37, 'Pick', 51, '2:28 PM', NULL, '2022-04-06 02:28:08', '2022-04-06 02:28:08'),
(38, 'Drop', 51, '3:28 PM', NULL, '2022-04-06 02:28:20', '2022-04-06 02:28:20'),
(39, 'Pick Change 2', 50, '1:00 PM', 0, '2022-04-06 22:51:41', '2022-04-07 02:02:20'),
(40, 'drop', NULL, '15:04 PMPM', 0, '2022-04-06 22:51:49', '2022-04-07 00:52:47'),
(44, 'Test', 50, '3:00 PM', 0, '2022-04-07 02:17:02', '2022-04-07 02:17:16'),
(45, 'Sub Task 1', 44, '1:00 PM', NULL, '2022-04-07 02:19:22', '2022-04-07 02:19:22'),
(46, 'Sub Task 2', 44, '2:21 PM', NULL, '2022-04-07 02:21:15', '2022-04-07 02:21:15'),
(47, 'Sub Task 3', 44, '2:21 PM', NULL, '2022-04-07 02:21:31', '2022-04-07 02:21:31'),
(48, 'Sub Task 1', 45, '2:21 PM', NULL, '2022-04-07 02:21:37', '2022-04-07 02:21:37'),
(49, 'Sub Task 2', 45, '2:21 PM', NULL, '2022-04-07 02:21:39', '2022-04-07 02:21:39'),
(50, 'Sub Task 3', 45, '2:21 PM', NULL, '2022-04-07 02:21:41', '2022-04-07 02:21:41'),
(51, 'Sub Task 1', 46, '2:21 PM', NULL, '2022-04-07 02:21:46', '2022-04-07 02:21:46'),
(52, 'Sub Task 2', 46, '2:21 PM', NULL, '2022-04-07 02:21:49', '2022-04-07 02:21:49'),
(53, 'Sub Task 3', 46, '2:21 PM', NULL, '2022-04-07 02:21:51', '2022-04-07 02:21:51'),
(54, 'ST 1', 52, '2:31 PM', NULL, '2022-04-07 02:32:00', '2022-04-07 02:32:00'),
(55, 'ST 2', 52, '3:32 PM', NULL, '2022-04-07 02:32:15', '2022-04-07 02:32:15'),
(56, 'ST 3', 52, '4:32 PM', NULL, '2022-04-07 02:32:28', '2022-04-07 02:32:28'),
(57, 'ST 21', 53, '2:32 PM', NULL, '2022-04-07 02:33:04', '2022-04-07 02:33:04'),
(58, 'ST 22', 53, '3:33 PM', NULL, '2022-04-07 02:33:11', '2022-04-07 02:33:11'),
(59, 'ST 23', 53, '5:33 PM', 1, '2022-04-07 02:33:20', '2022-04-07 02:34:45'),
(60, 'St 31', 54, '2:33 PM', 1, '2022-04-07 02:33:46', '2022-04-07 02:34:31'),
(61, 'st 32', 54, '4:33 PM', 1, '2022-04-07 02:33:52', '2022-04-07 02:34:29'),
(62, 'st 33', 54, '11:33 PM', 1, '2022-04-07 02:33:58', '2022-04-07 02:34:25'),
(63, 'sadasd', 45, '4:23 PM', 0, '2022-04-07 04:23:55', '2022-04-07 04:23:55'),
(64, 'swqewq', 44, '4:24 PM', 0, '2022-04-07 04:24:18', '2022-04-07 04:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `time`, `status`, `created_at`, `updated_at`) VALUES
(44, 'Test Task 1', '2022-04-07', 'Not Started', '2022-04-06 00:33:12', '2022-04-07 02:17:51'),
(45, 'Test Task 2', '2022-04-07', 'Not Started', '2022-04-06 00:33:26', '2022-04-07 02:18:06'),
(46, 'Test Task 3', '2022-04-07', 'Not Started', '2022-04-06 02:05:37', '2022-04-07 02:18:40'),
(52, 'Final Test 1', '2022-04-08', 'Not Started', '2022-04-07 02:31:41', '2022-04-07 02:31:41'),
(53, 'Final Task 2', '2022-04-08', 'In Progress', '2022-04-07 02:32:50', '2022-04-07 02:34:45'),
(54, 'Final Task 3', '2022-04-08', 'Done', '2022-04-07 02:33:37', '2022-04-07 02:34:31');

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yess', 'yess@gmail.com', NULL, '$2y$10$cdO7MgwNkgWsCJyZFWXc4OGpoOnPXTYEl6hP4MiJYmSVOp9Yp9R2y', '01721031243', NULL, '2022-03-21 04:15:38', '2022-03-21 04:15:38'),
(2, 'yess', 'yess1@gmail.com', NULL, '$2y$10$HR.jiTLbm.OM4khmPJkVu.fUl0Qwsgw8oLGRz3DePL4sY/4Rmhmq6', '01700718852', NULL, '2022-03-21 04:17:01', '2022-03-21 04:17:01'),
(3, 'yess', 'yessxx1@gmail.com', NULL, '$2y$10$PIuQ9OT2rhwu7TApJLp.vOnnP.9KCqgqnigbrPZAsd1NULCbbbKj2', '01700710000', NULL, '2022-04-02 04:52:14', '2022-04-02 04:52:14'),
(4, 'user', 'user@gmail.com', NULL, '$2y$10$bgbxY2kQXNOdKI1l93C1g.BlTKSqYtte8jfNuOtMp2KOkkl0/APfG', '01700710001', NULL, '2022-04-02 22:49:56', '2022-04-02 22:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `post_code`, `area`, `district`, `country`, `created_at`, `updated_at`) VALUES
(1, 'FairEx Warehouse 45', 1260, 'Mirpur 1', 'Dhaka', 'Bangladesh', '2021-12-21 04:35:02', '2022-04-05 03:32:31'),
(2, 'FairEx Warehouse 2', 1213, 'Banani', 'Dhaka', 'Bangladesh', '2021-12-21 04:33:34', '2021-12-21 04:33:34'),
(3, 'FairEx Warehouse 3', 1212, 'Mohammadpur', NULL, NULL, '2022-02-24 02:45:25', '2022-02-24 02:45:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `availables`
--
ALTER TABLE `availables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchants_merchant_number_unique` (`merchant_number`);

--
-- Indexes for table `merchant_users`
--
ALTER TABLE `merchant_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parcels_order_no_unique` (`order_no`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_assigns`
--
ALTER TABLE `pickup_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_delivery_men`
--
ALTER TABLE `pickup_delivery_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulations`
--
ALTER TABLE `regulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warehouses_name_unique` (`name`),
  ADD UNIQUE KEY `warehouses_post_code_unique` (`post_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `availables`
--
ALTER TABLE `availables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `merchant_users`
--
ALTER TABLE `merchant_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_assigns`
--
ALTER TABLE `pickup_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_delivery_men`
--
ALTER TABLE `pickup_delivery_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regulations`
--
ALTER TABLE `regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
