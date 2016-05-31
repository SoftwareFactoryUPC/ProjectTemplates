CREATE DATABASE [Software_Factory];
USE [Software_Factory]

--drop table [polling_place]
CREATE TABLE [polling_place]
(
polling_place_id int IDENTITY(1,1) PRIMARY KEY,
name varchar(50)
)

--drop table [person]
CREATE TABLE [person]
(
person_id int IDENTITY(1,1) PRIMARY KEY,
name varchar(50),
last_name varchar(50),
dni varchar(8),
polling_place_id  int  FOREIGN KEY REFERENCES polling_place(polling_place_id) not null
)