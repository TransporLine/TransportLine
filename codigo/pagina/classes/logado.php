<!-- Arquivo para verificar se esta logado --> 
<?php
require 'pagina/classes/Usuario.php';
session_name('i9solutions-transporline');
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<h4 align="center">
					Atenção!
				</h4>Você não tem privilegios para acessar esta área!
			</div>
		</div>
	</div>
</div>';
    header("Refresh:5; URL=?tl=inicio");
    exit();
}
?>