<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description"
    content="A welcome page for this site" />
    <meta name="keywords"
    content="Welcome page, first page, custom page" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome Page</title>

    {{-- style --}}
    <link rel="shortcut icon" href="{{asset('uploads/favicon/favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <style>
        a:hover{
            background-color: #0f0d0d;
        }
    </style>

</head>

<body style="background-color: #302e2e; display:flex; justify-content:center;" >

    <main class="" style="color: #fff;width:600px; text-align:center">
        <h1>Welcome page</h1>
        <h3 class="">A place for Welcome which comes first moment.</h3>
        <p class="" style="text-align: justify">
            At [App Name], we help you create beautiful, lasting memorials that
            can be accessed by friends and family through unique QR codes. By
            scanning the code, anyone can visit a personalized page filled with
            memories, tributes, and stories that celebrate the life of someone
            special.
        </p>

        <div>Login Here</div>

        <section style="display:flex;flex-direction:column;gap:20px;margin-top:20px;">
            <a href="{{route('google.login')}}" style="display: flex; gap:5px; text-align:center; justify-content:center; border: 1px solid #fff;"
            class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" class="h-20px me-3"
                    src="{{ asset('backend/media/svg/brand-logos/google-icon.svg') }}"/>
                <p style="color: #fff;">Continue with Google</p>
            </a>
            <a href="{{route('github.login')}}" style="display: flex; gap:5px; text-align:center; justify-content:center;border: 1px solid #fff;"
            class="btn btn-flex flex-center btn-light btn-lg w-100">
                    <p style="color: #fff;">Continue with Github</p>
            </a>
            <a href="{{route('linkedin.login')}}" style="display: flex; gap:5px; text-align:center; justify-content:center;border: 1px solid #fff;"
            class="btn btn-flex flex-center btn-light btn-lg w-100">
                    <p style="color: #fff;">Continue with LinkedIn</p>
            </a>
            <a href="" style="display: flex; gap:5px; text-align:center; justify-content:center;border: 1px solid #fff;"
            class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" class="h-20px me-3"
                    src="{{ asset('backend/media/svg/brand-logos/facebook-4.svg') }}" />
                <p style="color: #fff;">Continue with Facebook</p>
            </a>
            <a href="" style="display: flex; gap:5px; text-align:center; justify-content:center;border: 1px solid #fff;"
            class="btn btn-flex flex-center btn-light btn-lg w-100">
                {{-- <img src="{{ asset('backend/media/svg/brand-logos/apple-black.svg') }}" style="width: 15px;"
                    alt="Logo" class="theme-light-show h-20px me-3" /> --}}
                <img  src="{{ asset('backend/media/svg/brand-logos/apple-black-dark.svg') }}" style="width:22px;"
                    alt="Logo" class="theme-dark-show h-20px me-3" />
                <p style="color: #fff;">Continue with Apple</p>
            </a>

        </section>

    </main>


    {{-- Script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {

            toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script>

</body>

</html>
