@extends('layouts.principal')
@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('crear_productos') }}" class="btn btn-success btn-sm"
                            style="float: right">Nuevo</a>

                    </div>
                    <div class="card-body">

                        {{-- variable de session para los mensajes --}}
                        @if (session('info'))
                            <div class="alert alert-success" role="alert">
                                <p>{{ session('info') }}</p>
                            </div>

                        @endif

                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($listadoProductos as $producto)
                                    <tr>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>
                                            <button
                                                onclick="javascript: document.getElementById('delete-{{ $producto->id }}').submit()"
                                                class="btn btn-danger">Eliminar</button>
                                            <a href="{{ route('editar_productos', $producto->id) }}"
                                                class="btn btn-primary">Editar</a>
                                            <form id="delete-{{ $producto->id }}"
                                                action="{{ route('eliminar_productos', $producto->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
