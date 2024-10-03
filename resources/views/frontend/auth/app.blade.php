<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="Authentication site, additional services and widgets." />
    <meta name="keywords" content="login, register, authentication, custom" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('uploads/favicon/favicon.ico')}}" />

    <title>
        @yield('title')
    </title>

    {{-- styles --}}
    @include('frontend.auth.partials.styles')

</head>

<body>

    @yield('content')


    <!--=============== scripts  ===============-->
    @include('frontend.auth.partials.scripts')

</body>
</html>
