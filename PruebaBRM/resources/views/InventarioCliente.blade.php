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
            Producto Editado Carrectamente.!
          </div>
          @endif
          <h2>  Productos Disponibles  </h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Productos </th>
                <th> Canitdad </th>
              </tr>
              @foreach($inventario as $Producto)
              <tr>
                <td>{{$Producto->nombre_producto}}</td>
                <td>
                  <div class="form-group">
                    <a class="btn btn-primary" href="{{ route('Controller.carrito') }}/{{ $Producto->id }}">Seleccionar</a>
                  </td>
                </tr>
                @endforeach
                <div>
                  <td><a class="btn btn-primary" href="{{ route('Controller.Gestionar') }}">Gestionar Factura</a></td>
                </div>
              </thead>
            </table>
            <br>
            </html>

            <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

