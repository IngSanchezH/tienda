@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Google Maps') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <h5 class="mb-3">Escriba su direccion para calcular el costo del envio</h5>

                        <form method="POST" action="{{route('home')}}">
                            <input id="formMethd" name="_method" type="hidden" value="POST" >
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="calle" id="calle" placeholder="calle">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="numero">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="colonia" id="colonia" placeholder="colonia">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="ciudad">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="municipio" id="municipio" placeholder="municipio">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="cp" id="cp" placeholder="cp">
                                </div>
                                <button type="submit" name="envios" class="btn btn-primary btn-user btn-block">
                                    <strong> Calcular envío</strong>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Latitud">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="longitud" id="longitud" placeholder="longitud">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id ="map" style="width: 100%; height: 500px;"> </div>
        </div>
    </div>
</div>

<!--  https://maps.googleapis.com/maps/api/js?key=AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0&callback=initMap
            AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0
   -->
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

<script>
    var map;
     function initMap() {
        var latitud = 16.9075802;
        var longitud = -92.0944746;

      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitud, lng: longitud},
        zoom: 12,
      });

      var ubicacion = new google.maps.Marker({
        position: {lat: 16.8959266, lng: -92.0676581},
        map: map,
        title: 'Universidad Tecnologica de la Selva'
      });

      var ubicacionCliente = new google.maps.Marker({
        position: {lat: latitud, lng: longitud},
        map: map
      });
    }
</script>




<script>
    function iniciarMapa(){
        var latitud = 43.542194;
        var longitud = -5.6773;

        coordenadas = {
            lng: longitud,
            lat: latitud
        }
        generarMapa(coordenadas);
    }

    function generarMapa(coordenadas){
        var mapa = new google.maps.Map(document.getElementById('mapa'),
        {
            zoom: 12,
            center: new google.maps.latLng(coordenadas.lat, coordenadas.lng)
        });
        marcador = new google.maps.Marker({
            map: mapa,
            draggable:true,
            position: new google.maps.latLng(coordenadas.lat, coordenadas.lng)
        })
    }
</script>

@endsection
