<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">
<head>
    <meta charset="utf-8" />
    <title>Error 500 | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
    <script src="{{asset('backend/js/hyper-config.js')}}"></script>
    <link href="{{asset('backend/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
            </g>
        </svg>
    </div>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="{{route('admin.dashboard')}}">
                                <span><img src="{{asset('backend//images/logo.png')}}" alt="logo" height="22"></span>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center">
                                <img src="{{asset('backend//images/svg/startman.svg')}}" height="120" alt="File not found Image">
                                <h1 class="text-error mt-4">500</h1>
                                <h4 class="text-uppercase text-danger mt-3">Internal Server Error</h4>
                                <p class="text-muted mt-3">Why not try refreshing your page? or you can contact <a href="#" class="text-muted"><b>Support</b></a></p>
                                <a class="btn btn-info mt-3" href="{{route('admin.dashboard')}}"><i class="mdi mdi-reply"></i> Return Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-alt">
        <script>document.write(new Date().getFullYear())</script> © Admin Dashboard
    </footer>

    <script src="{{asset('backend/js/vendor.min.js')}}"></script>
    <script src="{{asset('backend/js/app.min.js')}}"></script>

</body>
</html>
