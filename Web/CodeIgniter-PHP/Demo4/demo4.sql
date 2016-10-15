-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: demo4
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `no_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Ropa'),(2,'Calzado'),(3,'Accesorios'),(4,'Joyeria');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `no_producto` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_subcategoria_idx` (`id_subcategoria`),
  CONSTRAINT `id_subcategoria` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id_subcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (9,'producto1','45',1),(10,'producto2','34',1),(11,'producto3','23',1),(12,'producto4','14',1),(13,'producto5','6',1),(14,'producto5','54',2),(15,'producto6','22',2),(16,'producto7','56',2),(17,'producto8','54',2),(18,'producto9','23',2),(19,'producto10','87',3),(20,'producto11','34',3),(21,'producto12','23',3),(22,'producto13','234',3),(23,'producto14','34',4),(24,'producto15','54',4),(25,'producto16','32',4),(26,'producto17','15',4),(27,'producto18','73',5),(28,'producto19','57',5),(29,'producto20','53',5),(30,'producto21','23',6),(31,'producto22','74',6),(32,'producto23','36',6),(33,'producto24','25',7),(34,'producto25','53',7),(35,'producto26','34',7),(36,'producto27','111',8),(37,'producto28','45',8),(38,'producto29','34',8),(39,'producto30','54',9),(40,'producto30','65',9),(41,'producto31','3',9),(42,'producto32','32',10),(43,'producto33','45',10),(44,'producto34','24',10),(45,'producto35','68',11),(46,'producto36','68',11),(47,'producto37','67',11),(48,'producto38','56',12),(49,'producto39','45',12),(50,'producto40','35',12),(51,'producto41','76',13),(52,'producto42','45',13),(53,'producto43','46',13),(54,'producto44','34',14),(55,'producto45','36',14),(56,'producto46','34',14),(57,'producto47','36',15),(58,'producto48','34',15),(59,'producto49','36',15),(60,'producto50','34',16),(61,'producto51','36',16),(62,'producto52','34',16),(63,'producto53','36',17),(64,'producto54','34',17),(65,'producto55','36',17),(66,'producto56','34',18),(67,'producto57','36',18),(68,'producto58','34',18),(69,'producto59','36',19),(70,'producto60','34',19),(71,'producto61','64',19),(72,'producto62','33',20),(73,'producto63','85',20),(74,'producto64','34',20),(75,'producto65','75',21),(76,'producto66','46',21),(77,'producto67','54',21),(78,'producto68','43',22),(79,'producto69','26',22),(80,'producto70','56',22),(81,'producto71','36',23),(82,'producto72','65',23),(83,'producto73','36',23),(84,'producto74','34',24),(85,'producto75','67',24),(86,'producto76','32',24),(87,'producto77','78',25),(88,'producto78','45',25),(89,'producto79','95',25);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `no_subcategoria` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subcategoria`),
  KEY `fk_categoria_idx` (`id_categoria`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategoria`
--

LOCK TABLES `subcategoria` WRITE;
/*!40000 ALTER TABLE `subcategoria` DISABLE KEYS */;
INSERT INTO `subcategoria` VALUES (1,'Polos',1),(2,'Blusas',1),(3,'Jeans',1),(4,'Camisas',1),(5,'Pantalones',1),(6,'Blusas',1),(7,'Chompas',1),(8,'Casacas',1),(9,'Vestidos',1),(10,'Camisas',1),(11,'Botas',2),(12,'Sandalias',2),(13,'Zapatillas',2),(14,'Tacos',2),(15,'Balerinas',2),(16,'Botines',2),(17,'Pañuelos',3),(18,'Moños',3),(19,'Relojes',3),(20,'Correas',3),(21,'Collares',4),(22,'Dijes',4),(23,'Pulseras',4),(24,'Aretes',4),(25,'Anillos',4);
/*!40000 ALTER TABLE `subcategoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-28 23:51:25
