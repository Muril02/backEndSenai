create database Pizzaria;
use Pizzaria;

create table Cliente (
	Id_cliente int PRIMARY KEY auto_increment,
    Nome varchar(100),
	Email varchar(100),
    Endereco varchar(100),
    Telefone varchar(50)
);


create table Pedido(
	Id_pedido int PRIMARY KEY auto_increment,
    Nome_cliente varchar(100),
	Tipo_pedido varchar(50),
    Itens_pedido varchar(255),
    Forma_pag varchar(50)
);

create table Pizzas (
	Id_pizzas int PRIMARY KEY auto_increment,
    Nome_pizza varchar(100),
	Descricao varchar(100),
    Preco int,
    Foto varchar(200)
);

create table Estoque (
	Id_estoque int PRIMARY KEY auto_increment,
    Nome_produto varchar(100),
	Quantidade varchar(100),
    Data_entrega date
);



select * from Estoque;
select Nome_produto, Quantidade, Data_entrega from Estoque;


alter table Estoque modify column Quantidade int;


insert into Estoque (Nome_produto, Quantidade, Data_entrega) values
("Salame", 100, '2025-06-30'), ("Queijo", 2596, '2025-11-09');
