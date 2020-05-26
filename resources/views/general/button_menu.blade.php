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
                <a href="{{ route('carrito.mostrar') }}">Ir al carrito</a>
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

@include('modals.modal-login')

<!-------------modal registro --------------->

@include('modals.modal-register')