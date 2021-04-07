CREATE DATABASE IF NOT EXISTS ProfessionalPills;
create user 'ProfessionalPills'@'localhost'  identified by '1234567890';
grant all privileges on ProfessionalPills.* to  'ProfessionalPills'@'localhost';
FLUSH PRIVILEGES;

USE ProfessionalPills; 


CREATE TABLE IF NOT EXISTS `clients` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(60) NOT NULL,
 `province` varchar(50),
 `client_approved` boolean,
 `appointment` datetime,
 `vacinated` boolean, 
 `placebo` boolean,
 `medical_history` varchar(100),
 `research_data` varchar(100),
 `vaccine_delivered` bool
 );

 -- noinspection SqlNoDataSourceInspection

CREATE TABLE IF NOT EXISTS `hospitals`(
    `hospital` varchar(50),
    `province` varchar(50)
 );

 INSERT into `hospitals` VALUES (`ziekenhuis Amsterdam`, `noordholland`),(`ziekenhuis rotterdam`, `zuidholland` ),(`ziekenhuis Utrecht`, `Utrecht`);