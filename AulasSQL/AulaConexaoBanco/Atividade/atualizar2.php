<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senaisp');
define('DB_NAME', 'livraria');


$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$idEdit = $_POST['id_edit'];
$nomeEdit = $_POST['nomeEdit'];
$endereco = $_POST['endereco'];
$contato = $_POST['contato'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$cnpj = $_POST['cnpj'];

$sql = $db->prepare('Update editoras Set nome_edit = ?, endereço = ?, contato = ?, telefone = ?, cidade = ?, cnpj = ? Where id_edit = ?');
$sql->bind_param('ssssssi', $nomeEdit, $endereco, $contato, $telefone, $cidade, $cnpj, $idEdit);
$success = $sql->execute();

if($success & $sql->affected_rows > 0){
    echo "Dados atualizados com sucesso!";
    echo "<br><a href='index.html'>Voltar</a></br>";
}else{
    echo "Erro: " . $db->error;
}

$db->close();
$sql->close();