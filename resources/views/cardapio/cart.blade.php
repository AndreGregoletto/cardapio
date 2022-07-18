<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{mix('css/cardapio.css')}}">
    @endpush

    <x-header />

    <form action="" method="post" class="mt-5">
    @csrf
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $value => $product)
                    <tr>
                        <td>{{ $product['product']->name }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ 'R$ '. number_format(floatval($product['total']),2,',','.') }}</td>
                        <td>
                            <a href="{{ route('menu.cart.remove', $loop->index) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="3" class="text-right">
                        {{ 'R$ '. number_format(floatval($products->sum('total')),2,',','.')  }}
                    </td>
                </tr>
            </tfooter>
        </table>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Finalizar compra</button>
        </div>
    </form>

</x-guest-layout>
