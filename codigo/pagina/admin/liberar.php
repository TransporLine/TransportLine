<?php

require "pagina/classes/LiberarCadastro.php";
if (null !== filter_input(INPUT_GET, 'nivel')) {
    $nivel = filter_input(INPUT_GET, 'nivel');
    $id = filter_input(INPUT_GET, 'id');
    $valor = filter_input(INPUT_GET, 'valor');
    $liberacao->liberarCadastro($nivel, $id, $valor);

    $escopo = "Cadastro";
    if ($valor == 0) {
        $mensagem = "Bloqueado com sucesso!";
    } else {
        $mensagem = "Liberado com sucesso!";
    }
    include 'alerta.php';
}
?>