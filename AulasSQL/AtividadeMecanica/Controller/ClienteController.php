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

    /**
     * Registra um novo cliente.
     * @param Cliente $cliente O objeto Cliente a ser registrado.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function Registrar(Cliente $cliente) {
        return $this->dao->RegistrarCliente($cliente);
    }

    /**
     * Lista todos os clientes do banco de dados.
     * @return array|false Retorna um array associativo dos clientes ou false em caso de erro.
     */
    public function Listar() {
        // Simplesmente chama o método do DAO.
        return $this->dao->ListarCliente();
    }

    /**
     * Altera os dados de um cliente existente usando o CPF como chave.
     * @param Cliente $cliente O objeto Cliente com os dados atualizados.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function Alterar(Cliente $cliente) {
        return $this->dao->AlterarCliente($cliente);
    }

    /**
     * Exclui um cliente pelo CPF.
     * @param string $cpf O CPF do cliente a ser excluído.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function Excluir($cpf) {
        return $this->dao->ExcluirCliente($cpf);
    }
}