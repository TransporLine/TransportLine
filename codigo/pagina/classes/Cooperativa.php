<?php

class Cooperativa {

    private $codigo;
    private $nome;
    private $endereco;
    private $cidade;
    private $uf;
    private $telefone;
    private $email;
    private $senha;
    private $senhaCriptografada;
    private $nivel_acesso;
    private $liberado;

    public function __construct($codigo, $nome, $endereco, $cidade, $uf, $telefone, $email, $senha, $senhaCriptografada, $nivel_acesso, $liberado) {
    $this-> codigo = $codigo;
    $this-> nome = $nome;
    $this-> endereco = $endereco;
    $this->  cidade= $cidade;
    $this-> uf = $uf;
    $this->  telefone= $telefone;
    $this-> email = $email;
    $this-> senha = $senha;
    $this-> senhaCriptografada = $senhaCriptografada;
    $this->  nivel_acesso= $nivel_acesso;
    $this-> liberado= $liberado;
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

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getSenhaCriptografada() {
        return $this->senhaCriptografada;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setSenhaCriptografada($senhaCriptografada) {
        $this->senhaCriptografada = $senhaCriptografada;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setLiberado($liberado) {
        $this->liberado = $liberado;
    }

}
?>

