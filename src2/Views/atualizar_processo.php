<?php
// Incluindo o controlador
require_once __DIR__ . '/../Controller/ProcessController.php';

// Verificando se o ID foi fornecido
if (!isset($_GET['id'])) {
    die("ID do processo não fornecido.");
}

$controller = new ProcessController();

try {
    // Buscando os detalhes do processo
    $processo = $controller->getProcessById($_GET['id']);
    if (!$processo) {
        die("Processo não encontrado.");
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->updateProcess($_POST);
        header("Location: visualizar_processos.php"); // Redireciona aDPs atualização
        exit();
    }
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Processo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Estilos gerais */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .navbar {
            background-color: #007BFF;
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
            margin-right: 15px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Conteúdo principal -->
    <div class="container">
        <h1>Atualizar Processo</h1>
        <form action="" method="POST">
            <input type="hidden" name="update_id" value="<?= htmlspecialchars($processo['id']) ?>">

            <label for="tipo_processo">Tipo de Processo:</label>
            <input type="text" name="tipo_processo" value="<?= htmlspecialchars($processo['tipoProcesso']) ?>" required><br>

            <label for="nome_cliente">Nome do Cliente:</label>
            <input type="text" name="nome_cliente" value="<?= htmlspecialchars($processo['autorNome']) ?>" required><br>

            <label for="cpf_cliente">CPF do Cliente:</label>
            <input type="text" name="cpf_cliente" value="<?= htmlspecialchars($processo['autorIdentificacao']) ?>" required><br>

            <label for="oponente">Nome do Oponente:</label>
            <input type="text" name="oponente" value="<?= htmlspecialchars($processo['reuNome']) ?>" required><br>

            <label for="cpf_oponente">CPF do Oponente:</label>
            <input type="text" name="cpf_oponente" value="<?= htmlspecialchars($processo['reuIdentificacao']) ?>" required><br>

            <label for="descricao">Descrição do Caso:</label>
            <textarea name="descricao" required><?= htmlspecialchars($processo['descricaoCaso']) ?></textarea><br>

            <label for="valor_causa">Valor da Causa:</label>
            <input type="text" name="valor_causa" value="<?= htmlspecialchars($processo['valorCausa']) ?>" required><br>

            <button type="submit">Atualizar Processo</button>
        </form>
    </div>
</body>
</html>
