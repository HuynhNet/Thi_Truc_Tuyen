-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 04:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thi_truc_tuyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_lams`
--

CREATE TABLE `bai_lams` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_hs` int(11) DEFAULT NULL,
  `da_chon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(2, NULL, 1, 'Category 2', 'category-2', '2020-10-30 06:59:09', '2020-10-30 06:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `cau_hois`
--

CREATE TABLE `cau_hois` (
  `id` int(10) UNSIGNED NOT NULL,
  `dap_an_dung` int(11) DEFAULT NULL,
  `mon_hoc` int(11) DEFAULT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci,
  `hinh_anh` mediumtext COLLATE utf8_unicode_ci,
  `a` mediumtext COLLATE utf8_unicode_ci,
  `b` mediumtext COLLATE utf8_unicode_ci,
  `c` mediumtext COLLATE utf8_unicode_ci,
  `d` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_cau_hois`
--

CREATE TABLE `chi_tiet_cau_hois` (
  `id` int(10) UNSIGNED NOT NULL,
  `a` mediumtext COLLATE utf8_unicode_ci,
  `b` mediumtext COLLATE utf8_unicode_ci,
  `c` mediumtext COLLATE utf8_unicode_ci,
  `d` mediumtext COLLATE utf8_unicode_ci,
  `dap_an` mediumtext COLLATE utf8_unicode_ci,
  `chi_tiet_de` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_des`
--

CREATE TABLE `chi_tiet_des` (
  `id` int(10) UNSIGNED NOT NULL,
  `cau_hoi` int(11) DEFAULT NULL,
  `de_kiem_tra` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dap_an_dungs`
--

CREATE TABLE `dap_an_dungs` (
  `id` int(10) UNSIGNED NOT NULL,
  `cau_hoi` int(11) DEFAULT NULL,
  `dap_an` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'hidden', 'ID', 1, 1, 1, 1, 1, 1, '{}', 1),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'hidden', 'ID', 1, 1, 1, 1, 1, 1, '{}', 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 1, 'ten', 'text', 'Ten', 1, 1, 1, 1, 1, 1, '{}', 3),
(57, 1, 'hinh', 'image', 'Hinh', 0, 1, 1, 1, 1, 1, '{}', 5),
(58, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 6),
(59, 1, 'mat_khau', 'text', 'Mat Khau', 1, 1, 1, 1, 1, 1, '{}', 7),
(60, 1, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{}', 9),
(61, 1, 'gioi_tinh', 'text', 'Gioi Tinh', 0, 1, 1, 1, 1, 1, '{}', 10),
(62, 1, 'sdt', 'text', 'Sdt', 0, 1, 1, 1, 1, 1, '{}', 11),
(63, 1, 'ngay_sinh', 'date', 'Ngay Sinh', 0, 1, 1, 1, 1, 1, '{}', 12),
(64, 1, 'dia_chi', 'text_area', 'Dia Chi', 0, 1, 1, 1, 1, 1, '{}', 13),
(65, 1, 'ma_gv', 'text', 'Ma Gv', 0, 1, 1, 1, 1, 1, '{}', 16),
(66, 1, 'ma_hs', 'text', 'Ma Hs', 0, 1, 1, 1, 1, 1, '{}', 17),
(67, 8, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(68, 8, 'ma_gv', 'text', 'Ma Gv', 0, 1, 1, 1, 1, 1, '{}', 2),
(69, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(70, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(71, 8, 'giao_vien_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"ma_gv\",\"key\":\"id\",\"label\":\"ma_gv\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":null}', 5),
(72, 9, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(73, 9, 'ma_hs', 'hidden', 'Ma Hs', 0, 1, 1, 1, 1, 1, '{}', 2),
(74, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(75, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(76, 9, 'hoc_sinh_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"ma_hs\",\"key\":\"id\",\"label\":\"ma_hs\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(77, 10, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(78, 10, 'ten_loai', 'text', 'Ten Loai', 0, 1, 1, 1, 1, 1, '{}', 2),
(79, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(80, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(81, 9, 'id_bai_lam', 'text', 'Id Bai Lam', 0, 1, 1, 1, 1, 1, '{}', 3),
(82, 9, 'id_lop', 'text', 'Id Lop', 0, 1, 1, 1, 1, 1, '{}', 4),
(83, 9, 'id_ket_qua', 'text', 'Id Ket Qua', 0, 1, 1, 1, 1, 1, '{}', 5),
(84, 11, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(85, 11, 'ten_lop', 'text', 'Ten Lop', 0, 1, 1, 1, 1, 1, '{}', 2),
(86, 11, 'so_luong', 'text', 'So Luong', 0, 1, 1, 1, 1, 1, '{}', 3),
(87, 11, 'trang_thai', 'text', 'Trang Thai', 0, 1, 1, 1, 1, 1, '{}', 4),
(88, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(89, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(90, 12, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(93, 12, 'ma_hs', 'text', 'Ma Hs', 0, 1, 1, 1, 1, 1, '{}', 4),
(94, 12, 'cau_dung', 'text', 'Cau Dung', 0, 1, 1, 1, 1, 1, '{}', 5),
(95, 12, 'diem', 'text', 'Diem', 0, 1, 1, 1, 1, 1, '{}', 6),
(96, 12, 'xep_loai', 'text', 'Xep Loai', 0, 1, 1, 1, 1, 1, '{}', 7),
(97, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(98, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(99, 14, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(100, 14, 'ma_gv', 'text', 'Ma Gv', 0, 1, 1, 1, 1, 1, '{}', 2),
(101, 14, 'muc_kiem_tra', 'text', 'Muc Kiem Tra', 0, 1, 1, 1, 1, 1, '{}', 3),
(102, 14, 'nam_hoc', 'text', 'Nam Hoc', 0, 1, 1, 1, 1, 1, '{}', 4),
(103, 14, 'mon_hoc', 'text', 'Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 5),
(104, 14, 'loai_kiem_tra', 'text', 'Loai Kiem Tra', 0, 1, 1, 1, 1, 1, '{}', 6),
(105, 14, 'thoi_gian', 'text', 'Thoi Gian', 0, 1, 1, 1, 1, 1, '{}', 7),
(106, 14, 'so_cau', 'text', 'So Cau', 0, 1, 1, 1, 1, 1, '{}', 8),
(107, 14, 'trang_thai', 'text', 'Trang Thai', 0, 1, 1, 1, 1, 1, '{}', 9),
(108, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(109, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(110, 15, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(111, 15, 'ma_hs', 'text', 'Ma Hs', 0, 1, 1, 1, 1, 1, '{}', 2),
(112, 15, 'da_chon', 'text', 'Da Chon', 0, 1, 1, 1, 1, 1, '{}', 3),
(113, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(114, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(115, 16, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(116, 16, 'ma_mon_hoc', 'text', 'Ma Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 2),
(117, 16, 'ten_mon_hoc', 'text', 'Ten Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 3),
(118, 16, 'hinh_anh', 'text', 'Hinh Anh', 0, 1, 1, 1, 1, 1, '{}', 4),
(119, 16, 'trang_thai', 'text', 'Trang Thai', 0, 1, 1, 1, 1, 1, '{}', 5),
(120, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(121, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(122, 18, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(123, 18, 'nam', 'text', 'Nam', 0, 1, 1, 1, 1, 1, '{}', 2),
(124, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(125, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(126, 19, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(127, 19, 'cau_hoi', 'text', 'Cau Hoi', 0, 1, 1, 1, 1, 1, '{}', 2),
(128, 19, 'de_kiem_tra', 'text', 'De Kiem Tra', 0, 1, 1, 1, 1, 1, '{}', 3),
(129, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(130, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(131, 20, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(132, 20, 'dap_an_dung', 'text', 'Dap An Dung', 0, 1, 1, 1, 1, 1, '{}', 2),
(133, 20, 'mon_hoc', 'text', 'Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 3),
(134, 20, 'noi_dung', 'text', 'Noi Dung', 0, 1, 1, 1, 1, 1, '{}', 4),
(135, 20, 'hinh_anh', 'text', 'Hinh Anh', 0, 1, 1, 1, 1, 1, '{}', 5),
(136, 20, 'a', 'text', 'A', 0, 1, 1, 1, 1, 1, '{}', 6),
(137, 20, 'b', 'text', 'B', 0, 1, 1, 1, 1, 1, '{}', 7),
(138, 20, 'c', 'text', 'C', 0, 1, 1, 1, 1, 1, '{}', 8),
(139, 20, 'd', 'text', 'D', 0, 1, 1, 1, 1, 1, '{}', 9),
(140, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(141, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(142, 21, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(143, 21, 'cau_hoi', 'text', 'Cau Hoi', 0, 1, 1, 1, 1, 1, '{}', 2),
(144, 21, 'dap_an', 'text', 'Dap An', 0, 1, 1, 1, 1, 1, '{}', 3),
(145, 21, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(146, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(147, 22, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(148, 22, 'ten_muc', 'text', 'Ten Muc', 0, 1, 1, 1, 1, 1, '{}', 2),
(149, 22, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(150, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(151, 15, 'bai_lam_belongsto_hoc_sinh_relationship', 'relationship', 'hoc_sinhs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\HocSinh\",\"table\":\"hoc_sinhs\",\"type\":\"belongsTo\",\"column\":\"ma_hs\",\"key\":\"id\",\"label\":\"ma_hs\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 6),
(152, 20, 'cau_hoi_belongsto_dap_an_dung_relationship', 'relationship', 'dap_an_dungs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\DapAnDung\",\"table\":\"dap_an_dungs\",\"type\":\"belongsTo\",\"column\":\"dap_an_dung\",\"key\":\"id\",\"label\":\"dap_an\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 12),
(153, 20, 'cau_hoi_belongsto_mon_hoc_relationship', 'relationship', 'mon_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\MonHoc\",\"table\":\"mon_hocs\",\"type\":\"belongsTo\",\"column\":\"mon_hoc\",\"key\":\"id\",\"label\":\"ten_mon_hoc\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 13),
(154, 19, 'chi_tiet_de_belongsto_cau_hoi_relationship', 'relationship', 'cau_hois', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\CauHoi\",\"table\":\"cau_hois\",\"type\":\"belongsTo\",\"column\":\"cau_hoi\",\"key\":\"id\",\"label\":\"noi_dung\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(155, 19, 'chi_tiet_de_belongsto_de_kiem_tra_relationship', 'relationship', 'de_kiem_tras', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\DeKiemTra\",\"table\":\"de_kiem_tras\",\"type\":\"belongsTo\",\"column\":\"de_kiem_tra\",\"key\":\"id\",\"label\":\"ten_de\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(156, 21, 'dap_an_dung_belongsto_cau_hoi_relationship', 'relationship', 'cau_hois', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\CauHoi\",\"table\":\"cau_hois\",\"type\":\"belongsTo\",\"column\":\"cau_hoi\",\"key\":\"id\",\"label\":\"noi_dung\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 6),
(157, 14, 'de_kiem_tra_belongsto_giao_vien_relationship', 'relationship', 'giao_viens', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\GiaoVien\",\"table\":\"giao_viens\",\"type\":\"belongsTo\",\"column\":\"ma_gv\",\"key\":\"id\",\"label\":\"ma_gv\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(158, 14, 'de_kiem_tra_belongsto_muc_kiem_tra_relationship', 'relationship', 'muc_kiem_tras', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\MucKiemTra\",\"table\":\"muc_kiem_tras\",\"type\":\"belongsTo\",\"column\":\"muc_kiem_tra\",\"key\":\"id\",\"label\":\"ten_muc\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(159, 14, 'de_kiem_tra_belongsto_nam_hoc_relationship', 'relationship', 'nam_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\NamHoc\",\"table\":\"nam_hocs\",\"type\":\"belongsTo\",\"column\":\"nam_hoc\",\"key\":\"id\",\"label\":\"nam\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(160, 14, 'de_kiem_tra_belongsto_mon_hoc_relationship', 'relationship', 'mon_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\MonHoc\",\"table\":\"mon_hocs\",\"type\":\"belongsTo\",\"column\":\"mon_hoc\",\"key\":\"id\",\"label\":\"ten_mon_hoc\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(161, 14, 'de_kiem_tra_belongsto_loai_kiem_tra_relationship', 'relationship', 'loai_kiem_tras', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\LoaiKiemTra\",\"table\":\"loai_kiem_tras\",\"type\":\"belongsTo\",\"column\":\"loai_kiem_tra\",\"key\":\"id\",\"label\":\"ten_loai\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 16),
(162, 14, 'de_kiem_tra_belongsto_loai_kiem_tra_relationship_1', 'relationship', 'loai_kiem_tras', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\LoaiKiemTra\",\"table\":\"loai_kiem_tras\",\"type\":\"belongsTo\",\"column\":\"thoi_gian\",\"key\":\"id\",\"label\":\"thoi_gian\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(163, 8, 'giao_vien_belongsto_user_relationship_1', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"ma_gv\",\"key\":\"id\",\"label\":\"ma_gv\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 6),
(164, 12, 'ket_qua_belongsto_de_kiem_tra_relationship', 'relationship', 'de_kiem_tras', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\DeKiemTra\",\"table\":\"de_kiem_tras\",\"type\":\"belongsTo\",\"column\":\"de_kiem_tra\",\"key\":\"id\",\"label\":\"ten_de\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(165, 12, 'de_kiem_tra', 'text', 'De Kiem Tra', 0, 1, 1, 1, 1, 1, '{}', 2),
(166, 12, 'mon_hoc', 'text', 'Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 3),
(167, 12, 'ket_qua_belongsto_mon_hoc_relationship', 'relationship', 'mon_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\MonHoc\",\"table\":\"mon_hocs\",\"type\":\"belongsTo\",\"column\":\"mon_hoc\",\"key\":\"id\",\"label\":\"ten_mon_hoc\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 11),
(168, 12, 'ket_qua_belongsto_hoc_sinh_relationship', 'relationship', 'hoc_sinhs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\HocSinh\",\"table\":\"hoc_sinhs\",\"type\":\"belongsTo\",\"column\":\"ma_hs\",\"key\":\"id\",\"label\":\"ma_hs\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 12),
(169, 11, 'lop_belongsto_nam_hoc_relationship', 'relationship', 'nam_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\NamHoc\",\"table\":\"nam_hocs\",\"type\":\"belongsTo\",\"column\":\"nam_hoc\",\"key\":\"id\",\"label\":\"nam\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 7),
(170, 23, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(171, 23, 'mon_hoc', 'text', 'Mon Hoc', 0, 1, 1, 1, 1, 1, '{}', 2),
(172, 23, 'lop', 'text', 'Lop', 0, 1, 1, 1, 1, 1, '{}', 3),
(173, 23, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(174, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(175, 23, 'lop_monhoc_belongsto_lop_relationship', 'relationship', 'lops', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Lop\",\"table\":\"lops\",\"type\":\"belongsTo\",\"column\":\"lop\",\"key\":\"id\",\"label\":\"ten_lop\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 6),
(176, 23, 'lop_monhoc_belongsto_mon_hoc_relationship', 'relationship', 'mon_hocs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\MonHoc\",\"table\":\"mon_hocs\",\"type\":\"belongsTo\",\"column\":\"mon_hoc\",\"key\":\"id\",\"label\":\"ten_mon_hoc\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 7),
(177, 24, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(178, 24, 'a', 'text', 'A', 0, 1, 1, 1, 1, 1, '{}', 2),
(179, 24, 'b', 'text', 'B', 0, 1, 1, 1, 1, 1, '{}', 3),
(180, 24, 'c', 'text', 'C', 0, 1, 1, 1, 1, 1, '{}', 4),
(181, 24, 'd', 'text', 'D', 0, 1, 1, 1, 1, 1, '{}', 5),
(182, 24, 'dap_an', 'text', 'Dap An', 0, 1, 1, 1, 1, 1, '{}', 6),
(183, 24, 'chi_tiet_de', 'text', 'Chi Tiet De', 0, 1, 1, 1, 1, 1, '{}', 7),
(184, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(185, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(186, 24, 'chi_tiet_cau_hoi_belongsto_chi_tiet_de_relationship', 'relationship', 'chi_tiet_des', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ChiTietDe\",\"table\":\"chi_tiet_des\",\"type\":\"belongsTo\",\"column\":\"chi_tiet_de\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"bai_lams\",\"pivot\":\"0\",\"taggable\":null}', 10),
(187, 14, 'ten_de', 'text', 'Ten De', 0, 1, 1, 1, 1, 1, '{}', 12),
(188, 14, 'mat_khau', 'text', 'Mat Khau', 0, 1, 1, 1, 1, 1, '{}', 13);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 06:59:07', '2020-10-30 08:04:19'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-10-30 06:59:07', '2020-10-30 06:59:07'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 06:59:07', '2020-11-06 10:14:02'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(8, 'giao_viens', 'giao-viens', 'Giao Vien', 'Giao Viens', NULL, 'App\\GiaoVien', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(9, 'hoc_sinhs', 'hoc-sinhs', 'Hoc Sinh', 'Hoc Sinhs', NULL, 'App\\HocSinh', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 08:12:25', '2020-10-31 10:05:47'),
(10, 'loai_kiem_tras', 'loai-kiem-tras', 'Loai Kiem Tra', 'Loai Kiem Tras', NULL, 'App\\LoaiKiemTra', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 08:13:41', '2020-10-30 08:14:38'),
(11, 'lops', 'lops', 'Lop', 'Lops', NULL, 'App\\Lop', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(12, 'ket_quas', 'ket-quas', 'Ket Qua', 'Ket Quas', NULL, 'App\\KetQua', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 08:20:12', '2020-10-30 08:54:20'),
(14, 'de_kiem_tras', 'de-kiem-tras', 'De Kiem Tra', 'De Kiem Tras', NULL, 'App\\DeKiemTra', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 08:27:09', '2020-11-23 08:07:36'),
(15, 'bai_lams', 'bai-lams', 'Bai Lam', 'Bai Lams', NULL, 'App\\BaiLam', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:28:21', '2020-10-30 08:28:21'),
(16, 'mon_hocs', 'mon-hocs', 'Mon Hoc', 'Mon Hocs', NULL, 'App\\MonHoc', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(18, 'nam_hocs', 'nam-hocs', 'Nam Hoc', 'Nam Hocs', NULL, 'App\\NamHoc', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(19, 'chi_tiet_des', 'chi-tiet-des', 'Chi Tiet De', 'Chi Tiet Des', NULL, 'App\\ChiTietDe', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-30 08:32:43', '2020-10-30 08:46:00'),
(20, 'cau_hois', 'cau-hois', 'Cau Hoi', 'Cau Hois', NULL, 'App\\CauHoi', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:34:22', '2020-10-30 08:34:22'),
(21, 'dap_an_dungs', 'dap-an-dungs', 'Dap An Dung', 'Dap An Dungs', NULL, 'App\\DapAnDung', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(22, 'muc_kiem_tras', 'muc-kiem-tras', 'Muc Kiem Tra', 'Muc Kiem Tras', NULL, 'App\\MucKiemTra', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-30 08:37:36', '2020-10-30 08:37:36'),
(23, 'lop_monhocs', 'lop-monhocs', 'Lop Monhoc', 'Lop Monhocs', NULL, 'App\\LopMonhoc', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-31 09:34:25', '2020-10-31 09:34:25'),
(24, 'chi_tiet_cau_hois', 'chi-tiet-cau-hois', 'Chi Tiet Cau Hoi', 'Chi Tiet Cau Hois', NULL, 'App\\ChiTietCauHoi', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-03 09:41:49', '2020-11-03 09:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `de_kiem_tras`
--

CREATE TABLE `de_kiem_tras` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_gv` int(11) DEFAULT NULL,
  `muc_kiem_tra` int(11) DEFAULT NULL,
  `nam_hoc` int(11) DEFAULT NULL,
  `mon_hoc` int(11) DEFAULT NULL,
  `loai_kiem_tra` int(11) DEFAULT NULL,
  `thoi_gian` int(11) DEFAULT NULL,
  `so_cau` int(11) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten_de` mediumtext COLLATE utf8_unicode_ci,
  `mat_khau` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giao_viens`
--

CREATE TABLE `giao_viens` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_gv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giao_viens`
--

INSERT INTO `giao_viens` (`id`, `ma_gv`, `created_at`, `updated_at`) VALUES
(1, 'GV361803', '2020-11-09 09:19:33', '2020-11-09 09:19:33'),
(2, 'GV868342', '2020-11-09 09:24:00', '2020-11-09 09:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_sinhs`
--

CREATE TABLE `hoc_sinhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_hs` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_bai_lam` int(11) DEFAULT NULL,
  `id_lop` int(11) DEFAULT NULL,
  `id_ket_qua` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoc_sinhs`
--

INSERT INTO `hoc_sinhs` (`id`, `ma_hs`, `id_bai_lam`, `id_lop`, `id_ket_qua`, `created_at`, `updated_at`) VALUES
(1, 'HS189734', NULL, NULL, NULL, '2020-11-09 09:06:17', '2020-11-09 09:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `ket_quas`
--

CREATE TABLE `ket_quas` (
  `id` int(10) UNSIGNED NOT NULL,
  `de_kiem_tra` int(11) DEFAULT NULL,
  `mon_hoc` int(11) DEFAULT NULL,
  `ma_hs` int(11) DEFAULT NULL,
  `cau_dung` int(11) DEFAULT NULL,
  `diem` float DEFAULT NULL,
  `xep_loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_kiem_tras`
--

CREATE TABLE `loai_kiem_tras` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thoi_gian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lops`
--

CREATE TABLE `lops` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_lop` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nam_hoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lop_monhocs`
--

CREATE TABLE `lop_monhocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `mon_hoc` int(11) DEFAULT NULL,
  `lop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-30 06:59:08', '2020-10-30 06:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2020-10-30 06:59:08', '2020-10-30 06:59:08', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2020-10-30 06:59:08', '2020-10-30 06:59:08', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2020-10-30 06:59:09', '2020-10-30 06:59:09', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2020-10-30 06:59:09', '2020-10-30 06:59:09', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2020-10-30 06:59:10', '2020-10-30 06:59:10', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2020-10-30 06:59:10', '2020-10-30 06:59:10', 'voyager.hooks', NULL),
(16, 1, 'Giao Viens', '', '_self', NULL, NULL, NULL, 15, '2020-10-30 08:11:07', '2020-10-30 08:11:07', 'voyager.giao-viens.index', NULL),
(17, 1, 'Hoc Sinhs', '', '_self', NULL, NULL, NULL, 16, '2020-10-30 08:12:25', '2020-10-30 08:12:25', 'voyager.hoc-sinhs.index', NULL),
(18, 1, 'Loai Kiem Tras', '', '_self', NULL, NULL, NULL, 17, '2020-10-30 08:13:41', '2020-10-30 08:13:41', 'voyager.loai-kiem-tras.index', NULL),
(19, 1, 'Lops', '', '_self', NULL, NULL, NULL, 18, '2020-10-30 08:17:26', '2020-10-30 08:17:26', 'voyager.lops.index', NULL),
(20, 1, 'Ket Quas', '', '_self', NULL, NULL, NULL, 19, '2020-10-30 08:20:12', '2020-10-30 08:20:12', 'voyager.ket-quas.index', NULL),
(22, 1, 'De Kiem Tras', '', '_self', NULL, NULL, NULL, 20, '2020-10-30 08:27:10', '2020-10-30 08:27:10', 'voyager.de-kiem-tras.index', NULL),
(23, 1, 'Bai Lams', '', '_self', NULL, NULL, NULL, 21, '2020-10-30 08:28:22', '2020-10-30 08:28:22', 'voyager.bai-lams.index', NULL),
(24, 1, 'Mon Hocs', '', '_self', NULL, NULL, NULL, 22, '2020-10-30 08:29:48', '2020-10-30 08:29:48', 'voyager.mon-hocs.index', NULL),
(26, 1, 'Nam Hocs', '', '_self', NULL, NULL, NULL, 24, '2020-10-30 08:31:22', '2020-10-30 08:31:22', 'voyager.nam-hocs.index', NULL),
(27, 1, 'Chi Tiet Des', '', '_self', NULL, NULL, NULL, 25, '2020-10-30 08:32:43', '2020-10-30 08:32:43', 'voyager.chi-tiet-des.index', NULL),
(28, 1, 'Cau Hois', '', '_self', NULL, NULL, NULL, 26, '2020-10-30 08:34:23', '2020-10-30 08:34:23', 'voyager.cau-hois.index', NULL),
(29, 1, 'Dap An Dungs', '', '_self', NULL, NULL, NULL, 27, '2020-10-30 08:35:19', '2020-10-30 08:35:19', 'voyager.dap-an-dungs.index', NULL),
(30, 1, 'Muc Kiem Tras', '', '_self', NULL, NULL, NULL, 28, '2020-10-30 08:37:37', '2020-10-30 08:37:37', 'voyager.muc-kiem-tras.index', NULL),
(31, 1, 'Lop Monhocs', '', '_self', NULL, NULL, NULL, 29, '2020-10-31 09:34:26', '2020-10-31 09:34:26', 'voyager.lop-monhocs.index', NULL),
(32, 1, 'Chi Tiet Cau Hois', '', '_self', NULL, NULL, NULL, 30, '2020-11-03 09:41:49', '2020-11-03 09:41:49', 'voyager.chi-tiet-cau-hois.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mon_hocs`
--

CREATE TABLE `mon_hocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten_mon_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_anh` mediumtext COLLATE utf8_unicode_ci,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mon_hocs`
--

INSERT INTO `mon_hocs` (`id`, `ma_mon_hoc`, `ten_mon_hoc`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'NH2020', 'Kinh tế Chính trị Mác - Lênin', NULL, NULL, '2020-11-06 10:12:14', '2020-11-06 10:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `muc_kiem_tras`
--

CREATE TABLE `muc_kiem_tras` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_muc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nam_hocs`
--

CREATE TABLE `nam_hocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2020-10-30 06:59:10', '2020-10-30 06:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(2, 'browse_bread', NULL, '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(3, 'browse_database', NULL, '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(4, 'browse_media', NULL, '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(5, 'browse_compass', NULL, '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(6, 'browse_menus', 'menus', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(7, 'read_menus', 'menus', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(8, 'edit_menus', 'menus', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(9, 'add_menus', 'menus', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(10, 'delete_menus', 'menus', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(11, 'browse_roles', 'roles', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(12, 'read_roles', 'roles', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(13, 'edit_roles', 'roles', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(14, 'add_roles', 'roles', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(15, 'delete_roles', 'roles', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(16, 'browse_users', 'users', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(17, 'read_users', 'users', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(18, 'edit_users', 'users', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(19, 'add_users', 'users', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(20, 'delete_users', 'users', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(21, 'browse_settings', 'settings', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(22, 'read_settings', 'settings', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(23, 'edit_settings', 'settings', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(24, 'add_settings', 'settings', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(25, 'delete_settings', 'settings', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(26, 'browse_categories', 'categories', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(27, 'read_categories', 'categories', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(28, 'edit_categories', 'categories', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(29, 'add_categories', 'categories', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(30, 'delete_categories', 'categories', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(31, 'browse_posts', 'posts', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(32, 'read_posts', 'posts', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(33, 'edit_posts', 'posts', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(34, 'add_posts', 'posts', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(35, 'delete_posts', 'posts', '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(36, 'browse_pages', 'pages', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(37, 'read_pages', 'pages', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(38, 'edit_pages', 'pages', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(39, 'add_pages', 'pages', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(40, 'delete_pages', 'pages', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(41, 'browse_hooks', NULL, '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(47, 'browse_giao_viens', 'giao_viens', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(48, 'read_giao_viens', 'giao_viens', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(49, 'edit_giao_viens', 'giao_viens', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(50, 'add_giao_viens', 'giao_viens', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(51, 'delete_giao_viens', 'giao_viens', '2020-10-30 08:11:07', '2020-10-30 08:11:07'),
(52, 'browse_hoc_sinhs', 'hoc_sinhs', '2020-10-30 08:12:25', '2020-10-30 08:12:25'),
(53, 'read_hoc_sinhs', 'hoc_sinhs', '2020-10-30 08:12:25', '2020-10-30 08:12:25'),
(54, 'edit_hoc_sinhs', 'hoc_sinhs', '2020-10-30 08:12:25', '2020-10-30 08:12:25'),
(55, 'add_hoc_sinhs', 'hoc_sinhs', '2020-10-30 08:12:25', '2020-10-30 08:12:25'),
(56, 'delete_hoc_sinhs', 'hoc_sinhs', '2020-10-30 08:12:25', '2020-10-30 08:12:25'),
(57, 'browse_loai_kiem_tras', 'loai_kiem_tras', '2020-10-30 08:13:41', '2020-10-30 08:13:41'),
(58, 'read_loai_kiem_tras', 'loai_kiem_tras', '2020-10-30 08:13:41', '2020-10-30 08:13:41'),
(59, 'edit_loai_kiem_tras', 'loai_kiem_tras', '2020-10-30 08:13:41', '2020-10-30 08:13:41'),
(60, 'add_loai_kiem_tras', 'loai_kiem_tras', '2020-10-30 08:13:41', '2020-10-30 08:13:41'),
(61, 'delete_loai_kiem_tras', 'loai_kiem_tras', '2020-10-30 08:13:41', '2020-10-30 08:13:41'),
(62, 'browse_lops', 'lops', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(63, 'read_lops', 'lops', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(64, 'edit_lops', 'lops', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(65, 'add_lops', 'lops', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(66, 'delete_lops', 'lops', '2020-10-30 08:17:26', '2020-10-30 08:17:26'),
(67, 'browse_ket_quas', 'ket_quas', '2020-10-30 08:20:12', '2020-10-30 08:20:12'),
(68, 'read_ket_quas', 'ket_quas', '2020-10-30 08:20:12', '2020-10-30 08:20:12'),
(69, 'edit_ket_quas', 'ket_quas', '2020-10-30 08:20:12', '2020-10-30 08:20:12'),
(70, 'add_ket_quas', 'ket_quas', '2020-10-30 08:20:12', '2020-10-30 08:20:12'),
(71, 'delete_ket_quas', 'ket_quas', '2020-10-30 08:20:12', '2020-10-30 08:20:12'),
(77, 'browse_de_kiem_tras', 'de_kiem_tras', '2020-10-30 08:27:10', '2020-10-30 08:27:10'),
(78, 'read_de_kiem_tras', 'de_kiem_tras', '2020-10-30 08:27:10', '2020-10-30 08:27:10'),
(79, 'edit_de_kiem_tras', 'de_kiem_tras', '2020-10-30 08:27:10', '2020-10-30 08:27:10'),
(80, 'add_de_kiem_tras', 'de_kiem_tras', '2020-10-30 08:27:10', '2020-10-30 08:27:10'),
(81, 'delete_de_kiem_tras', 'de_kiem_tras', '2020-10-30 08:27:10', '2020-10-30 08:27:10'),
(82, 'browse_bai_lams', 'bai_lams', '2020-10-30 08:28:22', '2020-10-30 08:28:22'),
(83, 'read_bai_lams', 'bai_lams', '2020-10-30 08:28:22', '2020-10-30 08:28:22'),
(84, 'edit_bai_lams', 'bai_lams', '2020-10-30 08:28:22', '2020-10-30 08:28:22'),
(85, 'add_bai_lams', 'bai_lams', '2020-10-30 08:28:22', '2020-10-30 08:28:22'),
(86, 'delete_bai_lams', 'bai_lams', '2020-10-30 08:28:22', '2020-10-30 08:28:22'),
(87, 'browse_mon_hocs', 'mon_hocs', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(88, 'read_mon_hocs', 'mon_hocs', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(89, 'edit_mon_hocs', 'mon_hocs', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(90, 'add_mon_hocs', 'mon_hocs', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(91, 'delete_mon_hocs', 'mon_hocs', '2020-10-30 08:29:48', '2020-10-30 08:29:48'),
(97, 'browse_nam_hocs', 'nam_hocs', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(98, 'read_nam_hocs', 'nam_hocs', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(99, 'edit_nam_hocs', 'nam_hocs', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(100, 'add_nam_hocs', 'nam_hocs', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(101, 'delete_nam_hocs', 'nam_hocs', '2020-10-30 08:31:22', '2020-10-30 08:31:22'),
(102, 'browse_chi_tiet_des', 'chi_tiet_des', '2020-10-30 08:32:43', '2020-10-30 08:32:43'),
(103, 'read_chi_tiet_des', 'chi_tiet_des', '2020-10-30 08:32:43', '2020-10-30 08:32:43'),
(104, 'edit_chi_tiet_des', 'chi_tiet_des', '2020-10-30 08:32:43', '2020-10-30 08:32:43'),
(105, 'add_chi_tiet_des', 'chi_tiet_des', '2020-10-30 08:32:43', '2020-10-30 08:32:43'),
(106, 'delete_chi_tiet_des', 'chi_tiet_des', '2020-10-30 08:32:43', '2020-10-30 08:32:43'),
(107, 'browse_cau_hois', 'cau_hois', '2020-10-30 08:34:23', '2020-10-30 08:34:23'),
(108, 'read_cau_hois', 'cau_hois', '2020-10-30 08:34:23', '2020-10-30 08:34:23'),
(109, 'edit_cau_hois', 'cau_hois', '2020-10-30 08:34:23', '2020-10-30 08:34:23'),
(110, 'add_cau_hois', 'cau_hois', '2020-10-30 08:34:23', '2020-10-30 08:34:23'),
(111, 'delete_cau_hois', 'cau_hois', '2020-10-30 08:34:23', '2020-10-30 08:34:23'),
(112, 'browse_dap_an_dungs', 'dap_an_dungs', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(113, 'read_dap_an_dungs', 'dap_an_dungs', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(114, 'edit_dap_an_dungs', 'dap_an_dungs', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(115, 'add_dap_an_dungs', 'dap_an_dungs', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(116, 'delete_dap_an_dungs', 'dap_an_dungs', '2020-10-30 08:35:19', '2020-10-30 08:35:19'),
(117, 'browse_muc_kiem_tras', 'muc_kiem_tras', '2020-10-30 08:37:37', '2020-10-30 08:37:37'),
(118, 'read_muc_kiem_tras', 'muc_kiem_tras', '2020-10-30 08:37:37', '2020-10-30 08:37:37'),
(119, 'edit_muc_kiem_tras', 'muc_kiem_tras', '2020-10-30 08:37:37', '2020-10-30 08:37:37'),
(120, 'add_muc_kiem_tras', 'muc_kiem_tras', '2020-10-30 08:37:37', '2020-10-30 08:37:37'),
(121, 'delete_muc_kiem_tras', 'muc_kiem_tras', '2020-10-30 08:37:37', '2020-10-30 08:37:37'),
(122, 'browse_lop_monhocs', 'lop_monhocs', '2020-10-31 09:34:26', '2020-10-31 09:34:26'),
(123, 'read_lop_monhocs', 'lop_monhocs', '2020-10-31 09:34:26', '2020-10-31 09:34:26'),
(124, 'edit_lop_monhocs', 'lop_monhocs', '2020-10-31 09:34:26', '2020-10-31 09:34:26'),
(125, 'add_lop_monhocs', 'lop_monhocs', '2020-10-31 09:34:26', '2020-10-31 09:34:26'),
(126, 'delete_lop_monhocs', 'lop_monhocs', '2020-10-31 09:34:26', '2020-10-31 09:34:26'),
(127, 'browse_chi_tiet_cau_hois', 'chi_tiet_cau_hois', '2020-11-03 09:41:49', '2020-11-03 09:41:49'),
(128, 'read_chi_tiet_cau_hois', 'chi_tiet_cau_hois', '2020-11-03 09:41:49', '2020-11-03 09:41:49'),
(129, 'edit_chi_tiet_cau_hois', 'chi_tiet_cau_hois', '2020-11-03 09:41:49', '2020-11-03 09:41:49'),
(130, 'add_chi_tiet_cau_hois', 'chi_tiet_cau_hois', '2020-11-03 09:41:49', '2020-11-03 09:41:49'),
(131, 'delete_chi_tiet_cau_hois', 'chi_tiet_cau_hois', '2020-11-03 09:41:49', '2020-11-03 09:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(52, 4),
(53, 1),
(53, 4),
(54, 1),
(54, 4),
(55, 1),
(55, 4),
(56, 1),
(56, 4),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(68, 4),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(78, 4),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(83, 4),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(88, 1),
(88, 4),
(89, 1),
(90, 1),
(91, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(102, 3),
(103, 1),
(103, 3),
(104, 1),
(104, 3),
(105, 1),
(105, 3),
(106, 1),
(106, 3),
(107, 1),
(107, 3),
(108, 1),
(108, 3),
(109, 1),
(109, 3),
(110, 1),
(110, 3),
(111, 1),
(111, 3),
(112, 1),
(112, 3),
(113, 1),
(113, 3),
(114, 1),
(114, 3),
(115, 1),
(115, 3),
(116, 1),
(116, 3),
(117, 1),
(117, 3),
(118, 1),
(118, 3),
(119, 1),
(119, 3),
(120, 1),
(120, 3),
(121, 1),
(121, 3),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(130, 1),
(130, 3),
(131, 1),
(131, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\r\n                <h2>We can use all kinds of format!</h2>\r\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-10-30 06:59:09', '2020-10-30 06:59:09'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\r\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\r\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-10-30 06:59:09', '2020-10-30 06:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(2, 'user', 'Normal User', '2020-10-30 06:59:08', '2020-10-30 06:59:08'),
(3, 'Giáo Viên', 'Giáo Viên', '2020-11-06 10:15:59', '2020-11-06 10:15:59'),
(4, 'Học sinh', 'Học sinh', '2020-11-06 10:17:14', '2020-11-06 10:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2020-10-30 06:59:10', '2020-10-30 06:59:10'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2020-10-30 06:59:10', '2020-10-30 06:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8_unicode_ci,
  `gioi_tinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ma_gv` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_hs` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `hinh`, `email_verified_at`, `password`, `remember_token`, `status`, `gioi_tinh`, `sdt`, `ngay_sinh`, `dia_chi`, `created_at`, `updated_at`, `ma_gv`, `ma_hs`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$GWqrDCgbfoh/l6mY0mE4muX7Qh9TEmxJ9D/QIXnCVJcS8b5OZiUrq', 'VIa0Rd9ol9wHeEXv0X4ZZez1y4kJ7q6YC1B0ZseA3lgtW3XsZlipeaHRHpYR', NULL, '2020-10-30 13:59:09', '2020-10-30 13:59:09', NULL, NULL, NULL, NULL, 'Admin', NULL),
(2, 1, 'admin', 'admin@gmail.com', 'users/default.png', NULL, '$2y$10$HWfkGYDujmvn9Cu3ICjeguh3paHjj5.SSM6fZLNUMirZbJc2ZyOL.', NULL, NULL, '2020-10-30 13:59:54', '2020-10-30 13:59:55', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'HuynhNet', 'huynhnet@gmail.com', 'users/default.png', NULL, '$2y$10$22exYpWQVE9Ex37Xiv68IuawyM0Q/wFK631S2wmzWXcjG9qCf3T2q', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 10:07:08', '2020-10-30 10:07:08', 'HuynhNet', NULL),
(4, 4, 'Nguyễn Văn Sơn', 'son@gmail.com', 'users/default.png', NULL, '$2y$10$MuaQl3cLaJObXvaENB7lWeZOFKwT4c43zE704tx.MbUPD9HGB6DhK', NULL, NULL, 'Nam', '0943574932', '1998-07-17', 'Cần Thơ, Việt Nam', '2020-11-07 08:59:04', '2020-11-07 08:59:04', NULL, 'HS121126'),
(5, 4, 'Huỳnh Văn Tiền', 'tien@gmail.com', 'users/default.png', NULL, '$2y$10$h5Bf1.JesfOVuPECBm5eCuCbFHmT01yiwEOZC.cgKtvHgsvovxkau', NULL, NULL, 'Nam', '0943574932', '1998-08-11', 'Cao Lãnh, Đồng Tháp', '2020-11-09 09:01:16', '2020-11-09 09:01:16', NULL, 'HS198004'),
(7, 4, 'Lâm Hoài Thương', 'thuong@gmail.com', 'users/default.png', NULL, '$2y$10$UFfkc29VFEp3uUTeCW0kV.TJOwY/oXYSawfwL5/dDuNQWcVAOZIzW', NULL, NULL, 'Nam', '0948109427', '1997-07-17', 'Ninh Kiều, Cần Thơ', '2020-11-09 09:06:17', '2020-11-09 09:06:17', NULL, 'HS189734'),
(8, 3, 'Trần Văn Hoàng', 'hoang@gmail.com', 'users/default.png', NULL, '$2y$10$hebB9huDvV0OYoiZYAFrT.hhvznR0Qnby.j0wjd1xc26CN9KrWdMe', NULL, NULL, 'Nam', '0956534976', '1982-07-13', 'Kế Sách, Sóc Trăng', '2020-11-09 09:19:33', '2020-11-09 09:19:33', 'GV361803', ''),
(9, 3, 'Nguyễn Huy Cường', 'cuong@gmail.com', 'users/default.png', NULL, '$2y$10$ZuZ1aFjLDqcpUR9eMb.Csu5ffjZGMOt6.paxN8jjmVs09csEFBrVO', NULL, NULL, 'Nam', '0745876534', '1980-08-19', 'Đầm Dơi, Cà Mau', '2020-11-09 09:24:00', '2020-11-09 09:24:00', 'GV868342', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_lams`
--
ALTER TABLE `bai_lams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cau_hois`
--
ALTER TABLE `cau_hois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_cau_hois`
--
ALTER TABLE `chi_tiet_cau_hois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_des`
--
ALTER TABLE `chi_tiet_des`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dap_an_dungs`
--
ALTER TABLE `dap_an_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `de_kiem_tras`
--
ALTER TABLE `de_kiem_tras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giao_viens`
--
ALTER TABLE `giao_viens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoc_sinhs`
--
ALTER TABLE `hoc_sinhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ket_quas`
--
ALTER TABLE `ket_quas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_kiem_tras`
--
ALTER TABLE `loai_kiem_tras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lops`
--
ALTER TABLE `lops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop_monhocs`
--
ALTER TABLE `lop_monhocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muc_kiem_tras`
--
ALTER TABLE `muc_kiem_tras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nam_hocs`
--
ALTER TABLE `nam_hocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_lams`
--
ALTER TABLE `bai_lams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cau_hois`
--
ALTER TABLE `cau_hois`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_cau_hois`
--
ALTER TABLE `chi_tiet_cau_hois`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_des`
--
ALTER TABLE `chi_tiet_des`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dap_an_dungs`
--
ALTER TABLE `dap_an_dungs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `de_kiem_tras`
--
ALTER TABLE `de_kiem_tras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giao_viens`
--
ALTER TABLE `giao_viens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoc_sinhs`
--
ALTER TABLE `hoc_sinhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ket_quas`
--
ALTER TABLE `ket_quas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_kiem_tras`
--
ALTER TABLE `loai_kiem_tras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lops`
--
ALTER TABLE `lops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lop_monhocs`
--
ALTER TABLE `lop_monhocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mon_hocs`
--
ALTER TABLE `mon_hocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `muc_kiem_tras`
--
ALTER TABLE `muc_kiem_tras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nam_hocs`
--
ALTER TABLE `nam_hocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
