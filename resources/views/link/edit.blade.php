<x-layout title="Editar Link '{{ $link->url }}'">
    <form action="{{ route('link.updateData' , $link->id) }}" method="post">
        @csrf       
        <div class="row mb-3">
            <div class="col-4">
                <label for="url" class="form-label">Link:</label>
                <input type="text"
                       autofocus
                       id="url"
                       name="url"
                       class="form-control"
                       value="{{ $link->url }}">
            </div>

            <div class="col-4">
                <label for="slug" class="form-label">Link Reduzido:</label>
                <input type="text"
                       id="slug"
                       name="slug"
                       class="form-control"
                       value="{{ $link->slug }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>

