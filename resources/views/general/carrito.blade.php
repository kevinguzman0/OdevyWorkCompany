@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}"> 

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/product_background.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Carrito</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.html">Inicio</a></li>
						<li>Tu Carrito</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

		<!-- Cart -->

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

	<div class="cart_section">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-start">
									<li>Producto</li>
									<li>Color</li>
									<li>Tamaño</li>
									<li>Precio</li>
									<li>Cantidad</li>
									<li>Total</li>
								</ul>
							</div>

							@isset($misProductosCarrito)
								<!-- Cart Items -->
								<div class="cart_items">
									@foreach($misProductosCarrito as $item)

										<ul class="cart_items_list">

											<!-- Cart Item -->
											<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
												<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
													<div><div class="product_image"><img src="images/cart_1.jpg" alt=""></div></div>
													<div class="product_name"><a href="product.html">{{ $item->producto->nombre }}</a></div>
												</div>
												<div class="product_color text-lg-center product_text"><span>Color: </span>Brown</div>
												<div class="product_size text-lg-center product_text"><span>Size: </span>One Size</div>
												<div class="product_price text-lg-center product_text"><span>Price: </span>${{ $item->producto->precioUnitario }}</div>
												<div class="product_quantity_container">
													<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
														<span class="product_text product_num">{{ $item->cantidad }}</span>
														<div class="qty_sub qty_button trans_200 text-center" onclick="location.href = '{{ route('carrito.cantidad.disminuir', [$item->id]) }}'"><span>-</span></div>
														<div class="qty_add qty_button trans_200 text-center" onclick="location.href = '{{ route('carrito.cantidad.aumentar', [$item->id]) }}'"><span>+</span></div>
													</div>
												</div>
												<div class="product_total text-lg-center product_text"><span>Total: </span>$19.50</div>
											</li>
										</ul>
									@endforeach
								</div>

							@endisset

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_continue trans_200"><a href="{{ route('inicio')}}">Continuar comprando</a></div>
									<div class="button button_clear trans_200"><a href="{{ route('carrito.limpiar') }}">Limpiar carrito</a></div>
									<div class="button button_update trans_200"><a href="#ir_a_checkout">comprar</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section_container cart_extra_container" id="ir_a_checkout">
			<div class="container">
				<div class="row">

					<!-- Shipping & Delivery -->
					<!--div class="col-xxl-6">
						<div class="cart_extra cart_extra_1">
							<div class="cart_extra_content cart_extra_coupon">
								<div class="cart_extra_title">Coupon code</div>
								<div class="coupon_form_container">
									<form action="#" id="coupon_form" class="coupon_form">
										<input type="text" class="coupon_input" required="required">
										<button class="coupon_button">apply code</button>
									</form>
								</div>
								<div class="shipping">
									<div class="cart_extra_title">Shipping Method</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Next day delivery</span>
											</label>
											<div class="shipping_price ml-auto">$4.99</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Standard delivery</span>
											</label>
											<div class="shipping_price ml-auto">$1.99</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" checked>
												<span class="radio_mark"></span>
												<span class="radio_text">Personal Pickup</span>
											</label>
											<div class="shipping_price ml-auto">Free</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div-->

					<!-- Cart Total -->
					<div class="col-xxl-6">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Total del carrito</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">$29.90</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Envio</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">$29.90</div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="checkout.html">ir al checkout</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection