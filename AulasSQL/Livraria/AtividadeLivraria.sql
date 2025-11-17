CREATE DATABASE Livraria;

use Livraria;

create TABLE Autores(
	id_autor int primary key auto_increment,
    nome varchar(100) not null
);

CREATE TABLE Livros(
	id_livro int primary key auto_increment,
    titulo varchar(100) not null,
    id_autor int not null,
    ano_publicacao varchar(100) not null,
    preco decimal(10, 2) not null
);

CREATE TABLE Clientes(
    id_cliente int primary key auto_increment,
    CPF varchar(20) not null,
    email varchar(100) not null,
    telefone varchar(15) not null,
    data_nascimento date not null
);


CREATE TABLE Editoras(
    id_edit int primary key auto_increment,
    nome_edit varchar(100) not null,
    endereço varchar(100) not null,
    contato varchar(50) not null,
    telefone varchar(20) not null,
    cidade varchar(100) not null,
    cnpj varchar(20)
);


CREATE TABLE Vendas(
    id_vendas int primary key auto_increment,
    data_venda date not null,
    id_cliente int not null,
    id_livro int not null,
    quantidade int not null,
    valor_total decimal(10,2) not null,
    foreign key(id_cliente) REFERENCES Clientes(Id_cliente),
    foreign key(id_livro) REFERENCES Livros(Id_livro)
);

INSERT INTO Autores (nome) VALUES
('J.K. Rowling'),
('George Orwell'),
('J.R.R. Tolkien');

INSERT INTO Livros (titulo, id_autor, ano_publicacao, preco) VALUES
('Harry Potter e a Pedra Filosofal', 1, 1997, 39.90),
('1984', 2, 1949, 29.90),
('O Senhor dos Anéis: A Sociedade do Anel', 3, 1954, 49.90);

INSERT INTO Clientes (CPF, email, telefone, data_nascimento) VALUES
('123.456.789-00', 'cliente1@email.com', '1234-5678', '1990-05-20'),
('987.654.321-00', 'cliente2@email.com', '2345-6789', '1985-08-15'),
('456.123.789-00', 'cliente3@email.com', '3456-7890', '2000-01-10');

INSERT INTO Editoras (nome_edit, endereço, contato, telefone, cidade, cnpj) VALUES
('Editora Abril', 'Av. Paulista, 1000', 'editor@abril.com', '11-1234-5678', 'São Paulo', '12.345.678/0001-90'),
('Companhia das Letras', 'Rua dos Três Irmãos, 200', 'contato@companhiadasletras.com.br', '11-2345-6789', 'São Paulo', '23.456.789/0001-12'),
('Rocco', 'Rua da Liberdade, 300', 'rocco@editorarocco.com', '21-3456-7890', 'Rio de Janeiro', '34.567.890/0001-23');

INSERT INTO Vendas (data_venda, id_cliente, id_livro, quantidade, valor_total) VALUES
('2025-09-01', 1, 1, 1, 39.90),
('2025-09-02', 2, 2, 2, 59.80),
('2025-09-03', 3, 3, 1, 49.90);

drop table livros;
drop table Vendas;

INSERT INTO Livros (titulo, id_autor, ano_publicacao, preco) VALUES
('Harry Potter e a Pedra Filosofal', 1, 1997, 39.90),
('1984', 2, 1949, 29.90),
('O Senhor dos Anéis: A Sociedade do Anel', 3, 1954, 49.90);

insert into Autores(nome) values("Mauricio"), ("Roberto"), ("Gerso"), ("Gibson"), ("Antônoio");
insert into Livros(titulo, id_autor, ano_publicacao, preco) values("Livro nao sei", 1, 1990, 150.99), ("Livro", 5, 2000, 39.86), ("Livro A", 2, 1500, 11.85), ("Livro B", 4, 1988, 50.32), ("Livro C", 3, 2000, 15.96);

-- Quantidade de livros
SELECT Count(Titulo) as Quantidade_livros from Livros;

-- Consulta livros preco e nome
SELECT Titulo FROM Livros WHERE Titulo LIKE "A%" AND Preco > 100;

-- Soma dos vendidos 
SELECT Sum(valor_total) from Vendas;

-- Livro estoque
SELECT Count(Titulo) as Estoque from livros;

-- Apagar livro 5
DELETE FROM livros WHERE id_livro = 5;

-- Alterar tabela livro 
ALTER TABLE Livro add column ano_pub date;
