
<?php
require_once './classes/ProcessManager.php';

$processManager = new ProcessManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numeroProcesso = $_POST['numero_processo'];
    $dataDistribuicao = $_POST['data_distribuicao'];
    $nomePartes = $_POST['nome_partes'];
    $advogados = $_POST['advogados'];
    $juizResponsavel = $_POST['juiz_responsavel'];
    $tribunal = $_POST['tribunal'];
    $dataPeticaoInicial = $_POST['data_peticao_inicial'];
    $dataContestacao = $_POST['data_contestacao'];
    $dataAudienciaConciliacao = $_POST['data_audiencia_conciliacao'];
    $decisoesInterlocutorias = $_POST['decisoes_interlocutorias'];
    $dataSentenca = $_POST['data_sentenca'];
    $valorCausa = $_POST['valor_causa'];
    $dataIntimacao = $_POST['data_intimacao'];
    $situacao = $_POST['situacao'];
    $descricao = $_POST['descricao'];

    $processManager->createProcess($numeroProcesso, $dataDistribuicao, $nomePartes, $advogados, $juizResponsavel, $tribunal, $dataPeticaoInicial, $dataContestacao, $dataAudienciaConciliacao, $decisoesInterlocutorias, $dataSentenca, $valorCausa, $dataIntimacao, $situacao, $descricao);
}

$processes = $processManager->getProcesses();

?>

<html>
<head>
    <title>Processos</title>
</head>
<body>
    <h1>Processos</h1>
    <form method="post">
        <label for="numero_processo">Número do Processo:</label>
        <input type="text" id="numero_processo" name="numero_processo"><br><br>
        <label for="data_distribuicao">Data de Distribuição:</label>
        <input type="date" id="data_distribuicao" name="data_distribuicao"><br><br>
        <label for="nome_partes">Nome das Partes:</label>
        <input type="text" id="nome_partes" name="nome_partes"><br><br>
        <label for="advogados">Advogados:</label>
        <input type="text" id="advogados" name="advogados"><br><br>
        <label for="juiz_responsavel">Juiz Responsável:</label>
        <input type="text" id="juiz_responsavel" name="juiz_responsavel"><br><br>
        <label for="tribunal">Tribunal:</label>
        <input type="text" id="tribunal" name="tribunal"><br><br>
        <label for="data_peticao_inicial">Data de Petição Inicial:</label>
        <input type="date" id="data_peticao_inicial" name="data_peticao_inicial"><br><br>
        <label for="data_contestacao">Data de Contestação:</label>
        <input type="date" id="data_contestacao" name="data_contestacao"><br><br>
        <label for="data_audiencia_conciliacao">Data de Audiência de Conciliação:</label>
        <input type="date" id="data_audiencia_conciliacao" name="data_audiencia_conciliacao"><br><br>
        <label for="decisoes_interlocutorias">Decisões Interlocutórias:</label>
        <input type="text" id="decisoes_interlocutorias" name="decisoes_interlocutorias"><br><br>
        <label for="data_sentenca">Data de Sentença:</label>
        <input type="date" id="data_sentenca" name="data_sentenca"><br><br>
        <label for="valor_causa">Valor da Causa:</label>
        <input type="text" id="valor_causa" name="valor_causa"><br><br>
        <label for="data_intimacao">Data de Intimação:</label>
        <input type="date" id="data_intimacao" name="data_intimacao"><br><br>
        <label for="situacao">Situação:</label>
        <input type="text" id="situacao" name="situacao"><br><br>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao"><br><br>
        <input type="submit" value="Criar Processo">
    </form>

    <h2>Processos Criados:</h2>
    <ul>
        <?php foreach ($processes as $process) { ?>
            <li>
                <?= $process->getNumeroProcesso() ?> - <?= $process->getNomePartes() ?>
            </li>
        <?php } ?>
    </ul>
</body>
</html>