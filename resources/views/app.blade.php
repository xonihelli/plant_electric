<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

		<head>
				<!--Title-->
				<title inertia>{{ config("app.name", "Laravel") }}</title>

				<!-- Meta -->
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="author" content="DexignZone">
				<meta name="robots" content="index, follow">

				<!-- MOBILE SPECIFIC -->
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- FAVICONS ICON -->
				<link rel="shortcut icon" type="image/png" href="{{ asset("/images/COV_logo.png") }}">

				<link rel="stylesheet" href="{{ asset("/assets/icons/fontawesome/css/all.min.css") }}">
				<link rel="stylesheet" href="{{ asset("/assets/icons/line-awesome/css/line-awesome.min.css") }}">
				<link rel="stylesheet" href="{{ asset("/assets/icons/simple-line-icons/css/simple-line-icons.css") }}">
				<link rel="stylesheet" href="{{ asset("/assets/icons/themify-icons/css/themify-icons.css") }}">
				<link href="{{ asset("/assets/vendor/sweetalert2/dist/sweetalert2.min.css") }}" rel="stylesheet">

				<!-- NICE SELECT -->
				<link href="{{ asset("/assets/vendor/niceselect/css/nice-select.css") }}" rel="stylesheet">

				<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

				<!-- Style css -->
				<link href="{{ asset("/assets/css/style.css") }}" rel="stylesheet">

				@routes
				@vite(["resources/js/app.js", "resources/js/Pages/{$page["component"]}.vue"])
				@inertiaHead
		</head>

		<body class="selection:bg-primary selection:text-white" data-theme-version="dark">

				@inertia

				<script defer src="{{ asset("/assets/vendor/global/global.min.js") }}"></script>
				<script defer src="{{ asset("/assets/vendor/niceselect/js/jquery.nice-select.min.js") }}"></script>

				<script defer src="{{ asset("/assets/js/deznav-init.js") }}"></script>
				<script defer src="{{ asset("/assets/js/custom.min.js") }}"></script>
				{{-- <script defer src="{{ asset('/assets/js/styleSwitcher.js') }}"></script> --}}
				{{-- <script defer src="{{ asset('/assets/js/demo.min.js') }}"></script> --}}

				<script defer src="{{ asset("/assets/vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
				<script defer src="{{ asset("/assets/vendor/datatables/js/dataTables.buttons.min.js") }}"></script>
				<script defer src="{{ asset("/assets/vendor/datatables/js/buttons.html5.min.js") }}"></script>
				<script defer src="{{ asset("/assets/vendor/datatables/js/jszip.min.js") }}"></script>
				<script defer src="{{ asset("/assets/js/plugins-init/datatables.init.min.js") }}"></script>

				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		</body>

</html>
