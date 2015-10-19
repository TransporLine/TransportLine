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
       
       if(filter_input(INPUT_POST,'senha') !== null){
       $id = $repositorioUsuario -> cadastrarUsuario($usuario,null);
       }
       
	$cliente = new Cliente(
        null, 
        filter_input(INPUT_POST,'nome'),
		filter_input(INPUT_POST,'rg'),
		filter_input(INPUT_POST,'cpf'),
		filter_input(INPUT_POST,'endereco'),
		filter_input(INPUT_POST,'cidade'),
		filter_input(INPUT_POST,'uf'),
		filter_input(INPUT_POST,'telefone'),
        $id
       );
	
	$repositorio->cadastrarCliente($cliente,null);
       
       $escopo = "Seu cadastro";
       $mensagem = "foi realizado com sucesso!";
       include 'util/alerta.php';
?>