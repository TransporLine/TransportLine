<?php
class Mototaxi {

    private $codigo;
    private $nome;
    private $endereco;
    private $cidade;
    private $uf;
    private $telefone;
    private $idCooperativa;
    private $idPonto;
    private $cpf;
    private $preco_km;
    private $disponivel;
    private $liberado;
    private $idUsuario;

    public function __construct($codigo, $nome, $endereco,$cidade, $uf, $telefone, $idCooperativa, $idPonto, $cpf, $preco_km, $disponivel, $liberado, $idUsuario) {

        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->telefone = $telefone;
        $this->idCooperativa = $idCooperativa;
        $this->idPonto = $idPonto;
        $this->cpf = $cpf;
        $this->preco_km = $preco_km;
        $this->disponivel = $disponivel;
        $this->liberado = $liberado;
        $this->idUsuario = $idUsuario;
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

    function setLiberado($liberado) {
        $this->liberado = $liberado;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function getPreco_km() {
        return $this->preco_km;
    }

    function getDisponivel() {
        return $this->disponivel;
    }

    function setPreco_km($preco_km) {
        $this->preco_km = $preco_km;
    }

    function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }
    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }
}
?>

