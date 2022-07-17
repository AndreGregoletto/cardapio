<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{mix('css/cardapio.css')}}">
    @endpush

    <x-header />

    <div class="d-flex my-5 justify-content-center">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <td>{{ $product['product']->name }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>

</x-guest-layout>