create database BDPROYECT;
use BDPROYECT;
create table cascos(
id int primary key,
marca varchar(60),
modelo varchar(60),
tipo varchar(60),
certificado varchar(50),
descripcion varchar(300),
pecio_aprox int,
imagen blob,
fecha_registro date
);
create table accidentes(
id int primary key,
fecha date,
lugar varchar (100),
descripcion varchar(300),
causa varchar(100),
lesionados int,
uso_casco bool,
nivel_gravedad varchar(30),
imagen_evidencia blob
);
create table preguntas_frecuentes(
id int primary key,
pregunta varchar(200),
respuesta varchar(200),
categoria varchar(60),
orden int
);