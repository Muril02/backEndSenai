create database REMOTERC;
use REMOTERC;
select database();


create table produto(
	id int primary key not null auto_increment,
    unidade char(5) not null,
    descricao varchar(30) not null,
    valor_unit decimal(7,2) not null
);

create table vendedor (
	id int primary key auto_increment not null,
    nome varchar(20) not null,
    salario decimal(7,2),
    fsalarial char(1)
);

insert into produto (unidade, descricao, valor_unit) 
values ("Kg", "Fonezão brabo", 263.71), ("Kg", "Luz rgb", 100);

drop table produto;
select * from produto;

update produto
set valor_unit = 236.96
where descricao = "Luz rgb";

update produto
set valor_unit = 236.96, descricao = "Sem ideias"
where id = 2;

update produto
set valor_unit = valor_unit + (valor_unit * 0.1);

insert into vendedor (nome, salario, fsalarial) 
values ("Salame", 1500.63, 2), ("Roberto", 5236.36, 3);

select * from vendedor;

update vendedor 
set salario = 3150
where fsalarial = 1;

update vendedor 
set salario = salario + (salario * .1)
where fsalarial = 2;

update vendedor 
set salario = 3500
where fsalarial = 3;

delete from vendedor 
where salario < 3000;

delete from vendedor;

delete from produtos where id = 2;

delete from produtos where fsalarial >=1 and id <= 1;

truncate table produtos;