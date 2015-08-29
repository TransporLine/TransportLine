<?php 
	include 'RepositorioCliente.php';
	$administrador = new Administrador(
        null, 
       filter_input(INPUT_POST,'nome'),
		filter_input(INPUT_POST,'rg'),
		filter_input(INPUT_POST,'cpf'),
		filter_input(INPUT_POST,'endereco'),
		filter_input(INPUT_POST,'cidade'),
		filter_input(INPUT_POST,'uf'),
		filter_input(INPUT_POST,'email'),
		filter_input(INPUT_POST,'senha'),
		md5(filter_input(INPUT_POST,'senha')),
		4
       );
		
	$repositorio->cadastrarCliente($administrador,filter_input(INPUT_POST,'id'));
?>