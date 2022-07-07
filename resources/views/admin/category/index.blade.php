<x-app-layout>
    <x-slot name="header">
        {{__('Categorias')}}
    </x-slot>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{__($category->status)}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a 
                                        href="{{route('admin.categories.destroy', $category->id)}}" 
                                        onclick="event.preventDefault(); 
                                        document.getElementById('form-delete-{{$category->id}}').submit();" 
                                        class="btn btn-danger"
                                    >
                                    <i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.categories.destroy', $category->id)}}" id="form-delete-{{$category->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
</x-app-layout>