<?php
require 'pagina/classes/logado.php';
if ($_SESSION['usuario']->getnivel_acesso() != 1) {
    echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<h4 align="center">
					Atenção!
				</h4>Área restrita aos ADMINISTRADORES!
			</div>
		</div>
	</div>
</div>';
    header("Refresh:5; URL=?tl=inicio");
    exit();
}

require 'pagina/classes/RepositorioCooperativa.php';

if (isset($_GET['adm'])) {
    $identificador = $_GET['adm'];
    switch ($identificador) {
        case 1 : $cooperativas = $repositorioCooperativa->getListaCooperativas();
            break;
        //situação 0 para pendente de liberação e 1 para liberada.
        case 2 : $cooperativas = $repositorioCooperativa->getListaCooperativasSituacao(0);
            break;
        case 3 : $cooperativas = $repositorioCooperativa->getListaCooperativasSituacao(1);
            break;
        case 4 : header('location:?tl=admin&id=' . $_SESSION['usuario']->getCodigo());
            break;
        case 5 : header('location:?tl=cooper&id=' . filter_input(INPUT_GET, 'codigo'));
            break;
    }
}
?>
<!--MENU DE OPÇOES -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav navbar-inverse nav-tabs navbar-left">
                <li class="dropdown pull-left">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cooperativas<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li><a href="?tl=administrar_adm&adm=1">Cooperativas</a></li>
                        <li><a href="?tl=administrar_adm&adm=2">Cooperativas - A Liberar</a></li>
                        <li><a href="?tl=administrar_adm&adm=3">Cooperativas - Liberadas</a></li>
                    </ul>
               </li>
            <li><a href="?tl=administrar_adm&adm=4">Editar Perfil</a></li>
        </div>
    </div>
</div>
<!-- fim do menu-->
<hr>
<!-- Painel de listagem-->
<div class="panel-group">
    <div id="no-more-tables">
        <div class="panel panel-default table-responsive">
            <table class="table table-hover table-striped table-condensed cf">
                <thead class="cf">
                    <tr>
                        <th></th>
                        <th>Cooperativa</th>
                        <th>Cidade/UF</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cooperativa = array_shift($cooperativas)) { ?>
                        <tr>
                            <td style="padding-left:5px" class="col-md-1">
                                <a class="btn btn-info" href="?tl=administrar_adm&adm=5&codigo=<?= $cooperativa->getIdUsuario() ?>" role="button">Alterar</a>
                            </td>

                            <td data-title="nome:" class="col-md-6">
                                <div class="panel-heading">
                                    <a class="panel-title" data-toggle="collapse" data-parent="#panel-estudante"
                                       href="#panel-element-<?= $cooperativa->getCodigo() ?>"><?= $cooperativa->getNome() ?>
                                    </a>
                                </div>
                            </td>

                            <td data-title="Cidade/UF:" class="col-md-3"><?= $cooperativa->getCidade() . '/' . $cooperativa->getUf() ?>
                            </td>

                            <td style="padding-left:5px" class="col-md-1">
                                <a class="btn btn-danger" href="#" role="button">Excluir</a>
                            </td>
                            <td style="padding-left:5px" class="col-md-1">
                                <a class="btn btn-default" href="?tl=liberar&nivel=2&id=<?= $cooperativa->getCodigo() ?>&valor=<? ($cooperativa->getLiberado() == 1) ? print"0" : print"1" ?>" role="button"><? ($cooperativa->getLiberado() == 1) ? print"Bloquear" : print"Liberar" ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px" class="col-md-12" colspan="5">
                                <div id="panel-element-<?= $cooperativa->getCodigo() ?>" class="panel-collapse collapse of">
                                    <div class="panel-body">

                                        <table class="table table-condensed">
                                            <tr>
                                                <th>Telefone:</th>
                                                <td><?= $cooperativa->getTelefone() ?></td>
                                            </tr>
                                            <tr>
                                                <th>Endereço:</th>

                                                <td><?= $cooperativa->getEndereco() ?></td>
                                            </tr>
                                        </table>       
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>