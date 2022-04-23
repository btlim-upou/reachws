CREATE DATABASE  IF NOT EXISTS `reachdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `reachdb`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: reachdb
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int unsigned NOT NULL,
  `sent_by` int unsigned NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_message_room_user` (`room_id`,`sent_by`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,4,'Hello Mari!','',1,'2022-04-21 04:10:42','2022-04-21 04:10:42'),(2,1,10,'Hi John!','',1,'2022-04-21 04:10:50','2022-04-21 04:10:50'),(3,1,4,'How are you?','',1,'2022-04-21 04:17:04','2022-04-21 04:17:04'),(4,1,4,'Hi Jane','',1,'2022-04-21 05:54:40','2022-04-21 05:54:40'),(5,1,10,'Hello 123','',1,'2022-04-21 06:03:36','2022-04-21 06:03:36'),(6,1,10,'Hello again!','',1,'2022-04-21 09:58:13','2022-04-21 09:58:13'),(7,1,10,'Hi there!','',1,'2022-04-23 07:12:45','2022-04-23 07:12:45'),(8,1,19,'Hi Marie!','',1,'2022-04-23 07:25:23','2022-04-23 07:25:23'),(9,1,10,'Hello Berns','',1,'2022-04-23 07:26:29','2022-04-23 07:26:29'),(10,4,10,'Notice: Painting lessons for kids (below 12 years old). Schedule is every Sunday, 3pm. Total of 8 session starting on 8th May.','',1,'2022-04-23 07:30:34','2022-04-23 07:30:34'),(11,4,10,'Registration is at the building main office. Fee is 200 pesos per session.','',1,'2022-04-23 07:31:31','2022-04-23 07:31:31'),(12,4,10,'Students should bring there own painting materials. The instructor will create a new page for attendees about what painting materials to bring.','',1,'2022-04-23 07:32:45','2022-04-23 07:32:45'),(13,4,19,'Hi Marie! Thanks for the info. Are you also organizing painting lessons for teens/adults? My daughter is 15 years old.','',1,'2022-04-23 07:34:11','2022-04-23 07:34:11'),(14,1,10,'Notice: Block 219 Room 04-378 is renting out a room. 5,000Php/month, maximum of 2 occupants only.','',1,'2022-04-23 07:36:12','2022-04-23 07:36:12');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',3),(6,'0000_00_00_000000_create_websockets_statistics_entries_table',4),(7,'2019_12_14_000001_create_personal_access_tokens_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `room_user`
--

DROP TABLE IF EXISTS `room_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `status_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_room_member_room_id` (`room_id`),
  KEY `idx_room_member_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_user`
--

LOCK TABLES `room_user` WRITE;
/*!40000 ALTER TABLE `room_user` DISABLE KEYS */;
INSERT INTO `room_user` VALUES (1,1,1,1,NULL,NULL),(2,1,2,1,NULL,NULL),(3,1,3,1,NULL,NULL),(4,1,4,1,NULL,NULL),(5,1,9,1,NULL,NULL),(6,1,10,1,NULL,NULL),(7,2,3,1,NULL,NULL),(8,2,6,1,NULL,NULL),(9,2,7,1,NULL,NULL),(10,2,9,1,NULL,NULL),(23,2,10,1,NULL,NULL),(24,3,10,1,NULL,NULL),(25,1,19,1,NULL,NULL),(26,4,10,1,NULL,NULL),(27,4,19,1,NULL,NULL);
/*!40000 ALTER TABLE `room_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rooms_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'Rooms for Rent','Room rental inquiry',1,NULL,NULL),(2,'Kids\' Corner','Fun learning activities',1,NULL,NULL),(3,'New Movies','Movie tickets for sale',1,'2022-04-20 15:32:03','2022-04-20 15:32:03'),(4,'Painting Lessons for Kids','For kids below 12 years old. Includes oil painting, acrylic, and poster making.',1,'2022-04-23 07:28:28','2022-04-23 07:28:28');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'ACTIVE'),(2,'PENDING'),(3,'DELETED');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/assets/images/user-placeholder.png',
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `status_id` tinyint NOT NULL DEFAULT '1',
  `created_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'111111@test.com','Test','Test','','Test','$2y$10$qLOcqYm3TkzJrDb5GQYNV.fJi1wkmFMfsm8jsfj2eLn2WUSQisna2','/assets/images/user-placeholder.png',0,1,'2022-04-05 11:46:38','2022-04-05 11:46:38',NULL,NULL),(2,'test@test.com','Lein','Lein','','Lein','$2y$10$1tya4HeL7hAOd2qEk/VGC.myrnaWJ747rsob6u1xkhOaVl3/qHMj6','/assets/images/user-placeholder.png',0,1,'2022-04-05 11:48:12','2022-04-05 11:48:12',NULL,NULL),(3,'TESTING@TEST.COM','TEST','TEST','','TEST','$2y$10$yjzHM317kjCQKp086t1c7.eccKm4zpy9bR2lRXPr9p9zDijuO6/T2','/assets/images/user-placeholder.png',0,1,'2022-04-05 11:50:03','2022-04-05 11:50:03',NULL,NULL),(4,'ndaugherty@example.net','Johnny','John23','','Doer','$2y$10$ma9Q2OPTVeTeWpM6rCWjB./SBlOiMox.8FXowz5iABHM8JECIhZaO','/assets/images/user-placeholder.png',0,1,'2022-04-05 11:50:22','2022-04-05 11:50:22',NULL,'2UYWlNpoT8ly5XRrz6oOC7wb5I8Gp3CKd83DpUbkLuBvPvAw3mtfl62uDJXG'),(5,'JAZZ@JAZZ.com','Jazz','Jazz','','Jazz','$2y$10$cbrgOFbTdUTpYLAu.P6SJuMsaK8JLtSYO5mMzkRuMMIiXDM8POfG2','/assets/images/user-placeholder.png',0,1,'2022-04-05 11:52:14','2022-04-05 11:52:14',NULL,NULL),(6,'chantaljane@gmail.com','Chantal Jane','chantz','','Mendoza','$2y$10$IE4E3xVffGJEOL.gu0M8Vulo4azBBgfgbSW8Net2lR5fhiAU33WJa','/assets/images/user-placeholder.png',0,1,'2022-04-05 13:16:25','2022-04-05 13:16:25',NULL,NULL),(7,'haha@haha.com','Haha','Haha','','Haha','$2y$10$ufTqj2NEk/noUzuJMsQS2.MS7LgsIKwTjkV1MgJxx7YfA2Grgtody','/assets/images/user-placeholder.png',0,1,'2022-04-05 13:24:05','2022-04-05 13:24:05',NULL,NULL),(8,'dave.infante@g.c','test','test','','test','$2y$10$8AO8Nxp2q0zW3burwBCqgOkRpp6oneNTBsq3uVWIXz7Q0t7SHlLtS','/assets/images/user-placeholder.png',0,1,'2022-04-06 02:49:23','2022-04-06 02:49:23',NULL,NULL),(9,'gaypotato1990@gmail.com','Gerardsssss','Gerard','Yotoko','Potato','$2y$10$y2tgMlnYR/DtJW4ptQy/kuws6JJbnOBjgeSpnCvFuLJtuuYq8xe0y','/assets/images/user-placeholder.png',0,1,'2022-04-06 02:54:03','2022-04-06 02:54:03',NULL,NULL),(10,'qhill@example.org','Marie June','Marie Jane','Stiedemahoff','McGoodwin','$2y$10$ma9Q2OPTVeTeWpM6rCWjB./SBlOiMox.8FXowz5iABHM8JECIhZaO','/assets/images/user-placeholder.png',0,1,'2022-04-06 15:00:22','2022-04-06 15:00:22',NULL,NULL),(11,'ireichert@example.org','Andy','AndySS','VV','Ramos','$2y$10$DNOSeYqdBK7pRfWGERIM0OZLY9Ca4F3OsnLxb0kX9JM9gwKYsT1Pq','/assets/images/user-placeholder.png',0,1,'2022-04-06 16:26:34','2022-04-06 16:26:34',NULL,NULL),(12,'leni@yahoo.com','Leni','Leni--RR','','RR','$2y$10$s6q8RGzkPrjJ8hJtxfzxsub9V5hBkJ1d72oFhNnfimXA7K8GWF99i','/assets/images/user-placeholder.png',0,1,'2022-04-07 02:02:53','2022-04-07 02:02:53',NULL,NULL),(13,'test@g.c','test','test','','test','$2y$10$UYu7d/nWYVAsY4kTE1pOF./02puO3VHa14S36WNHlSL94brpvM7AC','/assets/images/user-placeholder.png',0,1,'2022-04-08 22:05:35','2022-04-08 22:05:35',NULL,'A83kBXJQiNoE7HGKQEKayyed17u2SuxsGD9BDxYxEAx24lpsIre5IeSHIC5c'),(14,'daveinfante95@gmail.com','dave','dave','','infante','$2y$10$rG8HcmqIDfeT8DHLc83/D.obyDqdVNPn9/3xaQbAhKGUPJVmV9iQm','/assets/images/user-placeholder.png',0,1,'2022-04-08 22:05:59','2022-04-08 22:05:59',NULL,'FBQFHLR09nNTaGHuxijcyRfr4Scs038PRUAtuXC2D0LDs9trp9YYmhfeAk88'),(15,'dave.infante@gmail.com','dave','dave','','infante','$2y$10$NPILzZLoYq0wYlnVKeI4Y.fm68uOWprqVaEUKgR.cLQgqxmCoTQx6','/assets/images/user-placeholder.png',0,1,'2022-04-08 22:18:41','2022-04-08 22:18:41',NULL,'BmiGTAwZCZ9pkkdcUSICQusKCTIXCbgrH95si3QB1ndTTxtgmcqA7Jq6aRnb'),(16,'dave.infante95@gmail.com','test','test','','test','$2y$10$8Z1vX9hXUgZ9TgW7iuZ1Tu3dBRKDaQzfBClfnwoRReuwn61zz/VV2','/assets/images/user-placeholder.png',0,1,'2022-04-08 22:35:27','2022-04-08 22:35:27',NULL,'p3JvBewcCMeY7gAtSMppipqA4KVVpfpEIecPJ6ihXyitHtw1GdmP4mVjgJwZ'),(17,'t@y.c','test','test','','test','$2y$10$Gt5la/hUUR5GoP0Zna.hROhgqL1NsNOtgE7CYGrL8/A//RJ7n3y6K','/assets/images/user-placeholder.png',0,1,'2022-04-09 04:41:28','2022-04-09 04:41:28',NULL,NULL),(18,'test123@test.com','Test','Test','','Test','$2y$10$PSF/rUquuELlLdERtDopM.sTH0nhAUVcM.c1Rj5uz8J6hhrJPdAoS','/assets/images/user-placeholder.png',0,1,'2022-04-16 06:07:13','2022-04-16 06:07:13',NULL,NULL),(19,'bkenlim@yahoo.com','Bernard','BerLim','T','Lim','$2y$10$aSYLCtSeF3MoEppTfispIO5iP4BKTuRHMhKzxMLjiF/3ko15Wbvgm','/assets/images/user-placeholder.png',0,1,'2022-04-16 07:29:58','2022-04-16 07:29:58',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_room_members`
--

DROP TABLE IF EXISTS `view_room_members`;
/*!50001 DROP VIEW IF EXISTS `view_room_members`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_room_members` AS SELECT 
 1 AS `room_id`,
 1 AS `user_id`,
 1 AS `room_name`,
 1 AS `nick_name`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_room_messages`
--

DROP TABLE IF EXISTS `view_room_messages`;
/*!50001 DROP VIEW IF EXISTS `view_room_messages`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_room_messages` AS SELECT 
 1 AS `id`,
 1 AS `message`,
 1 AS `room_id`,
 1 AS `room_name`,
 1 AS `sent_by`,
 1 AS `attachment`,
 1 AS `user_id`,
 1 AS `nick_name`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `email`,
 1 AS `created_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
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

--
-- Dumping routines for database 'reachdb'
--

--
-- Final view structure for view `view_room_members`
--

/*!50001 DROP VIEW IF EXISTS `view_room_members`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `view_room_members` AS select `rm`.`room_id` AS `room_id`,`rm`.`user_id` AS `user_id`,`r`.`name` AS `room_name`,`u`.`nick_name` AS `nick_name`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`u`.`email` AS `email` from ((`room_user` `rm` join `rooms` `r`) join `user` `u`) where ((`rm`.`room_id` = `r`.`id`) and (`rm`.`user_id` = `u`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_room_messages`
--

/*!50001 DROP VIEW IF EXISTS `view_room_messages`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `view_room_messages` AS select `m`.`id` AS `id`,`m`.`message` AS `message`,`m`.`room_id` AS `room_id`,`r`.`name` AS `room_name`,`m`.`sent_by` AS `sent_by`,`m`.`attachment` AS `attachment`,`u`.`id` AS `user_id`,`u`.`nick_name` AS `nick_name`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`u`.`email` AS `email`,`m`.`created_at` AS `created_at` from ((`messages` `m` join `user` `u`) join `rooms` `r`) where ((`m`.`sent_by` = `u`.`id`) and (`m`.`room_id` = `r`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-23 23:45:38
