<!---------modal product------------>

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
		            	@auth
                        	<button type="button" class="btn btn-success" data-dismiss="modal" onclick="location.href = '{{ route('carrito.agregar', [ $producto->id]) }}'">Comprar</button>
                        	
                        @else
                        	<button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#logueo">Comprar</button>
                        	@include('modals.modal-login')

                        @endauth

                        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="location.href = '#'">Cerrar</button>

		            </div>

		        </div>

		    </div>

		</div>

		<!-------endModal----------->