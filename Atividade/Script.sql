create database escola;

create table Aluno (	
	Id_aluno int PRIMARY KEY AUTO_INCREMENT,
	Nome varchar(80),
	CPF int,
    Endereco varchar(150),
    Email varchar(200),
    Data_nasc date
);


create table Professor (	
	Id_professor int PRIMARY KEY AUTO_INCREMENT,
	Nome_professor varchar(80),
	Area_atuacao varchar(100),
    Salario int,
    Data_nasc date
);

insert into Aluno (Nome, CPF, Endereco, Email, Data_nasc) values 
("Marselo", 122365987, 'Rua de nao sei aonde', 'top10emails.com', '2006-09-96'),
("Roberto", 785123697, 'Rua de nao sei o que la', 'china@gmail.com', '1945-04-13'),


select 
