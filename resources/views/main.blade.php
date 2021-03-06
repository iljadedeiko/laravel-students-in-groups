<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>

<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 text-white bg-dark border-bottom shadow-sm">
    <a href="{{ route('projects') }}" class="text-decoration-none">
        <p class="h5 my-0 me-md-auto fw-normal text-white">{{ __('Projects for Students') }}</p>
    </a>
    <nav class="my-2 my-md-0 me-md-3 ml-5">
        <a class="p-2 text-white" href="{{ route('projects') }}">{{ __('Projects') }}</a>
        <a class="p-2 text-white" href="{{ route('students.create') }}">{{ __('Add new student') }}</a>
    </nav>
</header>
<div class="container mt-5">
    @yield('main-content')
</div>

</body>
</html>
