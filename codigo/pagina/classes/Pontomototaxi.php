<?php

class Ponto {

    private $codigo;
    private $nome;
    private $endereco;
    private $latitude;
    private $longitude;
    private $idCooperativa;

    public function __construct($codigo, $nome, $endereco, $latitude, $longitude, $idCooperativa) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->idCooperativa = $idCooperativa;
    }
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

        function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getIdCooperativa() {
        return $this->idCooperativa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setIdCooperativa($idCooprativa) {
        $this->idCooperativa = $idCooprativa;
    }

}

?>
