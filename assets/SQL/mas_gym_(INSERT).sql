--
-- Dumping data for table `mas_banner`
--

INSERT INTO `mas_banner` (`banner_id`, `img`, `title`, `subtitle`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'upload/banner/img1-394128084.jpg', 'gym fitness', 'strength, speed, stamina', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'upload/banner/slide2-703698718.jpg', 'cardio fitness', 'cardiovascular fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'upload/banner/slide3-1245081558.jpg', 'Taek wondo', 'power, strength, stamina', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(4, 'upload/banner/img1-394128084.jpg', 'indoor cyling', 'stamina, strength, power', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

--
-- Dumping data for table `mas_class`
--

INSERT INTO `mas_class` (`id`, `title`, `subtitle`, `about`, `features`, `img`, `img_thumb`, `slug`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Gym Fitness', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale"]', 'upload/class/blog_img3.jpg', 'upload/class/thumb/thumb1.jpg', 'gym-fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'Taek Wondo', 'strength, speed, stamina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'upload/class/slide1-1023037567-469433701.jpg', 'upload/class/thumb/thumb_slide1-1023037567-469433701.jpg', 'taek-wondo', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'Cardio Fitness', 'cardiovascular fitness', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare.', '["Lorem ipsum pheretra interdurum","Suspendise venis","Saunas personicale","Union terminale"]', 'upload/class/img1-964858599.jpg', 'upload/class/thumb/thumb_img1-964858599.jpg', 'cardio-fitness', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

--
-- Dumping data for table `mas_class_trainer`
--

INSERT INTO `mas_class_trainer` (`class_id`, `trainer_id`) VALUES
(1, 1);

--
-- Dumping data for table `mas_comments`
--

INSERT INTO `mas_comments` (`id`, `post_id`, `comment`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 1, '0231321', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00', 0);

--
-- Dumping data for table `mas_company_info`
--

INSERT INTO `mas_company_info` (`company_info_id`, `street_address_1`, `street_address_2`, `city`, `email`, `phone`, `opening_hours`, `opening_day_type`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'B17 L3 Acacia St.  Belisario', 'Subd. along CAA rd.', 'Las Pinas City', 'muscleandscience@gmail.com', '["+123 755 755","+123 655 655"]', '[{"day":"Monday","opening":"07:00","closing":"22:00"},{"day":"Tuesday","opening":"07:00","closing":"22:00"},{"day":"Wednesday","opening":"07:00","closing":"22:00"},{"day":"Thursday","opening":"07:00","closing":"22:00"},{"day":"Friday","opening":"07:00","closing":"22:00"},{"day":"Saturday","opening":"07:00","closing":"22:00"},{"day":"Sunday","opening":"07:00","closing":"17:00"}]', 'E', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');

--
-- Dumping data for table `mas_company_social`
--

INSERT INTO `mas_company_social` (`company_social_id`, `social_network`, `link`, `icon`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Facebook', 'https://www.facebook.com/muscleandsciencegym', 'facebook', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(2, 'Twitter', 'https://twitter.com/MuscleandScienc', 'twitter', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(3, 'Google+', 'https://plus.google.com/u/0/105885516485646378454/about', 'google', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00'),
(4, 'Skype', '', 'skype', 1, '2015-05-12 00:00:00', 1, '2015-05-12 00:00:00');


--
-- Dumping data for table `mas_gallery`
--

INSERT INTO `mas_gallery` (`id`, `album`, `album_cover`, `restrict`, `view`, `slug`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 'Muscle and Science', 3, 1, 'public', 'muscle-and-science', 1, '2014-06-09 16:00:00', 1, '2014-06-09 16:00:00', 0),
(2, 'Personal Training', 3, 1, 'public', 'personal-training', 1, '2014-06-11 16:00:00', 1, '2014-06-09 16:00:00', 0),
(3, 'GYM Members', 3, 1, 'public', 'gym-members', 1, '2014-06-15 16:00:00', 1, '2014-06-09 16:00:00', 0);

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

--
-- Dumping data for table `mas_homebox`
--

INSERT INTO `mas_homebox` (`boxid`, `type`, `title`, `subtitle`, `about`, `icon`, `link`) VALUES
(1, 'LG', 'Gym Membership', 'for FREE!', 'Enroll now and get to train with the Champion!!', 'note', 'http://localhost/muscleandscience/view/classes.php'),
(2, 'G', 'Personal Training', 'sign up today', 'Sign up today and get your free training program,  and boxing lessons.', 'calendar', 'http://localhost/muscleandscience/view/classes.php');

INSERT INTO `mas_members` (`member_id`, `_id`, `package_id`, `date_start`, `date_end`, `amount`, `discount`, `balance`, `note`, `session_left`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 3, 2, '2014-07-13', '2014-08-13', '450.00', '0.00', '100.00', '', 0, 1, '2015-09-13 10:45:55', 1, '2015-09-13 10:45:55'),
(2, 4, 4, '2014-08-31', '2014-08-31', '50.00', '0.00', '50.00', '', 0, 1, '2015-09-13 10:45:55', 1, '2015-09-13 10:45:55');

--
-- Dumping data for table `mas_members_payment`
--

INSERT INTO `mas_members_payment` (`id`, `member_id`, `amount`, `date_paid`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 1, '300.00', '2014-07-13 13:47:23', 1, '2015-09-13 10:47:39', 1, '2015-09-13 10:47:39'),
(2, 1, '50.00', '2014-07-17 14:31:19', 1, '2015-09-13 10:47:39', 1, '2015-09-13 10:47:39');

--
-- Dumping data for table `mas_members_ranking`
--

INSERT INTO `mas_members_ranking` (`id`, `_id`, `points`) VALUES
(1, 3, 30),
(2, 4, 5);

--
-- Dumping data for table `mas_message`
--

INSERT INTO `mas_message` (`msg_id`, `msg_to`, `msg_from`, `msg_date`, `subject`, `sent`, `status`, `deleted`) VALUES
(1, 'Admin, TechAdmin', 1, '2014-07-07 21:12:26', 'Contact Message', 1, 1, 0),
(2, 'Admin, TechAdmin', 1, '2014-07-07 21:15:18', 'Contact Message', 1, 1, 0),
(3, 'Admin, TechAdmin', 1, '2014-07-07 21:36:10', 'Contact Message', 1, 1, 0),
(4, 'Admin, TechAdmin', 1, '2014-07-07 21:36:15', 'Contact Message', 1, 1, 0),
(5, 'Admin, TechAdmin', 1, '2014-07-07 21:37:04', 'Contact Message', 1, 1, 0),
(6, 'Admin, TechAdmin', 1, '2014-07-07 21:37:26', 'Contact Message', 1, 1, 0),
(7, 'Admin, TechAdmin', 1, '2014-07-07 21:42:11', 'Contact Message', 1, 1, 0),
(8, 'Admin, TechAdmin', 1, '2014-07-07 22:27:39', 'Contact Message', 1, 1, 0),
(9, 'Admin, TechAdmin', 1, '2014-07-07 22:30:18', 'Contact Message', 1, 1, 0),
(10, 'Admin, TechAdmin', 1, '2014-07-07 22:36:20', 'Contact Message', 1, 1, 0),
(11, 'Admin, TechAdmin', 1, '2014-07-07 22:39:58', 'Contact Message', 1, 1, 0),
(12, 'Admin, TechAdmin', 1, '2014-07-07 23:22:16', 'Contact Message', 1, 1, 0),
(13, 'Admin, TechAdmin', 1, '2014-07-10 17:37:39', 'Contact Message', 1, 1, 0),
(14, 'Admin, TechAdmin', 1, '2014-07-10 22:11:18', 'Contact Message', 1, 1, 0);

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

--
-- Dumping data for table `mas_operating_type`
--

INSERT INTO `mas_operating_type` (`type`, `description`) VALUES
('MF', 'Monday to Friday'),
('E', 'Everyday'),
('WE', 'Weekends');

--
-- Dumping data for table `mas_package`
--

INSERT INTO `mas_package` (`id`, `package_type_id`, `package_type`, `package`, `session`, `monthly`, `total_session`, `price`, `points`, `description`, `deleted`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 1, 'M', 'Per Session', 1, 0, 1, '50.00', 1, 'Gym package per session', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 1, 'M', 'monthly fee', 0, 1, 30, '450.00', 30, 'Monthly FEE', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 2, 'PT', '1 Session', 1, 0, 1, '350.00', 5, '&#8369; 350.00 Per Session', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 2, 'PT', '5 Session', 1, 0, 5, '1000.00', 25, 'Save up to &#8369; <span class=''text-cross''>750.00</span>', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 2, 'PT', '10 Session', 1, 0, 10, '2000.00', 50, 'Save up to &amp;#8369; <strike>1,500.00</strike>', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 3, 'S', 'Senior Card', 0, 0, 0, NULL, 0, '20% Off', 1, 1, '2015-07-30 08:08:10', 1, '2015-07-30 08:08:10'),
(7, 3, 'S', 'Family Card', 0, 0, 0, NULL, 0, '10% Off', 1, 1, '2015-07-30 08:08:28', 1, '2015-07-30 08:08:10');

--
-- Dumping data for table `mas_package_type`
--

INSERT INTO `mas_package_type` (`id`, `package`, `package_code`) VALUES
(1, 'Member', 'M'),
(2, 'Personal Training', 'PT'),
(3, 'Special', 'S');

--
-- Dumping data for table `mas_post`
--

INSERT INTO `mas_post` (`id`, `title`, `post_date`, `slug`, `image`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`, `deleted`) VALUES
(1, 'Quisque iaculis, elit sit amet euismod pulvinar, elit leo rutrum metus', '2015-06-02 00:00:00', 'quisque-iaculis-elit-sit-amet-euismod-pulvinar-elit-leo-rutrum-metus', NULL, 1, '2015-06-01 16:00:00', 1, '2015-06-01 16:00:00', 0),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2015-06-02 00:00:00', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', NULL, 1, '2015-06-01 16:00:00', 1, '2015-06-01 16:00:00', 0);

--
-- Dumping data for table `mas_post_details`
--

INSERT INTO `mas_post_details` (`id`, `post_id`, `sequence`, `description`) VALUES
(1, 1, 1, '<span>NOW OPEN!!!</span><br style="box&#45;sizing: border&#45;box; color: rgb(197, 197, 197); font&#45;family: arial; font&#45;size: 13px; line&#45;height: 19.5px; background&#45;color: rgb(21, 21, 21);"><span>Monday &#45; Friday (07:00 AM &#45; 10:00 PM)</span><div><span>Sunday &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (07:00 AM &#45; 05:00 PM)</span></div><div><span><br></span></div><div><span>B17 L3 Acacia St. Along&nbsp;</span><span>CAA rd. Belisario Subd. Las PiÃ±as City</span></div><div><span>Located near total gas station</span></div><div><span><br></span></div><div><img src="http://localhost/sites/muscleandscience/upload/gallery/img1.jpg"></div>'),
(2, 2, 1, 'dasdas');

--
-- Dumping data for table `mas_post_tags`
--

INSERT INTO `mas_post_tags` (`tag_id`, `post_id`) VALUES
(1, 1),
(2, 1);

--
-- Dumping data for table `mas_pt_attendance`
--

INSERT INTO `mas_pt_attendance` (`pt_attend_id`, `pt_mem_id`, `date_present`) VALUES
(1, 1, '2014-07-11'),
(2, 1, '2014-07-13');

--
-- Dumping data for table `mas_pt_members`
--

INSERT INTO `mas_pt_members` (`pt_mem_id`, `_id`, `pt_id`, `date_start`, `session`, `session_left`, `price`, `discount`, `note`) VALUES
(1, 1400003, 2, '2014-07-07', 5, 3, '1000.00', '0.00', 'pending');

--
-- Dumping data for table `mas_pt_payment`
--

INSERT INTO `mas_pt_payment` (`pt_payment_id`, `pt_mem_id`, `amount`, `date_paid`) VALUES
(1, 1, '500.00', '2014-07-07 19:10:55'),
(2, 1, '50.00', '2014-09-06 02:08:16');

--
-- Dumping data for table `mas_setting`
--

INSERT INTO `mas_setting` (`setting_id`, `config`, `status`, `label`) VALUES
(1, 'comment', 1, 'Allow user to comment on blog posts'),
(2, 'contact', 1, 'Allow user to leave a message from contact form.');

--
-- Dumping data for table `mas_sidebar`
--

INSERT INTO `mas_sidebar` (`id`, `title`, `icon`, `sequence`, `user_kbn`) VALUES
(1, 'Home', 'fa fa-home', 1, 10),
(2, 'Membership', 'fa fa-users', 2, 10),
(3, 'Packages', 'fa fa-cubes', 3, 20),
(4, 'Configuration', 'fa fa-cogs', 4, 20);

--
-- Dumping data for table `mas_sidebar_sub`
--

INSERT INTO `mas_sidebar_sub` (`parent_id`, `title`, `link`, `sequence`, `user_kbn`) VALUES
(1, 'Dashboard', 'account/dashboard', 1, 10),
(1, 'Inbox', 'account/inbox', 2, 10),
(1, 'Manage your posts', 'account/blog', 3, 20),
(1, 'Gallery', 'account/gallery', 4, 10),
(2, 'All Members', 'account/members', 1, 20),
(2, 'Gym Members', 'account/members', 2, 20),
(2, 'Personal Training', 'account/members', 3, 20),
(3, 'Gym Packages', 'account/package', 1, 20),
(4, 'Site Banner', 'account/banner', 1, 20),
(4, 'Gym Class', 'account/gym-class', 2, 20),
(4, 'Settings', 'account/banner', 3, 20);

--
-- Dumping data for table `mas_tags`
--

INSERT INTO `mas_tags` (`id`, `tag_name`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'muscle science', 1, '2015-05-04 16:00:00', 1, '2015-05-04 16:00:00'),
(2, 'news', 1, '2015-05-04 16:00:00', 1, '2015-05-04 16:00:00');

--
-- Dumping data for table `mas_tracer`
--

INSERT INTO `mas_tracer` (`tracer_id`, `create_user_id`, `create_datetime`, `note`) VALUES
(1, 1, '2014-07-07 09:20:37', 'Created new user account (dylan.mckenzie) and added it to GYM members'),
(2, 1, '2014-07-07 09:21:01', 'Created new user account (steven.sky) and added it to GYM members'),
(3, 1, '2014-07-07 09:21:23', 'Created new user account (reikado.lezaille) and added it to PT members'),
(4, 1, '2014-07-07 09:21:36', 'Created new user account (aeone.rivera) and added it to PT members'),
(5, 1, '2014-07-07 09:22:02', 'Entered (aeone.rivera) payment for pt (&#8369; 1000)'),
(6, 1, '2014-07-07 11:07:51', 'Deleted GYM membership of (dylan.mckenzie)'),
(7, 1, '2014-07-07 11:08:00', 'Deleted GYM membership of (steven.sky)'),
(8, 1, '2014-07-07 11:08:15', 'Deleted Personal Training membership of (aeone.rivera)'),
(9, 1, '2014-07-07 11:08:26', 'Deleted Personal Training membership of (reikado.lezaille)'),
(10, 1, '2014-07-07 11:08:42', 'Deleted (aeone.rivera)'),
(11, 1, '2014-07-07 11:08:50', 'Deleted (1400004)'),
(12, 1, '2014-07-07 11:08:59', 'Deleted (1400002)'),
(13, 1, '2014-07-07 11:09:08', 'Deleted (1400003)'),
(14, 1, '2014-07-07 11:10:55', 'Created new user account (aeone.rivera) and added it to PT members'),
(15, 1, '2014-07-13 05:43:36', 'Edited (aeone.rivera) user account'),
(16, 1, '2014-07-13 05:47:23', 'Created new user account (steven.sky) and added it to GYM members'),
(17, 1, '2014-07-17 06:31:19', 'Entered (steven.sky) payment for member (&#8369; 50)'),
(18, 1, '2014-07-17 15:16:21', 'Updated Gym class (Boxing), (about) field'),
(19, 1, '2014-07-20 09:47:10', 'Added new gym class (Sdasda)'),
(20, 1, '2014-07-20 09:48:12', 'Removed (Sdasda) from Gym class'),
(21, 1, '2014-07-20 17:22:10', 'Entered (steven.sky) payment for member (&#8369; 100)'),
(22, 1, '2014-07-20 17:27:30', 'Activated user acount (steven.sky)'),
(23, 1, '2014-07-21 09:07:13', 'Updated Gym class (Gym Fitnesss), (about) field'),
(24, 1, '2014-08-31 04:30:08', 'Added (steven.sky) to GYM members'),
(25, 1, '2014-08-31 04:30:31', 'Entered (steven.sky) payment for member (&#8369; 5)'),
(26, 1, '2014-09-05 18:08:16', 'Entered (aeone.rivera) payment for pt (&#8369; 50)');

--
-- Dumping data for table `mas_trainer`
--

INSERT INTO `mas_trainer` (`id`, `firstname`, `lastname`, `quote`, `about`, `skills`, `experience`, `achievement`, `img`, `img_thumb`, `create_user_id`, `create_datetime`, `update_user_id`, `update_datetime`) VALUES
(1, 'Mark', 'Ventura', 'Even if you can''t physically see the results in front of you, every single effort is chaning your body from the inside.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat rutrum eros sit amet sollicitudin. Suspendisse pulvinar, velit nec pharetra interdum, ante tellus ornare mi, et mollis tellus neque vitae elit.', '["Lorem ipsum pheretra","Suspendise venis","Saunas personicale","Union terminale"] ', NULL, '["Lorem ipsum pheretra interdurum","Suspendise venis"]', 'upload/trainer/trainer1.jpg', 'upload/trainer/thumb/thumb_trainer1.jpg', 0, '0000-00-00 00:00:00', 0, NULL),
(2, 'Kevin', 'Valencia', 'Even if you can''t physically see the results in front of you, every single effort is chaning your body from the inside.', '', '["fhadasd","asdasdasdasd","adsa"]', 8, '["fhadasd","asdasdasdasd","adsa","fhadasd","asdasdasdasd","adsa"]', '', '', 0, '0000-00-00 00:00:00', 0, NULL);

--
-- Dumping data for table `mas_users`
--

INSERT INTO `mas_users` (`_id`, `username`, `password`, `user_kbn`, `lastname`, `firstname`, `status`, `gender`, `birthday`, `phone`, `email`, `occupation`, `address`, `img`, `deleted`) VALUES
(1, 'admin', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 30, 'Science', 'Muscle', 1, 'F', '1991-05-20', '', 'muscleandscience@gmail.com', '', '', 1, 0),
(2, 'Guest', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, '', 'Guest', 1, '', '2014-07-07', '', '', '', '', 2, 0),
(3, 'aeone.rivera', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, 'Rivera', 'Aeone', 1, 'F', '2009-00-06', '', 'rivera@yahoo.com', '', '', 3, 0),
(4, 'steven.sky', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 10, 'Sky', 'Steven', 2, 'M', '0000-00-00', '', '', '', '', 4, 0),
(5, 'denise', '$2a$08$D2p9EUfl7N/pVd7KVKrBB.IGhFYsNdCKH9DzB5L0EbMinFSS0Zzsu', 20, 'Valencia', 'Denise', 1, 'M', '1984-11-06', NULL, NULL, NULL, NULL, NULL, 0);
