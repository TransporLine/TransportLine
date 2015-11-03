<?php
    class Cidade{
        private $codigo;
        private $cidade;
        private $uf;
        
        public function __construct($codigo, $cidade, $uf) {
            $this-> codigo = $codigo;
            $this->cidade = $cidade;
            $this-> uf = $uf;
            ;
        }
        
        function getCodigo() {
            return $this->codigo;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getUf() {
            return $this->uf;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        function setUf($uf) {
            $this->uf = $uf;
        }


    }
?>