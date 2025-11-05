<?php
require_once __DIR__ . '/../Model/BebidasDAO.php';
require_once __DIR__ . '/../Model/Bebidas.php';

class BebidaController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new BebidasDAO();
    }

    // Lista todas as bebidas
    public function ler() {
        return $this->dao->ListarBebida();
    }

    // Cadastra nova bebida
    public function criar($nome, $categoria, $volume, $valor, $qtde) {

       
        $bebida = new Bebidas( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->AdicionarBebida($bebida);
    }

    // Atualiza bebida existente
    public function atualizar( $nome, $valor, $qtde) {
        $this->dao->atualizarBebida( $nome, $valor, $qtde);
    }

    // Exclui bebida
    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }
}
?>