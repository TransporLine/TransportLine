<?php

class Cliente {

    private $codigo;
    private $nome;
    private $rg;
    private $cpf;
    private $endereco;
    private $cidade;
    private $uf;
	private $telefone;
	private $idUsuario;

    public function __construct($codigo, $nome,$rg,$cpf,$endereco,$cidade,$uf, $telefone, $idUsuario) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->telefone = $telefone;
        $this->idUsuario = $idUsuario;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }
	 public function getRg() {
        return $this->rg;
    }
	 public function getCpf() {
        return $this->cpf;
    }
	 public function getEndereco() {
        return $this->endereco;
    }
	 public function getCidade() {
        return $this->cidade;
    }
	 public function getUf() {
        return $this->uf;
    }
    public function gettelefone() {
        return $this->telefone;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
	 public function setRg($rg) {
        $this->rg = $rg;
    }
	 public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
	 public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
	 public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
	 public function setUf($uf) {
        $this->uf = $uf;
    }

    public function settelefone($telefone) {
        $this->telefone = $telefone;
    }
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }


}
?>

