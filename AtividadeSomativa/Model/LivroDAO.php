<?php

require_once "ConexaoBanco.php";
class LivroDAO{

    private $db;

    public function __construct()
    {
        $this->db = ConexaoBanco::getConexao();

           $this->db->exec("
            CREATE TABLE IF NOT EXISTS livros(
            id INT AUTO_INCREMENT PRIMARY KEY,
            Titulo VARCHAR(100) NOT NULL,
            Autor VARCHAR(100) NOT NULL,
            Ano int NOT NULL,
            Genero varchar(100) NOT NULL,
            Qtde INT NOT NULL);
                                ");
    }

 

    public function ListarLivros(){
        $query = "SELECT * FROM livros";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Excluir($id){
        $query = "DELETE FROM livros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
    }

    public function InserirLivro(Livro $livro){
        $query = "INSERT INTO livros (Titulo, Autor, Ano, Genero, Qtde) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $autor = trim($livro->getAutor());
        $titulo = trim($livro->getTitulo());
        $ano = trim($livro->getAno());
        $genero = trim($livro->getGen());
        $quantidade = trim($livro->getQtde());

        $stmt->execute([$titulo, $autor, $ano, $genero, $quantidade]);
    }

    public function AlterarLivro(Livro $livro, $id){
        $query = "UPDATE livros SET Titulo = ?, Autor = ?, Ano = ?, Genero = ?, Qtde = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $autor = trim($livro->getAutor());
        $titulo = trim($livro->getTitulo());
        $ano = trim($livro->getAno());
        $genero = trim($livro->getGen());
        $quantidade = trim($livro->getQtde());

        $stmt->execute([$titulo, $autor, $ano, $genero, $quantidade, $id]);
    }

    public function ListarPorId($id){
        $query = "SELECT * FROM livros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}