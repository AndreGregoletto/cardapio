<x-app-layout>
    <x-slot name="header">
        {{__('Pedidos')}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="aling-middle">{{$order->id}}</td>
                            <td class="aling-middle">{{$order->client->name}}</td>
                            <td class="aling-middle">{{$order->total}}</td>
                            <td class="aling-middle">
                                <div class="btn-group">
                                    <a
                                        href="{{route('admin.orders.destroy', $order->id)}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('form-delete-{{$order->id}}').submit();"
                                        class="btn btn-danger"
                                    >
                                    <i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.orders.destroy', $order->id)}}" id="form-delete-{{$order->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
</x-app-layout>
