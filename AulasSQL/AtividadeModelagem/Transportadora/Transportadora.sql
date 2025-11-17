create database transportadora;
use transportadora;

create table Motoristas (
	Id_motorista int primary key,
    Nome_motorista varchar(100),
    Salario decimal,
    CNH varchar(100)
);

create table Veiculos (
	Id_veiculo int primary key,
    Modelo varchar(100),
    Peso decimal,
    Fabricante varchar(100)
);


create table Produtos (
	Id_produtos int primary key,
    Nome_produto varchar(100),
    Descricao text,
    Peso varchar(30)
);


create table Pedido(
	Id_pedido int primary key,
    Num_registro int,
    Descrocao text,
    Distancia decimal,
    Id_veiculo int,
    Id_motorista int,
    Foreign key (Id_veiculo) references Veiculos(Id_veiculo),
    foreign key (Id_motorista) references Motoristas(Id_motorista)
);

create table Rastreamento(
	Id_rastreamento int primary key,
    Num_rastreamento int,
    Data_saida datetime,
    Previsao_chegada date
);

