<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }}</title>

	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet" />
	<!-- Select js and css -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.11/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet" />
	@yield('stylesheets')

	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
	<div id="app">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}"></script>

	@yield('scripts')
</body>
</html>
