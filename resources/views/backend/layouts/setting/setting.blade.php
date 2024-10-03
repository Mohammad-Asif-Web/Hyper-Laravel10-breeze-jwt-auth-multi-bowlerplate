
@extends('backend.app')

@section('title')
    Dashboard | Home
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">General Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">General Setting</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding: 0 24px; padding-bottom: 24px;">
                        {{-- <h4 class="header-title mb-3" style="background-color: #536de6;"><i class="mdi mdi-account-circle font-18 align-middle me-1"></i>General Setting</h4> --}}
                             <ul class="nav form-wizard-header mb-4" style="background-color: #536de6;">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-2 active" style="color: #fff">
                                        <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">General Setting</span>
                                    </a>
                                </li>
                            </ul>
                            <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="title">Meta Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="title" name="meta_title" value="hyper">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="description">Meta Description</label>
                                            <div class="col-md-9">
                                                <textarea id="description" name="meta_description" class="form-control" value="123456789"> </textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="keyword">Meta Keywords</label>
                                            <div class="col-md-9">
                                                <input type="text" id="keyword" name="meta_keywords" class="form-control" value="123456789">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-inline wizard mb-0">
                                    <li class="next list-inline-item float-end">
                                        <button type="submit" class="btn btn-info">Update Info <i class="mdi mdi-arrow-right ms-1"></i></button>
                                    </li>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@push('script')
    <script></script>
@endpush




{{--
<form class="form" action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">

    <input type="text" class="form-control form-control-solid" name="meta_title" value="{{ $setting->meta_title ?? 'this is website title' }}" />
    <textarea class="form-control form-control-solid" name="meta_description">{{ $setting->meta_description ?? 'this is website description' }}</textarea>
    <input type="text" class="form-control form-control-solid" name="meta_keywords" value="{{  $setting->meta_keywords ?? 'key, words'}}" data-kt-ecommerce-settings-type="tagify" />
 --}}
