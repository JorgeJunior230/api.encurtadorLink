<x-layout title="Inserir Novo Link">
    <form action="{{ route('link.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-4">
                <label for="nome" class="form-label">Link:</label>
                <input type="text"
                       autofocus
                       id="nome"
                       name="nome"
                       class="form-control"
                       value="{{ old('nome') }}">
            </div>

            <div class="col-4">
                <label for="seasonsQty" class="form-label">Link Reduzido:</label>
                <input type="text"
                       id="seasonsQty"
                       name="seasonsQty"
                       class="form-control"
                       value="{{ old('seasonsQty') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
