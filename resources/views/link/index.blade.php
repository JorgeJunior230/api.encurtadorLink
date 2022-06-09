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
            
            {{ $link->url }} 
            
            <a href="{{ route('link.contClick', $link->id) }}" class="float-left">
                {{ $link->slug }} 
            </a>

            <span class="d-flex">

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
