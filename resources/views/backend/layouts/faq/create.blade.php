
@extends('backend.app')

@section('title')
    Category Create | Course
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
                            <li class="breadcrumb-item active">FAQ</li>
                        </ol>
                    </div>
                    <h4 class="page-title">FAQ</h4>
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
                                    <span class="d-none d-sm-inline">Add FAQ</span>
                                </a>
                            </li>
                        </ul>
                        <form action="{{ route('admin.faq.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    {{-- question --}}
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="question">Question</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" placeholder="Enter question">
                                        </div>
                                    </div>
                                    @error('question')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- Answer --}}
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="answer">Question</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Enter answer">
                                        </div>
                                    </div>
                                    @error('answer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <ul class="list-inline wizard mb-0">
                                <li class="next list-inline-item float-end">
                                    <button type="submit" class="btn btn-info">Add new faq <i class="mdi mdi-arrow-right ms-1"></i></button>
                                </li>
                            </ul>
                        </form>

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

