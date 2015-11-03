<?php
$id = filter_input(INPUT_GET, 'id');
require_once '../classes/RepositorioMototaxi.php';

$mototaxi = $repositorioMototaxi->getMototaxiId($id);
?>
<input type="hidden" id="precoKm" value="<?= $mototaxi->getPreco_km(); ?>" name="precoKm"/> 
  
