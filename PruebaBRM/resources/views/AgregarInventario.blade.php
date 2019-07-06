@extends('layouts.app')

@section('content')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(session()->has('msjeditado'))
                <div class="alert alert-success" role="alert">
                    Producto Agregado Correctamente
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('Controller.AgregarProductos') }}" method="POST">
                    @csrf
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre del Producto: </strong>
                                <input type="text" name="Nombre" value="{{ $inventario->nombre_producto }}" class="form-control" placeholder="{{$inventario->nombre_producto}}">
                                <input type="hidden" name="Id" value="{{$inventario->id}}">
                                <strong>Cantidad: </strong>
                                <input type="text" name="Cantidad" class="form-control" placeholder="{{ $inventario->cantidad }}">
                                <strong>Codigo Lote: </strong>
                                <input type="text" name="Codigo" class="form-control" placeholder="{{ $inventario->codigo_lote }}">
                                <strong>Fecha de Vencimiento: </strong>
                                <input type="text" name="Fecha" class="form-control" placeholder="{{ $inventario->fecha_de_vencimiento }}">
                            </div>
                            <br><br>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Guardar Producto</button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
