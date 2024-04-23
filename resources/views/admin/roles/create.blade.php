@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')
    <h1>Crear nuevo rol</h1>
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
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                @include('admin.roles.partials.form')

                <input type="submit" class="btn btn-primary" value="Crear rol">
            </form>
        </div>
    </div>
@stop
