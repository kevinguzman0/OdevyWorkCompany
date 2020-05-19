<!-- ================ trending product section start ================= -->  
<section class="section-margin calc-60px">
  <div class="row col-md-12 mb-3 mt-3">

    @foreach($productos as $producto)
    	<a href="#" class="btn btn-link link-tabla boton-acciones" data-toggle="modal" data-target="#ver-producto-{{ $producto->id }}">
		
		  <div class="col-md-6 col-lg-4 col-xl-3">
		    <div class="card text-center card-product">
		      <div class="card-product__img">
		        <img class="card-img" src="images/product5.png" alt="">
		        <ul class="card-product__imgOverlay">
		          <li><button><i class="ti-search"></i></button></li>
		          <li><button onclick="location.href = '{{ route('carrito.agregar', [ $producto->id, $producto->precioUnitario ]) }}'"><i class="ti-shopping-cart"></i></button></li>
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

		</a>

		<!---------modal------------>

		<div class="modal fade" id="ver-producto-{{ $producto->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    
		    <div class="modal-dialog" role="document">
		    
		        <div class="modal-content">
		    
		            <div class="modal-header">
		    
		                <h6 class="modal-title">Id producto [ {{ $producto->id }} ]</h6>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		    
		            </div>
		    
		            <div class="modal-body">

		                <div class="modal-body-descripcion">
		                    <h6 class="modal-title" id="modal_body_descripcion">{{ $producto->name }}</h6>
		                </div>

		                <img class="card-img" src="images/product5.png" alt="">

		            </div>

		            <div class="modal-footer">

                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location.href = '#'">Comprar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="location.href = '#'">Cerrar</button>

		            </div>

		        </div>

		    </div>

		</div>

		<!-------endModal----------->

    @endforeach

  </div>

</section>

<!-- ================ trending product section end ================= --> 