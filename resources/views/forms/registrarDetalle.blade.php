@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')
	
	<div class="row col-md-12">

	    <div class="row col-md-12 mt-5 ml-5">
	        <h3>REGISTRO DE DETALLES</h3>
	    </div>

	    <div class="row col-md-5 mt-5 ml-5">

	    	@if ($mensaje = Session::get('mensajeVerde'))
		        <div class="form-row col-md-12 ml-3 alert alert-success estilo-success alert-dismissible fade show estilo-mensaje-verde" role="alert">
		            {{ $mensaje }}
		            <button type="button" class="close" data-dismiss="alert">&times;</button>
		        </div>
		    @endif

	    	 <form class="col-md-12" 
	              action="{{ route('ingresar.detalle') }}" 
	              method="POST"
	              enctype="multipart/form-data">

	            @csrf

			    @isset($detalles)

				    <div class="form-row">

				    	<div class="col-md-12">
		                	<div class="form-group col-md-12">
			                    <label class="label-margin">Tipo</label>
			                    <input type="text" maxlength="100" name="tipo" class="form-control">
			                </div>
			            </div>

			        </div>

		        @endisset

		        @if ($errors->any())
		            <div class="alert alert-danger col-md-12 mt-3 mb-1 pl-3 pr-3 alert-dismissible fade show">
		                <ol class="estilo-lista-errores">
		                    @foreach ($errors->all() as $error)
		                        <li class="ml-2">{{ $error }}</li>
		                    @endforeach
		                </ol>
		                <button type="button" class="close" data-dismiss="alert">&times;</button>
		            </div>
		        @endif

	            <div class="row col-md-12 mb-5 w-33">
	            	<div class="form-group col-md-10">
	                    <label></label>
	                    <input type="submit" value="Grabar" name="btnGrabarProducto" class="form-control btn btn-primary">
	                </div>

	                <div class="form-group col-md-2">
	                    <label></label>
	                    <a href="#">
							<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#añadirDetalle" aria-expanded="false" aria-controls="collapseExample">

								<img src="{{ asset('icons/chevron-right.svg') }}" alt="Añadir detalle" width="32" height="25" title="Añadir detalle al producto" />

							</button>
						</a>

	                </div>

	            </div>

	        </form>

	    </div>

    	<div class="collapse row col-md-5 mt-5 ml-5"  id="añadirDetalle">

			<form class="col-md-12" 
	              action="{{ route('añadir.detalle') }}" 
	              method="POST"
	              enctype="multipart/form-data">

	            @csrf

		        @isset($detalles)

		        	<div class="form-row">
			        	<div class="col-md-6">
			            	<div class="form-group col-md-12">
			                    <label class="label-margin">Detalle</label>
			                    <select name="detalles" id="detalles" class="form-control">

									<option value="1">seleccionar</option>
									@foreach($detalles as $item)
										<option value="{!! $item->id !!}">{{ $item->tipo }}</option>
									@endforeach

								</select>
							</div>
		                </div>
		       	@endisset

                @isset($productos)
	                <div class="col-md-6">
	                	<div class="form-group col-md-12">
		                	<label class="label-margin">Producto</label>
		                    <select name="productos" id="productos" class="form-control">

		                    	<option value="1">seleccionar</option>
								@foreach($productos as $item)	
									<option value="{!! $item->id !!}">{{ $item->nombre }}</option>
								@endforeach

							</select>
						</div>
	                </div>
	            </div>
            	@endisset

            	<div class="form-row">
	            	<div class="col-md-12">
	                	<div class="form-group col-md-12">
		                    <label class="label-margin">Valor</label>
		                    <input type="text" maxlength="100" name="valor" class="form-control">
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
	                    <input type="submit" value="Grabar" name="btnGrabarDetalle" class="form-control btn btn-primary">
	                </div>
	            </div>	

	        </form>

    	</div>  

	</div>

@endsection