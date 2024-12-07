  -- -----------------------------------------------------
  CREATE SCHEMA IF NOT EXISTS `tallermecanico24` DEFAULT CHARACTER SET utf8mb4 ;
  USE `tallermecanico24` ;

  -- -----------------------------------------------------
  -- Table `tallermecanico24`.`personas`
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `tallermecanico24`.`personas` (
    `Idpersonas` INT(11) NOT NULL AUTO_INCREMENT,
    `Nombre` VARCHAR(100) NOT NULL,
    `Telefono` VARCHAR(15) NULL DEFAULT NULL,
    `Direccion` VARCHAR(150) NULL DEFAULT NULL,
    PRIMARY KEY (`Idpersonas`))
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4;

  -- -----------------------------------------------------
  -- Table `tallermecanico24`.`servicios`
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `tallermecanico24`.`servicios` (
    `IdServicio` INT(11) NOT NULL AUTO_INCREMENT,
    `Descripcion` VARCHAR(150) NOT NULL,
    `Precio` DOUBLE NOT NULL,
    PRIMARY KEY (`IdServicio`))
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4;

  -- -----------------------------------------------------
  -- Table `tallermecanico24`.`facturacion`
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `tallermecanico24`.`facturacion` (
    `IdFactura` INT(11) NOT NULL AUTO_INCREMENT,
    `Fecha` DATE NOT NULL,
    `MontoTotal` DOUBLE NOT NULL,
    `IdCliente` INT(11) NOT NULL,
    `IdServicio` INT(11) NOT NULL,
    PRIMARY KEY (`IdFactura`),
    INDEX `fk_facturacion_clientes1_idx` (`IdCliente`),
    INDEX `fk_facturacion_servicios1_idx` (`IdServicio`),
    CONSTRAINT `fk_facturacion_clientes1`
      FOREIGN KEY (`IdCliente`)
      REFERENCES `tallermecanico24`.`personas` (`Idpersonas`)
      ON DELETE RESTRICT
      ON UPDATE CASCADE,
    CONSTRAINT `fk_facturacion_servicios1`
      FOREIGN KEY (`IdServicio`)
      REFERENCES `tallermecanico24`.`servicios` (`IdServicio`)
      ON DELETE RESTRICT
      ON UPDATE CASCADE)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4;

  -- -----------------------------------------------------
  -- Table `tallermecanico24`.`usuarios`
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `tallermecanico24`.`usuarios` (
    `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
    `alias` VARCHAR(255) NULL DEFAULT NULL,
    `idRol` INT(11) NULL DEFAULT NULL,
    PRIMARY KEY (`idUsuario`),
    UNIQUE INDEX `alias` (`alias`))
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4;

  -- -----------------------------------------------------
  -- Table `tallermecanico24`.`vehiculos`
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `tallermecanico24`.`vehiculos` (
    `IdVehiculo` INT(11) NOT NULL AUTO_INCREMENT,
    `fechaingreso` DATE NOT NULL,
    `Placa` VARCHAR(10) NOT NULL,
    `Marca` VARCHAR(50) NULL DEFAULT NULL,
    `Modelo` VARCHAR(50) NULL DEFAULT NULL,
    `Anho` INT(11) NULL DEFAULT NULL,
    `IdCliente` INT(11) NULL DEFAULT NULL,
    `IdServicio` INT(11) NOT NULL,
    PRIMARY KEY (`IdVehiculo`),
    UNIQUE INDEX `Placa` (`Placa`),
    INDEX `IdCliente` (`IdCliente`),
    INDEX `fk_vehiculos_servicios1_idx` (`IdServicio`),
    CONSTRAINT `vehiculos_ibfk_1`
      FOREIGN KEY (`IdCliente`)
      REFERENCES `tallermecanico24`.`personas` (`Idpersonas`)
      ON DELETE CASCADE,
    CONSTRAINT `fk_vehiculos_servicios1`
      FOREIGN KEY (`IdServicio`)
      REFERENCES `tallermecanico24`.`servicios` (`IdServicio`)
      ON DELETE RESTRICT
      ON UPDATE CASCADE)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4;
