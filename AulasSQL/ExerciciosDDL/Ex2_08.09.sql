create database Biblioteca;
use biblioteca;

create table Livros (
	idL int primary key auto_increment,
    NomeL varchar(100),
    dataLanca date
);

create table Autores (
	idA int primary key auto_increment,
    NomeA varchar(100)
);

alter table Livros add column IdAut int;
alter table livros add constraint IdAut foreign key (IdAut) references Autores(IdA);
alter table Livros add column Genero varchar(100);

insert into Livros (NomeL, dataLanca, genero) values 
("LivrosBom", "1995-05-25", "Terror"), ("LivroRuim", "2024-01-12", "Comédia");

insert into Autores (NomeA) values 
("Rodolfo"), ("Mauricio");

update Livros 
set IdAut = 1
where genero = "Terror";

update Livros 
set IdAut = 2
where genero = "Comédia";

select * from livros;

delete from livros;
delete from autores;
