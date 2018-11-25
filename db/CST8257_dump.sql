-- MySQL dump 10.13  Distrib 8.0.12, for osx10.13 (x86_64)
--
-- Host: localhost    Database: CST8257
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Course`
--
use CST8257;

DROP TABLE IF EXISTS `Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Course` (
  `CourseCode` varchar(10) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `WeeklyHours` int(11) NOT NULL,
  PRIMARY KEY (`CourseCode`)
) ENGINE=MariaDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Course`
--

LOCK TABLES `Course` WRITE;
/*!40000 ALTER TABLE `Course` DISABLE KEYS */;
INSERT INTO `Course` VALUES ('CST8110','Introduction to Computer Programming',4),('CST8209','Web Programming I',4),('CST8260','Database System and Concepts',3),('ENL1818T','Communications I',3),('MAT8001','Math Fundamentals',3),('MGT8100','Career and College Success Skills',3),('CST8250','Database Design and Administration',4),('CST8253','Web Programming II',3),('CST8254','Network Operating Systems',4),('CST8255','Web Imaging and Animations',3),('CST8256','Web Programming Languages I',4),('CST8257','Web Applications Development',4),('CST8258','Web Project Management',3),('ENL1819T','Reporting Technical Information',3),('WKT8100','Cooperative Education Work Term Preparation',5),('CST8259','Web Programming Languages II',4),('CST8265','Web Security Basics',4),('CST8267','Ecommerce',3),('CON8101','Residential Building/Estimating',5),('CON8411','Construction Materials I',3),('CON8430','Computers and You',3),('MAT8050','Geometry and Trigonometry',3),('SAF8408','Health and Safety',4),('SUR8411','Construction Surveying I',5),('CON8102','Commercial Building/Estimating',5),('CON8417','Construction Materials II',5),('ENG8101','Statics',5),('ENL1818M','Communications II',6),('MAT8051','Algebra',3),('SUR8417','Construction Surveying II',3),('GED0192','General Education Elective',3),('CAD8400','AutoCAD I',3),('CON8404','Civil Estimating',3),('CON8436','Building Systems',5),('ENG8102','Strength of Materials',3),('ENG8411','Structural Analysis',3),('MGT8400','Project Administration',4),('CAD8405','AutoCAD II',4),('CON8418','Construction Building Code',3),('ENG8328','Hydraulics',3),('ENG8404','Introduction to Structural Design',3),('ENG8454','Geotechnical Materials',3),('ENL1819Q','Reporting Technical Information II',5),('ENV8400','Environmental Engineering',3),('CON8406','Project Scheduling and Cost Control',3),('CON8425',' Design of Steel Structures',3),('CON8445','Soils Analysis',3),('CON8466','Highway Engineering',3),('ENL4004','Orientation to Report Writing',4),('MAT8201','Calculus 1',3),('SUR8400','Civil Surveying III',3),('CON8416','GIS for Civil Engineering',3),('CON8447','Foundations',3),('CON8476','Business Principles',3),('ENG8435','Reinforced Concrete Design',3),('ENG8451','Water and Waste Water Technology',3),('ENL8420','Project Report',3);
/*!40000 ALTER TABLE `Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CourseOffer`
--

DROP TABLE IF EXISTS `CourseOffer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `CourseOffer` (
  `CourseCode` varchar(10) NOT NULL,
  `SemesterCode` varchar(10) NOT NULL,
  PRIMARY KEY (`CourseCode`,`SemesterCode`)
) ENGINE=MariaDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CourseOffer`
--

LOCK TABLES `CourseOffer` WRITE;
/*!40000 ALTER TABLE `CourseOffer` DISABLE KEYS */;
INSERT INTO `CourseOffer` VALUES ('CAD8400','17S'),('CAD8405','17F'),('CAD8405','18W'),('CON8101','19F'),('CON8102','17W'),('CON8404','17S'),('CON8406','18W'),('CON8411','19F'),('CON8416','18S'),('CON8417','17W'),('CON8418','17F'),('CON8418','18W'),('CON8425','18W'),('CON8430','19F'),('CON8436','17S'),('CON8445','18W'),('CON8447','18F'),('CON8466','18W'),('CON8476','18F'),('CST8110','18F'),('CST8110','19W'),('CST8209','18F'),('CST8209','19W'),('CST8250','17W'),('CST8250','19W'),('CST8253','17S'),('CST8253','19S'),('CST8254','17S'),('CST8254','19S'),('CST8255','17S'),('CST8255','19S'),('CST8256','19S'),('CST8257','19S'),('CST8258','19F'),('CST8259','19F'),('CST8260','18F'),('CST8260','19W'),('CST8265','19F'),('CST8267','19F'),('ENG8101','17W'),('ENG8102','17S'),('ENG8328','17F'),('ENG8328','18W'),('ENG8404','17F'),('ENG8404','18S'),('ENG8411','17F'),('ENG8411','18W'),('ENG8435','18F'),('ENG8451','18F'),('ENG8454','17F'),('ENG8454','18S'),('ENL1818M','17W'),('ENL1818T','17W'),('ENL1818T','19W'),('ENL1819Q','18W'),('ENL1819T','19F'),('ENL4004','18S'),('ENL8420','18F'),('ENV8400','18W'),('GED0192','17S'),('MAT8001','17W'),('MAT8001','19W'),('MAT8050','17W'),('MAT8051','17S'),('MAT8201','18S'),('MGT8100','17W'),('MGT8100','19W'),('MGT8400','17F'),('MGT8400','18W'),('SAF8408','17W'),('SUR8400','18S'),('SUR8411','17W'),('SUR8417','17S'),('WKT8100','19F');
/*!40000 ALTER TABLE `CourseOffer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Registration` (
  `StudentId` varchar(16) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  PRIMARY KEY (`StudentId`,`CourseCode`)
) ENGINE=MariaDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registration`
--

LOCK TABLES `Registration` WRITE;
/*!40000 ALTER TABLE `Registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `Registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Semester`
--

DROP TABLE IF EXISTS `Semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Semester` (
  `SemesterCode` varchar(10) NOT NULL,
  `Year` int(11) NOT NULL,
  `Term` varchar(10) NOT NULL,
  PRIMARY KEY (`SemesterCode`)
) ENGINE=MariaDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semester`
--

LOCK TABLES `Semester` WRITE;
/*!40000 ALTER TABLE `Semester` DISABLE KEYS */;
INSERT INTO `Semester` VALUES ('19W',2019,'Winter'),('19S',2019,'Summer'),('19F',2019,'Fall'),('17W',2017,'Winter'),('17S',2017,'Summer'),('17F',2017,'Fall'),('18W',2018,'Winter'),('18S',2018,'Summer'),('18F',2018,'Fall');
/*!40000 ALTER TABLE `Semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Student` (
  `StudentId` varchar(16) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Phone` varchar(16) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=MariaDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-07 16:43:28
