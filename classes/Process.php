<?php
class Process {
    private $numeroProcesso;
    private $dataDistribuicao;
    private $nomePartes;
    private $advogados;
    private $juizResponsavel;
    private $tribunal;
    private $dataPeticaoInicial;
    private $dataContestacao;
    private $dataAudienciaConciliacao;
    private $decisoesInterlocutorias;
    private $dataSentenca;
    private $valorCausa;
    private $dataIntimacao;
    private $situacao; // Novo campo
    private $descricao; // Novo campo

    public function __construct($numeroProcesso, $dataDistribuicao, $nomePartes, $advogados, $juizResponsavel, $tribunal, 
                                $dataPeticaoInicial, $dataContestacao, $dataAudienciaConciliacao, $decisoesInterlocutorias, 
                                $dataSentenca, $valorCausa, $dataIntimacao, $situacao, $descricao) { // Atualizado
        $this->numeroProcesso = $numeroProcesso;
        $this->dataDistribuicao = $dataDistribuicao;
        $this->nomePartes = $nomePartes;
        $this->advogados = $advogados;
        $this->juizResponsavel = $juizResponsavel;
        $this->tribunal = $tribunal;
        $this->dataPeticaoInicial = $dataPeticaoInicial;
        $this->dataContestacao = $dataContestacao;
        $this->dataAudienciaConciliacao = $dataAudienciaConciliacao;
        $this->decisoesInterlocutorias = $decisoesInterlocutorias;
        $this->dataSentenca = $dataSentenca;
        $this->valorCausa = $valorCausa;
        $this->dataIntimacao = $dataIntimacao;
        $this->situacao = $situacao;
        $this->descricao = $descricao;
    }

    // Getters e Setters para todos os campos
    public function getNumeroProcesso() { return $this->numeroProcesso; }
    public function getDataDistribuicao() { return $this->dataDistribuicao; }
    public function getNomePartes() { return $this->nomePartes; }
    public function getAdvogados() { return $this->advogados; }
    public function getJuizResponsavel() { return $this->juizResponsavel; }
    public function getTribunal() { return $this->tribunal; }
    public function getDataPeticaoInicial() { return $this->dataPeticaoInicial; }
    public function getDataContestacao() { return $this->dataContestacao; }
    public function getDataAudienciaConciliacao() { return $this->dataAudienciaConciliacao; }
    public function getDecisoesInterlocutorias() { return $this->decisoesInterlocutorias; }
    public function getDataSentenca() { return $this->dataSentenca; }
    public function getValorCausa() { return $this->valorCausa; }
    public function getDataIntimacao() { return $this->dataIntimacao; }
    public function getSituacao() { return $this->situacao; } // Novo getter
    public function getDescricao() { return $this->descricao; } // Novo getter

    public function setSituacao($situacao) { $this->situacao = $situacao; } // Novo setter
    public function setDescricao($descricao) { $this->descricao = $descricao; } // Novo setter
}
?>
