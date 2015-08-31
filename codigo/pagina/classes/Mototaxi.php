<?php

class Mototaxi {

    private $codigo;
    private $nome;
    private $telefone;
    private $idCooperativa;
    private $idPonto;
    private $cpf;
    private $email;
    private $senha;
    private $senha_criptografada;
    private $nivel_acesso;
    private $liberado;

    public function __construct($codigo, $nome, $telefone, $idCooperativa, $idPonto, $cpf, $email, $senha, $senha_criptografada, $nivel_acesso, $liberado) {

        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->idCooperativa = $idCooperativa;
        $this->idPonto = $idPonto;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->senha_criptografada = $senha_criptografada;
        $this->nivel_acesso = $nivel_acesso;
        $this->liberado = $liberado;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getIdCooperativa() {
        return $this->idCooperativa;
    }

    function getIdPonto() {
        return $this->idPonto;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getSenha_criptografada() {
        return $this->senha_criptografada;
    }

    function getNivel_acesso() {
        return $this->nivel_acesso;
    }

    function getLiberado() {
        return $this->liberado;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setIdCooperativa($idCooperativa) {
        $this->idCooperativa = $idCooperativa;
    }

    function setIdPonto($idPonto) {
        $this->idPonto = $idPonto;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setSenha_criptografada($senha_criptografada) {
        $this->senha_criptografada = $senha_criptografada;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setLiberado($liberado) {
        $this->liberado = $liberado;
    }

}
?>

