<?php
require "util/conexao.php";

interface iRepositorioLiberacao{

    public function liberarCadastro($nivel, $codigo, $valor);
}

class RepositorioAdministradorMySQL implements iRepositorioLiberacao {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function liberarCadastro($nivel, $codigo, $valor) {
        $sql = Null;
        
        switch ($nivel){
            case '2': $sql = "UPDATE cooperativa SET liberado = $valor WHERE id = $codigo";
                break;
            case '3': $sql = "UPDATE mototaxi SET liberado = $valor WHERE id = $codigo";
                break;
        }
        $this->conexao->executarQuery($sql);
    }
} 
$liberacao = new RepositorioAdministradorMySQL();
?>