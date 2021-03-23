create database ProfessionalPills;
create user 'ProfessionalPills'@'localhost'  identified by '1234567890';
grant all privileges on ProfessionalPills.* to  'ProfessionalPills'@'localhost';
FLUSH PRIVILEGES;

USE ProfessionalPills; 


CREATE TABLE IF NOT EXISTS `clients` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(60) NOT NULL,
 `trn_date` datetime NOT NULL,
 `hospital` varchar(50),
 `approved` boolean,
 `appointment` datetime,
 `vacinated` boolean, 
 `placebo` boolean,

 PRIMARY KEY (`id`)
 );

 CREATE TABLE IF NOT EXISTS `medics` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `trn_date` datetime NOT NULL,
 `hospital` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
 );



 CREATE TABLE IF NOT EXISTS `R&D` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `trn_date` datetime NOT NULL,

 PRIMARY KEY (`id`)
 );
