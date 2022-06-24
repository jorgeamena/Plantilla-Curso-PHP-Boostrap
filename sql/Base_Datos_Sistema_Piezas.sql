CREATE DATABASE Sistema_Piezas
    DEFAULT CHARACTER SET utf8;

USE Sistema_Piezas;

CREATE TABLE usuarios (
		numsis INT NOT NULL UNIQUE AUTO_INCREMENT,
		nombre VARCHAR(40) NOT NULL,
        identidad INT NOT NULL,
        cargo INT NOT NULL,
        grado INT NOT NULL,
        organo INT NOT NULL,
        unidad INT NOT NULL,
		correo VARCHAR(255) NOT NULL UNIQUE,
		login VARCHAR(10) NOT NULL,
        password VARCHAR(255) NOT NULL,
		fecha_registro DATETIME NOT NULL,
		activo TINYINT NOT NULL,
		PRIMARY KEY(numsis)
        
);

CREATE TABLE cod_grado (
		id INT NOT NULL UNIQUE,
        descrip_terrestre VARCHAR(25),
        descrip_naval VARCHAR(25),
        abr_terr VARCHAR(25),
        abr_nvl VARCHAR(25),
        grupo INT,
		PRIMARY KEY(id)
);

CREATE TABLE piezas (
		numsis INT NOT NULL UNIQUE AUTO_INCREMENT,
		id INT NOT NULL,
        estado VARCHAR(20) NOT NULL,
		fecha_registro DATETIME NOT NULL,
		sello VARCHAR(20) NOT NULL,
		PRIMARY KEY(numsis)
);

CREATE TABLE cod_piezas (
    id INT NOT NULL UNIQUE,
    descrip VARCHAR(255) NOT NULL,
    marca INT,
    modelo VARCHAR(100) NOT NULL,
    grupo INT NOT NULL,
    PRIMARY KEY(id)
    
);

CREATE TABLE cod_componente (
    id INT NOT NULL,
    descrip VARCHAR(255) NOT NULL,
    tipo VARCHAR(50),
    modelo VARCHAR(50),
    PRIMARY KEY(id)
    
);

CREATE TABLE cod_marca (
    id INT NOT NULL,
    descrip VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
    
);

/*CREATE TABLE comentarios (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    entradas_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (entradas_id)
        REFERENCES entradas(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT



);*/