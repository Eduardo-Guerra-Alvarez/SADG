CREATE DATABASE SADG;

CREATE TABLE empleados(
    id          INT auto_increment,
    nombre      VARCHAR(20),
    apellidos   VARCHAR(30),
    direccion   VARCHAR(50),
    telefono    VARCHAR(10),
    correo      VARCHAR(70),
    password    VARCHAR(30),
    salario     FLOAT,
    rol         VARCHAR(20),
    CONSTRAINT pk_empleados PRIMARY KEY(id)
);

CREATE TABLE clientes(
    id          INT auto_increment,
    nombre      VARCHAR(20),
    apellidos   VARCHAR(30),
    direccion   VARCHAR(50),
    ciudad      VARCHAR(20),
    telefono    VARCHAR(10),
    correo      VARCHAR(70),
    CONSTRAINT pk_clientes PRIMARY KEY(id)
);

CREATE TABLE proyectos(
    id              INT auto_increment,
    nombre          VARCHAR(50),
    fecha_inicio    DATE,
    fecha_final     DATE,
    coste           FLOAT,
    CONSTRAINT pk_proyectos PRIMARY KEY(id)
);