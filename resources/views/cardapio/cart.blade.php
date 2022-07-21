<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/cardapio.css') }}">
    @endpush

    <x-header />

    <form action="{{ route('menu.cart.checkout') }}" method="post" class="mt-5 container">
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
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['product']->name }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ 'R$ ' . number_format(floatval($product['total']), 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('menu.cart.remove', $loop->index) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="3" class="text-right">
                        {{ 'R$ ' . number_format(floatval($products->sum('total')), 2, ',', '.') }}
                    </td>
                </tr>
            </tfooter>
        </table>
        <div class="row">{{-- Linha 1 --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="cell">Celular</label>
                    <input type="text" class="form-control" id="cell" name="cell">
                </div>
            </div>
        </div>
        <div class="row mb-3">{{-- Linha 2 --}}
            <div class="col-12">
                <p>Vai ser entrega?</p>
            </div>
            <div class="col-1">
                <div class="form-check">
                    <input type="radio" name="delivery" value="false" id="delivery-no" class="form-check-label">
                    <label for="delivery-no" class="form-check-label">Não</label>
                </div>
            </div>
            <div class="col-1">
                <div class="form-check">
                    <input type="radio" checked name="delivery" value="true" id="delivery-yes" class="form-check-label">
                    <label for="delivery-yes" class="form-check-label">Sim</label>
                </div>
            </div>
        </div>
        <div class="row">{{-- Linha 3 --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="zipcode">CEP</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="number">Número</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="complement">Complemento</label>
                    <input type="text" class="form-control" id="complement" name="complement">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Finalizar compra</button>
        </div>
    </form>
    @push('scripts')
        <script>
            document.getElementById('zipcode').addEventListener('change', function() {
                fetch(`https://viacep.com.br/ws/${this.value}/json/`)
                    .then(e => e.json())
                    .then(response => {
                        document.getElementById('address').value = response.logradouro;
                        document.getElementById('neighborhood').value = response.bairro;
                        document.getElementById('complement').value = response.complemento;
                        document.getElementById('city').value = response.localidade;
                        document.getElementById('state').value = response.uf;
                    });
            });
        </script>
    @endpush

</x-guest-layout>
