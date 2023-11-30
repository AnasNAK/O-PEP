-- creation database

create database OPEP;

USE OPEP ;

 create table User (
     IdUser int not null auto_increment primary key,
     FirstName varchar(255) not null ,
     LastName varchar(255) not null,
     Email varchar(255) not null UNIQUE,
     Password varchar(255) not null);


 create table Role (
    IdRole int not null auto_increment primary key,
     RoleName varchar(20) );


 alter table User add column RoleId int ;


alter table User add constraint fk_rId_us
     foreign key (RoleId) references Role(IdRole);

insert into role (RoleName) values ('client'),
     ('admin'),
     ('superAdmin'),
     ('blocked');

create table categorie(
     IdCategorie int not null auto_increment primary key,
     CategorieName varchar(20) not null );

 create table Plant(IdPlant int not null auto_increment primary key,
     Name varchar(30) not null ,
     price int not null ,
     image varchar (255) not null ,
     CategorieId int ,
     foreign key (categorieId) references categorie(IdCategorie));


create table Cart (
     IdCart int not null auto_increment primary key,
     PlantId int ,
     UserId int ,
     foreign key (PlantId) references Plant(IdPlant),
     foreign key (UserId) references User(IdUser));


create table Command (
     IdCommand int not null auto_increment primary key ,
     TotalPrice int not null );


alter table command add column PlantId int ;


 alter table command add column UserId int ;


alter table command add constraint `fk_plid` foreign key (PlantId) references Plant(IdPlant);


alter table command add constraint `fk_usid` foreign key (UserId) references User(IdUser);
