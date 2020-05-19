@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

	<div class="row col-md-12">

	    <div class="row col-md-12 mt-5 ml-5">
	        <h3>REGISTRO DE PRODUCTOS</h3>
	    </div>

	    <div class="row col-md-11 mt-5 ml-5">

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

		                <div class="col-md-4">
		                	<div class="form-group col-md-12">
			                    <label class="label-margin">Nombre</label>
			                    <input type="text" maxlength="100" name="nombre" class="form-control">
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
		                @isset($caracteristicas)
			                <div class="col-md-4">
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
							    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
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

	    </div>

	</div>
@endsection