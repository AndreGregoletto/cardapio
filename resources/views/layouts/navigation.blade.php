<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit()" class="nav-link">Sair</a>
            <form id="form-logout" action="{{route('logout')}}" method="post" class="d-nome">
            @csrf
            </form>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth()->user()->logo ?? 'img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <x-nav-link href="{{route('dashboard')}}" active="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        Home
                    </x-nav-link>
                </li>

                @if(auth()->user()->hasRole('Admin'))

                <li class="nav-item">
                    <x-nav-link href="{{route('admin.collaborators.index')}}" active="admin.collaborators.*">
                        <i class="nav-icon fas fa-users"></i>
                        Colaboradores
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="{{ route('admin.clients.index') }}" active="admin.clients.*">
                        <i class="nav-icon fas fa-users"></i>
                        Clientes
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="{{route('admin.categories.index')}}" active="admin.categories.*">
                        <i class="nav-icon fas fa-list-ol"></i>
                        Categorias
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="{{route('admin.products.index')}}" active="admin.products.*">
                        <i class="nav-icon fas fa-th-list"></i>
                        Produtos
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="{{route('admin.type-payments.index')}}" active="admin.type-payment.*">
                        <i class="nav-icon fas fa-credit-card"></i>
                        Métodos de pagamento
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="#">
                        <i class="nav-icon fas fa-basket-shopping"></i>
                        Pedidos
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="#">
                        <i class="nav-icon fas fa-cog"></i>
                        Configurações
                    </x-nav-link>
                </li>

                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
</aside>
