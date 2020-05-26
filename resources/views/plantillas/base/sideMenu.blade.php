@section('sideMenu')
	
	<!-- Sidebar -->

	<div class="sidebar">
			
		<!-- Logo -->
		<div class="sidebar_logo">
			<a href="#"><div>a<span>star</span></div></a>
		</div>

		<!-- Sidebar Navigation -->
		<nav class="sidebar_nav">

			<ul>
				<li><a href="{{ route('inicio') }}">inicio<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

				<li><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Administrar<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

				<ul class="collapse list-unstyled ml-4 mb-3" id="homeSubmenu">
					<li><a href="{{ route('formulario.producto') }}">Producto<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					<li><a href="{{ route('formulario.categoria') }}">Categoria<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					<li><a href="{{ route('formulario.detalle') }}">Detalle<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					<li><a href="{{ route('formulario.oferta') }}">Oferta<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					<li><a href="{{ route('formulario.proveedor') }}">Proveedor<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				</ul>
				
			
				<li><a href="#">categorias<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="#">contact<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			</ul>
		</nav>

		<!-- Cart -->

		<div class="cart d-flex flex-row align-items-center justify-content-start">
			<div class="cart_icon"><a href="{{ route('carrito.mostrar') }}">
				<img src="images/bag.png" alt="">
				<div class="cart_num"><span class="badge">{{ cantidad_producto_carrito('cantidadCarrito') }}</span></div>
			</a></div> 
			<div class="cart_text">Bolsa</div>
			<div class="cart_price"> </div>
		</div>
	</div>


@endsection