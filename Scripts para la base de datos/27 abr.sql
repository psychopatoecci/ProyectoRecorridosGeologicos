-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: Recorrido
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.22-MariaDB

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
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(255) NOT NULL,
  `link_path` text NOT NULL,
  `description` text NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `sequence_in_page` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_page` (`page_id`),
  CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,'home','resources/home/carousel/01.png','','image',0),(2,'home','resources/home/carousel/02.png','','image',0),(3,'home','resources/home/carousel/03.png','','image',0),(4,'home','resources/home/carousel/04.png','','image',0),(5,'home','resources/home/carousel/arco_en_roca.png','','image',0),(6,'home','resources/home/carousel/el_gallito.png','','image',0),(7,'home','resources/home/carousel/estratos_descartes.png','','image',0),(8,'home','resources/home/carousel/macizo_orosi.png','','image',0),(9,'home','resources/home/main_message.txt','El litoral Pacífico Norte de Costa Rica ofrece sitios turísticos de importancia geológica, como lo son la Isla Bolaños y la Península de Santa Elena, con diversos orígenes y lugares por conocer.','text',1),(11,'introduction','resources/intro/parrafo1.txt','La geología es la ciencia que estudia las rocas, desde el punto de vista de composición, origen, procesos que las afectan antes, durante y después de su formación y edad. Además, de estudios aplicados como su capacidad hídrica y geomecánica. Costa Rica presenta rocas de diversos orígenes, con edades que abarcan desde 163 – 170 millones de años (Jurásico Medio) hasta la actualidad (Cuaternario).','text',1),(12,'introduction','resources/intro/parrafo2.txt','Actualmente los recorridos centran su atención dentro del Área de Conservación Guanacaste, incluyendo sitios como: La península de Santa Elena, la isla Bolaños, el archipiélago Murciélago, bahía Santa Elena, playa Naranjo, entre otros. Siendo todos estos territorios declarados Patrimonio de la Humanidad (UNESCO, 1999, id N°928).','text',2),(13,'introduction','resources/intro/parrafo3.txt','En el litoral Norte de la costa Pacífica de Costa Rica, la geología representa un elemento principal del paisaje, siendo de provecho para proyectos en varias áreas de interés como: educación, turismo y divulgación y concienciación de los parques nacionales.\nLa principal actividad económica de la zona es la pesca, por tanto, la importancia del desarrollo de otras actividades como el geoturismo, proveyendo a los pobladores cercanos empleos directos e indirectos, fomentado el desarrollo de la economía y para los visitantes recreación y el rescate de valores patrimoniales de Costa Rica, desde el punto de vista geológico.','text',3),(14,'introduction','resources/intro/parrafo4.txt','Al día de hoy se realizan dos recorridos diferentes:\nPenínsula de Santa Elena y alrededores\nIsla Bolaños y Alrededores','text',4);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_points`
--

DROP TABLE IF EXISTS `map_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_points` (
  `path` int(8) NOT NULL,
  `sequence_number` int(8) NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  PRIMARY KEY (`path`,`sequence_number`),
  KEY `id_page` (`page_id`),
  CONSTRAINT `map_points_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_points`
--

LOCK TABLES `map_points` WRITE;
/*!40000 ALTER TABLE `map_points` DISABLE KEYS */;
/*!40000 ALTER TABLE `map_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (''),('home'),('introduction');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20170420155652,'CreateComponents','2017-04-20 22:11:21','2017-04-20 22:11:21',0),(20170420164705,'CreateComponents','2017-04-23 02:45:32','2017-04-23 02:45:32',0),(20170422010123,'DropComponents','2017-04-23 02:45:32','2017-04-23 02:45:32',0),(20170422174606,'CreatePages','2017-04-23 02:45:32','2017-04-23 02:45:33',0),(20170422175032,'CreateContents','2017-04-23 02:45:33','2017-04-23 02:45:33',0),(20170422180530,'CreateMapPoints','2017-04-23 02:48:16','2017-04-23 02:48:17',0),(20170422205019,'CreateUsers','2017-04-23 02:58:39','2017-04-23 02:58:39',0),(20170423145651,'AlterMapPoints','2017-04-23 20:58:58','2017-04-23 20:58:58',0),(20170423154103,'AlterContents','2017-04-23 21:42:31','2017-04-23 21:42:31',0),(20170426155916,'AlterContents2','2017-04-27 08:05:34','2017-04-27 08:05:35',0),(20170426162220,'AlterContents3','2017-04-27 08:05:35','2017-04-27 08:05:35',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-04-27 10:41:03
