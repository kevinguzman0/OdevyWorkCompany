@extends('plantillas.base.plantilla')

@include('plantillas.base.preCarga')

@include('plantillas.base.postCarga')

@include('plantillas.base.sideMenu')

@section('content')

	<style type="text/css">

		.container_login, .button_login, .button_user, .nav_login{
		    position: absolute;
		}

		.container_login{
			position: fixed;
			z-index: 999;
		    margin: auto;
		    top: 5%;
		    left: 90%;
		    margin-left: -20px;
		}

		#toggle_login{
		    display: none;
		}

		.button_login{
		    z-index: 999;
		    width: 43px;
		    height: 43px;
		    background: #bbe432;
		    border-radius: 100%;
		    transition: all 0.5s ease-in-out;
		    box-shadow: 1px 3px 10px 0 rgba(0,0,0,0.3);
		    cursor: pointer;
		}

		.button_user{
		    z-index: 999;
		    padding: 6px;
		    width: auto;
		    height: auto;
		    background: #bbe432;
		    color: black;
		    font-weight: bold;
		    border-radius: 5px;
		    transition: all 0.5s ease-in-out;
		    box-shadow: 1px 3px 10px 0 rgba(0,0,0,0.3);
		    font-family: "Roboto",sans-serif;
		    cursor: pointer;
		}

		.nav_login{
		    transform: translateY(-10%);
		    opacity: 0;
		    top: 13px;
		    left: -60px;
		    transition: all 0.5s ease-in-out;
		    background: white;
		    width: 160px;
		    border-radius: 5px;
		    transform: translateY(0%);
		    box-shadow: 2px 3px 10px 0 rgba(0,0,0,0.1);
		}

		.nav_login a{
		    text-align: center;
		    display: block;
		    margin: 20px 0;
		    color: black;
		    text-decoration: none;
		    font-family: "Roboto",sans-serif;
		    text-transform: uppercase;
		    letter-spacing: 2px;
		    transition: all 300ms;
		}

		.nav_login a:hover{
		    color: #5f5f5f;
		}

		#toggle_login:checked ~ .nav_login{
		    opacity: 1;
		    transform: translateY(10%);
		}

		#toggle_login:checked ~ .button_login{
		    box-shadow: 0 0 0 0 transparent;
		}
	</style>

	<!-- Home -->

	<div class="home">

		@include('general.button_menu')

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<div class="button_shop home_button_shop trans_200_shop">
								<a href="{{ route('formulario.categoria') }}">Shop NOW!</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<div class="button_shop home_button_shop trans_200_shop"><a href="{{ route('formulario.categoria') }}">Shop NOW!</a></div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<div class="button_shop home_button_shop trans_200_shop"><a href="{{ route('formulario.categoria') }}">Shop NOW!</a></div>
						</div>
					</div>
				</div>

			</div>
				
			<!-- Home Slider Navigation -->
			<div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="primeraPlantilla/images/prev.png" alt=""></div></div>
			<div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="primeraPlantilla/images/next.png" alt=""></div></div>

		</div>
	</div>

  	@include('general.productos')

@endsection