<legend>Pontos de moto taxi</legend>
<?php
require 'pagina/classes/RepositorioPontomototaxi.php';
$pontos = $repositorioPonto->getListaPontos();
;
?>
<head>
    <script type="text/javascript">
        function carregar(id) {
            var url = 'pagina/admin/mototaxi_ponto.php?id=' + id;  //caminho do arquivo php
            $.get(url, function (dataReturn) {
                $('#informacao').html(dataReturn);  //coloco na div o retorno da requisicao
            });
        }

    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDebL_aP0IS7IPJfIxQddtBnhCFpFysiM4&sensor=true&libraries=places"></script>
    <script type="text/javascript">
        var mapa;
        var pontos = [];
<?php
while ($ponto = array_shift($pontos)) {
    echo "pontos.push({id:" . $ponto->getCodigo() . ",nome:'" . $ponto->getNome() . "',latitude:'" . $ponto->getLatitude() . "', longitude:'" . $ponto->getLongitude() . "'});";
}
?>
        function iniciar() {
            var param = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            mapa = new google.maps.Map(document.getElementById("mapa_view"), param);


            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    localizacao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    mapa.setCenter(localizacao);
                });
            }

            for (ponto of pontos){
                var html = '<div style="whidth:400px;">' +
                        '<h3>' + ponto.nome + '</h3>' +
                        '<input type="button" value="Ver detalhes"  onclick="carregar(' + ponto.id + ')" ></div>';

                var marcador = new google.maps.Marker({
                    position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
                    icon: 'imagens/site/marcador.png',
                    html: html
                });

                marcador.setMap(mapa);
                var info = new google.maps.InfoWindow({
                    content: 'carregando...'
                });

                google.maps.event.addListener(marcador, 'click', function () {
                    info.setContent(this.html);
                    info.open(mapa, this);
                });
            }
        }

        google.maps.event.addDomListener(window, 'load', iniciar);

    </script>
<div class="row">
    <div id="mapa_view"></div>
    <div id="informacao">
        <h3 align="center">Selecione a opção ver detalhes em um ponto.</h3>
		<img src="imagens/site/click.png" class="img-responsive">
    </div>
</div>