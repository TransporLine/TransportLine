<?php

require_once "util/conexao.php";
include "Cliente.php";

interface iRepositorioCliente {

    public function cadastrarCliente($cliente, $codigo);

    public function removerCliente($codigo);

    public function getListaClientes();

    public function getCliente($codigo);

    public function getClienteIdUsuario($codigo);
}

class RepositorioClienteMySQL implements iRepositorioCliente {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarCliente($cliente, $codigo) {
        $sql = Null;
        $nome = $cliente->getNome();
        $rg = $cliente->getRg();
        $cpf = $cliente->getCpf();
        $endereco = $cliente->getEndereco();
        $cidade = $cliente->getCidade();
        $uf = $cliente->getUf();
        $telefone = $cliente->gettelefone();
        $idUsuario = $cliente->getIdUsuario();
       

        if (isset($codigo)) {
            $sql = "UPDATE cliente SET nome='$nome',idUsuario='$idUsuario' WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO `cliente`(`id`, `nome`,`rg`,`cpf`,`endereco`,`cidade`,`uf`, `telefone`, `idUsuario`) VALUES (NULL,'$nome','$rg','$cpf','$endereco','$cidade','$uf','$telefone','$idUsuario')";
        }

        $this->conexao->executarQuery($sql);
    }

    public function removerCliente($codigo) {
        $sql = "DELETE FROM cliente WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaClientes() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM cliente");

        $arrayCliente = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Cliente = new Cliente(
                    $row['id'], $row['nome'], $row['rg'], $row['cpf'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idUsuario']);
            array_push($arrayCliente, $Cliente);
        }
        return $arrayCliente;
    }

    public function getCliente($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cliente where id = '$codigo'");

        $Cliente = new Cliente(
                $row['id'], $row['nome'], $row['rg'], $row['cpf'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idUsuario']);

        return $Cliente;
    }

    public function getClienteIdUsuario($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cliente where idUsuario = '$codigo'");

        $Cliente = new Cliente(
                $row['id'], $row['nome'], $row['rg'], $row['cpf'], $row['endereco'], $row['cidade'], $row['uf'], $row['telefone'], $row['idUsuario']);

        return $Cliente;
    }

}

$repositorio = new RepositorioClienteMySQL();
?>