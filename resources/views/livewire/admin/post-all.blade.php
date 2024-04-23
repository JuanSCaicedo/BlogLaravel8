<div>
    <div class="card">

        <div class="card-header">
            <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre de un post o autor" />
        </div>

        @if ($posts->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="text-sm d-sm-none">{{ $post->id }}</td>
                                    <!-- Texto más pequeño en dispositivos pequeños -->
                                    <td class="text-sm d-sm-none">{{ $post->name }}</td>
                                    <!-- Texto más pequeño en dispositivos pequeños -->
                                    <td class="d-none d-sm-table-cell">{{ $post->id }}</td>
                                    <!-- Mantiene el tamaño normal en dispositivos grandes -->
                                    <td class="d-none d-sm-table-cell">{{ $post->name }}</td>
                                    <!-- Mantiene el tamaño normal en dispositivos grandes -->
                                    <td class="d-none d-sm-table-cell">
                                        <span class="text-sm">{{ $post->user_id }}</span> :
                                        {{ $post->user->name }}
                                    </td>
                                    <!-- Texto más pequeño en dispositivos pequeños -->
                                    <td class="text-sm d-sm-none">
                                        <span class="text-sm">{{ $post->user_id }}</span> :
                                        {{ $post->user->name }}
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro</strong>
            </div>
        @endif
    </div>
</div>
