<?php

require_once "util/conexao.php";
include "Mototaxi.php";
include 'Cidade.php';

interface iRepositorioMototaxi {

    public function cadastrarMototaxi($mototaxi, $codigo);

    public function removerMototaxi($codigo);

    public function getCidadeUF();

    public function getListaMototaxiCidadeUF($cidade, $uf);

    public function getListaMototaxi($idcooperativa);

    public function getMototaxi($codigo, $idcooperativa);

    public function getListaMototaxiSituacao($situacao, $idcooperativa);

    public function getListaMototaxiPonto($ponto);

    public function getMototaxiIdUsuario($codigo);

    public function getMototaxiId($codigo);
}

class RepositorioMototaxiMySQL implements iRepositorioMototaxi {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarMototaxi($mototaxi, $codigo) {
        $sql = Null;

        $nome = $mototaxi->getNome();
        $endereco = $mototaxi->getEndereco();
        $cidade = $mototaxi->getCidade();
        $uf = $mototaxi->getUf();
        $telefone = $mototaxi->getTelefone();
        $idCooperativa = $mototaxi->getIdCooperativa();
        $idPonto = $mototaxi->getIdPonto();
        $cpf = $mototaxi->getCpf();
        $preco_km = $mototaxi->getPreco_km();
        $disponivel = $mototaxi->getDisponivel();
        $liberado = $mototaxi->getLiberado();
        $idUsuario = $mototaxi->getIdUsuario();

        if (isset($codigo)) {
            $sql = "UPDATE mototaxi SET"
                    . "nome = '$nome',"
                    . "endereco = '$endereco',"
                    . "cidade = '$cidade',"
                    . "uf = '$uf',"
                    . "telefone = '$telefone',"
                    . "idCooperativa = '$idCooperativa',"
                    . "idPonto = '$idPonto',"
                    . "cpf = '$cpf',"
                    . "preco_por_km = '$preco_km',"
                    . "disponivel = '$disponivel',"
                    . "liberado = '$liberado',"
                    . "idUsuario = '$idUsuario' WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO mototaxi(`id`, `nome`, `endereco`, `cidade`, `uf`, `telefone`, `idCooperativa`, `idPonto`, `cpf`, `preco_por_km`, `disponivel`, `liberado`, `idUsuario`) VALUES (NULL,"
                    . "'$nome',"
                    . "'$endereco',"
                    . "'$cidade',"
                    . "'$uf',"
                    . "'$telefone',"
                    . "'$idCooperativa',"
                    . "'$idPonto',"
                    . "'$cpf',"
                    . "'$preco_km',"
                    . "'$disponivel',"
                    . "'$liberado'"
                    . ",'$idUsuario')";
        }

        $this->conexao->executarQuery($sql);
    }

    public function removerMototaxi($codigo) {
        $sql = "DELETE FROM Mototaxi WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaMototaxi($idcooperativa) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM mototaxi WHERE idCooperativa=$idcooperativa");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Mototaxi = new Mototaxi(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);
            array_push($arrayMototaxi, $Mototaxi);
        }
        return $arrayMototaxi;
    }

    public function getCidadeUF() {
        $listagem = $this->conexao->executarQuery("SELECT distinct cidade,uf FROM mototaxi");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $cidade = new Cidade(
                    null, $row['cidade'], $row['uf']);
            array_push($arrayMototaxi, $cidade);
        }
        return $arrayMototaxi;
    }

    public function getListaMototaxiCidadeUF($cidade, $uf) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM mototaxi WHERE cidade = '$cidade' and uf = '$uf'");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Mototaxi = new Mototaxi(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);
            array_push($arrayMototaxi, $Mototaxi);
        }
        return $arrayMototaxi;
    }

    public function getMototaxi($codigo, $idcooperativa) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM mototaxi where id = '$codigo' and idCooperativa = $idcooperativa");

        $Mototaxi = new Mototaxi(
                $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);

        return $Mototaxi;
    }

    public function getListaMototaxiSituacao($situacao, $idcooperativa) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM mototaxi where liberado = '$situacao' and idcooperativa = $idcooperativa");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Mototaxi = new Mototaxi(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);
            array_push($arrayMototaxi, $Mototaxi);
        }
        return $arrayMototaxi;
    }

    public function getListaMototaxiPonto($idponto) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM mototaxi where idPonto = '$idponto'");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Mototaxi = new Mototaxi(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);
            array_push($arrayMototaxi, $Mototaxi);
        }
        return $arrayMototaxi;
    }

    public function getMototaxiIdUsuario($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM mototaxi where idUsuario = '$codigo'");

        $Mototaxi = new Mototaxi(
                $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);

        return $Mototaxi;
    }

    public function getMototaxiId($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM mototaxi where id = '$codigo'");

        $Mototaxi = new Mototaxi(
                $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idCooperativa'], $row['idPonto'], $row['cpf'], $row['preco_por_km'], $row['disponivel'], $row['liberado'], $row['idUsuario']);

        return $Mototaxi;
    }

}

$repositorioMototaxi = new RepositorioMototaxiMySQL();
?>