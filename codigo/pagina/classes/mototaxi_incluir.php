<?php 
	include 'RepositorioMototaxi.php';
	$mototaxi = new Mototaxi(
        null, 
        filter_input(INPUT_POST,'nome'),
		filter_input(INPUT_POST,'telefone'),
		filter_input(INPUT_POST,'idCooperativa'),
		filter_input(INPUT_POST,'idPonto'),
		filter_input(INPUT_POST,'cpf'),
		filter_input(INPUT_POST,'email'),
		filter_input(INPUT_POST,'senha'),
		md5(filter_input(INPUT_POST,'senha')),
		3
       );
		
	$repositorio->cadastrarMototaxi($mototaxi,null);
?>