-- -----------------------------------------------------
-- Schema carRent
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carRent` DEFAULT CHARACTER SET utf8mb4 ;
USE `carRent`;

-- -----------------------------------------------------
-- Table `carRent`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carRent`.`User` (
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
-- Table `carRent`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carRent`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carRent`.`Car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carRent`.`Car` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(45) NOT NULL,
  `brand` VARCHAR(45) NOT NULL,
  `Year` INT NOT NULL,
  `license_plate` VARCHAR(10) NOT NULL,
  `car_mileage` INT NULL,
  `Category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Car_Category1_idx` (`Category_id` ASC),
  CONSTRAINT `fk_Car_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `carRent`.`Category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carRent`.`Rent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carRent`.`Rent` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `User_id` INT NOT NULL,
  `Car_id` INT NOT NULL,
  `start_rent` DATETIME NOT NULL,
  `end_rent` DATETIME NOT NULL,
  `price_per_day` DECIMAL(18,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Rent_User_idx` (`User_id` ASC),
  INDEX `fk_Rent_Car1_idx` (`Car_id` ASC),
  CONSTRAINT `fk_Rent_User`
    FOREIGN KEY (`User_id`)
    REFERENCES `carRent`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rent_Car1`
    FOREIGN KEY (`Car_id`)
    REFERENCES `carRent`.`Car` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
