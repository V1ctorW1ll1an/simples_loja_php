create database Loja character set utf8mb4 collate utf8mb4_bin;

use Loja;

create table client(
	codigo int auto_increment primary key,
	primeiroNome varchar(100),
	segundoNome varchar(100),
	dataNasci date,
	cpf varchar(15) unique,
	rg varchar(15) unique,
	endereco varchar(200),
	cep varchar(15),
	cidade varchar(100),
	fone varchar(20)
);

create table vendas(
	codigo int auto_increment primary key,
	codigoCliente int,
	valorParcial decimal(10,2),
	valorDesconto decimal(10,2),
	valorAcrescimo decimal(10,2),
	valorTotal decimal(20,2),
	data date,
	foreign key (codigoCliente) references client(codigo) 
);
