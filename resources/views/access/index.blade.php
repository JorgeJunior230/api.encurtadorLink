<x-layout title="Acessos no Link {{ $link->url }} ">
<a href="{{ route('link.index') }}" class="btn btn-warning mb-2">Voltar</a>
    <ul class="list-group">
        <table id="datagrid" class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">IP</th>
                        <th scope="col">User Agent</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accesses as $access)
                        <tr>
                            <td scope="row">{{ $access->ip }}  </td>
                            <td scope="row">{{ $access->user_agent }}  </td>
                            <td scope="row">{{ \Carbon\Carbon::parse($access->created_at)->format('d/m/Y h:i:s A') }}  </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </ul>
</x-layout>
