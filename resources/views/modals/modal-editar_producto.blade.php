<!---------modal product------------>

		<div class="modal fade" id="ver-editar_producto-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    
		    <div class="modal-dialog" role="document">
		    
		        <div class="modal-content">
		    
		            <div class="modal-header">
		    
		                <h6 class="modal-title">Nombre:  {{ $item->nombre }} </h6>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		    
		            </div>
		    
		            <div class="modal-body">

		                <div class="form-row">

			                <div class="col-md-4">
			                	<div class="form-group col-md-12">
				                    <label class="label-margin">Nombre</label>
				                    <input type="text" maxlength="100" name="nombre" class="form-control" placeholder="{{ $item->nombre }}">
				                </div>
				            </div>

				            <div class="col-md-4">
			                	<div class="form-group col-md-12">
				                    <label class="label-margin">Cantidad</label>
				                    <input type="text" maxlength="100" name="cantidad" class="form-control" placeholder="{{ $item->cantidad }}">
				                </div>
				            </div>

				            <div class="col-md-4">
				            	<div class="form-group col-md-12">
				                    <label class="label-margin">Categoria</label>
				                    <select name="categoria" id="categoria" class="form-control">

										<option value="1">seleccionar</option>
										@foreach($categorias as $item)
											<option value="{!! $item->id !!}">{{ $item->nombre }}</option>
										@endforeach

									</select>
								</div>
			                </div>
			                
						</div>

						<div class="form-row">

			                <div class="col-md-6">
			                	<div class="form-group col-md-12">
				                   <label class="label-margin">Descripción del producto</label>
					                <textarea maxlength="200" name="descripcionProducto" class="form-control" placeholder="descripción del producto" placeholder="{{ $item->descripcion }}"></textarea>
					            </div>
			                </div>

			                <div class="col-md-6">
			                	 <div class="form-group col-md-12">
			                	 	<label class="label-margin">Imagen del producto</label>
			                	 	<div class="custom-file">
									    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required>
									    <label class="custom-file-label" for="validatedCustomFile">Imagen...</label>
									</div>
								</div>
			                </div>

			                <div class="form-row">

				                <div class="col-md-4">
				                	<div class="form-group col-md-12">
					                    <label class="label-margin">Oferta</label>
					                    <select name="oferta" id="oferta" class="form-control">

											<option value="">seleccionar</option>
											<option value="1">Si</option>
											<option value="0">No</option>

										</select>
									</div>
				                </div>

				                <div class="col-md-4">
				                	<div class="form-group col-md-12">
					                    <label class="label-margin">Precio unitario</label>
					                    <input type="number" maxlength="15" name="precioUnitario" class="form-control" placeholder="{{ $item->precioUnitario }}">
				                	</div>
				                </div>

				                <div class="col-md-4">
				                	<div class="form-group col-md-12 ">
					                    <label class="label-margin">Precio absoluto</label>
					                    <input type="number" maxlength="15" name="precioAbsoluto" class="form-control" placeholder="{{ $item->precioAbsoluto }}">
				                	</div>
				                </div>

				            </div>

			            </div>

		            </div>

		            <div class="modal-footer">
		            	@auth
                        	<button type="button" class="btn btn-success" data-dismiss="modal" onclick="location.href = '{{ route('carrito.agregar', [ $item->id]) }}'">Cambiar</button>
                        	
                        @else
                        	<button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#logueo">Para modificar debe iniciar sesión</button>
                        	@include('modals.modal-login')

                        @endauth

                        	<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="location.href = '#'">Cerrar</button>
		            </div>

		        </div>

		    </div>

		</div>

		<!-------endModal----------->