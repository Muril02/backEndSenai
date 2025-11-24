<?php
/**
 * Main Client Management Interface (View/index.php)
 * Sistema CRUD completo onde as operações de Alterar e Deletar 
 * utilizam o CPF como chave única de identificação.
 */

// Path Fix: Carrega dependências
require_once __DIR__ . "/../Controller/ClienteController.php"; 
require_once __DIR__ . "/../Model/Cliente.php"; 

$controller = new ClienteController;
$message = "";
$clients = []; // Para armazenar a lista de todos os clientes
// --- Lógica de Manipulação de Requisições ---

if( $_SERVER["REQUEST_METHOD"] == "POST"){
    $acao = $_POST["acao"] ?? '';
    
    // Verifica se os campos básicos para criação/alteração estão presentes
    $is_complete = isset($_POST["nome"], $_POST["cpf"], $_POST["cep"], $_POST["telefone"]);

    if ($acao == "criar" && $is_complete) {
        $cliente = new Cliente($_POST["nome"], $_POST["cpf"], $_POST["cep"], $_POST["telefone"]);
        if ($controller->Registrar($cliente)) {
            $message = "✅ Cliente " . htmlspecialchars($_POST['nome']) . " cadastrado com sucesso!";
        } else {
            // Isso geralmente acontece se o CPF já existir (duplicidade)
            $message = "❌ Erro ao cadastrar cliente. O CPF " . htmlspecialchars($_POST['cpf']) . " pode já estar registrado.";
        }
        
    } 
    
    // CORREÇÃO ALTERAR (LÓGICA POST): Adiciona a verificação e captura do CPF Original
    else if ($acao == "alterar" && $is_complete && isset($_POST["cpf_original_alterar"])) {
        // Cria o objeto Cliente com os novos dados (incluindo o possivelmente novo CPF)
        $cliente = new Cliente($_POST["nome"], $_POST["cpf"], $_POST["cep"], $_POST["telefone"]);
        // Captura o CPF original (chave WHERE)
        $cpf_original = $_POST["cpf_original_alterar"]; 

        // Passa o objeto Cliente (novos dados) e o CPF original (chave WHERE) para o Controller
        if ($controller->Alterar($cliente, $cpf_original)) {
            $message = "✅ Cliente CPF " . htmlspecialchars($cpf_original) . " alterado com sucesso! Novo CPF: " . htmlspecialchars($_POST['cpf']) . ".";
        } else {
            $message = "❌ Erro ao alterar o cliente. Verifique o CPF ou dados. Pode ser que o novo CPF já esteja em uso.";
        }
    } 
    
    else if ($acao == "deletar" && isset($_POST['cpf_deletar'])) {
        // Deletar usa o campo escondido 'cpf_deletar'
        $cpf_to_delete = $_POST['cpf_deletar'];
        if ($controller->Excluir($cpf_to_delete)) {
            $message = "✅ Cliente CPF " . htmlspecialchars($cpf_to_delete) . " deletado com sucesso!";
        } else {
            $message = "❌ Erro ao deletar o cliente CPF " . htmlspecialchars($cpf_to_delete) . ". Não encontrado ou problema no DB.";
        }
    } 
    
    else if ($acao != "listar") {
        $message = "⚠️ Formulário incompleto ou ação desconhecida.";
    }
}

// --- Lógica de Leitura/Listagem (Executada a cada carregamento) ---

// Chama o Listar, que agora usa a consulta simplificada
$clients_raw = $controller->Listar();
if (is_array($clients_raw)) {
     $clients = $clients_raw;
} else {
    // Exibirá uma mensagem se a listagem falhar (ex: por causa da consulta SQL)
    $message = (empty($message) ? "❌ " : $message . " | ") . "Falha ao carregar a lista de clientes. Verifique a conexão com o banco.";
    $clients = [];
}

// Obtém a aba ativa
$active_tab = $_GET['tab'] ?? 'create'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Clientes (CRUD - CPF-Based)</title>
    <style>
        /* Base Styling & Reset */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', Arial, sans-serif;
            background-color: #f0f4f8; 
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 30px 20px;
        }

        /* Container & Card */
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; 
        }

        /* Header */
        h1 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 25px;
            font-size: 2em;
        }

        /* Tab Navigation */
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            overflow-x: auto; 
        }
        .tab-button {
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            background: none;
            font-weight: bold;
            color: #555;
            transition: all 0.3s ease;
            text-decoration: none;
            flex-shrink: 0; 
        }
        .tab-button.active {
            color: #1a73e8;
            border-bottom: 3px solid #1a73e8;
            margin-bottom: -2px; 
        }
        .tab-content {
            padding-top: 20px;
        }
        
        /* Message Box */
        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            border: 1px solid transparent;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="tel"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #1a73e8;
            outline: none;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        /* Button */
        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s;
        }

        .btn-submit:hover {
            background-color: #0d47a1;
        }
        .btn-submit:active {
            transform: scale(0.99);
        }
        .btn-delete {
            background-color: #e53935; /* Red */
        }
        .btn-delete:hover {
            background-color: #c62828;
        }
        
        /* Modal (Message Box) for Confirmation */
        .modal {
            display: none; /* Oculto por padrão */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            text-align: center;
        }
        .modal-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .modal-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        #confirm-delete-btn {
            background-color: #e53935;
            color: white;
        }
        #confirm-delete-btn:hover {
            background-color: #c62828;
        }
        #cancel-delete-btn {
            background-color: #ccc;
            color: #333;
        }
        #cancel-delete-btn:hover {
            background-color: #bbb;
        }

        /* Table Styling for Read Section */
        .client-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            min-width: 600px; /* Garante que a tabela não fique espremida */
        }
        .client-table th, .client-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .client-table th {
            background-color: #f4f6f9;
            color: #1a73e8;
            font-size: 0.9em;
            text-transform: uppercase;
        }
        .client-table tr:hover {
            background-color: #e8f0fe;
        }
        .client-table tr:last-child td {
            border-bottom: none;
        }
        .no-records {
            text-align: center;
            padding: 30px;
            color: #777;
            font-style: italic;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Função para preencher o formulário Alterar/Deletar quando um cliente é selecionado
            const selectClient = (action) => {
                const select = document.getElementById(action + '_client_cpf');
                
                // Garante que o elemento select existe e tem opções
                if (!select || select.options.length === 0) return; 

                const selectedOption = select.options[select.selectedIndex];
                const cpf = selectedOption.dataset.cpf || '';
                
                if (action === 'alter') {
                    // CORREÇÃO JS: Preenche o campo hidden com o CPF ORIGINAL (chave WHERE)
                    document.getElementById('cpf_original_alterar').value = cpf; 

                    // Preenche o campo CPF que será usado como NOVO VALOR na submissão
                    document.getElementById('alter_cpf').value = cpf; 
                    
                    // Preenche campos visíveis com dados do cliente
                    document.getElementById('alter_name').value = selectedOption.dataset.nome || '';
                    document.getElementById('alter_cep').value = selectedOption.dataset.cep || '';
                    document.getElementById('alter_phone').value = selectedOption.dataset.telefone || '';
                } else if (action === 'delete') {
                    // Preenche o campo CPF escondido para a exclusão
                    document.getElementById('delete_cpf_deletar').value = cpf;
                }
            };

            // Anexa a função aos eventos de mudança do select para Alterar e Deletar
            const alterSelect = document.getElementById('alter_client_cpf');
            if (alterSelect) {
                alterSelect.addEventListener('change', () => selectClient('alter'));
                // Executa na carga para preencher com o primeiro cliente
                selectClient('alter'); 
            }

            const deleteSelect = document.getElementById('delete_client_cpf');
            if (deleteSelect) {
                deleteSelect.addEventListener('change', () => selectClient('delete'));
                // Executa na carga para definir o CPF do primeiro cliente para exclusão
                selectClient('delete');
            }
            
            // --- Lógica do Modal Customizado ---
            const deleteForm = document.getElementById('delete-form');
            const deleteButton = document.getElementById('delete-submit-btn');
            const modal = document.getElementById('delete-modal');
            const confirmBtn = document.getElementById('confirm-delete-btn');
            const cancelBtn = document.getElementById('cancel-delete-btn');
            
            // Remove o uso do confirm() padrão do navegador
            if (deleteButton) {
                deleteButton.addEventListener('click', (e) => {
                    e.preventDefault(); // Impede a submissão padrão do formulário
                    modal.style.display = 'flex'; // Exibe o modal
                });
            }

            // Confirmação: submete o formulário
            if (confirmBtn) {
                confirmBtn.addEventListener('click', () => {
                    modal.style.display = 'none';
                    // Melhoria: Garante que o CPF mais recentemente selecionado está no campo hidden
                    selectClient('delete'); 
                    // Submete o formulário manualmente
                    deleteForm.submit(); 
                });
            }

            // Cancelamento: fecha o modal
            if (cancelBtn) {
                cancelBtn.addEventListener('click', () => {
                    modal.style.display = 'none';
                });
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Gerenciador de Clientes (CRUD)</h1>
        
        <?php 
        // Exibe a caixa de mensagem
        if (!empty($message)): 
            $class = (strpos($message, '✅') !== false) ? 'success' : 'error';
        ?>
            <div class="message <?php echo $class; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="tabs">
            <a href="?tab=create" class="tab-button <?php echo $active_tab == 'create' ? 'active' : ''; ?>">CRIAR</a>
            <a href="?tab=read" class="tab-button <?php echo $active_tab == 'read' ? 'active' : ''; ?>">LISTAR/LER</a>
            <a href="?tab=alter" class="tab-button <?php echo $active_tab == 'alter' ? 'active' : ''; ?>">ALTERAR (CPF)</a>
            <a href="?tab=delete" class="tab-button <?php echo $active_tab == 'delete' ? 'active' : ''; ?>">DELETAR (CPF)</a>
        </div>
        
        <div class="tab-content">

            <?php if ($active_tab == 'create'): ?>
                <h2>Novo Cadastro</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?tab=create" method="POST">
                    <input name="acao" value="criar" type="hidden">
                    
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" id="name" name="nome" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="cpf_create">CPF</label>
                        <input type="text" id="cpf_create" name="cpf" 
                            pattern="\d{3}\.?\d{3}\.?\d{3}\-?\d{2}" 
                            placeholder="000.000.000-00" required>
                    </div>

                    <div class="form-group">
                        <label for="cep_create">CEP</label>
                        <input type="text" id="cep_create" name="cep" 
                            pattern="\d{5}-?\d{3}" 
                            placeholder="00000-000" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_create">Telefone</label>
                        <input type="tel" id="phone_create" name="telefone" 
                            pattern="\(\d{2}\)\s?\d{4,5}\-?\d{4}" 
                            placeholder="(99) 99999-9999" required>
                    </div>

                    <button type="submit" class="btn-submit">Cadastrar Cliente</button>
                </form>
            <?php endif; ?>

            <?php if ($active_tab == 'read'): ?>
                <h2>Lista de Clientes Registrados</h2>
                
                <?php if (count($clients) > 0): ?>
                    <div style="overflow-x: auto;">
                        <table class="client-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>CEP</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($client['Id_cliente'] ?? 'N/A'); ?></td>
                                        <td><?php echo htmlspecialchars($client['Nome'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($client['CPF'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($client['CEP'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($client['Telefone'] ?? ''); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="no-records">Nenhum cliente registrado. Crie um novo cliente na aba CRIAR.</p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($active_tab == 'alter'): ?>
                <h2>Alterar Cadastro (Busca por CPF)</h2>
                
                <?php if (count($clients) > 0): ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?tab=alter" method="POST">
                        <input name="acao" value="alterar" type="hidden">
                        
                        <input name="cpf_original_alterar" id="cpf_original_alterar" type="hidden">

                        <div class="form-group">
                            <label for="alter_client_cpf">Selecione o Cliente pelo CPF Atual</label>
                            <select id="alter_client_cpf" required>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo htmlspecialchars($client['CPF']); ?>"
                                        data-cpf="<?php echo htmlspecialchars($client['CPF']); ?>"
                                        data-nome="<?php echo htmlspecialchars($client['Nome']); ?>"
                                        data-cep="<?php echo htmlspecialchars($client['CEP']); ?>"
                                        data-telefone="<?php echo htmlspecialchars($client['Telefone']); ?>">
                                        CPF: <?php echo htmlspecialchars($client['CPF']); ?> (<?php echo htmlspecialchars($client['Nome']); ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small style="color: #555; display: block; margin-top: 5px;">Atenção: A atualização será feita no CPF selecionado acima.</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="alter_name">Nome Completo</label>
                            <input type="text" id="alter_name" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="alter_cpf">CPF (Deve conter o CPF original do cliente ou o novo CPF desejado)</label>
                            <input type="text" id="alter_cpf" name="cpf" 
                                pattern="\d{3}\.?\d{3}\.?\d{3}\-?\d{2}" 
                                placeholder="000.000.000-00" required>
                            <small style="color: #e53935;">Se mudar este CPF, ele será a nova chave única do cliente.</small>
                        </div>

                        <div class="form-group">
                            <label for="alter_cep">CEP</label>
                            <input type="text" id="alter_cep" name="cep" 
                                pattern="\d{5}-?\d{3}" 
                                placeholder="00000-000" required>
                        </div>

                        <div class="form-group">
                            <label for="alter_phone">Telefone</label>
                            <input type="tel" id="alter_phone" name="telefone" 
                                pattern="\(\d{2}\)\s?\d{4,5}\-?\d{4}" 
                                placeholder="(99) 99999-9999" required>
                        </div>

                        <button type="submit" class="btn-submit">Atualizar Cliente (Via CPF)</button>
                    </form>
                <?php else: ?>
                    <p class="no-records">Não há clientes para alterar. Crie um novo cliente primeiro.</p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($active_tab == 'delete'): ?>
                <h2>Deletar Cadastro (Busca por CPF)</h2>
                
                <?php if (count($clients) > 0): ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP-SELF']); ?>?tab=delete" method="POST" id="delete-form">
                        <input name="acao" value="deletar" type="hidden">
                        <input name="cpf_deletar" id="delete_cpf_deletar" type="hidden">

                        <div class="form-group">
                            <label for="delete_client_cpf">Selecione o Cliente pelo CPF para Deletar</label>
                            <select id="delete_client_cpf" required>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo htmlspecialchars($client['CPF']); ?>"
                                        data-cpf="<?php echo htmlspecialchars($client['CPF']); ?>">
                                        CPF: <?php echo htmlspecialchars($client['CPF']); ?> (<?php echo htmlspecialchars($client['Nome']); ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small style="color: #e53935; display: block; margin-top: 10px;">Atenção: A deleção é permanente e usa o CPF como chave!</small>
                        </div>
                        
                        <button type="button" class="btn-submit btn-delete" id="delete-submit-btn">DELETAR Cliente Selecionado</button>
                    </form>
                <?php else: ?>
                    <p class="no-records">Não há clientes para deletar.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div> </div> <div id="delete-modal" class="modal">
        <div class="modal-content">
            <p><strong>Confirmação de Exclusão</strong></p>
            <p style="margin-top: 10px;">Tem certeza que deseja **DELETAR** este cliente pelo CPF? Esta ação é **irreversível**.</p>
            <div class="modal-buttons">
                <button class="modal-btn" id="cancel-delete-btn">Cancelar</button>
                <button class="modal-btn" id="confirm-delete-btn">Confirmar Deleção</button>
            </div>
        </div>
    </div>
</body>
</html>