# maya-ashok-saniya-kalamkar-P1

<!-- These are the SQL statements for creating database (called planner db) and table (called tasks1). You have to copy it into the SQL tab in localhost/phpmyadmin. Then highlight all the code and press go. -->

<!-- Used w3schools information on SQL Create DB and SQL Create Table to create plannerdb and tasks1 from lines 11-21. -->

<!-- Got lines 23-26 from localhost/phpmyadmin user accounts tab by practicing adding a new user -->

<!-- Note: http://localhost/phpmyadmin/ can also be used to create database, create table, create users, and grant priviliges  -->

<!-- If you get an error that says "INSERT command denied to user 'dbuser1'@'localhost' for table 'tasks1'", this means that the database creation scripts for granting the user privilege to the database didn't work. You can do this manually by going to http://localhost/phpmyadmin/, clicking user accounts tab, clicking the check mark next to dbuser1, clicking "Edit privileges", then clicking the "Check all" checkbox next to "Global privileges", and scrolling down and clicking the "Go" button. -->

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
Use plannerdb;
grant all privileges on plannerdb to dbuser1@localhost;
flush privileges;
GRANT ALL PRIVILEGES ON _._ TO dbuser1@localhost REQUIRE NONE WITH GRANT OPTION;
