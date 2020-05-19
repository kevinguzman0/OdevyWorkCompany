@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')
	
	<div class="row col-md-12">

	    <div class="row col-md-12 mt-5 ml-5">
	        <h3>REGISTRO DE PROVEEDOR</h3>
	    </div>

	    <div class="row col-md-11 mt-5 ml-5">

	        <form class="col-md-12" 
	              action="{{ route('ingresar.proveedor') }}" 
	              method="POST"
	              enctype="multipart/form-data">

	            @csrf

	            @if ($mensaje = Session::get('mensajeVerde'))
			        <div class="form-row col-md-12 alert alert-success estilo-success alert-dismissible fade show estilo-mensaje-verde" role="alert">
			            {{ $mensaje }}
			            <button type="button" class="close" data-dismiss="alert">&times;</button>
			        </div>
			    @endif

			    <div class="form-row">

			    	<div class="col-md-4">

		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Empresa</label>
		                    <input type="text" maxlength="100" name="empresa" class="form-control">
		                </div>

		            </div>

		            <div class="col-md-4">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Pais</label>
		                    <input type="text" maxlength="100" name="pais" class="form-control">
		                </div>

		            </div>

		            <div class="col-md-4">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Ciudad</label>
		                    <input type="text" maxlength="100" name="ciudad" class="form-control">
		                </div>

		            </div>

			    </div>

			    <div class="form-row">

			    	<div class="col-md-6">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Email</label>
		                    <input type="text" maxlength="100" name="email" class="form-control">
		                </div>

		            </div>

		            <div class="col-md-6">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Url</label>
		                    <input type="text" maxlength="100" name="url" class="form-control">
		                </div>

		            </div>

			    </div>

			    <div class="form-row">

			    	<div class="col-md-4">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Telefono 1</label>
		                    <input type="text" maxlength="100" name="telefono1" class="form-control">
		                </div>

		            </div>

		            <div class="col-md-4">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Telefono 2</label>
		                    <input type="text" maxlength="100" name="telefono2" class="form-control">
		                </div>

		            </div>

		            <div class="col-md-4">
			    		
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Codigo postal</label>
		                    <input type="text" maxlength="100" name="codigoPostal" class="form-control">
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

	            <div class="row col-md-12 ml-0 w-33">
	            	<div class="form-group col-md-6">
	                    <label></label>
	                    <input type="submit" value="Grabar" name="btnGrabarProducto" class="form-control btn btn-primary">
	                </div>

	                <div class="form-group col-md-6">
	                    <label></label>	
						<input type="button" value="Registrar producto a proveedor " name="btnGrabarProducto" class="form-control btn btn-warning" data-toggle="collapse" data-target="#añadirProducto" aria-expanded="false" aria-controls="collapseExample">
	                </div>

	            </div>

			</form>
		</div>
	</div>

	<div class="collapse row col-md-11 mt-4 ml-5"  id="añadirProducto">

		<form class="col-md-12" 
              action="{{ route('añadir.producto') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @isset($proveedores)

	        	<div class="form-row">
		        	<div class="col-md-6">
		            	<div class="form-group col-md-12">
		                    <label class="label-margin">Proveedor</label>
		                    <select name="proveedor" id="proveedor" class="form-control">

								<option value="1">seleccionar</option>
								@foreach($proveedores as $item)
									<option value="{!! $item->id !!}">{{ $item->empresa }}</option>
								@endforeach

							</select>
						</div>
	                </div>
	       	@endisset

	       	@isset($productos)
		        	<div class="col-md-6">
		            	<div class="form-group col-md-11">
		                    <label class="label-margin">Producto</label>
		                    <select name="producto" id="producto" class="form-control">

								<option value="1">seleccionar</option>
								@foreach($productos as $item)
									<option value="{!! $item->id !!}">{{ $item->nombre }}</option>
								@endforeach

							</select>
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
            	<div class="form-group col-md-12">
                    <label></label>
                    <input type="submit" value="Grabar" name="btnGrabarProducto" class="form-control btn btn-primary">
                </div>
	        </div>

		</form>
	</div>
@endsection