<x-layout title="Acessos no Link">
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
                            <td scope="row">{{ $access->created_at }}  </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </ul>
</x-layout>
