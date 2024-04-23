<div class="form-group mb-2">
    <label for="name">Nombre</label>
    <input name="name" id="name" type="text" class="form-control"
        value="{{ old('name', isset($post) ? $post->name : '') }}" placeholder="Ingrese el nombre del post">

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="slug">Slug</label>
    <input readonly name="slug" id="slug" type="text" class="form-control"
        value="{{ old('slug', isset($post) ? $post->slug : '') }}" placeholder="Ingrese el slug del post">

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>

    <select name="category_id" id="category_id" class="form-control">
        <option value="" selected disabled>-- Seleccione --</option>
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}" @if (old('category_id') == $id || (isset($post) && $post->category_id == $id)) selected @endif>
                {{ $name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            <input type="checkbox" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                {{ isset($selectedTags) && in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
            <label for="{{ $tag->id }}">{{ $tag->name }}</label>
        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    @if (isset($post) && $post->status == 2)
        <label class="mr-2">
            <input type="radio" id="status_borrador" name="status" value="1">
            Borrador
            <input type="radio" id="status_borrador" name="status" value="2" checked>
            Publicado
        </label>
    @elseif (isset($post) && $post->status == 1)
        <label class="mr-2">
            <input type="radio" id="status_borrador" name="status" value="1" checked>
            Borrador
            @can('admin.posts.publish')
                <label>
                    <input type="radio" id="status_publicado" name="status" value="2"
                        {{ old('status', isset($post) && $post->status == 2 ? 'checked' : '') }}>
                    Publicado
                </label>
            @endcan
        </label>
    @else
        <label class="mr-2">
            <input type="radio" id="status_borrador" name="status" value="1" checked>
            Borrador
            @can('admin.posts.publish')
                <label>
                    <input type="radio" id="status_publicado" name="status" value="2">
                    Publicado
                </label>
            @endcan
        </label>
    @endif


    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="row mb-3">
    <div class="col">
        <div class="image-wraper">
            @isset($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="alerna">
            @else
                <img id="picture" src="{{ env('IMG_ALTERNATIVA') }}" alt="alerna">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="file">Imagen del post</label><input type="file" name="file" id="file"
                class="form-control-file" accept="image/*">
        </div>

        @error('file')
            <br>
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus amet quod dignissimos maiores quas, iusto
            explicabo sed officia aperiam! Nam perspiciatis harum cum magni distinctio recusandae delectus eius magnam
            suscipit.</p>
    </div>
</div>

<div class="form-group">
    <label for="extract">Extracto:</label>
    <textarea name="extract" id="extract" class="form-control">{{ old('extract', isset($post) ? $post->extract : '') }}</textarea>

    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="body">Cuerpo del post:</label>
    <textarea name="body" id="body" class="form-control">{{ old('body', isset($post) ? $post->body : '') }}</textarea>

    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

@section('css')
    <style>
        .image-wraper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wraper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
