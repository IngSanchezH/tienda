@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="mb-3">Detalles de envío</h2>
        <div class="col-sm-5">
            <p class="mb-2"><b>Nombre completo: </b>{{$direccion->nombre}}</p>
            <p class="mb-2"><b>Numero de teléfono: </b>{{$direccion->telefono}} km</p>
            <p class="mb-4"><b>Correo electrónico: </b>{{$direccion->email}}</p>
        </div>
        <div class="col-sm-6">
            <p class="mb-2"><b>Dirección de envío: </b>{{$dir}}</p>
            <p class="mb-2"><b>Total de KM: </b>{{$kilometraje}} km</p>
            <p class="mb-4"><b>Precio a pagar: $ {{$precio}}.00</b></p>
        </div>

        <hr>
        <div class="col-sm-6">
            <label for="latitud" class="form-label">Latitud: </label>
            <input type="text" class="form-control" name="latitud" id="latitud" value="{{$latitudeTo}}">
        </div>
        <div class="col-sm-6">
            <label for="Longitud" class="form-label">Longitud: </label>
            <input type="text" class="form-control" name="longitud" id="longitud" value="{{$longitudeTo}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="map" style="width: 100%; height: 500px;"> </div>
        </div>
    </div>
</div>

<!--  https://maps.googleapis.com/maps/api/js?key=AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0&callback=initMap
            AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0
   -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0&callback=initMap&libraries=&v=weekly" defer></script>


<script>
    // inicia la Configuración
    function initMap() {
      const directionsRenderer = new google.maps.DirectionsRenderer();
      const directionsService = new google.maps.DirectionsService();
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: { lat: 16.8959266, lng: -92.0676581 },
      });
      directionsRenderer.setMap(map);
      calculateAndDisplayRoute(directionsService, directionsRenderer);
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
      directionsService.route(
        {
          origin: { lat: 16.8959266, lng: -92.0676581 },
          destination: { lat: {{$latitudeTo}}, lng: {{$longitudeTo}} },
          // tambien se puede usar de otro modo WALKING - BICYCLING - TRANSIT
          travelMode: google.maps.TravelMode["DRIVING"],
        },
        (response, status) => {
          if (status == "OK") {
            directionsRenderer.setDirections(response);
          } else {
            window.alert("Solicitud de indicaciones fallida debido a " + status);
          }
        }
      );
    }
  </script>

  <!--
<script>
    var map;
     function initMap() {
        var latitud = '';
        var longitud = '';

        map = new google.maps.Map(document.getElementById('mapsss'), {
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
-->

@endsection
