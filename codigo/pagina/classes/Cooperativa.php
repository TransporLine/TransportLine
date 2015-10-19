<?php

class Cooperativa {

    private $codigo;
    private $nome;
    private $endereco;
    private $cidade;
    private $uf;
    private $telefone;
    private $liberado;
    private $idUsuario;

    public function __construct($codigo, $nome, $endereco, $cidade, $uf, $telefone, $liberado, $idUsuario) {
    $this-> codigo = $codigo;
    $this-> nome = $nome;
    $this-> endereco = $endereco;
    $this->  cidade= $cidade;
    $this-> uf = $uf;
    $this->  telefone= $telefone;
    $this-> liberado= $liberado;
    $this-> idUsuario= $idUsuario;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNivel_acesso() {
        return $this->nivel_acesso;
    }

    function getLiberado() {
        return $this->liberado;
    }
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setLiberado($liberado) {
        $this->liberado = $liberado;
    }
    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}
?>

