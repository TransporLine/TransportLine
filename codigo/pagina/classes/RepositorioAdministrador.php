<?php
require_once "util/conexao.php";
include "Administrador.php";

interface iRepositorioAdministrador {

    public function cadastrarAdministrador($administrador, $codigo);

    public function removerAdministrador($codigo);

    public function getListaAdministradores();

    public function getAdministrador($codigo);

    public function getAdministradorIdUsuario($codigo);
}

class RepositorioAdministradorMySQL implements iRepositorioAdministrador {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarAdministrador($Administrador, $codigo) {
        $sql = Null;
        $nome = $Administrador->getNome();
        $telefone = $Administrador->getTelefone();
        $idUsuario = $Administrador->getIdUsuario();

        if (isset($codigo)) {
            $sql = "UPDATE administrador SET nome='$nome', telefone='$telefone', idUsuario='$idUsuario' WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO `administrador`(`id`, `nome`, `telefone`, `idUsuario`) VALUES (NULL,'$nome','$telefone',$idUsuario)";
        }

        $this->conexao->executarQuery($sql);
    }

    public function removerAdministrador($codigo) {
        $sql = "DELETE FROM Administrador WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaAdministradores() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM Administrador");

        $arrayAdministrador = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Administrador = new Administrador(
                    $row['id'], $row['Nome'], $row['telefone'], $row['idUsuario']);
            array_push($arrayAdministrador, $Administrador);
        }
        return $arrayAdministrador;
    }

    public function getAdministrador($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM administrador where id = '$codigo'");

        $Administrador = new Administrador(
                $row['id'], $row['nome'], $row['telefone'], $row['idUsuario']);
        return $Administrador;
    }

    public function getAdministradorIdUsuario($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM administrador where idUsuario = '$codigo'");

        $Administrador = new Administrador(
                $row['id'], $row['nome'], $row['telefone'], $row['idUsuario']);
        return $Administrador;
    }

}

$repositorio = new RepositorioAdministradorMySQL();
?>