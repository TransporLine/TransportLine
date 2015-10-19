<?php 
	include 'RepositorioAdministrador.php';
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
      
       $administrador = new Administrador(
            null, 
            filter_input(INPUT_POST,'nome'),
            filter_input(INPUT_POST,'telefone'),
         $id
       );
       
       $repositorio->cadastrarAdministrador($administrador,null);
       
       $escopo = "Administrador";
       $mensagem = "Cadastrado com sucesso!";
       include 'util/alerta.php';
?>