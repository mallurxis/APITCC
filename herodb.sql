-- criando banco de dados
create database dbTCC;
 
-- acessando banco de dados;
use dbTCC;
 
-- criando as tabelas
create table tbAlunos(
codAluno int not null auto_increment,
rmAluno char(5) not null,
nomeAluno varchar (100) not null,
email varchar (100),
senha varchar(10) not null,
modulo char (1),
primary key(codAluno));
 
create table tbProfessores(
codProf int not null auto_increment,
nomeProf varchar (100) not null,
emailProf varchar(100),
senha varchar(10) not null,
primary key(codProf));

create table tbProdutos(
codProd int not null auto_increment,
nomeProd varchar(100) not null,
quant char(3),
mult decimal (9,2),
valorProd decimal(9,2),
validade date,
dataEntrada date,
primary key(codProd));

create table tbPratos(
codPrato int not null auto_increment,
nomePrato varchar(100) not null,
precoPrato decimal (9,2),
pesoPrato decimal(9,2),
codProd int not null,
primary key(codPrato),
foreign key(codProd)references tbProdutos(codProd));

create table tbCardapio(
codCardapio int not null auto_increment,
semana date,
nomePrato varchar(100) not null,
nomeProduto varchar(100) not null,
precoPrato decimal(9,2),
codAluno int not null,
codProf int not null,
codPrato int not null,
primary key(codCardapio),
foreign key(codAluno) references tbAlunos(codAluno),
foreign key(codProf) references tbProfessores(codProf),
foreign key(codPrato) references tbPratos(codPrato));




)
 
