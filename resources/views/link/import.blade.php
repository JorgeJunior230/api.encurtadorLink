<x-layout title="Importar Links">
    <form action="{{ route('link.importSave') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="csv_file" class="custom-file-input" id="csv_file">
                </div>
            </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('link.index') }}" class="btn btn-warning">Voltar</a>
    </form>
</x-layout>