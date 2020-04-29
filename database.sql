CREATE DATABASE SADG;

CREATE TABLE trabajadores(
    id          INT auto_increment,
    nombre      VARCHAR(20) NOT NULL,
    apellidos   VARCHAR(30) NOT NULL,
    direccion   VARCHAR(50) NOT NULL,
    telefono    VARCHAR(10),
    correo      VARCHAR(70) UNIQUE NOT NULL,
    password    VARCHAR(255) NOT NULL,
    salario     FLOAT NOT NULL,
    rol         VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE clientes(
    id          INT auto_increment,
    nombre      VARCHAR(20) NOT NULL,
    apellidos   VARCHAR(30) NOT NULL,
    direccion   VARCHAR(50) NOT NULL,
    ciudad      VARCHAR(20) NOT NULL,
    telefono    VARCHAR(10),
    correo      VARCHAR(70),
    PRIMARY KEY (id)
);

CREATE TABLE proyectos(
    id              INT auto_increment
    id_cliente      INT,
    nombre          VARCHAR(50) NOT NULL,
    fecha_inicio    DATE NOT NULL,
    fecha_final     DATE,
    coste           FLOAT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cliente) REFERENCES clientes (id)
);