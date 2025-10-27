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


    public function inserirDados($nomeEdit, $endereco, $contato, $telefone, $cidade, $cnpj){

    $query = "INSERT INTO editoras(nome_edit, endereço, contato, telefone, cidade, cnpj) VALUES (?, ?, ?, ?, ?, ?)";
    $operacao = $this->db->prepare($query);
    if($operacao === false){
        return false;
    }

    $operacao->bind_param("ssssss", $nomeEdit, $endereco, $contato, $telefone, $cidade, $cnpj);
    
    $resultado = $operacao->execute();
    return $resultado;
    }
}

$banco = new Dados($db);

$nomeEdit = $_POST["nomeEdit"];
$endereco = $_POST["endereco"];
$contato = $_POST["contato"];
$telefone = $_POST["telefone"];
$cidade = $_POST["cidade"];
$cnpj = $_POST["cnpj"];


$enviar = $banco->inserirDados($nomeEdit, $endereco, $contato, $telefone, $cidade, $cnpj);
if($enviar){
    echo  "Dados registrados";
} else{
    echo "Dados não registrados";
}

$db->close;

