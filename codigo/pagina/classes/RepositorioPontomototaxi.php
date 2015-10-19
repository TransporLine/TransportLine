<?php

require_once "util/conexao.php";
include "Pontomototaxi.php";

interface iRepositorioPonto {

    public function cadastrarPonto($ponto, $codigo);

    public function removerPonto($codigo);

    public function getListaPontos();

    public function getPonto($codigo);

    public function getPontoIdCooperativa($codigo);
}

class RepositorioPontoMySQL implements iRepositorioPonto {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarPonto($ponto, $codigo) {
        $sql = Null;
        $nome = $ponto->getNome();
        $endereco = $ponto->getEndereco();
        $latitude = $ponto->getLatitude();
        $longitude = $ponto->getLongitude();
        $idCooperativa = $ponto->getIdCooperativa();

        if (isset($codigo)) {
            $sql = "UPDATE `ponto_mototaxi` SET `nome`='$nome',`endereco`='$endereco',`latitude`=$latitude,`longitude`=$longitude,`cooperativa`=$idCooperativa WHERE id = $codigo";
        } else {
            $sql = "INSERT INTO `ponto_mototaxi`(`nome`, `endereco`, `latitude`, `longitude`, `cooperativa`) VALUES ('$nome','$endereco',$latitude,$longitude,$idCooperativa)";
            }

        $this->conexao->executarQuery($sql);
    }

    public function removerPonto($codigo) {
        $sql = "DELETE FROM ponto_mototaxi WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaPontos() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM ponto_mototaxi");

        $arrayPonto = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Ponto = new Ponto(
                    $row['id'], $row['nome'], $row['endereco'], $row['latitude'], $row['longitude'], $row['cooperativa']);
            array_push($arrayPonto, $Ponto);
        }
        return $arrayPonto;
    }

    public function getPonto($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM ponto_mototaxi where id = '$codigo'");

        $Ponto = new Ponto(
                $row['id'], $row['nome'], $row['endereco'], $row['latitude'], $row['longitude'], $row['cooperativa']);
        return $Ponto;
    }

    public function getPontoIdCooperativa($codigo) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM ponto_mototaxi where cooperativa = $codigo");

        $arrayPonto = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Ponto = new Ponto(
                    $row['id'], $row['nome'], $row['endereco'], $row['latitude'], $row['longitude'], $row['cooperativa']);
            array_push($arrayPonto, $Ponto);
        }
    }

}

$repositorioPonto = new RepositorioPontoMySQL();
?>