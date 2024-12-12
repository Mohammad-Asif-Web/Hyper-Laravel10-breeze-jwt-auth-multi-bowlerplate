
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
                            <li class="breadcrumb-item active">Privacy & Policy</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Privacy & Policy</h4>
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
                                    <span class="d-none d-sm-inline">Add Privacy & Policy</span>
                                </a>
                            </li>
                        </ul>
                        <form action="{{ route('admin.policy.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    {{-- question --}}
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="description">Content</label>
                                        <div class="col-md-9">
                                            <textarea id="description" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Enter policy content">{{ $policy->description ?? '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                    @error('question')
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
    {{-- Add CKEditor script --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

