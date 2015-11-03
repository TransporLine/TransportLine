<?php

require_once "util/conexao.php";
include "Corrida.php";

interface iRepositorioCorrida {

    public function cadastrarCorrida($corrida, $codigo);

    public function removerCorrida($codigo);

    public function getListaCorridas();

    public function getCorridaId($codigo, $requisitante, $status);
    
    public function getCorrida($codigo);

    public function getCorridaIdMotoCliente($codigoCliente, $codigoMototaxi);
}

class RepositorioCorridaMySQL implements iRepositorioCorrida {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarCorrida($corrida, $codigo) {
        $sql = Null;
         $idCliente = $corrida -> getIdCliente();
         $idMototaxi = $corrida -> getIdMototaxi();
         $pontoReferencia = $corrida -> getPontoReferencia();
         $pontoInicio = $corrida -> getPontoInicio();
         $pontoFim = $corrida -> getPontoFim();
         $valorEstimado = $corrida -> getValorEstimado();
         $status = $corrida -> getStatus();

        if (isset($codigo)) {
            $sql = "UPDATE `corrida` SET `"
                    . "id_cliente`=$idCliente,"
                    . "`id_mototaxi`=$idMototaxi,"
                    . "`ponto_referencia`=$pontoReferencia,"
                   
                    . "`ponto_de_inicio`=$pontoInicio,"
                  
                    . "`ponto_de_fim`=$pontoFim,"
                    . "`valor_estimado`=$valorEstimado,"
                    .  "`status`=$status WHERE id = $codigo";
        } else {
            $sql = "INSERT INTO `corrida`("
                    . "`id`,"
                    . " `id_cliente`,"
                    . " `id_mototaxi`, "
                    . "`ponto_referencia`,"
                    . "`ponto_de_inicio`, "
                    . " `ponto_de_fim`, "
                    . "`valor_estimado`,"
                    . "`status`"
                    . ") VALUES ("
                    . "NULL,"
                    . "$idCliente,"
                    . "$idMototaxi,"
                    . "'$pontoReferencia',"
                    . "'$pontoInicio',"
                    . "'$pontoFim',"
                    . "$valorEstimado,"
                    . "$status)"
                    ;
        }
   
        $this->conexao->executarQuery($sql);
    }

    public function removerCorrida($codigo) {
        $sql = "DELETE FROM corrida WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaCorridas() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM corrida");

        $arrayCorrida = array();

        while ($row = mysqli_fetch_array($listagem)){
            $Corrida = new Corrida(
                    $row[`id`],
                    $row[`id_cliente`], 
                    $row[`id_mototaxi`],
                    $row[`ponto_referencia`], 
                    
                    
                    $row[`ponto_de_inicio`],
                   
                  
                    $row[`ponto_de_fim`],
                    $row[`valor_estimado`],
                    $row[`status`]
                    );
            array_push($arrayCorrida, $Corrida);
        }
        return $arrayCorrida;
    }

    public function getCorridaId($codigo,$requisitante, $status) {
        if($requisitante == 'mototaxi'){
            $variavel = 'idMototaxi';
        }else{
            $variavel = 'cliente';
        }
        
        if(isset($status)){
             $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM corrida where $variavel = '$codigo' && status = $status");
        }else{
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM corrida where $variavel = '$codigo'");
        }
        
         $Corrida = new Corrida(
                    $row[`id`],
                    $row[`id_cliente`], 
                    $row[`id_mototaxi`],
                    $row[`ponto_referencia`], 
                               
                    $row[`ponto_de_inicio`],
                   
                  
                    $row[`ponto_de_fim`],
                   $row[`valor_estimado`],
                    $row[`status`]
                    );
         
        return $Corrida;
    }
    public function getCorrida($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM corrida where id = '$codigo'");

         $Corrida = new Corrida(
                    $row[`id`],
                    $row[`id_cliente`], 
                    $row[`id_mototaxi`],
                    $row[`ponto_referencia`], 
                    
                    
                    $row[`ponto_de_inicio`],
                   
                  
                    $row[`ponto_de_fim`],
                   $row[`valor_estimado`],
                    $row[`status`]
                    );
         
        return $Corrida;
    }

    public function getCorridaIdMotoCliente($idCliente, $idMototaxi) {
        $listagem = $this->conexao->executarQuery("SELECT * FROM corrida WHERE id_cliente = $idCliente and id_mototaxi = $idMototaxi");

        $arrayCorrida = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Corrida = new Corrida(
                    $row[`id`],
                    $row[`id_cliente`], 
                    $row[`id_mototaxi`],
                    $row[`ponto_referencia`], 
                    
                    
                    $row[`ponto_de_inicio`],
                   
                  
                    $row[`ponto_de_fim`],
                    $row[`valor_estimado`],
                    $row[`status`]
                    ); 
            
            array_push($arrayCorrida, $Corrida);
        }
        return $arrayCorrida;
    }

}
$repositorioCorrida = new RepositorioCorridaMySQL();
?>