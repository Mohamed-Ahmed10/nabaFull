-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 11:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naba`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `image`, `is_activate`) VALUES
(1, '2023-02-19 20:50:54', '2023-02-19 20:50:54', 1, NULL, 'admin/assets/images/about_section/167684705458307.jpg', 1),
(2, '2023-02-19 20:51:02', '2023-02-19 20:51:02', 1, NULL, 'admin/assets/images/about_section/167684706286875.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `about_section_translations`
--

CREATE TABLE `about_section_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `about_section_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_section_translations`
--

INSERT INTO `about_section_translations` (`id`, `created_at`, `updated_at`, `title`, `about_section_id`, `locale`) VALUES
(1, '2023-02-19 20:50:54', '2023-02-19 20:50:54', 'Consectetur voluptat', 1, 'ar'),
(2, '2023-02-19 20:50:54', '2023-02-19 20:50:54', 'Pariatur Vitae perf', 1, 'en'),
(3, '2023-02-19 20:51:03', '2023-02-19 20:51:03', 'Et enim ipsum rem ra', 2, 'ar'),
(4, '2023-02-19 20:51:03', '2023-02-19 20:51:03', 'Et enim natus alias', 2, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `created_at`, `updated_at`, `name`, `email`, `password`, `phone`, `photo`, `is_activate`, `role_id`) VALUES
(1, '2021-07-09 17:18:55', '2023-01-20 11:41:07', 'naba', 'amr@gmail.com', '$2y$10$aLJ84LxoBMZv45233Q6XgeEZAjcIAzdFRFSj93ooYKmPH/rc23OJe', '5687500', 'admin/assets/images/admins/162569518843346.jpg', 1, 1),
(3, '2021-07-09 17:18:55', '2021-07-09 18:04:47', 'asmr5', 'amsr@gmail.com', '$2y$10$NXVxS1QygMRM.ZaBAeAOR.iXHhhx8ehvQUlWxFr.MwHbxhrufzDr2', '5687', 'admin/assets/images/admins/162586108799055.jpg', 1, 1),
(8, '2022-03-30 08:56:00', '2022-03-30 08:56:00', 'Melissa Bird', 'kygiravaw@mailinator.com', '$2y$10$zmh2cIfrh3vmRIu6U7wQtOl62Xytxdjl4UBI2E9NeUv1k5cPwbbli', '88', NULL, 1, 1),
(9, '2022-03-30 08:57:22', '2022-03-30 08:57:22', 'Bo Whitfield', 'nibunidi@mailinator.com', '$2y$10$mrhkrICcVpx1aPIxACsuYeAuCk8serItzi3MdJE3Z/P3xhkqY6u6y', '12', NULL, 0, 1),
(10, '2022-06-09 08:47:14', '2023-01-20 09:08:37', 'Quinn Rodriquez', 'qamamefa@mailinator.com', '$2y$10$/IGl//s4l3XPXVnBJnzvouZw5xaWgi0jNqSW0EpkKPXJ3bgsmwbxq', '270654165', NULL, 0, 2),
(11, '2022-06-09 14:54:58', '2022-06-09 14:55:16', 'Pascale Dominguez', 'xasyvota@mailinator.com', '$2y$10$/.n8ctAKZxBrSIVgGSnDW.7puFw7IY9rgV2SEp5Mr3Jw/E5lgme.K', '81', NULL, 1, NULL),
(13, '2022-06-27 13:50:41', '2023-01-19 21:20:25', 'احمد', 'ahmad12@hotmail.com', '$2y$10$eU4BRid6hkQPn4/ZVfoL4.eOgmCO/6Bfn7wID57RnMy02dHmcyjOu', '2', NULL, 1, NULL),
(15, '2023-01-18 19:30:56', '2023-01-19 21:19:21', 'aaaaaa', 'amrrr@gmail.com', '$2y$10$l3cH3jE5wX23WWZ7NbkElup/jXr1KUUnT5eV4PkWQYs7CTEnM5OFa', '+1 (986) 487-7204', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `second_image` varchar(255) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `title`, `image`, `second_image`, `description`, `is_activate`) VALUES
(1, '2023-01-21 16:19:47', '2023-01-21 16:23:36', 0, NULL, 'asdasda asdasdasd asdasdasd asdasdasd', 'admin/assets/images/articles/167432541614374.jpg', '', 'Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te 200000', 1),
(2, '2023-01-21 16:22:52', '2023-01-21 16:23:03', 0, NULL, 'sdsad assdasd asda', 'admin/assets/images/articles/167432537219203.png', '', 'asdasd asdasd asdasdasd', 1),
(3, '2023-01-28 20:07:53', '2023-01-28 20:07:53', 0, NULL, NULL, 'admin/assets/images/articles/167494367342504.jpg', '', NULL, 1),
(4, '2023-01-28 20:09:06', '2023-01-28 20:09:06', 0, NULL, NULL, 'admin/assets/images/articles/167494374643433.jpg', '', NULL, 1),
(5, '2023-01-28 20:10:11', '2023-01-28 20:10:11', 0, NULL, NULL, 'admin/assets/images/articles/167494381162784.jpg', '', NULL, 1),
(6, '2023-01-28 20:11:15', '2023-01-28 20:21:38', 0, NULL, NULL, 'admin/assets/images/articles/167494449899529.png', '', NULL, 1),
(7, '2023-02-20 19:05:31', '2023-02-20 19:05:47', 1, 1, NULL, 'admin/assets/images/articles/167692713190921.jpg', 'admin/assets/images/articles/167692713185042.png', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

CREATE TABLE `article_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `description` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`id`, `created_at`, `updated_at`, `title`, `description`, `article_id`, `locale`) VALUES
(1, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 6, 'ar'),
(2, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 6, 'dd'),
(3, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 1, 'ar'),
(4, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 1, 'en'),
(5, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 2, 'ar'),
(6, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 2, 'en'),
(7, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 3, 'ar'),
(8, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 3, 'en'),
(9, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 4, 'ar'),
(10, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 4, 'en'),
(11, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 5, 'ar'),
(12, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 5, 'en'),
(13, '2023-01-28 20:39:55', '2023-01-28 20:39:55', 'ennnnnnnnnnnnn', 'ennnnnnnnnnnnnnnnnnnnn', 6, 'en'),
(14, '2023-02-20 19:05:31', '2023-02-20 19:05:31', 'Ea quidem pariatur', 'Cupidatat magni ut l', 7, 'ar'),
(15, '2023-02-20 19:05:47', '2023-02-20 19:05:47', 'Id aut in irure libe', 'Libero vitae ad adip', 7, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `is_activate`) VALUES
(1, '2023-01-31 23:09:09', '2023-01-31 23:15:08', 1, 1, 1),
(2, '2023-01-31 23:15:43', '2023-01-31 23:17:08', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(400) NOT NULL,
  `category_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `created_at`, `updated_at`, `name`, `category_id`, `locale`) VALUES
(1, '2023-01-31 23:09:09', '2023-01-31 23:15:16', 'aaaar 500', 1, 'ar'),
(2, '2023-01-31 23:15:08', '2023-01-31 23:15:08', 'eeeeeeen', 1, 'en'),
(3, '2023-01-31 23:15:43', '2023-01-31 23:15:43', 'aaaar 2', 2, 'ar'),
(4, '2023-01-31 23:15:43', '2023-01-31 23:15:43', 'ennnnn', 2, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_us`
--

CREATE TABLE `contacts_us` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(600) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts_us`
--

INSERT INTO `contacts_us` (`id`, `created_at`, `updated_at`, `name`, `company_name`, `email`, `country`, `phone`, `notes`) VALUES
(1, '2023-02-19 21:57:30', '2023-02-19 21:57:30', 'aaaaaaaa', 'abbott kidd llc', 'amsssssr@gmail.com', 'egypt', '+1 (986) 487-7204', 'sadasd asdkjsa;k saljdh;kas jashdljasd shagdkvahsgd jsakdgjalsdb saljhdlasjdsd sadasdassdsad asdasdasdasdas sadasd asdkjsa;k saljdh;kas jashdljasd shagdkvahsgd jsakdgjalsdb saljhdlasjdsd sadasdassdsad asdasdasdasdas'),
(2, '2023-02-19 22:15:18', '2023-02-19 22:15:18', 'larissa fox', 'harper hopkins inc', 'cexigajaxu@mailinator.com', 'libya', '+1 (102) 469-1728', NULL),
(3, '2023-02-19 22:16:59', '2023-02-19 22:16:59', 'justina rodriquez', 'winters chandler llc', 'lafeqo@mailinator.com', 'somalia', '+1 (203) 244-5662', 'sint at rerum labor'),
(4, '2023-02-20 06:58:07', '2023-02-20 06:58:07', 'arden payne home', 'shepherd and barron plc', 'zotiwyqeme@mailinator.com', 'algeria', '+1 (211) 735-7223', 'et harum repudiandae'),
(5, '2023-02-20 06:58:28', '2023-02-20 06:58:28', 'giselle lowery product', 'miles and ellison traders', 'labacok@mailinator.com', 'uae', '+1 (714) 636-5721', 'et beatae culpa non'),
(6, '2023-02-20 06:58:40', '2023-02-20 06:58:40', 'rebekah adams article', 'grant walsh associates', 'dyxu@mailinator.com', 'other - record the international phone number', '+1 (838) 391-5995', 'ullamco anim sint ra'),
(7, '2023-02-20 06:58:50', '2023-02-20 06:58:50', 'cheyenne gay webinars', 'kline mayer associates', 'fivo@mailinator.com', 'somalia', '+1 (421) 976-6781', 'officia eligendi tem'),
(8, '2023-02-20 06:59:05', '2023-02-20 06:59:05', 'aristotle deleon service', 'robertson and foreman plc', 'dabil@mailinator.com', 'iraq', '+1 (876) 265-6377', 'voluptatem suscipit'),
(9, '2023-02-20 07:00:39', '2023-02-20 07:00:39', 'vladimir bender training', 'golden and cantrell llc', 'qona@mailinator.com', 'somalia', '+1 (171) 694-1874', 'et aut quia id mole'),
(10, '2023-02-20 17:04:50', '2023-02-20 17:04:50', 'ishmael hensley', 'ross and russell inc', 'paxuz@mailinator.com', 'algeria', '+1 (482) 153-2856', 'qui ratione cillum s'),
(11, '2023-02-20 17:05:03', '2023-02-20 17:05:03', 'yetta barker', 'bowers and vega inc', 'linojajic@mailinator.com', 'qatar', '+1 (791) 892-7787', 'sed ex nesciunt vel'),
(12, '2023-02-20 17:05:57', '2023-02-20 17:05:57', 'darryl green', 'dyer and clark co', 'kyhyn@mailinator.com', 'palestine', '+1 (337) 787-7351', 'ut ut aut et consequ'),
(13, '2023-02-20 17:06:49', '2023-02-20 17:06:49', 'selma hatfield', 'villarreal and quinn trading', 'vyje@mailinator.com', 'saudi arabia', '+1 (424) 916-9794', 'doloremque et accusa');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_07_03_121135_create_admins_table', 1),
(6, '2021_07_03_121135_create_cities_table', 1),
(8, '2021_07_03_121135_create_regions_table', 1),
(9, '2021_07_03_121135_create_settings_table', 1),
(10, '2021_07_03_121135_create_sliders_table', 1),
(11, '2021_07_07_214409_create_cars_table', 1),
(12, '2021_07_07_214409_create_spare_parts_table', 1),
(13, '2021_07_07_214410_create_advertising_cars_table', 1),
(14, '2021_07_07_214410_create_advertising_spare_parts_table', 1),
(15, '2021_07_07_214420_create_foreign_keys', 1),
(16, '2021_07_08_214409_create_car_models_table', 2),
(17, '2021_07_08_121135_create_comment_cars_table', 3),
(18, '2021_07_08_121135_create_comment_spare_parts_table', 3),
(19, '2021_07_07_214410_create_contacts_table', 4),
(20, '2021_07_08_214409_create_spare_part_models_table', 5),
(21, '2021_07_03_121135_create_category_table', 6),
(22, '2021_07_08_214409_create_models_table', 7),
(23, '2021_07_07_214410_create_advertisings_table', 8),
(24, '2021_07_08_121135_create_comments_table', 9),
(25, '2021_07_02_121135_create_advertisers_table', 10),
(26, '2021_07_08_121135_create_comments_expert_table', 11),
(27, '2021_07_03_121135_create_experts_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 'عرض المشرفين', 'admins/index', NULL, NULL),
(2, 'عرض اضافه المشرفين', 'admins/create', NULL, NULL),
(3, 'حفظ اضافه المشرفين', 'admins/store', NULL, NULL),
(4, 'تفعيل المشرفين', 'admins/activate', NULL, NULL),
(5, 'حذف المشرفين', 'admins/delete', NULL, NULL),
(6, 'صلاحيه المشرفين', 'admin/role', NULL, NULL),
(7, 'عرض الصلاحيات', 'admin/roles/index', NULL, NULL),
(8, 'عرض اضافه الصلاحيات', 'admin/roles/create', NULL, NULL),
(9, 'حفظ اضافه الصلاحيات', 'admin/roles/store', NULL, NULL),
(10, 'حذف الصلاحيات', 'admin/roles/delete', NULL, NULL),
(11, 'عرض الصلاحيه', 'admin/roles/show', NULL, NULL),
(12, 'عرض تعديل الصلاحيات', 'admin/roles/edit', NULL, NULL),
(13, 'حفظ تعديل الصلاحيات', 'admin/roles/update', NULL, NULL),
(14, 'عرض الاعضاء', 'admin/users/index', NULL, NULL),
(15, 'عرض اضافه الاعضاء', 'admin/users/create', NULL, NULL),
(16, 'حفظ اضافه الاعضاء', 'admin/users/store', NULL, NULL),
(17, 'تفعيل الاعضاء', 'admin/users/activate', NULL, NULL),
(18, 'حذف الاعضاء', 'admin/users/delete', NULL, NULL),
(19, 'عرض الفنادق', 'admin/hotels/index', NULL, NULL),
(20, 'عرض اضافه الفنادق', 'admin/hotels/create', NULL, NULL),
(21, 'حفظ اضافه الفنادق', 'admin/hotels/store', NULL, NULL),
(22, 'عرض تعديل الفنادق', 'admin/hotels/edit', NULL, NULL),
(23, 'حفظ تعديل الفنادق', 'admin/hotels/update', NULL, NULL),
(24, 'تفعيل الفنادق', 'admin/hotels/activate', NULL, NULL),
(25, 'حذف الفنادق', 'admin/hotels/delete', NULL, NULL),
(26, 'عرض المحافظات', 'admin/governorates/index', NULL, NULL),
(27, 'عرض اضافه المحافظات', 'admin/governorates/create', NULL, NULL),
(28, 'حفظ اضافه المحافظات', 'admin/governorates/store', NULL, NULL),
(29, 'عرض تعديل المحافظات', 'admin/governorates/edit', NULL, NULL),
(30, 'حفظ تعديل المحافظات', 'admin/governorates/update', NULL, NULL),
(31, 'تفعيل المحافظات', 'admin/governorates/activate', NULL, NULL),
(32, 'حذف المحافظات', 'admin/governorates/delete', NULL, NULL),
(33, 'عرض الحجزات', 'admin/bookings/index', NULL, NULL),
(34, 'تاكيد الحجزات', 'admin/bookings/confirm', NULL, NULL),
(35, 'عرض تفاصيل الحجز', 'admin/bookings/show', NULL, NULL),
(36, 'الغاء الحجزات', 'admin/bookings/delete', NULL, NULL),
(37, 'عرض طلبات الغاء الحجزات', 'admin/bookings/cancel', NULL, NULL),
(38, 'عرض اضافه الحجزات', 'admin/bookings/create', NULL, NULL),
(39, 'حفظ اضافه الحجزات', 'admin/bookings/store', NULL, NULL),
(40, 'Excel تصدير الحجوزات', 'admin/bookings/export/excel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `video_link` varchar(500) NOT NULL,
  `color_title` varchar(255) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `category_id`, `image`, `video_link`, `color_title`, `is_activate`) VALUES
(1, '2023-02-03 12:33:57', '2023-02-03 12:34:26', 1, 1, 0, '', 'http://127.0.0.1:8000/admin/products/create/8', NULL, 1),
(2, '2023-02-03 12:37:08', '2023-02-03 12:37:08', 1, NULL, 0, '', 'http://127.0.0.1:8000/admin/products/create2', NULL, 1),
(3, '2023-02-03 12:50:33', '2023-02-03 12:50:51', 1, 1, 0, '', 'http://127.0.0.1:8000/admin/products/create3/9', NULL, 1),
(5, '2023-02-08 16:22:07', '2023-02-08 16:22:07', 1, NULL, 1, '', 'http://127.0.0.1:8000/admin/products/create ar', NULL, 1),
(6, '2023-02-12 01:01:40', '2023-02-20 18:57:13', 1, 1, 2, 'admin/assets/images/products/167617090079594.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XOgfA4HeTF4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '#b94141', 1),
(7, '2023-02-14 17:09:50', '2023-02-14 17:09:59', 1, 1, NULL, 'admin/assets/images/products/167640179090216.jpg', 'Sit porro quis quibu', NULL, 1),
(8, '2023-02-14 18:44:28', '2023-02-14 18:44:28', 1, NULL, NULL, 'admin/assets/images/products/167640746840945.jpg', 'Omnis ullam reiciend', NULL, 1),
(9, '2023-02-20 18:57:34', '2023-02-20 18:57:42', 1, 1, NULL, 'admin/assets/images/products/167692665495390.jpg', 'Explicabo Facilis t', '#0aff70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sections`
--

CREATE TABLE `product_sections` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `section_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sections`
--

INSERT INTO `product_sections` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `icon`, `section_no`, `product_id`, `is_activate`) VALUES
(9, '2023-02-08 23:56:16', '2023-02-09 00:08:19', 1, 1, 'product_section_id as 44', 2, 2, 1),
(11, '2023-02-12 19:18:54', '2023-02-13 11:49:08', 1, 1, 'admin/assets/images/products/167623673417268.jpg', 1, 6, 1),
(12, '2023-02-12 19:58:51', '2023-02-12 19:58:51', 1, NULL, 'admin/assets/images/products/167623913120139.jpg', 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_section_translations`
--

CREATE TABLE `product_section_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `description` text NOT NULL,
  `product_section_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_section_translations`
--

INSERT INTO `product_section_translations` (`id`, `created_at`, `updated_at`, `title`, `description`, `product_section_id`, `locale`) VALUES
(1, '2023-02-08 23:55:59', '2023-02-08 23:55:59', 'Officia fugiat conse  ar', 'Officia fugiat conse  ar', 8, 'ar'),
(2, '2023-02-08 23:55:59', '2023-02-08 23:55:59', 'Officia fugiat conse  ar', 'Officia fugiat conse  ar', 8, 'en'),
(3, '2023-02-08 23:56:16', '2023-02-09 00:06:58', 'product_section_id sa sssssss', 'product_section_idas', 9, 'ar'),
(4, '2023-02-09 00:07:12', '2023-02-09 00:07:12', 'Non natus culpa comm ennn', 'Non natus culpa comm ennn 555', 9, 'en'),
(5, '2023-02-09 00:07:58', '2023-02-09 00:07:58', 'Officia fugiat conse  ar', 'gjjjjjjjj jkjjjjhjhh hvutcu', 10, 'ar'),
(6, '2023-02-09 00:07:58', '2023-02-09 00:07:58', 'Non natus culpa comm', 'j hgkvh ugl ;iuh;lk', 10, 'en'),
(7, '2023-02-12 19:18:55', '2023-02-12 19:18:55', 'Officia fugiat conse  ar', 'gjjjjjjjj jkjjjjhjhh hvutcu', 11, 'ar'),
(8, '2023-02-12 19:58:51', '2023-02-12 19:58:51', 'Officia fugiat conse  ar', 'gjjjjjjjj jkjjjjhjhh hvutcu', 12, 'ar'),
(9, '2023-02-12 19:58:51', '2023-02-12 19:58:51', 'Non natus culpa comm', 'j hgkvh ugl ;iuh;lk', 12, 'en'),
(10, '2023-02-13 11:49:09', '2023-02-13 11:49:09', 'Non natus culpa comm aa', 'j hgkvh ugl ;iuh;lka aa', 11, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `second_title` varchar(1200) DEFAULT NULL,
  `description` text NOT NULL,
  `second_description` text NOT NULL,
  `video_title` varchar(500) DEFAULT NULL,
  `video_description` text DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `created_at`, `updated_at`, `title`, `second_title`, `description`, `second_description`, `video_title`, `video_description`, `product_id`, `locale`) VALUES
(1, '2023-02-03 12:33:57', '2023-02-03 12:34:26', 'Officia fugiat conse  ar 111', NULL, 'gjjjjjjjj jkjjjjhjhh hvutcu', 'a', NULL, NULL, 1, 'ar'),
(2, '2023-02-03 12:37:08', '2023-02-03 12:37:08', 'Officia fugiat conse  ar 2', NULL, 'gjjjjjjjj jkjjjjhjhh hvutcu  2', 'a', NULL, NULL, 2, 'ar'),
(3, '2023-02-03 12:50:33', '2023-02-03 12:50:46', 'Officia fugiat conse  ar 3 ddd', NULL, 'gjjjjjjjj jkjjjjhjhh hvutcu  3', 'a', NULL, NULL, 3, 'ar'),
(4, '2023-02-03 12:50:33', '2023-02-03 12:50:55', 'Non natus culpa comm 3', NULL, 'j hgkvh ugl ;iuh;lk 3d', 'a', NULL, NULL, 3, 'en'),
(5, '2023-02-03 15:09:28', '2023-02-03 15:13:46', 'Officia fugiat conse  ar 8', NULL, 'gjjjjjjjj jkjjjjhjhh hvutcu  88', 'a', NULL, NULL, 4, 'ar'),
(6, '2023-02-03 15:09:28', '2023-02-03 15:13:46', 'Non natus culpa comm 8', NULL, 'j hgkvh ugl ;iuh;lk 88', 'a', NULL, NULL, 4, 'en'),
(7, '2023-02-08 16:22:08', '2023-02-08 16:22:08', 'sadasdd asdasdas asd description 111 ar', NULL, 'sadasdd asdasdas asd description 111 ar', 'sadasdd asdasdas asd description 111 ar', 'sadasdd asdasdas asd description 111 ar', 'sadasdd asdasdas asd description 111 ar', 5, 'ar'),
(8, '2023-02-08 16:22:08', '2023-02-08 16:22:08', 'Non natus culpa comm 111', NULL, 'j hgkvh ugl ;iuh;lk 111', 'sadasdd asdasdas asd 111', 'sadasdd asdasdas asd  title 111', 'sadasdd asdasdas asd description 111', 5, 'en'),
(9, '2023-02-12 01:01:40', '2023-02-20 18:57:13', 'Officia fugiat conse  araaaa', 'In officia velit rem', 'gjjjjjjjj jkjjjjhjhh hvutcu aaaaaa', 'sadasdd asdasdas asd description 111 araaaaa', 'sadasdd asdasdas asd description 111 araaaaa', 'sadasdd asdasdas asd description 111 araaaaa', 6, 'ar'),
(10, '2023-02-12 01:01:40', '2023-02-12 01:01:40', 'Non natus culpa commaaaaaa', NULL, 'j hgkvh ugl ;iuh;lkaaaaaa', 'sadasdd asdasdas asd 111aaaaa', 'sadasdd asdasdas asd  title 111aaaaaa', 'sadasdd asdasdas asd description 111aaaaaa', 6, 'en'),
(11, '2023-02-14 17:09:50', '2023-02-14 17:09:59', 'Vel aut nihil pariat', NULL, 'Accusamus quaerat ni', 'Quo dolorem officia sssssssssssssssss', 'Qui ut ut ad explica', 'Est animi perferen', 7, 'ar'),
(12, '2023-02-14 17:09:50', '2023-02-14 17:09:50', 'Quis aut fugit aut', NULL, 'Voluptates reprehend', 'Unde mollitia cillum', 'Aperiam velit reicie', 'Quo quis porro velit', 7, 'en'),
(13, '2023-02-14 18:44:28', '2023-02-14 18:44:28', 'Est perferendis fuga', 'In officia velit rem', 'Exercitationem ipsum', 'Ducimus exercitatio', 'Reprehenderit elit', 'Do exercitation et c', 8, 'ar'),
(14, '2023-02-14 18:44:29', '2023-02-14 18:44:29', 'Optio et numquam ut', 'Eius quis possimus', 'Incidunt dolore vol', 'Expedita aliquam ips', 'Non ut maiores repud', 'Est rerum obcaecati', 8, 'en'),
(15, '2023-02-20 18:57:34', '2023-02-20 18:57:34', 'Sint magni sed fugi', 'Modi deleniti repreh', 'Dolorum numquam exce', 'Recusandae Placeat', 'Et explicabo Volupt', 'Quod reprehenderit', 9, 'ar'),
(16, '2023-02-20 18:57:34', '2023-02-20 18:57:34', 'Voluptate esse provi', 'Voluptate mollit und', 'Sunt fuga Officiis', 'Voluptatibus ex sit', 'Et sit eveniet et', 'Id maiores debitis', 9, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Destiny Cleveland', '2021-12-20 11:16:58', '2022-01-19 13:13:55'),
(2, 'مشرف', '2021-12-20 11:17:12', '2021-12-20 11:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `image`, `is_activate`) VALUES
(2, '2023-02-14 21:48:38', '2023-02-14 21:48:38', 1, NULL, 'admin/assets/images/services/167641851878975.jpg', 1),
(3, '2023-02-14 21:49:36', '2023-02-14 21:49:36', 1, NULL, 'admin/assets/images/services/167641857666005.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

CREATE TABLE `service_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `description` text NOT NULL,
  `service_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_translations`
--

INSERT INTO `service_translations` (`id`, `created_at`, `updated_at`, `title`, `description`, `service_id`, `locale`) VALUES
(1, '2023-02-14 21:48:22', '2023-02-14 21:49:01', 'Praesentium occaecat rrrrrrrrrr', 'Et lorem ipsa archi', 1, 'ar'),
(2, '2023-02-14 21:48:22', '2023-02-14 21:49:06', 'Perspiciatis non si', 'Ipsum commodi conse ffffffffffffff', 1, 'en'),
(3, '2023-02-14 21:48:38', '2023-02-14 21:48:38', 'Provident consequat aaaa', 'Officia et nobis exe aaaaa', 2, 'ar'),
(4, '2023-02-14 21:48:38', '2023-02-14 21:48:38', 'Neque corporis autem eeee', 'Laborum Id non ips eeee', 2, 'en'),
(5, '2023-02-14 21:49:36', '2023-02-14 21:49:36', 'Consectetur asperio fffffffffffffff', 'Ad autem qui sequi v fffffffffffffffff', 3, 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `video_link` varchar(255) NOT NULL,
  `color_icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `video_link`, `color_icon`) VALUES
(1, '2023-02-19 20:08:54', '2023-02-19 20:11:47', 1, 1, 'http://127.0.0.1:8000/admin/products/creategggg', '#d68f8f'),
(2, '2023-02-20 18:51:26', '2023-02-20 18:51:34', 1, 1, 'Sit est natus nesciu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `second_title` text NOT NULL,
  `setting_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `created_at`, `updated_at`, `title`, `second_title`, `setting_id`, `locale`) VALUES
(1, '2023-02-19 20:08:54', '2023-02-19 20:11:51', 'Officia fugiat conse  ar qqqq', 'rdgdfsgsdfg dsfgdfgsdfgs', 1, 'ar'),
(2, '2023-02-19 20:08:54', '2023-02-19 20:11:47', 'gdsfgdfgdsfgdsf555555gdfggdsfgsdfg cccc', 'dfgdfgsdfgdsfgsgfhfsghfsghsf', 1, 'en'),
(3, '2023-02-20 18:51:26', '2023-02-20 18:51:34', 'Nesciunt ex maiores', 'Voluptatem rem neces rrrrrrr', 2, 'ar'),
(4, '2023-02-20 18:51:26', '2023-02-20 18:51:26', 'Similique inventore', 'Nemo ducimus sed du', 2, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `link` varchar(800) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `title`, `image`, `description`, `link`, `is_activate`) VALUES
(2, '2023-01-21 12:22:50', '2023-01-21 14:12:48', 'dfsdfsd sdfsdfsdf sdfsddfsdf 80000', 'admin/assets/images/sliders/167431756823503.jpg', 'Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te Distinctio Natus te 7546', 'http://127.0.0.1:8000/admin/products/create/88888', 1),
(4, '2023-01-28 21:23:23', '2023-01-28 21:38:04', NULL, 'admin/assets/images/sliders/167494908481843.png', NULL, 'Ipsam elit sed aut', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1200) NOT NULL,
  `description` text NOT NULL,
  `slider_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `created_at`, `updated_at`, `title`, `description`, `slider_id`, `locale`) VALUES
(5, '2023-01-28 20:11:15', '2023-01-28 20:21:17', 'Est hic aut asperna arrrrrr', 'Est unde aut ut exc arrrrrrrr', 2, 'ar'),
(6, '2023-01-28 20:11:15', '2023-01-28 20:21:28', 'Aute quia laborum N ennnn', 'Illo voluptates quo ennnn', 2, 'en'),
(14, '2023-01-28 21:23:23', '2023-01-28 21:37:03', 'Dolor suscipit non s arrr', 'Magna ea non molesti ar', 4, 'ar'),
(15, '2023-01-28 21:23:23', '2023-01-28 21:37:11', 'Corrupti cillum qui ennnn', 'Cupidatat eos in qui en', 4, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` varchar(255) NOT NULL,
  `time_started` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `image`, `instructor`, `date_from`, `date_to`, `days`, `time_started`, `cost`, `is_activate`) VALUES
(2, '2023-02-14 23:02:50', '2023-02-14 23:02:50', 1, NULL, 'admin/assets/images/trainings/167642297052948.jpg', 'Ut rerum quo dolor v', '2023-01-13', '2023-06-16', '', '', 0, 1),
(5, '2023-02-14 23:15:19', '2023-02-14 23:15:19', 1, NULL, 'admin/assets/images/trainings/167642371928063.jpg', 'Voluptatem dolor imp', '1993-06-06', '1988-08-09', '', '', 47, 1),
(7, '2023-02-20 17:50:15', '2023-02-20 17:50:40', 1, 1, 'admin/assets/images/trainings/167692261552018.jpg', 'Eaque aperiam et nat', '2017-05-20', '2018-06-28', '', '', 60, 1),
(8, '2023-02-20 17:51:18', '2023-02-20 17:51:18', 1, NULL, 'admin/assets/images/trainings/167692267848171.jpg', 'Aut animi rerum sus', '2011-10-02', '1997-07-11', '', '', 76, 1),
(9, '2023-02-20 17:52:07', '2023-02-20 17:52:07', 1, NULL, 'admin/assets/images/trainings/167692272779149.jpg', 'Praesentium quia sit', '2005-09-12', '1974-07-26', '', '', 26, 1),
(10, '2023-02-20 18:16:00', '2023-02-20 18:17:21', 1, 1, 'admin/assets/images/trainings/167692416015775.jpg', 'Quis voluptatem sed', '2016-12-31', '1990-02-03', '4 days', '10:00 am', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_translations`
--

CREATE TABLE `training_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(1200) DEFAULT NULL,
  `description` text NOT NULL,
  `training_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_translations`
--

INSERT INTO `training_translations` (`id`, `created_at`, `updated_at`, `name`, `title`, `description`, `training_id`, `locale`) VALUES
(1, '2023-02-14 23:02:50', '2023-02-14 23:02:50', 'Cody Cobb', 'Aute est rerum nihi', 'Cum corporis quisqua', 2, 'ar'),
(2, '2023-02-14 23:02:50', '2023-02-14 23:02:50', 'Keegan Fletcher', 'Itaque tempora dicta', 'Adipisci tenetur et', 2, 'en'),
(3, '2023-02-14 23:03:22', '2023-02-14 23:03:44', 'Quynn Vasquez 2000000', 'Fuga Autem sit sit', 'Quo ut porro eum ex', 3, 'ar'),
(4, '2023-02-14 23:03:23', '2023-02-14 23:03:52', 'Naomi Vaughan', 'Quia est repellendus 200000', 'In autem recusandae', 3, 'en'),
(7, '2023-02-14 23:15:19', '2023-02-14 23:15:19', 'Ian Strickland', 'Deleniti dolor aliqu', 'Non voluptas mollit', 5, 'ar'),
(8, '2023-02-14 23:15:19', '2023-02-14 23:15:19', 'Alfonso Freeman', 'Deserunt delectus l', 'Nulla dolores in omn', 5, 'en'),
(11, '2023-02-20 17:50:15', '2023-02-20 17:50:40', 'Yoshi Gibbs', NULL, 'Esse est veniam sed dddd', 7, 'ar'),
(12, '2023-02-20 17:51:18', '2023-02-20 17:51:18', 'aaaaaaaaaaaaaaaaaaa', NULL, 'Soluta enim odio mag', 8, 'ar'),
(13, '2023-02-20 17:52:07', '2023-02-20 17:52:07', 'sssssssssssssss', NULL, 'Nihil molestiae omni', 9, 'ar'),
(14, '2023-02-20 17:52:08', '2023-02-20 17:52:08', 'cccccccccccccccccccccccc', NULL, 'Voluptatibus amet q', 9, 'en'),
(15, '2023-02-20 18:16:00', '2023-02-20 18:16:00', 'Autumn Dickson', NULL, 'Ad debitis culpa mo', 10, 'ar'),
(16, '2023-02-20 18:16:00', '2023-02-20 18:16:00', 'Kibo Coffey', NULL, 'Quos et sit qui unde', 10, 'en');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activate` int(11) NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_activate`, `phone`) VALUES
(1, 'Amr', 'amr@gmail.com', NULL, '$2y$10$Xq8ADLhKkmlieIdBuR7SsOQlFw00Q3T6fAhh1Xq1UYW/LvJebuGwi', NULL, '2022-01-11 18:21:27', '2022-02-04 13:51:31', 1, '+1 (101) 423-8421'),
(4, 'Jocelyn Schneider', 'nufete@mailinator.com', NULL, '$2y$10$H/RRm0/a5m8LYM7wJY8Dju37MDzZNN/b3MGEFkvUj/hS87apihXCu', NULL, '2022-01-11 18:23:28', '2022-01-11 18:23:39', 1, '+1 (511) 741-8922'),
(5, 'rose', 'rose@gmail.com', NULL, '$2y$10$Vi8dz3e8oJrWM3.L1ZjGweJKTcfutWpg3Qbyo9u9LmcSKhDBSzOD2', NULL, '2022-01-18 13:16:14', '2022-01-18 13:16:14', 1, '123'),
(6, 'sss', 'sss@gmail.com', NULL, '$2y$10$CU25s8DoIMtaYcXjMS0qq.FnbyaLmqtLKaM0d1kGSKAaxty3sx7pm', NULL, '2022-01-18 13:38:34', '2022-06-09 08:58:47', 1, '3333'),
(7, 'Hilda Wilkinson', 'kutub@mailinator.com', NULL, '$2y$10$Me0autzw2Teok8BEd6KeVujVORfctSsrke7ZCmn1iGDaeOQnqScl2', NULL, '2022-06-09 08:58:56', '2022-06-09 08:58:56', 1, '+1 (945) 339-9211'),
(8, 'amr', 'amr00@gmail.com', NULL, '$2y$10$..C5l/OiQMG7bhLFn881weNtDYlhc85YyESzz91W/DzxU2Y5QVc32', NULL, '2022-06-14 21:22:30', '2022-06-14 21:22:30', 1, '0111111111'),
(9, 'محمد', 'mohmad12@hotmail.com', NULL, '$2y$10$zT1X8K.tqp2ckyue2zq6ge.mRpWNrgu0cUi1c11.fXcXU9JWFg8p6', NULL, '2022-06-27 13:43:11', '2022-06-27 13:43:11', 1, '0549947650'),
(10, 'Mohamed', 'mohamed@hotmail.com', NULL, '$2y$10$DRA0lZLDihgva5463vojg.XHSk56aVVKOy9zxWcDUF6aso46mDCgi', NULL, '2022-06-27 17:49:41', '2022-06-27 17:49:41', 1, '654321');

-- --------------------------------------------------------

--
-- Table structure for table `webinars`
--

CREATE TABLE `webinars` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_started` varchar(255) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinars`
--

INSERT INTO `webinars` (`id`, `created_at`, `updated_at`, `added_by`, `edited_by`, `image`, `date`, `time_started`, `hours`, `cost`, `is_activate`) VALUES
(1, '2023-02-14 19:44:11', '2023-02-14 19:44:11', 1, NULL, 'admin/assets/images/webinars/167641105170544.jpg', '2023-02-14', '1:00 am', '4 hours', 0, 1),
(2, '2023-02-14 19:45:04', '2023-02-14 20:20:32', 1, 1, 'admin/assets/images/webinars/167641323217347.jpg', '2023-02-16', '12:00 am', '5 hours', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webinar_translations`
--

CREATE TABLE `webinar_translations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(1200) NOT NULL,
  `description` text NOT NULL,
  `webinar_id` int(11) NOT NULL,
  `locale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar_translations`
--

INSERT INTO `webinar_translations` (`id`, `created_at`, `updated_at`, `name`, `title`, `description`, `webinar_id`, `locale`) VALUES
(1, '2023-02-14 19:44:11', '2023-02-14 19:44:11', 'Judith Santana ar', 'Velit voluptate cill ar', 'Enim repudiandae off ar', 1, 'ar'),
(2, '2023-02-14 19:44:11', '2023-02-14 19:44:11', 'Raya Coleman en', 'Aliquid in consequat en', 'Cum qui impedit dui en', 1, 'en'),
(3, '2023-02-14 19:45:04', '2023-02-14 19:46:09', 'aaaar 500', 'Officia fugiat conse  ar', 'asdsadasdasdas', 2, 'ar'),
(4, '2023-02-14 19:45:04', '2023-02-14 19:46:16', 'Gisela Mayo', 'Facilis odit qui vol 500', 'Sed magna vitae quia', 2, 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_section_translations`
--
ALTER TABLE `about_section_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_us`
--
ALTER TABLE `contacts_us`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_route_name_unique` (`name`,`route_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sections`
--
ALTER TABLE `product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_section_translations`
--
ALTER TABLE `product_section_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_translations`
--
ALTER TABLE `training_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinars`
--
ALTER TABLE `webinars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinar_translations`
--
ALTER TABLE `webinar_translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_section_translations`
--
ALTER TABLE `about_section_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts_us`
--
ALTER TABLE `contacts_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_sections`
--
ALTER TABLE `product_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_section_translations`
--
ALTER TABLE `product_section_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_translations`
--
ALTER TABLE `service_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training_translations`
--
ALTER TABLE `training_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `webinars`
--
ALTER TABLE `webinars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webinar_translations`
--
ALTER TABLE `webinar_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
