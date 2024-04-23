@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="form-gruop mb-2">
                    <label name="name">Nombre</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Ingrese el nombre de la categoria">

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-gruop">
                    <label name="slug">Slug</label>
                    <input readonly name="slug" id="slug" type="text" class="form-control" placeholder="Ingrese el slug de la categoria">
                    
                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <input type="submit" class="btn btn-primary mt-3" value="Crear categoria">
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
