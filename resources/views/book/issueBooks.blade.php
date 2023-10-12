@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Todos los préstamos</h2>
                </div>
                <div class="offset-md-6 col-md-3">
                    <a class="add-new" href="{{ route('book_issue.create') }}">Agregar préstamo</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="overflow-x: auto;">

                        <table class="content-table">
                            <thead>
                                <th>#</th>
                                <th>Estudiante</th>
                                <th>Libro</th>
                                <th>Teléfono</th>
                                <th>E-mail</th>
                                <th>Fecha de préstamo</th>
                                <th>Fecha de devolución</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    @if (isset ($book->return_day) && ($book->return_day != null))
                                    <tr style='@if (date('Y-m-d') > $book->return_day->format('d-m-Y') && $book->status == 'N') ) background:rgba(255,0,0,0.2) @endif'>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->student->name }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->student->phone }}</td>
                                        <td>{{ $book->student->email }}</td>
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        <td>{{ $book->return_day->format('d M, Y') }}</td>
                                        <td>
                                            @if ($book->issue_status == 'N')
                                                <span class='badge badge-success'>Devuelto</span>
                                            @else
                                                <span class='badge badge-danger'>Prestado</span>
                                            @endif
                                        </td>
                                        <td class="edit">
                                            <a href="{{ route('book_issue.edit', $book->id) }}" class="btn btn-success">Editar</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('book_issue.destroy', $book) }}" method="post"
                                                class="form-hidden">
                                                <button class="btn btn-danger">Borrar</button>
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @else
                                    <tr style='@if ($book->status == 'N') ) background:rgba(255,0,0,0.2) @endif'>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->student->name }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->student->phone }}</td>
                                        <td>{{ $book->student->email }}</td>
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        <td> No corresponde </td>
                                        <td>
                                            @if ($book->issue_status == 'N')
                                                <span class='badge badge-success'>Devuelto</span>
                                            @else
                                                <span class='badge badge-danger'>Prestado</span>
                                            @endif
                                        </td>
                                        <td class="edit">
                                            <a href="{{ route('book_issue.edit', $book->id) }}" class="btn btn-success">Editar</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('book_issue.destroy', $book) }}" method="post"
                                                class="form-hidden">
                                                <button class="btn btn-danger">Borrar</button>
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>

                                    @endif
                                    
                                @empty
                                    <tr>
                                        <td colspan="10">No se han registrado préstamos</td>
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
@endsection
