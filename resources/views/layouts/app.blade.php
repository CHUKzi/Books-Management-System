<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | ABC Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="ABC Books Management System" name="description" />
    <meta content="ABC" name="author" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

@section('body')
@show
<div class="container">
    <div class="jumbotron mt-3">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
