
@extends('backend.app')

@section('title')
    Create | Course Lesson
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
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                    <h4 class="page-title">User</h4>
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
                                    <span class="d-none d-sm-inline">Add User</span>
                                </a>
                            </li>
                        </ul>
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- User Name --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="name">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Enter user name">
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User Email --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Enter email">
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User password --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="password">Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Enter password">
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- password confirmation --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="password_confirmation">Confirm Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                            name="password_confirmation" placeholder="Enter confirm password">
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User phone --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="phone">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            name="phone" placeholder="Enter phone">
                                        </div>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User dob --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="dob">Date of Birth</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                                            name="dob" placeholder="Enter dob">
                                        </div>
                                    </div>
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User country --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="country">Country</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                                            name="country" placeholder="Enter country">
                                        </div>
                                    </div>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User gender --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="gender">Gender</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender"
                                            name="gender" placeholder="Enter gender">
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- User gender --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="designation">Designation</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation"
                                            name="designation" placeholder="Enter designation">
                                        </div>
                                    </div>
                                    @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Status --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="userStatus">Status</label>
                                        <div class="col-md-9">
                                            <select class="form-select @error('status') is-invalid @enderror" name="status" id="userStatus">
                                                <option selected disabled>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Intro video --}}
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="avatar">Avatar</label>
                                <div class="col-md-9">
                                    <label for="avatar" class="upload-box">
                                        <span id="upload-text">Click to upload a photo</span>
                                        <input id="avatar" name="avatar" type="file" accept="image/*" style="display: none;" />
                                    </label>
                                    <div class="image-preview mt-3" id="file-previews" style="display: none;">
                                        <img id="preview-image" src="" alt="Selected Image" />
                                        <span class="remove-link" id="remove-photo">Remove</span>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-inline wizard mb-0">
                                <li class="next list-inline-item float-end">
                                    <button type="submit" class="btn btn-info">Add new lesson <i class="mdi mdi-arrow-right ms-1"></i></button>
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

@endpush

