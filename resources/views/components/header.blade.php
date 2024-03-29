<div class="header">
    <div class="d-flex justify-content-between aling-items-center">
        <div class="d-flex header-container aling-items-center">
            <div class="logo">
                <img class="img-fluid rounded-circle" src="{{ asset("storage/$configuration->logo") }}" width="250px" alt="Avatar">
            </div>
            <div class="header_type mt-5 ml-4">
                <a href="{{ route('home') }}" class="text-white">
                    <p>{{ $configuration->type }}</p>
                    <h2>{{ $configuration->name }}</h2>
                </a>
                <div class="d-flex contact">
                    <div class="mr-3">{{ $configuration->phone }}</div>
                    <div class="mr-3">{{ $configuration->cell }}</div>
                    <div>Endereço</div>
                </div>
            </div>
        </div>
        <a href="{{route('menu.cart')}}" class="text-white" title="Carrinho"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>
<div class="d-flex info">
    <div class="info-item">
        <p class="text-success">Estamos Abertos</p>
        <p>das {{ $configuration->open->format('H:i') }}hrs até as {{ $configuration->close->format('H:i') }}hrs</p>
    </div>
    <div class="info-item">
        <p class="font-weight-bolder">Formas de Pagamento</p>
        <p>
            {{$typePayments->pluck('name')->join(', ', ' e ')}}
        </p>
    </div>
    <div class="info-item">
        <p class="font-weight-bolder">Entrega</p>
        <p>{{ $configuration->delivery }} minutos (aprox.)</p>
    </div>
</div>
