@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Listado de roles</h2>

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('put')

                @foreach ($roles as $rol)
                    <div>
                        <label>
                            <input class="mr-1" type="checkbox" id="{{ $rol->id }}" name="roles[]"
                                value="{{ $rol->id }}"
                                {{ isset($selectedRoles) && in_array($rol->id, $selectedRoles) ? 'checked' : '' }}>
                            <label for="{{ $rol->id }}">{{ $rol->name }}</label>
                        </label>
                    </div>
                @endforeach

                <input class="btn btn-primary" type="submit" value="Asignar Rol">
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
