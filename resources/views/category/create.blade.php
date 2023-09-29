@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Agregar Categoría</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('categories') }}">Todas las categorías</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('category.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Nombre de la categoría</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Ej: Filosofía" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-primary" value="Guardar" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
