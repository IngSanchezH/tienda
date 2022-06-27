@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calcular costo de envio') }}</div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{route('tienda.direccion')}}" class="user needs-validation" novalidate>
                            @csrf
                            <input id="formMethd" name="_method" type="hidden" value="POST" >
                            <div class="row g-3">
                                <h5 class="mb-3">Ingrese sus datos para el envio de su producto</h5>
                                <div class="form-group">
                                    <!-- Name input-->
                                    <label for="nombre" class="form-label">Nombre Completo *</label>
                                    <input class="form-control form-control-user" name="nombre" id="nombre" type="text" placeholder="Escribe tu nombre Ej: Feliciano" autocomplete="off" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,50}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Requerimos su nombre (Solo letras).</div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- Correo electronico -->
                                    <label for="email" class="form-label">Correo Electronico *</label>
                                    <input class="form-control form-control-user" name="email" id="email" type="email" placeholder="Escribe tu Correo electronico: Ej:correo@gmail.com" data-sb-validations="required,email" autocomplete="off" required/>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Requerimos su correo electronico.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Correo no valido.</div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- Telefono  -->
                                    <label for="telefono" class="form-label">Numero de Teléfono *</label>
                                    <input type="tel" class="form-control form-control-user" name="telefono" id=telefono placeholder="Numero de Teléfono Ej:9981428125" data-sb-validations="required" autocomplete="off" pattern="[0-9]{10}" title="Solo numeros" required>
                                    <div class="invalid-feedback" data-sb-feedback="telefono:required">Requerimos su numero de telefono (Solo 10 numeros).</div>
                                </div>

                                <hr>
                                <h5 class="mb-3">Ingrese su direccion para calcular el costo del envio</h5>
                                <div class="col-sm-6">
                                    <!-- Calle  -->
                                    <label for="calle" class="form-label">Calle *</label>
                                    <input class="form-control form-control-user" name="calle" id="calle" type="text" placeholder="Escribe el nombre de la calle" autocomplete="off" pattern="[0-9 A-Z a-záéíóúÁÉÍÓÚñÑ , . _ - / & ()]{3,100}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="calle:required">Requerimos el nombre de la calle (Solo letras).</div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- numero  -->
                                    <label for="numero" class="form-label">Numero de la calle (opcional)</label>
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="numero">
                                </div>
                                <div class="col-sm-6">
                                    <!-- Colonia  -->
                                    <label for="colonia" class="form-label">Colonia *</label>
                                    <input class="form-control form-control-user" name="colonia" id="colonia" type="text" placeholder="Escribe el nombre de la colonia" autocomplete="off" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ , .]{3,50}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="colonia:required">Requerimos el nombre de la calle (Solo letras).</div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Ciudad  -->
                                    <label for="ciudad" class="form-label">Ciudad *</label>
                                    <input class="form-control form-control-user" name="ciudad" id="ciudad" type="ciudad" placeholder="Escribe el nombre de la ciudad" autocomplete="off" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ , .]{3,50}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="ciudad:required">Requerimos el nombre de la ciudad (Solo letras).</div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Municipio  -->
                                    <label for="municipio" class="form-label">Municipio *</label>
                                    <input class="form-control form-control-user" name="municipio" id="municipio" type="text" placeholder="Escribe el nombre de la municipio" autocomplete="off" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ , .]{3,50}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="municipio:required">Requerimos el nombre de la municipio (Solo letras).</div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Estado  -->
                                    <label for="estado" class="form-label">Estado *</label>
                                    <input class="form-control form-control-user" name="estado" id="estado" type="text" placeholder="Escribe el nombre de la estado" autocomplete="off" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ , .]{3,50}" title="Solo letras" required data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="estado:required">Requerimos el nombre de la estado (Solo letras).</div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- CP  -->
                                    <label for="cp" class="form-label">Codigo Postal *</label>
                                    <input type="tel" class="form-control form-control-user" name="cp" id=cp placeholder="Su Código postal Ej:29960" data-sb-validations="required" autocomplete="off" pattern="[0-9]{5}" title="Solo numeros" required>
                                    <div class="invalid-feedback" data-sb-feedback="cp:required">Requerimos su Código postal (Solo 5 numeros).</div>
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

</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
@endsection
