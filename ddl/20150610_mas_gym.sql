-- MySQL dump 10.13  Distrib 5.5.28, for Win64 (x86)
--
-- Host: localhost    Database: mas_gym
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `mas_banner`
--

DROP TABLE IF EXISTS `mas_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_banner`
--

LOCK TABLES `mas_banner` WRITE;
/*!40000 ALTER TABLE `mas_banner` DISABLE KEYS */;
INSERT INTO `mas_banner` VALUES (1,'upload/banner/img1-394128084.jpg','gym fitness','strength, speed, stamina',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(2,'upload/banner/slide2-703698718.jpg','cardio fitness','cardiovascular fitness',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(3,'upload/banner/slide3-1245081558.jpg','Taek wondo','power, strength, stamina',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(4,'upload/banner/img1-394128084.jpg','indoor cyling','stamina, strength, power',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00');
/*!40000 ALTER TABLE `mas_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_class`
--

DROP TABLE IF EXISTS `mas_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `about` text NOT NULL,
  `features` text NOT NULL,
  `trainer_id` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_class`
--

LOCK TABLES `mas_class` WRITE;
/*!40000 ALTER TABLE `mas_class` DISABLE KEYS */;
INSERT INTO `mas_class` VALUES (1,'Gym Fitness','strength, speed, stamina','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.','[\"Lorem ipsum pheretra interdurum\",\"Suspendise venis\",\"Saunas personicale\"]','1,2','upload/class/blog_img3.jpg','upload/class/thumb/thumb1.jpg','gym-fitness',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(2,'Taek Wondo','strength, speed, stamina','Lorem ipsum dolor sit amet, consectetur adipiscing elit. ','[\"Lorem ipsum pheretra interdurum\",\"Suspendise venis\",\"Saunas personicale\",\"Union terminale\"]','1','upload/class/slide1-1023037567-469433701.jpg','upload/class/thumb/thumb_slide1-1023037567-469433701.jpg','taek-wondo',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(3,'Cardio Fitness','cardiovascular fitness','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.','[\"Lorem ipsum pheretra interdurum\",\"Suspendise venis\",\"Saunas personicale\",\"Union terminale\"]','1','upload/class/img1-964858599.jpg','upload/class/thumb/thumb_img1-964858599.jpg','cardio-fitness',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00');
/*!40000 ALTER TABLE `mas_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_class_trainer`
--

DROP TABLE IF EXISTS `mas_class_trainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_class_trainer` (
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_class_trainer`
--

LOCK TABLES `mas_class_trainer` WRITE;
/*!40000 ALTER TABLE `mas_class_trainer` DISABLE KEYS */;
INSERT INTO `mas_class_trainer` VALUES (2,1),(3,1),(3,1),(1,1),(1,2);
/*!40000 ALTER TABLE `mas_class_trainer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_comments`
--

DROP TABLE IF EXISTS `mas_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_comments`
--

LOCK TABLES `mas_comments` WRITE;
/*!40000 ALTER TABLE `mas_comments` DISABLE KEYS */;
INSERT INTO `mas_comments` VALUES (1,1,'0231321',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00',0);
/*!40000 ALTER TABLE `mas_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_company_info`
--

DROP TABLE IF EXISTS `mas_company_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_company_info` (
  `company_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_address_1` varchar(255) NOT NULL,
  `street_address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `opening_hours` text,
  `opening_day_type` varchar(10) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_company_info`
--

LOCK TABLES `mas_company_info` WRITE;
/*!40000 ALTER TABLE `mas_company_info` DISABLE KEYS */;
INSERT INTO `mas_company_info` VALUES (1,'B17 L3 Acacia St. Along','CAA rd. Belisario Subd','Las Pinas City','muscleandscience@gmail.com','[\"+123 755 755\",\"+123 655 655\"]','[{\"day\":\"Monday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Tuesday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Wednesday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Thursday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Friday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Saturday\",\"opening\":\"07:00\",\"closing\":\"22:00\"},{\"day\":\"Sunday\",\"opening\":\"07:00\",\"closing\":\"17:00\"}]','MF',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00');
/*!40000 ALTER TABLE `mas_company_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_company_social`
--

DROP TABLE IF EXISTS `mas_company_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_company_social` (
  `company_social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_network` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_company_social`
--

LOCK TABLES `mas_company_social` WRITE;
/*!40000 ALTER TABLE `mas_company_social` DISABLE KEYS */;
INSERT INTO `mas_company_social` VALUES (1,'Facebook','https://www.facebook.com/muscleandsciencegym','facebook',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(2,'Twitter','https://twitter.com/MuscleandScienc','twitter',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(3,'Google+','https://plus.google.com/u/0/105885516485646378454/about','google',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(4,'Skype','','skype',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00');
/*!40000 ALTER TABLE `mas_company_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_constant`
--

DROP TABLE IF EXISTS `mas_constant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_constant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_string` varchar(30) NOT NULL,
  `value_name` varchar(45) NOT NULL,
  `value1` varchar(45) NOT NULL,
  `value2` varchar(45) DEFAULT NULL,
  `value3` varchar(45) DEFAULT NULL,
  `value4` varchar(45) DEFAULT NULL,
  `value5` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_constant`
--

LOCK TABLES `mas_constant` WRITE;
/*!40000 ALTER TABLE `mas_constant` DISABLE KEYS */;
INSERT INTO `mas_constant` VALUES (1,'META','description','Gym/Fitness Center','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(2,'META','keywords','gym, fitness, health, center, muscle, science','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(3,'META','author','KBVCodes, 2014','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(4,'IMG_PATH','banner','/upload/banner/','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(5,'IMAGE_CONFIG','allowed_type','gif|jpg|png','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(6,'IMAGE_CONFIG','max_size','350','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(7,'IMAGE_CONFIG','max_width','1024','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(8,'IMAGE_CONFIG','max_height','768','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(9,'NO_IMAGE','file_path','assets/img/','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(10,'NO_IMAGE','raw_name','noPhoto-icon','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00'),(11,'NO_IMAGE','file_ext','.png','','','','','',1,'2015-05-12 00:00:00',1,'2015-05-12 00:00:00');
/*!40000 ALTER TABLE `mas_constant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_gallery`
--

DROP TABLE IF EXISTS `mas_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) NOT NULL,
  `album_cover` int(11) DEFAULT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `restrict` tinyint(1) NOT NULL,
  `view` varchar(10) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_gallery`
--

LOCK TABLES `mas_gallery` WRITE;
/*!40000 ALTER TABLE `mas_gallery` DISABLE KEYS */;
INSERT INTO `mas_gallery` VALUES (1,'Muscle and Science',3,'2014-06-09 16:00:00',1,'public','muscle-and-science'),(2,'Personal Training',3,'2014-06-11 16:00:00',1,'public','personal-training'),(3,'GYM Members',3,'2014-06-15 16:00:00',1,'public','gym-members');
/*!40000 ALTER TABLE `mas_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_gallery_photos`
--

DROP TABLE IF EXISTS `mas_gallery_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_gallery_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_thumb` varchar(255) NOT NULL,
  `date_taken` date NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_gallery_photos`
--

LOCK TABLES `mas_gallery_photos` WRITE;
/*!40000 ALTER TABLE `mas_gallery_photos` DISABLE KEYS */;
INSERT INTO `mas_gallery_photos` VALUES (1,1,'upload/gallery/gym2-1003888424.jpg','upload/gallery/thumb/thumb_gym2-1003888424.jpg','1970-01-01','2014-07-04 17:18:21','','NOW OPEN!!!<br>Monday - Friday (07:00 PM - 10:00 PM)<br>Sunday (10:00PM - 05:00PM)'),(2,1,'upload/gallery/gym-175870889.jpg','upload/gallery/thumb/thumb_gym-175870889.jpg','0000-00-00','2014-07-04 17:23:55','','No description'),(3,1,'upload/gallery/gallery_img4-715403363.jpg','upload/gallery/thumb/thumb_gallery_img4-715403363.jpg','0000-00-00','2014-07-13 05:45:29','','No description'),(4,3,'upload/profile/gallery_img1-1114092816.jpg','upload/profile/thumb/thumb_gallery_img1-1114092816.jpg','0000-00-00','2014-07-13 05:47:37','','No description'),(5,2,'upload/profile/gallery_img3-305138360.jpg','upload/profile/thumb/thumb_gallery_img3-305138360.jpg','0000-00-00','2014-07-13 05:47:53','','No description'),(6,2,'upload/profile/gallery_img2-59900239.jpg','upload/profile/thumb/thumb_gallery_img2-59900239.jpg','0000-00-00','2014-07-13 05:48:08','','No description'),(7,2,'upload/profile/gallery_img4-1147442447.jpg','upload/profile/thumb/thumb_gallery_img4-1147442447.jpg','0000-00-00','2014-07-13 05:54:41','','No description'),(8,2,'upload/profile/gallery_img1-978112387.jpg','upload/profile/thumb/thumb_gallery_img1-978112387.jpg','0000-00-00','2014-07-13 05:56:31','','No description');
/*!40000 ALTER TABLE `mas_gallery_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_homebox`
--

DROP TABLE IF EXISTS `mas_homebox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_homebox` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_homebox`
--

LOCK TABLES `mas_homebox` WRITE;
/*!40000 ALTER TABLE `mas_homebox` DISABLE KEYS */;
INSERT INTO `mas_homebox` VALUES (1,'LG','Gym Membership','for FREE!','Enroll now and get to train with the Champion!!','note','http://localhost/muscleandscience/view/classes.php'),(2,'G','Personal Training','sign up today','Sign up today and get your free training program,  and boxing lessons.','calendar','http://localhost/muscleandscience/view/classes.php');
/*!40000 ALTER TABLE `mas_homebox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_members`
--

DROP TABLE IF EXISTS `mas_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_members`
--

LOCK TABLES `mas_members` WRITE;
/*!40000 ALTER TABLE `mas_members` DISABLE KEYS */;
INSERT INTO `mas_members` VALUES (1,1400004,2,'2014-07-13','2014-08-13',450.00,0.00,'paid'),(2,1400004,1,'2014-08-31','2014-08-31',50.00,0.00,'paid');
/*!40000 ALTER TABLE `mas_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_members_payment`
--

DROP TABLE IF EXISTS `mas_members_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_members_payment` (
  `mem_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`mem_pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_members_payment`
--

LOCK TABLES `mas_members_payment` WRITE;
/*!40000 ALTER TABLE `mas_members_payment` DISABLE KEYS */;
INSERT INTO `mas_members_payment` VALUES (1,1,300.00,'2014-07-13 13:47:23'),(2,1,50.00,'2014-07-17 14:31:19'),(3,1,100.00,'2014-07-21 01:22:10'),(4,2,45.00,'2014-08-31 12:30:08'),(5,2,5.00,'2014-08-31 12:30:31');
/*!40000 ALTER TABLE `mas_members_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_message`
--

DROP TABLE IF EXISTS `mas_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_to` varchar(255) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_date` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_message`
--

LOCK TABLES `mas_message` WRITE;
/*!40000 ALTER TABLE `mas_message` DISABLE KEYS */;
INSERT INTO `mas_message` VALUES (1,'Admin, TechAdmin',1400003,'2014-07-07 21:12:26','Contact Message',1,1,0),(2,'Admin, TechAdmin',1400003,'2014-07-07 21:15:18','Contact Message',1,1,0),(3,'Admin, TechAdmin',1400003,'2014-07-07 21:36:10','Contact Message',1,1,0),(4,'Admin, TechAdmin',1400003,'2014-07-07 21:36:15','Contact Message',1,1,0),(5,'Admin, TechAdmin',1400003,'2014-07-07 21:37:04','Contact Message',1,1,0),(6,'Admin, TechAdmin',1400003,'2014-07-07 21:37:26','Contact Message',1,1,0),(7,'Admin, TechAdmin',1400003,'2014-07-07 21:42:11','Contact Message',1,1,0),(8,'Admin, TechAdmin',1400003,'2014-07-07 22:27:39','Contact Message',1,1,0),(9,'Admin, TechAdmin',1400003,'2014-07-07 22:30:18','Contact Message',1,1,0),(10,'Admin, TechAdmin',1400003,'2014-07-07 22:36:20','Contact Message',1,1,0),(11,'Admin, TechAdmin',1400003,'2014-07-07 22:39:58','Contact Message',1,1,0),(12,'Admin, TechAdmin',1400003,'2014-07-07 23:22:16','Contact Message',1,1,0),(13,'Admin, TechAdmin',1400001,'2014-07-10 17:37:39','Contact Message',1,1,0),(14,'Admin, TechAdmin',1400003,'2014-07-10 22:11:18','Contact Message',1,1,0);
/*!40000 ALTER TABLE `mas_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_message_details`
--

DROP TABLE IF EXISTS `mas_message_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_message_details` (
  `msg_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sequence` int(5) NOT NULL,
  PRIMARY KEY (`msg_det_id`),
  KEY `msg_id` (`msg_id`),
  CONSTRAINT `message_details_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `mas_message` (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_message_details`
--

LOCK TABLES `mas_message_details` WRITE;
/*!40000 ALTER TABLE `mas_message_details` DISABLE KEYS */;
INSERT INTO `mas_message_details` VALUES (1,1,'$msg',1),(3,1,'asda',1),(4,1,'sdasdas',1),(5,2,'sdasdas',1),(6,3,'sdasdas',1),(7,4,'asda',1),(8,5,'asda',1),(9,6,'asdasd',1),(10,7,'asd',1),(11,8,'asdas',1),(12,9,'asdas',1),(13,10,'asdas',1),(14,11,'12311\\r\\n',1),(15,12,'asdas',1),(16,13,'asdasdasd',1),(17,14,'Do not hesitate to send us a message',1);
/*!40000 ALTER TABLE `mas_message_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_package`
--

DROP TABLE IF EXISTS `mas_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_package`
--

LOCK TABLES `mas_package` WRITE;
/*!40000 ALTER TABLE `mas_package` DISABLE KEYS */;
INSERT INTO `mas_package` VALUES (1,'Per Session',1,50.00,'session','Gym package per session'),(2,'monthly fee',30,450.00,'monthly','Monthly FEE');
/*!40000 ALTER TABLE `mas_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_post`
--

DROP TABLE IF EXISTS `mas_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_post`
--

LOCK TABLES `mas_post` WRITE;
/*!40000 ALTER TABLE `mas_post` DISABLE KEYS */;
INSERT INTO `mas_post` VALUES (1,'sample','2015-06-02 00:00:00','sample',NULL,1,'2015-06-01 16:00:00',1,'2015-06-01 16:00:00',0),(2,'sample2','2015-06-02 00:00:00','sample2',NULL,1,'2015-06-01 16:00:00',1,'2015-06-01 16:00:00',0);
/*!40000 ALTER TABLE `mas_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_post_details`
--

DROP TABLE IF EXISTS `mas_post_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_post_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `sequence` int(5) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_post_details`
--

LOCK TABLES `mas_post_details` WRITE;
/*!40000 ALTER TABLE `mas_post_details` DISABLE KEYS */;
INSERT INTO `mas_post_details` VALUES (1,1,1,'<span>NOW OPEN!!!</span><br style=\"box&#45;sizing: border&#45;box; color: rgb(197, 197, 197); font&#45;family: arial; font&#45;size: 13px; line&#45;height: 19.5px; background&#45;color: rgb(21, 21, 21);\"><span>Monday &#45; Friday (07:00 AM &#45; 10:00 PM)</span><div><span>Sunday &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (07:00 AM &#45; 05:00 PM)</span></div><div><span><br></span></div><div><span>B17 L3 Acacia St. Along&nbsp;</span><span>CAA rd. Belisario Subd. Las PiÃ±as City</span></div><div><span>Located near total gas station</span></div><div><span><br></span></div><div><img src=\"http://localhost/muscleandscience/upload/gallery/gym2&#45;1003888424.jpg\"></div>'),(2,2,1,'dasdas');
/*!40000 ALTER TABLE `mas_post_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_post_tags`
--

DROP TABLE IF EXISTS `mas_post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_post_tags` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_post_tags`
--

LOCK TABLES `mas_post_tags` WRITE;
/*!40000 ALTER TABLE `mas_post_tags` DISABLE KEYS */;
INSERT INTO `mas_post_tags` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `mas_post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_pt`
--

DROP TABLE IF EXISTS `mas_pt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_pt` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_pt`
--

LOCK TABLES `mas_pt` WRITE;
/*!40000 ALTER TABLE `mas_pt` DISABLE KEYS */;
INSERT INTO `mas_pt` VALUES (1,'1 Session',1,350.00,'session','&#8369; 350.00 Per Session'),(2,'5 Session',5,1000.00,'session','Save up to &#8369; <span class=\'text-cross\'>750.00</span>'),(3,'10 Session',10,2000.00,'session','Save up to &amp;#8369; <strike>1,500.00</strike>');
/*!40000 ALTER TABLE `mas_pt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_pt_attendance`
--

DROP TABLE IF EXISTS `mas_pt_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_pt_attendance` (
  `pt_attend_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `date_present` date NOT NULL,
  PRIMARY KEY (`pt_attend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_pt_attendance`
--

LOCK TABLES `mas_pt_attendance` WRITE;
/*!40000 ALTER TABLE `mas_pt_attendance` DISABLE KEYS */;
INSERT INTO `mas_pt_attendance` VALUES (1,1,'2014-07-11'),(2,1,'2014-07-13');
/*!40000 ALTER TABLE `mas_pt_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_pt_members`
--

DROP TABLE IF EXISTS `mas_pt_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_pt_members` (
  `pt_mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `session` int(11) NOT NULL,
  `session_left` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`pt_mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_pt_members`
--

LOCK TABLES `mas_pt_members` WRITE;
/*!40000 ALTER TABLE `mas_pt_members` DISABLE KEYS */;
INSERT INTO `mas_pt_members` VALUES (1,1400003,2,'2014-07-07',5,3,1000.00,0.00,'pending');
/*!40000 ALTER TABLE `mas_pt_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_pt_payment`
--

DROP TABLE IF EXISTS `mas_pt_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_pt_payment` (
  `pt_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`pt_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_pt_payment`
--

LOCK TABLES `mas_pt_payment` WRITE;
/*!40000 ALTER TABLE `mas_pt_payment` DISABLE KEYS */;
INSERT INTO `mas_pt_payment` VALUES (1,1,500.00,'2014-07-07 19:10:55'),(2,1,50.00,'2014-09-06 02:08:16');
/*!40000 ALTER TABLE `mas_pt_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_setting`
--

DROP TABLE IF EXISTS `mas_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_setting`
--

LOCK TABLES `mas_setting` WRITE;
/*!40000 ALTER TABLE `mas_setting` DISABLE KEYS */;
INSERT INTO `mas_setting` VALUES (1,'comment',1,'Allow user to comment on blog posts'),(2,'contact',1,'Allow user to leave a message from contact form.');
/*!40000 ALTER TABLE `mas_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_special_package`
--

DROP TABLE IF EXISTS `mas_special_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_special_package` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_special_package`
--

LOCK TABLES `mas_special_package` WRITE;
/*!40000 ALTER TABLE `mas_special_package` DISABLE KEYS */;
INSERT INTO `mas_special_package` VALUES (1,'Senior Card','20% Off',''),(2,'Family Card','10% Off','');
/*!40000 ALTER TABLE `mas_special_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_tags`
--

DROP TABLE IF EXISTS `mas_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_tags`
--

LOCK TABLES `mas_tags` WRITE;
/*!40000 ALTER TABLE `mas_tags` DISABLE KEYS */;
INSERT INTO `mas_tags` VALUES (1,'muscle science',1,'2015-05-04 16:00:00',1,'2015-05-04 16:00:00'),(2,'news',1,'2015-05-04 16:00:00',1,'2015-05-04 16:00:00');
/*!40000 ALTER TABLE `mas_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_tracer`
--

DROP TABLE IF EXISTS `mas_tracer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_tracer` (
  `tracer_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `date_exec` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`tracer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_tracer`
--

LOCK TABLES `mas_tracer` WRITE;
/*!40000 ALTER TABLE `mas_tracer` DISABLE KEYS */;
INSERT INTO `mas_tracer` VALUES (1,1400001,'2014-07-07 17:20:37','Muscle Science','Created new user account (dylan.mckenzie) and added it to GYM members'),(2,1400001,'2014-07-07 17:21:01','Muscle Science','Created new user account (steven.sky) and added it to GYM members'),(3,1400001,'2014-07-07 17:21:23','Muscle Science','Created new user account (reikado.lezaille) and added it to PT members'),(4,1400001,'2014-07-07 17:21:36','Muscle Science','Created new user account (aeone.rivera) and added it to PT members'),(5,1400001,'2014-07-07 17:22:02','Muscle Science','Entered (aeone.rivera) payment for pt (&#8369; 1000)'),(6,1400001,'2014-07-07 19:07:51','Muscle Science','Deleted GYM membership of (dylan.mckenzie)'),(7,1400001,'2014-07-07 19:08:00','Muscle Science','Deleted GYM membership of (steven.sky)'),(8,1400001,'2014-07-07 19:08:15','Muscle Science','Deleted Personal Training membership of (aeone.rivera)'),(9,1400001,'2014-07-07 19:08:26','Muscle Science','Deleted Personal Training membership of (reikado.lezaille)'),(10,1400001,'2014-07-07 19:08:42','Muscle Science','Deleted (aeone.rivera)'),(11,1400001,'2014-07-07 19:08:50','Muscle Science','Deleted (1400004)'),(12,1400001,'2014-07-07 19:08:59','Muscle Science','Deleted (1400002)'),(13,1400001,'2014-07-07 19:09:08','Muscle Science','Deleted (1400003)'),(14,1400001,'2014-07-07 19:10:55','Muscle Science','Created new user account (aeone.rivera) and added it to PT members'),(15,1400001,'2014-07-13 13:43:36','Muscle Science','Edited (aeone.rivera) user account'),(16,1400001,'2014-07-13 13:47:23','Muscle Science','Created new user account (steven.sky) and added it to GYM members'),(17,1400001,'2014-07-17 14:31:19','Muscle Science','Entered (steven.sky) payment for member (&#8369; 50)'),(18,1400001,'2014-07-17 23:16:21','Muscle Science','Updated Gym class (Boxing), (about) field'),(19,1400001,'2014-07-20 17:47:10','Muscle Science','Added new gym class (Sdasda)'),(20,1400001,'2014-07-20 17:48:12','Muscle Science','Removed (Sdasda) from Gym class'),(21,1400001,'2014-07-21 01:22:10','Muscle Science','Entered (steven.sky) payment for member (&#8369; 100)'),(22,1400001,'2014-07-21 01:27:30','Muscle Science','Activated user acount (steven.sky)'),(23,1400001,'2014-07-21 17:07:13','Muscle Science','Updated Gym class (Gym Fitnesss), (about) field'),(24,1400001,'2014-08-31 12:30:08','Muscle Science','Added (steven.sky) to GYM members'),(25,1400001,'2014-08-31 12:30:31','Muscle Science','Entered (steven.sky) payment for member (&#8369; 5)'),(26,1400001,'2014-09-06 02:08:16','Muscle Science','Entered (aeone.rivera) payment for pt (&#8369; 50)');
/*!40000 ALTER TABLE `mas_tracer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_trainer`
--

DROP TABLE IF EXISTS `mas_trainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_trainer` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `quote` text NOT NULL,
  `about` text NOT NULL,
  `skills` text NOT NULL,
  `experience` int(11) NOT NULL,
  `achievement` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_trainer`
--

LOCK TABLES `mas_trainer` WRITE;
/*!40000 ALTER TABLE `mas_trainer` DISABLE KEYS */;
INSERT INTO `mas_trainer` VALUES (1,'Mark','Ventura','Even if you can\'t physically see the results in front of you, every single effort is chaning your body from the inside.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare mi, et mollis tellus neque vitae elit.','[\"Lorem ipsum pheretra\",\"Suspendise venis\",\"Saunas personicale\",\"Union terminale\"] ',2,'[\"Lorem ipsum pheretra interdurum\",\"Suspendise venis\"]','upload/trainer/trainer_1-416762801.jpg','upload/trainer/thumb/thumb_trainer_1-416762801.jpg'),(2,'Kevin','Valencia','Even if you can\'t physically see the results in front of you, every single effort is chaning your body from the inside.','','[\"fhadasd\",\"asdasdasdasd\",\"adsa\"]',8,'[\"fhadasd\",\"asdasdasdasd\",\"adsa\",\"fhadasd\",\"asdasdasdasd\",\"adsa\"]','','');
/*!40000 ALTER TABLE `mas_trainer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_users`
--

DROP TABLE IF EXISTS `mas_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_users` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_users`
--

LOCK TABLES `mas_users` WRITE;
/*!40000 ALTER TABLE `mas_users` DISABLE KEYS */;
INSERT INTO `mas_users` VALUES (1,'admin','c601f9339c645fb770',30,'Science','Muscle',1,'F','1991-05-20','','muscleandscience@gmail.com','','',1),(2,'Guest','c601f9339c645fb770',10,'','Guest',1,'','2014-07-07','','','','',2),(3,'aeone.rivera','c601f9339c645fb770',10,'Rivera','Aeone',1,'F','2009-00-06','','rivera@yahoo.com','','',3),(4,'steven.sky','7807936dd37a6422ea',10,'sky','steven',1,'M','0000-00-00','','','','',4);
/*!40000 ALTER TABLE `mas_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_users_login`
--

DROP TABLE IF EXISTS `mas_users_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas_users_login` (
  `loginID` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`loginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_users_login`
--

LOCK TABLES `mas_users_login` WRITE;
/*!40000 ALTER TABLE `mas_users_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `mas_users_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-10 17:09:26
