<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senaisp');
define('DB_NAME', 'livraria');

// Create the connection object
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = $db->prepare('Update usuario Set nome = ?, email = ? Where id = ?');
$sql->bind_param('ssi', $nome, $email, $id);
$success = $sql->execute();

if($success & $sql->affected_rows === 0){
    echo "Dados atualizados com sucesso!";
    echo "<br><a href='index.html'>Voltar</a></br>";
}else{
    echo "Erro: " . $db->error;
}

$db->close();
$sql->close();