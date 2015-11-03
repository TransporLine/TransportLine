<?php
require "RepositorioPontomototaxi.php";
$ponto = new Ponto(NULL, 
        filter_input(INPUT_POST, "nome"),
        filter_input(INPUT_POST, "endereco"),
        filter_input(INPUT_POST, "latitude"), 
        filter_input(INPUT_POST, "longitude"),
        filter_input(INPUT_POST, "idCooperativa")
);
$repositorioPonto -> cadastrarPonto($ponto, filter_input(INPUT_POST, 'idPonto'));
$escopo = "Ponto Moto taxi";
$mensagem = "Atualizado com sucesso!";
include 'util/alerta.php';
?>