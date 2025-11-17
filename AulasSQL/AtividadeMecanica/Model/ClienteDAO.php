<?php

// Inclui a classe de conexão
require_once __DIR__ . "/ConexaoBanco.php";
// OBS: O Model/Cliente.php deve ser incluído no Controller/View

class ClienteDAO{

    private $db;
    
    public function __construct(){
        // Usa o método estático para obter a conexão
        $this->db = ConexaoBanco::getConexao();
    }

    public function RegistrarCliente(Cliente $cliente){
        try {
            // NOTE: Certifique-se que o nome da tabela no seu DB é 'cliente', não 'clientes'
            $query = "INSERT INTO cliente(Nome, cpf, telefone, cep) VALUES (?, ?, ?, ?) ";
            $result = $this->db->prepare($query);

            $nome = $cliente->getNome(); // Usando a propriedade pública do Model
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
            
            return $result->execute([$cpf]) && $result->rowCount() > 0;
        }catch(PDOException $e){
            error_log("Erro ao excluir cliente: " . $e->getMessage());
            return false;
        }
    }

    public function ListarCliente(){
        try {
            // Esta é a função crítica para a listagem na View
            $query = "SELECT * FROM cliente ORDER BY nome ASC";
            $result = $this->db->prepare($query);
            $result->execute();
            // Retorna o array associativo dos clientes
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar clientes: " . $e->getMessage());
            return false; // Retorna false em caso de falha de conexão/consulta
        }
    }

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

    public function AlterarCliente(Cliente $cliente){
        try {
            // NOTE: O CPF é passado duas vezes: uma para o SET e outra para o WHERE
            $query = "UPDATE cliente SET nome = ?, cpf = ?, telefone = ?, cep = ? WHERE cpf = ?";
            $result = $this->db->prepare($query);

            $nome = $cliente->getNome();
            $cpf = $cliente->getCpf();
            $telefone = $cliente->getTelefone();
            $cep = $cliente->getCep();
            
            return $result->execute([$nome, $cpf, $telefone, $cep, $cpf]);
        } catch (PDOException $e) {
            error_log("Erro ao alterar cliente: " . $e->getMessage());
            return false;
        }
    }
}