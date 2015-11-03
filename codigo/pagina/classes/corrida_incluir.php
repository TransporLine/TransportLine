<?php
require "RepositorioCorrida.php";
$corrida = new Corrida(NULL, 
     filter_input(INPUT_POST, "idCliente"),
     filter_input(INPUT_POST, "mototaxi"),
     filter_input(INPUT_POST, "pontoReferencia"),
     filter_input(INPUT_POST, "pontoInicio"),
     filter_input(INPUT_POST, "pontoFim"),
     filter_input(INPUT_POST, "valor_estimado"),
    0
);
$repositorioCorrida -> cadastrarCorrida($corrida, null);
$escopo = "Corrida";
$mensagem = "solicitada com sucesso!";
include 'util/alerta.php';
?>

