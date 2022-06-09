<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif
    <div class="row mb-3">
        <div class="col-4">
            <label for="url" class="form-label">Link:</label>
            <input type="text"
                id="url"
                name="url"
                class="form-control"
                @isset($nome)value="{{ $url }}"@endisset>
        </div>

        <div class="col-4">
            <label for="slug" class="form-label">Link Reduzido:</label>
            <input type="text"
                id="slug"
                name="slug"
                class="form-control"
                @isset($nome)value="{{ $slug }}"@endisset>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
