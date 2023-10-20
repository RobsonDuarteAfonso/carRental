
-- -----------------------------------------------------
-- Schema carrental
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carrental` DEFAULT CHARACTER SET utf8 ;
USE `carrental` ;

-- -----------------------------------------------------
-- Table `carrental`.`privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`privilege` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrental`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `address` VARCHAR(45) NULL,
  `driver_license` VARCHAR(45) NULL,
  `expiration_date` DATE NULL,
  `privilege_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_user_privilege1_idx` (`privilege_id` ASC),
  CONSTRAINT `fk_user_privilege1`
    FOREIGN KEY (`privilege_id`)
    REFERENCES `carrental`.`privilege` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrental`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrental`.`car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`car` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(45) NOT NULL,
  `brand` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `license_plate` VARCHAR(10) NOT NULL,
  `car_mileage` INT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Car_Category1_idx` (`category_id` ASC),
  CONSTRAINT `fk_Car_Category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `carrental`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrental`.`rent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`rent` (
  `user_id` INT NOT NULL,
  `car_id` INT NOT NULL,
  `start_date_rent` DATE NOT NULL,
  `start_time_rent` TIME NOT NULL,
  `end_date_rent` DATE NOT NULL,
  `end_time_rent` TIME NOT NULL,
  `price_per_day` DECIMAL(18,2) NOT NULL,
  INDEX `fk_Rent_User_idx` (`user_id` ASC),
  INDEX `fk_Rent_Car1_idx` (`car_id` ASC),
  PRIMARY KEY (`user_id`, `car_id`),
  CONSTRAINT `fk_Rent_User`
    FOREIGN KEY (`user_id`)
    REFERENCES `carrental`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rent_Car1`
    FOREIGN KEY (`car_id`)
    REFERENCES `carrental`.`car` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrental`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrental`.`log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `address_ip` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `guest` INT NOT NULL DEFAULT 1 COMMENT '0 = false\n1 = true',
  `page_visited` VARCHAR(45) NOT NULL,
  `user_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_log_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_log_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `carrental`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Donnée initiale - Privilege
-- -----------------------------------------------------
INSERT INTO `carrental`.`privilege` (type) VALUES ('Admin');
INSERT INTO `carrental`.`privilege` (type) VALUES ('Client');


-- -----------------------------------------------------
-- Donnée initiale - Privilege
-- -----------------------------------------------------
INSERT INTO `carrental`.`user` (name, email, password, privilege_id) 
VALUES ('Administrateur', 'admin@carrental', '$2y$10$eyYxszPxCf3T0PMajUY4pOQ6EYDgyIxju24a9KjOl36D/DlGxRJuO', 1);