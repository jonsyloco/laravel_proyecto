@extends('layouts.principal')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Crear Producto                      

                    </div>
                    <div class="card-body">
                        <form action="{{ route('guardar_productos') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                              <label for="descripcion" class="form-label">Descripción</label>
                              <input type="text" class="form-control" name="descripcion" id="descripcion">                              
                            </div>
                            <div class="col-md-6">
                              <label for="precio" class="form-label">Precio</label>
                              <input type="number" class="form-control" name="precio" id="Precio">
                            </div>  
                            <br>
                            <div class="col-md-6">                          
                            <button type="submit" class="btn btn-primary">guardar</button>
                            <a type="submit" href="{{ route('listado_productos') }}" class="btn btn-secondary">cancelar</a>
                            </div>
                          </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


