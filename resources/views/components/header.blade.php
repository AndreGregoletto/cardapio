@props([
    'typePayments'
])

<div class="header">
    <div class="d-flex justify-content-between aling-items-center">
        <div class="d-flex header-container aling-items-center">
            <div class="logo">
                <img class="img-fluid rounded-circle" src="https://ui-avatars.com/api?background=OD8ABC&color=fff&size=220px" alt="Avatar">
            </div>
            <div class="header_type">
                <a href="{{ route('home') }}" class="text-white">
                    <p>Esfiharia</p>
                    <h2>HABBIBS</h2>
                </a>
                <div class="d-flex contact">
                    <div>(11) 11111-11111</div>
                    <div>(11) 11111-11111</div>
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
        <p>das x até as 23:59</p>
    </div>
    <div class="info-item">
        <p>Formas de Pagamento</p>
        <p>
            {{$typePayments->pluck('name')->join(', ', ' e ')}}
        </p>
    </div>
    <div class="info-item">
        <p>Entrega</p>
        <p>De 40 a 55 minutos (aprox.)</p>
    </div>
</div>
