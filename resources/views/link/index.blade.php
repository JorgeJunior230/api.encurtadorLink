<x-layout title="Lista de Links">
    <a href="{{ route('link.create') }}" class="btn btn-dark mb-2">Adicionar Link</a>


    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        <table id="datagrid" class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">URL</th>
                    <th scope="col">Link Reduzido</th>
                    <th scope="col">Total Acessos</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                <tr>
                    <td scope="row">{{ $link->url }}  </td>
                    <td>                    
                        <a href="{{ route('link.update' , ['id' => $link->id, 'click' => $link->clicks]) }}" target="_blank">                    
                            {{ $link->slug }} 
                        </a>
                    </td>
                    <td> {{ $link->clicks }}  </td>
                    <td >
                        <span class="d-flex">
                            <a href="{{ route('link.edit', $link->id) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            <a href="{{ route('access.index', $link->id) }}" class="btn btn-success btn-sm ms-2">
                                Access
                            </a>

                            <form action="{{ route('link.destroy', $link->id) }}" method="post" class="ms-2">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    Del
                                </button>
                            </form>
                        </span>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
</x-layout>
