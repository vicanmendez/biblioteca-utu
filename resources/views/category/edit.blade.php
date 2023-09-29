@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Actualizar categoría</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('category.update', $category->id) }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Nombre de la categoría</label>
                        <input type="text" class="form-control @error('name') isinvalid @enderror" name="name"
                            value="{{ $category->name }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Actualizar" required>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
