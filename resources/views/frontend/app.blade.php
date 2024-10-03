{{-- @php
    $setting = App\Models\SystemSetting::first();
@endphp --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description"
    content=" A large number of settings, additional services and widgets." />
    <meta name="keywords"
    content="Frontend template, admin template" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Renstate - A Property based ecommerce website" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon link -->

    @if (!empty($setting->favicon))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}">
    @endif

    <title>
        @yield('title')
    </title>

    {{-- Style --}}
    @include('frontend.partials.styles')
    @stack('style')

</head>

<body>

    @include('frontend.partials.header')

    {{-- content start --}}
    @yield('content')
    <!--content  end-->

    <!--=============== scripts  ===============-->
    @include('frontend.partials.scripts')
    @stack('script')

</body>
</html>
