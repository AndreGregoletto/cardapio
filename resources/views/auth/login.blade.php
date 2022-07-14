<x-guest-layout class="bg-light container hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
           <div class="card-header text-center">
              <a href="{{ route('login') }}" class="h4"><b>Cardapio</b> <h6>Online</h6></a>
           </div>
           <div class="card-body">
              <p class="login-box-msg">Faça login para iniciar sua sessão</p>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                 <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid  @enderror" name="email" placeholder="E-mail">
                    <div class="input-group-append">
                       <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                       </div>
                    </div>
                 </div>
                 @error('email')
                        <span class=" input-group mb-3 alert alert-danger"> {{ $message }}</span> 
                    @enderror
                 <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" placeholder="Senha">
                    <div class="input-group-append">
                       <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                       </div>
                    </div>
                 </div>
                    @error('password')
                        <span class=" input-group mb-3 alert alert-danger"> {{ $message }}</span> 
                    @enderror
                 <div class="row">
                    <div class="col-8">
                       <div class="icheck-primary">
                          <input type="checkbox" name="remember" id="remember">
                          <label for="remember">
                          Remember Me
                          </label>
                       </div>
                    </div>
                    <div class="col-4">
                       <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                 </div>
              </form>
              
              <p class="mb-1">
                 <a href="{{ route('password.request') }}">I forgot my password</a>
              </p>
              <!--
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
              -->
           </div>
        </div>
     </div>
</x-guest-layout>