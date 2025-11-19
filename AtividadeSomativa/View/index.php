<?php
require_once __DIR__ . '/../Controller/LivroController.php';

$controller = new LivroController();

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    switch($_POST["acao"]){

        case "criar":
            $controller->criar($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['qtde']);
            break;
        case 'excluir':
            $controller->deletar($_POST['nome_para_deletar']);
            break;
        case 'alterar':
            $livro = new Livro($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['qtde']);
            $controller->atualizar($_POST["originalTitulo"],$livro);
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
    <style>
       
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-form {
            display: inline; 
        }

        .esconder{
            display: none;
        }
    </style>

    <script>

        function exibir (){
            let idFormEdit = document.getElementById("formEdit")
            let idFormCad = document.getElementById("formCad")
            idFormEdit.classList.remove("esconder")
            idFormCad.classList.add("esconder")
        }

        function pegarValores(Titulo, Autor, Ano, Genero, Quantidade){
            let titulo = document.getElementById("titulo")
            let genero = document.getElementById("genero")
            let autor = document.getElementById("autor")
            let ano = document.getElementById("ano")
            let qtde = document.getElementById("qtde")
            let originalTitulo = document.getElementById("originalTitulo")

            originalTitulo.value = Titulo.value

            titulo.value = Titulo.value
            autor.value = Autor.value
            genero.innerHTML = Genero.value
            qtde.value = Quantidade.value
        }

    </script>
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
    <input type="text" name="autor" placeholder="Nome do autor:" required>
    <input type="number" name="ano" placeholder="Ano de lançamento:" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Cadastrar</button>
    </form>


<div class="esconder" id="formEdit">
<form method="POST">
    <input type="hidden" name="acao" value="alterar">
    <input type="hidden" id="originalTitulo" name="originalTitulo">
    <input type="text" id="titulo" name="titulo" placeholder="Nome da bebida:" required>
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
    <input type="text" name="autor" placeholder="Nome do autor:" required>
    <input type="number" name="ano" placeholder="Ano de lançamento:" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Alterar</button>
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
                <th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $livro): ?>
            <tr onclick="exibir(); pegarValores(
            '<?php echo $livro->getTitulo()  ?>',
            '<?php echo $livro->getAutor()  ?>',    
            '<?php echo $livro->getAno()  ?>',    
            '<?php echo $livro->getGen()  ?>',    
            '<?php echo $livro->getQtde()  ?>'    
            );" >
                <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                <td><?php echo htmlspecialchars($livro->getGen()); ?></td>
                <td><?php echo htmlspecialchars($livro->getQtde()); ?></td>
                <td>
                    <form method="POST" class="delete-form">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="nome_para_deletar" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar <?php echo htmlspecialchars($livro->getTitulo()); ?>?');">Deletar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>



</body>
</html>