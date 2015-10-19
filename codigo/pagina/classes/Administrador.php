<?php

class Administrador {

    private $codigo;
    private $nome;
    private $telefone;
    private $idUsuario;

    public function __construct($codigo, $nome, $telefone, $idUsuario) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->idUsuario = $idUsuario;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
}
?>

