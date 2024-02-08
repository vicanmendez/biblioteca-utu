@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Todos los autores</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('authors.create') }}">Agregar autor</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <form method="GET" action="{{ route('authors.search') }}">
                                @csrf
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="query" class="form-control" placeholder="Buscar por nombre...">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            


                            <th> # </th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @forelse ($authors as $auther)
                                <tr>
                                    <td>{{ $auther->id }}</td>
                                    <td>{{ $auther->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('authors.edit', $auther) }}" class="btn btn-success">Editar</a>
                                    </td>
                                    <td class="delete">
                                        <form id="deleteForm" action="{{ route('authors.destroy', $auther->id) }}" method="post"
                                            class="form-hidden">
                                            <div onclick="confirmDelete({{ $auther->id }})" class="btn btn-danger">Eliminar</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No se han registrado autores</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $authors->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            var x = confirm("CUIDADO!!! ¿Estás seguro de que quieres eliminar este autor? ESTO ELIMINARÁ TODOS LOS LIBROS Y PRÉSTAMOS ASOCIADOS A ESTE AUTOR. Clic en Aceptar para continuar, Cancelar para volver a atrás");
            if (x) {
                //Change the action form to delete the author with the corresponding ID
                document.getElementById("deleteForm").action = "/authors/delete/" + id;
                document.getElementById("deleteForm").submit();

            }
            else
                return false;
        }

       
    </script>
@endsection
