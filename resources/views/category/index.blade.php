@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Categorías</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('category.create') }}">Agregar categoría</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('category.edit', $category) }}" class="btn btn-success">Editar</a>
                                    </td>
                                    <td class="delete">
                                        <form id="deleteForm" action="{{ route('category.destroy', $category->id) }}" method="post"
                                            class="form-hidden">
                                            <div onclick="confirmDelete({{ $category->id }})" class="btn btn-danger">Eliminar</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No se han registrado categorías</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <script>
          function confirmDelete(id) {
            var x = confirm("CUIDADO!!! ¿Estás seguro de que quieres eliminar esta categoría? ESTO ELIMINARÁ TODOS LOS LIBROS Y PRÉSTAMOS ASOCIADOS A LA CATEGORÍA. Clic en Aceptar para continuar, Cancelar para volver a atrás");
            if (x) {
                //Change the action form to delete the author with the corresponding ID
                document.getElementById("deleteForm").action = "/category/delete/" + id;
                document.getElementById("deleteForm").submit();

            }
            else
                return false;
        }

    </script>
@endsection

