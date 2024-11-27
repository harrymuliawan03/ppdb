-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2024 at 04:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `kode_jurusan`, `nama_jurusan`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mm', 'Multi Media', NULL, '2024-10-16 04:47:16', '2024-10-16 04:47:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_06_01_000000_create_failed_jobs_table', 1),
(2, '2023_06_01_000000_create_pages_table', 1),
(3, '2023_06_01_000000_create_password_resets_table', 1),
(4, '2023_06_01_000000_create_permission_tables', 1),
(5, '2023_06_01_000000_create_settings_table', 1),
(6, '2023_06_01_000000_create_users_table', 1),
(7, '2024_10_14_075346_create_students_table', 2),
(8, '2024_10_14_085018_modify_students_table', 3),
(9, '2024_10_14_164117_add_password_to_students_table', 4),
(10, '2024_10_14_164917_add_timestamps_and_softdelete_to_students_table', 5),
(11, '2024_10_16_091610_create_majors_table', 6),
(12, '2024_10_16_091810_create_prospective_students_table', 6),
(13, '2024_10_16_094116_add_softdelete_to_prospective_students_table', 7),
(14, '2024_10_16_094652_add_password_to_prospective_students_table', 8),
(15, '2024_10_16_114536_add_softdelete_to_majors_table', 9),
(16, '2024_10_16_115832_create_registrations_table', 10),
(17, '2024_10_16_200717_add_no_registration_to_registrations_table', 11),
(18, '2024_10_16_210504_change_student_id_to_prospective_student_id_registrations_table', 12),
(19, '2024_10_17_060010_delete_constraints_on_table_registration', 13),
(20, '2024_10_17_064305_add_major_to_registrations_table', 14),
(21, '2024_10_17_071105_drop_column_student_id_from_registrations_table', 15),
(22, '2024_10_17_072637_change_registrations_table', 16),
(23, '2024_10_18_015643_create_spp_payments_table', 17),
(24, '2024_10_18_015659_create_payment_details_table', 17),
(25, '2024_10_18_030320_rename_due_date_to_payment_month_in_spp_payments_table', 18),
(26, '2024_10_18_032232_add_soft_delete_to_payment_details_table', 19),
(27, '2024_10_18_035817_add_payment_method_to_payment_details_table', 20),
(28, '2024_10_18_042031_change_image_to_nullable_in_users_table', 21),
(29, '2024_10_18_084951_add_nip_to_users_table', 22),
(30, '2024_10_18_095624_create_classes_table', 23),
(32, '2024_10_18_100109_create_school_classes_table', 24),
(33, '2024_10_18_101243_modify_wali_kelas_in_school_classes_table', 24),
(34, '2024_10_18_102418_modify_jurusan_in_school_classes_table', 25),
(35, '2024_10_19_072756_add_class_id_to_students_table', 26),
(36, '2024_10_19_082254_remove_column_password_from_student', 27),
(37, '2024_10_19_162603_create_subjects_table', 28),
(38, '2024_10_19_162705_create_student_grades_table', 28),
(39, '2024_10_19_163425_create_student_grades_table', 29),
(40, '2024_10_19_164706_add_soft_deletes_to_subjects_table', 30),
(41, '2024_10_19_170003_modify_student_grades_table', 31),
(42, '2024_10_19_173405_rename_subjects_id_to_subject_id_in_student_grades_table', 32),
(43, '2024_11_26_074330_create_teacher_schedules_table', 33),
(44, '2024_11_26_093027_add_softdelete_to_teacher_schedules_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 5),
(3, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `spp_payment_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `spp_payment_id`, `description`, `payment_method`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Lunas', 'cash', '200000.00', '2024-10-17 21:06:25', '2024-10-17 21:06:25', NULL),
(2, 3, 'Lunas', 'transfer', '200000.00', '2024-10-19 07:40:29', '2024-10-19 07:42:35', NULL),
(3, 1, 'Lunas', 'cash', '200000.00', '2024-10-26 21:58:37', '2024-10-26 21:58:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions_label_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permissions_label_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'permissiongroup-create', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(2, 'permissiongroup-show', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(3, 'permissiongroup-edit', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(4, 'permissiongroup-update', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(5, 'permissiongroup-delete', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(6, 'permissiongroup-store', 'web', 1, '2024-10-02 21:35:03', NULL, NULL),
(7, 'permission-create', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(8, 'permission-show', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(9, 'permission-edit', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(10, 'permission-update', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(11, 'permission-delete', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(12, 'permission-store', 'web', 2, '2024-10-02 21:35:03', NULL, NULL),
(13, 'role-create', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(14, 'role-show', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(15, 'role-edit', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(16, 'role-update', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(17, 'role-delete', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(18, 'role-store', 'web', 3, '2024-10-02 21:35:03', NULL, NULL),
(19, 'user-create', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(20, 'user-show', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(21, 'user-edit', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(22, 'user-update', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(23, 'user-delete', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(24, 'user-store', 'web', 4, '2024-10-02 21:35:03', NULL, NULL),
(25, 'student-create', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(26, 'student-show', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(27, 'student-edit', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(28, 'student-update', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(29, 'student-delete', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(30, 'student-store', 'web', 5, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(31, 'major-create', 'web', 6, '2024-10-16 02:19:52', '2024-10-16 02:19:52', NULL),
(32, 'major-show', 'web', 6, '2024-10-16 02:19:52', '2024-10-16 02:19:52', NULL),
(33, 'major-edit', 'web', 6, '2024-10-16 02:19:53', '2024-10-16 02:19:53', NULL),
(34, 'major-update', 'web', 6, '2024-10-16 02:19:53', '2024-10-16 02:19:53', NULL),
(35, 'major-delete', 'web', 6, '2024-10-16 02:19:53', '2024-10-16 02:19:53', NULL),
(36, 'major-store', 'web', 6, '2024-10-16 02:19:53', '2024-10-16 02:19:53', NULL),
(37, 'prospectiveStudent-create', 'web', 7, '2024-10-16 02:24:50', '2024-10-16 02:24:50', NULL),
(38, 'prospectiveStudent-show', 'web', 7, '2024-10-16 02:24:50', '2024-10-16 02:24:50', NULL),
(39, 'prospectiveStudent-edit', 'web', 7, '2024-10-16 02:24:50', '2024-10-16 02:24:50', NULL),
(40, 'prospectiveStudent-update', 'web', 7, '2024-10-16 02:24:50', '2024-10-16 02:24:50', NULL),
(41, 'prospectiveStudent-delete', 'web', 7, '2024-10-16 02:24:51', '2024-10-16 02:24:51', NULL),
(42, 'prospectiveStudent-store', 'web', 7, '2024-10-16 02:24:51', '2024-10-16 02:24:51', NULL),
(43, 'registration-create', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(44, 'registration-show', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(45, 'registration-edit', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(46, 'registration-update', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(47, 'registration-delete', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(48, 'registration-store', 'web', 8, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(49, 'sppPayment-create', 'web', 9, '2024-10-17 18:59:34', '2024-10-17 18:59:34', NULL),
(50, 'sppPayment-show', 'web', 9, '2024-10-17 18:59:35', '2024-10-17 18:59:35', NULL),
(51, 'sppPayment-edit', 'web', 9, '2024-10-17 18:59:35', '2024-10-17 18:59:35', NULL),
(52, 'sppPayment-update', 'web', 9, '2024-10-17 18:59:35', '2024-10-17 18:59:35', NULL),
(53, 'sppPayment-delete', 'web', 9, '2024-10-17 18:59:35', '2024-10-17 18:59:35', NULL),
(54, 'sppPayment-store', 'web', 9, '2024-10-17 18:59:35', '2024-10-17 18:59:35', NULL),
(55, 'paymentDetail-create', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(56, 'paymentDetail-show', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(57, 'paymentDetail-edit', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(58, 'paymentDetail-update', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(59, 'paymentDetail-delete', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(60, 'paymentDetail-store', 'web', 10, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(61, 'schoolClass-create', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(62, 'schoolClass-show', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(63, 'schoolClass-edit', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(64, 'schoolClass-update', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(65, 'schoolClass-delete', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(66, 'schoolClass-store', 'web', 11, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(67, 'subject-create', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(68, 'subject-show', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(69, 'subject-edit', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(70, 'subject-update', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(71, 'subject-delete', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(72, 'subject-store', 'web', 12, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(73, 'studentGrade-create', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(74, 'studentGrade-show', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(75, 'studentGrade-edit', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(76, 'studentGrade-update', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(77, 'studentGrade-delete', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(78, 'studentGrade-store', 'web', 13, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(79, 'teacherSchedule-create', 'web', 14, '2024-11-26 00:57:37', '2024-11-26 00:57:37', NULL),
(80, 'teacherSchedule-show', 'web', 14, '2024-11-26 00:57:37', '2024-11-26 00:57:37', NULL),
(81, 'teacherSchedule-edit', 'web', 14, '2024-11-26 00:57:38', '2024-11-26 00:57:38', NULL),
(82, 'teacherSchedule-update', 'web', 14, '2024-11-26 00:57:38', '2024-11-26 00:57:38', NULL),
(83, 'teacherSchedule-delete', 'web', 14, '2024-11-26 00:57:38', '2024-11-26 00:57:38', NULL),
(84, 'teacherSchedule-store', 'web', 14, '2024-11-26 00:57:38', '2024-11-26 00:57:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_group`
--

CREATE TABLE `permissions_group` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_group`
--

INSERT INTO `permissions_group` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User Management', '2024-10-02 21:35:03', NULL, NULL),
(2, 'Website', '2024-10-02 21:35:03', NULL, NULL),
(3, 'Student', '2024-10-15 05:19:53', '2024-10-15 05:19:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_label`
--

CREATE TABLE `permissions_label` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_label`
--

INSERT INTO `permissions_label` (`id`, `name`, `permission_group_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permission Group', 1, '2024-10-02 21:35:03', NULL, NULL),
(2, 'Permission', 1, '2024-10-02 21:35:03', NULL, NULL),
(3, 'Roles', 1, '2024-10-02 21:35:03', NULL, NULL),
(4, 'Users', 1, '2024-10-02 21:35:03', NULL, NULL),
(5, 'Student', 2, '2024-10-14 01:08:45', '2024-10-14 01:08:45', NULL),
(6, 'Major', 2, '2024-10-16 02:19:52', '2024-10-16 02:19:52', NULL),
(7, 'ProspectiveStudent', 2, '2024-10-16 02:24:50', '2024-10-16 02:24:50', NULL),
(8, 'Registration', 2, '2024-10-16 05:00:39', '2024-10-16 05:00:39', NULL),
(9, 'SppPayment', 2, '2024-10-17 18:59:34', '2024-10-17 18:59:34', NULL),
(10, 'PaymentDetail', 2, '2024-10-17 19:00:38', '2024-10-17 19:00:38', NULL),
(11, 'SchoolClass', 2, '2024-10-18 02:59:32', '2024-10-18 02:59:32', NULL),
(12, 'Subject', 2, '2024-10-19 09:32:06', '2024-10-19 09:32:06', NULL),
(13, 'StudentGrade', 2, '2024-10-19 09:35:22', '2024-10-19 09:35:22', NULL),
(14, 'TeacherSchedule', 2, '2024-11-26 00:57:37', '2024-11-26 00:57:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prospective_students`
--

CREATE TABLE `prospective_students` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prospective_students`
--

INSERT INTO `prospective_students` (`id`, `name`, `birth_date`, `gender`, `address`, `phone_number`, `email`, `password`, `nisn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Harry Muliawan Ihsan Ahmad', '2024-10-15', 'Male', 'Dusun Wetan', '85959468196', 'admin@redtech.co.id', '$2y$10$4sdvAhRIx99gsv1P/CYVoujMoh2GM4FKJW3NA0GKbzUH5lrm751ci', '1234567890', '2024-10-16 02:39:36', '2024-10-16 02:39:36', NULL),
(3, 'Maulana Ya Karim', '2024-10-24', 'Male', 'Dusun Kulon', '85959468196', 'sekolah@redtech.co.id', '$2y$10$4sdvAhRIx99gsv1P/CYVoujMoh2GM4FKJW3NA0GKbzUH5lrm751ci', '12345678901', '2024-10-16 02:44:27', '2024-10-17 00:43:01', NULL),
(4, 'Harry Muliawan', '2005-05-11', 'Male', 'Bekasi', '085959468196', 'harrymuliawan02@gmail.com', '$2y$10$ndPWQ7TT1nNHj/FP3fAg1Og6JHuCKESP61.wMiXKnQIf1wwSqLtmC', '123456789022', '2024-10-26 21:23:41', '2024-10-26 21:27:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `prospective_student_id` bigint UNSIGNED NOT NULL,
  `no_registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_id` bigint UNSIGNED NOT NULL,
  `old_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_ijazah` decimal(8,2) NOT NULL,
  `average_raport` decimal(8,2) NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `prospective_student_id`, `no_registration`, `major_id`, `old_school`, `average_ijazah`, `average_raport`, `ijazah`, `raport`, `birth_certificate`, `student_photo`, `registration_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'REG-232300', 1, '', '0.00', '0.00', 'ijazah/pq1GRXZ6NGrgLhONC1j8JfAjQYco5lZ86pGNNrzw.png', 'raport/nGuNIWwDRsE4PDzd5e3AZGZHqnsheIsVoNPBWH7E.jpg', 'birth_certificates/Y3cBfyuvoH33oYl3YvfaJFMJBR69NqWZcWKoDeIS.png', 'student_photos/Rrw8eOwxMEFRPpkea9mVLHBa5YqnlKGvr1r4S0uC.png', '2024-10-16', 'pending', '2024-10-16 12:33:03', '2024-10-17 00:21:31', NULL),
(4, 3, 'REG-2024-4578', 1, '', '0.00', '0.00', 'ijazah/QYUGPzJQQ1ykR0G9ICB40c84gv6YKYSrwk4DQNDX.png', 'raport/rE4mHDyQGmdSf9JBcY4wsvYdk8bwjOG9kx15xcgZ.png', 'birth_certificate/LhzKsigucaFNq1QRDVlfRSiAyYW3XNVTlMqCmk7u.png', 'student_photos/VsNOq2dxazXYyuysGjonHXJ7MIpnrq1B6qWpQmhL.jpg', '2024-10-17', 'pending', '2024-10-16 23:03:57', '2024-10-16 23:41:54', '2024-10-16 23:41:54'),
(5, 3, 'REG-2024-3281', 1, '', '0.00', '0.00', 'ijazah/iOO41HgRI70SUgNZgnPStpJyDOTbjPpvRYsPrH7w.png', 'raport/14CULqozr9I2pIitoWO6V1Y85ZMc3zOUCp6gU9BI.png', 'birth_certificate/CGJxH2TqrMi140ERgpC16ngVOBAfcznAJCAYxPZN.png', 'student_photos/Th6u5jt1IPwKIX0Bdeqjh0MIWNdfp6fvGRdYRtME.jpg', '2024-10-17', 'pending', '2024-10-16 23:07:38', '2024-10-16 23:42:02', '2024-10-16 23:42:02'),
(6, 3, 'REG-2024-3842', 1, '', '0.00', '0.00', 'ijazah/7txZ6U4ZW4El0GuL5HzHaiX6Xwd62N4xbLY3H7Iy.png', 'raport/gi7N0M6u678wu4BRSv1OvEJwH3EY7P4u49CVcHsC.png', 'birth_certificate/dg4VzPFipkMUT0xpmoJLhhZF7t9Up66ZBxStfEaA.png', 'student_photos/ll7xZ2VesD0hot9N0DZmzIwZOrbRyJrjxpqSRozV.jpg', '2024-10-17', 'pending', '2024-10-16 23:08:25', '2024-10-16 23:42:11', '2024-10-16 23:42:11'),
(7, 3, 'REG-2024-5377', 1, '', '0.00', '0.00', 'ijazah/wYI3n3nFXcDtQczEa85hjBsmqmOwjEOBbu5PtxcE.png', 'raport/n6dA60jYmsu8xDNK6Al3NzYFvre1udrqY9KbotFi.png', 'birth_certificate/9zbU9OstuhqEuwFxvP43Km56iQRZvLWqMmks238J.png', 'student_photos/GR7fMB1SHdz0HjJt6qw9kDVCgPrkCXcGFyBp3UFE.jpg', '2024-10-17', 'approved', '2024-10-17 00:11:56', '2024-10-17 00:42:13', '2024-10-17 00:42:13'),
(9, 3, 'REG-2024-4258', 1, 'SMPN 1 Jatinagara', '90.20', '88.20', 'ijazah/kRWbHlPckv4Ku5IzqW03mLmckkOvec4G2RZHCmNy.png', 'raport/6OtmZ1Rij1jLNbudz6gxKoHqrgdr73iQpbdOTxTZ.png', 'birth_certificate/ZLbkpvWq94QrRECfub6ZN6nX89Hj89LNDv4VTTwL.png', 'student_photos/CiYL3F1uHWyheshmpFT7Fxyqc67WvmSjk9z8wog0.jpg', '2024-10-17', 'success', '2024-10-17 00:43:02', '2024-10-17 01:43:41', NULL),
(10, 4, 'REG-2024-6845', 1, 'SMPN 1 Jatinagara', '90.20', '88.20', 'ijazah/zFFfV8D6D606WC7p41eqJOIjrF15NywjEoTyOWti.png', 'raport/j1MiAmyGXEvxIU7la3bQPY3kd5KoQjOS7DmBIA8M.png', 'birth_certificate/mOJXIXGfjwr9ZqRveOVxBnoZZELQgnoP5Wgtzfgx.png', 'student_photos/U2EDQH5w1thefkNHHean22ra6n17pjVqA4j0KnAi.png', '2024-10-27', 'success', '2024-10-26 21:27:11', '2024-10-27 21:35:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'administrator', 'web', '2024-10-02 21:35:03', NULL, NULL),
(2, 'teacher', 'web', '2024-10-17 19:03:20', '2024-10-17 19:03:20', NULL),
(3, 'staff_tu', 'web', '2024-10-27 20:32:25', '2024-10-27 20:37:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(80, 2),
(26, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3);

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `wali_kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id`, `nama_kelas`, `jurusan_id`, `wali_kelas_id`, `tahun_ajaran`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '7 A', 1, 3, '2024', NULL, '2024-10-18 03:32:27', '2024-10-18 03:35:28'),
(2, '7 B', 1, 2, '2024', NULL, '2024-10-19 07:43:50', '2024-10-19 07:44:07'),
(3, '7 C', 1, 2, '2024', '2024-10-19 07:44:23', '2024-10-19 07:44:17', '2024-10-19 07:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spp_payments`
--

CREATE TABLE `spp_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_month` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spp_payments`
--

INSERT INTO `spp_payments` (`id`, `student_id`, `amount`, `status`, `payment_month`, `payment_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '200000.00', 'paid', '2024-10-01', '2024-10-27', '2024-10-17 20:09:45', '2024-10-26 21:58:37', NULL),
(2, 2, '200000.00', 'paid', '2024-10-01', '2024-10-18', '2024-10-17 20:09:45', '2024-10-17 20:31:15', NULL),
(3, 4, '200000.00', 'paid', '2024-10-01', '2024-10-15', '2024-10-19 02:02:22', '2024-10-26 21:57:25', '2024-10-26 21:57:25'),
(4, 6, '200000.00', 'pending', '2024-10-01', NULL, '2024-10-27 21:35:34', '2024-10-27 21:35:34', NULL),
(6, 7, '100000.00', 'pending', '2024-10-01', NULL, '2024-10-28 00:43:11', '2024-10-28 00:43:11', NULL),
(7, 1, '100000.00', 'pending', '2024-11-01', NULL, '2024-11-27 05:02:41', '2024-11-27 05:02:41', NULL),
(8, 2, '100000.00', 'pending', '2024-11-01', NULL, '2024-11-27 05:02:41', '2024-11-27 05:02:41', NULL),
(9, 6, '100000.00', 'pending', '2024-11-01', NULL, '2024-11-27 05:02:41', '2024-11-27 05:02:41', NULL),
(10, 7, '100000.00', 'pending', '2024-11-01', NULL, '2024-11-27 05:02:41', '2024-11-27 05:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_class_id` bigint UNSIGNED DEFAULT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `school_class_id`, `birth_date`, `gender`, `address`, `phone_number`, `email`, `nisn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Harry Muliawan Ihsan Ahmad', 1, '2024-10-08', 'Male', 'Dusun Wetan Jatinagara', '085959468196', 'sekolah@redtech.co.id', '12345678910', '2024-10-14 09:51:42', '2024-10-19 00:50:57', NULL),
(2, 'Ihsan Ahmad', 1, '2024-10-15', 'Male', 'Dusun wetan', '085959468196', 'admin@redtech.co.id', '12345678900', '2024-10-14 23:18:17', '2024-10-19 07:44:52', NULL),
(3, 'Testing Student', NULL, '2024-10-18', 'Male', 'Dusun Wetan', '85959468196', 'aad@gmail.com', '1238481418990-', '2024-10-19 01:56:30', '2024-10-19 02:01:48', '2024-10-19 02:01:48'),
(4, 'Testing Student', NULL, '2024-10-17', 'Male', 'test', '85959468196', 'mardalius18@gmail.com', '2354556', '2024-10-19 02:02:22', '2024-10-19 07:45:29', '2024-10-19 07:45:29'),
(6, 'Harry Muliawan', NULL, '2005-05-11', 'Male', 'Bekasi', '085959468196', 'harrymuliawan02@gmail.com', '123456789022', '2024-10-27 21:35:34', '2024-10-27 21:35:34', NULL),
(7, 'Testing', 2, '2024-10-28', 'Male', 'Bandung', '85959468196', 'dsadsa@gmail.com', '12241421421', '2024-10-28 00:41:50', '2024-10-28 00:41:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `nilai` decimal(5,2) NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `student_id`, `subject_id`, `teacher_id`, `nilai`, `semester`, `school_year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '20.00', '1', '2024', NULL, '2024-10-19 10:26:55', '2024-10-19 10:37:55'),
(2, 2, 1, 2, '20.00', '1', '2024', NULL, '2024-10-19 10:39:16', '2024-10-19 10:39:16'),
(3, 2, 1, 5, '50.00', '2', '2020', NULL, '2024-11-25 23:35:15', '2024-11-25 23:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Matematika', 'mtk', NULL, '2024-10-19 09:44:43', '2024-10-19 09:44:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_schedules`
--

CREATE TABLE `teacher_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `day_of_week` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_schedules`
--

INSERT INTO `teacher_schedules` (`id`, `teacher_id`, `day_of_week`, `start_time`, `end_time`, `subject_id`, `class_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Selasa', '08:00:00', '09:30:00', 1, 1, '2024-11-26 02:28:44', '2024-11-27 05:30:38', NULL),
(2, 5, 'Senin', '12:30:00', '13:30:00', 1, 2, '2024-11-27 08:29:44', '2024-11-27 08:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `nip`) VALUES
(1, 'Administrator', 'admin@smkm3.co.id', '2024-10-02 21:35:03', 'https://via.placeholder.com/500', '$2y$10$OzJ2ix0otEGhPchxtuA6g.cauzRtys0iBvxjkYb0Olp0G6yk/8Ws2', 'bqLpWzjSWfLMsjJ0RoIR7n6YDuimsmXWmWXtVrpY2RePADCe3DlNy5quVEmL', '2024-10-02 21:35:03', '2024-10-15 05:19:14', NULL, NULL),
(2, 'Muhammad Azka', 'mardalius18@gmail.com', NULL, NULL, '$2y$10$KovUCIf31LuQ3bshyiOaO.MNILiS4EsmHi/NTi83J6S1UtV2K0Fdq', NULL, '2024-10-17 21:21:07', '2024-10-19 10:43:07', NULL, '1990081720200410'),
(3, 'Contoh Wali Kelas', 'example@gmail.com', NULL, NULL, '$2y$10$7ylnCWHaQgDNTAfgUu8zuespWCOeJ3Sw.22i04Xtp45mt26mTbc7S', NULL, '2024-10-18 02:23:01', '2024-10-19 07:46:11', NULL, '1233456789010'),
(5, 'Maulana Ihsan', 'maulana@gmail.com', NULL, NULL, '$2y$10$eDFH1C7SQPS8duB0KxFxS.DV.mM3WsCjQwdiBLtADoVxtROExjop.', NULL, '2024-10-27 21:01:26', '2024-10-27 21:01:26', NULL, '12321421'),
(6, 'Irma Selasih', 'irma@gmail.com', NULL, NULL, '$2y$10$BdChiDfxk1HA654KbelyEeLzGsq4cd0Ct7r5umQ98QpMhBp4pHd8.', NULL, '2024-10-27 21:03:29', '2024-10-27 21:03:29', NULL, '21321321321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `majors_kode_jurusan_unique` (`kode_jurusan`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_spp_payment_id_foreign` (`spp_payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permissions_group`
--
ALTER TABLE `permissions_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_group_name_unique` (`name`);

--
-- Indexes for table `permissions_label`
--
ALTER TABLE `permissions_label`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_label_name_unique` (`name`);

--
-- Indexes for table `prospective_students`
--
ALTER TABLE `prospective_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prospective_students_email_unique` (`email`),
  ADD UNIQUE KEY `prospective_students_nisn_unique` (`nisn`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrations_prospective_student_id_foreign` (`prospective_student_id`);

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
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_classes_wali_kelas_id_foreign` (`wali_kelas_id`),
  ADD KEY `school_classes_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spp_payments`
--
ALTER TABLE `spp_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spp_payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_nisn_unique` (`nisn`),
  ADD KEY `students_school_class_id_foreign` (`school_class_id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_grades_student_id_foreign` (`student_id`),
  ADD KEY `student_grades_subjects_id_foreign` (`subject_id`),
  ADD KEY `student_grades_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_code_unique` (`code`);

--
-- Indexes for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_schedules_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_schedules_subject_id_foreign` (`subject_id`),
  ADD KEY `teacher_schedules_class_id_foreign` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `permissions_group`
--
ALTER TABLE `permissions_group`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions_label`
--
ALTER TABLE `permissions_label`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prospective_students`
--
ALTER TABLE `prospective_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spp_payments`
--
ALTER TABLE `spp_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_spp_payment_id_foreign` FOREIGN KEY (`spp_payment_id`) REFERENCES `spp_payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_prospective_student_id_foreign` FOREIGN KEY (`prospective_student_id`) REFERENCES `prospective_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD CONSTRAINT `school_classes_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `school_classes_wali_kelas_id_foreign` FOREIGN KEY (`wali_kelas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spp_payments`
--
ALTER TABLE `spp_payments`
  ADD CONSTRAINT `spp_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_school_class_id_foreign` FOREIGN KEY (`school_class_id`) REFERENCES `school_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_grades_subjects_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_grades_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD CONSTRAINT `teacher_schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `school_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_schedules_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
