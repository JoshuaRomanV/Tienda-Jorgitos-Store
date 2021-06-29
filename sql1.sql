drop database t197009actividad;
create database t197009actividad;
use T197009Actividad;
create table usuario(idusuario int not null primary key auto_increment, alias varchar(255) not null default '', pass varchar(255) not null default '', ultcambio datetime not null default now());
insert into usuario(alias, pass) values('juana',md5('loca'));
insert into usuario(alias, pass) values('Mabel',md5('Naomi1')); 
insert into usuario(alias, pass) values('Joshua',md5('Jos123'));
insert into usuario(alias, pass) values('Linda',md5('Flores12'));

select *from usuario;