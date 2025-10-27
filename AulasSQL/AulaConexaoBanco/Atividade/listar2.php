<?php

define("DB_HOST", "localhost");
define("DB_PASS", "senaisp");
define("DB_USER", "root");
define("DB_NAME", "livraria");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db->connection_error){
    echo "Erro de conexão";
}

$result = $db->query("Select * FROM editoras");

echo "<h2>Usuários</h2>";
echo "<table border='1'> ";
echo "<tr><th>ID</th><th>NomeEdit</th><th>Endereço</th><th>Contato</th><th>Telefone</th><th>Cidade</th><th>Cnpj</th></tr>";

while($row = $result->fetch_assoc()){
    echo " <tr>
    <td>{$row['id_edit']}</td>
    <td>{$row['nome_edit']}</td>
    <td>{$row['endereço']}</td>
    <td>{$row['contato']}</td>
    <td>{$row['telefone']}</td>
    <td>{$row['cidade']}</td>
    <td>{$row['cnpj']}</td>
    <td><a href='editar2.php?id={$row['id_edit']}'>Editar</a></td>
    </tr>";
}

echo "</table>";
$db->close();

?>

<a href="index.html"><button type='button'>Página inicial</button></a>
