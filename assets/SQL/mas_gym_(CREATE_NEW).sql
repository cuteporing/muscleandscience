SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mas_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `mas_banner`
--

CREATE TABLE IF NOT EXISTS  `mas_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_class`
--

CREATE TABLE IF NOT EXISTS `mas_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `photos_thumb_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(128) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `features` blob,
  `slug` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_class`
--

INSERT INTO `mas_class`
(`title`,`subtitle`,`about`,`features`,`slug`) VALUES
('Gym Fitness', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale"]', 'gym-fitness'),
('Taek Wondo', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'taek-wondo'),
('Cardio Fitness', 'cardiovascular fitness', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'cardio-fitness');

-- --------------------------------------------------------

--
-- Table structure for table `mas_class_trainer`
--

CREATE TABLE IF NOT EXISTS `mas_class_trainer` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `mas_constants`
--

CREATE TABLE IF NOT EXISTS `mas_constants` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `master_key` varchar(45) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_constants`
--

INSERT INTO `mas_constants`
(`master_key`) VALUES 
('META'),
('NO_IMAGE'),
('IMAGE_CONFIG'),
('IMAGE_PATH');

-- --------------------------------------------------------

--
-- Table structure for table `mas_constants_map`
--

CREATE TABLE IF NOT EXISTS `mas_constants_map` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `constants_id` int(11) DEFAULT NULL,
  `constants_key` varchar(45) DEFAULT NULL,
  `constants_value` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_constants_map`
--

INSERT INTO `mas_constants_map`
(`constants_id`,`constants_key`,`constants_value`) VALUES
(1, 'description', 'Gym/Fitness Center'),
(1, 'keywords', 'gym, fitness, health, center, muscle, science'),
(1, 'author', 'KBVCodes, 2014'),
(2, 'file_path', 'assets/img/'),
(2, 'raw_name', 'noPhoto-icon'),
(2, 'file_ext', '.png'),
(3, 'allowed_type', 'gif|jpg|png'),
(3, 'max_size', '350'),
(3, 'max_width', '1024'),
(3, 'max_height', '768'),
(4, 'banner', 'uploads/banner/');

-- --------------------------------------------------------

--
-- Table structure for table `mas_package`
--

CREATE TABLE IF NOT EXISTS `mas_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `others` blob,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `mas_photos`
--

CREATE TABLE IF NOT EXISTS `mas_photos` (
  `photos_id` int(11) NOT NULL AUTO_INCREMENT,
  `raw_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_ext` varchar(5) NOT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `date_taken` date NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_setting`
--

CREATE TABLE IF NOT EXISTS `mas_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_setting`
--

INSERT INTO `mas_setting`
(`config`,`status`,`label`) VALUES
('comment', 1,'Allow user to comment on blog posts'),
('contact', 1,'Allow user to leave a message from contact form.');

-- --------------------------------------------------------

--
-- Table structure for table `mas_tracer`
--

CREATE TABLE IF NOT EXISTS `mas_tracer` (
  `tracer_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tracer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mas_trainer`
--

CREATE TABLE IF NOT EXISTS `mas_trainer` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `photos_thumb_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `quote` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `achievement` blob,
  `skills` blob,
  `experience` int(11) NOT NULL,
  `duration` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_trainer`
--

INSERT INTO `mas_trainer` 
(`firstname`, `lastname`, `quote`, `about`, `achievement`, `skills`, `experience`, `duration`) VALUES
('Mark', 'Ventura', "Even if you can't physically see the results in front of you, every single effort is chaning your body from the inside.", 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare mi, et mollis tellus neque vitae elit.', '["Lorem ipsum pheretra interdurum","Suspendise venis"]', '["Lorem ipsum pheretra","Suspendise venis","Saunas personicale","Union terminale"] ', 2, 'years');

-- --------------------------------------------------------

--
-- Table structure for table `mas_users`
--

CREATE TABLE IF NOT EXISTS `mas_users` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_kbn` tinyint(1) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `status` int(1) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `occupation` varchar(150) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_city_id` int(11) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `img` int(11) NOT NULL,
  `crypt_type` varchar(20) NOT NULL DEFAULT 'MD5',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1500000 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_users`
--

INSERT INTO `mas_users`
(`username`,`password`,`user_kbn`,`lastname`,`firstname`,`status`,`gender`,`birthday`,`email`,`crypt_type`) VALUES
('admin','$1$ad000000$hzXFXvL3XVlnUE/X.1n9t/', 30, 'Science', 'Muscle', 1, 'F', '2015-01-01', 'muscleandscience@gmail.com','PHP5.3MD5');





