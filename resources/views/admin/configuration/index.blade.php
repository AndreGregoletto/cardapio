<x-app-layout>
    <x-slot name="header">
        {{__('Configurações')}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.configurations.update', $configuration->id)}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" accept="image/*" class="form-control-file" name="logo" id="logo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type">Seguimento</label>
                            <input type="text" value="{{$configuration->type}}" class="form-control" id="type" name="type">
                        </div>
                    </div>
                    <div class="col-6"></div>
                </div>
                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>
