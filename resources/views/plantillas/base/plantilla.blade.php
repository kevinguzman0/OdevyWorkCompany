<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Tienda en Linea</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="aStar Fashion Template Project">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('preCarga')

	</head>

	<body>

		@yield('sideMenu')


		<div class="super_container">
		
			@yield('content')

			@include('plantillas.base.footer')

		</div>

		@yield('postCarga')

	</body>
</html>