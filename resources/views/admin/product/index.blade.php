<x-app-layout>
    <x-slot name="header">
        {{__('Produtos')}}
    </x-slot>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{route('admin.products.create')}}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a 
                                        href="{{route('admin.products.destroy', $product->id)}}" 
                                        onclick="event.preventDefault(); 
                                        document.getElementById('form-delete-{{$product->id}}').submit();" 
                                        class="btn btn-danger"
                                    >
                                    <i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.products.destroy', $product->id)}}" id="form-delete-{{$product->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>