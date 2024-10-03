@extends('backend.app')

@section('title')
   Error 404  | Dashboard
@endsection

@push('style')
    <style>

    </style>
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">404 Error</li>
                        </ol>
                    </div>
                    <h4 class="page-title">404 Error</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="{{asset('backend/images/svg/file-searching.svg')}}" height="90" alt="File not found Image">

                    <h1 class="text-error mt-4">404</h1>
                    <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                    <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                        happens to the best of us. Here's a
                        little tip that might help you get back on track.</p>

                    <a class="btn btn-info mt-3" href="index.html"><i class="mdi mdi-reply"></i> Return Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script></script>
@endpush
