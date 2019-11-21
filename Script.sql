
-- -----------------------------------------------------
-- Table TIPOUSUARIO
-- -----------------------------------------------------
CREATE TABLE TIPOUSUARIO(
  idTIPOUSUARIO SERIAL PRIMARY KEY,
  descripcion VARCHAR(45) NOT NULL);
-- -----------------------------------------------------
-- Table USUARIO
-- -----------------------------------------------------
CREATE TABLE USUARIO(
  idUSUARIO SERIAL PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  nombreUsuario VARCHAR(45) NOT NULL,
  correo VARCHAR(45) NOT NULL,
  fecha_registro DATE NOT NULL,
  password VARCHAR(41) NOT NULL,
  idTIPOUSUARIO INT NOT NULL REFERENCES TIPOUSUARIO,
  foto varchar(45) NOT NULL,
  estado BOOLEAN NOT NULL);

-- -----------------------------------------------------
-- Table TIPOREPOSITORIO
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `mydb`.`TIPOREPOSITORIO` (
--   `idTIPOREPOSITORIO` INT NOT NULL,
--   `publico` TINYINT NOT NULL,
--   `colaborativo` TINYINT NOT NULL,
--   PRIMARY KEY (`idTIPOREPOSITORIO`),
--   UNIQUE INDEX `idTIPOREPOSITORIO_UNIQUE` (`idTIPOREPOSITORIO` ASC) )
-- ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table GENERO
-- -----------------------------------------------------
CREATE TABLE GENERO (
  idGENERO SERIAL PRIMARY KEY,
  descripcion VARCHAR(50) NOT NULL);

-- -----------------------------------------------------
-- Table REPOSITORIO
-- -----------------------------------------------------
CREATE TABLE REPOSITORIO(
  idREPOSITORIO SERIAL PRIMARY KEY,
  fecha_creacion DATE NULL,
  nombre VARCHAR(45) NOT NULL,
  publico SMALLINT NOT NULL,
  colaborativo SMALLINT NOT NULL,
  descripcion VARCHAR(100) NULL);

-- -----------------------------------------------------
-- Table TIPODESARROLLADOR
-- -----------------------------------------------------
CREATE TABLE TIPODESARROLLADOR(
  idTIPODESARROLLADOR INT PRIMARY KEY,
  descripcion VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table DESARROLLADOR
-- -----------------------------------------------------
CREATE TABLE DESARROLLADOR (
  idCOLABORADOR INT NULL UNIQUE,
  idUSUARIO INT NOT NULL,
  idREPOSITORIO INT NOT NULL,
  idTIPODESARROLLADOR INT NOT NULL,
  estado BOOLEAN NOT NULL,
  CONSTRAINT pk_desarrollador PRIMARY KEY (idUSUARIO, idREPOSITORIO, idTIPODESARROLLADOR),
  CONSTRAINT fk1 FOREIGN KEY(idREPOSITORIO) REFERENCES REPOSITORIO(idREPOSITORIO),
  CONSTRAINT fk2 FOREIGN KEY(idUSUARIO) REFERENCES USUARIO(idUSUARIO),
  CONSTRAINT fk3 FOREIGN KEY(idTIPODESARROLLADOR) REFERENCES TIPODESARROLLADOR(idTIPODESARROLLADOR));

-- -----------------------------------------------------
-- Table PROYECTO
-- -----------------------------------------------------
CREATE TABLE PROYECTO(
  idPROYECTO INT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  idREPOSITORIO INT NOT NULL,
  idGENERO INT REFERENCES GENERO);

-- -----------------------------------------------------
-- Table PISTAS
-- -----------------------------------------------------
CREATE TABLE PISTAS(
  idPISTAS INT  PRIMARY KEY,
  URL VARCHAR(45) NOT NULL,
  idPROYECTO INT NOT NULL REFERENCES PROYECTO);

-- -----------------------------------------------------
-- Table PARTITURAS
-- -----------------------------------------------------
CREATE TABLE PARTITURAS(
  idPARTITURAS INT PRIMARY KEY,
  URL VARCHAR(45) NOT NULL,
  idPROYECTO INT NOT NULL REFERENCES PROYECTO);

-- -----------------------------------------------------
-- Table VENTA
-- -----------------------------------------------------
CREATE TABLE VENTA (
  idVENTA SERIAL PRIMARY KEY,
  SERIE VARCHAR(5) NULL,
  total DECIMAL(10,2) NOT NULL,
  fecha DATE NULL);

-- -----------------------------------------------------
-- Table DETALLE
-- -----------------------------------------------------
CREATE TABLE DETALLE(
  idDETALLE SERIAL NOT NULL,
  idVENTA INT NOT NULL REFERENCES VENTA,
  idPROYECTO INT NOT NULL REFERENCES PROYECTO,
  CONSTRAINT pk_detalle PRIMARY KEY (idDETALLE, idVENTA));

-- -----------------------------------------------------
-- Table TIPOPAGO
-- -----------------------------------------------------
CREATE TABLE TIPOPAGO (
  idTIPOPAGO INT PRIMARY KEY,
  descripcion VARCHAR(45) NULL);

-- -----------------------------------------------------
-- Table PAGO
-- -----------------------------------------------------
CREATE TABLE PAGO (
  idPAGO INT PRIMARY KEY,
  idTIPOPAGO INT NOT NULL REFERENCES TIPOPAGO,
  idVENTA INT NOT NULL REFERENCES VENTA);

-- INSERT SCRIPTS
-- INSERT INTO USUARIO
INSERT INTO `usuario` (`idUSUARIO`, `nombre`, `apellido`, `nombreUsuario`, `correo`, `fecha_registro`, `password`, `TIPOUSUARIO_idTIPOUSUARIO`, `foto`) 
VALUES ('1', 'wer', 'wer', 'wer', 'wer@wer.com', '2019-11-14', SHA1('wer'), '1', NULL);

--INSERT INTO tipo repositorio TABLA ELIMINADA EN EL PROCESO
--INSERT INTO `tiporepositorio` (`idTIPOREPOSITORIO`, `publico`, `colaborativo`) VALUES ('1', '1', '0'), ('2', '1', '1'), ('3', '0', '1');

--INSERT INTO GENEROS MUSICALES
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('1', 'Blues');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('2', 'R&B');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('3', 'Rock and Roll');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('4', 'Gospel');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('5', 'Soul');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('6', 'Rock');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('7', 'Metal');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('8', 'Country');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('9', 'Funk');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('10', 'Disco');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('11', 'House');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('12', 'Techno');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('13', 'Pop');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('14', 'Ska');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('15', 'Reggae');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('16', 'Hip Hop');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('17', 'Drum and Bass');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('18', 'Garage');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('19', 'Flamenco');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('20', 'Salsa');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('21', 'Reggaeton');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('22', 'Música instrumental');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('23', 'Banda sonora');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('24', 'Música pragmática');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('25', 'Música vocal');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('26', 'Jazz');
INSERT INTO `genero` (`idGENERO`, `descripcion`) VALUES ('27', 'Música clásica');

--INSERT INTO TIPO DESARROLLADOR
INSERT INTO `tipodesarrollador` (`idTIPODESARROLLADOR`, `descripcion`) VALUES ('1', 'Owner'), ('2', 'Colaborator');