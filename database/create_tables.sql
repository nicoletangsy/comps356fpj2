
-- Database initialization script

--   This file contains semicolon delimited SQL statements for
--   creating all the tables in the 'Cellfish' database


CREATE TABLE Comment (
  Id int(11) NOT NULL AUTO_INCREMENT,
  ip varchar(30) DEFAULT NULL,
  Content text NOT NULL,
  Post_id int(11) NOT NULL,
  DateTime datetime NOT NULL,
  likeNo int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (Id),
  KEY Post_id_2 (Post_id)
);

CREATE TABLE Contact (
  Id int(20) NOT NULL AUTO_INCREMENT,
  Name varchar(30) NOT NULL,
  Email varchar(20) NOT NULL,
  Subject varchar(50) NOT NULL,
  Message text NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Liked (
  Id int(30) NOT NULL AUTO_INCREMENT,
  LikeIP varchar(30) DEFAULT NULL,
  LikeId int(30) DEFAULT NULL,
  Type varchar(30) DEFAULT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Post (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Title varchar(100) NOT NULL,
  Content text NOT NULL,
  Introduction text NOT NULL,
  Image longtext NOT NULL,
  likeNo int(20) NOT NULL,
  DateTime datetime NOT NULL,
  type varchar(30) NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Staff (
  Id varchar(11) NOT NULL DEFAULT '',
  Password varchar(50) DEFAULT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE SubComment (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IP varchar(20) NOT NULL,
  Content text COLLATE utf8_unicode_ci,
  DateTime datetime NOT NULL,
  comment_Id int(11) DEFAULT NULL,
  PRIMARY KEY (Id),
  KEY comment_Id_2 (comment_Id)
);

-- newly added sql

-- create table for holding members' data
CREATE TABLE members (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
	firstName VARCHAR(20), 
	lastName VARCHAR(100),
	gender Char(1), 
	birthday VARCHAR(20),
	question VARCHAR(20) NOT NULL,
	answer VARCHAR(20) NOT NULL,
    email VARCHAR(65) NOT NULL,
	description VARCHAR(150) DEFAULT "", 
	avatar_base64 LONGTEXT, 
    PRIMARY KEY (id), 
	UNIQUE (username)
);

CREATE TABLE rating (
  id int(11) NOT NULL AUTO_INCREMENT,
  post_id int(11) NOT NULL,
  rating int(11) NOT NULL,
  member_id int(11) DEFAULT NULL
) 













