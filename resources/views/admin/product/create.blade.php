<x-app-layout>
    <x-slot name="header">
        {{__('Produtos')}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.products.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="photo">Imagem</label><br>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="code">Código</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{old('code')}}">
                            @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" selected>Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
                            @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">
                    </textarea>
                </div>
                <button class="btn btn-primary">Cadastrar</button>
                <a href="{{route('admin.products.index')}}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>
</x-app-layout>