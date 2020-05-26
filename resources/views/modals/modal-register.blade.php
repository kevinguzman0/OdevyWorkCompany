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
                        <button class="btn facebook-btn social-btn" type="button" onclick="window.location='{{ url("redirect/facebook") }}'"><span><i class="fab fa-facebook-f"></i> Crear con Facebook</span> </button>
                        <button class="btn google-btn social-btn" type="button" onclick="window.location='{{ url("redirect/google") }}'"><span><i class="fab fa-google-plus-g"></i> Crear con Google+</span> </button>
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