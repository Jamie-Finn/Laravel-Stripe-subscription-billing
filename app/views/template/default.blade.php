<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Website</title>

		<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	</head>
	<body>

		@include('template.partials._notice')

		<div class="wrapper">
			@yield('content')
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		@yield('scripts')
	</body>
</html>

<!--Default blade template layout that every view will use-->