-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema theater
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema theater
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `theater` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `theater` ;

-- -----------------------------------------------------
-- Table `theater`.`collegers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theater`.`collegers` ;

CREATE TABLE IF NOT EXISTS `theater`.`collegers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theater`.`shows`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theater`.`shows` ;

CREATE TABLE IF NOT EXISTS `theater`.`shows` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theater`.`colleger_shows`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theater`.`colleger_shows` ;

CREATE TABLE IF NOT EXISTS `theater`.`colleger_shows` (
  `colleger_id` INT NOT NULL,
  `show_id` INT NOT NULL,
  `entry` TIME NOT NULL,
  `departure` TIME NOT NULL,
  `note` TEXT NULL,
  PRIMARY KEY (`colleger_id`, `show_id`),
  INDEX `fk_bolsista_has_espetaculo_espetaculo1_idx` (`show_id` ASC),
  INDEX `fk_bolsista_has_espetaculo_bolsista_idx` (`colleger_id` ASC),
  CONSTRAINT `fk_bolsista_has_espetaculo_bolsista`
    FOREIGN KEY (`colleger_id`)
    REFERENCES `theater`.`collegers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bolsista_has_espetaculo_espetaculo1`
    FOREIGN KEY (`show_id`)
    REFERENCES `theater`.`shows` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
