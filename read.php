<?php
require_once './classes/ProcessManager.php';

$processManager = new ProcessManager();

$processes = $processManager->getProcesses();
?>

<html>
<head>
    <title>Processos</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
  
            background-color: #f5f5f5;
            flex-direction: column;
      
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 80%; 
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
        }
        thead{
            border-radius: 10;

        }

        tr{
            border-radius: 10px;

        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            border-radius: 10px;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        .teste{
            border-radius: 10;

        }
    </style>
</head>
<body>
<?php
try {
    include('./components/navBar.php');
} catch (Exception $e) {
    echo 'Error including navBar.php: ' . $e->getMessage();
}
?>

    <h2>Processos Existentes:</h2>
    <table>
        <thead>
            <tr>
                <th classe="teste">Número do Processo</th>
                <th>Nome das Partes</th>
                <th>Data de Distribuição</th>
                <th>Juiz Responsável</th>
                <th>Tribunal</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processes as $process) { ?>
                <tr>
                    <td><?= $process->getNumeroProcesso() ?></td>
                    <td><?= $process->getNomePartes() ?></td>
                    <td><?= $process->getDataDistribuicao() ?></td>
                    <td><?= $process->getJuizResponsavel() ?></td>
                    <td><?= $process->getTribunal() ?></td>
                    <td><?= $process->getDescricao() ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
