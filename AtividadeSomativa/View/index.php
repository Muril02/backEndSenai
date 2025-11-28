<?php
require_once __DIR__ . '/../Controller/LivroController.php';

$controller = new LivroController();

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    switch ($_POST["acao"]) {

        case "criar":
            $controller->criar($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['qtde']);
            break;
        case 'excluir':
            $controller->deletar($_POST['id']);
            break;
        case 'alterar':
            $livro = new Livro($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['qtde']);
            $controller->atualizar($_POST["id"], $livro);
            break;
    }

}

$lista = $controller->lerLivros();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de bebidas</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
    <h1>Biblioteca</h1>
    <br>
    <hr>
    <form method="POST" id="formCad">
        <input type="hidden" name="acao" value="criar">
        <input type="text" name="titulo" placeholder="Título do livro:" required>
        <select name="genero" required>
            <option value="">Selecione o genêro</option>
            <option value="Terror">Terror</option>
            <option value="Suspense">Suspense</option>
            <option value="Ação">Ação</option>
            <option value="Romance">Romance</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Aventura">Aventura</option>
            <option value="Medieval">Medieval</option>
        </select>
        <input type="text" name="autor"  placeholder="Nome do autor:" required>
        <input type="number" name="ano"  placeholder="Ano de lançamento:" required>
        <input type="number" name="qtde"  placeholder="Quantidade em estoque:" required>
        <button type="submit">Cadastrar</button>
    </form>


    <div class="esconder" id="formEdit">
        <form method="POST">
            <input type="hidden" name="acao" value="alterar">
            <input type="hidden" name="id" id="id">
            <input type="text" id="titulo" name="titulo" placeholder="Nome da bebida:" required>
            <select name="genero" id="genero" required>
                <option value="">Selecione o genêro</option>
                <option value="Terror">Terror</option>
                <option value="Suspense">Suspense</option>
                <option value="Ação">Ação</option>
                <option value="Romance">Romance</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Aventura">Aventura</option>
                <option value="Medieval">Medieval</option>
            </select>
            <input type="text" name="autor" id="autor" placeholder="Nome do autor:" required>
            <input type="number" name="ano" id="ano" placeholder="Ano de lançamento:" required>
            <input type="number" name="qtde" id="qtde" placeholder="Quantidade em estoque:" required>
            <button type="submit">Enviar</button>
            <button onclick="exibirCad();">Voltar</button>
        </form>
    </div>
    <hr>


    <h2>Biblioteca</h2>
    <?php if (empty($lista)): ?>
        <p>Nenhum livro cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Genêro</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $livro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($livro['Titulo']); ?></td>
                        <td><?php echo htmlspecialchars($livro['Autor']); ?></td>
                        <td><?php echo htmlspecialchars($livro['Ano']); ?></td>
                        <td><?php echo htmlspecialchars($livro['Genero']); ?></td>
                        <td><?php echo htmlspecialchars($livro['Qtde']); ?></td>
                        <td>
                            <form method="POST" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo $livro['id'] ?>">
                                <input type="hidden" name="acao" value="excluir">
                                <button type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar <?php echo htmlspecialchars($livro['Titulo']); ?>?');">Deletar</button>
                            </form>
                            <button
                                    onclick="onclick=exibirEdit(); pegarValores(
                                        '<?php echo htmlspecialchars($livro['Titulo']); ?>',
                                        '<?php echo htmlspecialchars($livro['Autor']); ?>',    
                                        '<?php echo htmlspecialchars($livro['Ano']); ?>',    
                                        '<?php echo htmlspecialchars($livro['Genero']); ?>',    
                                        '<?php echo htmlspecialchars($livro['Qtde']); ?>',
                                        '<?php echo htmlspecialchars($livro['id']); ?>'
                                    );">Alterar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>



</body>
<script src="JS/index.js"></script>
</html>