<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Marciel A. Varini</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ Vite::asset('resources/images/favicon.png') }}" rel="icon">
    <link href="{{ Vite::asset('resources/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @vite('resources/scss/app.scss')
</head>
<body class="index-page" @yield('body-class')>

{{--@include('layouts.web.parts.web-header')--}}

<main class="main">

    @yield('content')

    {{--    @include('layouts.web.parts.web-hero')--}}
    {{--    @include('layouts.web.parts.web-about')--}}
    {{--    @include('layouts.web.parts.web-resume')--}}
    {{--    @include('layouts.web.parts.web-services')--}}
    {{--    @include('layouts.web.parts.web-portfolio')--}}
    {{--    @include('layouts.web.parts.web-contact')--}}

</main>

{{--@include('layouts.web.parts.web-footer')--}}

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

@vite('resources/js/app.js')

</body>

</html>
