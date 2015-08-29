<?php 
	include 'RepositorioAdministrador.php';
	$administrador = new Administrador(
        null, 
        filter_input(INPUT_POST,'nome'),
		filter_input(INPUT_POST,'telefone'),
		filter_input(INPUT_POST,'email'),
		filter_input(INPUT_POST,'senha'),
		md5(filter_input(INPUT_POST,'senha')),
		1
       );
		
	$repositorio->cadastrarAdministrador($administrador,null);
?>