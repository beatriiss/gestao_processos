<?php
include_once './classes/Database.php';
include_once './classes/Process.php';
include_once './classes/GerenciadorDeProcessos.php';
include_once './classes/ProcessDAO.php';

// Obter a instância do banco de dados
$database = Database::getInstance();
$db = $database->getConnection();

// Inicializar o DAO de processos
$processDAO = new ProcessDAO($db);

// Definir o protótipo de processo
$processo_prototipo = new Process(
    "123456", // numeroProcesso
    "2024-09-17", // dataDistribuicao
    "Parte A vs Parte B", // nomePartes
    "Advogado X", // advogados
    "Juiz Y", // juizResponsavel
    "Tribunal Z", // tribunal
    "2024-09-20", // dataPeticaoInicial
    "2024-09-25", // dataContestacao
    "2024-10-05", // dataAudienciaConciliacao
    "Decisão 1, Decisão 2", // decisoesInterlocutorias
    "2024-10-15", // dataSentenca
    "5000", // valorCausa
    "2024-10-20", // dataIntimacao
    "Em andamento", // situacao
    "Descrição do processo" // descricao
);

$gerenciador = new GerenciadorDeProcessos($processo_prototipo);

if (isset($_POST['submit'])) {
    $processo = new Process(
        $_POST['numero_processo'],
        $_POST['data_distribuicao'],
        $_POST['nome_partes'] ?: null,
        $_POST['advogados'] ?: null,
        $_POST['juiz_responsavel'] ?: null,
        $_POST['tribunal'] ?: null,
        $_POST['data_peticao_inicial'] ?: null,
        $_POST['data_contestacao'] ?: null,
        $_POST['data_audiencia_conciliacao'] ?: null,
        $_POST['decisoes_interlocutorias'] ?: null,
        $_POST['data_sentenca'] ?: null,
        $_POST['valor_causa'] ?: null,
        $_POST['data_intimacao'] ?: null,
        $_POST['situacao'] ?: null,
        $_POST['descricao'] ?: null
    );
    
    $processDAO = new ProcessDAO(Database::getInstance()->getConnection());
    
    if ($processDAO->inserirProcesso($processo)) {
        echo "Processo inserido com sucesso!";
    } else {
        echo "Falha ao inserir o processo.";
    }
}


// Ler processos existentes
$processos = $processDAO->lerProcessos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Processos</title>
</head>
<body>
    <h1>Inserir Novo Processo</h1>
    <form method="POST" action="index.php">
        Número do Processo: <input type="text" name="numero_processo" required><br>
        Data de Distribuição: <input type="date" name="data_distribuicao" required><br>
        Nome das Partes: <textarea name="nome_partes" required></textarea><br>
        Advogados: <textarea name="advogados" required></textarea><br>
        Tribunal: <input type="text" name="tribunal" required><br> 
        Data da Petição Inicial: <input type="date" name="data_peticao_inicial"><br> 
        Situação:  <input type="text" name="situacao" required><br> <!-- Opcional -->
        Descrição: <textarea name="descricao" required></textarea><br> <!-- Opcional -->
        Juiz Responsável: <input type="text" name="juiz_responsavel"><br> 
        Data da Contestação: <input type="date" name="data_contestacao"><br> <!-- Opcional -->
        Data da Audiência de Conciliação: <input type="date" name="data_audiencia_conciliacao"><br> <!-- Opcional -->
        Decisões Interlocutórias: <textarea name="decisoes_interlocutorias"></textarea><br> <!-- Opcional -->
        Data da Sentença: <input type="date" name="data_sentenca"><br> <!-- Opcional -->
        Valor da Causa: <input type="text" name="valor_causa"><br> <!-- Opcional -->
        Data de Intimação: <input type="date" name="data_intimacao"><br> <!-- Opcional -->

        <button type="submit" name="submit">Inserir Processo</button>
    </form>

    <h2>Lista de Processos</h2>
    <table border="1">
        <tr>
            <th>Número do Processo</th>
            <th>Nome da Parte</th>
            <th>Advogado</th>
            <th>Situação</th>
            <th>Data de Distribuição</th>
            <th>Descrição</th>
        </tr>
        <?php foreach ($processos as $processo): ?>
            <tr>
                <td><?php echo htmlspecialchars($processo->getNumeroProcesso()); ?></td>
                <td><?php echo htmlspecialchars($processo->getNomePartes()); ?></td>
                <td><?php echo htmlspecialchars($processo->getAdvogados()); ?></td>
                <td><?php echo htmlspecialchars($processo->getSituacao()); ?></td>
                <td><?php echo htmlspecialchars($processo->getDataDistribuicao()); ?></td>
                <td><?php echo htmlspecialchars($processo->getDescricao()); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>

