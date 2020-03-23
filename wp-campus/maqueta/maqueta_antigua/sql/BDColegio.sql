-- elimina la base de datos si ya existe
drop database if exists Colegio;

-- crea la base de datos
create database Colegio;

-- selecciona la base de datos
use Colegio;

-- elimina la tabla usuarios si existe
drop table if exists usuarios;

-- elimina la tabla Profesores si existe
drop table if exists Profesores;

-- creo la tabla profesores
Create table Profesores(
Cod_profe      int(10)       not null primary key auto_increment,
Nom_profe      varchar(35)   not null,
Ape_profe      varchar(35)   not null,
Sex_profe      char(1)       not null,
Fec_nac_profe  date,
Cod_usuario      int(10)
);

/*Profesores */;
Insert Into Profesores (Nom_profe,Ape_profe,Sex_profe,Fec_nac_profe,Cod_usuario) values ('Mario','Bunge','M','1970-06-12',1);
Insert Into Profesores (Nom_profe,Ape_profe,Sex_profe,Fec_nac_profe,Cod_usuario) values ('Abraham','Valdelomar','M','1968-02-09',2);
Insert Into Profesores (Nom_profe,Ape_profe,Sex_profe,Fec_nac_profe,Cod_usuario) values ('Ricardo','Uceda','M','1984-07-16',3);

select * from Profesores;