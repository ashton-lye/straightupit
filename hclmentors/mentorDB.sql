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
('central', '9 Garden Place', '078386826'),
('chartwell', '5 Lynden Court', '078386844'),
('dinsdale', 'Whatawhata Road Shops', '078386855'),
('glenview', 'MacDonald Road', '078386821'),
('hillcrest', '58 Masters Avenue', '078386849'),
('st andrews', 'Corner of Braid Road and Taylor Terrace', '078386847');

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
('centralstaff', 'pword1', 'true', 'central'),
('centralstaff2', 'pword7', 'false', 'central'),
('chartwellstaff', 'pword3', 'true', 'chartwell'),
('dinsdalestaff', 'pword2', 'true', 'dinsdale'),
('glenviewstaff', 'pword4', 'true', 'glenview'),
('hillcreststaff', 'pword5', 'true', 'hillcrest'),
('standrewsstaff', 'pword6', 'true', 'st andrews');

INSERT INTO `admin` (`username`, `password`, `active`, `email`) VALUES
('admincentral', 'adminpword1', 'true', 'admin@email.com');

INSERT INTO `shift` (`day`, `time`, `mentor`, `library`) VALUES
--central library
('mon',10,'jpaul1','central'),
('mon',11,'jpaul1','central'),
('mon',12,'jpaul1','central'),
('mon',13,'jpaul1','central'),
('tues',10,'bnye3','central'),
('tues',11,'bnye3','central'),
('tues',13,'clee4','central'),
('tues',14,'clee4','central'),
('wed',10,'jpaul1','central'),
('wed',11,'jpaul1','central'),
('wed',12,'jpaul1','central'),
('wed',13,'jpaul1','central'),
('thurs',10,'bnye3','central'),
('thurs',11,'bnye3','central'),
('thurs',12,'bnye3','central'),
('thurs',13,'bnye3','central'),
('fri',10,'bnye3','central'),
('fri',11,'bnye3','central'),

--hillcrest library
('mon',12,'oobu5','hillcrest'),
('mon',13,'oobu5','hillcrest'),
('mon',14,'oobu5','hillcrest'),
('tues',10,'swozniak6','hillcrest'),
('tues',11,'swozniak6','hillcrest'),
('tues',12,'oobu5','hillcrest'),
('tues',13,'oobu5','hillcrest'),
('tues',14,'oobu5','hillcrest'),
('wed',10,'swozniak6','hillcrest'),
('wed',11,'swozniak6','hillcrest'),
('wed',12,'oobu5','hillcrest'),
('wed',13,'oobu5','hillcrest'),
('thurs',10,'swozniak6','hillcrest'),
('thurs',11,'swozniak6','hillcrest'),
('thurs',12,'mpalmer','hillcrest'),
('thurs',13,'mpalmer','hillcrest'),
('fri',10,'swozniak6','hillcrest'),
('fri',11,'swozniak6','hillcrest'),
('fri',12,'mpalmer','hillcrest'),
('fri',13,'mpalmer','hillcrest'),

--chartwell
('mon',11,'jhalpert','chartwell'),
('mon',12,'jhalpert','chartwell'),
('tues',10,'jhalpert','chartwell'),
('tues',11,'jhalpert','chartwell'),
('tues',12,'dschrute','chartwell'),
('tues',13,'dschrute','chartwell'),
('wed',11,'jhalpert','chartwell'),
('wed',12,'jhalpert','chartwell'),
('wed',13,'pbeesly','chartwell'),
('wed',14,'pbeesly','chartwell'),
('thurs',10,'pbeesly','chartwell'),
('thurs',11,'pbeesly','chartwell'),
('thurs',12,'dschrute','chartwell'),
('thurs',13,'dschrute','chartwell'),
('fri',10,'jhalpert','chartwell'),
('fri',11,'jhalpert','chartwell'),
('fri',12,'dschrute','chartwell'),
('fri',13,'dschrute','chartwell'),

--glenview
('mon',10,'omartinez','glenview'),
('mon',11,'omartinez','glenview'),
('mon',12,'kmalone','glenview'),
('mon',13,'kmalone','glenview'),
('tues',10,'omartinez','glenview'),
('tues',11,'omartinez','glenview'),
('tues',12,'kmalone','glenview'),
('tues',13,'kmalone','glenview'),
('wed',10,'omartinez','glenview'),
('wed',11,'omartinez','glenview'),
('wed',12,'amartin','glenview'),
('wed',13,'amartin','glenview'),
('thurs',10,'amartin','glenview'),
('thurs',11,'amartin','glenview'),
('thurs',12,'kmalone','glenview'),
('thurs',13,'kmalone','glenview'),
('fri',10,'amartin','glenview'),
('fri',11,'amartin','glenview'),
('fri',12,'kmalone','glenview'),
('fri',13,'kmalone','glenview'),

--dinsdale
('mon',12,'mscott','dinsdale'),
('mon',13,'mscott','dinsdale'),
('mon',14,'mscott','dinsdale'),
('tues',10,'tflenderson','dinsdale'),
('tues',11,'tflenderson','dinsdale'),
('tues',12,'tflenderson','dinsdale'),
('tues',13,'shudson','dinsdale'),
('tues',14,'shudson','dinsdale'),
('wed',12,'mscott','dinsdale'),
('wed',13,'mscott','dinsdale'),
('wed',14,'mscott','dinsdale'),
('thurs',10,'tflenderson','dinsdale'),
('thurs',11,'tflenderson','dinsdale'),
('thurs',12,'tflenderson','dinsdale'),
('thurs',13,'shudson','dinsdale'),
('thurs',14,'shudson','dinsdale'),
('fri',11,'tflenderson','dinsdale'),
('fri',12,'tflenderson','dinsdale'),
('fri',13,'mscott','dinsdale'),
('fri',14,'mscott','dinsdale'),

--st andrews
('mon',11,'rhoward','st andrews'),
('mon',12,'rhoward','st andrews'),
('mon',13,'kkapoor','st andrews'),
('mon',14,'kkapoor','st andrews'),
('tues',10,'cbratton','st andrews'),
('tues',11,'cbratton','st andrews'),
('tues',12,'rhoward','st andrews'),
('tues',13,'rhoward','st andrews'),
('wed',10,'cbratton','st andrews'),
('wed',11,'cbratton','st andrews'),
('wed',12,'abernard','st andrews'),
('wed',13,'abernard','st andrews'),
('wed',14,'abernard','st andrews'),
('thurs',10,'cbratton','st andrews'),
('thurs',11,'cbratton','st andrews'),
('thurs',12,'abernard','st andrews'),
('thurs',13,'abernard','st andrews'),
('thurs',14,'abernard','st andrews'),
('fri',10,'cbratton','st andrews'),
('fri',11,'cbratton','st andrews'),
('fri',12,'kkapoor','st andrews'),
('fri',13,'kkapoor','st andrews');

INSERT INTO `sessions` (`date`, `time`, `client_name`, `client_phone`, `problem`, `notes`, `platform`, `noshow`, `walkin`, `mentor`, `library`) VALUES
('2018-10-08', 10, 'david', '021234567', 'send email', 'client successfully sent email', 'windows', 'false', 'false', 'jpaul1', 'central'),
('2018-10-08', 11, 'steve', '021134567', 'send txt', 'client successfully learned how to text', 'android', 'false', 'false', 'jpaul1', 'central'),
('2018-10-09', 11, 'bob', '0212234567', 'send email', 'client added email to mail client, learned how to send emails', 'macos', 'false', 'false', 'bnye3', 'central'),
('2018-10-09', 13, 'dale', '021334567', 'print', 'printer was added incorrectly, fixed and client could print', 'windows', 'false', 'false', 'clee4', 'central'),
('2018-10-10', 11, 'anna', '021234567', 'send email', 'client forgot email password, reset and successfully sent emails', 'windows', 'false', 'false', 'jpaul1', 'central'),
('2018-10-10', 12, 'joe', '0219876543', null, 'client didnt show up', null, 'true', 'false', 'jpaul1', 'central'),
('2018-10-10', 13, 'cheryl', '021134567', 'install app', 'showed client the app store, they installed app and learned how to get more', 'ios', 'false', 'false', 'jpaul1', 'central'),
('2018-10-11', 10, 'stacy', '0212923456', 'send email with pictures', 'client learned how to attach images to email', 'android', 'false', 'false', 'bnye3', 'central'),
('2018-10-11', 11, 'bob', '0212234567', 'how to take video', 'client learned how to take photos/videos and also taught how to use facetime (client requested)', 'ios', 'false', 'false', 'bnye3', 'central'),
('2018-10-12', 10, 'nate', '0217223456', 'learn how to skype', 'installed skype, created client account and taught them how to call people', 'windows', 'false', 'false', 'bnye3', 'central'),
('2018-10-12', 11, null, null, null, 'showed customer how to print', 'windows', 'false', 'true', 'bnye3', 'central');
