<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MAV</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @vite('resources/scss/admin.scss')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    @include('layouts.app.parts.header')
    @include('layouts.app.parts.sidebar')

    <main class="app-main">
        @yield('content')
    </main>

    @include('layouts.app.parts.footer')

</div>

@stack('scripts')
@vite('resources/js/admin.js')
</body>

</html>
