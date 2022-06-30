<x-guest-layout>
    <div class="login-box container">
        <div class="login-logo">
            <a href="#"><p class="text-center mb-2 mt-3"><b>CARDÁPIO</b>online</p></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg text-center mb-3">Sign in to start your session</p>

            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-Invalid @enderror" name="email" placeholder="E-mail">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-Invalid @enderror" name="password" placeholder="Senha">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" name="rememberme" id="remember">
                        <label for="remember">
                            Lembrar-me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-outline-primary btn-block bg-primary text-white">Entrar</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p class="mb-3">- Ou -</p>
                <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('password.request')}} text-left">Esqeuceu a senha?</a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</x-guest-layout>
