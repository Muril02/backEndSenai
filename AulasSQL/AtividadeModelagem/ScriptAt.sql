create database att;
use att;

create table Produtos (
	Id_produto int primary key,
    Nome_produto varchar(100),
    Valor decimal,
    Descricao text,
    Un_medida varchar(20)
);

create table Estoque (
	Id_estoque int primary key,
    Id_produto int,
    Consumo decimal,
    Quantidade decimal,
    Posicao varchar(100),
    Foreign key (Id_produto) references Produtos(Id_produto)
);

create table Funcionarios (
	Id_func int primary key,
    Nome_func varchar(100),
    Salario decimal,
    CPF varchar(100),
    Endereco varchar(100)
);

create table Pedidos (
	Id_pedido int primary key,
    Num_registro int,
    Hora_compra datetime,
    Valor_pedido decimal,
    Descricao text,
    Id_cliente int,
    Foreign key(Id_cliente) references Cliente(Id_cliente)
);

create table Cliente (
	Id_cliente int primary key,
    Nome_cliente varchar(100),
    Telefone varchar(50),
    Endereco varchar(100),
    CPF varchar(50)
);

drop table pedidos;