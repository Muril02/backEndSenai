<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senaisp');
define('DB_NAME', 'livraria');

// Create the connection object
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$id = $_GET["id"];

$stmt = $db->prepare("DELETE FROM usuario WHERE id = ?");

$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "Usuário deletado com sucesso!";
}else{
    echo "Erro ao deletar: " . $stmt->error;
}

echo "<br><a href='listar.php'>Voltar para a lista</a>";


$stmt->close();
$db->close();

