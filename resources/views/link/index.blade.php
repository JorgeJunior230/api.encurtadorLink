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

            <a href="{{ route('link.update' , ['id' => $link->id, 'click' => $link->clicks]) }}" target="_blank">                    
                {{ $link->slug }} 
            </a>

            <span class="d-flex">

                <a href="{{ route('link.edit', $link->id) }}" class="btn btn-primary btn-sm">
                    E
                </a>

                <form action="{{ route('link.destroy', $link->id) }}" method="post" class="ms-2">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>
