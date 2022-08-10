<x-app-layout>
    <x-slot name="header">
        {{__('Relatórios')}}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date">Período</label>
                            <select name="date" id="date"  class="form-control">
                                <option value="" selected disabled>Selecione</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <select name="client" id="client"  class="form-control">
                                <option value="client" selected disabled>Selecione</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_payment">Tipo de pagamento</label>
                            <select name="type_payment" id="type_payment"  class="form-control">
                                <option value="type_payment" selected disabled>Selecione</option>
                                @foreach ($type_payments as $type_payment)
                                    <option value="{{$type_payment->id}}">{{$type_payment->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>

            <table class="table table-striped table bordered">
                <thead>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    {{-- @dd($order->products[0]->pivot->quantity) --}}
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->client->name}}</td>
                            <td>{{date('d-m-Y', strtotime($order->date))}}</td>
                            <td>{{$order->products[0]->name}}</td>
                            <td>{{$order->products[0]->pivot->quantity}}</td>
                            <td>{{ 'R$ ' . number_format(floatval($order->products[0]->price *
                                    $order->products[0]->pivot->quantity), 2, ',', '.')
                            }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
