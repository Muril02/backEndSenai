<?php

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

$id = $_GET['id'];

$query = "Select * FROM usuario WHERE id = $id";
$result = $db->query($query);
$row = $result->fetch_assoc();

?>
  <form action="atualizar.php" method='POST'>
    <input type="hidden" name='id' value='<?php echo $row['id']; ?>'>
    Nome: <input type="text" name='nome' value='<?php echo $row['nome']; ?>'><br>
    Email: <input type="email" name='email' value='<?php echo $row['email']; ?>'><br>
    <input type="submit" value='Atualizar'>