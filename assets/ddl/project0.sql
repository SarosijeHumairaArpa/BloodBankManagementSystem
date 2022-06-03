CREATE DATABASE IF NOT EXISTS project0;
CREATE TABLE bbms
(
	username varchar(20) PRIMARY KEY,   
    userpassword varchar(20) NOT NULL,
    userfullname varchar(100) NOT NULL,
    useraddress varchar(1000) NOT NULL,
    usermobile varchar(1000) UNIQUE NOT NULL,
    userbloodgroup varchar(3) NOT NULL
);