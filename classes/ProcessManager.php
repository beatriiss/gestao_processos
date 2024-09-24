<?php
require_once 'Database.php';
require_once 'ConcreteProcess.php';

class ProcessManager {
    private static $instance = null; 
    private $dbConnection;
    private $processPrototype;


    private function __construct() {
        $this->dbConnection = Database::getInstance()->getConnection();
        $this->processPrototype = new ConcreteProcess(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    }


    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ProcessManager();
        }
        return self::$instance;
    }

    public function createProcess($numeroProcesso, $dataDistribuicao, $nomePartes, $advogados, $juizResponsavel, $tribunal, $dataPeticaoInicial, $dataContestacao = null, $dataAudienciaConciliacao = null, $decisoesInterlocutorias = null, $dataSentenca = null, $valorCausa = null, $dataIntimacao = null, $situacao = null, $descricao = null) {
        $process = $this->processPrototype->cloneProcess();
        $process->setNumeroProcesso($numeroProcesso);
        $process->setDataDistribuicao($dataDistribuicao);
        $process->setNomePartes($nomePartes);
        $process->setAdvogados($advogados);
        $process->setJuizResponsavel($juizResponsavel);
        $process->setTribunal($tribunal);
        $process->setDataPeticaoInicial($dataPeticaoInicial);

        $query = "INSERT INTO processos (numero_processo, data_distribuicao, nome_partes, advogados, juiz_responsavel, tribunal, data_peticao_inicial, data_contestacao, data_audiencia_conciliacao, decisoes_interlocutorias, data_sentenca, valor_causa, data_intimacao, situacao, descricao) VALUES (:numero_processo, :data_distribuicao, :nome_partes, :advogados, :juiz_responsavel, :tribunal, :data_peticao_inicial, :data_contestacao, :data_audiencia_conciliacao, :decisoes_interlocutorias, :data_sentenca, :valor_causa, :data_intimacao, :situacao, :descricao)";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':numero_processo', $numeroProcesso);
        $stmt->bindParam(':data_distribuicao', $dataDistribuicao);
        $stmt->bindParam(':nome_partes', $nomePartes);
        $stmt->bindParam(':advogados', $advogados);
        $stmt->bindParam(':juiz_responsavel', $juizResponsavel);
        $stmt->bindParam(':tribunal', $tribunal);
        $stmt->bindParam(':data_peticao_inicial', $dataPeticaoInicial);

        if ($dataContestacao === '') {
            $stmt->bindValue(':data_contestacao', null);
        } else {
            $stmt->bindParam(':data_contestacao', $dataContestacao);
        }

        if ($dataAudienciaConciliacao === '') {
            $stmt->bindValue(':data_audiencia_conciliacao', null);
        } else {
            $stmt->bindParam(':data_audiencia_conciliacao', $dataAudienciaConciliacao);
        }

        if ($decisoesInterlocutorias === '') {
            $stmt->bindValue(':decisoes_interlocutorias', null);
        } else {
            $stmt->bindParam(':decisoes_interlocutorias', $decisoesInterlocutorias);
        }

        if ($dataSentenca === '') {
            $stmt->bindValue(':data_sentenca', null);
        } else {
            $stmt->bindParam(':data_sentenca', $dataSentenca);
        }

        if ($valorCausa === '') {
            $stmt->bindValue(':valor_causa', null);
        } else {
            $stmt->bindParam(':valor_causa', $valorCausa);
        }

        if ($dataIntimacao === '') {
            $stmt->bindValue(':data_intimacao', null);
        } else {
            $stmt->bindParam(':data_intimacao', $dataIntimacao);
        }

        if ($situacao === '') {
            $stmt->bindValue(':situacao', null);
        } else {
            $stmt->bindParam(':situacao', $situacao);
        }

        if ($descricao === '') {
            $stmt->bindValue(':descricao', null);
        } else {
            $stmt->bindParam(':descricao', $descricao);
        }

        $stmt->execute();
        return $process;
    }

    public function getProcesses() {
        $query = "SELECT * FROM processos";
        $stmt = $this->dbConnection->query($query);
        $processes = array();
        while ($row = $stmt->fetch()) {
            $process = $this->processPrototype->cloneProcess();
            $process->setId($row['id']);
            $process->setNumeroProcesso($row['numero_processo']);
            $process->setDataDistribuicao($row['data_distribuicao']);
            $process->setNomePartes($row['nome_partes']);
            $process->setAdvogados($row['advogados']);
            $process->setJuizResponsavel($row['juiz_responsavel']);
            $process->setTribunal($row['tribunal']);
            $process->setDataPeticaoInicial($row['data_peticao_inicial']);
            $process->setDataContestacao($row['data_contestacao']);
            $process->setDataAudienciaConciliacao($row['data_audiencia_conciliacao']);
            $process->setDecisoesInterlocutorias($row['decisoes_interlocutorias']);
            $process->setDataSentenca($row['data_sentenca']);
            $process->setValorCausa($row['valor_causa']);
            $process->setDataIntimacao($row['data_intimacao']);
            $process->setSituacao($row['situacao']);
            $process->setDescricao($row['descricao']);
            $processes[] = $process;
        }
        return $processes;
    }
}
