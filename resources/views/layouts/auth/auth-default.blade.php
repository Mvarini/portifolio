<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MAV</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="title" content="AdminLTE 4 | Register Page"/>

    @vite('resources/scss/admin.scss')
</head>

<body class="@yield('body-class') bg-body-secondary">

<div class="register-box">
    <div class="register-logo">
        <a href="{{ route('home') }}">Portifólio</a>
    </div>

    @yield('content')

</div>

@vite('resources/js/admin.js')
</body>

</html>

