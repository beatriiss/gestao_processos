<?php
abstract class ProcessPrototype {
    protected $id;
    protected $numeroProcesso;
    protected $dataDistribuicao;
    protected $nomePartes;
    protected $advogados;
    protected $juizResponsavel;
    protected $tribunal;
    protected $dataPeticaoInicial;
    protected $dataContestacao;
    protected $dataAudienciaConciliacao;
    protected $decisoesInterlocutorias;
    protected $dataSentenca;
    protected $valorCausa;
    protected $dataIntimacao;
    protected $situacao;
    protected $descricao;

    public function __construct($numeroProcesso, $dataDistribuicao, $nomePartes, $advogados, $juizResponsavel, $tribunal, $dataPeticaoInicial, $dataContestacao, $dataAudienciaConciliacao, $decisoesInterlocutorias, $dataSentenca, $valorCausa, $dataIntimacao, $situacao, $descricao) {
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

    public function getId() {
        return $this->id;
    }

    public function getNumeroProcesso() {
        return $this->numeroProcesso;
    }

    public function getDataDistribuicao() {
        return $this->dataDistribuicao;
    }

    public function getNomePartes() {
        return $this->nomePartes;
    }

    public function getAdvogados() {
        return $this->advogados;
    }

    public function getJuizResponsavel() {
        return $this->juizResponsavel;
    }

    public function getTribunal() {
        return $this->tribunal;
    }

    public function getDataPeticaoInicial() {
        return $this->dataPeticaoInicial;
    }

    public function getDataContestacao() {
        return $this->dataContestacao;
    }

    public function getDataAudienciaConciliacao() {
        return $this->dataAudienciaConciliacao;
    }

    public function getDecisoesInterlocutorias() {
        return $this->decisoesInterlocutorias;
    }

    public function getDataSentenca() {
        return $this->dataSentenca;
    }

    public function getValorCausa() {
        return $this->valorCausa;
    }

    public function getDataIntimacao() {
        return $this->dataIntimacao;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function setNumeroProcesso($numeroProcesso) {
        $this->numeroProcesso = $numeroProcesso;
    }

    public function setDataDistribuicao($dataDistribuicao) {
        $this->dataDistribuicao = $dataDistribuicao;
    }

    public function setNomePartes($nomePartes) {
        $this->nomePartes = $nomePartes;
    }

    public function setAdvogados($advogados) {
        $this->advogados = $advogados;
    }

    public function setJuizResponsavel($juizResponsavel) {
        $this->juizResponsavel = $juizResponsavel;
    }

    public function setTribunal($tribunal) {
        $this->tribunal = $tribunal;
    }

    public function setDataPeticaoInicial($dataPeticaoInicial) {
        $this->dataPeticaoInicial = $dataPeticaoInicial;
    }

    public function setDataContestacao($dataContestacao) {
        $this->dataContestacao = $dataContestacao;
    }

    public function setDataAudienciaConciliacao($dataAudienciaConciliacao) {
        $this->dataAudienciaConciliacao = $dataAudienciaConciliacao;
    }

    public function setDecisoesInterlocutorias($decisoesInterlocutorias) {
        $this->decisoesInterlocutorias = $decisoesInterlocutorias;
    }

    public function setDataSentenca($dataSentenca) {
        $this->dataSentenca = $dataSentenca;
    }

    public function setValorCausa($valorCausa) {
        $this->valorCausa = $valorCausa;
    }

    public function setDataIntimacao($dataIntimacao) {
        $this->dataIntimacao = $dataIntimacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }


    public abstract function cloneProcess();
}