
-- -----------------------------------------------------
-- Schema carrent
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carrent` DEFAULT CHARACTER SET utf8mb4 ;
USE `carrent` ;

-- -----------------------------------------------------
-- Table `carrent`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrent`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NULL,
  `driver_license` VARCHAR(45) NOT NULL,
  `expiration_date` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrent`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrent`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrent`.`car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrent`.`car` (
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
    REFERENCES `carrent`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrent`.`rent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrent`.`rent` (
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
    REFERENCES `carrent`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rent_Car1`
    FOREIGN KEY (`car_id`)
    REFERENCES `carrent`.`car` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

