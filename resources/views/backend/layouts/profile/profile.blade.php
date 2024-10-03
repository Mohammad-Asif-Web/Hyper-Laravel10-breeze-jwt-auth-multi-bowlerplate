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
                                                <img src="{{asset('backend/images/users/avatar-2.jpg')}}" alt="" class="rounded-circle img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <h4 class="mt-1 mb-1 text-white">Michael Franklin</h4>
                                                <p class="font-13 text-white-50"> Authorised Admin</p>

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
                                Hye, I’m Michael Franklin residing in this beautiful world. I'm the owner of this ''this websites. this project is a service based project for public peoples.
                            </p>

                            <hr />

                            <div class="text-start">
                                <p class="text-muted"><strong>Full Name :</strong> <span class="ms-2">Michael A. Franklin</span></p>

                                <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">(+12) 123 1234 567</span></p>

                                <p class="text-muted"><strong>Email :</strong> <span class="ms-2">coderthemes@gmail.com</span></p>

                                <p class="text-muted"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                                <p class="text-muted"><strong>City :</strong> <span class="ms-2">Las Vegas</span></p>

                                <p class="text-muted"><strong>Languages :</strong>
                                    <span class="ms-2"> English, German, Spanish </span>
                                </p>
                                <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Facebook"><i class="mdi mdi-facebook"></i></a>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Twitter"><i class="mdi mdi-twitter"></i></a>
                                    <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Skype"><i class="mdi mdi-skype"></i></a>
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
                                        <a href="#account" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2 active">
                                            <i class="mdi mdi-account-settings font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Account</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-key-alert font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#social" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
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
                                    <div class="tab-pane active show" id="account">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name"> Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="name" class="form-control" value="Francis">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="phone" name="phone" class="form-control" value="(+12) 123 1234 567">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="location"> Location</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="location" name="location" class="form-control" value="USA">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="city"> City</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="city" name="city" class="form-control" value="Las Vegas">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="language"> Languages</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="language" name="language" class="form-control" value="English, German, Spanish">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                                                        data-previews-container="#file-previews">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple hidden />
                                                        </div>
                                                        <div class="dz-message needsclick">
                                                            <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                            <h3>Drop files here or click to upload.</h3>
                                                            <span class="text-muted font-13">(Upload your profile photo)</span>
                                                        </div>
                                                    </div>
                                                    <!-- file preview -->
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline wizard mb-0">
                                            <li class="next list-inline-item float-end">
                                                <a href="javascript:void(0);" class="btn btn-info">Update Info <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- Password Reset --}}
                                    <div class="tab-pane" id="profile">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1"> Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="password1" name="password1" class="form-control" value="123456789">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="confirm1">Re Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="confirm1" name="confirm1" class="form-control" value="123456789">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="next list-inline-item float-end">
                                                <button type="button" class="btn btn-info">Update Info <i class="mdi mdi-arrow-right ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- Social Sites --}}
                                    <div class="tab-pane" id="social">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="facebook">Facebook</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="facebook" name="facebook" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="twitter">Twitter</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="twitter" name="twitter" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="skype">Skype</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="skype" name="skype" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="next list-inline-item float-end">
                                                <button type="button" class="btn btn-info">Update Info <i class="mdi mdi-arrow-right ms-1"></i></button>
                                            </li>
                                        </ul>
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
