-- new added sql

-- create table for holding members' data
CREATE TABLE members (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
	firstName VARCHAR(20), 
	lastName VARCHAR(100), 
	question VARCHAR(20) ,
	answer VARCHAR(20) ,
    email VARCHAR(65) NOT NULL,
	description VARCHAR(150) DEFAULT "", 
	avatar_base64 LONGTEXT, 
    PRIMARY KEY (id), 
	UNIQUE (username)
);