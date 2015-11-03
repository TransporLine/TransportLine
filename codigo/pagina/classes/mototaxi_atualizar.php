<?php 
include 'RepositorioMototaxi.php';
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
       
	$mototaxi = new Mototaxi(
            null, 
            filter_input(INPUT_POST,'nome'),
            filter_input(INPUT_POST, 'endereco'),
            filter_input(INPUT_POST,'telefone'),
            filter_input(INPUT_POST,'idCooperativa'),
            filter_input(INPUT_POST,'idPonto'),
            filter_input(INPUT_POST,'cpf'),
            filter_input(INPUT_POST,'preco_por_km'),
            filter_input(INPUT_POST,'disponivel'),
            filter_input(INPUT_POST,'liberado'),
            $id
       );
      	
	$repositorio->cadastrarMototaxi($mototaxi,filter_input(INPUT_POST,'id'));
         $escopo = "Moto taxi";
        $mensagem = "Cadastrado com sucesso!";
         //include 'util/alerta.php';
    ?>