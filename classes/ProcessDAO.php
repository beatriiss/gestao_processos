<?php
class ProcessDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function inserirProcesso(Process $processo) {
        $query = "INSERT INTO processos (
                      numero_processo, data_distribuicao, nome_partes, advogados, juiz_responsavel, tribunal, 
                      data_peticao_inicial, data_contestacao, data_audiencia_conciliacao, decisoes_interlocutorias, 
                      data_sentenca, valor_causa, data_intimacao, situacao, descricao
                  ) VALUES (
                      :numero_processo, :data_distribuicao, :nome_partes, :advogados, :juiz_responsavel, :tribunal, 
                      :data_peticao_inicial, :data_contestacao, :data_audiencia_conciliacao, :decisoes_interlocutorias, 
                      :data_sentenca, :valor_causa, :data_intimacao, :situacao, :descricao
                  )";
        $stmt = $this->db->prepare($query);
    
        // Associar variáveis aos parâmetros, definindo null para campos opcionais se não forem preenchidos
        $stmt->bindValue(':numero_processo', $processo->getNumeroProcesso());
        $stmt->bindValue(':data_distribuicao', $processo->getDataDistribuicao());
        $stmt->bindValue(':nome_partes', $processo->getNomePartes());
        $stmt->bindValue(':advogados', $processo->getAdvogados());
        $stmt->bindValue(':juiz_responsavel', $processo->getJuizResponsavel());
        $stmt->bindValue(':tribunal', $processo->getTribunal());
        $stmt->bindValue(':data_peticao_inicial', $processo->getDataPeticaoInicial() ?: null, PDO::PARAM_NULL);
        $stmt->bindValue(':data_contestacao', $processo->getDataContestacao() ?: null, PDO::PARAM_NULL);
        $stmt->bindValue(':data_audiencia_conciliacao', $processo->getDataAudienciaConciliacao() ?: null, PDO::PARAM_NULL);
        $stmt->bindValue(':decisoes_interlocutorias', $processo->getDecisoesInterlocutorias());
        $stmt->bindValue(':data_sentenca', $processo->getDataSentenca() ?: null, PDO::PARAM_NULL);
        $stmt->bindValue(':valor_causa', $processo->getValorCausa());
        $stmt->bindValue(':data_intimacao', $processo->getDataIntimacao() ?: null, PDO::PARAM_NULL);
        $stmt->bindValue(':situacao', $processo->getSituacao());
        $stmt->bindValue(':descricao', $processo->getDescricao());
    
        return $stmt->execute();
    }
    

    // Função para obter todos os processos
    public function lerProcessos() {
        $query = "SELECT * FROM processos";
        $stmt = $this->db->query($query);
        $processos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $processos[] = new Process(
                $row['numero_processo'], $row['data_distribuicao'], $row['nome_partes'], $row['advogados'],
                $row['juiz_responsavel'], $row['tribunal'], $row['data_peticao_inicial'], $row['data_contestacao'], 
                $row['data_audiencia_conciliacao'], $row['decisoes_interlocutorias'], $row['data_sentenca'], 
                $row['valor_causa'], $row['data_intimacao'], $row['situacao'], $row['descricao']
            );
        }

        return $processos;
    }
}
?>
