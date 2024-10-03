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
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- Breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end Breadcrumb -->

            <div class="row">
                <div class="col-sm-12">
                    <!-- Profile -->
                    <div class="card bg-primary">
                        <div class="card-body profile-user-box">
                            <div class="row">
                                {{-- right side --}}
                                <div class="col-sm-8">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-lg">
                                                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('backend/images/users/avatar-2.jpg')}}" alt="" class="rounded-circle img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <h4 class="mt-1 mb-1 text-white">{{ Str::upper(Auth::user()->name ?? 'Michael Franklin') }}</h4>
                                                <p class="font-13 text-white-50 text-capitalize"> Authorised {{ (Auth::user()->role) }}</p>

                                                <ul class="mb-0 list-inline text-light">
                                                    <li class="list-inline-item me-3">
                                                        <h5 class="mb-1 text-white">$ 25,184</h5>
                                                        <p class="mb-0 font-13 text-white-50">Total Revenue</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <h5 class="mb-1 text-white">5482</h5>
                                                        <p class="mb-0 font-13 text-white-50">Number of Orders</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <h5 class="mb-1 text-white">3082</h5>
                                                        <p class="mb-0 font-13 text-white-50">Number of Users</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <h5 class="mb-1 text-white">8482</h5>
                                                        <p class="mb-0 font-13 text-white-50">Current Traffic</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- left side --}}
                                {{-- <div class="col-sm-4">
                                    <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                        <button type="button" class="btn btn-light">
                                            <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                        </button>
                                    </div>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- left side --}}
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Admin Information</h4>
                            <p class="text-muted font-13">
                                Hye, I’m {{Auth::user()->name ?? 'Michael Franklin'}} residing in this beautiful world. I'm the owner of this ''this websites. this project is a service based project for public peoples.
                            </p>

                            <hr />

                            <div class="text-start">
                                <p class="text-muted"><strong>Full Name :</strong> <span class="ms-2">{{Auth::user()->name ?? 'Michael Franklin'}}</span></p>
                                <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{Auth::user()->email ?? 'coderthemes@gmail.com'}} </span></p>
                                <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">{{Auth::user()->phone ?? '(+12) 123 1234 567'}}</span></p>
                                <p class="text-muted"><strong>Location :</strong> <span class="ms-2"> {{Auth::user()->location ?? 'USA'}}</span></p>
                                <p class="text-muted"><strong>City :</strong> <span class="ms-2">{{Auth::user()->city ?? 'Las Vegas'}} </span></p>
                                <p class="text-muted"><strong>Languages :</strong>
                                    <span class="ms-2">{{Auth::user()->language ?? 'English, German, Spanish'}}  </span>
                                </p>
                                <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="{{auth()->user()->facebook_url}}" target="_blank" title="Facebook"><i class="mdi mdi-facebook"></i></a>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="{{auth()->user()->twitter_url}}" target="_blank" title="Twitter"><i class="mdi mdi-twitter"></i></a>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="{{auth()->user()->skype_url}}" target="_blank" title="Skype"><i class="mdi mdi-skype"></i></a>
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Users List</h4>

                            <div class="inbox-widget">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('backend/images/users/avatar-2.jpg')}}" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Tomaslau</p>
                                    <p class="inbox-item-text">I've finished it! See you so...</p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('backend/images/users/avatar-3.jpg')}}" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Stillnotdavid</p>
                                    <p class="inbox-item-text">This theme is awesome!</p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('backend/images/users/avatar-4.jpg')}}" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Kurafire</p>
                                    <p class="inbox-item-text">Nice to meet you</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-white bg-info overflow-hidden">
                        <div class="card-body">
                            <div class="toll-free-box text-center">
                                <h4> <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901</h4>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- right side --}}
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Admin Settings</h4>
                            <div id="progressbarwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                    <li class="nav-item">
                                        <a href="#accountInfoTab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2 active">
                                            <i class="mdi mdi-account-settings font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Account Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#emailTab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-email-sync font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Change Email</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#passwordTab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-key-alert font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#socialTab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-web font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Social</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content b-0 mb-0">
                                    <div class="progress mb-3">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                    </div>
                                    {{-- Account Setting --}}
                                    <div class="tab-pane active show" id="accountInfoTab">
                                        <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data" id="profile-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    {{-- Name --}}
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="name"> Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                                                    value="{{Auth::user()->name ?? 'Francis'}}">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- phone --}}
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="phone" name="phone" class="form-control" value="{{Auth::user()->phone ?? '(+12) 123 1234 567'}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="location"> Location</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="location" name="location" class="form-control" value="{{Auth::user()->location ?? 'USA'}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="city"> City</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="city" name="city" class="form-control" value="{{Auth::user()->city ?? 'Las vegas'}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="language"> Languages</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="language" name="language" class="form-control" value="{{Auth::user()->language ?? 'English, German, Spanish'}}">
                                                        </div>
                                                    </div>
                                                    {{-- upload photo --}}
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="avatar">Avatar</label>
                                                        <div class="col-md-9">
                                                            {{-- Start upload box of custom photo upload --}}
                                                            <label for="avatar" class="upload-box">
                                                                <span id="upload-text">Click to upload a photo</span>
                                                                <input id="avatar" name="avatar" type="file" accept="image/*" style="display: none;" />
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

                                    {{-- Email Change --}}
                                    <div class="tab-pane" id="emailTab">
                                        <form action="{{route('admin.profile.update.email')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    {{-- Email --}}
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="email">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email ?? 'cory1979@hotmail.com'}}">
                                                        </div>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password"> Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="password" name="password" class="form-control" value="123456789">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard mb-0 list-inline">
                                                <li class="next list-inline-item float-end">
                                                    <button type="submit" class="btn btn-info">Update Email <i class="mdi mdi-arrow-right ms-1"></i></button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    {{-- Password Reset --}}
                                    <div class="tab-pane" id="passwordTab">
                                        <form action="{{route('admin.profile.update.password')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="email">Current Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="currentpassword" name="currentpassword" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password">New Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="password" name="password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password_confirmation">Confirm New Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                        </div>
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <ul class="pager wizard mb-0 list-inline">
                                                <li class="next list-inline-item float-end">
                                                    <button type="submit" class="btn btn-info">Update Password <i class="mdi mdi-arrow-right ms-1"></i></button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    {{-- Social Sites --}}
                                    <div class="tab-pane" id="socialTab">
                                        <form action="{{route('admin.profile.update.social')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="facebook">Facebook</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="facebook" name="facebook" class="form-control" value="https://www.facebook.com">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="twitter">Twitter</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="twitter" name="twitter" class="form-control" value="https://www.twitter.com">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="skype">Skype</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="skype" name="skype" class="form-control" value="https://www.skype.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard mb-0 list-inline">
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

        </div>

    </div>

</div>

@endsection

@push('script')
<script>

</script>
@endpush
