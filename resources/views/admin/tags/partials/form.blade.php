<div class="form-group mb-2">
    <label for="name">Nombre</label>
    <input name="name" id="name" type="text" class="form-control"
        value="{{ isset($tag) ? $tag->name : old('name') }}" placeholder="Ingrese el nombre de la etiqueta">

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="slug">Slug</label>
    <input readonly name="slug" id="slug" type="text" class="form-control"
        value="{{ isset($tag) ? $tag->slug : old('slug') }}" placeholder="Ingrese el slug de la etiqueta">

    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="color">Color</label>

    <select name="color" id="color" class="form-control">
        <option value="" selected disabled>-- Seleccione --</option>
        @foreach ($colors as $key => $color)
            <option value="{{ $key }}"
                @if (isset($tag) && $tag->color == $key) selected @elseif (old('color') == $key) selected @endif>
                {{ $color }}
            </option>
        @endforeach
    </select>

    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
