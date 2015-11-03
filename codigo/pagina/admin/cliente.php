<?php if (isset($_GET['adm'])){
    $identificador = $_GET['adm'];
    switch ($identificador) {
        case 1 : $url = 'pagina/corrida.php';;
            break;
        //situação 0 para pendente de liberação e 1 para liberada.
        case 2 : ;
            break;
        case 3 : ;
            break;
        case 4 : header('location:?tl=cliente&id=' . $_SESSION['usuario']->getCodigo());
            break;
        case 5 :;
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
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Corrida<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li><a href="?tl=administrar_cli&adm=1">Solicitar</a></li>
                        <li><a href="?tl=administrar_cli&adm=2">Atual</a></li>
                        <li><a href="?tl=administrar_cli&adm=3">Todas</a></li>
                    </ul>
               </li>
            <li><a href="?tl=administrar_cli&adm=4">Editar Perfil</a></li>
        </div>
    </div>
</div>
<!-- fim do menu-->
 <? include $url;?>
