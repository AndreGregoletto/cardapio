<x-app-layout>
    <x-slot name="header">
        {{__('Categorias')}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
            @csrf
            @method('put')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" selected>Selecione</option>
                                <option value="active" {{$category->status == 'active' ? 'selected' : ''}}>Ativo</option>
                                <option value="inactive" {{$category->status == 'inactive' ? 'selected' : ''}}>Inativo</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Salvar</button>
                <a href="{{route('admin.categories.index')}}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>
</x-app-layout>