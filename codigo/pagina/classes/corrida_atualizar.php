<?php
require "RepositorioCorrida.php";
$corrida = new Corrida(NULL, 
     filter_input(INPUT_POST, "idCliente"),
     filter_input(INPUT_POST, "idMototaxi"),
     filter_input(INPUT_POST, "pontoReferencia"),
   
     filter_input(INPUT_POST, "pontoInicio"),
  
     filter_input(INPUT_POST, "pontoFim"),
     filter_input(INPUT_POST, "valorEstimado"),
     filter_input(INPUT_POST, "status")
);
$repositorioPonto -> cadastrarCorrida($corrida, filter_input(INPUT_POST, 'idCorrida'));
$escopo = "Corrida";
$mensagem = "solicitada com sucesso!";
include 'util/alerta.php';
?>