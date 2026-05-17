-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: bestforyou
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hr_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Corperor Creatives',NULL,NULL,NULL,NULL,NULL,NULL,1,'2026-04-02 12:49:23','2026-04-02 12:49:23'),(8,'Ajfan International','Ajfan','8138003610','Ajfan@gmail.com',NULL,NULL,NULL,1,'2026-05-06 07:05:20','2026-05-06 07:05:20'),(9,'red team hacker academy','?','9633020660','redteam123@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:19:10','2026-05-11 06:19:10'),(10,'gallery vision','Peter','9946300064','galleryviison123@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:20:48','2026-05-11 06:20:48'),(11,'smec technologies','..','9746502168','smec@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:21:22','2026-05-11 06:21:22'),(12,'v tex institute of advanced technologies','..','9526090090','vtex@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:21:57','2026-05-11 06:21:57'),(13,'Space education','..','8089003374','Spaceeducation@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:25:03','2026-05-11 06:25:03'),(14,'CK creatives','..','7994757927','CKcreatives@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:25:47','2026-05-11 06:25:47'),(15,'dot net hub','..','9037726344','dotnethub@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:26:37','2026-05-11 06:26:37'),(16,'code 7 academy','..','7306664752','code7@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:33:27','2026-05-11 06:33:27'),(17,'11x company','..','9567686695','11x@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:34:27','2026-05-11 06:34:27'),(18,'beat educations','..','9249524771','beat@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:35:10','2026-05-11 06:35:10'),(19,'first cry  playschool','Munna','9567335677',NULL,NULL,NULL,NULL,1,'2026-05-11 06:35:57','2026-05-11 06:35:57'),(20,'sky mart education','..','7356094049','sky@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:36:53','2026-05-11 06:36:53'),(21,'Edwin Academy','.','7736741702','edwin@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:38:30','2026-05-11 06:38:30'),(22,'mangadan flooring','..','9447747286','Mangadan@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:39:02','2026-05-11 06:39:02'),(23,'l4lavender','..','7034511189','l4lavender@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:39:43','2026-05-11 06:39:43'),(24,'Aerowiz','..','8594000747','aerowiz@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:40:49','2026-05-11 06:40:49'),(25,'Quadcubes','..','7736787778','quad@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:42:13','2026-05-11 06:42:13'),(26,'wizycom','..','8891048999','wizy@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:44:05','2026-05-11 06:44:05'),(28,'SV group','.,','9847403040','sv@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:54:31','2026-05-11 06:54:31'),(29,'ebsor info system','..','9995422292','ebsor123@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:55:07','2026-05-11 06:55:07'),(30,'g line Store','Jiffin','8086698007','gline@gmail.com',NULL,NULL,NULL,1,'2026-05-11 06:56:13','2026-05-11 06:56:13'),(31,'M & D innovations','...','7356738085','md@gmail.com',NULL,NULL,NULL,1,'2026-05-11 07:12:42','2026-05-11 07:12:42'),(32,'Zig Zag Digital','.','9946443551',NULL,NULL,NULL,NULL,1,'2026-05-11 10:46:46','2026-05-11 10:47:06'),(33,'Advex','.','+91 86068 60900',NULL,NULL,NULL,NULL,1,'2026-05-11 11:29:18','2026-05-11 11:29:18'),(34,'Metarc','.','736719729','metarc@gmail.com',NULL,NULL,NULL,1,'2026-05-11 12:00:39','2026-05-11 12:00:39'),(35,'Codenex','.','9633785145','codenex@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:14:34','2026-05-12 06:14:34'),(36,'Vidya Portal','.','7025888867','vidya@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:39:44','2026-05-12 06:39:44'),(37,'Eduwing','Nizam','9633447717','eduwing@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:40:15','2026-05-12 06:40:15'),(38,'Eduport','Reshma','9778428598','eduport@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:41:46','2026-05-12 06:41:46'),(39,'Taxscan','.','9778588848','TAXSCAN@GAMIL.COM',NULL,NULL,NULL,1,'2026-05-12 06:43:39','2026-05-12 06:43:39'),(40,'Zoople Technologies','.','7593865188',NULL,NULL,NULL,NULL,1,'2026-05-12 06:45:00','2026-05-12 06:45:00'),(41,'X and Y Learning','.','7736061333','xy@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:47:12','2026-05-12 06:47:12'),(42,'Earthscale Media','.','8590689520','earth@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:49:30','2026-05-12 06:49:30'),(43,'Mediasmiths','.','8129297988','mediasmiths@gmail.com',NULL,NULL,NULL,1,'2026-05-12 06:50:16','2026-05-12 06:50:16'),(44,'The X Techvent','.','9744166610','thex@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:18:17','2026-05-12 11:18:17'),(45,'Hom Pac Fin Furniture','.','9061272727','hom@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:18:50','2026-05-12 11:18:50'),(46,'Nikshan Digital','.','9061172200','nikshan@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:19:22','2026-05-12 11:19:22'),(47,'D Life','.','9778425205','d@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:19:46','2026-05-12 11:19:46'),(48,'Silver Palace','.','7550031537','silver@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:20:28','2026-05-12 11:20:28'),(49,'grand house centenario','.','9633100930','grand@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:20:59','2026-05-12 11:20:59'),(50,'edura academy','.','9778458780','edura@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:21:28','2026-05-12 11:21:28'),(51,'seven years','.','9072160707','seven@gmail.com',NULL,NULL,NULL,1,'2026-05-12 11:22:24','2026-05-12 11:22:24'),(52,'Reliance Smartpoint','Britto','7736595780','rel@gmail.com',NULL,NULL,NULL,1,'2026-05-13 10:20:27','2026-05-13 10:20:27'),(54,'Ex Media','.','9526123466','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-14 09:48:51','2026-05-14 09:48:51'),(55,'LaTech','.','7012977120','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-14 10:58:20','2026-05-14 10:58:20'),(57,'Info Row Technologies','.','6282785804','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-14 11:05:10','2026-05-14 11:05:10'),(58,'Quppayam Boutique','.','9746386125','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-14 11:58:14','2026-05-14 11:58:14'),(59,'AeroTech','.','7305917443','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-14 12:22:13','2026-05-14 12:22:13'),(60,'Exotica LifeSpace','.','7012974023','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-15 09:18:04','2026-05-15 09:18:04'),(61,'R R Machines & Engineering','.','9349897946','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-15 11:50:41','2026-05-15 11:50:41'),(62,'Second Tales','.','7025980960','recruiter@best4ucareers.com',NULL,NULL,NULL,1,'2026-05-15 11:58:59','2026-05-15 11:58:59'),(63,'Emarath','Arya','8547470653','emarath@gmail.com',NULL,NULL,NULL,1,'2026-05-16 09:41:52','2026-05-16 09:41:52');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Indian Rupee','INR','₹','2026-04-01 09:00:50','2026-04-01 09:00:50'),(2,'US Dollar','USD','$','2026-04-01 09:00:50','2026-04-01 09:00:50'),(3,'UAE Dirham','AED','AED','2026-04-01 09:00:50','2026-04-01 09:00:50');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry_types`
--

DROP TABLE IF EXISTS `industry_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industry_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry_types`
--

LOCK TABLES `industry_types` WRITE;
/*!40000 ALTER TABLE `industry_types` DISABLE KEYS */;
INSERT INTO `industry_types` VALUES (1,'IT & Software','2026-05-06 06:47:25','2026-05-06 06:53:23'),(2,'Media, Advertising & Digital Marketing','2026-05-06 06:47:41','2026-05-11 07:11:11'),(4,'Healthcare','2026-05-06 06:48:07','2026-05-06 06:48:07'),(5,'Logistics and Supply Chain','2026-05-06 06:48:54','2026-05-06 06:52:05'),(6,'Construction & Real Estate','2026-05-06 06:49:07','2026-05-06 06:51:24'),(9,'Banking, Financial Services & Insurance','2026-05-06 06:50:36','2026-05-06 06:50:36'),(10,'FMCG & Retail','2026-05-06 06:50:48','2026-05-06 06:50:48'),(11,'Manufacturing and Production','2026-05-06 06:51:05','2026-05-06 06:51:05'),(12,'Education & Training','2026-05-06 06:51:41','2026-05-06 07:03:07'),(13,'Hospitality & Tourism','2026-05-06 06:51:50','2026-05-06 07:03:14'),(14,'Telecom','2026-05-06 06:52:34','2026-05-06 06:52:34'),(15,'Human Resource & Recruitment','2026-05-06 06:52:48','2026-05-06 06:52:48'),(16,'Automotive','2026-05-06 06:53:02','2026-05-06 06:53:02'),(17,'Architecture / Interior Design','2026-05-06 06:54:21','2026-05-06 06:56:58');
/*!40000 ALTER TABLE `industry_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_applications`
--

DROP TABLE IF EXISTS `job_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_applications_job_id_foreign` (`job_id`),
  CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_applications`
--

LOCK TABLES `job_applications` WRITE;
/*!40000 ALTER TABLE `job_applications` DISABLE KEYS */;
INSERT INTO `job_applications` VALUES (2,NULL,'Jigar Shah','+966 505942958','shjigar92@gmail.com',NULL,'2026-04-29 09:22:15','2026-04-29 09:22:15'),(3,NULL,'Yusuf Colombowala','0523840285','yusuf.c78661@gmail.com',NULL,'2026-04-29 11:29:19','2026-04-29 11:29:19'),(5,4,'Deekshith C','1234567890','deekshithdk2133@gmail.com',NULL,'2026-05-11 06:12:59','2026-05-11 06:12:59'),(6,5,'Hiba','12345678','123@gmail.com',NULL,'2026-05-11 07:07:08','2026-05-11 07:07:08');
/*!40000 ALTER TABLE `job_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_categories_parent_category_id_foreign` (`parent_category_id`),
  CONSTRAINT `job_categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `job_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_categories`
--

LOCK TABLES `job_categories` WRITE;
/*!40000 ALTER TABLE `job_categories` DISABLE KEYS */;
INSERT INTO `job_categories` VALUES (1,'Sales & Business Development',NULL,NULL,'2026-04-02 12:52:30','2026-05-06 06:58:55'),(2,'Marketing & Advertising',NULL,NULL,'2026-04-02 12:52:48','2026-05-06 06:59:12'),(3,'Operations & Production',NULL,NULL,'2026-05-06 06:59:29','2026-05-06 06:59:29'),(4,'Engineering & Technical',NULL,NULL,'2026-05-06 06:59:53','2026-05-06 06:59:53'),(5,'IT & Software Development',NULL,NULL,'2026-05-06 07:00:07','2026-05-06 07:00:07'),(6,'Human Resources & Recruitment',NULL,NULL,'2026-05-06 07:00:36','2026-05-06 07:00:36'),(7,'Finance & Accounting',NULL,NULL,'2026-05-06 07:00:52','2026-05-06 07:00:52'),(8,'Customer Service & Support',NULL,NULL,'2026-05-06 07:01:08','2026-05-06 07:01:08'),(9,'Administration & Office Support',NULL,NULL,'2026-05-06 07:01:22','2026-05-06 07:01:22'),(10,'Logistics & Supply Chain',NULL,NULL,'2026-05-06 07:01:42','2026-05-06 07:01:42'),(11,'Hospitality & Travel',NULL,NULL,'2026-05-06 07:01:55','2026-05-06 07:01:55'),(12,'Healthcare',NULL,NULL,'2026-05-06 07:02:04','2026-05-06 07:02:04'),(13,'Design & Creatives',NULL,NULL,'2026-05-06 07:02:15','2026-05-06 07:02:15'),(14,'Construction & Site Management',NULL,NULL,'2026-05-06 07:02:30','2026-05-06 07:02:30'),(15,'Education & Training',NULL,NULL,'2026-05-06 07:02:45','2026-05-06 07:02:45');
/*!40000 ALTER TABLE `job_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_skill`
--

DROP TABLE IF EXISTS `job_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_skill` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint unsigned NOT NULL,
  `skill_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_skill_job_id_foreign` (`job_id`),
  KEY `job_skill_skill_id_foreign` (`skill_id`),
  CONSTRAINT `job_skill_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_skill_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_skill`
--

LOCK TABLES `job_skill` WRITE;
/*!40000 ALTER TABLE `job_skill` DISABLE KEYS */;
INSERT INTO `job_skill` VALUES (4,4,3,NULL,NULL),(5,5,4,NULL,NULL),(6,5,1,NULL,NULL),(7,6,5,NULL,NULL),(8,6,6,NULL,NULL),(9,6,7,NULL,NULL),(10,6,3,NULL,NULL),(11,7,1,NULL,NULL),(12,7,8,NULL,NULL),(13,7,9,NULL,NULL),(14,7,10,NULL,NULL),(15,8,9,NULL,NULL),(16,8,8,NULL,NULL),(17,8,4,NULL,NULL),(18,8,1,NULL,NULL),(19,9,2,NULL,NULL),(20,9,11,NULL,NULL),(21,9,12,NULL,NULL),(22,10,13,NULL,NULL),(23,10,3,NULL,NULL),(24,10,14,NULL,NULL),(25,11,2,NULL,NULL),(26,11,11,NULL,NULL),(27,12,15,NULL,NULL),(28,12,16,NULL,NULL),(29,12,17,NULL,NULL),(30,12,18,NULL,NULL),(31,12,19,NULL,NULL),(37,14,3,NULL,NULL),(38,14,20,NULL,NULL),(39,15,21,NULL,NULL),(40,15,22,NULL,NULL),(41,15,23,NULL,NULL),(42,16,3,NULL,NULL),(43,17,2,NULL,NULL),(44,17,24,NULL,NULL),(45,17,3,NULL,NULL),(46,18,25,NULL,NULL),(47,18,26,NULL,NULL),(48,18,27,NULL,NULL),(49,19,28,NULL,NULL),(50,19,29,NULL,NULL),(51,19,30,NULL,NULL),(52,19,31,NULL,NULL),(53,20,3,NULL,NULL),(54,20,32,NULL,NULL),(55,20,33,NULL,NULL),(57,22,34,NULL,NULL),(58,22,35,NULL,NULL),(59,22,36,NULL,NULL),(60,22,37,NULL,NULL),(61,23,38,NULL,NULL),(62,23,39,NULL,NULL),(63,23,40,NULL,NULL),(64,24,41,NULL,NULL),(65,24,42,NULL,NULL),(66,24,40,NULL,NULL),(67,25,43,NULL,NULL),(68,25,44,NULL,NULL),(69,25,45,NULL,NULL),(70,25,46,NULL,NULL),(71,25,47,NULL,NULL),(72,26,48,NULL,NULL),(73,26,49,NULL,NULL),(74,26,45,NULL,NULL),(75,26,50,NULL,NULL),(76,27,51,NULL,NULL),(77,27,52,NULL,NULL),(78,27,53,NULL,NULL),(79,27,54,NULL,NULL),(80,28,55,NULL,NULL),(81,28,40,NULL,NULL),(82,28,45,NULL,NULL),(83,29,3,NULL,NULL),(84,29,56,NULL,NULL),(85,29,57,NULL,NULL),(86,29,58,NULL,NULL),(87,30,40,NULL,NULL),(88,30,55,NULL,NULL),(89,30,59,NULL,NULL),(90,30,60,NULL,NULL),(91,31,61,NULL,NULL),(92,31,62,NULL,NULL),(93,31,63,NULL,NULL),(94,31,64,NULL,NULL),(95,32,65,NULL,NULL),(96,32,66,NULL,NULL),(97,32,67,NULL,NULL),(98,33,68,NULL,NULL),(99,33,69,NULL,NULL),(100,34,70,NULL,NULL),(101,34,71,NULL,NULL),(102,34,72,NULL,NULL),(103,35,38,NULL,NULL),(104,35,30,NULL,NULL),(105,36,73,NULL,NULL),(106,36,74,NULL,NULL),(107,36,75,NULL,NULL),(108,37,76,NULL,NULL),(109,37,77,NULL,NULL),(110,37,78,NULL,NULL);
/*!40000 ALTER TABLE `job_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_types`
--

DROP TABLE IF EXISTS `job_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_types`
--

LOCK TABLES `job_types` WRITE;
/*!40000 ALTER TABLE `job_types` DISABLE KEYS */;
INSERT INTO `job_types` VALUES (1,'Full Time','2026-05-10 12:41:41','2026-05-10 12:41:41'),(2,'Part Time','2026-05-10 12:41:41','2026-05-10 12:41:41'),(3,'Contract','2026-05-10 12:41:41','2026-05-10 12:41:41'),(4,'Freelancer','2026-05-10 12:41:41','2026-05-10 12:41:41');
/*!40000 ALTER TABLE `job_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `gender_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_and_responsibility` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_incharge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  `experience_min` int DEFAULT NULL,
  `experience_max` int DEFAULT NULL,
  `currency_id` bigint unsigned DEFAULT NULL,
  `salary_from` decimal(10,2) DEFAULT NULL,
  `salary_to` decimal(10,2) DEFAULT NULL,
  `industry_type_id` bigint unsigned DEFAULT NULL,
  `job_type_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobs_job_code_unique` (`job_code`),
  KEY `jobs_job_category_id_foreign` (`job_category_id`),
  KEY `jobs_client_id_foreign` (`client_id`),
  KEY `jobs_currency_id_foreign` (`currency_id`),
  KEY `jobs_industry_type_id_foreign` (`industry_type_id`),
  KEY `jobs_job_type_id_foreign` (`job_type_id`),
  CONSTRAINT `jobs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jobs_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jobs_industry_type_id_foreign` FOREIGN KEY (`industry_type_id`) REFERENCES `industry_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jobs_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (4,'BJ-SAL-FU-0004','2026-05-11','2026-05-25','No Preference','Business Development Executive','<p><strong>Male candidates preferred</strong></p><p><strong>Freshers are welcome to apply</strong></p><p><strong>Good communication and interpersonal skills</strong></p><p><strong>Basic computer knowledge</strong></p><p><strong>Positive attitude and willingness to learn</strong></p><p><strong>Ability to work in a target-oriented environment</strong></p>',NULL,'Deekshith',NULL,NULL,'Kozhikode',1,'2026-05-11 06:11:25','2026-05-11 06:11:25',1,1,3,1,10000.00,13000.00,12,1),(5,'BJ-MAR-FU-0005','2026-05-11','2026-06-02','No Preference','SEO Specialist','<p><strong>Requirements:</strong></p><ul><li>2 to 3 years of experience in SEO</li><li>Agency experience preferred</li><li>Strong understanding of on-page, off-page, and technical SEO</li></ul><p><br></p>',NULL,'Hiba','best4uccj@gmail.com',NULL,'Kozhikode',2,'2026-05-11 07:05:38','2026-05-11 07:05:38',25,2,3,1,25000.00,30000.00,2,1),(6,'BJ-OPE-FU-0006','2026-05-11','2026-05-31','Male','Gift section Supervisor','<p>Required Skills</p><ul><li>Product merchandising and display management</li><li>Customer service and communication skills</li><li>Knowledge of dates, nuts, or chocolate product segments</li><li>Basic reporting and operational management</li></ul><p>Requirements</p><ul><li>Experience in dates, nuts, or chocolate segment is mandatory</li><li>Strong leadership and organizational skills</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',3,'2026-05-11 08:56:54','2026-05-11 10:09:36',8,2,3,1,25000.00,30000.00,10,1),(7,'BJ-MAR-FU-0007','2026-05-11','2026-05-31','No Preference','Performance Marketing Specialist (Google Ads & Paid Media)','<p>Responsibilities</p><ul><li>Strong analytical and reporting skills</li><li>Campaign optimization and budget management</li><li>Keyword research and audience targeting</li><li>Google Analytics and conversion tracking</li><li>Communication and client handling skills</li><li>Time management and multitasking ability</li></ul><p>Requirements</p><ul><li>Agency experience preferred</li><li>Proven track record in lead generation and campaign performance</li><li>Ability to handle multiple projects simultaneously</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode & Kochi',2,'2026-05-11 09:14:41','2026-05-11 10:57:01',25,2,3,1,25000.00,30000.00,2,1),(8,'BJ-MAR-FU-0008','2026-05-11','2026-05-31','No Preference','Digital Marketing Executive','<p>Responsibilities</p><ul><li>Social media marketing and management</li><li>Google Ads and Meta Ads knowledge</li><li>Content marketing and campaign planning</li><li>Analytics and reporting skills</li><li>Creative thinking and communication skills</li><li>Lead generation and audience targeting</li></ul><p>Requirements</p><ul><li>Minimum 2+ years of experience in digital marketing</li><li>Strong understanding of online marketing strategies</li><li>Experience handling social media and paid campaigns</li><li>Knowledge of Canva, Meta Business Suite, and Google tools is preferred</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',2,'2026-05-11 10:50:40','2026-05-11 10:56:46',NULL,2,4,1,20000.00,30000.00,2,1),(9,'BJ-FIN-FU-0009','2026-05-11','2026-05-31','No Preference','Accountant','<h3><br></h3><ul><li>Accounting and bookkeeping knowledge</li><li>Tally ERP / accounting software proficiency</li><li>GST and taxation basics</li><li>Time management and organizational skills</li><li>Communication and coordination abilities</li></ul><h3>Requirements</h3><ul><li>Minimum 1 year of accounting experience</li><li>Bachelor’s degree in Commerce or related field preferred</li><li>Knowledge of Tally, Excel, and accounting procedures</li><li>Ability to manage financial records</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kochi',7,'2026-05-11 10:56:26','2026-05-11 10:56:26',10,1,2,1,16000.00,20000.00,9,1),(10,'BJ-HUM-FU-0010','2026-05-11','2026-05-31','Female','Placement Intern','<p><strong>Key Responsibilities:</strong></p><ul><li>Coordinate placement activities and student communications</li><li>Assist in scheduling interviews and placement drives</li><li>Maintain candidate databases and placement records</li><li>Communicate with students regarding job opportunities</li><li>Support the placement team in daily operations</li><li>Follow up with candidates and employers for updates</li><li>Prepare reports and maintain documentation</li></ul><p><strong>Requirements:</strong></p><ul><li>Female candidates preferred</li><li>Freshers are welcome to apply</li><li>Diploma or Bachelor’s Degree required</li><li>Smart, vibrant, and professional personality</li><li>Good communication and interpersonal skills</li><li>Basic computer knowledge and organizational skills</li></ul><p><br></p>',NULL,'Deekshith','best4uccj@gmail.com',NULL,'kozhikode',6,'2026-05-11 11:57:00','2026-05-11 11:57:00',21,0,1,1,12000.00,12000.00,12,1),(11,'BJ-FIN-FU-0011','2026-05-11','2026-05-31','Male','Accountant','<p><strong>Key Responsibilities:</strong></p><ul><li>Manage daily accounting and bookkeeping activities</li><li>Handle accounts payable and receivable</li><li>Prepare invoices, vouchers, and financial reports</li><li>Maintain accurate financial records and documentation</li><li>Reconcile bank statements and monitor transactions</li><li>Assist in GST filing and other statutory compliance processes</li><li>Coordinate with management regarding financial updates</li><li>Support budgeting and expense tracking activities</li></ul><p><strong>Requirements:</strong></p><ul><li>Minimum 2+ years of accounting experience</li><li>Strong knowledge of accounting principles and financial reporting</li><li>Proficiency in Tally, MS Excel, or accounting software</li><li>Good analytical and organizational skills</li><li>Attention to detail and accuracy in work</li><li>Ability to manage tasks independently</li></ul>',NULL,'Deekshith','best4ucjj@gmail.com',NULL,'Kozhikode',7,'2026-05-11 12:02:53','2026-05-11 12:02:53',34,1,3,1,15000.00,20000.00,17,1),(12,'BJ-ITS-FU-0012','2026-05-11','2026-05-31','No Preference','Junior Web Developer','<p>Responsibilities</p><ul><li>Develop and maintain websites using WordPress and Shopify</li><li>Customize website layouts, themes, and basic functionalities</li><li>Knowledge of WordPress and Shopify</li><li>Basic understanding of HTML, CSS, and JavaScript</li><li>Responsive web design skills</li></ul><p>Requirements</p><ul><li>Minimum 6 months of experience or internship in web development</li><li>Ability to work on WordPress and Shopify projects</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',5,'2026-05-11 12:06:36','2026-05-11 12:06:48',33,1,1,1,15000.00,18000.00,1,1),(14,'BJ-SAL-FU-0014','2026-05-12','2026-05-31','No Preference','Business Development Executive','<p><strong>Key Responsibilities:</strong></p><ul><li>Identify and generate new business opportunities</li><li>Promote products/services to potential clients</li><li>Understand client requirements and provide suitable solutions</li><li>Build and maintain strong customer relationships</li><li>Conduct follow-ups and support sales conversions</li><li>Coordinate with technical and internal teams</li><li>Achieve sales targets and business goals</li><li>Maintain sales reports and client records</li></ul><p><strong>Requirements:</strong></p><ul><li>Freshers and experienced candidates can apply</li><li>Interest in technical sales is mandatory</li><li>Good communication and negotiation skills</li><li>Basic technical understanding and willingness to learn</li><li>Confident, proactive, and target-oriented approach</li><li>Ability to work independently and as part of a team</li></ul><p><br></p>',NULL,'Deekshith','best4uccj@gmail.com',NULL,'Kozhikode',1,'2026-05-12 06:17:32','2026-05-12 06:17:32',35,0,3,1,15000.00,24999.00,2,1),(15,'BJ-OPE-FU-0015','2026-05-12','2026-06-09','Male','Branch Manager','<p><strong>Key Responsibilities:</strong></p><ul><li>Oversee daily branch operations and ensure smooth functioning</li><li>Lead, manage, and motivate the team to achieve targets</li><li>Monitor branch performance and implement growth strategies</li><li>Handle student/client inquiries and maintain strong relationships</li><li>Coordinate admissions, operations, and support activities</li><li>Track sales performance and ensure achievement of branch goals</li><li>Prepare reports and update management regularly</li><li>Maintain a positive and productive work environment</li></ul><p><strong>Requirements:</strong></p><ul><li>Minimum 3 to 5 years of experience in branch management or team handling</li><li>Strong leadership and team management skills</li><li>Excellent communication and interpersonal abilities</li><li>Ability to work in a target-driven environment</li><li>Good organizational and problem-solving skills</li><li>Experience in the EdTech industry will be an added advantage</li></ul><p><br></p>',NULL,'Deekshith C','best4uccj@gmail.com',NULL,'Kozhikode',3,'2026-05-12 07:09:27','2026-05-12 07:09:27',37,3,5,1,35000.00,40000.00,12,1),(16,'BJ-SAL-FU-0016','2026-05-12','2026-05-31','Female','Academic Counsellors','<p><strong>Key Responsibilities:</strong></p><ul><li>Counsel students and parents regarding courses and programs</li><li>Explain course details, career opportunities, and admission procedures</li><li>Handle inquiries through calls, messages, and direct interactions</li><li>Follow up with prospective students and maintain records</li><li>Support admission and enrollment processes</li><li>Maintain positive relationships with students and parents</li><li>Coordinate with internal teams for smooth operations</li><li>Achieve assigned counselling and admission targets</li></ul><p><strong>Requirements:</strong></p><ul><li>Female candidates preferred</li><li>Freshers and experienced candidates can apply</li><li>Strong communication and interpersonal skills</li><li>Positive attitude and convincing ability</li><li>Basic computer knowledge</li><li>Ability to work in a target-oriented environment</li></ul><p><br></p>',NULL,'Deekshith','best4uccj@gmail.com',NULL,'Kozhikode',1,'2026-05-12 07:16:48','2026-05-12 07:16:48',37,0,3,1,15000.00,25000.00,12,1),(17,'BJ-FIN-FU-0017','2026-05-13','2026-05-13','Male','Cashier & Admin','<p>Responsibilities:</p><ul><li>Handle daily cash transactions and billing</li><li>Maintain cash records and basic accounts</li><li>Support administrative and office coordination activities</li><li>Prepare reports and maintain documentation</li><li>Assist in day-to-day operational tasks</li><li>Ensure proper record keeping and accuracy in transactions</li></ul><p>Requirements:</p><ul><li>Male candidates preferred</li><li>Freshers and experienced candidates can apply</li><li>9-hour shift (7:00 AM – 4:00 PM) or (1:00 PM – 10:00 PM)</li><li>Basic accounting knowledge is preferred</li><li>Good communication and organizational skills</li><li>Basic computer knowledge is required</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',7,'2026-05-13 10:33:57','2026-05-14 05:48:41',52,0,2,1,14000.00,15000.00,9,1),(18,'BJ-SAL-FU-0018','2026-05-14','2026-06-11','No Preference','Business Analyst','<p>Responsibilities</p><ul><li>Able to independently manage reporting and coordination tasks</li><li>Strong knowledge of indirect taxation and compliance</li><li>Comfortable working with data, reports, and operational processes</li></ul><p>Required Skills</p><ul><li>3–4 years of experience as a Business Analyst or Finance Analyst</li><li>Strong understanding of GST, TDS, invoicing, and taxation.</li><li>Experience in financial reporting and MIS preparation.</li><li>Proficiency in Excel, ERP systems, and accounting software.</li><li>Good communication and stakeholder management skills.</li><li>Ability to interpret business data and generate insights.</li></ul><h3><br></h3><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kochi',1,'2026-05-14 05:48:27','2026-05-14 05:48:27',44,3,4,1,45000.00,50000.00,9,1),(19,'BJ-DES-FU-0019','2026-05-14','2026-06-12','Male','Interior Designer','<p>Responsibilities</p><ul><li>Create interior design concepts and space planning layouts</li><li>Prepare 2D &amp; 3D drawings using design software</li><li>Coordinate with clients to understand requirements</li></ul><p>Requirements</p><ul><li>Male candidate preferred</li><li>3–5 years of experience in interior designing</li><li>Diploma/Degree in Interior Design or related field</li><li>Experience in residential/commercial projects preferred</li><li>Ability to manage projects independently</li><li>Strong portfolio and practical site knowledge preferred</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',13,'2026-05-14 06:01:14','2026-05-14 06:01:14',45,3,5,1,25000.00,35000.00,17,1),(20,'BJ-EDU-FU-0020','2026-05-14','2026-06-14','Female','Care Taker','<p>&nbsp;<strong>Responsibilities</strong></p><ul><li>Assist in daily care and support activities</li><li>Maintain cleanliness and hygiene of the assigned area</li><li>Support basic supervision and monitoring duties</li></ul><p><strong>Requirements</strong></p><ul><li>Female candidate preferred</li><li>Age below 38 years</li><li>0–1 year experience preferred</li><li>A neat and presentable appearance is expected</li><li>Should be disciplined, polite, and responsible</li><li>Ability to work Monday to Saturday from 8:00 AM to 5:30 PM</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',15,'2026-05-14 06:09:28','2026-05-14 06:09:28',19,0,1,1,10000.00,11000.00,12,1),(22,'BJ-MAR-FU-0022','2026-05-14','2026-06-14','No Preference','Graphic Designer','<p><strong>Responsibilities</strong></p><ul><li>Design creative visuals for social media, branding, advertisements, and marketing campaigns</li><li>Create posters, banners, brochures, logos, and digital creatives</li><li>Use AI tools to improve design workflow and content creation</li></ul><p><strong>Requirements</strong></p><ul><li>0–2 years of experience in graphic designing</li><li>Any gender can apply</li><li>Knowledge of AI tools and AI-assisted design workflows is required</li><li>Diploma/Degree/Certification in Graphic Design preferred</li><li>Strong creativity and attention to detail</li><li>Portfolio or sample work preferred</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',2,'2026-05-14 09:54:11','2026-05-14 09:54:11',54,0,2,1,10000.00,25000.00,2,1),(23,'BJ-MAR-FU-0023','2026-05-14','2026-06-14','No Preference','Graphic Designer','<p><strong>Responsibilities</strong></p><ul><li>Create designs for social media, branding, and marketing materials</li><li>Develop posters, banners, brochures, and promotional creatives</li><li>Edit images and prepare design files for print and digital us</li></ul><p><strong>Requirements</strong></p><ul><li>0–1 year experience in graphic designing</li><li>Any gender can apply</li><li>Basic knowledge of design software is required</li><li>Portfolio or sample works preferred</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',2,'2026-05-14 10:00:07','2026-05-14 10:00:07',18,0,1,1,15000.00,16000.00,2,1),(24,'BJ-MAR-FU-0024','2026-05-14','2026-06-14','No Preference','Graphic Designer Faculty','<p><strong>Responsibilities</strong></p><ul><li>Train students in graphic design concepts and software</li><li>Conduct practical and theory sessions on design tools</li><li>Guide students in creative projects and assignments</li><li>Support students in portfolio development</li><li>Stay updated with current design trends and tools</li></ul><p><strong>Requirements</strong></p><ul><li>6 months to 1 year of experience in graphic designing or teaching</li><li>Any gender can apply</li><li>Good practical knowledge of graphic design software</li><li>Passion for teaching and mentoring students</li><li>Strong communication and interpersonal skills&nbsp;</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',2,'2026-05-14 11:02:34','2026-05-14 11:02:34',55,0,1,1,15000.00,20000.00,2,1),(25,'BJ-ITS-FU-0025','2026-05-14','2026-06-14','Male','Business Development Executive','<p><strong>&nbsp;Responsibilities</strong></p><ul><li>Identify and develop new business opportunities</li><li>Generate leads through calls, meetings, and online platforms</li><li>Build and maintain strong client relationships</li><li>Coordinate with marketing and internal teams for business growth</li><li>Follow up on leads and maintain sales records</li><li>Support digital marketing and promotional activities</li></ul><p><strong>Requirements</strong></p><ul><li>Male candidate preferred</li><li>Minimum 1 year of experience in business development or sales</li><li>Fluent spoken and written English is mandatory</li><li>Knowledge of digital marketing is required</li><li>Strong confidence in client handling and communication</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',5,'2026-05-14 11:10:22','2026-05-14 11:10:22',57,1,3,1,25000.00,30000.00,1,1),(26,'BJ-MAR-FU-0026','2026-05-14','2026-06-14','No Preference','Digital Marketing Executive','<p><strong>&nbsp;Responsibilities</strong></p><ul><li>Plan, execute, and optimize digital marketing campaigns</li><li>Manage and monitor Meta Ads and Google Ads campaigns</li><li>Generate leads and improve campaign performance through paid marketing strategies</li></ul><p><strong>Requirements</strong></p><ul><li>2–3 years of experience in digital marketing</li><li>Hands-on experience in Meta and Google Ads is mandatory</li><li>Any gender can apply</li><li>Strong understanding of paid marketing strategies and analytics</li><li>Ability to manage multiple campaigns efficiently</li><li>Certification in Google Ads or Meta Ads is an advantage</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kannur',2,'2026-05-14 11:17:42','2026-05-14 11:17:42',46,2,3,1,20000.00,25000.00,10,1),(27,'BJ-MAR-FU-0027','2026-05-14','2026-06-14','No Preference','Social Media Manager','<p><strong>Responsibilities</strong></p><ul><li>Manage and handle social media accounts across multiple platforms</li><li>Plan and execute social media marketing strategies</li><li>Create content calendars and coordinate daily postings</li><li>Monitor engagement, comments, and audience interactions</li></ul><p><strong>Requirements</strong></p><ul><li>2–3 years of experience in social media management</li><li>Any gender can apply</li><li>Strong understanding of social media platforms and trends</li><li>Good communication and coordination skills</li><li>Ability to handle multiple accounts and campaigns</li><li>Experience with social media tools and scheduling platforms preferred</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kannur',2,'2026-05-14 11:21:37','2026-05-14 11:21:37',46,2,3,1,20000.00,25000.00,10,1),(28,'BJ-MAR-FU-0028','2026-05-14','2026-06-14','Male','Marketing Executive','<p><strong>Responsibilities</strong></p><ul><li>Promote company products and services to potential customers</li><li>Generate leads and support business development activities</li><li>Conduct field visits and client meetings when required</li><li>Coordinate marketing campaigns and promotional activities</li><li>Maintain customer relationships and follow up on inquiries</li></ul><p><strong>Requirements</strong></p><ul><li>Male candidate preferred</li><li>0–1 year of experience in marketing or sales</li><li>Freshers can also apply</li><li>Good communication and interpersonal skills</li><li>Ability to work independently and meet targets</li><li>Basic knowledge of marketing strategies preferred</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',2,'2026-05-14 11:26:27','2026-05-14 11:26:27',49,0,1,1,15000.00,16000.00,10,1),(29,'BJ-EDU-FU-0029','2026-05-14','2026-06-14','No Preference','Placement Officer','<p><strong>Responsibilities</strong></p><ul><li>Coordinate placement activities and student interviews</li><li>Build and maintain relationships with companies and recruiters</li><li>Schedule interviews, recruitment drives, and placement events</li><li>Support resume collection and candidate coordination</li><li>Follow up with recruiters and candidates during the hiring process</li></ul><p><strong>Requirements</strong></p><ul><li>Fresher or experienced candidates can apply</li><li>Any gender can apply</li><li>Good communication and coordination skills are required</li><li>Basic knowledge of recruitment or placement activities preferred</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',15,'2026-05-14 11:29:56','2026-05-14 11:29:56',50,0,1,1,10000.00,12000.00,12,1),(30,'BJ-MAR-FU-0030','2026-05-14','2026-06-14','Male','Marketing Executive','<p><strong>Responsibilities</strong></p><ul><li>Promote company services and generate new leads</li><li>Meet potential clients and explain company offerings</li><li>Support sales and marketing activities</li><li>Maintain customer relationships and handle inquiries</li></ul><p><strong>Requirements</strong></p><ul><li>Male candidate preferred</li><li>Freshers and experienced candidates can apply</li><li>Good communication and customer handling skills required</li><li>Basic knowledge of marketing strategies preferred</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Kozhikode',2,'2026-05-14 11:40:47','2026-05-14 11:40:47',50,0,1,1,15000.00,17000.00,12,1),(31,'BJ-DES-FU-0031','2026-05-14','2026-06-14','Female','Fashion Designer','<p><strong>Responsibilities</strong></p><ul><li>Create innovative fashion designs and collections</li><li>Develop sketches, patterns, and design concepts</li><li>Select fabrics, colors, and materials for garments</li><li>Coordinate with tailoring and production teams</li><li>Ensure quality and finishing standards in final products</li></ul><p><strong>Requirements</strong></p><ul><li>Female candidate preferred</li><li>Minimum 3 years of experience in fashion designing</li><li>Degree/Diploma in Fashion Designing or related field preferred</li><li>Strong creativity and design sense required</li><li>Knowledge of garment production and fabric selection preferred</li><li>Portfolio or sample work preferred</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Idukki',13,'2026-05-14 12:01:49','2026-05-14 12:01:49',58,3,4,1,25000.00,30000.00,10,1),(32,'BJ-FIN-FU-0032','2026-05-14','2026-06-14','No Preference','Accountant','<p><strong>Responsibilities</strong></p><ul><li>Maintain daily accounting entries and bookkeeping</li><li>Handle invoices, receipts, and payment records</li><li>Support preparation of basic financial reports</li></ul><p><strong>Requirements</strong></p><ul><li>Fresher can apply</li><li>Any gender can apply</li><li>Basic understanding of accounting principles required</li><li>Commerce background preferred</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',7,'2026-05-14 12:26:21','2026-05-14 12:26:21',59,0,0,1,7000.00,7500.00,13,1),(33,'BJ-HOS-FU-0033','2026-05-15','2026-06-15','No Preference','Ticket booking Executive','<p><strong>Responsibilities</strong></p><ul><li>Handle ticket booking and reservation processes for customers.</li><li>Assist customers with travel schedules, fares, and booking details.</li><li>Respond to customer inquiries through phone, email, or direct interaction.</li></ul><p><strong>Required Skills</strong></p><ul><li>Freshers are welcome to apply.</li><li>Male and Female candidates can apply.</li><li>Basic English communication preferred.</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',11,'2026-05-15 09:57:27','2026-05-15 09:57:27',59,0,1,1,7000.00,8000.00,13,1),(34,'BJ-SAL-FU-0034','2026-05-15','2026-06-15','Male','Sales Executive','<p><strong>Responsibilities</strong></p><ul><li>Identify and generate new sales opportunities in the market.</li><li>Meet potential customers and explain products/services effectively.</li><li>Achieve monthly and quarterly sales targets.</li><li>Build and maintain strong customer relationships.</li></ul><p><strong>Required Skills</strong></p><ul><li>0–1 year of experience in sales preferred.</li><li>Freshers with good communication skills can also apply.</li><li>Male candidates preferred.</li><li>Valid driving license will be an added advantage.</li></ul><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',1,'2026-05-15 11:56:50','2026-05-15 11:56:50',61,0,1,1,20000.00,25000.00,16,1),(35,'BJ-MAR-FU-0035','2026-05-15','2026-06-15','No Preference','Graphic Designer','<p><strong>Responsibilities</strong></p><ul><li>Design creative graphics for social media, advertisements, banners, brochures, and promotional materials.</li><li>Develop visual concepts based on company requirements and branding guidelines.</li><li>Edit images, videos, and marketing creatives when required.</li><li>Collaborate with the marketing and content teams for campaign designs.</li></ul><p><strong>Required Skills</strong></p><ul><li>Diploma/Degree in Graphic Design, Multimedia, Visual Communication, or related field preferred.</li><li>Freshers and experienced candidates can apply.</li><li>Portfolio of previous design work.</li><li>Male and Female candidates are welcome to apply.</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',2,'2026-05-15 12:02:41','2026-05-15 12:02:41',62,0,2,1,10000.00,25000.00,2,1),(36,'BJ-MAR-FU-0036','2026-05-15','2026-06-15','No Preference','Videographer cum Video editor','<p><strong>Responsibilities</strong></p><ul><li>Shoot and edit videos for social media, advertisements, events, and promotional campaigns.</li><li>Handle camera setup, lighting, audio, and video production equipment.</li><li>Collaborate with the marketing and creative team for content planning.</li><li>Maintain and organize video files and production equipment.</li><li>Stay updated with current video editing trends and social media content styles.</li></ul><p><strong>Eligibility Criteria</strong></p><ul><li>Freshers and experienced candidates can apply.</li><li>Portfolio or sample video work is an added advantage.</li><li>Male and Female candidates are welcome to apply.&nbsp;</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',2,'2026-05-15 12:06:33','2026-05-15 12:06:33',62,0,2,1,10000.00,25000.00,2,1),(37,'BJ-HUM-FU-0037','2026-05-15','2026-06-15','No Preference','HR cum Admin','<p><strong>Responsibilities</strong>.</p><ul><li>Handle employee attendance, payroll, and leave management.</li><li>Coordinate recruitment, onboarding, and employee documentation.</li><li>Supervise team performance and monitor work progress.</li><li>Maintain employee records and HR-related documents.</li></ul><p><strong>Required Skills</strong></p><ul><li>Bachelor’s degree in HR, Business Administration, Management, or related field preferred.</li><li>Freshers and experienced candidates can apply.</li><li>Male and Female candidates are welcome to apply.</li></ul><p><br></p><p><br></p>',NULL,'Hiba','recruiter@best4ucareers.com',NULL,'Malappuram',6,'2026-05-15 12:29:45','2026-05-15 12:29:45',59,0,1,1,15000.00,16000.00,13,1);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'App\\Models\\JobApplication',1,'4dca89fb-b5af-421a-b4a5-6f4802a8979a','resume','CV_Abdulla Ishaq','CV_Abdulla-Ishaq.pdf','application/pdf','public','public',206573,'[]','[]','[]','[]',1,'2026-04-02 12:58:32','2026-04-02 12:58:32'),(2,'App\\Models\\JobApplication',2,'7db782e9-d582-4e27-b1c9-3398432b5103','resume','Jigar Shah _Dubai','Jigar-Shah-_Dubai.pdf','application/pdf','public','public',500760,'[]','[]','[]','[]',1,'2026-04-29 09:22:15','2026-04-29 09:22:15'),(3,'App\\Models\\JobApplication',3,'a7f02e3d-bddf-4618-9666-603f06224d01','resume','Yusuf_CV','Yusuf_CV.pdf','application/pdf','public','public',298045,'[]','[]','[]','[]',1,'2026-04-29 11:29:19','2026-04-29 11:29:19'),(10,'App\\Models\\JobApplication',4,'61959c61-49e8-460a-b7ae-e88ca7a4d3cf','resume','1778087507546','1778087507546.pdf','application/pdf','s3','s3',292456,'[]','[]','[]','[]',1,'2026-05-07 07:39:35','2026-05-07 07:39:35'),(11,'App\\Models\\JobApplication',5,'d6c9fff6-70b3-4c1b-9968-dcd0447d5572','resume','Surya Krishna CV (1)','Surya-Krishna-CV-(1).pdf','application/pdf','s3','s3',142736,'[]','[]','[]','[]',1,'2026-05-11 06:12:59','2026-05-11 06:12:59'),(12,'App\\Models\\JobApplication',6,'7a72d263-ff2e-4222-863b-b9e4e13692e3','resume','Ahmed Al Amin CV','Ahmed-Al-Amin-CV.pdf','application/pdf','s3','s3',158290,'[]','[]','[]','[]',1,'2026-05-11 07:07:08','2026-05-11 07:07:08');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_03_06_083640_create_personal_access_tokens_table',1),(5,'2026_03_06_101928_create_job_categories_table',1),(6,'2026_03_06_101929_create_clients_table',1),(7,'2026_03_06_101930_create_jobs_table',1),(8,'2026_03_06_101931_create_job_applications_table',1),(9,'2026_03_06_123406_modify_jobs_and_create_skills_table',1),(10,'2026_03_06_190126_create_currencies_table',1),(11,'2026_03_06_190135_add_details_to_jobs_table',1),(12,'2026_03_07_073819_create_media_table',1),(13,'2026_03_07_074225_make_job_id_nullable_in_job_applications',1),(14,'2026_03_07_101253_create_permission_tables',1),(15,'2026_04_23_043650_add_hr_details_to_clients_table',2),(16,'2026_04_23_044908_create_industry_types_table',2),(17,'2026_04_23_045036_add_new_fields_to_jobs_table',2),(18,'2026_05_10_115701_create_job_types_table',3),(19,'2026_05_10_115702_add_job_type_id_to_jobs_table',3),(20,'2026_05_10_122939_add_symbol_to_job_categories_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(1,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view roles','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(2,'create roles','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(3,'edit roles','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(4,'delete roles','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(5,'view categories','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(6,'create categories','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(7,'edit categories','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(8,'delete categories','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(9,'view clients','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(10,'create clients','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(11,'edit clients','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(12,'delete clients','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(13,'view jobs','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(14,'create jobs','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(15,'edit jobs','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(16,'delete jobs','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(17,'view applications','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(18,'delete applications','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(19,'view skills','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(20,'create skills','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(21,'edit skills','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(22,'delete skills','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(23,'view currencies','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(24,'create currencies','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(25,'edit currencies','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(26,'delete currencies','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(27,'view industry-types','web','2026-04-24 08:38:40','2026-04-24 08:38:40'),(28,'create industry-types','web','2026-04-24 08:38:40','2026-04-24 08:38:40'),(29,'edit industry-types','web','2026-04-24 08:38:40','2026-04-24 08:38:40'),(30,'delete industry-types','web','2026-04-24 08:38:40','2026-04-24 08:38:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queue_jobs`
--

DROP TABLE IF EXISTS `queue_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `queue_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `queue_jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queue_jobs`
--

LOCK TABLES `queue_jobs` WRITE;
/*!40000 ALTER TABLE `queue_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `queue_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(9,2),(13,2),(14,2),(15,2),(16,2),(17,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super-admin','web','2026-04-01 09:00:22','2026-04-01 09:00:22'),(2,'hr','web','2026-04-01 09:00:22','2026-04-01 09:00:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skills_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'Creative Thinking','2026-04-02 12:53:53','2026-04-02 12:53:53'),(2,'accounting','2026-05-07 07:29:15','2026-05-07 07:29:15'),(3,'Strong Communication','2026-05-11 06:11:25','2026-05-11 06:11:25'),(4,'SEO','2026-05-11 07:05:38','2026-05-11 07:05:38'),(5,'Gift section operations management','2026-05-11 08:56:54','2026-05-11 08:56:54'),(6,'Inventory control and stock management','2026-05-11 08:56:54','2026-05-11 08:56:54'),(7,'Team leadership and staff coordination','2026-05-11 08:56:54','2026-05-11 08:56:54'),(8,'Google Ads and paid media management','2026-05-11 09:14:41','2026-05-11 09:14:41'),(9,'Meta Ads/Facebook Ads','2026-05-11 09:14:41','2026-05-11 09:14:41'),(10,'Campaign optimization and budget management','2026-05-11 09:14:41','2026-05-11 09:14:41'),(11,'Tally ERP','2026-05-11 10:56:26','2026-05-11 10:56:26'),(12,'MS Excel','2026-05-11 10:56:26','2026-05-11 10:56:26'),(13,'Recruitment','2026-05-11 11:57:00','2026-05-11 11:57:00'),(14,'negotiation','2026-05-11 11:57:00','2026-05-11 11:57:00'),(15,'Wordpress','2026-05-11 12:06:36','2026-05-11 12:06:36'),(16,'Shopify','2026-05-11 12:06:36','2026-05-11 12:06:36'),(17,'HTML','2026-05-11 12:06:36','2026-05-11 12:06:36'),(18,'CSS','2026-05-11 12:06:36','2026-05-11 12:06:36'),(19,'Javascript','2026-05-11 12:06:36','2026-05-11 12:06:36'),(20,'Technical Sales','2026-05-12 06:17:32','2026-05-12 06:17:32'),(21,'Branch Operations Management','2026-05-12 07:09:27','2026-05-12 07:09:27'),(22,'Revenue generation','2026-05-12 07:09:27','2026-05-12 07:09:27'),(23,'Team Handling','2026-05-12 07:09:27','2026-05-12 07:09:27'),(24,'Documentation','2026-05-13 10:33:57','2026-05-13 10:33:57'),(25,'Knowledge of GST, TDS','2026-05-14 05:48:27','2026-05-14 05:48:27'),(26,'Finance','2026-05-14 05:48:27','2026-05-14 05:48:27'),(27,'Operations','2026-05-14 05:48:27','2026-05-14 05:48:27'),(28,'AutoCAD','2026-05-14 06:01:14','2026-05-14 06:01:14'),(29,'SketchUp / 3ds Max / V-Ray','2026-05-14 06:01:14','2026-05-14 06:01:14'),(30,'Creativity & Visualization Skills','2026-05-14 06:01:14','2026-05-14 06:01:14'),(31,'Interior Styling & Material Knowledge','2026-05-14 06:01:14','2026-05-14 06:01:14'),(32,'Caring and patient attitude','2026-05-14 06:09:28','2026-05-14 06:09:28'),(33,'Responsibility and punctuality','2026-05-14 06:09:28','2026-05-14 06:09:28'),(34,'Adobe Photoshop/Adobe Illustrator & Canva / Figma','2026-05-14 09:54:11','2026-05-14 09:54:11'),(35,'Creativity & Visual Communication','2026-05-14 09:54:11','2026-05-14 09:54:11'),(36,'AI Design Tools (ChatGPT, Midjourney, Canva AI, Adobe Firefly, etc.)','2026-05-14 09:54:11','2026-05-14 09:54:11'),(37,'AI Integration Knowledge','2026-05-14 09:54:11','2026-05-14 09:54:11'),(38,'Adobe Photoshop & Adobe Illustrator','2026-05-14 10:00:07','2026-05-14 10:00:07'),(39,'Creativity & Visual Design Skills','2026-05-14 10:00:07','2026-05-14 10:00:07'),(40,'Communication & Time Management','2026-05-14 10:00:07','2026-05-14 10:00:07'),(41,'Teaching & Presentation Skills','2026-05-14 11:02:34','2026-05-14 11:02:34'),(42,'Creativity & Design Knowledge','2026-05-14 11:02:34','2026-05-14 11:02:34'),(43,'Fluent English Communication','2026-05-14 11:10:22','2026-05-14 11:10:22'),(44,'Business Development & Sales Skills','2026-05-14 11:10:22','2026-05-14 11:10:22'),(45,'Lead Generation','2026-05-14 11:10:22','2026-05-14 11:10:22'),(46,'MS Office / CRM Knowledge','2026-05-14 11:10:22','2026-05-14 11:10:22'),(47,'Digital Marketing Knowledge','2026-05-14 11:10:22','2026-05-14 11:10:22'),(48,'Meta Ads Manager & .Google Ads','2026-05-14 11:17:42','2026-05-14 11:17:42'),(49,'Campaign Optimization','2026-05-14 11:17:42','2026-05-14 11:17:42'),(50,'Communication & Strategic Thinking','2026-05-14 11:17:42','2026-05-14 11:17:42'),(51,'Meta Platforms (Facebook & Instagram)','2026-05-14 11:21:37','2026-05-14 11:21:37'),(52,'Content Planning & Scheduling','2026-05-14 11:21:37','2026-05-14 11:21:37'),(53,'Campaign Management','2026-05-14 11:21:37','2026-05-14 11:21:37'),(54,'Social Media Management','2026-05-14 11:21:37','2026-05-14 11:21:37'),(55,'Marketing & Sales Knowledge','2026-05-14 11:26:27','2026-05-14 11:26:27'),(56,'Client/Company Relationship Management','2026-05-14 11:29:56','2026-05-14 11:29:56'),(57,'Coordination & Organizational Skills','2026-05-14 11:29:56','2026-05-14 11:29:56'),(58,'Basic Recruitment Knowledge','2026-05-14 11:29:56','2026-05-14 11:29:56'),(59,'Client Handling','2026-05-14 11:40:47','2026-05-14 11:40:47'),(60,'Basic Computer Knowledge','2026-05-14 11:40:47','2026-05-14 11:40:47'),(61,'Fashion Designing','2026-05-14 12:01:49','2026-05-14 12:01:49'),(62,'Sketching & Illustration','2026-05-14 12:01:49','2026-05-14 12:01:49'),(63,'Creativity & Trend Awareness','2026-05-14 12:01:49','2026-05-14 12:01:49'),(64,'Styling & Garment Coordination','2026-05-14 12:01:49','2026-05-14 12:01:49'),(65,'Basic Accounting Knowledge','2026-05-14 12:26:21','2026-05-14 12:26:21'),(66,'MS Excel & Data Entry Skills','2026-05-14 12:26:21','2026-05-14 12:26:21'),(67,'Tally / Accounting Software (preferred)','2026-05-14 12:26:21','2026-05-14 12:26:21'),(68,'Good communication and customer handling skills','2026-05-15 09:57:27','2026-05-15 09:57:27'),(69,'Basic computer knowledge and typing skills.','2026-05-15 09:57:27','2026-05-15 09:57:27'),(70,'Sales and negotiation abilities','2026-05-15 11:56:50','2026-05-15 11:56:50'),(71,'Strong communication and interpersonal skills','2026-05-15 11:56:50','2026-05-15 11:56:50'),(72,'Basic computer and MS Office knowledge','2026-05-15 11:56:50','2026-05-15 11:56:50'),(73,'Adobe Premiere Pro, After Effects, Final Cut Pro, CapCut, or similar tools','2026-05-15 12:06:33','2026-05-15 12:06:33'),(74,'Creativity and storytelling ability.','2026-05-15 12:06:33','2026-05-15 12:06:33'),(75,'Attention to detail and visual aesthetics','2026-05-15 12:06:33','2026-05-15 12:06:33'),(76,'Strong leadership and team management skills','2026-05-15 12:29:45','2026-05-15 12:29:45'),(77,'Basic HR and payroll management knowledge','2026-05-15 12:29:45','2026-05-15 12:29:45'),(78,'Good communication and interpersonal abilities','2026-05-15 12:29:45','2026-05-15 12:29:45');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin@b4u.com','2026-03-31 20:11:54','$2y$12$P/MxKG6xR5TID5akICycqejFoDfwDNIarIIClV.ecFZL0LlBkyTZK','3VAcXZd3XU','2026-03-31 20:11:54','2026-03-31 20:11:54'),(2,'Super Admin','admin@example.com',NULL,'$2y$12$DEIHszo66us2JJ.9MEjgbOwZ9ffA06obRGXdMGzGNsQjYyWkRLp5e',NULL,'2026-04-01 09:00:22','2026-04-01 09:00:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-17  6:48:51
