<?php
require_once __DIR__ . '/../Controller/ProcessController.php';

try {
    // Criando uma instância do Controller
    $processController = new ProcessController();

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        //  busca
        $searchTerm = $_GET['search'];
        $processos = $processController->searchProcess($searchTerm);

        if (empty($processos)) {
            $error = "Nenhum processo encontrado com o termo '$searchTerm'.";
        }
    } else {
        // exibe  processos
        $processos = $processController->getAllProcesses();
    }
} catch (Exception $e) {
    $error = "Erro ao buscar processos: " . $e->getMessage();
}

// Verificando se o formulário de exclusão foi submetido
if (isset($_POST['delete_id'])) {
    try {
        // Excluindo o processo
        $processController->deleteProcess($_POST['delete_id']);
        header("Location: visualizar_processos.php");
        exit;
    } catch (Exception $e) {
        $error = "Erro ao excluir o processo: " . $e->getMessage();
    }
}

// Verificando se o formulário de atualização foi submetido
if (isset($_POST['update_id'])) {
    try {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $processController->updateProcess($_POST);
        header("Location: visualizar_processos.php");
        exit;
    } catch (Exception $e) {
        $error = "Erro ao atualizar o processo: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Processos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/src2/Views/css/visualizacao_processos.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .navbar {
            background-color: #4a90e2;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #4a90e2;
        }

        .button {
            display: inline-block;
            background-color: #4a90e2;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            border-color: #0056b3;
        }

        .button:hover {
            background-color: #003d80;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #4a90e2;
            color: #fff;
        }

        .actions button {
            margin: 0 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .detalhar-button {
            background-color: #0056b3;
            color: #fff;
        }

        .detalhar-button:hover {
            background-color: #003d80;
        }

        .atualizar-button {
            background-color: #4CAF50;
            color: #fff;
        }

        .atualizar-button:hover {
            background-color: #3e8e41;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
            margin-bottom: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #search {
            width: 100%;
            max-width: 500px;
            height: 15px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        #search:focus {
            border-color: #007BFF;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.php">Voltar à Home</a>
        <a href="cadastro.php">Cadastrar Processo</a>
    </div>
    <div class="container">
        <h1>Processos Cadastrados</h1>

        <?php if (isset($error)): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="GET" action="visualizar_processos.php">
            <label for="search">Buscar processo por ID:</label>
            <input type="text" name="search" id="search" placeholder="Digite o ID">
            <button type="submit" class="button">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Processo</th>
                    <th>Nome do Cliente</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($processos)): ?>
                    <?php foreach ($processos as $processo): ?>
                        <tr>
                            <td><?= htmlspecialchars($processo['id']) ?></td>
                            <td><?= htmlspecialchars($processo['tipoProcesso']) ?></td>
                            <td><?= htmlspecialchars($processo['autorNome']) ?></td>
                            <td><?= htmlspecialchars($processo['descricaoCaso']) ?></td>
                            <td class="actions">
                                <button class="detalhar-button"
                                    onclick="openModal(<?= $processo['id'] ?>, 'detalhar')">Detalhar</button>
                                <button class="atualizar-button"
                                    onclick="openModal(<?= $processo['id'] ?>, 'atualizar')">Atualizar</button>
                                <form action="visualizar_processos.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?= $processo['id'] ?>">
                                    <button type="submit" class="delete-button"
                                        onclick="return confirm('Tem certeza que deseja excluir este processo?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Nenhum processo encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        function openModal(id, tipo) {
            let url = tipo === 'detalhar' ? 'detalhar_processo.php?id=' + id : 'atualizar_processo.php?id=' + id;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modalContent').innerHTML = data;
                    document.getElementById('modal').style.display = "block";
                })
                .catch(error => {
                    console.error('Erro ao carregar o modal:', error);
                });
        }

        function closeModal() {
            document.getElementById('modal').style.display = "none";
        }
    </script>
</body>

</html>