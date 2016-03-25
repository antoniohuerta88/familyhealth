-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema familyhealth
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema familyhealth
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `familyhealth` DEFAULT CHARACTER SET utf8 ;
USE `familyhealth` ;

-- -----------------------------------------------------
-- Table `familyhealth`.`authitem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`authitem` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`authitem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`authassignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`authassignment` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`authassignment` (
  `itemname` VARCHAR(64) NOT NULL,
  `userid` VARCHAR(64) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`itemname`, `userid`),
  CONSTRAINT `authassignment_ibfk_1`
    FOREIGN KEY (`itemname`)
    REFERENCES `familyhealth`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`authitemchild`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`authitemchild` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`authitemchild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `authitemchild_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `familyhealth`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `familyhealth`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`tbl_profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`tbl_profile` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`tbl_profile` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `address` VARCHAR(128) NULL DEFAULT NULL,
  `phone` VARCHAR(128) NULL DEFAULT NULL,
  `birthdate` DATE NULL DEFAULT NULL,
  `licencenumber` VARCHAR(128) NULL DEFAULT NULL,
  `speciality` VARCHAR(128) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `licencenumber` (`licencenumber` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`tbl_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`tbl_user` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`tbl_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(128) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `profileid` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC),
  INDEX `fk_tbl_user_tbl_profile1_idx` (`profileid` ASC),
  CONSTRAINT `fk_tbl_user_tbl_profile1`
    FOREIGN KEY (`profileid`)
    REFERENCES `familyhealth`.`tbl_profile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`tbl_appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`tbl_appointment` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`tbl_appointment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `diagnostic` VARCHAR(2000) NULL DEFAULT NULL,
  `treatment` VARCHAR(2000) NULL DEFAULT NULL,
  `appointmentdate` DATETIME NULL DEFAULT NULL,
  `completed` TINYINT(1) NULL DEFAULT '0',
  `patientuserid` INT(11) NOT NULL,
  `doctoruserid` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_appointment_tbl_user1_idx` (`patientuserid` ASC),
  INDEX `fk_tbl_appointment_tbl_user2_idx` (`doctoruserid` ASC),
  CONSTRAINT `fk_tbl_appointment_tbl_user1`
    FOREIGN KEY (`patientuserid`)
    REFERENCES `familyhealth`.`tbl_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_appointment_tbl_user2`
    FOREIGN KEY (`doctoruserid`)
    REFERENCES `familyhealth`.`tbl_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`tbl_workabledays`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`tbl_workabledays` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`tbl_workabledays` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `dayname` VARCHAR(50) NOT NULL,
  `dayshortname` VARCHAR(50) NOT NULL,
  `weekday` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `familyhealth`.`tbl_workablehours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `familyhealth`.`tbl_workablehours` ;

CREATE TABLE IF NOT EXISTS `familyhealth`.`tbl_workablehours` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timeframeup` VARCHAR(50) NOT NULL,
  `timeframedown` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, '', NULL, 'N;'),
('Doctor', 2, '', NULL, 'N;'),
('Paciente', 2, '', NULL, 'N;');


INSERT INTO tbl_profile (firstname, lastname) VALUES ('admin nombre', 'admin apellido');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('administrador', 'administrador', 'administrador@familyhealth.com',LAST_INSERT_ID());
INSERT INTO tbl_profile (firstname, lastname,licencenumber,speciality) VALUES ('doctor1 nombre', 'doctor1 apellido', '123-456-789', 'DOCTOR GENERAL');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('doctor1', 'doctor1', 'doctor1@familyhealth.com',LAST_INSERT_ID());
INSERT INTO tbl_profile (firstname, lastname,licencenumber,speciality) VALUES ('doctor2 nombre', 'doctor2 apellido', '789-789-456', 'MEDICO PARTERO');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('doctor2', 'doctor2', 'doctor2@familyhealth.com',LAST_INSERT_ID());
INSERT INTO tbl_profile (firstname, lastname) VALUES ('paciente1 nombre', 'paciente1 apellido');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('paciente1', 'paciente1', 'paciente1@familyhealth.com',LAST_INSERT_ID());
INSERT INTO tbl_profile (firstname, lastname) VALUES ('paciente2 nombre', 'paciente2 apellido');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('paciente2', 'paciente2', 'paciente2@familyhealth.com',LAST_INSERT_ID());
INSERT INTO tbl_profile (firstname, lastname) VALUES ('paciente3 nombre', 'paciente3 apellido');
INSERT INTO tbl_user (username, password, email, profileid) VALUES ('paciente3', 'paciente3', 'paciente3@familyhealth.com',LAST_INSERT_ID());

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Doctor', '2', NULL, 'N;'),
('Doctor', '3', NULL, 'N;'),
('Paciente', '4', NULL, 'N;'),
('Paciente', '5', NULL, 'N;'),
('Paciente', '6', NULL, 'N;');