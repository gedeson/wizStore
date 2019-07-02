-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: wizStore
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2019_06_27_080608_criar_usuario',1),('2019_06_27_173555_Product',1),('2019_06_28_144521_sale',1),('2019_06_30_110233_Solicitation',1),('2019_06_30_110301_purchase_solicitation',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `color` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(6,2) NOT NULL DEFAULT '0.00',
  `type` int(10) unsigned NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_color_type_index` (`color`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Camisa A',2,2,'5d1a71ff643c8.jpg',2.50,5,'','2019-07-01 19:50:07','2019-07-01 21:00:08'),(2,'Camisa V',5,5,'5d1a85bbea7af.jpg',3.50,1,'','2019-07-01 21:14:20','2019-07-01 21:14:20'),(3,'Camisa Verm',3,1,'5d1a88bc311a5.jpg',5.50,1,'','2019-07-01 21:27:08','2019-07-01 21:27:08'),(4,'Camisa Verm',5,3,'5d1b1e8e1bd92.jpg',35.99,9,'','2019-07-02 08:06:23','2019-07-02 08:12:07'),(5,'Camisa B',3,6,'5d1b1ec367747.jpg',45.99,4,'','2019-07-02 08:07:15','2019-07-02 08:11:53'),(6,'Camisa Verde',4,4,'5d1b1ee319fd3.jpg',29.99,5,'','2019-07-02 08:07:47','2019-07-02 08:11:46');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_solicitation`
--

DROP TABLE IF EXISTS `purchase_solicitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_solicitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `solicitation_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `purchase_solicitation_solicitation_id_foreign` (`solicitation_id`),
  KEY `purchase_solicitation_product_id_foreign` (`product_id`),
  CONSTRAINT `purchase_solicitation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `purchase_solicitation_solicitation_id_foreign` FOREIGN KEY (`solicitation_id`) REFERENCES `solicitation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_solicitation`
--

LOCK TABLES `purchase_solicitation` WRITE;
/*!40000 ALTER TABLE `purchase_solicitation` DISABLE KEYS */;
INSERT INTO `purchase_solicitation` VALUES (1,1,1,'2',2.00,'2019-07-01 21:07:40','2019-07-02 05:00:22'),(2,1,2,'2',3.50,'2019-07-01 21:14:30','2019-07-02 05:00:22'),(3,1,3,'2',5.50,'2019-07-01 21:28:31','2019-07-02 05:00:22'),(4,2,3,'2',5.50,'2019-07-02 06:22:26','2019-07-02 06:22:27'),(5,3,1,'2',2.50,'2019-07-02 07:03:29','2019-07-02 07:03:30'),(6,4,1,'2',2.50,'2019-07-02 07:11:06','2019-07-02 07:11:07'),(7,5,1,'2',2.50,'2019-07-02 07:11:11','2019-07-02 10:00:55'),(8,5,5,'2',45.99,'2019-07-02 08:12:31','2019-07-02 10:00:55'),(9,6,2,'2',3.50,'2019-07-02 09:57:13','2019-07-02 09:57:22'),(10,6,5,'2',45.99,'2019-07-02 09:57:19','2019-07-02 09:57:22'),(11,7,4,'2',35.99,'2019-07-02 09:57:43','2019-07-02 09:57:48'),(12,7,6,'2',29.99,'2019-07-02 09:57:47','2019-07-02 09:57:48'),(13,8,1,'2',2.50,'2019-07-02 09:58:07','2019-07-02 09:58:16'),(14,8,5,'2',45.99,'2019-07-02 09:58:13','2019-07-02 09:58:16');
/*!40000 ALTER TABLE `purchase_solicitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sale_user_id_foreign` (`user_id`),
  KEY `sale_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sale_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitation`
--

DROP TABLE IF EXISTS `solicitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `solicitation_user_id_foreign` (`user_id`),
  CONSTRAINT `solicitation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitation`
--

LOCK TABLES `solicitation` WRITE;
/*!40000 ALTER TABLE `solicitation` DISABLE KEYS */;
INSERT INTO `solicitation` VALUES (1,1,'2','2019-07-01 21:07:40','2019-07-02 05:00:22'),(2,1,'2','2019-07-02 06:22:25','2019-07-02 06:22:27'),(3,2,'2','2019-07-02 07:03:29','2019-07-02 07:03:31'),(4,1,'2','2019-07-02 07:11:06','2019-07-02 07:11:07'),(5,1,'2','2019-07-02 07:11:11','2019-07-02 10:00:55'),(6,2,'2','2019-07-02 09:57:13','2019-07-02 09:57:22'),(7,4,'2','2019-07-02 09:57:43','2019-07-02 09:57:48'),(8,5,'2','2019-07-02 09:58:07','2019-07-02 09:58:16');
/*!40000 ALTER TABLE `solicitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `role` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'gedeson.wasley@gmail.com','$2y$10$UKBK6sx/bw91VVIRscfCwuxvo565VALfgPrXQOqh.ztffcw.A5h7.','Gedeson',2,'1','luhySprIcRbCusrUqMXncsIrrkauxds7arw4YDA8g21esZNZzqUoODReumYe','2019-07-01 19:40:08','2019-07-02 09:58:29'),(2,'alfa@wiz.com','$2y$10$LN2G8DbGXPYV87ACOYvE0eg5dYkrhUzWQZJdOlDlgJKLbyz/2F2PS','Alfa',1,'2','xv45KLiz3Zw7Db2bdlmrU4UwG4LxkYcud6qbHc1CK6XEhxzxu2taxganGIWC','2019-07-02 07:03:14','2019-07-02 09:57:26'),(3,'admin@wiz.com','$2y$10$efBerAM3FBy/55g5MmYLj.fwB/RnNBfc1/hUQKsBz02eC4wKx8bzW','Administrador',1,'1','U1xqeUwEr2WeSsJE0HpV5oqpuOL1MbiiqSgMcM2trfMEPDLJRvpn3iP9lElp','2019-07-02 08:19:58','2019-07-02 10:00:43'),(4,'beta@wiz.com','$2y$10$P0h/CRAXstRlQ7picP4tXutZVikg8F3dMq1j7kyiYRHIKG5jL7Awy','Beta',3,'2','lqfGacNCgmzbgWNxHL3GS5Pr3ZHwdda0m7I3nQhWxvNSdEmnPi5pESTFEUVu','2019-07-02 08:22:15','2019-07-02 09:57:52'),(5,'gama@wiz.com','$2y$10$jCHyQXFAVJiV.AK59Of/zeak2mjbmubXWHqePWg9aE6dvF8M7ZUIu','Gama',1,'2','aWYrhCNaHuqhXpXbwpBkexsc2R2385UP0MLCe8lX38MiXGIll99bLBfHwmgB','2019-07-02 08:22:35','2019-07-02 09:58:19');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-02 11:32:15
