<x-layout title="Lista de Links">
    <a href="{{ route('link.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($links as $link)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('link.index', $link->id) }}">
                {{ $link->url }} 
            </a>

            <span class="d-flex">
                <a href="{{ route('link.edit', $link->id) }}" class="btn btn-primary btn-sm">
                    E
                </a>

                <form action="{{ route('link.destroy', $link->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>
