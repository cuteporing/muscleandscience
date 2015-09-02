# INSERT mas_constants
INSERT INTO `mas_gym`.`mas_constants`
(`master_key`) VALUES 
('META'),
('NO_IMAGE'),
('IMAGE_CONFIG'),
('IMAGE_PATH');

# INSERT mas_constants_map
INSERT INTO `mas_gym`.`mas_constants_map`
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
