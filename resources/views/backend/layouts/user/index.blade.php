
@extends('backend.app')

@section('title')
    List | User
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
                            <li class="breadcrumb-item active">User List</li>
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
                        <ul class="nav form-wizard-header mb-4 d-flex justify-content-between align-items-center" style="background-color: #536de6;">
                            <a class="nav-link rounded-0 py-2 active" style="color: #fff">
                                <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                <span class="d-none d-sm-inline">User List</span>
                            </a>
                            {{-- BULK DELETE CLASS:: delete-selected-toolbar --}}
                            <div class="d-flex align-items-center gap-0 me-2 d-none"
                                id="delete-selected-toolbar">
                                <div class="fw-bold me-5" style="color: #ffffff;font-size:16px;font-style:normal;font-weight:500 !important;">
                                    {{-- BULK DELETE ID:: selected-count --}}
                                    <span class="me-2" id="selected-count"></span>
                                    Selected
                                </div>
                                    {{-- BULK DELETE ID:: delete-selected --}}
                                <button type="button" id="delete-selected" class="table-data-content status-canceled"
                                        style="border:0;padding: 8px 16px;background: #ff6f6f;color: #fff;">
                                    Delete Selected
                                </button>
                            </div>
                            {{-- Search --}}
                            <form action="{{route('admin.user.search')}}" method="GET" class="me-2" id="right-menu-action-bar">
                                <input type="text" class="outline-0" placeholder="Search lesson"
                                        name="search" style="outline: none; padding: 6px 14px;" value="{{ request('search') }}" />
                            </form>
                        </ul>

                        {{-- write table below --}}
                        <table class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Media</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="delete-multiple-form" action="{{route('admin.user.bulk-delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    @forelse ($users as $user)
                                        <tr>
                                            <td><input type="checkbox"
                                                class="user-checkbox" name="user_ids[]" value="{{ $user->id }}" >
                                            </td>
                                            <td>
                                                <img src="{{ $user->avatar ? asset($user->avatar) : asset('backend/images/users/default.jpg') }}"
                                                style="width:30px;height:35px" alt="">
                                            </td>
                                            <td>{{ucwords($user->name) ?? 'N/A' }}</td>
                                            <td>{{ucwords($user->email) ?? 'N/A' }}</td>
                                            <td>{{ $user->phone ?? 'N/A' }}</td>
                                            <td>{{ $user->country ?? 'N/A' }}</td>
                                            <td>{{ $user->dob ?? 'N/A' }}</td>
                                            <td>{{ $user->gender ?? 'N/A' }}</td>
                                            <td>{{ $user->designation ?? 'N/A' }}</td>
                                            <td>
                                                <a href="javascript:void(0);" data-id="{{ $user->id }}"
                                                    class="toggle-status-btn"
                                                    style="background: {{ $user->status == 'Active' ? '#64e775' : '#333' }} !important;
                                                    padding:3px 10px;font-size:14px;border-radius:15px;color:#fff;">
                                                {{ ucwords($user->status )  }}
                                                </a>
                                            </td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($user->updated_at == $user->created_at)
                                                    Not Updated
                                                @else
                                                    {{$user->updated_at->diffForHumans()}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-id="{{$user->id}}" class="d-block" title="view">
                                                    <span style="font-size:25px;">
                                                        <i class="uil-eye"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center fw-bold fs-4">No Record found</td>
                                        </tr>
                                    @endforelse
                                </form>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{-- {{ $users->links() }} --}}
                            {{ $users->appends(['search' => request('search')])->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


{{-- Show lesson details modal --}}
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 d-flex flex-column">
                    <img src="" id="userImage" style="width:200px;height:200px;" alt="">
                    <div class="mt-3">
                        <p><strong>Name:</strong>   <span id="userName" class="text-capitalize"></span> </p>
                        <p><strong>Email:</strong>  <span id="userEmail" class="text-capitalize"></span> </p>
                        <p><strong>Phone:</strong>  <span id="userPhone" class="text-capitalize"></span> </p>
                        <p><strong>Dob:</strong>  <span id="userDob" class="text-capitalize"></span> </p>
                        <p><strong>Country:</strong>  <span id="userCountry" class="text-capitalize"></span> </p>
                        <p><strong>Gender:</strong>  <span id="userGender" class="text-capitalize"></span> </p>
                        <p><strong>Designation:</strong>  <span id="userDesignation" class="text-capitalize"></span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- update modal end --}}


@endsection

@push('script')

{{-- update category name --}}
<script>
    $(document).ready(function () {

    // Open modal and fetch category data
    $('.uil-eye').on('click', function () {
        const userId = $(this).closest('a').data('id');
        const DOMAIN = window.location.origin;
        // Fetch the category details
        $.ajax({
            url: `/admin/user/${userId}/show`,
            type: 'GET',
            success: function (data) {
                let userName = data.name ?? 'N/A';
                let userEmail = data.email ?? 'N/A';
                let userPhone = data.phone ?? 'N/A';
                let userDob = data.dob ?? 'N/A';
                let userCountry = data.country ?? 'N/A';
                let userGender = data.gender ?? 'N/A';
                let userDesignation = data.designation ?? 'N/A';

                let avatar = data.avatar ? data.avatar : 'backend/images/users/default.jpg';
                let userAvatar = `${DOMAIN}/${avatar}`;

                $('#userModal').modal('show');
                $('#userName').text(userName);
                $('#userEmail').text(userEmail);
                $('#userPhone').text(userPhone);

                $('#userDob').text(userDob);
                $('#userCountry').text(userCountry);
                $('#userGender').text(userGender);
                $('#userDesignation').text(userDesignation);



                $('#userImage').attr('src', userAvatar); // Set the video source dynamically
            },
            error: function () {
                let message = 'Failed to fetch category data. Please try again.';
                toastr.error(message);
            },
        });
    });

});

</script>

{{-- change the status of faq --}}
<script>
    $(document).ready(function() {
        $('.toggle-status-btn').on('click', function() {
            var button = $(this);
            var userId = button.data('id');

            $.ajax({
                // url: "{{ route('admin.course.lesson.toggle-status', '') }}/" + faqId,
                url: "{{ route('admin.user.toggle-status', '') }}/" + userId,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    button.text(response.status);
                    button.css('background', response.status === 'Active' ? '#64e775' : '#333');
                    toastr.success(response.success);
                },
                error: function(xhr) {
                    toastr.error("Status update failed:", xhr.responseText);
                }
            });
        });
    });
</script>

{{-- bulk delete the faqs --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all');
        const userCheckboxes = document.querySelectorAll('input[name="user_ids[]"]');
        const deleteSelectedToolbar = document.getElementById('delete-selected-toolbar');
        const rightMenuActionBar = document.getElementById('right-menu-action-bar'); // Get right menu action bar
        const deleteSelectedButton = document.getElementById('delete-selected');
        const selectedCount = document.getElementById('selected-count');
        const deleteForm = document.getElementById('delete-multiple-form');

        // Toggle select all checkboxes
        selectAllCheckbox.addEventListener('change', function () {
            userCheckboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateSelectedCount();
        });

        // Update the selected count and show/hide toolbars
        userCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', updateSelectedCount);
        });

        function updateSelectedCount() {
            const checkedCheckboxes = document.querySelectorAll('input[name="user_ids[]"]:checked');
            const count = checkedCheckboxes.length;
            selectedCount.innerText = count;
            deleteSelectedToolbar.classList.toggle('d-none', count === 0);

            // Toggle visibility of right menu action bar
            rightMenuActionBar.style.display = count === 0 ? 'flex' : 'none'; // Display block if no items are selected
        }

        deleteSelectedButton.addEventListener('click', function (event) {
            event.preventDefault();
            const checkedCheckboxes = document.querySelectorAll('input[name="user_ids[]"]:checked');

            if (checkedCheckboxes.length === 0) {
                Swal.fire({
                    title: 'No Selection',
                    text: 'Please select at least one order to delete.',
                    icon: 'warning',
                    confirmButtonText: 'Okay'
                });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: 'No, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    });
    </script>

@endpush

