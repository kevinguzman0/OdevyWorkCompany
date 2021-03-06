@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')


	<div class="row col-md-12 ">

	    

	    <div class="row col-md-11 co-mt-5 co-ml-5 form-table ">
			
			<div class="col-md-12 mt-5 ml-7">
				<h3>REGISTRO DE PRODUCTOS</h3>
				<br><br>
			</div>
			
		
	        <form class="col-md-12" 
	              action="{{ route('ingresar.producto') }}" 
	              method="POST"
	              enctype="multipart/form-data">

	            @csrf

	            @if ($mensaje = Session::get('mensajeVerde'))
			        <div class="form-row col-md-12 alert alert-success estilo-success alert-dismissible fade show estilo-mensaje-verde" role="alert">
			            {{ $mensaje }}
			            <button type="button" class="close" data-dismiss="alert">&times;</button>
			        </div>
			    @endif

			    @isset($categorias)

		            <div class="form-row">

		                <div class="col-md-3">
		                	<div class="form-group col-md-12">
			                    <label class="label-margin">Nombre</label>
			                    <input type="text" maxlength="100" name="nombre" class="form-control">
			                </div>
			            </div>

			            <div class="col-md-3">
		                	<div class="form-group col-md-12">
			                    <label class="label-margin">Cantidad</label>
			                    <input type="text" maxlength="100" name="cantidad" class="form-control">
			                </div>
			            </div>

			            <div class="col-md-3">
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
		                @isset($caracteristicas)
			                <div class="col-md-3">
			                	<div class="form-group col-md-12">
				                	<label class="label-margin">Caracteristicas</label>
				                    <select name="caracteristicas" id="caracteristicas" class="form-control">

				                    	<option value="1">seleccionar</option>
										@foreach($caracteristicas as $item)	
											<option value="{!! $item->id !!}">{{ $item->tipo }}</option>
										@endforeach

									</select>
								</div>
			                </div>
		                @endisset

					</div>
				
				@endisset

				<div class="form-row">

	                <div class="col-md-6">
	                	<div class="form-group col-md-12">
		                   <label class="label-margin">Descripción del producto</label>
			                <textarea maxlength="200" name="descripcionProducto" class="form-control" placeholder="descripción del producto"></textarea>
			            </div>
	                </div>

	                <div class="col-md-6">
	                	 <div class="form-group col-md-12">
	                	 	<label class="label-margin">Imagen del producto</label>
	                	 	<div class="custom-file">
							    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required>
							    <label class="custom-file-label" for="validatedCustomFile">Seleccione Aqui...</label>
							</div>
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
		                    <input type="number" maxlength="15" name="precioUnitario" class="form-control">
	                	</div>
	                </div>

	                <div class="col-md-4">
	                	<div class="form-group col-md-12 ">
		                    <label class="label-margin">Precio absoluto</label>
		                    <input type="number" maxlength="15" name="precioAbsoluto" class="form-control">
	                	</div>
	                </div>

	            </div>

		        @if ($errors->any())
		            <div class="alert alert-danger col-md-12 mt-3 mb-1 pl-3 pr-3 alert-dismissible fade show">
		                <ol class="estilo-lista-errores">
		                    @foreach ($errors->all() as $error)
		                        <li>{{ $error }}</li>
		                    @endforeach
		                </ol>
		                <button type="button" class="close" data-dismiss="alert">&times;</button>
		            </div>
		        @endif

	            <div class="row col-md-12 ml-1 mb-5">
	            	<div class="form-group col-md-12">
	                    <label></label>
	                    <input type="submit" value="Grabar" name="btnGrabarProducto" class="form-control btn btn-primary">
	                </div>	                
	            </div>            
	        </form>
        		<div class="form-group col-md-2">
                    <label></label>	                   
					<button class="form-control btn btn-primary" type="button" data-toggle="collapse" data-target="#tablaProductos" aria-expanded="false" aria-controls="collapseExample">
						Ver productos
						<img src="{{ asset('icons/chevron-down.svg') }}" alt="Ver productos" width="32" height="25" title="Tabla para ver productos" />
					</button>						
                </div>
                <div class="collapse col-md-12 mb-3" id="tablaProductos">
					<div class="container">
					  <h2>Productos</h2>						  
					  <table class="table table-hover">
					    <thead>
					      <tr>
					        <th>Nombre del producto</th>
					        <th>Cantidad</th>
					        <th>Acciones</th>
					      </tr>
					    </thead>
					    <tbody>
					    @foreach ($productos as $item)
					      <tr>
					        <td>{{ $item->nombre }}</td>
					        <td>{{ $item->cantidad }}</td>
					        <td>
					        	<a href="#" class="btn btn-link link-tabla boton-acciones" data-toggle="modal" data-target="#ver-editar_producto-{{ $item->id }}">
		        					Editar
		        				</a>
					        	<form method="post" action="{{ url('/productos/'.$item->id) }}">
					        	{{ csrf_field() }}
					        	{{ method_field('DELETE') }}
					        	<button type="submit" onclick="return confirm('Esta seguro de borrar este producto');">Borrar</button>
					        	</form>
					        </td>
					      </tr>
					      @include('modals.modal-editar_producto')
					    @endforeach
					    </tbody>
					  </table>
					</div>
                </div>

	    </div>

	</div>

@endsection