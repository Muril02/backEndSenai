create database ReservasEquip;
use ReservasEquip;

create table Clientes (
	Id_cliente int primary key auto_increment,
    Nome_cliente varchar(100),
    CPF varchar(20) not null,
    Telefone varchar(20),
    Endereco varchar(100)
);

create table Reserva (
	Id_reserva int primary key auto_increment,
    Cod_reserva varchar(100) not null,
    Data_recebimento date,
    Data_devolucao date,
    Valor_reserva varchar(100),
    Id_cliente int,
    foreign key(Id_cliente) references Clientes(Id_cliente)
);

create table Equipamento (
	Id_equip int primary key auto_increment,
    Nome_equipamento varchar(100),
    Peso decimal,
    Altura decimal,
    Marca varchar(80),
    Id_reserva int,
    foreign key(Id_reserva) references Reserva(Id_reserva)
);

create table Estoque (
	Id_estoque int primary key auto_increment,
    Cod_estoque varchar(100) not null,
    Divisoes varchar(50),
    Responsavel varchar(50),
    Espaco_disp varchar(100)
);

create table Manutencao (
	Id_manuten int primary key auto_increment,
    Cod_manutencao varchar(100),
    Custo decimal,
    Quantidade_equip int,
    Tempo_estimado int
);

create table ClienteReserva (
	Id_clienteReserva int primary key auto_increment,
    Id_cliente int,
    Id_reserva int,
    foreign key(Id_cliente) references Clientes(Id_cliente),
    foreign key(Id_reserva) references Reserva(Id_reserva)
);

create table EquipamentoEstoque (
	Id_equipamentoEstoque int primary key auto_increment,
    Id_equipamento int,
    Id_estoque int,
    foreign key(Id_equipamento) references Equipamento(Id_equip),
    foreign key(Id_estoque) references Estoque(Id_estoque)
);