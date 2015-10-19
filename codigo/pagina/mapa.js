var mapa;
var marcadores = [];
function addMarcadores(pos, mapa) {
    document.getElementById("latitude").value = pos.lat();
    document.getElementById("longitude").value = pos.lng();
     
    var marcador = new google.maps.Marker({
        position: pos,
        animation: google.maps.Animation.DROP,
        icon: 'imagens/site/marcador.png'
    });
    marcador.setMap(mapa);
    marcadores.push(marcador);
}
function removeMarcadores() {
    for (var i = 0; i < marcadores.length; i++) {
        marcadores[i].setMap(null);
    }
}

function iniciar() {
    var param = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var opcoes = {

                
        componentRestrictions:{
            country: 'br'
        }
    }
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('endereco'),opcoes);

    google.maps.event.addDomListener(autocomplete, 'place_changed', function () {
        removeMarcadores();
        var local = autocomplete.getPlace();
        mapa.setCenter(local.geometry.location);
        addMarcadores(local.geometry.location,mapa);
    });

    mapa = new google.maps.Map(document.getElementById("mapa"), param);


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            localizacao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            mapa.setCenter(localizacao);
        });
    }
    google.maps.event.addListener(mapa, 'click', function (event) {
        //remover todos os marcadores
        removeMarcadores();
        //adicionar um novo marcador em nosso mapa
        addMarcadores(event.latLng, mapa);
    });
}
google.maps.event.addDomListener(window, 'load', iniciar);
