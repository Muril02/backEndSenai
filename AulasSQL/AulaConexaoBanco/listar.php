<?php

define("DB_HOST", "localhost");
define("DB_PASS", "senaisp");
define("DB_USER", "root");
define("DB_NAME", "livraria");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db->connection_error){
    echo "Erro de conexão";
}

$result = $db->query("Select * FROM usuario");

echo "<h2>Usuários</h2>";
echo "<table border='1'> ";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";

while($row = $result->fetch_assoc()){
    echo " <tr>
    <td>{$row['id']}</td>
    <td>{$row['nome']}</td>
    <td>{$row['email']}</td>
    <td><a href='editar.php?id={$row['id']}'>Editar</a></td>
    </tr>";
}

echo "</table>";
$db->close();

?>

<a href="index.html"><button type='button'>Página inicial</button></a>
