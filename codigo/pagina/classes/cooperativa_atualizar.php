<?php 
	include 'RepositorioCooperativa.php';
	$repositorioCooperativa = new Cooperativa(
            NULL,
            filter_input(INPUT_POST,'nome'),
            filter_input(INPUT_POST,'endereco'),
            filter_input(INPUT_POST,'cidade'),
            filter_input(INPUT_POST,'uf'),
            filter_input(INPUT_POST,'telefone'),
            filter_input(INPUT_POST,'email'),
            filter_input(INPUT_POST,'senha'),
            filter_input(INPUT_POST,'senha_criptografada'),
            2);
		
	$repositorioCooperativa->cadastrarAdministrador($Cooperativa,filter_input(INPUT_POST,'id'));
?>