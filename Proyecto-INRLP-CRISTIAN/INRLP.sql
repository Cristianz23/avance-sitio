CREATE DATABASE Instituto_Rigoberto;
use Instituto_Rigoberto;

create table users(
iduser int primary key auto_increment not null, 
nombre varchar(100),
email varchar(250),
contrasena varchar(500),
tipouser varchar(500)
);

INSERT INTO users(nombre, email, contrasena, tipouser) VALUES ("Cristian", "cristian@admin.com", "admin", "administrador");

create table docentes (
idDocente int primary key auto_increment not null, 
nombre varchar (250), 
telefono int(11)
);

create table estudiante (
idEstudiante int primary key auto_increment not null, 
nombre varchar (250), 
telefono int(11),
curso varchar(250)
);

create table cursos (
idCursos int primary key auto_increment not null, 
curso varchar (250)
);

create table clases (
idClases int primary key auto_increment not null, 
clase varchar (250)
);

create table docente_curso(
id int primary key auto_increment not null, 
docente_id int, 
curso_id int, 
fecha date, 
constraint pk_docente_id foreign key (docente_id) references docentes(idDocente) on update cascade on delete cascade, 
constraint pk_curso_id foreign key (curso_id) references cursos(idCursos) on update cascade on delete cascade
);

create table estudiante_clase(
id int primary key auto_increment not null, 
estudiante_id int, 
clase_id int, 
fecha date, 
constraint pk_estudiante_id foreign key (estudiante_id) references estudiante(idEstudiante) on update cascade on delete cascade, 
constraint pk_clase_id foreign key (clase_id) references clases(idClases) on update cascade on delete cascade
);