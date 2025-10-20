<?php


// $nome = $_POST["nome"];
// $email = $_POST["email"];

// $connect = mysqli("localhost", "root", "senaisp", "livraria");

// if($connect->connection_error){
//     die("Erro na conexão", $connect->connection_error);
// }


// $sql = "INSERT INTO usuarios(nome, email) VALUES ("$nome", "$email")";

// if($connect->query($sql) === true){
//     echo "Dados salvos!";
// }else{
//     "Erro: " $connect->error;
// }

// exit;
// $connect->close();


// Define connection constants (good practice)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senaisp');
define('DB_NAME', 'livraria');

// Create the connection object
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check for connection error
if ($db->connect_error) {
    die("Erro de conexão: " . $db->connect_error);
}


class CRUD{

    private $db;

    public function __construct(mysqli $valorDb){
        $this->db = $valorDb;
    }


    public function enviarBanco($nome, $email){
        $query = "INSERT INTO usuario(nome, email) VALUES (? , ? )";
        $state = $this->db->prepare($query);
        if($state === false){
            return false;
        }

        $state->bind_param("ss", $nome, $email);
        $resultado = $state->execute();
        
        return $resultado;
        
    }

}

$crud = new CRUD($db);

$nome = $_POST["nome"];
$email = $_POST["email"];

$success = $crud->enviarBanco($nome, $email);
if($success){
    echo "Valores registrados";
}else{
    echo "Erro no código";
}

$db->close();