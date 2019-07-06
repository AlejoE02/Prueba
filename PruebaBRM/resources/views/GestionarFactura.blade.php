@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">PRUEBA TÉCNICA</div>

        <div class="card-body">
          @if(session()->has('msjeditado'))
          <div class="alert alert-success" role="alert">
            Compra Exitosa
          </div>
          @endif
          @if(session()->has('msjeditado2'))
          <div class="alert alert-success" role="alert">
            Compra Cancelada
          </div>
          @endif
          <h2>  Productos Disponibles  </h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Producto </th>
                <th> Cantidad </th>
                <th> Precio (COP)</th>
              </tr>
              @foreach($lista as $Producto)
              @if($Producto->estado == 1)
              <tr>
                <td>{{$Producto->relacionCarroInventario->nombre_producto}}</td>
                <td>{{$Producto->cantidad}}</td>
                <td>{{$Producto->relacionCarroInventario->precio*$Producto->cantidad}}</td>
                </tr>
                @endif
                @endforeach
                <div>
                </div>
              </thead>
            </table>
            <strong>Total a Pagar: </strong>
            <strong>{{$total}}</strong>
            
            <td>
            <div>
                <a class="btn btn-primary" href="{{route('Controller.FinalizarCompra') }}">Finalizar Compra</a>
                <a class="btn btn-primary" href="{{route('Controller.CancelarCompra') }}">Cancelar Compra</a>
            </div>
            <br>
            </html>

            <a class="btn btn-danger" href="{{ url('/Productos') }}"> Volver</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

