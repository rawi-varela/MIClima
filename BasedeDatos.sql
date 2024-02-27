-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema miclima
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema miclima
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `miclima` DEFAULT CHARACTER SET utf8 ;
USE `miclima` ;

-- -----------------------------------------------------
-- Table `miclima`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`propiedades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombrePropiedad` VARCHAR(95) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`administrador` (
  `id` VARCHAR(45) NOT NULL,
  `nombreAnfitrion` VARCHAR(65) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `propiedades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_administrador_propiedades1_idx` (`propiedades_id` ASC) VISIBLE,
  CONSTRAINT `fk_administrador_propiedades1`
    FOREIGN KEY (`propiedades_id`)
    REFERENCES `miclima`.`propiedades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`departamentos` (
  `id` VARCHAR(35) NOT NULL,
  `nombreDepartamento` VARCHAR(45) NOT NULL,
  `cantidad` INT NOT NULL,
  `propiedades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_departamentos_propiedades_idx` (`propiedades_id` ASC) VISIBLE,
  CONSTRAINT `fk_departamentos_propiedades`
    FOREIGN KEY (`propiedades_id`)
    REFERENCES `miclima`.`propiedades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`edades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`edades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `edad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`generos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`antiguedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`antiguedades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `antiguedad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`tipoPuestos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`tipoPuestos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipoPuesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`preguntas` (
  `id` INT NOT NULL,
  `pregunta` VARCHAR(255) NOT NULL,
  `esperado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`periodos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`periodos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `periodo` VARCHAR(45) NOT NULL,
  `propiedades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_periodos_propiedades1_idx` (`propiedades_id` ASC) VISIBLE,
  CONSTRAINT `fk_periodos_propiedades1`
    FOREIGN KEY (`propiedades_id`)
    REFERENCES `miclima`.`propiedades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`resultados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`resultados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(45) NOT NULL,
  `edad` VARCHAR(40) NOT NULL,
  `tipoPuesto` VARCHAR(45) NOT NULL,
  `antiguedad` VARCHAR(40) NOT NULL,
  `p1` VARCHAR(30) NOT NULL,
  `p2` VARCHAR(30) NOT NULL,
  `p3` VARCHAR(30) NOT NULL,
  `p4` VARCHAR(30) NOT NULL,
  `p5` VARCHAR(30) NOT NULL,
  `p6` VARCHAR(30) NOT NULL,
  `p7` VARCHAR(30) NOT NULL,
  `p8` VARCHAR(30) NOT NULL,
  `p9` VARCHAR(30) NOT NULL,
  `p10` VARCHAR(30) NOT NULL,
  `p11` VARCHAR(30) NOT NULL,
  `p12` VARCHAR(30) NOT NULL,
  `departamentos_id` VARCHAR(35) NOT NULL,
  `periodos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_resultados_departamentos1_idx` (`departamentos_id` ASC) VISIBLE,
  INDEX `fk_resultados_periodos1_idx` (`periodos_id` ASC) VISIBLE,
  CONSTRAINT `fk_resultados_departamentos1`
    FOREIGN KEY (`departamentos_id`)
    REFERENCES `miclima`.`departamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultados_periodos1`
    FOREIGN KEY (`periodos_id`)
    REFERENCES `miclima`.`periodos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`master`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`master` (
  `id` VARCHAR(30) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `superUsuario` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`globales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`globales` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `porcentaje` DOUBLE NOT NULL,
  `cp1` DOUBLE NULL,
  `cp2` DOUBLE NULL,
  `cp3` DOUBLE NULL,
  `cp4` DOUBLE NULL,
  `cp5` DOUBLE NULL,
  `cp6` DOUBLE NULL,
  `cp7` DOUBLE NULL,
  `cp8` DOUBLE NULL,
  `cp9` DOUBLE NULL,
  `cp10` DOUBLE NULL,
  `cp11` DOUBLE NULL,
  `cp12` DOUBLE NULL,
  `periodos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_globales_periodos1_idx` (`periodos_id` ASC) VISIBLE,
  CONSTRAINT `fk_globales_periodos1`
    FOREIGN KEY (`periodos_id`)
    REFERENCES `miclima`.`periodos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miclima`.`resultadosDeptos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miclima`.`resultadosDeptos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cp1` DOUBLE NULL,
  `cp2` DOUBLE NULL,
  `cp3` DOUBLE NULL,
  `cp4` DOUBLE NULL,
  `cp5` DOUBLE NULL,
  `cp6` DOUBLE NULL,
  `cp7` DOUBLE NULL,
  `cp8` DOUBLE NULL,
  `cp9` DOUBLE NULL,
  `cp10` DOUBLE NULL,
  `cp11` DOUBLE NULL,
  `cp12` DOUBLE NULL,
  `departamentos_id` VARCHAR(35) NOT NULL,
  `periodos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_resultadosDeptos_periodos1_idx` (`periodos_id` ASC) VISIBLE,
  INDEX `fk_resultadosDeptos_departamentos1_idx` (`departamentos_id` ASC) VISIBLE,
  CONSTRAINT `fk_resultadosDeptos_periodos1`
    FOREIGN KEY (`periodos_id`)
    REFERENCES `miclima`.`periodos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultadosDeptos_departamentos1`
    FOREIGN KEY (`departamentos_id`)
    REFERENCES `miclima`.`departamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `miclima`.`propiedades`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`propiedades` (`id`, `nombrePropiedad`) VALUES (1, 'Palacio Mundo Imeprial');
INSERT INTO `miclima`.`propiedades` (`id`, `nombrePropiedad`) VALUES (2, 'Princess Mundo Imperial');
INSERT INTO `miclima`.`propiedades` (`id`, `nombrePropiedad`) VALUES (3, 'Pierre Mundo Imperial');
INSERT INTO `miclima`.`propiedades` (`id`, `nombrePropiedad`) VALUES (4, 'Wayam Mundo Imperial');
INSERT INTO `miclima`.`propiedades` (`id`, `nombrePropiedad`) VALUES (5, 'Xixim Mundo Imperial');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`administrador`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`administrador` (`id`, `nombreAnfitrion`, `contraseña`, `propiedades_id`) VALUES ('VALR011220IL8', 'Vicente del Castillo', '12345', 1);
INSERT INTO `miclima`.`administrador` (`id`, `nombreAnfitrion`, `contraseña`, `propiedades_id`) VALUES ('RAWI', 'Rawi Varela ', '2222', 2);
INSERT INTO `miclima`.`administrador` (`id`, `nombreAnfitrion`, `contraseña`, `propiedades_id`) VALUES ('KARLA', 'Karla Gallardo', '3333', 3);
INSERT INTO `miclima`.`administrador` (`id`, `nombreAnfitrion`, `contraseña`, `propiedades_id`) VALUES ('ANDREA', 'Andrea Salmeron', '4444', 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`departamentos`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0001', 'Gerencia', 5, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0002', 'Contraloría', 10, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0003', 'Ama de Llaves', 5, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0004', 'Mantenimiento', 15, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0005', 'Recepción', 20, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0006', 'Barra', 10, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0007', 'Servicio', 5, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('WAYA 0008', 'Cocina', 15, 4);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('PALA 0001', 'Tecnología', 5, 1);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('PIER 0001', 'Terreza', 5, 3);
INSERT INTO `miclima`.`departamentos` (`id`, `nombreDepartamento`, `cantidad`, `propiedades_id`) VALUES ('PRIN 0001', 'Golf', 5, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`edades`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (1, 'Menos de 20 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (2, '20-24 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (3, '25-29 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (4, '30-34 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (5, '35-39 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (6, '40-44 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (7, '45-49 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (8, '50-54 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (9, '55-59 años');
INSERT INTO `miclima`.`edades` (`id`, `edad`) VALUES (10, 'Más de 59 años');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`generos`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`generos` (`id`, `genero`) VALUES (1, 'Masculino');
INSERT INTO `miclima`.`generos` (`id`, `genero`) VALUES (2, 'Femenino');
INSERT INTO `miclima`.`generos` (`id`, `genero`) VALUES (3, 'Prefiero no decirlo');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`antiguedades`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (1, 'Menos de 1 año');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (2, '1 año');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (3, '2 años');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (4, '3 años');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (5, '4 años');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (6, '5 años');
INSERT INTO `miclima`.`antiguedades` (`id`, `antiguedad`) VALUES (7, 'Más de 5 años');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`tipoPuestos`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`tipoPuestos` (`id`, `tipoPuesto`) VALUES (1, 'Anfitrión de Línea');
INSERT INTO `miclima`.`tipoPuestos` (`id`, `tipoPuesto`) VALUES (2, 'Supervisor/Jefe/Coordinador');
INSERT INTO `miclima`.`tipoPuestos` (`id`, `tipoPuesto`) VALUES (3, 'Gerente/Director');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`preguntas`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (1, 'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno.', 'No');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (2, 'Tengo las herramientas / equipo / utensilios de trabajo necesarios para poder realizar mi trabajo adecuadamente.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (3, 'Considero que en mi trabajo me piden hacer cosas innecesarias.', 'No');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (4, 'La comunicación que tiene mi líder inmediato conmigo es clara y respetuosa.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (5, 'Mi líder inmediato me provee los conocimientos y el entrenamiento que requiero para realizar mi trabajo adecuadamente.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (6, 'Aquí la gente es tratada justamente.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (7, 'Las áreas con quién tengo contacto me hacen solicitudes de manera clara y respetuosa.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (8, 'Mi líder inmediato reconoce el trabajo bien hecho y el esfuerzo extra.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (9, 'Mi opinión es escuchada.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (10, 'La orientación que me da mi líder inmediato me ayuda a realizar mejor mi trabajo.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (11, 'Los líderes de esta propiedad toman decisiones que me ayudan a realizar mejor mi trabajo.', 'Sí');
INSERT INTO `miclima`.`preguntas` (`id`, `pregunta`, `esperado`) VALUES (12, 'Considero que WAYAM Mundo Imperial es un buen lugar para trabajar.', 'Sí');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`periodos`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`periodos` (`id`, `periodo`, `propiedades_id`) VALUES (1, 'Diciembre 2021', 4);
INSERT INTO `miclima`.`periodos` (`id`, `periodo`, `propiedades_id`) VALUES (2, 'Julio 2022', 4);
INSERT INTO `miclima`.`periodos` (`id`, `periodo`, `propiedades_id`) VALUES (3, 'Enero 2023', 4);
INSERT INTO `miclima`.`periodos` (`id`, `periodo`, `propiedades_id`) VALUES (4, 'Febrero 2024', 4);
INSERT INTO `miclima`.`periodos` (`id`, `periodo`, `propiedades_id`) VALUES (5, 'Junio 2024', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`resultados`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (1, 'Masculino', '20-24 años', 'Supervisor/Jefe/Coordinador', '1 año', 'Positivo', 'Positivo', 'Positivo', 'Neutro', 'Positivo', 'Neutro', 'Negativo', 'Negativo', 'Negativo', 'Negativo', 'Negativo', 'Neutro', 'WAYA 0007', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (2, 'Masculino', '25-29 años', 'Supervisor/Jefe/Coordinador', '1 año', 'Negativo', 'Neutro', 'Positivo', 'Positivo', 'Negativo', 'Negativo', 'Negativo', 'Neutro', 'Positivo', 'Positivo', 'Positivo', 'Negativo', 'WAYA 0007', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (3, 'Femenino', '40-44 años', 'Anfitrión de Línea', '1 año', 'Neutro', 'Negativo', 'Negativo', 'Neutro', 'Positivo', 'Neutro', 'Negativo', 'Neutro', 'Negativo', 'Neutro', 'Positivo', 'Negativo', 'WAYA 0008', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (4, 'Femenino', '30-34 años', 'Gerente/Director', '2 años', 'Positivo', 'Neutro', 'Neutro', 'Negativo', 'Neutro', 'Negativo', 'Neutro', 'Neutro', 'Neutro', 'Negativo', 'Negativo', 'Neutro', 'WAYA 0001', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (5, 'Prefiero no decirlo', '40-44 años', 'Anfitrión de Línea', 'Menos de 1 año', 'Positivo', 'Positivo', 'Neutro', 'Negativo', 'Neutro', 'Neutro', 'Negativo', 'Neutro', 'Negativo', 'Neutro', 'Positivo', 'Positivo', 'WAYA 0001', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (6, 'Masculino', '20-24 años', 'Anfitrión de Línea', '2 años', 'Negativo', 'Negativo', 'Negativo', 'Neutro', 'Neutro', 'Negativo', 'Negativo', 'Neutro', 'Positivo', 'Positivo', 'Neutro', 'Negativo', 'WAYA 0002', 4);
INSERT INTO `miclima`.`resultados` (`id`, `genero`, `edad`, `tipoPuesto`, `antiguedad`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `departamentos_id`, `periodos_id`) VALUES (7, 'Prefiero no decirlo', 'Menos de 20 años', 'Anfitrión de Línea', 'Menos de 1 año', 'Positivo', 'Positivo', 'Neutro', 'Neutro', 'Negativo', 'Neutro', 'Positivo', 'Neutro', 'Positivo', 'Negativo', 'Negativo', 'Positivo', 'WAYA 0002', 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`master`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`master` (`id`, `contraseña`, `superUsuario`) VALUES ('ADMIN', 'ADMIN', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`globales`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`globales` (`id`, `cantidad`, `porcentaje`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `periodos_id`) VALUES (1, 41, 62.4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `miclima`.`globales` (`id`, `cantidad`, `porcentaje`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `periodos_id`) VALUES (2, 47, 76.5, 56.5, 76.1, 90.5, 82.2, 87.0, 68.2, 78.7, 74.4, 77.3, 77.8, 62.5, 86.5, 2);
INSERT INTO `miclima`.`globales` (`id`, `cantidad`, `porcentaje`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `periodos_id`) VALUES (3, 50, 80.1, 62, 86, 94, 90, 82, 72, 84, 84, 80, 82, 64, 82, 3);
INSERT INTO `miclima`.`globales` (`id`, `cantidad`, `porcentaje`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `periodos_id`) VALUES (4, 5, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 4);
INSERT INTO `miclima`.`globales` (`id`, `cantidad`, `porcentaje`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `periodos_id`) VALUES (5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `miclima`.`resultadosDeptos`
-- -----------------------------------------------------
START TRANSACTION;
USE `miclima`;
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (1, 71, 100, 100, 100, 100, 100, 86, 86, 100, 100, 100, 100, 'WAYA 0001', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (2, 50, 100, 100, 100, 100, 50, 50, 50, 100, 100, 25, 75, 'WAYA 0002', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (3, 80, 80, 100, 80, 80, 60, 80, 80, 40, 80, 60, 100, 'WAYA 0003', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (4, 33.3, 100, 33, 100, 100, 100, 100, 100, 100, 100, 67, 67, 'WAYA 0004', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (5, 42.9, 86, 100, 86, 86, 57, 100, 100, 43, 71, 43, 86, 'WAYA 0005', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (6, 50, 75, 100, 100, 100, 100, 100, 100, 100, 100, 100, 75, 'WAYA 0006', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (7, 85.7, 86, 100, 100, 86, 57, 86, 86, 100, 86, 86, 100, 'WAYA 0007', 3);
INSERT INTO `miclima`.`resultadosDeptos` (`id`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp7`, `cp8`, `cp9`, `cp10`, `cp11`, `cp12`, `departamentos_id`, `periodos_id`) VALUES (8, 50, 70, 90, 70, 40, 60, 70, 70, 70, 50, 30, 50, 'WAYA 0008', 3);

COMMIT;

