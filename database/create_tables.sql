
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

CREATE TABLE Post (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Title varchar(100) NOT NULL,
  Content text NOT NULL,
  Introduction text NOT NULL,
  Image longtext NOT NULL,
  last_modified datetime,
  avg_rate decimal(8,2) default 0,
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

-- create table for holding discuss board's comment
CREATE TABLE board (
    board_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	content LONGTEXT NOT NULL,
	post_user VARCHAR(20) NOT NULL,
	post_date datetime NOT NULL, 
	last_modifies datetime, 
	board_avatar_base64 LONGTEXT, 
	PRIMARY KEY (board_id), 
	FOREIGN KEY (post_user) references members(username)
);

-- create table for holding users rating news data

CREATE TABLE rating (
  rate_id int(11) NOT NULL AUTO_INCREMENT,
  post_id int(11) NOT NULL,
  rating int(11) NOT NULL,
  username varchar(20) NOT NULL,
  PRIMARY KEY (rate_id), 
  FOREIGN KEY (username) references members(username)
);

-- create table for holding replys in discuss board, reply content with a maximun length of 255 characters
CREATE TABLE replyboard (
	reply_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	reply_content TINYTEXT NOT NULL,
	reply_user VARCHAR(20) NOT NULL,
	reply_date datetime NOT NULL, 
	reply_to INT UNSIGNED NOT NULL,
	PRIMARY KEY (reply_id), 
	FOREIGN KEY (reply_user) references members(username), 
	FOREIGN KEY (reply_to) references board(board_id)
);


-- create table for holding reports of posts in discuss board
CREATE TABLE reportpost (
	report_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	report_user VARCHAR(20) NOT NULL,
	report_date datetime NOT NULL, 
	reportpost_id INT UNSIGNED NOT NULL,
	reason CHAR(1) NOT NULL, 
	PRIMARY KEY (report_id), 
	FOREIGN KEY (report_user) references members(username), 
	FOREIGN KEY (reportpost_id) references board(board_id)
);

-- create table for holding reports of comments in discuss board
CREATE TABLE reportcomment (
	report_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	report_user VARCHAR(20) NOT NULL,
	report_date datetime NOT NULL, 
	reportcomment_id INT UNSIGNED NOT NULL,
	reason CHAR(1) NOT NULL, 
	PRIMARY KEY (report_id), 
	FOREIGN KEY (report_user) references members(username), 
	FOREIGN KEY (reportcomment_id) references replyboard(reply_id)
);









