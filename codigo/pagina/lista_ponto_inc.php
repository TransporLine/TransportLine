<heder>
     <script type="text/javascript">
            $('select').select2();
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".ponto").select2();
            });
        </script>
</heder>
<?php
require_once 'classes/RepositorioPontomototaxi.php';
$id = filter_input(INPUT_GET, 'id');
$pontos = $repositorioPonto->getPontoIdCooperativa($id);
?>

<select id="idPonto" name="idPonto" class="form-control ponto">
    <?php
    if ($pontos) {
        while ($ponto = array_shift($pontos)) {
            echo '<option value="' . $ponto->getCodigo() . '">' . $ponto->getNome() . '</option>';
        }
    } else {
        echo '<option value="">Sempontos</option>';
    }
    ?>
</select>
