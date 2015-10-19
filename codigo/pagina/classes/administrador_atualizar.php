<?php 
	include 'RepositorioAdministrador.php';
        include 'RepositorioUsuario.php';

	$administrador = new Administrador(
            null, 
            filter_input(INPUT_POST,'nome'),
            filter_input(INPUT_POST,'telefone'),
            filter_input(INPUT_POST,'idUsuario')
       );
        
       $usuario = new Usuario(
            null,
            filter_input(INPUT_POST,'email'),
            filter_input(INPUT_POST,'senha'),
            md5(filter_input(INPUT_POST,'senha')),
            filter_input(INPUT_POST,'nivel')
            );
       
       $repositorio->cadastrarAdministrador($administrador,filter_input(INPUT_POST,'id'));
       
       if(filter_input(INPUT_POST,'senha')!== null){
       $repositorioUsuario -> cadastrarUsuario($usuario,filter_input(INPUT_POST,'idUsuario'));
       }
       
       $escopo = "Administrador";
       $mensagem = "Cadastrado com sucesso!";
       include 'util/alerta.php';
?>