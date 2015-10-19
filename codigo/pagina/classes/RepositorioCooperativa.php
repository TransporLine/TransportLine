<?php

require_once "util/conexao.php";
include_once "Cooperativa.php";

interface iRepositorioCooperativa {

    public function cadastrarCooperativa($cooperativa, $codigo);

    public function removerCooperativa($codigo);

    public function getListaCooperativas();

    public function getListaCooperativasSituacao($situacao);

    public function getCooperativa($codigo);

    public function getCooperativaIdUsuario($codigo);
}

class RepositorioCooperativaMySQL implements iRepositorioCooperativa {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarCooperativa($Cooperativa, $codigo) {
        $sql = Null;

        $nome = $Cooperativa->getNome();
        $endereco = $Cooperativa->getEndereco();
        $cidade = $Cooperativa->getCidade();
        $uf = $Cooperativa->getUf();
        $telefone = $Cooperativa->getTelefone();
        $liberado = $Cooperativa->getLiberado();
        $idUsuario = $Cooperativa->getIdUsuario();

        if (isset($codigo)) {
            $sql = "UPDATE cooperativa SET "
                    . "nome='$nome',"
                    . "endereco='$endereco',"
                    . " cidade='$cidade',"
                    . "uf='$uf', "
                    . "telefone='$telefone', "
                    . "liberado = '$liberado',"
                    . " idUsuario='$idUsuario'"
                    . " WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO `cooperativa`(`id`,"
                    . " `nome`, "
                    . "`endereco`,"
                    . " `cidade`, "
                    . "`uf`,"
                    . " `telefone`,"
                    . " `liberado`,"
                    . " `idUsuario`)"
                    . " VALUES (null,"
                    . "' $nome',"
                    . "' $endereco',"
                    . "' $cidade',"
                    . "' $uf',"
                    . "' $telefone',"
                    . "' $liberado',"
                    . "' $idUsuario')";
        }

        $this->conexao->executarQuery($sql);
    }

    public function removerCooperativa($codigo) {
        $sql = "DELETE FROM Cooperativa WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaCooperativas() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM Cooperativa");

        $arrayCooperativa = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Cooperativa = new Cooperativa(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['liberado'], $row['idUsuario']);
            array_push($arrayCooperativa, $Cooperativa);
        }
        return $arrayCooperativa;
    }

    public function getListaCooperativasSituacao($situacao) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM Cooperativa where liberado ='$situacao'");

        $arrayCooperativa = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Cooperativa = new Cooperativa(
                    $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['liberado'], $row['idUsuario']);
            array_push($arrayCooperativa, $Cooperativa);
        }
        return $arrayCooperativa;
    }

    public function getCooperativa($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cooperativa where id = '$codigo'");

        $Cooperativa = new Cooperativa(
                $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['liberado'], $row['idUsuario']);

        return $Cooperativa;
    }

    public function getCooperativaIdUsuario($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cooperativa where idUsuario = '$codigo'");

        $Cooperativa = new Cooperativa(
                $row['id'], $row['nome'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['liberado'], $row['idUsuario']);

        return $Cooperativa;
    }

}

$repositorioCooperativa = new RepositorioCooperativaMySQL();
?>