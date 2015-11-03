<?php
require 'pagina/classes/logado.php';
require 'classes/RepositorioCliente.php';
require 'classes/RepositorioUsuario.php';
include 'selecionar.php';
if (!empty(filter_input(INPUT_POST, "distancia"))) {
    require 'pagina/classes/corrida_incluir.php';
}
?>
<head>
    <script type="text/javascript">
        //Função para listar curso
        function buscar_mototaxi() {
            var id = $('#CidadeUF').val();  //codigo do aluno escolhido
            //se encontrou o estado
            if (id) {
                var url = 'pagina/includes/lista_mototaxi.php?id=' + id; //caminho do arquivo php
                $.get(url, function (dataReturn) {
                    $('#listaMototaxi').html(dataReturn);  //coloco na div o retorno da requisicao
                });
            }
        }
        ;

        function precoKm() {
            var id = $('#mototaxi').val();  //codigo do aluno escolhido
            //se encontrou o estado
            if (id) {
                var url = 'pagina/includes/preco_km.php?id=' + id; //caminho do arquivo php
                $.get(url, function (dataReturn) {
                    $('#valorKm').html(dataReturn);  //coloco na div o retorno da requisicao
                });
            }
        }
        ;
        //função calcular rota 
    </script>
</head>
<?php
$id = $_SESSION['usuario']->getCodigo();
$cliente = $repositorio->getClienteIdUsuario($id);
$usuario = $repositorioUsuario->getUsuarioPorId($cliente->getIdUsuario());
$oculto = "<input type='hidden' name='idCliente' value='" . $cliente->getCodigo() . "' />";
?>
<form method="post" action="pagina/classes/corrida_incluir.php"  class="form-horizontal">
    <?= @$oculto; ?>
    <fieldset>
        <legend>Solicitar Corrida</legend>
        <div class="col-md-6">
            <div  class="form-group">
                <label  class="col-md-2 control-label"  for="pontoInicio">Saída:</label>
                <div class="col-md-9">
                    <input class="form-control input-md" type="text" id="pontoInicio" name="pontoInicio" />
                </div>
            </div>

            <div  class="form-group">
                <label  class="col-md-2 control-label"  for="pontoFim">Chegada:</label>
                <div class="col-md-9">
                    <input class="form-control input-md" type="text" id="pontoFim" name="pontoFim" />
                </div>
            </div> 
            
            <div  class="form-group">
                <label  class="col-md-2 control-label"  for="pontoReferencia">ponto de Referência:</label>
                <div class="col-md-9">
                    <input class="form-control input-md" type="text" id="pontoReferencia" name="pontoReferencia" />
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <!-- selecionar moto taxi -->
            <?php
            include 'classes/RepositorioMototaxi.php';

            $cidades = $repositorioMototaxi->getCidadeUF();
            ?>
            <div class="form-group">
                <label class="col-md-4 control-label" for="cidadeUF">Cidade-UF:</label>
                <div class="col-md-8">
                    <select id="CidadeUF" name="CidadeUF" class="form-control selecionar" onClick="buscar_mototaxi()">
                        <?php
                        while ($cidade = array_shift($cidades)) {
                            $cidadeUF = $cidade->getCidade() . '-' . $cidade->getUf();
                            echo "<option value='" . $cidadeUF . "'>" . $cidadeUF . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="mototaxi">Moto-taxi:</label>
                <div class="col-md-8">
                    <div id="listaMototaxi">
                        <select id="mototaxi" name="mototaxi" class="form-control selecionar">
                            <option>Selecione sua cidade</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Cidade-UF-mototaxi-Fim -->
            <div  class="form-group">
                <label  class="col-md-6 control-label"  for="distancia">Valor estimado em R$:</label>
                <div class="col-md-6">
                    <div id="valorKm"></div>
                    <input class="form-control input-md" type="text" id="valor_estimado" name="valor_estimado" />
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div  class="form-group">
                <input class="btn btn-info" type="button" id="verRota" name="verRota" value="Ver rota" onclick="tracar_rota()"/>
                <input class="btn btn-success" type="submit" id="salvar" name="Salvar" value="Solicitar"/>
            </div>
        </div>
    </fieldset>
</form>

<div class="row">  
    <div id="mapa" class="col-md-2" style="max-width: 70%;"></div>
    <div id="trajeto-texto" class="col-md-4" style="overflow: auto; background-color: #fff;max-width: 30%;"></div>  
</div>
<!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDebL_aP0IS7IPJfIxQddtBnhCFpFysiM4&sensor=true&libraries=places"></script>
<!-- Arquivo de inicialização do mapa -->
<script src="pagina/mapa_corrida.js"></script>