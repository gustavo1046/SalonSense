-- -----------------------------------------------------
-- Table `Aelia`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `nome_administrador` VARCHAR(45) NOT NULL,
  `senha_administrador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  UNIQUE INDEX `nome_administrador_UNIQUE` (`nome_administrador` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(17) NOT NULL,
  `data_ultimo_agendamento` DATE NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendamento` (
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
    REFERENCES `administrador` (`id_administrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agendamento_Cliente1`
    FOREIGN KEY (`Cliente_id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Aelia`.`receita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `receita` (
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
    REFERENCES `administrador` (`id_administrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_Cliente1`
    FOREIGN KEY (`Cliente_id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


