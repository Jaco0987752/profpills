drop database IF EXISTS ProfessionalPills;
create database ProfessionalPills;
drop user 'ProfessionalPills'@'localhost';
create user 'ProfessionalPills'@'localhost'  identified by '1234567890';
grant all privileges on ProfessionalPills.* to  'ProfessionalPills'@'localhost';
FLUSH PRIVILEGES;

USE ProfessionalPills;


CREATE TABLE IF NOT EXISTS `clients` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(60) NOT NULL,
    `province` varchar(50),
    `client_approved` boolean,
    `appointment` int REFERENCES appointments(`id`),
    `vaccinated` boolean,
    `placebo` boolean,
    `medical_history` varchar(100),
    `research_data` varchar(100),
    `vaccine_delivered` boolean,
    `birthday` date,
    `telephone` varchar(50),
    `address` varchar(50),
    `residential_area` varchar(50)
    );

CREATE TABLE IF NOT EXISTS `appointments` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date` date,
    `time` time,
    `hospital` int REFERENCES hospitals(id)
    );
-- noinspection SqlNoDataSourceInspection

CREATE TABLE IF NOT EXISTS `hospitals` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `hospital` varchar(50),
    `province` varchar(50)
    );

INSERT into `hospitals` (`hospital`, `province`)
VALUES ('ziekenhuis Amsterdam', 'noordholland'),
       ('ziekenhuis rotterdam', 'zuidholland'),
       ('ziekenhuis Utrecht', 'Utrecht');

INSERT INTO `appointments` (`hospital`, `date`, `time`)
VALUES  (1, '2022-11-11', '19:30:10'),
        (2, '2022-11-11', '19:30:10'),
        (3, '2022-11-11', '19:30:10'),
        (1, '2022-11-11', '19:50:10'),
        (2, '2022-11-11', '19:50:10'),
        (3, '2022-11-11', '19:50:10'),
        (1, '2022-11-11', '19:59:10'),
        (2, '2022-11-11', '19:59:10'),
        (3, '2022-11-11', '19:59:10');