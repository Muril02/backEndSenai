<?php

// Garante que o Model seja carregado
require_once __DIR__ . "/../Model/Cliente.php";
// Inclui o DAO que agora gerencia a lógica de DB e usa a ConexaoBanco
require_once __DIR__ . "/../Model/ClienteDAO.php"; 

class ClienteController {

    private $dao;

    public function __construct() {
        // Inicializa o Data Access Object
        $this->dao = new ClienteDAO();
    }

    public function Registrar(Cliente $cliente) {
        return $this->dao->RegistrarCliente($cliente);
    }

    public function Listar() {
        return $this->dao->ListarCliente();
    }

    /**
     * CORREÇÃO ALTERAR: Agora aceita $cpfOriginal para identificação do registro.
     * @param Cliente $cliente O objeto Cliente com os dados atualizados (inclui o novo CPF).
     * @param string $cpfOriginal O CPF original usado para identificar o registro no DB.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function Alterar(Cliente $cliente, $cpfOriginal) {
        // Passa o objeto e a chave original para o DAO.
        return $this->dao->AlterarCliente($cliente, $cpfOriginal);
    }

    public function Excluir($cpf) {
        return $this->dao->ExcluirCliente($cpf);
    }
}