-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: store
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.04.1

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
-- Table structure for table `eav_attribute`
--

DROP TABLE IF EXISTS `eav_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eav_attribute` (
  `attribute_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Attribute Id',
  `attribute_code` varchar(255) DEFAULT NULL COMMENT 'Attribute Code',
  `frontend_label` varchar(255) DEFAULT NULL COMMENT 'Attribute Code',
  PRIMARY KEY (`attribute_id`),
  UNIQUE KEY `UNQ_EAV_ATTRIBUTE_ATTRIBUTE_CODE` (`attribute_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eav_attribute`
--

LOCK TABLES `eav_attribute` WRITE;
/*!40000 ALTER TABLE `eav_attribute` DISABLE KEYS */;
INSERT INTO `eav_attribute` VALUES (1,'name','Name'),(2,'desc','Description');
/*!40000 ALTER TABLE `eav_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Entity ID',
  `sku` varchar(64) DEFAULT NULL COMMENT 'SKU',
  PRIMARY KEY (`entity_id`),
  KEY `IDX_PRODUCT_SKU` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=19458 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (7070,' BE4068-3'),(7071,' BE4068-4'),(7072,' BE4068-5'),(7074,' BE4068-7'),(7111,' BE4084-1'),(7113,' BE4084-2'),(7112,' BE4084-3'),(7115,' BE4085-2'),(7117,' BE4085-4'),(7119,' BE4086-2'),(7120,' BE4086-3'),(7123,' BE4087-1'),(7125,' BE4087-3'),(7126,' BE4087-4'),(7139,' BE4090-1'),(7140,' BE4090-2'),(7142,' BE4090-4'),(7145,' BE4091-3'),(7146,' BE4091-4'),(7172,' BE4101-1'),(7173,' BE4101-2'),(7183,' BE4104-1'),(7184,' BE4104-2'),(7186,' BE4104-4'),(7191,' BE4106-1'),(7192,' BE4106-2'),(7194,' BE4106-4'),(7195,' BE4106-5'),(7196,' BE4106-6'),(1761,' Blacktie7sn-2'),(5078,' DD1179-3'),(9779,'2000Spirit8-1'),(9778,'3000X-1'),(9777,'7000Strip-1'),(9776,'9500Strip-1'),(9773,'ace1000-1'),(18005,'Adelaide-1'),(18006,'Adelaide-2'),(18007,'Adelaide-3'),(18008,'Adelaide-4'),(19454,'Agathe/S-1'),(19455,'Agathe/s-2'),(19456,'Agathe/s-3'),(19457,'Agathe/S-4'),(14275,'Agnes/S-1'),(14279,'Agnes/S-2'),(14278,'Agnes/S-3'),(14277,'Agnes/S-4'),(14276,'Agnes/S-5'),(9775,'Air-1');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_varchar`
--

DROP TABLE IF EXISTS `product_varchar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_varchar` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `entity_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `UNQ_CAT_PRD_ENTT_VCHR_ENTT_ID_ATTR_ID` (`entity_id`,`attribute_id`),
  KEY `IDX_PRODUCT_VARCHAR_ENTITY_ID` (`entity_id`),
  KEY `FK_CAT_PRD_VCHR_ATTR_ID_EAV_ATTR_ATTR_ID` (`attribute_id`),
  CONSTRAINT `FK_CAT_PRD_VCHR_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PRODUCT_ENTITY` FOREIGN KEY (`entity_id`) REFERENCES `product` (`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Varchar Attribute Backend Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_varchar`
--

LOCK TABLES `product_varchar` WRITE;
/*!40000 ALTER TABLE `product_varchar` DISABLE KEYS */;
INSERT INTO `product_varchar` VALUES (68,2,7070,'Burberry BE4068 3001/11 Shiny Black/Grey Gradient? Save on your BE 4068 designer sunglasses from the UK most trusted online retailer.'),(69,2,7071,'Burberry BE4068 3002/13 Tortoise/Brown Gradient? Save on your BE 4068 designer sunglasses from the UK most trusted online retailer.'),(70,2,7072,'Burberry BE4068 3012/13 Sepia/Brown Gradient? Save on your BE 4068 designer sunglasses from the UK most trusted online retailer.'),(71,2,7074,'Burberry BE4068 3204/11 Blue Avio Transparent/Grey Gradient? Save on your BE 4068 designer sunglasses from the UK most trusted online retailer.'),(72,2,7111,'Burberry BE4084 3001/73 Black/Brown? Save on your BE 4084 designer sunglasses from the UK most trusted online retailer.'),(73,2,7113,'Burberry BE4084 3226/13 Striped Horn/Brown Gradient? Save on your BE 4084 designer sunglasses from the UK most trusted online retailer.'),(74,2,7112,'Burberry BE4084 3224/13 Striped Violet/Brown Gradient? Save on your BE 4084 designer sunglasses from the UK most trusted online retailer.'),(75,2,7115,'Burberry BE4085 3013/11 Grey/Avio Grey Gradient? Save on your BE 4085 designer sunglasses from the UK most trusted online retailer.'),(76,2,7117,'Burberry BE4085 3227/13 Striped Grey/Brown Gradient? Save on your BE 4085 designer sunglasses from the UK most trusted online retailer.'),(77,2,7119,'Burberry BE4086 3001/73 Black /Brown? Save on your BE 4086 designer sunglasses from the UK most trusted online retailer.'),(78,2,7120,'Burberry BE4086 3007/8G White/Grey Gradient? Save on your BE 4086 designer sunglasses from the UK most trusted online retailer.'),(79,2,7123,'Burberry BE4087 3001/8G Black/Grey Gradient? Save on your BE 4087 designer sunglasses from the UK most trusted online retailer.'),(80,2,7125,'Burberry BE4087 3170/3 Brown/Brown? Save on your BE 4087 designer sunglasses from the UK most trusted online retailer.'),(81,2,7126,'Burberry BE4087 3204/11 Blue Avio Transparent/Grey Gradient? Save on your BE 4087 designer sunglasses from the UK most trusted online retailer.'),(82,2,7139,'Burberry BE4090 3001/81 Black/Polarized Grey? Save on your BE 4090 designer sunglasses from the UK most trusted online retailer.'),(83,2,7140,'Burberry BE4090 3001/87 Black/Grey? Save on your BE 4090 designer sunglasses from the UK most trusted online retailer.'),(84,2,7142,'Burberry BE4090 3081/73 Brown/Brown? Save on your BE 4090 designer sunglasses from the UK most trusted online retailer.'),(85,2,7145,'Burberry BE4091 3081/3 Brown/Brown? Save on your BE 4091 designer sunglasses from the UK most trusted online retailer.'),(86,2,7146,'Burberry BE4091 3227/13 Striped Grey/Brown Gradient? Save on your BE 4091 designer sunglasses from the UK most trusted online retailer.'),(87,2,7172,'Burberry BE4101 3001/87 Shiny Black/Grey? Save on your BE 4101 designer sunglasses from the UK most trusted online retailer.'),(88,2,7173,'Burberry BE4101 3002/13 Havana/Brown Gradient? Save on your BE 4101 designer sunglasses from the UK most trusted online retailer.'),(89,2,7183,'Burberry BE4104 3001/87 Shiny Black/Grey? Save on your BE 4104 designer sunglasses from the UK most trusted online retailer.'),(90,2,7184,'Burberry BE4104 3243/8G Cyclamen/Grey Gradient? Save on your BE 4104 designer sunglasses from the UK most trusted online retailer.'),(91,2,7186,'Burberry BE4104 3277/8G Pastel Olive Green/Grey Gradient? Save on your BE 4104 designer sunglasses from the UK most trusted online retailer.'),(92,2,7191,'Burberry BE4106 3001/87 Shiny Black/Grey? Save on your BE 4106 designer sunglasses from the UK most trusted online retailer.'),(93,2,7192,'Burberry BE4106 3002/87 Havana/Grey? Save on your BE 4106 designer sunglasses from the UK most trusted online retailer.'),(94,2,7194,'Burberry BE4106 3269/73 Fuxia/Brown? Save on your BE 4106 designer sunglasses from the UK most trusted online retailer.'),(95,2,7195,'Burberry BE4106 3270/87 Violet/Grey? Save on your BE 4106 designer sunglasses from the UK most trusted online retailer.'),(96,2,7196,'Burberry BE4106 3272/73 Acid Green/Brown? Save on your BE 4106 designer sunglasses from the UK most trusted online retailer.'),(97,2,1761,'Dior BLACKTIE7SN 00HZR Black Grey/Grey? Save on your BLACKTIE 7SN  designer sunglasses from the UK most trusted online retailer.'),(98,2,5078,'Looking for D&G DD1179 675 Black? Save on your DD 1179  glasses. Currently offering FREE UK delivery.'),(99,2,9779,'Looking for LINDBERG 2000 Spirit 8 ?Currently offering FREE UK delivery.'),(100,2,9778,'Looking for LINDBERG 3000 X ?Currently offering FREE UK delivery.'),(101,2,9777,'Looking for LINDBERG 7000 Strip Titanium ?Currently offering FREE UK delivery.'),(102,2,9776,'Looking for LINDBERG 9500 Strip Titanium ?Currently offering FREE UK delivery.'),(103,2,9773,'Looking for LINDBERG 1000 Acetanium ?Currently offering FREE UK delivery.'),(104,2,18005,'Dior Adelaide 4GJBN Palladium Blue/Dark Grey? Save on your Adelaide designer sunglasses from the UK most trusted online retailer.'),(105,2,18006,'Dior Adelaide 4HSNR Ruthenium Violet/Brown Grey? Save on your Adelaide designer sunglasses from the UK most trusted online retailer.'),(106,2,18007,'Dior Adelaide 4J2LF Palladium Grey/Grey? Save on your Adelaide designer sunglasses from the UK most trusted online retailer.'),(107,2,18008,'Dior Adelaide RZSHD Palladium Black/Grey? Save on your Adelaide designer sunglasses from the UK most trusted online retailer.'),(108,2,19454,'Jimmy Choo Agathe/S BKXD8 Nude Brown/Brown? Save on your Agathe/S designer sunglasses from the UK most trusted online retailer.'),(109,2,19455,'Jimmy Choo Agathe/S BKYJJ Grey Black/Grey? Save on your Agathe/S designer sunglasses from the UK most trusted online retailer.'),(110,2,19456,'Jimmy Choo Agathe/S BLMFM Coral/Brown Violet? Save on your Agathe/S designer sunglasses from the UK most trusted online retailer.'),(111,2,19457,'Jimmy Choo Agathe/S HU8HD Black/Grey? Save on your Agathe/S designer sunglasses from the UK most trusted online retailer.'),(112,2,14275,'Jimmy Choo Agnes/S BKXD8 Nude Brown/Brown DS? Save on your Agnes/S designer sunglasses from the UK most trusted online retailer.'),(113,2,14279,'Jimmy Choo Agnes/S BKYJJ Grey Black/Grey SF? Save on your Agnes/S designer sunglasses from the UK most trusted online retailer.'),(114,2,14278,'Jimmy Choo Agnes/S BL3JD Nude Brown/Brown SF? Save on your Agnes/S designer sunglasses from the UK most trusted online retailer.'),(115,2,14277,'Jimmy Choo Agnes/S HU8HD Black Python/Grey Shaded? Save on your Agnes/S designer sunglasses from the UK most trusted online retailer.'),(116,2,14276,'Jimmy Choo Agnes/S UOBK8 Dark Pink/Brown SF? Save on your Agnes/S designer sunglasses from the UK most trusted online retailer.'),(117,2,9775,'LINDBERG Air Titanium ?Currently offering FREE UK delivery.'),(131,1,7070,'Burberry BE4068 3001/11 Shiny Black/Grey Gradient'),(132,1,7071,'Burberry BE4068 3002/13 Tortoise/Brown Gradient'),(133,1,7072,'Burberry BE4068 3012/13 Sepia/Brown Gradient'),(134,1,7074,'Burberry BE4068 3204/11 Blue Avio Transparent/Grey Gradient'),(135,1,7111,'Burberry BE4084 3001/73 Black/Brown'),(136,1,7113,'Burberry BE4084 3226/13 Striped Horn/Brown Gradient'),(137,1,7112,'Burberry BE4084 3224/13 Striped Violet/Brown Gradient'),(138,1,7115,'Burberry BE4085 3013/11 Grey/Avio Grey Gradient'),(139,1,7117,'Burberry BE4085 3227/13 Striped Grey/Brown Gradient'),(140,1,7119,'Burberry BE4086 3001/73 Black /Brown'),(141,1,7120,'Burberry BE4086 3007/8G White/Grey Gradient'),(142,1,7123,'Burberry BE4087 3001/8G Black/Grey Gradient'),(143,1,7125,'Burberry BE4087 3170/3 Brown/Brown'),(144,1,7126,'Burberry BE4087 3204/11 Blue Avio Transparent/Grey Gradient'),(145,1,7139,'Burberry BE4090 3001/81 Black/Polarized Grey'),(146,1,7140,'Burberry BE4090 3001/87 Black/Grey'),(147,1,7142,'Burberry BE4090 3081/73 Brown/Brown'),(148,1,7145,'Burberry BE4091 3081/3 Brown/Brown'),(149,1,7146,'Burberry BE4091 3227/13 Striped Grey/Brown Gradient'),(150,1,7172,'Burberry BE4101 3001/87 Shiny Black/Grey'),(151,1,7173,'Burberry BE4101 3002/13 Havana/Brown Gradient'),(152,1,7183,'Burberry BE4104 3001/87 Shiny Black/Grey'),(153,1,7184,'Burberry BE4104 3243/8G Cyclamen/Grey Gradient'),(154,1,7186,'Burberry BE4104 3277/8G Pastel Olive Green/Grey Gradient'),(155,1,7191,'Burberry BE4106 3001/87 Shiny Black/Grey'),(156,1,7192,'Burberry BE4106 3002/87 Havana/Grey'),(157,1,7194,'Burberry BE4106 3269/73 Fuxia/Brown'),(158,1,7195,'Burberry BE4106 3270/87 Violet/Grey'),(159,1,7196,'Burberry BE4106 3272/73 Acid Green/Brown'),(160,1,1761,'Dior BLACKTIE7SN 00HZR Black Grey/Grey'),(161,1,5078,'D&G DD1179 675 Black'),(162,1,9779,'LINDBERG 2000 Spirit 8'),(163,1,9778,'LINDBERG 3000 X'),(164,1,9777,'LINDBERG 7000 Strip Titanium'),(165,1,9776,'LINDBERG 9500 Strip Titanium'),(166,1,9773,'LINDBERG 1000 Acetanium'),(167,1,18005,'Dior Adelaide 4GJBN Palladium Blue/Dark Grey'),(168,1,18006,'Dior Adelaide 4HSNR Ruthenium Violet/Brown Grey'),(169,1,18007,'Dior Adelaide 4J2LF Palladium Grey/Grey'),(170,1,18008,'Dior Adelaide RZSHD Palladium Black/Grey'),(171,1,19454,'Jimmy Choo Agathe/S BKXD8 Nude Brown/Brown'),(172,1,19455,'Jimmy Choo Agathe/S BKYJJ Grey Black/Grey'),(173,1,19456,'Jimmy Choo Agathe/S BLMFM Coral/Brown Violet'),(174,1,19457,'Jimmy Choo Agathe/S HU8HD Black/Grey'),(175,1,14275,'Jimmy Choo Agnes BKXD8 Nude Brown/Brown DS'),(176,1,14279,'Jimmy Choo Agnes BKYJJ Grey Black/Grey SF'),(177,1,14278,'Jimmy Choo Agnes BL3JD Nude Brown/Brown SF'),(178,1,14277,'Jimmy Choo Agnes HU8HD Black Python/Grey Shaded'),(179,1,14276,'Jimmy Choo Agnes UOBK8 Dark Pink/Brown SF'),(180,1,9775,'LINDBERG Air Titanium');
/*!40000 ALTER TABLE `product_varchar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-19 19:24:41
