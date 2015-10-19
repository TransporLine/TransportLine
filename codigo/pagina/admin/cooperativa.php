<?php
require 'pagina/classes/logado.php';
if($_SESSION['usuario'] -> getnivel_acesso() != 2){
        echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<h4 align="center">
					Atenção!
				</h4>Área restrita aos COOPERATIVAS!
			</div>
		</div>
	</div>
</div>';
    header("Refresh:5; URL=?tl=inicio");
    exit();
}

require 'pagina/classes/RepositorioMototaxi.php';
require 'pagina/classes/RepositorioCooperativa.php';
$cooperativa = $repositorioCooperativa -> getCooperativaIdUsuario($_SESSION['usuario']->getCodigo());

if (isset($_GET['adm'])) {
    $identificador = $_GET['adm'];
    switch ($identificador){
        case 1 : $mototaxitas = $repositorioMototaxi -> getListaMototaxi($cooperativa->getCodigo()); $url = "lista_mototaxi.php";
            break;
        //situação 0 para pendente de liberação e 1 para liberada.
        case 2 : $mototaxitas = $repositorioMototaxi -> getListaMototaxiSituacao(0,$cooperativa->getCodigo());$url = "lista_mototaxi.php";
            break;
        case 3 : $mototaxitas = $repositorioMototaxi -> getListaMototaxiSituacao(1,$cooperativa->getCodigo());$url = "lista_mototaxi.php";
            break;
        case 4 : header('location:?tl=cooper&id='.$_SESSION['usuario']->getCodigo());
            break;
        case 5 : $url = "pagina/ponto_mototaxi.php" ;
            break;
        case 6 : $url = "pagina/mapa_view.php" ;
            break;
    }
}else{
   $mototaxitas = $repositorioMototaxi -> getListaMototaxi($cooperativa->getCodigo());    $url = "lista_mototaxi.php";   
}
?>
<ul class="nav nav-pills">
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=1">Moto taxistas</a></li>
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=2">Moto taxistas - A Liberar</a></li>
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=3">Moto taxistas - Liberados</a></li>
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=4">Editar Perfil</a></li>
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=5">Adicionar Ponto Moto Taxi</a></li>
  <li class="btn-default"><a href="?tl=administrar_cooper&adm=6">Pontos de Moto Taxi</a></li>
 
</ul>
<hr>
<? include $url; ?>