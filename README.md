# maya-ashok-saniya-kalamkar-P1

/_ These are the SQL statements for creating database and a table for the tasks called task1. You should enter this into SQL in localhost/phpmyadmin and press the GO button to create the table. _/

CREATE DATABASE plannerdb;

USE plannerdb;

CREATE TABLE tasks1 (
tasksID INT NOT NULL AUTO_INCREMENT,
usersName VARCHAR(255) NOT NULL,
tasksName VARCHAR(255) NOT NULL,
tasksDate DATE NOT NULL,
PRIMARY KEY (tasksID)
);

CREATE USER dbuser1@localhost identified by '!dbuser1!';

grant all privileges on plannerdb to dbuser1@localhost;

flush privileges;

GRANT ALL PRIVILEGES ON _._ TO dbuser1@localhost REQUIRE NONE WITH GRANT OPTION;
