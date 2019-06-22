CREATE DATABASE `ctbcfx` CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

CREATE TABLE `ASPECT`( `id` int NOT NULL AUTO_INCREMENT, `aspect` varchar(50) NOT NULL default '', PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `WORD`( `id` int NOT NULL AUTO_INCREMENT, `aspect` varchar(50) NOT NULL default '', `word` varchar(50) NOT NULL default '',PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;