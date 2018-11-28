

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- -----------------------------------------------------
-- Schema CST8257
-- -----------------------------------------------------
-- DROP SCHEMA IF EXISTS `CST8257` ;

-- -----------------------------------------------------
-- Schema CST8257
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CST8257` DEFAULT CHARACTER SET utf8 ;
USE `CST8257` ;
SET FOREIGN_KEY_CHECKS=0;
-- -----------------------------------------------------
-- Table `CST8257`.`User `
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`User` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`User` (
  `UserId` VARCHAR(16) NOT NULL,
  `Name` VARCHAR(256) NOT NULL,
  `Phone` VARCHAR(16) NULL,
  `Password` VARCHAR(256) NULL,
  PRIMARY KEY (`UserId`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `CST8257`.`Accessibility`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`Accessibility` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`Accessibility` (
  `Accessibility_Code` VARCHAR(16) NOT NULL,
  `Description` VARCHAR(127) NULL,
  PRIMARY KEY (`Accessibility_Code`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `CST8257`.`Album`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`Album` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`Album` (
  `Album_Id` int(11) AUTO_INCREMENT,
  `Title` VARCHAR(256) NOT NULL,
   `Description` varchar(3000), 
   `Date_Updated` Date NOT NULL,
   `Owner_Id` varchar(16) NOT NULL,
   `Accessibility_Code` varchar(16) NOT NULL, 
	PRIMARY KEY (`Album_Id`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- -----------------------------------------------------
-- Table `CST8257`.`Picture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`Picture` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`Picture` (
  `Picture_Id` int(11) NOT NULL AUTO_INCREMENT,
	`Album_Id` int(11) NOT NULL,
	`FileName` varchar(255) NOT NULL,
   	`Title` varchar(256) NOT NULL,
   	`Description` varchar(3000),
	`Date_Added` date NOT NULL,
	PRIMARY KEY (`Picture_Id`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `CST8257`.`Comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`Comment` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`Comment` (
  `Comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  	`Author_Id` varchar(16) NOT NULL,
`Picture_Id` int(11) NOT NULL,
`Comment_Text` varchar(3000) NOT NULL,
`Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`Comment_Id`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- -----------------------------------------------------
-- Table `CST8257`.`FriendshipStatus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`FriendshipStatus` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`FriendshipStatus` (
	Status_Code varchar(16) NOT NULL PRIMARY KEY,
	Description varchar(128) NOT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `CST8257`.`Friendship`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CST8257`.`Friendship` ;

CREATE TABLE IF NOT EXISTS `CST8257`.`Friendship` (
	`Friend_RequesterId` varchar(16) NOT NULL,
	`Friend_RequesteeId` varchar(16) NOT NULL,
	`Status` varchar(16) NOT NULL

)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET FOREIGN_KEY_CHECKS=1;
-- Constraints for table `Album`
--
ALTER TABLE `Album`
  Add KEY `Album_Owner_Id_FK` (`Owner_Id`),
  ADD CONSTRAINT `Album_Owner_Id_FK` FOREIGN KEY (`Owner_Id`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `Album_Accessibility_Code_FK` FOREIGN KEY (`Accessibility_Code`) REFERENCES Accessibility (`Accessibility_Code`);

-- Constraints for table `Picture`
--
 ALTER TABLE `Picture`
  ADD CONSTRAINT `Picture_Album_Id_FK` FOREIGN KEY (`Album_Id`) REFERENCES Album (`Album_Id`);

-- Constraints for table `Comment`
--
 ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_Author_Id_FK` FOREIGN KEY (`Author_Id`) REFERENCES User (`UserId`),
  ADD CONSTRAINT `Comment_Picture_Id_FK` FOREIGN KEY (`Picture_Id`) REFERENCES Picture (`Picture_Id`);

-- Constraints for table `Friendship`
--
 ALTER TABLE `Friendship`
  ADD CONSTRAINT `Friendship_Friend_RequesterId_FK` FOREIGN KEY (`Friend_RequesterId`) REFERENCES User (`UserId`),
  ADD CONSTRAINT `Friendship_Friend_RequesteeId_FK` FOREIGN KEY (`Friend_RequesteeId`) REFERENCES User (`UserId`),
  ADD CONSTRAINT `Friendship_Status_FK` FOREIGN KEY (`Status`) REFERENCES FriendshipStatus (`Status_Code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
