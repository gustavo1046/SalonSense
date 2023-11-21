-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Aelia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Aelia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Aelia` DEFAULT CHARACTER SET utf8mb4 ;
USE `Aelia` ;

-- -----------------------------------------------------
-- Table `Aelia`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Aelia`.`Administrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `nome_administrador` VARCHAR(45) NOT NULL,
  `senha_administrador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  UNIQUE INDEX `nome_administrador_UNIQUE` (`nome_administrador` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Aelia`.`Cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(17) NOT NULL,
  `data_ultimo_agendamento` DATE NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`Agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Aelia`.`Agendamento` (
  `id_agendamento` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `hora_inicio` VARCHAR(25) NOT NULL,
  `hora_fim` VARCHAR(25) NOT NULL,
  `data_agendamento` DATE NOT NULL,
  `valor_agendamento` FLOAT NOT NULL,
  `status_agendamento` TINYINT NOT NULL,
  `desc_serviço_agendamento` VARCHAR(45) NOT NULL,
  `forma_pagamento` VARCHAR(45) NOT NULL,
  `Administrador_id_administrador` INT NOT NULL,
  `Cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_agendamento`, `Administrador_id_administrador`, `Cliente_id_cliente`),
  INDEX `fk_Agendamento_Adminsitrador_idx` (`Administrador_id_administrador` ASC) VISIBLE,
  INDEX `fk_Agendamento_Cliente1_idx` (`Cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Agendamento_Adminsitrador`
    FOREIGN KEY (`Administrador_id_administrador`)
    REFERENCES `Aelia`.`Administrador` (`id_administrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agendamento_Cliente1`
    FOREIGN KEY (`Cliente_id_cliente`)
    REFERENCES `Aelia`.`Cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`Receita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Aelia`.`Receita` (
  `id_receita` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `descricao_receita` VARCHAR(200) NOT NULL,
  `Administrador_id_administrador` INT NOT NULL,
  `Cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_receita`),
  INDEX `fk_Receita_Administrador1_idx` (`Administrador_id_administrador` ASC) VISIBLE,
  INDEX `fk_Receita_Cliente1_idx` (`Cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Receita_Administrador1`
    FOREIGN KEY (`Administrador_id_administrador`)
    REFERENCES `Aelia`.`Administrador` (`id_administrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_Cliente1`
    FOREIGN KEY (`Cliente_id_cliente`)
    REFERENCES `Aelia`.`Cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
