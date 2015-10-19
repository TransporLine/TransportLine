<!-- Painel de listagem-->
<div class="panel-group" id="panel-estudante">
    <div class="panel panel-default">

        <table class="table table-hover table-striped table-condensed">
            <tr>
                <th></th>
                <th>Moto taxista</th>
                <th>Cidade/UF</th>
                <th></th>
            </tr>
            <?php while ($mototaxi = array_shift($mototaxitas)) { ?>
                <tr>
                    <td class="col-md-1">
                        <a class="btn btn-info" href="#" role="button">Alterar</a>
                    </td>

                    <td class="col-md-6">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-estudante"
                               href="#panel-element-<?= $mototaxi->getCodigo() ?>"><?= $mototaxi->getNome() ?>
                            </a>
                        </div>
                    </td>

                    <td class="col-md-3"><?= $mototaxi->getCidade() . '/' . $mototaxi->getUf() ?>
                    </td>

                    <td class="col-md-1">
                        <a class="btn btn-danger" href="#" role="button">Excluir</a>
                    </td>
                    <td class="col-md-1">
                        <a class="btn btn-default" href="?tl=liberar&nivel=2&id=<?= $mototaxi->getCodigo() ?>&valor=<?($mototaxi-> getLiberado() == 1)?print"0":print"1"?>" role="button"><?($mototaxi-> getLiberado() == 1)?print"Bloquear":print"Liberar"?></a>
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
                                    <tr>
                                        <th>Endereço:</th>

                                        <td><?= $mototaxi->getEndereco() ?></td>
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
