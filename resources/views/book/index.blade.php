@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Libros</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('book.create') }}">Agregar libro</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <div class="col-md-12" style="overflow-x: auto;">

                        <table class="content-table">
                            <thead>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Ejemplares disponibles</th>
                                <th> Ubicación</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td class="id">{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->auther->name }}</td>
                                        <td>{{ $book->publisher->name }}</td>
                                        <td>
                                            <span class='text  text-success'> {{ $book->number_copies }}</span>
                                        </td>
                                        <td> {{ $book->book_place }}</td>
                                        <td class="edit">
                                            <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Editar</a>
                                        </td>
                                        <td class="delete">
                                            <form id="deleteForm" action="{{ route('book.destroy', $book) }}" method="post"
                                                class="form-hidden">
                                                <div onclick="confirmDelete({{ $book->id }})" class="btn btn-danger delete-book">Borrar</div>
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No se han registrado libros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            var x = confirm("CUIDADO!!! ¿Estás seguro de que quieres eliminar este libro? ESTO ELIMINARÁ TODOS LOS PRÉSTAMOS ASOCIADOS AL LIBRO. Clic en Aceptar para continuar, Cancelar para volver a atrás");
            if (x) {
                //Change the action form to delete the author with the corresponding ID
                document.getElementById("deleteForm").action = "/book/delete/" + id;
                document.getElementById("deleteForm").submit();

            }
            else
                return false;
        }

       
    </script>
@endsection
