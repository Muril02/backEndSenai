CREATE DATABASE atividade;
use atividade;

CREATE TABLE alunos(
	id_aluno INT PRIMARY KEY auto_increment,
    nome varchar(100),
    email varchar(100) not null,
    data_nascimento date
);


CREATE TABLE cursos(
	id_curso INT PRIMARY KEY auto_increment,
    titulo varchar(100),
    descricao text,
    carga_horaria INT,
    stats varchar(50) default "Ativo"
);

CREATE TABLE inscricoes(
	id_inscricao INT PRIMARY KEY auto_increment,
    aluno_id INT,
    curso_id INT,
    data_incricao DATE,
    FOREIGN KEY (aluno_id) references alunos(id_aluno),
    FOREIGN KEY (curso_id) references cursos(id_curso)
);


CREATE TABLE avaliacoes(
	id_avalia INT PRIMARY KEY auto_increment,
    inscricao_id INT,
    nota decimal(4,2),
    comentario text,
    FOREIGN KEY (inscricao_id) REFERENCES inscricoes(id_inscricao)
);


insert into alunos(nome, email, data_nascimento) VALUES ("Genoveva", "gen@gmail.com", "2000-06-12"),
("Julio", "jul@gmail.com", "2005-11-14"),
("NAOSEI", "naosei@gmail.com", "1990-07-22"),
("jao", "jao@gmail.com", "1909-04-02");

insert into cursos(titulo, descricao, carga_horaria, stats) VALUES ("Agiotagem", "O curso mais completo de agiotagem do Brasil, com vários recursos técnicos e teorias excelentes.", 2000),
("Jogo do Bicho", "Se torne um profissional do jogo do bicho e aprenda diversas estratégias.", 2600),
("Grau de empilhadeira", "O mais completo do país, com docentes qualificados e prontos para tirar todas as dúvidas dos alunos.", 1600),
("Parkour", "Quebre suas pernas aprendendo este curso e saia feliz!", 600, "Inativo");


INSERT INTO inscricoes (aluno_id, curso_id, data_incricao) VALUES (1, 2, '2025-09-01'), 
(2, 1, '2025-09-02'),
(3, 3, '2025-09-03'),
(4, 2, '2025-09-04'),
(2, 4, '2025-09-05');

INSERT INTO avaliacoes (inscricao_id, nota, comentario) VALUES (1, 9.5, 'Ótimo desempenho'),
(2, 8.0, 'Boa participação'),
(3, 7.3, 'Precisa melhorar em alguns tópicos'),
(4, 6.0, 'Frequência baixa'),
(2, 10.0, 'Excelente!');

-- UPDATES
UPDATE alunos SET email = "emaillegal@gmail.com" where id_aluno = 2;
select * from alunos where id_aluno = 2;

UPDATE cursos SET carga_horaria = 1450 where id_curso = 3;
select * from cursos where id_curso = 3;

UPDATE alunos SET nome = "Nome corrigido" where id_aluno = 1;
SELECT * FROM alunos WHERE id_aluno = 1;

UPDATE cursos SET stats = "Inativo" WHERE id_curso = 2;

UPDATE avaliacoes SET nota = 5.2 WHERE id_avalia = 4;

-- DELETES

DELETE FROM alunos WHERE id_aluno = 4;
DELETE FROM cursos WHERE id_curso = 4;

DELETE FROM avaliacoes WHERE inscricao_id = 4;
DELETE FROM inscricoes WHERE id_inscricao = 5;
DELETE FROM inscricoes WHERE curso_id = 5;

-- CONSULTAS
SELECT * FROM alunos;
SELECT nome, email FROM alunos;
SELECT * FROM cursos WHERE carga_horaria > 30;
SELECT * FROM cursos WHERE stats = "Inativo";
SELECT * FROM alunos WHERE data_nascimento > "1995-12-31";
SELECT * FROM avaliacoes WHERE nota > 9;
SELECT Count(*) as Cursos_cadastrados FROM cursos;
SELECT * FROM cursos order by (carga_horaria)desc limit 3;

-- INDEX
CREATE INDEX idx_email ON alunos (email);
SELECT * FROM alunos;