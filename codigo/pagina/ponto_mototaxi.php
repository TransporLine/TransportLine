<head>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDebL_aP0IS7IPJfIxQddtBnhCFpFysiM4&sensor=true&libraries=places"></script>
    <script type="text/javascript" src="pagina/mapa.js"></script>
</head>
<?php
require 'classes/RepositorioPontoMototaxi.php';
$destino = "pagina/classes/pontomototaxi_incluir.php";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $ponto = $repositorio->getPonto($codigo);
    $destino = "pagina/classes/pontomototaxi_atualizar.php";
    $oculto = "<input type='hidden' name='id' value=" . $ponto->getCodigo() . " />";
}
$cooperativa = $repositorioCooperativa->getCooperativaIdUsuario($_SESSION['usuario']->getCodigo());
?>
<form action=" <?= $destino; ?>" method="post" class="form-horizontal">
    <?= @$oculto; ?>
    <input type="hidden" name="idCooperativa" value="<?= $cooperativa->getCodigo(); ?>">

    <input type="hidden" name="latitude" id="latitude"/>
    <input type="hidden" name="longitude" id="longitude"/>

    <fieldset>
        <!-- Form Name -->
        <legend>Cadastro de Ponto MotoTaxi</legend>

        <!-- Text input-->
        <div class="col-md-8">
            <div class="form-group">
                <label class="col-md-5 control-label" for="nome">Nome:</label>  
                <div class="col-md-7">
                    <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md"
                           pattern="[A-Za-zA-zÀ-ú.,- ]+" 
                           value="<?php echo isset($ponto) ? $ponto->getNome() : ""; ?>" required="">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label" for="endereco">Endereco:</label>  
                <div class="col-md-7">
                    <input id="endereco" name="endereco" type="text" placeholder="endereco" class="form-control input-md"
                           pattern="[A-Za-zA-zÀ-ú.,- ]+" 
                           value="<?php echo isset($ponto) ? $ponto->getNome() : ""; ?>" required="">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cancelar"></label>
                <div class="col-md-8">
                    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                    <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>

    </fieldset>
</form>
<div class="row">
    <div id="mapa"></div>
</div>

