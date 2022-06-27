@extends('layouts.app')

@section('content')

    <div class="container">
        <h4 class="mb-3">Registrar productos</h4>

        <form method="POST" action="{{route('productos.store')}}">
            <input id="formMethd" name="_method" type="hidden" value="POST">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="categoria" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Nombre de categoria">
                </div>

                <div class="col-sm-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de producto">
                </div>

                <div class="col-sm-12">
                    <label for="desc" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Descripcion del producto">
                </div>

                <div class="col-sm-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Nombre de la marca">
                </div>

                <div class="col-sm-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" id="cantidad" min="0" placeholder="Cantidad del producto">
                </div>

                <div class="col-sm-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" min="0" step="any" placeholder="Precio del producto">
                </div>

                <button type="submit" name="productos" class="btn btn-primary btn-user btn-block">
                    <strong> Registrar producto</strong>
                </button>
            </div>
        </form>

    </div>

@endsection
