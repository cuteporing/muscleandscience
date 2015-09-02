# List of tables
---

#### mas_users

|  #  | Column Name     | Datatype      | PK  | NN  | UQ  | BIN | UN  | ZF  | AI  | Default   |
| --- | --------------- | ------------- | --- | --- | --- | --- | --- | --- | --- | --------- |
|  1  | _id             | INT(11)       |　Ｏ　|　Ｏ　|　　　|　　　|　　　|　　　|　Ｏ　|           |
|  2  | username        | VARCHAR(255)  |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  3  | password        | VARCHAR(255)  |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  4  | user_kbn        | TINYINT(1)    |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  5  | lastname        | VARCHAR(255)  |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  6  | firstname       | VARCHAR(255)  |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  7  | status          | INT(1)        |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  8  | gender          | VARCHAR(2)    |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|           |
|  9  | birthday        | DATE          |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |
|  10 | phone           | VARCHAR(255)  |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |
|  11 | email           | VARCHAR(255)  |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |
|  12 | occupation      | VARCHAR(255)  |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |
|  13 | address         | VARCHAR(255)  |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |
|  14 | img             | INT(11)       |　　　|     |　　　|　　　|　　　|　　　|　　　| NULL      |

#### Create Statement

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
      PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;