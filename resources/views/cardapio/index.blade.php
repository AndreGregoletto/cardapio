<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{mix('css/cardapio.css')}}">
    @endpush

    <x-header :type-payments="$typePayments" />

    <div class="d-flex my-5 justify-content-center">
        <div class="w-75">
            @foreach ($categories as $category)
            <nav>
                <div class="nav nav-tabs" id="myTab" role="tablist">
                    <p class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">{{$category->name}}</p>
                 </div>
            </nav>
            <div class="tab-content my-3" id="myTabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table">
                        <tbody>
                            @foreach ($category->products as $product)
                            <tr>
                                <td>{{$product->code}} {{$product->name}}</td>
                                <td>{{$product->price_parse}}</td>
                                <td>
                                    <a href="{{route('menu.cart.add', $product->id)}}" class="btn btn-success"><i class="fas fa-plus"></i>Carrinho</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
