@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

	<div class="row col-md-12 ">

	    <div class="row col-md-11 co-mt-5 co-ml-5 form-table ">
			
			<div class="col-md-12 mt-5 ml-7">
				<h3>CARRITO DE COMPRAS</h3>
				<br><br>
			</div>

			@isset($misProductosCarrito)

			<table class="table table-striped table-bordered">

				<tbody>

					<thead class="header-tabla">

						<tr>
							<th class="header-tabla-texto">Usuario</th>
							<th class="header-tabla-texto">Producto</th>
							<th class="header-tabla-texto">Cantidad</th>
							<th class="header-tabla-texto">Precio</th>
						</tr>

					</thead>

					@foreach ($misProductosCarrito as $item)

					    <tr>
							<td style="text-align:center; font-weight: bold;"></td>

							<td style="text-align:center;">{{ $item->producto->nombre }}</td>
							<td style="text-align: center;">{{ $item->cantidad }}</td>
							<td style="text-align:center;">{{ $item->producto->precioUnitario }}</td>
						</tr>

					@endforeach
				</tbody>
			</table>

			@endisset

		</div>

	</div>
@endsection