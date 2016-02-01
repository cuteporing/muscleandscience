-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2015 at 05:04 PM
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

CREATE TABLE IF NOT EXISTS `mas_attendance` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_present` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_banner`
--

CREATE TABLE IF NOT EXISTS `mas_banner` (
`banner_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_banner`
--

INSERT INTO `mas_banner` (`banner_id`, `img`, `title`, `subtitle`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'upload/banner/img1-394128084.jpg', 'gym fitness', 'strength, speed, stamina', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'upload/banner/slide2-703698718.jpg', 'cardio fitness', 'cardiovascular fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'upload/banner/slide3-1245081558.jpg', 'Taek wondo', 'power, strength, stamina', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(4, 'upload/banner/img1-394128084.jpg', 'indoor cyling', 'stamina, strength, power', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_class`
--

CREATE TABLE IF NOT EXISTS `mas_class` (
`id` int(11) NOT NULL,
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
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_class`
--

INSERT INTO `mas_class` (`id`, `title`, `subtitle`, `about`, `features`, `img`, `img_thumb`, `slug`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Gym Fitness', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale"]', 'upload/class/blog_img3.jpg', 'upload/class/thumb/thumb1.jpg', 'gym-fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'Taek Wondo', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'upload/class/slide1-1023037567-469433701.jpg', 'upload/class/thumb/thumb_slide1-1023037567-469433701.jpg', 'taek-wondo', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'Cardio Fitness', 'cardiovascular fitness', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'upload/class/img1-964858599.jpg', 'upload/class/thumb/thumb_img1-964858599.jpg', 'cardio-fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_class_trainer`
--

CREATE TABLE IF NOT EXISTS `mas_class_trainer` (
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_class_trainer`
--

INSERT INTO `mas_class_trainer` (`class_id`, `trainer_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mas_comments`
--

CREATE TABLE IF NOT EXISTS `mas_comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_comments`
--

INSERT INTO `mas_comments` (`id`, `post_id`, `comment`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 1, '0231321', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_company_info`
--

CREATE TABLE IF NOT EXISTS `mas_company_info` (
`company_info_id` int(11) NOT NULL,
  `street_address_1` varchar(255) NOT NULL,
  `street_address_2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `opening_hours` text,
  `opening_day_type` varchar(10) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_company_info`
--

INSERT INTO `mas_company_info` (`company_info_id`, `street_address_1`, `street_address_2`, `city`, `email`, `phone`, `opening_hours`, `opening_day_type`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'B17 L3 Acacia St.  Belisario', 'Subd. along CAA rd.', 'Las Pinas City', 'muscleandscience@gmail.com', '["+123 755 755","+123 655 655"]', '[{"day":"Monday","opening":"07:00","closing":"22:00"},{"day":"Tuesday","opening":"07:00","closing":"22:00"},{"day":"Wednesday","opening":"07:00","closing":"22:00"},{"day":"Thursday","opening":"07:00","closing":"22:00"},{"day":"Friday","opening":"07:00","closing":"22:00"},{"day":"Saturday","opening":"07:00","closing":"22:00"},{"day":"Sunday","opening":"07:00","closing":"17:00"}]', 'E', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_company_social`
--

CREATE TABLE IF NOT EXISTS `mas_company_social` (
`company_social_id` int(11) NOT NULL,
  `social_network` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_company_social`
--

INSERT INTO `mas_company_social` (`company_social_id`, `social_network`, `link`, `icon`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Facebook', 'https://www.facebook.com/muscleandsciencegym', 'facebook', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'Twitter', 'https://twitter.com/MuscleandScienc', 'twitter', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'Google+', 'https://plus.google.com/u/0/105885516485646378454/about', 'google', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(4, 'Skype', '', 'skype', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_gallery`
--

CREATE TABLE IF NOT EXISTS `mas_gallery` (
`id` int(11) NOT NULL,
  `album` varchar(255) NOT NULL,
  `album_cover` int(11) DEFAULT NULL,
  `restrict` tinyint(1) NOT NULL,
  `view` varchar(10) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_gallery`
--

INSERT INTO `mas_gallery` (`id`, `album`, `album_cover`, `restrict`, `view`, `slug`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 'Muscle and Science', 3, 1, 'public', 'muscle-and-science', 1, '2014-06-09 16:00:00', 1, '2014-06-09 16:00:00', 0),
(2, 'Personal Training', 3, 1, 'public', 'personal-training', 1, '2014-06-11 16:00:00', 1, '2014-06-09 16:00:00', 0),
(3, 'GYM Members', 3, 1, 'public', 'gym-members', 1, '2014-06-15 16:00:00', 1, '2014-06-09 16:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_gallery_photos`
--

CREATE TABLE IF NOT EXISTS `mas_gallery_photos` (
`id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_thumb` varchar(255) NOT NULL,
  `date_taken` date NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_gallery_photos`
--

INSERT INTO `mas_gallery_photos` (`id`, `gallery_id`, `photo`, `photo_thumb`, `date_taken`, `create_datetime`, `location`, `about`) VALUES
(1, 1, 'img.jpg', 'img.jpg', '1970-01-01', '2014-07-04 17:18:21', '', 'NOW OPEN!!!<br>Monday - Friday (07:00 PM - 10:00 PM)<br>Sunday (10:00PM - 05:00PM)'),
(2, 1, 'upload/gallery/gym-175870889.jpg', 'upload/gallery/thumb/thumb_gym-175870889.jpg', '0000-00-00', '2014-07-04 17:23:55', '', 'No description'),
(3, 1, 'upload/gallery/gallery_img4-715403363.jpg', 'upload/gallery/thumb/thumb_gallery_img4-715403363.jpg', '0000-00-00', '2014-07-13 05:45:29', '', 'No description'),
(4, 3, 'upload/profile/gallery_img1-1114092816.jpg', 'upload/profile/thumb/thumb_gallery_img1-1114092816.jpg', '0000-00-00', '2014-07-13 05:47:37', '', 'No description'),
(5, 2, 'upload/profile/gallery_img3-305138360.jpg', 'upload/profile/thumb/thumb_gallery_img3-305138360.jpg', '0000-00-00', '2014-07-13 05:47:53', '', 'No description'),
(6, 2, 'upload/profile/gallery_img2-59900239.jpg', 'upload/profile/thumb/thumb_gallery_img2-59900239.jpg', '0000-00-00', '2014-07-13 05:48:08', '', 'No description'),
(7, 2, 'upload/profile/gallery_img4-1147442447.jpg', 'upload/profile/thumb/thumb_gallery_img4-1147442447.jpg', '0000-00-00', '2014-07-13 05:54:41', '', 'No description'),
(8, 2, 'upload/profile/gallery_img1-978112387.jpg', 'upload/profile/thumb/thumb_gallery_img1-978112387.jpg', '0000-00-00', '2014-07-13 05:56:31', '', 'No description');

-- --------------------------------------------------------

--
-- Table structure for table `mas_homebox`
--

CREATE TABLE IF NOT EXISTS `mas_homebox` (
`boxid` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_homebox`
--

INSERT INTO `mas_homebox` (`boxid`, `type`, `title`, `subtitle`, `about`, `icon`, `link`) VALUES
(1, 'LG', 'Gym Membership', 'for FREE!', 'Enroll now and get to train with the Champion!!', 'note', 'http://localhost/muscleandscience/view/classes.php'),
(2, 'G', 'Personal Training', 'sign up today', 'Sign up today and get your free training program,  and boxing lessons.', 'calendar', 'http://localhost/muscleandscience/view/classes.php');

-- --------------------------------------------------------

--
-- Table structure for table `mas_members`
--

CREATE TABLE IF NOT EXISTS `mas_members` (
`member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_members`
--

INSERT INTO `mas_members` (`member_id`, `user_id`, `package_id`, `date_start`, `date_end`, `amount`, `discount`, `balance`, `note`, `session_left`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 3, 2, '2014-07-13', '2014-08-13', '450.00', '0.00', '100.00', '', 0, 1, '2015-09-13 10:45:55', 1, '2015-09-13 10:45:55'),
(2, 3, 3, '2014-08-01', '2014-08-31', '50.00', '0.00', '50.00', '', 1, 1, '2015-09-13 10:45:55', 1, '2015-09-13 10:45:55'),
(3, 4, 2, '2015-09-01', '2015-09-30', '450.00', '0.00', '50.00', NULL, 10, 1, '2015-09-19 14:48:04', 1, '2015-09-13 10:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `mas_members_payment`
--

CREATE TABLE IF NOT EXISTS `mas_members_payment` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_members_payment`
--

INSERT INTO `mas_members_payment` (`id`, `member_id`, `amount`, `date_paid`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 1, '300.00', '2014-07-13 13:47:23', 1, '2015-09-13 10:47:39', 1, '2015-09-13 10:47:39'),
(2, 1, '50.00', '2014-07-17 14:31:19', 1, '2015-09-13 10:47:39', 1, '2015-09-13 10:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `mas_members_ranking`
--

CREATE TABLE IF NOT EXISTS `mas_members_ranking` (
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_members_ranking`
--

INSERT INTO `mas_members_ranking` (`user_id`, `points`) VALUES
(3, 30),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mas_message`
--

CREATE TABLE IF NOT EXISTS `mas_message` (
`msg_id` int(11) NOT NULL,
  `msg_to` varchar(255) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_date` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_message`
--

INSERT INTO `mas_message` (`msg_id`, `msg_to`, `msg_from`, `msg_date`, `subject`, `sent`, `status`, `deleted`) VALUES
(1, 'Admin, TechAdmin', 1400003, '2014-07-07 21:12:26', 'Contact Message', 1, 1, 0),
(2, 'Admin, TechAdmin', 1400003, '2014-07-07 21:15:18', 'Contact Message', 1, 1, 0),
(3, 'Admin, TechAdmin', 1400003, '2014-07-07 21:36:10', 'Contact Message', 1, 1, 0),
(4, 'Admin, TechAdmin', 1400003, '2014-07-07 21:36:15', 'Contact Message', 1, 1, 0),
(5, 'Admin, TechAdmin', 1400003, '2014-07-07 21:37:04', 'Contact Message', 1, 1, 0),
(6, 'Admin, TechAdmin', 1400003, '2014-07-07 21:37:26', 'Contact Message', 1, 1, 0),
(7, 'Admin, TechAdmin', 1400003, '2014-07-07 21:42:11', 'Contact Message', 1, 1, 0),
(8, 'Admin, TechAdmin', 1400003, '2014-07-07 22:27:39', 'Contact Message', 1, 1, 0),
(9, 'Admin, TechAdmin', 1400003, '2014-07-07 22:30:18', 'Contact Message', 1, 1, 0),
(10, 'Admin, TechAdmin', 1400003, '2014-07-07 22:36:20', 'Contact Message', 1, 1, 0),
(11, 'Admin, TechAdmin', 1400003, '2014-07-07 22:39:58', 'Contact Message', 1, 1, 0),
(12, 'Admin, TechAdmin', 1400003, '2014-07-07 23:22:16', 'Contact Message', 1, 1, 0),
(13, 'Admin, TechAdmin', 1400001, '2014-07-10 17:37:39', 'Contact Message', 1, 1, 0),
(14, 'Admin, TechAdmin', 1400003, '2014-07-10 22:11:18', 'Contact Message', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_message_details`
--

CREATE TABLE IF NOT EXISTS `mas_message_details` (
`msg_det_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sequence` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_message_details`
--

INSERT INTO `mas_message_details` (`msg_det_id`, `msg_id`, `message`, `sequence`) VALUES
(1, 1, '$msg', 1),
(3, 1, 'asda', 1),
(4, 1, 'sdasdas', 1),
(5, 2, 'sdasdas', 1),
(6, 3, 'sdasdas', 1),
(7, 4, 'asda', 1),
(8, 5, 'asda', 1),
(9, 6, 'asdasd', 1),
(10, 7, 'asd', 1),
(11, 8, 'asdas', 1),
(12, 9, 'asdas', 1),
(13, 10, 'asdas', 1),
(14, 11, '12311\\r\\n', 1),
(15, 12, 'asdas', 1),
(16, 13, 'asdasdasd', 1),
(17, 14, 'Do not hesitate to send us a message', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mas_operating_type`
--

CREATE TABLE IF NOT EXISTS `mas_operating_type` (
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_operating_type`
--

INSERT INTO `mas_operating_type` (`type`, `description`) VALUES
('MF', 'Monday to Friday'),
('E', 'Everyday'),
('WE', 'Weekends');

-- --------------------------------------------------------

--
-- Table structure for table `mas_package`
--

CREATE TABLE IF NOT EXISTS `mas_package` (
`id` int(11) NOT NULL,
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
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_package`
--

INSERT INTO `mas_package` (`id`, `package_type_id`, `package_type`, `package`, `session`, `monthly`, `total_session`, `price`, `points`, `description`, `deleted`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 1, 'M', 'Per Session', 1, 0, 1, '50.00', 1, 'Gym package per session', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 1, 'M', 'Monthly', 0, 1, 30, '450.00', 30, 'Monthly FEE', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 2, 'PT', '1 Session', 1, 0, 1, '350.00', 5, '&#8369; 350.00 Per Session', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 2, 'PT', '5 Session', 1, 0, 5, '1000.00', 25, 'Save up to &#8369; <span class=''text-cross''>750.00</span>', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 2, 'PT', '10 Session', 1, 0, 10, '2000.00', 50, 'Save up to &amp;#8369; <strike>1,500.00</strike>', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 3, 'S', 'Senior Card', 0, 0, 0, NULL, 0, '20% Off', 1, 1, '2015-07-30 08:08:10', 1, '2015-07-30 08:08:10'),
(7, 3, 'S', 'Family Card', 0, 0, 0, NULL, 0, '10% Off', 1, 1, '2015-07-30 08:08:28', 1, '2015-07-30 08:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `mas_package_type`
--

CREATE TABLE IF NOT EXISTS `mas_package_type` (
`id` int(11) NOT NULL,
  `package` varchar(45) NOT NULL,
  `package_code` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_package_type`
--

INSERT INTO `mas_package_type` (`id`, `package`, `package_code`) VALUES
(1, 'Gym Member', 'M'),
(2, 'Personal Training', 'PT'),
(3, 'Special', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `mas_post`
--

CREATE TABLE IF NOT EXISTS `mas_post` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_post`
--

INSERT INTO `mas_post` (`id`, `title`, `post_date`, `slug`, `image`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 'Quisque iaculis, elit sit amet euismod pulvinar, elit leo rutrum metus', '2015-06-02 00:00:00', 'quisque-iaculis-elit-sit-amet-euismod-pulvinar-elit-leo-rutrum-metus', NULL, 1, '2015-06-01 16:00:00', 1, '2015-06-01 16:00:00', 0),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2015-06-02 00:00:00', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', NULL, 1, '2015-06-01 16:00:00', 1, '2015-06-01 16:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_post_details`
--

CREATE TABLE IF NOT EXISTS `mas_post_details` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `sequence` int(5) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_post_details`
--

INSERT INTO `mas_post_details` (`id`, `post_id`, `sequence`, `description`) VALUES
(1, 1, 1, '<span>NOW OPEN!!!</span><br style="box&#45;sizing: border&#45;box; color: rgb(197, 197, 197); font&#45;family: arial; font&#45;size: 13px; line&#45;height: 19.5px; background&#45;color: rgb(21, 21, 21);"><span>Monday &#45; Friday (07:00 AM &#45; 10:00 PM)</span><div><span>Sunday &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (07:00 AM &#45; 05:00 PM)</span></div><div><span><br></span></div><div><span>B17 L3 Acacia St. Along&nbsp;</span><span>CAA rd. Belisario Subd. Las PiÃ±as City</span></div><div><span>Located near total gas station</span></div><div><span><br></span></div><div><img src="http://localhost/sites/muscleandscience/upload/gallery/img1.jpg"></div>'),
(2, 2, 1, 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `mas_post_tags`
--

CREATE TABLE IF NOT EXISTS `mas_post_tags` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_post_tags`
--

INSERT INTO `mas_post_tags` (`tag_id`, `post_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_attendance`
--

CREATE TABLE IF NOT EXISTS `mas_pt_attendance` (
`pt_attend_id` int(11) NOT NULL,
  `pt_mem_id` int(11) NOT NULL,
  `date_present` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_pt_attendance`
--

INSERT INTO `mas_pt_attendance` (`pt_attend_id`, `pt_mem_id`, `date_present`) VALUES
(1, 1, '2014-07-11'),
(2, 1, '2014-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_members`
--

CREATE TABLE IF NOT EXISTS `mas_pt_members` (
`pt_mem_id` int(11) NOT NULL,
  `_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `session` int(11) NOT NULL,
  `session_left` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_pt_members`
--

INSERT INTO `mas_pt_members` (`pt_mem_id`, `_id`, `pt_id`, `date_start`, `session`, `session_left`, `price`, `discount`, `note`) VALUES
(1, 1400003, 2, '2014-07-07', 5, 3, '1000.00', '0.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `mas_pt_payment`
--

CREATE TABLE IF NOT EXISTS `mas_pt_payment` (
`pt_payment_id` int(11) NOT NULL,
  `pt_mem_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_pt_payment`
--

INSERT INTO `mas_pt_payment` (`pt_payment_id`, `pt_mem_id`, `amount`, `date_paid`) VALUES
(1, 1, '500.00', '2014-07-07 19:10:55'),
(2, 1, '50.00', '2014-09-06 02:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `mas_setting`
--

CREATE TABLE IF NOT EXISTS `mas_setting` (
`setting_id` int(11) NOT NULL,
  `config` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_setting`
--

INSERT INTO `mas_setting` (`setting_id`, `config`, `status`, `label`) VALUES
(1, 'comment', 1, 'Allow user to comment on blog posts'),
(2, 'contact', 1, 'Allow user to leave a message from contact form.');

-- --------------------------------------------------------

--
-- Table structure for table `mas_sidebar`
--

CREATE TABLE IF NOT EXISTS `mas_sidebar` (
`id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sequence` int(11) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Parent navigation for account sidebar';

--
-- Dumping data for table `mas_sidebar`
--

INSERT INTO `mas_sidebar` (`id`, `title`, `icon`, `sequence`, `user_kbn`) VALUES
(1, 'Home', 'fa fa-home', 1, 10),
(2, 'Membership', 'fa fa-users', 2, 10),
(3, 'Packages', 'fa fa-cubes', 3, 20),
(4, 'Configuration', 'fa fa-cogs', 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `mas_sidebar_sub`
--

CREATE TABLE IF NOT EXISTS `mas_sidebar_sub` (
  `parent_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_sidebar_sub`
--

INSERT INTO `mas_sidebar_sub` (`parent_id`, `title`, `link`, `sequence`, `user_kbn`) VALUES
(1, 'Dashboard', 'account/dashboard', 1, 10),
(1, 'Inbox', 'account/inbox', 2, 10),
(1, 'Manage your posts', 'account/blog', 3, 20),
(1, 'Gallery', 'account/gallery', 4, 10),
(2, 'All Members', 'account/members', 1, 20),
(2, 'Gym Members', 'account/members/gym', 2, 20),
(2, 'Personal Training', 'account/members/pt', 3, 20),
(3, 'Gym Packages', 'account/package', 1, 20),
(4, 'Site Banner', 'account/banner', 1, 20),
(4, 'Gym Class', 'account/gym-class', 2, 20),
(4, 'Settings', 'account/banner', 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `mas_special_package`
--

CREATE TABLE IF NOT EXISTS `mas_special_package` (
`sp_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_special_package`
--

INSERT INTO `mas_special_package` (`sp_id`, `title`, `about`, `note`) VALUES
(1, 'Senior Card', '20% Off', ''),
(2, 'Family Card', '10% Off', '');

-- --------------------------------------------------------

--
-- Table structure for table `mas_tags`
--

CREATE TABLE IF NOT EXISTS `mas_tags` (
`id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user_id` int(11) NOT NULL,
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_tags`
--

INSERT INTO `mas_tags` (`id`, `tag_name`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'muscle science', 1, '2015-05-04 16:00:00', 1, '2015-05-04 16:00:00'),
(2, 'news', 1, '2015-05-04 16:00:00', 1, '2015-05-04 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_tracer`
--

CREATE TABLE IF NOT EXISTS `mas_tracer` (
`tracer_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_tracer`
--

INSERT INTO `mas_tracer` (`tracer_id`, `create_user_id`, `create_datetime`, `note`) VALUES
(1, 1400001, '2014-07-07 09:20:37', 'Created new user account (dylan.mckenzie) and added it to GYM members'),
(2, 1400001, '2014-07-07 09:21:01', 'Created new user account (steven.sky) and added it to GYM members'),
(3, 1400001, '2014-07-07 09:21:23', 'Created new user account (reikado.lezaille) and added it to PT members'),
(4, 1400001, '2014-07-07 09:21:36', 'Created new user account (aeone.rivera) and added it to PT members'),
(5, 1400001, '2014-07-07 09:22:02', 'Entered (aeone.rivera) payment for pt (&#8369; 1000)'),
(6, 1400001, '2014-07-07 11:07:51', 'Deleted GYM membership of (dylan.mckenzie)'),
(7, 1400001, '2014-07-07 11:08:00', 'Deleted GYM membership of (steven.sky)'),
(8, 1400001, '2014-07-07 11:08:15', 'Deleted Personal Training membership of (aeone.rivera)'),
(9, 1400001, '2014-07-07 11:08:26', 'Deleted Personal Training membership of (reikado.lezaille)'),
(10, 1400001, '2014-07-07 11:08:42', 'Deleted (aeone.rivera)'),
(11, 1400001, '2014-07-07 11:08:50', 'Deleted (1400004)'),
(12, 1400001, '2014-07-07 11:08:59', 'Deleted (1400002)'),
(13, 1400001, '2014-07-07 11:09:08', 'Deleted (1400003)'),
(14, 1400001, '2014-07-07 11:10:55', 'Created new user account (aeone.rivera) and added it to PT members'),
(15, 1400001, '2014-07-13 05:43:36', 'Edited (aeone.rivera) user account'),
(16, 1400001, '2014-07-13 05:47:23', 'Created new user account (steven.sky) and added it to GYM members'),
(17, 1400001, '2014-07-17 06:31:19', 'Entered (steven.sky) payment for member (&#8369; 50)'),
(18, 1400001, '2014-07-17 15:16:21', 'Updated Gym class (Boxing), (about) field'),
(19, 1400001, '2014-07-20 09:47:10', 'Added new gym class (Sdasda)'),
(20, 1400001, '2014-07-20 09:48:12', 'Removed (Sdasda) from Gym class'),
(21, 1400001, '2014-07-20 17:22:10', 'Entered (steven.sky) payment for member (&#8369; 100)'),
(22, 1400001, '2014-07-20 17:27:30', 'Activated user acount (steven.sky)'),
(23, 1400001, '2014-07-21 09:07:13', 'Updated Gym class (Gym Fitnesss), (about) field'),
(24, 1400001, '2014-08-31 04:30:08', 'Added (steven.sky) to GYM members'),
(25, 1400001, '2014-08-31 04:30:31', 'Entered (steven.sky) payment for member (&#8369; 5)'),
(26, 1400001, '2014-09-05 18:08:16', 'Entered (aeone.rivera) payment for pt (&#8369; 50)');

-- --------------------------------------------------------

--
-- Table structure for table `mas_trainer`
--

CREATE TABLE IF NOT EXISTS `mas_trainer` (
`id` int(11) NOT NULL,
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
  `update_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_trainer`
--

INSERT INTO `mas_trainer` (`id`, `firstname`, `lastname`, `quote`, `about`, `skills`, `experience`, `achievement`, `img`, `img_thumb`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Mark', 'Ventura', 'Even if you can''t physically see the results in front of you, every single effort is chaning your body from the inside.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare mi, et mollis tellus neque vitae elit.', '["Lorem ipsum pheretra","Suspendise venis","Saunas personicale","Union terminale"] ', NULL, '["Lorem ipsum pheretra interdurum","Suspendise venis"]', 'upload/trainer/trainer1.jpg', 'upload/trainer/thumb/thumb_trainer1.jpg', 0, '0000-00-00 00:00:00', 0, NULL),
(2, 'Kevin', 'Valencia', 'Even if you can''t physically see the results in front of you, every single effort is chaning your body from the inside.', '', '["fhadasd","asdasdasdasd","adsa"]', 8, '["fhadasd","asdasdasdasd","adsa","fhadasd","asdasdasdasd","adsa"]', '', '', 0, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_users`
--

CREATE TABLE IF NOT EXISTS `mas_users` (
`id` int(11) NOT NULL,
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
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_users`
--

INSERT INTO `mas_users` (`id`, `username`, `password`, `user_kbn`, `lastname`, `firstname`, `status`, `gender`, `birthday`, `phone`, `email`, `occupation`, `address`, `img`, `deleted`) VALUES
(1, 'admin', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 30, 'Science', 'Muscle', 1, 'F', '1991-05-20', '', 'muscleandscience@gmail.com', '', '', 1, 0),
(2, 'Guest', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, '', 'Guest', 1, '', '2014-07-07', '', '', '', '', 2, 0),
(3, 'aeone.rivera', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, 'Rivera', 'Aeone', 1, 'F', '2009-00-06', '', 'rivera@yahoo.com', '', '', 3, 0),
(4, 'steven.sky', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, 'Sky', 'Steven', 1, 'M', '0000-00-00', '', '', '', '', 4, 0),
(5, 'denise', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 20, 'Valencia', 'Denise', 1, 'M', '1984-11-06', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_users_login`
--

CREATE TABLE IF NOT EXISTS `mas_users_login` (
`login_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mas_attendance`
--
ALTER TABLE `mas_attendance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_banner`
--
ALTER TABLE `mas_banner`
 ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `mas_class`
--
ALTER TABLE `mas_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_comments`
--
ALTER TABLE `mas_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_company_info`
--
ALTER TABLE `mas_company_info`
 ADD PRIMARY KEY (`company_info_id`);

--
-- Indexes for table `mas_company_social`
--
ALTER TABLE `mas_company_social`
 ADD PRIMARY KEY (`company_social_id`);

--
-- Indexes for table `mas_gallery`
--
ALTER TABLE `mas_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_gallery_photos`
--
ALTER TABLE `mas_gallery_photos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_homebox`
--
ALTER TABLE `mas_homebox`
 ADD PRIMARY KEY (`boxid`);

--
-- Indexes for table `mas_members`
--
ALTER TABLE `mas_members`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `mas_members_payment`
--
ALTER TABLE `mas_members_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_message`
--
ALTER TABLE `mas_message`
 ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `mas_message_details`
--
ALTER TABLE `mas_message_details`
 ADD PRIMARY KEY (`msg_det_id`), ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `mas_package`
--
ALTER TABLE `mas_package`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_package_type`
--
ALTER TABLE `mas_package_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_post`
--
ALTER TABLE `mas_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_post_details`
--
ALTER TABLE `mas_post_details`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `mas_pt_attendance`
--
ALTER TABLE `mas_pt_attendance`
 ADD PRIMARY KEY (`pt_attend_id`);

--
-- Indexes for table `mas_pt_members`
--
ALTER TABLE `mas_pt_members`
 ADD PRIMARY KEY (`pt_mem_id`);

--
-- Indexes for table `mas_pt_payment`
--
ALTER TABLE `mas_pt_payment`
 ADD PRIMARY KEY (`pt_payment_id`);

--
-- Indexes for table `mas_setting`
--
ALTER TABLE `mas_setting`
 ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `mas_sidebar`
--
ALTER TABLE `mas_sidebar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_special_package`
--
ALTER TABLE `mas_special_package`
 ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `mas_tags`
--
ALTER TABLE `mas_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_tracer`
--
ALTER TABLE `mas_tracer`
 ADD PRIMARY KEY (`tracer_id`);

--
-- Indexes for table `mas_trainer`
--
ALTER TABLE `mas_trainer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_users`
--
ALTER TABLE `mas_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_users_login`
--
ALTER TABLE `mas_users_login`
 ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mas_attendance`
--
ALTER TABLE `mas_attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mas_banner`
--
ALTER TABLE `mas_banner`
MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mas_class`
--
ALTER TABLE `mas_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mas_comments`
--
ALTER TABLE `mas_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mas_company_info`
--
ALTER TABLE `mas_company_info`
MODIFY `company_info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mas_company_social`
--
ALTER TABLE `mas_company_social`
MODIFY `company_social_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mas_gallery`
--
ALTER TABLE `mas_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mas_gallery_photos`
--
ALTER TABLE `mas_gallery_photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mas_homebox`
--
ALTER TABLE `mas_homebox`
MODIFY `boxid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_members`
--
ALTER TABLE `mas_members`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mas_members_payment`
--
ALTER TABLE `mas_members_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_message`
--
ALTER TABLE `mas_message`
MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mas_message_details`
--
ALTER TABLE `mas_message_details`
MODIFY `msg_det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `mas_package`
--
ALTER TABLE `mas_package`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mas_package_type`
--
ALTER TABLE `mas_package_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mas_post`
--
ALTER TABLE `mas_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_post_details`
--
ALTER TABLE `mas_post_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_pt_attendance`
--
ALTER TABLE `mas_pt_attendance`
MODIFY `pt_attend_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_pt_members`
--
ALTER TABLE `mas_pt_members`
MODIFY `pt_mem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mas_pt_payment`
--
ALTER TABLE `mas_pt_payment`
MODIFY `pt_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_setting`
--
ALTER TABLE `mas_setting`
MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_sidebar`
--
ALTER TABLE `mas_sidebar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mas_special_package`
--
ALTER TABLE `mas_special_package`
MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_tags`
--
ALTER TABLE `mas_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_tracer`
--
ALTER TABLE `mas_tracer`
MODIFY `tracer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `mas_trainer`
--
ALTER TABLE `mas_trainer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_users`
--
ALTER TABLE `mas_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mas_users_login`
--
ALTER TABLE `mas_users_login`
MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mas_message_details`
--
ALTER TABLE `mas_message_details`
ADD CONSTRAINT `message_details_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `mas_message` (`msg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
