<?php
require_once __DIR__ . '/../Model/LivroDAO.php';
require_once __DIR__ . '/../Model/Livro.php';

class LivroController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todas as bebidas
    public function lerLivros() {
        return $this->dao->ListarLivros();
    }

    // Cadastra nova bebida
    public function criar($titulo, $autor, $ano, $genero, $quantidade) {       
        $livro = new Livro( $titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->InserirLivro($livro);
    }

    // Atualiza bebida existente
    public function atualizar( $nomeOriginal,Livro $livro ) {
        $this->dao->AlterarLivro($livro , $nomeOriginal);
    }

    // Exclui bebida
    public function deletar($nome) {
        $this->dao->Excluir($nome);
    }
}
?>