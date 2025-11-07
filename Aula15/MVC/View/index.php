<?php
require_once __DIR__ . '/../Controller/BebidasController.php';

$controller = new BebidaController();

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    switch($_POST["acao"]){

        case "criar":
            $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
            break;
        case 'excluir':
            $controller->deletar($_POST['nome_para_deletar']);
            break;
        case 'alterar':
            $controller->atualizar($_POST["originalNome"],$_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
            break;
    }
    
    // if (isset($_POST['acao'])) { // Verifica se 'acao' está definido
    //     if ($_POST['acao'] === 'criar') {
    //         $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    //     } elseif ($_POST['acao'] === 'deletar') {
    //         // Ação de deletar é executada aqui
    //         $controller->deletar($_POST['nome_para_deletar']);
    //     }
    // }
}

$lista = $controller->ler();
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

        function pegarValores(Nome, Categoria, Volume, Valor, Qtde){
            let nomeBebida = document.getElementById("nomeBebida")
            let catBebida = document.getElementById("catBebida")
            let voluBebida = document.getElementById("voluBebida")
            let valorBebida = document.getElementById("valorBebida")
            let qtdeBebida = document.getElementById("qtdeBebida")
            let originalNome = document.getElementById("originalNome")

            originalNome.value = Nome

            nomeBebida.value = Nome
            catBebida.value = Categoria
            catBebida.innerHTML = Categoria
            voluBebida.value = Volume
            valorBebida.value = Valor
            qtdeBebida.value = Qtde
        }

    </script>
</head>
<body>
<h1>Gerenciamento de bebidas</h1>
<br>
<hr>
    <form method="POST" id="formCad">
    <input type="hidden" name="acao" value="criar">
    <input type="text" name="nome" placeholder="Nome da bebida:" required>
    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <option value="Refrigerante">Refrigerante</option>
        <option value="Cerveja">Cerveja</option>
        <option value="Vinho">Vinho</option>
        <option value="Destilado">Destilado</option>
        <option value="Água">Água</option>
        <option value="Suco">Suco</option>
        <option value="Energético">Energético</option>
    </select>
    <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Cadastrar</button>
    </form>


<div class="esconder" id="formEdit">
<form method="POST">
    <input type="hidden" name="acao" value="alterar">
    <input type="hidden" id="originalNome" name="originalNome">
    <input type="text" id="nomeBebida" name="nome" placeholder="Nome da bebida:" required>
    <select name="categoria" required>
        <option id="catBebida" value=""></option>
        <option value="Refrigerante">Refrigerante</option>
        <option value="Cerveja">Cerveja</option>
        <option value="Vinho">Vinho</option>
        <option value="Destilado">Destilado</option>
        <option value="Água">Água</option>
        <option value="Suco">Suco</option>
        <option value="Energético">Energético</option>
    </select>
    <input type="text" name="volume" id="voluBebida" placeholder="Volume (ex: 300ml):" required>
    <input type="number" name="valor" id="valorBebida" step="0.01" placeholder="Valor em Reais (R$):" required>
    <input type="number" name="qtde" id="qtdeBebida" placeholder="Quantidade em estoque:" required>
    <button type="submit">Alterar</button>
</form>
</div>
<hr>




<h2>Estoque de Bebidas</h2>
<?php if (empty($lista)): ?>
    <p>Nenhuma bebida cadastrada.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Volume</th>
                <th>Valor (R$)</th>
                <th>Estoque</th>
                <th>Ações</th> </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $bebida): ?>
            <tr onclick="exibir(); pegarValores(
            '<?php echo $bebida->getNome()  ?>',
            '<?php echo $bebida->getCat()  ?>',    
            '<?php echo $bebida->getVolu()  ?>',    
            '<?php echo $bebida->getValor()  ?>',    
            '<?php echo $bebida->getQtde()  ?>'    
            );" >
                <td><?php echo htmlspecialchars($bebida->getNome()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getCat()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getVolu()); ?></td>
                <td><?php echo number_format($bebida->getValor(), 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($bebida->getQtde()); ?></td>
                <td>
                    <form method="POST" class="delete-form">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="nome_para_deletar" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar <?php echo htmlspecialchars($bebida->getNome()); ?>?');">Deletar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>



</body>
</html>