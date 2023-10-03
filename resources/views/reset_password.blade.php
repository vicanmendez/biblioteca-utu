@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                 @endif
                <div class="col-md-3">
                    <h2 class="admin-heading">Resetear contraseña</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('change_password')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Contraseña actual</label>
                            <input type="password" class="form-control" name="c_password" value=""
                                required>
                            @error('c_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            <input type="password" class="form-control" name="password" value="" required>
                            @error('new_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" value="" required>
                            @error('new_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Confirmar" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
