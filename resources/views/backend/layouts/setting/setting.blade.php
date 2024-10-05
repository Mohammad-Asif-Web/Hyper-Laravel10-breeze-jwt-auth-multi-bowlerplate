
@extends('backend.app')

@section('title')
    Dashboard | Home
@endsection

@push('css')
<style>
    /* Start Styling for the upload box of custom photo upload */
    .upload-box {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed #ddd;
        border-radius: 6px;
        padding: 20px;
        cursor: pointer;
        text-align: center;
        width: 100%;
        height: 150px;
        background-color: #f9f9f9;
        color: #888;
    }

    .upload-box:hover {
        background-color: #f1f1f1;
    }

    /* Styling for the preview image */
    .image-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 15px;
    }

    .image-preview img {
        max-width: 150px;
        max-height: 150px;
        margin-bottom: 10px;
        border-radius: 6px;
    }

    .remove-link {
        color: #ff6b6b;
        cursor: pointer;
        text-decoration: underline;
    }

    .remove-link:hover {
        color: #ff0000;
    }
    /* Ending Styling for the upload box of custom photo upload */

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
                                                <input type="text" class="form-control" id="title" name="meta_title" value="{{$setting->meta_title ?? 'title'}}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="description">Meta Description</label>
                                            <div class="col-md-9">
                                                <textarea id="description" name="meta_description" class="form-control">{{$setting->meta_description ?? 'description'}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="keyword">Meta Keywords</label>
                                            <div class="col-md-9">
                                                <input type="text" id="keyword" name="meta_keywords" class="form-control" value="{{$setting->meta_keywords ?? 'keywords'}}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="favicon">Favicon</label>
                                            <div class="col-md-9">
                                                {{-- Start upload box of custom photo upload --}}
                                                <label for="avatar" class="upload-box">
                                                    <span id="upload-text">Click to upload a photo</span>
                                                    <input id="avatar" name="favicon" type="file" accept="image/*" style="display: none;" />
                                                </label>
                                                <div class="image-preview mt-3" id="file-previews" style="display: none;">
                                                    <img id="preview-image" src="" alt="Selected Image" />
                                                    <span class="remove-link" id="remove-photo">Remove</span>
                                                </div>
                                                {{-- Ending upload box of custom photo upload --}}
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

@endsection

@push('script')
    <script></script>
@endpush

