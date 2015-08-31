<?php

require "util/conexao.php";
include "Cooperativa.php";

interface iRepositorioCooperativa {

    public function cadastrarCooperativa($cooperativa,$codigo);

    public function removerCooperativa($codigo);

    public function getListaCooperativaes();

    public function getCooperativa($codigo);
}

class RepositorioCooperativaMySQL implements iRepositorioCooperativa {
    
	private $conexao;
    public function __construct() {
        $this->conexao = new Conexao("localhost", "root", "5365462@", "transportline");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarCooperativa($Cooperativa,$codigo) {
        $sql = Null;
        $nome = $Cooperativa->getNome();
        $telefone = $Cooperativa->getTelefone();
        $email = $Cooperativa->getEmail();
        $senha = $Cooperativa->getSenha();
        $senhaCriptografada = $Cooperativa->getSenhaCriptografada();
        $nivel = $Cooperativa->getnivel_acesso();
		
		if(isset($codigo)){
		$sql = "UPDATE cooperativa SET nome='$nome', telefone='$telefone', email='$email', senha='$senha', senha_criptografada='$senhaCriptografada', nivel_acesso='$nivel' WHERE id=$codigo";
		}else{
        $sql = "INSERT INTO `cooperativa`(`id`, `nome`, `telefone`, `email`, `senha`, `senha_criptografada`, `nivel_acesso`) VALUES (NULL,'$nome','$telefone','$email','$senha','$senhaCriptografada',$nivel)";
		}
		
        $this->conexao->executarQuery($sql);
    }

    public function removerCooperativa($codigo) {
        $sql = "DELETE FROM Cooperativa WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaCooperativaes() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM Cooperativa");
       
        $arrayCooperativa = array();
        
        while ($row = mysqli_fetch_array($listagem)) {
            $Cooperativa = new Cooperativa(
                    $row['id'], $row['Nome'], $row['telefone'], $row['email'], $row['nivel_acesso']);
            array_push($arrayCooperativa, $Cooperativa);
        }
        return $arrayCooperativa;
    }
    public function getCooperativa($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM cooperativa where id = '$codigo'");
        
            $Cooperativa = new Cooperativa(
                    $row['id'], $row['nome'], $row['telefone'], $row['email'], $row['senha'], $row['senha_criptografada'], $row['nivel_acesso']);

        return $Cooperativa;
    }

}

$repositorio = new RepositorioCooperativaMySQL();
?>