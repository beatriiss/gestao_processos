<?php

require_once __DIR__ . '/../Controller/ProcessController.php';


error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Criar uma instância do controlador
$controller = new ProcessController();

// Processar o formulário se houver requisição POST
$controller->handleRequest();

$tipoProcesso = $_POST['tipo_processo'] ?? '';
$objetoConflito = [];
$direitoViolado = [];
$cortes = [];

// Carregar as opções do validator com base no tipo selecionado
switch ($tipoProcesso) {
    case 'Familiar':
        $objetoConflito = FamilyValidator::getObjetoConflito();
        $direitoViolado = FamilyValidator::getDireitoViolado();
        $cortes = FamilyValidator::getCortes();
        break;
    case 'Criminal':
        $objetoConflito = CriminalValidator::getObjetoConflito();
        $direitoViolado = CriminalValidator::getDireitoViolado();
        $cortes = CriminalValidator::getCortes();
        break;
    case 'Trabalhista':
        $objetoConflito = LaborValidator::getObjetoConflito();
        $direitoViolado = LaborValidator::getDireitoViolado();
        $cortes = LaborValidator::getCortes();
        break;
    case 'Civil':
        $objetoConflito = CivilValidator::getObjetoConflito();
        $direitoViolado = CivilValidator::getDireitoViolado();
        $cortes = CivilValidator::getCortes();
        break;
    default:
        $tipoProcesso = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Processos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
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

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
            color: #2c3e50;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: #2c3e50;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        select {
            background: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Barra de navegação -->
    <div class="navbar">
        <a href="index.php">Início</a>
        <a href="visualizar_processos.php">Visualizar Processos</a>
    </div>
    <div class="container">
        <h1>Cadastro de Processos</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="tipo_processo">Tipo de Processo</label>
                <select name="tipo_processo" id="tipo_processo" required onchange="this.form.submit()">
                    <option value="">-- Selecione --</option>
                    <option value="Civil" <?= $tipoProcesso == 'Civil' ? 'selected' : '' ?>>Civil</option>
                    <option value="Criminal" <?= $tipoProcesso == 'Criminal' ? 'selected' : '' ?>>Criminal</option>
                    <option value="Trabalhista" <?= $tipoProcesso == 'Trabalhista' ? 'selected' : '' ?>>Trabalhista
                    </option>
                    <option value="Familiar" <?= $tipoProcesso == 'Familiar' ? 'selected' : '' ?>>Familiar</option>
                </select>
            </div>

            <?php if ($tipoProcesso): ?>
                <div class="form-group">
                    <label for="objeto_conflito">Objeto de Conflito</label>
                    <select name="objeto_conflito" id="objeto_conflito" required>
                        <option value="">-- Selecione --</option>
                        <?php foreach ($objetoConflito as $item): ?>
                            <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="direito_violado">Direito Violado</label>
                    <select name="direito_violado" id="direito_violado" required>
                        <option value="">-- Selecione --</option>
                        <?php foreach ($direitoViolado as $item): ?>
                            <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cortes">Cortes</label>
                    <select name="cortes" id="cortes" required>
                        <option value="">-- Selecione --</option>
                        <?php foreach ($cortes as $item): ?>
                            <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nome_cliente">Nome do Cliente</label>
                    <input type="text" name="nome_cliente" id="nome_cliente" required>
                </div>

                <div class="form-group">
                    <label for="cpf_cliente">CPF do Cliente</label>
                    <input type="text" name="cpf_cliente" id="cpf_cliente" required>
                </div>

                <div class="form-group">
                    <label for="oponente">Nome do Oponente</label>
                    <input type="text" name="oponente" id="oponente" required>
                </div>

                <div class="form-group">
                    <label for="cpf_oponente">CPF do Oponente</label>
                    <input type="text" name="cpf_oponente" id="cpf_oponente" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição do Caso</label>
                    <textarea name="descricao" id="descricao" required></textarea>
                </div>

                <div class="form-group">
                    <label for="fatos">Fatos</label>
                    <textarea name="fatos" id="fatos" required></textarea>
                </div>

                <div class="form-group">
                    <label for="pedido">Pedido</label>
                    <textarea name="pedido" id="pedido" required></textarea>
                </div>

                <div class="form-group">
                    <label for="juizo">Juízo</label>
                    <input type="text" name="juizo" id="juizo" required>
                </div>

                <div class="form-group">
                    <label for="comarca">Comarca</label>
                    <input type="text" name="comarca" id="comarca" required>
                </div>

                <div class="form-group">
                    <label for="valor_causa">Valor da Causa</label>
                    <input type="number" name="valor_causa" id="valor_causa" required>
                </div>

                <div class="form-group">
                    <label for="advogado">Advogado</label>
                    <input type="text" name="advogado" id="advogado" required>
                </div>

                <div class="form-group">
                    <label for="oab">Número da OAB</label>
                    <input type="text" name="oab" id="oab" required>
                </div>

                <div class="form-group">
                    <label for="contato_advogado">Contato do Advogado</label>
                    <input type="text" name="contato_advogado" id="contato_advogado" required>
                </div>

                <button type="submit">Cadastrar Processo</button>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>