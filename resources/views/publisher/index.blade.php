@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Editoriales</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('publisher.create') }}">Agregar Editorial</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <form method="GET" action="{{ route('publisher.search') }}">
                            @csrf
                            <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="query" class="form-control" placeholder="Buscar por editorial...">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </form>

                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @forelse ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->id }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('publisher.edit', $publisher) }}" class="btn btn-success">Editar</a>
                                    </td>
                                    <td class="delete">
                                        <form id="deleteForm" action="{{ route('publisher.destroy', $publisher->id) }}" method="post"
                                            class="form-hidden">
                                            <div onclick="confirmDelete({{ $publisher->id }})" class="btn btn-danger">Eliminar</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No se han encontrado editoriales</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $publishers->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
          var x = confirm("CUIDADO!!! ¿Estás seguro de que quieres eliminar esta editorial? ESTO ELIMINARÁ TODOS LOS LIBROS Y PRÉSTAMOS ASOCIADOS A LA EDITORIAL. Clic en Aceptar para continuar, Cancelar para volver a atrás");
          if (x) {
              //Change the action form to delete the author with the corresponding ID
              document.getElementById("deleteForm").action = "/publisher/delete/" + id;
              document.getElementById("deleteForm").submit();

          }
          else
              return false;
      }

  </script>

@endsection

