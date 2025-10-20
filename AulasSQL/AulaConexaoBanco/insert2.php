<?php


define("DB_HOST", "localhost");
define("DB_PASS", "senaisp");
define("DB_USER", "root");
define("DB_NAME", "livraria");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db->connection_error){
    echo "Erro de conexão";
}

class Dados{

    private $db;

    public function __construct(){
        $this->db = $db;
    }


    public function inserirDados($cpf, $email, $telefone, $data_nasc){

    $query = "INSERT INTO clientes(cpf, email, telefone, data_nascimento) VALUES (?, ?, ?, ?)";
    $operacao = $this->db->prepare($query);
    if($operacao === false){
        return false;
    }

    $operacao->bind_param("ssss", $cpf, $email, $telefone, $data_nasc);
    
    $resultado = $operacao->execute();
    return $resultado;
    }
}

$banco = new Dados($db);

$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$data_nasc = $_POST["data_nasc"];


$enviar = $banco->inserirDados($cpf, $email, $telefone, $data_nasc);
if($enviar){
    echo  "Dados registrados";
} else{
    echo "Dados não registrados";
}

$db->close;

