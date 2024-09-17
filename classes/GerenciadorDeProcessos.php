<?php
class GerenciadorDeProcessos {
    private $processo_prototipo;

    public function __construct(Process $processo_prototipo) {
        $this->processo_prototipo = $processo_prototipo;
    }

    public function clonarProcesso() {
        return clone $this->processo_prototipo;
    }
}
?>
