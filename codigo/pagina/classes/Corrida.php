<?php

class Corrida {

    private $codigo;
    private $idCliente;
    private $idMototaxi;
    private $pontoReferencia;
    private $pontoInicio;
    private $pontoFim;
    private $valorEstimado;
    private $status;

    public function __construct($codigo, $idCliente, $idMototaxi, $pontoReferencia, $pontoInicio, $pontoFim, $valorEstimado,$status) {
        $this->codigo = $codigo;
        $this->idCliente = $idCliente;
        $this->idMototaxi = $idMototaxi;
        $this->pontoReferencia = $pontoReferencia;
        $this->pontoInicio = $pontoInicio;
        $this->pontoFim = $pontoFim;
        $this->valorEstimado = $valorEstimado;
        $this->status = $status;
    }
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        function getCodigo() {
        return $this->codigo;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function getIdMototaxi() {
        return $this->idMototaxi;
    }

    function getPontoReferencia() {
        return $this->pontoReferencia;
    }

    function getPontoInicio() {
        return $this->pontoInicio;
    }

    function getPontoFim() {
        return $this->pontoFim;
    }

    function getValorEstimado() {
        return $this->valorEstimado;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setIdMototaxi($idMototaxi) {
        $this->idMototaxi = $idMototaxi;
    }

    function setPontoReferencia($pontoReferencia) {
        $this->pontoReferencia = $pontoReferencia;
    }

    function setPontoInicio($pontoInicio) {
        $this->pontoInicio = $pontoInicio;
    }

    function setPontoFim($pontoFim) {
        $this->pontoFim = $pontoFim;
    }

    function setValorEstimado($valorEstimado) {
        $this->valorEstimado = $valorEstimado;
    }

}

?>