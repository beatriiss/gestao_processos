<?php
require_once './classes/ProcessManager.php';

$processManager = ProcessManager::getInstance();

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
    <style>

        body {
            display: flex;
            justify-content: center;
            align-items: center;

            margin-top: 0;
            background-color: #f5f5f5;
            flex-direction: column;

        }


        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

    
        input[type="text"],
        input[type="date"] {
            width: 100%; 
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            height: 38;
        }

   
        label {
            display: block;
            margin-bottom: 5px;
        }


        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: left; 
        }


        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

      
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 5px;
            
        }

        .grid {
            display: flex;
            justify-content: space-between;
            width: 100%; 
            gap: 10px;
            align-items: 'center';
        }

        .form-group.half {
            flex: 1; 
        }

        
        .date-group {
            display: flex;
            justify-content: space-between;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

 
        #optional-fields {
            display: none;
        }

 
        #show-optional {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right; 
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

    <form method="post">
        <div class="grid">
            <div class="form-group half">
                <label for="numero_processo">Número do Processo:</label>
                <input type="text" id="numero_processo" name="numero_processo" required>
            </div>
            <div class="form-group half">
                <label for="data_distribuicao">Data de Distribuição:</label>
                <input type="date" id="data_distribuicao" name="data_distribuicao" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nome_partes">Nome das Partes:</label>
            <input type="text" id="nome_partes" name="nome_partes" required>
        </div>
        <div class="form-group">
            <label for="advogados">Advogados:</label>
            <input type="text" id="advogados" name="advogados" required>
        </div>
        <div class="grid">
        <div class="form-group half">
            <label for="juiz_responsavel">Juiz Responsável:</label>
            <input type="text" id="juiz_responsavel" name="juiz_responsavel" required>
        </div>
        <div class="form-group half">
            <label for="tribunal">Tribunal:</label>
            <input type="text" id="tribunal" name="tribunal" required>
        </div>
        </div>
       

      
        <div class="grid">
            <div class="form-group half">
                <label for="data_peticao_inicial">Data de Petição Inicial:</label>
                <input type="date" id="data_peticao_inicial" name="data_peticao_inicial" required>
            </div>
            <div class="form-group half">
                <label for="situacao">Situação:</label>
                <input type="text" id="situacao" name="situacao" required>
            </div>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
        </div>


        <button id="show-optional" type="button">Mostrar Campos Opcionais</button>

       
        <div id="optional-fields">
            <div class="grid">
                <div class="form-group half">
                    <label for="data_contestacao">Data de Contestação:</label>
                    <input type="date" id="data_contestacao" name="data_contestacao">
                </div>
                <div class="form-group half">
                    <label for="data_audiencia_conciliacao">Data de Audiência de Conciliação:</label>
                    <input type="date" id="data_audiencia_conciliacao" name="data_audiencia_conciliacao">
                </div>
            </div>
            <div class="form-group">
                <label for="decisoes_interlocutorias">Decisões Interlocutórias:</label>
                <input type="text" id="decisoes_interlocutorias" name="decisoes_interlocutorias">
            </div>
            <div class="grid">
                <div class="form-group half">
                    <label for="data_sentenca">Data de Sentença:</label>
                    <input type="date" id="data_sentenca" name="data_sentenca">
                </div>
                <div class="form-group half">
                    <label for="valor_causa">Valor da Causa:</label>
                    <input type="text" id="valor_causa" name="valor_causa">
                </div>
            </div>
            <div class="form-group">
                <label for="data_intimacao">Data de Intimação:</label>
                <input type="date" id="data_intimacao" name="data_intimacao">
            </div>
        </div>

     
        <div class="form-actions">
            <input type="submit" value="Criar Processo">
        </div>
    </form>

    <script>
        document.getElementById("show-optional").addEventListener("click", function() {
            var optionalFields = document.getElementById("optional-fields");
            if (optionalFields.style.display === "none" || optionalFields.style.display === "") {
                optionalFields.style.display = "block";
                this.textContent = "Esconder Campos Opcionais";
            } else {
                optionalFields.style.display = "none";
                this.textContent = "Mostrar Campos Opcionais";
            }
        });
    </script>
</body>
</html>
