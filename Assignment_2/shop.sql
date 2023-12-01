-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `category`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `CatID` int(11) NOT NULL,
  `CatName` text NOT NULL,
  PRIMARY KEY (`CatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Small Tree Pot'),(2,'Medium Tree Pot'),(3,'Large Tree Pot');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `prid` int(11) NOT NULL,
  `prname` text NOT NULL,
  `cateid` int(11) NOT NULL,
  `summary` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `photo_name` longtext NOT NULL,
  PRIMARY KEY (`prid`),
  KEY `cateid` (`cateid`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`CatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Small Tree Pot 1',1,'Small pot for decoration on worktable',1,23,'Small pot use to decorate table.','NEW-Artificial-Plants-Bonsai-Small-Tree-Pot-Plants-Fake-Flowers-Potted-Ornaments-For-Home-Decoration-Hotel-4.jpg'),(2,'Small Tree Pot 2',1,'Small pot for decoration on worktable',3,45,'Small pot use to decorate table.','chau-cay-mini-de-ban-lam-viec-04.jpg'),(3,'Medium Tree Pot 1',2,'Medium pot to put in the corner',5,45,'Medium pot suitable to plant tree in a corner','GUEST_b7a4b8ee-a685-44fa-8a7f-8f6c4fb86ddd.jfif'),(4,'Medium Tree Pot 2',2,'Medium pot to put in the corner',6,23,'Medium pot suitable to plant tree in a corner','images.jfif'),(5,'Large Tree Pot 1',3,'Large pot for planting tree outdoor',10,233,'A large pot to plant tree on a balcony or in a garden','large-tree-in-pot.jpg'),(6,'Large Tree Pot 2',3,'Large pot for planting tree outdoor',11,54,'Suitable to plant bonsai tree','730_IMG_3514.jfif');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11 20:18:21
