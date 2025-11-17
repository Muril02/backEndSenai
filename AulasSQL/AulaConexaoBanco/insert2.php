<?php

// Define constants outside the class for better organization and scope
define("DB_HOST", "localhost");
define("DB_PASS", "senaisp");
define("DB_USER", "root");
define("DB_NAME", "livraria");

class Dados{

    private $dbClasse;

    public function __construct(){
        
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if($db->connect_error){
            
            die("Erro de conexão: " . $db->connect_error);
        }
        $this->dbClasse = $db;
    }

    public function inserirDados(){

      
        if (!isset($_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["data_nasc"])) {
            
            echo "Erro: Dados do formulário ausentes (POST).";
            return false; 
        }

        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $data_nasc = $_POST["data_nasc"];

        $query = "INSERT INTO clientes(cpf, email, telefone, data_nascimento) VALUES (?, ?, ?, ?)";
        $operacao = $this->dbClasse->prepare($query);

        if($operacao === false){
            echo "Erro na preparação da consulta: " . $this->dbClasse->error;
            return false;
        }

        $operacao->bind_param("ssss", $cpf, $email, $telefone, $data_nasc);
        
        $resultado = $operacao->execute();

        if($resultado){
            echo "Dados registrados com sucesso!";
        } else{
            echo "Dados não registrados. Erro: " . $operacao->error;
        }

        $operacao->close(); 
        return $resultado;
    }
    

    public function __destruct() {
        if ($this->dbClasse) {
            $this->dbClasse->close();
        }
    }

   
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = new Dados(); 
    $dados->inserirDados(); 
} else {
    // If someone tries to access insert2.php directly without submitting the form
    echo "Acesso inválido. Use o formulário para enviar dados.";
}
