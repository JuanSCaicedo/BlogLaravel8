@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')
    <h1>Editar post</h1>
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
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('admin.posts.partials.form')

                <input type="submit" class="btn btn-primary" value="Actualizar post">
            </form>
        </div>
    @stop
