CREATE DATABASE IF NOT EXISTS `hcl_mentors` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hcl_mentors`;

CREATE TABLE `library` (
  `lib_name` varchar(30) NOT NULL,
  `lib_address` varchar(100) NOT NULL,
  `lib_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`lib_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mentors` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT true,
  `email` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE (`email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `staff` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT true,
  `library` varchar(30) NOT NULL, 
  PRIMARY KEY (`username`),
  FOREIGN KEY (`library`)
  REFERENCES `library` (`lib_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT true,
  `email` varchar(50) NOT NULL, 
  PRIMARY KEY (`username`),
  UNIQUE (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shift` (
  `day` varchar(5) NOT NULL,
  `time` INT NOT NULL,
  `mentor` varchar(20),
  `library` varchar(30), 
  PRIMARY KEY (`day`, `time`),
  FOREIGN KEY (`mentor`)
  REFERENCES `mentors` (`username`),
  FOREIGN KEY (`library`)
  REFERENCES `library` (`lib_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sessions` (
  `sessionID` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `time` INT NOT NULL,
  `client_name` varchar(60),
  `client_phone` varchar(10),
  `problem` varchar(200),
  `notes` varchar(300),
  `platform` varchar(20),
  `noshow` varchar(5) DEFAULT false,
  `walkin` varchar(5) DEFAULT false,
  `mentor` varchar(20) NOT NULL,
  `library` varchar(30) NOT NULL,
  PRIMARY KEY (`sessionID`),
  FOREIGN KEY (`mentor`)
  REFERENCES `mentors` (`username`),
  FOREIGN KEY (`library`)
  REFERENCES `library` (`lib_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;