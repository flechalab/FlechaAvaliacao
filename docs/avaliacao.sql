SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `flecha-avaliacao` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `flecha-avaliacao` ;

-- -----------------------------------------------------
-- Table `flecha-avaliacao`.`social`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `flecha-avaliacao`.`social` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `flag` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `flag_UNIQUE` (`flag` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flecha-avaliacao`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `flecha-avaliacao`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `social_flag` VARCHAR(45) NOT NULL ,
  `social_profile` VARCHAR(45) NOT NULL ,
  `social_name` VARCHAR(45) NOT NULL ,
  `social_img` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `idx-social-id` (`social_flag` ASC, `social_profile` ASC) ,
  INDEX `idx-name` (`name` ASC) ,
  INDEX `fk-social-opt` (`social_flag` ASC) ,
  CONSTRAINT `fk-social-opt`
    FOREIGN KEY (`social_flag` )
    REFERENCES `flecha-avaliacao`.`social` (`flag` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flecha-avaliacao`.`rating_stuff`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `flecha-avaliacao`.`rating_stuff` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` BLOB NULL ,
  `logo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_name` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flecha-avaliacao`.`rating`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `flecha-avaliacao`.`rating` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `stuff_id` INT NOT NULL ,
  `rating` TINYINT NOT NULL ,
  `date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk-stuff` (`stuff_id` ASC) ,
  INDEX `fk-user` (`user_id` ASC) ,
  INDEX `idx-date` (`date` ASC) ,
  CONSTRAINT `fk-stuff`
    FOREIGN KEY (`stuff_id` )
    REFERENCES `flecha-avaliacao`.`rating_stuff` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk-user`
    FOREIGN KEY (`user_id` )
    REFERENCES `flecha-avaliacao`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE USER `avaliador` IDENTIFIED BY 'avaliador';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
