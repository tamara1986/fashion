-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fashion_room
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `kategorije`
--

DROP TABLE IF EXISTS `kategorije`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorija` varchar(45) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorije`
--

LOCK TABLES `kategorije` WRITE;
/*!40000 ALTER TABLE `kategorije` DISABLE KEYS */;
INSERT INTO `kategorije` VALUES (1,'odeća',0),(2,'cipele',0),(3,'aksesoari',0),(4,'torbe i novčanici',0),(5,'nakit',0),(6,'donji ves',1),(7,'pantalone',1),(8,'majice',1),(9,'košulje',1),(10,'kupaci kostimi',1),(11,'džemperi',1),(12,'kaputi',1),(13,'suknje',1),(14,'šorcevi',1),(15,'haljine',1),(16,'jakne',1),(17,'trenerke',1),(18,'cipele',2),(19,'baletanke',2),(20,'čizme',2),(21,'klompe',2),(22,'espadrile',2),(23,'japanke',2),(24,'na štiklu',2),(25,'kožne',2),(26,'sandale',2),(27,'platnene',2),(28,'za trcanje',2),(29,'patike',2),(30,'gumene čizme',2),(31,'duboke patike',2),(32,'naocare',3),(33,'kaiševi',3),(34,'leptir mašne',3),(35,'šeširi',3),(36,'ručni satovi',3),(37,'novčanici',3),(38,'rukavice',3),(39,'privesci',3),(40,'kravate',3),(41,'ešarpe',3),(42,'šalovi',3),(43,'kostimi',3),(44,'kape',3),(45,'rančevi',4),(46,'pismo tašne',4),(47,'platnene',4),(48,'male torbe',4),(49,'laptop',4),(50,'dizajnerske',4),(51,'neseseri',4),(52,'tašne',4),(53,'cegeri',4),(54,'ručni prtljag',4),(55,'kožne',4),(56,'vintage',4),(57,'ukrasi za noge',5),(58,'narukvice',5),(59,'broševi',5),(60,'mindjuše',5),(61,'ogrlice',5),(62,'pirsing',5),(63,'prstenje',5),(64,'helanke',1),(65,'farmerke',1);
/*!40000 ALTER TABLE `kategorije` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `slika` varchar(100) DEFAULT 'default.jpg',
  `naslov_radnje` varchar(45) DEFAULT NULL,
  `email_prikaz` varchar(100) DEFAULT NULL,
  `grad` varchar(45) DEFAULT NULL,
  `opis` longtext,
  `ime_I_prezime_prikaz` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnici`
--

LOCK TABLES `korisnici` WRITE;
/*!40000 ALTER TABLE `korisnici` DISABLE KEYS */;
INSERT INTO `korisnici` VALUES (1,'Tamara','Vasic','tvasic','81ba35720652141a48985d979f4b262f','tamaravasic1986@gmail.com','1528464589_slika.jpg','moja radnjica','tamaravasic1986@gmail.com','beograd','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','Tamara Vasic'),(2,'djordje','buleski','djole','827ccb0eea8a706c4c34a16891f84e7b','djordje.buleski@gmail.com','1528096540_1527867213_dzole.jpg','Kod Dzoleta uvek setovano!','djordje.buleski@gmail.com','beograd','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make','djordje buleski'),(3,'luka','krkles','luka','827ccb0eea8a706c4c34a16891f84e7b','lukakrkljes@yahoo.com','1527871662_luka.jpg','Css manijaci','lukakrkljes@yahoo.com','beograd','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make','Luka Krkljes'),(4,'amir','hadzija','amir','827ccb0eea8a706c4c34a16891f84e7b','bgamir1989@gmail.com','1528098113_amir.jpg','Online shop Amir','bgamir1989@gmail.com','beograd','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make','amir hadzija'),(5,'Anita','Vasic','anci','827ccb0eea8a706c4c34a16891f84e7b','anitavasic@gmail.com','1531938017_anci.jpg','Pretty woman','anitavasic@gmail.com','Sremska Mitrovica','Lorem ipsum dolor sit amet, consectetur \r\nadipiscing elit. Integer nec odio. Praesent libero. \r\nSed cursus ante dapibus diam. Sed nisi. Nulla quis \r\nsem at nibh elementum imperdiet. Duis sagittis \r\nipsum. Praesent mauris. Fusce nec tellus sed \r\naugue semper po','Anita Vasić');
/*!40000 ALTER TABLE `korisnici` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `omiljeni_proizvodi`
--

DROP TABLE IF EXISTS `omiljeni_proizvodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omiljeni_proizvodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proizvoda` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_proizvoda_idx` (`id_proizvoda`),
  KEY `fk_id_korisnika_idx` (`id_korisnika`),
  CONSTRAINT `fk_id_korisnika` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_proizvoda` FOREIGN KEY (`id_proizvoda`) REFERENCES `proizvodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omiljeni_proizvodi`
--

LOCK TABLES `omiljeni_proizvodi` WRITE;
/*!40000 ALTER TABLE `omiljeni_proizvodi` DISABLE KEYS */;
INSERT INTO `omiljeni_proizvodi` VALUES (16,4,2),(19,28,2),(20,5,2),(21,37,1);
/*!40000 ALTER TABLE `omiljeni_proizvodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poruke`
--

DROP TABLE IF EXISTS `poruke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poruke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ulogovanog` int(11) NOT NULL,
  `poruka` longtext NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_ulogovanog_idx` (`id_ulogovanog`),
  CONSTRAINT `fk_id_ulogovanog` FOREIGN KEY (`id_ulogovanog`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poruke`
--

LOCK TABLES `poruke` WRITE;
/*!40000 ALTER TABLE `poruke` DISABLE KEYS */;
INSERT INTO `poruke` VALUES (39,1,'Zdravo,ja želim   Naocare 0,     http://localhost/fashion_room/Mojprofil/mojproizvod/37','2018-07-18 00:44:59'),(40,1,'cao','2018-07-18 00:45:08'),(41,5,'Zdravo,ja želim   Farmerke  38,     http://localhost/fashion_room/Mojprofil/mojproizvod/42','2018-07-18 20:59:54'),(42,5,'Zdravo,ja želim   Naocare 0,     http://localhost/fashion_room/Mojprofil/mojproizvod/37\r\nCao, da li moyes da spustis malo cenu?','2018-07-18 21:01:09'),(43,1,'Ok,posalji mi podatke,saljem sutra!','2018-07-18 21:02:18');
/*!40000 ALTER TABLE `poruke` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poruke_primalac`
--

DROP TABLE IF EXISTS `poruke_primalac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poruke_primalac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_poruke` int(11) NOT NULL,
  `id_primalac` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_id_poruke_idx` (`id_poruke`),
  KEY `fk_id_primalac_idx` (`id_primalac`),
  CONSTRAINT `fk_id_poruke` FOREIGN KEY (`id_poruke`) REFERENCES `poruke` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_primalac` FOREIGN KEY (`id_primalac`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poruke_primalac`
--

LOCK TABLES `poruke_primalac` WRITE;
/*!40000 ALTER TABLE `poruke_primalac` DISABLE KEYS */;
INSERT INTO `poruke_primalac` VALUES (63,39,4,1),(64,40,4,0),(65,41,1,1),(66,42,4,1),(67,43,5,0);
/*!40000 ALTER TABLE `poruke_primalac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pracenje`
--

DROP TABLE IF EXISTS `pracenje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pracenje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ulogovanog` int(11) NOT NULL,
  `id_zapracenog` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkk_id_ulogovanog_idx` (`id_ulogovanog`),
  KEY `fkk_id_zapracenog_idx` (`id_zapracenog`),
  CONSTRAINT `fkk_id_ulogovanog` FOREIGN KEY (`id_ulogovanog`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkk_id_zapracenog` FOREIGN KEY (`id_zapracenog`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pracenje`
--

LOCK TABLES `pracenje` WRITE;
/*!40000 ALTER TABLE `pracenje` DISABLE KEYS */;
INSERT INTO `pracenje` VALUES (1,1,4),(2,1,2);
/*!40000 ALTER TABLE `pracenje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proizvodi`
--

DROP TABLE IF EXISTS `proizvodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `naslov` varchar(45) NOT NULL,
  `marka` varchar(45) NOT NULL,
  `velicina` int(11) DEFAULT NULL,
  `id_kategorije` int(11) NOT NULL,
  `opis` longtext NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkx_id_korisnika_idx` (`id_korisnika`),
  KEY `fkk_id_kategorije_idx` (`id_kategorije`),
  CONSTRAINT `fkk_id_kategorije` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorije` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkx_id_korisnika` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvodi`
--

LOCK TABLES `proizvodi` WRITE;
/*!40000 ALTER TABLE `proizvodi` DISABLE KEYS */;
INSERT INTO `proizvodi` VALUES (4,1,'Kaput','Desigual',34,12,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.',10000),(5,1,'Majica','nike',38,8,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',1200),(6,1,'Haljina','xxx',36,15,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',2000),(8,2,'Helanke','xxx',34,64,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',1000),(9,2,'cipele','Deichmann',40,18,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',5000),(11,3,'farmerke','xxx',38,65,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',1000),(12,3,'Haljina','xxx',38,15,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',6000),(28,1,'Ogrlica','xxx',0,61,'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.',2000),(29,2,'cipele','xxx',40,18,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',8000),(31,2,'Patike','xxx',41,29,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',7000),(32,3,'cipele na stiklu','xxx',38,24,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',3000),(34,4,'cipele','Bata',40,18,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',5000),(36,4,'patike NIKE','nike',38,29,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make nn',7200),(37,4,'Naocare','xxx',0,32,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled',5000),(38,4,'Rucni sat','xxx',0,36,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled',5000),(39,4,'Mindjuse','xxx',0,60,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled',2000),(42,1,'Farmerke ','xxx',38,65,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. ',2000),(48,5,'givenchy torba','givenchy',0,52,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.',5000),(49,5,'trenerka','guess',38,17,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.',5000),(50,5,'trenerka','nike',38,17,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.',6000);
/*!40000 ALTER TABLE `proizvodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slike_proizvoda`
--

DROP TABLE IF EXISTS `slike_proizvoda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slike_proizvoda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proizvod` int(11) NOT NULL,
  `url_slike` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_proizvod_idx` (`id_proizvod`),
  CONSTRAINT `fk_id_proizvod` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slike_proizvoda`
--

LOCK TABLES `slike_proizvoda` WRITE;
/*!40000 ALTER TABLE `slike_proizvoda` DISABLE KEYS */;
INSERT INTO `slike_proizvoda` VALUES (5,4,'kaput.jpg',1),(6,5,'majica.jpg',1),(7,4,'kaput1.jpg',0),(11,6,'1527848603_f26cfe5feb73f628b808f4734cbc26a9.jpg',1),(12,6,'1527848603_10de7faa6bd8a9989d6d8e08218960457.jpg',0),(13,6,'1527848603_2ae45faeba81374071400a2a61b039051.jpg',0),(14,8,'helanke-8.jpg',1),(15,9,'1527871027_deichmann-cipele.jpg',1),(16,9,'1527871028_1deichmann-cipele-1.jpg',0),(19,11,'1527872558_farmerke.jpg',1),(20,12,'1527872766_th.jpg',1),(45,28,'1528069543_23.jpg',1),(46,29,'1528073001_cipele.jpg',1),(49,31,'1528073251_patike12.jpg',1),(50,32,'1528073340_nastiklu.jpg',1),(53,34,'1528098357_bata.jpg',1),(55,36,'1528098991_patikenike.jpg',1),(56,37,'1528197107_naocare.jpg',1),(57,38,'1528197435_sat.jpg',1),(58,39,'1528197623_mindjuse.jpg',1),(61,42,'1531929485_farmerke.jpg',1),(67,48,'1531938579_torba2.jpg',1),(68,49,'1531938759_trenerka.jpg',1),(69,50,'1531940004_nike.jpg',1);
/*!40000 ALTER TABLE `slike_proizvoda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagovi`
--

DROP TABLE IF EXISTS `tagovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proizvoda` int(11) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `tag2` varchar(200) NOT NULL,
  `tag3` varchar(200) NOT NULL,
  `tag4` varchar(200) NOT NULL,
  `tag5` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkk_id_proizvoda_idx` (`id_proizvoda`),
  CONSTRAINT `fkk_id_proizvoda` FOREIGN KEY (`id_proizvoda`) REFERENCES `proizvodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagovi`
--

LOCK TABLES `tagovi` WRITE;
/*!40000 ALTER TABLE `tagovi` DISABLE KEYS */;
INSERT INTO `tagovi` VALUES (1,4,'kaputi','desigual','34','kaput','odeća'),(2,5,'majice','nike','38','Majica','odeća'),(3,6,'Haljina','xxx','36','haljine','odeća'),(4,8,'Helanke','xxx','34','helanke','odeća'),(5,9,'Cipele','xxx','40','cipele','cipele'),(7,11,'farmerke','xxx','38','farmerke','odeća'),(8,12,'haljina','xxx','38','haljine','odeća'),(23,28,'ogrlica','xxx','0','ogrlice','nakit'),(24,29,'Cipele','xxx','40','cipele','cipele'),(26,31,'patike','xxx','41','Patike','cipele'),(27,32,'Cipele na stiklu','xxx','38','na štiklu','cipele'),(29,34,'cipele','Bata','40','Cipele','cipele'),(31,36,'Patike NIKE','nike','38','patike','cipele'),(32,37,'naocare','xxx','0','Naocare','aksesoari'),(33,38,'Rucni sat','xxx','0','rucni satovi','aksesoari'),(34,39,'mindjuse','xxx','0','Mindjuse','nakit'),(35,42,'Farmerke ','xxx','38','farmerke','odeća'),(41,48,'givenchy torba','givenchy','0','tašne','torbe i novčanici'),(42,49,'trenerka','guess','38','trenerke','odeća'),(43,50,'trenerka','nike','38','trenerke','odeća');
/*!40000 ALTER TABLE `tagovi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utisci`
--

DROP TABLE IF EXISTS `utisci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utisci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ulogovanog_korisnika` int(11) NOT NULL,
  `id_prodavca` int(11) NOT NULL,
  `utisak` int(11) NOT NULL,
  `komentar` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_ulogovanog_korisnika_idx` (`id_ulogovanog_korisnika`),
  KEY `fk_id_prodavca_idx` (`id_prodavca`),
  CONSTRAINT `fk_id_prodavca` FOREIGN KEY (`id_prodavca`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_ulogovanog_korisnika` FOREIGN KEY (`id_ulogovanog_korisnika`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utisci`
--

LOCK TABLES `utisci` WRITE;
/*!40000 ALTER TABLE `utisci` DISABLE KEYS */;
INSERT INTO `utisci` VALUES (5,1,2,0,'Super momak,moje preporuke.'),(6,1,3,0,'Super saradnja!'),(7,1,4,0,'Odlicna saradnja!'),(8,2,1,0,'Super saradnja! Moje preporuke!');
/*!40000 ALTER TABLE `utisci` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-24 13:50:46
