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
  `shiftid` INT NOT NULL AUTO_INCREMENT,
  `day` varchar(5) NOT NULL,
  `time` INT NOT NULL,
  `mentor` varchar(20),
  `library` varchar(30), 
  PRIMARY KEY (`shiftid`),
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


INSERT INTO `library` (`lib_name`, `lib_address`, `lib_phone`) VALUES
('Central', '9 Garden Place', '078386826'),
('Chartwell', '5 Lynden Court', '078386844'),
('Dinsdale', 'Whatawhata Road Shops', '078386855'),
('Glenview', 'MacDonald Road', '078386821'),
('Hillcrest', '58 Masters Avenue', '078386849'),
('St Andrews', 'Corner of Braid Road and Taylor Terrace', '078386847');

INSERT INTO `mentors` (`username`, `password`, `active`, `email`, `fname`, `lname`) VALUES
('bnye3', 'pword3', 'true', 'bnye3@gmail.com', 'bill', 'nye'),
('clee4', 'pword4', 'true', 'clee4@gmail.com', 'chen', 'lee'),
('hsolo', 'pword7', 'false', 'hsolo7@gmail.com', 'han', 'solo'),
('jpaul1', 'pword1', 'true', 'jpaul1@gmail.com', 'jake', 'paul'),
('oobu5', 'pword5', 'true', 'oobu5@gmail.com', 'obu', 'obu'),
('swozniak6', 'pword6', 'true', 'swozniak6@gmail.com', 'steve', 'wozniak'),
('jhalpert', 'pword8', 'true', 'jhalpert@gmail.com', 'jim', 'halpert'),
('pbeesly', 'pword9', 'true', 'pbeesly@gmail.com', 'pam', 'beesly'),
('dschrute', 'pword10', 'true', 'dschrute@gmail.com', 'dwight', 'schrute'),
('mscott', 'pword11', 'true', 'mscott@gmail.com', 'michael', 'scott'),
('shudson', 'pword12', 'true', 'shudson@gmail.com', 'stanley', 'hudson'),
('kmalone', 'pword13', 'true', 'kmalone@gmail.com', 'kevin', 'malone'),
('abernard', 'pword14', 'true', 'abernard@gmail.com', 'andy', 'bernard'),
('omartinez', 'pword15', 'true', 'omartinez@gmail.com', 'oscar', 'martinez'),
('amartin', 'pword16', 'true', 'amartin@gmail.com', 'angela', 'martin'),
('tflenderson', 'pword17', 'true', 'tflenderson@gmail.com', 'toby', 'flenderson'),
('cbratton', 'pword18', 'true', 'cbratton@gmail.com', 'creed', 'bratton'),
('mpalmer', 'pword19', 'true', 'mpalmer@gmail.com', 'meredith', 'palmer'),
('rhoward', 'pword20', 'true', 'rhoward@gmail.com','ryan', 'howard'),
('kkapoor', 'pword21', 'true', 'kkapoor@gmail.com', 'kelly', 'kapoor');

INSERT INTO `staff` (`username`, `password`, `active`, `library`) VALUES
('centralstaff', 'pword1', 'true', 'Central'),
('centralstaff2', 'pword7', 'false', 'Central'),
('chartwellstaff', 'pword3', 'true', 'Chartwell'),
('dinsdalestaff', 'pword2', 'true', 'Dinsdale'),
('glenviewstaff', 'pword4', 'true', 'Glenview'),
('hillcreststaff', 'pword5', 'true', 'Hillcrest'),
('standrewsstaff', 'pword6', 'true', 'St Andrews');

INSERT INTO `admin` (`username`, `password`, `active`, `email`) VALUES
('adminCentral', 'adminpword1', 'true', 'admin@email.com');

INSERT INTO `shift` (`day`, `time`, `mentor`, `library`) VALUES
--Central library
('mon',10,'jpaul1','Central'),
('mon',11,'jpaul1','Central'),
('mon',12,'jpaul1','Central'),
('mon',13,'jpaul1','Central'),
('tues',10,'bnye3','Central'),
('tues',11,'bnye3','Central'),
('tues',13,'clee4','Central'),
('tues',14,'clee4','Central'),
('wed',10,'jpaul1','Central'),
('wed',11,'jpaul1','Central'),
('wed',12,'jpaul1','Central'),
('wed',13,'jpaul1','Central'),
('thurs',10,'bnye3','Central'),
('thurs',11,'bnye3','Central'),
('thurs',12,'bnye3','Central'),
('thurs',13,'bnye3','Central'),
('fri',10,'bnye3','Central'),
('fri',11,'bnye3','Central'),

--Hillcrest library
('mon',12,'oobu5','Hillcrest'),
('mon',13,'oobu5','Hillcrest'),
('mon',14,'oobu5','Hillcrest'),
('tues',10,'swozniak6','Hillcrest'),
('tues',11,'swozniak6','Hillcrest'),
('tues',12,'oobu5','Hillcrest'),
('tues',13,'oobu5','Hillcrest'),
('tues',14,'oobu5','Hillcrest'),
('wed',10,'swozniak6','Hillcrest'),
('wed',11,'swozniak6','Hillcrest'),
('wed',12,'oobu5','Hillcrest'),
('wed',13,'oobu5','Hillcrest'),
('thurs',10,'swozniak6','Hillcrest'),
('thurs',11,'swozniak6','Hillcrest'),
('thurs',12,'mpalmer','Hillcrest'),
('thurs',13,'mpalmer','Hillcrest'),
('fri',10,'swozniak6','Hillcrest'),
('fri',11,'swozniak6','Hillcrest'),
('fri',12,'mpalmer','Hillcrest'),
('fri',13,'mpalmer','Hillcrest'),

--Chartwell
('mon',11,'jhalpert','Chartwell'),
('mon',12,'jhalpert','Chartwell'),
('tues',10,'jhalpert','Chartwell'),
('tues',11,'jhalpert','Chartwell'),
('tues',12,'dschrute','Chartwell'),
('tues',13,'dschrute','Chartwell'),
('wed',11,'jhalpert','Chartwell'),
('wed',12,'jhalpert','Chartwell'),
('wed',13,'pbeesly','Chartwell'),
('wed',14,'pbeesly','Chartwell'),
('thurs',10,'pbeesly','Chartwell'),
('thurs',11,'pbeesly','Chartwell'),
('thurs',12,'dschrute','Chartwell'),
('thurs',13,'dschrute','Chartwell'),
('fri',10,'jhalpert','Chartwell'),
('fri',11,'jhalpert','Chartwell'),
('fri',12,'dschrute','Chartwell'),
('fri',13,'dschrute','Chartwell'),

--Glenview
('mon',10,'omartinez','Glenview'),
('mon',11,'omartinez','Glenview'),
('mon',12,'kmalone','Glenview'),
('mon',13,'kmalone','Glenview'),
('tues',10,'omartinez','Glenview'),
('tues',11,'omartinez','Glenview'),
('tues',12,'kmalone','Glenview'),
('tues',13,'kmalone','Glenview'),
('wed',10,'omartinez','Glenview'),
('wed',11,'omartinez','Glenview'),
('wed',12,'amartin','Glenview'),
('wed',13,'amartin','Glenview'),
('thurs',10,'amartin','Glenview'),
('thurs',11,'amartin','Glenview'),
('thurs',12,'kmalone','Glenview'),
('thurs',13,'kmalone','Glenview'),
('fri',10,'amartin','Glenview'),
('fri',11,'amartin','Glenview'),
('fri',12,'kmalone','Glenview'),
('fri',13,'kmalone','Glenview'),

--Dinsdale
('mon',12,'mscott','Dinsdale'),
('mon',13,'mscott','Dinsdale'),
('mon',14,'mscott','Dinsdale'),
('tues',10,'tflenderson','Dinsdale'),
('tues',11,'tflenderson','Dinsdale'),
('tues',12,'tflenderson','Dinsdale'),
('tues',13,'shudson','Dinsdale'),
('tues',14,'shudson','Dinsdale'),
('wed',12,'mscott','Dinsdale'),
('wed',13,'mscott','Dinsdale'),
('wed',14,'mscott','Dinsdale'),
('thurs',10,'tflenderson','Dinsdale'),
('thurs',11,'tflenderson','Dinsdale'),
('thurs',12,'tflenderson','Dinsdale'),
('thurs',13,'shudson','Dinsdale'),
('thurs',14,'shudson','Dinsdale'),
('fri',11,'tflenderson','Dinsdale'),
('fri',12,'tflenderson','Dinsdale'),
('fri',13,'mscott','Dinsdale'),
('fri',14,'mscott','Dinsdale'),

--St Andrews
('mon',11,'rhoward','St Andrews'),
('mon',12,'rhoward','St Andrews'),
('mon',13,'kkapoor','St Andrews'),
('mon',14,'kkapoor','St Andrews'),
('tues',10,'cbratton','St Andrews'),
('tues',11,'cbratton','St Andrews'),
('tues',12,'rhoward','St Andrews'),
('tues',13,'rhoward','St Andrews'),
('wed',10,'cbratton','St Andrews'),
('wed',11,'cbratton','St Andrews'),
('wed',12,'abernard','St Andrews'),
('wed',13,'abernard','St Andrews'),
('wed',14,'abernard','St Andrews'),
('thurs',10,'cbratton','St Andrews'),
('thurs',11,'cbratton','St Andrews'),
('thurs',12,'abernard','St Andrews'),
('thurs',13,'abernard','St Andrews'),
('thurs',14,'abernard','St Andrews'),
('fri',10,'cbratton','St Andrews'),
('fri',11,'cbratton','St Andrews'),
('fri',12,'kkapoor','St Andrews'),
('fri',13,'kkapoor','St Andrews');

INSERT INTO `sessions` (`date`, `time`, `client_name`, `client_phone`, `problem`, `notes`, `platform`, `noshow`, `walkin`, `mentor`, `library`) VALUES
('2018-10-08', 10, 'david', '021234567', 'send email', 'client successfully sent email', 'windows', 'false', 'false', 'jpaul1', 'Central'),
('2018-10-08', 11, 'steve', '021134567', 'send txt', 'client successfully learned how to text', 'android', 'false', 'false', 'jpaul1', 'Central'),
('2018-10-09', 11, 'bob', '0212234567', 'send email', 'client added email to mail client, learned how to send emails', 'macos', 'false', 'false', 'bnye3', 'Central'),
('2018-10-09', 13, 'dale', '021334567', 'print', 'printer was added incorrectly, fixed and client could print', 'windows', 'false', 'false', 'clee4', 'Central'),
('2018-10-10', 11, 'anna', '021234567', 'send email', 'client forgot email password, reset and successfully sent emails', 'windows', 'false', 'false', 'jpaul1', 'Central'),
('2018-10-10', 12, 'joe', '0219876543', null, 'client didnt show up', null, 'true', 'false', 'jpaul1', 'Central'),
('2018-10-10', 13, 'cheryl', '021134567', 'install app', 'showed client the app store, they installed app and learned how to get more', 'ios', 'false', 'false', 'jpaul1', 'Central'),
('2018-10-11', 10, 'stacy', '0212923456', 'send email with pictures', 'client learned how to attach images to email', 'android', 'false', 'false', 'bnye3', 'Central'),
('2018-10-11', 11, 'bob', '0212234567', 'how to take video', 'client learned how to take photos/videos and also taught how to use facetime (client requested)', 'ios', 'false', 'false', 'bnye3', 'Central'),
('2018-10-12', 10, 'nate', '0217223456', 'learn how to skype', 'installed skype, created client account and taught them how to call people', 'windows', 'false', 'false', 'bnye3', 'Central'),
('2018-10-12', 11, null, null, null, 'showed customer how to print', 'windows', 'false', 'true', 'bnye3', 'Central');
