# maya-ashok-saniya-kalamkar-P1

<!-- These are the SQL statements for creating database (called planner db) and table (called tasks1). You have to copy it into the SQL tab in localhost/phpmyadmin. Then highlight all the code and press go. -->

<!-- Used w3schools information on SQL Create DB and SQL Create Table to create plannerdb and tasks1 from lines 11-21. -->

<!-- Got lines 23-26 from localhost/phpmyadmin user accounts tab by practicing adding a new user -->

Used phpmyadmin and went to user accounts, add user account,

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
