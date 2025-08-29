-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2025 at 11:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `favicon_path` varchar(255) DEFAULT NULL,
  `background_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `text_color` varchar(7) NOT NULL DEFAULT '#000000',
  `font_style` varchar(50) NOT NULL DEFAULT 'Arial, sans-serif',
  `sidebar_background_color` varchar(7) NOT NULL DEFAULT '#1f2937',
  `sidebar_text_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `sidebar_font_size` varchar(8) NOT NULL DEFAULT '14px',
  `sidebar_font_weight` varchar(10) NOT NULL DEFAULT 'normal',
  `sidebar_line_height` varchar(5) NOT NULL DEFAULT '1.5',
  `sidebar_border` text NOT NULL DEFAULT '0px',
  `sidebar_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `sidebar_box_shadow` text NOT NULL DEFAULT 'none',
  `sidebar_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `sidebar_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `paragraph_font_size` varchar(8) NOT NULL DEFAULT '16px',
  `paragraph_font_color` varchar(7) NOT NULL DEFAULT '#374151',
  `paragraph_font_hover_color` varchar(7) NOT NULL DEFAULT '#1f2937',
  `paragraph_font_weight` varchar(10) NOT NULL DEFAULT 'normal',
  `paragraph_line_height` varchar(5) NOT NULL DEFAULT '1.6',
  `paragraph_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `paragraph_border` text NOT NULL DEFAULT '0px',
  `paragraph_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `paragraph_box_shadow` text NOT NULL DEFAULT 'none',
  `paragraph_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `paragraph_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `anchor_font_size` varchar(8) NOT NULL DEFAULT '16px',
  `anchor_font_color` varchar(7) NOT NULL DEFAULT '#3b82f6',
  `anchor_font_hover_color` varchar(7) NOT NULL DEFAULT '#1d4ed8',
  `anchor_font_weight` varchar(10) NOT NULL DEFAULT 'normal',
  `anchor_line_height` varchar(5) NOT NULL DEFAULT '1.5',
  `anchor_background_color` varchar(7) NOT NULL DEFAULT '#3b82f6',
  `anchor_border` text NOT NULL DEFAULT '0px',
  `anchor_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `anchor_box_shadow` text NOT NULL DEFAULT 'none',
  `anchor_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `anchor_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h1_font_size` varchar(8) NOT NULL DEFAULT '32px',
  `h1_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h1_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h1_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h1_line_height` varchar(5) NOT NULL DEFAULT '1.2',
  `h1_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h1_border` text NOT NULL DEFAULT '0px',
  `h1_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h1_box_shadow` text NOT NULL DEFAULT 'none',
  `h1_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h1_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h2_font_size` varchar(8) NOT NULL DEFAULT '28px',
  `h2_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h2_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h2_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h2_line_height` varchar(5) NOT NULL DEFAULT '1.3',
  `h2_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h2_border` text NOT NULL DEFAULT '0px',
  `h2_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h2_box_shadow` text NOT NULL DEFAULT 'none',
  `h2_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h2_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h3_font_size` varchar(8) NOT NULL DEFAULT '24px',
  `h3_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h3_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h3_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h3_line_height` varchar(5) NOT NULL DEFAULT '1.4',
  `h3_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h3_border` text NOT NULL DEFAULT '0px',
  `h3_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h3_box_shadow` text NOT NULL DEFAULT 'none',
  `h3_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h3_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h4_font_size` varchar(8) NOT NULL DEFAULT '20px',
  `h4_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h4_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h4_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h4_line_height` varchar(5) NOT NULL DEFAULT '1.4',
  `h4_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h4_border` text NOT NULL DEFAULT '0px',
  `h4_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h4_box_shadow` text NOT NULL DEFAULT 'none',
  `h4_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h4_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h5_font_size` varchar(8) NOT NULL DEFAULT '18px',
  `h5_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h5_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h5_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h5_line_height` varchar(5) NOT NULL DEFAULT '1.4',
  `h5_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h5_border` text NOT NULL DEFAULT '0px',
  `h5_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h5_box_shadow` text NOT NULL DEFAULT 'none',
  `h5_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h5_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h6_font_size` varchar(8) NOT NULL DEFAULT '16px',
  `h6_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `h6_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `h6_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `h6_line_height` varchar(5) NOT NULL DEFAULT '1.4',
  `h6_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `h6_border` text NOT NULL DEFAULT '0px',
  `h6_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `h6_box_shadow` text NOT NULL DEFAULT 'none',
  `h6_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `h6_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `tr_font_size` varchar(8) NOT NULL DEFAULT '14px',
  `tr_font_color` varchar(7) NOT NULL DEFAULT '#374151',
  `tr_font_hover_color` varchar(7) NOT NULL DEFAULT '#111827',
  `tr_font_weight` varchar(10) NOT NULL DEFAULT 'normal',
  `tr_line_height` varchar(5) NOT NULL DEFAULT '1.5',
  `tr_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `tr_border` text NOT NULL DEFAULT '0px',
  `tr_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `tr_box_shadow` text NOT NULL DEFAULT 'none',
  `tr_padding` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `tr_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `th_font_size` varchar(8) NOT NULL DEFAULT '14px',
  `th_font_color` varchar(7) NOT NULL DEFAULT '#111827',
  `th_font_hover_color` varchar(7) NOT NULL DEFAULT '#000000',
  `th_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `th_line_height` varchar(5) NOT NULL DEFAULT '1.5',
  `th_background_color` varchar(7) NOT NULL DEFAULT '#f9fafb',
  `th_border` text NOT NULL DEFAULT '1px solid #e5e7eb',
  `th_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `th_box_shadow` text NOT NULL DEFAULT 'none',
  `th_padding` text NOT NULL DEFAULT '12px 16px',
  `th_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `td_font_size` varchar(8) NOT NULL DEFAULT '14px',
  `td_font_color` varchar(7) NOT NULL DEFAULT '#374151',
  `td_font_hover_color` varchar(7) NOT NULL DEFAULT '#111827',
  `td_font_weight` varchar(10) NOT NULL DEFAULT 'normal',
  `td_line_height` varchar(5) NOT NULL DEFAULT '1.5',
  `td_background_color` varchar(12) NOT NULL DEFAULT 'transparent',
  `td_border` text NOT NULL DEFAULT '1px solid #e5e7eb',
  `td_border_radius` varchar(8) NOT NULL DEFAULT '0px',
  `td_box_shadow` text NOT NULL DEFAULT 'none',
  `td_padding` text NOT NULL DEFAULT '12px 16px',
  `td_margin` text NOT NULL DEFAULT '0px 0px 0px 0px',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `footer_text_color` varchar(255) DEFAULT NULL,
  `footer_background_color` varchar(255) DEFAULT NULL,
  `footer_font_size` varchar(255) DEFAULT NULL,
  `footer_font_weight` varchar(255) DEFAULT NULL,
  `footer_line_height` varchar(255) DEFAULT NULL,
  `footer_border` varchar(255) DEFAULT NULL,
  `footer_border_radius` varchar(255) DEFAULT NULL,
  `footer_padding` varchar(255) DEFAULT NULL,
  `footer_margin` varchar(255) DEFAULT NULL,
  `footer_font_color` varchar(7) DEFAULT '#6b7280',
  `footer_font_hover_color` varchar(7) DEFAULT '#374151',
  `footer_box_shadow` text DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `logo_path`, `favicon_path`, `background_color`, `text_color`, `font_style`, `sidebar_background_color`, `sidebar_text_color`, `sidebar_font_size`, `sidebar_font_weight`, `sidebar_line_height`, `sidebar_border`, `sidebar_border_radius`, `sidebar_box_shadow`, `sidebar_padding`, `sidebar_margin`, `paragraph_font_size`, `paragraph_font_color`, `paragraph_font_hover_color`, `paragraph_font_weight`, `paragraph_line_height`, `paragraph_background_color`, `paragraph_border`, `paragraph_border_radius`, `paragraph_box_shadow`, `paragraph_padding`, `paragraph_margin`, `anchor_font_size`, `anchor_font_color`, `anchor_font_hover_color`, `anchor_font_weight`, `anchor_line_height`, `anchor_background_color`, `anchor_border`, `anchor_border_radius`, `anchor_box_shadow`, `anchor_padding`, `anchor_margin`, `h1_font_size`, `h1_font_color`, `h1_font_hover_color`, `h1_font_weight`, `h1_line_height`, `h1_background_color`, `h1_border`, `h1_border_radius`, `h1_box_shadow`, `h1_padding`, `h1_margin`, `h2_font_size`, `h2_font_color`, `h2_font_hover_color`, `h2_font_weight`, `h2_line_height`, `h2_background_color`, `h2_border`, `h2_border_radius`, `h2_box_shadow`, `h2_padding`, `h2_margin`, `h3_font_size`, `h3_font_color`, `h3_font_hover_color`, `h3_font_weight`, `h3_line_height`, `h3_background_color`, `h3_border`, `h3_border_radius`, `h3_box_shadow`, `h3_padding`, `h3_margin`, `h4_font_size`, `h4_font_color`, `h4_font_hover_color`, `h4_font_weight`, `h4_line_height`, `h4_background_color`, `h4_border`, `h4_border_radius`, `h4_box_shadow`, `h4_padding`, `h4_margin`, `h5_font_size`, `h5_font_color`, `h5_font_hover_color`, `h5_font_weight`, `h5_line_height`, `h5_background_color`, `h5_border`, `h5_border_radius`, `h5_box_shadow`, `h5_padding`, `h5_margin`, `h6_font_size`, `h6_font_color`, `h6_font_hover_color`, `h6_font_weight`, `h6_line_height`, `h6_background_color`, `h6_border`, `h6_border_radius`, `h6_box_shadow`, `h6_padding`, `h6_margin`, `tr_font_size`, `tr_font_color`, `tr_font_hover_color`, `tr_font_weight`, `tr_line_height`, `tr_background_color`, `tr_border`, `tr_border_radius`, `tr_box_shadow`, `tr_padding`, `tr_margin`, `th_font_size`, `th_font_color`, `th_font_hover_color`, `th_font_weight`, `th_line_height`, `th_background_color`, `th_border`, `th_border_radius`, `th_box_shadow`, `th_padding`, `th_margin`, `td_font_size`, `td_font_color`, `td_font_hover_color`, `td_font_weight`, `td_line_height`, `td_background_color`, `td_border`, `td_border_radius`, `td_box_shadow`, `td_padding`, `td_margin`, `created_at`, `updated_at`, `footer_text`, `footer_text_color`, `footer_background_color`, `footer_font_size`, `footer_font_weight`, `footer_line_height`, `footer_border`, `footer_border_radius`, `footer_padding`, `footer_margin`, `footer_font_color`, `footer_font_hover_color`, `footer_box_shadow`) VALUES
(2, 'configurations/F5LExpjSJqmxlDkg1Org1exRKg3qHNoVCMFuTKsD.png', 'configurations/8ska6GBL61qQx0c1I9rkWPgdbufDzeTn1tGzf45E.png', '#ffffff', '#000000', 'Arial, sans-serif', '#f2f2f2', '#000000', '14px', 'normal', '1.5', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '16px', '#6b6b6b', '#000000', 'normal', '1.6', '#ffffff', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '16px', '#6b6b6b', '#000000', 'normal', '1.5', '#f2f2f2', '1px', '5px', 'none', '10px 10px 10px 10px', '0px 0px 0px 0px', '32px', '#111827', '#000000', 'bold', '1.2', '#000000', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '28px', '#111827', '#000000', 'bold', '1.3', '#f2f2f2', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '24px', '#111827', '#000000', 'bold', '1.4', '#f2f2f2', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '20px', '#111827', '#000000', 'bold', '1.4', '#f2f2f2', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '18px', '#111827', '#000000', 'bold', '1.4', '#f2f2f2', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '16px', '#111827', '#000000', 'bold', '1.4', '#f2f2f2', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '14px', '#374151', '#111827', 'normal', '1.5', '#000000', '0px', '0px', 'none', '0px 0px 0px 0px', '0px 0px 0px 0px', '14px', '#111827', '#000000', 'bold', '1.5', '#f9fafb', '1px solid #e5e7eb', '0px', 'none', '12px 16px', '0px 0px 0px 0px', '14px', '#374151', '#111827', 'normal', '1.5', '#ffffff', '1px solid #e5e7eb', '0px', 'none', '12px 16px', '0px 0px 0px 0px', '2025-08-29 01:31:28', '2025-08-29 03:53:56', '© 2025 Your Company. All rights reserved.', '#6b7280', '#f2f2f2', '14px', 'normal', '1.5', '0px', '0px', '10px 0px 10px 0px', '0px 0px 0px 0px', '#6b6b6b', '#000000', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_forms`
--

CREATE TABLE `master_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` enum('1','2','3') NOT NULL COMMENT '1-male, 2-female, 3-other',
  `single_selection` bigint(20) UNSIGNED DEFAULT NULL,
  `multi_selection` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`multi_selection`)),
  `image_path` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `languages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`languages`)),
  `password` varchar(255) NOT NULL,
  `date_field` date DEFAULT NULL,
  `time_field` time DEFAULT NULL,
  `datetime_field` datetime DEFAULT NULL,
  `date_range_start` date DEFAULT NULL,
  `date_range_end` date DEFAULT NULL,
  `range_slider_value` int(11) NOT NULL DEFAULT 50,
  `address` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `text_editor` longtext DEFAULT NULL,
  `star_rating` int(11) NOT NULL DEFAULT 0,
  `captcha` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_forms`
--

INSERT INTO `master_forms` (`id`, `full_name`, `email`, `phone_number`, `gender`, `single_selection`, `multi_selection`, `image_path`, `video_path`, `languages`, `password`, `date_field`, `time_field`, `datetime_field`, `date_range_start`, `date_range_end`, `range_slider_value`, `address`, `signature`, `text_editor`, `star_rating`, `captcha`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Jaquelin Kunde', 'freeman.padberg@example.org', '+1.229.712.8307', '1', NULL, '[2]', NULL, NULL, '[\"Gujarati\",\"English\",\"Hindi\"]', '$2y$12$8No4q22MRWi6VOBCGGgYnuDutl1uVUDZD7xI3AdFEH2ozPuTBcO0i', NULL, '06:30:04', '2015-02-09 03:41:10', NULL, NULL, 11, '7243 Schmitt Squares\nCadehaven, MD 88833-0287', NULL, NULL, 5, NULL, 0, '2025-08-29 01:32:31', '2025-08-29 02:08:00'),
(2, 'Aron Gerhold', 'lina68@example.net', '+1-820-385-5545', '3', NULL, NULL, NULL, NULL, '[\"English\",\"Gujarati\",\"Hindi\"]', '$2y$12$XHlK73ALKGeUYZ2suxYJ7eD2blkXCvd7lxEbBODsFaMOEsJoWHUFC', '2014-06-26', '21:24:17', NULL, '1991-06-04', NULL, 84, '1426 Verdie Ranch\nPort Marceloside, CO 70515', NULL, NULL, 4, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(3, 'Taya Jaskolski', 'tbahringer@example.net', '1-720-780-8959', '2', NULL, '[5]', NULL, NULL, '[\"Gujarati\"]', '$2y$12$3gur8kFKtYngz4OubMVIg.mgqV3MGrhKgAUYMmXAcMUyaI4egpzQO', NULL, NULL, '1998-11-25 17:54:27', '1977-05-23', '2000-05-01', 21, NULL, NULL, 'Quia impedit vel velit autem ex omnis. Et nulla exercitationem minima in. Itaque dolor culpa quo impedit velit quam alias sit.\n\nIure repudiandae ut sequi necessitatibus. Doloremque et eligendi quia ut. Repudiandae qui sed voluptas dignissimos.\n\nQuod et inventore libero est incidunt est. Ex qui similique sed et eos dicta quos. Odio error ex odit voluptas. Quo voluptatem ut tempora consequuntur ipsa.', 4, 'NZ2U77', 0, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(4, 'Alicia Bradtke', 'harris.brandi@example.org', '+13467146468', '3', 2, NULL, NULL, NULL, '[\"Hindi\",\"English\"]', '$2y$12$KCEyAbxEYnkS2cQBkGz.P.3rsfWGB/f5daJuoxo9meqHwh9sDDOBe', '1976-12-26', NULL, NULL, '1988-06-10', NULL, 62, NULL, NULL, 'Voluptatem et dolorum aliquam cumque. Ab qui deserunt non. Est autem aliquam non quia quam temporibus.\n\nDolorem ad quos at. Dolores et dolores ratione impedit natus. Aliquam id est eos et amet nisi et maxime. Et quam nisi dolor neque est.\n\nUt vitae aspernatur nam sed dignissimos et voluptates soluta. Debitis est repudiandae ut suscipit accusantium autem. Eaque aspernatur culpa hic recusandae et provident minima.', 4, 'YQ89JD', 0, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(5, 'Hanna Ullrich', 'terrell08@example.com', '732.658.1852', '3', 3, NULL, NULL, NULL, '[\"Gujarati\",\"English\"]', '$2y$12$pui.dVLHebXYc.DX0I4PruNVZu.iQCg24ScVxJsaxYPoNqffs5ZyC', NULL, NULL, '1981-10-24 14:10:14', NULL, NULL, 33, NULL, NULL, 'Similique sit ad reiciendis fuga provident. Hic non distinctio sequi qui et ab. Optio debitis qui quia dolorem. Autem pariatur sunt velit. Ab unde occaecati odit ipsam.\n\nAdipisci nihil assumenda unde distinctio ipsa voluptatem. Et rerum autem voluptas dolores illo sit. Odit placeat nihil fugiat voluptas nam quas quia. Dicta a molestias odit in soluta.\n\nExplicabo dicta debitis excepturi nihil ut. Est molestiae vitae dicta animi dolor omnis fugiat ut. Quidem eum quae eum harum vitae ut.', 2, 'IMXZ72', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(6, 'Wilmer Jaskolski', 'gudrun.baumbach@example.net', '+16197448230', '3', 3, '[4,1]', NULL, NULL, '[\"English\",\"Gujarati\"]', '$2y$12$4do1WjuNupdMXJ41pedW.exTTCSLUhmN2pUDvruDy89WpmDZlzoca', '2009-08-17', NULL, '1997-02-19 01:49:27', '1996-02-14', '1999-09-06', 51, '5575 Abernathy Viaduct\nHillmouth, VT 62749-2426', NULL, NULL, 0, 'N0ZN8V', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(7, 'Tyra Mayert', 'ikeeling@example.net', '+1.480.281.5236', '1', 5, NULL, NULL, NULL, '[\"English\"]', '$2y$12$kAnfGVNUd9L0a1rV5/cR9uxaWBzOkoaqZd7W0Jwn.IQC8tsW6CM.O', NULL, '18:30:09', '2018-07-10 09:03:18', '2024-10-27', NULL, 14, '78916 Mylene Cove\nJamesonport, AK 36935', NULL, 'Voluptas pariatur at saepe perferendis quis. Voluptatem a possimus id aperiam accusantium. Eligendi accusantium vero cum consequatur. Alias accusantium cupiditate sed animi.\n\nDoloremque aut iure inventore commodi illum repudiandae molestiae. Et asperiores doloribus nulla doloribus itaque. Nobis voluptates pariatur sit recusandae eum laudantium et.\n\nEt et unde repellat perferendis ut beatae quas. Eaque quaerat ratione iste deleniti illo et aliquam ut. Culpa praesentium et molestiae.', 3, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(8, 'Marcos Upton', 'pstanton@example.net', '+14106753642', '3', 1, '[2,5,4]', NULL, NULL, '[\"Hindi\",\"English\"]', '$2y$12$jMaX0QZI.HJGkSSr5/sCCO2mEmBRrkOA9BsQ58w6ITvFC9O8mlTWW', NULL, NULL, NULL, '1995-08-14', '1982-04-09', 23, '93019 Lesley Burgs Suite 761\nPort Javonte, WY 34132', NULL, 'Molestiae at cumque sed voluptas dolore molestias tenetur. Sit aut sed quas sit quia. Et suscipit assumenda quasi saepe et rem. Possimus quidem mollitia ratione est reprehenderit.\n\nNon recusandae ducimus et quo vero velit aut tempora. Enim harum quia quia aut molestias. Magni sit quaerat ipsa atque unde deserunt.\n\nDoloremque laboriosam quam eligendi. Inventore tempore aut rem porro fugit.', 0, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(9, 'Miss Maci Jerde', 'wolf.ceasar@example.net', '+1.346.917.6734', '2', NULL, NULL, NULL, NULL, '[\"Gujarati\"]', '$2y$12$fxeHWQ42.9uUSnZ0v/XDwuNxldIfMWJmpdgDHSmlY2yZLG1CFNlv.', '2014-10-12', NULL, '2001-06-26 04:46:06', '1988-03-08', '1999-05-14', 66, NULL, NULL, NULL, 3, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(10, 'Larissa Kreiger', 'lconnelly@example.com', '+1.712.699.0320', '3', 1, NULL, NULL, NULL, NULL, '$2y$12$elSoIx0IxvkXuOSrjKa.T.dvUqrT218.1kpdMSTwCfRdKzU.XFt46', '1993-12-12', NULL, '1971-02-09 18:27:35', NULL, NULL, 83, NULL, NULL, 'Veritatis facilis beatae fuga dolor laborum magni vero. Non aut reiciendis consequatur aperiam. Voluptatibus qui nam autem nam. Optio harum et ratione.\n\nIure est facere saepe quis. Sed quam iure nostrum. Porro velit quidem fuga porro perferendis. Ipsa rerum adipisci ut quas voluptas ut rerum. Saepe architecto nam quae aut tempore adipisci.\n\nRem culpa sit modi fuga non iusto. Cum aut et est vel totam. Sed quibusdam odit occaecati aut ipsum nesciunt.', 5, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(11, 'Dr. Orlando Conn Sr.', 'lue.langosh@example.com', '+1.689.416.5684', '1', NULL, '[5,1]', NULL, NULL, '[\"Gujarati\"]', '$2y$12$CleYMXLkxLYvgOyNGpHJHuQLbb4DkODmdI2Yf94k4TiHAuMXVTm2W', NULL, NULL, NULL, NULL, '2012-06-15', 37, NULL, NULL, NULL, 5, 'QSK1T7', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(12, 'Genesis Funk', 'jordan.robel@example.com', '1-361-501-0999', '3', NULL, NULL, NULL, NULL, '[\"Gujarati\",\"Hindi\",\"English\"]', '$2y$12$JmN3Wi6wOKnNGt6ezOW/cOeH8I/ocQWBsnEJr.VN0zht9NoDnYgoK', '2019-03-03', '11:30:26', '2025-04-02 04:18:51', NULL, NULL, 14, '361 Raynor Ridge Apt. 000\nMelliestad, SD 27947-1954', NULL, 'Praesentium et qui nisi ut illo assumenda dolorem. Explicabo vero eum ut voluptatem quo. Alias nemo rerum nesciunt accusamus dolore architecto magnam. Hic molestiae qui aut rerum eos laboriosam.\n\nMolestias sed corrupti autem quia. Molestiae optio quis quos repellendus earum molestiae corrupti impedit. Temporibus corporis voluptatem qui voluptates ipsum sint beatae. Non nostrum mollitia id iste occaecati assumenda. Rerum eveniet est maiores aut autem.\n\nDucimus corporis quia delectus in et possimus repellendus vitae. Voluptas quam mollitia laborum mollitia eos. Necessitatibus amet deserunt vitae omnis ducimus modi.', 4, NULL, 0, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(13, 'Bonita Davis', 'wrolfson@example.org', '1-351-453-4931', '1', 3, '[2]', NULL, NULL, NULL, '$2y$12$GpITixX9u8GQZ3VOS6qr..ohep12K51FIi.KpdBkSXE01UlIUZHVW', '1976-06-05', '00:38:47', '1978-06-08 14:20:48', '2023-12-08', '1970-10-26', 80, NULL, NULL, 'Aliquam molestiae magni illum laborum ea voluptatum. Ad eum maiores quibusdam non tenetur esse dolor. Minima animi vel quos sapiente dolores.\n\nExcepturi et possimus dolor. Minus distinctio quisquam officiis aut necessitatibus. Quia rerum hic nam consequatur aut non adipisci. Voluptas quos soluta aut voluptatibus ab sint.\n\nAliquam aliquam id blanditiis reiciendis facilis. Soluta qui aut eaque. Neque quia enim nihil tempore impedit quia aut. Dolore fuga sed a commodi est at voluptas.', 4, 'FNXNJ3', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(14, 'Heath Heller II', 'mavis.brekke@example.com', '+1.331.322.5173', '3', 2, '[3,2]', NULL, NULL, '[\"English\",\"Hindi\"]', '$2y$12$yaRon1YI./9jzEohVZMLceqlptFJhWyEzPUoVA6H817Ik2JIpWVhS', NULL, '00:28:13', NULL, NULL, NULL, 12, NULL, NULL, 'Ducimus blanditiis doloribus ea quia atque aut repudiandae. Atque molestias repudiandae corrupti animi deleniti alias. Voluptate dolorem autem consectetur quis et voluptatibus est. Nihil est at necessitatibus et quidem.\n\nVoluptatem beatae aspernatur maxime aut vero vel. Odio veritatis quam voluptatum harum sint commodi. Quia cupiditate magni ullam rerum.\n\nConsequatur placeat harum aut non eum est nulla. Fuga consectetur saepe qui autem maxime ad id aut. Sapiente pariatur amet odio harum. Velit atque consequatur odio ut.', 1, 'MNOGUD', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(15, 'Prof. Sedrick O\'Connell Jr.', 'ullrich.eldon@example.org', '+1-240-787-2348', '3', NULL, '[1,3,2]', NULL, NULL, NULL, '$2y$12$Pmmk6S9DuFOeX7DcO8OL5.tIs58kYJomsNRkXeZOmowrvBu/uBjnu', '1989-01-18', NULL, NULL, NULL, '1977-01-23', 14, '3306 Helene Causeway Suite 726\nSchulistland, MA 42016', NULL, 'Aliquid inventore sit unde est. Et quaerat eius voluptatem commodi natus. Ex tempore hic est reprehenderit mollitia in adipisci enim.\n\nDeleniti ut distinctio sed sit impedit autem. Aspernatur iusto sit ut voluptatibus in aut. Fugiat laudantium corporis deleniti similique est delectus.\n\nVoluptatem ipsam aut inventore dolor dolor. Eius aut est cupiditate doloremque neque nulla.', 0, '1E6LJX', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(16, 'Prof. Micah Glover', 'edna.kuhlman@example.net', '+14133079092', '1', 5, NULL, NULL, NULL, NULL, '$2y$12$y54u9GXOEb4rtRQ64Xju8.3vOOcKR4.RGiuqGX1/c1SYDrM0pdFP6', '1984-11-28', NULL, '2006-10-01 23:27:22', '1977-09-02', '2015-02-01', 8, '678 Brycen Port\nKrajcikshire, ND 45029-6251', NULL, NULL, 4, 'GYOQS9', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(17, 'Clemens Rolfson', 'cwiza@example.com', '669-538-1694', '2', NULL, NULL, NULL, NULL, '[\"Gujarati\"]', '$2y$12$DMl8vp5JmoYP8aqgFDMU/eH03AcvvSiF3vyfGoE/aEmLebRk2u2.K', '1996-09-12', '04:34:03', NULL, NULL, NULL, 13, '4149 Dibbert Road Suite 602\nEast Darbyberg, TX 05908', NULL, 'Suscipit qui occaecati ut ut iusto deleniti. Laudantium eveniet numquam et assumenda. Repudiandae rem voluptate quaerat dicta et eligendi eaque veniam. Eligendi magnam voluptates quia asperiores ex earum sit.\n\nVoluptas aperiam in maiores expedita repellendus tempora. Cumque magnam omnis earum ullam quasi. Voluptatem iste harum minima a. Exercitationem accusantium consequatur eveniet laudantium nesciunt.\n\nVoluptatem quia doloribus voluptas nisi. Saepe rerum repellendus sunt quas reiciendis atque. Et tempora nam quae et ea. Quisquam harum aut qui earum nobis.', 0, 'XGGMUL', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(18, 'Rebecca Weber', 'wava55@example.org', '+1 (225) 403-1963', '2', 4, '[3]', NULL, NULL, NULL, '$2y$12$Og/pgzze77obz7OpjJA9FOB/fLn2hJ5sQTmrW17Emm32VryoFi7EC', '1973-02-27', NULL, '1985-06-08 02:35:51', NULL, NULL, 68, NULL, NULL, 'Et modi illo debitis enim atque est at. Est ipsa corrupti sint velit voluptates esse rerum. Et delectus dolorum reprehenderit aut. Culpa qui et non eos quam qui dolorem.\n\nCupiditate eveniet aut quidem qui et fugiat. Tempore amet consequuntur repellat consequuntur tempore sed. Possimus dignissimos et vel commodi et. Repellat aut repudiandae illum deserunt optio sed.\n\nImpedit illo excepturi corporis officiis voluptate repellendus aut. Perspiciatis illum velit optio ut sunt atque eum. Quam dolor fugiat et provident delectus tempora.', 5, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(19, 'Dr. Violet Reichel Sr.', 'sigmund27@example.net', '1-380-205-3732', '3', NULL, NULL, NULL, NULL, '[\"Hindi\",\"Gujarati\",\"English\"]', '$2y$12$9ZHmkhHddbkaBCMD/dv3Gux5.KgwxEvDkbU0lnE01nQ4iq4qtnS.6', NULL, NULL, '2013-08-10 10:49:51', '1986-01-24', NULL, 62, '84581 Volkman Brook Suite 938\nWest Alene, IL 48111', NULL, NULL, 3, NULL, 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31'),
(20, 'Andre Fay', 'ruthie.borer@example.net', '1-219-258-5776', '1', 2, '[3,1]', NULL, NULL, NULL, '$2y$12$3UtEmlDkRbi52KRFHfYwMew8K/94dYPhnim9Kojau61crn4hwWwWm', NULL, NULL, '1984-05-27 22:32:23', '2022-04-30', '1998-12-29', 20, NULL, NULL, NULL, 4, '056F3J', 1, '2025-08-29 01:32:31', '2025-08-29 01:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_27_000001_create_roles_table', 1),
(5, '2025_08_27_000002_add_role_id_to_users_table', 1),
(6, '2025_08_27_000003_add_profile_fields_to_users_table', 1),
(7, '2025_08_27_000004_create_permissions_tables', 1),
(8, '2025_08_28_055030_create_master_forms_table', 1),
(9, '2025_08_28_101242_create_configurations_table', 1),
(10, '2025_08_29_061616_add_footer_fields_to_configurations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `module`, `created_at`, `updated_at`) VALUES
(1, 'configuration.view', 'configuration', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(2, 'configuration.edit', 'configuration', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(3, 'roles.view', 'roles', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(4, 'roles.add', 'roles', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(5, 'roles.edit', 'roles', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(6, 'roles.delete', 'roles', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(7, 'roles.status', 'roles', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(8, 'users.view', 'users', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(9, 'users.add', 'users', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(10, 'users.edit', 'users', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(11, 'users.delete', 'users', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(12, 'users.status', 'users', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(13, 'master.view', 'master', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(14, 'master.add', 'master', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(15, 'master.edit', 'master', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(16, 'master.delete', 'master', '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(17, 'master.status', 'master', '2025-08-29 01:32:19', '2025-08-29 01:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, NULL, NULL),
(14, 1, 14, NULL, NULL),
(15, 1, 15, NULL, NULL),
(16, 1, 16, NULL, NULL),
(17, 1, 17, NULL, NULL),
(18, 2, 1, NULL, NULL),
(19, 2, 2, NULL, NULL),
(20, 2, 3, NULL, NULL),
(21, 2, 4, NULL, NULL),
(22, 2, 5, NULL, NULL),
(23, 2, 6, NULL, NULL),
(24, 2, 7, NULL, NULL),
(25, 2, 13, NULL, NULL),
(26, 2, 14, NULL, NULL),
(27, 2, 15, NULL, NULL),
(28, 2, 16, NULL, NULL),
(29, 2, 17, NULL, NULL),
(30, 3, 1, NULL, NULL),
(31, 3, 13, NULL, NULL),
(32, 3, 14, NULL, NULL),
(33, 3, 15, NULL, NULL),
(34, 4, 1, NULL, NULL),
(35, 4, 8, NULL, NULL),
(36, 4, 9, NULL, NULL),
(37, 4, 10, NULL, NULL),
(38, 4, 12, NULL, NULL),
(39, 4, 13, NULL, NULL),
(40, 4, 14, NULL, NULL),
(41, 4, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `icon_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 1, '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(2, 'Manager', 'manager', NULL, 1, '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(3, 'Employee', 'employee', NULL, 1, '2025-08-29 01:32:19', '2025-08-29 01:32:19'),
(4, 'HR', 'hr', NULL, 1, '2025-08-29 01:32:19', '2025-08-29 01:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('v2RhOZlU3acdrvjIyf2OPOdrIWARsTTyN6Lnw8a9', 2, '192.168.0.183', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY2djN25EN1VrOXRxYnZKUVlLa1FBWlN4Ym84dW96dU1uV1hBeWk0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xOTIuMTY4LjAuMTgzOjgwMDAvbWFzdGVyLWZvcm1zL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1756459449);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` tinyint(3) UNSIGNED DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `phone`, `gender`, `date_of_birth`, `icon_path`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(2, 'System', 'Administrator', 'System Administrator', 'admin@example.com', '+1234567890', 1, '1990-01-01', NULL, '123 Admin Street, Admin City, AC 12345', '2025-08-29 01:32:20', '$2y$12$hP24/IAgEPk.10QetzizgeXoXK2sB8fcm9lMrdkR03W1nGuS1.UvK', NULL, '2025-08-29 01:32:20', '2025-08-29 01:32:20', 1),
(3, 'John', 'Manager', 'John Manager', 'manager@example.com', '+1234567891', 1, '1985-05-15', NULL, '456 Manager Avenue, Manager Town, MT 67890', '2025-08-29 01:32:20', '$2y$12$Q14xfNiULv4.epBEYCl7Y.rIDfAPBHPHTYnPMD8ZQjOqqr2q80ZK6', NULL, '2025-08-29 01:32:20', '2025-08-29 01:32:20', 2),
(4, 'Jane', 'Employee', 'Jane Employee', 'employee@example.com', '+1234567892', 2, '1992-08-20', NULL, '789 Employee Road, Employee Village, EV 11111', '2025-08-29 01:32:20', '$2y$12$wnur8mTte.l5WOd5ZbU1v.eTp2yi8BRNonT2nvYN15yXwVnzCfPdi', NULL, '2025-08-29 01:32:20', '2025-08-29 01:32:20', 3),
(5, 'Sarah', 'HR', 'Sarah HR', 'hr@example.com', '+1234567893', 2, '1988-12-10', NULL, '321 HR Boulevard, HR District, HR 22222', '2025-08-29 01:32:21', '$2y$12$z4lLb3Z7O3/z1GIjK2Dn5OJChQ1MqOQFhKkjuGhQI14k.0wUDVUgG', NULL, '2025-08-29 01:32:21', '2025-08-29 01:32:21', 4),
(6, 'Alex', 'Admin', 'Alex Admin', 'alex.admin@example.com', '+1234567894', 1, '1987-03-25', NULL, '654 Admin Lane, Admin Borough, AB 33333', '2025-08-29 01:32:21', '$2y$12$jNzXENTjkaiBiSUwa4wsBOE/jLYaOCAo.2IYDxhChb30YF3QLFmim', NULL, '2025-08-29 01:32:21', '2025-08-29 01:32:21', 1),
(7, 'Maria', 'Admin', 'Maria Admin', 'maria.admin@example.com', '+1234567895', 2, '1983-07-12', NULL, '987 Admin Court, Admin County, AC 44444', '2025-08-29 01:32:22', '$2y$12$VGtSIVZEtQHUNXWNmETKwOqmQqq5awj3zhEH6HaHDgTLaLe80bXda', NULL, '2025-08-29 01:32:22', '2025-08-29 01:32:22', 1),
(8, 'David', 'Manager', 'David Manager', 'david.manager@example.com', '+1234567896', 1, '1986-11-08', NULL, '147 Manager Street, Manager City, MC 55555', '2025-08-29 01:32:22', '$2y$12$7TKT2gPo6leN3W.n7optc.2jyJcKhi1eZqtVn/D.6nVXJMzury386', NULL, '2025-08-29 01:32:22', '2025-08-29 01:32:22', 2),
(9, 'Lisa', 'Manager', 'Lisa Manager', 'lisa.manager@example.com', '+1234567897', 2, '1989-04-30', NULL, '258 Manager Road, Manager Town, MT 66666', '2025-08-29 01:32:22', '$2y$12$iHl5fsxPkR04PAsz5ITXDeQ7e3KYrE5NRqbv6.L/IycGN0VRgq/7m', NULL, '2025-08-29 01:32:22', '2025-08-29 01:32:22', 2),
(10, 'Mike', 'Employee', 'Mike Employee', 'mike.employee@example.com', '+1234567898', 1, '1995-02-14', NULL, '369 Employee Avenue, Employee City, EC 77777', '2025-08-29 01:32:22', '$2y$12$9sck0qL1e6J0hgCXe7IjV.1nPdR040r1Mkjda3/haCHOsrAQP5jUK', NULL, '2025-08-29 01:32:22', '2025-08-29 01:32:22', 3),
(11, 'Emma', 'Employee', 'Emma Employee', 'emma.employee@example.com', '+1234567899', 2, '1993-09-22', NULL, '741 Employee Lane, Employee Village, EV 88888', '2025-08-29 01:32:23', '$2y$12$1gxw0jEf8zUFgerJ9hfAUOhcY5W1xzyD2p4AudIEHWmPF21RktxMe', NULL, '2025-08-29 01:32:23', '2025-08-29 01:32:23', 3),
(12, 'Tom', 'Employee', 'Tom Employee', 'tom.employee@example.com', '+1234567900', 1, '1991-06-18', NULL, '852 Employee Court, Employee District, ED 99999', '2025-08-29 01:32:23', '$2y$12$bOb2pIzaMXKEsjq4tTJJWOummK8gFCvjFFeGPRAEC0glPGfJekuWO', NULL, '2025-08-29 01:32:23', '2025-08-29 01:32:23', 3),
(13, 'Rachel', 'HR', 'Rachel HR', 'rachel.hr@example.com', '+1234567901', 2, '1984-10-05', NULL, '963 HR Street, HR City, HC 00000', '2025-08-29 01:32:23', '$2y$12$7UUSZUTnydWI6H9MYRHkcOuuLQ3W1./1PxY26SnbiZNpwANEb/EpW', NULL, '2025-08-29 01:32:23', '2025-08-29 01:32:23', 4),
(14, 'Chris', 'HR', 'Chris HR', 'chris.hr@example.com', '+1234567902', 1, '1986-12-25', NULL, '159 HR Avenue, HR Town, HT 11111', '2025-08-29 01:32:24', '$2y$12$lRJDBrqg96JqH.UpQdpUVunHuLK2409Ymwv8F2To7PCcWShFQ/qOW', NULL, '2025-08-29 01:32:24', '2025-08-29 01:32:24', 4),
(15, NULL, NULL, 'Test User', 'test@example.com', NULL, NULL, NULL, NULL, NULL, '2025-08-29 01:32:31', '$2y$12$iOYlSh6q3y2VwHAjFLdEl.509iaYGT1YsSb3WB1cC94mdfQRfkxlO', 'DQmzcWiHin', '2025-08-29 01:32:31', '2025-08-29 01:32:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_forms`
--
ALTER TABLE `master_forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_forms_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_role_role_id_permission_id_unique` (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_forms`
--
ALTER TABLE `master_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
