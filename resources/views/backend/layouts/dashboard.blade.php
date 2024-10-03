@extends('backend.app')

@section('title')
    Dashboard | Home
@endsection

@push('style')
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
                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div> --}}
                    <h4 class="page-title">Welcome Admin,</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card widget-inline">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0">
                                    <div class="card-body text-center">
                                        <i class="ri-briefcase-line text-muted font-24"></i>
                                        <h3><span>29</span></h3>
                                        <p class="text-muted font-15 mb-0">Total Projects</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-list-check-2 text-muted font-24"></i>
                                        <h3><span>715</span></h3>
                                        <p class="text-muted font-15 mb-0">Total Tasks</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-group-line text-muted font-24"></i>
                                        <h3><span>31</span></h3>
                                        <p class="text-muted font-15 mb-0">Members</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-line-chart-line text-muted font-24"></i>
                                        <h3><span>93%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                        <p class="text-muted font-15 mb-0">Productivity</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Project Status</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="mt-3 mb-4 chartjs-chart" style="height: 204px;">
                            <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                        </div>

                        <div class="row text-center mt-2 py-2">
                            <div class="col-sm-4">
                                <div class="my-2 my-sm-0">
                                    <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                    <h3 class="fw-normal">
                                        <span>64%</span>
                                    </h3>
                                    <p class="text-muted mb-0">Completed</p>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="my-2 my-sm-0">
                                    <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                                    <h3 class="fw-normal">
                                        <span>26%</span>
                                    </h3>
                                    <p class="text-muted mb-0"> In-progress</p>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="my-2 my-sm-0">
                                    <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                                    <h3 class="fw-normal">
                                        <span>10%</span>
                                    </h3>
                                    <p class="text-muted mb-0"> Behind</p>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Recent Activities</h4>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="{{asset('backend/images/users/avatar-2.jpg')}}" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1">Soren Drouin<small class="fw-normal ms-3">18 Jan 2019 11:28 pm</small></h5>
                                                    <span class="font-13">Completed "Design new idea"...</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">Project</span> <br />
                                            <p class="mb-0">Hyper Mockup</p>
                                        </td>
                                        <td class="table-action" style="width: 50px;">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="{{asset('backend/images/users/avatar-6.jpg')}}" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1">Anne Simard<small class="fw-normal ms-3">18 Jan 2019 11:09 pm</small></h5>
                                                    <span class="font-13">Assigned task "Poster illustation design"...</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">Project</span> <br />
                                            <p class="mb-0">Hyper Mockup</p>
                                        </td>
                                        <td class="table-action" style="width: 50px;">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="{{asset('backend/images/users/avatar-3.jpg')}}" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1">Nicolas Chartier<small class="fw-normal ms-3">15 Jan 2019 09:29 pm</small></h5>
                                                    <span class="font-13">Completed "Drinking bottle graphics"...</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">Project</span> <br />
                                            <p class="mb-0">Web UI Design</p>
                                        </td>
                                        <td class="table-action" style="width: 50px;">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="{{asset('backend/images/users/avatar-4.jpg')}}" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1">Gano Cloutier<small class="fw-normal ms-3">10 Jan 2019 08:36 pm</small></h5>
                                                    <span class="font-13">Completed "Design new idea"...</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">Project</span> <br />
                                            <p class="mb-0">UBold Admin</p>
                                        </td>
                                        <td class="table-action" style="width: 50px;">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle" src="{{asset('backend/images/users/avatar-5.jpg')}}" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1">Francis Achin<small class="fw-normal ms-3">08 Jan 2019 12:28 pm</small></h5>
                                                    <span class="font-13">Assigned task "Hyper app design"...</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">Project</span> <br />
                                            <p class="mb-0">Website Mockup</p>
                                        </td>
                                        <td class="table-action" style="width: 50px;">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Your Calendar</h4>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div data-provide="datepicker-inline" data-date-today-highlight="true" class="calendar-widget"></div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

        </div>
        <!-- end row-->


    </div> <!-- container -->

</div>

@endsection

@push('script')
    <script></script>
@endpush
