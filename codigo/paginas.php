<!-- paginas do site adm -->
<?php 
	  if(isset($_GET['tl'])) {
		$tb = $_GET['tl'];
	 } else {$tb ="";}	 	
	switch($tb){
		case "admin": $inc = 'pagina/administrador.php';
		break;
		case "cooper": $inc = 'pagina/cooperativa.php';
		break;
		case "mototaxi": $inc = 'pagina/mototaxi.php';
		break;
		case "cliente": $inc = 'pagina/cliente.php';
		break;
		case "ponto": $inc = 'pagina/ponto_mototaxi.php';
		break;
		case "pontos": $inc = 'pagina/lista_pontos.php';
		break;
		case "nova_corrida": $inc = 'pagina/nova_corrida.php';
		break;
		case "ver_corrida": $inc = 'pagina/ver_corrida.php';
		break;
		case "inicio": $inc = 'pagina/principal.php';
		break;
		case "sobre": $inc = 'pagina/sobre.php';
		break;
		case "contato": $inc = 'pagina/contato.php';
		break;
		case "cadastro": $inc = 'pagina/cadastro.php';
		break;
		default:
		$inc = 'pagina/principal.php';
		break;			
	}
		include ($inc);
	?>
