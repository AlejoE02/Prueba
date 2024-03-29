@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($nombre == "Proveedor")
                    <a class="btn btn-primary" href="{{ route('Controller.inventario') }}">Agregar</a>
                    
                    @endif
                    @if($nombre != "Proveedor")
                    <a class="btn btn-primary" href="{{ route('Controller.VistaCliente') }}">Comprar</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
