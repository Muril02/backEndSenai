<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senaisp');
define('DB_NAME', 'livraria');

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($db->connect_error) {
    die("Erro de conexão: " . $db->connect_error);
}

$id = $_GET['id_edit'] ?? null;

$query = "Select * FROM editoras WHERE id_edit = ?";
$result = $db->prepare($query);
$result->bind_param('i', $id);
$result->execute();
$resultadoConsulta = $result->get_result();
$row = $resultadoConsulta->fetch_assoc();

?>
  <form action="atualizar2.php" method='POST'>
    <input type="hidden" name='id_edit' value='<?php $row['id_edit'] ?? ''; ?>'>
    Nome editora: <input type="text" name='nomeEdit' value='<?php echo $row['nomeEdit'] ?? ''; ?>'><br>
    Endereço: <input type="text" name='endereco' value='<?php echo $row['endereço'] ?? ''; ?>'><br>
    Contato: <input type="email" name='contato' value='<?php echo $row['contato'] ?? ''; ?>'><br>
    Telefone: <input type="text" name='telefone' value='<?php echo $row['telefone'] ?? ''; ?>'><br>
    Cidade: <input type="text" name='cidade' value='<?php echo $row['cidade'] ?? ''; ?>'><br>
    Cnpj: <input type="text" name='cnpj' value='<?php echo $row['cnpj'] ?? ''; ?>'><br>
    <input type="submit" value='Atualizar'>