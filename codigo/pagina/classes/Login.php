<?php
include 'RepositorioUsuario.php';
$email = filter_input(INPUT_POST, 'email');
$senha = md5(filter_input(INPUT_POST, 'senha'));

$usuario = $repositorioUsuario->getLogin($email, $senha);
if ($usuario->getemail() !== null) {
    $nivel = $usuario->getnivel_acesso();
    switch ($nivel) {
        case 1 : $url = '?tl=administrar_adm&adm=1';
            break;
        case 2 : $url = '?tl=administrar_cooper&adm=1';
            break;
        case 3 : $url = '?tl=administrar_moto&adm=1';
            break;
        case 4 : $url = '?tl=administrar_cli&adm=1';
            break;
    }
    if (!isset($_SESSION)) {
        session_name('i9solutions-transporline');
        session_start();
    }
    $_SESSION['usuario'] = $usuario;
    header('location:'.$url);   
}else{
    if (isset($_SESSION)) {
        session_destroy();
    }
    echo'<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<h4 align="center">
					Atenção!
				</h4>Usuario e/ou senha incorreto, tente novamente!
			</div>
		</div>
	</div>
</div>';
}
?>
