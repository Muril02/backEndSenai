create database Atividade;
use Atividade;


create table Fornecedor (
	Fcodigo int Primary Key auto_increment,
    Fnome varchar(100),
    Stats varchar(50) default "Ativo",
    Cidade varchar(100)
);

create table Peca (
	Pcodigo int Primary Key auto_increment,
    Pnome varchar(100) not null,
    Cor varchar(50) not null, 
    Peso varchar(100) not null,
    Cidade varchar(100) not null
);

create table Instituicao (
	Icodigo int Primary Key auto_increment,
    Nome varchar(100)
);

create table Projeto (
	PRcodigo int Primary Key auto_increment,
    PRnome varchar(100),
    Cidade varchar(100) , 
    Peso varchar(100) ,
    IdCod int,
    FOreign key (idCod) references Instituicao(Icodigo)
);

create table Fornecimento (
	Pcodigo int Primary Key ,
    Pcod int,
    Quantidade varchar(100),
    PRcod int
);

alter table Fornecedor drop column Cidade;
alter table Instituicao rename to Cidade;
alter table Cidade change Icodigo Ccod int Primary key auto_increment;
alter table Peca change Cidade Ccod int;
alter table Projeto change Cidade Ccod int;

