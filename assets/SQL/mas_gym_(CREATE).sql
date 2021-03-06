-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 05:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mas_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `mas_attendance`
--
DROP TABLE IF EXISTS `mas_attendance`;
/* Create table mas_attendance */
CREATE TABLE `mas_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `date_present` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_banner`
--
DROP TABLE IF EXISTS `mas_banner`;
/* Create table mas_banner */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_class`
--
DROP TABLE IF EXISTS `mas_class`;
/* Create table mas_class */
CREATE TABLE `mas_class` (
  `id` int(11) NOT NULL  AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `about` text NOT NULL,
  `features` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_class_trainer`
--
DROP TABLE IF EXISTS `mas_class_trainer`;
/* Create table mas_class_trainer */
CREATE TABLE `mas_class_trainer` (
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_comments`
--
DROP TABLE IF EXISTS `mas_comments`;
/* Create table mas_comments */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_company_info`
--
DROP TABLE IF EXISTS `mas_company_info`;
/* Create table mas_company_info */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_company_social`
--
DROP TABLE IF EXISTS `mas_company_social`;
/* Create table mas_company_social */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_gallery`
--
DROP TABLE IF EXISTS `mas_gallery`;
/* Create table mas_gallery */
CREATE TABLE `mas_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) NOT NULL,
  `album_cover` int(11) DEFAULT NULL,
  `restrict` tinyint(1) NOT NULL,
  `view` varchar(10) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_gallery_photos`
--
DROP TABLE IF EXISTS `mas_gallery_photos`;
/* Create table mas_gallery_photos */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_homebox`
--
DROP TABLE IF EXISTS `mas_homebox`;
/* Create table mas_homebox */
CREATE TABLE `mas_homebox` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_members`
--
DROP TABLE IF EXISTS `mas_members`;
/* Create table mas_members */
CREATE TABLE `mas_members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL,
  `note` varchar(50) DEFAULT NULL,
  `session_left` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_members_payment`
--
DROP TABLE IF EXISTS `mas_members_payment`;
/* Create table mas_members_payment */
CREATE TABLE `mas_members_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_members_ranking`
--
DROP TABLE IF EXISTS `mas_members_ranking`;
/* Create table mas_members_ranking */
CREATE TABLE `mas_members_ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_message`
--
DROP TABLE IF EXISTS `mas_message`;
/* Create table mas_message */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_message_details`
--
DROP TABLE IF EXISTS `mas_message_details`;
/* Create table mas_message_details */
CREATE TABLE `mas_message_details` (
  `msg_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sequence` int(5) NOT NULL,
  PRIMARY KEY (`msg_det_id`),
  KEY `msg_id` (`msg_id`),
  CONSTRAINT `message_details_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `mas_message` (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_operating_type`
--
DROP TABLE IF EXISTS `mas_operating_type`;
/* Create table mas_operating_type */
CREATE TABLE `mas_operating_type` (
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_package`
--
DROP TABLE IF EXISTS `mas_package`;
/* Create table mas_package */
CREATE TABLE `mas_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_type_id` int(11) NOT NULL,
  `package_type` varchar(10) NOT NULL,
  `package` varchar(255) NOT NULL,
  `session` tinyint(2) NOT NULL DEFAULT '0',
  `monthly` tinyint(2) NOT NULL DEFAULT '0',
  `total_session` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_package_type`
--
DROP TABLE IF EXISTS `mas_package_type`;
/* Create table mas_package_type */
CREATE TABLE `mas_package_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(45) NOT NULL,
  `package_code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_post`
--
DROP TABLE IF EXISTS `mas_post`;
/* Create table mas_post */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_post_details`
--
DROP TABLE IF EXISTS `mas_post_details`;
/* Create table mas_post_details */
CREATE TABLE `mas_post_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `sequence` int(5) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_post_tags`
--
DROP TABLE IF EXISTS `mas_post_tags`;
/* Create table mas_post_tags */
CREATE TABLE `mas_post_tags` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_attendance`
--
DROP TABLE IF EXISTS `mas_pt_attendance`;
/* Create table mas_pt_attendance */
CREATE TABLE `mas_pt_attendance` (
  `pt_attend_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `date_present` date NOT NULL,
  PRIMARY KEY (`pt_attend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_members`
--
DROP TABLE IF EXISTS `mas_pt_members`;
/* Create table mas_pt_members */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_payment`
--
DROP TABLE IF EXISTS `mas_pt_payment`;
/* Create table mas_pt_payment */
CREATE TABLE `mas_pt_payment` (
  `pt_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`pt_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_setting`
--
DROP TABLE IF EXISTS `mas_setting`;
/* Create table mas_setting */
CREATE TABLE `mas_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_sidebar`
--
DROP TABLE IF EXISTS `mas_sidebar`;
/* Create table mas_sidebar */
CREATE TABLE `mas_sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sequence` int(11) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Parent navigation for account sidebar';


-- --------------------------------------------------------

--
-- Table structure for table `mas_sidebar_sub`
--
DROP TABLE IF EXISTS `mas_sidebar_sub`;
/* Create table mas_sidebar_sub */
CREATE TABLE `mas_sidebar_sub` (
  `parent_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_tags`
--
DROP TABLE IF EXISTS `mas_tags`;
/* Create table mas_tags */
CREATE TABLE `mas_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_tracer`
--
DROP TABLE IF EXISTS `mas_tracer`;
/* Create table mas_tracer */
CREATE TABLE `mas_tracer` (
  `tracer_id` int(11) NOT NULL AUTO_INCREMENT,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text NOT NULL,
  PRIMARY KEY (`tracer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_trainer`
--
DROP TABLE IF EXISTS `mas_trainer`;
/* Create table mas_trainer */
CREATE TABLE `mas_trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `quote` text,
  `about` text,
  `skills` text,
  `experience` int(11) DEFAULT NULL,
  `achievement` text,
  `img` varchar(255) DEFAULT NULL,
  `img_thumb` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_users`
--
DROP TABLE IF EXISTS `mas_users`;
/* Create table mas_users */
CREATE TABLE `mas_users` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_users_login`
--
DROP TABLE IF EXISTS `mas_users_login`;
/* Create table mas_users_login */
CREATE TABLE `mas_users_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_attempt` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;