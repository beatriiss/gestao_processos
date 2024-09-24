<?php
require_once 'ProcessPrototype.php';
class ConcreteProcess extends ProcessPrototype {
    public function cloneProcess() {
        return clone $this;
    }
}