<?php

require_once "ConexaoBanco.php";
class LivroDAO{

    private $db;

    public function __construct()
    {
        $this->db = ConexaoBanco::getConexao();
    }

    public function ListarLivros(){
        $query = "SELECT * FROM livros";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Excluir($titulo){
        $query = "DELETE FROM livros WHERE titulo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$titulo]);
    }

    public function InserirLivro(Livro $livro){
        $query = "INSERT INTO livros (titulo, autor, ano, genero, quantidade) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $autor = $livro->getAutor();
        $titulo = $livro->getTitulo();
        $ano = $livro->getAno();
        $genero = $livro->getGen();
        $quantidade = $livro->getQtde();

        $stmt->execute([$titulo, $autor, $ano, $genero, $quantidade]);
    }

    public function AlterarLivro(Livro $livro, $tituloOriginal){
        $query = "UPDATE livros SET titulo = ?, autor = ?, ano = ?, genero = ?, quantidade = ? WHERE titulo = ?";
        $stmt = $this->db->prepare($query);
        $autor = $livro->getAutor();
        $titulo = $livro->getTitulo();
        $ano = $livro->getAno();
        $genero = $livro->getGen();
        $quantidade = $livro->getQtde();

        $stmt->execute([$titulo, $autor, $ano, $genero, $quantidade, $tituloOriginal]);
    }

    public function ListarPorTitulo($titulo){
        $query = "SELECT * FROM livros WHERE titulo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$titulo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}