<?php

require "util/conexao.php";
include "Mototaxi.php";

interface iRepositorioMototaxi {

    public function cadastrarMototaxi($mototaxi, $codigo);

    public function removerMototaxi($codigo);

    public function getListaMototaxi();

    public function getMototaxi($codigo);
}

class RepositorioMototaxiMySQL implements iRepositorioMototaxi {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "root", "5365462@", "transportline");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarMototaxi($mototaxi, $codigo) {
        $sql = Null;

        $nome = $mototaxi->getNome();
        $telefone = $mototaxi->getTelefone();
        $idCooperativa = $mototaxi->getidCooperativa();
        $idPonto = $mototaxi->getidPonto();
        $cpf = $mototaxi->getCpf();
        $email = $mototaxi->getEmail();
        $senha = $mototaxi->getSenha();
        $senhaCriptografada = $Mototaxi->getSenhaCriptografada();
        $nivel = $mototaxi->getnivel_acesso();
        $liberado = $mototaxi->getliberado();

        if (isset($codigo)) {
            $sql = "UPDATE mototaxi SET "
                    . "nome='$nome',"
                    . " telefone='$telefone', "
                    . "idCooperativa ='$idCooperativa',"
                    . "idPonto ='$idPonto', cpf='$cpf',"
                    . " email='$email', senha='$senha',"
                    . " senha_criptografada='$senhaCriptografada',"
                    . " nivel_acesso='$nivel' WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO `mototaxi`(`id`, "
                    . "`nome`,"
                    . " `telefone`,"
                    . " `idCooperativa`,"
                    . " `idPonto`,"
                    . " `cpf`,"
                    . " `email`,"
                    . " `senha`,"
                    . " `senha_criptografada`,"
                    . " `nivel_acesso`) VALUES (NULL,"
                    . "'$nome',"
                    . "'$telefone',"
                    . "'$idCooperativa',"
                    . "'$idPonto',"
                    . "'$cpf',"
                    . "'$email',"
                    . "'$senha',"
                    . "'$senhaCriptografada'"
                    . ",$nivel)";
        }

        $this->conexao->executarQuery($sql);
    }

    public function removerMototaxi($codigo) {
        $sql = "DELETE FROM Mototaxi WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaMototaxi() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM Mototaxi");

        $arrayMototaxi = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Mototaxi = new Mototaxi(
                    $row['id'], $row['Nome'], $row['telefone'], $row['email'], $row['nivel_acesso']);
            array_push($arrayMototaxi, $Mototaxi);
        }
        return $arrayMototaxi;
    }

    public function getMototaxi($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM mototaxi where id = '$codigo'");

        $Mototaxi = new Mototaxi(
                $row['id'], $row['nome'], $row['telefone'], $row['email'], $row['senha'], $row['senha_criptografada'], $row['nivel_acesso']);

        return $Mototaxi;
    }

}

$repositorio = new RepositorioMototaxiMySQL();
?>