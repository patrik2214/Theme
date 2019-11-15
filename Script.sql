-- MySQL Script generated by MySQL Workbench
-- Wed Nov 13 20:00:47 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`TIPOUSUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TIPOUSUARIO` (
  `idTIPOUSUARIO` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTIPOUSUARIO`),
  UNIQUE INDEX `idTIPOUSUARIO_UNIQUE` (`idTIPOUSUARIO` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`USUARIO` (
  `idUSUARIO` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `nombreUsuario` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `password` VARCHAR(41) NOT NULL,
  `TIPOUSUARIO_idTIPOUSUARIO` INT NOT NULL,
  PRIMARY KEY (`idUSUARIO`, `TIPOUSUARIO_idTIPOUSUARIO`),
  UNIQUE INDEX `idUSUARIO_UNIQUE` (`idUSUARIO` ASC) ,
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC) ,
  UNIQUE INDEX `nombreUsuario_UNIQUE` (`nombreUsuario` ASC) ,
  INDEX `fk_USUARIO_TIPOUSUARIO1_idx` (`TIPOUSUARIO_idTIPOUSUARIO` ASC) ,
  CONSTRAINT `fk_USUARIO_TIPOUSUARIO1`
    FOREIGN KEY (`TIPOUSUARIO_idTIPOUSUARIO`)
    REFERENCES `mydb`.`TIPOUSUARIO` (`idTIPOUSUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE usuario add foto VARCHAR(45) NOT NULL;
-- -----------------------------------------------------
-- Table `mydb`.`TIPOREPOSITORIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TIPOREPOSITORIO` (
  `idTIPOREPOSITORIO` INT NOT NULL,
  `publico` TINYINT NOT NULL,
  `colaborativo` TINYINT NOT NULL,
  PRIMARY KEY (`idTIPOREPOSITORIO`),
  UNIQUE INDEX `idTIPOREPOSITORIO_UNIQUE` (`idTIPOREPOSITORIO` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`GENERO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`GENERO` (
  `idGENERO` BIGINT NOT NULL,
  `descripcion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idGENERO`),
  UNIQUE INDEX `idGENERO_UNIQUE` (`idGENERO` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`REPOSITORIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`REPOSITORIO` (
  `idREPOSITORIO` INT NOT NULL,
  `fecha_creacion` DATE NULL,
  `TIPOREPOSITORIO_idTIPOREPOSITORIO` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `GENERO_idGENERO` BIGINT NOT NULL,
  PRIMARY KEY (`idREPOSITORIO`, `TIPOREPOSITORIO_idTIPOREPOSITORIO`),
  UNIQUE INDEX `idREPOSITORIO_UNIQUE` (`idREPOSITORIO` ASC) ,
  INDEX `fk_REPOSITORIO_TIPOREPOSITORIO1_idx` (`TIPOREPOSITORIO_idTIPOREPOSITORIO` ASC) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) ,
  INDEX `fk_REPOSITORIO_GENERO1_idx` (`GENERO_idGENERO` ASC) ,
  CONSTRAINT `fk_REPOSITORIO_TIPOREPOSITORIO1`
    FOREIGN KEY (`TIPOREPOSITORIO_idTIPOREPOSITORIO`)
    REFERENCES `mydb`.`TIPOREPOSITORIO` (`idTIPOREPOSITORIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TIPODESARROLLADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TIPODESARROLLADOR` (
  `idTIPODESARROLLADOR` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTIPODESARROLLADOR`),
  UNIQUE INDEX `idTIPODESARROLLADOR_UNIQUE` (`idTIPODESARROLLADOR` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DESARROLLADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DESARROLLADOR` (
  `idCOLABORADOR` INT NULL,
  `USUARIO_idUSUARIO` INT NOT NULL,
  `REPOSITORIO_idREPOSITORIO` INT NOT NULL,
  `TIPODESARROLLADOR_idTIPODESARROLLADOR` INT NOT NULL,
  UNIQUE INDEX `idCOLABORADOR_UNIQUE` (`idCOLABORADOR` ASC) ,
  INDEX `fk_DESARROLLADORES_USUARIO1_idx` (`USUARIO_idUSUARIO` ASC) ,
  INDEX `fk_DESARROLLADORES_REPOSITORIO1_idx` (`REPOSITORIO_idREPOSITORIO` ASC) ,
  PRIMARY KEY (`USUARIO_idUSUARIO`, `REPOSITORIO_idREPOSITORIO`, `TIPODESARROLLADOR_idTIPODESARROLLADOR`),
  UNIQUE INDEX `USUARIO_idUSUARIO_UNIQUE` (`USUARIO_idUSUARIO` ASC) ,
  UNIQUE INDEX `REPOSITORIO_idREPOSITORIO_UNIQUE` (`REPOSITORIO_idREPOSITORIO` ASC) ,
  INDEX `fk_DESARROLLADOR_TIPODESARROLLADOR1_idx` (`TIPODESARROLLADOR_idTIPODESARROLLADOR` ASC) ,
  CONSTRAINT `fk_DESARROLLADORES_USUARIO1`
    FOREIGN KEY (`USUARIO_idUSUARIO`)
    REFERENCES `mydb`.`USUARIO` (`idUSUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DESARROLLADORES_REPOSITORIO1`
    FOREIGN KEY (`REPOSITORIO_idREPOSITORIO`)
    REFERENCES `mydb`.`REPOSITORIO` (`idREPOSITORIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DESARROLLADOR_TIPODESARROLLADOR1`
    FOREIGN KEY (`TIPODESARROLLADOR_idTIPODESARROLLADOR`)
    REFERENCES `mydb`.`TIPODESARROLLADOR` (`idTIPODESARROLLADOR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PROYECTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PROYECTO` (
  `idPROYECTO` BIGINT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `REPOSITORIO_idREPOSITORIO` INT NOT NULL,
  `REPOSITORIO_TIPOREPOSITORIO_idTIPOREPOSITORIO` INT NOT NULL,
  PRIMARY KEY (`idPROYECTO`),
  UNIQUE INDEX `idProyecto_UNIQUE` (`idPROYECTO` ASC) ,
  INDEX `fk_PROYECTO_REPOSITORIO1_idx` (`REPOSITORIO_idREPOSITORIO` ASC, `REPOSITORIO_TIPOREPOSITORIO_idTIPOREPOSITORIO` ASC) ,
  CONSTRAINT `fk_PROYECTO_REPOSITORIO1`
    FOREIGN KEY (`REPOSITORIO_idREPOSITORIO` , `REPOSITORIO_TIPOREPOSITORIO_idTIPOREPOSITORIO`)
    REFERENCES `mydb`.`REPOSITORIO` (`idREPOSITORIO` , `TIPOREPOSITORIO_idTIPOREPOSITORIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_REPOSITORIO_GENERO1`
    FOREIGN KEY (`GENERO_idGENERO`)
    REFERENCES `mydb`.`GENERO` (`idGENERO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PISTAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PISTAS` (
  `idPISTAS` INT NOT NULL,
  `URL` VARCHAR(45) NOT NULL,
  `PROYECTO_idPROYECTO` BIGINT NOT NULL,
  PRIMARY KEY (`idPISTAS`),
  UNIQUE INDEX `idPISTAS_UNIQUE` (`idPISTAS` ASC) ,
  INDEX `fk_PISTAS_PROYECTO1_idx` (`PROYECTO_idPROYECTO` ASC) ,
  CONSTRAINT `fk_PISTAS_PROYECTO1`
    FOREIGN KEY (`PROYECTO_idPROYECTO`)
    REFERENCES `mydb`.`PROYECTO` (`idPROYECTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PARTITURAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PARTITURAS` (
  `idPARTITURAS` INT NOT NULL,
  `URL` VARCHAR(45) NOT NULL,
  `PROYECTO_idPROYECTO` BIGINT NOT NULL,
  PRIMARY KEY (`idPARTITURAS`),
  UNIQUE INDEX `idPARTITURAS_UNIQUE` (`idPARTITURAS` ASC) ,
  INDEX `fk_PARTITURAS_PROYECTO1_idx` (`PROYECTO_idPROYECTO` ASC) ,
  CONSTRAINT `fk_PARTITURAS_PROYECTO1`
    FOREIGN KEY (`PROYECTO_idPROYECTO`)
    REFERENCES `mydb`.`PROYECTO` (`idPROYECTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`VENTA` (
  `idVENTA` BIGINT NOT NULL,
  `VENTAcol` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idVENTA`),
  UNIQUE INDEX `idVENTA_UNIQUE` (`idVENTA` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DETALLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DETALLE` (
  `idDETALLE` BIGINT NOT NULL,
  `VENTA_idVENTA` BIGINT NOT NULL,
  `PROYECTO_idPROYECTO` BIGINT NOT NULL,
  PRIMARY KEY (`idDETALLE`, `VENTA_idVENTA`, `PROYECTO_idPROYECTO`),
  UNIQUE INDEX `idDETALLE_UNIQUE` (`idDETALLE` ASC) ,
  INDEX `fk_DETALLE_VENTA1_idx` (`VENTA_idVENTA` ASC) ,
  INDEX `fk_DETALLE_PROYECTO1_idx` (`PROYECTO_idPROYECTO` ASC) ,
  CONSTRAINT `fk_DETALLE_VENTA1`
    FOREIGN KEY (`VENTA_idVENTA`)
    REFERENCES `mydb`.`VENTA` (`idVENTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PROYECTO1`
    FOREIGN KEY (`PROYECTO_idPROYECTO`)
    REFERENCES `mydb`.`PROYECTO` (`idPROYECTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TIPOPAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TIPOPAGO` (
  `idTIPOPAGO` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTIPOPAGO`),
  UNIQUE INDEX `idTIPOPAGO_UNIQUE` (`idTIPOPAGO` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PAGO` (
  `idPAGO` INT NOT NULL,
  `TIPOPAGO_idTIPOPAGO` INT NOT NULL,
  `VENTA_idVENTA` BIGINT NOT NULL,
  PRIMARY KEY (`idPAGO`, `TIPOPAGO_idTIPOPAGO`),
  UNIQUE INDEX `idPAGO_UNIQUE` (`idPAGO` ASC) ,
  INDEX `fk_PAGO_TIPOPAGO1_idx` (`TIPOPAGO_idTIPOPAGO` ASC) ,
  INDEX `fk_PAGO_VENTA1_idx` (`VENTA_idVENTA` ASC) ,
  CONSTRAINT `fk_PAGO_TIPOPAGO1`
    FOREIGN KEY (`TIPOPAGO_idTIPOPAGO`)
    REFERENCES `mydb`.`TIPOPAGO` (`idTIPOPAGO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PAGO_VENTA1`
    FOREIGN KEY (`VENTA_idVENTA`)
    REFERENCES `mydb`.`VENTA` (`idVENTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- INSERT SCRIPTS
INSERT INTO `tiporepositorio` (`idTIPOREPOSITORIO`, `publico`, `colaborativo`) VALUES ('1', '1', '0'), ('2', '1', '1'), ('3', '0', '1');
