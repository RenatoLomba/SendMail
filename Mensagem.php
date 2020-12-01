<?php

class Mensagem {
    private $destino;
    private $assunto;
    private $mensagem;

    public function __set($attr, $valor) {
        $this->$attr = $valor;
    }
    public function __get($attr) {
        return $this->$attr;
    }
    public function MensagemValida() {
        if(empty($this->destino)){
            throw new Exception("Destino inválido");
        } else if(empty($this->assunto)){
            throw new Exception("Assunto inválido");
        } else if(empty($this->mensagem)){
            throw new Exception("Mensagem inválida");
        } else {
            return true;
        }
    }
}

?>