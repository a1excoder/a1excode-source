<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Все о программировании, новости в сфере IT и многое другое" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/app-logo.jpg') }}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
</head>
<body>

@include('layouts.header')

{{-- HANDLER ALL ERRORS --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- END HANDLER ALL ERRORS --}}

@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif

    <div class="container-fluid">

        @yield('body-container')

    </div>

@include('layouts.footer')

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
