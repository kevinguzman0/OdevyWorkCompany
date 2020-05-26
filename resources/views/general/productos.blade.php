<section class="section-margin calc-60px">
  <div class="row col-md-12 mb-3 mt-3">

    @foreach($productos as $producto)
    	
		
		  <div class="col-md-6 col-lg-4 col-xl-3">
		    <div class="card text-center card-product">
		      <div class="card-product__img">
		      	<a href="#" class="btn btn-link link-tabla boton-acciones" data-toggle="modal" data-target="#ver-producto-{{ $producto->id }}">
		        	<img class="card-img" src="images/product5.png" alt="">
		        </a>
		        <ul class="card-product__imgOverlay">
		          <li><button><i class="ti-search"></i></button></li>

		          @auth

		          	<li><button onclick="location.href = '{{ route('carrito.agregar', [ $producto->id]) }}'"><i class="ti-shopping-cart"></i></button></li>

		          @else
		          	<li><button type="button" data-toggle="modal" data-target="#logueo"><i class="ti-shopping-cart"></i></button></li>
		          	@include('modals.modal-login')

		          @endauth

		          <li><button><i class="ti-heart"></i></button></li>
		        </ul>
		      </div>
		      <div class="card-body">
		        <p>{{ $producto->idCategoria }}</p>
		        <h4 class="card-product__title"><a href="single-product.html">{{ $producto->nombre }}</a></h4>
		        <p class="card-product__price">{{ $producto->precioUnitario }}</p>
		      </div>
		    </div>
		  </div>

		<!---------modal product------------>

		@include('modals.modal-product')

    @endforeach

  </div>

</section>