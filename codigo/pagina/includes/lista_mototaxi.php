<heder>
    <script type="text/javascript">
        $('select').select2();
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".mototaxii").select2();
        });
    </script>
</heder>
<?php
$local = filter_input(INPUT_GET, 'id');
require_once '../classes/RepositorioMototaxi.php';
require_once '../classes/RepositorioPontoMototaxi.php';
if(strstr($local, "-")){
    $cidade_uf = explode("-", $local);
    $cidade = $cidade_uf[0];
    $uf = $cidade_uf[1];
}
$mototaxis = $repositorioMototaxi->getListaMototaxiCidadeUF($cidade, $uf);
?>

<select id="mototaxi" name="mototaxi" class="form-control mototaxii" onChange="precoKm()" >
    echo '<option value="null">Selecione...</option>';
    <?php
    if ($mototaxis) {
        while ($mototaxi = array_shift($mototaxis)) {
            if($mototaxi->getDisponivel() == 1){
                //selecionar ponto do mototaxi para a lista. 
               $ponto =  $repositorioPonto -> getPonto($mototaxi->getIdPonto());
                //fim
             echo '<option value="' . $mototaxi->getCodigo() . '">' . $mototaxi->getNome() .' | '.$ponto->getNome().'</option>';
            }
        }
    } else {
        echo '<option value="null">Nenhum resultado encontrado</option>';
    }
    ?>
</select>