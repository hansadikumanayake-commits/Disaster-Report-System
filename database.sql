-- Creating the database for the disaster report system
CREATE DATABASE disaster_db;
USE disaster_db;

-- create the table disaster_reports inside the disaster_db database
CREATE TABLE disaster_reports(
	id INT auto_increment primary key,
	name varchar(150) not null,
	tel varchar(10) not null,
	disaster varchar(100),
	geotag varchar(255) not null;
	photo1 varchar(255),
	photo2 varchar(255),
	photo3 varchar(255),
	created_at timestamp default current_timestamp);