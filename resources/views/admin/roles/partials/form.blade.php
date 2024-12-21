<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name"
        value="{{ old('name', isset($role) ? $role->name : '') }}" placeholder="Ingrese nombre del rol">

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<h2 class="h3">Lista de permisos</h2>

@foreach ($permissions as $permission)
    <div>
        <label class="mr-2">
            <input type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}"
                {{ isset($selectedPermissions) && in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
            <label for="{{ $permission->id }}">{{ $permission->description }}</label>
        </label>
    </div>
@endforeach
