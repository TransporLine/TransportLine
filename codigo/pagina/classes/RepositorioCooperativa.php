<?php

require "util/conexao.php";
include "Administrador.php";

interface iRepositorioAdministrador {

    public function cadastrarAdministrador($administrador,$codigo);

    public function removerAdministrador($codigo);

    public function getListaAdministradores();

    public function getAdministrador($codigo);
}

class RepositorioAdministradorMySQL implements iRepositorioAdministrador {
    
	private $conexao;
    public function __construct() {
        $this->conexao = new Conexao("localhost", "root", "5365462@", "transportline");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarAdministrador($Administrador,$codigo) {
		$sql = Null;
        $nome = $Administrador->getNome();
        $telefone = $Administrador->getTelefone();
        $email = $Administrador->getEmail();
        $senha = $Administrador->getSenha();
        $senhaCriptografada = $Administrador->getSenhaCriptografada();
        $nivel = $Administrador->getnivel_acesso();
		
		if(isset($codigo)){
		$sql = "UPDATE administrador SET nome='$nome', telefone='$telefone', email='$email', senha='$senha', senha_criptografada='$senhaCriptografada', nivel_acesso='$nivel' WHERE id=$codigo";
		}else{
        $sql = "INSERT INTO `administrador`(`id`, `nome`, `telefone`, `email`, `senha`, `senha_criptografada`, `nivel_acesso`) VALUES (NULL,'$nome','$telefone','$email','$senha','$senhaCriptografada',$nivel)";
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
                    $row['id'], $row['Nome'], $row['telefone'], $row['email'], $row['nivel_acesso']);
            array_push($arrayAdministrador, $Administrador);
        }
        return $arrayAdministrador;
    }
    public function getAdministrador($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM administrador where id = '$codigo'");
        
            $Administrador = new Administrador(
                    $row['id'], $row['nome'], $row['telefone'], $row['email'], $row['senha'], $row['senha_criptografada'], $row['nivel_acesso']);

        return $Administrador;
    }

}

$repositorio = new RepositorioAdministradorMySQL();
?>