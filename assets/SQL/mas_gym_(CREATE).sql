
CREATE TABLE `mas_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO mas_banner VALUES("1","../upload/banner/slide1-600250316.jpg","gym fitness","strength, speed, stamina");
INSERT INTO mas_banner VALUES("2","../upload/banner/slide2-703698718.jpg","cardio fitness","cardiovascular fitness");
INSERT INTO mas_banner VALUES("3","../upload/banner/slide3-1245081558.jpg","Taek wondo","power, strength, stamina");
INSERT INTO mas_banner VALUES("4","../upload/banner/img1-394128084.jpg","indoor cyling","stamina, strength, power");



CREATE TABLE `mas_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `features` text NOT NULL,
  `trainer_id` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO class VALUES("1","Gym Fitness","strength, speed, stamina","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.","Lorem ipsum pheretra interdurum,Suspendise venis,Saunas personicale","1, 2","../upload/class/blog_img3.jpg","../upload/class/thumb/thumb1.jpg");
INSERT INTO class VALUES("2","Taek Wondo","strength, speed, stamina","Lorem ipsum dolor sit amet, consectetur adipiscing elit. ","Lorem ipsum pheretra interdurum,Suspendise venis,Saunas personicale,Union terminale","1","../upload/class/slide1-1023037567-469433701.jpg","../upload/class/thumb/thumb_slide1-1023037567-469433701.jpg");
INSERT INTO class VALUES("3","Cardio Fitness","cardiovascular fitness","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.","Lorem ipsum pheretra interdurum,Suspendise venis,Saunas personicale,Union terminale","1","../upload/class/img1-964858599.jpg","../upload/class/thumb/thumb_img1-964858599.jpg");




CREATE TABLE `class_trainer` (
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO class_trainer VALUES("2","1");
INSERT INTO class_trainer VALUES("3","1");
INSERT INTO class_trainer VALUES("3","1");
INSERT INTO class_trainer VALUES("1","1");
INSERT INTO class_trainer VALUES("1","2");





CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commenterID` int(11) NOT NULL,
  `commentDate` datetime NOT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO comments VALUES("1","1","0231321","1400003","2014-07-30 00:00:00","0");





CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) NOT NULL,
  `album_cover` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `restrict` tinyint(1) NOT NULL,
  `view` varchar(10) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO gallery VALUES("1","Muscle and Science","3","2014-06-10 00:00:00","1","public");
INSERT INTO gallery VALUES("2","Personal Training","4","2014-06-12 00:00:00","1","public");
INSERT INTO gallery VALUES("3","GYM Members","4","2014-06-16 00:00:00","1","public");





CREATE TABLE `gallery_photos` (
  `gallery_photos_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `_id` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_thumb` varchar(255) NOT NULL,
  `date_taken` date NOT NULL,
  `date_upload` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  PRIMARY KEY (`gallery_photos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO gallery_photos VALUES("1","1","","../upload/gallery/gym2-1003888424.jpg","../upload/gallery/thumb/thumb_gym2-1003888424.jpg","1970-01-01","2014-07-05 01:18:21","","NOW OPEN!!!<br>Monday - Friday (07:00 PM - 10:00 PM)<br>Sunday (10:00PM - 05:00PM)");
INSERT INTO gallery_photos VALUES("2","1","","../upload/gallery/gym-175870889.jpg","../upload/gallery/thumb/thumb_gym-175870889.jpg","0000-00-00","2014-07-05 01:23:55","","No description");
INSERT INTO gallery_photos VALUES("3","1","","../upload/gallery/gallery_img4-715403363.jpg","../upload/gallery/thumb/thumb_gallery_img4-715403363.jpg","0000-00-00","2014-07-13 13:45:29","","No description");
INSERT INTO gallery_photos VALUES("4","3","1400004","../upload/profile/gallery_img1-1114092816.jpg","../upload/profile/thumb/thumb_gallery_img1-1114092816.jpg","0000-00-00","2014-07-13 13:47:37","","No description");
INSERT INTO gallery_photos VALUES("5","2","1400003","../upload/profile/gallery_img3-305138360.jpg","../upload/profile/thumb/thumb_gallery_img3-305138360.jpg","0000-00-00","2014-07-13 13:47:53","","No description");
INSERT INTO gallery_photos VALUES("6","2","1400003","../upload/profile/gallery_img2-59900239.jpg","../upload/profile/thumb/thumb_gallery_img2-59900239.jpg","0000-00-00","2014-07-13 13:48:08","","No description");
INSERT INTO gallery_photos VALUES("7","2","1400003","../upload/profile/gallery_img4-1147442447.jpg","../upload/profile/thumb/thumb_gallery_img4-1147442447.jpg","0000-00-00","2014-07-13 13:54:41","","No description");
INSERT INTO gallery_photos VALUES("8","2","1400003","../upload/profile/gallery_img1-978112387.jpg","../upload/profile/thumb/thumb_gallery_img1-978112387.jpg","0000-00-00","2014-07-13 13:56:31","","No description");





CREATE TABLE `homebox` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO homebox VALUES("1","LG","Gym Membership","for FREE!","Enroll now and get to train with the Champion!!","note","http://localhost/muscleandscience/view/classes.php");
INSERT INTO homebox VALUES("2","G","Personal Training","sign up today","Sign up today and get your free training program,  and boxing lessons.","calendar","http://localhost/muscleandscience/view/classes.php");



CREATE TABLE `mas_company_info` (
  `company_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_address_1` varchar(255) NOT NULL,
  `street_address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`company_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



CREATE TABLE `mas_company_social` (
  `company_social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_network` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  PRIMARY KEY (`company_social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO members VALUES("1","1400004","2","2014-07-13","2014-08-13","450.00","0.00","paid");
INSERT INTO members VALUES("2","1400004","1","2014-08-31","2014-08-31","50.00","0.00","paid");





CREATE TABLE `members_payment` (
  `mem_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`mem_pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO members_payment VALUES("1","1","300.00","2014-07-13 13:47:23");
INSERT INTO members_payment VALUES("2","1","50.00","2014-07-17 14:31:19");
INSERT INTO members_payment VALUES("3","1","100.00","2014-07-21 01:22:10");
INSERT INTO members_payment VALUES("4","2","45.00","2014-08-31 12:30:08");
INSERT INTO members_payment VALUES("5","2","5.00","2014-08-31 12:30:31");





CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_to` varchar(255) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_date` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO message VALUES("1","Admin, TechAdmin","1400003","2014-07-07 21:12:26","Contact Message","1","1","0");
INSERT INTO message VALUES("2","Admin, TechAdmin","1400003","2014-07-07 21:15:18","Contact Message","1","1","0");
INSERT INTO message VALUES("3","Admin, TechAdmin","1400003","2014-07-07 21:36:10","Contact Message","1","1","0");
INSERT INTO message VALUES("4","Admin, TechAdmin","1400003","2014-07-07 21:36:15","Contact Message","1","1","0");
INSERT INTO message VALUES("5","Admin, TechAdmin","1400003","2014-07-07 21:37:04","Contact Message","1","1","0");
INSERT INTO message VALUES("6","Admin, TechAdmin","1400003","2014-07-07 21:37:26","Contact Message","1","1","0");
INSERT INTO message VALUES("7","Admin, TechAdmin","1400003","2014-07-07 21:42:11","Contact Message","1","1","0");
INSERT INTO message VALUES("8","Admin, TechAdmin","1400003","2014-07-07 22:27:39","Contact Message","1","1","0");
INSERT INTO message VALUES("9","Admin, TechAdmin","1400003","2014-07-07 22:30:18","Contact Message","1","1","0");
INSERT INTO message VALUES("10","Admin, TechAdmin","1400003","2014-07-07 22:36:20","Contact Message","1","1","0");
INSERT INTO message VALUES("11","Admin, TechAdmin","1400003","2014-07-07 22:39:58","Contact Message","1","1","0");
INSERT INTO message VALUES("12","Admin, TechAdmin","1400003","2014-07-07 23:22:16","Contact Message","1","1","0");
INSERT INTO message VALUES("13","Admin, TechAdmin","1400001","2014-07-10 17:37:39","Contact Message","1","1","0");
INSERT INTO message VALUES("14","Admin, TechAdmin","1400003","2014-07-10 22:11:18","Contact Message","1","1","0");




CREATE TABLE `message_details` (
  `msg_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sequence` int(5) NOT NULL,
  PRIMARY KEY (`msg_det_id`),
  KEY `msg_id` (`msg_id`),
  CONSTRAINT `message_details_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `message` (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO message_details VALUES("1","1","$msg","1");
INSERT INTO message_details VALUES("3","1","asda","1");
INSERT INTO message_details VALUES("4","1","sdasdas","1");
INSERT INTO message_details VALUES("5","2","sdasdas","1");
INSERT INTO message_details VALUES("6","3","sdasdas","1");
INSERT INTO message_details VALUES("7","4","asda","1");
INSERT INTO message_details VALUES("8","5","asda","1");
INSERT INTO message_details VALUES("9","6","asdasd","1");
INSERT INTO message_details VALUES("10","7","asd","1");
INSERT INTO message_details VALUES("11","8","asdas","1");
INSERT INTO message_details VALUES("12","9","asdas","1");
INSERT INTO message_details VALUES("13","10","asdas","1");
INSERT INTO message_details VALUES("14","11","12311\\r\\n","1");
INSERT INTO message_details VALUES("15","12","asdas","1");
INSERT INTO message_details VALUES("16","13","asdasdasd","1");
INSERT INTO message_details VALUES("17","14","Do not hesitate to send us a message","1");





CREATE TABLE `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO package VALUES("1","Per Session","1","50.00","session","Gym package per session");
INSERT INTO package VALUES("2","monthly fee","30","450.00","monthly","Monthly FEE");





CREATE TABLE `post_details` (
  `postDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `sequence` int(5) NOT NULL,
  `postText` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`postDetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO post_details VALUES("1","1","1","<span>NOW OPEN!!!</span><br style=\"box&#45;sizing: border&#45;box; color: rgb(197, 197, 197); font&#45;family: arial; font&#45;size: 13px; line&#45;height: 19.5px; background&#45;color: rgb(21, 21, 21);\"><span>Monday &#45; Friday (07:00 AM &#45; 10:00 PM)</span><div><span>Sunday &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (07:00 AM &#45; 05:00 PM)</span></div><div><span><br></span></div><div><span>B17 L3 Acacia St. Along&nbsp;</span><span>CAA rd. Belisario Subd. Las PiÃ±as City</span></div><div><span>Located near total gas station</span></div><div><span><br></span></div><div><img src=\"http://localhost/muscleandscience/upload/gallery/gym2&#45;1003888424.jpg\"></div>","");
INSERT INTO post_details VALUES("3","3","1","dasdas","../upload/blog/blog_img1-18245475.jpg");





CREATE TABLE `post_tags` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `tagName` varchar(50) NOT NULL,
  PRIMARY KEY (`tagID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO post_tags VALUES("1","1","Muscle and Science");
INSERT INTO post_tags VALUES("2","1","Gym");





CREATE TABLE `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postDate` datetime NOT NULL,
  `Deleted` int(1) NOT NULL,
  `OwnerID` int(11) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO posts VALUES("1","Muscle and Science Fitness Gym","2014-07-30 22:30:44","0","1400001");
INSERT INTO posts VALUES("3","sdadas","2014-07-30 23:07:00","0","1400001");




CREATE TABLE `pt` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO pt VALUES("1","1 Session","1","350.00","session","&#8369; 350.00 Per Session");
INSERT INTO pt VALUES("2","5 Session","5","1000.00","session","Save up to &#8369; <span class=\'text-cross\'>750.00</span>");
INSERT INTO pt VALUES("3","10 Session","10","2000.00","session","Save up to &amp;#8369; <strike>1,500.00</strike>");





CREATE TABLE `pt_attendance` (
  `pt_attend_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `date_present` date NOT NULL,
  PRIMARY KEY (`pt_attend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pt_attendance VALUES("1","1","2014-07-11");
INSERT INTO pt_attendance VALUES("2","1","2014-07-13");





CREATE TABLE `pt_members` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pt_members VALUES("1","1400003","2","2014-07-07","5","3","1000.00","0.00","pending");





CREATE TABLE `pt_payment` (
  `pt_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_mem_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`pt_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pt_payment VALUES("1","1","500.00","2014-07-07 19:10:55");
INSERT INTO pt_payment VALUES("2","1","50.00","2014-09-06 02:08:16");





CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO setting VALUES("1","comment","1","Allow user to comment on blog posts");
INSERT INTO setting VALUES("2","contact","1","Allow user to leave a message from contact form.");





CREATE TABLE `special_package` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO special_package VALUES("1","Senior Card","20% Off","");
INSERT INTO special_package VALUES("2","Family Card","10% Off","");





CREATE TABLE `tracer` (
  `tracer_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `date_exec` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`tracer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO tracer VALUES("1","1400001","2014-07-07 17:20:37","Muscle Science","Created new user account (dylan.mckenzie) and added it to GYM members");
INSERT INTO tracer VALUES("2","1400001","2014-07-07 17:21:01","Muscle Science","Created new user account (steven.sky) and added it to GYM members");
INSERT INTO tracer VALUES("3","1400001","2014-07-07 17:21:23","Muscle Science","Created new user account (reikado.lezaille) and added it to PT members");
INSERT INTO tracer VALUES("4","1400001","2014-07-07 17:21:36","Muscle Science","Created new user account (aeone.rivera) and added it to PT members");
INSERT INTO tracer VALUES("5","1400001","2014-07-07 17:22:02","Muscle Science","Entered (aeone.rivera) payment for pt (&#8369; 1000)");
INSERT INTO tracer VALUES("6","1400001","2014-07-07 19:07:51","Muscle Science","Deleted GYM membership of (dylan.mckenzie)");
INSERT INTO tracer VALUES("7","1400001","2014-07-07 19:08:00","Muscle Science","Deleted GYM membership of (steven.sky)");
INSERT INTO tracer VALUES("8","1400001","2014-07-07 19:08:15","Muscle Science","Deleted Personal Training membership of (aeone.rivera)");
INSERT INTO tracer VALUES("9","1400001","2014-07-07 19:08:26","Muscle Science","Deleted Personal Training membership of (reikado.lezaille)");
INSERT INTO tracer VALUES("10","1400001","2014-07-07 19:08:42","Muscle Science","Deleted (aeone.rivera)");
INSERT INTO tracer VALUES("11","1400001","2014-07-07 19:08:50","Muscle Science","Deleted (1400004)");
INSERT INTO tracer VALUES("12","1400001","2014-07-07 19:08:59","Muscle Science","Deleted (1400002)");
INSERT INTO tracer VALUES("13","1400001","2014-07-07 19:09:08","Muscle Science","Deleted (1400003)");
INSERT INTO tracer VALUES("14","1400001","2014-07-07 19:10:55","Muscle Science","Created new user account (aeone.rivera) and added it to PT members");
INSERT INTO tracer VALUES("15","1400001","2014-07-13 13:43:36","Muscle Science","Edited (aeone.rivera) user account");
INSERT INTO tracer VALUES("16","1400001","2014-07-13 13:47:23","Muscle Science","Created new user account (steven.sky) and added it to GYM members");
INSERT INTO tracer VALUES("17","1400001","2014-07-17 14:31:19","Muscle Science","Entered (steven.sky) payment for member (&#8369; 50)");
INSERT INTO tracer VALUES("18","1400001","2014-07-17 23:16:21","Muscle Science","Updated Gym class (Boxing), (about) field");
INSERT INTO tracer VALUES("19","1400001","2014-07-20 17:47:10","Muscle Science","Added new gym class (Sdasda)");
INSERT INTO tracer VALUES("20","1400001","2014-07-20 17:48:12","Muscle Science","Removed (Sdasda) from Gym class");
INSERT INTO tracer VALUES("21","1400001","2014-07-21 01:22:10","Muscle Science","Entered (steven.sky) payment for member (&#8369; 100)");
INSERT INTO tracer VALUES("22","1400001","2014-07-21 01:27:30","Muscle Science","Activated user acount (steven.sky)");
INSERT INTO tracer VALUES("23","1400001","2014-07-21 17:07:13","Muscle Science","Updated Gym class (Gym Fitnesss), (about) field");
INSERT INTO tracer VALUES("24","1400001","2014-08-31 12:30:08","Muscle Science","Added (steven.sky) to GYM members");
INSERT INTO tracer VALUES("25","1400001","2014-08-31 12:30:31","Muscle Science","Entered (steven.sky) payment for member (&#8369; 5)");
INSERT INTO tracer VALUES("26","1400001","2014-09-06 02:08:16","Muscle Science","Entered (aeone.rivera) payment for pt (&#8369; 50)");





CREATE TABLE `trainer` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO trainer VALUES("1","Mark","Ventura","Even if you can\'t physically see the results in front of you, every single effort is chaning your body from the inside.","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare mi, et mollis tellus neque vitae elit.","Lorem ipsum pheretra,Suspendise venis,Saunas personicale,Union terminale ","2","Lorem ipsum pheretra interdurum,Suspendise venis","../upload/trainer/trainer_1-416762801.jpg","../upload/trainer/thumb/thumb_trainer_1-416762801.jpg");
INSERT INTO trainer VALUES("2","Kevin","Valencia","Even if you can\\\\\\\'t physically see the results in front of you, every single effort is chaning your body from the inside.","","fhadasd, asdasdasdasd, adsa","8","fhadasd, asdasdasdasd, adsa, fhadasd, asdasdasdasd, adsa","","");





CREATE TABLE `users` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1400005 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1400001","admin","c601f9339c645fb770","1","Science","Muscle","1","F","1991-05-20","","muscleandscience@gmail.com","","","0");
INSERT INTO users VALUES("1400002","Guest","c601f9339c645fb770","0","","Guest","1","","2014-07-07","","","","","0");
INSERT INTO users VALUES("1400003","aeone.rivera","c601f9339c645fb770","0","Rivera","Aeone","1","F","2009-00-06","","rivera@yahoo.com","","","4");
INSERT INTO users VALUES("1400004","steven.sky","7807936dd37a6422ea","0","sky","steven","1","M","0000-00-00","","","","","5");





CREATE TABLE `users_login` (
  `loginID` int(11) NOT NULL AUTO_INCREMENT,
  `_id` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`loginID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





