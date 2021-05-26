-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for booking_service
CREATE DATABASE IF NOT EXISTS `booking_service` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `booking_service`;

-- Dumping structure for table booking_service.bookings
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `tanggal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.bookings: ~10 rows (approximately)
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` (`id`, `cust_id`, `cat_id`, `tanggal`, `type_mobil`, `jenis_mobil`, `tahun`, `status`, `lokasi`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2021-04-30 10:00:00', 'Matic', 'Vios', '2009', 1, NULL, NULL, '2021-05-01 18:40:06'),
	(2, 1, 2, '2021-04-20 10:00:00', 'Matic', 'Vios', '2009', 0, 'Jl. Test 123', '2021-05-02 08:46:39', NULL),
	(3, 1, 2, '2021-02-05 10:00:00', 'Matic', 'Vios', '2009', 0, 'Jl. Test 123', '2021-05-02 08:54:09', NULL),
	(4, 1, 3, '2021-05-05 04:02:00', 'Manual', 'Calya', '2020', 0, 'Jl. Test 123', '2021-05-02 09:03:25', NULL),
	(5, 1, 3, '2021-05-05 04:02:00', 'Manual', 'Calya', '2020', 0, 'Jl. Test 123', '2021-05-02 09:03:31', NULL),
	(6, 1, 1, '2021-09-05 04:12:00', 'Automatic', 'Avanza', '2020', 0, 'Jl. Test 123', '2021-05-02 09:12:36', NULL),
	(7, 1, 1, '2021-09-05 06:26:00', 'Automatic', 'Avanza', '2020', 0, 'Jl. Test 123', '2021-05-02 09:20:43', NULL),
	(8, 1, 1, '1970-01-01 00:00:00', 'Automatic', 'Avanza', NULL, 0, 'Jl. Test 123', '2021-05-02 09:22:24', NULL),
	(9, 1, 1, '1970-01-01 00:00:00', 'Automatic', 'Avanza', NULL, 0, 'Jl. Test 123', '2021-05-02 09:22:25', NULL),
	(10, 1, 1, '1970-01-01 00:00:00', 'Automatic', 'Avanza', NULL, 0, 'Jl. Test 123', '2021-05-02 09:24:24', NULL),
	(11, 1, 4, '2021-05-20 10:00:00', 'Matic', 'Vios', '2009', 0, 'Jl. Test 123', '2021-05-06 14:19:25', NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;

-- Dumping structure for table booking_service.booking_services
DROP TABLE IF EXISTS `booking_services`;
CREATE TABLE IF NOT EXISTS `booking_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selesai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mekanik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_polisi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.booking_services: ~0 rows (approximately)
/*!40000 ALTER TABLE `booking_services` DISABLE KEYS */;
INSERT INTO `booking_services` (`id`, `booking_id`, `tanggal`, `mulai`, `selesai`, `mekanik`, `no_polisi`, `catatan`, `total_biaya`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-04-30', '10:00:00', NULL, 'Jamal', NULL, NULL, NULL, 0, '2021-05-01 18:40:06', NULL);
/*!40000 ALTER TABLE `booking_services` ENABLE KEYS */;

-- Dumping structure for table booking_service.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.categories: ~5 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Service Berkala 1000 km', '2021-04-29 13:15:08', NULL),
	(2, 'Service Berkala 4000 km', '2021-04-29 13:15:08', NULL),
	(3, 'Service Berkala 8000 km', '2021-04-29 13:15:08', NULL),
	(4, 'Service Berkala 12000 km', '2021-04-29 13:15:08', NULL),
	(6, 'Service Berkala 16000 km', '2021-05-02 00:47:55', NULL),
	(7, 'Service lainya', '2021-05-01 17:48:10', '2021-05-01 17:48:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table booking_service.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `user_id`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Test Customer', 'Jl. Test 123', '0889182919', '2021-04-29 13:15:08', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table booking_service.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table booking_service.lookup_values
DROP TABLE IF EXISTS `lookup_values`;
CREATE TABLE IF NOT EXISTS `lookup_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `values` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.lookup_values: ~9 rows (approximately)
/*!40000 ALTER TABLE `lookup_values` DISABLE KEYS */;
INSERT INTO `lookup_values` (`id`, `type`, `values`, `created_at`, `updated_at`) VALUES
	(1, 'TYPE_MOBIL', 'Automatic', '2021-04-29 13:15:08', NULL),
	(2, 'TYPE_MOBIL', 'Manual', '2021-04-29 13:15:08', NULL),
	(3, 'JENIS_MOBIL', 'Avanza', '2021-04-29 13:15:08', NULL),
	(4, 'JENIS_MOBIL', 'Innova', '2021-04-29 13:15:08', NULL),
	(5, 'JENIS_MOBIL', 'Calya', '2021-04-29 13:15:08', NULL),
	(6, 'JENIS_MOBIL', 'Fortunner', '2021-04-29 13:15:08', NULL),
	(7, 'JENIS_MOBIL', 'Vios', '2021-04-29 13:15:08', NULL),
	(8, 'JENIS_MOBIL', 'Agya', '2021-04-29 13:15:08', NULL),
	(9, 'JENIS_MOBIL', 'Alphard', '2021-04-29 13:15:08', NULL),
	(10, 'LOKASI', 'Dirumah', '2021-05-02 01:02:53', NULL),
	(11, 'LOKASI', 'Bengkel Fatmawati', '2021-05-02 01:02:53', NULL);
/*!40000 ALTER TABLE `lookup_values` ENABLE KEYS */;

-- Dumping structure for table booking_service.mekaniks
DROP TABLE IF EXISTS `mekaniks`;
CREATE TABLE IF NOT EXISTS `mekaniks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_mekanik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.mekaniks: ~4 rows (approximately)
/*!40000 ALTER TABLE `mekaniks` DISABLE KEYS */;
INSERT INTO `mekaniks` (`id`, `nama`, `no_mekanik`, `created_at`, `updated_at`) VALUES
	(1, 'Budi', '001', '2021-04-29 13:15:08', NULL),
	(2, 'Sugiman', '002', '2021-04-29 13:15:08', NULL),
	(3, 'Warsono', '003', '2021-04-29 13:15:08', NULL),
	(4, 'Jamal', '004', '2021-04-29 13:15:08', NULL),
	(5, 'Agus', '005', '2021-05-01 17:52:02', '2021-05-01 17:55:18');
/*!40000 ALTER TABLE `mekaniks` ENABLE KEYS */;

-- Dumping structure for table booking_service.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_03_13_180320_create_bookings_table', 1),
	(2, '2021_03_13_180533_create_categories_table', 1),
	(3, '2021_03_13_182133_create_customers_table', 1),
	(4, '2021_03_14_075631_create_lookup_values_table', 1),
	(5, '2021_04_28_151129_create_booking_services_table', 1),
	(6, '2021_04_28_151724_create_mekaniks_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table booking_service.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table booking_service.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table booking_service.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `level`, `email`) VALUES
	(1, 'admin', '$2y$10$9d0OevLTLAslFHYwgu4FxuL6OZcp5g6rBwrG4qKUMQPQ7e1GO2Msi', '2021-04-29 13:15:08', '2021-04-29 13:15:08', 'A', 'admin@admin.com'),
	(2, 'test@test.com', '$2y$10$tfW9S77DmTgDvsrv0dSMGODOk6dBKFRjQqJQ0/SnQZttDczJRXLOS', '2021-04-29 13:15:08', '2021-04-29 13:15:08', NULL, 'test@test.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
