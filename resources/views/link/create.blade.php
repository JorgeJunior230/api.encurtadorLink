<x-layout title="Inserir Novo Link">
    <form action="{{ route('link.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-4">
                <label for="url" class="form-label">Link:</label>
                <input type="text"
                       autofocus
                       id="url"
                       name="url"
                       class="form-control"
                       value="{{ old('url') }}">
            </div>

            <div class="col-4">
                <label for="slug" class="form-label">Link Reduzido:</label>
                <input type="text"
                       id="slug"
                       name="slug"
                       class="form-control"
                       value="{{ old('slug') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
