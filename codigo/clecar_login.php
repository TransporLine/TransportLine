<?php
//Impedir voltar a pagina de login quando estiver logado
include 'pagina/classes/Usuario.php';
 session_name('i9solutions-transporline');
    session_start();
    if(isset($_SESSION['usuario'])){
        $nivel = $_SESSION['usuario'] -> getnivel_acesso();
        switch ($nivel) {
        case 1 : $url = '?tl=administrar_adm&adm=1';
            break;
        case 2 : $url = '?tl=administrar_cooper';
            break;
        case 3 : $url = '?tl=administrar_moto';
            break;
        case 4 : $url = '?tl=administrar_cli';
            break;
    }
     header('location:' . $url);
  }
?>