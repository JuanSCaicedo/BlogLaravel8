@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.posts.partials.form')

                <input type="submit" class="btn btn-primary" value="Crear post">
            </form>
        </div>
    </div>
@stop