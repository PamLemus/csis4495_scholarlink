-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: scholarlink
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `course_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'SALES AND MARKETING LAW',NULL,NULL),(2,'REAL ESTATE LAW',NULL,NULL),(3,'EXCEL FOR BUSINESS',NULL,NULL),(4,'INTRODUCTION TO PROGRAMMING',NULL,NULL),(5,'VIRTUALIZATION AND COMPUTER NETWORKING',NULL,NULL),(6,'DATABASE',NULL,NULL),(7,'MACHINE LEARNING IN DATA SCIENCE',NULL,NULL),(8,'DIGITAL FORENSICS',NULL,NULL),(9,'CLOUD INFRASTRUCTURE',NULL,NULL),(10,'PERSONAL FINANCE',NULL,NULL),(11,'FINANCIAL STATEMENT ANALYSIS',NULL,NULL),(12,'PYTHON AND STATISTICS FOR FINANCIAL ANALYSIS',NULL,NULL),(13,'JAVASCRIPT ALGORITHMS AND DATA STRUCTURES',NULL,NULL),(14,'INTRODUCTION TO PHILOSOPHY',NULL,NULL),(15,'GRAPHIC DESIGN',NULL,NULL),(16,'INTRODUCTION TO ARTIFICIAL INTELLIGENCE (AI)',NULL,NULL),(17,'ROBOTICS',NULL,NULL),(18,'PROJECT MANAGEMENT',NULL,NULL),(19,'SUPPLY CHAIN',NULL,NULL),(20,'INTRODUCTION TO SOCIAL MEDIA MARKETING',NULL,NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0000_00_00_000000_create_websockets_statistics_entries_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_01_26_050136_add_new_fields_to_users_table',1),(7,'2023_01_26_051340_create_tutors_table',1),(8,'2023_01_26_051502_create_courses_table',1),(9,'2023_01_26_052509_create_sessions_table',1),(10,'2023_01_26_052533_create_tutor_courses_table',1),(11,'2023_01_26_052548_create_user_grade_table',1),(12,'2023_02_21_140452_create_jobs_table',1),(13,'2023_02_26_052656_add_new_fields_to_tutor_courses_table',1),(14,'2023_03_13_045335_modify_content_column_in_table_sessions',1),(15,'2023_03_26_222156_add_new_fields_to_user_grade_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_course_id` bigint(20) unsigned NOT NULL,
  `session_tutor_id` bigint(20) unsigned NOT NULL,
  `session_user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `sessions_session_course_id_foreign` (`session_course_id`),
  KEY `sessions_session_tutor_id_foreign` (`session_tutor_id`),
  KEY `sessions_session_user_id_foreign` (`session_user_id`),
  CONSTRAINT `sessions_session_course_id_foreign` FOREIGN KEY (`session_course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  CONSTRAINT `sessions_session_tutor_id_foreign` FOREIGN KEY (`session_tutor_id`) REFERENCES `tutors` (`tutor_id`) ON DELETE CASCADE,
  CONSTRAINT `sessions_session_user_id_foreign` FOREIGN KEY (`session_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,6,1,1,'This is an example of the notes.','2023-04-10 07:44:25','2023-04-10 07:44:25'),(2,16,1,2,'This is another example.','2023-04-10 07:46:03','2023-04-10 07:46:03'),(3,16,1,2,'This is another example.','2023-04-10 07:46:13','2023-04-10 07:46:13'),(4,16,1,2,'This is another example.','2023-04-10 07:46:23','2023-04-10 07:46:23'),(5,16,1,2,'This is another example.','2023-04-10 07:46:33','2023-04-10 07:46:33'),(6,16,1,2,'Introduction to Databases: A database is an organized collection of data that can be accessed and manipulated by computer software. Databases are used to store and retrieve information and are essential for modern data-driven applications. The key components of a database are tables columns and rows. Tables are used to store related data and columns define the type of data that can be stored in each field. Rows represent individual records in the database and are composed of values for each column. Relational Databases: Relational databases are the most common type of database used in modern applications. In a relational database data is organized into tables that are related to each other through common columns. A primary key is used to uniquely identify each row in a table and foreign keys are used to establish relationships between tables. SQL (Structured Query Language) is the standard language used to interact with relational databases.','2023-04-10 08:46:39','2023-04-10 08:46:39'),(7,6,1,2,'Introduction to Databases: A database is an organized collection of data that can be accessed and manipulated by computer software. Databases are used to store and retrieve information and are essential for modern data-driven applications. The key components of a database are tables columns and rows. Tables are used to store related data and columns define the type of data that can be stored in each field. Rows represent individual records in the database and are composed of values for each column. Relational Databases: Relational databases are the most common type of database used in modern applications. In a relational database data is organized into tables that are related to each other through common columns. A primary key is used to uniquely identify each row in a table and foreign keys are used to establish relationships between tables. SQL (Structured Query Language) is the standard language used to interact with relational databases.','2023-04-10 08:48:00','2023-04-10 08:48:00');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor_courses`
--

DROP TABLE IF EXISTS `tutor_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tc_course_id` bigint(20) unsigned NOT NULL,
  `tc_tutor_id` bigint(20) unsigned NOT NULL,
  `p_course_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_course_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tutor_courses_tc_course_id_foreign` (`tc_course_id`),
  KEY `tutor_courses_tc_tutor_id_foreign` (`tc_tutor_id`),
  CONSTRAINT `tutor_courses_tc_course_id_foreign` FOREIGN KEY (`tc_course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  CONSTRAINT `tutor_courses_tc_tutor_id_foreign` FOREIGN KEY (`tc_tutor_id`) REFERENCES `tutors` (`tutor_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_courses`
--

LOCK TABLES `tutor_courses` WRITE;
/*!40000 ALTER TABLE `tutor_courses` DISABLE KEYS */;
INSERT INTO `tutor_courses` VALUES (1,6,1,'Douglas College','Michael A',NULL,NULL),(2,16,1,'Douglas College','Rahim',NULL,NULL),(3,9,1,'UBC','John Jordan',NULL,NULL),(4,17,2,'Simon Fraser University','Georgina Saenz',NULL,NULL),(5,15,2,'UBC','Michael R',NULL,NULL),(6,10,2,'UBC','Michael Z',NULL,NULL);
/*!40000 ALTER TABLE `tutor_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutors` (
  `tutor_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_user_id` bigint(20) unsigned NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` enum('Associate degree','Bachelor degree','Master degree','Doctoral degree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutor_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tutor_id`),
  KEY `tutors_tutor_user_id_foreign` (`tutor_user_id`),
  CONSTRAINT `tutors_tutor_user_id_foreign` FOREIGN KEY (`tutor_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` VALUES (1,1,'Douglas College','Doctoral degree','Data Science','Experienced tutor in quantitative finance available for personalized one-on-one instruction. Specializing in financial modeling, risk management, and algorithmic trading. Let\'s unlock the power of finance together! Contact me to schedule your first session.','tutor_img/TDXYexe2UPvFXauYypaDswOfIFBG1DjrCKT8TWiH.jpg','2023-04-10 05:04:13','2023-04-10 05:51:54'),(2,2,'Harvard University','Doctoral degree','Data Science','Looking to learn data science? Let me guide you! As an experienced instructor with a deep passion for data analysis, I offer expert-level guidance on all aspects of data science.','tutor_img/9GSWUflni27SJU0OhZa38pnElxBjSMhdpPUjl16U.jpg','2023-04-10 05:08:46','2023-04-10 05:08:46'),(4,15,'Douglas College','Associate degree','Sales Representative','Seasoned sales representative with a talent for closing deals and building lasting relationships with clients. Let\'s take your sales skills to the next level!','tutor_img/goQyeDzFq9KXU2znCkQP6ABczfj6SwRIBXZGqMLA.jpg','2023-04-10 05:50:43','2023-04-10 05:50:43'),(5,17,'Douglas College','Master degree','Web Developer','Expert web developer with a strong background in front-end and back-end technologies. Let\'s build something amazing together!','tutor_img/A51fvjwkZqfP2dGoXT0SjSXoiHAdzTyXDlw8C8Bb.jpg','2023-04-10 05:51:34','2023-04-10 05:51:34'),(6,18,'BCIT','Bachelor degree','Industrial Engineer','Experienced industrial engineer offering expertise in a variety of programming languages and development tools. Let\'s take your skills to the next level!','tutor_img/AX8nGj9Rn6cenNgoMbwU86VGDe72sUy3JppF3RzG.jpg','2023-04-10 06:00:04','2023-04-10 06:00:04');
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_grade`
--

DROP TABLE IF EXISTS `user_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_grade` (
  `ug_user_id` bigint(20) unsigned NOT NULL,
  `ug_tutor_id` bigint(20) unsigned NOT NULL,
  `ug_course_id` bigint(20) unsigned NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int(10) unsigned NOT NULL,
  `take_again` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `user_grade_ug_user_id_foreign` (`ug_user_id`),
  KEY `user_grade_ug_tutor_id_foreign` (`ug_tutor_id`),
  KEY `user_grade_ug_course_id_foreign` (`ug_course_id`),
  CONSTRAINT `user_grade_ug_course_id_foreign` FOREIGN KEY (`ug_course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  CONSTRAINT `user_grade_ug_tutor_id_foreign` FOREIGN KEY (`ug_tutor_id`) REFERENCES `tutors` (`tutor_id`) ON DELETE CASCADE,
  CONSTRAINT `user_grade_ug_user_id_foreign` FOREIGN KEY (`ug_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_grade`
--

LOCK TABLES `user_grade` WRITE;
/*!40000 ALTER TABLE `user_grade` DISABLE KEYS */;
INSERT INTO `user_grade` VALUES (1,1,6,'4',3,1,'2023-04-10 06:30:19','2023-04-10 06:30:19'),(1,1,16,'5',4,0,'2023-04-10 06:32:10','2023-04-10 06:32:10'),(1,1,9,'3.5',2,1,'2023-04-10 06:34:18','2023-04-10 06:34:18'),(1,1,6,'5',2,1,'2023-04-10 07:43:27','2023-04-10 07:43:27'),(2,1,16,'5',1,0,'2023-04-10 07:45:44','2023-04-10 07:45:44'),(2,1,16,'5',1,1,'2023-04-10 08:46:09','2023-04-10 08:46:09'),(2,1,6,'3',4,0,'2023-04-10 08:47:50','2023-04-10 08:47:50');
/*!40000 ALTER TABLE `user_grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John','Smith','2000-11-11','Student','johns@example.ca',NULL,'$2y$10$rDuJ4uAKD9VhG5F/RhlJJumTpjcC3x/rB7gLN8l5oY/GRF9OJcIN6','user',NULL,'2023-04-10 04:52:08','2023-04-10 05:48:36'),(2,'Isabella','Taylor','2000-05-05','Student','isabella@sl.ca',NULL,'$2y$10$UJSGGhX5C87lqOXOHxWxSeqzax88oxPPS3FdYiROr4cD07kuB/Te6','user',NULL,'2023-04-10 04:52:54','2023-04-10 05:49:40'),(13,'admin','admin','2000-07-07','admin','admin@sl.ca',NULL,'$2y$10$bl.kCpCjyZ3dimjqf0Xyb.mb6zJQjXo8cP4Y46xX4zMQpgyVkNWqe','admin',NULL,'2023-04-10 05:23:19','2023-04-10 05:23:19'),(14,'John','Doe','1989-03-15','Software Engineer','john@example.ca',NULL,'$2y$10$fZMXlHHlNMHMMB4IYm3EIe4oIBRQDfcX2ifBshckSQKuTHe/BG7.W','user',NULL,'2023-04-10 05:31:11','2023-04-10 05:31:11'),(15,'Sarah','Jones','1992-05-22','Graphic Designer','sarah@example.ca',NULL,'$2y$10$WdcUu8WpaAnwlAnNGUMg1ue.ovmEfNNVMQFjbQozUzuxuUB4zUE5S','user',NULL,'2023-04-10 05:32:01','2023-04-10 05:32:01'),(16,'Olivia','Davis','1991-08-01','Marketing Manager','olivia@example.ca',NULL,'$2y$10$QRXjIGWMepj4BWrJH3N/peJ2z5jjVQd4hD6ty34wzqgOyOMppnOmG','user',NULL,'2023-04-10 05:33:36','2023-04-10 05:33:36'),(17,'Michael','Brown','1987-06-19','Sales Representative','michael@sl.ca',NULL,'$2y$10$yiLFjViqxLDH1HA75yvy8.n6kTjX3qGdD.lSj/Y.fxvSl11xI4J8e','user',NULL,'2023-04-10 05:34:20','2023-04-10 05:34:20'),(18,'Emily','Taylor','1998-02-11','Content Writer','emily@example.ca',NULL,'$2y$10$EaphiP1crHHWXlVwQ2IemumGQMIyb51YlbuHL8UIynHfoUv8Ao45i','user',NULL,'2023-04-10 05:35:34','2023-04-10 05:35:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-10 20:02:48
