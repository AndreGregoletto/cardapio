<x-app-layout>
    <x-slot name="header">
        {{__('Métodos de Pagamento')}}
    </x-slot>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{route('admin.type-payments.create')}}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($typePayments as $typePayment)
                        <tr>
                            <td>{{$typePayment->name}}</td>
                            <td>{{__($typePayment->status)}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.type-payments.edit', $typePayment->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a
                                        href="{{route('admin.type-payments.destroy', $typePayment->id)}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('form-delete-{{$typePayment->id}}').submit();"
                                        class="btn btn-danger"
                                    >
                                    <i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.type-payments.destroy', $typePayment->id)}}" id="form-delete-{{$typePayment->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$typePayments->links()}}
        </div>
    </div>
</x-app-layout>
