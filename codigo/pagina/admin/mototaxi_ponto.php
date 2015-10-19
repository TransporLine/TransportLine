<?php
require_once '../classes/Mototaxi.php';
require_once '../classes/RepositorioPontoMototaxi.php';
require_once '../classes/RepositorioMototaxi.php';

$idPonto = filter_input(INPUT_GET, 'id');

$ponto = $repositorioPonto -> getPonto($idPonto);

$mototaxitas = $repositorioMototaxi -> getListaMototaxiPonto($idPonto);
?>
<!-- Painel de listagem-->
<div class="panel-group" id="panel-estudante">
    
    <div class="panel panel-default">

        <table class="table table-hover table-striped table-condensed">
            <tr>
                <td>Ponto: <?= $ponto -> getNome() ?></td>
            </tr>
            <tr>
                <td align="center">Endereço: <?= $ponto -> getEndereco() ?></td>
            <tr>
            <tr>
                <th>Moto taxistas</th>
            </tr>
            <?php while ($mototaxi = array_shift($mototaxitas)) { ?>
                <tr>
                    <td class="col-md-6">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-estudante"
                               href="#panel-element-<?= $mototaxi->getCodigo() ?>"><?= $mototaxi->getNome() ?>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr >
                    <td colspan="4">
                        <div id="panel-element-<?= $mototaxi->getCodigo() ?>" class="panel-collapse collapse of">
                            <div class="panel-body">

                                <table class="table table-condensed">
                                    <tr>
                                        <th>Telefone:</th>
                                        <td><?= $mototaxi->getTelefone() ?></td>
                                    </tr>
                                </table>       
                            </div>
                        </div>
                    </td>
                </tr>
            <? } ?>
        </table>
    </div>
</div>
