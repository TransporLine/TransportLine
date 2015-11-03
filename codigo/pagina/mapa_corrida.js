var map;
var directionsDisplay; // Instanciaremos ele mais tarde, que será o nosso google.maps.DirectionsRenderer
var directionsService = new google.maps.DirectionsService();

function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer(); // Instanciando...
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);

    var options = {
        zoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
       var opcoes = {

                
        componentRestrictions:{
            country: 'br'
        }
    }
    //Autocomplete 
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('pontoInicio'),opcoes);
    var autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('pontoFim'),opcoes);
   
    
    //___
    
    map = new google.maps.Map(document.getElementById("mapa"), options);

    directionsDisplay.setMap(map); // Relacionamos o directionsDisplay com o mapa desejado
    directionsDisplay.setPanel(document.getElementById("trajeto-texto")); // Aqui faço a definição

    //posição do usuario
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.setCenter(pontoPadrao);

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode(
                    {
                        "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
                    },
                    function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            $("#pontoInicio").val(results[0].formatted_address);
                        }
                    });
        });
    }
}

initialize();

function tracar_rota() {
    var enderecoPartida = $("#pontoInicio").val();
    var enderecoChegada = $("#pontoFim").val();

    var request = {// Novo objeto google.maps.DirectionsRequest, contendo:
        origin: enderecoPartida, // origem
        destination: enderecoChegada, // destino
        travelMode: google.maps.TravelMode.DRIVING // meio de transporte, nesse caso, de carro
    };

    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) { // Se deu tudo certo
            directionsDisplay.setDirections(result); // Renderizamos no mapa o resultado

            //pegando distancia para calculo
            var distancia;
            var rota = result.routes[0]; /* Primeira rota */
            var etapa = rota.legs[0]; /* única etapa dessa rota */

            //pegando distancia e calculando valor estimado
             
             var preco_km = $("#precoKm").val();
            distancia = etapa.distance.value;
            retorno = Math.ceil(distancia/1000)*preco_km;
            
            document.getElementById("valor_estimado").value = retorno;
            //fim do calculo
        }
    });
};