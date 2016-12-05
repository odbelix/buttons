-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: buttons
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_type_id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `created_by` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activity_activity_type1_idx` (`activity_type_id`),
  CONSTRAINT `FK_AC74095AC51EFA73` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_question`
--

DROP TABLE IF EXISTS `activity_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activity_question_activity1_idx` (`activity_id`),
  KEY `fk_activity_question_question1_idx` (`question_id`),
  CONSTRAINT `FK_16FDF94081C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_question`
--

LOCK TABLES `activity_question` WRITE;
/*!40000 ALTER TABLE `activity_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_type`
--

DROP TABLE IF EXISTS `activity_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `explanation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `race` tinyint(1) DEFAULT NULL,
  `quiz` tinyint(1) DEFAULT NULL,
  `poll` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_type`
--

LOCK TABLES `activity_type` WRITE;
/*!40000 ALTER TABLE `activity_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `lastchange` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classroom_user1_idx` (`user_id`),
  CONSTRAINT `FK_497D309DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom`
--

LOCK TABLES `classroom` WRITE;
/*!40000 ALTER TABLE `classroom` DISABLE KEYS */;
INSERT INTO `classroom` VALUES (1,2,'340625_A','Programación Orientada a Objetos','2016-11-08',NULL),(6,2,'365634_A','Programación estructurada','2016-12-03','2016-12-03'),(7,2,'356698_5','Programación de Juegos 2D','2016-12-03','2016-12-03'),(8,1,'340625','Programación Orientada a Objetos','2016-12-04',NULL);
/*!40000 ALTER TABLE `classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom_activity`
--

DROP TABLE IF EXISTS `classroom_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classroom_activity_activity1_idx` (`activity_id`),
  KEY `fk_classroom_activity_classroom1_idx` (`classroom_id`),
  KEY `fk_classroom_activity_session1_idx` (`session_id`),
  CONSTRAINT `FK_994B5061613FECDF` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`),
  CONSTRAINT `FK_994B50616278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`),
  CONSTRAINT `FK_994B506181C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_activity`
--

LOCK TABLES `classroom_activity` WRITE;
/*!40000 ALTER TABLE `classroom_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom_question`
--

DROP TABLE IF EXISTS `classroom_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classroom_question_question1_idx` (`question_id`),
  KEY `fk_classroom_question_classroom1_idx` (`classroom_id`),
  KEY `fk_classroom_question_session1_idx` (`session_id`),
  CONSTRAINT `FK_83C810751E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `FK_83C81075613FECDF` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`),
  CONSTRAINT `FK_83C810756278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_question`
--

LOCK TABLES `classroom_question` WRITE;
/*!40000 ALTER TABLE `classroom_question` DISABLE KEYS */;
INSERT INTO `classroom_question` VALUES (1,1,1,1,'2016-11-08'),(2,2,1,1,'2016-11-08'),(3,3,1,6,'2016-11-08'),(4,4,1,7,'2016-11-08'),(5,5,1,7,'2016-11-08'),(6,8,1,10,'2016-11-14'),(7,9,1,10,'2016-11-14'),(8,10,1,10,'2016-11-14'),(9,11,1,13,'2016-11-24'),(10,12,1,14,'2016-11-25'),(11,13,1,14,'2016-11-25'),(12,14,1,15,'2016-12-03'),(13,15,8,16,'2016-12-04'),(14,16,8,17,'2016-12-04'),(15,17,8,20,'2016-12-04'),(16,18,8,20,'2016-12-04');
/*!40000 ALTER TABLE `classroom_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom_report`
--

DROP TABLE IF EXISTS `classroom_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_type_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classroom_report_report_type1_idx` (`report_type_id`),
  KEY `fk_classroom_report_classroom1_idx` (`classroom_id`),
  CONSTRAINT `FK_5027B39F6278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`),
  CONSTRAINT `FK_5027B39FA5D5F193` FOREIGN KEY (`report_type_id`) REFERENCES `report_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_report`
--

LOCK TABLES `classroom_report` WRITE;
/*!40000 ALTER TABLE `classroom_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `enrollment_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enrollment_classroom1_idx` (`classroom_id`),
  KEY `fk_enrollment_user1_idx` (`user_id`),
  CONSTRAINT `FK_DBDCD7E16278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`),
  CONSTRAINT `FK_DBDCD7E1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `finished_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_classroom1_idx` (`classroom_id`),
  CONSTRAINT `FK_6DC044C56278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_member`
--

DROP TABLE IF EXISTS `group_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_member_group1_idx` (`group_id`),
  KEY `fk_group_member_user1_idx` (`user_id`),
  CONSTRAINT `FK_A36222A8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_A36222A8FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_member`
--

LOCK TABLES `group_member` WRITE;
/*!40000 ALTER TABLE `group_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iscorrect` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_option_question_idx` (`question_id`),
  CONSTRAINT `FK_5A8600B01E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,8,'Verdadero',1),(2,8,'Falso',0),(3,9,'1',1),(4,9,'2',0),(5,9,'3',0),(6,9,'4',0),(7,10,'1',1),(8,10,'2',1),(9,10,'3',1),(10,10,'4',0),(11,11,NULL,1),(12,11,NULL,0),(13,12,NULL,1),(14,12,NULL,0),(15,13,NULL,0),(16,13,NULL,0),(17,14,'Verdadero',0),(18,14,'Falso',1),(19,15,'$1.986',0),(20,15,'$2.567',0),(21,15,'$2.333',1),(22,15,'$5.134',0),(23,16,'Verdadero',0),(24,16,'Falso',1),(25,17,'Verdadero',1),(26,17,'Falso',0),(27,18,'Crear una capa de abstracción al Usuario',1),(28,18,'Crear un GUI para acceder a los datos',0),(29,18,'Crear una herencia de una clase',0),(30,18,'Crear un binding entre clases',0);
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci,
  `suggestion` longtext COLLATE utf8_unicode_ci,
  `created_at` date NOT NULL,
  `showanswer` tinyint(1) DEFAULT NULL,
  `showresults` tinyint(1) DEFAULT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_question_type1_idx` (`question_type_id`),
  KEY `fk_question_session1_idx` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,3,'El cielo es Azul','El cielo es Azul','El cielo es Azul','2016-11-08',1,1,0),(2,1,3,'Cliento puede ser el futuro presidente den USA','Cliento puede ser el futuro presidente den USA','Cliento puede ser el futuro presidente den USA','2016-11-08',1,1,0),(3,6,3,'El cielo es Azul','El cielo es Azul','El cielo es Azul','2016-11-08',1,1,0),(4,7,3,'El cielo es Azul','El cielo es Azul','El cielo es Azul','2016-11-08',0,0,0),(5,7,2,'El cielo es Azulsdsds','El cielo es Azulsdsds','El cielo es Azulsdsds','2016-11-08',1,1,0),(8,10,3,'El cielo es Azul','El cielo es Azul','El cielo es Azul','2016-11-14',0,0,0),(9,10,2,'Qué número es multiplo de 1','Qué número es multiplo de 1','Qué número es multiplo de 1','2016-11-14',0,0,0),(10,10,1,'Cliento puede ser el futuro presidente den USA','Cliento puede ser el futuro presidente den USA','Cliento puede ser el futuro presidente den USA','2016-11-14',1,1,0),(11,13,3,'Pregunta 1','Descripción de pregunta 1','Descripción de pregunta 1','2016-11-24',0,0,0),(12,14,3,'Un Objeto es una instancia de una clase.','Un Objeto es una instancia de una clase.','Un Objeto es una instancia de una clase.','2016-11-25',0,0,0),(13,14,3,'Una clase es la representación abstracta de un Objeto que puede o no existir en el mundo real.',NULL,NULL,'2016-11-25',0,0,0),(14,15,3,'La información entrega por la t° del equipo corresponde a la que absorbe en ventilador',NULL,NULL,'2016-12-03',1,0,1),(15,16,2,'Efectúe el cálculo de la hora extra extraordinaria.','“Pedro, trabaja en una empresa exportadora de uvas en la sección de control de calidad. Debido a un aumento de las exportaciones, su supervisor directo le acaba de solicitar que trabaje dos horas extras diarias por este mes. Pedro tiene un sueldo fijo de $300.000, su horario de trabajo es de Lunes a Viernes: mañana de 09:00 a 14:00 y tarde de 15:00 a 19:00”',NULL,'2016-12-04',0,0,0),(16,17,3,'Respecto a las ejercicio resuelto','Si heredamos una clase de otra, esto se traduce en poder reutilizar los atributos solamente.',NULL,'2016-12-04',0,0,0),(17,20,3,'Un Objeto es una instancia de una clase.',NULL,NULL,'2016-12-04',0,0,0),(18,20,2,'Las Clase Interfaz son utilizas para',NULL,NULL,'2016-12-04',0,0,1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_type`
--

DROP TABLE IF EXISTS `question_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL,
  `boolean` tinyint(1) DEFAULT NULL,
  `explanation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `externalsource` tinyint(1) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `multiplechoice` tinyint(1) DEFAULT NULL,
  `oneoption` tinyint(1) DEFAULT NULL,
  `shortanswer` tinyint(1) DEFAULT NULL,
  `created_at` date NOT NULL,
  `icon` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_type`
--

LOCK TABLES `question_type` WRITE;
/*!40000 ALTER TABLE `question_type` DISABLE KEYS */;
INSERT INTO `question_type` VALUES (1,1,0,'Pregunta o enunciado que tiene a lo menos una respuesta correcta de un máximo de 4.',0,'Selección Multiple',1,0,0,'2016-11-08','multiple.png'),(2,1,0,'Pregunta o enunciado que tiene solo una respuesta correcta de un máximo de 4.',0,'Selección Simple',0,1,0,'2016-11-08','simple.png'),(3,1,1,'Pregunta o enunciado que puede ser Verdadero o Falso.',0,'Verdadero o Falso',0,0,0,'2016-11-08','vof.png');
/*!40000 ALTER TABLE `question_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_type`
--

DROP TABLE IF EXISTS `report_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `explanation` longtext COLLATE utf8_unicode_ci,
  `daily` tinyint(1) DEFAULT NULL,
  `weekly` tinyint(1) DEFAULT NULL,
  `monthly` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_type`
--

LOCK TABLES `report_type` WRITE;
/*!40000 ALTER TABLE `report_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_group`
--

DROP TABLE IF EXISTS `result_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `iscorrect` tinyint(1) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_result_group_group1_idx` (`group_id`),
  KEY `fk_result_group_question1_idx` (`question_id`),
  CONSTRAINT `FK_FC3413491E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `FK_FC341349FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_group`
--

LOCK TABLES `result_group` WRITE;
/*!40000 ALTER TABLE `result_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `result_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_user`
--

DROP TABLE IF EXISTS `result_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `iscorrect` tinyint(1) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_result_question1_idx` (`question_id`),
  KEY `fk_result_user1_idx` (`user_id`),
  KEY `fk_result_user_option1_idx` (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_user`
--

LOCK TABLES `result_user` WRITE;
/*!40000 ALTER TABLE `result_user` DISABLE KEYS */;
INSERT INTO `result_user` VALUES (15,15,4,'2016-12-04',NULL,0,NULL,22),(16,15,4,'2016-12-04',NULL,0,NULL,20),(17,15,4,'2016-12-04',NULL,0,NULL,20),(18,15,4,'2016-12-04',NULL,0,NULL,20),(19,15,4,'2016-12-04',NULL,1,NULL,21),(20,15,4,'2016-12-04',NULL,1,NULL,21),(21,15,4,'2016-12-04',NULL,0,NULL,19),(22,15,4,'2016-12-04',NULL,0,NULL,15),(23,15,4,'2016-12-04',NULL,0,NULL,22),(24,16,4,'2016-12-04',NULL,1,NULL,24),(25,16,4,'2016-12-04',NULL,0,NULL,23),(26,16,4,'2016-12-04',NULL,0,NULL,23),(27,16,4,'2016-12-04',NULL,1,NULL,24),(28,17,4,'2016-12-04',NULL,1,NULL,25),(29,18,4,'2016-12-04',NULL,0,NULL,29);
/*!40000 ALTER TABLE `result_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_session_classroom1_idx` (`classroom_id`),
  CONSTRAINT `FK_D044D5D46278D5A8` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (1,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(2,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(3,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(4,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(5,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(6,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(7,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(8,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(9,1,'2016-11-08 00:00:00','2016-11-08 00:00:00'),(10,1,'2016-11-14 00:00:00','2016-11-22 00:00:00'),(11,1,'2016-11-22 00:00:00','2016-11-23 00:00:00'),(12,1,'2016-11-23 00:00:00','2016-11-23 15:36:11'),(13,1,'2016-11-23 15:36:22','2016-11-24 11:24:57'),(14,1,'2016-11-24 11:25:07','2016-12-03 14:15:37'),(15,1,'2016-12-03 14:44:20',NULL),(16,8,'2016-12-04 11:13:09','2016-12-04 23:02:31'),(17,8,'2016-12-04 23:02:52','2016-12-04 23:20:30'),(18,8,'2016-12-04 23:26:34','2016-12-04 23:28:24'),(19,8,'2016-12-04 23:28:26','2016-12-04 23:28:28'),(20,8,'2016-12-04 23:28:38',NULL);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subscription_subscription_type1_idx` (`subscription_type_id`),
  KEY `fk_subscription_user1_idx` (`user_id`),
  CONSTRAINT `FK_A3C664D3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_A3C664D3B6596C08` FOREIGN KEY (`subscription_type_id`) REFERENCES `subscription_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_type`
--

DROP TABLE IF EXISTS `subscription_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `charge` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `lastchange` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_type`
--

LOCK TABLES `subscription_type` WRITE;
/*!40000 ALTER TABLE `subscription_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'manu','manu','manuel.moscoso.d@gmail.com','manuel.moscoso.d@gmail.com',1,'hg5d2ltxkjcw8w0sc0000s8o4gswwkw','$2y$13$KuDbEJ1e9kP1A1gpr/gLqOc/BOQLAkBH9ugkUQpgtY0E2nzp6u7he','2016-12-04 22:09:48',0,0,NULL,NULL,NULL,'a:1:{i:0;s:14:\"ROLE_DEVELOPER\";}',0,NULL,NULL),(2,'manuel','manuel','mmoscoso@utalca.cl','mmoscoso@utalca.cl',1,'63lrka81wlc0k4g044g408csssgsco0','$2y$13$yLUAUAi8AxyArmT8mHB9u.siGkvtEOOrFNlX5oEX4mwk5WgTSV/wC','2016-12-03 17:13:58',0,0,NULL,NULL,NULL,'a:1:{i:0;s:12:\"ROLE_TEACHER\";}',0,NULL,NULL),(4,'alejandro','alejandro','mmoscosodcl@gmail.com','mmoscosodcl@gmail.com',1,'gysu8achv3kscc0okkwgkk0skggwsoo','$2y$13$qiTMRDtib4PSB3VvHv0bpeSZXd06VXE7zst0fgWTjDxgF5cb8I82W',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:12:\"ROLE_STUDENT\";}',0,NULL,NULL);
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

-- Dump completed on 2016-12-05  0:02:52
