<x-app-layout>
    <x-slot name="header">
        {{__('Clientes')}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->phone}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a
                                        href="{{route('admin.clients.destroy', $client->id)}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('form-delete-{{$client->id}}').submit();"
                                        class="btn btn-danger"
                                    >
                                    <i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.clients.destroy', $client->id)}}" id="form-delete-{{$client->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$clients->links()}}
        </div>
    </div>
</x-app-layout>
