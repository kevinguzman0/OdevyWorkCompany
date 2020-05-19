@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

<!-- Cart -->

	<section id="cart_items">Carrito
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Inicio</a></li>
				  <li class="active">Carro de compras</li>
				</ol>
			</div>

			<?php $valor = 0 ?>

			@if (session('carrito'))	
				
				@foreach(session('carrito') as $carro)

				<?php $valor += $carro['PrecioUnitario'] * $carro['cantidad'] ?>


					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">Producto</td>
									<td class="description"></td>
									<td class="price">Precio</td>
									<td class="quantity">Cantidad</td>
									<td class="total">Total</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
					            <tr>
									<td class="cart_product">	
										{{ $carro['nombre'] }}
									</td>
									<td class="cart_description">
										<h4><a href="#">{{ $carro->idProducto->descripcion }}</a></h4>
										
									</td>
									<td class="cart_price">
					            <p>{{ $carro['precioUnitario'] }}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up" href="#"> + </a>
											<input class="cart_quantity_input" type="text" name="quantity" value="#" autocomplete="off" size="2" disabled>{{ $carro['cantidad'] }}
											<a class="cart_quantity_down" href="#"> - </a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">{{ $carro['precioUnitario'] * $carro['cantidad'] }}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="#"><i class="fa fa-times"></i></a>
									</td>
								</tr>								
							</tbody>
						</table>
					</div>
				 @endforeach				
			@endif
		</div>
	</section>

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Datos de la compra</h3>
				<p>En este apartado se agrega el IVA y los gastos de envio.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					{{--  TODO
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Retiro en tienda</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Enviar</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Usar cupon de descuento</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Región:</label>
							
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
						
							</li>
							<li class="single_field">
								<label>Ciudad:</label>
						
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
						
							</li>
					
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
					
						</ul>
				
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
				
					</div>   --}}
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Sub total <span></span></li>
							<li>IVA <span>19%</span></li>
							<li>Gastos de envio <span>$0</span></li>
							<li>Total <span>total</span></li>
						</ul>
							
								<a class="btn btn-default btn-block check_out" href="#">Confirmar compra</a>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<!-- Newsletter -->

@endsection