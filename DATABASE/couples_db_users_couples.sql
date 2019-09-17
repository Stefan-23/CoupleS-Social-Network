-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: couples_db
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users_couples`
--

DROP TABLE IF EXISTS `users_couples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users_couples` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(45) NOT NULL,
  `user_lastname` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_posts_idx` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_couples`
--

LOCK TABLES `users_couples` WRITE;
/*!40000 ALTER TABLE `users_couples` DISABLE KEYS */;
INSERT INTO `users_couples` VALUES (10,'admin','admin','admin','$2y$10$iCm3a23WYLAmhIh/A3kCD.OGWttqRBSqYTN.J6vOTtQWBO0.OOJd2','admin@gmail.com','Admin'),(11,'Stefan','Sladja','StefanSladja','$2y$10$WHpS47PDvT3bz5IavTnRdeb1A46FXPKNDbY.oulIXHBDtTLcu7C96','sdrmanic@gmail.com','Serbia'),(12,'Darko','Marija','DarkoMarija','$2y$10$m0GrgpM.LIveGTohm69GI.scmJz2HBJWinAfO.R7LJ3eHVVAt1lrK','marija_srb@gmail.com','Serbia'),(13,'Marija','Aleksandar','MarijaAleksandar','$2y$10$9RX5WTyfXy.aCPOiTBmYIur.sdftuy8k7o.EUuMvE6iULhiSmMTJO','aleksa@gmail.com','Germany'),(14,'Dino','Emina','Stefan97','$2y$10$H37jwaGNSaGoyAO/0.G2e.AdY8U9aD7bHKNkRLM9FGwQJqGBo9.LK','trane.gettingup20@gmail.com','England');
/*!40000 ALTER TABLE `users_couples` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-17  3:20:01
