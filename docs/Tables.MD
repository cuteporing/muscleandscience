| LIST OF TABLES   |
| ---------------- |
| mas_users        |
| mas_users_login  |
| mas_tags         |
| mas_tracer       |
| mas_trainer      |


## Table Definition

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
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

***

#### mas_users_login

|  #  | Column Name     | Datatype      | PK  | NN  | UQ  | BIN | UN  | ZF  | AI  | Default          |
| --- | --------------- | ------------- | --- | --- | --- | --- | --- | --- | --- | ---------------- |
|  1  | login_id        | INT(11)       |　Ｏ　|　Ｏ　|　　　|　　　|　　　|　　　|　Ｏ　|                   |
|  2  | _id             | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  3  | create_datetime | TIMESTAMP     |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　| CURRENT_TIMESTAMP |

    CREATE TABLE `mas_users_login` (
      `login_id` int(11) NOT NULL AUTO_INCREMENT,
      `create_user_id` int(11) NOT NULL,
      `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`login_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

***

#### mas_tags

|  #  | Column Name     | Datatype      | PK  | NN  | UQ  | BIN | UN  | ZF  | AI  | Default          |
| --- | --------------- | ------------- | --- | --- | --- | --- | --- | --- | --- | ---------------- |
|  1  | id              | INT(11)       |　Ｏ　|　Ｏ　|　　　|　　　|　　　|　　　|　Ｏ　|                   |
|  2  | tag_name        | VARCHAR(100)  |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  3  | create_user_id  | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  4  | create_datetime | TIMESTAMP     |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　| CURRENT_TIMESTAMP |
|  5  | update_user_id  | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  6  | update_datetime | TIMESTAMP     |　　　|　　　|　　　|　　　|　　　|　　　|　　　|                   |

    CREATE TABLE `mas_tags` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `tag_name` varchar(100) NOT NULL,
      `create_user_id` int(11) NOT NULL,
      `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `update_user_id` int(11) NOT NULL,
      `update_datetime` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

***

#### mas_tracer

|  #  | Column Name     | Datatype      | PK  | NN  | UQ  | BIN | UN  | ZF  | AI  | Default          |
| --- | --------------- | ------------- | --- | --- | --- | --- | --- | --- | --- | ---------------- |
|  1  | tracer_id       | INT(11)       |　Ｏ　|　Ｏ　|　　　|　　　|　　　|　　　|　Ｏ　|                   |
|  2  | create_user_id  | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  3  | create_datetime | TIMESTAMP     |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　| CURRENT_TIMESTAMP |
|  4  | note            | TEXT          |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |

    CREATE TABLE `mas_tracer` (
      `tracer_id` int(11) NOT NULL AUTO_INCREMENT,
      `create_user_id` int(11) NOT NULL,
      `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `note` text NOT NULL,
      PRIMARY KEY (`tracer_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

***

#### mas_trainer

|  #  | Column Name     | Datatype      | PK  | NN  | UQ  | BIN | UN  | ZF  | AI  | Default          |
| --- | --------------- | ------------- | --- | --- | --- | --- | --- | --- | --- | ---------------- |
|  1  | id              | INT(11)       |　Ｏ　|　Ｏ　|　　　|　　　|　　　|　　　|　Ｏ　|                   |
|  2  | firstname       | VARCHAR(50)   |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  3  | lastname        | VARCHAR(50)   |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  4  | quote           | TEXT          |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  5  | about           | TEXT          |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  6  | skills          | TEXT          |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  7  | experience      | INT(11)       |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  8  | achievement     | TEXT          |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  9  | img             | VARCHAR(255)  |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  10 | img_thumb       | VARCHAR(255)  |　　　|　　　|　　　|　　　|　　　|　　　|　　　| NULL              |
|  11 | create_user_id  | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  12 | create_datetime | TIMESTAMP     |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　| CURRENT_TIMESTAMP |
|  13 | update_user_id  | INT(11)       |　　　|　Ｏ　|　　　|　　　|　　　|　　　|　　　|                   |
|  14 | update_datetime | TIMESTAMP     |　　　|　　　|　　　|　　　|　　　|　　　|　　　|                   |

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

