<x-app-layout>
    <x-slot name="header">
        {{__('Relatórios')}}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="" method="">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="date">Data</label>
                            <select name="date" id="date"  class="form-control">
                                <option value="">Exemplo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <select name="client" id="client"  class="form-control">
                                <option value="">Exemplo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Procurar</button>
            </form>

            <table class="table table-striped table bordered">
                <thead>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Produto</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
