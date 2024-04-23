@extends('adminlte::page')

@section('title', 'JuanDevops')

@section('content_header')

    @can('admin.tags.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.tags.create') }}">Nueva etiqueta</a>
    @endcan

    <h1>Mostrar listado de etiquetas</h1>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td class="text-sm d-sm-none">{{ $tag->id }}</td>
                            <!-- Texto más pequeño en dispositivos pequeños -->
                            <td class="text-sm d-sm-none">{{ $tag->name }}</td>
                            <!-- Texto más pequeño en dispositivos pequeños -->
                            <td class="d-none d-sm-table-cell">{{ $tag->id }}</td>
                            <!-- Mantiene el tamaño normal en dispositivos grandes -->
                            <td class="d-none d-sm-table-cell">{{ $tag->name }}</td>
                            <!-- Mantiene el tamaño normal en dispositivos grandes -->
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                @endcan
                            </td>

                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
