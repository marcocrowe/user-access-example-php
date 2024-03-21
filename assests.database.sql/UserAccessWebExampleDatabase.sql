-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema UserAccessWebExample
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `UserAccessWebExample` ;

-- -----------------------------------------------------
-- Schema UserAccessWebExample
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `UserAccessWebExample` DEFAULT CHARACTER SET utf8 ;
USE `UserAccessWebExample` ;

-- -----------------------------------------------------
-- Table `UserAccessWebExample`.`UserAccount`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `UserAccessWebExample`.`UserAccount` ;

CREATE TABLE IF NOT EXISTS `UserAccessWebExample`.`UserAccount` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Active` TINYINT NOT NULL DEFAULT 1,
  `Avatar` BLOB NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Name` VARCHAR(90) NOT NULL,
  `Password` VARCHAR(255) NULL,
  `Username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) VISIBLE,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) VISIBLE)
ENGINE = InnoDB;

USE `UserAccessWebExample` ;

-- -----------------------------------------------------
-- procedure CreateUserAccount
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`CreateUserAccount`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `CreateUserAccount` (In Active_ TinyInt, In email_ Varchar(255), In Name_ Varchar(90), In Password_ Varchar(255), In Username_ Varchar(45))
BEGIN
Insert Into `UserAccount` (`Active`, `Email`, `Name`, `Password`, `Username`) 
Values (Active_, Email_, Name_, Password_, Username_);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure DeleteUserAccountById
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`DeleteUserAccountById`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `DeleteUserAccountById`  (In Id_ Int)
BEGIN
Delete From `UserAccount` Where `Id` = Id_;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure UpdateUserAccount
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`UpdateUserAccount`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `UpdateUserAccount` (In Active_ TinyInt, In email_ Varchar(255), In Id_ TinyInt, In Name_ Varchar(90), In Username_ Varchar(45))
BEGIN
Update `UserAccount` 
Set
  `Active` = Active_
 ,`Email` = email_
 ,`Name` = Name_
 ,`Username` = Username_
Where `Id` = Id_;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure GetUserAccountById
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`GetUserAccountById`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `GetUserAccountById` (In Id_ Int)
BEGIN
Select * From `UserAccount` Where `Id` = Id_;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure GetUserAccountByCredentials
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`GetUserAccountByCredentials`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `GetUserAccountByCredentials` (In Password_ Varchar(255), In Username_ Varchar(45))
BEGIN
Select * From `UserAccount` Where `Password` = Password_ And `Username` = Username_;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure GetUserAccounts
-- -----------------------------------------------------

USE `UserAccessWebExample`;
DROP procedure IF EXISTS `UserAccessWebExample`.`GetUserAccounts`;

DELIMITER $$
USE `UserAccessWebExample`$$
CREATE PROCEDURE `GetUserAccounts` ()
BEGIN
Select * From `UserAccount`;
END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
