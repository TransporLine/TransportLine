<?php 
	include 'RepositorioCliente.php'; 
        include 'RepositorioUsuario.php';

       $usuario = new Usuario(
            null,
            filter_input(INPUT_POST,'email'),
            filter_input(INPUT_POST,'senha'),
            md5(filter_input(INPUT_POST,'senha')),
            filter_input(INPUT_POST,'nivel')
            );
      
       $cliente = new Cliente(
        null, 
        filter_input(INPUT_POST,'nome'),
		filter_input(INPUT_POST,'rg'),
		filter_input(INPUT_POST,'cpf'),
		filter_input(INPUT_POST,'endereco'),
		filter_input(INPUT_POST,'cidade'),
		filter_input(INPUT_POST,'uf'),
                filter_input(INPUT_POST,'idUsuario')
       );
		
	$repositorio->cadastrarCliente($cliente,filter_input(INPUT_POST,'id'));
        
        if(filter_input(INPUT_POST,'senha')!== null){
       $repositorioUsuario -> cadastrarUsuario($usuario,filter_input(INPUT_POST,'idUsuario'));
       }
	
       
       $escopo = "Seu cadastro";
       $mensagem = "foi realizado com sucesso!";
       include 'util/alerta.php';
?>