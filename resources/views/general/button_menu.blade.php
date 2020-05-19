<div class="container_login">

    <input type="checkbox" id="toggle_login">
    @auth
         <label for="toggle_login" class="button_user">{{ Auth::user()->nombre }}</label>

    @else
        <label for="toggle_login" class="button_login"><img src="{{ asset ('icons/person.svg') }}" width="35" class="m-1"></label>

    @endauth

    <nav class="nav_login">
    	@if (Route::has('login'))
            @auth
                <a href="#">Ir al carrito</a>
        		<a href="#">Mis pedidos</a>
                <a href="{{ route('salir') }}">{{ __('Logout') }}</a>
            @else
                <a href="#" data-toggle="modal" data-target="#logueo">Ingresar</a>
	        	@if (Route::has('register'))
                    <a href="#" data-toggle="modal" data-target="#registro">Registrarse</a>
            	@endif
            @endauth
        @endif
        
    </nav>

</div>

<!-------------modal login --------------->

<div class="modal fade" id="logueo" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
    
            <div id="logreg-forms">
                <form class="form-signin" method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Iniciar Sesion</h1>
                    <div class="social-login">
                        <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Ingresar con Facebook</span> </button>
                        <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Ingresar con Google+</span> </button>
                    </div>
                    <p style="text-align:center">O</p>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <!--input type="email" id="inputEmail" class="form-control" placeholder="Correo electronico" required="" autofocus=""-->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electronico" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group col-md-12">
                                <!--input type="password" id="inputPassword" class="form-control" placeholder="contraseña" required=""-->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    <!--a href="#" id="forgot_pswd">Olvidaste tu contraseña?</a-->
                    <hr>
                    <!-- <p>Don't have an account!</p>  -->
                    <button class="btn btn-primary btn-block" type="button" id="btn-signup" data-toggle="modal" data-target="#registro" {{--data-dismiss="modal"--}}><i class="m-1 fas fa-user-plus"></p></i> Crear cuenta</button>
                    </form>
                    <br>
                    
            </div>

        </div>

    </div>

</div>

<!-------------modal registro --------------->

<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
    
            <div id="logreg-forms">
                <form class="form-signin" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                    @csrf
                    @if ($mensaje = Session::get('mensajeVerde'))
                        <div class="form-row col-md-12 alert alert-success estilo-success alert-dismissible fade show estilo-mensaje-verde" role="alert">
                            {{ $mensaje }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Crear cuenta</h1>
                    <div class="social-login">
                        <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Crear con Facebook</span> </button>
                        <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Crear con Google+</span> </button>
                    </div>
                    <p style="text-align:center">O</p>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Nombre" required="" autofocus="" name="nombre">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Apellidos" required="" autofocus="" name="apellidos">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
                            </div>
                            <div class="form-group col-md-12">
                                 <input type="password" class="form-control" placeholder="Password" required="" name="password">
                            </div>
                        </div>
                    </div>

                     <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Iniciar sesion</button>
                     <button class="btn btn-danger btn-block" id="cancel_reset" data-dismiss="modal"><i class="fas fa-angle-left"></i> Volver</button>
                    <hr>
                </form>         
                <br>
                    
            </div>

        </div>

    </div>

</div>