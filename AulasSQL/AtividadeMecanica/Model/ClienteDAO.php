<?php

// Inclui a classe de conexão
require_once __DIR__ . "/ConexaoBanco.php";

class ClienteDAO{

    private $db;
    
    public function __construct(){
        // Usa o método estático para obter a conexão
        $this->db = ConexaoBanco::getConexao();
    }

    public function RegistrarCliente(Cliente $cliente){
        try {
            $query = "INSERT INTO cliente(Nome, cpf, telefone, cep) VALUES (?, ?, ?, ?) ";
            $result = $this->db->prepare($query);

            $nome = $cliente->getNome(); 
            $cpf = $cliente->getCpf();
            $telefone = $cliente->getTelefone();
            $cep = $cliente->getCep();

            return $result->execute([$nome, $cpf, $telefone, $cep]);
        } catch (PDOException $e) {
            error_log("Erro ao registrar cliente: " . $e->getMessage());
            return false;
        }
    }

    public function ExcluirCliente($cpf){
        try{
            $query = "DELETE FROM cliente WHERE cpf = ?"; 
            $result = $this->db->prepare($query);
            
            // Garante que pelo menos uma linha foi afetada
            return $result->execute([$cpf]) && $result->rowCount() > 0;
        }catch(PDOException $e){
            error_log("Erro ao excluir cliente: " . $e->getMessage());
            return false;
        }
    }

    public function ListarCliente(){
        try {
            // CORREÇÃO DA LISTAGEM: Consulta simplificada (sem ORDER BY) para evitar erros de case-sensitivity ou nome de coluna incorreto.
            $query = "SELECT * FROM cliente";
            
            $result = $this->db->prepare($query);
            $result->execute();
            // Retorna o array associativo dos clientes
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar clientes: " . $e->getMessage());
            return false; // Retorna false em caso de falha
        }
    }

    // ListarClienteCpf mantido sem alterações
    public function ListarClienteCpf($cpf){
        try {
            $query = "SELECT * FROM cliente WHERE cpf = ?";
            $result = $this->db->prepare($query);
            $result->execute([$cpf]);
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar cliente por CPF: " . $e->getMessage());
            return false;
        }
    }

    /**
     * CORREÇÃO ALTERAR: Usa o CPF original como chave de busca.
     * @param Cliente $cliente Objeto com os novos dados (inclui o novo CPF).
     * @param string $cpfOriginal CPF do cliente antes da alteração.
     */
    public function AlterarCliente(Cliente $cliente, $cpfOriginal){
        try {
            // A query SET usa o novo CPF. A query WHERE usa o CPF ORIGINAL ($cpfOriginal).
            $query = "UPDATE cliente SET nome = ?, cpf = ?, telefone = ?, cep = ? WHERE cpf = ?";
            $result = $this->db->prepare($query);

            $nome = $cliente->getNome();
            $cpf = $cliente->getCpf(); // Este é o NOVO CPF
            $telefone = $cliente->getTelefone();
            $cep = $cliente->getCep();
            
            // Ordem: (1) nome, (2) novo cpf, (3) tel, (4) cep, (5) cpf original
            return $result->execute([$nome, $cpf, $telefone, $cep, $cpfOriginal]);
        } catch (PDOException $e) {
            error_log("Erro ao alterar cliente: " . $e->getMessage());
            return false;
        }
    }
}