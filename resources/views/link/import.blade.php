<x-layout title="Importar Links">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text"
                       autofocus
                       id="nome"
                       name="nome"
                       class="form-control"
                       value="{{ old('nome') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>