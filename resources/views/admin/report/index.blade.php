<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<x-app-layout>
    <x-slot name="header">
        {{__('Relatórios')}}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-4">{{--Date--}}
                        <div class="form-group">
                            <label for="date">Período</label>
                            <input type="text" name="date" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">{{--Client--}}
                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <select name="client" id="client" class="form-control">
                                <option value="client" selected disabled>Todos</option>
                                @foreach ($clients as $client)

                                    <option value="{{$client->id}}">{{$client->name}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">{{--Type Payment--}}
                        <div class="form-group">
                            <label for="type_payment">Tipo de pagamento</label>
                            <select name="type_payment" id="type_payment"  class="form-control">
                                <option value="type_payment" selected disabled>Todos</option>
                                @foreach ($type_payments as $type_payment)

                                    <option value="{{$type_payment->id}}">{{$type_payment->name}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">{{--Buttons--}}
                    <input type="submit" class="btn btn-primary col-md-2 m-1" value="Buscar">
                    {{-- <a href="{{ route('admin.excel') }}" class="btn btn-success col-md-2 m-1">Exportar</a> --}}
                    <input type="submit" class="btn btn-success col-md-2 m-1" formaction="{{'getReportExport'}}" value="Exportar">
                    <div class="col-md-5 ml-5"></div>{{-- Coll --}}
                    <a href="{{ route('admin.report') }}" class="btn btn-secondary col-md-2 m-1 align-self-end">Limpar</a>
                </div>
            </form>

            @if(count($orders))
                <table class="table table-striped table bordered">
                    <thead>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Método de Pagamento</th>
                        <th>Preço</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->client->name}}</td>
                                <td>{{date('d/m/Y', strtotime($order->date))}}</td>
                                <td>{{$order->products[0]->name}}</td>
                                <td>{{$order->products[0]->pivot->quantity}}</td>
                                <td>{{$order->typePayment->name}}</td>
                                <td>{{ 'R$ ' . number_format(floatval($order->products[0]->price *
                                        $order->products[0]->pivot->quantity), 2, ',', '.')
                                    }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @if(!count($orders))
                <div class=" d-flex justify-content-center">
                    <div class="alert alert-danger mt-3 w-50 text-center" role="alert">
                        Nenhum registro foi encontrato.
                    </div>
                </div>
            @endif

        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="date"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                format: 'DD/MM/YYYY'
                }
            });
        });
    </script>
</x-app-layout>

