<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="description" content="Tiket Auto Print">
	<meta name="author" content="{{ config('app.name', 'Laravel') }}">

	<style>
		img {
			border:1px dashed black;
		}
		@media print {
			@page {
				margin: 0;
				size: A4 landscape;
			}
		}
	</style>
</head>

<body onload="window.print()">
	<img src="{{ route('admin.user.ticket', ['id' => $user->id]) }}">
</body>
</html>