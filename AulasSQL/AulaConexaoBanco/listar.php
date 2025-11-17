<?php

define("DB_HOST", "localhost");
define("DB_PASS", "senaisp");
define("DB_USER", "root");
define("DB_NAME", "livraria");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// --- 1. Start HTML Structure and Head ---
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuários Atrozes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>';

if($db->connection_error){
    echo "<h1>Erro de conexão</h1>";
} else {
    // Original database code
    $result = $db->query("Select * FROM usuario");

    echo "<h2>Usuários</h2>";
    echo "<table border='1'> ";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th><th>Excluir</th></tr>";

    while($row = $result->fetch_assoc()){
        echo " <tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>{$row['email']}</td>
        <td><a href='editar.php?id={$row['id']}'>Editar</a></td>
        <td><a href='deletar.php?id={$row['id']}'>Deletar</a></td>
        </tr>";
    }

    echo "</table>";
    $db->close();
}
// --- 3. Close the Body and HTML tags ---
echo '
<a href="index.html"><button type="button">Página inicial</button></a>
</body>
</html>';
?>