<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{mix('css/cardapio.css')}}">
    @endpush

    <x-header />


    <div class="d-flex my-5 justify-content-center">
        <div class="w-75">
            <nav>
                <div class="nav nav-tabs" id="myTab" role="tablist">
                    <p class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">pratos</p>
                 </div>
            </nav>
            <div class="tab-content my-3" id="myTabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>img code - prato 1</td>
                                <td>preço</td>
                                <td>Botão</td>
                            </tr>
                            <tr>
                                <td>img code - prato 1</td>
                                <td>preço</td>
                                <td>Botão</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
