<?php

require "util/conexao.php";
include "Cliente.php";

interface iRepositorioCliente {

    public function cadastrarCliente($cliente,$codigo);

    public function removerCliente($codigo);

    public function getListaClientes();

    public function getCliente($codigo);
}

class RepositorioClienteMySQL implements iRepositorioCliente {
    
	private $conexao;
    public function __construct() {
        $this->conexao = new Conexao("localhost", "root", "5365462@", "transportline");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarCliente($cliente,$codigo) {
		$sql = Null;
        $nome = $cliente->getNome();
        $rg = $cliente->getRg();
        $cpf = $cliente->getCpf();
        $endereco = $cliente->getEndereco();
        $cidade = $cliente->getCidade();
        $uf = $cliente->getUf();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();
        $senha = $cliente->getSenha();
        $senhaCriptografada = $cliente->getSenhaCriptografada();
        $nivel = $cliente->getnivel_acesso();
		
		if(isset($codigo)){
		$sql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',endereco='$endereco', cidade='$cidade',telefone='$telefone', uf='$uf', email='$email', senha='$senha', senha_criptografada='$senhaCriptografada', nivel_acesso='$nivel' WHERE id=$codigo";
		}else{
        $sql = "INSERT INTO `cliente`(`id`, `nome`,`rg`,`cpf`,`endereco`,`cidade`,`uf`, `telefone`, `email`, `senha`, `senha_criptografada`, `nivel_acesso`) VALUES (NULL,'$nome','$rg','$cpf','$endereco','$cidade','$uf','$telefone','$email','$senha','$senhaCriptografada',$nivel)";
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
                    $row['id'], $row['nome'],$row['rg'],$row['cpf'],$row['endereco'],$row['cidade'],$row['uf'], $row['telefone'], $row['email'], $row['nivel_acesso']);
            array_push($arrayCliente, $Cliente);
        }
        return $arrayCliente;
    }
    public function getCliente($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cliente where id = '$codigo'");
        
             $Cliente = new Cliente(
                    $row['id'], $row['nome'],$row['rg'],$row['cpf'],$row['endereco'],$row['cidade'],$row['uf'], $row['telefone'], $row['email'], $row['nivel_acesso']);
					
        return $Cliente;
    }

}

$repositorio = new RepositorioClienteMySQL();
?>