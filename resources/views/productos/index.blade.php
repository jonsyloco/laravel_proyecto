<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
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
                                <th>Precio.....</th>
                            </thead>
                            <tbody>
                                @foreach ($listadoProductos as $producto)
                                    <tr>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->precio }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
